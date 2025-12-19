<?php

namespace App\Service;

use App\Entity\AffiliateLink;
use App\Repository\AffiliateLinkRepository;
use Doctrine\ORM\EntityManagerInterface;
use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Attribute\Autowire;

class ProfitShareService
{
    private string $baseUrl = 'https://api.profitshare.bg';
    private string $apiUser;
    private string $apiKey;

    public function __construct(
        #[Autowire(env: 'PROFITSHARE_USER')] string $apiUser,
        #[Autowire(env: 'PROFITSHARE_KEY')] string $apiKey,
        private LoggerInterface $logger,
        private EntityManagerInterface $em,
        private AffiliateLinkRepository $affiliateLinkRepo
    ) {
        $this->apiUser = trim($apiUser);
        $this->apiKey = trim($apiKey);
    }

    public function generateAffiliateLink(string $advertiserId, string $productUrl, string $linkName = 'Link', bool $forceRegenerate = false): ?string
    {
        try {
            if (!$forceRegenerate) {
                $cachedLink = $this->affiliateLinkRepo->findCachedLink($advertiserId, $productUrl);
                if ($cachedLink) {
                    $cachedLink->setLastUsedAt(new \DateTimeImmutable());
                    $this->em->flush();
                    return $cachedLink->getAffiliateUrl();
                }
            }

            $postData = [0 => ['name' => $linkName, 'url' => $productUrl]];
            $body = http_build_query($postData);
            $date = gmdate('D, d M Y H:i:s T', time());
            $route = 'affiliate-links';

            $signatureString = 'POST' . $route . '/' . $this->apiUser . $date;
            $auth = hash_hmac('sha1', $signatureString, $this->apiKey);

            $ch = curl_init($this->baseUrl . '/' . $route . '/');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $body);
            curl_setopt($ch, CURLOPT_HTTPHEADER, [
                "Date: {$date}",
                "X-PS-Client: {$this->apiUser}",
                "X-PS-Accept: json",
                "X-PS-Auth: {$auth}",
                "Content-Type: application/x-www-form-urlencoded",
                "User-Agent: Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1)"
            ]);

            $response = curl_exec($ch);
            $result = json_decode($response, true);
            curl_close($ch);

            $affiliateUrl = $result['result'][0]['ps_url'] ?? null;

            if ($affiliateUrl) {
                $this->saveLinkToCache($advertiserId, $productUrl, $affiliateUrl, $linkName);
                $this->em->flush();
                return $affiliateUrl;
            }

            return null;
        } catch (\Exception $e) {
            $this->logger->error("Link generation failed: " . $e->getMessage());
            return null;
        }
    }

    private function saveLinkToCache(string $advertiserId, string $originalUrl, string $affiliateUrl, string $linkName): void
    {
        $cachedLink = new AffiliateLink();
        $cachedLink->setAdvertiserId($advertiserId);
        $cachedLink->setOriginalUrl($originalUrl);
        $cachedLink->setAffiliateUrl($affiliateUrl);
        $cachedLink->setLinkName($linkName);
        $this->em->persist($cachedLink);
    }
}
