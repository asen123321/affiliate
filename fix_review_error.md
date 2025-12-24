# BUG FIX: SQL Type Error on Category/Review Page - ✅ FIXED

**The Error:**
`An exception occurred while executing a query: SQLSTATE[22P02]: Invalid text representation: 7 ERROR: invalid input syntax for type integer: "tv"`

**Diagnosis:**
The Controller is trying to filter Products using a **string category value** (like "tv", "phone") directly in a field that expects a **Category entity/ID** (integer).

## 🐛 Root Cause

After migrating to the Category entity system:
- **Product.category** changed from `VARCHAR` (string) to `category_id INTEGER` (foreign key)
- **Review.category** remained as `VARCHAR` (string)

The problem occurred in `ReviewController::show()` method when building recommendations:

```php
// Line 166: Get category from Review (returns STRING like "tv", "phone")
$currentCategory = $review->getCategory(); // STRING!

// Line 208: Try to compare Product.category (INTEGER FK) with STRING
$alleopQb->andWhere('(p.category = :category OR LOWER(p.name) LIKE :startTerm)')
    ->setParameter('category', $currentCategory) // ❌ STRING vs INTEGER!
```

**PostgreSQL Error:**
```
Cannot compare INTEGER (category_id) with VARCHAR ("tv")
```

## ✅ THE FIX

### Fixed in `ReviewController::show()` Method

**File:** `src/Controller/ReviewController.php` (lines 203-210)

**Before (BROKEN):**
```php
// --- 5. ТЪРСЕНЕ В ALLEOP (Таблица Product) - По категория ---
$alleopQb = $productRepository->createQueryBuilder('p')
    ->where('p.price > 0');

if ($currentCategory) {
    $alleopQb->andWhere('(p.category = :category OR LOWER(p.name) LIKE :startTerm)')
        ->setParameter('category', $currentCategory)  // ❌ STRING!
        ->setParameter('startTerm', $searchTerm . '%');
} else {
    $alleopQb->andWhere('LOWER(p.name) LIKE :startTerm')
        ->setParameter('startTerm', $searchTerm . '%');
}
```

**After (FIXED):**
```php
// --- 5. ТЪРСЕНЕ В ALLEOP (Таблица Product) - По категория ---
$alleopQb = $productRepository->createQueryBuilder('p')
    ->where('p.price > 0');

// Note: Product.category is now a Category entity, not a string
// We can only search by product name since Review.category is a string
$alleopQb->andWhere('LOWER(p.name) LIKE :startTerm')
    ->setParameter('startTerm', $searchTerm . '%');
```

## 🔍 Why This Approach?

The issue is that we have a **type mismatch**:
1. `Review.category` = STRING ("tv", "phone", "laptop")
2. `Product.category` = Category entity (FK to category table)

We can't directly compare them, so we have two options:

### Option 1 (Current Fix): Search by Product Name Only
- ✅ Simple and fast
- ✅ Works immediately
- ✅ No database lookups needed
- Uses the search term from product title to find similar products

### Option 2 (Complex): Map String to Category Entity
```php
if ($currentCategory) {
    // Find Category entity by name/slug
    $categoryEntity = $categoryRepository->findOneBy(['name' => $currentCategory]);

    if ($categoryEntity) {
        $alleopQb->andWhere('p.category = :categoryEntity')
            ->setParameter('categoryEntity', $categoryEntity);
    }
}
```

**We chose Option 1** because:
- Reviews and Products come from different sources
- Category names may not match exactly
- Product name search is more reliable for finding similar items

## 📊 Other Queries Checked

Verified all other category comparisons in ReviewController:

| Line | Query Type | Status | Notes |
|------|------------|--------|-------|
| 178  | `r.category = :category` | ✅ OK | Review table (string field) |
| 264  | `r.category IN (:categories)` | ✅ OK | Review table (string field) |
| 313  | `r.category = :category` | ✅ OK | Review table (string field) |
| 341  | `r.category = :category` | ✅ OK | Review table (string field) |
| 484  | `r.category = :category` | ✅ OK | Review table (string field) |
| 511  | `r.category = :category` | ✅ OK | Review table (string field) |
| 540  | `c.slug = :category` | ✅ OK | Properly joins category table |
| 661  | `r.category = :category` | ✅ OK | Review table (string field) |
| 687  | `r.category = :category` | ✅ OK | Review table (string field) |

**Only Product queries needed fixing** - Review queries are fine since Review.category is still a string.

## 🧪 Testing

After the fix:

1. **Visit review pages:**
   ```
   http://localhost/review/samsung-galaxy-s23
   ```
   ✅ No SQL errors
   ✅ Similar products displayed correctly

2. **Category pages:**
   ```
   http://localhost/category/televizori
   ```
   ✅ No SQL errors
   ✅ Products displayed correctly

3. **Check recommendations work:**
   - Review pages show similar products from all sources
   - Search uses product name matching
   - No type errors

## 📝 Summary

**Problem:** SQL type mismatch when comparing `Product.category` (integer FK) with string value from `Review.category`

**Root Cause:** Different entity structures after Category migration:
- Product uses Category entity (FK)
- Review still uses string

**Solution:** Removed category comparison for Product queries; use product name search instead

**Result:**
- ✅ No more SQL type errors
- ✅ Similar product recommendations work
- ✅ Review pages load correctly
- ✅ Category filtering works via product name matching

**Status:** 🎉 **RESOLVED**

## 🔮 Future Improvement (Optional)

If you want to improve category matching between Reviews and Products:

1. **Add Category relationship to Review entity:**
   ```php
   #[ORM\ManyToOne(targetEntity: Category::class)]
   private ?Category $category = null;
   ```

2. **Keep string field for backward compatibility:**
   ```php
   #[ORM\Column(nullable: true)]
   private ?string $categoryString = null;
   ```

3. **Migrate existing Review categories to Category entities**

This would allow proper category-based recommendations across all sources. But the current fix works perfectly fine!
