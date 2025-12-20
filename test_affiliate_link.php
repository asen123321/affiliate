<?php

require __DIR__ . '/vendor/autoload.php';

use App\Kernel;
use Symfony\Component\Dotenv\Dotenv;

// Load environment variables
$dotenv = new Dotenv();
$dotenv->load(__DIR__ . '/.env');

// Boot Symfony kernel
$kernel = new Kernel('dev', true);
$kernel->boot();
$container = $kernel->getContainer();

// Get ProfitShareService
$profitShareService = $container->get('App\Service\ProfitShareService');

echo "Testing ProfitShare API...\n\n";

// Test 1: Find eMAG advertiser ID
echo "1. Finding eMAG advertiser ID...\n";
try {
    $emagId = $profitShareService->findAdvertiserId('eMAG');
    echo "   ✓ eMAG Advertiser ID: " . ($emagId ?? 'NOT FOUND') . "\n\n";
} catch (\Exception $e) {
    echo "   ✗ Error: " . $e->getMessage() . "\n\n";
}

// Test 2: Generate affiliate link
echo "2. Generating affiliate link for http://www.emag.ro/...\n";
try {
    $testUrl = 'http://www.emag.ro/telefoane-mobile/c';
    $affiliateLink = $profitShareService->generateAffiliateLink($testUrl, 'test-link');

    if ($affiliateLink) {
        echo "   ✓ Generated link: {$affiliateLink}\n\n";
    } else {
        echo "   ✗ Failed to generate link (returned null)\n\n";
    }
} catch (\Exception $e) {
    echo "   ✗ Error: " . $e->getMessage() . "\n\n";
}

echo "Test completed!\n";
