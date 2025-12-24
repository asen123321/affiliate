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

/* _sidebar_categories.html.twig */
class __TwigTemplate_66219deb006c4284a99c161692fee8ce extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_sidebar_categories.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "_sidebar_categories.html.twig"));

        // line 5
        yield "
<div class=\"category-sidebar\">
    <div class=\"sidebar-header\">
        <h5 class=\"sidebar-title\">
            <i class=\"bi bi-grid-3x3-gap-fill me-2\"></i>
            Избери категория
        </h5>
    </div>

    <div class=\"category-list\">
        ";
        // line 15
        if ((array_key_exists("categories", $context) && (Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 15, $this->source); })())) > 0))) {
            // line 16
            yield "            ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable((isset($context["categories"]) || array_key_exists("categories", $context) ? $context["categories"] : (function () { throw new RuntimeError('Variable "categories" does not exist.', 16, $this->source); })()));
            foreach ($context['_seq'] as $context["_key"] => $context["category"]) {
                // line 17
                yield "                <div class=\"category-item\">
                    ";
                // line 19
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_category_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 19)]), "html", null, true);
                yield "\"
                       class=\"category-link ";
                // line 20
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 20)) > 0)) {
                    yield "has-children";
                }
                yield "\"
                       ";
                // line 21
                if ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 21), "get", ["_route_params"], "method", false, true, false, 21), "slug", [], "any", true, true, false, 21)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 21, $this->source); })()), "request", [], "any", false, false, false, 21), "get", ["_route_params"], "method", false, false, false, 21), "slug", [], "any", false, false, false, 21))) : ("")) == CoreExtension::getAttribute($this->env, $this->source, $context["category"], "slug", [], "any", false, false, false, 21))) {
                    yield "aria-current=\"page\"";
                }
                yield ">
                        <span class=\"category-name\">";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "name", [], "any", false, false, false, 22), "html", null, true);
                yield "</span>
                        ";
                // line 23
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 23)) > 0)) {
                    // line 24
                    yield "                            <i class=\"bi bi-chevron-right arrow-icon\"></i>
                        ";
                }
                // line 26
                yield "                    </a>

                    ";
                // line 29
                yield "                    ";
                if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 29)) > 0)) {
                    // line 30
                    yield "                        <div class=\"category-children\">
                            ";
                    // line 31
                    $context['_parent'] = $context;
                    $context['_seq'] = CoreExtension::ensureTraversable(CoreExtension::getAttribute($this->env, $this->source, $context["category"], "children", [], "any", false, false, false, 31));
                    foreach ($context['_seq'] as $context["_key"] => $context["child"]) {
                        // line 32
                        yield "                                <a href=\"";
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_category_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["child"], "slug", [], "any", false, false, false, 32)]), "html", null, true);
                        yield "\"
                                   class=\"category-child-link\"
                                   ";
                        // line 34
                        if ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["app"] ?? null), "request", [], "any", false, true, false, 34), "get", ["_route_params"], "method", false, true, false, 34), "slug", [], "any", true, true, false, 34)) ? (Twig\Extension\CoreExtension::default(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 34, $this->source); })()), "request", [], "any", false, false, false, 34), "get", ["_route_params"], "method", false, false, false, 34), "slug", [], "any", false, false, false, 34))) : ("")) == CoreExtension::getAttribute($this->env, $this->source, $context["child"], "slug", [], "any", false, false, false, 34))) {
                            yield "aria-current=\"page\"";
                        }
                        yield ">
                                    ";
                        // line 35
                        yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["child"], "name", [], "any", false, false, false, 35), "html", null, true);
                        yield "
                                </a>
                            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_key'], $context['child'], $context['_parent']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 38
                    yield "                        </div>
                    ";
                }
                // line 40
                yield "                </div>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['category'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 42
            yield "        ";
        } else {
            // line 43
            yield "            <div class=\"alert alert-light text-center\">
                <small class=\"text-muted\">Няма налични категории</small>
            </div>
        ";
        }
        // line 47
        yield "    </div>
</div>

<style>
.category-sidebar {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    position: sticky;
    top: 20px;
}

.sidebar-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 18px 20px;
    color: white;
}

.sidebar-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
}

.category-list {
    padding: 0;
}

.category-item {
    border-bottom: 1px solid #f0f0f0;
}

.category-item:last-child {
    border-bottom: none;
}

.category-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 20px;
    text-decoration: none;
    color: #2d3748;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: white;
}

.category-link:hover {
    background: #f7f7f7;
    color: #667eea;
    padding-left: 24px;
}

.category-link[aria-current=\"page\"] {
    background: #f0f4ff;
    color: #667eea;
    border-left: 4px solid #667eea;
}

.category-link .arrow-icon {
    font-size: 0.8rem;
    transition: transform 0.2s ease;
}

.category-link:hover .arrow-icon {
    transform: translateX(4px);
}

.category-children {
    background: #fafafa;
    padding: 8px 0;
    display: none;
}

.category-item:hover .category-children,
.category-item:focus-within .category-children {
    display: block;
}

