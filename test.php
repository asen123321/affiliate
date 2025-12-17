<?php
// ТВОИТЕ ДАННИ
$keys = [
    'user_id' => '_693fa9d1a262b',   // Вариант А: ID от сайта
    'email'   => 'asem4o@gmail.com'   // Вариант Б: Твоят имейл (често това е истинският API User)
];
$apiKey = 'a6c36ec01561aa2512a1e53b485b1b4c39d88d45';

echo "--- PROFITSHARE DEEP DIAGNOSTIC ---\n";
$date = gmdate('D, d M Y H:i:s T');
echo "Date: $date\n\n";

function check($name, $user, $key, $sig_formula, $url) {
    global $date;

    // Генериране на подписа
    $auth = hash_hmac('sha1', $sig_formula, $key);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_TIMEOUT, 5);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Date: $date",
        "X-PS-Client: $user",
        "X-PS-Accept: json",
        "X-PS-Auth: $auth",
        "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
    ]);

    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "TEST [$name]\n";
    echo "User: $user\n";
    echo "Sig:  $sig_formula\n";
    echo "URL:  $url\n";
    echo "Res:  $code\n";

    if ($code == 200) {
        echo "✅✅✅ SUCCESS! ТОВА Е КОМБИНАЦИЯТА! ✅✅✅\n";
        return true;
    } else {
        echo "❌ Failed\n";
        return false;
    }
    echo "------------------------------------------------\n";
}

// 1. Стандартен тест (с ID)
$sig1 = 'GETaffiliate-advertisers/?/' . $keys['user_id'] . $date;
check("1. ID + Standard Doc", $keys['user_id'], $apiKey, $sig1, 'https://api.profitshare.bg/affiliate-advertisers/?');

// 2. Тест с ИМЕЙЛ (много често API user е имейлът)
$sig2 = 'GETaffiliate-advertisers/?/' . $keys['email'] . $date;
check("2. EMAIL + Standard Doc", $keys['email'], $apiKey, $sig2, 'https://api.profitshare.bg/affiliate-advertisers/?');

// 3. Тест БЕЗ въпросителна в подписа (Ако няма query params)
// Формула: GET + route + / + user + date (без /?)
$sig3 = 'GETaffiliate-advertisers/' . $keys['user_id'] . $date;
// URL също без ?
check("3. ID + Clean URL (No ?)", $keys['user_id'], $apiKey, $sig3, 'https://api.profitshare.bg/affiliate-advertisers/');

// 4. Тест с ИМЕЙЛ + БЕЗ въпросителна
$sig4 = 'GETaffiliate-advertisers/' . $keys['email'] . $date;
check("4. EMAIL + Clean URL (No ?)", $keys['email'], $apiKey, $sig4, 'https://api.profitshare.bg/affiliate-advertisers/');
