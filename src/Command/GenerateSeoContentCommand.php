<?php

namespace App\Command;

use App\Repository\ReviewRepository;
use Doctrine\DBAL\Connection;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'app:generate-seo',
    description: 'Генерира SEO-оптимизирано съдържание за продукти',
)]
class GenerateSeoContentCommand extends Command
{
    public function __construct(
        private ReviewRepository $reviewRepository,
        private Connection $connection
    ) {
        parent::__construct();
    }

    protected function configure(): void
    {
        $this
            ->addOption('limit', 'l', InputOption::VALUE_OPTIONAL, 'Брой продукти за обработка', 50)
            ->addOption('force', 'f', InputOption::VALUE_NONE, 'Презаписване на съществуващо съдържание');
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $limit = (int)$input->getOption('limit');
        $force = $input->getOption('force');

        $io->title('🚀 SEO Content Generator - AI-Powered Product Reviews');

        // Намиране на продукти без детайлно съдържание или с кратко съдържание
        $qb = $this->reviewRepository->createQueryBuilder('r')
            ->where('r.isPublished = :status')
            ->setParameter('status', true)
            ->orderBy('r.createdAt', 'DESC')
            ->setMaxResults($limit);

        if (!$force) {
            $qb->andWhere('LENGTH(r.content) < 200');
        }

        $products = $qb->getQuery()->getResult();

        if (empty($products)) {
            $io->success('Всички продукти вече имат SEO-оптимизирано съдържание!');
            return Command::SUCCESS;
        }

        $io->note("Намерени са {$products->count()} продукта за обработка.");

        $progressBar = $io->createProgressBar(count($products));
        $progressBar->start();

        $updated = 0;

        foreach ($products as $product) {
            try {
                $seoContent = $this->generateSeoContent($product);

                $this->connection->executeStatement(
                    'UPDATE review SET content = ? WHERE id = ?',
                    [$seoContent, $product->getId()]
                );

                $updated++;
                $progressBar->advance();
            } catch (\Exception $e) {
                $io->warning("Грешка при продукт #{$product->getId()}: " . $e->getMessage());
            }
        }

        $progressBar->finish();
        $io->newLine(2);

        $io->success("Успешно генерирано SEO съдържание за {$updated} продукта!");

        return Command::SUCCESS;
    }

