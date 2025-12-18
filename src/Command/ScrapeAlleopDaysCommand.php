<?php

namespace App\Command;

use App\Service\ProfitShareService;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Panther\Client;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:scrape-alleop',
    description: 'Професионален Panther скрейпър за Alleop.bg (Anti-Bot)',
)]
class ScrapeAlleopDaysCommand extends Command
{
    private const BASE_URL = 'https://www.alleop.bg';
    private const ADV_ID = '85'; // Alleop ID в Profitshare
    private const AFFILIATE_BASE = 'https://profitshare.bg/l/3608310'; // Affiliate base link

    public function __construct(
        private ProfitShareService $ps,
        private Connection $connection,
        private SluggerInterface $slugger
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'URL от Alleop за скрейпване')
            ->addOption('pages', 'p', InputOption::VALUE_OPTIONAL, 'Брой страници за обхождане', 1)
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Игнорирай проверката за съществуващи продукти');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $url = $input->getArgument('url');
        $maxPages = (int)$input->getOption('pages');
        $force = $input->getOption('force');

        $io->title("🛒 ALLEOP SCRAPER - PANTHER MODE");

        // Стартиране на Chrome в Headless режим (без графичен интерфейс)
        $client = Client::createChromeClient(null, [
            '--headless',
            '--no-sandbox',
            '--disable-dev-shm-usage',
            '--user-agent=Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/121.0.0.0 Safari/537.36'
        ]);

        try {
            for ($page = 1; $page <= $maxPages; $page++) {
                $io->section("📄 Страница $page");

                $currentUrl = $page > 1 ? $url . '?page=' . $page : $url;
                $client->request('GET', $currentUrl);

                // Изчакваме зареждането на страницата
                $io->info("Изчакване на зареждането на страницата...");
                sleep(8);

                $crawler = $client->getCrawler();

                // Селектори за продуктите - използваме .product-miniature за Alleop
                $nodes = $crawler->filter('article.product-miniature');

                if ($nodes->count() === 0) {
                    $io->error("Не бяха открити продукти. Структурата може да е променена или все още се зарежда.");

                    // Debug информация
                    $html = $crawler->html();
                    if (strpos($html, 'Cloudflare') !== false || strpos($html, 'challenge') !== false) {
                        $io->warning("Cloudflare блокира скрейпъра. Опитайте с по-дълго изчакване.");
                    }

                    // Опит за повече време
                    $io->info("Опит за по-дълго изчакване (15 секунди)...");
                    sleep(15);
                    $crawler = $client->getCrawler();
                    $nodes = $crawler->filter('article.product-miniature');

                    if ($nodes->count() === 0) {
                        $io->error("Все още няма продукти. Прекъсване.");
                        break;
                    }
                }

                $io->note("Намерени са " . $nodes->count() . " продукта.");

                $productCount = 0;
                $nodes->each(function ($nodeCrawler) use ($io, $force, &$productCount) {
                    try {
                        // 1. Извличане на линк от <a> в .product-title
                        $linkNode = $nodeCrawler->filter('h2.product-title a, h3.product-title a')->first();
                        if ($linkNode->count() === 0) {
                            $io->write("<fg=yellow>?</>");
                            return;
                        }

                        $pLink = $linkNode->attr('href');
                        // Премахване на Luigi's Box параметри
                        $pLink = preg_replace('/\?lb=.*$/', '', $pLink);
                        if (str_starts_with($pLink, '/')) $pLink = self::BASE_URL . $pLink;

                        // Проверка за дубликат
                        if (!$force) {
                            $exists = $this->connection->fetchOne('SELECT id FROM review WHERE original_product_url = ?', [$pLink]);
                            if ($exists) { $io->write("<fg=gray>.</>"); return; }
                        }

                        // 2. Име на продукта
                        $name = trim($linkNode->text());
                        if (empty($name)) {
                            $name = "Alleop Product";
                        }

                        // 3. Цена - извличане от .price
                        $price = 0;
                        $priceNode = $nodeCrawler->filter('span.price');
                        if ($priceNode->count() > 0) {
                            $priceText = $priceNode->text();
                            // Премахване на всички символи освен цифри и точка
                            $priceText = preg_replace('/[^\d.]/', '', $priceText);
                            $price = (float)$priceText;
                        }

                        // 4. Снимка - използваме img в .thumbnail
                        $imgNode = $nodeCrawler->filter('.thumbnail img')->first();
                        $image = null;
                        if ($imgNode->count() > 0) {
                            $image = $imgNode->attr('src') ?: $imgNode->attr('data-src');
                            // Ако е относителен път
                            if ($image && str_starts_with($image, '/')) {
                                $image = self::BASE_URL . $image;
                            }
                        }

                        // 5. Генериране на Profitshare affiliate link
                        $affLink = self::AFFILIATE_BASE . '?u=' . urlencode($pLink);

                        $this->saveToDb($name, $affLink, $price, $image, $pLink, $io);
                        $io->write("<info>✔</info>");
                        $productCount++;

                    } catch (\Exception $e) {
                        // Показваме детайлите само на първите 3 грешки
                        static $errorCount = 0;
                        if ($errorCount < 3) {
                            $io->writeln("");
                            $io->error("Грешка при продукт #" . ($productCount + 1) . ": " . $e->getMessage());
                            $errorCount++;
                        }
                        $io->write("<error>E</error>");
                    }
                });

                $io->writeln("");
                $io->success("Страница $page обработена с $productCount продукта.");
            }
        } finally {
            $client->quit(); // Затваряне на браузъра
        }

        $io->success("Импортът приключи успешно!");
        return Command::SUCCESS;
    }

    private function saveToDb($name, $affLink, $price, $image, $origLink, $io): void
    {
        $shortName = mb_substr($name, 0, 180, 'UTF-8');
        $slug = $this->slugger->slug($shortName)->lower()->toString() . '-' . uniqid();
        $now = (new \DateTimeImmutable())->format('Y-m-d H:i:s');

        // Truncate fields to fit in database constraints
        if ($image && mb_strlen($image) > 255) {
            $image = mb_substr($image, 0, 255);
        }

        // Добавяне на source параметър към affiliate link
        if (strpos($affLink, '?') !== false) {
            $affLink .= '&source=alleop';
        } else {
            $affLink .= '?source=alleop';
        }

        // Truncate affiliate link to 500 chars
        if (mb_strlen($affLink) > 500) {
            $affLink = mb_substr($affLink, 0, 500);
        }

        // Truncate original URL to 500 chars
        if (mb_strlen($origLink) > 500) {
            $origLink = mb_substr($origLink, 0, 500);
        }

        try {
            // Запис в product
            $this->connection->executeStatement(
                'INSERT INTO product (name, link, price, image, category, updated_at) VALUES (?, ?, ?, ?, ?, ?) ON CONFLICT DO NOTHING',
                [$shortName, $affLink, $price, $image, 'alleop', $now]
            );

            // Запис в review
            $this->connection->executeStatement(
                'INSERT INTO review (title, slug, content, affiliate_link, original_product_url, image_url, price, rating, is_published, badge, created_at, meta_description)
                 VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                [$shortName, $slug, "Топ оферта от Alleop за $shortName!", $affLink, $origLink, $image, (string)$price, 5, 1, 'HOT', $now, "Купи сега $shortName"]
            );
        } catch (\Exception $e) {
            $io->writeln("");
            $io->warning("Грешка при запис: " . $e->getMessage());
        }
    }
}
