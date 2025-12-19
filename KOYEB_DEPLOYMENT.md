# Koyeb Deployment Guide

## Prerequisites

1. **GitHub Repository**: Code must be pushed to https://github.com/asen123321/affiliate.git
2. **Koyeb Account**: Create account at https://app.koyeb.com/
3. **Neon PostgreSQL Database**: Already configured (ep-shiny-forest-agvwg18b)

## Deployment Method: Docker

**Important**: This app uses **Docker deployment**, not Heroku buildpacks, because Koyeb's buildpack auto-detection was incorrectly identifying the app as Python instead of PHP.

## Files Created for Deployment

1. **Dockerfile** - Complete production-ready Docker image with PHP 8.3 + Apache
2. **.dockerignore** - Excludes unnecessary files from Docker build
3. **public/.htaccess** - Apache rewrite rules for Symfony routing
4. **.koyeb.yml** - Environment variables reference (documentation only)

## Key Changes Made

### 1. Moved Symfony Panther to dev dependencies
**Why**: Panther requires Chrome/ChromeDriver which isn't available in production Docker containers.
**Impact**: Scraping commands (app:scrape-alleop, app:scrape-html, app:scrape-fashion-days) won't work in production.
**Solution**: Run scrapers locally or on a separate worker service.

```json
// composer.json
"require-dev": {
    "symfony/panther": "^2.3"  // Moved from "require"
}
```

### 2. Created Production Dockerfile
The Dockerfile:
- Uses `php:8.3-apache` base image
- Installs PostgreSQL, intl, zip, opcache extensions
- Runs `composer install --no-dev --optimize-autoloader`
- Configures Apache to serve from `/var/www/html/public`
- Listens on port 8000 (Koyeb's default)
- Warms up Symfony cache for production
- Installs assets with AssetMapper

### 3. Created .dockerignore
Excludes development files, tests, cache, logs, and documentation from the Docker build for faster builds and smaller images.

## Deployment Steps

### Step 1: Push code to GitHub

```bash
git add .
git commit -m "Prepare for Koyeb deployment"
git push origin main
```

### Step 2: Create Koyeb Service

1. Go to https://app.koyeb.com/
2. Click **Create Service**
3. Choose **GitHub** as deployment method
4. Select repository: `asen123321/affiliate`
5. Branch: `main`
6. Build configuration:
   - **Builder**: Docker
   - **Dockerfile**: `Dockerfile` (default)
   - **Port**: 8000

### Step 3: Configure Environment Variables

Add these environment variables in Koyeb dashboard:

| Variable | Value |
|----------|-------|
| `APP_ENV` | `prod` |
| `APP_SECRET` | `6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e` |
| `DATABASE_URL` | `postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require` |
| `PROFITSHARE_USER` | `_693fa9d1a262b` |
| `PROFITSHARE_KEY` | `a6c36ec01561aa2512a1e53b485b1b4c39d88d45` |

### Step 4: Deploy

Click **Deploy** and wait for build to complete.

## Post-Deployment

### Run Database Migrations (if needed)

Koyeb doesn't provide shell access by default. You have two options:

1. **Use Koyeb Console** (if available):
```bash
php bin/console doctrine:migrations:migrate --no-interaction
```

2. **Pre-deploy migrations**: Add to composer.json scripts:
```json
"scripts": {
    "compile": [
        "php bin/console doctrine:migrations:migrate --no-interaction --allow-no-migration"
    ]
}
```

## Troubleshooting

### Build fails with "Python app" error
**Cause**: Koyeb's buildpack auto-detection chose Python instead of PHP
**Solution**: Use Docker deployment method instead of buildpacks (already configured)

### Database connection errors
**Cause**: DATABASE_URL not set correctly
**Solution**: Double-check the DATABASE_URL environment variable in Koyeb dashboard

### 500 errors after deployment
**Cause**: Missing APP_SECRET or cache issues
**Solution**:
1. Verify APP_SECRET is set
2. Clear cache manually if needed: `php bin/console cache:clear --env=prod`

### Panther-related errors
**Cause**: Panther is not available in production
**Solution**: Scraping commands won't work. Run them locally and use the database.

## Production Considerations

### 1. Scrapers Won't Work in Production
The scraping commands require Chrome/ChromeDriver which isn't available:
- `app:scrape-alleop`
- `app:scrape-html`
- `app:scrape-fashion-days`

**Solution**:
- Run scrapers locally on your development machine
- Or set up a separate worker service with Docker support
- Or use a cron service with Docker (like Render.com background workers)

### 2. Database is Already Populated
Your Neon PostgreSQL database already has data, so the site should work immediately after deployment.

### 3. Static Assets
The buildpack automatically runs:
```bash
php bin/console assets:install public
php bin/console importmap:install
```

### 4. Security Headers
The SecurityHeadersSubscriber is already configured and will work in production.

## Monitoring

After deployment, monitor:
1. **Application logs** in Koyeb dashboard
2. **Database connections** in Neon dashboard
3. **Response times** and errors

## Scaling

Koyeb nano instance should handle moderate traffic. If you need more:
1. Upgrade instance type in Koyeb dashboard
2. Scale horizontally by adding more instances
3. Enable autoscaling if traffic varies

## Cost Estimate

- **Koyeb**: Free tier or ~$5-10/month for nano instance
- **Neon PostgreSQL**: Free tier (500MB storage, 1 database)
- **Total**: ~$0-10/month

## Next Steps

1. ✅ Push code to GitHub
2. ✅ Create Koyeb service
3. ✅ Set environment variables
4. ✅ Deploy
5. ✅ Test the site
6. ⚠️ Set up scraper schedule locally or on separate service
