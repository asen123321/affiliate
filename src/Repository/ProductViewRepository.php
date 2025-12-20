<?php

namespace App\Repository;

use App\Entity\ProductView;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

class ProductViewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, ProductView::class);
    }

    public function save(ProductView $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function findViewedCategoriesBySession(string $sessionId, int $limit = 10): array
    {
        return $this->createQueryBuilder('pv')
            ->select('pv.category, COUNT(pv.id) as view_count')
            ->where('pv.sessionId = :sessionId')
            ->andWhere('pv.category IS NOT NULL')
            ->setParameter('sessionId', $sessionId)
            ->groupBy('pv.category')
            ->orderBy('view_count', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function findRecentViewsBySession(string $sessionId, int $limit = 20): array
    {
        return $this->createQueryBuilder('pv')
            ->where('pv.sessionId = :sessionId')
            ->setParameter('sessionId', $sessionId)
            ->orderBy('pv.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    public function cleanOldViews(int $daysOld = 30): int
    {
        $date = new \DateTimeImmutable("-{$daysOld} days");

        return $this->createQueryBuilder('pv')
            ->delete()
            ->where('pv.createdAt < :date')
            ->setParameter('date', $date)
            ->getQuery()
            ->execute();
    }
}
