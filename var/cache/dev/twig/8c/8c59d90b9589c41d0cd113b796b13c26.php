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
    ";
        // line 60
        yield "    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\" defer></script>
";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 64
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

        // line 65
        yield "
    ";
        // line 67
        yield "    <div class=\"product-header\">
        <div class=\"container\">
            <div class=\"row align-items-center\">
                <div class=\"col-lg-5 text-center mb-4 mb-lg-0\">
                    ";
        // line 71
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 71, $this->source); })()), "imageUrl", [], "any", false, false, false, 71)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 72
            yield "                        <img src=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 72, $this->source); })()), "imageUrl", [], "any", false, false, false, 72), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 72, $this->source); })()), "title", [], "any", false, false, false, 72), "html", null, true);
            yield "\" class=\"img-fluid main-product-image\" fetchpriority=\"high\" loading=\"eager\" width=\"400\" height=\"400\" decoding=\"async\">
                    ";
        } else {
            // line 74
            yield "                        <div class=\"main-product-image d-flex align-items-center justify-content-center\" style=\"height: 300px;\">
                            <i class=\"bi bi-image text-muted\" style=\"font-size: 4rem;\"></i>
                        </div>
                    ";
        }
        // line 78
        yield "                </div>
                <div class=\"col-lg-7\">
                    <span class=\"badge bg-primary mb-2\">РЕВЮ</span>
                    ";
        // line 81
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 81, $this->source); })()), "badge", [], "any", false, false, false, 81)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 82
            yield "                        <span class=\"badge bg-danger mb-2\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 82, $this->source); })()), "badge", [], "any", false, false, false, 82), "html", null, true);
            yield "</span>
                    ";
        }
        // line 84
        yield "
                    <h1 class=\"display-5 fw-bold mb-3\">";
        // line 85
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 85, $this->source); })()), "title", [], "any", false, false, false, 85), "html", null, true);
        yield "</h1>

                    <div class=\"d-flex align-items-center mb-4\">
                        <div class=\"text-warning me-2\">
                            ";
        // line 89
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 90
            yield "                                ";
            if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 90, $this->source); })()), "rating", [], "any", false, false, false, 90))) {
                yield " <i class=\"bi bi-star-fill\"></i> ";
            } else {
                yield " <i class=\"bi bi-star\"></i> ";
            }
            // line 91
            yield "                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 92
        yield "                        </div>
                        <span class=\"text-muted\">(";
        // line 93
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 93, $this->source); })()), "rating", [], "any", false, false, false, 93), "html", null, true);
        yield "/5 Оценка)</span>
                    </div>

                    <div class=\"mb-4\">
                        <span class=\"text-muted d-block mb-1\">Актуална цена:</span>
                        <div class=\"price-badge\">";
        // line 98
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 98, $this->source); })()), "price", [], "any", false, false, false, 98), 2, ".", " "), "html", null, true);
        yield " лв.</div>
                    </div>

                    <div class=\"d-grid gap-2 d-md-block\">
                        <a href=\"";
        // line 102
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 102, $this->source); })()), "id", [], "any", false, false, false, 102)]), "html", null, true);
        yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-primary btn-lg px-5\" aria-label=\"View offer for ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 102, $this->source); })()), "title", [], "any", false, false, false, 102), "html", null, true);
        yield "\">
                            <i class=\"bi bi-cart-check me-2\" aria-hidden=\"true\"></i> ВИЖ ОФЕРТАТА
                        </a>
                        ";
        // line 106
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
        // line 118
        yield "        <div class=\"row mb-5\" id=\"comparison\">
            <div class=\"col-lg-8 mx-auto\">
                <div class=\"chart-container\">
                    <h3 class=\"text-center mb-4\">📊 Анализ на цената</h3>
                    <canvas id=\"priceChart\"></canvas>
                </div>
            </div>
        </div>

        ";
        // line 128
        yield "        <div id=\"comparisonTableContainer\" class=\"d-none mt-5\">
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

        ";
        // line 148
        yield "        <div class=\"row\" id=\"similar-offers\">
            <div class=\"col-12 mb-4 d-flex justify-content-between align-items-center border-bottom pb-3\">
                <h3 class=\"fw-bold m-0\">
                    <i class=\"bi bi-tags text-primary me-2\"></i> Най-добри алтернативи
                </h3>
                <div class=\"d-flex gap-2 align-items-center flex-wrap\">

                    ";
        // line 156
        yield "                    ";
        $context["compCategory"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 156, $this->source); })()), "category", [], "any", false, false, false, 156);
        // line 157
        yield "
                    ";
        // line 159
        yield "                    ";
        if ((($tmp =  !(isset($context["compCategory"]) || array_key_exists("compCategory", $context) ? $context["compCategory"] : (function () { throw new RuntimeError('Variable "compCategory" does not exist.', 159, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 160
            yield "                        ";
            $context["lowerTitle"] = Twig\Extension\CoreExtension::lower($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 160, $this->source); })()), "title", [], "any", false, false, false, 160));
            // line 161
            yield "                        ";
            if ((CoreExtension::inFilter("tv", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 161, $this->source); })())) || CoreExtension::inFilter("телевизор", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 161, $this->source); })())))) {
                // line 162
                yield "                            ";
                $context["compCategory"] = "tv";
                // line 163
                yield "                        ";
            } elseif (((CoreExtension::inFilter("phone", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 163, $this->source); })())) || CoreExtension::inFilter("телефон", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 163, $this->source); })()))) || CoreExtension::inFilter("gsm", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 163, $this->source); })())))) {
                // line 164
                yield "                            ";
                $context["compCategory"] = "phone";
                // line 165
                yield "                        ";
            } elseif ((CoreExtension::inFilter("laptop", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 165, $this->source); })())) || CoreExtension::inFilter("лаптоп", (isset($context["lowerTitle"]) || array_key_exists("lowerTitle", $context) ? $context["lowerTitle"] : (function () { throw new RuntimeError('Variable "lowerTitle" does not exist.', 165, $this->source); })())))) {
                // line 166
                yield "                            ";
                $context["compCategory"] = "laptop";
                // line 167
                yield "                        ";
            }
            // line 168
            yield "                    ";
        }
        // line 169
        yield "
                    ";
        // line 171
        yield "                    ";
        if ((($tmp = (isset($context["compCategory"]) || array_key_exists("compCategory", $context) ? $context["compCategory"] : (function () { throw new RuntimeError('Variable "compCategory" does not exist.', 171, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 172
            yield "                        <a href=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_compare_category", ["category" => (isset($context["compCategory"]) || array_key_exists("compCategory", $context) ? $context["compCategory"] : (function () { throw new RuntimeError('Variable "compCategory" does not exist.', 172, $this->source); })())]), "html", null, true);
            yield "\"
                           class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"bi bi-arrow-left-right\"></i> Сравни ";
            // line 174
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["compCategory"]) || array_key_exists("compCategory", $context) ? $context["compCategory"] : (function () { throw new RuntimeError('Variable "compCategory" does not exist.', 174, $this->source); })()), "html", null, true);
            yield " eMAG vs Alleop
                        </a>
                    ";
        }
        // line 177
        yield "
                    <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success btn-sm\" style=\"display: none;\">
                        <i class=\"bi bi-check2-square\"></i> Сравни избраните
                    </button>
                    <span class=\"text-muted small\"><i class=\"bi bi-info-circle\"></i> Избери продукти за сравнение</span>
                </div>
            </div>
        </div>

        <div class=\"row g-3\">
            ";
        // line 188
        yield "            ";
        $context["allProducts"] = Twig\Extension\CoreExtension::merge([["title" => CoreExtension::getAttribute($this->env, $this->source,         // line 189
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 189, $this->source); })()), "title", [], "any", false, false, false, 189), "price" => CoreExtension::getAttribute($this->env, $this->source,         // line 190
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 190, $this->source); })()), "price", [], "any", false, false, false, 190), "image" => CoreExtension::getAttribute($this->env, $this->source,         // line 191
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 191, $this->source); })()), "imageUrl", [], "any", false, false, false, 191), "link" => $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source,         // line 192
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 192, $this->source); })()), "id", [], "any", false, false, false, 192)]), "platform" => (((($tmp = CoreExtension::getAttribute($this->env, $this->source,         // line 193
(isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 193, $this->source); })()), "badge", [], "any", false, false, false, 193)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 193, $this->source); })()), "badge", [], "any", false, false, false, 193)) : ("Main")), "badge_class" => "bg-primary"]],         // line 195
(isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 195, $this->source); })()));
        // line 196
        yield "
            ";
        // line 198
        yield "            ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 198, $this->source); })()));
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
            // line 199
            yield "                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"card h-100 similar-card\">

                        ";
            // line 203
            yield "                        <div class=\"compare-checkbox-wrapper\">
                            <input class=\"form-check-input compare-checkbox shadow-sm\"
                                   type=\"checkbox\"
                                   data-name=\"";
            // line 206
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 206), "html", null, true);
            yield "\"
                                   data-price=\"";
            // line 207
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 207), "html", null, true);
            yield "\"
                                   data-img=\"";
            // line 208
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 208), "html", null, true);
            yield "\"
                                   data-platform=\"";
            // line 209
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "platform", [], "any", false, false, false, 209), "html", null, true);
            yield "\"

                                ";
            // line 212
            yield "                                   data-description=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 212), "html", null, true);
            yield " ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "description", [], "any", true, true, false, 212)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "description", [], "any", false, false, false, 212), "")) : (""))), "html", null, true);
            yield "\"

                                   data-screen=\"\"
                                   data-resolution=\"\"
                                   data-type=\"\"
                                   data-smart=\"\"
                                   data-link=\"";
            // line 218
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 218), "html", null, true);
            yield "\"

                                ";
            // line 221
            yield "                                   data-summary=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 221), "html", null, true);
            yield "\"

                                   id=\"compare_";
            // line 223
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 223), "html", null, true);
            yield "\">
                        </div>

                        <div class=\"position-relative text-center p-3\" style=\"height: 200px; overflow: hidden; background: #fff;\">
                            <a href=\"";
            // line 227
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 227), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" aria-label=\"View ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 227), "html", null, true);
            yield "\">
                                <img src=\"";
            // line 228
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 228), "html", null, true);
            yield "\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 228), "html", null, true);
            yield "\" class=\"img-fluid\" style=\"max-height: 100%; object-fit: contain;\" loading=\"lazy\" width=\"200\" height=\"200\" decoding=\"async\">
                            </a>
                            <span class=\"position-absolute top-0 start-0 badge ";
            // line 230
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "badge_class", [], "any", false, false, false, 230), "html", null, true);
            yield " m-2 shadow-sm\">
                                ";
            // line 231
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "platform", [], "any", false, false, false, 231), "html", null, true);
            yield "
                            </span>
                            ";
            // line 233
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", true, true, false, 233) && CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 233))) {
                // line 234
                yield "                                <span class=\"position-absolute top-0 end-0 badge bg-secondary m-2 shadow-sm\" style=\"font-size: 0.7rem;\">
                                    ";
                // line 235
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 235), "html", null, true);
                yield "
                                </span>
                            ";
            }
            // line 238
            yield "                        </div>

                        <div class=\"card-body d-flex flex-column bg-light bg-opacity-10\">
                            <h6 class=\"card-title mb-2\" style=\"font-size: 0.95rem; line-height: 1.4;\">
                                <a href=\"";
            // line 242
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 242), "html", null, true);
            yield "\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                                    ";
            // line 243
            yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 243)) > 40)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 243), 0, 40) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 243), "html", null, true)));
            yield "
                                </a>
                            </h6>

                            <div class=\"mt-auto pt-3 border-top\">
                                <h5 class=\"text-primary fw-bold mb-2\">";
            // line 248
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 248), 2, ".", " "), "html", null, true);
            yield " лв.</h5>

                                <a href=\"";
            // line 250
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 250), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"btn btn-outline-primary w-100 btn-sm rounded-pill\" aria-label=\"View offer for ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 250), "html", null, true);
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
        // line 257
        if (!$context['_iterated']) {
            // line 258
            yield "                <div class=\"col-12 text-center py-5\">
                    <div class=\"alert alert-secondary\">Няма намерени подобни продукти.</div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['product'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 262
        yield "        </div>
    </div>

    ";
        // line 266
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
        // line 285
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
        // line 308
        yield "    <script>
        // 1. Chart.js Логика - HYBRID MODE (Default + Comparison)
        let priceChart = null;
        const ctx = document.getElementById('priceChart');
        const currentPrice = ";
        // line 312
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 312, $this->source); })()), "price", [], "any", false, false, false, 312), "html", null, true);
        yield ";
        const similarPrices = [
            ";
        // line 314
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 314, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            // line 315
            yield "            ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["p"], "price", [], "any", false, false, false, 315), "html", null, true);
            yield ",
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 317
        yield "        ];

        // Calculate average price for default mode
        let avgPrice = currentPrice;
        if (similarPrices.length > 0) {
            const sum = similarPrices.reduce((a, b) => a + b, 0) + currentPrice;
            avgPrice = sum / (similarPrices.length + 1);
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

        // Function to update chart based on selected products
        function updateChart() {
            // Get all checked checkboxes
            const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');

            let labels = [];
            let dataPoints = [];
            let backgroundColors = [];

            if (checkedBoxes.length > 0) {
                // --- PRODUCT COMPARISON MODE ---
                checkedBoxes.forEach(box => {
                    // Extract data from checkbox
                    const productName = box.dataset.title;
                    const productPrice = parseFloat(box.dataset.price);
                    const platform = box.dataset.platform;

                    // Shorten product name if too long
                    const shortName = productName.length > 25 ? productName.slice(0, 25) + '...' : productName;
                    labels.push(shortName);
                    dataPoints.push(productPrice);

                    // Assign color based on platform
                    if (platform === 'eMAG') {
                        backgroundColors.push('rgba(255, 99, 132, 0.7)'); // eMAG Red
                    } else if (platform === 'Alleop') {
                        backgroundColors.push('rgba(75, 192, 192, 0.7)'); // Alleop Green/Blue
                    } else if (platform === 'Fashion Days') {
                        backgroundColors.push('rgba(255, 159, 64, 0.7)'); // Fashion Days Orange
                    } else {
                        backgroundColors.push('rgba(153, 102, 255, 0.7)'); // Other Purple
                    }
                });
            } else {
                // --- DEFAULT PLATFORM MODE ---
                // Show \"THIS PRODUCT\" vs \"AVERAGE PRICE\"
                labels = ['ТОЗИ ПРОДУКТ', 'СРЕДНА ЦЕНА'];
                dataPoints = [currentPrice, avgPrice];
                backgroundColors = ['rgba(13, 110, 253, 0.7)', 'rgba(108, 117, 125, 0.5)'];
            }

            // Destroy existing chart if it exists
            if (priceChart) {
                priceChart.destroy();
            }

            // Create new chart
            priceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: dataPoints,
                        backgroundColor: backgroundColors,
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: checkedBoxes.length > 0 ? 'Сравнение на избрани продукти' : 'Анализ на цената'
                        }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Initialize chart on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateChart();
            updateComparisonTable();
            updateCompareButton();
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
            const chartSection = document.getElementById('comparison');
            if (chartSection) {
                chartSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Update chart and table after scroll
                setTimeout(function() {
                    updateChart();
                    updateComparisonTable();
                }, 300);
            }
        });

        // 2. Логика за Сравнението
        let selectedProducts = [];

        // Вкарваме текущия продукт автоматично като първа опция (невидим в масива, но може да се добави)
        const mainProduct = {
            title: \"";
        // line 562
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 562, $this->source); })()), "title", [], "any", false, false, false, 562), "js"), "html", null, true);
        yield "\",
            price: ";
        // line 563
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 563, $this->source); })()), "price", [], "any", false, false, false, 563), "html", null, true);
        yield ",
            image: \"";
        // line 564
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 564, $this->source); })()), "imageUrl", [], "any", false, false, false, 564), "html", null, true);
        yield "\",
            platform: \"";
        // line 565
        yield (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 565, $this->source); })()), "badge", [], "any", false, false, false, 565)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 565, $this->source); })()), "badge", [], "any", false, false, false, 565), "html", null, true)) : ("Ревю"));
        yield "\",
            link: \"";
        // line 566
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 566, $this->source); })()), "id", [], "any", false, false, false, 566)]), "html", null, true);
        yield "\",
            // ВАЖНО: Добавяме описанието и тук, за да не е N/A в таблицата за главния продукт
            description: \"";
        // line 568
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 568, $this->source); })()), "title", [], "any", false, false, false, 568), "js"), "html", null, true);
        yield " ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::striptags(((CoreExtension::getAttribute($this->env, $this->source, ($context["review"] ?? null), "description", [], "any", true, true, false, 568)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 568, $this->source); })()), "description", [], "any", false, false, false, 568), "")) : (""))), "js"), "html", null, true);
        yield "\",
            summary: \"";
        // line 569
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 569, $this->source); })()), "title", [], "any", false, false, false, 569), "js"), "html", null, true);
        yield "\"
        };

        const checkboxes = document.querySelectorAll('.compare-checkbox');
        const compareBar = document.getElementById('compareBar');
        const compareThumbs = document.getElementById('compareThumbs');
        const compareTableBody = document.getElementById('compareTableBody');
        // ВАЖНО: Не създаваме инстанцията веднага, за да избегнем грешки, ако Bootstrap не е заредил още
        let compareModalInstance = null;

        checkboxes.forEach(box => {
            box.addEventListener('change', function() {
                const product = {
                    // ТУК БЕШЕ ГРЕШКАТА: Трябва да съвпадат с data-* атрибутите в HTML
                    title: this.dataset.name,  // беше this.dataset.title
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.img,   // беше this.dataset.image
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
                    // Филтрираме по заглавие (name), защото това ползваме горе
                    selectedProducts = selectedProducts.filter(p => p.title !== product.title);
                }
                updateCompareUI();
                updateChart();
                updateComparisonTable();
                updateCompareButton();
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
            updateChart(); // Reset chart to default mode
            updateComparisonTable(); // Hide comparison table
            updateCompareButton(); // Hide button
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

            // --- БЕЗОПАСНО ОТВАРЯНЕ НА МОДАЛА ---
            const compareTableBody = document.getElementById('compareTableBody');
            compareTableBody.innerHTML = html;

            const modalElement = document.getElementById('compareModal');
            if (!compareModalInstance) {
                // Инициализираме го само когато потребителят кликне, за да сме сигурни, че Bootstrap е заредил
                if (typeof bootstrap !== 'undefined') {
                    compareModalInstance = new bootstrap.Modal(modalElement);
                } else {
                    console.error('Bootstrap JS не е заредил! Проверете интернет връзката или CDN линковете.');
                    return;
                }
            }
            compareModalInstance.show();
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
        return array (  944 => 569,  938 => 568,  933 => 566,  929 => 565,  925 => 564,  921 => 563,  917 => 562,  670 => 317,  661 => 315,  657 => 314,  652 => 312,  646 => 308,  622 => 285,  602 => 266,  597 => 262,  588 => 258,  586 => 257,  564 => 250,  559 => 248,  551 => 243,  547 => 242,  541 => 238,  535 => 235,  532 => 234,  530 => 233,  525 => 231,  521 => 230,  514 => 228,  508 => 227,  501 => 223,  495 => 221,  490 => 218,  478 => 212,  473 => 209,  469 => 208,  465 => 207,  461 => 206,  456 => 203,  451 => 199,  432 => 198,  429 => 196,  427 => 195,  426 => 193,  425 => 192,  424 => 191,  423 => 190,  422 => 189,  420 => 188,  408 => 177,  402 => 174,  396 => 172,  393 => 171,  390 => 169,  387 => 168,  384 => 167,  381 => 166,  378 => 165,  375 => 164,  372 => 163,  369 => 162,  366 => 161,  363 => 160,  360 => 159,  357 => 157,  354 => 156,  345 => 148,  324 => 128,  313 => 118,  300 => 106,  292 => 102,  285 => 98,  277 => 93,  274 => 92,  268 => 91,  261 => 90,  257 => 89,  250 => 85,  247 => 84,  241 => 82,  239 => 81,  234 => 78,  228 => 74,  220 => 72,  218 => 71,  212 => 67,  209 => 65,  196 => 64,  183 => 60,  178 => 58,  165 => 57,  103 => 6,  90 => 5,  66 => 3,  43 => 1,);
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
    {# ВАЖНО: Добавяме Bootstrap Bundle за да работят модалите #}
    <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js\"></script>
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

        {# --- 2.5 DETAILED COMPARISON TABLE --- #}
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

        {# --- 3. ПОДОБНИ ОФЕРТИ (С ЧЕКБОКСОВЕ) --- #}
        <div class=\"row\" id=\"similar-offers\">
            <div class=\"col-12 mb-4 d-flex justify-content-between align-items-center border-bottom pb-3\">
                <h3 class=\"fw-bold m-0\">
                    <i class=\"bi bi-tags text-primary me-2\"></i> Най-добри алтернативи
                </h3>
                <div class=\"d-flex gap-2 align-items-center flex-wrap\">

                    {# --- ЛОГИКА ЗА ПОЗНАВАНЕ НА КАТЕГОРИЯТА (Fix за eMAG) --- #}
                    {% set compCategory = review.category %}

                    {# Ако категорията е празна, проверяваме заглавието #}
                    {% if not compCategory %}
                        {% set lowerTitle = review.title|lower %}
                        {% if 'tv' in lowerTitle or 'телевизор' in lowerTitle %}
                            {% set compCategory = 'tv' %}
                        {% elseif 'phone' in lowerTitle or 'телефон' in lowerTitle or 'gsm' in lowerTitle %}
                            {% set compCategory = 'phone' %}
                        {% elseif 'laptop' in lowerTitle or 'лаптоп' in lowerTitle %}
                            {% set compCategory = 'laptop' %}
                        {% endif %}
                    {% endif %}

                    {# Показваме бутона само ако сме намерили категория #}
                    {% if compCategory %}
                        <a href=\"{{ path('app_compare_category', {category: compCategory}) }}\"
                           class=\"btn btn-outline-primary btn-sm\">
                            <i class=\"bi bi-arrow-left-right\"></i> Сравни {{ compCategory }} eMAG vs Alleop
                        </a>
                    {% endif %}

                    <button id=\"compareSelectedBtn\" class=\"btn btn-outline-success btn-sm\" style=\"display: none;\">
                        <i class=\"bi bi-check2-square\"></i> Сравни избраните
                    </button>
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
                                   data-name=\"{{ product.title }}\"
                                   data-price=\"{{ product.price }}\"
                                   data-img=\"{{ product.image }}\"
                                   data-platform=\"{{ product.platform }}\"

                                {# ВАЖНО: Слепваме Заглавие + Описание за по-добро разпознаване на характеристиките #}
                                   data-description=\"{{ product.title }} {{ product.description|default('')|striptags }}\"

                                   data-screen=\"\"
                                   data-resolution=\"\"
                                   data-type=\"\"
                                   data-smart=\"\"
                                   data-link=\"{{ product.link }}\"

                                {# Ако няма кратко описание, ползваме заглавието #}
                                   data-summary=\"{{ product.title }}\"

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
        // 1. Chart.js Логика - HYBRID MODE (Default + Comparison)
        let priceChart = null;
        const ctx = document.getElementById('priceChart');
        const currentPrice = {{ review.price }};
        const similarPrices = [
            {% for p in similarProducts %}
            {{ p.price }},
            {% endfor %}
        ];

        // Calculate average price for default mode
        let avgPrice = currentPrice;
        if (similarPrices.length > 0) {
            const sum = similarPrices.reduce((a, b) => a + b, 0) + currentPrice;
            avgPrice = sum / (similarPrices.length + 1);
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

        // Function to update chart based on selected products
        function updateChart() {
            // Get all checked checkboxes
            const checkedBoxes = document.querySelectorAll('.compare-checkbox:checked');

            let labels = [];
            let dataPoints = [];
            let backgroundColors = [];

            if (checkedBoxes.length > 0) {
                // --- PRODUCT COMPARISON MODE ---
                checkedBoxes.forEach(box => {
                    // Extract data from checkbox
                    const productName = box.dataset.title;
                    const productPrice = parseFloat(box.dataset.price);
                    const platform = box.dataset.platform;

                    // Shorten product name if too long
                    const shortName = productName.length > 25 ? productName.slice(0, 25) + '...' : productName;
                    labels.push(shortName);
                    dataPoints.push(productPrice);

                    // Assign color based on platform
                    if (platform === 'eMAG') {
                        backgroundColors.push('rgba(255, 99, 132, 0.7)'); // eMAG Red
                    } else if (platform === 'Alleop') {
                        backgroundColors.push('rgba(75, 192, 192, 0.7)'); // Alleop Green/Blue
                    } else if (platform === 'Fashion Days') {
                        backgroundColors.push('rgba(255, 159, 64, 0.7)'); // Fashion Days Orange
                    } else {
                        backgroundColors.push('rgba(153, 102, 255, 0.7)'); // Other Purple
                    }
                });
            } else {
                // --- DEFAULT PLATFORM MODE ---
                // Show \"THIS PRODUCT\" vs \"AVERAGE PRICE\"
                labels = ['ТОЗИ ПРОДУКТ', 'СРЕДНА ЦЕНА'];
                dataPoints = [currentPrice, avgPrice];
                backgroundColors = ['rgba(13, 110, 253, 0.7)', 'rgba(108, 117, 125, 0.5)'];
            }

            // Destroy existing chart if it exists
            if (priceChart) {
                priceChart.destroy();
            }

            // Create new chart
            priceChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: dataPoints,
                        backgroundColor: backgroundColors,
                        borderWidth: 1,
                        borderRadius: 5
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: { display: false },
                        title: {
                            display: true,
                            text: checkedBoxes.length > 0 ? 'Сравнение на избрани продукти' : 'Анализ на цената'
                        }
                    },
                    scales: { y: { beginAtZero: true } }
                }
            });
        }

        // Initialize chart on page load
        document.addEventListener('DOMContentLoaded', function() {
            updateChart();
            updateComparisonTable();
            updateCompareButton();
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
            const chartSection = document.getElementById('comparison');
            if (chartSection) {
                chartSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                // Update chart and table after scroll
                setTimeout(function() {
                    updateChart();
                    updateComparisonTable();
                }, 300);
            }
        });

        // 2. Логика за Сравнението
        let selectedProducts = [];

        // Вкарваме текущия продукт автоматично като първа опция (невидим в масива, но може да се добави)
        const mainProduct = {
            title: \"{{ review.title|e('js') }}\",
            price: {{ review.price }},
            image: \"{{ review.imageUrl }}\",
            platform: \"{{ review.badge ? review.badge : 'Ревю' }}\",
            link: \"{{ path('app_buy_redirect', {id: review.id}) }}\",
            // ВАЖНО: Добавяме описанието и тук, за да не е N/A в таблицата за главния продукт
            description: \"{{ review.title|e('js') }} {{ review.description|default('')|striptags|e('js') }}\",
            summary: \"{{ review.title|e('js') }}\"
        };

        const checkboxes = document.querySelectorAll('.compare-checkbox');
        const compareBar = document.getElementById('compareBar');
        const compareThumbs = document.getElementById('compareThumbs');
        const compareTableBody = document.getElementById('compareTableBody');
        // ВАЖНО: Не създаваме инстанцията веднага, за да избегнем грешки, ако Bootstrap не е заредил още
        let compareModalInstance = null;

        checkboxes.forEach(box => {
            box.addEventListener('change', function() {
                const product = {
                    // ТУК БЕШЕ ГРЕШКАТА: Трябва да съвпадат с data-* атрибутите в HTML
                    title: this.dataset.name,  // беше this.dataset.title
                    price: parseFloat(this.dataset.price),
                    image: this.dataset.img,   // беше this.dataset.image
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
                    // Филтрираме по заглавие (name), защото това ползваме горе
                    selectedProducts = selectedProducts.filter(p => p.title !== product.title);
                }
                updateCompareUI();
                updateChart();
                updateComparisonTable();
                updateCompareButton();
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
            updateChart(); // Reset chart to default mode
            updateComparisonTable(); // Hide comparison table
            updateCompareButton(); // Hide button
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

            // --- БЕЗОПАСНО ОТВАРЯНЕ НА МОДАЛА ---
            const compareTableBody = document.getElementById('compareTableBody');
            compareTableBody.innerHTML = html;

            const modalElement = document.getElementById('compareModal');
            if (!compareModalInstance) {
                // Инициализираме го само когато потребителят кликне, за да сме сигурни, че Bootstrap е заредил
                if (typeof bootstrap !== 'undefined') {
                    compareModalInstance = new bootstrap.Modal(modalElement);
                } else {
                    console.error('Bootstrap JS не е заредил! Проверете интернет връзката или CDN линковете.');
                    return;
                }
            }
            compareModalInstance.show();
        }
    </script>
{% endblock %}
", "review/show.html.twig", "/var/www/html/templates/review/show.html.twig");
    }
}
