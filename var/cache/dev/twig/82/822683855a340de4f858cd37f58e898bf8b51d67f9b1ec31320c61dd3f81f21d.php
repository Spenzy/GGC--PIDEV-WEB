<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* forum/home.html.twig */
class __TwigTemplate_de7de22e09294a77fcd8f7d1a638ace424754e52bda43be518ca5968f636dd90 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'title' => [$this, 'block_title'],
            'hero' => [$this, 'block_hero'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "forum/home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "forum/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "forum/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 4
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "
    <link href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\" rel=\"stylesheet\">
    <link href=\"";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/forum.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 7
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/post.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 10
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Forum
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 13
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 14
        echo "    <div class=\"container-xxl py-4 bg-primary hero-header mb-4\">
        <div class=\"container my-4 py-4 px-lg-4\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\">GGC Forum!<br> Communiquez, c'est exister!</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Bienvenu à l'espace forum de gamer geeks community!</p>
                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"";
        // line 22
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/newsletter.png"), "html", null, true);
        echo "\" alt=\"Forum Home\">
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 29
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 30
        echo "    <div id=\"forum-container\" class=\"container forum-body\">
        <!-- Main content -->
        <!-- End of post -->
        ";
        // line 33
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 33, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["pub"]) {
            // line 34
            echo "            ";
            $context["p"] = twig_get_attribute($this->env, $this->source, $context["pub"], 0, [], "array", false, false, false, 34);
            // line 35
            echo "            ";
            $context["nbrV"] = twig_get_attribute($this->env, $this->source, $context["pub"], 2, [], "array", false, false, false, 35);
            // line 36
            echo "            ";
            $context["nbrC"] = twig_get_attribute($this->env, $this->source, $context["pub"], 1, [], "array", false, false, false, 36);
            // line 37
            echo "            <div class=\"card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0 shadow-lg\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-8 mb-3 mb-sm-0\">
                        <h5>
                            <a href=\"";
            // line 41
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_publication_show", ["idpublication" => twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 41, $this->source); })()), "idpublication", [], "any", false, false, false, 41)]), "html", null, true);
            echo "\"
                               class=\"text-primary\">";
            // line 42
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 42, $this->source); })()), "object", [], "any", false, false, false, 42), "html", null, true);
            echo "</a>
                        </h5>
                        <p class=\"text-sm\">
                            <span class=\"op-6\">Posted</span>
                            <a class=\"text-black\">";
            // line 46
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 46, $this->source); })()), "date", [], "any", false, false, false, 46), "Y-m-d"), "html", null, true);
            echo "</a>
                            <span class=\"op-6\">by</span>
                            <a class=\"text-black\" href=\"#\">";
            // line 48
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 48, $this->source); })()), "idclient", [], "any", false, false, false, 48), "idclient", [], "any", false, false, false, 48), "nom", [], "any", false, false, false, 48), "html", null, true);
            echo "</a>
                        </p>
                    </div>
                    <div class=\"col-md-4 op-7\">
                        <div class=\"row text-center op-7\">
                            <div class=\"col px-1\">
                                <i class=\"ion-connection-bars icon-1x\"></i>
                                <span class=\"d-block text-sm\">";
            // line 55
            echo twig_escape_filter($this->env, (isset($context["nbrV"]) || array_key_exists("nbrV", $context) ? $context["nbrV"] : (function () { throw new RuntimeError('Variable "nbrV" does not exist.', 55, $this->source); })()), "html", null, true);
            echo " Votes</span>
                            </div>
                            <div class=\"col px-1\">
                                <i class=\"ion-ios-chatboxes-outline icon-1x\"></i>
                                <span class=\"d-block text-sm\">";
            // line 59
            echo twig_escape_filter($this->env, (isset($context["nbrC"]) || array_key_exists("nbrC", $context) ? $context["nbrC"] : (function () { throw new RuntimeError('Variable "nbrC" does not exist.', 59, $this->source); })()), "html", null, true);
            echo " Réponses</span>
                            </div>
                            <div class=\"col px-1\">
                                <i class=\"ion-ios-eye-outline icon-1x\"></i>
                                <span class=\"d-block text-sm\">290 Views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End of post -->
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['pub'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        echo "        <div class=\"d-flex justify-content-center\">
            ";
        // line 72
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["publications"]) || array_key_exists("publications", $context) ? $context["publications"] : (function () { throw new RuntimeError('Variable "publications" does not exist.', 72, $this->source); })()), "@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig");
        echo "

        </div>
        <div class=\"p-5\">
            <h2 class=\"d-flex justify-content-center\">Partagez votre avis!</h2>
            ";
        // line 77
        echo twig_include($this->env, $context, "publication/_form.html.twig");
        echo "
        </div>
    </div>





