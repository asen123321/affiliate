# 🤖 Universal HTML Scraper Guide

## Overview

The `app:scrape-html` command is a universal scraper that works for **ANY website** (eMAG, Alleop, Fashion Days, and more) without requiring ChromeDriver or complex setup.

## ✅ Features

- **Works everywhere** - Uses cURL instead of Panther/ChromeDriver
- **Smart detection** - Automatically detects product structure
- **Multi-site support** - Works with eMAG, Alleop, Fashion Days out of the box
- **Affiliate links** - Generates proper Profitshare links automatically
- **Pagination** - Scrape multiple pages easily
- **Duplicate prevention** - Skips already imported products

## 🚀 Quick Start

### Basic Usage

```bash
# Scrape eMAG products
docker exec affiliate-site-php-1 php bin/console app:scrape-html "https://www.emag.bg/label/malki-elektrouredi/Genius-Deals-15-21-12-2025-See-all-products/d" -p 1

# Scrape Alleop products
docker exec affiliate-site-php-1 php bin/console app:scrape-html "https://www.alleop.bg/uredi-za-kuhnyata" -p 3

# Scrape Fashion Days products
docker exec affiliate-site-php-1 php bin/console app:scrape-html "https://www.fashiondays.bg/..." -p 2
```

### Options

| Option | Short | Description | Default |
|--------|-------|-------------|---------|
| `--pages` | `-p` | Number of pages to scrape | 1 |
| `--force` | `-f` | Re-import existing products | false |
| `--wait` | `-w` | Seconds to wait (unused with cURL) | 10 |

## 📊 Examples

### 1. Scrape eMAG Campaign

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.emag.bg/label/malki-elektrouredi/Genius-Deals-15-21-12-2025-See-all-products/d" \
  -p 5
```

**Output:**
```
🤖 UNIVERSAL HTML SCRAPER - eMAG
================================

📄 Страница 1
-------------
✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔
[OK] Страница 1: 60 записани, 0 пропуснати
```

### 2. Scrape Alleop Kitchen Appliances

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.alleop.bg/uredi-za-kuhnyata" \
  -p 3
```

### 3. Scrape Fashion Days with Force Update

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.fashiondays.bg/c/obleklo-zheni/" \
  -p 2 \
  --force
```

## 🔍 How It Works

### 1. Automatic Store Detection

The scraper automatically detects which store you're scraping from the URL:

- `emag.bg` → eMAG
- `alleop.bg` → Alleop
- `fashiondays.bg` → Fashion Days

### 2. Smart Product Detection

The scraper tries multiple CSS selectors to find products:

**eMAG:**
- `.card-item`
- `div[data-card-item]`
- `.card-v2`

**Alleop:**
- `article.product-miniature`
- `.js-product-miniature`
- `.product-miniature`

**Fashion Days:**
- `li.product-card`
- `.product-card`

**Generic:**
- `[itemtype*="Product"]`
- `.product`
- `.product-item`

### 3. Data Extraction

For each product, the scraper extracts:

- **Title** - Product name
- **Price** - Current price in BGN
- **Image** - Product image URL
- **Product URL** - Original product page

### 4. Affiliate Link Generation

Automatically generates Profitshare affiliate links:

```
eMAG:         https://profitshare.bg/l/3608089?u=PRODUCT_URL&source=emag
Alleop:       https://profitshare.bg/l/3608310?u=PRODUCT_URL&source=alleop
Fashion Days: https://profitshare.bg/l/3608115?u=PRODUCT_URL&source=fashion_days
```

## 📋 Comparison with Other Scrapers

| Feature | `app:scrape-html` | `app:scrape-fd` / `app:scrape-alleop` |
|---------|-------------------|---------------------------------------|
| Works without ChromeDriver | ✅ Yes | ❌ No |
| Universal (any site) | ✅ Yes | ❌ No (site-specific) |
| Easy setup | ✅ Yes | ⚠️ Complex |
| Speed | ⚡ Fast (cURL) | 🐌 Slow (browser) |
| JavaScript rendering | ❌ No | ✅ Yes |

**When to use `app:scrape-html`:**
- ✅ When products are in HTML (not JavaScript-loaded)
- ✅ For quick scraping
- ✅ When ChromeDriver isn't available
- ✅ For any website

**When to use Panther scrapers:**
- ⚠️ When products are loaded via JavaScript
- ⚠️ When you need to wait for dynamic content
- ⚠️ For complex anti-bot bypassing

## 🛠️ Advanced Usage

### Scraping with Pagination

The scraper automatically builds pagination URLs:

**eMAG:**
```
Page 1: https://www.emag.bg/...
Page 2: https://www.emag.bg/...?p=2
Page 3: https://www.emag.bg/...?p=3
```

**Alleop / Fashion Days:**
```
Page 1: https://www.alleop.bg/...
Page 2: https://www.alleop.bg/...?page=2
Page 3: https://www.alleop.bg/...?page=3
```

### Force Re-import

By default, the scraper skips products that already exist in the database. Use `--force` to re-import:

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.emag.bg/..." \
  --force
```

## 📊 Database Storage

