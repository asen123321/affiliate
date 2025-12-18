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
    /**
     * Начална страница със списък от оферти и филтриране по магазин.
     */
    #[Route('/', name: 'app_home')]
    public function index(
        Request $request,
        ReviewRepository $reviewRepository,
        PaginatorInterface $paginator
    ): Response {
        // 1. Взимаме параметъра "source" от URL (напр. ?source=fashion_days)
        $source = $request->query->get('source');

        // 2. Създаваме QueryBuilder за извличане на публикуваните ревюта
        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true)
            ->orderBy('r.createdAt', 'DESC');

        // 3. Филтриране според избрания източник
        if ($source) {
            if ($source === 'alleop') {
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%alleop.bg%');
            } elseif ($source === 'fashion_days') {
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%fashiondays.bg%');
            } elseif ($source === 'emag') {
                $qb->andWhere('r.originalProductUrl LIKE :sourceUrl')
                    ->setParameter('sourceUrl', '%emag.bg%');
            }
        }

        // 4. Пагинация - 60 продукта на страница
        $pagination = $paginator->paginate(
            $qb,
            $request->query->getInt('page', 1),
            60
        );

        return $this->render('review/index.html.twig', [
            'reviews' => $pagination,
        ]);
    }

    /**
     * Детайлна страница за конкретен продукт/ревю.
     */
    #[Route('/review/{slug}', name: 'app_review_show')]
    public function show(string $slug, ReviewRepository $reviewRepository): Response
    {
        $review = $reviewRepository->findOneBy(['slug' => $slug, 'isPublished' => true]);

        if (!$review) {
            throw $this->createNotFoundException('Review not found');
        }

        // Намиране на подобни продукти за препоръки
        $similarProducts = $reviewRepository->findSimilarProducts($review, 4);

        return $this->render('review/show.html.twig', [
            'review' => $review,
            'similarProducts' => $similarProducts,
        ]);
    }

    /**
     * Търсене на продукти по ключова дума.
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

        // Създаваме QueryBuilder за търсене
        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.title LIKE :query OR r.content LIKE :query OR r.metaDescription LIKE :query')
            ->setParameter('status', true)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('r.createdAt', 'DESC');

        // Пагинация
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
     * Сравнение на продукти по категория.
     */
    #[Route('/compare/{category}', name: 'app_compare')]
    public function compare(
        string $category,
        ReviewRepository $reviewRepository
    ): Response {
        $products = $reviewRepository->findBestByCategory($category, 10);

        if (empty($products)) {
            throw $this->createNotFoundException('No products found for this category');
        }

        return $this->render('review/compare.html.twig', [
            'products' => $products,
            'category' => $category,
        ]);
    }

    /**
     * Генерира пресен афилиейт линк в реално време и пренасочва потребителя към магазина.
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

        $productUrl = $review->getOriginalProductUrl();

        // Fallback: ако няма оригинален URL, използваме кеширания афилиейт линк
        if (!$productUrl) {
            return $this->redirect($review->getAffiliateLink());
        }

        // Определяне на Advertiser ID за Profitshare
        $advertiserId = '35'; // eMAG по подразбиране
        if (str_contains($productUrl, 'fashiondays')) {
            $advertiserId = '84'; // Fashion Days
        } elseif (str_contains($productUrl, 'alleop')) {
            $advertiserId = '125'; // AlleOp
        }

        // Генериране на нов афилиейт линк чрез API-то на ProfitShare
        try {
            $affiliateLink = $profitShareService->generateAffiliateLink(
                $advertiserId,
                $productUrl,
                'click-' . $review->getId()
            );
        } catch (\Exception $e) {
            $logger->error("Profitshare API Error: " . $e->getMessage());
            $affiliateLink = null;
        }

        // Ако API генерирането се провали, използваме стария линк от базата
        if (!$affiliateLink) {
            $logger->warning("Using cached affiliate link for product #{$id}");
            $affiliateLink = $review->getAffiliateLink();
        }

        return $this->redirect($affiliateLink);
    }
}
