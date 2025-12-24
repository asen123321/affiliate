<?php

namespace App\Command;

use App\Repository\ProductRepository;
use App\Service\CategoryMappingService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:migrate-categories',
    description: 'Migrate existing products to use the new Category system'
)]
class MigrateCategoriesCommand extends Command
{
    public function __construct(
        private ProductRepository $productRepository,
        private CategoryMappingService $categoryMappingService,
        private EntityManagerInterface $em
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('🔄 Migrating Products to New Category System');

        // Get all products without a category
        $products = $this->productRepository->createQueryBuilder('p')
            ->where('p.category IS NULL')
            ->getQuery()
            ->getResult();

        $total = count($products);
        $io->text("Found $total products without categories");

        if ($total === 0) {
            $io->success('All products already have categories!');
            return Command::SUCCESS;
        }

        $io->section('Mapping products to categories...');

        $mapped = 0;
        $unmapped = 0;
        $progressBar = $io->createProgressBar($total);
        $progressBar->start();

        foreach ($products as $product) {
            // Try to map based on product name
            $productName = $product->getName();

            // Use the CategoryMappingService to find the best matching category
            $category = $this->categoryMappingService->findLocalCategory($productName);

            if ($category) {
                $product->setCategory($category);
                $mapped++;
            } else {
                $unmapped++;
            }

            $progressBar->advance();
        }

        $progressBar->finish();
        $io->newLine(2);

        // Flush all changes
        $this->em->flush();

        // Summary
        $io->section('📊 Summary');
        $io->table(
            ['Metric', 'Count'],
            [
                ['Total products processed', $total],
                ['Successfully mapped', $mapped],
                ['Unmapped (assigned to fallback)', $unmapped],
            ]
        );

        if ($mapped > 0) {
            $io->success("✅ Successfully migrated $mapped products to categories!");
        } else {
            $io->warning('No products were mapped to categories.');
        }

        return Command::SUCCESS;
    }
}
