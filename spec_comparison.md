# TASK: Implement Full Product Specification Comparison Table (eMAG Style)

**Context:**
I currently have a "Hybrid Chart" that compares prices. Now, I need to expand this to a full comparison table (like eMAG.bg) that appears when I select products.

**Requirements:**

### 1. Data Availability (Twig Update)
In my product card templates (e.g., `_product_card.html.twig`), update the `.compare-checkbox` input to include detailed data attributes.
Assuming the `product` object has these fields, add them:
* `data-img`: Product image URL.
* `data-screen`: Screen size (e.g., "55 inch").
* `data-resolution`: Resolution (e.g., "4K UHD").
* `data-type`: Display Type (e.g., "LED/QLED").
* `data-smart`: Smart TV OS (e.g., "Android TV").
* `data-link`: Link to the offer.

### 2. UI: The Comparison Table
Create a new container `<div id="comparisonTableContainer" class="d-none mt-5">` below the chart.
Inside, generate a dynamic HTML Table:
* **Structure:**
    * **Row 1 (Header):** Product Images + Names.
    * **Row 2 (Price):** Price in BGN.
    * **Row 3:** Screen Size.
    * **Row 4:** Resolution.
    * **Row 5:** Smart TV / OS.
    * **Row 6 (Action):** "View Offer" buttons.
* **Style:** Use Bootstrap table classes (`table table-bordered table-striped`). Columns should represent selected products.

### 3. JavaScript Logic (Update `updateChart`)
Extend the existing `updateChart()` function. When products are selected:
1.  **Show the Table:** Remove `d-none` from `#comparisonTableContainer`.
2.  **Clear previous content:** Empty the `thead` and `tbody`.
3.  **Loop through checked boxes:**
    * Extract the new `data-*` attributes.
    * Append a new column (<td>) for each product in every row.
4.  **Handling "No Selection":** If nothing is checked, hide the table (`d-none`) and show only the default Platform Chart.

**Goal:**
When I click "Compare Selected", I want to scroll down and see:
1.  The Price Bar Chart (Existing).
2.  A Detailed Specification Table below it (New).

**Action:**
Please implement the HTML structure, the Twig data attribute updates, and the JavaScript logic to render this table dynamically.
