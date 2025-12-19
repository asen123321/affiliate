<?php

namespace App\Command;

use App\Entity\Review;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:scrape-product',
    description: 'Скрейпва продукт от eMAG и създава подробно ревю тип Wirecutter',
)]
class ScrapeProductCommand extends Command
{
    private const BADGES = [
        'Our Top Pick',
        'Budget Pick',
        'Upgrade Pick',
    ];

    public function __construct(
        private readonly EntityManagerInterface $entityManager,
        private readonly SluggerInterface $slugger
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('emag_url', InputArgument::REQUIRED, 'URL на продукта в eMAG')
            ->addArgument('affiliate_url', InputArgument::REQUIRED, 'Твоят Profitshare линк за бутона Купи')
            ->addOption('rating', 'r', InputOption::VALUE_OPTIONAL, 'Оценка (1-5)', 5)
            ->addOption('badge', 'b', InputOption::VALUE_OPTIONAL, 'Значка (Our Top Pick, Budget Pick, etc)')
            ->addOption('unpublished', null, InputOption::VALUE_NONE, 'Запази като чернова (скрито)');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        $emagUrl = $input->getArgument('emag_url');
        $affiliateUrl = $input->getArgument('affiliate_url');
        $rating = (int) $input->getOption('rating');
        $customBadge = $input->getOption('badge');
        $isPublished = !$input->getOption('unpublished');

        $io->title('Wirecutter-Style Product Review Generator');

        // 1. Скрейпване на данните
        $io->section('📥 Стъпка 1: Скрейпване на данни от eMAG...');

        try {
            $productData = $this->scrapeEmag($emagUrl);

            if (!$productData) {
                $io->error('Неуспешно скрейпване на URL.');
                return Command::FAILURE;
            }

            $io->table(
                ['Поле', 'Стойност'],
                [
                    ['Заглавие', $this->truncate($productData['title'], 50)],
                    ['Цена', $productData['price'] . ' лв.'],
                    ['Снимка', $this->truncate($productData['imageUrl'], 50)],
                ]
            );

        } catch (\Exception $e) {
            $io->error('Грешка при скрейпване: ' . $e->getMessage());
            return Command::FAILURE;
        }

        // 2. Избор на значка
        $badge = $customBadge && in_array($customBadge, self::BADGES)
            ? $customBadge
            : self::BADGES[array_rand(self::BADGES)];

        $io->text(sprintf('Значка: <comment>%s</comment>', $badge));

        // 3. Генериране на Slug
        $slug = $this->slugger->slug($productData['title'])->lower()->toString();
        // Добавяме random ID, за да е уникален
        $slug .= '-' . uniqid();

        // 4. Генериране на съдържанието (Wirecutter style)
        $io->section('✍️ Стъпка 4: Генериране на съдържание...');

        $content = $this->generateWirecutterContent(
            $productData['title'],
            $productData['price'],
            $badge
        );

        // 5. Запис в базата
        $io->section('💾 Стъпка 5: Запис в базата данни...');

        $review = new Review();
        $review->setTitle($productData['title']);
        $review->setSlug($slug);
        $review->setPrice((string)$productData['price']);
        $review->setRating($rating);
        $review->setImageUrl($productData['imageUrl']);
        $review->setAffiliateLink($affiliateUrl);
        $review->setBadge($badge);
        $review->setIsPublished($isPublished);
        $review->setCreatedAt(new \DateTimeImmutable());
        $review->setOriginalProductUrl($emagUrl); // Важно за проверки

        // Мета описание
        $metaDesc = sprintf('%s ревю: Експертен анализ на %s. Вижте нашето мнение.', $badge, $productData['title']);
        $review->setMetaDescription(mb_substr($metaDesc, 0, 160));

        $review->setContent($content);

        try {
            $this->entityManager->persist($review);
            $this->entityManager->flush();

            $io->success('Ревюто е записано успешно!');
            $io->note(sprintf('Виж го тук: /review/%s', $review->getSlug()));

        } catch (\Exception $e) {
            $io->error('Грешка при запис в базата: ' . $e->getMessage());
            return Command::FAILURE;
        }

        return Command::SUCCESS;
    }

