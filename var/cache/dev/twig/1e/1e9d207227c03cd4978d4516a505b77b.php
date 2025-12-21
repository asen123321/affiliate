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
            <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3\">
                <div>
                    <h1 class=\"display-6 fw-bold mb-3\">
                        <i class=\"bi bi-arrow-left-right text-primary\"></i>
                        Сравни ";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 19, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 19, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 19, $this->source); })())))), "html", null, true);
        yield "
                    </h1>
                    <p class=\"lead text-muted\">
                        Сравнение на цени между eMAG и Alleop за ";
        // line 22
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 22, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 22, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 22, $this->source); })())))), "html", null, true);
        yield "
                    </p>
                </div>
                <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success\" style=\"display: none;\">
                    <i class=\"bi bi-check2-square\"></i> Сравни избраните
                </button>
            </div>
        </div>
    </div>

    ";
        // line 32
        $context["hasProducts"] = ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 32, $this->source); })()), "emag", [], "any", false, false, false, 32)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 32, $this->source); })()), "alleop", [], "any", false, false, false, 32)) > 0));
        // line 33
        yield "
    ";
        // line 34
        if ((($tmp = (isset($context["hasProducts"]) || array_key_exists("hasProducts", $context) ? $context["hasProducts"] : (function () { throw new RuntimeError('Variable "hasProducts" does not exist.', 34, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-primary\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-2\">";
            // line 42
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 42, $this->source); })()), "emag", [], "any", false, false, false, 42)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">";
            // line 43
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 43, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 43, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 43, $this->source); })())))), "html", null, true);
            yield "</small>
                        ";
            // line 44
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 44, $this->source); })()), "emag", [], "any", false, false, false, 44)) > 0)) {
                // line 45
                yield "                            ";
                $context["emagPrices"] = Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::map($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 45, $this->source); })()), "emag", [], "any", false, false, false, 45), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 45, $this->source); })()), "price", [], "any", false, false, false, 45); }), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return ((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 45, $this->source); })()) > 0); });
                // line 46
                yield "                            ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 46, $this->source); })())) > 0)) {
                    // line 47
                    yield "                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">";
                    // line 50
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(min((isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 50, $this->source); })())), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>";
                    // line 52
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 52, $this->source); })()), function ($__carry__, $__price__) use ($context, $macros) { $context["carry"] = $__carry__; $context["price"] = $__price__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 52, $this->source); })()) + (isset($context["price"]) || array_key_exists("price", $context) ? $context["price"] : (function () { throw new RuntimeError('Variable "price" does not exist.', 52, $this->source); })())); }, 0) / Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["emagPrices"]) || array_key_exists("emagPrices", $context) ? $context["emagPrices"] : (function () { throw new RuntimeError('Variable "emagPrices" does not exist.', 52, $this->source); })()))), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                </div>
                            ";
                }
                // line 55
                yield "                        ";
            }
            // line 56
            yield "                    </div>
                </div>
            </div>
            <div class=\"col-md-6\">
                <div class=\"card shadow-sm text-center h-100 border-success\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-basket display-4 text-success mb-3\"></i>
                        <h4 class=\"card-title\">Alleop</h4>
                        <p class=\"display-6 fw-bold text-success mb-2\">";
            // line 64
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 64, $this->source); })()), "alleop", [], "any", false, false, false, 64)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">";
            // line 65
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 65, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 65, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 65, $this->source); })())))), "html", null, true);
            yield "</small>
                        ";
            // line 66
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 66, $this->source); })()), "alleop", [], "any", false, false, false, 66)) > 0)) {
                // line 67
                yield "                            ";
                $context["alleopPrices"] = Twig\Extension\CoreExtension::filter($this->env, Twig\Extension\CoreExtension::map($this->env, CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 67, $this->source); })()), "alleop", [], "any", false, false, false, 67), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return CoreExtension::getAttribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 67, $this->source); })()), "price", [], "any", false, false, false, 67); }), function ($__p__) use ($context, $macros) { $context["p"] = $__p__; return ((isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 67, $this->source); })()) > 0); });
                // line 68
                yield "                            ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 68, $this->source); })())) > 0)) {
                    // line 69
                    yield "                                <hr class=\"my-3\">
                                <div class=\"text-start\">
                                    <small class=\"text-muted d-block\">Най-ниска цена:</small>
                                    <strong class=\"text-success\">";
                    // line 72
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(min((isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 72, $this->source); })())), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                    <small class=\"text-muted d-block mt-2\">Средна цена:</small>
                                    <strong>";
                    // line 74
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber((Twig\Extension\CoreExtension::reduce($this->env, (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 74, $this->source); })()), function ($__carry__, $__price__) use ($context, $macros) { $context["carry"] = $__carry__; $context["price"] = $__price__; return ((isset($context["carry"]) || array_key_exists("carry", $context) ? $context["carry"] : (function () { throw new RuntimeError('Variable "carry" does not exist.', 74, $this->source); })()) + (isset($context["price"]) || array_key_exists("price", $context) ? $context["price"] : (function () { throw new RuntimeError('Variable "price" does not exist.', 74, $this->source); })())); }, 0) / Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["alleopPrices"]) || array_key_exists("alleopPrices", $context) ? $context["alleopPrices"] : (function () { throw new RuntimeError('Variable "alleopPrices" does not exist.', 74, $this->source); })()))), 2, ".", " "), "html", null, true);
                    yield " лв.</strong>
                                </div>
                            ";
                }
                // line 77
                yield "                        ";
            }
            // line 78
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

        <!-- Detailed Comparison Table -->
        <div id=\"comparisonTableContainer\" class=\"d-none mt-5\">
            <div class=\"card shadow\">
                <div class=\"card-body p-4\">
                    <h3 class=\"card-title mb-4\">
                        <i class=\"bi bi-table text-success\"></i>
                        Детайлно сравнение на спецификации
                    </h3>
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-striped align-middle\" id=\"comparisonTable\">
                            <thead class=\"table-light\">
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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
            // line 123
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 123, $this->source); })()), "emag", [], "any", false, false, false, 123)) > 0)) {
                yield "active";
            }
            yield "\"
                                id=\"emag-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#emag\"
                                type=\"button\">
                            <i class=\"bi bi-laptop\"></i> eMAG
                            <span class=\"badge bg-light text-dark ms-2\">";
            // line 129
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 129, $this->source); })()), "emag", [], "any", false, false, false, 129)), "html", null, true);
            yield "</span>
                        </button>
                    </li>
                    <li class=\"nav-item\" role=\"presentation\">
                        <button class=\"nav-link ";
            // line 133
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 133, $this->source); })()), "emag", [], "any", false, false, false, 133)) == 0)) {
                yield "active";
            }
            yield "\"
                                id=\"alleop-tab\"
                                data-bs-toggle=\"tab\"
                                data-bs-target=\"#alleop\"
                                type=\"button\">
                            <i class=\"bi bi-basket\"></i> Alleop
                            <span class=\"badge bg-light text-dark ms-2\">";
            // line 139
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 139, $this->source); })()), "alleop", [], "any", false, false, false, 139)), "html", null, true);
            yield "</span>
                        </button>
                    </li>
                </ul>

                <div class=\"tab-content\">
                    <!-- eMAG Tab -->
                    <div class=\"tab-pane fade ";
            // line 146
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 146, $this->source); })()), "emag", [], "any", false, false, false, 146)) > 0)) {
                yield "show active";
            }
            yield "\"
                         id=\"emag\"
                         role=\"tabpanel\">
                        ";
            // line 149
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 149, $this->source); })()), "emag", [], "any", false, false, false, 149)) > 0)) {
                // line 150
                yield "                            <div class=\"row g-3\">
                                ";
                // line 151
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 151, $this->source); })()), "emag", [], "any", false, false, false, 151));
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
                    // line 152
                    yield "                                    ";
                    yield from $this->load("review/_product_card_compare.html.twig", 152)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "eMAG"]));
                    // line 153
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
                // line 154
                yield "                            </div>
                        ";
            } else {
                // line 156
                yield "                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма ";
                // line 157
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 157, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 157, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 157, $this->source); })())))), "html", null, true);
                yield " в eMAG
                            </div>
                        ";
            }
            // line 160
            yield "                    </div>

                    <!-- Alleop Tab -->
                    <div class=\"tab-pane fade ";
            // line 163
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 163, $this->source); })()), "emag", [], "any", false, false, false, 163)) == 0)) {
                yield "show active";
            }
            yield "\"
                         id=\"alleop\"
                         role=\"tabpanel\">
                        ";
            // line 166
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 166, $this->source); })()), "alleop", [], "any", false, false, false, 166)) > 0)) {
                // line 167
                yield "                            <div class=\"row g-3\">
                                ";
                // line 168
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 168, $this->source); })()), "alleop", [], "any", false, false, false, 168));
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
                    // line 169
                    yield "                                    ";
                    yield from $this->load("review/_product_card_compare.html.twig", 169)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Alleop"]));
                    // line 170
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
                // line 171
                yield "                            </div>
                        ";
            } else {
                // line 173
                yield "                            <div class=\"alert alert-info\">
                                <i class=\"bi bi-info-circle\"></i> Няма ";
                // line 174
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 174, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 174, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 174, $this->source); })())))), "html", null, true);
                yield " в Alleop
                            </div>
                        ";
            }
            // line 177
            yield "                    </div>
                </div>
            </div>
        </div>

        <!-- Chart Script - HYBRID MODE -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');
                let priceChart = null;

                const emagProducts = ";
            // line 188
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 188, $this->source); })()), "emag", [], "any", false, false, false, 188));
            yield ";
                const alleopProducts = ";
            // line 189
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 189, $this->source); })()), "alleop", [], "any", false, false, false, 189));
            yield ";

                // Helper functions for platform statistics
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

                // SMART SPEC PARSER - Extracts specs from description text
                function parseSpecs(description, productName) {
                    const text = (description + ' ' + productName).toLowerCase();
                    const specs = {};

                    // Parse Screen Size (inches or cm)
                    const screenMatch = text.match(/\\b(\\d{2,3})[\"''\\s]*(?:inch|инч|дюйм|\"|'')/i) ||
                                       text.match(/\\b(\\d{2,3})\\s*см\\b/i);
                    if (screenMatch) {
                        specs.screen = screenMatch[1] + (text.includes('см') ? ' см' : '\"');
                    }

                    // Parse Resolution
                    const resolutionMatch = text.match(/\\b(4K|8K|UHD|FHD|Full\\s*HD|HD|QHD|2K)\\b/i) ||
                                           text.match(/\\b(\\d{3,4}\\s*[xх×]\\s*\\d{3,4})\\b/i);
                    if (resolutionMatch) {
                        specs.resolution = resolutionMatch[1].toUpperCase().replace(/\\s/g, '');
                    }

                    // Parse Display Type
                    const typeMatch = text.match(/\\b(OLED|QLED|Mini\\s*LED|MiniLED|DLED|LED|LCD|Plasma)\\b/i);
                    if (typeMatch) {
                        specs.type = typeMatch[1].replace(/\\s/g, '');
                    }

                    // Parse Smart TV / OS
                    const smartMatch = text.match(/\\b(Android\\s*TV|Google\\s*TV|WebOS|Tizen|Fire\\s*TV|Smart\\s*TV|Smart)\\b/i);
                    if (smartMatch) {
                        specs.smart = smartMatch[1].replace(/\\s+/g, ' ');
                    }

                    return specs;
                }

                // UPDATE COMPARISON TABLE
                function updateComparisonTable() {
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');
                    const tableContainer = document.getElementById('comparisonTableContainer');
                    const table = document.getElementById('comparisonTable');
                    const thead = table.querySelector('thead');
                    const tbody = table.querySelector('tbody');

                    if (checkedBoxes.length > 0) {
                        // Show table
                        tableContainer.classList.remove('d-none');

                        // Clear previous content
                        thead.innerHTML = '';
                        tbody.innerHTML = '';

                        // Build table header with product images and names
                        let headerRow = '<tr><th class=\"bg-secondary text-white\" style=\"width: 150px;\">Характеристика</th>';
                        checkedBoxes.forEach(box => {
                            const img = box.dataset.img || '';
                            const name = box.dataset.name || 'Product';
                            const platform = box.dataset.platform || '';

                            headerRow += `
                                <th class=\"text-center\" style=\"min-width: 200px;\">
                                    \${img ? `<img src=\"\${img}\" alt=\"\${name}\" class=\"img-fluid mb-2\" style=\"max-height: 120px; object-fit: contain;\">` : ''}
                                    <div class=\"fw-bold small\">\${name.slice(0, 50)}\${name.length > 50 ? '...' : ''}</div>
                                    <span class=\"badge \${platform === 'eMAG' ? 'bg-primary' : 'bg-success'} mt-1\">\${platform}</span>
                                </th>
                            `;
                        });
                        headerRow += '</tr>';
                        thead.innerHTML = headerRow;

                        // Build specification rows
                        const specs = [
                            { label: 'Цена', key: 'price', format: (val) => `<span class=\"h5 text-primary fw-bold\">\${val} лв.</span>` },
                            { label: 'Екран', key: 'screen', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Резолюция', key: 'resolution', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Тип дисплей', key: 'type', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Smart TV / OS', key: 'smart', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' }
                        ];

                        specs.forEach(spec => {
                            let row = `<tr><td class=\"fw-bold bg-light\">\${spec.label}</td>`;
                            checkedBoxes.forEach(box => {
                                let value = box.dataset[spec.key] || '';

                                // SMART PARSING FALLBACK: If empty, try to extract from description
                                if (!value && spec.key !== 'price') {
                                    const description = box.dataset.description || '';
                                    const productName = box.dataset.name || '';
                                    const parsed = parseSpecs(description, productName);
                                    value = parsed[spec.key] || '';
                                }

                                row += `<td class=\"text-center\">\${spec.format(value)}</td>`;
                            });
                            row += '</tr>';
                            tbody.innerHTML += row;
                        });

                        // Build Review/Summary comparison row
                        let summaryRow = '<tr><td class=\"fw-bold bg-light\">Описание</td>';
                        checkedBoxes.forEach(box => {
                            const summary = box.dataset.summary || 'Няма налична информация';
                            summaryRow += `<td class=\"text-start p-3\"><small>\${summary}</small></td>`;
                        });
                        summaryRow += '</tr>';
                        tbody.innerHTML += summaryRow;

                        // Build action row with \"View Offer\" buttons
                        let actionRow = '<tr><td class=\"fw-bold bg-light\">Действие</td>';
                        checkedBoxes.forEach(box => {
                            const link = box.dataset.link || '#';
                            actionRow += `
                                <td class=\"text-center\">
                                    <a href=\"\${link}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-primary btn-sm w-100\">
                                        <i class=\"bi bi-cart-check\"></i> Виж оферта
                                    </a>
                                </td>
                            `;
                        });
                        actionRow += '</tr>';
                        tbody.innerHTML += actionRow;

                    } else {
                        // Hide table
                        tableContainer.classList.add('d-none');
                    }
                }

                // HYBRID CHART UPDATE FUNCTION
                function updateChart() {
                    // Get all checked checkboxes
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');

                    let chartData, chartOptions;

                    if (checkedBoxes.length > 0) {
                        // --- MODE A: PRODUCT COMPARISON (Priority) ---
                        let labels = [];
                        let dataPoints = [];
                        let backgroundColors = [];

                        checkedBoxes.forEach(box => {
                            const productName = box.dataset.name;
                            const productPrice = parseFloat(box.dataset.price);
                            const platform = box.dataset.platform;

                            // Shorten product name if too long
                            const shortName = productName.length > 30 ? productName.slice(0, 30) + '...' : productName;
                            labels.push(shortName);
                            dataPoints.push(productPrice);

                            // Assign color based on platform
                            if (platform === 'eMAG') {
                                backgroundColors.push('#ef2d2d'); // eMAG Red
                            } else {
                                backgroundColors.push('#009900'); // Alleop Green
                            }
                        });

                        chartData = {
                            labels: labels,
                            datasets: [{
                                label: 'Цена (лв.)',
                                data: dataPoints,
                                backgroundColor: backgroundColors,
                                borderWidth: 2,
                                borderColor: backgroundColors
                            }]
                        };

                        chartOptions = {
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Сравнение на избрани продукти',
                                    font: { size: 16, weight: 'bold' }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Цена: ' + context.parsed.y + ' лв.';
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
                        };

                    } else {
                        // --- MODE B: PLATFORM OVERVIEW (Default) ---
                        chartData = {
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
                        };

                        chartOptions = {
                            responsive: true,
                            plugins: {
                                legend: { display: true, position: 'top' },
                                title: {
                                    display: true,
                                    text: 'Статистика по платформи (eMAG vs Alleop)',
                                    font: { size: 16, weight: 'bold' }
                                },
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
                        };
                    }

                    // Destroy old chart if exists
                    if (priceChart) {
                        priceChart.destroy();
                    }

                    // Create new chart
                    priceChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: chartOptions
                    });
                }

                // Initialize chart on page load
                updateChart();
                updateComparisonTable();
                updateCompareButton();

                // Add event listeners to all checkboxes
                document.querySelectorAll('.compare-checkbox').forEach(box => {
                    box.addEventListener('change', function() {
                        updateChart();
                        updateComparisonTable();
                        updateCompareButton();
                    });
                });

                // Update \"Compare Selected\" button visibility
                function updateCompareButton() {
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');
                    const compareBtn = document.getElementById('compareSelectedBtn');

                    if (checkedBoxes.length > 0) {
                        compareBtn.style.display = 'inline-block';
                    } else {
                        compareBtn.style.display = 'none';
                    }
                }

                // Smooth scroll to chart when \"Compare Selected\" is clicked
                document.getElementById('compareSelectedBtn').addEventListener('click', function() {
                    const chartSection = document.querySelector('.chart-container');
                    if (chartSection) {
                        chartSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        // Update chart and table after scroll
                        setTimeout(function() {
                            updateChart();
                            updateComparisonTable();
                        }, 300);
                    }
                });
            });
        </script>
    ";
        } else {
            // line 533
            yield "        <div class=\"alert alert-warning text-center py-5\">
            <i class=\"bi bi-exclamation-triangle display-1 mb-3\"></i>
            <h3>Няма намерени продукти за \"";
            // line 535
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::titleCase($this->env->getCharset(), ((array_key_exists("categoryName", $context)) ? (Twig\Extension\CoreExtension::default((isset($context["categoryName"]) || array_key_exists("categoryName", $context) ? $context["categoryName"] : (function () { throw new RuntimeError('Variable "categoryName" does not exist.', 535, $this->source); })()), (isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 535, $this->source); })()))) : ((isset($context["category"]) || array_key_exists("category", $context) ? $context["category"] : (function () { throw new RuntimeError('Variable "category" does not exist.', 535, $this->source); })())))), "html", null, true);
            yield "\"</h3>
            <p class=\"mb-4\">Опитайте друга категория или разгледайте всички продукти.</p>
            <a href=\"";
            // line 537
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
            yield "\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Към всички продукти
            </a>
        </div>
    ";
        }
        // line 542
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
        return array (  848 => 542,  840 => 537,  835 => 535,  831 => 533,  484 => 189,  480 => 188,  467 => 177,  461 => 174,  458 => 173,  454 => 171,  440 => 170,  437 => 169,  420 => 168,  417 => 167,  415 => 166,  407 => 163,  402 => 160,  396 => 157,  393 => 156,  389 => 154,  375 => 153,  372 => 152,  355 => 151,  352 => 150,  350 => 149,  342 => 146,  332 => 139,  321 => 133,  314 => 129,  303 => 123,  256 => 78,  253 => 77,  247 => 74,  242 => 72,  237 => 69,  234 => 68,  231 => 67,  229 => 66,  225 => 65,  221 => 64,  211 => 56,  208 => 55,  202 => 52,  197 => 50,  192 => 47,  189 => 46,  186 => 45,  184 => 44,  180 => 43,  176 => 42,  167 => 35,  165 => 34,  162 => 33,  160 => 32,  147 => 22,  141 => 19,  131 => 11,  118 => 10,  103 => 6,  90 => 5,  65 => 3,  42 => 1,);
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
            <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3\">
                <div>
                    <h1 class=\"display-6 fw-bold mb-3\">
                        <i class=\"bi bi-arrow-left-right text-primary\"></i>
                        Сравни {{ categoryName|default(category)|title }}
                    </h1>
                    <p class=\"lead text-muted\">
                        Сравнение на цени между eMAG и Alleop за {{ categoryName|default(category)|title }}
                    </p>
                </div>
                <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success\" style=\"display: none;\">
                    <i class=\"bi bi-check2-square\"></i> Сравни избраните
                </button>
            </div>
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

        <!-- Detailed Comparison Table -->
        <div id=\"comparisonTableContainer\" class=\"d-none mt-5\">
            <div class=\"card shadow\">
                <div class=\"card-body p-4\">
                    <h3 class=\"card-title mb-4\">
                        <i class=\"bi bi-table text-success\"></i>
                        Детайлно сравнение на спецификации
                    </h3>
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-striped align-middle\" id=\"comparisonTable\">
                            <thead class=\"table-light\">
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
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

        <!-- Chart Script - HYBRID MODE -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');
                let priceChart = null;

                const emagProducts = {{ products.emag|json_encode|raw }};
                const alleopProducts = {{ products.alleop|json_encode|raw }};

                // Helper functions for platform statistics
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

                // SMART SPEC PARSER - Extracts specs from description text
                function parseSpecs(description, productName) {
                    const text = (description + ' ' + productName).toLowerCase();
                    const specs = {};

                    // Parse Screen Size (inches or cm)
                    const screenMatch = text.match(/\\b(\\d{2,3})[\"''\\s]*(?:inch|инч|дюйм|\"|'')/i) ||
                                       text.match(/\\b(\\d{2,3})\\s*см\\b/i);
                    if (screenMatch) {
                        specs.screen = screenMatch[1] + (text.includes('см') ? ' см' : '\"');
                    }

                    // Parse Resolution
                    const resolutionMatch = text.match(/\\b(4K|8K|UHD|FHD|Full\\s*HD|HD|QHD|2K)\\b/i) ||
                                           text.match(/\\b(\\d{3,4}\\s*[xх×]\\s*\\d{3,4})\\b/i);
                    if (resolutionMatch) {
                        specs.resolution = resolutionMatch[1].toUpperCase().replace(/\\s/g, '');
                    }

                    // Parse Display Type
                    const typeMatch = text.match(/\\b(OLED|QLED|Mini\\s*LED|MiniLED|DLED|LED|LCD|Plasma)\\b/i);
                    if (typeMatch) {
                        specs.type = typeMatch[1].replace(/\\s/g, '');
                    }

                    // Parse Smart TV / OS
                    const smartMatch = text.match(/\\b(Android\\s*TV|Google\\s*TV|WebOS|Tizen|Fire\\s*TV|Smart\\s*TV|Smart)\\b/i);
                    if (smartMatch) {
                        specs.smart = smartMatch[1].replace(/\\s+/g, ' ');
                    }

                    return specs;
                }

                // UPDATE COMPARISON TABLE
                function updateComparisonTable() {
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');
                    const tableContainer = document.getElementById('comparisonTableContainer');
                    const table = document.getElementById('comparisonTable');
                    const thead = table.querySelector('thead');
                    const tbody = table.querySelector('tbody');

                    if (checkedBoxes.length > 0) {
                        // Show table
                        tableContainer.classList.remove('d-none');

                        // Clear previous content
                        thead.innerHTML = '';
                        tbody.innerHTML = '';

                        // Build table header with product images and names
                        let headerRow = '<tr><th class=\"bg-secondary text-white\" style=\"width: 150px;\">Характеристика</th>';
                        checkedBoxes.forEach(box => {
                            const img = box.dataset.img || '';
                            const name = box.dataset.name || 'Product';
                            const platform = box.dataset.platform || '';

                            headerRow += `
                                <th class=\"text-center\" style=\"min-width: 200px;\">
                                    \${img ? `<img src=\"\${img}\" alt=\"\${name}\" class=\"img-fluid mb-2\" style=\"max-height: 120px; object-fit: contain;\">` : ''}
                                    <div class=\"fw-bold small\">\${name.slice(0, 50)}\${name.length > 50 ? '...' : ''}</div>
                                    <span class=\"badge \${platform === 'eMAG' ? 'bg-primary' : 'bg-success'} mt-1\">\${platform}</span>
                                </th>
                            `;
                        });
                        headerRow += '</tr>';
                        thead.innerHTML = headerRow;

                        // Build specification rows
                        const specs = [
                            { label: 'Цена', key: 'price', format: (val) => `<span class=\"h5 text-primary fw-bold\">\${val} лв.</span>` },
                            { label: 'Екран', key: 'screen', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Резолюция', key: 'resolution', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Тип дисплей', key: 'type', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' },
                            { label: 'Smart TV / OS', key: 'smart', format: (val) => val || '<em class=\"text-muted\">Не е посочено</em>' }
                        ];

                        specs.forEach(spec => {
                            let row = `<tr><td class=\"fw-bold bg-light\">\${spec.label}</td>`;
                            checkedBoxes.forEach(box => {
                                let value = box.dataset[spec.key] || '';

                                // SMART PARSING FALLBACK: If empty, try to extract from description
                                if (!value && spec.key !== 'price') {
                                    const description = box.dataset.description || '';
                                    const productName = box.dataset.name || '';
                                    const parsed = parseSpecs(description, productName);
                                    value = parsed[spec.key] || '';
                                }

                                row += `<td class=\"text-center\">\${spec.format(value)}</td>`;
                            });
                            row += '</tr>';
                            tbody.innerHTML += row;
                        });

                        // Build Review/Summary comparison row
                        let summaryRow = '<tr><td class=\"fw-bold bg-light\">Описание</td>';
                        checkedBoxes.forEach(box => {
                            const summary = box.dataset.summary || 'Няма налична информация';
                            summaryRow += `<td class=\"text-start p-3\"><small>\${summary}</small></td>`;
                        });
                        summaryRow += '</tr>';
                        tbody.innerHTML += summaryRow;

                        // Build action row with \"View Offer\" buttons
                        let actionRow = '<tr><td class=\"fw-bold bg-light\">Действие</td>';
                        checkedBoxes.forEach(box => {
                            const link = box.dataset.link || '#';
                            actionRow += `
                                <td class=\"text-center\">
                                    <a href=\"\${link}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-primary btn-sm w-100\">
                                        <i class=\"bi bi-cart-check\"></i> Виж оферта
                                    </a>
                                </td>
                            `;
                        });
                        actionRow += '</tr>';
                        tbody.innerHTML += actionRow;

                    } else {
                        // Hide table
                        tableContainer.classList.add('d-none');
                    }
                }

                // HYBRID CHART UPDATE FUNCTION
                function updateChart() {
                    // Get all checked checkboxes
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');

                    let chartData, chartOptions;

                    if (checkedBoxes.length > 0) {
                        // --- MODE A: PRODUCT COMPARISON (Priority) ---
                        let labels = [];
                        let dataPoints = [];
                        let backgroundColors = [];

                        checkedBoxes.forEach(box => {
                            const productName = box.dataset.name;
                            const productPrice = parseFloat(box.dataset.price);
                            const platform = box.dataset.platform;

                            // Shorten product name if too long
                            const shortName = productName.length > 30 ? productName.slice(0, 30) + '...' : productName;
                            labels.push(shortName);
                            dataPoints.push(productPrice);

                            // Assign color based on platform
                            if (platform === 'eMAG') {
                                backgroundColors.push('#ef2d2d'); // eMAG Red
                            } else {
                                backgroundColors.push('#009900'); // Alleop Green
                            }
                        });

                        chartData = {
                            labels: labels,
                            datasets: [{
                                label: 'Цена (лв.)',
                                data: dataPoints,
                                backgroundColor: backgroundColors,
                                borderWidth: 2,
                                borderColor: backgroundColors
                            }]
                        };

                        chartOptions = {
                            responsive: true,
                            plugins: {
                                legend: { display: false },
                                title: {
                                    display: true,
                                    text: 'Сравнение на избрани продукти',
                                    font: { size: 16, weight: 'bold' }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return 'Цена: ' + context.parsed.y + ' лв.';
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
                        };

                    } else {
                        // --- MODE B: PLATFORM OVERVIEW (Default) ---
                        chartData = {
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
                        };

                        chartOptions = {
                            responsive: true,
                            plugins: {
                                legend: { display: true, position: 'top' },
                                title: {
                                    display: true,
                                    text: 'Статистика по платформи (eMAG vs Alleop)',
                                    font: { size: 16, weight: 'bold' }
                                },
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
                        };
                    }

                    // Destroy old chart if exists
                    if (priceChart) {
                        priceChart.destroy();
                    }

                    // Create new chart
                    priceChart = new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: chartOptions
                    });
                }

                // Initialize chart on page load
                updateChart();
                updateComparisonTable();
                updateCompareButton();

                // Add event listeners to all checkboxes
                document.querySelectorAll('.compare-checkbox').forEach(box => {
                    box.addEventListener('change', function() {
                        updateChart();
                        updateComparisonTable();
                        updateCompareButton();
                    });
                });

                // Update \"Compare Selected\" button visibility
                function updateCompareButton() {
                    const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');
                    const compareBtn = document.getElementById('compareSelectedBtn');

                    if (checkedBoxes.length > 0) {
                        compareBtn.style.display = 'inline-block';
                    } else {
                        compareBtn.style.display = 'none';
                    }
                }

                // Smooth scroll to chart when \"Compare Selected\" is clicked
                document.getElementById('compareSelectedBtn').addEventListener('click', function() {
                    const chartSection = document.querySelector('.chart-container');
                    if (chartSection) {
                        chartSection.scrollIntoView({ behavior: 'smooth', block: 'center' });
                        // Update chart and table after scroll
                        setTimeout(function() {
                            updateChart();
                            updateComparisonTable();
                        }, 300);
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
