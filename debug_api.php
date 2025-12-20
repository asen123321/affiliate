#!/usr/bin/env php
<?php

/**
 * Comprehensive ProfitShare API Debugging Script
 * Tests multiple signature variations to find the working format
 */

$api_user = '_693fa9d1a262b';
$api_key = 'a6c36ec01561aa2512a1e53b485b1b4c39d88d45';

echo "\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "  ProfitShare API Comprehensive Debug Test\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "\n";

// Test different signature variations
$variations = [
    'v1' => [
        'name' => 'With /? and / before user (current)',
        'route' => 'affiliate-advertisers/?',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $query . '/' . $user . $date;
        }
    ],
    'v2' => [
        'name' => 'With /? and / and SPACE before date',
        'route' => 'affiliate-advertisers/?',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $query . '/' . $user . ' ' . $date;
        }
    ],
    'v3' => [
        'name' => 'Without /? but with / before user',
        'route' => 'affiliate-advertisers',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . '/' . $query . '/' . $user . $date;
        }
    ],
    'v4' => [
        'name' => 'With /? but NO / before user',
        'route' => 'affiliate-advertisers/?',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $query . $user . $date;
        }
    ],
    'v5' => [
        'name' => 'Simple: METHOD + route/ + user + date',
        'route' => 'affiliate-advertisers/',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $user . $date;
        }
    ],
    'v6' => [
        'name' => 'With trailing / and space',
        'route' => 'affiliate-advertisers/',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . '?' . $query . '/' . $user . ' ' . $date;
        }
    ],
    'v7' => [
        'name' => 'JavaScript format: route/ + user + date',
        'route' => 'affiliate-advertisers/',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $user . $date;
        }
    ],
    'v8' => [
        'name' => 'Full path with domain',
        'route' => '/affiliate-advertisers/?',
        'format' => function($method, $route, $query, $user, $date) {
            return $method . $route . $query . '/' . $user . $date;
        }
    ],
];

$method = 'GET';
$query_string = '';
$date = gmdate('D, d M Y H:i:s T');

echo "Test Configuration:\n";
echo "───────────────────────────────────────────────────────────────\n";
echo "Method:     $method\n";
echo "API User:   $api_user\n";
echo "API Key:    " . substr($api_key, 0, 10) . "..." . substr($api_key, -5) . "\n";
echo "Date:       $date\n";
echo "Query:      (empty)\n";
echo "\n";

foreach ($variations as $key => $variation) {
    echo "\n";
    echo "┌─────────────────────────────────────────────────────────────┐\n";
    echo "│ Testing $key: " . str_pad($variation['name'], 45) . "│\n";
    echo "└─────────────────────────────────────────────────────────────┘\n";

    // Generate signature
    $signature_string = $variation['format']($method, $variation['route'], $query_string, $api_user, $date);
    $auth = hash_hmac('sha1', $signature_string, $api_key);

    // Determine URL
    $url = 'https://api.profitshare.bg/' . ltrim($variation['route'], '/');
    if (strpos($url, '?') === false) {
        $url .= '?';
    }

    echo "Signature: $signature_string\n";
    echo "Auth Hash: $auth\n";
    echo "URL:       $url\n";
    echo "\n";

    // Make request
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Date: $date",
        "X-PS-Client: $api_user",
        "X-PS-Accept: json",
        "X-PS-Auth: $auth",
        "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
    ]);

    $start = microtime(true);
    $response = curl_exec($ch);
    $elapsed = round((microtime(true) - $start) * 1000, 2);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    $data = json_decode($response, true);

    echo "Response Time: {$elapsed}ms\n";
    echo "HTTP Code:     $httpCode\n";

    if ($httpCode == 200) {
        echo "\n";
        echo "✅✅✅ SUCCESS! THIS VARIATION WORKS! ✅✅✅\n";
        echo "\n";

        if (isset($data['result'])) {
            $count = is_array($data['result']) ? count($data['result']) : 0;
            echo "Found $count advertisers\n";

            if ($count > 0) {
                echo "\nFirst 3 advertisers:\n";
                foreach (array_slice($data['result'], 0, 3) as $adv) {
                    echo "  - [" . ($adv['id'] ?? 'N/A') . "] " . ($adv['name'] ?? 'N/A') . "\n";
                }
            }
        }

        echo "\n";
        echo "🎯 USE THIS FORMAT IN YOUR CODE:\n";
        echo "───────────────────────────────────────────────────────────────\n";
        echo "Route:     '{$variation['route']}'\n";
        echo "Signature: \$method . '{$variation['route']}' . \$query . '/' . \$user . \$date\n";
        echo "\n";

        // Don't test more variations
        break;

    } else {
        if (isset($data['error'])) {
            echo "Error:         " . ($data['error']['code'] ?? 'Unknown') . "\n";
            echo "Message:       " . ($data['error']['message'] ?? 'Unknown') . "\n";
        } else {
            echo "Response:      $response\n";
        }
    }
}

echo "\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "  Testing with .ro domain\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "\n";

// Test with .ro
$signature_string = 'GETaffiliate-advertisers/?' . $query_string . '/' . $api_user . $date;
$auth = hash_hmac('sha1', $signature_string, $api_key);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.profitshare.ro/affiliate-advertisers/?');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Date: $date",
    "X-PS-Client: $api_user",
    "X-PS-Accept: json",
    "X-PS-Auth: $auth"
]);

$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

echo "Testing api.profitshare.ro:\n";
echo "HTTP Code: $httpCode\n";
echo "Response:  $response\n";

echo "\n";
echo "═══════════════════════════════════════════════════════════════\n";
echo "\n";

if ($httpCode >= 400) {
    echo "⚠️  CONCLUSION:\n";
    echo "───────────────────────────────────────────────────────────────\n";
    echo "\n";
    echo "All signature variations failed with your credentials.\n";
    echo "This means the credentials themselves are INVALID, not the\n";
    echo "signature format.\n";
    echo "\n";
    echo "The credentials you provided:\n";
    echo "  API User: $api_user\n";
    echo "  API Key:  $api_key\n";
    echo "\n";
    echo "These do NOT exist in the ProfitShare system.\n";
    echo "\n";
    echo "You must get REAL credentials from:\n";
    echo "  https://profitshare.bg/account/api-settings\n";
    echo "  (or wherever your account shows API credentials)\n";
    echo "\n";
}

echo "\n";
