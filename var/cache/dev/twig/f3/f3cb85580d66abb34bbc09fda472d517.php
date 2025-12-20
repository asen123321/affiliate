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

/* review/search.html.twig */
class __TwigTemplate_302e620da74d5e916908228753cf3ae4 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/search.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/search.html.twig"));

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

        yield "Търсене: ";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 3, $this->source); })()), "html", null, true);
        
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
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-6 fw-bold mb-2\">
                <i class=\"bi bi-search text-primary\"></i> Резултати от търсене
            </h1>
            <p class=\"text-muted\">
                Намерени <strong>";
        // line 13
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 13, $this->source); })()), "getTotalItemCount", [], "any", false, false, false, 13), "html", null, true);
        yield "</strong> продукта за \"<strong>";
        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["query"]) || array_key_exists("query", $context) ? $context["query"] : (function () { throw new RuntimeError('Variable "query" does not exist.', 13, $this->source); })()), "html", null, true);
        yield "</strong>\"
            </p>
        </div>
    </div>

    ";
        // line 18
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 18, $this->source); })())) > 0)) {
            // line 19
            yield "        <div class=\"row g-4\">
            ";
            // line 20
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 20, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
                // line 21
                yield "                <div class=\"col-md-6 col-lg-4 col-xl-3\">
                    <div class=\"card h-100 shadow-sm hover-lift\">
                        ";
                // line 23
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["review"], "imageUrl", [], "any", false, false, false, 23)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 24
                    yield "                            <img src=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "imageUrl", [], "any", false, false, false, 24), "html", null, true);
                    yield "\"
                                 class=\"card-img-top\"
                                 alt=\"";
                    // line 26
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 26), "html", null, true);
                    yield "\"
                                 style=\"height: 250px; object-fit: contain; padding: 1rem; background: white;\">
                        ";
                }
                // line 29
                yield "
                        <div class=\"card-body d-flex flex-column\">
                            <h5 class=\"card-title mb-3\" style=\"min-height: 3rem; font-size: 1rem;\">
                                ";
                // line 32
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 32)) > 60)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 32), 0, 60) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 32), "html", null, true)));
                yield "
                            </h5>

                            <div class=\"mb-2\">
                                ";
                // line 36
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["review"], "rating", [], "any", false, false, false, 36)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 37
                    yield "                                    <div class=\"text-warning mb-1\">
                                        ";
                    // line 38
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
                    foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                        // line 39
                        yield "                                            <i class=\"bi bi-star-fill";
                        if (($context["i"] > CoreExtension::getAttribute($this->env, $this->source, $context["review"], "rating", [], "any", false, false, false, 39))) {
                            yield " text-muted";
                        }
                        yield "\"></i>
                                        ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 41
                    yield "                                        <span class=\"text-muted ms-1\">(";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "rating", [], "any", false, false, false, 41), "html", null, true);
                    yield ")</span>
                                    </div>
                                ";
                }
                // line 44
                yield "                            </div>

                            <p class=\"text-muted small mb-3\">
                                ";
                // line 47
                yield (((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "metaDescription", [], "any", false, false, false, 47)) > 80)) ? ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "metaDescription", [], "any", false, false, false, 47), 0, 80) . "..."), "html", null, true)) : ($this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "metaDescription", [], "any", false, false, false, 47), "html", null, true)));
                yield "
                            </p>

                            <div class=\"mt-auto\">
                                ";
                // line 51
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["review"], "price", [], "any", false, false, false, 51)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 52
                    yield "                                    <p class=\"h4 text-primary fw-bold mb-3\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "price", [], "any", false, false, false, 52), "html", null, true);
                    yield " лв.</p>
                                ";
                }
                // line 54
                yield "
                                <div class=\"d-grid gap-2\">
                                    <a href=\"";
                // line 56
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["review"], "slug", [], "any", false, false, false, 56)]), "html", null, true);
                yield "\"
                                       class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-eye\"></i> Виж повече
                                    </a>
                                    <a href=\"";
                // line 60
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["review"], "id", [], "any", false, false, false, 60)]), "html", null, true);
                yield "\"
                                       class=\"btn btn-primary btn-sm\"
                                       target=\"_blank\"
                                       rel=\"noopener noreferrer\">
                                        <i class=\"bi bi-cart-plus\"></i> Купи сега
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['review'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 72
            yield "        </div>

        <!-- Pagination -->
        <div class=\"d-flex justify-content-center mt-5\">
            ";
            // line 76
            yield $this->env->getRuntime('Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationRuntime')->render($this->env, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 76, $this->source); })()));
            yield "
        </div>
    ";
        } else {
            // line 79
            yield "        <div class=\"text-center py-5\">
            <i class=\"bi bi-search display-1 text-muted mb-3\"></i>
            <h3>Няма намерени резултати</h3>
            <p class=\"text-muted\">Опитайте с различни ключови думи</p>
            <a href=\"";
            // line 83
            yield $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home");
            yield "\" class=\"btn btn-primary mt-3\">
                <i class=\"bi bi-house\"></i> Обратно към начало
            </a>
        </div>
    ";
        }
        // line 88
        yield "</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .card:hover .card-img-top {
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
        return "review/search.html.twig";
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
        return array (  261 => 88,  253 => 83,  247 => 79,  241 => 76,  235 => 72,  217 => 60,  210 => 56,  206 => 54,  200 => 52,  198 => 51,  191 => 47,  186 => 44,  179 => 41,  168 => 39,  164 => 38,  161 => 37,  159 => 36,  152 => 32,  147 => 29,  141 => 26,  135 => 24,  133 => 23,  129 => 21,  125 => 20,  122 => 19,  120 => 18,  110 => 13,  101 => 6,  88 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Търсене: {{ query }}{% endblock %}

{% block body %}
<div class=\"container py-5\">
    <div class=\"row mb-4\">
        <div class=\"col-12\">
            <h1 class=\"display-6 fw-bold mb-2\">
                <i class=\"bi bi-search text-primary\"></i> Резултати от търсене
            </h1>
            <p class=\"text-muted\">
                Намерени <strong>{{ reviews.getTotalItemCount }}</strong> продукта за \"<strong>{{ query }}</strong>\"
            </p>
        </div>
    </div>

    {% if reviews|length > 0 %}
        <div class=\"row g-4\">
            {% for review in reviews %}
                <div class=\"col-md-6 col-lg-4 col-xl-3\">
                    <div class=\"card h-100 shadow-sm hover-lift\">
                        {% if review.imageUrl %}
                            <img src=\"{{ review.imageUrl }}\"
                                 class=\"card-img-top\"
                                 alt=\"{{ review.title }}\"
                                 style=\"height: 250px; object-fit: contain; padding: 1rem; background: white;\">
                        {% endif %}

                        <div class=\"card-body d-flex flex-column\">
                            <h5 class=\"card-title mb-3\" style=\"min-height: 3rem; font-size: 1rem;\">
                                {{ review.title|length > 60 ? review.title|slice(0, 60) ~ '...' : review.title }}
                            </h5>

                            <div class=\"mb-2\">
                                {% if review.rating %}
                                    <div class=\"text-warning mb-1\">
                                        {% for i in 1..5 %}
                                            <i class=\"bi bi-star-fill{% if i > review.rating %} text-muted{% endif %}\"></i>
                                        {% endfor %}
                                        <span class=\"text-muted ms-1\">({{ review.rating }})</span>
                                    </div>
                                {% endif %}
                            </div>

                            <p class=\"text-muted small mb-3\">
                                {{ review.metaDescription|length > 80 ? review.metaDescription|slice(0, 80) ~ '...' : review.metaDescription }}
                            </p>

                            <div class=\"mt-auto\">
                                {% if review.price %}
                                    <p class=\"h4 text-primary fw-bold mb-3\">{{ review.price }} лв.</p>
                                {% endif %}

                                <div class=\"d-grid gap-2\">
                                    <a href=\"{{ path('app_review_show', {slug: review.slug}) }}\"
                                       class=\"btn btn-outline-primary btn-sm\">
                                        <i class=\"bi bi-eye\"></i> Виж повече
                                    </a>
                                    <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\"
                                       class=\"btn btn-primary btn-sm\"
                                       target=\"_blank\"
                                       rel=\"noopener noreferrer\">
                                        <i class=\"bi bi-cart-plus\"></i> Купи сега
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            {% endfor %}
        </div>

        <!-- Pagination -->
        <div class=\"d-flex justify-content-center mt-5\">
            {{ knp_pagination_render(reviews) }}
        </div>
    {% else %}
        <div class=\"text-center py-5\">
            <i class=\"bi bi-search display-1 text-muted mb-3\"></i>
            <h3>Няма намерени резултати</h3>
            <p class=\"text-muted\">Опитайте с различни ключови думи</p>
            <a href=\"{{ path('app_home') }}\" class=\"btn btn-primary mt-3\">
                <i class=\"bi bi-house\"></i> Обратно към начало
            </a>
        </div>
    {% endif %}
</div>

<style>
    .hover-lift {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    .hover-lift:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }
    .card-img-top {
        transition: transform 0.3s ease;
    }
    .card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>
{% endblock %}
", "review/search.html.twig", "/var/www/html/templates/review/search.html.twig");
    }
}
