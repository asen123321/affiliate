<?php

namespace App\Service;

class CategoryDetector
{
    /**
     * Detect product category from title using regex patterns
     */
    public static function detectCategory(string $title): ?string
    {
        $title = mb_strtolower($title, 'UTF-8');

        // Category patterns with regex
        $patterns = [
            'tv' => '/телевизор|телевизори|televizor|smart\s+tv|led\s+tv|oled|qled/ui',
            'laptop' => '/лаптоп|laptop|ноутбук|notebook/ui',
            'phone' => '/телефон|phone|смартфон|smartphone|gsm/ui',
            'tablet' => '/таблет|tablet|ipad/ui',
            'coffee' => '/кафемашина|кафеавтомат|кафе\s+машина|coffee\s+machine|espresso/ui',
            'vacuum' => '/прахосмукачка|vacuum|пылесос/ui',
            'microwave' => '/микровълнова|microwave|микровълнов/ui',
            'oven' => '/фурна|oven|печка/ui',
            'fridge' => '/хладилник|refrigerator|fridge|фризер/ui',
            'washing_machine' => '/перална|washing\s+machine|пералня/ui',
            'ac' => '/климатик|air\s+conditioner|кондиционер/ui',
            'console' => '/конзола|console|playstation|xbox|nintendo/ui',
            'camera' => '/камера|camera|фотоапарат/ui',
            'headphones' => '/слушалки|headphones|earbuds|наушники/ui',
            'watch' => '/часовник|watch|smartwatch/ui',
            'toaster' => '/тостер|toaster/ui',
            'blender' => '/блендер|blender|миксер/ui',
            'air_fryer' => '/фритюрник|air\s+fryer|аерофритюрник/ui',
            'grill' => '/скара|grill|грил/ui',
            'robot' => '/робот|robot/ui',
            'drone' => '/дрон|drone/ui',
            'dress' => '/рокля|dress|рокли/ui',
            'shoes' => '/обувки|shoes|обувка|кец|маратонки/ui',
            'jacket' => '/яке|jacket|якета/ui',
            'pants' => '/панталон|pants|jeans|дънки/ui',
            'bag' => '/чанта|bag|раница/ui',
            'speaker' => '/тонколона|speaker|колонка|аудио\s+система/ui',
            'monitor' => '/монитор|monitor|display/ui',
            'keyboard' => '/клавиатура|keyboard/ui',
            'mouse' => '/мишка|mouse|геймърска\s+мишка/ui',
            'printer' => '/принтер|printer/ui',
            'router' => '/рутер|router/ui',
        ];

        foreach ($patterns as $category => $pattern) {
            if (preg_match($pattern, $title)) {
                return $category;
            }
        }

        return 'other';
    }

    /**
     * Get human-readable category name in Bulgarian
     */
    public static function getCategoryName(string $category): string
    {
        $names = [
            'tv' => 'Телевизори',
            'laptop' => 'Лаптопи',
            'phone' => 'Телефони',
            'tablet' => 'Таблети',
            'coffee' => 'Кафемашини',
            'vacuum' => 'Прахосмукачки',
            'microwave' => 'Микровълнови',
            'oven' => 'Фурни',
            'fridge' => 'Хладилници',
            'washing_machine' => 'Перални',
            'ac' => 'Климатици',
            'console' => 'Конзоли',
            'camera' => 'Камери',
            'headphones' => 'Слушалки',
            'watch' => 'Часовници',
            'toaster' => 'Тостери',
            'blender' => 'Блендери',
            'air_fryer' => 'Фритюрници',
            'grill' => 'Скари',
            'robot' => 'Роботи',
            'drone' => 'Дронове',
            'dress' => 'Рокли',
            'shoes' => 'Обувки',
            'jacket' => 'Якета',
            'pants' => 'Панталони',
            'bag' => 'Чанти',
            'speaker' => 'Тонколони',
            'monitor' => 'Монитори',
            'keyboard' => 'Клавиатури',
            'mouse' => 'Мишки',
            'printer' => 'Принтери',
            'router' => 'Рутери',
            'other' => 'Други',
        ];

        return $names[$category] ?? 'Други';
    }
}
