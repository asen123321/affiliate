# 🚀 READY TO DEPLOY TO KOYEB

## ✅ All Issues Fixed

1. ✅ Updated composer.lock
2. ✅ Added .env file for build
3. ✅ Removed vendor/ from git
4. ✅ Production Dockerfile ready

## ⚠️ CRITICAL: Use Docker, NOT Buildpacks!

**The error shows Koyeb is using buildpacks (heroku/php 0.0.0).**
**You MUST select "Docker" deployment in Koyeb dashboard!**

## 📝 Deployment Steps

### 1. Push to GitHub
```bash
git push origin main
```

### 2. Deploy in Koyeb Dashboard

Go to https://app.koyeb.com/ and:

#### Option A: Create NEW Service (Recommended)
1. Click "Create Service"
2. Choose "GitHub"
3. Repository: `asen123321/affiliate`
4. Branch: `main`
5. **⚠️ IMPORTANT: Builder = "Docker"** (NOT Buildpack!)
6. Dockerfile: `Dockerfile`
7. Port: `8000`

#### Option B: Update EXISTING Service
1. Go to your existing service
2. Click "Settings"
3. Under "Build", change from "Buildpack" to "Docker"
4. Set Dockerfile: `Dockerfile`
5. Set Port: `8000`
6. Save and redeploy

### 3. Set Environment Variables

In Koyeb dashboard, add these:

```
APP_ENV=prod
APP_SECRET=6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e
DATABASE_URL=postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require
PROFITSHARE_USER=_693fa9d1a262b
PROFITSHARE_KEY=a6c36ec01561aa2512a1e53b485b1b4c39d88d45
```

### 4. Deploy!

Click "Deploy" and it will build using Docker this time.

## 🎯 What Will Happen

With Docker deployment:
1. ✅ Builds PHP 8.3 + Apache image
2. ✅ Runs `composer install --no-dev`
3. ✅ Warms up Symfony cache
4. ✅ Installs assets
5. ✅ Starts Apache on port 8000
6. ✅ Your site goes live! 🎉

## ❌ Common Mistakes to Avoid

1. **DON'T select "Buildpack"** - it will fail with Python error
2. **DO select "Docker"** - uses your Dockerfile
3. **DON'T forget environment variables** - set them BEFORE deploying
4. **DON'T try to run scrapers in production** - run them locally

## 📊 After Deployment

Your app will be live at: `https://your-app.koyeb.app`

Check:
- Homepage loads ✅
- Product pages load ✅
- Search works ✅
- Price comparison works ✅

## 🔧 If Build Still Fails

Check the build logs in Koyeb dashboard. If you see:
- "heroku/php" or "buildpack" = Wrong! Change to Docker
- "Step 1/15: FROM php:8.3-apache" = Correct! Docker is building

---

**PUSH TO GITHUB AND DEPLOY NOW!** 🚀
