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

/* commande/show.html.twig */
class __TwigTemplate_a81bcfdad8a7346661724a746a3932b0d63ef95540c6ea395e68c6ca8a699563 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commande/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "commande/show.html.twig", 1);
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

        echo "Commande";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        echo "    ";
        $this->displayParentBlock("stylesheets", $context, $blocks);
        echo "

    <!-- Template Stylesheet -->
    <link rel=\"stylesheet\" href=\"path/to/font-awesome/css/font-awesome.min.css\">
    <link href=";
        // line 9
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/shop.css"), "html", null, true);
        echo " rel=\"\">
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 12
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 13
        echo "    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">

                    <h1 class=\"text-white mb-4 animated zoomIn\">Commandes :</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici toutes vos commande déja passer </p>

                </div>
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

    // line 30
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 31
        echo "    <!-- Service Start -->
    <div class=\"container-xxl \">
        <div class=\"container \">
            <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\" data-wow-delay=\"0.1s\">
                <h6 class=\"position-relative d-inline text-primary ps-4\">Vos commandes</h6>
                <h2 class=\"mt-2\">Vous pouvez consultez les détails de vos commandes</h2>
            </div>

            <div class=\"row g-4\">

                ";
        // line 41
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 41, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["commande"]) {
            // line 42
            echo "                    <div class=\"col-lg-4 col-md-6 wow zoomIn\" data-wow-delay=\"0.6s\">
                        <div class=\"service-item d-flex flex-column justify-content-center text-center rounded\">
                            <div class=\"service-icon flex-shrink-0\">
                                <i class=\"fa fa-home fa-2x\"></i>
                            </div>
                            <h5 class=\"mb-3\">Commande N°";
            // line 47
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["commande"], "idcommande", [], "any", false, false, false, 47), "html", null, true);
            echo "</h5>
                            <p>Livrée : ";
            // line 48
            echo ((twig_get_attribute($this->env, $this->source, $context["commande"], "livree", [], "any", false, false, false, 48)) ? ("Oui") : ("Non"));
            echo "</p>
                            ";
            // line 49
            if (twig_get_attribute($this->env, $this->source, $context["commande"], "livree", [], "any", false, false, false, 49)) {
                // line 50
                echo "                                <p>Livrée à ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["commande"], "adresse", [], "any", false, false, false, 50), "html", null, true);
                echo "</p>
                            ";
            } else {
                // line 52
                echo "                                <p>Sera livrée à ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["commande"], "adresse", [], "any", false, false, false, 52), "html", null, true);
                echo "</p>
                            ";
            }
            // line 54
            echo "                            <p>Commande passée le ";
            ((twig_get_attribute($this->env, $this->source, $context["commande"], "datecommande", [], "any", false, false, false, 54)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["commande"], "datecommande", [], "any", false, false, false, 54), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</p>
                            <h5>Prix total : ";
            // line 55
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["commande"], "prix", [], "any", false, false, false, 55), "html", null, true);
            echo " DT</h5>
                            <a href=\"";
            // line 56
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_lignecommande_show", ["idcommande" => twig_get_attribute($this->env, $this->source, $context["commande"], "idcommande", [], "any", false, false, false, 56)]), "html", null, true);
            echo "\" class=\"btn px-3 mt-auto mx-auto\">Détails</a>
                            <a>";
            // line 57
            echo twig_include($this->env, $context, "commande/_delete_form.html.twig");
            echo "</a>
                        </div>
                    </div>
                ";
            $context['_iterated'] = true;
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        if (!$context['_iterated']) {
            // line 61
            echo "                <p class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">Vous n'avez passé aucune commande</p>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['commande'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 63
        echo "                <div class=\"d-inline-flex justify-content-center\">
                    ";
        // line 64
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["commandes"]) || array_key_exists("commandes", $context) ? $context["commandes"] : (function () { throw new RuntimeError('Variable "commandes" does not exist.', 64, $this->source); })()), "@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig");
        echo "
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "commande/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 64,  251 => 63,  244 => 61,  227 => 57,  223 => 56,  219 => 55,  214 => 54,  208 => 52,  202 => 50,  200 => 49,  196 => 48,  192 => 47,  185 => 42,  167 => 41,  155 => 31,  145 => 30,  120 => 13,  110 => 12,  98 => 9,  90 => 5,  80 => 4,  61 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Commande{% endblock %}
{% block stylesheets %}
    {{ parent() }}

    <!-- Template Stylesheet -->
    <link rel=\"stylesheet\" href=\"path/to/font-awesome/css/font-awesome.min.css\">
    <link href={{asset(\"css/shop.css\")}} rel=\"\">
{% endblock %}

{% block hero %}
    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">

                    <h1 class=\"text-white mb-4 animated zoomIn\">Commandes :</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici toutes vos commande déja passer </p>

                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                </div>
            </div>
        </div>
    </div>
{% endblock %}

{% block body %}
    <!-- Service Start -->
    <div class=\"container-xxl \">
        <div class=\"container \">
            <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\" data-wow-delay=\"0.1s\">
                <h6 class=\"position-relative d-inline text-primary ps-4\">Vos commandes</h6>
                <h2 class=\"mt-2\">Vous pouvez consultez les détails de vos commandes</h2>
            </div>

            <div class=\"row g-4\">

                {% for commande in commandes %}
                    <div class=\"col-lg-4 col-md-6 wow zoomIn\" data-wow-delay=\"0.6s\">
                        <div class=\"service-item d-flex flex-column justify-content-center text-center rounded\">
                            <div class=\"service-icon flex-shrink-0\">
                                <i class=\"fa fa-home fa-2x\"></i>
                            </div>
                            <h5 class=\"mb-3\">Commande N°{{ commande.idcommande }}</h5>
                            <p>Livrée : {{ commande.livree ? 'Oui' : 'Non' }}</p>
                            {% if commande.livree %}
                                <p>Livrée à {{ commande.adresse }}</p>
                            {% else %}
                                <p>Sera livrée à {{ commande.adresse }}</p>
                            {% endif %}
                            <p>Commande passée le {{ commande.datecommande ? commande.datecommande|date('Y-m-d') : '' }}</p>
                            <h5>Prix total : {{ commande.prix }} DT</h5>
                            <a href=\"{{ path('app_lignecommande_show', {'idcommande': commande.idcommande}) }}\" class=\"btn px-3 mt-auto mx-auto\">Détails</a>
                            <a>{{ include('commande/_delete_form.html.twig') }}</a>
                        </div>
                    </div>
                {% else %}
                <p class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">Vous n'avez passé aucune commande</p>
                {% endfor %}
                <div class=\"d-inline-flex justify-content-center\">
                    {{ knp_pagination_render(commandes, '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig') }}
                </div>
            </div>
        </div>
    </div>
    <!-- Service End -->

{% endblock %}
", "commande/show.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\commande\\show.html.twig");
    }
}
