<?php

namespace App\Controller;

use App\Repository\ReviewRepository;
use App\Service\ProfitShareService;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\Routing\Attribute\Route;
use Psr\Log\LoggerInterface;

class ReviewController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        Request $request,
        ReviewRepository $reviewRepository,
        PaginatorInterface $paginator
    ): Response {
        // 1. Взимаме параметъра "source" от URL-а (ако е кликнат бутон от жълтата лента)
        // Например: ?source=alleop или ?source=fashion_days
        $source = $request->query->get('source');

        // 2. Създаваме основната заявка
        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true)
            ->orderBy('r.createdAt', 'DESC');

        // 3. АКО има избран източник, филтрираме по URL
        if ($source) {
            if ($source === 'alleop') {
                // Търсим продукти, чийто оригинален линк съдържа 'alleop'
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%alleop%');
            }
            elseif ($source === 'fashion_days') {
                // Търсим продукти от Fashion Days
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%fashiondays%');
            }
            elseif ($source === 'emag') {
                // Ако искаш бутон само за eMAG
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%emag%');
            }
        }

        // 4. Пагинация - 60 броя на страница
        $pagination = $paginator->paginate(
            $qb, /* заявката с филтрите */
            $request->query->getInt('page', 1), /* текуща страница */
            60 /* ЛИМИТ НА СТРАНИЦА */
        );

        return $this->render('review/index.html.twig', [
            'reviews' => $pagination,
        ]);
    }

    #[Route('/review/{slug}', name: 'app_review_show')]
    public function show(string $slug, ReviewRepository $reviewRepository): Response
    {
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // Find similar products across all platforms
        $similarProducts = $reviewRepository->findSimilarAcrossPlatforms(
            $review->getTitle(),
            $review->getId(),
            18  // Get up to 18 products (6 per platform max)
        );

        // Group similar products by platform (max 6 per platform)
        $productsByPlatform = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        foreach ($similarProducts as $product) {
            $url = $product->getOriginalProductUrl();
            if (str_contains($url, 'emag.bg') && count($productsByPlatform['emag']) < 6) {
                $productsByPlatform['emag'][] = $product;
            } elseif (str_contains($url, 'fashiondays') && count($productsByPlatform['fashiondays']) < 6) {
                $productsByPlatform['fashiondays'][] = $product;
            } elseif (str_contains($url, 'alleop') && count($productsByPlatform['alleop']) < 6) {
                $productsByPlatform['alleop'][] = $product;
            }
        }

        return $this->render('review/show.html.twig', [
            'review' => $review,
            'similarProducts' => $productsByPlatform,
        ]);
    }

    /**
     * Search for products with smart keyword matching
     */
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

        // Smart search: expand short keywords to full words
        // тв -> телевизор, ел -> електро, etc.
        $expandedKeywords = $this->expandSearchKeywords($query);

        // Build query with OR conditions for all keywords
        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true);

        // Add search conditions for each expanded keyword
        // Use LOWER() for case-insensitive search in PostgreSQL
        if (!empty($expandedKeywords)) {
            $orConditions = [];

            foreach ($expandedKeywords as $index => $keyword) {
                $paramTitle = 'title' . $index;
                $paramContent = 'content' . $index;
                $paramMeta = 'meta' . $index;
                $paramCategory = 'category' . $index;

                // Use LOWER() for case-insensitive matching
                $orConditions[] = "LOWER(r.title) LIKE LOWER(:$paramTitle)";
                $orConditions[] = "LOWER(r.content) LIKE LOWER(:$paramContent)";
                $orConditions[] = "LOWER(r.metaDescription) LIKE LOWER(:$paramMeta)";
                $orConditions[] = "LOWER(r.category) LIKE LOWER(:$paramCategory)";

                // Add wildcards for partial matching
                $searchPattern = '%' . mb_strtolower($keyword, 'UTF-8') . '%';
                $qb->setParameter($paramTitle, $searchPattern);
                $qb->setParameter($paramContent, $searchPattern);
                $qb->setParameter($paramMeta, $searchPattern);
                $qb->setParameter($paramCategory, $searchPattern);
            }

            $qb->andWhere(implode(' OR ', $orConditions));
        }

        $qb->orderBy('r.createdAt', 'DESC');

        // Pagination
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

    /**
     * Expand search keywords: тв -> телевизор, laptop -> лаптоп, etc.
     */
    private function expandSearchKeywords(string $query): array
    {
        $query = mb_strtolower($query, 'UTF-8');
        $keywords = [$query]; // Always include original query

        // Keyword expansion map
        $expansions = [
            'тв' => ['телевизор', 'televizor', 'tv', 'smart tv'],
            'laptop' => ['лаптоп', 'notebook', 'ноутбук'],
            'лаптоп' => ['laptop', 'notebook'],
            'телефон' => ['phone', 'smartphone', 'gsm', 'смартфон'],
            'phone' => ['телефон', 'smartphone', 'gsm'],
            'таблет' => ['tablet', 'ipad'],
            'tablet' => ['таблет', 'ipad'],
            'кафемашина' => ['coffee machine', 'espresso', 'кафе'],
            'пералня' => ['washing machine', 'перална'],
            'хладилник' => ['fridge', 'refrigerator'],
            'печка' => ['oven', 'фурна'],
            'миялна' => ['dishwasher', 'съдомиялна'],
            'климатик' => ['air conditioner', 'ac'],
            'аспиратор' => ['vacuum cleaner', 'прахосмукачка'],
            'дрон' => ['drone', 'квадрокоптер'],
            'слушалки' => ['headphones', 'earphones', 'наушници'],
            'мишка' => ['mouse', 'геймърска'],
            'клавиатура' => ['keyboard'],
            'монитор' => ['monitor', 'display', 'екран'],
            'принтер' => ['printer', 'скенер'],
            'роутер' => ['router', 'рутер'],
            'камера' => ['camera', 'фотоапарат'],
            'конзола' => ['console', 'playstation', 'xbox', 'ps'],
        ];

        // Check if query matches any expansion key
        foreach ($expansions as $key => $values) {
            if (str_contains($query, $key)) {
                $keywords = array_merge($keywords, $values);
            }
        }

        return array_unique($keywords);
    }

    /**
     * Redirect to affiliate link - generates ProfitShare link on-the-fly
     * Това се ползва, когато потребителят натисне "Купи"
     */
    #[Route('/buy/{id}', name: 'app_buy_redirect', methods: ['GET'])]
    public function buyRedirect(
        int $id,
        ReviewRepository $reviewRepository,
        ProfitShareService $profitShareService,
        LoggerInterface $logger
    ): RedirectResponse {
        $review = $reviewRepository->find($id);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // Взимаме оригиналния линк, за да генерираме афилиейт връзка
        $productUrl = $review->getOriginalProductUrl();

        // Ако няма оригинален URL (за стари записи), ползваме текущия affiliateLink като fallback
        if (!$productUrl) {
            return $this->redirect($review->getAffiliateLink());
        }

        // Определяме ID на рекламодателя спрямо URL-а
        $advertiserId = '35'; // По подразбиране eMAG
        if (str_contains($productUrl, 'fashiondays')) {
            $advertiserId = '84'; // Fashion Days ID
        } elseif (str_contains($productUrl, 'alleop')) {
            $advertiserId = '125'; // AlleOp ID (провери го в ProfitShare!)
        }

        // Генерираме нов, пресен линк
        $affiliateLink = $profitShareService->generateAffiliateLink(
            $advertiserId,
            $productUrl,
            'click-' . $review->getId()
        );

        // Ако API-то върне грешка, ползваме записания в базата
        if (!$affiliateLink) {
            $logger->warning("Failed to generate fresh link for #{$id}, using cached.");
            $affiliateLink = $review->getAffiliateLink();
        }

        return $this->redirect($affiliateLink);
    }

    /**
     * Price comparison across platforms
     */
    #[Route('/compare-prices', name: 'app_compare_prices')]
    public function comparePrices(
        Request $request,
        ReviewRepository $reviewRepository
    ): Response {
        $query = $request->query->get('q', '');

        if (empty($query)) {
            return $this->render('review/compare_prices.html.twig', [
                'query' => '',
                'products' => [],
            ]);
        }

        // Get products grouped by platform
        $productsByPlatform = $reviewRepository->findForPriceComparison($query);

        return $this->render('review/compare_prices.html.twig', [
            'query' => $query,
            'products' => $productsByPlatform,
        ]);
    }

    /**
     * Compare similar products on single product page
     */
    #[Route('/review/{slug}/compare', name: 'app_review_compare')]
    public function compareProduct(
        string $slug,
        ReviewRepository $reviewRepository
    ): Response {
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // Find similar products across platforms
        $similarProducts = $reviewRepository->findSimilarAcrossPlatforms(
            $review->getTitle(),
            $review->getId(),
            20
        );

        // Group by platform
        $productsByPlatform = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        foreach ($similarProducts as $product) {
            $url = $product->getOriginalProductUrl();
            if (str_contains($url, 'emag.bg')) {
                $productsByPlatform['emag'][] = $product;
            } elseif (str_contains($url, 'fashiondays')) {
                $productsByPlatform['fashiondays'][] = $product;
            } elseif (str_contains($url, 'alleop')) {
                $productsByPlatform['alleop'][] = $product;
            }
        }

        return $this->render('review/compare_product.html.twig', [
            'review' => $review,
            'products' => $productsByPlatform,
        ]);
    }
}
