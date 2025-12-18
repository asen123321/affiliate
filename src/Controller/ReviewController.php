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

        return $this->render('review/show.html.twig', [
            'review' => $review,
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
