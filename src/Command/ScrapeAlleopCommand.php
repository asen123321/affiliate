<?php

namespace App\Command;

use App\Service\CategoryDetector;
use App\Service\HtmlSanitizerService;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Panther\Client;
use Symfony\Component\String\Slugger\SluggerInterface;
use Facebook\WebDriver\WebDriverBy;
use Facebook\WebDriver\WebDriverExpectedCondition;

#[AsCommand(
    name: 'app:scrape-alleop',
    description: 'Scrape products from Alleop.bg using Panther + Chromium'
)]
class ScrapeAlleopCommand extends Command
{
    private const BASE_URL = 'https://www.alleop.bg';
    private const AFFILIATE_LINK = 'https://profitshare.bg/l/3608346';

    public function __construct(
        private Connection $connection,
        private SluggerInterface $slugger,
        private HtmlSanitizerService $htmlSanitizer
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'Category URL to scrape')
            ->addOption('pages', 'p', InputOption::VALUE_OPTIONAL, 'Number of pages', 1)
            ->addOption('wait', 'w', InputOption::VALUE_OPTIONAL, 'Wait time for products to load (seconds)', 10);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = $input->getArgument('url');
        $numPages = (int) $input->getOption('pages');
        $waitTime = (int) $input->getOption('wait');

        $io->title('🚀 Alleop Scraper with Panther + Chromium');
        $io->info('URL: ' . $url);
        $io->info('Pages: ' . $numPages);
        $io->info('Wait time: ' . $waitTime . ' seconds');

        $totalImported = 0;

