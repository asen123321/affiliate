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
    <div class=\"card h-100 shadow-sm hover-card\">
        ";
        // line 3
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 3, $this->source); })()), "imageUrl", [], "any", false, false, false, 3)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 4
            yield "            <div class=\"card-img-wrapper\">
                <a href=\"";
            // line 5
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 5, $this->source); })()), "id", [], "any", false, false, false, 5)]), "html", null, true);
            yield "\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"d-block h-100 text-center\">
                    <img src=\"";
            // line 6
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 6, $this->source); })()), "imageUrl", [], "any", false, false, false, 6), "html", null, true);
            yield "\"
                         class=\"card-img-top p-3\"
                         alt=\"";
            // line 8
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 8, $this->source); })()), "title", [], "any", false, false, false, 8), "html", null, true);
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
        // line 17
        yield "
        <div class=\"card-body d-flex flex-column\">
            <div class=\"mb-2\">
                <span class=\"badge
                    ";
        // line 21
        if (((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 21, $this->source); })()) == "eMAG")) {
            yield "bg-primary
                    ";
        } elseif ((        // line 22
(isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 22, $this->source); })()) == "Fashion Days")) {
            yield "bg-dark
                    ";
        } else {
            // line 23
            yield "bg-success
                    ";
        }
        // line 24
        yield "\">
                    ";
        // line 25
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 25, $this->source); })()), "html", null, true);
        yield "
                </span>
            </div>

            <h6 class=\"card-title mb-2\" style=\"min-height: 2.5rem; font-size: 0.9rem;\">
                <a href=\"";
        // line 30
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 30, $this->source); })()), "id", [], "any", false, false, false, 30)]), "html", null, true);
        yield "\" target=\"_blank\" class=\"text-decoration-none text-dark\">
                    ";
        // line 31
        yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 31, $this->source); })()), "title", [], "any", false, false, false, 31)) > 50)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 31, $this->source); })()), "title", [], "any", false, false, false, 31), 0, 50) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 31, $this->source); })()), "title", [], "any", false, false, false, 31), "html", null, true)));
        yield "
                </a>
            </h6>

            ";
        // line 35
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 35, $this->source); })()), "rating", [], "any", false, false, false, 35)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 36
            yield "                <div class=\"text-warning mb-2\" style=\"font-size: 0.8rem;\">
                    ";
            // line 37
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 38
                yield "                        <i class=\"bi bi-star-fill";
                if (($context["i"] > CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 38, $this->source); })()), "rating", [], "any", false, false, false, 38))) {
                    yield " text-muted";
                }
                yield "\"></i>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 40
            yield "                </div>
            ";
        }
        // line 42
        yield "
            <div class=\"mt-auto\">
                ";
        // line 44
        if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 44, $this->source); })()), "price", [], "any", false, false, false, 44)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 45
            yield "                    <div class=\"d-flex align-items-center justify-content-between mb-3\">
                        <span class=\"h4 text-primary fw-bold mb-0\">";
            // line 46
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 46, $this->source); })()), "price", [], "any", false, false, false, 46), "html", null, true);
            yield " лв.</span>
                    </div>
                ";
        }
        // line 49
        yield "
                <div class=\"d-grid gap-2\">
                    <a href=\"";
        // line 51
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 51, $this->source); })()), "slug", [], "any", false, false, false, 51)]), "html", null, true);
        yield "\"
                       class=\"btn btn-outline-secondary btn-sm\">
                        <i class=\"bi bi-eye\"></i> Детайли
                    </a>
                    <a href=\"";
        // line 55
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, (isset($context["product"]) || array_key_exists("product", $context) ? $context["product"] : (function () { throw new RuntimeError('Variable "product" does not exist.', 55, $this->source); })()), "id", [], "any", false, false, false, 55)]), "html", null, true);
        yield "\"
                       class=\"btn btn-primary btn-sm\"
                       target=\"_blank\"
                       rel=\"noopener noreferrer\">
                        <i class=\"bi bi-cart-plus\"></i> Виж в ";
        // line 59
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["platform"]) || array_key_exists("platform", $context) ? $context["platform"] : (function () { throw new RuntimeError('Variable "platform" does not exist.', 59, $this->source); })()), "html", null, true);
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
        return array (  176 => 59,  169 => 55,  162 => 51,  158 => 49,  152 => 46,  149 => 45,  147 => 44,  143 => 42,  139 => 40,  128 => 38,  124 => 37,  121 => 36,  119 => 35,  112 => 31,  108 => 30,  100 => 25,  97 => 24,  93 => 23,  88 => 22,  84 => 21,  78 => 17,  66 => 8,  61 => 6,  57 => 5,  54 => 4,  52 => 3,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<div class=\"col-md-6 col-lg-4\">
    <div class=\"card h-100 shadow-sm hover-card\">
        {% if product.imageUrl %}
            <div class=\"card-img-wrapper\">
                <a href=\"{{ path('app_buy_redirect', {id: product.id}) }}\" target=\"_blank\" rel=\"noopener noreferrer\" class=\"d-block h-100 text-center\">
                    <img src=\"{{ product.imageUrl }}\"
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
", "review/_product_card_compare.html.twig", "/home/needy/affiliate-site/templates/review/_product_card_compare.html.twig");
    }
}
