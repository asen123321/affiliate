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

/* review/compare_category.html.twig */
class __TwigTemplate_e1bdd5dc993d8cbf19fc210458090fb1 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'javascripts' => [$this, 'block_javascripts'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_category.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_category.html.twig"));

        $this->parent = $this->load("base.html.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

    }

    // line 3
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

        yield "Сравни ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 3, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 3, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 3, $this->source); })())))), "html", null, true);
        yield " - eMAG vs Alleop";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 10
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

        // line 11
        yield "<div class=\"container py-5\">
    <!-- Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-6 fw-bold mb-3\">
                <i class=\"bi bi-arrow-left-right text-primary\"></i>
                Сравни ";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 17, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 17, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 17, $this->source); })())))), "html", null, true);
        yield "
            </h1>
            <p class=\"lead text-muted\">
                Сравнение на цени между eMAG и Alleop за ";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 20, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 20, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 20, $this->source); })())))), "html", null, true);
        yield "
            </p>
        </div>
    </div>

    ";
        // line 25
        $context["hasProducts"] = ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 25, $this->source); })()), "emag", [], "any", false, false, false, 25)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 25, $this->source); })()), "alleop", [], "any", false, false, false, 25)) > 0));
        // line 26
        yield "
    ";
        // line 27
        if ((($tmp = (isset($context["hasProducts"]) || array_key_exists("hasProducts", $context) ? $context["hasProducts"] : (function () { throw new RuntimeError('Variable "hasProducts" does not exist.', 27, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-primary\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-2\">";
            // line 35
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 35, $this->source); })()), "emag", [], "any", false, false, false, 35)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">";
            // line 36
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 36, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 36, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 36, $this->source); })())))), "html", null, true);
            yield "</small>
                        ";
            // line 37
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 37, $this->source); })()), "emag", [], "any", false, false, false, 37)) > 0)) {
                // line 38
                yield "                            ";
                $context["emagPrices"] = Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::map($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 38, $this->source); })()), "emag", [], "any", false, false, false, 38), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 38, $this->source); })()), "price", [], "any", false, false, false, 38); }), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return ((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 38, $this->source); })()) > 0); });
                // line 39
                yield "                            ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 39, $this->source); })())) > 0)) {
                    // line 40
                    yield "                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">";
                    // line 43
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(min((isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 43, $this->source); })())), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>";
                    // line 45
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 45, $this->source); })()), function ($__carry__, $__price__) use ($context, $macros) { $context["carry"] = $__carry__; $context["price"] = $__price__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 45, $this->source); })()) + (isset($context["price"]) || array_key_exists("price", $context) ? $context["price"] : (function () { throw new RuntimeError('Variable "price" does not exist.', 45, $this->source); })())); }, 0) / Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 45, $this->source); })()))), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                </div>
                            ";
                }
                // line 48
                yield "                        ";
            }
            // line 49
            yield "                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-success\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-basket display-4 text-success mb-3\"></i>
                        <h4 class=\"card-title\">Alleop</h4>
                        <p class=\"display-6 fw-bold text-success mb-2\">";
            // line 57
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 57, $this->source); })()), "alleop", [], "any", false, false, false, 57)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">";
            // line 58
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 58, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 58, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 58, $this->source); })())))), "html", null, true);
            yield "</small>
                        ";
            // line 59
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 59, $this->source); })()), "alleop", [], "any", false, false, false, 59)) > 0)) {
                // line 60
                yield "                            ";
                $context["alleopPrices"] = Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::map($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 60, $this->source); })()), "alleop", [], "any", false, false, false, 60), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 60, $this->source); })()), "price", [], "any", false, false, false, 60); }), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return ((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 60, $this->source); })()) > 0); });
                // line 61
                yield "                            ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 61, $this->source); })())) > 0)) {
                    // line 62
                    yield "                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">";
                    // line 65
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(min((isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 65, $this->source); })())), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>";
                    // line 67
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 67, $this->source); })()), function ($__carry__, $__price__) use ($context, $macros) { $context["carry"] = $__carry__; $context["price"] = $__price__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 67, $this->source); })()) + (isset($context["price"]) || array_key_exists("price", $context) ? $context["price"] : (function () { throw new RuntimeError('Variable "price" does not exist.', 67, $this->source); })())); }, 0) / Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 67, $this->source); })()))), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                </div>
                            ";
                }
                // line 70
                yield "                        ";
            }
            // line 71
            yield "                    </div>
                </div>
            </div>
        </div>

        <!-- Price Comparison Chart -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-bar-chart-line-fill text-primary\"></i>
                            Сравнение на цени
                        </h3>
                        <canvas id=\"priceChart\" height=\"80\"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products by Platform Tabs -->
        <div class=\"row\">
            <div class=\"col-12\">
                <ul class=\"nav nav-pills nav-fill mb-4\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link ";
            // line 96
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 96, $this->source); })()), "emag", [], "any", false, false, false, 96)) > 0)) {
                yield "active";
            }
            yield "\"
                                id=\"emag-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#emag\"
                                type=\"button\">
                            <i class=\"bi bi-laptop\"></i> eMAG
                            <span class=\"badge bg-light text-dark ms-2\">";
            // line 102
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 102, $this->source); })()), "emag", [], "any", false, false, false, 102)), "html", null, true);
            yield "</span>
                        </button>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link ";
            // line 106
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 106, $this->source); })()), "emag", [], "any", false, false, false, 106)) == 0)) {
                yield "active";
            }
            yield "\"
                                id=\"alleop-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#alleop\"
                                type=\"button\">
                            <i class=\"bi bi-basket\"></i> Alleop
                            <span class=\"badge bg-light text-dark ms-2\">";
            // line 112
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 112, $this->source); })()), "alleop", [], "any", false, false, false, 112)), "html", null, true);
            yield "</span>
                        </button>
                    </li>
                </ul>

                <div class=\"tab-content\">
                    <!-- eMAG Tab -->
                    <div class=\"tab-pane fade ";
            // line 119
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 119, $this->source); })()), "emag", [], "any", false, false, false, 119)) > 0)) {
                yield "show active";
            }
            yield "\"
                         id=\"emag\"
                         role=\"tabpanel\">
                        ";
            // line 122
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 122, $this->source); })()), "emag", [], "any", false, false, false, 122)) > 0)) {
                // line 123
                yield "                            <div class=\"row g-3\">
                                ";
                // line 124
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 124, $this->source); })()), "emag", [], "any", false, false, false, 124));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 125
                    yield "                                    ";
                    yield from $this->load("review/_product_card_compare.html.twig", 125)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "eMAG"]));
                    // line 126
                    yield "                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 127
                yield "                            </div>
                        ";
            } else {
                // line 129
                yield "                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма ";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 130, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 130, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 130, $this->source); })())))), "html", null, true);
                yield " в eMAG
                            </div>
                        ";
            }
            // line 133
            yield "                    </div>

                    <!-- Alleop Tab -->
                    <div class=\"tab-pane fade ";
            // line 136
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 136, $this->source); })()), "emag", [], "any", false, false, false, 136)) == 0)) {
                yield "show active";
            }
            yield "\"
                         id=\"alleop\"
                         role=\"tabpanel\">
                        ";
            // line 139
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 139, $this->source); })()), "alleop", [], "any", false, false, false, 139)) > 0)) {
                // line 140
                yield "                            <div class=\"row g-3\">
                                ";
                // line 141
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 141, $this->source); })()), "alleop", [], "any", false, false, false, 141));
                $context['loop'] = [
                  'parent' => $context['_parent'],
                  'index0' => 0,
                  'index'  => 1,
                  'first'  => true,
                ];
                if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                    $length = count($context['_seq']);
                    $context['loop']['revindex0'] = $length - 1;
                    $context['loop']['revindex'] = $length;
                    $context['loop']['length'] = $length;
                    $context['loop']['last'] = 1 === $length;
                }
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 142
                    yield "                                    ";
                    yield from $this->load("review/_product_card_compare.html.twig", 142)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Alleop"]));
                    // line 143
                    yield "                                ";
                    ++$context['loop']['index0'];
                    ++$context['loop']['index'];
                    $context['loop']['first'] = false;
                    if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                        --$context['loop']['revindex0'];
                        --$context['loop']['revindex'];
                        $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                    }
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['product'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 144
                yield "                            </div>
                        ";
            } else {
                // line 146
                yield "                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма ";
                // line 147
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 147, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 147, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 147, $this->source); })())))), "html", null, true);
                yield " в Alleop
                            </div>
                        ";
            }
            // line 150
            yield "                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');

                const emagProducts = ";
            // line 160
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 160, $this->source); })()), "emag", [], "any", false, false, false, 160));
            yield ";
                const alleopProducts = ";
            // line 161
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 161, $this->source); })()), "alleop", [], "any", false, false, false, 161));
            yield ";

                function getAveragePrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price)));
                    if (validPrices.length === 0) return 0;
                    const total = validPrices.reduce((sum, p) => sum + parseFloat(p.price), 0);
                    return parseFloat((total / validPrices.length).toFixed(2));
                }

                function getMinPrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price))).map(p => parseFloat(p.price));
                    if (validPrices.length === 0) return 0;
                    return parseFloat(Math.min(...validPrices).toFixed(2));
                }

                function getMaxPrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price))).map(p => parseFloat(p.price));
                    if (validPrices.length === 0) return 0;
                    return parseFloat(Math.max(...validPrices).toFixed(2));
                }

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['eMAG', 'Alleop'],
                        datasets: [
                            {
                                label: 'Най-ниска цена (лв.)',
                                data: [
                                    getMinPrice(emagProducts),
                                    getMinPrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(59, 130, 246, 0.8)', 'rgba(34, 197, 94, 0.8)'],
                                borderColor: ['rgba(59, 130, 246, 1)', 'rgba(34, 197, 94, 1)'],
                                borderWidth: 2
                            },
                            {
                                label: 'Средна цена (лв.)',
                                data: [
                                    getAveragePrice(emagProducts),
                                    getAveragePrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(99, 102, 241, 0.6)', 'rgba(74, 222, 128, 0.6)'],
                                borderColor: ['rgba(99, 102, 241, 1)', 'rgba(74, 222, 128, 1)'],
                                borderWidth: 2
                            },
                            {
                                label: 'Най-висока цена (лв.)',
                                data: [
                                    getMaxPrice(emagProducts),
                                    getMaxPrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(239, 68, 68, 0.6)', 'rgba(251, 146, 60, 0.6)'],
                                borderColor: ['rgba(239, 68, 68, 1)', 'rgba(251, 146, 60, 1)'],
                                borderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true, position: 'top' },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y.toFixed(2) + ' лв.';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value + ' лв.';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    ";
        } else {
            // line 249
            yield "        <div class=\"alert alert-warning text-center py-5\">
            <i class=\"bi bi-exclamation-triangle display-1 mb-3\"></i>
            <h3>Няма намерени продукти за \"";
            // line 251
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 251, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 251, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 251, $this->source); })())))), "html", null, true);
            yield "\"</h3>
            <p class=\"mb-4\">Опитайте друга категория или разгледайте всички продукти.</p>
            <a href=\"";
            // line 253
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
            yield "\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Към всички продукти
            </a>
        </div>
    ";
        }
        // line 258
        yield "</div>

