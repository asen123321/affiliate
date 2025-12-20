# Koyeb Deployment Guide - Symfony Affiliate Site

## Prerequisites Checklist

- [x] Neon PostgreSQL database configured
- [x] GitHub repository: https://github.com/asen123321/affiliate.git
- [ ] Koyeb account: https://app.koyeb.com/

## Step 1: Push Code to GitHub

```bash
git add .
git commit -m "Optimize Dockerfile for Koyeb deployment"
git push origin main
```

## Step 2: Create Koyeb Service

### Option A: Create New Service (Recommended)

1. Go to https://app.koyeb.com/
2. Click **"Create Web Service"** or **"Deploy"**
3. Select **"GitHub"** as source
4. Authorize Koyeb to access your GitHub account if needed
5. Select repository: `asen123321/affiliate`
6. Branch: `main`

### Build Configuration (CRITICAL):

**You MUST configure these settings:**

- **Builder**: Select **"Dockerfile"** (NOT Buildpack!)
- **Dockerfile path**: `Dockerfile` (default)
- **Build context**: `.` (default)
- **Docker command**: Leave empty (uses CMD from Dockerfile)

### Service Configuration:

- **Service name**: `affiliate-site` (or your choice)
- **Region**: Choose closest to your users (e.g., `fra` for Europe)
- **Instance type**: `nano` (should be sufficient to start)
- **Port**: `8000` (CRITICAL - must match Dockerfile EXPOSE)
- **Protocol**: `HTTP`

### Scaling:

- **Min instances**: `1`
- **Max instances**: `1` (increase later if needed)

## Step 3: Environment Variables (CRITICAL)

Click **"Add Variable"** and add each of these:

| Name | Value | Type |
|------|-------|------|
| `APP_ENV` | `prod` | Plain text |
| `APP_SECRET` | `6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e` | Secret |
| `APP_DEBUG` | `0` | Plain text |
| `DATABASE_URL` | `postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require` | Secret |
| `PROFITSHARE_USER` | `_693fa9d1a262b` | Secret |
| `PROFITSHARE_KEY` | `a6c36ec01561aa2512a1e53b485b1b4c39d88d45` | Secret |

**Important Notes:**
- Mark sensitive values as "Secret" type in Koyeb
- These will override the .env file values
- APP_SECRET is used for Symfony security features
- DATABASE_URL connects to your Neon PostgreSQL database

## Step 4: Deploy

1. Review all settings
2. Click **"Deploy"**
3. Wait for build to complete (5-10 minutes first time)

## Step 5: Monitor Deployment

### Watch Build Logs:

You should see output like:

```
Step 1/20: FROM php:8.3-apache
Step 2/20: RUN apt-get update && apt-get install -y...
Step 3/20: RUN docker-php-ext-install...
...
Step 20/20: CMD ["apache2-foreground"]
Successfully built abc123def456
```

### Common Build Issues:

**If you see "heroku/php" or "buildpack":**
- ❌ You selected the wrong builder!
- Go back and select "Dockerfile" NOT "Buildpack"

**If composer install fails:**
- Check that composer.lock is committed
- Verify composer.json is valid

**If cache:clear fails:**
- This is handled with APP_SECRET=dummy_secret_for_build
- Should not happen with new Dockerfile

## Step 6: Verify Deployment

### After successful deployment:

1. Koyeb will provide a URL like: `https://affiliate-site-yourname.koyeb.app`
2. Click the URL or visit it in your browser
3. Test the following:

- [ ] Homepage loads (`/`)
- [ ] Product listing works
- [ ] Search functionality works
- [ ] Product details page loads
- [ ] Price comparison chart displays
- [ ] Database queries work

### Check Application Logs:

1. Go to Koyeb dashboard
2. Click your service
3. Navigate to "Logs" tab
4. Look for any errors

## Troubleshooting

### Issue: Build fails with "Unable to read .env file"

**Solution**: This is fixed in the new Dockerfile with:
```dockerfile
ENV APP_ENV=prod \
    APP_DEBUG=0
```

### Issue: "heroku/php 0.0.0" appears in build logs

**Solution**: You're using Buildpack instead of Dockerfile!
- Edit service settings
- Change Builder from "Buildpack" to "Dockerfile"
- Redeploy

### Issue: Database connection errors

**Solution**:
- Verify DATABASE_URL is correctly set in environment variables
- Check Neon database is running
- Verify SSL mode is `require`

### Issue: 500 errors after deployment

**Solution**:
1. Check logs in Koyeb dashboard
2. Verify APP_SECRET is set
3. Ensure all environment variables are configured
4. Check var/cache and var/log permissions (handled by Dockerfile)

### Issue: Health check failing

**Solution**:
- Verify port 8000 is configured in Koyeb
- Check Apache is listening on port 8000
- Examine container logs

## Important Production Notes

### Scraper Commands Won't Work

The following commands require Chrome/ChromeDriver (not available):
- `php bin/console app:scrape-alleop`
- `php bin/console app:scrape-html`
- `php bin/console app:scrape-fashion-days`

**Solution**: Run scrapers locally and let them populate the Neon database.

### Database Migrations

If you need to run migrations:

**Option 1: Local execution (recommended)**
```bash
# Run locally, migrations will apply to Neon database
php bin/console doctrine:migrations:migrate --no-interaction
```

**Option 2: Via Koyeb console** (if available)
```bash
php bin/console doctrine:migrations:migrate --no-interaction
```

### Performance Optimization

After deployment:
1. Monitor response times in Koyeb metrics
2. Check database query performance in Neon dashboard
3. Consider enabling Redis for session storage if needed
4. Upgrade instance type if CPU/memory limits reached

## Cost Estimate

- **Koyeb nano instance**: ~$5-7/month (or free tier if available)
- **Neon PostgreSQL**: Free tier (0.5GB storage)
- **Total**: ~$0-7/month

## Scaling Considerations

If traffic increases:

1. **Vertical scaling**: Upgrade from nano → micro → small
2. **Horizontal scaling**: Increase max instances (2, 3, etc.)
3. **Database**: Upgrade Neon plan for more storage/connections
4. **CDN**: Add Cloudflare in front for static assets

## Custom Domain (Optional)

After deployment works:

1. Go to Koyeb service settings
2. Click "Domains"
3. Add your custom domain
4. Update DNS records as instructed
5. SSL certificate will be automatically provisioned

## Maintenance

### Updating the Application:

```bash
# Make changes locally
git add .
git commit -m "Your changes"
git push origin main

# Koyeb will automatically detect and redeploy
```

### Rolling Back:

1. Go to Koyeb dashboard
2. Click "Deployments" tab
3. Select previous successful deployment
4. Click "Redeploy"

## Support

- Koyeb docs: https://www.koyeb.com/docs
- Symfony docs: https://symfony.com/doc/current/deployment.html
- Neon docs: https://neon.tech/docs

---

## Quick Checklist

Before deploying, verify:

- [ ] Code pushed to GitHub main branch
- [ ] Koyeb builder set to "Dockerfile" NOT "Buildpack"
- [ ] Port configured as 8000
- [ ] All 6 environment variables added
- [ ] composer.lock is up to date
- [ ] .env file exists in repository
- [ ] Neon database is accessible

After deploying, verify:

- [ ] Build logs show "FROM php:8.3-apache" (not heroku/php)
- [ ] No errors in application logs
- [ ] Homepage loads successfully
- [ ] Database queries work
- [ ] Search and filtering work
- [ ] Chart.js price comparison displays

---

**Ready to deploy!** 🚀
