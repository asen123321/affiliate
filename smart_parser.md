# TASK: Implement "Smart Spec Parser" for Comparison Table

**Context:**
The Comparison Table currently shows "N/A" (Не е посочено) for specs like Screen Size, Resolution, and Display Type.
However, **the data EXISTS in the Product Description text** (e.g., "32-инчов HD LED телевизор...").

**Requirement:**
Since separate database fields are missing, I need the JavaScript to **parse the Description text** and extract these details using Regex to populate the table cells dynamically.

### 1. Update Twig (Ensure Data is Available)
In `index.html.twig` and `review.html.twig`, ensure the `.compare-checkbox` has the description available as a data attribute:
```html
<input type="checkbox" class="compare-checkbox"
    ...
    data-description="{{ product.description|striptags }}" 
    ...
>
2. Implement JavaScript Regex Logic
Modify the updateChart() function. When building the table rows (<tr>):

DO NOT just rely on empty data-screen or data-resolution attributes.

Implement a Fallback Logic: If the specific attribute is empty, scan data-description.

Regex Parsing Rules (Examples):

Screen Size: Look for patterns like /\b(\d{2,3})["'”]|(\d{2,3})\s*inch|(\d{2,3})\s*инч/i or /\b(\d{2,3})\s*см/i.

Resolution: Look for /\b(HD|FHD|UHD|4K|8K)\b/i OR /\b(\d{3,4}\s*x\s*\d{3,4})\b/.

Display Type: Look for /\b(LED|OLED|QLED|MiniLED|DLED)\b/i.

Smart TV: Look for /\b(Android|WebOS|Tizen|Google TV|Smart)\b/i.