<style>
    .nav-pills .nav-link {
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .nav-pills .nav-link:not(.active) {
        background: #f8f9fa;
        color: #6c757d;
    }
    .nav-pills .nav-link:hover:not(.active) {
        background: #e9ecef;
        transform: translateY(-2px);
    }
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }
</style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "review/compare_category.html.twig";
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
        return array (  564 => 258,  556 => 253,  551 => 251,  547 => 249,  456 => 161,  452 => 160,  440 => 150,  434 => 147,  431 => 146,  427 => 144,  413 => 143,  410 => 142,  393 => 141,  390 => 140,  388 => 139,  380 => 136,  375 => 133,  369 => 130,  366 => 129,  362 => 127,  348 => 126,  345 => 125,  328 => 124,  325 => 123,  323 => 122,  315 => 119,  305 => 112,  294 => 106,  287 => 102,  276 => 96,  249 => 71,  246 => 70,  240 => 67,  235 => 65,  230 => 62,  227 => 61,  224 => 60,  222 => 59,  218 => 58,  214 => 57,  204 => 49,  201 => 48,  195 => 45,  190 => 43,  185 => 40,  182 => 39,  179 => 38,  177 => 37,  173 => 36,  169 => 35,  160 => 28,  158 => 27,  155 => 26,  153 => 25,  145 => 20,  139 => 17,  131 => 11,  118 => 10,  103 => 6,  90 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Сравни {{ categoryName|default(category)|title }} - eMAG vs Alleop{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <!-- Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-6 fw-bold mb-3\">
                <i class=\"bi bi-arrow-left-right text-primary\"></i>
                Сравни {{ categoryName|default(category)|title }}
            </h1>
            <p class=\"lead text-muted\">
                Сравнение на цени между eMAG и Alleop за {{ categoryName|default(category)|title }}
            </p>
        </div>
    </div>

    {% set hasProducts = products.emag|length > 0 or products.alleop|length > 0 %}

    {% if hasProducts %}
        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-primary\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-2\">{{ products.emag|length }}</p>
                        <small class=\"text-muted\">{{ categoryName|default(category)|title }}</small>
                        {% if products.emag|length > 0 %}
                            {% set emagPrices = products.emag|map(p => p.price)|filter(p => p > 0) %}
                            {% if emagPrices|length > 0 %}
                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">{{ min(emagPrices)|number_format(2, '.', ' ') }} лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>{{ (emagPrices|reduce((carry, price) => carry + price, 0) / emagPrices|length)|number_format(2, '.', ' ') }} лв.</strong>
                                </div>
                            {% endif %}
                        {% endif %}
                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-success\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-basket display-4 text-success mb-3\"></i>
                        <h4 class=\"card-title\">Alleop</h4>
                        <p class=\"display-6 fw-bold text-success mb-2\">{{ products.alleop|length }}</p>
                        <small class=\"text-muted\">{{ categoryName|default(category)|title }}</small>
                        {% if products.alleop|length > 0 %}
                            {% set alleopPrices = products.alleop|map(p => p.price)|filter(p => p > 0) %}
                            {% if alleopPrices|length > 0 %}
                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">{{ min(alleopPrices)|number_format(2, '.', ' ') }} лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>{{ (alleopPrices|reduce((carry, price) => carry + price, 0) / alleopPrices|length)|number_format(2, '.', ' ') }} лв.</strong>
                                </div>
                            {% endif %}
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>

        <!-- Price Comparison Chart -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-bar-chart-line-fill text-primary\"></i>
                            Сравнение на цени
                        </h3>
                        <canvas id=\"priceChart\" height=\"80\"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products by Platform Tabs -->
        <div class=\"row\">
            <div class=\"col-12\">
                <ul class=\"nav nav-pills nav-fill mb-4\" role=\"tablist\">
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link {% if products.emag|length > 0 %}active{% endif %}\"
                                id=\"emag-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#emag\"
                                type=\"button\">
                            <i class=\"bi bi-laptop\"></i> eMAG
                            <span class=\"badge bg-light text-dark ms-2\">{{ products.emag|length }}</span>
                        </button>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link {% if products.emag|length == 0 %}active{% endif %}\"
                                id=\"alleop-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#alleop\"
                                type=\"button\">
                            <i class=\"bi bi-basket\"></i> Alleop
                            <span class=\"badge bg-light text-dark ms-2\">{{ products.alleop|length }}</span>
                        </button>
                    </li>
                </ul>

                <div class=\"tab-content\">
                    <!-- eMAG Tab -->
                    <div class=\"tab-pane fade {% if products.emag|length > 0 %}show active{% endif %}\"
                         id=\"emag\"
                         role=\"tabpanel\">
                        {% if products.emag|length > 0 %}
                            <div class=\"row g-3\">
                                {% for product in products.emag %}
                                    {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'eMAG'} %}
                                {% endfor %}
                            </div>
                        {% else %}
                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма {{ categoryName|default(category)|title }} в eMAG
                            </div>
                        {% endif %}
                    </div>

                    <!-- Alleop Tab -->
                    <div class=\"tab-pane fade {% if products.emag|length == 0 %}show active{% endif %}\"
                         id=\"alleop\"
                         role=\"tabpanel\">
                        {% if products.alleop|length > 0 %}
                            <div class=\"row g-3\">
                                {% for product in products.alleop %}
                                    {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'Alleop'} %}
                                {% endfor %}
                            </div>
                        {% else %}
                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма {{ categoryName|default(category)|title }} в Alleop
                            </div>
                        {% endif %}
                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');

                const emagProducts = {{ products.emag|json_encode|raw }};
                const alleopProducts = {{ products.alleop|json_encode|raw }};

                function getAveragePrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price)));
                    if (validPrices.length === 0) return 0;
                    const total = validPrices.reduce((sum, p) => sum + parseFloat(p.price), 0);
                    return parseFloat((total / validPrices.length).toFixed(2));
                }

                function getMinPrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price))).map(p => parseFloat(p.price));
                    if (validPrices.length === 0) return 0;
                    return parseFloat(Math.min(...validPrices).toFixed(2));
                }

                function getMaxPrice(products) {
                    if (!products || products.length === 0) return 0;
                    const validPrices = products.filter(p => p && p.price && !isNaN(parseFloat(p.price))).map(p => parseFloat(p.price));
                    if (validPrices.length === 0) return 0;
                    return parseFloat(Math.max(...validPrices).toFixed(2));
                }

                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['eMAG', 'Alleop'],
                        datasets: [
                            {
                                label: 'Най-ниска цена (лв.)',
                                data: [
                                    getMinPrice(emagProducts),
                                    getMinPrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(59, 130, 246, 0.8)', 'rgba(34, 197, 94, 0.8)'],
                                borderColor: ['rgba(59, 130, 246, 1)', 'rgba(34, 197, 94, 1)'],
                                borderWidth: 2
                            },
                            {
                                label: 'Средна цена (лв.)',
                                data: [
                                    getAveragePrice(emagProducts),
                                    getAveragePrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(99, 102, 241, 0.6)', 'rgba(74, 222, 128, 0.6)'],
                                borderColor: ['rgba(99, 102, 241, 1)', 'rgba(74, 222, 128, 1)'],
                                borderWidth: 2
                            },
                            {
                                label: 'Най-висока цена (лв.)',
                                data: [
                                    getMaxPrice(emagProducts),
                                    getMaxPrice(alleopProducts)
                                ],
                                backgroundColor: ['rgba(239, 68, 68, 0.6)', 'rgba(251, 146, 60, 0.6)'],
                                borderColor: ['rgba(239, 68, 68, 1)', 'rgba(251, 146, 60, 1)'],
                                borderWidth: 2
                            }
                        ]
                    },
                    options: {
                        responsive: true,
                        plugins: {
                            legend: { display: true, position: 'top' },
                            tooltip: {
                                callbacks: {
                                    label: function(context) {
                                        return context.dataset.label + ': ' + context.parsed.y.toFixed(2) + ' лв.';
                                    }
                                }
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                ticks: {
                                    callback: function(value) {
                                        return value + ' лв.';
                                    }
                                }
                            }
                        }
                    }
                });
            });
        </script>
    {% else %}
        <div class=\"alert alert-warning text-center py-5\">
            <i class=\"bi bi-exclamation-triangle display-1 mb-3\"></i>
            <h3>Няма намерени продукти за \"{{ categoryName|default(category)|title }}\"</h3>
            <p class=\"mb-4\">Опитайте друга категория или разгледайте всички продукти.</p>
            <a href=\"{{ path('app_home') }}\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Към всички продукти
            </a>
        </div>
    {% endif %}
</div>

<style>
    .nav-pills .nav-link {
        font-weight: 600;
        padding: 1rem 2rem;
        border-radius: 12px;
        transition: all 0.3s ease;
    }
    .nav-pills .nav-link:not(.active) {
        background: #f8f9fa;
        color: #6c757d;
    }
    .nav-pills .nav-link:hover:not(.active) {
        background: #e9ecef;
        transform: translateY(-2px);
    }
    .nav-pills .nav-link.active {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        box-shadow: 0 4px 15px rgba(102, 126, 234, 0.4);
    }
</style>
{% endblock %}
", "review/compare_category.html.twig", "/var/www/html/templates/review/compare_category.html.twig");
    }
}
