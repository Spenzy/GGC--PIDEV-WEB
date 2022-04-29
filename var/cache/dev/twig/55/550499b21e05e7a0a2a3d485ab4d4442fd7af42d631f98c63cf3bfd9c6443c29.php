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

/* emails/excuse.html.twig */
class __TwigTemplate_3ffd0c088a4b61285faba1a7a75c52f36a7769113c8191312cb31cdd3e372735 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "mail.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/excuse.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/excuse.html.twig"));

        $this->parent = $this->loadTemplate("mail.html.twig", "emails/excuse.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "content"));

        // line 4
        echo "    <h1>Bonjour Mr/Mme ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 4, $this->source); })()), "idclient", [], "any", false, false, false, 4), "nom", [], "any", false, false, false, 4), "html", null, true);
        echo "</h1>
    <h4>Nous nous excusons pour le retard de la livraison de votre commande, pour y remédier nous vous offrons 50% de remise</4>
    <h4>Le nouveau prix de votre commande :";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 6, $this->source); })()), "prix", [], "any", false, false, false, 6), "html", null, true);
        echo "</h4>
    <h4>Veuillez contactez votre livreur Mr ";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 7, $this->source); })()), "idlivreur", [], "any", false, false, false, 7), "prenom", [], "any", false, false, false, 7), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 7, $this->source); })()), "idlivreur", [], "any", false, false, false, 7), "nom", [], "any", false, false, false, 7), "html", null, true);
        echo " en cas de besoin sur :</h4>
    <h4>Numéros de téléphone : ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 8, $this->source); })()), "idlivreur", [], "any", false, false, false, 8), "telephone", [], "any", false, false, false, 8), "html", null, true);
        echo "</h4>
    <h4>Adresse Mail : ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 9, $this->source); })()), "idlivreur", [], "any", false, false, false, 9), "email", [], "any", false, false, false, 9), "html", null, true);
        echo "</h4>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "emails/excuse.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 9,  84 => 8,  78 => 7,  74 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'mail.html.twig' %}

{% block content %}
    <h1>Bonjour Mr/Mme {{ client.idclient.nom }}</h1>
    <h4>Nous nous excusons pour le retard de la livraison de votre commande, pour y remédier nous vous offrons 50% de remise</4>
    <h4>Le nouveau prix de votre commande :{{ commande.prix }}</h4>
    <h4>Veuillez contactez votre livreur Mr {{ livreur.idlivreur.prenom }} {{ livreur.idlivreur.nom }} en cas de besoin sur :</h4>
    <h4>Numéros de téléphone : {{ livreur.idlivreur.telephone }}</h4>
    <h4>Adresse Mail : {{ livreur.idlivreur.email }}</h4>
{% endblock %}", "emails/excuse.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\emails\\excuse.html.twig");
    }
}