";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "forum/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  245 => 77,  237 => 72,  234 => 71,  216 => 59,  209 => 55,  199 => 48,  194 => 46,  187 => 42,  183 => 41,  177 => 37,  174 => 36,  171 => 35,  168 => 34,  164 => 33,  159 => 30,  149 => 29,  133 => 22,  123 => 14,  113 => 13,  93 => 10,  81 => 7,  77 => 6,  71 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block stylesheets %}
    {{ parent() }}
    <link href=\"https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css\" rel=\"stylesheet\">
    <link href=\"{{ asset(\"css/forum.css\") }}\" rel=\"stylesheet\">
    <link href=\"{{ asset(\"css/post.css\") }}\" rel=\"stylesheet\">
{% endblock %}

{% block title %}Forum
{% endblock %}

{% block hero %}
    <div class=\"container-xxl py-4 bg-primary hero-header mb-4\">
        <div class=\"container my-4 py-4 px-lg-4\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\">GGC Forum!<br> Communiquez, c'est exister!</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Bienvenu à l'espace forum de gamer geeks community!</p>
                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"{{ asset('img/newsletter.png') }}\" alt=\"Forum Home\">
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block body %}
    <div id=\"forum-container\" class=\"container forum-body\">
        <!-- Main content -->
        <!-- End of post -->
        {% for pub in publications %}
            {% set p = pub[0] %}
            {% set nbrV = pub[2] %}
            {% set nbrC = pub[1] %}
            <div class=\"card row-hover pos-relative py-3 px-3 mb-3 border-primary border-top-0 border-right-0 border-bottom-0 rounded-0 shadow-lg\">
                <div class=\"row align-items-center\">
                    <div class=\"col-md-8 mb-3 mb-sm-0\">
                        <h5>
                            <a href=\"{{ path('app_publication_show', {'idpublication': p.idpublication}) }}\"
                               class=\"text-primary\">{{ p.object }}</a>
                        </h5>
                        <p class=\"text-sm\">
                            <span class=\"op-6\">Posted</span>
                            <a class=\"text-black\">{{ p.date | date('Y-m-d') }}</a>
                            <span class=\"op-6\">by</span>
                            <a class=\"text-black\" href=\"#\">{{ p.idclient.idclient.nom }}</a>
                        </p>
                    </div>
                    <div class=\"col-md-4 op-7\">
                        <div class=\"row text-center op-7\">
                            <div class=\"col px-1\">
                                <i class=\"ion-connection-bars icon-1x\"></i>
                                <span class=\"d-block text-sm\">{{ nbrV }} Votes</span>
                            </div>
                            <div class=\"col px-1\">
                                <i class=\"ion-ios-chatboxes-outline icon-1x\"></i>
                                <span class=\"d-block text-sm\">{{ nbrC }} Réponses</span>
                            </div>
                            <div class=\"col px-1\">
                                <i class=\"ion-ios-eye-outline icon-1x\"></i>
                                <span class=\"d-block text-sm\">290 Views</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /End of post -->
        {% endfor %}
        <div class=\"d-flex justify-content-center\">
            {{ knp_pagination_render(publications, '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig') }}

        </div>
        <div class=\"p-5\">
            <h2 class=\"d-flex justify-content-center\">Partagez votre avis!</h2>
            {{ include('publication/_form.html.twig') }}
        </div>
    </div>





{% endblock %}
", "forum/home.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\forum\\home.html.twig");
    }
}
