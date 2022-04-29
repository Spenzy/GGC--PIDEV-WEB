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

/* lignecommande/show.html.twig */
class __TwigTemplate_63a4187505d359929df3bfaa7b5f09515af8e6af78f2acd8e14a6af130c77b05 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "lignecommande/show.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "lignecommande/show.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "lignecommande/show.html.twig", 1);
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

        echo "Commande détaillée ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 6
        echo "    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">

                    <h1 class=\"text-white mb-4 animated zoomIn\">Commande :</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici les produits que vous avez commandez </p>

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

    // line 24
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 25
        echo "    <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">
        <h2 class=\"mt-2\">  Voici les détails de votre commande </h2>
    </div>    </section>


    <table class=\"table\">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Libellé</th>
            <th>Quantite</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
        ";
        // line 40
        $context["total"] = 0;
        // line 41
        echo "
        ";
        // line 42
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["lignes"]) || array_key_exists("lignes", $context) ? $context["lignes"] : (function () { throw new RuntimeError('Variable "lignes" does not exist.', 42, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["lignecommande"]) {
            // line 43
            echo "            ";
            $context["total"] = ((isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 43, $this->source); })()) + twig_get_attribute($this->env, $this->source, $context["lignecommande"], "prix", [], "any", false, false, false, 43));
            // line 44
            echo "
            <tr>
                <td><div class=\"zoom\">
                        <img src=\"";
            // line 47
            echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/") . twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lignecommande"], "idproduit", [], "any", false, false, false, 47), "img", [], "any", false, false, false, 47)), "html", null, true);
            echo "\" width=\"100\" higth=\"100\">
                    </div></td>
                <td>";
            // line 49
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["lignecommande"], "idproduit", [], "any", false, false, false, 49), "libelle", [], "any", false, false, false, 49), "html", null, true);
            echo "</td>
                <td>";
            // line 50
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lignecommande"], "quantite", [], "any", false, false, false, 50), "html", null, true);
            echo "</td>
                <td>";
            // line 51
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["lignecommande"], "prix", [], "any", false, false, false, 51), "html", null, true);
            echo "</td>
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 54
            echo "            <tr>
                <td colspan=\"4\">Aucun produit trouvé dans cette commande</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['lignecommande'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 58
        echo "        <tfoot>
        <tr>
            <td> Prix Total : </td>
            <td class=\"text-primary\">";
        // line 61
        echo twig_escape_filter($this->env, (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 61, $this->source); })()), "html", null, true);
        echo " DT</td>
        </tr>
        </tfoot>
        </tbody>
    </table>
    <div class=\"\">
        <a href=\"";
        // line 67
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show");
        echo "\" class=\"btn btn-outline-dark rounded-pill\"><i class=\"bi bi-arrow-left\"></i></a>


    </div>



";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "lignecommande/show.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  203 => 67,  194 => 61,  189 => 58,  180 => 54,  172 => 51,  168 => 50,  164 => 49,  159 => 47,  154 => 44,  151 => 43,  146 => 42,  143 => 41,  141 => 40,  124 => 25,  114 => 24,  89 => 6,  79 => 5,  60 => 3,  37 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Commande détaillée {% endblock %}

{% block hero %}
    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">

                    <h1 class=\"text-white mb-4 animated zoomIn\">Commande :</h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici les produits que vous avez commandez </p>

                </div>
                <div class=\"col-lg-6 text-center text-lg-start\">
                    <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                </div>
            </div>
        </div>
    </div>
{% endblock %}


{% block body %}
    <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">
        <h2 class=\"mt-2\">  Voici les détails de votre commande </h2>
    </div>    </section>


    <table class=\"table\">
        <thead>
        <tr>
            <th>Produit</th>
            <th>Libellé</th>
            <th>Quantite</th>
            <th>Prix</th>
        </tr>
        </thead>
        <tbody>
        {% set total=0 %}

        {% for lignecommande in lignes %}
            {% set total=total+ lignecommande.prix  %}

            <tr>
                <td><div class=\"zoom\">
                        <img src=\"{{ asset('uploads/img/')~lignecommande.idproduit.img }}\" width=\"100\" higth=\"100\">
                    </div></td>
                <td>{{ lignecommande.idproduit.libelle }}</td>
                <td>{{ lignecommande.quantite }}</td>
                <td>{{ lignecommande.prix }}</td>
            </tr>
        {% else %}
            <tr>
                <td colspan=\"4\">Aucun produit trouvé dans cette commande</td>
            </tr>
        {% endfor %}
        <tfoot>
        <tr>
            <td> Prix Total : </td>
            <td class=\"text-primary\">{{ total }} DT</td>
        </tr>
        </tfoot>
        </tbody>
    </table>
    <div class=\"\">
        <a href=\"{{ path('app_commande_show') }}\" class=\"btn btn-outline-dark rounded-pill\"><i class=\"bi bi-arrow-left\"></i></a>


    </div>



{% endblock %}
", "lignecommande/show.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\lignecommande\\show.html.twig");
    }
}
