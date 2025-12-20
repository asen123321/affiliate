# Quick Koyeb Deployment Guide

## ⚡ Fast Track Deployment

### 1. Push to GitHub
```bash
git push origin main
```

### 2. Koyeb Dashboard Setup

**URL**: https://app.koyeb.com/

#### Builder Configuration (CRITICAL!)
- ✅ **Builder**: "Dockerfile" (NOT Buildpack!)
- ✅ **Port**: 8000
- ✅ **Dockerfile path**: Dockerfile

#### Environment Variables (Required)
```
APP_ENV=prod
APP_SECRET=6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e
APP_DEBUG=0
DATABASE_URL=postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require
PROFITSHARE_USER=_693fa9d1a262b
PROFITSHARE_KEY=a6c36ec01561aa2512a1e53b485b1b4c39d88d45
```

### 3. Build Verification

**Correct build logs should show**:
```
Step 1/20: FROM php:8.3-apache
Step 2/20: RUN apt-get update...
```

**Wrong build (DON'T SEE THIS)**:
```
heroku/php 0.0.0
```

### 4. Verify Deployment

After deploy completes, test:
- [ ] Homepage loads
- [ ] Product search works
- [ ] Database queries work
- [ ] Price comparison chart displays

---

## 🔧 Troubleshooting

**Problem**: Build shows "heroku/php" or "buildpack"
**Fix**: You selected wrong builder! Change to "Dockerfile"

**Problem**: Database connection errors
**Fix**: Check DATABASE_URL environment variable

**Problem**: 500 errors
**Fix**: Verify APP_SECRET is set in Koyeb dashboard

---

## 📚 Full Documentation

See **KOYEB_DEPLOY.md** for complete step-by-step instructions.

---

**Key Changes in This Version**:
- ✅ Optimized Dockerfile with proper layer caching
- ✅ Fixed build-time environment variables
- ✅ Added opcache for production performance
- ✅ Created var/ directories before setting permissions
- ✅ Added health check for monitoring
- ✅ Improved error handling with || true for optional commands
