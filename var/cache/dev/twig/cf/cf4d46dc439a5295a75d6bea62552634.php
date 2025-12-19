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

        <!-- Dynamic Title & Meta Description -->
        <title>";
        // line 8
        yield from $this->unwrap()->yieldBlock('title', $context, $blocks);
        yield "</title>
        <meta name=\"description\" content=\"";
        // line 9
        yield from $this->unwrap()->yieldBlock('meta_description', $context, $blocks);
        yield "\">

        <!-- SEO Meta Tags -->
        <meta name=\"robots\" content=\"index, follow\">
        <meta name=\"googlebot\" content=\"index, follow\">
        <link rel=\"canonical\" href=\"";
        // line 14
        yield from $this->unwrap()->yieldBlock('canonical', $context, $blocks);
        yield "\">

        <!-- Open Graph / Facebook -->
        <meta property=\"og:type\" content=\"";
        // line 17
        yield from $this->unwrap()->yieldBlock('og_type', $context, $blocks);
        yield "\">
        <meta property=\"og:url\" content=\"";
        // line 18
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 18, $this->source); })()), "request", [], "any", false, false, false, 18), "uri", [], "any", false, false, false, 18), "html", null, true);
        yield "\">
        <meta property=\"og:title\" content=\"";
        // line 19
        yield from $this->unwrap()->yieldBlock('og_title', $context, $blocks);
        yield "\">
        <meta property=\"og:description\" content=\"";
        // line 20
        yield from $this->unwrap()->yieldBlock('og_description', $context, $blocks);
        yield "\">
        <meta property=\"og:image\" content=\"";
        // line 21
        yield from $this->unwrap()->yieldBlock('og_image', $context, $blocks);
        yield "\">
        <meta property=\"og:locale\" content=\"bg_BG\">
        <meta property=\"og:site_name\" content=\"ОФЕРТИ - Сравни цени\">

        <!-- Twitter Card -->
        <meta name=\"twitter:card\" content=\"summary_large_image\">
        <meta name=\"twitter:url\" content=\"";
        // line 27
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 27, $this->source); })()), "request", [], "any", false, false, false, 27), "uri", [], "any", false, false, false, 27), "html", null, true);
        yield "\">
        <meta name=\"twitter:title\" content=\"";
        // line 28
        yield from $this->unwrap()->yieldBlock('twitter_title', $context, $blocks);
        yield "\">
        <meta name=\"twitter:description\" content=\"";
        // line 29
        yield from $this->unwrap()->yieldBlock('twitter_description', $context, $blocks);
        yield "\">
        <meta name=\"twitter:image\" content=\"";
        // line 30
        yield from $this->unwrap()->yieldBlock('twitter_image', $context, $blocks);
        yield "\">

        <link rel=\"icon\" href=\"data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 128 128%22><text y=%221.2em%22 font-size=%2296%22>🔥</text></svg>\">

        <!-- Bootstrap 5.3 -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
        <!-- Bootstrap Icons -->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css\">
        <!-- Google Fonts - Modern & Bold -->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\">

        ";
        // line 43
        yield from $this->unwrap()->yieldBlock('stylesheets', $context, $blocks);
        // line 45
        yield "
        <style>
            * {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            }

            body {
                background: #f8f9fa;
                overflow-x: hidden;
            }

            /* Animated gradient background */
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
            }

            @keyframes gradient-shift {
                0%, 100% { transform: translate(0, 0); }
                25% { transform: translate(-5%, 5%); }
                50% { transform: translate(5%, -5%); }
                75% { transform: translate(-5%, -5%); }
            }
        </style>

        ";
        // line 77
        yield from $this->unwrap()->yieldBlock('javascripts', $context, $blocks);
        // line 81
        yield "    </head>
    <body>
        <!-- Navigation Bar with Search and Filters -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand fw-bold text-primary\" href=\"";
        // line 86
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                    <i class=\"bi bi-fire\"></i> ОФЕРТИ
                </a>

                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
                    <span class=\"navbar-toggler-icon\"></span>
                </button>

                <div class=\"collapse navbar-collapse\" id=\"navbarNav\">
                    <!-- Store Filters -->
                    <ul class=\"navbar-nav me-auto mb-2 mb-lg-0\">
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 98
        yield ((( !CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "request", [], "any", false, false, false, 98), "query", [], "any", false, false, false, 98), "get", ["source"], "method", false, false, false, 98) && (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 98, $this->source); })()), "request", [], "any", false, false, false, 98), "get", ["_route"], "method", false, false, false, 98) == "app_home"))) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 99
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">
                                <i class=\"bi bi-house-fill\"></i> Всички
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 104
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 104, $this->source); })()), "request", [], "any", false, false, false, 104), "query", [], "any", false, false, false, 104), "get", ["source"], "method", false, false, false, 104) == "emag")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 105
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "emag"]);
        yield "\">
                                <i class=\"bi bi-laptop\"></i> eMAG
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 110
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 110, $this->source); })()), "request", [], "any", false, false, false, 110), "query", [], "any", false, false, false, 110), "get", ["source"], "method", false, false, false, 110) == "fashion_days")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 111
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "fashion_days"]);
        yield "\">
                                <i class=\"bi bi-bag-heart\"></i> Fashion Days
                            </a>
                        </li>
                        <li class=\"nav-item\">
                            <a class=\"nav-link ";
        // line 116
        yield (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 116, $this->source); })()), "request", [], "any", false, false, false, 116), "query", [], "any", false, false, false, 116), "get", ["source"], "method", false, false, false, 116) == "alleop")) ? ("active") : (""));
        yield "\"
                               href=\"";
        // line 117
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", ["source" => "alleop"]);
        yield "\">
                                <i class=\"bi bi-basket\"></i> Alleop
                            </a>
                        </li>

                    </ul>

                    <!-- Search Form -->
                    <form class=\"d-flex\" action=\"";
        // line 125
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_search");
        yield "\" method=\"get\">
                        <div class=\"input-group\">
                            <input type=\"search\"
                                   name=\"q\"
                                   class=\"form-control\"
                                   placeholder=\"Търси продукти...\"
                                   value=\"";
        // line 131
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 131, $this->source); })()), "request", [], "any", false, false, false, 131), "query", [], "any", false, false, false, 131), "get", ["q", ""], "method", false, false, false, 131), "html", null, true);
        yield "\"
                                   aria-label=\"Search\">
                            <button class=\"btn btn-primary\" type=\"submit\">
                                <i class=\"bi bi-search\"></i>
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
                color: #6c757d !important;
                padding: 0.5rem 1rem !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            .nav-link:hover {
                background: #f8f9fa;
                color: #667eea !important;
            }
            .nav-link.active {
                background: #667eea;
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
        // line 176
        yield from $this->unwrap()->yieldBlock('body', $context, $blocks);
        // line 177
        yield "    </body>
</html>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    // line 8
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

    // line 9
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

    // line 14
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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 14, $this->source); })()), "request", [], "any", false, false, false, 14), "uri", [], "any", false, false, false, 14), "html", null, true);
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 17
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

    // line 19
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

    // line 20
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

    // line 21
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

    // line 28
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

    // line 29
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

    // line 30
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

    // line 43
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

        // line 44
        yield "        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 77
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

        // line 78
        yield "            ";
        yield from $this->unwrap()->yieldBlock('importmap', $context, $blocks);
        // line 79
        yield "            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
        ";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 78
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

    // line 176
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
        return array (  630 => 176,  607 => 78,  595 => 79,  592 => 78,  579 => 77,  568 => 44,  555 => 43,  532 => 30,  509 => 29,  486 => 28,  463 => 21,  440 => 20,  417 => 19,  394 => 17,  371 => 14,  348 => 9,  325 => 8,  312 => 177,  310 => 176,  262 => 131,  253 => 125,  242 => 117,  238 => 116,  230 => 111,  226 => 110,  218 => 105,  214 => 104,  206 => 99,  202 => 98,  187 => 86,  180 => 81,  178 => 77,  144 => 45,  142 => 43,  126 => 30,  122 => 29,  118 => 28,  114 => 27,  105 => 21,  101 => 20,  97 => 19,  93 => 18,  89 => 17,  83 => 14,  75 => 9,  71 => 8,  62 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
<html lang=\"bg\">
    <head>
        <meta charset=\"UTF-8\">
        <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">

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

        <!-- Bootstrap 5.3 -->
        <link href=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css\" rel=\"stylesheet\">
        <!-- Bootstrap Icons -->
        <link rel=\"stylesheet\" href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css\">
        <!-- Google Fonts - Modern & Bold -->
        <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
        <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
        <link href=\"https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800;900&display=swap\" rel=\"stylesheet\">

        {% block stylesheets %}
        {% endblock %}

        <style>
            * {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            }

            body {
                background: #f8f9fa;
                overflow-x: hidden;
            }

            /* Animated gradient background */
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
            }

            @keyframes gradient-shift {
                0%, 100% { transform: translate(0, 0); }
                25% { transform: translate(-5%, 5%); }
                50% { transform: translate(5%, -5%); }
                75% { transform: translate(-5%, -5%); }
            }
        </style>

        {% block javascripts %}
            {% block importmap %}{{ importmap('app') }}{% endblock %}
            <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
        {% endblock %}
    </head>
    <body>
        <!-- Navigation Bar with Search and Filters -->
        <nav class=\"navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top\">
            <div class=\"container-fluid\">
                <a class=\"navbar-brand fw-bold text-primary\" href=\"{{ path('app_home') }}\">
                    <i class=\"bi bi-fire\"></i> ОФЕРТИ
                </a>

                <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarNav\">
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
                            <button class=\"btn btn-primary\" type=\"submit\">
                                <i class=\"bi bi-search\"></i>
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
                color: #6c757d !important;
                padding: 0.5rem 1rem !important;
                border-radius: 8px;
                transition: all 0.3s ease;
            }
            .nav-link:hover {
                background: #f8f9fa;
                color: #667eea !important;
            }
            .nav-link.active {
                background: #667eea;
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
", "base.html.twig", "/home/needy/affiliate-site/templates/base.html.twig");
    }
}
