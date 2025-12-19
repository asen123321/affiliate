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
        yield " - Детайли";
        
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
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
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
        yield "    <div class=\"container py-5\">

        <nav aria-label=\"breadcrumb\" class=\"mb-4\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"";
        // line 15
        yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
        yield "\">Начало</a></li>
                <li class=\"breadcrumb-item active\">";
        // line 16
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 16, $this->source); })()), "title", [], "any", false, false, false, 16), 0, 30), "html", null, true);
        yield "...</li>
            </ol>
        </nav>

        <div class=\"row g-4\">
            <div class=\"col-lg-5\">
                <div class=\"card border-0 shadow-sm h-100\">
                    <div class=\"card-body p-4\">
                        <span class=\"badge bg-primary mb-2\">";
        // line 24
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["review"] ?? null), "badge", [], "any", true, true, false, 24) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 24, $this->source); })()), "badge", [], "any", false, false, false, 24)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 24, $this->source); })()), "badge", [], "any", false, false, false, 24), "html", null, true)) : ("ОФЕРТА"));
        yield "</span>
                        <h1 class=\"h4 fw-bold mb-3\">";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 25, $this->source); })()), "title", [], "any", false, false, false, 25), "html", null, true);
        yield "</h1>

                        ";
        // line 27
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 27, $this->source); })()), "imageUrl", [], "any", false, false, false, 27)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 28
            yield "                            <div class=\"text-center my-4 p-3 bg-white border rounded\">
                                <a href=\"";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 29, $this->source); })()), "id", [], "any", false, false, false, 29)]), "html", null, true);
            yield "\" target=\"_blank\" rel=\"nofollow noreferrer\" title=\"Виж в магазина\">
                                    <img src=\"";
            // line 30
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 30, $this->source); })()), "imageUrl", [], "any", false, false, false, 30), "html", null, true);
            yield "\" class=\"img-fluid hover-zoom\" style=\"max-height: 300px;\" alt=\"";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 30, $this->source); })()), "title", [], "any", false, false, false, 30), "html", null, true);
            yield "\">
                                </a>
                            </div>
                        ";
        }
        // line 34
        yield "
                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <span class=\"h2 text-primary fw-bold mb-0\">";
        // line 36
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 36, $this->source); })()), "price", [], "any", false, false, false, 36), 2, ".", " "), "html", null, true);
        yield " лв.</span>
                            <a href=\"";
        // line 37
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 37, $this->source); })()), "id", [], "any", false, false, false, 37)]), "html", null, true);
        yield "\" target=\"_blank\" class=\"btn btn-primary px-4 py-2\">
                                <i class=\"bi bi-cart-check\"></i> ВИЖ В МАГАЗИНА
                            </a>
                        </div>

                        <hr>
                        <div class=\"text-muted small\">
                            ";
        // line 44
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 44, $this->source); })()), "content", [], "any", false, false, false, 44)), 0, 300), "html", null, true);
        yield "...
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"col-lg-7\">
                <div class=\"card border-0 shadow-sm\" style=\"min-height: 600px; background: #f8f9fa;\">
                    <div class=\"card-header bg-white border-0 py-3\">
                        <h5 class=\"fw-bold m-0\"><i class=\"bi bi-speedometer2 text-primary\"></i> Център за сравнение</h5>
                    </div>
                    <div class=\"card-body p-4 d-flex flex-column\" id=\"chart-container\">

                        <div style=\"height: 250px; width: 100%;\">
                            <canvas id=\"priceComparisonChart\"></canvas>
                        </div>

                        <div id=\"comparison-analysis\" class=\"mt-4 flex-grow-1\">
                            <div class=\"alert alert-secondary text-center py-5\">
                                <i class=\"bi bi-arrow-down-up fs-1 mb-3\"></i>
                                <h5>Избери продукт за сравнение</h5>
                                <p class=\"mb-0\">Кликни бутона <strong>\"Сравни с този\"</strong> на продуктите по-долу, за да видиш прилики, разлики и анализ на цената.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class=\"mt-5 pt-4 border-top\">
            <h3 class=\"fw-bold mb-4\">Подобни оферти</h3>
            <div class=\"row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4\">

                ";
        // line 79
        yield "                ";
        $context["allSimilar"] = [];
        // line 80
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 80, $this->source); })()), "emag", [], "any", false, false, false, 80));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            $context["allSimilar"] = Twig\Extension\CoreExtension::merge((isset($context["allSimilar"]) || array_key_exists("allSimilar", $context) ? $context["allSimilar"] : (function () { throw new RuntimeError('Variable "allSimilar" does not exist.', 80, $this->source); })()), [["p" => $context["p"], "source" => "eMAG", "color" => "primary"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 81
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 81, $this->source); })()), "fashiondays", [], "any", false, false, false, 81));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            $context["allSimilar"] = Twig\Extension\CoreExtension::merge((isset($context["allSimilar"]) || array_key_exists("allSimilar", $context) ? $context["allSimilar"] : (function () { throw new RuntimeError('Variable "allSimilar" does not exist.', 81, $this->source); })()), [["p" => $context["p"], "source" => "Fashion Days", "color" => "dark"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 82
        yield "                ";
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, (isset($context["similarProducts"]) || array_key_exists("similarProducts", $context) ? $context["similarProducts"] : (function () { throw new RuntimeError('Variable "similarProducts" does not exist.', 82, $this->source); })()), "alleop", [], "any", false, false, false, 82));
        foreach ($context['_seq'] as $context["_key"] => $context["p"]) {
            $context["allSimilar"] = Twig\Extension\CoreExtension::merge((isset($context["allSimilar"]) || array_key_exists("allSimilar", $context) ? $context["allSimilar"] : (function () { throw new RuntimeError('Variable "allSimilar" does not exist.', 82, $this->source); })()), [["p" => $context["p"], "source" => "Alleop", "color" => "success"]]);
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['p'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 83
        yield "
                ";
        // line 84
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["allSimilar"]) || array_key_exists("allSimilar", $context) ? $context["allSimilar"] : (function () { throw new RuntimeError('Variable "allSimilar" does not exist.', 84, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 85
            yield "                    ";
            $context["product"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "p", [], "any", false, false, false, 85);
            // line 86
            yield "                    ";
            if ((CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 86, $this->source); })()), "price", [], "any", false, false, false, 86) > 0)) {
                // line 87
                yield "                        <div class=\"col\">
                            <div class=\"card h-100 shadow-sm border-0\">
                                <div class=\"card-body p-3 d-flex flex-column\">
                                    <div class=\"text-center mb-3\" style=\"height: 120px;\">
                                        <a href=\"";
                // line 91
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 91, $this->source); })()), "id", [], "any", false, false, false, 91)]), "html", null, true);
                yield "\" target=\"_blank\" rel=\"nofollow noreferrer\" class=\"d-block h-100\">
                                            <img src=\"";
                // line 92
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 92, $this->source); })()), "imageUrl", [], "any", false, false, false, 92), "html", null, true);
                yield "\" style=\"height: 100%; object-fit: contain;\" class=\"hover-zoom\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 92, $this->source); })()), "title", [], "any", false, false, false, 92), "html", null, true);
                yield "\">
                                        </a>
                                    </div>
                                    <h6 class=\"card-title text-truncate mb-2\">
                                        <a href=\"";
                // line 96
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 96, $this->source); })()), "id", [], "any", false, false, false, 96)]), "html", null, true);
                yield "\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                                            ";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 97, $this->source); })()), "title", [], "any", false, false, false, 97), "html", null, true);
                yield "
                                        </a>
                                    </h6>
                                    <div class=\"fw-bold text-";
                // line 100
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "color", [], "any", false, false, false, 100), "html", null, true);
                yield " mb-3\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 100, $this->source); })()), "price", [], "any", false, false, false, 100), "html", null, true);
                yield " лв.</div>

                                    <div class=\"mt-auto\">
                                        <button type=\"button\"
                                                class=\"btn btn-outline-";
                // line 104
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "color", [], "any", false, false, false, 104), "html", null, true);
                yield " w-100 js-compare-btn\"
                                                data-title=\"";
                // line 105
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 105, $this->source); })()), "title", [], "any", false, false, false, 105), "html", null, true);
                yield "\"
                                                data-price=\"";
                // line 106
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 106, $this->source); })()), "price", [], "any", false, false, false, 106), "html", null, true);
                yield "\"
                                                data-source=\"";
                // line 107
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "source", [], "any", false, false, false, 107), "html", null, true);
                yield "\"
                                                data-url=\"";
                // line 108
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 108, $this->source); })()), "id", [], "any", false, false, false, 108)]), "html", null, true);
                yield "\">
                                            <i class=\"bi bi-bar-chart\"></i> Сравни с този
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    ";
            }
            // line 116
            yield "                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 117
        yield "            </div>
        </div>
    </div>

    <script>
        let myChart = null;
        // Безопасно кодиране на данните за JS
        const mainTitle = ";
        // line 124
        yield json_encode(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 124, $this->source); })()), "title", [], "any", false, false, false, 124));
        yield ";
        const mainPrice = ";
        // line 125
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 125, $this->source); })()), "price", [], "any", false, false, false, 125), "html", null, true);
        yield ";
        const mainSource = \"";
        // line 126
        yield (((CoreExtension::getAttribute($this->env, $this->source, ($context["review"] ?? null), "badge", [], "any", true, true, false, 126) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 126, $this->source); })()), "badge", [], "any", false, false, false, 126)))) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["review"]) || array_key_exists("review", $context) ? $context["review"] : (function () { throw new RuntimeError('Variable "review" does not exist.', 126, $this->source); })()), "badge", [], "any", false, false, false, 126), "html", null, true)) : ("ТОЗИ САЙТ"));
        yield "\";

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('priceComparisonChart').getContext('2d');

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ТОЗИ ПРОДУКТ', 'СРАВНЕН С...'],
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: [mainPrice, 0],
                        backgroundColor: ['#0d6efd', '#e9ecef'],
                        borderRadius: 8,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Слушаме за кликове
            document.querySelectorAll('.js-compare-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    updateComparison(
                        this.getAttribute('data-title'),
                        parseFloat(this.getAttribute('data-price')),
                        this.getAttribute('data-source'),
                        this.getAttribute('data-url')
                    );
                });
            });
        });

        function updateComparison(compareTitle, comparePrice, source, url) {
            // 1. Обновяваме Графиката
            myChart.data.datasets[0].data[1] = comparePrice;

            let color = '#6c757d';
            if(source === 'eMAG') color = '#0d6efd';
            if(source === 'Alleop') color = '#198754';
            if(source === 'Fashion Days') color = '#212529';

            myChart.data.datasets[0].backgroundColor[1] = color;
            myChart.update();

            // 2. Генерираме АНАЛИЗ (Текст)
            const diff = mainPrice - comparePrice;
            const diffAbs = Math.abs(diff).toFixed(2);

            let analysisHtml = `
            <div class=\"card border-0 bg-white p-3 shadow-sm animation-fade-in\">
                <h6 class=\"border-bottom pb-2 fw-bold text-uppercase text-muted small\">Резултат от сравнението</h6>

                <div class=\"row g-3 mt-1\">
                    <div class=\"col-6\">
                        <div class=\"p-2 bg-light rounded\">
                            <small class=\"d-block text-muted\">По какво си ПРИЛИЧАТ:</small>
                            <ul class=\"mb-0 ps-3 small\">
                                <li>Основна категория</li>
                                <li>Сходна функционалност</li>
                                <li>Популярни модели</li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-6\">
                        <div class=\"p-2 bg-light rounded\">
                            <small class=\"d-block text-muted\">По какво се РАЗЛИЧАВАТ:</small>
                            <ul class=\"mb-0 ps-3 small\">
                                <li>Търговец: <strong>\${source}</strong></li>
                                <li>Цена (разлика: \${diffAbs} лв.)</li>
                                <li>Наличност и доставка</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class=\"mt-3 p-3 rounded \${diff > 0 ? 'bg-success-subtle text-success-emphasis' : 'bg-primary-subtle text-primary-emphasis'}\">
                    <h5 class=\"fw-bold mb-1\"><i class=\"bi bi-lightbulb\"></i> ЗАЩО ДА ИЗБЕРЕШ \${diff > 0 ? 'СРАВНЕНИЯ' : 'ТОЗИ'} ПРОДУКТ?</h5>
                    <p class=\"mb-0\">
                        \${diff > 0
                ? `Избирайки офертата от <strong>\${source}</strong>, ти <strong>СПЕСТЯВАШ \${diffAbs} лв.</strong> спрямо текущата цена!`
                : `Въпреки че е по-скъп с \${diffAbs} лв., <strong>\${source}</strong> може да предлага по-бърза доставка или удължена гаранция.`
            }
                    </p>
                </div>

                <div class=\"mt-3 text-end\">
                    <a href=\"\${url}\" target=\"_blank\" class=\"btn btn-sm btn-\${diff > 0 ? 'success' : 'outline-primary'}\">
                        Виж офертата на \${source} <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>
        `;

            document.getElementById('comparison-analysis').innerHTML = analysisHtml;

            // Скрол до сравнението
            document.getElementById('chart-container').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    </script>

    <style>
        .animation-fade-in { animation: fadeIn 0.5s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .hover-zoom {
            transition: transform 0.3s ease;
        }
        .hover-zoom:hover {
            transform: scale(1.05);
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
        return array (  367 => 126,  363 => 125,  359 => 124,  350 => 117,  344 => 116,  333 => 108,  329 => 107,  325 => 106,  321 => 105,  317 => 104,  308 => 100,  302 => 97,  298 => 96,  289 => 92,  285 => 91,  279 => 87,  276 => 86,  273 => 85,  269 => 84,  266 => 83,  256 => 82,  246 => 81,  236 => 80,  233 => 79,  196 => 44,  186 => 37,  182 => 36,  178 => 34,  169 => 30,  165 => 29,  162 => 28,  160 => 27,  155 => 25,  151 => 24,  140 => 16,  136 => 15,  130 => 11,  117 => 10,  102 => 6,  89 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}{{ review.title }} - Детайли{% endblock %}

{% block javascripts %}
    {{ parent() }}
    <script src=\"https://cdn.jsdelivr.net/npm/chart.js\"></script>
{% endblock %}

{% block body %}
    <div class=\"container py-5\">

        <nav aria-label=\"breadcrumb\" class=\"mb-4\">
            <ol class=\"breadcrumb\">
                <li class=\"breadcrumb-item\"><a href=\"{{ path('app_home') }}\">Начало</a></li>
                <li class=\"breadcrumb-item active\">{{ review.title|slice(0, 30) }}...</li>
            </ol>
        </nav>

        <div class=\"row g-4\">
            <div class=\"col-lg-5\">
                <div class=\"card border-0 shadow-sm h-100\">
                    <div class=\"card-body p-4\">
                        <span class=\"badge bg-primary mb-2\">{{ review.badge ?? 'ОФЕРТА' }}</span>
                        <h1 class=\"h4 fw-bold mb-3\">{{ review.title }}</h1>

                        {% if review.imageUrl %}
                            <div class=\"text-center my-4 p-3 bg-white border rounded\">
                                <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\" target=\"_blank\" rel=\"nofollow noreferrer\" title=\"Виж в магазина\">
                                    <img src=\"{{ review.imageUrl }}\" class=\"img-fluid hover-zoom\" style=\"max-height: 300px;\" alt=\"{{ review.title }}\">
                                </a>
                            </div>
                        {% endif %}

                        <div class=\"d-flex justify-content-between align-items-center mb-4\">
                            <span class=\"h2 text-primary fw-bold mb-0\">{{ review.price|number_format(2, '.', ' ') }} лв.</span>
                            <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\" target=\"_blank\" class=\"btn btn-primary px-4 py-2\">
                                <i class=\"bi bi-cart-check\"></i> ВИЖ В МАГАЗИНА
                            </a>
                        </div>

                        <hr>
                        <div class=\"text-muted small\">
                            {{ review.content|striptags|slice(0, 300) }}...
                        </div>
                    </div>
                </div>
            </div>

            <div class=\"col-lg-7\">
                <div class=\"card border-0 shadow-sm\" style=\"min-height: 600px; background: #f8f9fa;\">
                    <div class=\"card-header bg-white border-0 py-3\">
                        <h5 class=\"fw-bold m-0\"><i class=\"bi bi-speedometer2 text-primary\"></i> Център за сравнение</h5>
                    </div>
                    <div class=\"card-body p-4 d-flex flex-column\" id=\"chart-container\">

                        <div style=\"height: 250px; width: 100%;\">
                            <canvas id=\"priceComparisonChart\"></canvas>
                        </div>

                        <div id=\"comparison-analysis\" class=\"mt-4 flex-grow-1\">
                            <div class=\"alert alert-secondary text-center py-5\">
                                <i class=\"bi bi-arrow-down-up fs-1 mb-3\"></i>
                                <h5>Избери продукт за сравнение</h5>
                                <p class=\"mb-0\">Кликни бутона <strong>\"Сравни с този\"</strong> на продуктите по-долу, за да видиш прилики, разлики и анализ на цената.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class=\"mt-5 pt-4 border-top\">
            <h3 class=\"fw-bold mb-4\">Подобни оферти</h3>
            <div class=\"row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4\">

                {# Събираме всички продукти #}
                {% set allSimilar = [] %}
                {% for p in similarProducts.emag %}{% set allSimilar = allSimilar|merge([{'p': p, 'source': 'eMAG', 'color': 'primary'}]) %}{% endfor %}
                {% for p in similarProducts.fashiondays %}{% set allSimilar = allSimilar|merge([{'p': p, 'source': 'Fashion Days', 'color': 'dark'}]) %}{% endfor %}
                {% for p in similarProducts.alleop %}{% set allSimilar = allSimilar|merge([{'p': p, 'source': 'Alleop', 'color': 'success'}]) %}{% endfor %}

                {% for item in allSimilar %}
                    {% set product = item.p %}
                    {% if product.price > 0 %}
                        <div class=\"col\">
                            <div class=\"card h-100 shadow-sm border-0\">
                                <div class=\"card-body p-3 d-flex flex-column\">
                                    <div class=\"text-center mb-3\" style=\"height: 120px;\">
                                        <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\" target=\"_blank\" rel=\"nofollow noreferrer\" class=\"d-block h-100\">
                                            <img src=\"{{ product.imageUrl }}\" style=\"height: 100%; object-fit: contain;\" class=\"hover-zoom\" alt=\"{{ product.title }}\">
                                        </a>
                                    </div>
                                    <h6 class=\"card-title text-truncate mb-2\">
                                        <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                                            {{ product.title }}
                                        </a>
                                    </h6>
                                    <div class=\"fw-bold text-{{ item.color }} mb-3\">{{ product.price }} лв.</div>

                                    <div class=\"mt-auto\">
                                        <button type=\"button\"
                                                class=\"btn btn-outline-{{ item.color }} w-100 js-compare-btn\"
                                                data-title=\"{{ product.title }}\"
                                                data-price=\"{{ product.price }}\"
                                                data-source=\"{{ item.source }}\"
                                                data-url=\"{{ path('app_buy_redirect', {id: product.id}) }}\">
                                            <i class=\"bi bi-bar-chart\"></i> Сравни с този
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {% endif %}
                {% endfor %}
            </div>
        </div>
    </div>

    <script>
        let myChart = null;
        // Безопасно кодиране на данните за JS
        const mainTitle = {{ review.title|json_encode|raw }};
        const mainPrice = {{ review.price }};
        const mainSource = \"{{ review.badge ?? 'ТОЗИ САЙТ' }}\";

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('priceComparisonChart').getContext('2d');

            myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['ТОЗИ ПРОДУКТ', 'СРАВНЕН С...'],
                    datasets: [{
                        label: 'Цена (лв.)',
                        data: [mainPrice, 0],
                        backgroundColor: ['#0d6efd', '#e9ecef'],
                        borderRadius: 8,
                        barPercentage: 0.6
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: { legend: { display: false } },
                    scales: { y: { beginAtZero: true } }
                }
            });

            // Слушаме за кликове
            document.querySelectorAll('.js-compare-btn').forEach(btn => {
                btn.addEventListener('click', function() {
                    updateComparison(
                        this.getAttribute('data-title'),
                        parseFloat(this.getAttribute('data-price')),
                        this.getAttribute('data-source'),
                        this.getAttribute('data-url')
                    );
                });
            });
        });

        function updateComparison(compareTitle, comparePrice, source, url) {
            // 1. Обновяваме Графиката
            myChart.data.datasets[0].data[1] = comparePrice;

            let color = '#6c757d';
            if(source === 'eMAG') color = '#0d6efd';
            if(source === 'Alleop') color = '#198754';
            if(source === 'Fashion Days') color = '#212529';

            myChart.data.datasets[0].backgroundColor[1] = color;
            myChart.update();

            // 2. Генерираме АНАЛИЗ (Текст)
            const diff = mainPrice - comparePrice;
            const diffAbs = Math.abs(diff).toFixed(2);

            let analysisHtml = `
            <div class=\"card border-0 bg-white p-3 shadow-sm animation-fade-in\">
                <h6 class=\"border-bottom pb-2 fw-bold text-uppercase text-muted small\">Резултат от сравнението</h6>

                <div class=\"row g-3 mt-1\">
                    <div class=\"col-6\">
                        <div class=\"p-2 bg-light rounded\">
                            <small class=\"d-block text-muted\">По какво си ПРИЛИЧАТ:</small>
                            <ul class=\"mb-0 ps-3 small\">
                                <li>Основна категория</li>
                                <li>Сходна функционалност</li>
                                <li>Популярни модели</li>
                            </ul>
                        </div>
                    </div>
                    <div class=\"col-6\">
                        <div class=\"p-2 bg-light rounded\">
                            <small class=\"d-block text-muted\">По какво се РАЗЛИЧАВАТ:</small>
                            <ul class=\"mb-0 ps-3 small\">
                                <li>Търговец: <strong>\${source}</strong></li>
                                <li>Цена (разлика: \${diffAbs} лв.)</li>
                                <li>Наличност и доставка</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class=\"mt-3 p-3 rounded \${diff > 0 ? 'bg-success-subtle text-success-emphasis' : 'bg-primary-subtle text-primary-emphasis'}\">
                    <h5 class=\"fw-bold mb-1\"><i class=\"bi bi-lightbulb\"></i> ЗАЩО ДА ИЗБЕРЕШ \${diff > 0 ? 'СРАВНЕНИЯ' : 'ТОЗИ'} ПРОДУКТ?</h5>
                    <p class=\"mb-0\">
                        \${diff > 0
                ? `Избирайки офертата от <strong>\${source}</strong>, ти <strong>СПЕСТЯВАШ \${diffAbs} лв.</strong> спрямо текущата цена!`
                : `Въпреки че е по-скъп с \${diffAbs} лв., <strong>\${source}</strong> може да предлага по-бърза доставка или удължена гаранция.`
            }
                    </p>
                </div>

                <div class=\"mt-3 text-end\">
                    <a href=\"\${url}\" target=\"_blank\" class=\"btn btn-sm btn-\${diff > 0 ? 'success' : 'outline-primary'}\">
                        Виж офертата на \${source} <i class=\"bi bi-arrow-right\"></i>
                    </a>
                </div>
            </div>
        `;

            document.getElementById('comparison-analysis').innerHTML = analysisHtml;

            // Скрол до сравнението
            document.getElementById('chart-container').scrollIntoView({ behavior: 'smooth', block: 'center' });
        }
    </script>

    <style>
        .animation-fade-in { animation: fadeIn 0.5s; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(10px); } to { opacity: 1; transform: translateY(0); } }

        .hover-zoom {
            transition: transform 0.3s ease;
        }
        .hover-zoom:hover {
            transform: scale(1.05);
        }
    </style>
{% endblock %}
", "review/show.html.twig", "/var/www/html/templates/review/show.html.twig");
    }
}
