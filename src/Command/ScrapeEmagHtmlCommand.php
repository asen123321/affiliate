<?php

namespace App\Command;

use App\Service\ProfitShareService;
use App\Service\HtmlSanitizerService;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Symfony\Component\String\Slugger\SluggerInterface;

#[AsCommand(
    name: 'app:scrape-html',
    description: 'Универсален скрейпър за eMAG, FashionDays и Alleop (SQL версия)',
)]
class ScrapeEmagHtmlCommand extends Command
{
    public function __construct(
        private HttpClientInterface $httpClient,
        private ProfitShareService $ps,
        private Connection $connection,
        private SluggerInterface $slugger,
        private HtmlSanitizerService $htmlSanitizer
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addArgument('url', InputArgument::REQUIRED, 'URL адрес за скрейпване')
            ->addOption('pages', 'p', InputOption::VALUE_OPTIONAL, 'Брой страници', 1)
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Игнорирай проверката за дубликати');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $currentUrl = $input->getArgument('url');
        $maxPages = (int)$input->getOption('pages');
        $force = $input->getOption('force');

        $platform = 'emag';
        if (str_contains($currentUrl, 'fashiondays.bg')) $platform = 'fashiondays';
        if (str_contains($currentUrl, 'alleop.bg')) $platform = 'alleop';

        $io->title("🚀 СТАРТ: " . strtoupper($platform));
        $totalImported = 0;

        for ($page = 1; $page <= $maxPages; $page++) {
            $io->section("📄 Страница $page");

            try {
                $response = $this->httpClient->request('GET', $currentUrl, [
                    'headers' => [
                        'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36',
                        'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
                    ],
                    'verify_peer' => false,
                ]);

                $crawler = new Crawler($response->getContent());

                $s = match($platform) {
                    'emag' => [
                        '.card-item, .card-v2-wrapper',
                        '.card-v2-title, .product-title',
                        'a.card-v2-thumb, a.product-image',
                        '.product-new-price, .price-current',
                        'a[aria-label="Next"], li.next a'
                    ],
                    'fashiondays' => ['.product-item', '.product-title', 'a.product-link', '.product-new-price', 'a.pagination-next'],
                    'alleop' => ['.product-miniature', '.product-title a', 'a.product-thumbnail', '.current-price', 'a.next'],
                };

                $nodes = $crawler->filter($s[0]);
                if ($nodes->count() === 0) {
                    $io->warning("Не са намерени продукти на тази страница.");
                    break;
                }

                foreach ($nodes as $node) {
                    try {
                        $nodeCrawler = new Crawler($node);

                        $nameNode = $nodeCrawler->filter($s[1]);
                        if ($nameNode->count() === 0) continue;
                        $name = trim($nameNode->text());

                        $linkNode = $nodeCrawler->filter($s[2]);
                        if ($linkNode->count() === 0) continue;
                        $originalLink = $linkNode->attr('href');

                        if (str_starts_with($originalLink, '/')) {
                            $base = match($platform) {
                                'emag' => 'https://www.emag.bg',
                                'fashiondays' => 'https://www.fashiondays.bg',
                                'alleop' => 'https://alleop.bg',
                            };
                            $originalLink = $base . $originalLink;
                        }

                        if (!$force) {
                            $exists = $this->connection->fetchOne('SELECT id FROM review WHERE original_product_url = ?', [$originalLink]);
                            if ($exists) { $io->write("<fg=gray>.</>"); continue; }
                        }

                        usleep(800000);

                        $advId = ($platform === 'fashiondays') ? '84' : (($platform === 'alleop') ? '125' : '35');
                        $affiliateLink = $this->ps->generateAffiliateLink($advId, $originalLink, mb_substr($name, 0, 15));

                        if (!$affiliateLink) {
                            $affiliateLink = $originalLink;
                        }

                        $imgNode = $nodeCrawler->filter('img');
                        $image = null;
                        if ($imgNode->count() > 0) {
                            $image = $imgNode->attr('data-src') ?: ($imgNode->attr('data-original') ?: $imgNode->attr('src'));
                        }

                        $priceNode = $nodeCrawler->filter($s[3]);
                        $price = 0.0;
                        if ($priceNode->count() > 0) {
                            $priceText = preg_replace('/[^0-9]/', '', $priceNode->text());
                            $price = (float)$priceText / 100;
                        }

                        $this->saveDirectly($name, $affiliateLink, $price, $image, $originalLink, $platform, $io);
                        $totalImported++;
                        $io->write("<info>✔</info>");

                    } catch (\Exception $e) {
                        $io->write("<error>F</error>");
                    }
                }

                $nextPage = $crawler->filter($s[4]);
                if ($page < $maxPages && $nextPage->count() > 0) {
                    $currentUrl = $nextPage->attr('href');
                    if (str_starts_with($currentUrl, '/')) {
                        $base = match($platform) {
                            'emag' => 'https://www.emag.bg',
                            'fashiondays' => 'https://www.fashiondays.bg',
                            'alleop' => 'https://alleop.bg',
                        };
                        $currentUrl = $base . $currentUrl;
                    }
                } else { break; }

            } catch (\Exception $e) {
                $io->error("Грешка при скрейпване: " . $e->getMessage());
                break;
            }
        }

        $io->newLine(2);
        $io->success("Готово! Импортирани: $totalImported");
        return Command::SUCCESS;
    }
    private function saveDirectly($name, $affLink, $price, $image, $origLink, $platform, $io): void
    {
        // 1. Подготовка на данните (Кирилица)
        $name = mb_convert_encoding($name, 'UTF-8', 'UTF-8');
        $shortName = mb_substr($name, 0, 180, 'UTF-8');
        $slug = $this->slugger->slug($shortName)->lower()->toString() . '-' . uniqid();
        $now = (new \DateTimeImmutable())->format('Y-m-d H:i:s');
        $category = $platform . '-deals';

        // 2. Генериране на описание на БЪЛГАРСКИ (като в стария файл)
        // Sanitize the shortName to prevent XSS attacks
        $safeShortName = htmlspecialchars($shortName, ENT_QUOTES, 'UTF-8');
        $safePlatform = htmlspecialchars($platform, ENT_QUOTES, 'UTF-8');

        $description = "Възползвайте се от страхотната оферта за " . $safeShortName . ". Този продукт е наличен на топ цена!";
        $content = "<h2>За продукта</h2><p>Топ оферта за <strong>" . $safeShortName . "</strong> от " . $safePlatform . "!</p>" .
            "<h3>Защо да изберете това?</h3><ul><li>✅ Гарантирано качество</li><li>✅ Бърза доставка</li></ul>";

        // Sanitize the entire HTML content to remove any potential XSS
        $content = $this->htmlSanitizer->sanitizeForDisplay($content);

        try {
            // Проверка за дубликат в product
            $exists = $this->connection->fetchOne('SELECT id FROM product WHERE link = ?', [$affLink]);
            if (!$exists) {
                $this->connection->executeStatement(
                    'INSERT INTO product (name, link, price, image, category, updated_at) VALUES (?, ?, ?, ?, ?, ?)',
                    [$shortName, $affLink, $price, $image, $category, $now]
                );
            }

            // Запис в review - БЕЗ meta_keywords, за да няма грешки
            $this->connection->executeStatement(
                'INSERT INTO review (title, slug, content, affiliate_link, original_product_url, image_url, price, rating, is_published, badge, created_at, meta_description)
             VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)',
                [
                    $shortName,
                    $slug,
                    $content,
                    $affLink,
                    $origLink,
                    $image,
                    (string)$price,
                    rand(4,5),
                    1,
                    'HOT',
                    $now,
                    mb_substr($description, 0, 155, 'UTF-8')
                ]
            );
        } catch (\Exception $e) {
            $io->error("\nГрешка при запис: " . $e->getMessage());
        }
    }
}
