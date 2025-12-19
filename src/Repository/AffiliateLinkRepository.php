<?php

namespace App\Repository;

use App\Entity\AffiliateLink;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class AffiliateLinkRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, AffiliateLink::class);
    }

    public function findCachedLink(string $advertiserId, string $originalUrl): ?AffiliateLink
    {
        return $this->findOneBy([
            'advertiserId' => $advertiserId,
            'originalUrl' => $originalUrl
        ]);
    }
}
