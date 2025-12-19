<?php

namespace App\Command;

use App\Entity\Review;
use App\Service\EmagScraper;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[AsCommand(
    name: 'app:scrape-campaign',
    description: '🔥 Scrape entire eMag campaign pages (1-5) and generate reviews with affiliate links',
)]
class ScrapeCampaignCommand extends Command
{
    private const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';
    private const TIMEOUT = 30;

    private const BADGES = [
        'Our Top Pick',
        'Budget Pick',
        'Upgrade Pick',
        'Best Value',
        'Editor\'s Choice',
    ];

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly EmagScraper $scraper,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('campaign_url', InputArgument::REQUIRED, 'The eMag campaign URL to scrape')
            ->addArgument('affiliate_base', InputArgument::REQUIRED, 'Your ProfitShare affiliate base URL')
            ->addOption('pages', 'p', InputOption::VALUE_OPTIONAL, 'Number of pages to scrape (1-10)', 5)
            ->addOption('rating', 'r', InputOption::VALUE_OPTIONAL, 'Default rating for products (1-5)', 5)
            ->addOption('unpublished', null, InputOption::VALUE_NONE, 'Save as unpublished (draft)')
            ->setHelp(
                <<<'HELP'
The <info>app:scrape-campaign</info> command scrapes entire eMag campaign pages and creates reviews.

<comment>Usage:</comment>
  <info>php bin/console app:scrape-campaign "https://www.emag.bg/label/campaign-url" "https://profitshare.bg/l/3594111"</info>
  <info>php bin/console app:scrape-campaign "CAMPAIGN_URL" "AFFILIATE_URL" --pages=5 --rating=5</info>

<comment>What it does:</comment>
  1. Scrapes products from multiple campaign pages (default: 1-5)
  2. Extracts: title, price, image, description, specs
  3. Generates Wirecutter-style content
  4. Creates affiliate links using your ProfitShare URL
  5. Saves all reviews to database
HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $campaignUrl = $input->getArgument('campaign_url');
        $affiliateBase = $input->getArgument('affiliate_base');
        $maxPages = min((int) $input->getOption('pages'), 10);
        $rating = (int) $input->getOption('rating');
        $isPublished = !$input->getOption('unpublished');

        // Validate inputs
        if ($rating < 1 || $rating > 5) {
            $io->error('Rating must be between 1 and 5');
            return Command::FAILURE;
        }

        if (!filter_var($campaignUrl, FILTER_VALIDATE_URL)) {
            $io->error(sprintf('Invalid campaign URL: "%s"', $campaignUrl));
            return Command::FAILURE;
        }

        if (!filter_var($affiliateBase, FILTER_VALIDATE_URL)) {
            $io->error(sprintf('Invalid affiliate URL: "%s"', $affiliateBase));
            return Command::FAILURE;
        }

        $io->title('🔥 eMag Campaign Mass Scraper 🔥');
        $io->info(sprintf('Scraping %d pages from campaign...', $maxPages));
        $io->newLine();

        $allProducts = [];
        $successCount = 0;
        $errorCount = 0;

        // STEP 1: Scrape all pages
        $io->section('📥 Step 1: Extracting products from campaign pages...');

        for ($page = 1; $page <= $maxPages; $page++) {
            $io->text(sprintf('📄 Scraping page %d/%d...', $page, $maxPages));

            $pageUrl = $this->buildPageUrl($campaignUrl, $page);
            $products = $this->scrapeProductListPage($pageUrl, $io);

            if (empty($products)) {
                $io->warning(sprintf('No products found on page %d', $page));
                continue;
            }

            $io->success(sprintf('Found %d products on page %d', count($products), $page));
            $allProducts = array_merge($allProducts, $products);

            // Be nice to the server
            sleep(2);
        }

        if (empty($allProducts)) {
            $io->error('No products found across all pages!');
            return Command::FAILURE;
        }

        $io->newLine();
        $io->success(sprintf('✅ Total products found: %d', count($allProducts)));
        $io->newLine();

        // STEP 2: Process each product
        $io->section('🔧 Step 2: Processing products and creating reviews...');
        $io->progressStart(count($allProducts));

        foreach ($allProducts as $index => $product) {
            try {
                // Generate affiliate link
                $affiliateLink = $affiliateBase;

                // Scrape detailed product data
                $productData = $this->scraper->scrape($product['url']);

                // Use scraped data or fallback to list data
                $title = $productData['title'] ?: $product['title'];
                $price = $productData['price'] ?: $product['price'];
                $imageUrl = $productData['imageUrl'] ?: $product['image'];

                // Generate unique slug
                $slug = $this->generateUniqueSlug($title);

                // Assign random badge
                $badge = self::BADGES[array_rand(self::BADGES)];

                // Generate Wirecutter-style content
                $content = $this->generateWirecutterContent(
                    $title,
                    $price,
                    $badge,
                    $productData['description'],
                    $productData['specifications']
                );

                // Create Review entity
                $review = new Review();
                $review->setTitle($title);
                $review->setSlug($slug);
                $review->setPrice(number_format($price, 2, '.', ''));
                $review->setRating($rating);
                $review->setImageUrl($imageUrl);
                $review->setAffiliateLink($affiliateLink);
                $review->setBadge($badge);
                $review->setIsPublished($isPublished);
                $review->setCreatedAt(new \DateTimeImmutable());

                // Meta description
                $metaDescription = sprintf(
                    '%s review: %s. 🔥 Smart Deal 2025! Read our expert analysis.',
                    $badge,
                    $title
                );
                $review->setMetaDescription(substr($metaDescription, 0, 160));

                $review->setContent($content);

                $this->entityManager->persist($review);
                $this->entityManager->flush();

                $successCount++;
                $io->progressAdvance();

                // Batch processing delay
                if (($index + 1) % 5 === 0) {
                    sleep(2);
                }

            } catch (\Exception $e) {
                $errorCount++;
                $io->progressAdvance();
                // Continue with next product
            }
        }

        $io->progressFinish();
        $io->newLine(2);

        // FINAL SUMMARY
        $io->section('📊 Campaign Scraping Complete!');

        $io->definitionList(
            ['Total Products Found' => count($allProducts)],
            ['Successfully Created' => '✅ ' . $successCount],
            ['Failed' => '❌ ' . $errorCount],
            ['Pages Scraped' => $maxPages],
            ['Rating' => str_repeat('⭐', $rating)],
            ['Affiliate Base' => $affiliateBase],
            ['Published' => $isPublished ? '✅ Yes' : '❌ Draft'],
        );

        $io->newLine();
        $io->success('🎉 Campaign scraping completed successfully!');

        if ($isPublished) {
            $io->note('All reviews are now LIVE on your site! Visit homepage to see them.');
        }

        return Command::SUCCESS;
    }

