#!/usr/bin/env php
<?php

/**
 * ProfitShare API Credentials Test Script
 *
 * This script tests your ProfitShare API credentials without needing
 * to run the full Symfony application.
 *
 * Usage:
 *   php test_credentials.php YOUR_API_USER YOUR_API_KEY
 *
 * Example:
 *   php test_credentials.php _693fa9d1a262b a6c36ec01561aa2512a1e53b485b1b4c39d88d45
 */

if ($argc < 3) {
    echo "\n";
    echo "Example:\n";
    echo "  php test_credentials.php _693fa9d1a262b a6c36ec01561aa2512a1e53b485b1b4c39d88d45\n";
    echo "\n";
    exit(1);
}

$api_user = $argv[1];
$api_key = $argv[2];

echo "\n";
echo "╔════════════════════════════════════════════════════════════════╗\n";
echo "║          ProfitShare API Credentials Test                     ║\n";
echo "╚════════════════════════════════════════════════════════════════╝\n";
echo "\n";

// Test configuration
$url = 'https://api.profitshare.bg/affiliate-advertisers/?';
$query_string = '';
$date = gmdate('D, d M Y H:i:s T');

// Generate signature
$signature_string = 'GETaffiliate-advertisers/?' . $query_string . '/' . $api_user . $date;
$auth = hash_hmac('sha1', $signature_string, $api_key);

echo "📋 Test Configuration:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  URL:         $url\n";
echo "  API User:    $api_user\n";
echo "  API Key:     " . substr($api_key, 0, 10) . "..." . substr($api_key, -5) . "\n";
echo "  Key Length:  " . strlen($api_key) . " characters\n";
echo "  Date:        $date\n";
echo "\n";

echo "🔐 Signature Details:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo "  Signature String:\n";
echo "    $signature_string\n";
echo "\n";
echo "  HMAC-SHA1 Hash:\n";
echo "    $auth\n";
echo "\n";

echo "📡 Making API Request...\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

// Make request
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Date: $date",
    "X-PS-Client: $api_user",
    "X-PS-Accept: json",
    "X-PS-Auth: $auth",
    "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
]);

$start_time = microtime(true);
$response = curl_exec($ch);
$elapsed = round((microtime(true) - $start_time) * 1000, 2);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "  Response Time: {$elapsed}ms\n";
echo "  HTTP Code:     $httpCode\n";
echo "\n";

// Parse response
$data = json_decode($response, true);

if ($httpCode == 200) {
    echo "✅ SUCCESS - Credentials are VALID!\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

    if (isset($data['result']) && is_array($data['result'])) {
        $count = count($data['result']);
        echo "  Found $count advertisers\n\n";

        if ($count > 0) {
            echo "📊 Sample Advertisers:\n";
            echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

            foreach (array_slice($data['result'], 0, 5) as $advertiser) {
                $id = $advertiser['id'] ?? 'N/A';
                $name = $advertiser['name'] ?? 'N/A';
                $category = $advertiser['category'] ?? 'N/A';
                $active = ($advertiser['affiliate_statuses']['active'] ?? 'no') === 'yes' ? '✓' : '✗';
                $approved = ($advertiser['affiliate_statuses']['approved'] ?? 'no') === 'yes' ? '✓' : '✗';

                echo sprintf("  [%s] %s\n", str_pad($id, 4), $name);
                echo sprintf("       Category: %s | Active: %s | Approved: %s\n", $category, $active, $approved);
                echo "\n";
            }

            if ($count > 5) {
                echo "  ... and " . ($count - 5) . " more advertisers\n\n";
            }
        }
    }

    echo "\n";
    echo "🎉 Next Steps:\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "  1. Update your .env file with these credentials:\n";
    echo "     PROFITSHARE_USER=$api_user\n";
    echo "     PROFITSHARE_KEY=$api_key\n";
    echo "\n";
    echo "  2. Restart Docker:\n";
    echo "     docker compose down && docker compose up -d\n";
    echo "\n";
    echo "  3. Test the integration:\n";
    echo "     docker exec affiliate-site-php-1 php bin/console app:discover-profitshare\n";
    echo "\n";

} else {
    echo "❌ FAILED - Credentials are INVALID\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

    if (isset($data['error'])) {
        $errorCode = $data['error']['code'] ?? 'Unknown';
        $errorMessage = $data['error']['message'] ?? 'Unknown error';

        echo "  Error Code:    $errorCode\n";
        echo "  Error Message: $errorMessage\n";
        echo "\n";

        // Provide specific guidance based on error
        echo "🔍 Troubleshooting:\n";
        echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";

        switch ($errorCode) {
            case 'InvalidSignature':
                echo "  • The API Key or API User is incorrect\n";
                echo "  • Check your ProfitShare account for correct credentials\n";
                echo "  • Make sure you're copying the complete API Key\n";
                break;

            case 'InvalidClient':
                echo "  • The API User is not registered in ProfitShare\n";
                echo "  • Log in to your ProfitShare account\n";
                echo "  • Navigate to Settings > API\n";
                echo "  • Generate or copy your API User\n";
                break;

            case 'AuthTimeDifference':
                echo "  • Your system time is not synchronized\n";
                echo "  • Current system time: $date\n";
                echo "  • Synchronize your system clock with NTP\n";
                break;

            default:
                echo "  • Unknown error occurred\n";
                echo "  • Contact ProfitShare support for assistance\n";
                break;
        }

        echo "\n";
    }

    echo "\n";
    echo "💡 How to Get Valid Credentials:\n";
    echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
    echo "  1. Log in to https://profitshare.bg\n";
    echo "  2. Go to your Affiliate Account Settings\n";
    echo "  3. Find the API or Developer section\n";
    echo "  4. Copy your API User and API Key\n";
    echo "  5. Run this script again with the correct credentials\n";
    echo "\n";
}

echo "Full Response:\n";
echo "━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━━\n";
echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
echo "\n\n";