        try {
            // Create Panther client with Chromium
            $io->text('Starting Chromium browser...');

            $client = Client::createChromeClient(null, [
                '--disable-gpu',
                '--no-sandbox',
                '--disable-dev-shm-usage',
                '--disable-software-rasterizer',
                '--disable-extensions',
                '--headless',
                '--disable-setuid-sandbox',
                '--disable-background-networking',
                '--disable-background-timer-throttling',
                '--disable-backgrounding-occluded-windows',
                '--disable-breakpad',
                '--disable-client-side-phishing-detection',
                '--disable-component-extensions-with-background-pages',
                '--disable-default-apps',
                '--disable-features=TranslateUI',
                '--disable-hang-monitor',
                '--disable-ipc-flooding-protection',
                '--disable-popup-blocking',
                '--disable-prompt-on-repost',
                '--disable-renderer-backgrounding',
                '--disable-sync',
                '--force-color-profile=srgb',
                '--metrics-recording-only',
                '--no-first-run',
                '--password-store=basic',
                '--use-mock-keychain',
                '--window-size=1920,1080',
            ]);

            $io->success('Browser started!');

            for ($page = 1; $page <= $numPages; $page++) {
                $io->section("📄 Page $page");

                // Build page URL
                $pageUrl = $page > 1 ? $url . '?page=' . $page : $url;
                $io->text("Loading: $pageUrl");

                // Navigate to page
                $crawler = $client->request('GET', $pageUrl);

                // Wait for products to load via JavaScript
                $io->text("Waiting {$waitTime} seconds for products to load...");

                try {
                    // Wait for product cards to appear
                    $client->wait($waitTime)->until(
                        WebDriverExpectedCondition::presenceOfElementLocated(
                            WebDriverBy::cssSelector('article.product-miniature, .product-card')
                        )
                    );
                    $io->text('✓ Products loaded!');
                } catch (\Exception $e) {
                    $io->warning('Timeout waiting for products, trying anyway...');
                }

                // Additional wait to ensure all products are loaded
                sleep(3);

                // Refresh crawler to get updated DOM
                $crawler = $client->refreshCrawler();

                // Find all product cards
                $products = $crawler->filter('article.product-miniature');
                $productCount = $products->count();

                $io->text("Found $productCount products");

                if ($productCount === 0) {
                    $io->warning('No products found on this page');
                    continue;
                }

                // Extract each product
                $products->each(function ($node, $index) use ($io, &$totalImported) {
                    try {
                        // Product link and title - try multiple selectors
                        $linkNode = $node->filter('h3 a, h2 a, .product-title a, .product-name a, a.product-link');
                        if ($linkNode->count() === 0) {
                            $io->warning("Product #{$index}: No link found");
                            return;
                        }

                        $productUrl = $linkNode->attr('href');
                        $title = trim($linkNode->text());

                        // Truncate title if too long (database limit is 255 chars)
                        if (strlen($title) > 250) {
                            $title = substr($title, 0, 247) . '...';
                        }

                        if (empty($title)) {
                            $io->warning("Product #{$index}: Empty title");
                            return;
                        }

                        if (empty($productUrl)) {
                            $io->warning("Product #{$index}: Empty URL");
                            return;
                        }

                        // Make URL absolute
                        if (!str_starts_with($productUrl, 'http')) {
                            $productUrl = self::BASE_URL . $productUrl;
                        }

                        // Product image - try multiple attributes
                        $imageUrl = '';
                        $imgNode = $node->filter('img');
                        if ($imgNode->count() > 0) {
                            // Try different image attributes in order
                            $imageUrl = $imgNode->attr('data-src')
                                     ?: $imgNode->attr('data-original')
                                     ?: $imgNode->attr('data-lazy-src')
                                     ?: $imgNode->attr('srcset')
                                     ?: $imgNode->attr('src')
                                     ?: '';

                            // Handle lazy loading placeholder
                            if (empty($imageUrl) || $imageUrl === 'data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==') {
                                $imageUrl = '';
                            }

                            // Extract first URL from srcset if present
                            if (str_contains($imageUrl, ' ')) {
                                $imageUrl = explode(' ', $imageUrl)[0];
                            }

                            // Make URL absolute
                            if (!empty($imageUrl) && !str_starts_with($imageUrl, 'http')) {
                                $imageUrl = self::BASE_URL . $imageUrl;
                            }
                        }

                        // Product price
                        $price = null;
                        $priceNode = $node->filter('.product-price, .price');
                        if ($priceNode->count() > 0) {
                            $priceText = $priceNode->text();
                            preg_match('/(\d+[\.,]?\d*)/u', $priceText, $matches);
                            if (!empty($matches[1])) {
                                $price = (float) str_replace(',', '.', $matches[1]);
                            }
                        }

                        // Generate affiliate link
                        $affiliateLink = self::AFFILIATE_LINK . '?u=' . urlencode($productUrl);

                        // Generate slug
                        $slug = $this->slugger->slug($title)->lower()->toString();

                        // Make slug unique
                        $originalSlug = $slug;
                        $counter = 1;
                        while ($this->slugExists($slug)) {
                            $slug = $originalSlug . '-' . $counter;
                            $counter++;
                        }

                        // Generate content and sanitize it to prevent XSS
                        $content = $this->generateContent($title, $price);
                        $content = $this->htmlSanitizer->sanitizeForDisplay($content);

                        // Meta description (plain text, but sanitize for safety)
                        $metaDescription = $this->generateMetaDescription($title, $price);

                        // Detect category automatically
                        $category = CategoryDetector::detectCategory($title);

                        // Insert into database
                        $this->connection->insert('review', [
                            'title' => $title,
                            'slug' => $slug,
                            'content' => $content,
                            'meta_description' => $metaDescription,
                            'image_url' => $imageUrl,
                            'affiliate_link' => $affiliateLink,
                            'original_product_url' => $productUrl,
                            'price' => $price,
                            'rating' => rand(4, 5),
                            'category' => $category,
                            'is_published' => true,
                            'created_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                            'updated_at' => (new \DateTime())->format('Y-m-d H:i:s'),
                        ]);

                        $totalImported++;
                        $io->text("✅ #{$totalImported}: {$title}" . ($price ? " - {$price} лв." : ""));

                    } catch (\Exception $e) {
                        $io->error("Error processing product #{$index}: " . $e->getMessage());
                    }
                });

                $io->text("Imported {$totalImported} products so far...");
            }

            $io->success("✅ Total imported: $totalImported products from Alleop!");

            // Close browser
            $client->quit();

        } catch (\Exception $e) {
            $io->error('Scraping failed: ' . $e->getMessage());
            $io->text('Stack trace: ' . $e->getTraceAsString());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function slugExists(string $slug): bool
    {
        $result = $this->connection->fetchOne(
            'SELECT COUNT(*) FROM review WHERE slug = ?',
            [$slug]
        );
        return $result > 0;
    }

    private function generateContent(string $title, ?float $price): string
    {
        $priceText = $price ? number_format($price, 2) . ' лв.' : 'Отлична цена';

        return <<<HTML
<div class="product-review">
    <h2>🔥 Топ оферта от Alleop: {$title}</h2>

    <div class="price-highlight">
        <h3>💰 Цена: {$priceText}</h3>
    </div>

    <h3>✨ Защо да изберете този продукт?</h3>
    <ul>
        <li>✅ Качествен продукт от Alleop.bg</li>
        <li>✅ Отлично съотношение цена-качество</li>
        <li>✅ Бърза доставка в цяла България</li>
        <li>✅ Сигурно онлайн пазаруване</li>
        <li>✅ Възможност за плащане при доставка</li>
    </ul>

    <h3>📦 Какво получавате?</h3>
    <p>Оригинален продукт с гаранция от производителя. Професионална доставка до вашия адрес или офис на куриер.</p>

    <h3>⭐ Защо да поръчате точно сега?</h3>
    <ul>
        <li>🎯 Ограничена наличност - продуктът може да свърши</li>
        <li>💎 Отлична цена и качество</li>
        <li>🚚 Безплатна доставка при поръчка над 100 лв.</li>
        <li>🔒 100% сигурно онлайн плащане</li>
        <li>↩️ Лесно връщане на стоки</li>
    </ul>

    <div class="final-verdict">
        <h3>🎯 Заключение</h3>
        <p><strong>{$title}</strong> е отличен избор за всеки, който търси качество на достъпна цена. Поръчайте сега от Alleop.bg и се възползвайте от тази страхотна оферта!</p>
    </div>
</div>
HTML;
    }

    private function generateMetaDescription(string $title, ?float $price): string
    {
        $priceText = $price ? number_format($price, 2) . ' лв.' : 'отлична цена';
        return "{$title} на {$priceText} от Alleop.bg ⭐ Качествен продукт ✓ Бърза доставка ✓ Сигурно пазаруване ✓ Поръчайте онлайн сега!";
    }
}
