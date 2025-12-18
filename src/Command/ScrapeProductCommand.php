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

#[AsCommand(
    name: 'app:scrape-product',
    description: 'Scrape a product from eMAG and create a Wirecutter-style review',
)]
class ScrapeProductCommand extends Command
{
    private const BADGES = [
        'Our Top Pick',
        'Budget Pick',
        'Upgrade Pick',
    ];

    public function __construct(
        private readonly EmagScraper $scraper,
        private readonly EntityManagerInterface $entityManager
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('emag_url', InputArgument::REQUIRED, 'The eMAG URL to scrape product data from')
            ->addArgument('affiliate_url', InputArgument::REQUIRED, 'The affiliate URL for the buy button')
            ->addOption('rating', 'r', InputOption::VALUE_OPTIONAL, 'Product rating (1-5)', 5)
            ->addOption('badge', 'b', InputOption::VALUE_OPTIONAL, 'Specific badge (or random if not set)')
            ->addOption('unpublished', null, InputOption::VALUE_NONE, 'Save as unpublished (draft)')
            ->setHelp(
                <<<'HELP'
The <info>app:scrape-product</info> command creates Wirecutter-style product reviews.

<comment>Usage:</comment>
  <info>php bin/console app:scrape-product "https://emag.bg/laptop..." "https://amzn.to/abc123"</info>
  <info>php bin/console app:scrape-product "https://emag.ro/phone..." "https://emag.bg/ref/123" --rating=4</info>
  <info>php bin/console app:scrape-product "URL1" "URL2" --badge="Our Top Pick"</info>

<comment>Arguments:</comment>
  <info>emag_url</info>      URL to scrape product data from (title, price, image, specs)
  <info>affiliate_url</info>  Your affiliate link for the "Buy Now" button

<comment>The command will:</comment>
  1. Scrape product data from eMAG URL
  2. Assign a random Wirecutter-style badge ("Our Top Pick", "Budget Pick", "Upgrade Pick")
  3. Generate structured Wirecutter-style content with:
     - The Verdict (executive summary)
     - Why we like it (key specs and features)
     - Flaws but not dealbreakers (honest cons)
     - Pros/Cons in Bootstrap grid layout
  4. Save review with affiliate URL for monetization
HELP
            );
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $emagUrl = $input->getArgument('emag_url');
        $affiliateUrl = $input->getArgument('affiliate_url');
        $rating = (int) $input->getOption('rating');
        $customBadge = $input->getOption('badge');
        $isPublished = !$input->getOption('unpublished');

        // Validate inputs
        if ($rating < 1 || $rating > 5) {
            $io->error('Rating must be between 1 and 5');
            return Command::FAILURE;
        }

        if (!filter_var($emagUrl, FILTER_VALIDATE_URL)) {
            $io->error(sprintf('Invalid eMAG URL: "%s"', $emagUrl));
            return Command::FAILURE;
        }

        if (!filter_var($affiliateUrl, FILTER_VALIDATE_URL)) {
            $io->error(sprintf('Invalid affiliate URL: "%s"', $affiliateUrl));
            return Command::FAILURE;
        }

        $io->title('Wirecutter-Style Product Review Generator');
        $io->info('Creating expert product review with affiliate monetization...');
        $io->newLine();

        // Step 1: Scrape product data from eMAG
        $io->section('📥 Step 1: Scraping product data from eMAG...');

        try {
            $productData = $this->scraper->scrape($emagUrl);

            if ($productData['scraped']) {
                $io->success('Successfully scraped live product data!');
            } else {
                $io->warning(sprintf(
                    'Live scraping failed (HTTP %d). Generated intelligent fallback data.',
                    $productData['statusCode']
                ));
            }

            $io->table(
                ['Field', 'Value'],
                [
                    ['Title', $productData['title']],
                    ['Price', '$' . number_format($productData['price'], 2)],
                    ['Image', $this->truncate($productData['imageUrl'], 60) . '...'],
                    ['Data Source', $productData['scraped'] ? '🌐 Live Scraped' : '🤖 AI Generated'],
                ]
            );

        } catch (\Exception $e) {
            $io->error('Scraping failed: ' . $e->getMessage());
            return Command::FAILURE;
        }

        // Step 2: Assign badge
        $io->section('🏆 Step 2: Assigning Wirecutter badge...');

        $badge = $customBadge && in_array($customBadge, self::BADGES)
            ? $customBadge
            : self::BADGES[array_rand(self::BADGES)];

        $io->text(sprintf('Badge: <comment>%s</comment>', $badge));

        // Step 3: Generate unique slug
        $io->section('🔗 Step 3: Generating URL slug...');

        $slug = $this->generateUniqueSlug($productData['title']);
        $io->text(sprintf('Slug: <comment>%s</comment>', $slug));

        // Step 4: Generate Wirecutter-style content
        $io->section('✍️  Step 4: Generating Wirecutter-style content...');

        $content = $this->generateWirecutterContent(
            $productData['title'],
            $productData['price'],
            $badge,
            $productData['description'],
            $productData['specifications']
        );

        $io->text(sprintf('Generated %d characters of expert content', strlen($content)));

        // Step 5: Create Review entity
        $io->section('💾 Step 5: Saving review to database...');

        $review = new Review();
        $review->setTitle($productData['title']);
        $review->setSlug($slug);
        $review->setPrice(number_format($productData['price'], 2, '.', ''));
        $review->setRating($rating);
        $review->setImageUrl($productData['imageUrl']);
        $review->setAffiliateLink($affiliateUrl); // Use affiliate URL here
        $review->setBadge($badge);
        $review->setIsPublished($isPublished);
        $review->setCreatedAt(new \DateTimeImmutable());

        // Meta description
        $metaDescription = sprintf(
            '%s review: Expert analysis of the %s. %s.',
            $badge,
            $productData['title'],
            'Read our in-depth testing and recommendations'
        );
        $review->setMetaDescription(substr($metaDescription, 0, 160));

        $review->setContent($content);

        try {
            $this->entityManager->persist($review);
            $this->entityManager->flush();

            $io->success('Review saved successfully!');

        } catch (\Exception $e) {
            $io->error('Database error: ' . $e->getMessage());
            return Command::FAILURE;
        }

        // Final summary
        $io->newLine();
        $io->section('📊 Review Summary');

        $io->definitionList(
            ['Review ID' => $review->getId()],
            ['Title' => $review->getTitle()],
            ['Badge' => '🏆 ' . $badge],
            ['Slug' => $review->getSlug()],
            ['Price' => '$' . $review->getPrice()],
            ['Rating' => str_repeat('⭐', $rating)],
            ['Affiliate URL' => $affiliateUrl],
            ['Published' => $isPublished ? '✅ Yes' : '❌ Draft'],
            ['View URL' => '/review/' . $review->getSlug()]
        );

        $io->newLine();
        $io->success('🎉 Wirecutter-style review created successfully!');

        if ($isPublished) {
            $io->note(sprintf('View at: http://localhost/review/%s', $review->getSlug()));
        }

        return Command::SUCCESS;
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

        // Start with badge
        $html = '<div class="alert alert-primary border-primary shadow-sm mb-4">';
        $html .= '<h4 class="alert-heading mb-0"><i class="bi bi-award-fill me-2"></i>' . htmlspecialchars($badge, ENT_QUOTES, 'UTF-8') . '</h4>';
        $html .= '</div>';

        // The Verdict
        $html .= '<h2>The Verdict</h2>';
        $html .= '<p class="lead">The <strong>' . $titleEscaped . '</strong> ';

        switch ($badge) {
            case 'Our Top Pick':
                $html .= 'is our top recommendation after extensive testing and comparison with competitors. ';
                $html .= 'It delivers the best combination of performance, features, and value for most people. ';
                $html .= 'At $' . $priceFormatted . ', it represents an excellent investment that you won\'t regret.';
                break;
            case 'Budget Pick':
                $html .= 'offers exceptional value for budget-conscious buyers without major compromises. ';
                $html .= 'While it may not have all the bells and whistles of premium options, it covers the essentials exceptionally well. ';
                $html .= 'At just $' . $priceFormatted . ', it\'s our favorite affordable option.';
                break;
            case 'Upgrade Pick':
                $html .= 'is for those who want the absolute best and are willing to pay for premium features and performance. ';
                $html .= 'It excels in areas where our top pick makes compromises, offering cutting-edge technology and superior build quality. ';
                $html .= 'The $' . $priceFormatted . ' price tag is steep, but justified for demanding users.';
                break;
        }
        $html .= '</p>';

        // Why we like it
        $html .= '<h3>Why we like it</h3>';

        if ($description) {
            $html .= $description;
        } else {
            $html .= '<p>After weeks of hands-on testing, several key features stood out:</p>';
            $html .= '<ul>';
            $html .= '<li><strong>Exceptional build quality:</strong> Premium materials and solid construction ensure long-term durability.</li>';
            $html .= '<li><strong>Outstanding performance:</strong> Handles demanding tasks smoothly without lag or stuttering.</li>';
            $html .= '<li><strong>Thoughtful design:</strong> Every detail has been carefully considered for optimal user experience.</li>';
            $html .= '<li><strong>Great ecosystem:</strong> Works seamlessly with other devices and accessories in the lineup.</li>';
            $html .= '<li><strong>Future-proof:</strong> Modern features and specifications ensure relevance for years to come.</li>';
            $html .= '</ul>';
        }

        // Specifications (if available)
        if ($specifications) {
            $html .= '<h3>Technical Specifications</h3>';
            $html .= $specifications;
        }

        // Flaws but not dealbreakers
        $html .= '<h3>Flaws but not dealbreakers</h3>';
        $html .= '<p>No product is perfect, and the ' . $titleEscaped . ' has a few minor drawbacks worth mentioning:</p>';
        $html .= '<ul>';

        switch ($badge) {
            case 'Our Top Pick':
                $html .= '<li><strong>Price premium:</strong> It costs more than budget alternatives, though the quality justifies the investment.</li>';
                $html .= '<li><strong>Limited color options:</strong> Only available in a few colorways, which may not suit everyone.</li>';
                $html .= '<li><strong>Learning curve:</strong> Advanced features take time to master, but are worth the effort.</li>';
                break;
            case 'Budget Pick':
                $html .= '<li><strong>Build materials:</strong> Uses some plastic components instead of premium metal throughout.</li>';
                $html .= '<li><strong>Missing premium features:</strong> Lacks some advanced capabilities found in pricier models.</li>';
                $html .= '<li><strong>Limited warranty:</strong> Shorter warranty period compared to premium competitors.</li>';
                break;
            case 'Upgrade Pick':
                $html .= '<li><strong>High cost:</strong> Significantly more expensive than mainstream options, not for everyone\'s budget.</li>';
                $html .= '<li><strong>Overkill for basic use:</strong> Many features go unused for casual users.</li>';
                $html .= '<li><strong>Size and weight:</strong> Premium build adds heft that impacts portability.</li>';
                break;
        }

        $html .= '</ul>';
        $html .= '<p>These minor issues don\'t change our recommendation. For most users, the strengths far outweigh these limitations.</p>';

        // Pros and Cons in Bootstrap grid
        $html .= '<div class="pros-cons row mt-4 mb-4">';

        // Pros column
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-success h-100">';
        $html .= '<div class="card-header bg-success text-white">';
        $html .= '<h4 class="mb-0"><i class="bi bi-check-circle me-2"></i>Pros</h4>';
        $html .= '</div>';
        $html .= '<div class="card-body">';
        $html .= '<ul class="pros-list mb-0">';
        $html .= '<li>Excellent overall performance and reliability</li>';
        $html .= '<li>High-quality construction and premium materials</li>';
        $html .= '<li>Great value for the features and quality provided</li>';
        $html .= '<li>Intuitive and user-friendly design</li>';
        $html .= '<li>Strong ecosystem and accessory support</li>';
        $html .= '<li>Regular software updates and improvements</li>';
        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        // Cons column
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-danger h-100">';
        $html .= '<div class="card-header bg-danger text-white">';
        $html .= '<h4 class="mb-0"><i class="bi bi-x-circle me-2"></i>Cons</h4>';
        $html .= '</div>';
        $html .= '<div class="card-body">';
        $html .= '<ul class="cons-list mb-0">';

        switch ($badge) {
            case 'Our Top Pick':
                $html .= '<li>Higher price than budget competitors</li>';
                $html .= '<li>Limited color and configuration options</li>';
                $html .= '<li>Some features have a learning curve</li>';
                break;
            case 'Budget Pick':
                $html .= '<li>Uses more plastic in construction</li>';
                $html .= '<li>Missing some premium features</li>';
                $html .= '<li>Shorter warranty period</li>';
                break;
            case 'Upgrade Pick':
                $html .= '<li>Premium pricing limits accessibility</li>';
                $html .= '<li>May be overkill for basic users</li>';
                $html .= '<li>Heavier and bulkier than alternatives</li>';
                break;
        }

        $html .= '</ul>';
        $html .= '</div>';
        $html .= '</div>';
        $html .= '</div>';

        $html .= '</div>'; // End pros-cons row

        // Bottom line
        $html .= '<h3>The Bottom Line</h3>';
        $html .= '<p><strong>' . htmlspecialchars($badge, ENT_QUOTES, 'UTF-8') . ':</strong> ';
        $html .= 'The ' . $titleEscaped . ' earned this distinction through rigorous testing and comparison. ';
        $html .= 'After evaluating dozens of alternatives, it consistently delivered the best experience in its category. ';
        $html .= 'Whether you\'re upgrading or buying for the first time, this is a purchase you can feel confident about.</p>';

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
