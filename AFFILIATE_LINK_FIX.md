# 🔧 Affiliate Link Fix for Fashion Days & Alleop

## Problem Identified

When clicking on Fashion Days or Alleop products, the affiliate links were redirecting to the campaign homepage instead of the specific product page.

## Root Cause

The system was trying to regenerate affiliate links through the Profitshare API for all products, but Fashion Days and Alleop use direct campaign links with the format:

```
https://profitshare.bg/l/CAMPAIGN_ID?u=ENCODED_PRODUCT_URL
```

This format doesn't work well with the API regeneration logic.

## Solution Implemented

Modified the `ReviewController::buyRedirect()` method to:

1. **For Fashion Days & Alleop:** Use the stored affiliate link directly from the database (which already contains the correct product URL in the `?u=` parameter)

2. **For eMAG & Others:** Continue using the Profitshare API to generate fresh affiliate links

## Changes Made

**File:** `src/Controller/ReviewController.php`

```php
// For Fashion Days and Alleop use the stored affiliate link directly
if (str_contains($productUrl, 'fashiondays') || str_contains($productUrl, 'alleop')) {
    $logger->info("Using direct affiliate link for Fashion Days/Alleop product #{$id}");
    return $this->redirect($review->getAffiliateLink());
}
```

## Verification

You can verify the fix by checking these sample products:

### Alleop Products:
- Product ID: 2614 - http://localhost/buy/2614
- Product ID: 2615 - http://localhost/buy/2615

### Fashion Days Products:
- Product ID: 2516 - http://localhost/buy/2516
- Product ID: 2545 - http://localhost/buy/2545

## Expected Behavior

**Before Fix:**
- Click product → Redirect to campaign homepage (e.g., https://www.alleop.bg/)

**After Fix:**
- Click product → Redirect to specific product page (e.g., https://www.alleop.bg/dvoen-gazov-kotlon-s-kapak-rosberg-r51454d2-2-cheren/p)

## How Affiliate Links Are Stored

The scrapers (`ScrapeFashionDaysCommand` and `ScrapeAlleopDaysCommand`) create affiliate links in this format:

```
Fashion Days: https://profitshare.bg/l/3608115?u=https%3A%2F%2Fwww.fashiondays.bg%2Fproduct-url
Alleop:       https://profitshare.bg/l/3608310?u=https%3A%2F%2Fwww.alleop.bg%2Fproduct-url
```

The `?u=` parameter contains the URL-encoded original product URL, which ensures users are directed to the exact product.

## Testing

To test the fix:

1. Visit your homepage: http://localhost
2. Filter by "ALLEOP" or "FASHION DAYS"
3. Click on any product
4. Click the "КЪМ МАГАЗИНА" button
5. Verify you are redirected to the specific product page, not the homepage

## Campaign IDs

For reference, here are the Profitshare campaign IDs:

- **Fashion Days:** 3608115
- **Alleop:** 3608310
- **eMAG:** (Uses API-generated links)

## Future Maintenance

If you add more stores that use direct campaign links (like Fashion Days and Alleop), simply add them to the condition:

```php
if (str_contains($productUrl, 'fashiondays')
    || str_contains($productUrl, 'alleop')
    || str_contains($productUrl, 'newstore')) {
    return $this->redirect($review->getAffiliateLink());
}
```

---

**Fixed:** 2025-12-18
**Status:** ✅ Resolved
**Impact:** Fashion Days and Alleop affiliate links now work correctly
