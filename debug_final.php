<?php
// ТВОИТЕ ДАННИ (Взети от снимките)
$user = '_693fa9d1a262b';
$key = 'a6c36ec01561aa2512a1e53b485b1b4c39d88d45';

echo "\n🔍 PROFITSHARE ULTIMATE SIGNATURE TEST\n";
echo "=======================================\n";

function test_scenario($name, $sig_string, $url, $user, $key, $date) {
    $hash = hash_hmac('sha1', $sig_string, $key);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Date: $date",
        "X-PS-Client: $user",
        "X-PS-Accept: json",
        "X-PS-Auth: $hash",
        "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
    ]);

    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "🧪 $name\n";
    echo "   Sig: $sig_string\n";
    echo "   Res: HTTP $httpCode\n";

    if ($httpCode == 200) {
        echo "   ✅ УСПЕХ! ТОВА Е ВЕРНИЯТ ФОРМАТ!\n";
        return true;
    }
    echo "   ❌ Грешка\n\n";
    return false;
}

$date = gmdate('D, d M Y H:i:s T');
$baseUrl = "https://api.profitshare.bg";
$route = "affiliate-advertisers";

// --- ВАРИАНТ 1: Стандартен (Това ползваме сега) ---
// Format: METHOD + ROUTE + /? + / + USER + DATE
$sig1 = "GET" . $route . "/?/" . $user . $date;
test_scenario("VAR 1 (Standard)", $sig1, "$baseUrl/$route/?", $user, $key, $date);

// --- ВАРИАНТ 2: С водеща наклонена черта (Leading Slash) ---
// Format: METHOD + /ROUTE + /? + / + USER + DATE
// Някои API-та изискват "/" преди името на рута
$sig2 = "GET/" . $route . "/?/" . $user . $date;
test_scenario("VAR 2 (Leading Slash)", $sig2, "$baseUrl/$route/?", $user, $key, $date);

// --- ВАРИАНТ 3: С Интервал (Space) ---
// Format: METHOD + ROUTE + /? + / + USER + SPACE + DATE
$sig3 = "GET" . $route . "/?/" . $user . " " . $date;
test_scenario("VAR 3 (Space)", $sig3, "$baseUrl/$route/?", $user, $key, $date);

echo "КРАЙ НА ТЕСТА.\n";
