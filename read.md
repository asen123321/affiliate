Act as a Senior Symfony Developer and SEO Expert. I need to finalize my Affiliate Project for production.

Current Stack:
- Symfony 6/7
- Docker (Docker Compose)
- PostgreSQL
- Entities: Product, Review (with fields: title, slug, meta_description, price, rating, affiliate_link, image_url)

I need you to complete two major phases:

PHASE 1: PRO SEO OPTIMIZATION
Please provide the code to turn this into a high-ranking affiliate site:
1. Dynamic Meta Tags: Update `templates/base.html.twig` and the product view templates to dynamically use the `meta_description` and `title` from the database.
2. Structured Data (JSON-LD): Add Schema.org markup for "Product" and "Review" in the product detail template so Google shows star ratings and prices in search results.
3. Open Graph & Twitter Cards: Add social sharing tags for Facebook/Twitter.
4. Sitemap & Robots: Create a command `app:generate-sitemap` to generate `sitemap.xml` listing all published reviews.

PHASE 2: DEPLOYMENT TO FREE TIER
I want to deploy this online for free. Since I use Docker and PostgreSQL, standard shared hosting won't work.
Please guide me through deploying to **Render.com** (for the App) and **Neon.tech** (for the Free Postgres DB), or a similar viable free stack.

1. Dockerfile Production: Optimize my Dockerfile for production (install only needed deps, enable opcache).
2. Database: Explain how to export my local Docker Postgres data and import it into the remote (Neon/Render) database.
3. Environment: List the environment variables I need to set in the cloud (APP_ENV, DATABASE_URL, PROFITSHARE_KEY).

Let's start with Phase 1 (SEO). Give me the Twig updates.
