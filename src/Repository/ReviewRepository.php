<?php

namespace App\Repository;

use App\Entity\Review;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Review>
 *
 * @method Review|null find($id, $lockMode = null, $lockVersion = null)
 * @method Review|null findOneBy(array $criteria, array $orderBy = null)
 * @method Review[]    findAll()
 * @method Review[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    public function save(Review $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    public function remove(Review $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }

    /**
     * Намира най-добрите продукти по категория (за сравнение).
     */
    public function findBestByCategory(string $category, int $limit = 10): array
    {
        $categoryMap = [
            'fashion-days' => '%fashiondays.bg%',
            'alleop' => '%alleop.bg%',
            'emag-deals' => '%emag.bg%',
        ];

        $urlPattern = $categoryMap[$category] ?? '%' . $category . '%';

        return $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.originalProductUrl LIKE :category')
            ->setParameter('status', true)
            ->setParameter('category', $urlPattern)
            ->orderBy('r.rating', 'DESC')
            ->addOrderBy('r.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Намира подобни продукти за препоръки.
     */
    public function findSimilarProducts(Review $review, int $limit = 4): array
    {
        $qb = $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.id != :currentId')
            ->setParameter('status', true)
            ->setParameter('currentId', $review->getId())
            ->setMaxResults($limit);

        // Търсене на продукти от същия магазин
        if ($review->getOriginalProductUrl()) {
            if (str_contains($review->getOriginalProductUrl(), 'fashiondays')) {
                $qb->andWhere('r.originalProductUrl LIKE :store')
                    ->setParameter('store', '%fashiondays.bg%');
            } elseif (str_contains($review->getOriginalProductUrl(), 'alleop')) {
                $qb->andWhere('r.originalProductUrl LIKE :store')
                    ->setParameter('store', '%alleop.bg%');
            } elseif (str_contains($review->getOriginalProductUrl(), 'emag')) {
                $qb->andWhere('r.originalProductUrl LIKE :store')
                    ->setParameter('store', '%emag.bg%');
            }
        }

        return $qb->orderBy('r.rating', 'DESC')
            ->addOrderBy('r.createdAt', 'DESC')
            ->getQuery()
            ->getResult();
    }
}
