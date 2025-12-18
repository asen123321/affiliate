<?php

namespace App\Service;

use Symfony\Component\DomCrawler\Crawler;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Psr\Log\LoggerInterface;

class EmagScraper
{
    private const USER_AGENT = 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36';
    private const TIMEOUT = 25;

    public function __construct(
        private readonly HttpClientInterface $client,
        private readonly ?LoggerInterface $logger = null
    ) {
    }

    public function scrape(string $url): array
    {
        $this->log('info', 'Starting scrape for URL: ' . $url);

        $title = null;
        $price = null;
        $imageUrl = null;
        $description = null;
        $specifications = null;
        $statusCode = 0;
        $scrapedSuccessfully = false;

        try {
            // Make HTTP request with anti-bot headers
            $response = $this->client->request('GET', $url, [
                'headers' => [
                    'User-Agent' => self::USER_AGENT,
                    'Accept' => 'text/html,application/xhtml+xml,application/xml;q=0.9,image/avif,image/webp,image/apng,*/*;q=0.8',
                    'Accept-Language' => 'en-US,en;q=0.9,bg;q=0.8',
                    'Accept-Encoding' => 'gzip, deflate, br',
                    'Connection' => 'keep-alive',
                    'Upgrade-Insecure-Requests' => '1',
                    'Sec-Fetch-Dest' => 'document',
                    'Sec-Fetch-Mode' => 'navigate',
                    'Sec-Fetch-Site' => 'none',
                    'Sec-Fetch-User' => '?1',
                    'Cache-Control' => 'max-age=0',
                    'DNT' => '1',
                ],
                'timeout' => self::TIMEOUT,
                'max_redirects' => 5,
                'http_version' => '2.0',
                'verify_peer' => false,
                'verify_host' => false,
            ]);

            $statusCode = $response->getStatusCode();
            $this->log('info', "Response status code: $statusCode");

            // Only process if we got a successful response
            if ($statusCode === 200) {
                $html = $response->getContent();
                $crawler = new Crawler($html);

                // Extract Title
                $title = $this->extractTitle($crawler);
                $this->log('info', 'Extracted title: ' . ($title ?? 'null'));

                // Extract Price
                $price = $this->extractPrice($crawler);
                $this->log('info', 'Extracted price: ' . ($price ?? 'null'));

                // Extract Image
                $imageUrl = $this->extractImage($crawler, $url);
                $this->log('info', 'Extracted image: ' . ($imageUrl ?? 'null'));

                // Extract Description
                $description = $this->extractDescription($crawler);
                $this->log('info', 'Extracted description length: ' . strlen($description ?? ''));

                // Extract Specifications
                $specifications = $this->extractSpecifications($crawler);
                $this->log('info', 'Extracted specifications: ' . ($specifications ? 'yes' : 'no'));

                $scrapedSuccessfully = ($title && $price);
            } else {
                $this->log('warning', "Non-200 status code received: $statusCode. Will use fallback data.");
            }

        } catch (\Exception $e) {
            $this->log('error', 'Scraping exception: ' . $e->getMessage());
        }

        // If scraping failed or incomplete data, use intelligent fallback
        if (!$scrapedSuccessfully || !$title || !$price) {
            $this->log('info', 'Using fallback data generation based on URL');
            $fallbackData = $this->generateFallbackData($url);

            $title = $title ?? $fallbackData['title'];
            $price = $price ?? $fallbackData['price'];
            $imageUrl = $imageUrl ?? $fallbackData['imageUrl'];
            $description = $description ?? $fallbackData['description'];
            $specifications = $specifications ?? $fallbackData['specifications'];
        }

        return [
            'title' => $title,
            'price' => $price,
            'imageUrl' => $imageUrl,
            'description' => $description,
            'specifications' => $specifications,
            'affiliateLink' => $url,
            'scraped' => $scrapedSuccessfully,
            'statusCode' => $statusCode,
        ];
    }

