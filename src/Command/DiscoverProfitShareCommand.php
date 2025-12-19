<?php

namespace App\Command;

use App\Service\ProfitShareService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:discover-profitshare',
    description: 'Discover ProfitShare advertisers and their product categories',
)]
class DiscoverProfitShareCommand extends Command
{
    public function __construct(
        private ProfitShareService $profitShareService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('advertiser', 'a', InputOption::VALUE_OPTIONAL, 'Filter by advertiser name (e.g., eMAG)', null)
            ->addOption('products', 'p', InputOption::VALUE_NONE, 'Also fetch product samples')
            ->addOption('limit', 'l', InputOption::VALUE_OPTIONAL, 'Limit number of products to show', 10);
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $advertiserFilter = $input->getOption('advertiser');
        $showProducts = $input->getOption('products');
        $productLimit = (int) $input->getOption('limit');

        $io->title('🔍 ProfitShare Discovery Tool');

        // Step 1: Discover Advertisers
        $io->section('📊 Step 1: Discovering Advertisers');

        try {
            $data = $this->profitShareService->request('GET', 'affiliate-advertisers');
            $advertisers = $data['result'] ?? [];

            if (empty($advertisers)) {
                $io->warning('No advertisers found. Check your API credentials.');
                return Command::FAILURE;
            }

            $io->success(sprintf('Found %d advertisers', count($advertisers)));

            // Filter advertisers if needed
            if ($advertiserFilter) {
                $advertisers = array_filter($advertisers, function($adv) use ($advertiserFilter) {
                    return stripos($adv['name'], $advertiserFilter) !== false;
                });
                $io->info(sprintf('Filtered to %d advertisers matching "%s"', count($advertisers), $advertiserFilter));
            }

            // Display advertisers in a table
            $table = [];
            foreach ($advertisers as $advertiser) {
                $table[] = [
                    $advertiser['id'] ?? 'N/A',
                    $advertiser['name'] ?? 'N/A',
                    $advertiser['category'] ?? 'N/A',
                    $advertiser['url'] ?? 'N/A',
                    isset($advertiser['affiliate_statuses']['active'])
                        ? ($advertiser['affiliate_statuses']['active'] === 'yes' ? '✅' : '❌')
                        : '?',
                    isset($advertiser['affiliate_statuses']['approved'])
                        ? ($advertiser['affiliate_statuses']['approved'] === 'yes' ? '✅' : '❌')
                        : '?',
                ];
            }

            $io->table(
                ['ID', 'Name', 'Category', 'URL', 'Active', 'Approved'],
                $table
            );

            // Step 2: Fetch Products if requested
            if ($showProducts && !empty($advertisers)) {
                $io->section('📦 Step 2: Fetching Product Samples');

                foreach ($advertisers as $advertiser) {
                    $advertiserId = $advertiser['id'];
                    $advertiserName = $advertiser['name'];

                    $io->info(sprintf('Fetching products for: %s (ID: %s)', $advertiserName, $advertiserId));

                    try {
                        $productsData = $this->profitShareService->getProducts((int)$advertiserId, 1);

                        if (!$productsData || empty($productsData['products'])) {
                            $io->note('No products found for this advertiser');
                            continue;
                        }

                        $products = array_slice($productsData['products'], 0, $productLimit);
                        $totalProducts = $productsData['total_pages'] * $productsData['records_per_page'];

                        $io->success(sprintf(
                            'Found ~%d total products (showing %d)',
                            $totalProducts,
                            count($products)
                        ));

                        // Display products
                        $productTable = [];
                        foreach ($products as $product) {
                            $productTable[] = [
                                substr($product['name'] ?? 'N/A', 0, 50) . '...',
                                $product['price_vat'] ?? 'N/A',
                                $product['category_name'] ?? 'N/A',
                                isset($product['image']) ? '✅' : '❌',
                            ];
                        }

                        $io->table(
                            ['Product Name', 'Price (VAT)', 'Category', 'Has Image'],
                            $productTable
                        );

                        // Show pagination info
                        $io->text(sprintf(
                            '📄 Pagination: Page %d of %d (Records per page: %d)',
                            $productsData['current_page'] ?? 1,
                            $productsData['total_pages'] ?? 1,
                            $productsData['records_per_page'] ?? 20
                        ));

                        // Extract unique categories
                        $categories = array_unique(array_column($products, 'category_name'));
                        $io->text(sprintf('📂 Categories found: %s', implode(', ', $categories)));

                    } catch (\Exception $e) {
                        $io->error('Failed to fetch products: ' . $e->getMessage());
                    }

                    $io->newLine();
                }
            }

            // Show usage examples
            $io->section('💡 Next Steps');

            if (!empty($advertisers)) {
                $firstAdvertiser = reset($advertisers);
                $advertiserId = $firstAdvertiser['id'];

                $io->text([
                    'Use the advertiser ID(s) above to scrape products:',
                    '',
                    sprintf('  <info>php bin/console app:scrape-emag --advertiser=%s</info>', $advertiserId),
                    '',
                    'Or to see products for a specific advertiser:',
                    '',
                    sprintf('  <info>php bin/console app:discover-profitshare -a "eMAG" --products</info>'),
                ]);
            }

            return Command::SUCCESS;

        } catch (\Exception $e) {
            $io->error('Failed to discover advertisers: ' . $e->getMessage());
            $io->note([
                'Common issues:',
                '1. Invalid API credentials in .env',
                '2. Time not synchronized (must be within 20 seconds)',
                '3. Network connectivity issues',
                '',
                'Check logs: docker exec affiliate-site-php-1 tail -f var/log/dev.log'
            ]);
            return Command::FAILURE;
        }
    }
}
