<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

#[AsCommand(
    name: 'app:test-api',
    description: 'Debug ProfitShare API connection using raw CURL',
)]
class TestApiCommand extends Command
{
    public function __construct(
        #[Autowire(env: 'PROFITSHARE_USER')] private string $apiUser,
        #[Autowire(env: 'PROFITSHARE_KEY')] private string $apiKey
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $output->writeln("--- STARTING RAW CURL DEBUG ---");

        $apiUser = trim($this->apiUser);
        $apiKey = trim($this->apiKey);

        // 1. Настройка на променливите точно както в примера им
        $date = gmdate('D, d M Y H:i:s T');

        // ОПИТ 1: Точно както е в документацията (с въпросителна)
        $url = 'http://api.profitshare.bg/affiliate-advertisers/?';
        $query_string = '';

        // Формула: GET + affiliate-advertisers/? + query + / + user + date
        $signature_string = 'GETaffiliate-advertisers/?' . $query_string . '/' . $apiUser . $date;

        $auth = hash_hmac('sha1', $signature_string, $apiKey);

        $output->writeln("Signature String: " . $signature_string);
        $output->writeln("Auth Hash: " . $auth);
        $output->writeln("Date Header: " . $date);

        // 2. Изпълнение с чист CURL
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, true); // Искаме да видим хедърите на отговора

        $headers = [
            "Date: {$date}",
            "X-PS-Client: {$apiUser}",
            "X-PS-Accept: json",
            "X-PS-Auth: {$auth}",
            "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
        ];

        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $response = curl_exec($ch);
        $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

        curl_close($ch);

        $output->writeln("\nHTTP Code: " . $httpCode);
        $output->writeln("Response:\n" . $response);

        if ($httpCode == 200) {
            $output->writeln("\n✅ SUCCESS! CURL работи. Проблемът е бил в HttpClient.");
        } else {
            $output->writeln("\n❌ FAIL. Проблемът е в данните или логиката на подписа.");
        }

        return Command::SUCCESS;
    }
}