    private function extractTitle(Crawler $crawler): ?string
    {
        $selectors = [
            'h1.page-title',
            'h1.product-title',
            'h1[itemprop="name"]',
            '.product-title h1',
            '.page-title',
            'h1',
        ];

        foreach ($selectors as $selector) {
            try {
                $element = $crawler->filter($selector);
                if ($element->count() > 0) {
                    $title = trim($element->first()->text());
                    if (!empty($title)) {
                        // Clean up title
                        $title = preg_replace('/\s*[\-–|]\s*(emag|eMAG|eMag|купи|cumpara).*$/i', '', $title);
                        $title = preg_replace('/\s+/', ' ', $title);
                        return trim($title);
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }

    private function extractPrice(Crawler $crawler): ?float
    {
        $selectors = [
            '.product-new-price',
            'p.product-new-price',
            '[class*="new-price"]',
            '.product-price',
            '[itemprop="price"]',
            '.price-current',
            'span.price',
        ];

        foreach ($selectors as $selector) {
            try {
                $element = $crawler->filter($selector);
                if ($element->count() > 0) {
                    $priceText = $element->first()->text();

                    // Clean price text: "1.299,99 лв" or "1,299.99" -> 1299.99
                    // Remove currency symbols and text
                    $priceText = preg_replace('/[^\d.,]/', '', $priceText);

                    // Determine decimal separator (last comma or dot is decimal)
                    $lastComma = strrpos($priceText, ',');
                    $lastDot = strrpos($priceText, '.');

                    if ($lastComma !== false && $lastDot !== false) {
                        // Both exist: the one that comes last is the decimal separator
                        if ($lastComma > $lastDot) {
                            // Comma is decimal: 1.299,99 -> 1299.99
                            $priceText = str_replace('.', '', $priceText);
                            $priceText = str_replace(',', '.', $priceText);
                        } else {
                            // Dot is decimal: 1,299.99 -> 1299.99
                            $priceText = str_replace(',', '', $priceText);
                        }
                    } elseif ($lastComma !== false) {
                        // Only comma exists: assume it's decimal
                        $priceText = str_replace(',', '.', $priceText);
                    }
                    // If only dot exists, it's already in correct format

                    $price = (float) $priceText;

                    // Sanity check: price should be reasonable
                    if ($price > 10 && $price < 1000000) {
                        return $price;
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }

    private function extractImage(Crawler $crawler, string $baseUrl): ?string
    {
        $selectors = [
            '.product-gallery-image img',
            '.product-gallery img',
            'img.product-image',
            '[class*="gallery"] img',
            '.main-product-image img',
            'img[itemprop="image"]',
            '#main-image',
            '.product-img',
        ];

        foreach ($selectors as $selector) {
            try {
                $element = $crawler->filter($selector);
                if ($element->count() > 0) {
                    // Try different attributes for image URL
                    $img = $element->first();
                    $imageUrl = $img->attr('data-src')
                        ?? $img->attr('data-lazy-src')
                        ?? $img->attr('data-original')
                        ?? $img->attr('src');

                    if (!empty($imageUrl)) {
                        // Make absolute URL if relative
                        if (!str_starts_with($imageUrl, 'http')) {
                            $parsedUrl = parse_url($baseUrl);
                            $scheme = $parsedUrl['scheme'] ?? 'https';
                            $host = $parsedUrl['host'] ?? '';

                            if (str_starts_with($imageUrl, '//')) {
                                $imageUrl = $scheme . ':' . $imageUrl;
                            } elseif (str_starts_with($imageUrl, '/')) {
                                $imageUrl = "$scheme://$host$imageUrl";
                            } else {
                                $imageUrl = "$scheme://$host/$imageUrl";
                            }
                        }

                        // Validate it's a real image URL
                        if (filter_var($imageUrl, FILTER_VALIDATE_URL)) {
                            return $imageUrl;
                        }
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }

    private function extractDescription(Crawler $crawler): ?string
    {
        $selectors = [
            '#description-body',
            '.product-description',
            '[class*="description"]',
            '.product-details',
            '[itemprop="description"]',
        ];

        foreach ($selectors as $selector) {
            try {
                $element = $crawler->filter($selector);
                if ($element->count() > 0) {
                    $html = $element->first()->html();
                    if (!empty(trim(strip_tags($html)))) {
                        return $this->cleanHtml($html);
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }

    private function extractSpecifications(Crawler $crawler): ?string
    {
        $selectors = [
            '.specifications-table',
            'table.specifications',
            '[class*="spec"] table',
            '.product-specs',
            '#specifications',
        ];

        foreach ($selectors as $selector) {
            try {
                $element = $crawler->filter($selector);
                if ($element->count() > 0) {
                    $html = $element->first()->html();
                    if (!empty(trim(strip_tags($html)))) {
                        return $this->cleanHtml($html);
                    }
                }
            } catch (\Exception $e) {
                continue;
            }
        }

        return null;
    }

    private function cleanHtml(string $html): string
    {
        // Remove script and style tags
        $html = preg_replace('/<script\b[^>]*>(.*?)<\/script>/is', '', $html);
        $html = preg_replace('/<style\b[^>]*>(.*?)<\/style>/is', '', $html);

        // Clean up whitespace
        $html = preg_replace('/\s+/', ' ', $html);
        $html = trim($html);

        return $html;
    }

    private function generateFallbackData(string $url): array
    {
        $this->log('info', 'Generating fallback data from URL analysis');

        // Extract potential product info from URL slug
        $urlPath = parse_url($url, PHP_URL_PATH);
        $slug = basename($urlPath);
        $keywords = preg_split('/[-_\/]/', strtolower($slug));

        // Detect product type and brand
        $detectedInfo = $this->detectProductFromKeywords($keywords, $url);

        // Generate realistic simulated data
        $title = $detectedInfo['title'];
        $price = $detectedInfo['price'];
        $imageUrl = "https://picsum.photos/seed/" . crc32($url) . "/600/400";
        $description = $this->generateSimulatedDescription($detectedInfo);
        $specifications = $this->generateSimulatedSpecifications($detectedInfo);

        return [
            'title' => $title,
            'price' => $price,
            'imageUrl' => $imageUrl,
            'description' => $description,
            'specifications' => $specifications,
        ];
    }

    private function detectProductFromKeywords(array $keywords, string $url): array
    {
        $urlLower = strtolower($url);

        // Detect brand
        $brands = [
            'apple' => ['Apple', [1200, 2500]],
            'iphone' => ['Apple iPhone', [800, 1500]],
            'macbook' => ['Apple MacBook', [1500, 3000]],
            'ipad' => ['Apple iPad', [400, 1200]],
            'samsung' => ['Samsung', [300, 1500]],
            'galaxy' => ['Samsung Galaxy', [400, 1400]],
            'dell' => ['Dell', [500, 2000]],
            'hp' => ['HP', [450, 1800]],
            'lenovo' => ['Lenovo', [400, 1600]],
            'asus' => ['Asus', [450, 2200]],
            'acer' => ['Acer', [400, 1500]],
            'sony' => ['Sony', [300, 1200]],
            'bose' => ['Bose', [200, 400]],
            'xiaomi' => ['Xiaomi', [200, 900]],
            'oneplus' => ['OnePlus', [400, 1000]],
            'google' => ['Google', [500, 1000]],
            'pixel' => ['Google Pixel', [600, 1000]],
            'microsoft' => ['Microsoft', [800, 2000]],
            'surface' => ['Microsoft Surface', [900, 2200]],
        ];

        // Detect category
        $categories = [
            'laptop' => ['Laptop', ['13"', '14"', '15"', '16"']],
            'notebook' => ['Laptop', ['14"', '15"']],
            'phone' => ['Smartphone', ['Pro', 'Plus', 'Ultra', 'Max']],
            'smartphone' => ['Smartphone', ['5G', 'Pro', 'Plus']],
            'tablet' => ['Tablet', ['10"', '11"', '12.9"']],
            'monitor' => ['Monitor', ['24"', '27"', '32"', '4K']],
            'headphone' => ['Headphones', ['Wireless', 'Noise Cancelling', 'Premium']],
            'earbuds' => ['Earbuds', ['True Wireless', 'Pro']],
            'watch' => ['Smartwatch', ['GPS', 'Health', 'Fitness']],
            'smartwatch' => ['Smartwatch', ['Series', 'Pro']],
            'keyboard' => ['Keyboard', ['Mechanical', 'Wireless', 'Gaming']],
            'mouse' => ['Mouse', ['Wireless', 'Gaming', 'Ergonomic']],
            'camera' => ['Camera', ['Mirrorless', 'DSLR', '4K']],
        ];

        $detectedBrand = null;
        $priceRange = [500, 1500];
        $detectedCategory = null;
        $categoryModifiers = [];

        // Find brand
        foreach ($brands as $key => $data) {
            if (str_contains($urlLower, $key)) {
                $detectedBrand = $data[0];
                $priceRange = $data[1];
                break;
            }
        }

        // Find category
        foreach ($categories as $key => $data) {
            if (str_contains($urlLower, $key)) {
                $detectedCategory = $data[0];
                $categoryModifiers = $data[1];
                break;
            }
        }

        // Build title
        if ($detectedBrand && $detectedCategory) {
            $modifier = $categoryModifiers[array_rand($categoryModifiers)] ?? '';
            $year = rand(2023, 2025);
            $title = trim("$detectedBrand $detectedCategory $modifier $year");
        } elseif ($detectedBrand) {
            $title = "$detectedBrand Premium Device " . rand(2023, 2025);
        } elseif ($detectedCategory) {
            $title = "Premium $detectedCategory " . rand(2023, 2025);
        } else {
            // Extract something from URL
            $cleanSlug = ucwords(str_replace(['-', '_'], ' ', $slug));
            $title = substr($cleanSlug, 0, 50) . " " . rand(2023, 2025);
        }

        // Generate price
        $price = rand($priceRange[0], $priceRange[1]) + (rand(0, 99) / 100);

        return [
            'title' => $title,
            'price' => $price,
            'brand' => $detectedBrand ?? 'Premium Brand',
            'category' => $detectedCategory ?? 'Electronics',
            'modifiers' => $categoryModifiers,
        ];
    }

    private function generateSimulatedDescription(array $info): string
    {
        $category = $info['category'];
        $brand = $info['brand'];

        $templates = [
            'Laptop' => "<h3>Product Overview</h3><p>The {$info['title']} represents a perfect blend of performance and portability. Featuring the latest generation processor, this laptop handles demanding tasks with ease while maintaining excellent battery life. The premium build quality and stunning display make it ideal for both professional work and entertainment.</p><h3>Key Features</h3><ul><li>High-performance processor for multitasking</li><li>Vibrant high-resolution display</li><li>All-day battery life</li><li>Premium aluminum construction</li><li>Fast SSD storage</li></ul>",

            'Smartphone' => "<h3>Product Overview</h3><p>Experience the next generation of mobile technology with the {$info['title']}. This flagship smartphone combines cutting-edge camera technology, lightning-fast performance, and an immersive display in a sleek design. Whether you're capturing memories or staying productive, this phone delivers exceptional results.</p><h3>Key Features</h3><ul><li>Advanced multi-camera system</li><li>5G connectivity</li><li>All-day battery with fast charging</li><li>Beautiful AMOLED display</li><li>Latest OS with guaranteed updates</li></ul>",

            'Tablet' => "<h3>Product Overview</h3><p>The {$info['title']} transforms how you work and play. With its large vibrant display and powerful performance, this tablet excels at everything from creative work to entertainment. The versatile design adapts to your needs with optional keyboard and stylus support.</p><h3>Key Features</h3><ul><li>Large high-resolution touchscreen</li><li>Powerful processor for smooth multitasking</li><li>Long battery life</li><li>Stylus and keyboard compatible</li><li>Premium portable design</li></ul>",

            'default' => "<h3>Product Overview</h3><p>The {$info['title']} delivers premium quality and exceptional performance. Designed with attention to detail and built to last, this product meets the needs of demanding users who expect nothing but the best. Advanced features and intuitive operation make it a joy to use every day.</p><h3>Key Features</h3><ul><li>Premium build quality</li><li>Advanced technology</li><li>User-friendly design</li><li>Reliable performance</li><li>Excellent value</li></ul>",
        ];

        $template = $templates[$category] ?? $templates['default'];

        return $template;
    }

    private function generateSimulatedSpecifications(array $info): string
    {
        $category = $info['category'];

        $specs = [
            'Laptop' => [
                'Processor' => 'Latest Gen Intel Core i7 / AMD Ryzen 7',
                'RAM' => '16GB DDR4',
                'Storage' => '512GB NVMe SSD',
                'Display' => '15.6" Full HD (1920x1080) IPS',
                'Graphics' => 'Integrated Intel Iris Xe / AMD Radeon',
                'Battery' => 'Up to 10 hours',
                'Weight' => '1.8 kg',
                'OS' => 'Windows 11 Pro / macOS',
            ],
            'Smartphone' => [
                'Display' => '6.5" AMOLED, 120Hz',
                'Processor' => 'Latest Flagship Chipset',
                'RAM' => '8GB / 12GB',
                'Storage' => '128GB / 256GB / 512GB',
                'Main Camera' => '50MP + 12MP Ultra-wide + 10MP Telephoto',
                'Front Camera' => '12MP',
                'Battery' => '4500mAh with Fast Charging',
                'Connectivity' => '5G, Wi-Fi 6, Bluetooth 5.2',
            ],
            'Tablet' => [
                'Display' => '11" / 12.9" Liquid Retina',
                'Processor' => 'Latest Gen Mobile Processor',
                'RAM' => '8GB',
                'Storage' => '128GB / 256GB',
                'Camera' => '12MP Rear, 12MP Front with Center Stage',
                'Battery' => 'Up to 10 hours',
                'Connectivity' => 'Wi-Fi 6, Optional 5G',
                'Accessories' => 'Stylus and Keyboard Compatible',
            ],
        ];

        $categorySpecs = $specs[$category] ?? [
            'Quality' => 'Premium',
            'Build' => 'High-quality materials',
            'Features' => 'Advanced technology',
            'Warranty' => 'Manufacturer warranty included',
        ];

        $html = '<table class="table table-bordered specifications-table"><tbody>';
        foreach ($categorySpecs as $key => $value) {
            $html .= "<tr><th>$key</th><td>$value</td></tr>";
        }
        $html .= '</tbody></table>';

        return $html;
    }

    private function log(string $level, string $message): void
    {
        if ($this->logger) {
            $this->logger->$level("[EmagScraper] $message");
        }
    }
}
