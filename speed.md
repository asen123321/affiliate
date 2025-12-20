# Performance Optimization Tasks
Based on the latest Lighthouse report (Score: 57), immediate fixes are required to resolve Cumulative Layout Shift (CLS) and Rendering issues.

## 1. Fix Critical CLS (Cumulative Layout Shift)
The report identifies `div.animated-blobs` and the stats row as the main layout shifters.

- **Background Blobs (`.animated-blobs`):**
    - Currently, they are part of the flow, pushing content down.
    - **Action:** Set CSS to `position: absolute;` or `fixed`, `z-index: -1`, `top: 0`, `left: 0`. Ensure they do not occupy physical space in the document flow.

- **Stats Row (`.d-flex` with "50+ Products Tested"):**
    - Icons and text are shifting during load.
    - **Action:** Define explicit `width` and `height` for the icons (<i> tags or SVGs) in CSS. Set a `min-height` for the container to prevent collapse/expansion.

- **Images:**
    - Ensure ALL product images have explicit `width="..."` and `height="..."` attributes in the HTML logic (Twig templates).

## 2. Fix Animation Performance
The report warns about "Non-composited animations" on `.product-card`.

- **Box-Shadow:**
    - STOP animating `box-shadow` on `:hover` (e.g., `transition: box-shadow ...`). This causes heavy re-paints.
    - **Action:** Use `transform: translateY(-5px)` for hover effects. If a shadow change is strictly needed, use an `::after` pseudo-element with `opacity` transition.

## 3. LCP (Largest Contentful Paint)
- Ensure the main Hero Banner image has `fetchpriority="high"` and is NOT lazy-loaded.