    private function scrapeEmag(string $url): ?array
    {
        $ch = curl_init();
        curl_setopt_array($ch, [
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_USERAGENT => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_TIMEOUT => 30
        ]);
        $html = curl_exec($ch);
        curl_close($ch);

        if (!$html) return null;

        $crawler = new Crawler($html);
        $data = [];

        // Title
        $data['title'] = trim($crawler->filter('h1.page-title')->text('Unknown Product'));

        // Price
        $priceNode = $crawler->filter('.product-new-price')->first();
        if ($priceNode->count() > 0) {
            $priceText = $priceNode->text();
            // Премахване на валута и форматиране
            $priceText = preg_replace('/[^\d.,]/', '', $priceText); // Оставя само цифри, точки и запетаи
            $priceText = str_replace('.', '', $priceText); // Маха точките за хиляди (ако има)
            $priceText = str_replace(',', '.', $priceText); // Сменя десетичната запетая с точка
            $data['price'] = (float)$priceText;
        } else {
            $data['price'] = 0.00;
        }

        // Image
        $imgNode = $crawler->filter('.product-gallery-inner img, .thumbnail-wrapper img')->first();
        if ($imgNode->count() > 0) {
            $data['imageUrl'] = $imgNode->attr('src');
        } else {
            $data['imageUrl'] = '';
        }

        return $data;
    }

    private function generateWirecutterContent(string $title, float $price, string $badge): string
    {
        $titleEscaped = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $priceFormatted = number_format($price, 2, '.', ' ');

        // HTML структура
        $html = '<div class="alert alert-primary border-primary shadow-sm mb-4">';
        $html .= '<h4 class="alert-heading mb-0"><i class="bi bi-award-fill me-2"></i>' . $badge . '</h4>';
        $html .= '</div>';

        // Присъдата
        $html .= '<h2>Присъдата</h2>';
        $html .= '<p class="lead">Моделът <strong>' . $titleEscaped . '</strong> ';

        switch ($badge) {
            case 'Our Top Pick':
                $html .= 'е нашият топ избор след проучване на пазара. ';
                $html .= 'Той предлага най-добрата комбинация от производителност и цена за повечето хора. ';
                $html .= 'На цена от ' . $priceFormatted . ' лв., това е инвестиция, за която няма да съжалявате.';
                break;
            case 'Budget Pick':
                $html .= 'предлага изключителна стойност за бюджета, без големи компромиси. ';
                $html .= 'Въпреки че може да няма всички екстри на премиум моделите, той покрива основните изисквания перфектно. ';
                $html .= 'Само за ' . $priceFormatted . ' лв., това е любимият ни достъпен вариант.';
                break;
            case 'Upgrade Pick':
                $html .= 'е за тези, които искат абсолютно най-доброто и са готови да платят за премиум функции. ';
                $html .= 'Той превъзхожда конкуренцията с качество на изработка и модерни технологии. ';
                break;
        }
        $html .= '</p>';

        // Защо ни харесва
        $html .= '<h3>Защо ни харесва</h3>';
        $html .= '<p>След преглед на спецификациите, ето какво се отличава:</p>';
        $html .= '<ul>';
        $html .= '<li><strong>Отлично качество:</strong> Солидна конструкция и надеждност.</li>';
        $html .= '<li><strong>Добра производителност:</strong> Справя се отлично с поставените задачи.</li>';
        $html .= '<li><strong>Модерен дизайн:</strong> Пасва чудесно на всеки интериор или стил.</li>';
        $html .= '</ul>';

        // Плюсове и Минуси (Grid)
        $html .= '<div class="pros-cons row mt-4 mb-4">';

        // Pros
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-success h-100">';
        $html .= '<div class="card-header bg-success text-white"><h4 class="mb-0">Плюсове</h4></div>';
        $html .= '<div class="card-body"><ul class="mb-0">';
        $html .= '<li>Отлично съотношение цена/качество</li>';
        $html .= '<li>Висока надеждност</li>';
        $html .= '<li>Лесна употреба</li>';
        $html .= '</ul></div></div></div>';

        // Cons
        $html .= '<div class="col-md-6 mb-3">';
        $html .= '<div class="card border-danger h-100">';
        $html .= '<div class="card-header bg-danger text-white"><h4 class="mb-0">Минуси</h4></div>';
        $html .= '<div class="card-body"><ul class="mb-0">';
        $html .= '<li>Може да е скъп за някои бюджети</li>';
        $html .= '<li>Ограничена наличност понякога</li>';
        $html .= '</ul></div></div></div>';

        $html .= '</div>'; // End row

        // Заключение
        $html .= '<h3>Заключение</h3>';
        $html .= '<p>Ако търсите надежден продукт в тази категория, <strong>' . $titleEscaped . '</strong> е сигурен залог.</p>';

        return $html;
    }

    private function truncate(string $text, int $length): string
    {
        if (mb_strlen($text) <= $length) {
            return $text;
        }
        return mb_substr($text, 0, $length - 3) . '...';
    }
}
