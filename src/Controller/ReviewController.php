<?php

namespace App\Controller;

use App\Entity\ProductView;
use App\Repository\ProductRepository;
use App\Repository\ProductViewRepository;
use App\Repository\ReviewRepository;
use App\Service\ProfitShareService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Attribute\Cache;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

class ReviewController extends AbstractController
{
    #[Route('/', name: 'app_home')]

    public function index(
        Request $request,
        ReviewRepository $reviewRepository,
        ProductRepository $productRepository, // <--- ВАЖНО: Инжектираме ProductRepository
        PaginatorInterface $paginator
    ): Response {
        $source = $request->query->get('source');

        // --- ЛОГИКА ЗА ПРЕВКЛЮЧВАНЕ НА ИЗТОЧНИЦИТЕ ---

        if ($source === 'fashion_days') {
            // 1. АКО Е FASHION DAYS -> Търсим в таблица PRODUCT
            $qb = $productRepository->createQueryBuilder('p')
                ->where('p.category = :fd_name')
                ->setParameter('fd_name', 'FashionDays')
                ->orderBy('p.updatedAt', 'DESC');
        } else {
            // 2. ЗА ВСИЧКО ДРУГО (eMAG, Alleop*) -> Търсим в таблица REVIEW
            // *Забележка: Ако искаш и Alleop да е от Product таблицата, добави elseif тук
            $qb = $reviewRepository->createQueryBuilder('r')
                ->where('r.isPublished = :status')
                ->setParameter('status', true)
                ->andWhere('r.price IS NOT NULL')
                ->andWhere('r.price > 0')
                ->orderBy('r.createdAt', 'DESC');

            if ($source) {
                if ($source === 'alleop') {
                    $qb->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                        ->setParameter('badge', 'ALLEOP')
                        ->setParameter('url', '%alleop%');
                } elseif ($source === 'emag') {
                    $qb->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                        ->setParameter('badge', 'EMAG')
                        ->setParameter('url', '%emag%');
                }
            }
        }

        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            60
        );

