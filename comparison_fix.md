# FIX REQUEST: Restore Product Comparison Logic for #priceChart

**Current Situation:**
I have a comparison page with a Chart.js canvas (`id="priceChart"`).
- Currently, the chart is stuck in "Platform Mode" (showing axes for eMAG/Alleop), but it is empty/broken.
- I have product cards with checkboxes (`.compare-checkbox`) that allow selecting specific items.
- **The Issue:** When I select products to compare, the chart does not update to show the comparison between those specific products. It ignores the selection.

**Requirement:**
I need a "Hybrid" comparison logic implemented in the JavaScript that handles `#priceChart`.

**Please refactor the Chart update function to work as follows:**

### 1. Mode Detection
The script must check if any product checkboxes are selected.
- **IF products are selected:** Enter **"Product Comparison Mode"**.
- **IF NO products are selected:** Enter **"Platform Overview Mode"** (Aggregated stats like Min/Max/Avg price per platform).

### 2. Product Comparison Mode Logic (Priority)
When the user selects checkboxes:
- **Labels (X-Axis):** Should be the **Product Names** (shortened if necessary).
- **Dataset (Y-Axis):** Should be the **Current Price** of the selected products.
- **Colors:** Use different colors for different platforms (e.g., Red for eMAG items, Blue/Green for Alleop items).
- **Action:** The chart must re-render dynamically as I check/uncheck items.

### 3. Technical Implementation Details
Please provide the JavaScript code to fix this. It should look something like this structure:

```javascript
// Pseudo-code logic required
const ctx = document.getElementById('priceChart').getContext('2d');
let priceChart;

function updateChart() {
    // 1. Get all checked checkboxes
    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');
    
    // 2. Prepare Data
    let labels = [];
    let dataPoints = [];
    let backgroundColors = [];

    if (checkedBoxes.length > 0) {
        // --- PRODUCT MODE ---
        checkedBoxes.forEach(box => {
            // Extract data attributes from the checkbox (data-name, data-price, data-platform)
            labels.push(box.dataset.name);
            dataPoints.push(box.dataset.price);
            
            // Assign color based on platform
            if(box.dataset.platform === 'emag') {
                backgroundColors.push('rgba(255, 99, 132, 0.7)'); // eMAG Red
            } else {
                backgroundColors.push('rgba(75, 192, 192, 0.7)'); // Alleop Green/Blue
            }
        });
    } else {
        // --- PLATFORM MODE (Fallback) ---
        // Keep the existing logic for platform comparison (e.g. Min/Max prices)
        // If data is available
    }

    // 3. Render/Update Chart
    if (priceChart) priceChart.destroy();
    
    priceChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Цена (лв.)',
                data: dataPoints,
                backgroundColor: backgroundColors,
                borderWidth: 1
            }]
        },
        options: {
            scales: { y: { beginAtZero: true } },
            responsive: true
        }
    });
}

// Add Event Listeners to checkboxes
document.querySelectorAll('.compare-checkbox').forEach(box => {
    box.addEventListener('change', updateChart);
});
