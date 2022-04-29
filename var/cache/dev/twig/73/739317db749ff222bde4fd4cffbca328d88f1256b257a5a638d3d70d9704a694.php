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

/* emails/affectation.html.twig */
class __TwigTemplate_3da107e272d014f2b3d4aff6e0141af3284718eca0f806c496e1359749b128a0 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/affectation.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "emails/affectation.html.twig"));

        $this->parent = $this->loadTemplate("mail.html.twig", "emails/affectation.html.twig", 1);
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
        echo "    <h1><span>Votre commande vous sera prochainement livrée!</span></h1>

    <h3>Bonjour Mr/Mme ";
        // line 6
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["client"]) || array_key_exists("client", $context) ? $context["client"] : (function () { throw new RuntimeError('Variable "client" does not exist.', 6, $this->source); })()), "idclient", [], "any", false, false, false, 6), "nom", [], "any", false, false, false, 6), "html", null, true);
        echo ",</h3>
    <h4>Nous vous informons que votre commande N°";
        // line 7
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 7, $this->source); })()), "idcommande", [], "any", false, false, false, 7), "html", null, true);
        echo " vous sera livrée le ";
        ((twig_get_attribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 7, $this->source); })()), "dateheure", [], "any", false, false, false, 7)) ? (print (twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["livraison"]) || array_key_exists("livraison", $context) ? $context["livraison"] : (function () { throw new RuntimeError('Variable "livraison" does not exist.', 7, $this->source); })()), "dateheure", [], "any", false, false, false, 7), "Y-m-d"), "html", null, true))) : (print ("")));
        echo " à l'adresse : ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 7, $this->source); })()), "adresse", [], "any", false, false, false, 7), "html", null, true);
        echo "</h4>
    <h4>Veuillez contactez votre livreur Mr ";
        // line 8
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 8, $this->source); })()), "idlivreur", [], "any", false, false, false, 8), "prenom", [], "any", false, false, false, 8), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 8, $this->source); })()), "idlivreur", [], "any", false, false, false, 8), "nom", [], "any", false, false, false, 8), "html", null, true);
        echo " en cas de besoin sur :</h4>
    <h4>Numéros de téléphone : ";
        // line 9
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 9, $this->source); })()), "idlivreur", [], "any", false, false, false, 9), "telephone", [], "any", false, false, false, 9), "html", null, true);
        echo "</h4>
    <h4>Adresse Mail : ";
        // line 10
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["livreur"]) || array_key_exists("livreur", $context) ? $context["livreur"] : (function () { throw new RuntimeError('Variable "livreur" does not exist.', 10, $this->source); })()), "idlivreur", [], "any", false, false, false, 10), "email", [], "any", false, false, false, 10), "html", null, true);
        echo "</h4>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "emails/affectation.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 10,  90 => 9,  84 => 8,  76 => 7,  72 => 6,  68 => 4,  58 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'mail.html.twig' %}

{% block content %}
    <h1><span>Votre commande vous sera prochainement livrée!</span></h1>

    <h3>Bonjour Mr/Mme {{ client.idclient.nom }},</h3>
    <h4>Nous vous informons que votre commande N°{{ commande.idcommande }} vous sera livrée le {{ livraison.dateheure ? livraison.dateheure|date('Y-m-d') : '' }} à l'adresse : {{ commande.adresse }}</h4>
    <h4>Veuillez contactez votre livreur Mr {{ livreur.idlivreur.prenom }} {{ livreur.idlivreur.nom }} en cas de besoin sur :</h4>
    <h4>Numéros de téléphone : {{ livreur.idlivreur.telephone }}</h4>
    <h4>Adresse Mail : {{ livreur.idlivreur.email }}</h4>
{% endblock %}", "emails/affectation.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\emails\\affectation.html.twig");
    }
}
