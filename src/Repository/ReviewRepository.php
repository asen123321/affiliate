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
     * Find similar products across different platforms
     * Matches by CATEGORY field and similar price (100% accurate!)
     * Returns up to 18 products total (6 per platform max)
     */
    public function findSimilarAcrossPlatforms(string $title, int $excludeId = null, int $limit = 18): array
    {
        // Get the source product to know its category and price
        $sourceProduct = null;
        if ($excludeId) {
            $sourceProduct = $this->find($excludeId);
        }

        if (!$sourceProduct) {
            return [];
        }

        $category = $sourceProduct->getCategory();

        // If source product has no category, return empty
        if (empty($category) || $category === 'other') {
            return [];
        }

        // Find products by SAME category
        $qb = $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.category = :category')
            ->setParameter('status', true)
            ->setParameter('category', $category);

        if ($excludeId) {
            $qb->andWhere('r.id != :excludeId')
               ->setParameter('excludeId', $excludeId);
        }

        // Filter by similar price range (±30%)
        if ($sourceProduct->getPrice()) {
            $price = $sourceProduct->getPrice();
            $minPrice = $price * 0.7;  // -30%
            $maxPrice = $price * 1.3;  // +30%

            $qb->andWhere('r.price BETWEEN :minPrice AND :maxPrice')
                ->setParameter('minPrice', $minPrice)
                ->setParameter('maxPrice', $maxPrice);
        }

        return $qb->orderBy('r.price', 'ASC')
            ->setMaxResults($limit)
            ->getQuery()
            ->getResult();
    }

    /**
     * Extract only the category keyword (e.g., "телевизор", "лаптоп", "кафемашина")
     * Used for fallback matching when exact brand match is not found
     */
    private function extractCategoryKeyword(string $title): ?string
    {
        $title = mb_strtolower($title, 'UTF-8');

        // Category keywords in order of priority
        $categoryKeywords = [
            'телевизор', 'телевизори', 'tv',
            'лаптоп', 'laptop', 'ноутбук',
            'телефон', 'phone', 'смартфон', 'smartphone',
            'таблет', 'tablet',
            'кафемашина', 'кафеавтомат',
            'прахосмукачка',
            'микровълнова',
            'фурна',
            'хладилник',
            'перална',
            'климатик',
            'конзола', 'playstation', 'xbox',
            'камера', 'фотоапарат',
            'слушалки', 'headphones',
            'часовник', 'smartwatch',
            'тостер',
            'блендер',
            'фритюрник',
            'скара',
            'робот',
            'дрон',
            'рокля',
            'обувки',
            'яке',
            'панталон',
            'чанта'
        ];

        // Find the first category keyword in the title
        foreach ($categoryKeywords as $keyword) {
            if (str_contains($title, $keyword)) {
                return $keyword;
            }
        }

        return null;
    }

    /**
     * Extract meaningful keywords from product title
     * Prioritizes category keywords for better matching
     */
    private function extractKeywords(string $title): array
    {
        // Remove special characters and convert to lowercase
        $title = mb_strtolower($title, 'UTF-8');
        $title = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $title);

        // Split into words
        $words = preg_split('/\s+/', $title);

        // Bulgarian and English stop words to exclude
        $stopWords = [
            'за', 'на', 'в', 'с', 'от', 'и', 'или', 'но', 'че', 'да', 'по',
            'при', 'без', 'над', 'под', 'пред', 'след', 'през', 'между',
            'the', 'a', 'an', 'and', 'or', 'but', 'with', 'for', 'to', 'of',
            'in', 'on', 'at', 'by', 'new', 'original', 'best', 'top'
        ];

        // Category keywords that are important for matching (Bulgarian & English)
        $categoryKeywords = [
            'телевизор', 'телевизори', 'tv', 'smart',
            'лаптоп', 'laptop', 'ноутбук',
            'телефон', 'phone', 'смартфон', 'smartphone',
            'таблет', 'tablet',
            'кафемашина', 'кафе', 'coffee',
            'прахосмукачка', 'vacuum',
            'микровълнова', 'microwave',
            'фурна', 'oven',
            'хладилник', 'refrigerator', 'fridge',
            'перална', 'washing', 'machine',
            'климатик', 'air', 'conditioner',
            'конзола', 'console', 'playstation', 'xbox',
            'камера', 'camera', 'фотоапарат',
            'слушалки', 'headphones', 'earbuds',
            'часовник', 'watch', 'smartwatch',
            'тостер', 'toaster',
            'блендер', 'blender',
            'робот', 'robot',
            'дрон', 'drone',
            'рокля', 'dress', 'рокли',
            'обувки', 'shoes', 'обувка',
            'яке', 'jacket',
            'панталон', 'pants', 'jeans',
            'чанта', 'bag', 'раница'
        ];

        // Filter and prioritize keywords
        $importantKeywords = [];
        $regularKeywords = [];

        foreach ($words as $word) {
            // Skip stop words and very short words
            if (mb_strlen($word, 'UTF-8') < 3 || in_array($word, $stopWords)) {
                continue;
            }

            // Check if it's a category keyword
            $isCategory = false;
            foreach ($categoryKeywords as $catKeyword) {
                if (str_contains($word, $catKeyword) || str_contains($catKeyword, $word)) {
                    $isCategory = true;
                    break;
                }
            }

            if ($isCategory) {
                $importantKeywords[] = $word;
            } else {
                $regularKeywords[] = $word;
            }
        }

        // Combine: category keywords first, then regular keywords (max 4 total)
        $allKeywords = array_merge($importantKeywords, $regularKeywords);
        $allKeywords = array_unique($allKeywords);

        // Limit to 4 keywords for better performance
        return array_slice(array_values($allKeywords), 0, 4);
    }

    /**
     * Get products grouped by platform for comparison
     * Priority 1: Same brand + category
     * Priority 2: Same category with similar price range
     */
    public function findForPriceComparison(string $searchTerm): array
    {
        $keywords = $this->extractKeywords($searchTerm);

        if (empty($keywords)) {
            return [
                'emag' => [],
                'fashiondays' => [],
                'alleop' => []
            ];
        }

        // Try exact match first (all keywords - brand + category)
        $qb = $this->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.price IS NOT NULL')
            ->setParameter('status', true);

        foreach ($keywords as $index => $keyword) {
            $qb->andWhere('r.title LIKE :keyword' . $index)
               ->setParameter('keyword' . $index, '%' . $keyword . '%');
        }

        $exactMatches = $qb->orderBy('r.price', 'ASC')
            ->setMaxResults(50)
            ->getQuery()
            ->getResult();

        // If we have enough exact matches, use those
        if (count($exactMatches) >= 10) {
            return $this->groupByPlatform($exactMatches);
        }

        // Otherwise, fallback to category-only matching
        $categoryKeyword = $this->extractCategoryKeyword($searchTerm);

        if ($categoryKeyword) {
            $qb2 = $this->createQueryBuilder('r')
                ->where('r.isPublished = :status')
                ->andWhere('r.price IS NOT NULL')
                ->andWhere('r.title LIKE :category')
                ->setParameter('status', true)
                ->setParameter('category', '%' . $categoryKeyword . '%')
                ->orderBy('r.price', 'ASC')
                ->setMaxResults(50)
                ->getQuery()
                ->getResult();

            // Merge exact and category matches
            $allMatches = array_merge($exactMatches, $qb2);

            // Remove duplicates
            $uniqueMatches = [];
            $seenIds = [];
            foreach ($allMatches as $match) {
                if (!in_array($match->getId(), $seenIds)) {
                    $uniqueMatches[] = $match;
                    $seenIds[] = $match->getId();
                }
            }

            return $this->groupByPlatform($uniqueMatches);
        }

        return $this->groupByPlatform($exactMatches);
    }

    /**
     * Group products by platform
     */
    private function groupByPlatform(array $products): array
    {
        $grouped = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        foreach ($products as $product) {
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