Products are stored in two tables:

### `product` table:
```sql
INSERT INTO product (name, link, price, image, category, updated_at)
VALUES (
    'Product Name',
    'https://profitshare.bg/l/...',
    99.99,
    'https://image.url',
    'emag-deals',
    NOW()
)
```

### `review` table:
```sql
INSERT INTO review (
    title, slug, content, affiliate_link,
    original_product_url, image_url, price,
    rating, is_published, badge, created_at, meta_description
) VALUES (
    'Product Name',
    'product-name-12345',
    'Топ оферта от eMAG за Product Name!',
    'https://profitshare.bg/l/...',
    'https://www.emag.bg/...',
    'https://image.url',
    '99.99',
    5,
    true,
    'HOT',
    NOW(),
    'Купи сега Product Name на най-добра цена от eMAG'
)
```

## 🎯 Supported Product Selectors

The scraper automatically tries these selectors for **links**:

```css
a.card-v2-title-wrapper    /* eMAG */
a[href*="/p/"]             /* Generic */
a[itemprop="url"]          /* Schema.org */
a.product-link             /* Generic */
a.card-item                /* eMAG */
h2 a                       /* Headings */
h3 a                       /* Headings */
.product-title a           /* Generic */
```

For **prices**:

```css
.product-new-price         /* Generic */
.price                     /* Generic */
.new-price                 /* Generic */
[itemprop="price"]         /* Schema.org */
[class*="price"]           /* Any class containing "price" */
span.price                 /* Generic */
.product-price             /* Generic */
```

For **images**:

```css
img.card-v2-img            /* eMAG */
img[itemprop="image"]      /* Schema.org */
img.lazy                   /* Lazy loading */
img[data-src]              /* Lazy loading */
img[src]                   /* Standard */
.product-image img         /* Generic */
.thumbnail img             /* Generic */
```

## ⚠️ Troubleshooting

### Issue: No products found

**Solution 1:** Check if products are loaded via JavaScript

```bash
# Try the Panther-based scraper instead
docker exec affiliate-site-php-1 php bin/console app:scrape-alleop "URL"
```

**Solution 2:** Inspect the HTML to find correct selectors

```bash
# Save HTML to file and check structure
curl "URL" > page.html
```

### Issue: Wrong prices extracted

The scraper tries to extract prices from:
1. `data-price` attribute
2. Text content with regex `/[\d\s]+[.,]?\d*/`

If prices are still wrong, the site might use JavaScript to render prices.

### Issue: Images not loading

The scraper skips:
- Images with `blank` in the URL
- Images with `placeholder` in the URL
- Empty image URLs

Check if images use lazy loading with `data-src` or `data-original`.

## 📈 Performance Tips

### 1. Scrape during off-peak hours
```bash
# Better: 2 AM - 6 AM
# Worse: 12 PM - 6 PM
```

### 2. Use pagination wisely
```bash
# Start small
docker exec affiliate-site-php-1 php bin/console app:scrape-html "URL" -p 1

# Then scale up
docker exec affiliate-site-php-1 php bin/console app:scrape-html "URL" -p 10
```

### 3. Monitor database size
```bash
docker exec affiliate-site-php-1 php bin/console dbal:run-sql "SELECT COUNT(*) FROM review"
```

## 🔗 Affiliate Link Tracking

All products get a `source` parameter for tracking:

- eMAG: `?source=emag`
- Alleop: `?source=alleop`
- Fashion Days: `?source=fashion_days`

Example:
```
https://profitshare.bg/l/3608089?u=https%3A%2F%2Fwww.emag.bg%2Fproduct&source=emag
```

You can track conversions by source in Profitshare dashboard.

## 📝 Notes

1. **cURL vs Panther:** This scraper uses cURL which is faster but can't execute JavaScript. If a site loads products dynamically, use the Panther-based scrapers.

2. **Duplicate Prevention:** Products are checked by `original_product_url`. Use `--force` to override.

3. **Categories:** Products are automatically categorized:
   - eMAG → `emag-deals`
   - Alleop → `alleop`
   - Fashion Days → `fashion-days`

4. **Ratings:** All scraped products get a default rating of 5/5 stars.

5. **Badges:** All products get a "HOT" badge by default.

## 🎉 Success Stories

### Real Usage Example:

```bash
$ docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.emag.bg/label/malki-elektrouredi/Genius-Deals-15-21-12-2025-See-all-products/d" \
  -p 1

🤖 UNIVERSAL HTML SCRAPER - eMAG
================================
📄 Страница 1
 [INFO] URL: https://www.emag.bg/label/malki-elektrouredi/...
 [INFO] Изтегляне на HTML...
 // HTML изтеглен успешно (1026330 bytes)
 // Използван селектор: .card-item
 ! [NOTE] Намерени 78 продукта
✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔✔
 [OK] Страница 1: 60 записани, 0 пропуснати
 [OK] Скрейпването приключи!
```

**Result:** 60 products imported with correct:
- Titles
- Prices
- Images
- Affiliate links pointing to exact product pages

---

**Created:** 2025-12-18
**Version:** 1.0
**Status:** ✅ Production Ready
