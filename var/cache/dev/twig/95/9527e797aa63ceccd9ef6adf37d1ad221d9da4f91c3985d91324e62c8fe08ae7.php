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

/* produit/shop.html.twig */
class __TwigTemplate_247eb8cb4416143437b96a6e269d0a2e6c0a504994ff950db61f3a650b1f148d extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'stylesheets' => [$this, 'block_stylesheets'],
            'hero' => [$this, 'block_hero'],
            'title' => [$this, 'block_title'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/shop.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/shop.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "produit/shop.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 3
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    <!-- Template Stylesheet -->
    <link href=";
        // line 6
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/shop.css"), "html", null, true);
        echo " rel=\"stylesheet\">

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 10
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 11
        echo "    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\"> Shop </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">voici nos produits</p>
               ";
        // line 19
        echo "                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                </div>
            </div>
        </div>
    </div>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 28
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Shop";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 30
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 31
        echo "    <h1 class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp mt-2\">Voici la liste des Produits</h1>
<form action=\"";
        // line 32
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_search");
        echo "\" method=\"POST\">
    <div class=\"d-flex justify-content-center\">
    <div class=\"input-group\" style=\"max-width: 500px;\" >
        <input type=\"text\" id=\"search\" name=\"search\" class=\"form-control bg-gradient-primary border-primary p-3\" placeholder=\"Saisir un produit\" >
        <button type=\"submit\" class=\"btn btn-primary px-4\" ><i class=\"fa fa-search\"></i></button>
    </div>
    </div>
</form>

    <div class=\"row mt-n2 wow fadeInUp \" data-wow-delay=\"0.1s\" style=\"visibility: visible;animation-delay: 0.1s;animation-name: fadeInUp;\" >
        <div class=\"col-12 text-center\">
               <div class=\"btn px-3 pr-4 active mt-4\">
                   ";
        // line 44
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 44, $this->source); })()), "@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig");
        echo "
               </div>


        </div>
    </div>


    <div class=\"shop-items\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                ";
        // line 55
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["produits"]) || array_key_exists("produits", $context) ? $context["produits"] : (function () { throw new RuntimeError('Variable "produits" does not exist.', 55, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["produit"]) {
            // line 56
            echo "                <div class=\"col-md-3 col-sm-6\">
                    <!-- Restaurant Item -->
                    <div class=\"item\">
                        <!-- Item's image -->
                        <div class=\"zoom\">
                        <img src=\"";
            // line 61
            echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/") . twig_get_attribute($this->env, $this->source, $context["produit"], "img", [], "any", false, false, false, 61)), "html", null, true);
            echo "\" width=\"100\" higth=\"100\">
                        </div>
                            <!-- Item details -->
                        <div class=\"item-dtls\">
                            <!-- product title -->
                            <h4><a href=\"#\">";
            // line 66
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["produit"], "libelle", [], "any", false, false, false, 66), "html", null, true);
            echo "</a></h4>
                            <!-- price -->
                            <span class=\"price lblue\">";
            // line 68
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["produit"], "prix", [], "any", false, false, false, 68), "html", null, true);
            echo " DT</span>
                        </div>
                        <!-- add to cart btn -->
                        <div class=\"ecom bg-lblue\">
                            <a href=\"";
            // line 72
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_details", ["reference" => twig_get_attribute($this->env, $this->source, $context["produit"], "reference", [], "any", false, false, false, 72)]), "html", null, true);
            echo "\" class=\"btn\" >Consulter</a>
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['produit'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 77
        echo "            </div>
        </div>
    </div>











";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "produit/shop.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  229 => 77,  218 => 72,  211 => 68,  206 => 66,  198 => 61,  191 => 56,  187 => 55,  173 => 44,  158 => 32,  155 => 31,  145 => 30,  126 => 28,  109 => 19,  101 => 11,  91 => 10,  78 => 6,  71 => 3,  61 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    {{ parent() }}

    <!-- Template Stylesheet -->
    <link href={{asset(\"css/shop.css\")}} rel=\"stylesheet\">

{% endblock %}

{% block hero %}
    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\"> Shop </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">voici nos produits</p>
               {#      <a href=\"\" class=\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\">Free Quote</a>
                    <a href=\"\" class=\"btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight\">Contact Us</a>#}
                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block title %}Shop{% endblock %}

{% block body %}
    <h1 class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp mt-2\">Voici la liste des Produits</h1>
<form action=\"{{ path('app_produit_search') }}\" method=\"POST\">
    <div class=\"d-flex justify-content-center\">
    <div class=\"input-group\" style=\"max-width: 500px;\" >
        <input type=\"text\" id=\"search\" name=\"search\" class=\"form-control bg-gradient-primary border-primary p-3\" placeholder=\"Saisir un produit\" >
        <button type=\"submit\" class=\"btn btn-primary px-4\" ><i class=\"fa fa-search\"></i></button>
    </div>
    </div>
</form>

    <div class=\"row mt-n2 wow fadeInUp \" data-wow-delay=\"0.1s\" style=\"visibility: visible;animation-delay: 0.1s;animation-name: fadeInUp;\" >
        <div class=\"col-12 text-center\">
               <div class=\"btn px-3 pr-4 active mt-4\">
                   {{ knp_pagination_render(produits, '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig') }}
               </div>


        </div>
    </div>


    <div class=\"shop-items\">
        <div class=\"container-fluid\">
            <div class=\"row\">
                {% for produit in produits %}
                <div class=\"col-md-3 col-sm-6\">
                    <!-- Restaurant Item -->
                    <div class=\"item\">
                        <!-- Item's image -->
                        <div class=\"zoom\">
                        <img src=\"{{ asset('uploads/img/')~produit.img }}\" width=\"100\" higth=\"100\">
                        </div>
                            <!-- Item details -->
                        <div class=\"item-dtls\">
                            <!-- product title -->
                            <h4><a href=\"#\">{{  produit.libelle}}</a></h4>
                            <!-- price -->
                            <span class=\"price lblue\">{{ produit.prix}} DT</span>
                        </div>
                        <!-- add to cart btn -->
                        <div class=\"ecom bg-lblue\">
                            <a href=\"{{ path('app_produit_details', {'reference': produit.reference}) }}\" class=\"btn\" >Consulter</a>
                        </div>
                    </div>
                </div>
                {% endfor%}
            </div>
        </div>
    </div>











{% endblock %}
", "produit/shop.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\produit\\shop.html.twig");
    }
}