    private function scrapeProductListPage(string $url, SymfonyStyle $io): array
    {
        $products = [];

        try {
            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => self::USER_AGENT,
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.9,bg;q=0.8',
                    'Accept-Encoding' => 'gzip, deflate, br',
                    'Connection' => 'keep-alive',
                    'Upgrade-Insecure-Requests' => '1',
                    'Sec-Fetch-Dest' => 'document',
                    'Sec-Fetch-Mode' => 'navigate',
                    'Sec-Fetch-Site' => 'none',
                    'Cache-Control' => 'max-age=0',
                    'DNT' => '1',
                ],
                'timeout' => self::TIMEOUT,
                'max_redirects' => 5,
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $statusCode = $response->getStatusCode();

            if ($statusCode !== 200) {
                $io->warning("Page returned status code: $statusCode");
                return [];
            }

            $html = $response->getContent();
            $crawler = new Crawler($html);

            // eMag product card selectors - try multiple approaches
            $productCards = $crawler->filter('.card-item.js-product-data');

            if ($productCards->count() === 0) {
                $productCards = $crawler->filter('.card-item');
            }

            if ($productCards->count() === 0) {
                $productCards = $crawler->filter('.js-product-data');
            }

            if ($productCards->count() === 0) {
                $io->warning('No product cards found with known selectors. Trying broader search...');
                $productCards = $crawler->filter('[class*="card-item"], [class*="product-card"]');
            }

            if ($productCards->count() === 0) {
                $io->warning('No products found on page');
                return [];
            }

            $io->text(sprintf('  Found %d product cards', $productCards->count()));

            $productCards->each(function (Crawler $card) use (&$products) {
                try {
                    // Extract product URL - eMag uses .js-product-url or .card-v2-title
                    $linkElement = $card->filter('a.js-product-url, a.card-v2-title')->first();
                    if ($linkElement->count() === 0) {
                        // Fallback: any link in card
                        $linkElement = $card->filter('a[href*="/pd/"]')->first();
                    }

                    if ($linkElement->count() === 0) {
                        return; // Skip this card
                    }

                    $productUrl = $linkElement->attr('href');
                    if (!str_starts_with($productUrl, 'http')) {
                        $productUrl = 'https://www.emag.bg' . $productUrl;
                    }

                    // Extract title - eMag uses .card-v2-title
                    $titleElement = $card->filter('.card-v2-title, a.js-product-url')->first();
                    $title = $titleElement->count() > 0 ? trim($titleElement->text()) : 'Unknown Product';

                    // Clean title
                    $title = preg_replace('/\s+/', ' ', $title);

                    // Extract price
                    $price = 0;
                    $priceSelectors = [
                        '.product-new-price',
                        'p.product-new-price',
                        '[class*="new-price"]',
                        '.price-current',
                        '.price',
                    ];

                    foreach ($priceSelectors as $selector) {
                        $priceElement = $card->filter($selector);
                        if ($priceElement->count() > 0) {
                            $priceText = $priceElement->first()->text();
                            $price = $this->parsePrice($priceText);
                            if ($price > 0) {
                                break;
                            }
                        }
                    }

                    // Extract image
                    $imageUrl = null;
                    $imgElement = $card->filter('img')->first();
                    if ($imgElement->count() > 0) {
                        $imageUrl = $imgElement->attr('data-src')
                            ?? $imgElement->attr('data-lazy-src')
                            ?? $imgElement->attr('src');

                        if ($imageUrl && !str_starts_with($imageUrl, 'http')) {
                            if (str_starts_with($imageUrl, '//')) {
                                $imageUrl = 'https:' . $imageUrl;
                            } else {
                                $imageUrl = 'https://www.emag.bg' . $imageUrl;
                            }
                        }
                    }

                    // Only add if we have minimum required data
                    if ($productUrl && $title && ($price > 0 || $imageUrl)) {
                        $products[] = [
                            'url' => $productUrl,
                            'title' => $title,
                            'price' => $price,
                            'image' => $imageUrl,
                        ];
                    }

                } catch (\Exception $e) {
                    // Skip problematic cards
                    return;
                }
            });

        } catch (\Exception $e) {
            $io->error('Error scraping page: ' . $e->getMessage());
        }

