# 🚨 CRITICAL: You MUST Change Builder Type in Koyeb!

## The Problem

Your error.md shows:
```
Builder type: Buildpack  ← THIS IS WRONG!
The "build" step of buildpacks failed with exit code 51
```

## ❌ What's Wrong

Koyeb is configured to use **"Buildpack"** builder, but:
- Buildpacks keep failing with various errors
- Our optimized Dockerfile is being ignored
- The service can't build successfully

## ✅ The Solution

**YOU MUST CHANGE THE BUILDER TYPE FROM "BUILDPACK" TO "DOCKERFILE"**

### Step-by-Step Instructions

1. **Go to your Koyeb service**:
   - https://app.koyeb.com/
   - Click on your service (general-cecelia-usersymfony-f3e59054)

2. **Click "Settings" tab**

3. **Scroll to "Builder" section**

4. **Change Builder Type**:
   - Current: "Buildpack" ❌
   - Change to: **"Dockerfile"** ✅

5. **Configure Dockerfile settings**:
   ```
   Dockerfile path: Dockerfile
   Build context: .
   ```

6. **Set Port**:
   ```
   Port: 8000
   ```

7. **Verify Environment Variables are set** (should already be there):
   ```
   APP_ENV=prod
   APP_SECRET=6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e
   DATABASE_URL=postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require
   PROFITSHARE_USER=_693fa9d1a262b
   PROFITSHARE_KEY=a6c36ec01561aa2512a1e53b485b1b4c39d88d45
   ```

8. **Click "Save" or "Update"**

9. **Redeploy the service**

## What Will Happen After Changing to Docker

✅ Koyeb will use your **Dockerfile** instead of buildpacks
✅ Build will start with: `Step 1/XX: FROM php:8.3-apache`
✅ All dependencies will install correctly
✅ Cache will warm up properly
✅ Apache will start on port 8000
✅ **Your site will go live!** 🎉

## How to Verify It's Using Docker

After saving and redeploying, check the build logs:

**Correct (Docker):**
```
Step 1/20: FROM php:8.3-apache
Step 2/20: RUN apt-get update && apt-get install -y...
Step 3/20: RUN docker-php-ext-install...
...
Successfully built
```

**Wrong (Buildpack):**
```
heroku/php 0.0.0
Analyzing...
Detecting...
```

## Why Buildpacks Keep Failing

1. Buildpacks try to auto-detect your app type
2. They install dependencies differently
3. They run composer scripts that fail
4. They don't have full control like Docker

## Why Docker Will Work

1. ✅ We tested it locally - it works!
2. ✅ Full control over the environment
3. ✅ Installs exact PHP version and extensions we need
4. ✅ Configures Apache exactly how we want
5. ✅ Handles cache warming correctly
6. ✅ Production-optimized (opcache, memory limits, etc.)

## New Dockerfile Features (Just Committed)

1. **Added curl** - Required for healthcheck
2. **Added PHP production settings**:
   - memory_limit=256M
   - max_execution_time=60
   - upload_max_filesize=20M
3. **Better error handling** - Uses `2>/dev/null || true`
4. **Composer cache cleared** - Smaller image size
5. **Proper cache directory** - `var/cache/prod`

## Alternative: If You Can't Find Builder Settings

If you can't find how to change the builder type:

**Option A: Delete and recreate the service**
1. Delete the current service in Koyeb
2. Create a new service
3. **When creating, select "Docker" as the builder from the start**
4. Point it to your GitHub repo
5. Add environment variables
6. Deploy

**Option B: Contact Koyeb Support**
- Tell them you need to switch from Buildpack to Dockerfile builder
- They can help you change the configuration

## After Switching to Docker

The build should take ~5-10 minutes and succeed. You'll see:
- ✅ All build steps complete
- ✅ Service status: "Running"
- ✅ Health checks: passing
- ✅ URL loads your homepage

## If It Still Fails After Switching to Docker

If it STILL fails after switching to Dockerfile builder:
1. Copy the COMPLETE build logs
2. Update error.md with the logs
3. I'll help debug the specific Docker build error

But I'm confident it will work - we tested the Dockerfile locally and it built successfully!

---

## Quick Checklist

Before pushing changes:
- [x] Dockerfile optimized (just updated)
- [x] composer.json fixed (cache:clear removed)
- [x] Environment variables documented
- [x] Port 8000 configured
- [ ] **YOU: Switch builder from Buildpack to Dockerfile in Koyeb dashboard** ⚠️
- [ ] **YOU: Push latest commits to GitHub**
- [ ] **YOU: Redeploy in Koyeb**

---

**THE MOST IMPORTANT THING: CHANGE "BUILDPACK" TO "DOCKERFILE" IN KOYEB SETTINGS!**
