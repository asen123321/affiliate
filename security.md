Great work on the SEO and Deployment plan. Now I need to finalize the User Experience and Security before going live.

Act as a Senior Symfony Security & UI/UX Architect. Please guide me through Phase 3 (Mobile/UI) and Phase 4 (Security Hardening).

PHASE 3: MOBILE-FIRST UX & RESPONSIVENESS
The site must look perfect on mobile devices (Google Mobile-First indexing).
1. Viewport & Grid: Ensure `base.html.twig` has the correct viewport meta tag. Update the product grid in `index.html.twig` to use Bootstrap responsive classes (e.g., `col-12 col-md-4 col-lg-3`) so it stacks correctly on phones.
2. Navigation: Replace the standard menu with a collapsible "Hamburger" menu for mobile users using Bootstrap's navbar component.
3. Images: Add the `img-fluid` class and lazy loading (`loading="lazy"`) to all product images to prevent layout shifts and save data.

PHASE 4: SECURITY HARDENING (CRITICAL)
I need to protect the application from common attacks (CSRF, XSS, Injection).
1. CSRF Protection: Ensure CSRF protection is enabled globally in `framework.yaml`. Show me how to add the `{{ csrf_token() }}` in my search forms and any POST forms.
2. XSS Prevention (Scraped Content): Since I am scraping HTML content from other sites and displaying it with `|raw`, this is a security risk. Please show me how to install and use `html-sanitizer` to strip malicious scripts from the scraped descriptions BEFORE saving/displaying them.
3. Access Control (Firewall): Currently, my scraper commands might be accessible via URL triggers. Configure `security.yaml` to restrict access to `/admin` or scraper routes (like `/buy/*` redirects) so bots can't abuse them.
4. HTTP Security Headers: Add the necessary headers (Content-Security-Policy, X-Frame-Options) to prevent Clickjacking and other attacks.

Please provide the code changes for the templates (Mobile) and the configuration changes for Security.

