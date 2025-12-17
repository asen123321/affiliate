<?php

namespace App\Command;

use App\Entity\Product;
use App\Entity\Review;
use App\Repository\ProductRepository;
use App\Repository\ReviewRepository;
use App\Service\ProfitShareService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:scrape-emag',
    description: 'Scrapes products from eMAG via ProfitShare API (Phones, Tablets, Laptops)',
)]
class ScrapeEmagCommand extends Command
{
    private array $slugCache = []; // 👈 ДОБАВИ ТОЗИ РЕД ТУК
    private const CATEGORY_FILTERS = [
        'phones' => ['Telefoane', 'Smartphone', 'Mobile', 'Phone', 'GSM'],
        'tablets' => ['Tablete', 'Tablet', 'iPad'],
        'laptops' => ['Laptop', 'Notebook', 'Ultrabook', 'MacBook'],
        // 👇 Add these for FashionDays 👇
        'fashion' => ['Мъж', 'Жени', 'Дрехи', 'Обувки', 'Часовник', 'Гривна', 'Watch', 'Dress'],
        'general' => [' '], // Matches everything
    ];

    public function __construct(
        private ProfitShareService $psService,
        private EntityManagerInterface $entityManager,
        private ProductRepository $productRepository,
        private ReviewRepository $reviewRepository,
        private SluggerInterface $slugger
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('category', 'c', InputOption::VALUE_OPTIONAL, 'Category: phones, tablets, laptops, or all', 'all')
            ->addOption('pages', 'p', InputOption::VALUE_OPTIONAL, 'Number of pages to scrape', 5)
            ->addOption('limit', 'l', InputOption::VALUE_OPTIONAL, 'Limit products to import (0 = unlimited)', 100)
            ->addOption('reviews', 'r', InputOption::VALUE_NONE, 'Also create Review entries for homepage')
            ->addOption('advertiser', 'a', InputOption::VALUE_OPTIONAL, 'Advertiser ID (Default: 35 for eMAG)', '35')
            ->addOption('dry-run', 'd', InputOption::VALUE_NONE, 'Dry run - don\'t save to database');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $categoryFilter = strtolower($input->getOption('category'));
        $pagesToScrape = (int) $input->getOption('pages');
        $limitTotal = (int) $input->getOption('limit');
        $createReviews = $input->getOption('reviews');
        $isDryRun = $input->getOption('dry-run');

        $io->title('🛒 eMAG Product Scraper - ProfitShare API');

        // Stats
        $stats = [
            'fetched' => 0,
            'matched' => 0,
            'products_new' => 0,
            'products_updated' => 0,
            'reviews_created' => 0,
        ];

        $io->section('🔍 Step 1: Setting Advertiser');

        // Get ID from command line option (defaults to 35 if not provided)
        $advertiserId = (int) $input->getOption('advertiser');

        if (!$advertiserId) {
            $io->error('Invalid Advertiser ID provided.');
            return Command::FAILURE;
        }

        $io->success("Using Advertiser ID: $advertiserId");

        // 2. Determine categories
        $categoriesToScrape = [];
        if ($categoryFilter === 'all') {
            $categoriesToScrape = array_keys(self::CATEGORY_FILTERS);
        } elseif (isset(self::CATEGORY_FILTERS[$categoryFilter])) {
            $categoriesToScrape = [$categoryFilter];
        } else {
            $io->error("Invalid category! Use: phones, tablets, laptops, or all");
            return Command::FAILURE;
        }

        $io->section(sprintf('📂 Categories: %s', implode(', ', $categoriesToScrape)));

        // 3. Scrape products
        $io->section('🚀 Step 3: Scraping Products');

        try {
            $allProducts = [];

            for ($page = 1; $page <= $pagesToScrape; $page++) {
                $io->text(sprintf("Fetching page %d/%d...", $page, $pagesToScrape));

                $response = $this->psService->request('GET', 'affiliate-products/', [
                    'filters' => ['advertiser' => $advertiserId],
                    'page' => $page
                ]);

                $apiProducts = $response['result']['products'] ?? [];
                if (empty($apiProducts)) {
                    $io->note("No more products on page {$page}");
                    break;
                }

                $stats['fetched'] += count($apiProducts);

                // Filter by category
                foreach ($apiProducts as $item) {
                    foreach ($categoriesToScrape as $category) {
                        $keywords = self::CATEGORY_FILTERS[$category];
                        $productCategory = $item['category_name'] ?? '';
                        $productName = $item['name'] ?? '';

                        foreach ($keywords as $keyword) {
                            if (stripos($productCategory, $keyword) !== false ||
                                stripos($productName, $keyword) !== false) {
                                $item['_category'] = $category;
                                $allProducts[] = $item;
                                $stats['matched']++;

                                if ($limitTotal > 0 && $stats['matched'] >= $limitTotal) {
                                    break 4;
                                }
                                break 2;
                            }
                        }
                    }
                }

                $io->text(sprintf("  ✓ Page %d done. Matched: %d products so far", $page, $stats['matched']));
            }

            $io->success(sprintf("Scraped %d pages, found %d matching products", $page - 1, count($allProducts)));

            // 4. Save to database
            if (!$isDryRun && !empty($allProducts)) {
                $io->section('💾 Step 4: Saving to Database');

                foreach ($allProducts as $item) {
                    $this->saveProduct($item, $createReviews, $stats);
                }

                $this->entityManager->flush();
                $io->success('All products saved!');
            }

            // 5. Summary
            $io->section('📊 Summary');
            $io->table(
                ['Metric', 'Count'],
                [
                    ['Products fetched from API', $stats['fetched']],
                    ['Products matched categories', $stats['matched']],
                    ['Products created (new)', $stats['products_new']],
                    ['Products updated', $stats['products_updated']],
                    ['Reviews created', $stats['reviews_created']],
                ]
            );

            if ($isDryRun) {
                $io->warning('DRY RUN - Nothing saved');
            } else {
                $io->success('✅ Scraping completed!');
                $io->text('Visit: http://localhost/');
            }

        } catch (\Exception $e) {
            $io->error('Error: ' . $e->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function saveProduct(array $item, bool $createReviews, array &$stats): void
    {
        $link = $item['link'];
        $product = $this->productRepository->findOneBy(['link' => $link]);

        if (!$product) {
            $product = new Product();
            $product->setLink($link);
            $stats['products_new']++;
        } else {
            $stats['products_updated']++;
        }

        // Поправка на кодировката за името
        $safeName = mb_convert_encoding($item['name'], 'UTF-8', 'UTF-8');

        $product->setName($safeName);
        $product->setPrice($item['price_vat'] ?? 0);
        $product->setImage($item['image'] ?? null);
        $product->setCategory($item['category_name'] ?? $item['_category'] ?? 'unknown');
        $product->setUpdatedAt(new \DateTimeImmutable());

        $this->entityManager->persist($product);

        // Създаване на ревю
        if ($createReviews) {
            $existing = $this->reviewRepository->findOneBy(['affiliateLink' => $link]);
            if (!$existing) {
                $review = new Review();
                $review->setTitle($safeName);
                $review->setSlug($this->generateSlug($safeName));

                // FIX: Използваме mb_substr за кирилицата
                $desc = mb_substr($safeName, 0, 150, 'UTF-8') . ' - Топ цена!';
                $review->setMetaDescription($desc);

                // FIX: Генерираме съдържанието и гарантираме, че не е NULL
                $content = $this->generateContent($item);
                $review->setContent($content);

                $review->setAffiliateLink($link);
                $review->setOriginalProductUrl($link);
                $review->setImageUrl($item['image'] ?? null);
                $review->setPrice((string)($item['price_vat'] ?? 0));
                $review->setRating(rand(3, 5));
                $review->setIsPublished(true);
                $review->setBadge($this->generateBadge($item['_category'] ?? 'product'));

                $this->entityManager->persist($review);
                $stats['reviews_created']++;
            }
        }
    }
    private function generateSlug(string $title): string
    {
        // 1. Създаваме базов slug (напр. "damski-casovnik")
        $baseSlug = $this->slugger->slug($title)->lower()->toString();

        // Ако е празно (напр. кирилица без транслитерация), слагаме нещо служебно
        if (empty($baseSlug)) {
            $baseSlug = 'product-' . uniqid();
        }

        $slug = $baseSlug;
        $counter = 1;

        // 2. Въртим цикъл, докато намерим свободен slug
        // Проверяваме: Има ли го в базата? ИЛИ Има ли го в текущия кеш ($this->slugCache)?
        while (
            $this->reviewRepository->findOneBy(['slug' => $slug]) ||
            isset($this->slugCache[$slug])
        ) {
            $slug = $baseSlug . '-' . $counter;
            $counter++;
        }

        // 3. Запазваме го в кеша, за да не го ползваме пак след 1 секунда
        $this->slugCache[$slug] = true;

        return $slug;
    }

    private function generateContent(array $item): string
    {
        // Почистваме данните
        $name = mb_convert_encoding($item['name'] ?? 'Продукт', 'UTF-8', 'UTF-8');
        $nameSafe = htmlspecialchars($name, ENT_QUOTES | ENT_SUBSTITUTE, 'UTF-8');

        $price = $item['price_vat'] ?? 0;

        $category = $item['category_name'] ?? 'product';
        $category = mb_convert_encoding($category, 'UTF-8', 'UTF-8');
        $categoryLower = mb_strtolower($category, 'UTF-8');

        // Формираме HTML
        return sprintf(
            "<h2>За продукта</h2>\n" .
            "<p>Възползвайте се от страхотната оферта за <strong>%s</strong>. " .
            "Този продукт от категория <em>%s</em> е наличен на цена от <strong>%.2f лв</strong>.</p>\n\n" .
            "<h3>Защо да изберете това?</h3>\n" .
            "<ul>\n" .
            "  <li>✅ Гарантирано качество</li>\n" .
            "  <li>✅ Бърза доставка</li>\n" .
            "  <li>✅ Топ цена за сезона</li>\n" .
            "</ul>\n\n" .
            "<div class='buy-now'>\n" .
            "   <p>👉 <strong>Поръчай %s сега преди изчерпване на количествата!</strong></p>\n" .
            "</div>",
            $nameSafe,
            $categoryLower,
            $price,
            $nameSafe
        );
    }
    private function generateBadge(string $category): string
    {
        $badges = [
            'phones' => ['📱 HOT PHONE', 'SMARTPHONE DEAL', 'PHONE TRENDING'],
            'tablets' => ['📱 TABLET DEAL', 'TOP TABLET', 'TRENDING'],
            'laptops' => ['💻 LAPTOP DEAL', 'BEST LAPTOP', 'TOP PICK'],
        ];

        $options = $badges[$category] ?? ['HOT DEAL', 'BEST PRICE', 'TRENDING'];
        return $options[array_rand($options)];
    }
}
