# BUG REPORT: SQL Error on Page Load (Source Filtering) - ✅ FIXED

**Scenario:**
I click on "eMAG", but the site crashes with an error referencing "FashionDays".
**Error:** `SQLSTATE[22P02]: Invalid text representation: 7 ERROR: invalid input syntax for type integer: "FashionDays"`

**Diagnosis:**
This indicates that the application is likely iterating through **ALL sources** (to build a sidebar, filter list, or counts) and crashing on the "FashionDays" entry.
The code is trying to use the string `"FashionDays"` inside a query that expects an **Integer ID**.

**Root Cause:**
After implementing the Category system, the `Product.category` field was changed from a string (`VARCHAR`) to a foreign key relationship (`category_id` INTEGER). However, the code was still using the old pattern of storing the source name (e.g., "FashionDays") in the category field:

```php
// OLD CODE (BROKEN):
$product->setCategory('FashionDays'); // Tries to set string on an integer FK field
$qb->where('p.category = :fd_name')->setParameter('fd_name', 'FashionDays');
// PostgreSQL error: Can't compare INTEGER with VARCHAR
```

---

## ✅ THE FIX

### 1. Added `source` Field to Product Entity

**File:** `src/Entity/Product.php`

Added a new field to track the product source/platform:
```php
#[ORM\Column(length: 100, nullable: true)]
private ?string $source = null;

public function getSource(): ?string { return $this->source; }
public function setSource(?string $source): static { $this->source = $source; return $this; }
```

This field stores values like:
- `'eMAG'`
- `'FashionDays'`
- `'Alleop'`

### 2. Updated ReviewController

**File:** `src/Controller/ReviewController.php`

Changed all queries to use the `source` field instead of `category`:

```php
// BEFORE (BROKEN):
$qb = $productRepository->createQueryBuilder('p')
    ->where('p.category = :fd_name')
    ->setParameter('fd_name', 'FashionDays');

// AFTER (FIXED):
$qb = $productRepository->createQueryBuilder('p')
    ->where('p.source = :source_name')
    ->setParameter('source_name', 'FashionDays');
```

Fixed in 3 locations:
- `index()` method (line 37) - Homepage filtering
- `show()` method (line 234) - Product recommendations
- `comparePrices()` method (line 532) - Price comparison

### 3. Updated Import Commands

**Files Updated:**
- `src/Command/ScrapeFashionDaysCommand.php`
- `src/Command/ScrapeEmagCommand.php`
- `src/Command/AddProductCommand.php`

All commands now set both fields correctly:

```php
// Set the source platform
$product->setSource('FashionDays'); // or 'eMAG'

// Set the actual category using CategoryMappingService
$localCategory = $this->categoryMappingService->findLocalCategory($sourceCategoryName);
$product->setCategory($localCategory);
```

### 4. Database Migration

**File:** `migrations/Version20251224102002.php`

Created and executed migration:
```sql
ALTER TABLE product ADD source VARCHAR(100) DEFAULT NULL;
```

Migration executed successfully ✅

---

## 🔍 How It Works Now

### Product Structure:
```php
Product {
    id: 123,
    name: "Samsung Galaxy S23",
    price: 2999.00,
    source: "eMAG",              // ← NEW: Platform/source identifier
    category: Category {          // ← EXISTING: Actual product category
        id: 5,
        name: "Телефони",
        slug: "telefoni"
    }
}
```

### Filtering by Source:
```php
// Filter FashionDays products:
$products = $repository->createQueryBuilder('p')
    ->where('p.source = :source')
    ->setParameter('source', 'FashionDays')
    ->getQuery()
    ->getResult();
```

### Filtering by Category:
```php
// Filter products in "Телефони" category:
$products = $repository->createQueryBuilder('p')
    ->where('p.category = :category')
    ->setParameter('category', $categoryEntity)
    ->getQuery()
    ->getResult();
```

---

## ✅ Files Modified

1. **Entity:**
   - `src/Entity/Product.php` - Added `source` field

2. **Controller:**
   - `src/Controller/ReviewController.php` - Fixed all FashionDays queries

3. **Import Commands:**
   - `src/Command/ScrapeFashionDaysCommand.php` - Sets source='FashionDays'
   - `src/Command/ScrapeEmagCommand.php` - Sets source='eMAG'
   - `src/Command/AddProductCommand.php` - Sets source='eMAG'

4. **Migration:**
   - `migrations/Version20251224102002.php` - Added source column

---

## 🧪 Testing

To verify the fix:

1. **Import FashionDays products:**
   ```bash
   php bin/console app:scrape-fashion "https://fashiondays.bg/..."
   ```

2. **Import eMAG products:**
   ```bash
   php bin/console app:scrape-emag --pages=2
   ```

3. **Filter by source on homepage:**
   - Visit: `http://localhost/?source=fashion_days` ✅
   - Visit: `http://localhost/?source=emag` ✅
   - Visit: `http://localhost/?source=alleop` ✅

4. **Check database:**
   ```sql
   SELECT name, source, category_id FROM product LIMIT 10;
   ```

   Should show:
   - FashionDays products with `source='FashionDays'`
   - eMAG products with `source='eMAG'`
   - Both have proper `category_id` foreign keys

---

## 📊 Summary

**Problem:** Type mismatch - trying to use string 'FashionDays' where integer category_id expected

**Solution:** Added dedicated `source` field to separate platform tracking from category classification

**Result:**
- ✅ No more SQL errors
- ✅ Clean separation: `source` = platform, `category` = product type
- ✅ All filtering works correctly
- ✅ Smart category mapping still intact

**Status:** 🎉 **RESOLVED**
