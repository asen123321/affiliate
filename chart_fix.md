# TASK: Fix Price Chart Logic & Enable Hybrid Comparison

**Context:**
Currently, the `<canvas id="priceChart">` only shows static Platform Statistics (eMAG vs Alleop). I have checkboxes (`.compare-checkbox`) on product cards, but checking them does NOT update the chart.

**Requirement:**
I need a "Hybrid" Chart behavior implemented in JavaScript within `index.html.twig` (and reusable for the Review page).

### 1. The Logic Flow
The `updateChart()` function must dynamically switch modes:

**Mode A: Product Comparison (Priority)**
* **Trigger:** When `document.querySelectorAll('.compare-checkbox:checked').length > 0`.
* **Data Source:** Loop through checked checkboxes and extract:
    * Label: `data-name`
    * Data: `data-price`
    * Color: If `data-platform == 'emag'` then Red (`#ef2d2d`), else Green (`#009900`).
* **Display:** A Bar chart showing the specific prices of selected items side-by-side.

**Mode B: Platform Overview (Default)**
* **Trigger:** When NO checkboxes are selected.
* **Data Source:** Use the existing Twig variables for Min/Max/Avg prices (`emagStats`, `alleopStats`).
* **Display:** The original grouped bar chart comparing the two platforms globally.

### 2. Implementation Steps
1.  **Add Event Listeners:**
    * Select all inputs with class `.compare-checkbox`.
    * Add a `'change'` event listener to each that calls `updateChart()`.
2.  **Refactor `updateChart()`:**
    * Destroy the old chart instance if it exists.
    * Check for selected boxes.
    * Build the `datasets` array dynamically based on the mode (A or B).
    * Re-create `new Chart(ctx, { ... })`.

### 3. Review Page Compatibility
* Ensure this logic works on the `/review/` page as well.
* If I am on a Review page, the "current product" should be automatically included in the comparison if the user starts selecting alternatives.

**Action:**
Rewrite the JavaScript section for `priceChart` to implement this hybrid logic immediately.
