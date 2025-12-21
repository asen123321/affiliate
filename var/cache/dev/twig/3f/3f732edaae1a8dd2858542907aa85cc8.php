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

/* review/index.html.twig */
class __TwigTemplate_0107af6e6ecefb5ac429c86b5263a4f0 extends Template
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
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/index.html.twig"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "review/index.html.twig"));

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

        yield "   Best Tech Deals 2025 - Exclusive Reviews & Hot Offers";
        
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
        // line 8
        yield "    ";
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 8, $this->source); })())) > 0)) {
            // line 9
            yield "        ";
            $context["firstImage"] = (((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reviews"] ?? null), 0, [], "array", false, true, false, 9), "imageUrl", [], "any", true, true, false, 9) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "imageUrl", [], "any", false, false, false, 9)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "imageUrl", [], "any", false, false, false, 9)) : ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reviews"] ?? null), 0, [], "array", false, true, false, 9), "image", [], "any", true, true, false, 9) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "image", [], "any", false, false, false, 9)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "image", [], "any", false, false, false, 9)) : ((((CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["reviews"] ?? null), 0, [], "array", false, true, false, 9), "mainImage", [], "any", true, true, false, 9) &&  !(null === CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "mainImage", [], "any", false, false, false, 9)))) ? (CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 9, $this->source); })()), 0, [], "array", false, false, false, 9), "mainImage", [], "any", false, false, false, 9)) : (null))))));
            // line 10
            yield "        ";
            if ((($tmp = (isset($context["firstImage"]) || array_key_exists("firstImage", $context) ? $context["firstImage"] : (function () { throw new RuntimeError('Variable "firstImage" does not exist.', 10, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 11
                yield "            <link rel=\"preload\" as=\"image\" href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["firstImage"]) || array_key_exists("firstImage", $context) ? $context["firstImage"] : (function () { throw new RuntimeError('Variable "firstImage" does not exist.', 11, $this->source); })()), "html", null, true);
                yield "\" fetchpriority=\"high\">
        ";
            }
            // line 13
            yield "    ";
        }
        
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->leave($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof);

        
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->leave($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof);

        yield from [];
    }

    // line 16
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

        // line 17
        yield "
    <div class=\"mega-hero position-relative overflow-hidden\">
        <div class=\"animated-blobs\"></div>
        <div class=\"container position-relative\" style=\"z-index: 2;\">
            <div class=\"row align-items-center py-5 hero-row\">
                <div class=\"col-lg-7 text-white py-5\">
                    <div class=\"mb-3\">
                        <span class=\"badge-hot\">TRENDING NOW</span>
                    </div>
                    <h1 class=\"display-2 fw-black mb-4 text-shadow\">
                        Get The Best Tech<br>
                        <span class=\"gradient-text\">Before It Sells Out!</span>
                    </h1>
                    <p class=\"lead fs-3 mb-4 fw-semibold\">
                        💰 Exclusive deals • ⚡ Expert reviews • ✅ Verified picks
                    </p>
                    <div class=\"d-flex flex-wrap gap-3 mb-4\">
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">50+</div>
                            <div class=\"small opacity-90\">Products Tested</div>
                        </div>
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">100%</div>
                            <div class=\"small opacity-90\">Honest Reviews</div>
                        </div>
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">24/7</div>
                            <div class=\"small opacity-90\">Price Updates</div>
                        </div>
                    </div>
                    <a href=\"#deals\" class=\"btn btn-mega-cta btn-lg px-5 py-3 fw-black\">
                        <i class=\"bi bi-lightning-charge-fill me-2\"></i>SHOP HOT DEALS NOW
                        <i class=\"bi bi-arrow-right ms-2\"></i>
                    </a>
                </div>
                <div class=\"col-lg-5 d-none d-lg-block\">
                    <div class=\"floating-emoji\">
                        <div class=\"emoji-item\" style=\"animation-delay: 0s;\">💎</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 0.5s;\">🚀</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 1s;\">⚡</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 1.5s;\">💰</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 2s;\">🔥</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"alert-ticker\">
        <div class=\"container\">
            <div class=\"d-flex align-items-center justify-content-center gap-3 py-2\">
                <i class=\"bi bi-clock-history text-danger fs-5 animate-pulse\"></i>
                <span class=\"fw-bold\">⚡ LIMITED TIME OFFERS ⚡</span>
                <span class=\"text-muted\">|</span>
                <span>🔥 New deals added daily</span>
                <span class=\"text-muted\">|</span>
                <span>✅ Price drops alert active</span>
            </div>
        </div>
    </div>

    <div class=\"container my-5\" id=\"deals\">
        <div class=\"text-center mb-5\">
            <h2 class=\"display-5 fw-black mb-3\">
                💎 <span class=\"gradient-text\">Editor's Choice Deals</span> 💎
            </h2>
            <p class=\"lead text-muted\">Handpicked by experts. Verified by real tests. Loved by thousands.</p>
        </div>

        <div class=\"row g-4\">
            ";
        // line 87
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 87, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 88
            yield "                ";
            // line 89
            yield "
                ";
            // line 91
            yield "                ";
            $context["displayName"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", true, true, false, 91)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "title", [], "any", false, false, false, 91)) : (((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", true, true, false, 91)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "name", [], "any", false, false, false, 91)) : ("Без име"))));
            // line 92
            yield "
                ";
            // line 94
            yield "                ";
            // line 95
            yield "                ";
            $context["displayImage"] = "";
            // line 96
            yield "                ";
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "imageUrl", [], "any", true, true, false, 96)) {
                $context["displayImage"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "imageUrl", [], "any", false, false, false, 96);
                // line 97
                yield "                ";
            } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", true, true, false, 97)) {
                $context["displayImage"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "image", [], "any", false, false, false, 97);
                // line 98
                yield "                ";
            } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mainImage", [], "any", true, true, false, 98)) {
                $context["displayImage"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "mainImage", [], "any", false, false, false, 98);
                // line 99
                yield "                ";
            }
            // line 100
            yield "
                ";
            // line 102
            yield "                ";
            $context["displayBadge"] = null;
            // line 103
            yield "                ";
            if ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "badge", [], "any", true, true, false, 103) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "badge", [], "any", false, false, false, 103))) {
                $context["displayBadge"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "badge", [], "any", false, false, false, 103);
                // line 104
                yield "                ";
            } elseif ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", true, true, false, 104) && CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, false, 104))) {
                $context["displayBadge"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "category", [], "any", false, false, false, 104);
                // line 105
                yield "                ";
            }
            // line 106
            yield "
                ";
            // line 108
            yield "                ";
            $context["displayRating"] = ((CoreExtension::getAttribute($this->env, $this->source, $context["item"], "rating", [], "any", true, true, false, 108)) ? (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "rating", [], "any", false, false, false, 108)) : (5));
            // line 109
            yield "
                ";
            // line 111
            yield "                ";
            $context["detailUrl"] = "#";
            // line 112
            yield "                ";
            $context["isExternal"] = false;
            // line 113
            yield "
                ";
            // line 114
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "slug", [], "any", true, true, false, 114)) {
                // line 115
                yield "                    ";
                // line 116
                yield "                    ";
                $context["detailUrl"] = $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["item"], "slug", [], "any", false, false, false, 116)]);
                // line 117
                yield "                ";
            } elseif (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", true, true, false, 117)) {
                // line 118
                yield "                    ";
                // line 119
                yield "                    ";
                $context["detailUrl"] = CoreExtension::getAttribute($this->env, $this->source, $context["item"], "link", [], "any", false, false, false, 119);
                // line 120
                yield "                    ";
                $context["isExternal"] = true;
                // line 121
                yield "                ";
            }
            // line 122
            yield "
                ";
            // line 124
            yield "                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"product-card h-100\">
                        ";
            // line 127
            yield "                        ";
            if ((($tmp = (isset($context["displayBadge"]) || array_key_exists("displayBadge", $context) ? $context["displayBadge"] : (function () { throw new RuntimeError('Variable "displayBadge" does not exist.', 127, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 128
                yield "                            <div class=\"product-badge\">
                                <span class=\"badge-premium\">
                                    <i class=\"bi bi-award-fill me-1\"></i>";
                // line 130
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayBadge"]) || array_key_exists("displayBadge", $context) ? $context["displayBadge"] : (function () { throw new RuntimeError('Variable "displayBadge" does not exist.', 130, $this->source); })()), "html", null, true);
                yield "
                                </span>
                            </div>
                        ";
            }
            // line 134
            yield "
                        <div class=\"hot-corner\">
                            <div class=\"hot-label\">🔥 HOT</div>
                        </div>

                        ";
            // line 140
            yield "                        ";
            if ((($tmp = (isset($context["displayImage"]) || array_key_exists("displayImage", $context) ? $context["displayImage"] : (function () { throw new RuntimeError('Variable "displayImage" does not exist.', 140, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 141
                yield "                            <div class=\"product-image-wrapper\">
                                <a href=\"";
                // line 142
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["detailUrl"]) || array_key_exists("detailUrl", $context) ? $context["detailUrl"] : (function () { throw new RuntimeError('Variable "detailUrl" does not exist.', 142, $this->source); })()), "html", null, true);
                yield "\" ";
                if ((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 142, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "target=\"_blank\" rel=\"noopener noreferrer\"";
                }
                yield " aria-label=\"View ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 142, $this->source); })()), "html", null, true);
                yield "\">
                                    <img src=\"";
                // line 143
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayImage"]) || array_key_exists("displayImage", $context) ? $context["displayImage"] : (function () { throw new RuntimeError('Variable "displayImage" does not exist.', 143, $this->source); })()), "html", null, true);
                yield "\" class=\"product-image img-fluid\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 143, $this->source); })()), "html", null, true);
                yield "\" ";
                if ((CoreExtension::getAttribute($this->env, $this->source, $context["loop"], "index", [], "any", false, false, false, 143) <= 4)) {
                    yield "fetchpriority=\"high\" loading=\"eager\"";
                } else {
                    yield "loading=\"lazy\"";
                }
                yield " width=\"220\" height=\"220\" decoding=\"async\">
                                </a>
                                <div class=\"image-overlay\">
                                    <a href=\"";
                // line 146
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["detailUrl"]) || array_key_exists("detailUrl", $context) ? $context["detailUrl"] : (function () { throw new RuntimeError('Variable "detailUrl" does not exist.', 146, $this->source); })()), "html", null, true);
                yield "\" ";
                if ((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 146, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    yield "target=\"_blank\" rel=\"noopener noreferrer\"";
                }
                yield " class=\"quick-view\" style=\"text-decoration: none; cursor: pointer;\" aria-label=\"";
                yield (((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 146, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("View in store") : ("Quick view"));
                yield " ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 146, $this->source); })()), "html", null, true);
                yield "\">
                                        👁️ ";
                // line 147
                yield (((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 147, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("ВИЖ В МАГАЗИНА") : ("QUICK VIEW"));
                yield "
                                    </a>
                                </div>
                            </div>
                        ";
            } else {
                // line 152
                yield "                            <div class=\"product-image-wrapper bg-gradient\">
                                <div class=\"d-flex align-items-center justify-content-center\" style=\"height: 220px;\">
                                    <i class=\"bi bi-image text-white\" style=\"font-size: 3rem;\"></i>
                                </div>
                            </div>
                        ";
            }
            // line 158
            yield "
                        <div class=\"product-body\">
                            <div class=\"d-flex align-items-center gap-2 mb-2\">
                                <div class=\"rating-stars\">
                                    ";
            // line 162
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 163
                yield "                                        ";
                if (($context["i"] <= (isset($context["displayRating"]) || array_key_exists("displayRating", $context) ? $context["displayRating"] : (function () { throw new RuntimeError('Variable "displayRating" does not exist.', 163, $this->source); })()))) {
                    yield "⭐";
                }
                // line 164
                yield "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 165
            yield "                                </div>
                                <span class=\"rating-number\">";
            // line 166
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayRating"]) || array_key_exists("displayRating", $context) ? $context["displayRating"] : (function () { throw new RuntimeError('Variable "displayRating" does not exist.', 166, $this->source); })()), "html", null, true);
            yield ".0</span>
                            </div>

                            <h3 class=\"product-title\">";
            // line 169
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), (isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 169, $this->source); })()), 0, 50), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), (isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 169, $this->source); })())) > 50)) {
                yield "...";
            }
            yield "</h3>

                            <div class=\"product-price-section\">
                                <div class=\"current-price\">
                                    ";
            // line 173
            if (CoreExtension::getAttribute($this->env, $this->source, $context["item"], "price", [], "any", true, true, false, 173)) {
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["item"], "price", [], "any", false, false, false, 173), "html", null, true);
                yield " лв.";
            }
            // line 174
            yield "                                </div>
                                <div class=\"price-tag\">💰 BEST PRICE</div>
                            </div>

                            <a href=\"";
            // line 178
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["detailUrl"]) || array_key_exists("detailUrl", $context) ? $context["detailUrl"] : (function () { throw new RuntimeError('Variable "detailUrl" does not exist.', 178, $this->source); })()), "html", null, true);
            yield "\" class=\"btn-product-cta\" ";
            if ((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 178, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                yield "target=\"_blank\" rel=\"noopener noreferrer\"";
            }
            yield " aria-label=\"";
            yield (((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 178, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("Buy now") : ("View deal"));
            yield " - ";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["displayName"]) || array_key_exists("displayName", $context) ? $context["displayName"] : (function () { throw new RuntimeError('Variable "displayName" does not exist.', 178, $this->source); })()), "html", null, true);
            yield "\">
                                <span class=\"cta-text\">
                                    <i class=\"bi bi-lightning-charge-fill me-1\" aria-hidden=\"true\"></i>
                                    ";
            // line 181
            yield (((($tmp = (isset($context["isExternal"]) || array_key_exists("isExternal", $context) ? $context["isExternal"] : (function () { throw new RuntimeError('Variable "isExternal" does not exist.', 181, $this->source); })())) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("КУПИ СЕГА") : ("VIEW DEAL"));
            yield "
                                    <i class=\"bi bi-arrow-right ms-1\" aria-hidden=\"true\"></i>
                                </span>
                                <span class=\"cta-glow\"></span>
                            </a>

                            <div class=\"trust-icons\">
                                <span class=\"trust-item\" title=\"Free Shipping\">🚚</span>
                                <span class=\"trust-item\" title=\"30-Day Returns\">↩️</span>
                                <span class=\"trust-item\" title=\"Secure Payment\">🔒</span>
                                <span class=\"trust-item\" title=\"Expert Tested\">✅</span>
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
        // line 196
        if (!$context['_iterated']) {
            // line 197
            yield "                <div class=\"col-12\">
                    <div class=\"alert alert-light text-center rounded-4 border-0 shadow-sm py-5\">
                        <div class=\"display-1 mb-3\">😢</div>
                        <h4 class=\"fw-bold mb-2\">No deals available yet</h4>
                        <p class=\"text-muted mb-0\">Check back soon for amazing offers!</p>
                    </div>
                </div>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent'], $context['_iterated'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 205
        yield "        </div>

        ";
        // line 208
        yield "        ";
        $context["current"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 208, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 208);
        // line 209
        yield "        ";
        $context["total"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 209, $this->source); })()), "pageCount", [], "any", false, false, false, 209);
        // line 210
        yield "        ";
        $context["range"] = 2;
        // line 211
        yield "
        ";
        // line 212
        if (((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 212, $this->source); })()) > 1)) {
            // line 213
            yield "            <div class=\"d-flex flex-wrap justify-content-center gap-2 my-5\">
                ";
            // line 214
            if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 214, $this->source); })()) > 1)) {
                // line 215
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 215, $this->source); })()), "request", [], "any", false, false, false, 215), "query", [], "any", false, false, false, 215), "all", [], "any", false, false, false, 215), ["page" => ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 215, $this->source); })()) - 1)])), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-square\">Назад</a>
                ";
            }
            // line 217
            yield "
                <a href=\"";
            // line 218
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 218, $this->source); })()), "request", [], "any", false, false, false, 218), "query", [], "any", false, false, false, 218), "all", [], "any", false, false, false, 218), ["page" => 1])), "html", null, true);
            yield "\" class=\"btn ";
            yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 218, $this->source); })()) == 1)) ? ("btn-primary") : ("btn-outline-primary"));
            yield " btn-square\">1</a>

                ";
            // line 220
            if ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 220, $this->source); })()) - (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 220, $this->source); })())) > 2)) {
                // line 221
                yield "                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                ";
            }
            // line 223
            yield "
                ";
            // line 224
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 224, $this->source); })()) - (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 224, $this->source); })())), ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 224, $this->source); })()) + (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 224, $this->source); })()))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 225
                yield "                    ";
                if ((($context["i"] > 1) && ($context["i"] < (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 225, $this->source); })())))) {
                    // line 226
                    yield "                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 226, $this->source); })()), "request", [], "any", false, false, false, 226), "query", [], "any", false, false, false, 226), "all", [], "any", false, false, false, 226), ["page" => $context["i"]])), "html", null, true);
                    yield "\" class=\"btn ";
                    yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 226, $this->source); })()) == $context["i"])) ? ("btn-primary") : ("btn-outline-primary"));
                    yield " btn-square\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
                    ";
                }
                // line 228
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 229
            yield "
                ";
            // line 230
            if ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 230, $this->source); })()) + (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 230, $this->source); })())) < ((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 230, $this->source); })()) - 1))) {
                // line 231
                yield "                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                ";
            }
            // line 233
            yield "
                <a href=\"";
            // line 234
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 234, $this->source); })()), "request", [], "any", false, false, false, 234), "query", [], "any", false, false, false, 234), "all", [], "any", false, false, false, 234), ["page" => (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 234, $this->source); })())])), "html", null, true);
            yield "\" class=\"btn ";
            yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 234, $this->source); })()) == (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 234, $this->source); })()))) ? ("btn-primary") : ("btn-outline-primary"));
            yield " btn-square\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 234, $this->source); })()), "html", null, true);
            yield "</a>

                ";
            // line 236
            if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 236, $this->source); })()) < (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 236, $this->source); })()))) {
                // line 237
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 237, $this->source); })()), "request", [], "any", false, false, false, 237), "query", [], "any", false, false, false, 237), "all", [], "any", false, false, false, 237), ["page" => ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 237, $this->source); })()) + 1)])), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-square\">Напред</a>
                ";
            }
            // line 239
            yield "            </div>
        ";
        }
        // line 241
        yield "    </div>

    <div class=\"bottom-cta-section\">
        <div class=\"container text-center py-5\">
            <div class=\"display-4 fw-black text-white mb-3\">⚡ Don't Miss Out! ⚡</div>
            <p class=\"lead text-white mb-4 opacity-90\">Join thousands of smart shoppers getting the best tech deals</p>
            <a href=\"#deals\" class=\"btn btn-mega-white btn-lg px-5 py-3 fw-black\">
                <i class=\"bi bi-arrow-up me-2\"></i>BACK TO DEALS
            </a>
        </div>
    </div>

    <style>
        /* Typography */
        .fw-black { font-weight: 900 !important; }
        .text-shadow { text-shadow: 0 4px 20px rgba(0,0,0,0.3); }

        /* MEGA HERO SECTION */
        .mega-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 600px;
            position: relative;
            overflow: hidden;
        }

        /* Fix CLS: Reserve space for hero content */
        .hero-row {
            min-height: 450px;
        }

        @media (min-width: 992px) {
            .hero-row {
                min-height: 500px;
            }
        }

        .animated-blobs {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            contain: strict;
        }

        .btn-square {
            min-height: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-square:first-child, .btn-square:last-child {
            min-width: auto;
            padding: 0 15px;
        }

        .animated-blobs::before,
        .animated-blobs::after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            will-change: transform;
            animation: float 20s infinite ease-in-out;
            backface-visibility: hidden;
        }

        .animated-blobs::before {
            width: 500px;
            height: 500px;
            top: -250px;
            right: -100px;
        }

        .animated-blobs::after {
            width: 400px;
            height: 400px;
            bottom: -200px;
            left: -100px;
        }

        @keyframes float {
            0%, 100% { transform: translate3d(0, 0, 0) rotate(0deg); }
            33% { transform: translate3d(30px, -50px, 0) rotate(120deg); }
            66% { transform: translate3d(-20px, 30px, 0) rotate(240deg); }
        }

        .gradient-text {
            position: relative;
            background: linear-gradient(90deg, #fff 0%, #f093fb 25%, #fff 50%, #f093fb 75%, #fff 100%);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            will-change: background-position;
            animation: gradient-flow 3s linear infinite;
        }

        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .badge-hot {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 800;
            border: 2px solid rgba(255, 255, 255, 0.3);
            position: relative;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .badge-hot::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.4) 0%, transparent 70%);
            opacity: 0;
            animation: pulse-glow 2s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0; transform: scale(0.95); }
            50% { opacity: 1; transform: scale(1.05); }
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            min-width: 120px;
            min-height: 95px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stat-box .fs-2 {
            line-height: 1.2;
            height: 40px;
            display: flex;
            align-items: center;
        }

        .stat-box .small {
            height: 20px;
            line-height: 1;
        }

        .btn-mega-cta {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
            border: none;
            color: white !important;
            border-radius: 50px;
            box-shadow: 0 10px 40px rgba(255, 107, 107, 0.4);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .btn-mega-cta:hover {
            transform: scale(1.05);
        }

        .floating-emoji {
            position: relative;
            height: 400px;
            contain: layout style paint;
        }
        .emoji-item {
            position: absolute;
            font-size: 5rem;
            animation: float-emoji 6s infinite ease-in-out;
            will-change: transform;
        }
        @keyframes float-emoji {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        /* PRODUCT CARD - STRICT PERFORMANCE MODE */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .badge-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; }
        .hot-label { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); color: white; padding: 8px 16px; font-size: 0.7rem; font-weight: 900; border-bottom-left-radius: 15px; }

        .product-image-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f8f9fa;
        }
        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(102, 126, 234, 0.85); display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s ease;
        }
        .product-card:hover .image-overlay { opacity: 1; }
        .quick-view { color: white; font-weight: 800; }

        .product-body { padding: 18px; }
        .product-title { font-size: 0.95rem; font-weight: 700; color: #2d3748; min-height: 42px; margin-bottom: 12px; }
        .current-price { font-size: 1.75rem; font-weight: 900; color: #ff6b6b; }

        .btn-product-cta {
            display: block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; text-align: center; padding: 14px 20px; border-radius: 12px;
            font-weight: 800; text-decoration: none; transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .btn-product-cta:hover {
            transform: scale(1.02);
        }

        .bottom-cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            content-visibility: auto;
            contain-intrinsic-size: 0 400px;
        }
        .btn-mega-white {
            background: white;
            color: #667eea !important;
            border-radius: 50px;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .btn-mega-white:hover {
            transform: scale(1.05);
        }

        html { scroll-behavior: smooth; }
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
        return "review/index.html.twig";
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
        return array (  621 => 241,  617 => 239,  611 => 237,  609 => 236,  600 => 234,  597 => 233,  593 => 231,  591 => 230,  588 => 229,  582 => 228,  572 => 226,  569 => 225,  565 => 224,  562 => 223,  558 => 221,  556 => 220,  549 => 218,  546 => 217,  540 => 215,  538 => 214,  535 => 213,  533 => 212,  530 => 211,  527 => 210,  524 => 209,  521 => 208,  517 => 205,  504 => 197,  502 => 196,  474 => 181,  460 => 178,  454 => 174,  449 => 173,  439 => 169,  433 => 166,  430 => 165,  424 => 164,  419 => 163,  415 => 162,  409 => 158,  401 => 152,  393 => 147,  381 => 146,  367 => 143,  357 => 142,  354 => 141,  351 => 140,  344 => 134,  337 => 130,  333 => 128,  330 => 127,  326 => 124,  323 => 122,  320 => 121,  317 => 120,  314 => 119,  312 => 118,  309 => 117,  306 => 116,  304 => 115,  302 => 114,  299 => 113,  296 => 112,  293 => 111,  290 => 109,  287 => 108,  284 => 106,  281 => 105,  277 => 104,  273 => 103,  270 => 102,  267 => 100,  264 => 99,  260 => 98,  256 => 97,  252 => 96,  249 => 95,  247 => 94,  244 => 92,  241 => 91,  238 => 89,  236 => 88,  218 => 87,  146 => 17,  133 => 16,  121 => 13,  115 => 11,  112 => 10,  109 => 9,  106 => 8,  101 => 6,  88 => 5,  65 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}   Best Tech Deals 2025 - Exclusive Reviews & Hot Offers{% endblock %}

{% block stylesheets %}
    {{ parent() }}
    {# Preload first hero image for LCP optimization #}
    {% if reviews|length > 0 %}
        {% set firstImage = reviews[0].imageUrl ?? reviews[0].image ?? reviews[0].mainImage ?? null %}
        {% if firstImage %}
            <link rel=\"preload\" as=\"image\" href=\"{{ firstImage }}\" fetchpriority=\"high\">
        {% endif %}
    {% endif %}
{% endblock %}

{% block body %}

    <div class=\"mega-hero position-relative overflow-hidden\">
        <div class=\"animated-blobs\"></div>
        <div class=\"container position-relative\" style=\"z-index: 2;\">
            <div class=\"row align-items-center py-5 hero-row\">
                <div class=\"col-lg-7 text-white py-5\">
                    <div class=\"mb-3\">
                        <span class=\"badge-hot\">TRENDING NOW</span>
                    </div>
                    <h1 class=\"display-2 fw-black mb-4 text-shadow\">
                        Get The Best Tech<br>
                        <span class=\"gradient-text\">Before It Sells Out!</span>
                    </h1>
                    <p class=\"lead fs-3 mb-4 fw-semibold\">
                        💰 Exclusive deals • ⚡ Expert reviews • ✅ Verified picks
                    </p>
                    <div class=\"d-flex flex-wrap gap-3 mb-4\">
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">50+</div>
                            <div class=\"small opacity-90\">Products Tested</div>
                        </div>
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">100%</div>
                            <div class=\"small opacity-90\">Honest Reviews</div>
                        </div>
                        <div class=\"stat-box\">
                            <div class=\"fs-2 fw-black\">24/7</div>
                            <div class=\"small opacity-90\">Price Updates</div>
                        </div>
                    </div>
                    <a href=\"#deals\" class=\"btn btn-mega-cta btn-lg px-5 py-3 fw-black\">
                        <i class=\"bi bi-lightning-charge-fill me-2\"></i>SHOP HOT DEALS NOW
                        <i class=\"bi bi-arrow-right ms-2\"></i>
                    </a>
                </div>
                <div class=\"col-lg-5 d-none d-lg-block\">
                    <div class=\"floating-emoji\">
                        <div class=\"emoji-item\" style=\"animation-delay: 0s;\">💎</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 0.5s;\">🚀</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 1s;\">⚡</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 1.5s;\">💰</div>
                        <div class=\"emoji-item\" style=\"animation-delay: 2s;\">🔥</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class=\"alert-ticker\">
        <div class=\"container\">
            <div class=\"d-flex align-items-center justify-content-center gap-3 py-2\">
                <i class=\"bi bi-clock-history text-danger fs-5 animate-pulse\"></i>
                <span class=\"fw-bold\">⚡ LIMITED TIME OFFERS ⚡</span>
                <span class=\"text-muted\">|</span>
                <span>🔥 New deals added daily</span>
                <span class=\"text-muted\">|</span>
                <span>✅ Price drops alert active</span>
            </div>
        </div>
    </div>

    <div class=\"container my-5\" id=\"deals\">
        <div class=\"text-center mb-5\">
            <h2 class=\"display-5 fw-black mb-3\">
                💎 <span class=\"gradient-text\">Editor's Choice Deals</span> 💎
            </h2>
            <p class=\"lead text-muted\">Handpicked by experts. Verified by real tests. Loved by thousands.</p>
        </div>

        <div class=\"row g-4\">
            {% for item in reviews %}
                {# --- 1. НОРМАЛИЗИРАНЕ НА ДАННИТЕ (Smart Logic) --- #}

                {# Име #}
                {% set displayName = item.title is defined ? item.title : (item.name is defined ? item.name : 'Без име') %}

                {# Снимка #}
                {# Проверяваме различни варианти за снимка според Entity-то #}
                {% set displayImage = '' %}
                {% if item.imageUrl is defined %}{% set displayImage = item.imageUrl %}
                {% elseif item.image is defined %}{% set displayImage = item.image %}
                {% elseif item.mainImage is defined %}{% set displayImage = item.mainImage %}
                {% endif %}

                {# Бадж / Категория #}
                {% set displayBadge = null %}
                {% if item.badge is defined and item.badge %}{% set displayBadge = item.badge %}
                {% elseif item.category is defined and item.category %}{% set displayBadge = item.category %}
                {% endif %}

                {# Рейтинг (Продуктите нямат, слагаме 5.0 по подразбиране или скриваме) #}
                {% set displayRating = item.rating is defined ? item.rating : 5 %}

                {# Линк (Ревютата водят към вътрешна страница, Продуктите директно към магазина) #}
                {% set detailUrl = '#' %}
                {% set isExternal = false %}

                {% if item.slug is defined %}
                    {# Това е Ревю -> Вътрешна страница #}
                    {% set detailUrl = path('app_review_show', {slug: item.slug}) %}
                {% elseif item.link is defined %}
                    {# Това е Продукт -> Директен линк #}
                    {% set detailUrl = item.link %}
                    {% set isExternal = true %}
                {% endif %}

                {# --- 2. ВИЗУАЛИЗАЦИЯ --- #}
                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"product-card h-100\">
                        {# БАДЖ #}
                        {% if displayBadge %}
                            <div class=\"product-badge\">
                                <span class=\"badge-premium\">
                                    <i class=\"bi bi-award-fill me-1\"></i>{{ displayBadge }}
                                </span>
                            </div>
                        {% endif %}

                        <div class=\"hot-corner\">
                            <div class=\"hot-label\">🔥 HOT</div>
                        </div>

                        {# СНИМКА #}
                        {% if displayImage %}
                            <div class=\"product-image-wrapper\">
                                <a href=\"{{ detailUrl }}\" {% if isExternal %}target=\"_blank\" rel=\"noopener noreferrer\"{% endif %} aria-label=\"View {{ displayName }}\">
                                    <img src=\"{{ displayImage }}\" class=\"product-image img-fluid\" alt=\"{{ displayName }}\" {% if loop.index <= 4 %}fetchpriority=\"high\" loading=\"eager\"{% else %}loading=\"lazy\"{% endif %} width=\"220\" height=\"220\" decoding=\"async\">
                                </a>
                                <div class=\"image-overlay\">
                                    <a href=\"{{ detailUrl }}\" {% if isExternal %}target=\"_blank\" rel=\"noopener noreferrer\"{% endif %} class=\"quick-view\" style=\"text-decoration: none; cursor: pointer;\" aria-label=\"{{ isExternal ? 'View in store' : 'Quick view' }} {{ displayName }}\">
                                        👁️ {{ isExternal ? 'ВИЖ В МАГАЗИНА' : 'QUICK VIEW' }}
                                    </a>
                                </div>
                            </div>
                        {% else %}
                            <div class=\"product-image-wrapper bg-gradient\">
                                <div class=\"d-flex align-items-center justify-content-center\" style=\"height: 220px;\">
                                    <i class=\"bi bi-image text-white\" style=\"font-size: 3rem;\"></i>
                                </div>
                            </div>
                        {% endif %}

                        <div class=\"product-body\">
                            <div class=\"d-flex align-items-center gap-2 mb-2\">
                                <div class=\"rating-stars\">
                                    {% for i in 1..5 %}
                                        {% if i <= displayRating %}⭐{% endif %}
                                    {% endfor %}
                                </div>
                                <span class=\"rating-number\">{{ displayRating }}.0</span>
                            </div>

                            <h3 class=\"product-title\">{{ displayName|slice(0, 50) }}{% if displayName|length > 50 %}...{% endif %}</h3>

                            <div class=\"product-price-section\">
                                <div class=\"current-price\">
                                    {% if item.price is defined %}{{ item.price }} лв.{% endif %}
                                </div>
                                <div class=\"price-tag\">💰 BEST PRICE</div>
                            </div>

                            <a href=\"{{ detailUrl }}\" class=\"btn-product-cta\" {% if isExternal %}target=\"_blank\" rel=\"noopener noreferrer\"{% endif %} aria-label=\"{{ isExternal ? 'Buy now' : 'View deal' }} - {{ displayName }}\">
                                <span class=\"cta-text\">
                                    <i class=\"bi bi-lightning-charge-fill me-1\" aria-hidden=\"true\"></i>
                                    {{ isExternal ? 'КУПИ СЕГА' : 'VIEW DEAL' }}
                                    <i class=\"bi bi-arrow-right ms-1\" aria-hidden=\"true\"></i>
                                </span>
                                <span class=\"cta-glow\"></span>
                            </a>

                            <div class=\"trust-icons\">
                                <span class=\"trust-item\" title=\"Free Shipping\">🚚</span>
                                <span class=\"trust-item\" title=\"30-Day Returns\">↩️</span>
                                <span class=\"trust-item\" title=\"Secure Payment\">🔒</span>
                                <span class=\"trust-item\" title=\"Expert Tested\">✅</span>
                            </div>
                        </div>
                    </div>
                </div>
            {% else %}
                <div class=\"col-12\">
                    <div class=\"alert alert-light text-center rounded-4 border-0 shadow-sm py-5\">
                        <div class=\"display-1 mb-3\">😢</div>
                        <h4 class=\"fw-bold mb-2\">No deals available yet</h4>
                        <p class=\"text-muted mb-0\">Check back soon for amazing offers!</p>
                    </div>
                </div>
            {% endfor %}
        </div>

        {# Настройки за пагинацията #}
        {% set current = reviews.currentPageNumber %}
        {% set total = reviews.pageCount %}
        {% set range = 2 %}

        {% if total > 1 %}
            <div class=\"d-flex flex-wrap justify-content-center gap-2 my-5\">
                {% if current > 1 %}
                    <a href=\"{{ path('app_home', app.request.query.all|merge({'page': current - 1})) }}\" class=\"btn btn-outline-primary btn-square\">Назад</a>
                {% endif %}

                <a href=\"{{ path('app_home', app.request.query.all|merge({'page': 1})) }}\" class=\"btn {{ current == 1 ? 'btn-primary' : 'btn-outline-primary' }} btn-square\">1</a>

                {% if current - range > 2 %}
                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                {% endif %}

                {% for i in (current - range)..(current + range) %}
                    {% if i > 1 and i < total %}
                        <a href=\"{{ path('app_home', app.request.query.all|merge({'page': i})) }}\" class=\"btn {{ current == i ? 'btn-primary' : 'btn-outline-primary' }} btn-square\">{{ i }}</a>
                    {% endif %}
                {% endfor %}

                {% if current + range < total - 1 %}
                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                {% endif %}

                <a href=\"{{ path('app_home', app.request.query.all|merge({'page': total})) }}\" class=\"btn {{ current == total ? 'btn-primary' : 'btn-outline-primary' }} btn-square\">{{ total }}</a>

                {% if current < total %}
                    <a href=\"{{ path('app_home', app.request.query.all|merge({'page': current + 1})) }}\" class=\"btn btn-outline-primary btn-square\">Напред</a>
                {% endif %}
            </div>
        {% endif %}
    </div>

    <div class=\"bottom-cta-section\">
        <div class=\"container text-center py-5\">
            <div class=\"display-4 fw-black text-white mb-3\">⚡ Don't Miss Out! ⚡</div>
            <p class=\"lead text-white mb-4 opacity-90\">Join thousands of smart shoppers getting the best tech deals</p>
            <a href=\"#deals\" class=\"btn btn-mega-white btn-lg px-5 py-3 fw-black\">
                <i class=\"bi bi-arrow-up me-2\"></i>BACK TO DEALS
            </a>
        </div>
    </div>

    <style>
        /* Typography */
        .fw-black { font-weight: 900 !important; }
        .text-shadow { text-shadow: 0 4px 20px rgba(0,0,0,0.3); }

        /* MEGA HERO SECTION */
        .mega-hero {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 50%, #f093fb 100%);
            min-height: 600px;
            position: relative;
            overflow: hidden;
        }

        /* Fix CLS: Reserve space for hero content */
        .hero-row {
            min-height: 450px;
        }

        @media (min-width: 992px) {
            .hero-row {
                min-height: 500px;
            }
        }

        .animated-blobs {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
            contain: strict;
        }

        .btn-square {
            min-height: 42px;
            height: 42px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            padding: 0 10px;
            font-weight: 600;
            border-radius: 6px;
        }

        .btn-square:first-child, .btn-square:last-child {
            min-width: auto;
            padding: 0 15px;
        }

        .animated-blobs::before,
        .animated-blobs::after {
            content: '';
            position: absolute;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            will-change: transform;
            animation: float 20s infinite ease-in-out;
            backface-visibility: hidden;
        }

        .animated-blobs::before {
            width: 500px;
            height: 500px;
            top: -250px;
            right: -100px;
        }

        .animated-blobs::after {
            width: 400px;
            height: 400px;
            bottom: -200px;
            left: -100px;
        }

        @keyframes float {
            0%, 100% { transform: translate3d(0, 0, 0) rotate(0deg); }
            33% { transform: translate3d(30px, -50px, 0) rotate(120deg); }
            66% { transform: translate3d(-20px, 30px, 0) rotate(240deg); }
        }

        .gradient-text {
            position: relative;
            background: linear-gradient(90deg, #fff 0%, #f093fb 25%, #fff 50%, #f093fb 75%, #fff 100%);
            background-size: 200% 100%;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            will-change: background-position;
            animation: gradient-flow 3s linear infinite;
        }

        @keyframes gradient-flow {
            0% { background-position: 0% 50%; }
            100% { background-position: 200% 50%; }
        }

        .badge-hot {
            display: inline-block;
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            color: white;
            padding: 8px 20px;
            border-radius: 50px;
            font-weight: 800;
            border: 2px solid rgba(255, 255, 255, 0.3);
            position: relative;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.3);
        }

        .badge-hot::before {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50px;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.4) 0%, transparent 70%);
            opacity: 0;
            animation: pulse-glow 2s ease-in-out infinite;
            pointer-events: none;
            z-index: -1;
        }

        @keyframes pulse-glow {
            0%, 100% { opacity: 0; transform: scale(0.95); }
            50% { opacity: 1; transform: scale(1.05); }
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(10px);
            padding: 15px 25px;
            border-radius: 15px;
            border: 2px solid rgba(255, 255, 255, 0.2);
            text-align: center;
            min-width: 120px;
            min-height: 95px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .stat-box .fs-2 {
            line-height: 1.2;
            height: 40px;
            display: flex;
            align-items: center;
        }

        .stat-box .small {
            height: 20px;
            line-height: 1;
        }

        .btn-mega-cta {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
            border: none;
            color: white !important;
            border-radius: 50px;
            box-shadow: 0 10px 40px rgba(255, 107, 107, 0.4);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .btn-mega-cta:hover {
            transform: scale(1.05);
        }

        .floating-emoji {
            position: relative;
            height: 400px;
            contain: layout style paint;
        }
        .emoji-item {
            position: absolute;
            font-size: 5rem;
            animation: float-emoji 6s infinite ease-in-out;
            will-change: transform;
        }
        @keyframes float-emoji {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-30px); }
        }

        /* PRODUCT CARD - STRICT PERFORMANCE MODE */
        .product-card {
            background: white;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        .badge-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; }
        .hot-label { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); color: white; padding: 8px 16px; font-size: 0.7rem; font-weight: 900; border-bottom-left-radius: 15px; }

        .product-image-wrapper {
            position: relative;
            height: 220px;
            overflow: hidden;
            background: #f8f9fa;
        }
        .product-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.3s ease;
        }

        .product-card:hover .product-image {
            transform: scale(1.05);
        }

        .image-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            background: rgba(102, 126, 234, 0.85); display: flex; align-items: center; justify-content: center;
            opacity: 0; transition: opacity 0.3s ease;
        }
        .product-card:hover .image-overlay { opacity: 1; }
        .quick-view { color: white; font-weight: 800; }

        .product-body { padding: 18px; }
        .product-title { font-size: 0.95rem; font-weight: 700; color: #2d3748; min-height: 42px; margin-bottom: 12px; }
        .current-price { font-size: 1.75rem; font-weight: 900; color: #ff6b6b; }

        .btn-product-cta {
            display: block; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white; text-align: center; padding: 14px 20px; border-radius: 12px;
            font-weight: 800; text-decoration: none; transition: transform 0.3s ease, opacity 0.3s ease;
        }

        .btn-product-cta:hover {
            transform: scale(1.02);
        }

        .bottom-cta-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            content-visibility: auto;
            contain-intrinsic-size: 0 400px;
        }
        .btn-mega-white {
            background: white;
            color: #667eea !important;
            border-radius: 50px;
            transition: transform 0.3s ease, opacity 0.3s ease;
        }
        .btn-mega-white:hover {
            transform: scale(1.05);
        }

        html { scroll-behavior: smooth; }
    </style>

{% endblock %}
", "review/index.html.twig", "/home/needy/affiliate-site/templates/review/index.html.twig");
    }
}
