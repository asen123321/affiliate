<?php
// ТВОИТЕ КЛЮЧОВЕ (Hardcoded)
$user = '_693fa9d1a262b';
$key = 'a6c36ec01561aa2512a1e53b485b1b4c39d88d45';

echo "\n🔍 PROFITSHARE DIAGNOSTIC TOOL\n";
echo "-------------------------------\n";
echo "Time (Local): " . date('Y-m-d H:i:s') . "\n";
echo "Time (GMT):   " . gmdate('Y-m-d H:i:s') . "\n";
echo "User: $user\n";

function test($user, $key, $scenario, $useSpace) {
    $date = gmdate('D, d M Y H:i:s T');
    $url = "https://api.profitshare.bg/affiliate-advertisers/?"; // САМО HTTPS

    $separator = $useSpace ? ' ' : '';
    $sig = 'GETaffiliate-advertisers/?/' . $user . $separator . $date;
    $hash = hash_hmac('sha1', $sig, $key);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Date: $date",
        "X-PS-Client: $user",
        "X-PS-Accept: json",
        "X-PS-Auth: $hash",
        "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
    ]);

    $res = curl_exec($ch);
    $code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);

    echo "$scenario: HTTP $code\n";
    if ($code == 200) echo "✅ УСПЕХ! ТОВА Е ТВОЯТА КОМБИНАЦИЯ!\n\n";
}

test($user, $key, "ОПИТ 1 (Без интервал)", false);
test($user, $key, "ОПИТ 2 (С интервал)", true);
