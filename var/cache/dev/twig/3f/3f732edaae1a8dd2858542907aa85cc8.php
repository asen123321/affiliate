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
    public function block_body(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $__internal_5a27a8ba21ca79b61932376b2fa922d2 = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_5a27a8ba21ca79b61932376b2fa922d2->enter($__internal_5a27a8ba21ca79b61932376b2fa922d2_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_6f47bbe9983af81f1e7450e9a3e3768f = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_6f47bbe9983af81f1e7450e9a3e3768f->enter($__internal_6f47bbe9983af81f1e7450e9a3e3768f_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        yield "
    <div class=\"mega-hero position-relative overflow-hidden\">
        <div class=\"animated-blobs\"></div>
        <div class=\"container position-relative\" style=\"z-index: 2;\">
            <div class=\"row align-items-center py-5\">
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
        // line 76
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable((isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 76, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["review"]) {
            // line 77
            yield "                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"product-card h-100\">
                        ";
            // line 79
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["review"], "badge", [], "any", false, false, false, 79)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 80
                yield "                            <div class=\"product-badge\">
                    <span class=\"badge-premium\">
                        <i class=\"bi bi-award-fill me-1\"></i>";
                // line 82
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "badge", [], "any", false, false, false, 82), "html", null, true);
                yield "
                    </span>
                            </div>
                        ";
            }
            // line 86
            yield "
                        <div class=\"hot-corner\">
                            <div class=\"hot-label\">🔥 HOT</div>
                        </div>

                        ";
            // line 91
            if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, $context["review"], "imageUrl", [], "any", false, false, false, 91)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 92
                yield "                            <div class=\"product-image-wrapper\">
                                <a href=\"";
                // line 93
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["review"], "id", [], "any", false, false, false, 93)]), "html", null, true);
                yield "\" target=\"_blank\">
                                    <img src=\"";
                // line 94
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "imageUrl", [], "any", false, false, false, 94), "html", null, true);
                yield "\" class=\"product-image img-fluid\" alt=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 94), "html", null, true);
                yield "\" loading=\"lazy\">
                                </a>
                                <div class=\"image-overlay\">
                                    <a href=\"";
                // line 97
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_buy_redirect", ["id" => CoreExtension::getAttribute($this->env, $this->source, $context["review"], "id", [], "any", false, false, false, 97)]), "html", null, true);
                yield "\" target=\"_blank\" class=\"quick-view\" style=\"text-decoration: none; cursor: pointer;\">
                                        👁️ QUICK VIEW
                                    </a>
                                </div>
                            </div>
                        ";
            } else {
                // line 103
                yield "                            <div class=\"product-image-wrapper bg-gradient\">
                                <div class=\"d-flex align-items-center justify-content-center\" style=\"height: 220px;\">
                                    <i class=\"bi bi-image text-white\" style=\"font-size: 3rem;\"></i>
                                </div>
                            </div>
                        ";
            }
            // line 109
            yield "
                        <div class=\"product-body\">
                            <div class=\"d-flex align-items-center gap-2 mb-2\">
                                <div class=\"rating-stars\">
                                    ";
            // line 113
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(1, 5));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 114
                yield "                                        ";
                if (($context["i"] <= CoreExtension::getAttribute($this->env, $this->source, $context["review"], "rating", [], "any", false, false, false, 114))) {
                    yield "⭐";
                }
                // line 115
                yield "                                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 116
            yield "                                </div>
                                <span class=\"rating-number\">";
            // line 117
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "rating", [], "any", false, false, false, 117), "html", null, true);
            yield ".0</span>
                            </div>

                            <h3 class=\"product-title\">";
            // line 120
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::slice($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 120), 0, 50), "html", null, true);
            if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), CoreExtension::getAttribute($this->env, $this->source, $context["review"], "title", [], "any", false, false, false, 120)) > 50)) {
                yield "...";
            }
            yield "</h3>

                            <div class=\"product-price-section\">
                                <div class=\"current-price\">";
            // line 123
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["review"], "price", [], "any", false, false, false, 123), "html", null, true);
            yield " лв.</div>
                                <div class=\"price-tag\">💰 BEST PRICE</div>
                            </div>

                            <a href=\"";
            // line 127
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_review_show", ["slug" => CoreExtension::getAttribute($this->env, $this->source, $context["review"], "slug", [], "any", false, false, false, 127)]), "html", null, true);
            yield "\" class=\"btn-product-cta\">
                        <span class=\"cta-text\">
                            <i class=\"bi bi-lightning-charge-fill me-1\"></i>
                            VIEW DEAL
                            <i class=\"bi bi-arrow-right ms-1\"></i>
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
        }
        // line 145
        if (!$context['_iterated']) {
            // line 146
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
        unset($context['_seq'], $context['_key'], $context['review'], $context['_parent'], $context['_iterated']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 154
        yield "        </div>

        ";
        // line 157
        yield "        ";
        $context["current"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 157, $this->source); })()), "currentPageNumber", [], "any", false, false, false, 157);
        // line 158
        yield "        ";
        $context["total"] = CoreExtension::getAttribute($this->env, $this->source, (isset($context["reviews"]) || array_key_exists("reviews", $context) ? $context["reviews"] : (function () { throw new RuntimeError('Variable "reviews" does not exist.', 158, $this->source); })()), "pageCount", [], "any", false, false, false, 158);
        // line 159
        yield "        ";
        $context["range"] = 2;
        // line 160
        yield "
        ";
        // line 161
        if (((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 161, $this->source); })()) > 1)) {
            // line 162
            yield "            <div class=\"d-flex flex-wrap justify-content-center gap-2 my-5\">
                ";
            // line 163
            if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 163, $this->source); })()) > 1)) {
                // line 164
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 164, $this->source); })()), "request", [], "any", false, false, false, 164), "query", [], "any", false, false, false, 164), "all", [], "any", false, false, false, 164), ["page" => ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 164, $this->source); })()) - 1)])), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-square\">Назад</a>
                ";
            }
            // line 166
            yield "
                <a href=\"";
            // line 167
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 167, $this->source); })()), "request", [], "any", false, false, false, 167), "query", [], "any", false, false, false, 167), "all", [], "any", false, false, false, 167), ["page" => 1])), "html", null, true);
            yield "\" class=\"btn ";
            yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 167, $this->source); })()) == 1)) ? ("btn-primary") : ("btn-outline-primary"));
            yield " btn-square\">1</a>

                ";
            // line 169
            if ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 169, $this->source); })()) - (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 169, $this->source); })())) > 2)) {
                // line 170
                yield "                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                ";
            }
            // line 172
            yield "
                ";
            // line 173
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(range(((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 173, $this->source); })()) - (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 173, $this->source); })())), ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 173, $this->source); })()) + (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 173, $this->source); })()))));
            foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                // line 174
                yield "                    ";
                if ((($context["i"] > 1) && ($context["i"] < (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 174, $this->source); })())))) {
                    // line 175
                    yield "                        <a href=\"";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 175, $this->source); })()), "request", [], "any", false, false, false, 175), "query", [], "any", false, false, false, 175), "all", [], "any", false, false, false, 175), ["page" => $context["i"]])), "html", null, true);
                    yield "\" class=\"btn ";
                    yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 175, $this->source); })()) == $context["i"])) ? ("btn-primary") : ("btn-outline-primary"));
                    yield " btn-square\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
                    ";
                }
                // line 177
                yield "                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 178
            yield "
                ";
            // line 179
            if ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 179, $this->source); })()) + (isset($context["range"]) || array_key_exists("range", $context) ? $context["range"] : (function () { throw new RuntimeError('Variable "range" does not exist.', 179, $this->source); })())) < ((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 179, $this->source); })()) - 1))) {
                // line 180
                yield "                    <span class=\"btn btn-outline-secondary btn-square disabled border-0\">...</span>
                ";
            }
            // line 182
            yield "
                <a href=\"";
            // line 183
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 183, $this->source); })()), "request", [], "any", false, false, false, 183), "query", [], "any", false, false, false, 183), "all", [], "any", false, false, false, 183), ["page" => (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 183, $this->source); })())])), "html", null, true);
            yield "\" class=\"btn ";
            yield ((((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 183, $this->source); })()) == (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 183, $this->source); })()))) ? ("btn-primary") : ("btn-outline-primary"));
            yield " btn-square\">";
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 183, $this->source); })()), "html", null, true);
            yield "</a>

                ";
            // line 185
            if (((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 185, $this->source); })()) < (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 185, $this->source); })()))) {
                // line 186
                yield "                    <a href=\"";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_home", Twig\Extension\CoreExtension::merge(CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, (isset($context["app"]) || array_key_exists("app", $context) ? $context["app"] : (function () { throw new RuntimeError('Variable "app" does not exist.', 186, $this->source); })()), "request", [], "any", false, false, false, 186), "query", [], "any", false, false, false, 186), "all", [], "any", false, false, false, 186), ["page" => ((isset($context["current"]) || array_key_exists("current", $context) ? $context["current"] : (function () { throw new RuntimeError('Variable "current" does not exist.', 186, $this->source); })()) + 1)])), "html", null, true);
                yield "\" class=\"btn btn-outline-primary btn-square\">Напред</a>
                ";
            }
            // line 188
            yield "            </div>
        ";
        }
        // line 190
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
            min-height: 70vh;
            position: relative;
        }

        .animated-blobs {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            overflow: hidden; z-index: 1;
        }

        .btn-square {
            min-width: 42px; height: 42px;
            display: inline-flex; align-items: center; justify-content: center;
            padding: 0 10px; font-weight: 600; border-radius: 6px;
        }

        .btn-square:first-child, .btn-square:last-child { min-width: auto; padding: 0 15px; }

        .animated-blobs::before, .animated-blobs::after {
            content: ''; position: absolute; background: rgba(255, 255, 255, 0.1); border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }
        .animated-blobs::before { width: 500px; height: 500px; top: -250px; right: -100px; }
        .animated-blobs::after { width: 400px; height: 400px; bottom: -200px; left: -100px; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -50px) rotate(120deg); }
            66% { transform: translate(-20px, 30px) rotate(240deg); }
        }

        .gradient-text {
            background: linear-gradient(135deg, #fff 0%, #f093fb 50%, #fff 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; animation: gradient-flow 3s ease infinite;
        }

        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .badge-hot {
            display: inline-block; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);
            color: white; padding: 8px 20px; border-radius: 50px; font-weight: 800;
            border: 2px solid rgba(255, 255, 255, 0.3); animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 255, 255, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 255, 255, 0.6); }
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px);
            padding: 15px 25px; border-radius: 15px; border: 2px solid rgba(255, 255, 255, 0.2); text-align: center;
        }

        .btn-mega-cta {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
            border: none; color: white !important; border-radius: 50px;
            box-shadow: 0 10px 40px rgba(255, 107, 107, 0.4); transition: all 0.3s ease;
        }

        .floating-emoji { position: relative; height: 400px; }
        .emoji-item { position: absolute; font-size: 5rem; animation: float-emoji 6s infinite ease-in-out; }
        @keyframes float-emoji { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-30px); } }

        /* PRODUCT CARD */
        .product-card {
            background: white; border-radius: 20px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08); transition: all 0.4s ease;
        }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25); }

        .badge-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; }
        .hot-label { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); color: white; padding: 8px 16px; font-size: 0.7rem; font-weight: 900; border-bottom-left-radius: 15px; }

        .product-image-wrapper { position: relative; height: 220px; overflow: hidden; }
        .product-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .product-card:hover .product-image { transform: scale(1.1); }

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
            font-weight: 800; text-decoration: none; transition: all 0.3s ease;
        }

        .bottom-cta-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-mega-white { background: white; color: #667eea !important; border-radius: 50px; }

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
        return array (  423 => 190,  419 => 188,  413 => 186,  411 => 185,  402 => 183,  399 => 182,  395 => 180,  393 => 179,  390 => 178,  384 => 177,  374 => 175,  371 => 174,  367 => 173,  364 => 172,  360 => 170,  358 => 169,  351 => 167,  348 => 166,  342 => 164,  340 => 163,  337 => 162,  335 => 161,  332 => 160,  329 => 159,  326 => 158,  323 => 157,  319 => 154,  306 => 146,  304 => 145,  281 => 127,  274 => 123,  265 => 120,  259 => 117,  256 => 116,  250 => 115,  245 => 114,  241 => 113,  235 => 109,  227 => 103,  218 => 97,  210 => 94,  206 => 93,  203 => 92,  201 => 91,  194 => 86,  187 => 82,  183 => 80,  181 => 79,  177 => 77,  172 => 76,  100 => 6,  87 => 5,  64 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}   Best Tech Deals 2025 - Exclusive Reviews & Hot Offers{% endblock %}

{% block body %}

    <div class=\"mega-hero position-relative overflow-hidden\">
        <div class=\"animated-blobs\"></div>
        <div class=\"container position-relative\" style=\"z-index: 2;\">
            <div class=\"row align-items-center py-5\">
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
            {% for review in reviews %}
                <div class=\"col-6 col-md-4 col-lg-3\">
                    <div class=\"product-card h-100\">
                        {% if review.badge %}
                            <div class=\"product-badge\">
                    <span class=\"badge-premium\">
                        <i class=\"bi bi-award-fill me-1\"></i>{{ review.badge }}
                    </span>
                            </div>
                        {% endif %}

                        <div class=\"hot-corner\">
                            <div class=\"hot-label\">🔥 HOT</div>
                        </div>

                        {% if review.imageUrl %}
                            <div class=\"product-image-wrapper\">
                                <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\" target=\"_blank\">
                                    <img src=\"{{ review.imageUrl }}\" class=\"product-image img-fluid\" alt=\"{{ review.title }}\" loading=\"lazy\">
                                </a>
                                <div class=\"image-overlay\">
                                    <a href=\"{{ path('app_buy_redirect', {id: review.id}) }}\" target=\"_blank\" class=\"quick-view\" style=\"text-decoration: none; cursor: pointer;\">
                                        👁️ QUICK VIEW
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
                                        {% if i <= review.rating %}⭐{% endif %}
                                    {% endfor %}
                                </div>
                                <span class=\"rating-number\">{{ review.rating }}.0</span>
                            </div>

                            <h3 class=\"product-title\">{{ review.title|slice(0, 50) }}{% if review.title|length > 50 %}...{% endif %}</h3>

                            <div class=\"product-price-section\">
                                <div class=\"current-price\">{{ review.price }} лв.</div>
                                <div class=\"price-tag\">💰 BEST PRICE</div>
                            </div>

                            <a href=\"{{ path('app_review_show', {slug: review.slug}) }}\" class=\"btn-product-cta\">
                        <span class=\"cta-text\">
                            <i class=\"bi bi-lightning-charge-fill me-1\"></i>
                            VIEW DEAL
                            <i class=\"bi bi-arrow-right ms-1\"></i>
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
            min-height: 70vh;
            position: relative;
        }

        .animated-blobs {
            position: absolute;
            top: 0; left: 0; width: 100%; height: 100%;
            overflow: hidden; z-index: 1;
        }

        .btn-square {
            min-width: 42px; height: 42px;
            display: inline-flex; align-items: center; justify-content: center;
            padding: 0 10px; font-weight: 600; border-radius: 6px;
        }

        .btn-square:first-child, .btn-square:last-child { min-width: auto; padding: 0 15px; }

        .animated-blobs::before, .animated-blobs::after {
            content: ''; position: absolute; background: rgba(255, 255, 255, 0.1); border-radius: 50%;
            animation: float 20s infinite ease-in-out;
        }
        .animated-blobs::before { width: 500px; height: 500px; top: -250px; right: -100px; }
        .animated-blobs::after { width: 400px; height: 400px; bottom: -200px; left: -100px; }

        @keyframes float {
            0%, 100% { transform: translate(0, 0) rotate(0deg); }
            33% { transform: translate(30px, -50px) rotate(120deg); }
            66% { transform: translate(-20px, 30px) rotate(240deg); }
        }

        .gradient-text {
            background: linear-gradient(135deg, #fff 0%, #f093fb 50%, #fff 100%);
            -webkit-background-clip: text; -webkit-text-fill-color: transparent;
            background-clip: text; animation: gradient-flow 3s ease infinite;
        }

        @keyframes gradient-flow {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .badge-hot {
            display: inline-block; background: rgba(255, 255, 255, 0.2); backdrop-filter: blur(10px);
            color: white; padding: 8px 20px; border-radius: 50px; font-weight: 800;
            border: 2px solid rgba(255, 255, 255, 0.3); animation: pulse-glow 2s infinite;
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(255, 255, 255, 0.3); }
            50% { box-shadow: 0 0 40px rgba(255, 255, 255, 0.6); }
        }

        .stat-box {
            background: rgba(255, 255, 255, 0.15); backdrop-filter: blur(10px);
            padding: 15px 25px; border-radius: 15px; border: 2px solid rgba(255, 255, 255, 0.2); text-align: center;
        }

        .btn-mega-cta {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 50%, #c44569 100%);
            border: none; color: white !important; border-radius: 50px;
            box-shadow: 0 10px 40px rgba(255, 107, 107, 0.4); transition: all 0.3s ease;
        }

        .floating-emoji { position: relative; height: 400px; }
        .emoji-item { position: absolute; font-size: 5rem; animation: float-emoji 6s infinite ease-in-out; }
        @keyframes float-emoji { 0%, 100% { transform: translateY(0px); } 50% { transform: translateY(-30px); } }

        /* PRODUCT CARD */
        .product-card {
            background: white; border-radius: 20px; overflow: hidden;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08); transition: all 0.4s ease;
        }
        .product-card:hover { transform: translateY(-10px); box-shadow: 0 20px 60px rgba(102, 126, 234, 0.25); }

        .badge-premium { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; padding: 6px 14px; border-radius: 20px; font-size: 0.7rem; font-weight: 800; }
        .hot-label { background: linear-gradient(135deg, #ff6b6b 0%, #ee5a6f 100%); color: white; padding: 8px 16px; font-size: 0.7rem; font-weight: 900; border-bottom-left-radius: 15px; }

        .product-image-wrapper { position: relative; height: 220px; overflow: hidden; }
        .product-image { width: 100%; height: 100%; object-fit: cover; transition: transform 0.5s ease; }
        .product-card:hover .product-image { transform: scale(1.1); }

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
            font-weight: 800; text-decoration: none; transition: all 0.3s ease;
        }

        .bottom-cta-section { background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        .btn-mega-white { background: white; color: #667eea !important; border-radius: 50px; }

        html { scroll-behavior: smooth; }
    </style>

{% endblock %}
", "review/index.html.twig", "/var/www/html/templates/review/index.html.twig");
    }
}
