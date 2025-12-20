# TASK: Fix Performance Regression (Score dropped from 83 to 60)

I need you to act as a Senior Frontend Performance Expert. I have a website built with Bootstrap/Symfony that experienced a massive performance drop due to CLS and LCP issues.

Here is the diagnosis from the Lighthouse report. Please generate the specific CSS and HTML fixes.

## 1. CRITICAL: Fix Cumulative Layout Shift (CLS) - Current Score: 0.298
The report identifies the specific element causing the layout shift.
**The Culprit:** `body > div.mega-hero > div.animated-blobs` (Score: 0.284).
* **The Issue:** This element is likely loading late or animating dimensions, pushing the entire page content down.
* **REQUIRED FIX:** Please provide CSS to make `.animated-blobs` explicitly positioned (e.g., `position: absolute; top: 0; left: 0; z-index: -1;`) so it is taken out of the document flow and does NOT push content. It must have fixed dimensions or `contain: strict`.

## 2. CRITICAL: Fix Largest Contentful Paint (LCP) - Current Time: 4.3s
**The Element:** `<h1 class="display-2 fw-black mb-4 text-shadow">Get The Best Tech...</h1>`
**Render Delay:** 7,210 ms.
* **The Issue:** The main text is appearing way too late. This is likely due to font loading or the hero container rendering late.
* **REQUIRED FIX:**
    1.  Generate the HTML `<link rel="preload">` tag for the critical font used in `.display-2`.
    2.  Ensure the CSS for `.mega-hero` is loaded in the `<head>` (Critical CSS) or not blocked by JS.
    3.  Add `font-display: swap;` to the `@font-face` declaration for the font used here.

## 3. Image Optimization
**The Issue:** Product images are served as JPG and lack explicit sizing.
* Example: `<img src="...143724-home_default.jpg" ... width="220" height="220">`
* **REQUIRED FIX:**
    1.  Advise on implementing `WebP` or `AVIF` formats.
    2.  Check the "Above the Fold" image (the Hero banner). Ensure it does **NOT** have `loading="lazy"`. It must use `fetchpriority="high"`.
    3.  For the product grid images (below the fold), ensure `loading="lazy"` is kept, but ensure `width` and `height` attributes perfectly match the aspect ratio to prevent shifts.

## 4. Unused CSS & Bootstrap
**The Issue:** Loading full `bootstrap.bundle.min.js` and `bootstrap-icons.woff2` blocking the main thread.
* **REQUIRED FIX:** Suggest a strategy to defer non-critical Bootstrap JS or use a lighter icon strategy if possible.

---
**OUTPUT REQUEST:**
Please write the corrected CSS for `.animated-blobs` and `.mega-hero` first, as these are the primary causes of the score drop. Then provide the HTML Header optimizations.
