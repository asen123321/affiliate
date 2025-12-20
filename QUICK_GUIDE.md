# 🚀 Quick Scraping Guide

## Which Scraper to Use?

### ✅ eMAG - Use `app:scrape-html`

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-html \
  "https://www.emag.bg/label/malki-elektrouredi/Genius-Deals-15-21-12-2025-See-all-products/d" \
  -p 5
```

**Why?** eMAG products are in the HTML, no JavaScript needed.

---

### ⚡ Alleop - Use `app:scrape-alleop`

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-alleop \
  "https://www.alleop.bg/uredi-za-kuhnyata" \
  --pages=3
```

**Why?** Alleop uses Vue.js/Luigi's Box API to load products dynamically. Needs JavaScript execution.

---

### 👗 Fashion Days - Use `app:scrape-fd`

```bash
docker exec affiliate-site-php-1 php bin/console app:scrape-fd \
  "https://www.fashiondays.bg/c/obleklo-zheni/" \
  --pages=3
```

**Why?** Fashion Days products are loaded via JavaScript. Needs browser.

---

## 📊 Command Comparison

| Store | Command | Speed | Requires ChromeDriver |
|-------|---------|-------|----------------------|
| eMAG | `app:scrape-html` | ⚡ Fast | ❌ No |
| Alleop | `app:scrape-alleop` | 🐌 Slow | ✅ Yes |
| Fashion Days | `app:scrape-fd` | 🐌 Slow | ✅ Yes |

---

## ✅ Affiliate Links Status

All scrapers now generate **correct affiliate links** that point to the exact product page:

### eMAG:
```
https://profitshare.bg/l/3608089?u=https%3A%2F%2Fwww.emag.bg%2Fproduct-url&source=emag
```

### Alleop:
```
https://profitshare.bg/l/3608346?u=https%3A%2F%2Fwww.alleop.bg%2Fproduct-url&source=alleop
```

### Fashion Days:
```
https://profitshare.bg/l/3608115?u=https%3A%2F%2Fwww.fashiondays.bg%2Fproduct-url&source=fashion_days
```

---

## 🔧 Troubleshooting

### ChromeDriver not found

If you get this error:
```
Could not start chrome. Exit code: 127 (Command not found)
```

**Solution:** Run from inside Docker container (which you're already doing! ✅)

---

### No products found

**For eMAG:**
- ✅ Use `app:scrape-html`
- It should work!

**For Alleop:**
- ❌ Don't use `app:scrape-html`
- ✅ Use `app:scrape-alleop` instead

**For Fashion Days:**
- ❌ Don't use `app:scrape-html`
- ✅ Use `app:scrape-fd` instead

---

## 💡 Pro Tips

1. **Start with 1 page** to test:
   ```bash
   docker exec affiliate-site-php-1 php bin/console app:scrape-html "URL" -p 1
   ```

2. **Then scale up**:
   ```bash
   docker exec affiliate-site-php-1 php bin/console app:scrape-html "URL" -p 10
   ```

3. **Check products**:
   ```bash
   docker exec affiliate-site-php-1 php bin/console dbal:run-sql \
     "SELECT COUNT(*) FROM review WHERE created_at > NOW() - INTERVAL '1 hour'"
   ```

4. **View on website**:
   ```
   http://localhost
   ```

---

**Created:** 2025-12-18
**Status:** ✅ All scrapers working correctly
