# 🚨 URGENT TASK: Scrape eMAG Phones, Tablets & Laptops (Genius Deals)

## 1. The Objective
I need to populate my affiliate site immediately with high-value tech products.
**Target Source:** eMAG "Genius Deals" (Phones, Tablets, Laptops).
**Reference URL:** `https://www.emag.bg/label/telefoni-tableti-laptopi/Genius-Deals-15-21-12-2025-See-all-products/d`

## 2. The Technical Challenge
The ProfitShare API does **not** allow filtering by eMAG Campaign URLs directly.
It requires **Category IDs** to filter products.

## 3. Required Solution (Step-by-Step)

Please act as a Senior Symfony Developer and provide the code for these 3 steps:

### STEP A: Category Discovery Command (`app:find-categories`)
Create a command that fetches ALL categories from **eMAG (Advertiser ID: 35)** and allows me to search them by name in the terminal.
* *Usage Example:* `php bin/console app:find-categories "Phone"` or `php bin/console app:find-categories "Laptop"`
* *Goal:* I need to find the exact IDs for:
    1. "Mobile Phones" (Мобилни телефони)
    2. "Tablets" (Таблети)
    3. "Laptops" (Лаптопи)

### STEP B: The Targeted Scraper (`app:scrape-tech`)
Create a new, robust scraper command specifically for these tech categories.
* **Logic:**
    1. Accept an array of Category IDs (which I will find in Step A).
    2. Loop through **ALL pages** (pagination is critical, don't stop at page 1).
    3. **Upsert Logic:** Update price if exists, Insert if new.
    4. **Image Handling:** Ensure the main product image URL is saved.
    5. **Link Handling:** Save the **original** eMAG URL in the database field `original_product_url`.

### STEP C: The "Buy Now" Flow
Update `ProductController` and the Twig template to display these tech products in a grid.
* **The "Buy" Button:** MUST point to my internal route `/buy/{id}`.
* **The Redirect:** The internal route must use `ProfitShareService::generateAffiliateLink($originalUrl)` to create a fresh 3602077 affiliate link on the fly.

## 4. Technical Context
* **Service:** Use my existing `ProfitShareService`.
* **Database:** PostgreSQL (Docker/Port 5432).
* **Entities:** Use existing `Product` or `Review` entity (whichever is better for simple product listing).

## 5. Deliverables
1. Code for `FindCategoriesCommand.php`.
2. Code for `ScrapeTechCommand.php`.
3. Updated `ProductController.php` and `index.html.twig`.
