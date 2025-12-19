<?php

namespace App\Command;

use App\Repository\ReviewRepository;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

#[AsCommand(
    name: 'app:generate-sitemap',
    description: 'Generate sitemap.xml for all published reviews'
)]
class GenerateSitemapCommand extends Command
{
    public function __construct(
        private ReviewRepository $reviewRepository,
        private UrlGeneratorInterface $urlGenerator,
        private string $projectDir
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('🗺️  Generating sitemap.xml');

        // Get all published reviews
        $reviews = $this->reviewRepository->findBy(['isPublished' => true], ['createdAt' => 'DESC']);

        $io->text(sprintf('Found %d published reviews', count($reviews)));

        // Start XML
        $xml = new \DOMDocument('1.0', 'UTF-8');
        $xml->formatOutput = true;

        // Create urlset element
        $urlset = $xml->createElement('urlset');
        $urlset->setAttribute('xmlns', 'http://www.sitemaps.org/schemas/sitemap/0.9');
        $urlset->setAttribute('xmlns:image', 'http://www.google.com/schemas/sitemap-image/1.1');
        $xml->appendChild($urlset);

        // Add homepage
        $url = $xml->createElement('url');
        $loc = $xml->createElement('loc', $this->urlGenerator->generate('app_home', [], UrlGeneratorInterface::ABSOLUTE_URL));
        $url->appendChild($loc);
        $changefreq = $xml->createElement('changefreq', 'daily');
        $url->appendChild($changefreq);
        $priority = $xml->createElement('priority', '1.0');
        $url->appendChild($priority);
        $lastmod = $xml->createElement('lastmod', (new \DateTime())->format('Y-m-d'));
        $url->appendChild($lastmod);
        $urlset->appendChild($url);

        // Add compare prices page
        $url = $xml->createElement('url');
        $loc = $xml->createElement('loc', $this->urlGenerator->generate('app_compare_prices', [], UrlGeneratorInterface::ABSOLUTE_URL));
        $url->appendChild($loc);
        $changefreq = $xml->createElement('changefreq', 'daily');
        $url->appendChild($changefreq);
        $priority = $xml->createElement('priority', '0.9');
        $url->appendChild($priority);
        $urlset->appendChild($url);

        // Add search page
        $url = $xml->createElement('url');
        $loc = $xml->createElement('loc', $this->urlGenerator->generate('app_search', [], UrlGeneratorInterface::ABSOLUTE_URL));
        $url->appendChild($loc);
        $changefreq = $xml->createElement('changefreq', 'daily');
        $url->appendChild($changefreq);
        $priority = $xml->createElement('priority', '0.8');
        $url->appendChild($priority);
        $urlset->appendChild($url);

        // Add each review
        foreach ($reviews as $review) {
            $url = $xml->createElement('url');

            // Product URL
            $loc = $xml->createElement('loc',
                $this->urlGenerator->generate('app_review_show',
                    ['slug' => $review->getSlug()],
                    UrlGeneratorInterface::ABSOLUTE_URL
                )
            );
            $url->appendChild($loc);

            // Last modification date
            $lastModDate = $review->getUpdatedAt() ?? $review->getCreatedAt();
            $lastmod = $xml->createElement('lastmod', $lastModDate->format('Y-m-d'));
            $url->appendChild($lastmod);

            // Change frequency
            $changefreq = $xml->createElement('changefreq', 'weekly');
            $url->appendChild($changefreq);

            // Priority (higher for newer products)
            $priority = $xml->createElement('priority', '0.8');
            $url->appendChild($priority);

            // Add product image if available
            if ($review->getImageUrl()) {
                $imageImage = $xml->createElement('image:image');
                $imageLoc = $xml->createElement('image:loc', htmlspecialchars($review->getImageUrl()));
                $imageImage->appendChild($imageLoc);

                $imageTitle = $xml->createElement('image:title', htmlspecialchars($review->getTitle()));
                $imageImage->appendChild($imageTitle);

                if ($review->getMetaDescription()) {
                    $imageCaption = $xml->createElement('image:caption',
                        htmlspecialchars(substr($review->getMetaDescription(), 0, 256))
                    );
                    $imageImage->appendChild($imageCaption);
                }

                $url->appendChild($imageImage);
            }

            $urlset->appendChild($url);
        }

        // Save to public directory
        $sitemapPath = $this->projectDir . '/public/sitemap.xml';
        $xml->save($sitemapPath);

        $io->success(sprintf('✅ Sitemap generated successfully with %d URLs!', count($reviews) + 3));
        $io->text('Location: ' . $sitemapPath);
        $io->text('URL: /sitemap.xml');

        return Command::SUCCESS;
    }
}