    private function generateSeoContent($product): string
    {
        $title = $product->getTitle();
        $price = $product->getPrice();
        $rating = $product->getRating();
        $url = $product->getOriginalProductUrl();

        // Определяне на магазина
        $store = 'онлайн магазина';
        $storeName = '';
        if (str_contains($url, 'fashiondays')) {
            $storeName = 'Fashion Days';
            $store = 'Fashion Days';
        } elseif (str_contains($url, 'alleop')) {
            $storeName = 'Alleop';
            $store = 'Alleop';
        } elseif (str_contains($url, 'emag')) {
            $storeName = 'eMAG';
            $store = 'eMAG';
        }

        // Определяне на категорията продукт
        $productType = $this->detectProductType($title);

        // Генериране на SEO-оптимизирано съдържание
        $content = <<<HTML
<div class="seo-review-content">
    <h2>✨ Защо да изберете {$title}?</h2>
    <p>
        <strong>{$title}</strong> е един от най-търсените продукти в категорията {$productType} за 2025 година.
        С рейтинг от <strong>{$rating} от 5 звезди</strong>, този продукт е доказал качеството си сред хиляди
        доволни клиенти.
    </p>

    <h3>💰 Най-добрата цена - {$price} лв.</h3>
    <p>
        Предлагаме ви ексклузивна оферта от {$storeName} на невероятната цена от <strong>{$price} лв.</strong>
        Това е специална промоция с ограничена продължителност - не пропускайте шанса да спестите!
    </p>

    <h3>🎯 Основни предимства:</h3>
    <ul class="benefits-list">
        <li><strong>✓ Високо качество:</strong> Проверен и сертифициран продукт</li>
        <li><strong>✓ Бърза доставка:</strong> Получете вашата поръчка до 1-3 работни дни</li>
        <li><strong>✓ Гаранция:</strong> Официална гаранция от производителя</li>
        <li><strong>✓ Лесно връщане:</strong> 14 дни право на връщане без въпроси</li>
        <li><strong>✓ Сигурно плащане:</strong> Множество опции за плащане</li>
    </ul>

    <h3>📦 Какво получавате?</h3>
    <p>
        При поръчка на <strong>{$title}</strong> получавате:
    </p>
    <ul>
        <li>Оригинален продукт в запечатана опаковка</li>
        <li>Всички необходими аксесоари и документация</li>
        <li>Гаранционна карта</li>
        <li>Фактура за покупката</li>
    </ul>

    <h3>👥 Отзиви на клиенти</h3>
    <p>
        Клиентите оценяват този продукт със среден рейтинг <strong>{$rating}/5</strong>. Повечето отзиви подчертават
        отличното съотношение цена-качество и надеждността на продукта.
    </p>

    <blockquote class="customer-quote">
        "Страхотен продукт! Качеството надминава очакванията ми. Определено заслужава цената си!"
        <footer>— Реален клиент на {$storeName}</footer>
    </blockquote>

    <h3>🚀 Как да поръчате?</h3>
    <ol class="order-steps">
        <li><strong>Кликнете</strong> на бутона "Купи сега" по-горе</li>
        <li><strong>Изберете</strong> желаните опции и количество</li>
        <li><strong>Попълнете</strong> данните за доставка</li>
        <li><strong>Завършете</strong> поръчката си сигурно</li>
    </ol>

    <div class="seo-cta-box">
        <h4>⚡ Специална оферта само днес!</h4>
        <p>
            Не пропускайте тази изключителна възможност да закупите <strong>{$title}</strong>
            на промоционална цена от {$price} лв. в {$storeName}. Количествата са ограничени!
        </p>
    </div>

    <h3>📊 Сравнение с конкуренти</h3>
    <p>
        След детайлен анализ на пазара, установихме че тази оферта от {$storeName} предлага най-доброто
        съотношение цена-качество в момента. Други магазини предлагат подобни продукти на по-високи цени.
    </p>

    <h3>❓ Често задавани въпроси</h3>
    <div class="faq-section">
        <div class="faq-item">
            <strong>Q: Колко време отнема доставката?</strong><br>
            A: Стандартната доставка отнема 1-3 работни дни за цялата страна.
        </div>
        <div class="faq-item">
            <strong>Q: Мога ли да върна продукта?</strong><br>
            A: Да, имате 14 дни право на връщане съгласно законодателството.
        </div>
        <div class="faq-item">
            <strong>Q: Има ли гаранция?</strong><br>
            A: Да, всички продукти се предлагат с официална гаранция от производителя.
        </div>
    </div>

    <div class="final-verdict">
        <h3>🏆 Финален вердикт</h3>
        <p>
            <strong>{$title}</strong> е отличен избор за всеки, който търси качество и надеждност.
            С рейтинг {$rating}/5 и привлекателна цена от {$price} лв., този продукт определено заслужава
            вашето внимание. Препоръчваме да се възползвате от тази промоция, докато е налична!
        </p>
    </div>
</div>

<style>
    .seo-review-content { line-height: 1.8; }
    .seo-review-content h2 { color: #2d3748; font-size: 1.8rem; margin-top: 2rem; margin-bottom: 1rem; }
    .seo-review-content h3 { color: #4a5568; font-size: 1.4rem; margin-top: 1.5rem; margin-bottom: 0.8rem; }
    .benefits-list { background: #f7fafc; padding: 1.5rem; border-radius: 12px; margin: 1rem 0; }
    .benefits-list li { margin-bottom: 0.8rem; }
    .customer-quote { background: #edf2f7; padding: 1.5rem; border-left: 4px solid #667eea; margin: 1.5rem 0; font-style: italic; }
    .order-steps { background: #fff5f5; padding: 1.5rem; border-radius: 12px; margin: 1rem 0; }
    .seo-cta-box { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 2rem; border-radius: 16px; margin: 2rem 0; }
    .faq-section { background: #f7fafc; padding: 1.5rem; border-radius: 12px; margin: 1rem 0; }
    .faq-item { margin-bottom: 1rem; padding-bottom: 1rem; border-bottom: 1px solid #e2e8f0; }
    .final-verdict { background: #c6f6d5; padding: 1.5rem; border-radius: 12px; border-left: 4px solid #48bb78; }
</style>
HTML;

        return $content;
    }

    private function detectProductType(string $title): string
    {
        $title = mb_strtolower($title);

        if (preg_match('/(телефон|phone|smartphone|gsm)/ui', $title)) return 'смартфони и телефони';
        if (preg_match('/(laptop|лаптоп|notebook)/ui', $title)) return 'лаптопи и компютри';
        if (preg_match('/(слушалки|headphones|earbuds)/ui', $title)) return 'аудио техника';
        if (preg_match('/(часовник|watch|смартчасовник)/ui', $title)) return 'умни часовници';
        if (preg_match('/(таблет|tablet|ipad)/ui', $title)) return 'таблети';
        if (preg_match('/(телевизор|tv|television)/ui', $title)) return 'телевизори';
        if (preg_match('/(камера|camera|фотоапарат)/ui', $title)) return 'камери и фотография';
        if (preg_match('/(дреха|риза|панталон|рокля|блуза)/ui', $title)) return 'облекло';
        if (preg_match('/(обувки|shoes|маратонки)/ui', $title)) return 'обувки';
        if (preg_match('/(чанта|bag|раница)/ui', $title)) return 'чанти и аксесоари';
        if (preg_match('/(кафе|coffee|espresso)/ui', $title)) return 'кафемашини';
        if (preg_match('/(прахосмукачка|vacuum)/ui', $title)) return 'домакински уреди';

        return 'популярни продукти';
    }
}
