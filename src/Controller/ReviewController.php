<?php

namespace App\Controller;

use App\Repository\ProductRepository;
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
    #[Cache(public: true, smaxage: 3600)]
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
    public function show(string $slug, ReviewRepository $reviewRepository, ProductRepository $productRepository): Response
    {
        // 1. Намираме текущото ревю
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // 2. Определяме дума за търсене от заглавието (без "Стойка...")
        $title = trim($review->getTitle());
        $parts = explode(' ', $title);
        $firstWord = mb_strtolower($parts[0]);

        if (mb_strlen($firstWord) < 4 && isset($parts[1])) {
            $searchTerm = $firstWord . ' ' . mb_strtolower($parts[1]);
        } else {
            $searchTerm = $firstWord;
        }

        $allSimilarProducts = [];

        // --- 3. ТЪРСЕНЕ В eMAG (Таблица Review) ---
        // Използваме LIKE :startTerm%, за да хващаме само продукти, започващи с думата
        $emagResults = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.price > 0')
            ->andWhere('r.id != :currentId')
            ->andWhere('LOWER(r.title) LIKE :startTerm')
            ->setParameter('true', true)
            ->setParameter('currentId', $review->getId())
            ->setParameter('startTerm', $searchTerm . '%')
            ->setMaxResults(6)
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
                'badge_class' => 'bg-danger'
            ];
        }

        // --- 4. ТЪРСЕНЕ В ALLEOP (Таблица Product) ---
        $alleopResults = $productRepository->createQueryBuilder('p')
            ->where('p.price > 0')
            ->andWhere('LOWER(p.name) LIKE :startTerm')
            ->setParameter('startTerm', $searchTerm . '%')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();

        foreach ($alleopResults as $item) {
            $allSimilarProducts[] = [
                'title' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'link'  => $item->getLink(),
                'platform' => 'Alleop',
                'badge_class' => 'bg-success'
            ];
        }

        // --- 5. ТЪРСЕНЕ В FASHION DAYS (Таблица Product) ---
        // Ако искаш да се показват и дрехи като подобни (ако заглавието съвпада)
        $fashionResults = $productRepository->createQueryBuilder('p')
            ->where('p.category = :cat')
            ->andWhere('LOWER(p.name) LIKE :startTerm')
            ->setParameter('cat', 'FashionDays')
            ->setParameter('startTerm', $searchTerm . '%')
            ->setMaxResults(6)
            ->getQuery()
            ->getResult();

        foreach ($fashionResults as $item) {
            $allSimilarProducts[] = [
                'title' => $item->getName(),
                'price' => $item->getPrice(),
                'image' => $item->getImage(),
                'link'  => $item->getLink(),
                'platform' => 'Fashion Days',
                'badge_class' => 'bg-dark'
            ];
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
        ProductRepository $productRepository
    ): Response {
        $query = $request->query->get('q', '');

        $productsByPlatform = [
            'emag' => [],
            'fashiondays' => [],
            'alleop' => []
        ];

        if (empty($query)) {
            return $this->render('review/compare_prices.html.twig', [
                'query' => '',
                'products' => $productsByPlatform
            ]);
        }

        $searchTerm = mb_strtolower(trim($query));

        // 1. eMAG (Review)
        $emagResults = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :true')
            ->andWhere('r.badge = :badge OR r.originalProductUrl LIKE :url')
            ->andWhere('LOWER(r.title) LIKE :term OR LOWER(r.category) LIKE :term')
            ->andWhere('r.price > 0')
            ->setParameter('true', true)
            ->setParameter('badge', 'EMAG')
            ->setParameter('url', '%emag%')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->orderBy('r.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        $productsByPlatform['emag'] = $emagResults;

        // 2. ALLEOP (Product) - Mapping
        $alleopRaw = $productRepository->createQueryBuilder('p')
            ->where('LOWER(p.name) LIKE :term OR LOWER(p.category) LIKE :term')
            ->andWhere('p.link LIKE :url OR p.category = :retailer')
            ->andWhere('p.price > 0')
            ->setParameter('term', '%' . $searchTerm . '%')
            ->setParameter('url', '%alleop%')
            ->setParameter('retailer', 'ALLEOP')
            ->orderBy('p.price', 'ASC')
            ->setMaxResults(20)
            ->getQuery()
            ->getResult();

        foreach ($alleopRaw as $prod) {
            $productsByPlatform['alleop'][] = [
                'id' => $prod->getId(),
                'title' => $prod->getName(),
                'price' => $prod->getPrice(),
                'imageUrl' => $prod->getImage(),
                'slug' => null,
                'link' => $prod->getLink(),
                'rating' => 0,
                'is_product_entity' => true
            ];
        }

        return $this->render('review/compare_prices.html.twig', [
            'query' => $query,
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
