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

/* review/_product_card_compare.html.twig */
class __TwigTemplate_7eeec2d72dd4f06e041f5dcbc6aaf909 extends Template
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
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/_product_card_compare.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/_product_card_compare.html.twig"));

        // line 1
        yield "<div class=\"col-md-6 col-lg-4\">
    <div class=\"card h-100 shadow-sm hover-card position-relative\">
        ";
        // line 4
        yield "        <div class=\"position-absolute top-0 end-0 p-3\" style=\"z-index: 10;\">
            ";
        // line 5
        $context["imgUrl"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["product"] ?? null), "imageUrl", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "imageUrl", [], "any", false, false, false, 5)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "imageUrl", [], "any", false, false, false, 5)) : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["product"] ?? null), "image", [], "any", true, true, false, 5) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "image", [], "any", false, false, false, 5)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "image", [], "any", false, false, false, 5)) : (""))));
        // line 6
        yield "            ";
        $context["fullDescription"] = (((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "content", [], "any", false, false, false, 6)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "content", [], "any", false, false, false, 6))) : ((((CoreExtension::getAttribute($this->env, $this->source, ($context["product"] ?? null), "metaDescription", [], "any", true, true, false, 6) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "metaDescription", [], "any", false, false, false, 6)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "metaDescription", [], "any", false, false, false, 6)) : (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "title", [], "any", false, false, false, 6)))));
        // line 7
        yield "            ";
        $context["summary"] = (((CoreExtension::getAttribute($this->env, $this->source, ($context["product"] ?? null), "metaDescription", [], "any", true, true, false, 7) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })()), "metaDescription", [], "any", false, false, false, 7)))) ? (CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })()), "metaDescription", [], "any", false, false, false, 7)) : ((((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })()), "content", [], "any", false, false, false, 7)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (Twig\Extension\CoreExtension::slice($this->env->getCharset(), Twig\Extension\CoreExtension::striptags(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 7, $this->source); })()), "content", [], "any", false, false, false, 7)), 0, 200)) : ("Няма налична информация"))));
        // line 8
        yield "            <input class=\"form-check-input compare-checkbox shadow-sm\"
                   type=\"checkbox\"
                   data-name=\"";
        // line 10
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 10, $this->source); })()), "title", [], "any", false, false, false, 10), "html", null, true);
        yield "\"
                   data-price=\"";
        // line 11
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 11, $this->source); })()), "price", [], "any", false, false, false, 11), "html", null, true);
        yield "\"
                   data-platform=\"";
        // line 12
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 12, $this->source); })()), "html", null, true);
        yield "\"
                   data-img=\"";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["imgUrl"]) || array_key_exists("imgUrl", $context) ? $context["imgUrl"] : (function () { throw new RuntimeError('Variable "imgUrl" does not exist.', 13, $this->source); })()), "html", null, true);
        yield "\"
                   data-description=\"";
        // line 14
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["fullDescription"]) || array_key_exists("fullDescription", $context) ? $context["fullDescription"] : (function () { throw new RuntimeError('Variable "fullDescription" does not exist.', 14, $this->source); })()), "html", null, true);
        yield "\"
                   data-screen=\"\"
                   data-resolution=\"\"
                   data-type=\"\"
                   data-smart=\"\"
                   data-link=\"";
        // line 19
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 19, $this->source); })()), "id", [], "any", false, false, false, 19)]), "html", null, true);
        yield "\"
                   data-summary=\"";
        // line 20
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["summary"]) || array_key_exists("summary", $context) ? $context["summary"] : (function () { throw new RuntimeError('Variable "summary" does not exist.', 20, $this->source); })()), "html", null, true);
        yield "\"
                   style=\"width: 1.5em; height: 1.5em; cursor: pointer; border: 2px solid #0d6efd;\">
        </div>

        ";
        // line 24
        if ((($tmp = (isset($context["imgUrl"]) || array_key_exists("imgUrl", $context) ? $context["imgUrl"] : (function () { throw new RuntimeError('Variable "imgUrl" does not exist.', 24, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 25
            yield "            <div class=\"card-img-wrapper\">
                <a href=\"";
            // line 26
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 26, $this->source); })()), "id", [], "any", false, false, false, 26)]), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"d-block h-100 text-center\">
                    <img src=\"";
            // line 27
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["imgUrl"]) || array_key_exists("imgUrl", $context) ? $context["imgUrl"] : (function () { throw new RuntimeError('Variable "imgUrl" does not exist.', 27, $this->source); })()), "html", null, true);
            yield "\"
                         class=\"card-img-top p-3\"
                         alt=\"";
            // line 29
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 29, $this->source); })()), "title", [], "any", false, false, false, 29), "html", null, true);
            yield "\"
                         style=\"height: 200px; object-fit: contain; background: white;\"
                         loading=\"lazy\"
                         decoding=\"async\"
                         width=\"300\"
                         height=\"200\">
                </a>
            </div>
        ";
        }
        // line 38
        yield "
        <div class=\"card-body d-flex flex-column\">
            <div class=\"mb-2\">
                <span class=\"badge
                    ";
        // line 42
        if (((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 42, $this->source); })()) == "eMAG")) {
            yield "bg-primary
                    ";
        } elseif ((        // line 43
(isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 43, $this->source); })()) == "Fashion Days")) {
            yield "bg-dark
                    ";
        } else {
            // line 44
            yield "bg-success
                    ";
        }
        // line 45
        yield "\">
                    ";
        // line 46
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 46, $this->source); })()), "html", null, true);
        yield "
                </span>
            </div>

            <h6 class=\"card-title mb-2\" style=\"min-height: 2.5rem; font-size: 0.9rem;\">
                <a href=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 51, $this->source); })()), "id", [], "any", false, false, false, 51)]), "html", null, true);
        yield "\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                    ";
        // line 52
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 52, $this->source); })()), "title", [], "any", false, false, false, 52)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 52, $this->source); })()), "title", [], "any", false, false, false, 52), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 52, $this->source); })()), "title", [], "any", false, false, false, 52), "html", null, true)));
        yield "
                </a>
            </h6>

            ";
        // line 56
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 56, $this->source); })()), "rating", [], "any", false, false, false, 56)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 57
            yield "                <div class=\"text-warning mb-2\" style=\"font-size: 0.8rem;\">
                    ";
            // line 58
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 59
                yield "                        <i class=\"bi bi-star-fill";
                if (($context["i"] > CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 59, $this->source); })()), "rating", [], "any", false, false, false, 59))) {
                    yield " text-muted";
                }
                yield "\"></i>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 61
            yield "                </div>
            ";
        }
        // line 63
        yield "
            <div class=\"mt-auto\">
                ";
        // line 65
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 65, $this->source); })()), "price", [], "any", false, false, false, 65)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 66
            yield "                    <div class=\"d-flex align-items-center justify-content-between mb-3\">
                        <span class=\"h4 text-primary fw-bold mb-0\">";
            // line 67
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 67, $this->source); })()), "price", [], "any", false, false, false, 67), "html", null, true);
            yield " лв.</span>
                    </div>
                ";
        }
        // line 70
        yield "
                <div class=\"d-grid gap-2\">
                    <a href=\"";
        // line 72
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 72, $this->source); })()), "slug", [], "any", false, false, false, 72)]), "html", null, true);
        yield "\"
                       class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-eye\"></i> Детайли
                    </a>
                    <a href=\"";
        // line 76
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 76, $this->source); })()), "id", [], "any", false, false, false, 76)]), "html", null, true);
        yield "\"
                       class=\"btn btn-primary btn-sm\"
                       target=\"_blank\"
                       rel=\"noopener noreferrer\">
                        <i class=\"bi bi-cart-plus\"></i> Виж в ";
        // line 80
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 80, $this->source); })()), "html", null, true);
        yield "
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
        border-color: #667eea;
    }
    .card-img-wrapper {
        overflow: hidden;
        border-bottom: 1px solid #e9ecef;
    }
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .hover-card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
";
        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "review/_product_card_compare.html.twig";
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
        return array (  226 => 80,  219 => 76,  212 => 72,  208 => 70,  202 => 67,  199 => 66,  197 => 65,  193 => 63,  189 => 61,  178 => 59,  174 => 58,  171 => 57,  169 => 56,  162 => 52,  158 => 51,  150 => 46,  147 => 45,  143 => 44,  138 => 43,  134 => 42,  128 => 38,  116 => 29,  111 => 27,  107 => 26,  104 => 25,  102 => 24,  95 => 20,  91 => 19,  83 => 14,  79 => 13,  75 => 12,  71 => 11,  67 => 10,  63 => 8,  60 => 7,  57 => 6,  55 => 5,  52 => 4,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"col-md-6 col-lg-4\">
    <div class=\"card h-100 shadow-sm hover-card position-relative\">
        {# Checkbox for comparison #}
        <div class=\"position-absolute top-0 end-0 p-3\" style=\"z-index: 10;\">
            {% set imgUrl = product.imageUrl ?? product.image ?? '' %}
            {% set fullDescription = product.content ? product.content|striptags : (product.metaDescription ?? product.title) %}
            {% set summary = product.metaDescription ?? (product.content ? product.content|striptags|slice(0, 200) : 'Няма налична информация') %}
            <input class=\"form-check-input compare-checkbox shadow-sm\"
                   type=\"checkbox\"
                   data-name=\"{{ product.title }}\"
                   data-price=\"{{ product.price }}\"
                   data-platform=\"{{ platform }}\"
                   data-img=\"{{ imgUrl }}\"
                   data-description=\"{{ fullDescription }}\"
                   data-screen=\"\"
                   data-resolution=\"\"
                   data-type=\"\"
                   data-smart=\"\"
                   data-link=\"{{ path('app_buy_redirect', {id: product.id}) }}\"
                   data-summary=\"{{ summary }}\"
                   style=\"width: 1.5em; height: 1.5em; cursor: pointer; border: 2px solid #0d6efd;\">
        </div>

        {% if imgUrl %}
            <div class=\"card-img-wrapper\">
                <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"d-block h-100 text-center\">
                    <img src=\"{{ imgUrl }}\"
                         class=\"card-img-top p-3\"
                         alt=\"{{ product.title }}\"
                         style=\"height: 200px; object-fit: contain; background: white;\"
                         loading=\"lazy\"
                         decoding=\"async\"
                         width=\"300\"
                         height=\"200\">
                </a>
            </div>
        {% endif %}

        <div class=\"card-body d-flex flex-column\">
            <div class=\"mb-2\">
                <span class=\"badge
                    {% if platform == 'eMAG' %}bg-primary
                    {% elseif platform == 'Fashion Days' %}bg-dark
                    {% else %}bg-success
                    {% endif %}\">
                    {{ platform }}
                </span>
            </div>

            <h6 class=\"card-title mb-2\" style=\"min-height: 2.5rem; font-size: 0.9rem;\">
                <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                    {{ product.title|length > 50 ? product.title|slice(0, 50) ~ '...' : product.title }}
                </a>
            </h6>

            {% if product.rating %}
                <div class=\"text-warning mb-2\" style=\"font-size: 0.8rem;\">
                    {% for i in 1..5 %}
                        <i class=\"bi bi-star-fill{% if i > product.rating %} text-muted{% endif %}\"></i>
                    {% endfor %}
                </div>
            {% endif %}

            <div class=\"mt-auto\">
                {% if product.price %}
                    <div class=\"d-flex align-items-center justify-content-between mb-3\">
                        <span class=\"h4 text-primary fw-bold mb-0\">{{ product.price }} лв.</span>
                    </div>
                {% endif %}

                <div class=\"d-grid gap-2\">
                    <a href=\"{{ path('app_review_show', {slug: product.slug}) }}\"
                       class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-eye\"></i> Детайли
                    </a>
                    <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\"
                       class=\"btn btn-primary btn-sm\"
                       target=\"_blank\"
                       rel=\"noopener noreferrer\">
                        <i class=\"bi bi-cart-plus\"></i> Виж в {{ platform }}
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .hover-card {
        transition: all 0.3s ease;
        border: 1px solid #e9ecef;
    }
    .hover-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
        border-color: #667eea;
    }
    .card-img-wrapper {
        overflow: hidden;
        border-bottom: 1px solid #e9ecef;
    }
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .hover-card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
", "review/_product_card_compare.html.twig", "/var/www/html/templates/review/_product_card_compare.html.twig");
    }
}
