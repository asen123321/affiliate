# TASK: Fix Remaining Performance Issues (CLS 0.322 & LCP Text Delay)

The previous fixes helped, but we still have a CLS of 0.322 and LCP of 3.7s. Here is the new diagnosis from Lighthouse. Please generate the specific code fixes.

## 1. CRITICAL: Fix Layout Shift on Hero Section (CLS)
**The Culprit:** `<div class="row align-items-center py-5">` (Score: 0.282)
* **Diagnosis:** This container (holding "TRENDING NOW" and the main headline) collapses to 0 height initially and then expands when content loads, pushing the page down.
* **REQUIRED FIX:**
    1.  Please provide CSS to give this specific `.hero-row` (add this class if needed) a `min-height` suitable for mobile (e.g., `min-height: 400px`) so the space is reserved immediately.
    2.  Alternatively, use CSS `aspect-ratio` on the hero container to reserve space before content loads.

## 2. CRITICAL: Fix Text Render Delay (LCP)
**The Element:** `<h1>Get The Best Tech...</h1>`
**Diagnosis:** The browser is hiding the text for 1.9 seconds while waiting for the font to download.
* **REQUIRED FIX:**
    1.  Update the `@font-face` CSS: Ensure `font-display: swap;` is present. This forces the text to show immediately in a system font before swapping to the custom font.
    2.  Add a `<link rel="preload" href="..." as="font" type="font/woff2" crossorigin>` tag in the HTML `<head>` for the primary bold font used in the H1.

## 3. OPTIMIZE: Fix "Non-Composited Animations"
**Diagnosis:** Lighthouse flags `background-position-x` and `box-shadow` animations as causing lag on mobile.
* **REQUIRED FIX:**
    1.  Refactor the `.gradient-text` animation. Instead of animating `background-position`, use a pseudo-element (`::before`) with the gradient and animate its `transform: translateX(...)` or `opacity`.
    2.  Refactor `.pulse-glow`. Avoid animating `box-shadow` directly if possible, or ensure it's on a dedicated layer with `will-change: transform`.

## 4. IMAGES: Format & Size
**Diagnosis:** Images are still JPG and some lack WebP.
* **REQUIRED FIX:**
    1.  If possible, switch the image serving to use `.webp`.
    2.  Double-check that the Hero Product Image has `fetchpriority="high"` (It seems correctly set now, but verify no lazy loading conflicts exist).

---
**OUTPUT REQUEST:**
Please write the **CSS** first (for the min-height fix and animation refactor), then the **HTML Head** additions (for font preloading).
