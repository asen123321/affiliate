# TASK: Fix "N/A" Specs & Add Dynamic Review Comparison

**Context:**
1. The comparison table currently shows "N/A" for specs because the `data-*` attributes are missing in the Twig template.
2. The user wants an additional "Review Section" below the table to compare the text descriptions/summaries of the selected products.

**Requirements:**

### 1. Fix Data Attributes in Twig (Priority)
In `index.html.twig` (and `review.html.twig`), locate the `.compare-checkbox` input.
You must Populate the `data-*` attributes using the actual Symfony Product entity fields.
*If exact getters aren't known, try standard naming or check `product.specifications` array.*

**Required Logic:**
```html
<input type="checkbox" class="compare-checkbox"
    data-name="{{ product.title }}"
    data-price="{{ product.price }}"
    data-img="{{ product.image }}"
    data-link="{{ path('product_detail', {slug: product.slug}) }}"
    
    {# ATTEMPT TO FETCH SPECS - Adjust variables to match Entity #}
    data-screen="{{ product.screenSize|default(product.specs.screen|default('')) }}"
    data-resolution="{{ product.resolution|default(product.specs.resolution|default('')) }}"
    data-smart="{{ product.smartOs|default(product.specs.os|default('')) }}"
    data-type="{{ product.displayType|default(product.specs.type|default('')) }}"
    
    {# NEW: Add Description for the Review Section #}
    data-summary="{{ product.description|striptags|slice(0, 200) }}..."
>