        return $products;
    }

    private function parsePrice(string $priceText): float
    {
        // Remove currency and text
        $priceText = preg_replace('/[^\\d.,]/', '', $priceText);

        // Determine decimal separator
        $lastComma = strrpos($priceText, ',');
        $lastDot = strrpos($priceText, '.');

        if ($lastComma !== false && $lastDot !== false) {
            if ($lastComma > $lastDot) {
                // Comma is decimal: 1.299,99 -> 1299.99
                $priceText = str_replace('.', '', $priceText);
                $priceText = str_replace(',', '.', $priceText);
            } else {
                // Dot is decimal: 1,299.99 -> 1299.99
                $priceText = str_replace(',', '', $priceText);
            }
        } elseif ($lastComma !== false) {
            // Only comma exists: assume decimal
            $priceText = str_replace(',', '.', $priceText);
        }

        $price = (float) $priceText;

        // Sanity check
        if ($price > 10 && $price < 1000000) {
            return $price;
        }

        return 0;
    }

    private function buildPageUrl(string $baseUrl, int $page): string
    {
        if ($page === 1) {
            return $baseUrl;
        }

        // eMag pagination format
        $separator = str_contains($baseUrl, '?') ? '&' : '?';
        return $baseUrl . $separator . 'p=' . $page;
    }

    private function generateUniqueSlug(string $title): string
    {
        $slug = strtolower($title);
        $slug = preg_replace('/[^a-z0-9]+/', '-', $slug);
        $slug = trim($slug, '-');
        $slug = substr($slug, 0, 100);

        $originalSlug = $slug;
        $counter = 1;

        while ($this->slugExists($slug)) {
            $slug = $originalSlug . '-' . $counter++;
            if ($counter > 1000) {
                $slug = $originalSlug . '-' . uniqid();
                break;
            }
        }

        return $slug;
    }

    private function slugExists(string $slug): bool
    {
        $repository = $this->entityManager->getRepository(Review::class);
        return $repository->findOneBy(['slug' => $slug]) !== null;
    }

    private function generateWirecutterContent(
        string $title,
        float $price,
        string $badge,
        ?string $description,
        ?string $specifications
    ): string {
        $titleEscaped = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $priceFormatted = number_format($price, 2);

        // Badge alert
        $html = '<div class="alert alert-primary border-primary shadow-sm mb-4">';
        $html .= '<h4 class="alert-heading mb-0"><i class="bi bi-award-fill me-2"></i>' . htmlspecialchars($badge, ENT_QUOTES, 'UTF-8') . '</h4>';
        $html .= '</div>';

        // The Verdict
        $html .= '<h2>🔥 Smart Deal 2025 - The Verdict</h2>';
        $html .= '<p class="lead">The <strong>' . $titleEscaped . '</strong> ';

        switch ($badge) {
            case 'Our Top Pick':
                $html .= 'is our absolute top recommendation from this Smart Deals campaign. ';
                $html .= 'After comparing dozens of deals, this one delivers unbeatable value. ';
                $html .= 'At just $' . $priceFormatted . ', this is THE deal to grab before it sells out!';
                break;
            case 'Budget Pick':
                $html .= 'offers incredible value for smart shoppers on a budget. ';
                $html .= 'You won\'t find better bang-for-buck in this price range. ';
                $html .= 'At only $' . $priceFormatted . ', it\'s a steal during this Smart Deals event!';
                break;
            case 'Upgrade Pick':
                $html .= 'is for those who want premium quality and cutting-edge features. ';
                $html .= 'While it costs $' . $priceFormatted . ', the Smart Deals discount makes it more accessible than ever. ';
                $html .= 'If you can stretch your budget, this upgrade is absolutely worth it.';
                break;
            case 'Best Value':
                $html .= 'represents the sweet spot between price and performance. ';
                $html .= 'At $' . $priceFormatted . ', it offers premium features without the premium price tag. ';
                $html .= 'This is what we call true value - don\'t miss this Smart Deal!';
                break;
            case 'Editor\'s Choice':
                $html .= 'earned our Editor\'s Choice award after extensive hands-on testing. ';
                $html .= 'Everything about this product exceeded expectations. ';
                $html .= 'The $' . $priceFormatted . ' Smart Deals price makes it an absolute no-brainer!';
                break;
            default:
                $html .= 'is an outstanding choice from the Smart Deals campaign. ';
                $html .= 'At $' . $priceFormatted . ', it represents exceptional value. ';
                $html .= 'Grab it while supplies last!';
        }
        $html .= '</p>';

        // Why we like it
        $html .= '<h3>⚡ Why This Smart Deal Rocks</h3>';

        if ($description) {
            $html .= $description;
        } else {
            $html .= '<p>This Smart Deals 2025 offer stands out for several key reasons:</p>';
            $html .= '<ul>';
            $html .= '<li><strong>🔥 Hot price:</strong> Massive discount from regular retail price - save big!</li>';
            $html .= '<li><strong>✅ Quality guaranteed:</strong> Genuine product with full warranty included.</li>';
            $html .= '<li><strong>🚚 Fast delivery:</strong> eMag\'s reliable shipping gets it to you quickly.</li>';
            $html .= '<li><strong>💰 Best deal:</strong> We checked competitors - this is THE lowest price right now.</li>';
            $html .= '<li><strong>⭐ Highly rated:</strong> Thousands of verified customer reviews confirm it\'s great.</li>';
            $html .= '<li><strong>🎁 Limited time:</strong> Smart Deals campaign ends soon - act fast!</li>';
            $html .= '</ul>';
        }

        // Specifications (if available)
        if ($specifications) {
            $html .= '<h3>📋 Technical Specifications</h3>';
            $html .= $specifications;
        }

        // Smart Deals Advantage
        $html .= '<h3>🎯 Smart Deals 2025 Special Advantages</h3>';
        $html .= '<p>Buying during the Smart Deals campaign gives you exclusive benefits:</p>';
        $html .= '<ul>';
        $html .= '<li>💸 <strong>Maximum discount</strong> - lowest price of the year</li>';
        $html .= '<li>🎁 <strong>Free gifts</strong> with select purchases</li>';
        $html .= '<li>🚚 <strong>Priority shipping</strong> during campaign period</li>';
        $html .= '<li>↩️ <strong>Extended return</strong> window for peace of mind</li>';
        $html .= '<li>🔒 <strong>Price protection</strong> - if price drops, get refund</li>';
        $html .= '</ul>';

        // Flaws but not dealbreakers
        $html .= '<h3>⚠️ Minor Considerations</h3>';
        $html .= '<p>While the ' . $titleEscaped . ' is excellent, here are minor points to consider:</p>';
        $html .= '<ul>';
        $html .= '<li><strong>High demand:</strong> Popular deal means stock may run out quickly - order soon!</li>';
        $html .= '<li><strong>Campaign timing:</strong> Deal only valid during Smart Deals period - don\'t wait!</li>';
        $html .= '<li><strong>Limited quantity:</strong> Special pricing available while supplies last.</li>';
        $html .= '</ul>';
        $html .= '<p>✅ These are NOT dealbreakers - just move fast to secure yours!</p>';

        // Pros and Cons
        $html .= '<div class="pros-cons row mt-4 mb-4">';

        // Pros
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-success h-100">';
        $html .= '<div class="card-header bg-success text-white">';
        $html .= '<h4 class="mb-0"><i class="bi bi-check-circle me-2"></i>Pros</h4>';
        $html .= '</div>';
        $html .= '<div class="card-body">';
        $html .= '<ul class="pros-list mb-0">';
        $html .= '<li>🔥 Amazing Smart Deals discount price</li>';
        $html .= '<li>✅ Full manufacturer warranty included</li>';
        $html .= '<li>🚚 Fast and reliable eMag delivery</li>';
        $html .= '<li>⭐ Excellent customer reviews and ratings</li>';
        $html .= '<li>💰 Best value in its category</li>';
        $html .= '<li>🎁 Campaign bonuses and free gifts</li>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        // Cons
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-danger h-100">';
        $html .= '<div class="card-header bg-danger text-white">';
        $html .= '<h4 class="mb-0"><i class="bi bi-x-circle me-2"></i>Cons</h4>';
        $html .= '</div>';
        $html .= '<div class="card-body">';
        $html .= '<ul class="cons-list mb-0">';
        $html .= '<li>⏰ Limited time offer - act quickly</li>';
        $html .= '<li>📦 High demand may cause stock issues</li>';
        $html .= '<li>🎯 Deal ends when campaign closes</li>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>'; // End pros-cons row

        // Bottom line
        $html .= '<h3>🎯 The Bottom Line</h3>';
        $html .= '<p><strong>' . htmlspecialchars($badge, ENT_QUOTES, 'UTF-8') . ':</strong> ';
        $html .= 'The ' . $titleEscaped . ' is a standout deal in the Smart Deals 2025 campaign. ';
        $html .= 'At $' . $priceFormatted . ', it offers exceptional value that won\'t last long. ';
        $html .= '🔥 <strong>Our verdict: BUY NOW before it sells out!</strong> ';
        $html .= 'Thousands of shoppers are eyeing this deal - don\'t be the one who misses out. ';
        $html .= 'Click the BUY button above to secure yours today!</p>';

        return $html;
    }

    private function truncate(string $text, int $length): string
    {
        if (strlen($text) <= $length) {
            return $text;
        }
        return substr($text, 0, $length - 3) . '...';
    }
}
