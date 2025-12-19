<?php

namespace App\Command;

use App\Service\CategoryDetector;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:update-categories',
    description: 'Update category field for all existing products'
)]
class UpdateCategoriesCommand extends Command
{
    public function __construct(
        private Connection $connection
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $io->title('🔄 Updating product categories');

        // Get all products
        $products = $this->connection->fetchAllAssociative(
            'SELECT id, title, category FROM review'
        );

        $io->text(sprintf('Found %d products to update', count($products)));

        $updated = 0;
        $alreadySet = 0;

        foreach ($products as $product) {
            // Skip if category already set
            if (!empty($product['category']) && $product['category'] !== 'other') {
                $alreadySet++;
                continue;
            }

            // Detect category from title
            $category = CategoryDetector::detectCategory($product['title']);

            // Update database
            $this->connection->update('review', [
                'category' => $category
            ], [
                'id' => $product['id']
            ]);

            $updated++;

            if ($updated % 50 === 0) {
                $io->text(sprintf('Updated %d products...', $updated));
            }
        }

        $io->success(sprintf(
            '✅ Updated %d products, %d already had categories',
            $updated,
            $alreadySet
        ));

        // Show category statistics
        $stats = $this->connection->fetchAllAssociative(
            'SELECT category, COUNT(*) as count FROM review GROUP BY category ORDER BY count DESC'
        );

        $io->section('📊 Category Statistics:');
        $io->table(['Category', 'Count'], array_map(function($row) {
            return [
                CategoryDetector::getCategoryName($row['category']),
                $row['count']
            ];
        }, $stats));

        return Command::SUCCESS;
    }
}
