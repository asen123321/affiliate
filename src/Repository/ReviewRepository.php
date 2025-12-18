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
     * Find similar products across different platforms based on title keywords
     * For price comparison feature
     */
    public function findSimilarAcrossPlatforms(string $title, int $excludeId = null, int $limit = 10): array
    {
        // Extract keywords from title (remove common words)
        $keywords = $this->extractKeywords($title);

        if (empty($keywords)) {
            return [];
        }

        $qb = $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true);

        if ($excludeId) {
            $qb->andWhere('r.id != :excludeId')
               ->setParameter('excludeId', $excludeId);
        }

        // Build LIKE conditions for each keyword
        $conditions = [];
        foreach ($keywords as $index => $keyword) {
            $conditions[] = 'r.title LIKE :keyword' . $index;
            $qb->setParameter('keyword' . $index, '%' . $keyword . '%');
        }

        if (!empty($conditions)) {
            $qb->andWhere(implode(' OR ', $conditions));
        }

        return $qb->orderBy('r.createdAt', 'DESC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Extract meaningful keywords from product title
     */
    private function extractKeywords(string $title): array
    {
        // Remove special characters and convert to lowercase
        $title = mb_strtolower($title, 'UTF-8');
        $title = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $title);

        // Split into words
        $words = preg_split('/\s+/', $title);

        // Bulgarian stop words to exclude
        $stopWords = [
            'за', 'на', 'в', 'с', 'от', 'и', 'или', 'но', 'че', 'да',
            'the', 'a', 'an', 'and', 'or', 'but', 'with', 'for', 'to'
        ];

        // Filter out stop words and short words
        $keywords = array_filter($words, function($word) use ($stopWords) {
            return mb_strlen($word, 'UTF-8') >= 3 && !in_array($word, $stopWords);
        });

        // Return unique keywords
        return array_unique(array_values($keywords));
    }

    /**
     * Get products grouped by platform for comparison
     */
    public function findForPriceComparison(string $searchTerm): array
    {
        $keywords = $this->extractKeywords($searchTerm);

        if (empty($keywords)) {
            return [];
        }

        $qb = $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.price IS NOT NULL')
            ->setParameter('status', true);

        // Build search conditions
        $conditions = [];
        foreach ($keywords as $index => $keyword) {
            $conditions[] = 'r.title LIKE :keyword' . $index;
            $qb->setParameter('keyword' . $index, '%' . $keyword . '%');
        }

        if (!empty($conditions)) {
            $qb->andWhere(implode(' OR ', $conditions));
        }

        $results = $qb->orderBy('r.price', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();

        // Group by platform
        $grouped = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        foreach ($results as $product) {
            $url = $product->getOriginalProductUrl();
            if (str_contains($url, 'emag.bg')) {
                $grouped['emag'][] = $product;
            } elseif (str_contains($url, 'fashiondays')) {
                $grouped['fashiondays'][] = $product;
            } elseif (str_contains($url, 'alleop')) {
                $grouped['alleop'][] = $product;
            }
        }

        return $grouped;
    }
}
