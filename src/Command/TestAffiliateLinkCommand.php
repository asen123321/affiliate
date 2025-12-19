<?php

namespace App\Command;

use App\Service\ProfitShareService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:test-affiliate-link',
    description: 'Test ProfitShare API affiliate link generation',
)]
class TestAffiliateLinkCommand extends Command
{
    public function __construct(
        private ProfitShareService $profitShareService
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('Testing ProfitShare API');

        // Test 1: Find eMAG advertiser ID
        $io->section('1. Finding eMAG Advertiser ID');
        try {
            $emagId = $this->profitShareService->findAdvertiserId('eMAG');
            if ($emagId) {
                $io->success("eMAG Advertiser ID: {$emagId}");
            } else {
                $io->error('eMAG Advertiser not found');
            }
        } catch (\Exception $e) {
            $io->error('Failed to fetch advertisers: ' . $e->getMessage());
        }

        // Test 2: Generate affiliate link
        $io->section('2. Generating Affiliate Link');
        $testUrl = 'http://www.emag.ro/telefoane-mobile/c';
        $io->text("Testing URL: {$testUrl}");

        try {
            $affiliateLink = $this->profitShareService->generateAffiliateLink($testUrl, 'test-link');

            if ($affiliateLink) {
                $io->success("Generated affiliate link: {$affiliateLink}");
            } else {
                $io->error('Failed to generate affiliate link (returned null)');
                $io->note('Check the logs in var/log/dev.log for more details');
            }
        } catch (\Exception $e) {
            $io->error('Exception: ' . $e->getMessage());
        }

        $io->success('Test completed!');

        return Command::SUCCESS;
    }
}
