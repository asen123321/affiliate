<?php

namespace App\Command;

use App\Service\ProfitShareService;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:link',
    description: 'Generates an affiliate link for any eMAG product',
)]
class GenerateLinkCommand extends Command
{
    public function __construct(private ProfitShareService $ps)
    {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'The eMAG product URL');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = $input->getArgument('url');

        $io->title('🔗 Affiliate Link Generator');
        $io->text("Processing: $url");

        // ID 35 е за eMAG България
        $affiliateLink = $this->ps->generateAffiliateLink('35', $url, 'MyLink');

        if ($affiliateLink) {
            $io->success('✅ Here is your Money Link:');
            $io->block($affiliateLink, null, 'fg=black;bg=green', ' ', true);
            $io->note('Copy and paste this link anywhere! If someone buys, you get paid.');
        } else {
            $io->error('❌ Failed to generate link. Check logs.');
        }

        return Command::SUCCESS;
    }
}
