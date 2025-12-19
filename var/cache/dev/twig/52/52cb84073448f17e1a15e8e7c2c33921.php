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

/* review/compare_prices.html.twig */
class __TwigTemplate_9e0600c5ff201f50452187aa9e135fa0 extends Template
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
            'stylesheets' => [$this, 'block_stylesheets'],
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_prices.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/compare_prices.html.twig"));

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

        yield "Сравни цени между платформи";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "    ";
        yield from $this->yieldParentBlock("stylesheets", $context, $blocks);
        yield "
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 9
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

        // line 10
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

    // line 15
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

        // line 16
        yield "<div class=\"container py-5\">
    <!-- Search Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-5 fw-bold text-center mb-3\">
                <i class=\"bi bi-graph-up-arrow text-primary\"></i> Сравнение на цени
            </h1>
            <p class=\"text-center text-muted mb-4\">
                Намерете най-добрата цена за вашия продукт между eMAG, Fashion Days и Alleop
            </p>
        </div>
    </div>

    <!-- Search Form -->
    <div class=\"row mb-5\">
        <div class=\"col-lg-8 mx-auto\">
            <form action=\"";
        // line 32
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_compare_prices");
        yield "\" method=\"get\">
                <div class=\"input-group input-group-lg shadow-sm\">
                    <input type=\"search\"
                           name=\"q\"
                           class=\"form-control\"
                           placeholder=\"Например: кафемашина, лаптоп, рокля...\"
                           value=\"";
        // line 38
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 38, $this->source); })()), "html", null, true);
        yield "\"
                           required>
                    <button class=\"btn btn-primary px-4\" type=\"submit\">
                        <i class=\"bi bi-search\"></i> Сравни цени
                    </button>
                </div>
            </form>
        </div>
    </div>

    ";
        // line 48
        if ((($tmp = (isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 48, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 49
            yield "        ";
            $context["hasProducts"] = (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 49, $this->source); })()), "emag", [], "any", false, false, false, 49)) > 0) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 49, $this->source); })()), "fashiondays", [], "any", false, false, false, 49)) > 0)) || (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 49, $this->source); })()), "alleop", [], "any", false, false, false, 49)) > 0));
            // line 50
            yield "
        ";
            // line 51
            if ((($tmp = (isset($context["hasProducts"]) || array_key_exists("hasProducts", $context) ? $context["hasProducts"] : (function () { throw new RuntimeError('Variable "hasProducts" does not exist.', 51, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 52
                yield "            <!-- Price Chart -->
            <div class=\"row mb-5\">
                <div class=\"col-12\">
                    <div class=\"card shadow-sm\">
                        <div class=\"card-body p-4\">
                            <h3 class=\"card-title mb-4\">
                                <i class=\"bi bi-bar-chart-line text-primary\"></i>
                                Сравнение на цени за \"";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 59, $this->source); })()), "html", null, true);
                yield "\"
                            </h3>
                            <canvas id=\"priceComparisonChart\" height=\"100\"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Platform Tabs -->
            <div class=\"row\">
                <div class=\"col-12\">
                    <ul class=\"nav nav-pills nav-fill mb-4\" id=\"platformTabs\" role=\"tablist\">
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link ";
                // line 72
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 72, $this->source); })()), "emag", [], "any", false, false, false, 72)) > 0)) {
                    yield "active";
                }
                yield "\"
                                    id=\"emag-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#emag\"
                                    type=\"button\">
                                <i class=\"bi bi-laptop\"></i> eMAG
                                <span class=\"badge bg-primary\">";
                // line 78
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 78, $this->source); })()), "emag", [], "any", false, false, false, 78)), "html", null, true);
                yield "</span>
                            </button>
                        </li>
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link ";
                // line 82
                if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 82, $this->source); })()), "emag", [], "any", false, false, false, 82)) == 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 82, $this->source); })()), "fashiondays", [], "any", false, false, false, 82)) > 0))) {
                    yield "active";
                }
                yield "\"
                                    id=\"fashiondays-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#fashiondays\"
                                    type=\"button\">
                                <i class=\"bi bi-bag-heart\"></i> Fashion Days
                                <span class=\"badge bg-primary\">";
                // line 88
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 88, $this->source); })()), "fashiondays", [], "any", false, false, false, 88)), "html", null, true);
                yield "</span>
                            </button>
                        </li>
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link ";
                // line 92
                if ((((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 92, $this->source); })()), "emag", [], "any", false, false, false, 92)) == 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 92, $this->source); })()), "fashiondays", [], "any", false, false, false, 92)) == 0)) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 92, $this->source); })()), "alleop", [], "any", false, false, false, 92)) > 0))) {
                    yield "active";
                }
                yield "\"
                                    id=\"alleop-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#alleop\"
                                    type=\"button\">
                                <i class=\"bi bi-basket\"></i> Alleop
                                <span class=\"badge bg-primary\">";
                // line 98
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 98, $this->source); })()), "alleop", [], "any", false, false, false, 98)), "html", null, true);
                yield "</span>
                            </button>
                        </li>
                    </ul>

                    <div class=\"tab-content\" id=\"platformTabContent\">
                        <!-- eMAG Tab -->
                        <div class=\"tab-pane fade ";
                // line 105
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 105, $this->source); })()), "emag", [], "any", false, false, false, 105)) > 0)) {
                    yield "show active";
                }
                yield "\"
                             id=\"emag\"
                             role=\"tabpanel\">
                            ";
                // line 108
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 108, $this->source); })()), "emag", [], "any", false, false, false, 108)) > 0)) {
                    // line 109
                    yield "                                <div class=\"row g-3\">
                                    ";
                    // line 110
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 110, $this->source); })()), "emag", [], "any", false, false, false, 110));
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
                        // line 111
                        yield "                                        ";
                        yield from $this->load("review/_product_card_compare.html.twig", 111)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "eMAG"]));
                        // line 112
                        yield "                                    ";
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
                    // line 113
                    yield "                                </div>
                            ";
                } else {
                    // line 115
                    yield "                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в eMAG
                                </div>
                            ";
                }
                // line 119
                yield "                        </div>

                        <!-- Fashion Days Tab -->
                        <div class=\"tab-pane fade ";
                // line 122
                if (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 122, $this->source); })()), "emag", [], "any", false, false, false, 122)) == 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 122, $this->source); })()), "fashiondays", [], "any", false, false, false, 122)) > 0))) {
                    yield "show active";
                }
                yield "\"
                             id=\"fashiondays\"
                             role=\"tabpanel\">
                            ";
                // line 125
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 125, $this->source); })()), "fashiondays", [], "any", false, false, false, 125)) > 0)) {
                    // line 126
                    yield "                                <div class=\"row g-3\">
                                    ";
                    // line 127
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 127, $this->source); })()), "fashiondays", [], "any", false, false, false, 127));
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
                        // line 128
                        yield "                                        ";
                        yield from $this->load("review/_product_card_compare.html.twig", 128)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Fashion Days"]));
                        // line 129
                        yield "                                    ";
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
                    // line 130
                    yield "                                </div>
                            ";
                } else {
                    // line 132
                    yield "                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в Fashion Days
                                </div>
                            ";
                }
                // line 136
                yield "                        </div>

                        <!-- Alleop Tab -->
                        <div class=\"tab-pane fade ";
                // line 139
                if ((((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 139, $this->source); })()), "emag", [], "any", false, false, false, 139)) == 0) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 139, $this->source); })()), "fashiondays", [], "any", false, false, false, 139)) == 0)) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 139, $this->source); })()), "alleop", [], "any", false, false, false, 139)) > 0))) {
                    yield "show active";
                }
                yield "\"
                             id=\"alleop\"
                             role=\"tabpanel\">
                            ";
                // line 142
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 142, $this->source); })()), "alleop", [], "any", false, false, false, 142)) > 0)) {
                    // line 143
                    yield "                                <div class=\"row g-3\">
                                    ";
                    // line 144
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 144, $this->source); })()), "alleop", [], "any", false, false, false, 144));
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
                        // line 145
                        yield "                                        ";
                        yield from $this->load("review/_product_card_compare.html.twig", 145)->unwrap()->yield(CoreExtension::merge($context, ["product" => $context["product"], "platform" => "Alleop"]));
                        // line 146
                        yield "                                    ";
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
                    // line 147
                    yield "                                </div>
                            ";
                } else {
                    // line 149
                    yield "                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в Alleop
                                </div>
                            ";
                }
                // line 153
                yield "                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart.js Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('priceComparisonChart');

                    // Prepare data for chart - SHOW ALL INDIVIDUAL PRODUCTS
                    const emagProducts = ";
                // line 164
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 164, $this->source); })()), "emag", [], "any", false, false, false, 164));
                yield ";
                    const fashionDaysProducts = ";
                // line 165
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 165, $this->source); })()), "fashiondays", [], "any", false, false, false, 165));
                yield ";
                    const alleopProducts = ";
                // line 166
                yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["products"]) || array_key_exists("products", $context) ? $context["products"] : (function () { throw new RuntimeError('Variable "products" does not exist.', 166, $this->source); })()), "alleop", [], "any", false, false, false, 166));
                yield ";

                    console.log('eMAG Products:', emagProducts.length);
                    console.log('Fashion Days Products:', fashionDaysProducts.length);
                    console.log('Alleop Products:', alleopProducts.length);

                    // Extract all individual prices from each platform
                    const emagPrices = emagProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    const fashionDaysPrices = fashionDaysProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    const alleopPrices = alleopProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    console.log('eMAG Prices:', emagPrices);
                    console.log('Fashion Days Prices:', fashionDaysPrices);
                    console.log('Alleop Prices:', alleopPrices);

                    // Find the maximum number of products to create labels
                    const maxProducts = Math.max(
                        emagPrices.length,
                        fashionDaysPrices.length,
                        alleopPrices.length
                    );

                    const labels = [];
                    for (let i = 1; i <= maxProducts; i++) {
                        labels.push('Продукт ' + i);
                    }

                    // Pad arrays with null for missing products
                    while (emagPrices.length < maxProducts) emagPrices.push(null);
                    while (fashionDaysPrices.length < maxProducts) fashionDaysPrices.push(null);
                    while (alleopPrices.length < maxProducts) alleopPrices.push(null);

                    const chartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'eMAG (лв.)',
                                data: emagPrices,
                                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                                borderColor: 'rgba(59, 130, 246, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            },
                            {
                                label: 'Fashion Days (лв.)',
                                data: fashionDaysPrices,
                                backgroundColor: 'rgba(239, 68, 68, 0.8)',
                                borderColor: 'rgba(239, 68, 68, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            },
                            {
                                label: 'Alleop (лв.)',
                                data: alleopPrices,
                                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                                borderColor: 'rgba(34, 197, 94, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            }
                        ]
                    };

                    new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Сравнение на индивидуални продукти',
                                    font: {
                                        size: 16,
                                        weight: 'bold'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            if (context.parsed.y === null) {
                                                return context.dataset.label + ': Няма продукт';
                                            }
                                            return context.dataset.label + ': ' + context.parsed.y.toFixed(2) + ' лв.';
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Цена (лв.)'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return value.toFixed(2) + ' лв.';
                                        }
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Продукти (подредени по цена)'
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        ";
            } else {
                // line 291
                yield "            <div class=\"text-center py-5\">
                <i class=\"bi bi-exclamation-triangle display-1 text-warning mb-3\"></i>
                <h3>Няма намерени продукти</h3>
                <p class=\"text-muted\">Опитайте с различна търсачка или по-общи ключови думи</p>
            </div>
        ";
            }
            // line 297
            yield "    ";
        }
        // line 298
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
        return "review/compare_prices.html.twig";
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
        return array (  631 => 298,  628 => 297,  620 => 291,  492 => 166,  488 => 165,  484 => 164,  471 => 153,  465 => 149,  461 => 147,  447 => 146,  444 => 145,  427 => 144,  424 => 143,  422 => 142,  414 => 139,  409 => 136,  403 => 132,  399 => 130,  385 => 129,  382 => 128,  365 => 127,  362 => 126,  360 => 125,  352 => 122,  347 => 119,  341 => 115,  337 => 113,  323 => 112,  320 => 111,  303 => 110,  300 => 109,  298 => 108,  290 => 105,  280 => 98,  269 => 92,  262 => 88,  251 => 82,  244 => 78,  233 => 72,  217 => 59,  208 => 52,  206 => 51,  203 => 50,  200 => 49,  198 => 48,  185 => 38,  176 => 32,  158 => 16,  145 => 15,  129 => 10,  116 => 9,  102 => 6,  89 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Сравни цени между платформи{% endblock %}

{% block stylesheets %}
    {{ parent() }}
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <!-- Chart.js -->
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js\"></script>
{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <!-- Search Header -->
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-5 fw-bold text-center mb-3\">
                <i class=\"bi bi-graph-up-arrow text-primary\"></i> Сравнение на цени
            </h1>
            <p class=\"text-center text-muted mb-4\">
                Намерете най-добрата цена за вашия продукт между eMAG, Fashion Days и Alleop
            </p>
        </div>
    </div>

    <!-- Search Form -->
    <div class=\"row mb-5\">
        <div class=\"col-lg-8 mx-auto\">
            <form action=\"{{ path('app_compare_prices') }}\" method=\"get\">
                <div class=\"input-group input-group-lg shadow-sm\">
                    <input type=\"search\"
                           name=\"q\"
                           class=\"form-control\"
                           placeholder=\"Например: кафемашина, лаптоп, рокля...\"
                           value=\"{{ query }}\"
                           required>
                    <button class=\"btn btn-primary px-4\" type=\"submit\">
                        <i class=\"bi bi-search\"></i> Сравни цени
                    </button>
                </div>
            </form>
        </div>
    </div>

    {% if query %}
        {% set hasProducts = products.emag|length > 0 or products.fashiondays|length > 0 or products.alleop|length > 0 %}

        {% if hasProducts %}
            <!-- Price Chart -->
            <div class=\"row mb-5\">
                <div class=\"col-12\">
                    <div class=\"card shadow-sm\">
                        <div class=\"card-body p-4\">
                            <h3 class=\"card-title mb-4\">
                                <i class=\"bi bi-bar-chart-line text-primary\"></i>
                                Сравнение на цени за \"{{ query }}\"
                            </h3>
                            <canvas id=\"priceComparisonChart\" height=\"100\"></canvas>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Platform Tabs -->
            <div class=\"row\">
                <div class=\"col-12\">
                    <ul class=\"nav nav-pills nav-fill mb-4\" id=\"platformTabs\" role=\"tablist\">
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link {% if products.emag|length > 0 %}active{% endif %}\"
                                    id=\"emag-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#emag\"
                                    type=\"button\">
                                <i class=\"bi bi-laptop\"></i> eMAG
                                <span class=\"badge bg-primary\">{{ products.emag|length }}</span>
                            </button>
                        </li>
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link {% if products.emag|length == 0 and products.fashiondays|length > 0 %}active{% endif %}\"
                                    id=\"fashiondays-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#fashiondays\"
                                    type=\"button\">
                                <i class=\"bi bi-bag-heart\"></i> Fashion Days
                                <span class=\"badge bg-primary\">{{ products.fashiondays|length }}</span>
                            </button>
                        </li>
                        <li class=\"nav-item\" role=\"presentation\">
                            <button class=\"nav-link {% if products.emag|length == 0 and products.fashiondays|length == 0 and products.alleop|length > 0 %}active{% endif %}\"
                                    id=\"alleop-tab\"
                                    data-bs-toggle=\"tab\"
                                    data-bs-target=\"#alleop\"
                                    type=\"button\">
                                <i class=\"bi bi-basket\"></i> Alleop
                                <span class=\"badge bg-primary\">{{ products.alleop|length }}</span>
                            </button>
                        </li>
                    </ul>

                    <div class=\"tab-content\" id=\"platformTabContent\">
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
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в eMAG
                                </div>
                            {% endif %}
                        </div>

                        <!-- Fashion Days Tab -->
                        <div class=\"tab-pane fade {% if products.emag|length == 0 and products.fashiondays|length > 0 %}show active{% endif %}\"
                             id=\"fashiondays\"
                             role=\"tabpanel\">
                            {% if products.fashiondays|length > 0 %}
                                <div class=\"row g-3\">
                                    {% for product in products.fashiondays %}
                                        {% include 'review/_product_card_compare.html.twig' with {'product': product, 'platform': 'Fashion Days'} %}
                                    {% endfor %}
                                </div>
                            {% else %}
                                <div class=\"alert alert-info\">
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в Fashion Days
                                </div>
                            {% endif %}
                        </div>

                        <!-- Alleop Tab -->
                        <div class=\"tab-pane fade {% if products.emag|length == 0 and products.fashiondays|length == 0 and products.alleop|length > 0 %}show active{% endif %}\"
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
                                    <i class=\"bi bi-info-circle\"></i> Няма намерени продукти в Alleop
                                </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Chart.js Script -->
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const ctx = document.getElementById('priceComparisonChart');

                    // Prepare data for chart - SHOW ALL INDIVIDUAL PRODUCTS
                    const emagProducts = {{ products.emag|json_encode|raw }};
                    const fashionDaysProducts = {{ products.fashiondays|json_encode|raw }};
                    const alleopProducts = {{ products.alleop|json_encode|raw }};

                    console.log('eMAG Products:', emagProducts.length);
                    console.log('Fashion Days Products:', fashionDaysProducts.length);
                    console.log('Alleop Products:', alleopProducts.length);

                    // Extract all individual prices from each platform
                    const emagPrices = emagProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    const fashionDaysPrices = fashionDaysProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    const alleopPrices = alleopProducts
                        .filter(p => p && p.price && !isNaN(parseFloat(p.price)))
                        .map(p => parseFloat(p.price));

                    console.log('eMAG Prices:', emagPrices);
                    console.log('Fashion Days Prices:', fashionDaysPrices);
                    console.log('Alleop Prices:', alleopPrices);

                    // Find the maximum number of products to create labels
                    const maxProducts = Math.max(
                        emagPrices.length,
                        fashionDaysPrices.length,
                        alleopPrices.length
                    );

                    const labels = [];
                    for (let i = 1; i <= maxProducts; i++) {
                        labels.push('Продукт ' + i);
                    }

                    // Pad arrays with null for missing products
                    while (emagPrices.length < maxProducts) emagPrices.push(null);
                    while (fashionDaysPrices.length < maxProducts) fashionDaysPrices.push(null);
                    while (alleopPrices.length < maxProducts) alleopPrices.push(null);

                    const chartData = {
                        labels: labels,
                        datasets: [
                            {
                                label: 'eMAG (лв.)',
                                data: emagPrices,
                                backgroundColor: 'rgba(59, 130, 246, 0.8)',
                                borderColor: 'rgba(59, 130, 246, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            },
                            {
                                label: 'Fashion Days (лв.)',
                                data: fashionDaysPrices,
                                backgroundColor: 'rgba(239, 68, 68, 0.8)',
                                borderColor: 'rgba(239, 68, 68, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            },
                            {
                                label: 'Alleop (лв.)',
                                data: alleopPrices,
                                backgroundColor: 'rgba(34, 197, 94, 0.8)',
                                borderColor: 'rgba(34, 197, 94, 1)',
                                borderWidth: 2,
                                borderRadius: 8
                            }
                        ]
                    };

                    new Chart(ctx, {
                        type: 'bar',
                        data: chartData,
                        options: {
                            responsive: true,
                            maintainAspectRatio: true,
                            plugins: {
                                legend: {
                                    display: true,
                                    position: 'top',
                                },
                                title: {
                                    display: true,
                                    text: 'Сравнение на индивидуални продукти',
                                    font: {
                                        size: 16,
                                        weight: 'bold'
                                    }
                                },
                                tooltip: {
                                    callbacks: {
                                        label: function(context) {
                                            if (context.parsed.y === null) {
                                                return context.dataset.label + ': Няма продукт';
                                            }
                                            return context.dataset.label + ': ' + context.parsed.y.toFixed(2) + ' лв.';
                                        }
                                    }
                                }
                            },
                            scales: {
                                y: {
                                    beginAtZero: true,
                                    title: {
                                        display: true,
                                        text: 'Цена (лв.)'
                                    },
                                    ticks: {
                                        callback: function(value) {
                                            return value.toFixed(2) + ' лв.';
                                        }
                                    }
                                },
                                x: {
                                    title: {
                                        display: true,
                                        text: 'Продукти (подредени по цена)'
                                    }
                                }
                            }
                        }
                    });
                });
            </script>
        {% else %}
            <div class=\"text-center py-5\">
                <i class=\"bi bi-exclamation-triangle display-1 text-warning mb-3\"></i>
                <h3>Няма намерени продукти</h3>
                <p class=\"text-muted\">Опитайте с различна търсачка или по-общи ключови думи</p>
            </div>
        {% endif %}
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
", "review/compare_prices.html.twig", "/var/www/html/templates/review/compare_prices.html.twig");
    }
}
