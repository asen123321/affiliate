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

/* review/show.html.twig */
class __TwigTemplate_9a78b1dbe3c6ae058d990b07ec7af56e extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/show.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/show.html.twig"));

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

        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 3, $this->source); })()), "title", [], "any", false, false, false, 3), "html", null, true);
        yield " - Ревю и Сравнение";
        
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
    <style>
        /* HEADER STYLES */
        .product-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid #dee2e6;
        }
        .main-product-image {
            max-height: 400px; object-fit: contain; border-radius: 12px;
            background: white; padding: 1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .price-badge { font-size: 2rem; font-weight: 800; color: #0d6efd; }

        /* CHART & CARDS */
        .chart-container {
            background: white; border-radius: 15px; padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 3rem;
        }
        .similar-card {
            transition: transform 0.2s, box-shadow 0.2s; height: 100%; border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); position: relative;
        }
        .similar-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }

        /* CHECKBOX STYLES */
        .compare-checkbox-wrapper {
            position: absolute; top: 10px; right: 10px; z-index: 10;
        }
        .form-check-input.compare-checkbox {
            width: 1.5em; height: 1.5em; cursor: pointer; border: 2px solid #0d6efd;
        }

        /* STICKY COMPARE BAR */
        #compareBar {
            position: fixed; bottom: -100px; left: 0; width: 100%;
            background: white; box-shadow: 0 -5px 20px rgba(0,0,0,0.15);
            padding: 15px 0; z-index: 1050; transition: bottom 0.4s ease;
        }
        #compareBar.visible { bottom: 0; }
        .selected-thumb { width: 40px; height: 40px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; }

        /* COMPARISON TABLE */
        .table-compare th { width: 30%; background: #f8f9fa; vertical-align: middle; }
        .table-compare td { vertical-align: middle; text-align: center; }
        .pro-item { color: green; font-size: 0.9rem; }
        .con-item { color: #dc3545; font-size: 0.9rem; }
    </style>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 57
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

        // line 58
        yield "    ";
        yield from $this->yieldParentBlock("javascripts", $context, $blocks);
        yield "
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 62
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

        // line 63
        yield "
    ";
        // line 65
        yield "    <div class=\"product-header\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 text-center mb-4 mb-lg-0\">
                    ";
        // line 69
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 69, $this->source); })()), "imageUrl", [], "any", false, false, false, 69)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 70
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 70, $this->source); })()), "imageUrl", [], "any", false, false, false, 70), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 70, $this->source); })()), "title", [], "any", false, false, false, 70), "html", null, true);
            yield "\" class=\"img-fluid main-product-image\" fetchpriority=\"high\" loading=\"eager\" width=\"400\" height=\"400\" decoding=\"async\">
                    ";
        } else {
            // line 72
            yield "                        <div class=\"main-product-image d-flex align-items-center justify-content-center\" style=\"height: 300px;\">
                            <i class=\"bi bi-image text-muted\" style=\"font-size: 4rem;\"></i>
                        </div>
                    ";
        }
        // line 76
        yield "                </div>
                <div class=\"col-lg-7\">
                    <span class=\"badge bg-primary mb-2\">РЕВЮ</span>
                    ";
        // line 79
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 79, $this->source); })()), "badge", [], "any", false, false, false, 79)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 80
            yield "                        <span class=\"badge bg-danger mb-2\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 80, $this->source); })()), "badge", [], "any", false, false, false, 80), "html", null, true);
            yield "</span>
                    ";
        }
        // line 82
        yield "
                    <h1 class=\"display-5 fw-bold mb-3\">";
        // line 83
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 83, $this->source); })()), "title", [], "any", false, false, false, 83), "html", null, true);
        yield "</h1>

                    <div class=\"d-flex align-items-center mb-4\">
                        <div class=\"text-warning me-2\">
                            ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 88
            yield "                                ";
            if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 88, $this->source); })()), "rating", [], "any", false, false, false, 88))) {
                yield " <i class=\"bi bi-star-fill\"></i> ";
            } else {
                yield " <i class=\"bi bi-star\"></i> ";
            }
            // line 89
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 90
        yield "                        </div>
                        <span class=\"text-muted\">(";
        // line 91
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 91, $this->source); })()), "rating", [], "any", false, false, false, 91), "html", null, true);
        yield "/5 Оценка)</span>
                    </div>

                    <div class=\"mb-4\">
                        <span class=\"text-muted d-block mb-1\">Актуална цена:</span>
                        <div class=\"price-badge\">";
        // line 96
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 96, $this->source); })()), "price", [], "any", false, false, false, 96), 2, ".", " "), "html", null, true);
        yield " лв.</div>
                    </div>

                    <div class=\"d-grid gap-2 d-md-block\">
                        <a href=\"";
        // line 100
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 100, $this->source); })()), "id", [], "any", false, false, false, 100)]), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-primary btn-lg px-5\" aria-label=\"View offer for ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 100, $this->source); })()), "title", [], "any", false, false, false, 100), "html", null, true);
        yield "\">
                            <i class=\"bi bi-cart-check me-2\" aria-hidden=\"true\"></i> ВИЖ ОФЕРТАТА
                        </a>
                        ";
        // line 104
        yield "                        <a href=\"#similar-offers\" class=\"btn btn-outline-dark btn-lg px-4\" aria-label=\"View alternatives\">
                            <i class=\"bi bi-arrow-down-circle me-2\" aria-hidden=\"true\"></i> Виж алтернативи
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"container mb-5\">

        ";
        // line 116
        yield "        <div class=\"row mb-5\" id=\"comparison\">
            <div class=\"col-lg-8 mx-auto\">
                <div class=\"chart-container\">
                    <h3 class=\"text-center mb-4\">📊 Анализ на цената</h3>
                    <canvas id=\"priceChart\"></canvas>
                </div>
            </div>
        </div>

        ";
        // line 126
        yield "        <div class=\"row\" id=\"similar-offers\">
            <div class=\"col-12 mb-4 d-flex justify-content-between align-items-center border-bottom pb-3\">
                <h3 class=\"fw-bold m-0\">
                    <i class=\"bi bi-tags text-primary me-2\"></i> Най-добри алтернативи
                </h3>
                <div class=\"d-flex gap-2 align-items-center\">
                    ";
        // line 132
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 132, $this->source); })()), "category", [], "any", false, false, false, 132)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 133
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_compare_category", ["category" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 133, $this->source); })()), "category", [], "any", false, false, false, 133)]), "html", null, true);
            yield "\"
                           class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"bi bi-arrow-left-right\"></i> Сравни ";
            // line 135
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 135, $this->source); })()), "category", [], "any", false, false, false, 135), "html", null, true);
            yield " eMAG vs Alleop
                        </a>
                    ";
        }
        // line 138
        yield "                    <span class=\"text-muted small\"><i class=\"bi bi-info-circle\"></i> Избери продукти за сравнение</span>
                </div>
            </div>
        </div>

        <div class=\"row g-3\">
            ";
        // line 145
        yield "            ";
        $context["allProducts"] = Twig\Extension\CoreExtension::merge([["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 146
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 146, $this->source); })()), "title", [], "any", false, false, false, 146), "price" => CoreExtension::getAttribute($this->env, $this->source,         // line 147
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 147, $this->source); })()), "price", [], "any", false, false, false, 147), "image" => CoreExtension::getAttribute($this->env, $this->source,         // line 148
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 148, $this->source); })()), "imageUrl", [], "any", false, false, false, 148), "link" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source,         // line 149
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 149, $this->source); })()), "id", [], "any", false, false, false, 149)]), "platform" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 150
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 150, $this->source); })()), "badge", [], "any", false, false, false, 150)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 150, $this->source); })()), "badge", [], "any", false, false, false, 150)) : ("Main")), "badge_class" => "bg-primary"]],         // line 152
(isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 152, $this->source); })()));
        // line 153
        yield "
            ";
        // line 155
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 155, $this->source); })()));
        $context['_iterated'] = false;
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
            // line 156
            yield "                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"card h-100 similar-card\">

                        ";
            // line 160
            yield "                        <div class=\"compare-checkbox-wrapper\">
                            <input class=\"form-check-input compare-checkbox shadow-sm\"
                                   type=\"checkbox\"
                                   data-title=\"";
            // line 163
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 163), "html", null, true);
            yield "\"
                                   data-price=\"";
            // line 164
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 164), "html", null, true);
            yield "\"
                                   data-image=\"";
            // line 165
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 165), "html", null, true);
            yield "\"
                                   data-platform=\"";
            // line 166
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "platform", [], "any", false, false, false, 166), "html", null, true);
            yield "\"
                                   data-link=\"";
            // line 167
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 167), "html", null, true);
            yield "\"
                                   id=\"compare_";
            // line 168
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 168), "html", null, true);
            yield "\">
                        </div>

                        <div class=\"position-relative text-center p-3\" style=\"height: 200px; overflow: hidden; background: #fff;\">
                            <a href=\"";
            // line 172
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 172), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" aria-label=\"View ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 172), "html", null, true);
            yield "\">
                                <img src=\"";
            // line 173
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 173), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 173), "html", null, true);
            yield "\" class=\"img-fluid\" style=\"max-height: 100%; object-fit: contain;\" loading=\"lazy\" width=\"200\" height=\"200\" decoding=\"async\">
                            </a>
                            <span class=\"position-absolute top-0 start-0 badge ";
            // line 175
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "badge_class", [], "any", false, false, false, 175), "html", null, true);
            yield " m-2 shadow-sm\">
                                ";
            // line 176
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "platform", [], "any", false, false, false, 176), "html", null, true);
            yield "
                            </span>
                            ";
            // line 178
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", true, true, false, 178) && CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 178))) {
                // line 179
                yield "                                <span class=\"position-absolute top-0 end-0 badge bg-secondary m-2 shadow-sm\" style=\"font-size: 0.7rem;\">
                                    ";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 180), "html", null, true);
                yield "
                                </span>
                            ";
            }
            // line 183
            yield "                        </div>

                        <div class=\"card-body d-flex flex-column bg-light bg-opacity-10\">
                            <h6 class=\"card-title mb-2\" style=\"font-size: 0.95rem; line-height: 1.4;\">
                                <a href=\"";
            // line 187
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 187), "html", null, true);
            yield "\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                                    ";
            // line 188
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 188)) > 40)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 188), 0, 40) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 188), "html", null, true)));
            yield "
                                </a>
                            </h6>

                            <div class=\"mt-auto pt-3 border-top\">
                                <h5 class=\"text-primary fw-bold mb-2\">";
            // line 193
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 193), 2, ".", " "), "html", null, true);
            yield " лв.</h5>

                                <a href=\"";
            // line 195
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 195), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-outline-primary w-100 btn-sm rounded-pill\" aria-label=\"View offer for ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 195), "html", null, true);
            yield "\">
                                    Виж оферта <i class=\"bi bi-box-arrow-up-right ms-1\" aria-hidden=\"true\"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['revindex0'], $context['loop']['revindex'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        // line 202
        if (!$context['_iterated']) {
            // line 203
            yield "                <div class=\"col-12 text-center py-5\">
                    <div class=\"alert alert-secondary\">Няма намерени подобни продукти.</div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['product'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 207
        yield "        </div>
    </div>

    ";
        // line 211
        yield "    <div id=\"compareBar\">
        <div class=\"container\">
            <div class=\"d-flex align-items-center justify-content-between\">
                <div class=\"d-flex align-items-center gap-3\">
                    <span class=\"fw-bold text-dark\">Избрани за сравнение:</span>
                    <div id=\"compareThumbs\" class=\"d-flex gap-2\">
                    </div>
                </div>
                <div>
                    <button class=\"btn btn-danger btn-sm me-2\" onclick=\"clearComparison()\" aria-label=\"Clear comparison selection\">Изчисти</button>
                    <button class=\"btn btn-primary px-4\" onclick=\"openCompareModal()\" aria-label=\"Compare selected products\">
                        <i class=\"bi bi-columns-gap me-2\" aria-hidden=\"true\"></i> СРАВНИ СЕГА
                    </button>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 230
        yield "    <div class=\"modal fade\" id=\"compareModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-xl modal-dialog-centered\">
            <div class=\"modal-content\">
                <div class=\"modal-header bg-light\">
                    <h5 class=\"modal-title fw-bold\"><i class=\"bi bi-bar-chart-steps\"></i> Сравнение на продуктите</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body p-0\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-compare m-0\">
                            <tbody id=\"compareTableBody\">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=\"modal-footer bg-light\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Затвори</button>
                </div>
            </div>
        </div>
    </div>

    ";
        // line 253
        yield "    <script>
        // 1. Chart.js Логика
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('priceChart');
            const currentPrice = ";
        // line 257
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 257, $this->source); })()), "price", [], "any", false, false, false, 257), "html", null, true);
        yield ";
            const similarPrices = [
                ";
        // line 259
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 259, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 260
            yield "                ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "price", [], "any", false, false, false, 260), "html", null, true);
            yield ",
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        yield "            ];
            let avgPrice = currentPrice;
            if (similarPrices.length > 0) {
                const sum = similarPrices.reduce((a, b) => a + b, 0) + currentPrice;
                avgPrice = sum / (similarPrices.length + 1);
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ТОЗИ ПРОДУКТ', 'СРЕДНА ЦЕНА'],
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: [currentPrice, avgPrice],
                        backgroundColor: ['rgba(13, 110, 253, 0.7)', 'rgba(108, 117, 125, 0.5)'],
                        borderColor: ['rgb(13, 110, 253)', 'rgb(108, 117, 125)'],
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });

        // 2. Логика за Сравнението
        let selectedProducts = [];

        // Вкарваме текущия продукт автоматично като първа опция (невидим в масива, но може да се добави)
        const mainProduct = {
            title: \"";
        // line 295
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 295, $this->source); })()), "title", [], "any", false, false, false, 295), "js"), "html", null, true);
        yield "\",
            price: ";
        // line 296
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 296, $this->source); })()), "price", [], "any", false, false, false, 296), "html", null, true);
        yield ",
            image: \"";
        // line 297
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 297, $this->source); })()), "imageUrl", [], "any", false, false, false, 297), "html", null, true);
        yield "\",
            platform: \"";
        // line 298
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 298, $this->source); })()), "badge", [], "any", false, false, false, 298)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 298, $this->source); })()), "badge", [], "any", false, false, false, 298), "html", null, true)) : ("Ревю"));
        yield "\",
            link: \"";
        // line 299
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 299, $this->source); })()), "id", [], "any", false, false, false, 299)]), "html", null, true);
        yield "\"
        };

        const checkboxes = document.querySelectorAll('.compare-checkbox');
        const compareBar = document.getElementById('compareBar');
        const compareThumbs = document.getElementById('compareThumbs');
        const compareTableBody = document.getElementById('compareTableBody');
        const compareModal = new bootstrap.Modal(document.getElementById('compareModal'));

        checkboxes.forEach(box => {
            box.addEventListener('change', function() {
                const product = {
                    title: this.dataset.title,
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.image,
                    platform: this.dataset.platform,
                    link: this.dataset.link
                };

                if (this.checked) {
                    if (selectedProducts.length >= 3) {
                        alert(\"Можете да сравнявате максимум 3 допълнителни продукта!\");
                        this.checked = false;
                        return;
                    }
                    selectedProducts.push(product);
                } else {
                    selectedProducts = selectedProducts.filter(p => p.title !== product.title);
                }
                updateCompareUI();
            });
        });

        function updateCompareUI() {
            compareThumbs.innerHTML = '';

            if (selectedProducts.length > 0) {
                compareBar.classList.add('visible');
                selectedProducts.forEach(p => {
                    compareThumbs.innerHTML += `<img src=\"\${p.image}\" class=\"selected-thumb\" title=\"\${p.title}\">`;
                });
            } else {
                compareBar.classList.remove('visible');
            }
        }

        function clearComparison() {
            selectedProducts = [];
            checkboxes.forEach(box => box.checked = false);
            updateCompareUI();
        }

        function openCompareModal() {
            // Винаги добавяме и основния продукт за сравнение в началото
            const comparisonList = [mainProduct, ...selectedProducts];

            // Намираме най-ниската цена за highlight
            const minPrice = Math.min(...comparisonList.map(p => p.price));

            let html = '';

            // Ред 1: Снимки
            html += `<tr><th>Продукт</th>`;
            comparisonList.forEach(p => {
                html += `<td class=\"p-3\"><img src=\"\${p.image}\" style=\"height: 100px; object-fit: contain;\"></td>`;
            });
            html += `</tr>`;

            // Ред 2: Заглавия
            html += `<tr><th>Име</th>`;
            comparisonList.forEach(p => {
                html += `<td class=\"fw-bold\"><small>\${p.title}</small></td>`;
            });
            html += `</tr>`;

            // Ред 3: Цена
            html += `<tr><th>Цена</th>`;
            comparisonList.forEach(p => {
                const isCheapest = p.price === minPrice;
                const colorClass = isCheapest ? 'text-success fw-bold' : 'text-dark';
                const badge = isCheapest ? '<br><span class=\"badge bg-success mt-1\">НАЙ-ИЗГОДНО</span>' : '';
                html += `<td class=\"\${colorClass} fs-5\">\${p.price.toFixed(2)} лв.\${badge}</td>`;
            });
            html += `</tr>`;

            // Ред 4: Платформа
            html += `<tr><th>Магазин</th>`;
            comparisonList.forEach(p => {
                html += `<td><span class=\"badge bg-secondary\">\${p.platform}</span></td>`;
            });
            html += `</tr>`;

            // Ред 5: Плюсове (Автоматично генерирани)
            html += `<tr><th>Плюсове</th>`;
            comparisonList.forEach(p => {
                let pros = [];
                if (p.price === minPrice) pros.push('<i class=\"bi bi-check-circle-fill me-1\"></i> Най-ниска цена');
                if (p.platform === 'eMAG') pros.push('<i class=\"bi bi-truck me-1\"></i> Бърза доставка (обикновено)');
                if (p.platform === 'Fashion Days') pros.push('<i class=\"bi bi-arrow-return-left me-1\"></i> Лесно връщане');
                if (p.platform === 'Alleop') pros.push('<i class=\"bi bi-shield-check me-1\"></i> Директен вносител');

                if (pros.length === 0) pros.push('<i class=\"bi bi-star me-1\"></i> Добър избор');

                html += `<td><div class=\"d-flex flex-column gap-1 align-items-center pro-item\">\${pros.join('<br>')}</div></td>`;
            });
            html += `</tr>`;

            // Ред 6: Действие
            html += `<tr><th>Действие</th>`;
            comparisonList.forEach(p => {
                html += `<td><a href=\"\${p.link}\" target=\"_blank\" class=\"btn btn-primary btn-sm\">Купи</a></td>`;
            });
            html += `</tr>`;

            compareTableBody.innerHTML = html;
            compareModal.show();
        }
    </script>
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
        return "review/show.html.twig";
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
        return array (  632 => 299,  628 => 298,  624 => 297,  620 => 296,  616 => 295,  581 => 262,  572 => 260,  568 => 259,  563 => 257,  557 => 253,  533 => 230,  513 => 211,  508 => 207,  499 => 203,  497 => 202,  475 => 195,  470 => 193,  462 => 188,  458 => 187,  452 => 183,  446 => 180,  443 => 179,  441 => 178,  436 => 176,  432 => 175,  425 => 173,  419 => 172,  412 => 168,  408 => 167,  404 => 166,  400 => 165,  396 => 164,  392 => 163,  387 => 160,  382 => 156,  363 => 155,  360 => 153,  358 => 152,  357 => 150,  356 => 149,  355 => 148,  354 => 147,  353 => 146,  351 => 145,  343 => 138,  337 => 135,  331 => 133,  329 => 132,  321 => 126,  310 => 116,  297 => 104,  289 => 100,  282 => 96,  274 => 91,  271 => 90,  265 => 89,  258 => 88,  254 => 87,  247 => 83,  244 => 82,  238 => 80,  236 => 79,  231 => 76,  225 => 72,  217 => 70,  215 => 69,  209 => 65,  206 => 63,  193 => 62,  178 => 58,  165 => 57,  103 => 6,  90 => 5,  66 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ review.title }} - Ревю и Сравнение{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    <style>
        /* HEADER STYLES */
        .product-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            padding: 3rem 0;
            margin-bottom: 2rem;
            border-bottom: 1px solid #dee2e6;
        }
        .main-product-image {
            max-height: 400px; object-fit: contain; border-radius: 12px;
            background: white; padding: 1rem; box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        .price-badge { font-size: 2rem; font-weight: 800; color: #0d6efd; }

        /* CHART & CARDS */
        .chart-container {
            background: white; border-radius: 15px; padding: 1.5rem;
            box-shadow: 0 4px 6px rgba(0,0,0,0.05); margin-bottom: 3rem;
        }
        .similar-card {
            transition: transform 0.2s, box-shadow 0.2s; height: 100%; border: none;
            box-shadow: 0 2px 5px rgba(0,0,0,0.05); position: relative;
        }
        .similar-card:hover { transform: translateY(-5px); box-shadow: 0 10px 20px rgba(0,0,0,0.1); }

        /* CHECKBOX STYLES */
        .compare-checkbox-wrapper {
            position: absolute; top: 10px; right: 10px; z-index: 10;
        }
        .form-check-input.compare-checkbox {
            width: 1.5em; height: 1.5em; cursor: pointer; border: 2px solid #0d6efd;
        }

        /* STICKY COMPARE BAR */
        #compareBar {
            position: fixed; bottom: -100px; left: 0; width: 100%;
            background: white; box-shadow: 0 -5px 20px rgba(0,0,0,0.15);
            padding: 15px 0; z-index: 1050; transition: bottom 0.4s ease;
        }
        #compareBar.visible { bottom: 0; }
        .selected-thumb { width: 40px; height: 40px; object-fit: contain; border: 1px solid #ddd; border-radius: 4px; }

        /* COMPARISON TABLE */
        .table-compare th { width: 30%; background: #f8f9fa; vertical-align: middle; }
        .table-compare td { vertical-align: middle; text-align: center; }
        .pro-item { color: green; font-size: 0.9rem; }
        .con-item { color: #dc3545; font-size: 0.9rem; }
    </style>
{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\" defer></script>
{% endblock %}

{% block body %}

    {# --- 1. ГЛАВНА СЕКЦИЯ С ПРОДУКТА --- #}
    <div class=\"product-header\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 text-center mb-4 mb-lg-0\">
                    {% if review.imageUrl %}
                        <img src=\"{{ review.imageUrl }}\" alt=\"{{ review.title }}\" class=\"img-fluid main-product-image\" fetchpriority=\"high\" loading=\"eager\" width=\"400\" height=\"400\" decoding=\"async\">
                    {% else %}
                        <div class=\"main-product-image d-flex align-items-center justify-content-center\" style=\"height: 300px;\">
                            <i class=\"bi bi-image text-muted\" style=\"font-size: 4rem;\"></i>
                        </div>
                    {% endif %}
                </div>
                <div class=\"col-lg-7\">
                    <span class=\"badge bg-primary mb-2\">РЕВЮ</span>
                    {% if review.badge %}
                        <span class=\"badge bg-danger mb-2\">{{ review.badge }}</span>
                    {% endif %}

                    <h1 class=\"display-5 fw-bold mb-3\">{{ review.title }}</h1>

                    <div class=\"d-flex align-items-center mb-4\">
                        <div class=\"text-warning me-2\">
                            {% for i in 1..5 %}
                                {% if i <= review.rating %} <i class=\"bi bi-star-fill\"></i> {% else %} <i class=\"bi bi-star\"></i> {% endif %}
                            {% endfor %}
                        </div>
                        <span class=\"text-muted\">({{ review.rating }}/5 Оценка)</span>
                    </div>

                    <div class=\"mb-4\">
                        <span class=\"text-muted d-block mb-1\">Актуална цена:</span>
                        <div class=\"price-badge\">{{ review.price|number_format(2, '.', ' ') }} лв.</div>
                    </div>

                    <div class=\"d-grid gap-2 d-md-block\">
                        <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-primary btn-lg px-5\" aria-label=\"View offer for {{ review.title }}\">
                            <i class=\"bi bi-cart-check me-2\" aria-hidden=\"true\"></i> ВИЖ ОФЕРТАТА
                        </a>
                        {# Бутонът Сравни цени скролва надолу #}
                        <a href=\"#similar-offers\" class=\"btn btn-outline-dark btn-lg px-4\" aria-label=\"View alternatives\">
                            <i class=\"bi bi-arrow-down-circle me-2\" aria-hidden=\"true\"></i> Виж алтернативи
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"container mb-5\">

        {# --- 2. ГРАФИКА ЗА ЦЕНИТЕ (Chart.js) --- #}
        <div class=\"row mb-5\" id=\"comparison\">
            <div class=\"col-lg-8 mx-auto\">
                <div class=\"chart-container\">
                    <h3 class=\"text-center mb-4\">📊 Анализ на цената</h3>
                    <canvas id=\"priceChart\"></canvas>
                </div>
            </div>
        </div>

        {# --- 3. ПОДОБНИ ОФЕРТИ (С ЧЕКБОКСОВЕ) --- #}
        <div class=\"row\" id=\"similar-offers\">
            <div class=\"col-12 mb-4 d-flex justify-content-between align-items-center border-bottom pb-3\">
                <h3 class=\"fw-bold m-0\">
                    <i class=\"bi bi-tags text-primary me-2\"></i> Най-добри алтернативи
                </h3>
                <div class=\"d-flex gap-2 align-items-center\">
                    {% if review.category %}
                        <a href=\"{{ path('app_compare_category', {category: review.category}) }}\"
                           class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"bi bi-arrow-left-right\"></i> Сравни {{ review.category }} eMAG vs Alleop
                        </a>
                    {% endif %}
                    <span class=\"text-muted small\"><i class=\"bi bi-info-circle\"></i> Избери продукти за сравнение</span>
                </div>
            </div>
        </div>

        <div class=\"row g-3\">
            {# Добавяме и текущия продукт в списъка за сравнение, за да можеш да го сравниш с другите #}
            {% set allProducts = [{
                'title': review.title,
                'price': review.price,
                'image': review.imageUrl,
                'link': path('app_buy_redirect', {id: review.id}),
                'platform': review.badge ? review.badge : 'Main',
                'badge_class': 'bg-primary'
            }]|merge(similarProducts) %}

            {# Показваме само similarProducts в Grid-а, но ползваме logic за сравнение #}
            {% for product in similarProducts %}
                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"card h-100 similar-card\">

                        {# ЧЕКБОКС ЗА СРАВНЕНИЕ #}
                        <div class=\"compare-checkbox-wrapper\">
                            <input class=\"form-check-input compare-checkbox shadow-sm\"
                                   type=\"checkbox\"
                                   data-title=\"{{ product.title }}\"
                                   data-price=\"{{ product.price }}\"
                                   data-image=\"{{ product.image }}\"
                                   data-platform=\"{{ product.platform }}\"
                                   data-link=\"{{ product.link }}\"
                                   id=\"compare_{{ loop.index }}\">
                        </div>

                        <div class=\"position-relative text-center p-3\" style=\"height: 200px; overflow: hidden; background: #fff;\">
                            <a href=\"{{ product.link }}\" target=\"_blank\" rel=\"noopener noreferrer\" aria-label=\"View {{ product.title }}\">
                                <img src=\"{{ product.image }}\" alt=\"{{ product.title }}\" class=\"img-fluid\" style=\"max-height: 100%; object-fit: contain;\" loading=\"lazy\" width=\"200\" height=\"200\" decoding=\"async\">
                            </a>
                            <span class=\"position-absolute top-0 start-0 badge {{ product.badge_class }} m-2 shadow-sm\">
                                {{ product.platform }}
                            </span>
                            {% if product.category is defined and product.category %}
                                <span class=\"position-absolute top-0 end-0 badge bg-secondary m-2 shadow-sm\" style=\"font-size: 0.7rem;\">
                                    {{ product.category }}
                                </span>
                            {% endif %}
                        </div>

                        <div class=\"card-body d-flex flex-column bg-light bg-opacity-10\">
                            <h6 class=\"card-title mb-2\" style=\"font-size: 0.95rem; line-height: 1.4;\">
                                <a href=\"{{ product.link }}\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                                    {{ product.title|length > 40 ? product.title|slice(0, 40) ~ '...' : product.title }}
                                </a>
                            </h6>

                            <div class=\"mt-auto pt-3 border-top\">
                                <h5 class=\"text-primary fw-bold mb-2\">{{ product.price|number_format(2, '.', ' ') }} лв.</h5>

                                <a href=\"{{ product.link }}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-outline-primary w-100 btn-sm rounded-pill\" aria-label=\"View offer for {{ product.title }}\">
                                    Виж оферта <i class=\"bi bi-box-arrow-up-right ms-1\" aria-hidden=\"true\"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            {% else %}
                <div class=\"col-12 text-center py-5\">
                    <div class=\"alert alert-secondary\">Няма намерени подобни продукти.</div>
                </div>
            {% endfor %}
        </div>
    </div>

    {# --- 4. ПЛАВАЩА ЛЕНТА ЗА СРАВНЕНИЕ (Sticky Bottom Bar) --- #}
    <div id=\"compareBar\">
        <div class=\"container\">
            <div class=\"d-flex align-items-center justify-content-between\">
                <div class=\"d-flex align-items-center gap-3\">
                    <span class=\"fw-bold text-dark\">Избрани за сравнение:</span>
                    <div id=\"compareThumbs\" class=\"d-flex gap-2\">
                    </div>
                </div>
                <div>
                    <button class=\"btn btn-danger btn-sm me-2\" onclick=\"clearComparison()\" aria-label=\"Clear comparison selection\">Изчисти</button>
                    <button class=\"btn btn-primary px-4\" onclick=\"openCompareModal()\" aria-label=\"Compare selected products\">
                        <i class=\"bi bi-columns-gap me-2\" aria-hidden=\"true\"></i> СРАВНИ СЕГА
                    </button>
                </div>
            </div>
        </div>
    </div>

    {# --- 5. МОДАЛЕН ПРОЗОРЕЦ ЗА СРАВНЕНИЕ --- #}
    <div class=\"modal fade\" id=\"compareModal\" tabindex=\"-1\" aria-hidden=\"true\">
        <div class=\"modal-dialog modal-xl modal-dialog-centered\">
            <div class=\"modal-content\">
                <div class=\"modal-header bg-light\">
                    <h5 class=\"modal-title fw-bold\"><i class=\"bi bi-bar-chart-steps\"></i> Сравнение на продуктите</h5>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"modal\" aria-label=\"Close\"></button>
                </div>
                <div class=\"modal-body p-0\">
                    <div class=\"table-responsive\">
                        <table class=\"table table-bordered table-compare m-0\">
                            <tbody id=\"compareTableBody\">
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=\"modal-footer bg-light\">
                    <button type=\"button\" class=\"btn btn-secondary\" data-bs-dismiss=\"modal\">Затвори</button>
                </div>
            </div>
        </div>
    </div>

    {# --- СКРИПТОВЕ --- #}
    <script>
        // 1. Chart.js Логика
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('priceChart');
            const currentPrice = {{ review.price }};
            const similarPrices = [
                {% for p in similarProducts %}
                {{ p.price }},
                {% endfor %}
            ];
            let avgPrice = currentPrice;
            if (similarPrices.length > 0) {
                const sum = similarPrices.reduce((a, b) => a + b, 0) + currentPrice;
                avgPrice = sum / (similarPrices.length + 1);
            }

            new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ТОЗИ ПРОДУКТ', 'СРЕДНА ЦЕНА'],
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: [currentPrice, avgPrice],
                        backgroundColor: ['rgba(13, 110, 253, 0.7)', 'rgba(108, 117, 125, 0.5)'],
                        borderColor: ['rgb(13, 110, 253)', 'rgb(108, 117, 125)'],
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });
        });

        // 2. Логика за Сравнението
        let selectedProducts = [];

        // Вкарваме текущия продукт автоматично като първа опция (невидим в масива, но може да се добави)
        const mainProduct = {
            title: \"{{ review.title|e('js') }}\",
            price: {{ review.price }},
            image: \"{{ review.imageUrl }}\",
            platform: \"{{ review.badge ? review.badge : 'Ревю' }}\",
            link: \"{{ path('app_buy_redirect', {id: review.id}) }}\"
        };

        const checkboxes = document.querySelectorAll('.compare-checkbox');
        const compareBar = document.getElementById('compareBar');
        const compareThumbs = document.getElementById('compareThumbs');
        const compareTableBody = document.getElementById('compareTableBody');
        const compareModal = new bootstrap.Modal(document.getElementById('compareModal'));

        checkboxes.forEach(box => {
            box.addEventListener('change', function() {
                const product = {
                    title: this.dataset.title,
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.image,
                    platform: this.dataset.platform,
                    link: this.dataset.link
                };

                if (this.checked) {
                    if (selectedProducts.length >= 3) {
                        alert(\"Можете да сравнявате максимум 3 допълнителни продукта!\");
                        this.checked = false;
                        return;
                    }
                    selectedProducts.push(product);
                } else {
                    selectedProducts = selectedProducts.filter(p => p.title !== product.title);
                }
                updateCompareUI();
            });
        });

        function updateCompareUI() {
            compareThumbs.innerHTML = '';

            if (selectedProducts.length > 0) {
                compareBar.classList.add('visible');
                selectedProducts.forEach(p => {
                    compareThumbs.innerHTML += `<img src=\"\${p.image}\" class=\"selected-thumb\" title=\"\${p.title}\">`;
                });
            } else {
                compareBar.classList.remove('visible');
            }
        }

        function clearComparison() {
            selectedProducts = [];
            checkboxes.forEach(box => box.checked = false);
            updateCompareUI();
        }

        function openCompareModal() {
            // Винаги добавяме и основния продукт за сравнение в началото
            const comparisonList = [mainProduct, ...selectedProducts];

            // Намираме най-ниската цена за highlight
            const minPrice = Math.min(...comparisonList.map(p => p.price));

            let html = '';

            // Ред 1: Снимки
            html += `<tr><th>Продукт</th>`;
            comparisonList.forEach(p => {
                html += `<td class=\"p-3\"><img src=\"\${p.image}\" style=\"height: 100px; object-fit: contain;\"></td>`;
            });
            html += `</tr>`;

            // Ред 2: Заглавия
            html += `<tr><th>Име</th>`;
            comparisonList.forEach(p => {
                html += `<td class=\"fw-bold\"><small>\${p.title}</small></td>`;
            });
            html += `</tr>`;

            // Ред 3: Цена
            html += `<tr><th>Цена</th>`;
            comparisonList.forEach(p => {
                const isCheapest = p.price === minPrice;
                const colorClass = isCheapest ? 'text-success fw-bold' : 'text-dark';
                const badge = isCheapest ? '<br><span class=\"badge bg-success mt-1\">НАЙ-ИЗГОДНО</span>' : '';
                html += `<td class=\"\${colorClass} fs-5\">\${p.price.toFixed(2)} лв.\${badge}</td>`;
            });
            html += `</tr>`;

            // Ред 4: Платформа
            html += `<tr><th>Магазин</th>`;
            comparisonList.forEach(p => {
                html += `<td><span class=\"badge bg-secondary\">\${p.platform}</span></td>`;
            });
            html += `</tr>`;

            // Ред 5: Плюсове (Автоматично генерирани)
            html += `<tr><th>Плюсове</th>`;
            comparisonList.forEach(p => {
                let pros = [];
                if (p.price === minPrice) pros.push('<i class=\"bi bi-check-circle-fill me-1\"></i> Най-ниска цена');
                if (p.platform === 'eMAG') pros.push('<i class=\"bi bi-truck me-1\"></i> Бърза доставка (обикновено)');
                if (p.platform === 'Fashion Days') pros.push('<i class=\"bi bi-arrow-return-left me-1\"></i> Лесно връщане');
                if (p.platform === 'Alleop') pros.push('<i class=\"bi bi-shield-check me-1\"></i> Директен вносител');

                if (pros.length === 0) pros.push('<i class=\"bi bi-star me-1\"></i> Добър избор');

                html += `<td><div class=\"d-flex flex-column gap-1 align-items-center pro-item\">\${pros.join('<br>')}</div></td>`;
            });
            html += `</tr>`;

            // Ред 6: Действие
            html += `<tr><th>Действие</th>`;
            comparisonList.forEach(p => {
                html += `<td><a href=\"\${p.link}\" target=\"_blank\" class=\"btn btn-primary btn-sm\">Купи</a></td>`;
            });
            html += `</tr>`;

            compareTableBody.innerHTML = html;
            compareModal.show();
        }
    </script>
{% endblock %}
", "review/show.html.twig", "/var/www/html/templates/review/show.html.twig");
    }
}
