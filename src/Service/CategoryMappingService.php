<?php

namespace App\Service;

use App\Entity\Category;
use App\Repository\CategoryRepository;
use Psr\Log\LoggerInterface;

/**
 * Smart Category Mapping Service
 *
 * Maps external feed category names to local Category entities
 * based on the externalMappingKeywords defined in fixtures.
 *
 * This ensures accurate category assignment instead of keyword guessing.
 */
class CategoryMappingService
{
    private ?Category $fallbackCategory = null;
    private array $categoryCache = [];

    public function __construct(
        private CategoryRepository $categoryRepository,
        private LoggerInterface $logger
    ) {
        $this->buildCategoryCache();
    }

    /**
     * Build an in-memory cache of all categories with their mapping keywords
     */
    private function buildCategoryCache(): void
    {
        $allCategories = $this->categoryRepository->findAll();

        foreach ($allCategories as $category) {
            $keywords = $category->getExternalMappingKeywords() ?? [];

            // Check if this is the fallback category
            if (in_array('General', $keywords) || in_array('Other', $keywords)) {
                $this->fallbackCategory = $category;
            }

            // Store category with all its keywords
            foreach ($keywords as $keyword) {
                $normalizedKeyword = $this->normalizeString($keyword);
                if (!isset($this->categoryCache[$normalizedKeyword])) {
                    $this->categoryCache[$normalizedKeyword] = [];
                }
                $this->categoryCache[$normalizedKeyword][] = $category;
            }
        }

        $this->logger->info('CategoryMappingService: Cache built with ' . count($this->categoryCache) . ' keyword mappings');
    }

    /**
     * Find the best matching local Category for a given source category name
     *
     * @param string $sourceCategoryName The category name from the external feed (e.g., "Telefoane mobile")
     * @return Category|null The matched Category entity or fallback category
     */
    public function findLocalCategory(string $sourceCategoryName): ?Category
    {
        if (empty($sourceCategoryName)) {
            return $this->fallbackCategory;
        }

        $normalizedSource = $this->normalizeString($sourceCategoryName);

        // Strategy 1: Exact match
        if (isset($this->categoryCache[$normalizedSource])) {
            $matches = $this->categoryCache[$normalizedSource];
            $bestMatch = $this->selectBestMatch($matches, $sourceCategoryName);

            $this->logger->info('CategoryMapping: Exact match found', [
                'source' => $sourceCategoryName,
                'matched' => $bestMatch->getName(),
            ]);

            return $bestMatch;
        }

        // Strategy 2: Partial match - check if source contains any keyword
        $partialMatches = [];
        foreach ($this->categoryCache as $keyword => $categories) {
            if (stripos($normalizedSource, $keyword) !== false || stripos($keyword, $normalizedSource) !== false) {
                foreach ($categories as $category) {
                    $partialMatches[] = [
                        'category' => $category,
                        'keyword' => $keyword,
                        'score' => $this->calculateMatchScore($normalizedSource, $keyword),
                    ];
                }
            }
        }

        // Sort by match score (higher is better)
        if (!empty($partialMatches)) {
            usort($partialMatches, function ($a, $b) {
                return $b['score'] <=> $a['score'];
            });

            $bestMatch = $partialMatches[0]['category'];

            $this->logger->info('CategoryMapping: Partial match found', [
                'source' => $sourceCategoryName,
                'matched' => $bestMatch->getName(),
                'keyword' => $partialMatches[0]['keyword'],
                'score' => $partialMatches[0]['score'],
            ]);

            return $bestMatch;
        }

        // Strategy 3: Word-level matching
        $sourceWords = $this->extractWords($normalizedSource);
        $wordMatches = [];

        foreach ($this->categoryCache as $keyword => $categories) {
            $keywordWords = $this->extractWords($keyword);
            $commonWords = array_intersect($sourceWords, $keywordWords);

            if (!empty($commonWords)) {
                foreach ($categories as $category) {
                    $wordMatches[] = [
                        'category' => $category,
                        'keyword' => $keyword,
                        'commonWords' => count($commonWords),
                    ];
                }
            }
        }

        if (!empty($wordMatches)) {
            usort($wordMatches, function ($a, $b) {
                return $b['commonWords'] <=> $a['commonWords'];
            });

            $bestMatch = $wordMatches[0]['category'];

            $this->logger->info('CategoryMapping: Word-level match found', [
                'source' => $sourceCategoryName,
                'matched' => $bestMatch->getName(),
                'keyword' => $wordMatches[0]['keyword'],
                'commonWords' => $wordMatches[0]['commonWords'],
            ]);

            return $bestMatch;
        }

        // No match found - use fallback
        $this->logger->warning('CategoryMapping: No match found, using fallback', [
            'source' => $sourceCategoryName,
            'fallback' => $this->fallbackCategory?->getName() ?? 'NULL',
        ]);

        return $this->fallbackCategory;
    }

    /**
     * Normalize a string for comparison
     */
    private function normalizeString(string $str): string
    {
        // Convert to lowercase
        $normalized = mb_strtolower($str, 'UTF-8');

        // Remove special characters but keep letters and numbers
        $normalized = preg_replace('/[^\p{L}\p{N}\s]/u', ' ', $normalized);

        // Remove extra spaces
        $normalized = preg_replace('/\s+/', ' ', $normalized);

        return trim($normalized);
    }

    /**
     * Extract meaningful words from a string (minimum 3 characters)
     */
    private function extractWords(string $str): array
    {
        $words = explode(' ', $str);
        return array_filter($words, function ($word) {
            return mb_strlen($word, 'UTF-8') >= 3;
        });
    }

    /**
     * Calculate a match score between two strings
     * Higher score = better match
     */
    private function calculateMatchScore(string $source, string $keyword): float
    {
        $source = $this->normalizeString($source);
        $keyword = $this->normalizeString($keyword);

        // Exact match = highest score
        if ($source === $keyword) {
            return 100.0;
        }

        // Calculate similarity using Levenshtein distance
        $maxLen = max(mb_strlen($source), mb_strlen($keyword));
        if ($maxLen === 0) {
            return 0.0;
        }

        $distance = levenshtein($source, $keyword);
        $similarity = (1 - ($distance / $maxLen)) * 100;

        // Bonus for substring match
        if (stripos($source, $keyword) !== false || stripos($keyword, $source) !== false) {
            $similarity += 20;
        }

        return min($similarity, 100.0);
    }

    /**
     * Select the best match when multiple categories match the same keyword
     * Prefer leaf categories (categories without children) over parent categories
     */
    private function selectBestMatch(array $categories, string $sourceCategoryName): Category
    {
        if (count($categories) === 1) {
            return $categories[0];
        }

        // Prefer categories without children (leaf nodes)
        $leafCategories = array_filter($categories, function (Category $cat) {
            return $cat->getChildren()->isEmpty();
        });

        if (!empty($leafCategories)) {
            return reset($leafCategories);
        }

        // Otherwise, return the first match
        return reset($categories);
    }

    /**
     * Get statistics about the mapping cache
     */
    public function getCacheStats(): array
    {
        return [
            'total_keywords' => count($this->categoryCache),
            'fallback_category' => $this->fallbackCategory?->getName() ?? 'Not set',
        ];
    }

    /**
     * Refresh the cache (useful if categories are updated at runtime)
     */
    public function refreshCache(): void
    {
        $this->categoryCache = [];
        $this->fallbackCategory = null;
        $this->buildCategoryCache();
    }
}
