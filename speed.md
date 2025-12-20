I am looking at the latest Lighthouse report (Score dropped to 52). The previous fixes DID NOT work. We need to fix the CSS strictly according to these diagnostics:

1. CRITICAL CLS FIX (.animated-blobs): The report explicitly states div.animated-blobs is causing a layout shift of 0.258.

Current behavior: The blobs are taking up physical space in the DOM flow.

REQUIRED FIX: Force .animated-blobs to have position: absolute; (or fixed), top: 0, left: 0, width: 100%, height: 100%, and z-index: -1. It MUST NOT push the hero content down.

2. FIX 'Non-composited animations' (Performance Killer): The report flagged 52 elements with 'Unsupported CSS Property'. You are animating properties that trigger layout recalculations: padding, border-radius, font-weight, box-shadow.

REQUIRED FIX: REMOVE transitions on padding, margin, width, height, and border-radius.

Replace hover effects: Use ONLY transform: scale() or transform: translateY() and opacity. Do NOT animate box-shadow directly (it is too heavy).

3. Fix Image LCP:

Ensure the main Hero image has fetchpriority="high" explicitly in the HTML/Twig.

Please rewrite the CSS for .animated-blobs and .product-card to comply with these strict performance rules now."
4. FIX SPEED INDEX (Critical Font Loading): The Speed Index has degraded to 8.9s because text remains invisible while custom fonts are downloading (Flash of Invisible Text).

REQUIRED FIX: Update all @font-face rules in the CSS to include font-display: swap;.

Example:

CSS

@font-face {
font-family: 'MyFont';
src: url(...);
font-display: swap; /* THIS IS MANDATORY */
}
Content Visibility: Add content-visibility: auto; to the Footer and lower sections of the page (e.g., #footer, .bottom-section) so the browser doesn't waste time rendering them until the user scrolls down.
