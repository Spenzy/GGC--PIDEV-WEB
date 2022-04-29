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

/* avis/new.html.twig */
class __TwigTemplate_403d7236641156da98ecc3f7a7726606c807068fae5bd63a529ec8ebe2e34132 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'header' => [$this, 'block_header'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "avis/new.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "avis/new.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "avis/new.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "New Avis";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    <!-- Template Stylesheet -->
    <link href=";
        // line 10
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/details.css"), "html", null, true);
        echo " rel=\"stylesheet\">

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 15
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 16
        echo "    <header>
        <div class=\"container-xxl bg-white p-0\">
            <!-- Spinner Start -->
            <div id=\"spinner\" class=\"show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
                <div class=\"spinner-grow text-primary\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
                    <span class=\"sr-only\">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Navbar Start -->
            <div class=\"container-xxl position-relative p-0\">
                <nav class=\"navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0\">
                    <a href=\"\" class=\"navbar-brand p-0\">
                        ";
        // line 32
        echo "                        <img src=";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/LogoGGC.png"), "html", null, true);
        echo " alt=\"Logo\">
                    </a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                        <span class=\"fa fa-bars\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                        <div class=\"navbar-nav ms-auto py-0\">
                            <a href=\"#\" class=\"nav-item nav-link \">Home</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Forum</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Streamers</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Evennements</a>
                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle active\" data-bs-toggle=\"dropdown\">Shop</a>
                                <div class=\"dropdown-menu m-0\">
                                    <a href=\"";
        // line 46
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_shop");
        echo "\" class=\"dropdown-item\">Produits</a>
                                    <a href=\"#\" class=\"dropdown-item\">Commande</a>
                                </div>
                            </div>
                            <a href=\"#\" class=\"nav-item nav-link\">Contact</a>
                        </div>
                        <butaton type=\"button\" class=\"btn text-secondary ms-3\" data-bs-toggle=\"modal\" data-bs-target=\"#searchModal\"><i class=\"fa fa-search\"></i></butaton>
                        <a href=\"#\" class=\"btn btn-secondary text-light rounded-pill py-2 px-4 ms-3\">Sign In</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Navbar -->
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 61
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 62
        echo "    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\"> Avis Sur produit </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Ajouez votre avis sur le produit dont la référence est ";
        // line 67
        echo twig_escape_filter($this->env, (isset($context["referenceProduit"]) || array_key_exists("referenceProduit", $context) ? $context["referenceProduit"] : (function () { throw new RuntimeError('Variable "referenceProduit" does not exist.', 67, $this->source); })()), "html", null, true);
        echo "</p>
             ";
        // line 70
        echo "   </div>
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

    // line 80
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 81
        echo "    <h1>Donnez votre Avis</h1>

    ";
        // line 83
        echo twig_include($this->env, $context, "avis/_form.html.twig");
        echo "

    <a class =\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\" href=\"";
        // line 85
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_details", ["reference" => (isset($context["referenceProduit"]) || array_key_exists("referenceProduit", $context) ? $context["referenceProduit"] : (function () { throw new RuntimeError('Variable "referenceProduit" does not exist.', 85, $this->source); })())]), "html", null, true);
        echo "\">retour aux détails du produit</a>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "avis/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  238 => 85,  233 => 83,  229 => 81,  219 => 80,  202 => 70,  198 => 67,  191 => 62,  181 => 61,  156 => 46,  138 => 32,  121 => 16,  111 => 15,  98 => 10,  91 => 7,  81 => 6,  62 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}New Avis{% endblock %}


{% block stylesheets %}
    {{ parent() }}

    <!-- Template Stylesheet -->
    <link href={{asset(\"css/details.css\")}} rel=\"stylesheet\">

{% endblock %}


{% block header %}
    <header>
        <div class=\"container-xxl bg-white p-0\">
            <!-- Spinner Start -->
            <div id=\"spinner\" class=\"show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
                <div class=\"spinner-grow text-primary\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
                    <span class=\"sr-only\">Loading...</span>
                </div>
            </div>
            <!-- Spinner End -->


            <!-- Navbar Start -->
            <div class=\"container-xxl position-relative p-0\">
                <nav class=\"navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0\">
                    <a href=\"\" class=\"navbar-brand p-0\">
                        {#<h1 class=\"m-0\"><i class=\"fa fa-search me-2\"></i>SEO<span class=\"fs-5\">Master</span></h1> #}
                        <img src={{asset(\"img/LogoGGC.png\")}} alt=\"Logo\">
                    </a>
                    <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                        <span class=\"fa fa-bars\"></span>
                    </button>
                    <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                        <div class=\"navbar-nav ms-auto py-0\">
                            <a href=\"#\" class=\"nav-item nav-link \">Home</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Forum</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Streamers</a>
                            <a href=\"#\" class=\"nav-item nav-link\">Evennements</a>
                            <div class=\"nav-item dropdown\">
                                <a href=\"#\" class=\"nav-link dropdown-toggle active\" data-bs-toggle=\"dropdown\">Shop</a>
                                <div class=\"dropdown-menu m-0\">
                                    <a href=\"{{ path('app_produit_shop') }}\" class=\"dropdown-item\">Produits</a>
                                    <a href=\"#\" class=\"dropdown-item\">Commande</a>
                                </div>
                            </div>
                            <a href=\"#\" class=\"nav-item nav-link\">Contact</a>
                        </div>
                        <butaton type=\"button\" class=\"btn text-secondary ms-3\" data-bs-toggle=\"modal\" data-bs-target=\"#searchModal\"><i class=\"fa fa-search\"></i></butaton>
                        <a href=\"#\" class=\"btn btn-secondary text-light rounded-pill py-2 px-4 ms-3\">Sign In</a>
                    </div>
                </nav>
            </div>
        </div>
    </header>
    <!-- Navbar -->
{% endblock %}
{% block hero %}
    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <h1 class=\"text-white mb-4 animated zoomIn\"> Avis Sur produit </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Ajouez votre avis sur le produit dont la référence est {{ referenceProduit }}</p>
             {#        <a href=\"\" class=\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\">Free Quote</a>
                    <a href=\"\" class=\"btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight\">Contact Us</a>
             #}   </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                </div>
            </div>
        </div>
    </div>
{% endblock %}


{% block body %}
    <h1>Donnez votre Avis</h1>

    {{ include('avis/_form.html.twig') }}

    <a class =\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\" href=\"{{ path('app_produit_details', {'reference': referenceProduit }) }}\">retour aux détails du produit</a>
{% endblock %}
", "avis/new.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\avis\\new.html.twig");
    }
}
