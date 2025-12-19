<?php

namespace App\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Psr\Log\LoggerInterface;

#[AsCommand(
    name: 'app:test-connection',
    description: 'Debug Docker environment and ProfitShare API connection',
)]
class TestConnectionCommand extends Command
{
    public function __construct(
        private LoggerInterface $logger
    ) {
        parent::__construct();
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $io->title('🔍 ProfitShare API Connection Debugger');

        // 1. Environment Variables
        $io->section('📋 Step 1: Environment Variables');

        $apiUser = $_ENV['PROFITSHARE_USER'] ?? 'NOT SET';
        $apiKey = $_ENV['PROFITSHARE_KEY'] ?? 'NOT SET';

        $io->table(
            ['Variable', 'Value', 'Status'],
            [
                ['PROFITSHARE_USER', substr($apiUser, 0, 20) . '...', $apiUser !== 'NOT SET' ? '✅' : '❌'],
                ['PROFITSHARE_KEY', substr($apiKey, 0, 20) . '...', $apiKey !== 'NOT SET' ? '✅' : '❌'],
                ['Length', strlen($apiUser), strlen($apiUser) > 0 ? '✅' : '❌'],
                ['Key Length', strlen($apiKey), strlen($apiKey) > 0 ? '✅' : '❌'],
            ]
        );

        if ($apiUser === 'NOT SET' || $apiKey === 'NOT SET') {
            $io->error('API credentials not set in environment!');
            $io->note('Check .env file and restart PHP container');
            return Command::FAILURE;
        }

        // 2. Time Synchronization
        $io->section('⏰ Step 2: Time Synchronization Check');

        $dockerTime = time();
        $dockerDate = gmdate('D, d M Y H:i:s T', $dockerTime);
        $dockerTimestamp = date('Y-m-d H:i:s', $dockerTime);

        $io->table(
            ['Time Info', 'Value'],
            [
                ['Docker Unix Timestamp', $dockerTime],
                ['Docker GMT Date', $dockerDate],
                ['Docker Local Time', $dockerTimestamp],
                ['PHP Timezone', date_default_timezone_get()],
                ['System Time (exec)', exec('date "+%Y-%m-%d %H:%M:%S %Z"')],
            ]
        );

        // 3. Test API Request
        $io->section('🌐 Step 3: Test API Request');

        $route = 'affiliate-advertisers';
        $method = 'GET';
        $queryString = '';

        // Build signature EXACTLY as documentation says
        $date = gmdate('D, d M Y H:i:s T');

        // Try multiple signature formats
        $signatures = [
            'format1' => [
                'signature_string' => "{$method}{$route}/?{$queryString}/{$apiUser} {$date}",
                'description' => 'With space before date'
            ],
            'format2' => [
                'signature_string' => "{$method}{$route}/?{$queryString}/{$apiUser}{$date}",
                'description' => 'Without space before date'
            ],
            'format3' => [
                'signature_string' => "{$method}{$route}/{$queryString}/{$apiUser} {$date}",
                'description' => 'Without /? in route'
            ],
        ];

        foreach ($signatures as $format => $data) {
            $signatureString = $data['signature_string'];
            $auth = hash_hmac('sha1', $signatureString, $apiKey);

            $io->text(sprintf("\n<comment>Testing %s:</comment> %s", $format, $data['description']));
            $io->text("Signature string: <info>{$signatureString}</info>");
            $io->text("HMAC-SHA1: <info>{$auth}</info>");

            // Test the request
            $url = "http://api.profitshare.bg/{$route}/";

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_HEADER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Date: {$date}",
                "X-PS-Client: {$apiUser}",
                "X-PS-Accept: json",
                "X-PS-Auth: {$auth}",
                "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
            ]);

            $response = curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            $headerSize = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
            $headers = substr($response, 0, $headerSize);
            $body = substr($response, $headerSize);
            curl_close($ch);

            if ($httpCode == 200) {
                $io->success("✅ {$format} WORKS! HTTP {$httpCode}");
                $data = json_decode($body, true);
                if (isset($data['result'])) {
                    $io->text(sprintf("Found %d advertisers", count($data['result'])));
                }

                // Show the winning format
                $io->section('✨ WORKING SIGNATURE FORMAT FOUND!');
                $io->text([
                    "Signature string format: <info>{$signatureString}</info>",
                    "",
                    "Use this format in ProfitShareService:",
                    "  \$signatureString = \"{$method}{$route}/?\{$queryString}/{\$this->apiUser} {\$date}\";",
                ]);

                return Command::SUCCESS;
            } else {
                $io->error("❌ {$format} FAILED: HTTP {$httpCode}");
                $io->text("Response body: " . substr($body, 0, 200));
            }
        }

        // 4. Raw cURL test
        $io->section('🔧 Step 4: Raw cURL Debug');

        $date = gmdate('D, d M Y H:i:s T');
        $signatureString = "{$method}{$route}/?/{$apiUser} {$date}";
        $auth = hash_hmac('sha1', $signatureString, $apiKey);

        $curlCommand = sprintf(
            'curl -v -X GET "%s" \\\n' .
            '  -H "Date: %s" \\\n' .
            '  -H "X-PS-Client: %s" \\\n' .
            '  -H "X-PS-Accept: json" \\\n' .
            '  -H "X-PS-Auth: %s" \\\n' .
            '  -H "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"',
            "http://api.profitshare.bg/{$route}/",
            $date,
            $apiUser,
            $auth
        );

        $io->text("Test this command manually:\n");
        $io->text("<comment>{$curlCommand}</comment>");

        // 5. Suggestions
        $io->section('💡 Troubleshooting Suggestions');

        $io->listing([
            'Check if API credentials are correct (not test/example)',
            'Verify credentials at: https://profitshare.bg → Account Settings → API',
            'Ensure no spaces/newlines in .env values',
            'Check if time is synchronized (max 20 seconds difference allowed)',
            'Try running: docker exec affiliate-site-php-1 date',
            'Restart PHP container after changing .env: docker-compose restart php',
        ]);

        $io->error('All signature formats failed. Check API credentials.');

        return Command::FAILURE;
    }
}
