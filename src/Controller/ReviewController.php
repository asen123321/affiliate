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

        return $this->render('review/show.html.twig', [
            'review' => $review,
        ]);
    }

    /**
     * Search for products
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

        // Search in title, content, and meta description
        $qb = $reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->andWhere('r.title LIKE :query OR r.content LIKE :query OR r.metaDescription LIKE :query')
            ->setParameter('status', true)
            ->setParameter('query', '%' . $query . '%')
            ->orderBy('r.createdAt', 'DESC');

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
}
