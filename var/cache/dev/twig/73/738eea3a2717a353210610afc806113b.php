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
            <h1 class=\"display-6 fw-bold mb-3\">
                <i class=\"bi bi-graph-up text-primary\"></i>
                Сравнение на цени за подобни продукти
            </h1>
            <p class=\"lead text-muted\">
                Намерени продукти подобни на: <strong>";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 30, $this->source); })()), "title", [], "any", false, false, false, 30), "html", null, true);
        yield "</strong>
            </p>
        </div>
    </div>

    ";
        // line 35
        $context["hasProducts"] = (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 35, $this->source); })()), "emag", [], "any", false, false, false, 35)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 35, $this->source); })()), "fashiondays", [], "any", false, false, false, 35)) > 0)) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 35, $this->source); })()), "alleop", [], "any", false, false, false, 35)) > 0));
        // line 36
        yield "
    ";
        // line 37
        if ((($tmp = (isset($context["hasProducts"]) || array_key_exists("hasProducts", $context) ? $context["hasProducts"] : (function () { throw new RuntimeError('Variable "hasProducts" does not exist.', 37, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
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

        <!-- Statistics Cards -->
        <div class=\"row mb-5\">
            <div class=\"col-md-4\">
                <div class=\"card shadow-sm text-center h-100\">
                    <div class=\"card-body\">
                        <i class=\"bi bi-laptop display-4 text-primary mb-3\"></i>
                        <h4 class=\"card-title\">eMAG</h4>
                        <p class=\"display-6 fw-bold text-primary mb-0\">";
            // line 60
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 60, $this->source); })()), "emag", [], "any", false, false, false, 60)), "html", null, true);
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
            // line 70
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 70, $this->source); })()), "fashiondays", [], "any", false, false, false, 70)), "html", null, true);
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
            // line 80
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 80, $this->source); })()), "alleop", [], "any", false, false, false, 80)), "html", null, true);
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
            // line 93
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 93, $this->source); })()), "emag", [], "any", false, false, false, 93)) > 0)) {
                // line 94
                yield "                    <h4 class=\"text-primary mb-3\"><i class=\"bi bi-laptop\"></i> eMAG (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 94, $this->source); })()), "emag", [], "any", false, false, false, 94)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 96
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 96, $this->source); })()), "emag", [], "any", false, false, false, 96));
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
                    // line 97
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 97)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "eMAG"]));
                    // line 98
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
                // line 99
                yield "                    </div>
                ";
            }
            // line 101
            yield "
                <!-- Fashion Days Products -->
                ";
            // line 103
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 103, $this->source); })()), "fashiondays", [], "any", false, false, false, 103)) > 0)) {
                // line 104
                yield "                    <h4 class=\"text-danger mb-3\"><i class=\"bi bi-bag-heart\"></i> Fashion Days (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 104, $this->source); })()), "fashiondays", [], "any", false, false, false, 104)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 106
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 106, $this->source); })()), "fashiondays", [], "any", false, false, false, 106));
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
                    // line 107
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 107)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Fashion Days"]));
                    // line 108
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
                // line 109
                yield "                    </div>
                ";
            }
            // line 111
            yield "
                <!-- Alleop Products -->
                ";
            // line 113
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 113, $this->source); })()), "alleop", [], "any", false, false, false, 113)) > 0)) {
                // line 114
                yield "                    <h4 class=\"text-success mb-3\"><i class=\"bi bi-basket\"></i> Alleop (";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 114, $this->source); })()), "alleop", [], "any", false, false, false, 114)), "html", null, true);
                yield ")</h4>
                    <div class=\"row g-3 mb-5\">
                        ";
                // line 116
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 116, $this->source); })()), "alleop", [], "any", false, false, false, 116));
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
                    // line 117
                    yield "                            ";
                    yield from $this->load("review/_product_card_compare.html.twig", 117)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Alleop"]));
                    // line 118
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
                // line 119
                yield "                    </div>
                ";
            }
            // line 121
            yield "            </div>
        </div>

        <!-- Chart Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');

                const emagProducts = ";
            // line 129
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 129, $this->source); })()), "emag", [], "any", false, false, false, 129));
            yield ";
                const fashionDaysProducts = ";
            // line 130
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 130, $this->source); })()), "fashiondays", [], "any", false, false, false, 130));
            yield ";
                const alleopProducts = ";
            // line 131
            yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 131, $this->source); })()), "alleop", [], "any", false, false, false, 131));
            yield ";

                console.log('Chart Data - eMAG:', emagProducts.length, 'Fashion Days:', fashionDaysProducts.length, 'Alleop:', alleopProducts.length);
                console.log('eMAG Products:', emagProducts);
                console.log('Fashion Days Products:', fashionDaysProducts);
                console.log('Alleop Products:', alleopProducts);

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

                new Chart(ctx, {
                    type: 'bar',
                    data: {
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
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
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
                    }
                });
            });
        </script>
    ";
        } else {
            // line 229
            yield "        <div class=\"alert alert-warning text-center py-5\">
            <i class=\"bi bi-exclamation-triangle display-1 mb-3\"></i>
            <h3>Няма намерени подобни продукти</h3>
            <p class=\"mb-4\">В момента няма други продукти с подобни характеристики в нашата база данни.</p>
            <a href=\"";
            // line 233
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 233, $this->source); })()), "slug", [], "any", false, false, false, 233)]), "html", null, true);
            yield "\" class=\"btn btn-primary\">
                <i class=\"bi bi-arrow-left\"></i> Обратно към продукта
            </a>
        </div>
    ";
        }
        // line 238
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
        return array (  520 => 238,  512 => 233,  506 => 229,  405 => 131,  401 => 130,  397 => 129,  387 => 121,  383 => 119,  369 => 118,  366 => 117,  349 => 116,  343 => 114,  341 => 113,  337 => 111,  333 => 109,  319 => 108,  316 => 107,  299 => 106,  293 => 104,  291 => 103,  287 => 101,  283 => 99,  269 => 98,  266 => 97,  249 => 96,  243 => 94,  241 => 93,  225 => 80,  212 => 70,  199 => 60,  175 => 38,  173 => 37,  170 => 36,  168 => 35,  160 => 30,  142 => 17,  138 => 16,  132 => 12,  119 => 11,  103 => 6,  90 => 5,  65 => 3,  42 => 1,);
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
            <h1 class=\"display-6 fw-bold mb-3\">
                <i class=\"bi bi-graph-up text-primary\"></i>
                Сравнение на цени за подобни продукти
            </h1>
            <p class=\"lead text-muted\">
                Намерени продукти подобни на: <strong>{{ review.title }}</strong>
            </p>
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

        <!-- Chart Script -->
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const ctx = document.getElementById('priceChart');

                const emagProducts = {{ products.emag|json_encode|raw }};
                const fashionDaysProducts = {{ products.fashiondays|json_encode|raw }};
                const alleopProducts = {{ products.alleop|json_encode|raw }};

                console.log('Chart Data - eMAG:', emagProducts.length, 'Fashion Days:', fashionDaysProducts.length, 'Alleop:', alleopProducts.length);
                console.log('eMAG Products:', emagProducts);
                console.log('Fashion Days Products:', fashionDaysProducts);
                console.log('Alleop Products:', alleopProducts);

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

                new Chart(ctx, {
                    type: 'bar',
                    data: {
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
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        plugins: {
                            legend: {
                                display: true,
                                position: 'top'
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
", "review/compare_product.html.twig", "/var/www/html/templates/review/compare_product.html.twig");
    }
}
