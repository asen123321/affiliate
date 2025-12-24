<?php

namespace App\DataFixtures;

use App\Entity\Category;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Symfony\Component\String\Slugger\SluggerInterface;

class CategoryFixtures extends Fixture
{
    public function __construct(
        private SluggerInterface $slugger
    ) {}

    public function load(ObjectManager $manager): void
    {
        // Bulgarian eMAG-style category tree with external mapping keywords
        $categoryTree = [
            'Електроника' => [
                'keywords' => ['Електроника', 'Electronics', 'Electronice'],
                'children' => [
                    'Телефони' => [
                        'keywords' => ['Telefoane', 'Smartphone', 'Mobile', 'Phone', 'GSM', 'Телефони', 'Смартфони', 'Telefon mobil', 'Telefoane mobile'],
                    ],
                    'Телевизори' => [
                        'keywords' => ['Televizoare', 'TV', 'LED', 'OLED', 'QLED', 'Smart TV', 'Телевизори', 'Televizor'],
                    ],
                    'Лаптопи' => [
                        'keywords' => ['Laptop', 'Notebook', 'Ultrabook', 'MacBook', 'Лаптопи', 'Laptopuri', 'Notebook-uri'],
                    ],
                    'Таблети' => [
                        'keywords' => ['Tablete', 'Tablet', 'iPad', 'Таблети', 'Tableta'],
                    ],
                    'Слушалки' => [
                        'keywords' => ['Casti', 'Headphones', 'Earbuds', 'Слушалки', 'Casti audio', 'TWS'],
                    ],
                    'Камери' => [
                        'keywords' => ['Aparate foto', 'Camera', 'DSLR', 'Камери', 'Фотоапарати', 'Camere foto'],
                    ],
                    'Конзоли' => [
                        'keywords' => ['Console', 'PlayStation', 'Xbox', 'Nintendo', 'Конзоли', 'Console jocuri'],
                    ],
                    'Смарт часовници' => [
                        'keywords' => ['Smartwatch', 'Smart watch', 'Ceasuri', 'Wearables', 'Смарт часовници', 'Ceasuri inteligente'],
                    ],
                    'Монитори' => [
                        'keywords' => ['Monitor', 'Display', 'Screen', 'Монитори', 'Monitoare'],
                    ],
                    'Клавиатури' => [
                        'keywords' => ['Keyboard', 'Tastatură', 'Клавиатури', 'Tastaturi'],
                    ],
                    'Мишки' => [
                        'keywords' => ['Mouse', 'Мишки', 'Mouse-uri'],
                    ],
                    'Принтери' => [
                        'keywords' => ['Printer', 'Imprimantă', 'Принтери', 'Imprimante', 'Multifunctional'],
                    ],
                ],
            ],
            'Дом и Градина' => [
                'keywords' => ['Casa si Gradina', 'Home', 'Garden', 'Дом', 'Градина'],
                'children' => [
                    'Мебели' => [
                        'keywords' => ['Mobilier', 'Furniture', 'Мебели', 'Mobila'],
                    ],
                    'Кухня' => [
                        'keywords' => ['Bucătărie', 'Kitchen', 'Кухня', 'Bucatarie'],
                    ],
                    'Баня' => [
                        'keywords' => ['Baie', 'Bathroom', 'Баня'],
                    ],
                    'Осветление' => [
                        'keywords' => ['Iluminat', 'Lighting', 'Осветление', 'Lampi'],
                    ],
                    'Градина' => [
                        'keywords' => ['Grădină', 'Garden', 'Градина', 'Gradina'],
                    ],
                ],
            ],
            'Електроуреди' => [
                'keywords' => ['Electrocasnice', 'Appliances', 'Електроуреди'],
                'children' => [
                    'Хладилници' => [
                        'keywords' => ['Frigidere', 'Refrigerator', 'Fridge', 'Хладилници', 'Frigider', 'Congelatoare'],
                    ],
                    'Перални машини' => [
                        'keywords' => ['Mașini de spălat', 'Washing machine', 'Перални', 'Masini de spalat rufe'],
                    ],
                    'Микровълнови фурни' => [
                        'keywords' => ['Cuptoare cu microunde', 'Microwave', 'Микровълнови', 'Cuptor microunde'],
                    ],
                    'Фурни' => [
                        'keywords' => ['Cuptoare', 'Oven', 'Фурни', 'Cuptoare electrice', 'Aragaz'],
                    ],
                    'Прахосмукачки' => [
                        'keywords' => ['Aspiratoare', 'Vacuum', 'Прахосмукачки', 'Aspirator'],
                    ],
                    'Климатици' => [
                        'keywords' => ['Aparate de aer condiționat', 'Air conditioner', 'AC', 'Климатици', 'Aer conditionat'],
                    ],
                    'Кафемашини' => [
                        'keywords' => ['Espressoare', 'Coffee machine', 'Кафемашини', 'Espressor', 'Cafetiera'],
                    ],
                    'Тостери' => [
                        'keywords' => ['Prajitoare', 'Toaster', 'Тостери', 'Prajitor paine'],
                    ],
                    'Блендери' => [
                        'keywords' => ['Blendere', 'Blender', 'Mixer', 'Блендери'],
                    ],
                    'Фритюрници' => [
                        'keywords' => ['Friteuze', 'Air fryer', 'Аерофритюрник', 'Фритюрници', 'Friteuza'],
                    ],
                    'Скари' => [
                        'keywords' => ['Grătare', 'Grill', 'Скари', 'Gratar electric'],
                    ],
                ],
            ],
            'Мода' => [
                'keywords' => ['Fashion', 'Modă', 'Мода', 'Îmbrăcăminte'],
                'children' => [
                    'Дамски дрехи' => [
                        'keywords' => ['Îmbrăcăminte femei', 'Women', 'Дамски', 'Femei', 'Haine femei'],
                    ],
                    'Мъжки дрехи' => [
                        'keywords' => ['Îmbrăcăminte bărbați', 'Men', 'Мъжки', 'Bărbați', 'Haine barbati'],
                    ],
                    'Обувки' => [
                        'keywords' => ['Încălțăminte', 'Shoes', 'Обувки', 'Pantofi', 'Adidasi'],
                    ],
                    'Чанти' => [
                        'keywords' => ['Genți', 'Bags', 'Чанти', 'Genti', 'Rucsacuri'],
                    ],
                    'Аксесоари' => [
                        'keywords' => ['Accesorii', 'Accessories', 'Аксесоари'],
                    ],
                ],
            ],
            'Здраве и Красота' => [
                'keywords' => ['Frumusețe și sănătate', 'Beauty', 'Health', 'Красота', 'Здраве', 'Ingrijire'],
                'children' => [
                    'Парфюми' => [
                        'keywords' => ['Parfumuri', 'Perfume', 'Парфюми', 'Parfum'],
                    ],
                    'Козметика' => [
                        'keywords' => ['Cosmetice', 'Cosmetics', 'Козметика', 'Machiaj'],
                    ],
                    'Грижа за кожата' => [
                        'keywords' => ['Îngrijire piele', 'Skincare', 'Грижа за кожата', 'Ingrijire fata'],
                    ],
                    'Грижа за косата' => [
                        'keywords' => ['Îngrijire păr', 'Hair care', 'Грижа за косата', 'Ingrijire par'],
                    ],
                ],
            ],
            'Спорт и Свободно време' => [
                'keywords' => ['Sport și timp liber', 'Sports', 'Leisure', 'Спорт', 'Sport si timp liber'],
                'children' => [
                    'Фитнес' => [
                        'keywords' => ['Fitness', 'Gym', 'Фитнес', 'Echipamente fitness'],
                    ],
                    'Велосипеди' => [
                        'keywords' => ['Biciclete', 'Bikes', 'Велосипеди', 'Bicicleta'],
                    ],
                    'Туризъм и къмпинг' => [
                        'keywords' => ['Camping', 'Outdoor', 'Туризъм', 'Turism'],
                    ],
                ],
            ],
            'Книги' => [
                'keywords' => ['Cărți', 'Books', 'Книги', 'Carti'],
                'children' => [
                    'Художествена литература' => [
                        'keywords' => ['Ficțiune', 'Fiction', 'Художествена', 'Fictiune'],
                    ],
                    'Бизнес и икономика' => [
                        'keywords' => ['Business', 'Economics', 'Бизнес', 'Economie'],
                    ],
                ],
            ],
            'Играчки' => [
                'keywords' => ['Jucării', 'Toys', 'Играчки', 'Jucarii'],
                'children' => [
                    'За момчета' => [
                        'keywords' => ['Pentru băieți', 'Boys', 'Момчета', 'Baieti'],
                    ],
                    'За момичета' => [
                        'keywords' => ['Pentru fete', 'Girls', 'Момичета', 'Fete'],
                    ],
                ],
            ],
        ];

        $this->createCategoryTree($manager, $categoryTree, null);

        // Create a General/Other category as fallback
        $generalCategory = new Category();
        $generalCategory->setName('Общи');
        $generalCategory->setSlug($this->slugger->slug('Общи')->lower()->toString());
        $generalCategory->setExternalMappingKeywords(['General', 'Other', 'Altele', 'Diverse', 'Общи']);
        $generalCategory->setParent(null);
        $manager->persist($generalCategory);

        $manager->flush();
    }

    private function createCategoryTree(ObjectManager $manager, array $tree, ?Category $parent): void
    {
        foreach ($tree as $categoryName => $data) {
            $category = new Category();
            $category->setName($categoryName);
            $category->setSlug($this->slugger->slug($categoryName)->lower()->toString());
            $category->setParent($parent);

            // Set external mapping keywords
            if (isset($data['keywords'])) {
                $category->setExternalMappingKeywords($data['keywords']);
            }

            $manager->persist($category);

            // Recursively create children
            if (isset($data['children']) && is_array($data['children'])) {
                $this->createCategoryTree($manager, $data['children'], $category);
            }
        }
    }
}
