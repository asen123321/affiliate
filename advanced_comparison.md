# TASK: Implement Advanced "Hybrid" Comparison & UI Controls

**Context:**
I have a Symfony app with product cards (`.compare-checkbox`). Currently, the chart `#priceChart` is static/empty. I want to allow users to select specific products and compare them visually on the chart.

**Requirements:**

### 1. UI Updates (Twig Templates)
* **Add a "Compare Selected" Button:**
    * Location: Next to the existing "Сравни tv eMAG vs Alleop" button (in `review.html.twig` and `compare_category.html.twig`).
    * Label: "Сравни избраните" (Compare Selected).
    * ID: `compareSelectedBtn`.
    * Style: A secondary button (e.g., `btn-outline-primary`).
    * **Behavior:** When clicked, it must **Smooth Scroll** down to the `#priceChart` section.

### 2. JavaScript Logic (The "Hybrid" Chart)
Refactor the JS for `priceChart` to handle two modes:

**Mode A: Platform Overview (Default)**
* **Trigger:** When NO checkboxes are checked.
* **Data:** Show the aggregated Min/Avg/Max prices for eMAG vs Alleop (using existing Twig variables).

**Mode B: Specific Product Comparison (Active)**
* **Trigger:** When checkboxes are checked OR `compareSelectedBtn` is clicked.
* **Data Source:** Iterate through checked inputs (`.compare-checkbox:checked`).
* **Datasets:**
    * **Dataset 1 (Price):** Bar chart showing `data-price`. Color code by platform (eMAG: Red, Alleop: Green/Blue).
* **Review Page Specifics:**
    * If on a Review Page (`/review/slug`), the **Main Product** (the one being reviewed) should generally be visible or selectable to be included in the chart for context.

### 3. Implementation Plan for JS
Please write the script to:
1.  Initialize the Chart instance.
2.  Listen for `change` on all `.compare-checkbox`.
3.  Listen for `click` on `#compareSelectedBtn` -> Scroll to chart -> Update chart.
4.  **Update Function:**
    * Destroy old chart.
    * Build labels/data arrays from checked items.
    * Render new Bar Chart.

**Action:**
Provide the full JavaScript code block and the HTML snippet for the new button.
