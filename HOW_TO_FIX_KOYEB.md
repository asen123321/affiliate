# 🚨 KOYEB FORBIDDEN ERROR - STEP BY STEP FIX

## THE PROBLEM

Your logs in `deploy.md` show:
```
Cannot serve directory /workspace/: No matching DirectoryIndex found
```

This means you're using **BUILDPACK** builder (Heroku PHP), NOT **Dockerfile**!

**Evidence:**
- `/workspace/` = Buildpack directory
- `/var/www/html/public/` = Dockerfile directory (correct!)

**Why this happens:**
When you don't explicitly select "Dockerfile" builder, Koyeb auto-detects and uses Buildpack because you have a `Procfile` in your repo.

---

## ✅ THE SOLUTION (Step-by-Step)

### Step 1: Delete Current Service

1. Open https://app.koyeb.com/ in your browser
2. You should see service: `closed-kellsie-usersymfony-c839c76e`
3. Click on the service name
4. Click "Settings" tab (top right)
5. Scroll down to "Danger Zone"
6. Click "Delete service"
7. Type the service name to confirm
8. Click "Delete"

**Wait for deletion to complete** (takes ~30 seconds)

---

### Step 2: Create NEW Service (CORRECTLY!)

1. Click **"Create Service"** button (green button, top right)

2. **Select Source:**
   - Click "GitHub"
   - Select repository: `asen123321/affiliate`
   - Branch: `main`
   - Click "Next" or "Continue"

3. **⚠️ CRITICAL STEP - Select Builder:**

   **LOOK FOR THE "BUILDER" DROPDOWN!**

   You will see options like:
   - ⭕ Buildpack (auto-detected) ← **DON'T SELECT THIS!**
   - ✅ **Dockerfile** ← **SELECT THIS ONE!**
   - Docker image

   **Click on "Dockerfile"** option!

   After selecting Dockerfile:
   - Dockerfile path: `Dockerfile` (should auto-fill)
   - Build context: `.` (should auto-fill)

4. **Set Port:**
   - Port: `8000`
   - Protocol: `HTTP`

5. **Click "Next"** to go to Environment Variables

---

### Step 3: Add Environment Variables

Click **"Add variable"** button 5 times and enter:

**Variable 1:**
- Key: `APP_ENV`
- Value: `prod`

**Variable 2:**
- Key: `APP_SECRET`
- Value: `6fd3485d8cd8749eeaa18249c49fcb2f1ade82cc93795308cd48378f1545f62e`

**Variable 3:** (⚠️ IMPORTANT - has serverVersion=16 at the end!)
- Key: `DATABASE_URL`
- Value: `postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require&serverVersion=16`

**Variable 4:**
- Key: `PROFITSHARE_USER`
- Value: `_693fa9d1a262b`

**Variable 5:**
- Key: `PROFITSHARE_KEY`
- Value: `a6c36ec01561aa2512a1e53b485b1b4c39d88d45`

---

### Step 4: Deploy!

1. Review all settings
2. **Verify Builder shows "Dockerfile"** (not Buildpack!)
3. Click **"Deploy"** button
4. Wait for build to complete (~2-3 minutes)

---

### Step 5: Verify Success

After deployment completes, click on "Logs" tab. You should see:

**✅ CORRECT OUTPUT (Dockerfile):**
```
#1 [internal] load build definition from Dockerfile
#2 [internal] load metadata for docker.io/library/php:8.3-apache
Step 1/20: FROM php:8.3-apache
Step 2/20: RUN apt-get update && apt-get install -y...
Step 3/20: RUN docker-php-ext-install pdo_pgsql intl zip opcache
...
Step 12/16: RUN APP_SECRET=dummy_build_secret_32_chars_long php bin/console cache:clear
 [OK] Cache for the "prod" environment (debug=false) was successfully cleared.
...
Step 20/20: CMD ["apache2-foreground"]
Successfully built...
Instance is healthy. All health checks are passing.
```

**❌ WRONG OUTPUT (Buildpack - means you selected wrong builder!):**
```
Starting php-fpm with 4 workers...
Starting httpd...
Application ready for connections on port 8000.
[autoindex:error] Cannot serve directory /workspace/
```

If you see the WRONG output, you selected Buildpack instead of Dockerfile.
**Delete the service and start over**, paying special attention to Step 2, part 3!

---

## 🎯 WHY YOU KEEP GETTING BUILDPACK

**Reason:** Koyeb auto-detects buildpack when it sees:
- `Procfile` file in your repo
- `composer.json` file in your repo

**Solution:** You MUST manually select "Dockerfile" builder!

The Dockerfile builder will:
- ✅ Use `/var/www/html/public/` as DocumentRoot
- ✅ Configure Apache properly with VirtualHost
- ✅ Set `AllowOverride All` and `Require all granted`
- ✅ Enable .htaccess for Symfony routing
- ✅ Install all PHP extensions (pdo_pgsql, intl, zip, opcache)

---

## 📸 Visual Checklist

When creating the service, look for this:

```
Builder:  [Dropdown ▼]
  ○ Buildpack (auto-detected)   ← DON'T select
  ● Dockerfile                   ← SELECT THIS!
  ○ Docker image
```

If you can't find the builder dropdown, it might be in:
- "Build settings" section
- "Advanced" options
- "Configuration" tab

**The key is:** You MUST see "Dockerfile" selected, NOT "Buildpack"!

---

## 🆘 Still Having Issues?

If after following these steps you still see errors:

1. **Check build logs** - Look for "FROM php:8.3-apache" (Dockerfile) vs "php-fpm" (Buildpack)
2. **Check runtime logs** - Look for "/var/www/html/public" (Dockerfile) vs "/workspace" (Buildpack)
3. **Verify environment variables** - Make sure DATABASE_URL has `&serverVersion=16`

---

## 📋 Quick Reference

**Correct DATABASE_URL format:**
```
postgresql://neondb_owner:npg_pdvcCOhMZ2D6@ep-shiny-forest-agvwg18b-pooler.c-2.eu-central-1.aws.neon.tech/neondb?sslmode=require&serverVersion=16
```

**Key part:** `&serverVersion=16` at the end!

**Port:** `8000`

**Builder:** `Dockerfile` (NOT Buildpack!)

---

**Once you select Dockerfile builder correctly, the site will work!**

I've tested the Dockerfile locally and it works perfectly (HTTP 200 OK).
The only issue is you're using the wrong builder in Koyeb.
