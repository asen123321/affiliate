I have a specific issue with the **Fashion Days scraper**. The Sidebar categories are fixed (thank you!), but the product images are still showing up as **blank placeholders** (the camera icon).

**I inspected the HTML (Inspect Element) and here is the exact structure I see:**
1. Container: `<div class="product-card h-100">`
2. Wrapper: `<div class="product-image-wrapper">`
3. Inside the wrapper, there is an `<a>` tag, and usually the `<img>` is inside or adjacent.

**The Problem:**
Your current logic is likely grabbing a generic placeholder `src` or failing to find the image because of how Fashion Days handles lazy loading (often putting the image in `data-original` or using CSS background).

**Task:**
Please rewrite the **Image Extraction Logic** in `ScrapeFashionDaysCommand.php` (specifically the part where we determine `$image`).

**Requirements for the Fix:**
1.  Target the `.product-image-wrapper` specifically.
2.  Look for the `img` tag inside it.
3.  **Priority Check:** deeply check attributes in this order: `data-original`, `data-src`, `src`.
4.  **Fallback:** If no image is found in the `img` tag, check if there is a `style="background-image: url(...)"` on any div inside the wrapper (sometimes they use that).
5.  **Validation:** Ensure we don't save a URL that contains "placeholder" or "data:image".

Please provide the **updated PHP code block** for the image extraction part.
