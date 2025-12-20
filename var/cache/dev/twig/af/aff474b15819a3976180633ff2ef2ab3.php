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

/* review/recommendations.html.twig */
class __TwigTemplate_da8d0da4ea1a52b425cf0f693c27e477 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/recommendations.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/recommendations.html.twig"));

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

        yield "Препоръки базирани на разгледаните продукти";
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 5
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

        // line 6
        yield "<div class=\"container py-5\">
    <!-- Header -->
    <div class=\"row mb-5\">
        <div class=\"col-12 text-center\">
            <h1 class=\"display-5 fw-bold mb-3\">
                <i class=\"bi bi-stars text-warning\"></i>
                Вашите персонализирани препоръки
            </h1>
            <p class=\"lead text-muted\">
                Базирано на вашите разгледани категории и интереси
            </p>
        </div>
    </div>

    ";
        // line 20
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["viewedCategories"]) || array_key_exists("viewedCategories", $context) ? $context["viewedCategories"] : (function () { throw new RuntimeError('Variable "viewedCategories" does not exist.', 20, $this->source); })())) > 0)) {
            // line 21
            yield "        <!-- Viewed Categories Section -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow-sm\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-clock-history text-primary\"></i>
                            Вашите категории по интерес
                        </h3>
                        <div class=\"row g-3\">
                            ";
            // line 31
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["viewedCategories"]) || array_key_exists("viewedCategories", $context) ? $context["viewedCategories"] : (function () { throw new RuntimeError('Variable "viewedCategories" does not exist.', 31, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["categoryData"]) {
                // line 32
                yield "                                ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["categoryData"], "category", [], "any", false, false, false, 32)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 33
                    yield "                                    <div class=\"col-md-4 col-lg-3\">
                                        <div class=\"card h-100 border-primary\">
                                            <div class=\"card-body text-center\">
                                                <h5 class=\"card-title text-primary mb-3\">
                                                    ";
                    // line 37
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoryData"], "category", [], "any", false, false, false, 37), "html", null, true);
                    yield "
                                                </h5>
                                                <p class=\"text-muted mb-3\">
                                                    <i class=\"bi bi-eye\"></i>
                                                    Разгледани: <strong>";
                    // line 41
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["categoryData"], "view_count", [], "any", false, false, false, 41), "html", null, true);
                    yield "</strong>
                                                </p>
                                                <div class=\"d-grid gap-2\">
                                                    <a href=\"";
                    // line 44
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_compare_category", ["category" => CoreExtension::getAttribute($this->env, $this->source, $context["categoryData"], "category", [], "any", false, false, false, 44)]), "html", null, true);
                    yield "\"
                                                       class=\"btn btn-outline-primary btn-sm\">
                                                        <i class=\"bi bi-arrow-left-right\"></i> Сравни платформи
                                                    </a>
                                                    <a href=\"";
                    // line 48
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_compare_prices", ["category" => CoreExtension::getAttribute($this->env, $this->source, $context["categoryData"], "category", [], "any", false, false, false, 48)]), "html", null, true);
                    yield "\"
                                                       class=\"btn btn-outline-secondary btn-sm\">
                                                        <i class=\"bi bi-search\"></i> Търси в категория
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                ";
                }
                // line 57
                yield "                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['categoryData'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 58
            yield "                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products Section -->
        ";
            // line 65
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recommendedProducts"]) || array_key_exists("recommendedProducts", $context) ? $context["recommendedProducts"] : (function () { throw new RuntimeError('Variable "recommendedProducts" does not exist.', 65, $this->source); })())) > 0)) {
                // line 66
                yield "            <div class=\"row mb-5\">
                <div class=\"col-12\">
                    <h3 class=\"mb-4\">
                        <i class=\"bi bi-gift text-success\"></i>
                        Препоръчани продукти за вас
                    </h3>
                    <div class=\"row g-4\">
                        ";
                // line 73
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recommendedProducts"]) || array_key_exists("recommendedProducts", $context) ? $context["recommendedProducts"] : (function () { throw new RuntimeError('Variable "recommendedProducts" does not exist.', 73, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["product"]) {
                    // line 74
                    yield "                            <div class=\"col-6 col-md-4 col-lg-3\">
                                <div class=\"card h-100 shadow-sm product-card\">
                                    <div class=\"position-relative text-center p-3\" style=\"height: 200px; overflow: hidden; background: #fff;\">
                                        <a href=\"";
                    // line 77
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 77), "html", null, true);
                    yield "\">
                                            <img src=\"";
                    // line 78
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "image", [], "any", false, false, false, 78), "html", null, true);
                    yield "\"
                                                 alt=\"";
                    // line 79
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 79), "html", null, true);
                    yield "\"
                                                 class=\"img-fluid\"
                                                 style=\"max-height: 100%; object-fit: contain;\">
                                        </a>
                                        ";
                    // line 83
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 83)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 84
                        yield "                                            <span class=\"position-absolute top-0 end-0 badge bg-primary m-2 shadow-sm\">
                                                ";
                        // line 85
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "category", [], "any", false, false, false, 85), "html", null, true);
                        yield "
                                            </span>
                                        ";
                    }
                    // line 88
                    yield "                                    </div>
                                    <div class=\"card-body\">
                                        <h6 class=\"card-title mb-2\" style=\"min-height: 48px;\">
                                            <a href=\"";
                    // line 91
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 91), "html", null, true);
                    yield "\" class=\"text-decoration-none text-dark\">
                                                ";
                    // line 92
                    yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 92)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 92), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "title", [], "any", false, false, false, 92), "html", null, true)));
                    yield "
                                            </a>
                                        </h6>
                                        ";
                    // line 95
                    if (CoreExtension::getAttribute($this->env, $this->source, $context["product"], "rating", [], "any", true, true, false, 95)) {
                        // line 96
                        yield "                                            <div class=\"text-warning mb-2\">
                                                ";
                        // line 97
                        $context['_parent'] = $context;
                        $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                            // line 98
                            yield "                                                    ";
                            if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, $context["product"], "rating", [], "any", false, false, false, 98))) {
                                // line 99
                                yield "                                                        <i class=\"bi bi-star-fill\"></i>
                                                    ";
                            } else {
                                // line 101
                                yield "                                                        <i class=\"bi bi-star\"></i>
                                                    ";
                            }
                            // line 103
                            yield "                                                ";
                        }
                        $_parent = $context['_parent'];
                        unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                        $context = array_intersect_key($context, $_parent) + $_parent;
                        // line 104
                        yield "                                            </div>
                                        ";
                    }
                    // line 106
                    yield "                                        <h5 class=\"text-primary fw-bold mb-3\">
                                            ";
                    // line 107
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "price", [], "any", false, false, false, 107), 2, ".", " "), "html", null, true);
                    yield " лв.
                                        </h5>
                                        <a href=\"";
                    // line 109
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["product"], "link", [], "any", false, false, false, 109), "html", null, true);
                    yield "\" class=\"btn btn-outline-primary w-100 btn-sm\">
                                            Виж повече <i class=\"bi bi-arrow-right\"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['product'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 116
                yield "                    </div>
                </div>
            </div>
        ";
            } else {
                // line 120
                yield "            <div class=\"alert alert-info text-center\">
                <i class=\"bi bi-info-circle\"></i>
                Разгледайте повече продукти, за да получите персонализирани препоръки!
            </div>
        ";
            }
            // line 125
            yield "
        <!-- Recent Views Section -->
        ";
            // line 127
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["recentViews"]) || array_key_exists("recentViews", $context) ? $context["recentViews"] : (function () { throw new RuntimeError('Variable "recentViews" does not exist.', 127, $this->source); })())) > 0)) {
                // line 128
                yield "            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card shadow-sm\">
                        <div class=\"card-body p-4\">
                            <h3 class=\"card-title mb-4\">
                                <i class=\"bi bi-list-ul text-info\"></i>
                                Скорошно разгледани продукти
                            </h3>
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover\">
                                    <thead>
                                        <tr>
                                            <th>Продукт</th>
                                            <th>Категория</th>
                                            <th>Дата</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        ";
                // line 146
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable((isset($context["recentViews"]) || array_key_exists("recentViews", $context) ? $context["recentViews"] : (function () { throw new RuntimeError('Variable "recentViews" does not exist.', 146, $this->source); })()));
                foreach ($context['_seq'] as $context["_key"] => $context["view"]) {
                    // line 147
                    yield "                                            <tr>
                                                <td>
                                                    ";
                    // line 149
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["view"], "productUrl", [], "any", false, false, false, 149)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 150
                        yield "                                                        <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["view"], "productUrl", [], "any", false, false, false, 150), "html", null, true);
                        yield "\" class=\"text-decoration-none\">
                                                            ";
                        // line 151
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["view"], "productName", [], "any", false, false, false, 151), "html", null, true);
                        yield "
                                                        </a>
                                                    ";
                    } else {
                        // line 154
                        yield "                                                        ";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["view"], "productName", [], "any", false, false, false, 154), "html", null, true);
                        yield "
                                                    ";
                    }
                    // line 156
                    yield "                                                </td>
                                                <td>
                                                    ";
                    // line 158
                    if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["view"], "category", [], "any", false, false, false, 158)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                        // line 159
                        yield "                                                        <span class=\"badge bg-secondary\">";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["view"], "category", [], "any", false, false, false, 159), "html", null, true);
                        yield "</span>
                                                    ";
                    } else {
                        // line 161
                        yield "                                                        <span class=\"text-muted\">-</span>
                                                    ";
                    }
                    // line 163
                    yield "                                                </td>
                                                <td class=\"text-muted\">
                                                    ";
                    // line 165
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["view"], "createdAt", [], "any", false, false, false, 165), "d.m.Y H:i"), "html", null, true);
                    yield "
                                                </td>
                                            </tr>
                                        ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['view'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 169
                yield "                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        ";
            }
            // line 177
            yield "
    ";
        } else {
            // line 179
            yield "        <!-- Empty State -->
        <div class=\"text-center py-5\">
            <i class=\"bi bi-inbox display-1 text-muted mb-3\"></i>
            <h3 class=\"mb-3\">Все още нямате разгледани продукти</h3>
            <p class=\"text-muted mb-4\">
                Започнете да разглеждате продукти, за да получите персонализирани препоръки!
            </p>
            <a href=\"";
            // line 186
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
            yield "\" class=\"btn btn-primary btn-lg\">
                <i class=\"bi bi-house\"></i> Разгледай продукти
            </a>
        </div>
    ";
        }
        // line 191
        yield "</div>

