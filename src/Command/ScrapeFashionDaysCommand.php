<?php

namespace App\Command;

use App\Entity\Product;
use App\Entity\Category;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Panther\Client;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:scrape-fashion',
    description: 'Scrapes FashionDays (Final: Preserves Image Signature)',
)]
class ScrapeFashionDaysCommand extends Command
{
    private $entityManager;
    private $slugger;

    public function __construct(
        EntityManagerInterface $entityManager,
        SluggerInterface $slugger
    ) {
        parent::__construct();
        $this->entityManager = $entityManager;
        $this->slugger = $slugger;
    }

    protected function configure(): void
    {
        $this->addArgument('url', InputArgument::REQUIRED, 'URL to scrape');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = $input->getArgument('url');
        $output->writeln("🚀 STARTING FashionDays Scraper...");

        $client = Client::createChromeClient(null, [
            '--no-sandbox',
            '--headless',
            '--disable-gpu',
            '--disable-dev-shm-usage',
            '--window-size=1920,1080',
            '--user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
        ]);

        $client->request('GET', $url);
        $output->writeln("⏳ Page loaded. Scrolling...");

        // Лек скрол за активиране на DOM елементите
        try {
            $client->executeScript("window.scrollTo(0, document.body.scrollHeight);");
            sleep(2);
        } catch (\Exception $e) {}

        $crawler = $client->getCrawler();

        // Селектор за продуктите
        $nodes = $crawler->filter('#products-listing-list li.product-card, .campaign-product-card');
        $count = $nodes->count();
        $output->writeln("📦 Products found: $count");

        $savedCount = 0;

        $nodes->each(function ($node) use ($output, &$savedCount) {
            try {
                // --- 1. ЛИНК НА ПРОДУКТА ---
                $linkNode = $node->filter('a.campaign-item, a.product-card-link');
                if ($linkNode->count() === 0) return;

                $rawLink = $linkNode->attr('href');
                // ТУК чистим параметрите, защото за линка на продукта те не са нужни
                $link = explode('?', $rawLink)[0];
                if (strlen($link) > 499) return;

                // --- 2. ЗАГЛАВИЕ ---
                $brandNode = $node->filter('.product-card-brand');
                $nameNode = $node->filter('.product-card-name, .campaign-product-card-name');

                $brand = $brandNode->count() ? trim($brandNode->text()) : '';
                $prodName = $nameNode->count() ? trim($nameNode->text()) : '';

                if (empty($brand) && empty($prodName)) {
                    $name = mb_substr($node->text(), 0, 50) . '...';
                } else {
                    $name = trim("$brand $prodName");
                }

                // --- 3. ЦЕНА ---
                $priceNode = $node->filter('.new-price, .product-new-price');
                $price = 0.0;

                if ($priceNode->count() > 0) {
                    $priceText = preg_replace('/[^0-9]/', '', $priceNode->text());
                    $price = (float)$priceText / 100;
                }

                // --- 4. СНИМКА (ВАЖНАТА ПРОМЯНА) ---
                $image = '';
                $imgNode = $node->filter('img');

                if ($imgNode->count() > 0) {
                    // Взимаме data-original, защото там е истинският линк
                    $dataOriginal = $imgNode->attr('data-original');
                    $src = $imgNode->attr('src');

                    // Логика: Търсим линк, който НЕ е 'blank'
                    if (!empty($dataOriginal) && !str_contains($dataOriginal, 'blank_')) {
                        $image = $dataOriginal;
                    } elseif (!empty($src) && !str_contains($src, 'blank_')) {
                        $image = $src;
                    }
                }

                // ФИНАЛНА ОБРАБОТКА НА СНИМКАТА
                if (!empty($image)) {
                    // 1. Добавяме протокол ако липсва
                    if (str_starts_with($image, '//')) {
                        $image = 'https:' . $image;
                    }

                    // 2. ВАЖНО: НЕ МАХАМЕ ПАРАМЕТРИТЕ СЛЕД '?' ЗА СНИМКАТА!
                    // FashionDays изискват '?s=...' токена, за да се отвори снимката.
                    // Предишният код го триеше и затова снимката се чупеше.
                }

                // --- ЗАПИС ---
                if ($price > 0 && !empty($name) && !empty($image)) {
                    $exists = $this->entityManager->getRepository(Product::class)->findOneBy(['link' => $link]);

                    if (!$exists) {
                        $product = new Product();
                        $product->setName($name);
                        $product->setPrice($price);
                        $product->setLink($link);
                        $product->setImage($image);
                        $product->setSource('FashionDays');
                        $product->setUpdatedAt(new \DateTimeImmutable());

                        $category = $this->detectAndCreateCategory($name, $link);
                        $product->setCategory($category);

                        $this->entityManager->persist($product);
                        $savedCount++;

                        $output->writeln("   ✅ Saved: " . mb_substr($name, 0, 40));
                    }
                }

            } catch (\Exception $e) {
                // skip errors
            }
        });

        $this->entityManager->flush();
        $output->writeln("🎉 DONE! Saved $savedCount new products.");
        $client->quit();

        return Command::SUCCESS;
    }

    private function detectAndCreateCategory(string $name, string $url): ?Category
    {
        $combinedText = mb_strtolower($name . ' ' . $url);

        $categoryRules = [
            'Телевизори' => ['tv', 'телевизор', 'televizor'],
            'Лаптопи' => ['laptop', 'лаптоп', 'notebook'],
            'Телефони' => ['phone', 'телефон', 'smartphone', 'iphone'],
            'Дрехи' => ['dress', 'shirt', 'tricou', 'рокля', 'риза', 'pants', 'jeans', 'jacket', 'тениска', 'блуза', 'суитшърт', 'boss', 'панталон', 'яке'],
            'Обувки' => ['shoes', 'обувки', 'sneakers', 'boots', 'маратонки', 'боти'],
            'Чанти' => ['bag', 'чанта', 'backpack', 'портфейл', 'wallet'],
            'Аксесоари' => ['колан', 'belt', 'шапка', 'hat', 'cap', 'шал', 'scarf'],
            'Часовници' => ['часовник', 'watch'],
        ];

        $matchedCategoryName = 'Общи';
        foreach ($categoryRules as $categoryName => $keywords) {
            foreach ($keywords as $keyword) {
                if (str_contains($combinedText, $keyword)) {
                    $matchedCategoryName = $categoryName;
                    break 2;
                }
            }
        }

        $category = $this->entityManager->getRepository(Category::class)
            ->findOneBy(['name' => $matchedCategoryName]);

        if (!$category) {
            $category = new Category();
            $category->setName($matchedCategoryName);
            $category->setSlug($this->slugger->slug($matchedCategoryName)->lower()->toString());
            $this->entityManager->persist($category);
            $this->entityManager->flush();
        }

        return $category;
    }
}
