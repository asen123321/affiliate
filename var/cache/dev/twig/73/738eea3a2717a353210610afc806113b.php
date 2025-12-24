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

/* review/compare_product.html.twig */
class __TwigTemplate_81d6ee5d78b464d3175f13a4d46845b9 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_product.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_product.html.twig"));

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
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - различни платформи";
        
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
    <!-- Chart.js -->
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 11
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

        // line 12
        yield "<div class=\"container py-5\">
    <!-- Breadcrumb -->
    <nav aria-label=\"breadcrumb\" class=\"mb-4\">
        <ol class=\"breadcrumb\">
            <li class=\"breadcrumb-item\"><a href=\"";
        // line 16
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Начало</a></li>
            <li class=\"breadcrumb-item\"><a href=\"";
        // line 17
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 17, $this->source); })()), "slug", [], "any", false, false, false, 17)]), "html", null, true);
        yield "\">";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 17, $this->source); })()), "title", [], "any", false, false, false, 17), 0, 30), "html", null, true);
        yield "...</a></li>
            <li class=\"breadcrumb-item active\">Сравни цени</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3\">
                <div>
                    <h1 class=\"display-6 fw-bold mb-3\">
                        <i class=\"bi bi-graph-up text-primary\"></i>
                        Сравнение на цени за подобни продукти
                    </h1>
                    <p class=\"lead text-muted\">
                        Намерени продукти подобни на: <strong>";
        // line 32
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 32, $this->source); })()), "title", [], "any", false, false, false, 32), "html", null, true);
        yield "</strong>
                    </p>
                </div>
                <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success\" style=\"display: none;\">
                    <i class=\"bi bi-check2-square\"></i> Сравни избраните
                </button>
            </div>
        </div>
    </div>

    ";
        // line 42
        $context["hasProducts"] = (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 42, $this->source); })()), "emag", [], "any", false, false, false, 42)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 42, $this->source); })()), "fashiondays", [], "any", false, false, false, 42)) > 0)) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 42, $this->source); })()), "alleop", [], "any", false, false, false, 42)) > 0));
        // line 43
        yield "
    ";
        // line 44
        if ((($tmp = (isset($context["hasProducts"]) || array_key_exists("hasProducts", $context) ? $context["hasProducts"] : (function () { throw new RuntimeError('Variable "hasProducts" does not exist.', 44, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "        <!-- Price Comparison Chart -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-bar-chart-line-fill text-primary\"></i>
                            Сравнение на цени по платформи
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

        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-0\">";
            // line 87
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 87, $this->source); })()), "emag", [], "any", false, false, false, 87)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-bag-heart display-4 text-danger mb-3\"></i>
                        <h4 class=\"card-title\">Fashion Days</h4>
                        <p class=\"display-6 fw-bold text-danger mb-0\">";
            // line 97
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 97, $this->source); })()), "fashiondays", [], "any", false, false, false, 97)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-basket display-4 text-success mb-3\"></i>
                        <h4 class=\"card-title\">Alleop</h4>
                        <p class=\"display-6 fw-bold text-success mb-0\">";
            // line 107
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 107, $this->source); })()), "alleop", [], "any", false, false, false, 107)), "html", null, true);
            yield "</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products by Platform -->
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"mb-4\"><i class=\"bi bi-list-ul\"></i> Всички намерени продукти</h3>

                <!-- eMAG Products -->
                ";
            // line 120
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 120, $this->source); })()), "emag", [], "any", false, false, false, 120)) > 0)) {
                // line 121
                yield "                    <h4 class=\"text-primary mb-3\"><i class=\"bi bi-laptop\"></i> eMAG (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 121, $this->source); })()), "emag", [], "any", false, false, false, 121)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 123
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 123, $this->source); })()), "emag", [], "any", false, false, false, 123));
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
                    // line 124
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 124)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "eMAG"]));
                    // line 125
                    yield "                        ";
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
                // line 126
                yield "                    </div>
                ";
            }
            // line 128
            yield "
                <!-- Fashion Days Products -->
                ";
            // line 130
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 130, $this->source); })()), "fashiondays", [], "any", false, false, false, 130)) > 0)) {
                // line 131
                yield "                    <h4 class=\"text-danger mb-3\"><i class=\"bi bi-bag-heart\"></i> Fashion Days (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 131, $this->source); })()), "fashiondays", [], "any", false, false, false, 131)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 133
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 133, $this->source); })()), "fashiondays", [], "any", false, false, false, 133));
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
                    // line 134
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 134)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Fashion Days"]));
                    // line 135
                    yield "                        ";
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
                // line 136
                yield "                    </div>
                ";
            }
            // line 138
            yield "
                <!-- Alleop Products -->
                ";
            // line 140
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 140, $this->source); })()), "alleop", [], "any", false, false, false, 140)) > 0)) {
                // line 141
                yield "                    <h4 class=\"text-success mb-3\"><i class=\"bi bi-basket\"></i> Alleop (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 141, $this->source); })()), "alleop", [], "any", false, false, false, 141)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 143
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 143, $this->source); })()), "alleop", [], "any", false, false, false, 143));
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
                    // line 144
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 144)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Alleop"]));
                    // line 145
                    yield "                        ";
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
                // line 146
                yield "                    </div>
                ";
            }
            // line 148
            yield "            </div>
        </div>

        <!-- Chart Script - HYBRID MODE -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');
                let priceChart = null;

                const emagProducts = ";
            // line 157
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 157, $this->source); })()), "emag", [], "any", false, false, false, 157));
            yield ";
                const fashionDaysProducts = ";
            // line 158
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 158, $this->source); })()), "fashiondays", [], "any", false, false, false, 158));
            yield ";
                const alleopProducts = ";
            // line 159
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 159, $this->source); })()), "alleop", [], "any", false, false, false, 159));
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
                                    <span class=\"badge \${platform === 'eMAG' ? 'bg-primary' : platform === 'Fashion Days' ? 'bg-dark' : 'bg-success'} mt-1\">\${platform}</span>
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
                            } else if (platform === 'Fashion Days') {
                                backgroundColors.push('#ff6b35'); // Fashion Days Orange
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
                            maintainAspectRatio: true,
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
                            labels: ['eMAG', 'Fashion Days', 'Alleop'],
                            datasets: [
                                {
                                    label: 'Най-ниска цена (лв.)',
                                    data: [
                                        getMinPrice(emagProducts),
                                        getMinPrice(fashionDaysProducts),
                                        getMinPrice(alleopProducts)
                                    ],
                                    backgroundColor: [
                                        'rgba(59, 130, 246, 0.8)',
                                        'rgba(239, 68, 68, 0.8)',
                                        'rgba(34, 197, 94, 0.8)'
                                    ],
                                    borderColor: [
                                        'rgba(59, 130, 246, 1)',
                                        'rgba(239, 68, 68, 1)',
                                        'rgba(34, 197, 94, 1)'
                                    ],
                                    borderWidth: 2
                                },
                                {
                                    label: 'Средна цена (лв.)',
                                    data: [
                                        getAveragePrice(emagProducts),
                                        getAveragePrice(fashionDaysProducts),
                                        getAveragePrice(alleopProducts)
                                    ],
                                    backgroundColor: [
                                        'rgba(99, 102, 241, 0.6)',
                                        'rgba(244, 114, 182, 0.6)',
                                        'rgba(74, 222, 128, 0.6)'
                                    ],
                                    borderColor: [
                                        'rgba(99, 102, 241, 1)',
                                        'rgba(244, 114, 182, 1)',
                                        'rgba(74, 222, 128, 1)'
                                    ],
                                    borderWidth: 2
                                }
                            ]
                        };

                        chartOptions = {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                legend: { display: true, position: 'top' },
                                title: {
                                    display: true,
                                    text: 'Статистика по платформи',
                                    font: { size: 16, weight: 'bold' }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.dataset.label + ': ' + context.parsed.y + ' лв.';
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
                    const chartSection = document.querySelector('.card.shadow');
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
            // line 508
            yield "        <div class=\"alert alert-warning text-center py-5\">
            <i class=\"bi bi-exclamation-triangle display-1 mb-3\"></i>
            <h3>Няма намерени подобни продукти</h3>
            <p class=\"mb-4\">В момента няма други продукти с подобни характеристики в нашата база данни.</p>
            <a href=\"";
            // line 512
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 512, $this->source); })()), "slug", [], "any", false, false, false, 512)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Обратно към продукта
            </a>
        </div>
    ";
        }
        // line 517
        yield "</div>
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
        return "review/compare_product.html.twig";
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
        return array (  799 => 517,  791 => 512,  785 => 508,  433 => 159,  429 => 158,  425 => 157,  414 => 148,  410 => 146,  396 => 145,  393 => 144,  376 => 143,  370 => 141,  368 => 140,  364 => 138,  360 => 136,  346 => 135,  343 => 134,  326 => 133,  320 => 131,  318 => 130,  314 => 128,  310 => 126,  296 => 125,  293 => 124,  276 => 123,  270 => 121,  268 => 120,  252 => 107,  239 => 97,  226 => 87,  182 => 45,  180 => 44,  177 => 43,  175 => 42,  162 => 32,  142 => 17,  138 => 16,  132 => 12,  119 => 11,  103 => 6,  90 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Сравни {{ review.title }} - различни платформи{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <!-- Chart.js -->
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <!-- Breadcrumb -->
    <nav aria-label=\"breadcrumb\" class=\"mb-4\">
        <ol class=\"breadcrumb\">
            <li class=\"breadcrumb-item\"><a href=\"{{ path('app_home') }}\">Начало</a></li>
            <li class=\"breadcrumb-item\"><a href=\"{{ path('app_review_show', {slug: review.slug}) }}\">{{ review.title|slice(0, 30) }}...</a></li>
            <li class=\"breadcrumb-item active\">Сравни цени</li>
        </ol>
    </nav>

    <!-- Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <div class=\"d-flex justify-content-between align-items-start flex-wrap gap-3\">
                <div>
                    <h1 class=\"display-6 fw-bold mb-3\">
                        <i class=\"bi bi-graph-up text-primary\"></i>
                        Сравнение на цени за подобни продукти
                    </h1>
                    <p class=\"lead text-muted\">
                        Намерени продукти подобни на: <strong>{{ review.title }}</strong>
                    </p>
                </div>
                <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success\" style=\"display: none;\">
                    <i class=\"bi bi-check2-square\"></i> Сравни избраните
                </button>
            </div>
        </div>
    </div>

    {% set hasProducts = products.emag|length > 0 or products.fashiondays|length > 0 or products.alleop|length > 0 %}

    {% if hasProducts %}
        <!-- Price Comparison Chart -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-bar-chart-line-fill text-primary\"></i>
                            Сравнение на цени по платформи
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

        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-0\">{{ products.emag|length }}</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-bag-heart display-4 text-danger mb-3\"></i>
                        <h4 class=\"card-title\">Fashion Days</h4>
                        <p class=\"display-6 fw-bold text-danger mb-0\">{{ products.fashiondays|length }}</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-basket display-4 text-success mb-3\"></i>
                        <h4 class=\"card-title\">Alleop</h4>
                        <p class=\"display-6 fw-bold text-success mb-0\">{{ products.alleop|length }}</p>
                        <small class=\"text-muted\">продукта</small>
                    </div>
                </div>
            </div>
        </div>

        <!-- Products by Platform -->
        <div class=\"row\">
            <div class=\"col-12\">
                <h3 class=\"mb-4\"><i class=\"bi bi-list-ul\"></i> Всички намерени продукти</h3>

                <!-- eMAG Products -->
                {% if products.emag|length > 0 %}
                    <h4 class=\"text-primary mb-3\"><i class=\"bi bi-laptop\"></i> eMAG ({{ products.emag|length }})</h4>
                    <div class=\"row g-3 mb-5\">
                        {% for product in products.emag %}
                            {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'eMAG'} %}
                        {% endfor %}
                    </div>
                {% endif %}

                <!-- Fashion Days Products -->
                {% if products.fashiondays|length > 0 %}
                    <h4 class=\"text-danger mb-3\"><i class=\"bi bi-bag-heart\"></i> Fashion Days ({{ products.fashiondays|length }})</h4>
                    <div class=\"row g-3 mb-5\">
                        {% for product in products.fashiondays %}
                            {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'Fashion Days'} %}
                        {% endfor %}
                    </div>
                {% endif %}

                <!-- Alleop Products -->
                {% if products.alleop|length > 0 %}
                    <h4 class=\"text-success mb-3\"><i class=\"bi bi-basket\"></i> Alleop ({{ products.alleop|length }})</h4>
                    <div class=\"row g-3 mb-5\">
                        {% for product in products.alleop %}
                            {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'Alleop'} %}
                        {% endfor %}
                    </div>
                {% endif %}
            </div>
        </div>

        <!-- Chart Script - HYBRID MODE -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');
                let priceChart = null;

                const emagProducts = {{ products.emag|json_encode|raw }};
                const fashionDaysProducts = {{ products.fashiondays|json_encode|raw }};
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
                                    <span class=\"badge \${platform === 'eMAG' ? 'bg-primary' : platform === 'Fashion Days' ? 'bg-dark' : 'bg-success'} mt-1\">\${platform}</span>
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
                            } else if (platform === 'Fashion Days') {
                                backgroundColors.push('#ff6b35'); // Fashion Days Orange
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
                            maintainAspectRatio: true,
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
                            labels: ['eMAG', 'Fashion Days', 'Alleop'],
                            datasets: [
                                {
                                    label: 'Най-ниска цена (лв.)',
                                    data: [
                                        getMinPrice(emagProducts),
                                        getMinPrice(fashionDaysProducts),
                                        getMinPrice(alleopProducts)
                                    ],
                                    backgroundColor: [
                                        'rgba(59, 130, 246, 0.8)',
                                        'rgba(239, 68, 68, 0.8)',
                                        'rgba(34, 197, 94, 0.8)'
                                    ],
                                    borderColor: [
                                        'rgba(59, 130, 246, 1)',
                                        'rgba(239, 68, 68, 1)',
                                        'rgba(34, 197, 94, 1)'
                                    ],
                                    borderWidth: 2
                                },
                                {
                                    label: 'Средна цена (лв.)',
                                    data: [
                                        getAveragePrice(emagProducts),
                                        getAveragePrice(fashionDaysProducts),
                                        getAveragePrice(alleopProducts)
                                    ],
                                    backgroundColor: [
                                        'rgba(99, 102, 241, 0.6)',
                                        'rgba(244, 114, 182, 0.6)',
                                        'rgba(74, 222, 128, 0.6)'
                                    ],
                                    borderColor: [
                                        'rgba(99, 102, 241, 1)',
                                        'rgba(244, 114, 182, 1)',
                                        'rgba(74, 222, 128, 1)'
                                    ],
                                    borderWidth: 2
                                }
                            ]
                        };

                        chartOptions = {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                legend: { display: true, position: 'top' },
                                title: {
                                    display: true,
                                    text: 'Статистика по платформи',
                                    font: { size: 16, weight: 'bold' }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            return context.dataset.label + ': ' + context.parsed.y + ' лв.';
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
                    const chartSection = document.querySelector('.card.shadow');
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
            <h3>Няма намерени подобни продукти</h3>
            <p class=\"mb-4\">В момента няма други продукти с подобни характеристики в нашата база данни.</p>
            <a href=\"{{ path('app_review_show', {slug: review.slug}) }}\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Обратно към продукта
            </a>
        </div>
    {% endif %}
</div>
{% endblock %}
", "review/compare_product.html.twig", "/home/needy/affiliate-site/templates/review/compare_product.html.twig");
    }
}
