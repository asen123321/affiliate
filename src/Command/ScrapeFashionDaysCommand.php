<?php

namespace App\Command;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Panther\Client;

#[AsCommand(
    name: 'app:scrape-fashion',
    description: 'Scrapes FashionDays (Final Fix with Link Cleaner)',
)]
class ScrapeFashionDaysCommand extends Command
{
    private $entityManager;

    public function __construct(EntityManagerInterface $entityManager)
    {
        parent::__construct();
        $this->entityManager = $entityManager;
    }

    protected function configure(): void
    {
        $this->addArgument('url', InputArgument::REQUIRED, 'URL to scrape');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $url = $input->getArgument('url');
        $output->writeln("🚀 STARTING FashionDays Scraper...");

        // 1. Chrome настройки
        $client = Client::createChromeClient(null, [
            '--no-sandbox',
            '--headless',
            '--disable-gpu',
            '--disable-dev-shm-usage',
            '--window-size=1920,1080',
            '--user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
        ]);

        $client->request('GET', $url);
        $output->writeln("⏳ Loading page...");
        sleep(5);

        // 2. Търсим контейнера
        try {
            $client->waitFor('#products-listing-list');
        } catch (\Exception $e) {
            $output->writeln("❌ List not found or timeout.");
            return Command::FAILURE;
        }

        $crawler = $client->getCrawler();
        $nodes = $crawler->filter('#products-listing-list > li');

        $count = $nodes->count();
        $output->writeln("📦 Products found: $count");

        $savedCount = 0;

        $nodes->each(function ($node) use ($output, &$savedCount) {
            try {
                // --- 1. ЛИНК ---
                $linkNode = $node->filter('a.product-card-link');
                if ($linkNode->count() === 0) $linkNode = $node->filter('a');

                if ($linkNode->count() === 0) return;
                $rawLink = $linkNode->attr('href');

                // === ВАЖНО: ПОЧИСТВАНЕ НА ЛИНКА ===
                // Махаме всичко след '?', за да стане къс и да не гърми базата
                $linkParts = explode('?', $rawLink);
                $link = $linkParts[0];

                // Защита: Ако дори след почистването е над 500 символа, пропускаме го
                if (strlen($link) > 499) {
                    return;
                }

                // --- 2. ЗАГЛАВИЕ ---
                $brand = $node->filter('.product-card-brand')->count() ? $node->filter('.product-card-brand')->text() : '';
                $desc = $node->filter('.product-card-description')->count() ? $node->filter('.product-card-description')->text() : '';

                if (!$brand && !$desc) {
                    $fullText = $node->text();
                    $name = substr($fullText, 0, 50) . '...';
                } else {
                    $name = trim("$brand $desc");
                }

                // --- 3. ЦЕНА ---
                $fullText = $node->text();
                preg_match_all('/(\d+)\s*лв/', $fullText, $matches);

                $price = 0.0;
                if (!empty($matches[1])) {
                    $rawPrice = end($matches[1]);
                    if (floatval($rawPrice) > 1000) {
                        $price = floatval($rawPrice) / 100;
                    } else {
                        $price = floatval($rawPrice);
                    }
                }

                // --- 4. СНИМКА ---
                $imgNode = $node->filter('img');
                $image = '';
                if ($imgNode->count() > 0) {
                    $image = $imgNode->attr('data-original') ?? $imgNode->attr('src');
                }

                // --- ЗАПИС ---
                if ($price > 0 && !empty($name)) {
                    $exists = $this->entityManager->getRepository(Product::class)->findOneBy(['link' => $link]);

                    if (!$exists) {
                        $product = new Product();
                        $product->setName($name);
                        $product->setPrice($price);
                        $product->setLink($link);
                        $product->setImage($image);
                        $product->setCategory('FashionDays');
                        $product->setUpdatedAt(new \DateTimeImmutable());

                        $this->entityManager->persist($product);
                        $savedCount++;
                        $output->writeln("   ✅ Saved: $name | $price лв.");
                    }
                }

            } catch (\Exception $e) {
                // Skip errors
            }
        });

        $this->entityManager->flush();
        $output->writeln("🎉 DONE! Saved $savedCount new products.");
        $client->quit();

        return Command::SUCCESS;
    }
}
