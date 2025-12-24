<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* base.html.twig */
class __TwigTemplate_4aa640167526b326c5c162307b302ad7 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'meta_description' => [$this, 'block_meta_description'],
            'canonical' => [$this, 'block_canonical'],
            'og_type' => [$this, 'block_og_type'],
            'og_title' => [$this, 'block_og_title'],
            'og_description' => [$this, 'block_og_description'],
            'og_image' => [$this, 'block_og_image'],
            'twitter_title' => [$this, 'block_twitter_title'],
            'twitter_description' => [$this, 'block_twitter_description'],
            'twitter_image' => [$this, 'block_twitter_image'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'javascripts' => [$this, 'block_javascripts'],
            'importmap' => [$this, 'block_importmap'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        yield "<!DOCTYPE html>
<html lang=\"bg\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">

        <!-- Dynamic Title & Meta Description -->
        <title>";
        // line 9
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <meta name=\"description\" content=\"";
        // line 10
        yield from $this->unwrap()->yieldBlock('meta_description', $context, $blocks);
        yield "\">

        <!-- SEO Meta Tags -->
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"googlebot\" content=\"index, follow\">
        <link rel=\"canonical\" href=\"";
        // line 15
        yield from $this->unwrap()->yieldBlock('canonical', $context, $blocks);
        yield "\">

        <!-- Open Graph / Facebook -->
        <meta property=\"og:type\" content=\"";
        // line 18
        yield from $this->unwrap()->yieldBlock('og_type', $context, $blocks);
        yield "\">
        <meta property=\"og:url\" content=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 19, $this->source); })()), "request", [], "any", false, false, false, 19), "uri", [], "any", false, false, false, 19), "html", null, true);
        yield "\">
        <meta property=\"og:title\" content=\"";
        // line 20
        yield from $this->unwrap()->yieldBlock('og_title', $context, $blocks);
        yield "\">
        <meta property=\"og:description\" content=\"";
        // line 21
        yield from $this->unwrap()->yieldBlock('og_description', $context, $blocks);
        yield "\">
        <meta property=\"og:image\" content=\"";
        // line 22
        yield from $this->unwrap()->yieldBlock('og_image', $context, $blocks);
        yield "\">
        <meta property=\"og:locale\" content=\"bg_BG\">
        <meta property=\"og:site_name\" content=\"ОФЕРТИ - Сравни цени\">

        <!-- Twitter Card -->
        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:url\" content=\"";
        // line 28
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 28, $this->source); })()), "request", [], "any", false, false, false, 28), "uri", [], "any", false, false, false, 28), "html", null, true);
        yield "\">
        <meta name=\"twitter:title\" content=\"";
        // line 29
        yield from $this->unwrap()->yieldBlock('twitter_title', $context, $blocks);
        yield "\">
        <meta name=\"twitter:description\" content=\"";
        // line 30
        yield from $this->unwrap()->yieldBlock('twitter_description', $context, $blocks);
        yield "\">
        <meta name=\"twitter:image\" content=\"";
        // line 31
        yield from $this->unwrap()->yieldBlock('twitter_image', $context, $blocks);
        yield "\">

        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🔥</text></svg>\">

        <!-- Preconnect to improve loading performance -->
        <link rel=\"preconnect\" href=\"https://cdn.jsdelivr.net\" crossorigin>
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>

        <!-- Preconnect to external image domains -->
        <link rel=\"preconnect\" href=\"https://editor.alleop.bg\" crossorigin>
        <link rel=\"dns-prefetch\" href=\"https://editor.alleop.bg\">

        <!-- Preload critical font for LCP element -->
        <link rel=\"preload\" href=\"https://fonts.gstatic.com/s/inter/v18/UcCO3FwrK3iLTeHuS_nVMrMxCp50SjIw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

        <!-- Preload Bootstrap Icons font -->
        <link rel=\"preload\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/fonts/bootstrap-icons.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

        <!-- Bootstrap 5.3 -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"print\" onload=\"this.media='all'\">
        <noscript><link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\"></noscript>

        <!-- Bootstrap Icons - Loaded inline below for better performance -->

        <!-- Google Fonts - Modern & Bold with display=swap for better performance -->
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\" media=\"print\" onload=\"this.media='all'\">
        <noscript><link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\"></noscript>

        ";
        // line 60
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 62
        yield "
        <style>
            /* Critical CSS - Above the fold styles */
            * {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Ensure font loads with swap behavior */
            @font-face {
                font-family: 'Inter-Fallback';
                src: local('Arial');
                font-display: swap;
                ascent-override: 90%;
                descent-override: 22%;
                line-gap-override: 0%;
                size-adjust: 107%;
            }

            body {
                background: #f8f9fa;
                overflow-x: hidden;
                line-height: 1.6;
            }

            /* Animated gradient background - optimized */
            body::before {
                content: '';
                position: fixed;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(45deg, #667eea15 0%, #764ba215 25%, #f093fb15 50%, #667eea15 75%, #764ba215 100%);
                animation: gradient-shift 15s ease infinite;
                z-index: -1;
                will-change: transform;
            }

            @keyframes gradient-shift {
                0%, 100% { transform: translate(0, 0); }
                25% { transform: translate(-5%, 5%); }
                50% { transform: translate(5%, -5%); }
                75% { transform: translate(-5%, -5%); }
            }

            /* Critical navbar styles */
            .navbar {
                background: white !important;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .container, .container-fluid {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }

            /* Critical hero styles for LCP */
            .mega-hero {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                min-height: 70vh;
                position: relative;
                contain: layout style paint;
            }

            .display-2 {
                font-size: calc(1.575rem + 3.9vw);
                font-weight: 900;
                line-height: 1.2;
            }

            @media (min-width: 1200px) {
                .display-2 {
                    font-size: 4rem;
                }
            }

            /* Ensure LCP text is visible immediately */
            .fw-black {
                font-weight: 900 !important;
                font-display: swap;
            }

            .text-shadow {
                text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            }

            /* Prevent FOIT - show text immediately with fallback font */
            h1, h2, h3, .display-1, .display-2, .display-3 {
                font-display: swap;
            }

            /* Optimize rendering performance */
            .lead {
                font-display: swap;
            }

            /* Force font-display: swap on Bootstrap Icons */
            @font-face {
                font-family: \"bootstrap-icons\";
                src: url(\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/fonts/bootstrap-icons.woff2\") format(\"woff2\");
                font-display: swap;
            }

            /* Prevent icon layout shift */
            .bi, i[class*=\"bi-\"] {
                display: inline-block;
                width: 1em;
                height: 1em;
                vertical-align: middle;
                line-height: 1;
            }

            /* Specific icon sizes */
            .bi.fs-5, i[class*=\"bi-\"].fs-5 {
                width: 1.25em;
                height: 1.25em;
            }

            .bi.me-2, i[class*=\"bi-\"].me-2 {
                margin-right: 0.5rem !important;
            }
        </style>

        ";
        // line 191
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 195
        yield "    </head>
    <body>
        <!-- Navigation Bar with Search and Filters -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand fw-bold text-primary\" href=\"";
        // line 200
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                    <i class=\"bi bi-fire\"></i> ОФЕРТИ
                </a>

                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-label=\"Toggle navigation\" aria-expanded=\"false\" aria-controls=\"navbarNav\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>

                <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                    <!-- Store Filters -->
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 212
        yield ((( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 212, $this->source); })()), "request", [], "any", false, false, false, 212), "query", [], "any", false, false, false, 212), "get", ["source"], "method", false, false, false, 212) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 212, $this->source); })()), "request", [], "any", false, false, false, 212), "get", ["_route"], "method", false, false, false, 212) == "app_home"))) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 213
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                                <i class=\"bi bi-house-fill\"></i> Всички
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 218
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 218, $this->source); })()), "request", [], "any", false, false, false, 218), "query", [], "any", false, false, false, 218), "get", ["source"], "method", false, false, false, 218) == "emag")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 219
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "emag"]);
        yield "\">
                                <i class=\"bi bi-laptop\"></i> eMAG
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 224
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 224, $this->source); })()), "request", [], "any", false, false, false, 224), "query", [], "any", false, false, false, 224), "get", ["source"], "method", false, false, false, 224) == "fashion_days")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 225
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "fashion_days"]);
        yield "\">
                                <i class=\"bi bi-bag-heart\"></i> Fashion Days
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 230
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 230, $this->source); })()), "request", [], "any", false, false, false, 230), "query", [], "any", false, false, false, 230), "get", ["source"], "method", false, false, false, 230) == "alleop")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 231
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "alleop"]);
        yield "\">
                                <i class=\"bi bi-basket\"></i> Alleop
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 236
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 236, $this->source); })()), "request", [], "any", false, false, false, 236), "get", ["_route"], "method", false, false, false, 236) == "app_recommendations")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 237
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_recommendations");
        yield "\">
                                <i class=\"bi bi-stars\"></i> За теб
                            </a>
                        </li>

                    </ul>

                    <!-- Search Form -->
                    <form class=\"d-flex\" action=\"";
        // line 245
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_search");
        yield "\" method=\"get\">
                        <div class=\"input-group\">
                            <input type=\"search\"
                                   name=\"q\"
                                   class=\"form-control\"
                                   placeholder=\"Търси продукти...\"
                                   value=\"";
        // line 251
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 251, $this->source); })()), "request", [], "any", false, false, false, 251), "query", [], "any", false, false, false, 251), "get", ["q", ""], "method", false, false, false, 251), "html", null, true);
        yield "\"
                                   aria-label=\"Search\">
                            <button class=\"btn btn-primary\" type=\"submit\" aria-label=\"Search\">
                                <i class=\"bi bi-search\" aria-hidden=\"true\"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <style>
            .navbar {
                padding: 0.75rem 0;
            }
            .navbar-brand {
                font-size: 1.5rem;
                letter-spacing: -0.5px;
            }
            .nav-link {
                font-weight: 600;
                color: #495057 !important;
                padding: 0.5rem 1rem !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            .nav-link:hover {
                background: #f8f9fa;
                color: #5568d3 !important;
            }
            .nav-link.active {
                background: #5568d3;
                color: white !important;
            }
            .input-group {
                width: 300px;
            }
            @media (max-width: 991px) {
                .input-group {
                    width: 100%;
                    margin-top: 1rem;
                }
            }
        </style>

        ";
        // line 296
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 297
        yield "    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        yield "Най-добри оферти от eMAG, Alleop, Fashion Days";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_meta_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "meta_description"));

        yield "Сравни цени и намери най-добрите оферти за електроника, мода и бит от eMAG, Alleop и Fashion Days. Актуални промоции и отстъпки.";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 15
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_canonical(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "canonical"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "canonical"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 15, $this->source); })()), "request", [], "any", false, false, false, 15), "uri", [], "any", false, false, false, 15), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 18
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_type(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_type"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_type"));

        yield "website";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 20
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_title"));

        yield from         $this->unwrap()->yieldBlock("title", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 21
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_description"));

        yield from         $this->unwrap()->yieldBlock("meta_description", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_og_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_image"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "og_image"));

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\HttpFoundationExtension']->generateAbsoluteUrl($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("build/images/default-og.jpg")), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 29
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_twitter_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_title"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_title"));

        yield from         $this->unwrap()->yieldBlock("title", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 30
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_twitter_description(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_description"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_description"));

        yield from         $this->unwrap()->yieldBlock("meta_description", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 31
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_twitter_image(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_image"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "twitter_image"));

        yield from         $this->unwrap()->yieldBlock("og_image", $context, $blocks);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 60
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_stylesheets(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 61
        yield "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 191
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_javascripts(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 192
        yield "            ";
        yield from $this->unwrap()->yieldBlock('importmap', $context, $blocks);
        // line 193
        yield "            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" defer></script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 192
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_importmap(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "importmap"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "importmap"));

        yield $this->env->getRuntime('Symfony\Bridge\Twig\Extension\ImportMapRuntime')->importmap("app");
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 296
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "base.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  756 => 296,  733 => 192,  721 => 193,  718 => 192,  705 => 191,  694 => 61,  681 => 60,  658 => 31,  635 => 30,  612 => 29,  589 => 22,  566 => 21,  543 => 20,  520 => 18,  497 => 15,  474 => 10,  451 => 9,  438 => 297,  436 => 296,  388 => 251,  379 => 245,  368 => 237,  364 => 236,  356 => 231,  352 => 230,  344 => 225,  340 => 224,  332 => 219,  328 => 218,  320 => 213,  316 => 212,  301 => 200,  294 => 195,  292 => 191,  161 => 62,  159 => 60,  127 => 31,  123 => 30,  119 => 29,  115 => 28,  106 => 22,  102 => 21,  98 => 20,  94 => 19,  90 => 18,  84 => 15,  76 => 10,  72 => 9,  62 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"bg\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
        <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">

        <!-- Dynamic Title & Meta Description -->
        <title>{% block title %}Най-добри оферти от eMAG, Alleop, Fashion Days{% endblock %}</title>
        <meta name=\"description\" content=\"{% block meta_description %}Сравни цени и намери най-добрите оферти за електроника, мода и бит от eMAG, Alleop и Fashion Days. Актуални промоции и отстъпки.{% endblock %}\">

        <!-- SEO Meta Tags -->
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"googlebot\" content=\"index, follow\">
        <link rel=\"canonical\" href=\"{% block canonical %}{{ app.request.uri }}{% endblock %}\">

        <!-- Open Graph / Facebook -->
        <meta property=\"og:type\" content=\"{% block og_type %}website{% endblock %}\">
        <meta property=\"og:url\" content=\"{{ app.request.uri }}\">
        <meta property=\"og:title\" content=\"{% block og_title %}{{ block('title') }}{% endblock %}\">
        <meta property=\"og:description\" content=\"{% block og_description %}{{ block('meta_description') }}{% endblock %}\">
        <meta property=\"og:image\" content=\"{% block og_image %}{{ absolute_url(asset('build/images/default-og.jpg')) }}{% endblock %}\">
        <meta property=\"og:locale\" content=\"bg_BG\">
        <meta property=\"og:site_name\" content=\"ОФЕРТИ - Сравни цени\">

        <!-- Twitter Card -->
        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:url\" content=\"{{ app.request.uri }}\">
        <meta name=\"twitter:title\" content=\"{% block twitter_title %}{{ block('title') }}{% endblock %}\">
        <meta name=\"twitter:description\" content=\"{% block twitter_description %}{{ block('meta_description') }}{% endblock %}\">
        <meta name=\"twitter:image\" content=\"{% block twitter_image %}{{ block('og_image') }}{% endblock %}\">

        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🔥</text></svg>\">

        <!-- Preconnect to improve loading performance -->
        <link rel=\"preconnect\" href=\"https://cdn.jsdelivr.net\" crossorigin>
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>

        <!-- Preconnect to external image domains -->
        <link rel=\"preconnect\" href=\"https://editor.alleop.bg\" crossorigin>
        <link rel=\"dns-prefetch\" href=\"https://editor.alleop.bg\">

        <!-- Preload critical font for LCP element -->
        <link rel=\"preload\" href=\"https://fonts.gstatic.com/s/inter/v18/UcCO3FwrK3iLTeHuS_nVMrMxCp50SjIw2boKoduKmMEVuLyfAZ9hjp-Ek-_EeA.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

        <!-- Preload Bootstrap Icons font -->
        <link rel=\"preload\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/fonts/bootstrap-icons.woff2\" as=\"font\" type=\"font/woff2\" crossorigin>

        <!-- Bootstrap 5.3 -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\" media=\"print\" onload=\"this.media='all'\">
        <noscript><link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\"></noscript>

        <!-- Bootstrap Icons - Loaded inline below for better performance -->

        <!-- Google Fonts - Modern & Bold with display=swap for better performance -->
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\" media=\"print\" onload=\"this.media='all'\">
        <noscript><link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\"></noscript>

        {% block stylesheets %}
        {% endblock %}

        <style>
            /* Critical CSS - Above the fold styles */
            * {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', 'Helvetica Neue', Arial, sans-serif;
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            /* Ensure font loads with swap behavior */
            @font-face {
                font-family: 'Inter-Fallback';
                src: local('Arial');
                font-display: swap;
                ascent-override: 90%;
                descent-override: 22%;
                line-gap-override: 0%;
                size-adjust: 107%;
            }

            body {
                background: #f8f9fa;
                overflow-x: hidden;
                line-height: 1.6;
            }

            /* Animated gradient background - optimized */
            body::before {
                content: '';
                position: fixed;
                top: -50%;
                left: -50%;
                width: 200%;
                height: 200%;
                background: linear-gradient(45deg, #667eea15 0%, #764ba215 25%, #f093fb15 50%, #667eea15 75%, #764ba215 100%);
                animation: gradient-shift 15s ease infinite;
                z-index: -1;
                will-change: transform;
            }

            @keyframes gradient-shift {
                0%, 100% { transform: translate(0, 0); }
                25% { transform: translate(-5%, 5%); }
                50% { transform: translate(5%, -5%); }
                75% { transform: translate(-5%, -5%); }
            }

            /* Critical navbar styles */
            .navbar {
                background: white !important;
                box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            }

            .container, .container-fluid {
                width: 100%;
                padding-right: 15px;
                padding-left: 15px;
                margin-right: auto;
                margin-left: auto;
            }

            /* Critical hero styles for LCP */
            .mega-hero {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
                min-height: 70vh;
                position: relative;
                contain: layout style paint;
            }

            .display-2 {
                font-size: calc(1.575rem + 3.9vw);
                font-weight: 900;
                line-height: 1.2;
            }

            @media (min-width: 1200px) {
                .display-2 {
                    font-size: 4rem;
                }
            }

            /* Ensure LCP text is visible immediately */
            .fw-black {
                font-weight: 900 !important;
                font-display: swap;
            }

            .text-shadow {
                text-shadow: 0 4px 20px rgba(0,0,0,0.3);
            }

            /* Prevent FOIT - show text immediately with fallback font */
            h1, h2, h3, .display-1, .display-2, .display-3 {
                font-display: swap;
            }

            /* Optimize rendering performance */
            .lead {
                font-display: swap;
            }

            /* Force font-display: swap on Bootstrap Icons */
            @font-face {
                font-family: \"bootstrap-icons\";
                src: url(\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/fonts/bootstrap-icons.woff2\") format(\"woff2\");
                font-display: swap;
            }

            /* Prevent icon layout shift */
            .bi, i[class*=\"bi-\"] {
                display: inline-block;
                width: 1em;
                height: 1em;
                vertical-align: middle;
                line-height: 1;
            }

            /* Specific icon sizes */
            .bi.fs-5, i[class*=\"bi-\"].fs-5 {
                width: 1.25em;
                height: 1.25em;
            }

            .bi.me-2, i[class*=\"bi-\"].me-2 {
                margin-right: 0.5rem !important;
            }
        </style>

        {% block javascripts %}
            {% block importmap %}{{ importmap('app') }}{% endblock %}
            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\" defer></script>
        {% endblock %}
    </head>
    <body>
        <!-- Navigation Bar with Search and Filters -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand fw-bold text-primary\" href=\"{{ path('app_home') }}\">
                    <i class=\"bi bi-fire\"></i> ОФЕРТИ
                </a>

                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\" aria-label=\"Toggle navigation\" aria-expanded=\"false\" aria-controls=\"navbarNav\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>

                <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                    <!-- Store Filters -->
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link {{ not app.request.query.get('source') and app.request.get('_route') == 'app_home' ? 'active' : '' }}\"
                               href=\"{{ path('app_home') }}\">
                                <i class=\"bi bi-house-fill\"></i> Всички
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link {{ app.request.query.get('source') == 'emag' ? 'active' : '' }}\"
                               href=\"{{ path('app_home', {'source': 'emag'}) }}\">
                                <i class=\"bi bi-laptop\"></i> eMAG
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link {{ app.request.query.get('source') == 'fashion_days' ? 'active' : '' }}\"
                               href=\"{{ path('app_home', {'source': 'fashion_days'}) }}\">
                                <i class=\"bi bi-bag-heart\"></i> Fashion Days
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link {{ app.request.query.get('source') == 'alleop' ? 'active' : '' }}\"
                               href=\"{{ path('app_home', {'source': 'alleop'}) }}\">
                                <i class=\"bi bi-basket\"></i> Alleop
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link {{ app.request.get('_route') == 'app_recommendations' ? 'active' : '' }}\"
                               href=\"{{ path('app_recommendations') }}\">
                                <i class=\"bi bi-stars\"></i> За теб
                            </a>
                        </li>

                    </ul>

                    <!-- Search Form -->
                    <form class=\"d-flex\" action=\"{{ path('app_search') }}\" method=\"get\">
                        <div class=\"input-group\">
                            <input type=\"search\"
                                   name=\"q\"
                                   class=\"form-control\"
                                   placeholder=\"Търси продукти...\"
                                   value=\"{{ app.request.query.get('q', '') }}\"
                                   aria-label=\"Search\">
                            <button class=\"btn btn-primary\" type=\"submit\" aria-label=\"Search\">
                                <i class=\"bi bi-search\" aria-hidden=\"true\"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>

        <style>
            .navbar {
                padding: 0.75rem 0;
            }
            .navbar-brand {
                font-size: 1.5rem;
                letter-spacing: -0.5px;
            }
            .nav-link {
                font-weight: 600;
                color: #495057 !important;
                padding: 0.5rem 1rem !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            .nav-link:hover {
                background: #f8f9fa;
                color: #5568d3 !important;
            }
            .nav-link.active {
                background: #5568d3;
                color: white !important;
            }
            .input-group {
                width: 300px;
            }
            @media (max-width: 991px) {
                .input-group {
                    width: 100%;
                    margin-top: 1rem;
                }
            }
        </style>

        {% block body %}{% endblock %}
    </body>
</html>
", "base.html.twig", "/var/www/html/templates/base.html.twig");
    }
}