        return $this->render('review/index.html.twig', [
            'reviews' => $pagination,
        ]);
    }

    #[Route('/review/{slug}', name: 'app_review_show')]
    public function show(
        string $slug,
        Request $request,
        ReviewRepository $reviewRepository,
        ProductRepository $productRepository,
        ProductViewRepository $productViewRepository
    ): Response
    {
        // 1. Намираме текущото ревю
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // Track product view
        $session = $request->getSession();
        $sessionId = $session->getId();

        $productView = new ProductView();
        $productView->setSessionId($sessionId);
        $productView->setProductName($review->getTitle());
        $productView->setCategory($review->getCategory());
        $productView->setReviewId($review->getId());
        $productView->setProductUrl($review->getOriginalProductUrl());

        $productViewRepository->save($productView, true);

        // 2. Get user's viewed categories to personalize recommendations
        $viewedCategories = $productViewRepository->findViewedCategoriesBySession($sessionId, 5);
        $userInterestCategories = array_map(fn($item) => $item['category'], $viewedCategories);

        // 3. Определяме дума за търсене от заглавието и категорията
        $title = trim($review->getTitle());
        $parts = explode(' ', $title);
        $firstWord = mb_strtolower($parts[0]);

        if (mb_strlen($firstWord) < 4 && isset($parts[1])) {
            $searchTerm = $firstWord . ' ' . mb_strtolower($parts[1]);
        } else {
            $searchTerm = $firstWord;
        }

        $allSimilarProducts = [];
        $currentCategory = $review->getCategory();

        // --- 4. ТЪРСЕНЕ В eMAG (Таблица Review) - По категория и заглавие ---
        $emagQb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.price > 0')
            ->andWhere('r.id != :currentId')
            ->setParameter('true', true)
            ->setParameter('currentId', $review->getId());

        // Prioritize same category
        if ($currentCategory) {
            $emagQb->andWhere('(r.category = :category OR LOWER(r.title) LIKE :startTerm)')
                ->setParameter('category', $currentCategory)
                ->setParameter('startTerm', $searchTerm . '%');
        } else {
            $emagQb->andWhere('LOWER(r.title) LIKE :startTerm')
                ->setParameter('startTerm', $searchTerm . '%');
        }

        $emagResults = $emagQb->setMaxResults(6)
            ->getQuery()
            ->getResult();

        // Преобразуваме в унифициран масив
        foreach ($emagResults as $item) {
            $allSimilarProducts[] = [
                'title' => $item->getTitle(),
                'price' => $item->getPrice(),
                'image' => $item->getImageUrl() ?? $item->getMainImage(),
                'link'  => $this->generateUrl('app_buy_redirect', ['id' => $item->getId()]),
                'platform' => 'eMAG',
                'badge_class' => 'bg-danger',
                'category' => $item->getCategory()
            ];
        }

        // --- 5. ТЪРСЕНЕ В ALLEOP (Таблица Product) - По категория ---
        $alleopQb = $productRepository->createQueryBuilder('p')
            ->where('p.price > 0');

        if ($currentCategory) {
            $alleopQb->andWhere('(p.category = :category OR LOWER(p.name) LIKE :startTerm)')
                ->setParameter('category', $currentCategory)
                ->setParameter('startTerm', $searchTerm . '%');
        } else {
            $alleopQb->andWhere('LOWER(p.name) LIKE :startTerm')
                ->setParameter('startTerm', $searchTerm . '%');
        }

        $alleopResults = $alleopQb->setMaxResults(6)
            ->getQuery()
            ->getResult();

        foreach ($alleopResults as $item) {
            $allSimilarProducts[] = [
                'title' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'link'  => $item->getLink(),
                'platform' => 'Alleop',
                'badge_class' => 'bg-success',
                'category' => $item->getCategory()
            ];
        }

        // --- 6. ТЪРСЕНЕ В FASHION DAYS (Таблица Product) - По категория ---
        $fashionQb = $productRepository->createQueryBuilder('p')
            ->where('p.category = :cat')
            ->setParameter('cat', 'FashionDays')
            ->andWhere('p.price > 0');

        if ($currentCategory) {
            $fashionQb->andWhere('LOWER(p.name) LIKE :startTerm')
                ->setParameter('startTerm', $searchTerm . '%');
        } else {
            $fashionQb->andWhere('LOWER(p.name) LIKE :startTerm')
                ->setParameter('startTerm', $searchTerm . '%');
        }

        $fashionResults = $fashionQb->setMaxResults(6)
            ->getQuery()
            ->getResult();

        foreach ($fashionResults as $item) {
            $allSimilarProducts[] = [
                'title' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'link'  => $item->getLink(),
                'platform' => 'Fashion Days',
                'badge_class' => 'bg-dark',
                'category' => $item->getCategory()
            ];
        }

        // --- 7. Add products from user's previously viewed categories ---
        if (!empty($userInterestCategories)) {
            $recommendedQb = $reviewRepository->createQueryBuilder('r')
                ->where('r.isPublished = :true')
                ->andWhere('r.price > 0')
                ->andWhere('r.id != :currentId')
                ->andWhere('r.category IN (:categories)')
                ->setParameter('true', true)
                ->setParameter('currentId', $review->getId())
                ->setParameter('categories', $userInterestCategories)
                ->setMaxResults(4)
                ->getQuery()
                ->getResult();

            foreach ($recommendedQb as $item) {
                $platform = 'Recommended';
                $badgeClass = 'bg-info';

                if ($item->getBadge() === 'ALLEOP' || str_contains($item->getOriginalProductUrl() ?? '', 'alleop')) {
                    $platform = 'Alleop';
                    $badgeClass = 'bg-success';
                } elseif ($item->getBadge() === 'EMAG' || str_contains($item->getOriginalProductUrl() ?? '', 'emag')) {
                    $platform = 'eMAG';
                    $badgeClass = 'bg-danger';
                }

                $allSimilarProducts[] = [
                    'title' => $item->getTitle(),
                    'price' => $item->getPrice(),
                    'image' => $item->getImageUrl() ?? $item->getMainImage(),
                    'link'  => $this->generateUrl('app_buy_redirect', ['id' => $item->getId()]),
                    'platform' => $platform,
                    'badge_class' => $badgeClass,
                    'category' => $item->getCategory()
                ];
            }
        }

        // --- 8. If current product has category, add same category from DIFFERENT platform ---
        if ($currentCategory) {
            // Determine current platform
            $currentPlatform = null;
            if ($review->getBadge() === 'ALLEOP' || str_contains($review->getOriginalProductUrl() ?? '', 'alleop')) {
                $currentPlatform = 'alleop';
            } elseif ($review->getBadge() === 'EMAG' || str_contains($review->getOriginalProductUrl() ?? '', 'emag')) {
                $currentPlatform = 'emag';
            }

            // Get products from OTHER platforms in same category
            if ($currentPlatform === 'alleop') {
                // Current is Alleop, suggest eMAG
                $otherPlatformQb = $reviewRepository->createQueryBuilder('r')
                    ->where('r.isPublished = :true')
                    ->andWhere('r.price > 0')
                    ->andWhere('r.id != :currentId')
                    ->andWhere('r.category = :category')
                    ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                    ->setParameter('true', true)
                    ->setParameter('currentId', $review->getId())
                    ->setParameter('category', $currentCategory)
                    ->setParameter('badge', 'EMAG')
                    ->setParameter('url', '%emag%')
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();

                foreach ($otherPlatformQb as $item) {
                    $allSimilarProducts[] = [
                        'title' => $item->getTitle(),
                        'price' => $item->getPrice(),
                        'image' => $item->getImageUrl() ?? $item->getMainImage(),
                        'link'  => $this->generateUrl('app_buy_redirect', ['id' => $item->getId()]),
                        'platform' => 'eMAG Alternative',
                        'badge_class' => 'bg-warning',
                        'category' => $item->getCategory()
                    ];
                }
            } elseif ($currentPlatform === 'emag') {
                // Current is eMAG, suggest Alleop
                $otherPlatformQb = $reviewRepository->createQueryBuilder('r')
                    ->where('r.isPublished = :true')
                    ->andWhere('r.price > 0')
                    ->andWhere('r.id != :currentId')
                    ->andWhere('r.category = :category')
                    ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                    ->setParameter('true', true)
                    ->setParameter('currentId', $review->getId())
                    ->setParameter('category', $currentCategory)
                    ->setParameter('badge', 'ALLEOP')
                    ->setParameter('url', '%alleop%')
                    ->setMaxResults(3)
                    ->getQuery()
                    ->getResult();

                foreach ($otherPlatformQb as $item) {
                    $allSimilarProducts[] = [
                        'title' => $item->getTitle(),
                        'price' => $item->getPrice(),
                        'image' => $item->getImageUrl() ?? $item->getMainImage(),
                        'link'  => $this->generateUrl('app_buy_redirect', ['id' => $item->getId()]),
                        'platform' => 'Alleop Alternative',
                        'badge_class' => 'bg-warning',
                        'category' => $item->getCategory()
                    ];
                }
            }
        }

        // Разбъркваме и режем до 12
        shuffle($allSimilarProducts);
        $finalSelection = array_slice($allSimilarProducts, 0, 12);

        return $this->render('review/show.html.twig', [
            'review' => $review,
            'similarProducts' => $finalSelection, // Важно: Това вече е плосък масив!
        ]);
    }

    #[Route('/search', name: 'app_search')]
    public function search(
        Request $request,
        ReviewRepository $reviewRepository,
        PaginatorInterface $paginator
    ): Response {
        $query = $request->query->get('q', '');

        if (empty($query)) {
            return $this->redirectToRoute('app_home');
        }

        $expandedKeywords = $this->expandSearchKeywords($query);

        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true)
            ->andWhere('r.price IS NOT NULL')
            ->andWhere('r.price > 0');

        if (!empty($expandedKeywords)) {
            $orConditions = [];
            foreach ($expandedKeywords as $index => $keyword) {
                $paramTitle = 'title' . $index;
                $paramContent = 'content' . $index;
                $paramMeta = 'meta' . $index;
                $paramCategory = 'category' . $index;

                $orConditions[] = "LOWER(r.title) LIKE LOWER(:$paramTitle)";
                $orConditions[] = "LOWER(r.content) LIKE LOWER(:$paramContent)";
                $orConditions[] = "LOWER(r.metaDescription) LIKE LOWER(:$paramMeta)";
                $orConditions[] = "LOWER(r.category) LIKE LOWER(:$paramCategory)";

                $searchPattern = '%' . mb_strtolower($keyword, 'UTF-8') . '%';
                $qb->setParameter($paramTitle, $searchPattern);
                $qb->setParameter($paramContent, $searchPattern);
                $qb->setParameter($paramMeta, $searchPattern);
                $qb->setParameter($paramCategory, $searchPattern);
            }
            $qb->andWhere(implode(' OR ', $orConditions));
        }

        $qb->orderBy('r.createdAt', 'DESC');

        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            60
        );

        return $this->render('review/search.html.twig', [
            'reviews' => $pagination,
            'query' => $query,
        ]);
    }

    #[Route('/compare-prices', name: 'app_compare_prices')]
    public function comparePrices(
        Request $request,
        ReviewRepository $reviewRepository,
        ProductRepository $productRepository,
        ProductViewRepository $productViewRepository
    ): Response {
        $query = $request->query->get('q', '');
        $category = $request->query->get('category', '');

        $productsByPlatform = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        if (empty($query) && empty($category)) {
            // Get user's recently viewed categories for suggestions
            $session = $request->getSession();
            $sessionId = $session->getId();
            $viewedCategories = $productViewRepository->findViewedCategoriesBySession($sessionId, 5);

            return $this->render('review/compare_prices.html.twig', [
                'query' => '',
                'category' => '',
                'products' => $productsByPlatform,
                'viewedCategories' => $viewedCategories
            ]);
        }

        $searchTerm = mb_strtolower(trim($query));

        // Map category to Bulgarian keywords
        $categoryKeywords = [
            'tv' => 'телевизор',
            'phone' => 'телефон',
            'speaker' => 'колонка',
            'laptop' => 'лаптоп',
        ];

        // 1. eMAG (Review) - Search with category filter
        $emagQb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
            ->andWhere('r.price > 0')
            ->setParameter('true', true)
            ->setParameter('badge', 'EMAG')
            ->setParameter('url', '%emag%');

        if (!empty($category)) {
            // Use keyword mapping for category search
            $categoryKeyword = $categoryKeywords[$category] ?? $category;
            $emagQb->andWhere('(r.category = :category OR LOWER(r.title) LIKE :categoryKeyword)')
                ->setParameter('category', $category)
                ->setParameter('categoryKeyword', '%' . mb_strtolower($categoryKeyword) . '%');
        } elseif (!empty($searchTerm)) {
            $emagQb->andWhere('LOWER(r.title) LIKE :term OR LOWER(r.category) LIKE :term')
                ->setParameter('term', '%' . $searchTerm . '%');
        }

        $emagResults = $emagQb->orderBy('r.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        $productsByPlatform['emag'] = $emagResults;

        // 2. ALLEOP (Review table, not Product) - with category filter
        $alleopQb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
            ->andWhere('r.price > 0')
            ->setParameter('true', true)
            ->setParameter('badge', 'ALLEOP')
            ->setParameter('url', '%alleop%');

        if (!empty($category)) {
            // Use keyword mapping for category search
            $categoryKeyword = $categoryKeywords[$category] ?? $category;
            $alleopQb->andWhere('(r.category = :category OR LOWER(r.title) LIKE :categoryKeyword)')
                ->setParameter('category', $category)
                ->setParameter('categoryKeyword', '%' . mb_strtolower($categoryKeyword) . '%');
        } elseif (!empty($searchTerm)) {
            $alleopQb->andWhere('LOWER(r.title) LIKE :term OR LOWER(r.category) LIKE :term')
                ->setParameter('term', '%' . $searchTerm . '%');
        }

        $alleopRaw = $alleopQb->orderBy('r.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        $productsByPlatform['alleop'] = $alleopRaw;

        // 3. Fashion Days (Product) - with category filter
        $fashionQb = $productRepository->createQueryBuilder('p')
            ->where('p.category = :fd')
            ->andWhere('p.price > 0')
            ->setParameter('fd', 'FashionDays');

        if (!empty($searchTerm)) {
            $fashionQb->andWhere('LOWER(p.name) LIKE :term')
                ->setParameter('term', '%' . $searchTerm . '%');
        }

        if (!empty($category)) {
            $fashionQb->andWhere('p.category = :category')
                ->setParameter('category', $category);
        }

        $fashionRaw = $fashionQb->orderBy('p.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        foreach ($fashionRaw as $prod) {
            $productsByPlatform['fashiondays'][] = [
                'id' => $prod->getId(),
                'title' => $prod->getName(),
                'price' => $prod->getPrice(),
                'imageUrl' => $prod->getImage(),
                'slug' => null,
                'link' => $prod->getLink(),
                'rating' => 0,
                'category' => $prod->getCategory(),
                'is_product_entity' => true
            ];
        }

        return $this->render('review/compare_prices.html.twig', [
            'query' => $query,
            'category' => $category,
            'products' => $productsByPlatform
        ]);
    }

    #[Route('/recommendations', name: 'app_recommendations')]
    public function recommendations(
        Request $request,
        ReviewRepository $reviewRepository,
        ProductRepository $productRepository,
        ProductViewRepository $productViewRepository
    ): Response {
        $session = $request->getSession();
        $sessionId = $session->getId();

        $viewedCategories = $productViewRepository->findViewedCategoriesBySession($sessionId, 10);
        $recentViews = $productViewRepository->findRecentViewsBySession($sessionId, 20);

        $recommendedProducts = [];

        if (!empty($viewedCategories)) {
            $categoryNames = array_map(fn($item) => $item['category'], $viewedCategories);
            $categoryNames = array_filter($categoryNames);

            if (!empty($categoryNames)) {
                $recommendedReviews = $reviewRepository->createQueryBuilder('r')
                    ->where('r.isPublished = :true')
                    ->andWhere('r.price > 0')
                    ->andWhere('r.category IN (:categories)')
                    ->setParameter('true', true)
                    ->setParameter('categories', $categoryNames)
                    ->orderBy('r.createdAt', 'DESC')
                    ->setMaxResults(12)
                    ->getQuery()
                    ->getResult();

                foreach ($recommendedReviews as $item) {
                    $platform = 'eMAG';
                    if ($item->getBadge() === 'ALLEOP' || str_contains($item->getOriginalProductUrl() ?? '', 'alleop')) {
                        $platform = 'Alleop';
                    }

                    $recommendedProducts[] = [
                        'title' => $item->getTitle(),
                        'price' => $item->getPrice(),
                        'image' => $item->getImageUrl() ?? $item->getMainImage(),
                        'link' => $this->generateUrl('app_review_show', ['slug' => $item->getSlug()]),
                        'category' => $item->getCategory(),
                        'platform' => $platform,
                        'rating' => $item->getRating()
                    ];
                }
            }
        }

        return $this->render('review/recommendations.html.twig', [
            'viewedCategories' => $viewedCategories,
            'recentViews' => $recentViews,
            'recommendedProducts' => $recommendedProducts
        ]);
    }

    #[Route('/compare-category/{category}', name: 'app_compare_category')]
    public function compareCategory(
        string $category,
        ReviewRepository $reviewRepository,
        ProductRepository $productRepository
    ): Response {
        // Get products from different platforms in the same category
        $productsByPlatform = [
            'emag' => [],
            'alleop' => []
        ];

        // Map category to search keywords
        $categoryKeywords = [
            'tv' => 'телевизор',
            'phone' => 'телефон',
            'speaker' => 'колонка',
            'laptop' => 'лаптоп',
            'other' => ''
        ];

        $searchKeyword = $categoryKeywords[$category] ?? $category;

        // 1. eMAG products matching this category (by title since eMAG doesn't have categories)
        $emagQb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.price > 0')
            ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
            ->setParameter('true', true)
            ->setParameter('badge', 'EMAG')
            ->setParameter('url', '%emag%');

        // Search by category OR title keyword
        if (!empty($searchKeyword)) {
            $emagQb->andWhere('(r.category = :category OR LOWER(r.title) LIKE :keyword)')
                ->setParameter('category', $category)
                ->setParameter('keyword', '%' . mb_strtolower($searchKeyword) . '%');
        } else {
            $emagQb->andWhere('r.category = :category')
                ->setParameter('category', $category);
        }

        $emagResults = $emagQb->orderBy('r.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        $productsByPlatform['emag'] = $emagResults;

        // 2. Alleop products in this category
        $alleopQb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.price > 0')
            ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
            ->setParameter('true', true)
            ->setParameter('badge', 'ALLEOP')
            ->setParameter('url', '%alleop%');

        // Search by category OR title keyword
        if (!empty($searchKeyword)) {
            $alleopQb->andWhere('(r.category = :category OR LOWER(r.title) LIKE :keyword)')
                ->setParameter('category', $category)
                ->setParameter('keyword', '%' . mb_strtolower($searchKeyword) . '%');
        } else {
            $alleopQb->andWhere('r.category = :category')
                ->setParameter('category', $category);
        }

        $alleopResults = $alleopQb->orderBy('r.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        $productsByPlatform['alleop'] = $alleopResults;

        return $this->render('review/compare_category.html.twig', [
            'category' => $category,
            'categoryName' => $searchKeyword ?: $category,
            'products' => $productsByPlatform
        ]);
    }

    #[Route('/buy/{id}', name: 'app_buy_redirect', methods: ['GET'])]
    public function buyRedirect(int $id, ReviewRepository $reviewRepository, ProfitShareService $profitShareService, LoggerInterface $logger): RedirectResponse
    {
        $review = $reviewRepository->find($id);
        if (!$review) throw $this->createNotFoundException('Review not found');

        $productUrl = $review->getOriginalProductUrl();
        if (!$productUrl) return $this->redirect($review->getAffiliateLink());

        $advertiserId = '35';
        if (str_contains($productUrl, 'fashiondays')) $advertiserId = '84';
        elseif (str_contains($productUrl, 'alleop')) $advertiserId = '125';

        $affiliateLink = $profitShareService->generateAffiliateLink($advertiserId, $productUrl, 'click-' . $review->getId());
        if (!$affiliateLink) {
            $affiliateLink = $review->getAffiliateLink();
        }
        return $this->redirect($affiliateLink);
    }

    private function expandSearchKeywords(string $query): array
    {
        $query = mb_strtolower($query, 'UTF-8');
        $keywords = [$query];
        $expansions = [
            'тв' => ['телевизор', 'televizor', 'tv', 'smart tv'],
            'laptop' => ['лаптоп', 'notebook', 'ноутбук'],
            'лаптоп' => ['laptop', 'notebook'],
            'телефон' => ['phone', 'smartphone', 'gsm', 'смартфон'],
            'phone' => ['телефон', 'smartphone', 'gsm'],
        ];

        foreach ($expansions as $key => $values) {
            if (str_contains($query, $key)) {
                $keywords = array_merge($keywords, $values);
            }
        }
        return array_unique($keywords);
    }
}
