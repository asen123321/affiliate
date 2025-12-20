<?php
require __DIR__ . '/vendor/autoload.php';

// Взимаме променливите от средата
$user = $_SERVER['PROFITSHARE_USER'] ?? $_ENV['PROFITSHARE_USER'] ?? 'MISSING';
$key = $_SERVER['PROFITSHARE_KEY'] ?? $_ENV['PROFITSHARE_KEY'] ?? 'MISSING';

echo "--- DEBUG KEYS ---\n";
echo "User: [" . $user . "] (Length: " . strlen($user) . ")\n";
echo "Key:  [" . $key . "]  (Length: " . strlen($key) . ")\n";

// Проверка за скрити символи в ключа
echo "Key Hex Dump: ";
for ($i = 0; $i < strlen($key); $i++) {
    echo dechex(ord($key[$i])) . " ";
}
echo "\n";

// Тест на подписа
$date = gmdate('D, d M Y H:i:s T');
$sig = 'GETaffiliate-advertisers/?/' . $user . $date;
$hash = hash_hmac('sha1', $sig, $key);

echo "\n--- TEST SIGNATURE ---\n";
echo "Sig String: $sig\n";
echo "Hash: $hash\n";
