<?php

namespace App\Controller;

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
    #[Cache(public: true, smaxage: 3600)] // <--- Кеширай за 1 час (3600 сек)
    public function index(
        Request $request,
        ReviewRepository $reviewRepository,
        PaginatorInterface $paginator
    ): Response {
        $source = $request->query->get('source');

        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true)
            // 1. СКРИВАМЕ ПРОДУКТИ БЕЗ ЦЕНА
            ->andWhere('r.price IS NOT NULL')
            ->andWhere('r.price > 0')
            ->orderBy('r.createdAt', 'DESC');

        if ($source) {
            // Тук също ползваме Badge за по-сигурно
            if ($source === 'alleop') {
                $qb->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                    ->setParameter('badge', 'ALLEOP')
                    ->setParameter('url', '%alleop%');
            } elseif ($source === 'emag') {
                $qb->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                    ->setParameter('badge', 'EMAG')
                    ->setParameter('url', '%emag%');
            } elseif ($source === 'fashion_days') {
                $qb->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
                    ->setParameter('badge', 'FASHION DAYS')
                    ->setParameter('url', '%fashiondays%');
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
    public function show(string $slug, ReviewRepository $reviewRepository): Response
    {
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        $similarProducts = $reviewRepository->findSimilarAcrossPlatforms(
            $review->getTitle(),
            $review->getId(),
            18
        );

        $productsByPlatform = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        foreach ($similarProducts as $product) {
            // 1. Проверка за цена
            if (!$product->getPrice() || $product->getPrice() <= 0) {
                continue;
            }

            // 2. СИГУРНА ПРОВЕРКА ЗА МАГАЗИН (Badge + URL)
            $url = strtolower($product->getOriginalProductUrl() ?? '');
            $badge = strtoupper($product->getBadge() ?? '');

            if ($badge === 'EMAG' || str_contains($url, 'emag.bg')) {
                if (count($productsByPlatform['emag']) < 6) $productsByPlatform['emag'][] = $product;
            }
            elseif (str_contains($badge, 'FASHION') || str_contains($url, 'fashiondays')) {
                if (count($productsByPlatform['fashiondays']) < 6) $productsByPlatform['fashiondays'][] = $product;
            }
            elseif ($badge === 'ALLEOP' || str_contains($url, 'alleop')) {
                if (count($productsByPlatform['alleop']) < 6) $productsByPlatform['alleop'][] = $product;
            }
        }

        return $this->render('review/show.html.twig', [
            'review' => $review,
            'similarProducts' => $productsByPlatform,
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
            // СКРИВАМЕ ПРОДУКТИ БЕЗ ЦЕНА И ТУК
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

        foreach ($expansions as $key => $values) {
            if (str_contains($query, $key)) {
                $keywords = array_merge($keywords, $values);
            }
        }
        return array_unique($keywords);
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
            $logger->warning("Failed to generate fresh link for #{$id}, using cached.");
            $affiliateLink = $review->getAffiliateLink();
        }
        return $this->redirect($affiliateLink);
    }

    #[Route('/compare-prices', name: 'app_compare_prices')]
    public function comparePrices(Request $request, ReviewRepository $reviewRepository): Response
    {
        $query = $request->query->get('q', '');
        if (empty($query)) {
            return $this->render('review/compare_prices.html.twig', ['query' => '', 'products' => []]);
        }

        // За по-сложно сравнение можеш да ползваш findForPriceComparison,
        // но тук ще направим същото филтриране ръчно за сигурност
        $products = $reviewRepository->findSimilarAcrossPlatforms($query, null, 50);

        $productsByPlatform = ['emag' => [], 'fashiondays' => [], 'alleop' => []];

        foreach ($products as $product) {
            if (!$product->getPrice() || $product->getPrice() <= 0) continue;

            $url = strtolower($product->getOriginalProductUrl() ?? '');
            $badge = strtoupper($product->getBadge() ?? '');

            if ($badge === 'EMAG' || str_contains($url, 'emag.bg')) {
                $productsByPlatform['emag'][] = $product;
            }
            elseif (str_contains($badge, 'FASHION') || str_contains($url, 'fashiondays')) {
                $productsByPlatform['fashiondays'][] = $product;
            }
            elseif ($badge === 'ALLEOP' || str_contains($url, 'alleop')) {
                $productsByPlatform['alleop'][] = $product;
            }
        }

        return $this->render('review/compare_prices.html.twig', ['query' => $query, 'products' => $productsByPlatform]);
    }

    #[Route('/review/{slug}/compare', name: 'app_review_compare')]
    public function compareProduct(string $slug, ReviewRepository $reviewRepository): Response
    {
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);
        if (!$review) throw $this->createNotFoundException('Review not found');

        $similarProducts = $reviewRepository->findSimilarAcrossPlatforms($review->getTitle(), $review->getId(), 20);

        $productsByPlatform = ['emag' => [], 'fashiondays' => [], 'alleop' => []];

        foreach ($similarProducts as $product) {
            // 1. Проверка за цена
            if (!$product->getPrice() || $product->getPrice() <= 0) continue;

            // 2. Сигурна проверка за магазин
            $url = strtolower($product->getOriginalProductUrl() ?? '');
            $badge = strtoupper($product->getBadge() ?? '');

            if ($badge === 'EMAG' || str_contains($url, 'emag.bg')) {
                $productsByPlatform['emag'][] = $product;
            }
            elseif (str_contains($badge, 'FASHION') || str_contains($url, 'fashiondays')) {
                $productsByPlatform['fashiondays'][] = $product;
            }
            elseif ($badge === 'ALLEOP' || str_contains($url, 'alleop')) {
                $productsByPlatform['alleop'][] = $product;
            }
        }

        return $this->render('review/compare_product.html.twig', ['review' => $review, 'products' => $productsByPlatform]);
    }
}