.category-child-link {
    display: block;
    padding: 10px 20px 10px 40px;
    text-decoration: none;
    color: #5a5a5a;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.category-child-link:hover {
    background: #f0f0f0;
    color: #667eea;
    padding-left: 44px;
}

.category-child-link[aria-current=\"page\"] {
    background: #e8edff;
    color: #667eea;
    font-weight: 600;
}

/* Mobile Responsive */
@media (max-width: 991px) {
    .category-sidebar {
        position: relative;
        top: 0;
        margin-bottom: 20px;
    }

    .category-children {
        display: block;
    }
}

/* Accessibility */
.category-link:focus,
.category-child-link:focus {
    outline: 2px solid #667eea;
    outline-offset: -2px;
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
        return "_sidebar_categories.html.twig";
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
        return array (  152 => 47,  146 => 43,  143 => 42,  136 => 40,  132 => 38,  123 => 35,  117 => 34,  111 => 32,  107 => 31,  104 => 30,  101 => 29,  97 => 26,  93 => 24,  91 => 23,  87 => 22,  81 => 21,  75 => 20,  70 => 19,  67 => 17,  62 => 16,  60 => 15,  48 => 5,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{#
    Sidebar Category Menu - eMAG Style
    Displays hierarchical category tree in a vertical menu
#}

<div class=\"category-sidebar\">
    <div class=\"sidebar-header\">
        <h5 class=\"sidebar-title\">
            <i class=\"bi bi-grid-3x3-gap-fill me-2\"></i>
            Избери категория
        </h5>
    </div>

    <div class=\"category-list\">
        {% if categories is defined and categories|length > 0 %}
            {% for category in categories %}
                <div class=\"category-item\">
                    {# Parent Category #}
                    <a href=\"{{ path('app_category_show', {slug: category.slug}) }}\"
                       class=\"category-link {% if category.children|length > 0 %}has-children{% endif %}\"
                       {% if app.request.get('_route_params').slug|default == category.slug %}aria-current=\"page\"{% endif %}>
                        <span class=\"category-name\">{{ category.name }}</span>
                        {% if category.children|length > 0 %}
                            <i class=\"bi bi-chevron-right arrow-icon\"></i>
                        {% endif %}
                    </a>

                    {# Children Categories #}
                    {% if category.children|length > 0 %}
                        <div class=\"category-children\">
                            {% for child in category.children %}
                                <a href=\"{{ path('app_category_show', {slug: child.slug}) }}\"
                                   class=\"category-child-link\"
                                   {% if app.request.get('_route_params').slug|default == child.slug %}aria-current=\"page\"{% endif %}>
                                    {{ child.name }}
                                </a>
                            {% endfor %}
                        </div>
                    {% endif %}
                </div>
            {% endfor %}
        {% else %}
            <div class=\"alert alert-light text-center\">
                <small class=\"text-muted\">Няма налични категории</small>
            </div>
        {% endif %}
    </div>
</div>

<style>
.category-sidebar {
    background: white;
    border-radius: 12px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
    overflow: hidden;
    position: sticky;
    top: 20px;
}

.sidebar-header {
    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    padding: 18px 20px;
    color: white;
}

.sidebar-title {
    margin: 0;
    font-size: 1.1rem;
    font-weight: 700;
}

.category-list {
    padding: 0;
}

.category-item {
    border-bottom: 1px solid #f0f0f0;
}

.category-item:last-child {
    border-bottom: none;
}

.category-link {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 14px 20px;
    text-decoration: none;
    color: #2d3748;
    font-weight: 600;
    font-size: 0.95rem;
    transition: all 0.2s ease;
    background: white;
}

.category-link:hover {
    background: #f7f7f7;
    color: #667eea;
    padding-left: 24px;
}

.category-link[aria-current=\"page\"] {
    background: #f0f4ff;
    color: #667eea;
    border-left: 4px solid #667eea;
}

.category-link .arrow-icon {
    font-size: 0.8rem;
    transition: transform 0.2s ease;
}

.category-link:hover .arrow-icon {
    transform: translateX(4px);
}

.category-children {
    background: #fafafa;
    padding: 8px 0;
    display: none;
}

.category-item:hover .category-children,
.category-item:focus-within .category-children {
    display: block;
}

.category-child-link {
    display: block;
    padding: 10px 20px 10px 40px;
    text-decoration: none;
    color: #5a5a5a;
    font-size: 0.9rem;
    font-weight: 500;
    transition: all 0.2s ease;
}

.category-child-link:hover {
    background: #f0f0f0;
    color: #667eea;
    padding-left: 44px;
}

.category-child-link[aria-current=\"page\"] {
    background: #e8edff;
    color: #667eea;
    font-weight: 600;
}

/* Mobile Responsive */
@media (max-width: 991px) {
    .category-sidebar {
        position: relative;
        top: 0;
        margin-bottom: 20px;
    }

    .category-children {
        display: block;
    }
}

/* Accessibility */
.category-link:focus,
.category-child-link:focus {
    outline: 2px solid #667eea;
    outline-offset: -2px;
}
</style>
", "_sidebar_categories.html.twig", "/var/www/html/templates/_sidebar_categories.html.twig");
    }
}
