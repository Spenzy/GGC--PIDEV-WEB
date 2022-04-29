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

/* livraison/index.html.twig */
class __TwigTemplate_695635285de38535dba3c8a4c1d532687d6e2351eeb31401dabf56ea6fa2ceef extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "admin/index.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "livraison/index.html.twig"));

        $this->parent = $this->loadTemplate("admin/index.html.twig", "livraison/index.html.twig", 1);
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

        echo "Liste des livraisons";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "
    <h1>Voici les livraisons</h1>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Id Commande</th>
                <th>Id Livreur</th>
                <th>Date Livraison</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                ";
        // line 19
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["livraisons"]) || array_key_exists("livraisons", $context) ? $context["livraisons"] : (function () { throw new RuntimeError('Variable "livraisons" does not exist.', 19, $this->source); })()));
        $context['_iterated'] = false;
        foreach ($context['_seq'] as $context["_key"] => $context["livraison"]) {
            // line 20
            echo "
                <td>";
            // line 21
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 21), "html", null, true);
            echo "</td>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["livraison"], "idlivreur", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            ((twig_get_attribute($this->env, $this->source, $context["livraison"], "dateheure", [], "any", false, false, false, 23)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["livraison"], "dateheure", [], "any", false, false, false, 23), "Y-m-d"), "html", null, true))) : (print ("")));
            echo "</td>
                <td>
                    <a href=\"";
            // line 25
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_show", ["idcommande" => twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 25)]), "html", null, true);
            echo "\" class=\"btn btn-outline-info\">Consulter</a>
                    <a href=\"";
            // line 26
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_edit", ["idcommande" => twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 26)]), "html", null, true);
            echo "\" class=\"btn btn-outline-secondary\" >Modifier</a>
                </td>
                ";
            // line 28
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 28), "livree", [], "any", false, false, false, 28), 0))) {
                // line 29
                echo "                <td>
                    <a href=\"";
                // line 30
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_livree", ["idcommande" => twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 30)]), "html", null, true);
                echo "\" class=\"btn btn-outline-dark\" >délivrée</a>
                </td>
                ";
            } else {
                // line 33
                echo "                    <td>
                        <a href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_livree", ["idcommande" => twig_get_attribute($this->env, $this->source, $context["livraison"], "idcommande", [], "any", false, false, false, 34)]), "html", null, true);
                echo "\" class=\"btn btn-dark\" >Annuler délivrée</a>
                    </td>
                    ";
            }
            // line 37
            echo "
            </tr>
        ";
            $context['_iterated'] = true;
        }
        if (!$context['_iterated']) {
            // line 40
            echo "            <tr>
                <td colspan=\"4\">aucune ligne trouvée</td>
            </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['livraison'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 44
        echo "        </tbody>
    </table>

    <a class=\"btn btn-outline-primary \" href=\"";
        // line 47
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_new");
        echo "\">Ajouter une livraison</a>
    <a href=\"";
        // line 48
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_livraison_excuse", ["idcommande" => 0]);
        echo "\" class=\"btn btn-outline-dark\" >Excuse des livraisons en retard</a>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "livraison/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  178 => 48,  174 => 47,  169 => 44,  160 => 40,  153 => 37,  147 => 34,  144 => 33,  138 => 30,  135 => 29,  133 => 28,  128 => 26,  124 => 25,  119 => 23,  115 => 22,  111 => 21,  108 => 20,  103 => 19,  88 => 6,  78 => 5,  59 => 3,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'admin/index.html.twig' %}

{% block title %}Liste des livraisons{% endblock %}

{% block body %}

    <h1>Voici les livraisons</h1>
    <table class=\"table\">
        <thead>
            <tr>
                <th>Id Commande</th>
                <th>Id Livreur</th>
                <th>Date Livraison</th>
                <th>actions</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                {% for livraison in livraisons %}

                <td>{{ livraison.idcommande }}</td>
                <td>{{ livraison.idlivreur }}</td>
                <td>{{ livraison.dateheure ? livraison.dateheure|date('Y-m-d') : '' }}</td>
                <td>
                    <a href=\"{{ path('app_livraison_show', {'idcommande': livraison.idcommande}) }}\" class=\"btn btn-outline-info\">Consulter</a>
                    <a href=\"{{ path('app_livraison_edit', {'idcommande': livraison.idcommande}) }}\" class=\"btn btn-outline-secondary\" >Modifier</a>
                </td>
                {% if livraison.idcommande.livree ==0  %}
                <td>
                    <a href=\"{{ path('app_commande_livree', {'idcommande': livraison.idcommande}) }}\" class=\"btn btn-outline-dark\" >délivrée</a>
                </td>
                {% else %}
                    <td>
                        <a href=\"{{ path('app_commande_livree', {'idcommande': livraison.idcommande}) }}\" class=\"btn btn-dark\" >Annuler délivrée</a>
                    </td>
                    {% endif %}

            </tr>
        {% else %}
            <tr>
                <td colspan=\"4\">aucune ligne trouvée</td>
            </tr>
        {% endfor %}
        </tbody>
    </table>

    <a class=\"btn btn-outline-primary \" href=\"{{ path('app_livraison_new') }}\">Ajouter une livraison</a>
    <a href=\"{{ path('app_livraison_excuse', {'idcommande': 0}) }}\" class=\"btn btn-outline-dark\" >Excuse des livraisons en retard</a>

{% endblock %}
", "livraison/index.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\livraison\\index.html.twig");
    }
}
