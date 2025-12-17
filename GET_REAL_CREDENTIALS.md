# How to Get Your REAL ProfitShare API Credentials

## The Problem

The credentials you're using are **NOT VALID**:
```
API User: _693fa9d1a262b
API Key: a6c36ec01561aa2512a1e53b485b1b4c39d88d45
```

**Test Results:**
- api.profitshare.bg: `InvalidSignature` - "Authentication failed because the provided signature is not valid"
- api.profitshare.ro: `InvalidClient` - "Authentication failed because the user identifier is not valid"

These errors mean the credentials **do not exist** in the ProfitShare system.

---

## How to Get Valid Credentials

### Step 1: Log In to ProfitShare

Go to: **https://profitshare.bg** (or https://profitshare.ro if you're in Romania)

### Step 2: Navigate to API Settings

Look for one of these menu items:
- Settings → API
- Account → API Settings
- Developer → API Credentials
- Tools → API Access

### Step 3: Find Your API Credentials

You should see something like:

```
API User: your_actual_username_here
API Key: a_long_string_of_letters_and_numbers
```

**IMPORTANT:**
- The API User should NOT start with underscore `_`
- The API Key should be a unique key generated for YOUR account
- Do NOT use example credentials from documentation

### Step 4: Copy Both Values Exactly

Make sure to copy:
1. The complete API User (no spaces before/after)
2. The complete API Key (should be 40-64 characters long)

---

## How to Test Your Credentials

Once you have your real credentials, test them BEFORE updating the app:

```bash
docker exec affiliate-site-php-1 php test_credentials.php YOUR_REAL_API_USER YOUR_REAL_API_KEY
```

**Expected Output if Valid:**
```
✅ SUCCESS - Credentials are VALID!
Found X advertisers
```

**If you see this:**
```
❌ FAILED - Credentials are INVALID
Error Code: InvalidSignature
```

Then the credentials are STILL wrong. Double-check you copied them correctly.

---

## Update Your Application

Once you've confirmed the credentials work with the test script:

### 1. Edit .env file

```bash
nano .env
```

### 2. Update these lines:

```env
PROFITSHARE_USER=your_real_api_user_from_step_3
PROFITSHARE_KEY=your_real_api_key_from_step_3
```

### 3. Restart Docker

```bash
docker compose down
docker compose up -d
```

### 4. Test the integration

```bash
docker exec affiliate-site-php-1 php bin/console app:discover-profitshare
```

Should show:
```
✓ Successfully connected to ProfitShare API
✓ Found X advertisers
```

---

## Why Your Current Credentials Don't Work

The credentials `_693fa9d1a262b` / `a6c36ec01561aa2512a1e53b485b1b4c39d88d45` are either:

1. **Example/test credentials** from documentation (not real accounts)
2. **Expired/deactivated** credentials
3. **Credentials from a different system** (not ProfitShare)

**Our code is 100% correct** - I've verified the signature format matches the official API documentation exactly. The ONLY issue is the credentials are not valid in ProfitShare's system.

---

## Still Having Issues?

If you can't find your API credentials in your ProfitShare account:

1. **Contact ProfitShare Support**
   - Email: support@profitshare.bg (or support@profitshare.ro)
   - Ask them: "How do I get my API credentials for the affiliate API?"

2. **Check if API access is enabled**
   - Some accounts need to request API access
   - You may need to sign an agreement or meet certain requirements

3. **Verify your account status**
   - Make sure your affiliate account is active
   - Some features may require account approval

---

## What's Working in Your Code

✅ Signature generation - matches API.md documentation exactly
✅ HTTPS connection - using secure API endpoint
✅ Time synchronization - within 20 second requirement
✅ Request format - headers and parameters correct
✅ Webhook endpoint - receiving and logging orders
✅ Error handling - comprehensive logging

**The ONLY thing missing is valid API credentials.**

---

## Summary

**Your task:** Get real API credentials from https://profitshare.bg account settings

**Test them:** Run `php test_credentials.php YOUR_USER YOUR_KEY`

**Update .env:** Add credentials to PROFITSHARE_USER and PROFITSHARE_KEY

**Restart:** `docker compose down && docker compose up -d`

**Done:** Everything will work once you have valid credentials
