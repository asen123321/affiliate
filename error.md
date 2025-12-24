I have a critical issue after wiping my database and re-running the scraper.

**The Situation:**
I dropped the schema, updated it, and ran my scraper command for **Fashion Days**.
1. **Images are broken/missing:** The scraper is likely grabbing the `src` attribute which is a placeholder, instead of the real image (Fashion Days uses lazy loading).
2. **Categories are missing:** Since the DB is fresh, there are no categories. The products are currently uncategorized or falling into a generic fallback.

**My Request:**
Please modify my Scraper Command (`ScrapeEmagHtmlCommand.php`) to fix these two issues:

**1. Fix Fashion Days Image Selector:**
Update the logic to look for `data-src`, `data-original`, or the correct lazy-load attribute specifically for Fashion Days.
* *Current behavior:* It likely saves a base64 placeholder or empty string.

**2. Auto-Create & Assign Categories:**
I need the scraper to automatically categorize products based on keywords in the URL or Title.
* **Logic:**
    * If URL/Title contains 'tv', 'televizor' -> Assign to Category 'Televisions'.
    * If URL/Title contains 'laptop' -> Assign to Category 'Laptops'.
    * If URL/Title contains 'dress', 'shirt' -> Assign to Category 'Fashion'.
* **Important Doctrine Logic:**
    * Check if the `Category` entity exists by name.
    * If not, **create and persist** the new `Category` entity.
    * Assign this entity to the `Product` (assuming `Product` has a `ManyToOne` relation to `Category`).

**Here is my current Scraper Command Code:**
docker exec affiliate-site-php-1 php bin/console app:scrape-html "https://www.emag.bg/label/Electro-weekend-P3-Samsung-Tvs-and-Soundbars?ref_label_campaign=electro-weekend-23-25-12-2025_televizori-i-saundbari-samsung&rec%5Bsource%5D=label-campaign" -p 1
docker exec affiliate-site-php-1 php bin/console app:scrape-html "https://www.alleop.bg/elektronika-i-foto"
php bin/console app:scrape-fashion "https://www.fashiondays.bg/s/boss-hp-m/?gtm_data=3||MerchandiseSaleEvent||BOSS||https:%2F%2Ffdcdn.akamaized.net%2Fb%2F622x930%2FvnB-933x1395.jpg%3Fs=XdFffa4AATVS||%2Fs%2Fboss-hp-m%2F||MerchandiseSaleEvent||BOSS"

**3. And make whole website in only one Language bulgarian **
**4. And make it fast clear cash and everything that is needed ! **


