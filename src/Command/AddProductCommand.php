<?php

namespace App\Command;

use App\Entity\Product;
use App\Entity\Review;
use App\Repository\ProductRepository;
use App\Repository\ReviewRepository;
use App\Service\ProfitShareService;
use App\Service\CategoryMappingService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:add-product',
    description: 'Manually add a product to the site (Great for eMAG)',
)]
class AddProductCommand extends Command
{
    public function __construct(
        private ProfitShareService $ps,
        private EntityManagerInterface $em,
        private ProductRepository $productRepo,
        private ReviewRepository $reviewRepo,
        private SluggerInterface $slugger,
        private CategoryMappingService $categoryMappingService
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'Original Product URL')
            ->addArgument('name', InputArgument::REQUIRED, 'Product Name')
            ->addArgument('price', InputArgument::REQUIRED, 'Price')
            ->addArgument('image', InputArgument::REQUIRED, 'Image URL')
            ->addOption('category', 'c', InputOption::VALUE_OPTIONAL, 'Category name (e.g., "Телефони", "Laptops")', 'Общи');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $url = $input->getArgument('url');
        $name = $input->getArgument('name');
        $price = (float)$input->getArgument('price');
        $image = $input->getArgument('image');
        $categoryName = $input->getOption('category');

        $io->title('➕ Adding Manual Product');

        // 1. Генериране на афилиейт линк (ID 35 = eMAG)
        $affiliateLink = $this->ps->generateAffiliateLink('35', $url, 'Manual: ' . $name);

        if (!$affiliateLink) {
            $io->warning('Could not generate affiliate link. Using original URL.');
            $affiliateLink = $url;
        } else {
            $io->success('Affiliate link generated!');
        }

        // 2. Създаване на Продукт
        $product = new Product();
        $product->setName($name);
        $product->setLink($affiliateLink);
        $product->setPrice($price);
        $product->setImage($image);

        // Map category using CategoryMappingService
        $localCategory = $this->categoryMappingService->findLocalCategory($categoryName);
        $product->setCategory($localCategory);

        // Set source (default to eMAG, ID 35)
        $product->setSource('eMAG');

        $product->setUpdatedAt(new \DateTimeImmutable());

        $this->em->persist($product);

        // 3. Създаване на Ревю (за да се вижда на сайта)
        $review = new Review();
        $review->setTitle($name);
        $review->setSlug($this->slugger->slug($name)->lower() . '-' . uniqid());
        $review->setMetaDescription("Най-добрата цена за $name само в eMAG!");

        $content = sprintf(
            "<h2>Ревю на %s</h2><p>Това е топ продукт на цена <strong>%.2f лв</strong>.</p>" .
            "<ul><li>✅ Оригинален продукт от eMAG</li><li>✅ Гаранция</li></ul>" .
            "<p>Поръчай сега!</p>",
            $name, $price
        );
        $review->setContent($content);

        $review->setAffiliateLink($affiliateLink);
        $review->setOriginalProductUrl($url);
        $review->setImageUrl($image);
        $review->setPrice((string)$price);
        $review->setRating(5);
        $review->setIsPublished(true);
        $review->setBadge('TOP CHOICE');

        $this->em->persist($review);
        $this->em->flush();

        $io->success("✅ Product '$name' added successfully! Check your homepage.");

        return Command::SUCCESS;
    }
}