<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
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
        return "review/recommendations.html.twig";
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
        return array (  429 => 191,  421 => 186,  412 => 179,  408 => 177,  398 => 169,  388 => 165,  384 => 163,  380 => 161,  374 => 159,  372 => 158,  368 => 156,  362 => 154,  356 => 151,  351 => 150,  349 => 149,  345 => 147,  341 => 146,  321 => 128,  319 => 127,  315 => 125,  308 => 120,  302 => 116,  289 => 109,  284 => 107,  281 => 106,  277 => 104,  271 => 103,  267 => 101,  263 => 99,  260 => 98,  256 => 97,  253 => 96,  251 => 95,  245 => 92,  241 => 91,  236 => 88,  230 => 85,  227 => 84,  225 => 83,  218 => 79,  214 => 78,  210 => 77,  205 => 74,  201 => 73,  192 => 66,  190 => 65,  181 => 58,  175 => 57,  163 => 48,  156 => 44,  150 => 41,  143 => 37,  137 => 33,  134 => 32,  130 => 31,  118 => 21,  116 => 20,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Препоръки базирани на разгледаните продукти{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <!-- Header -->
    <div class=\"row mb-5\">
        <div class=\"col-12 text-center\">
            <h1 class=\"display-5 fw-bold mb-3\">
                <i class=\"bi bi-stars text-warning\"></i>
                Вашите персонализирани препоръки
            </h1>
            <p class=\"lead text-muted\">
                Базирано на вашите разгледани категории и интереси
            </p>
        </div>
    </div>

    {% if viewedCategories|length > 0 %}
        <!-- Viewed Categories Section -->
        <div class=\"row mb-5\">
            <div class=\"col-12\">
                <div class=\"card shadow-sm\">
                    <div class=\"card-body p-4\">
                        <h3 class=\"card-title mb-4\">
                            <i class=\"bi bi-clock-history text-primary\"></i>
                            Вашите категории по интерес
                        </h3>
                        <div class=\"row g-3\">
                            {% for categoryData in viewedCategories %}
                                {% if categoryData.category %}
                                    <div class=\"col-md-4 col-lg-3\">
                                        <div class=\"card h-100 border-primary\">
                                            <div class=\"card-body text-center\">
                                                <h5 class=\"card-title text-primary mb-3\">
                                                    {{ categoryData.category }}
                                                </h5>
                                                <p class=\"text-muted mb-3\">
                                                    <i class=\"bi bi-eye\"></i>
                                                    Разгледани: <strong>{{ categoryData.view_count }}</strong>
                                                </p>
                                                <div class=\"d-grid gap-2\">
                                                    <a href=\"{{ path('app_compare_category', {category: categoryData.category}) }}\"
                                                       class=\"btn btn-outline-primary btn-sm\">
                                                        <i class=\"bi bi-arrow-left-right\"></i> Сравни платформи
                                                    </a>
                                                    <a href=\"{{ path('app_compare_prices', {category: categoryData.category}) }}\"
                                                       class=\"btn btn-outline-secondary btn-sm\">
                                                        <i class=\"bi bi-search\"></i> Търси в категория
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                {% endif %}
                            {% endfor %}
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recommended Products Section -->
        {% if recommendedProducts|length > 0 %}
            <div class=\"row mb-5\">
                <div class=\"col-12\">
                    <h3 class=\"mb-4\">
                        <i class=\"bi bi-gift text-success\"></i>
                        Препоръчани продукти за вас
                    </h3>
                    <div class=\"row g-4\">
                        {% for product in recommendedProducts %}
                            <div class=\"col-6 col-md-4 col-lg-3\">
                                <div class=\"card h-100 shadow-sm product-card\">
                                    <div class=\"position-relative text-center p-3\" style=\"height: 200px; overflow: hidden; background: #fff;\">
                                        <a href=\"{{ product.link }}\">
                                            <img src=\"{{ product.image }}\"
                                                 alt=\"{{ product.title }}\"
                                                 class=\"img-fluid\"
                                                 style=\"max-height: 100%; object-fit: contain;\">
                                        </a>
                                        {% if product.category %}
                                            <span class=\"position-absolute top-0 end-0 badge bg-primary m-2 shadow-sm\">
                                                {{ product.category }}
                                            </span>
                                        {% endif %}
                                    </div>
                                    <div class=\"card-body\">
                                        <h6 class=\"card-title mb-2\" style=\"min-height: 48px;\">
                                            <a href=\"{{ product.link }}\" class=\"text-decoration-none text-dark\">
                                                {{ product.title|length > 50 ? product.title|slice(0, 50) ~ '...' : product.title }}
                                            </a>
                                        </h6>
                                        {% if product.rating is defined %}
                                            <div class=\"text-warning mb-2\">
                                                {% for i in 1..5 %}
                                                    {% if i <= product.rating %}
                                                        <i class=\"bi bi-star-fill\"></i>
                                                    {% else %}
                                                        <i class=\"bi bi-star\"></i>
                                                    {% endif %}
                                                {% endfor %}
                                            </div>
                                        {% endif %}
                                        <h5 class=\"text-primary fw-bold mb-3\">
                                            {{ product.price|number_format(2, '.', ' ') }} лв.
                                        </h5>
                                        <a href=\"{{ product.link }}\" class=\"btn btn-outline-primary w-100 btn-sm\">
                                            Виж повече <i class=\"bi bi-arrow-right\"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        {% endfor %}
                    </div>
                </div>
            </div>
        {% else %}
            <div class=\"alert alert-info text-center\">
                <i class=\"bi bi-info-circle\"></i>
                Разгледайте повече продукти, за да получите персонализирани препоръки!
            </div>
        {% endif %}

        <!-- Recent Views Section -->
        {% if recentViews|length > 0 %}
            <div class=\"row\">
                <div class=\"col-12\">
                    <div class=\"card shadow-sm\">
                        <div class=\"card-body p-4\">
                            <h3 class=\"card-title mb-4\">
                                <i class=\"bi bi-list-ul text-info\"></i>
                                Скорошно разгледани продукти
                            </h3>
                            <div class=\"table-responsive\">
                                <table class=\"table table-hover\">
                                    <thead>
                                        <tr>
                                            <th>Продукт</th>
                                            <th>Категория</th>
                                            <th>Дата</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {% for view in recentViews %}
                                            <tr>
                                                <td>
                                                    {% if view.productUrl %}
                                                        <a href=\"{{ view.productUrl }}\" class=\"text-decoration-none\">
                                                            {{ view.productName }}
                                                        </a>
                                                    {% else %}
                                                        {{ view.productName }}
                                                    {% endif %}
                                                </td>
                                                <td>
                                                    {% if view.category %}
                                                        <span class=\"badge bg-secondary\">{{ view.category }}</span>
                                                    {% else %}
                                                        <span class=\"text-muted\">-</span>
                                                    {% endif %}
                                                </td>
                                                <td class=\"text-muted\">
                                                    {{ view.createdAt|date('d.m.Y H:i') }}
                                                </td>
                                            </tr>
                                        {% endfor %}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        {% endif %}

    {% else %}
        <!-- Empty State -->
        <div class=\"text-center py-5\">
            <i class=\"bi bi-inbox display-1 text-muted mb-3\"></i>
            <h3 class=\"mb-3\">Все още нямате разгледани продукти</h3>
            <p class=\"text-muted mb-4\">
                Започнете да разглеждате продукти, за да получите персонализирани препоръки!
            </p>
            <a href=\"{{ path('app_home') }}\" class=\"btn btn-primary btn-lg\">
                <i class=\"bi bi-house\"></i> Разгледай продукти
            </a>
        </div>
    {% endif %}
</div>

<style>
    .product-card {
        transition: transform 0.2s, box-shadow 0.2s;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15) !important;
    }
</style>
{% endblock %}
", "review/recommendations.html.twig", "/home/needy/affiliate-site/templates/review/recommendations.html.twig");
    }
}
