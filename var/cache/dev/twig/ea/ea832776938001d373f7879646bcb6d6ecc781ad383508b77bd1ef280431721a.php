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

/* produit/details.html.twig */
class __TwigTemplate_7acb1c9a1d041de3ef22a50aa98df0c6a83d4c609dc56dda5b1fff25883e73f8 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/details.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/details.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "produit/details.html.twig", 1);
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
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/details.css"), "html", null, true);
        echo " rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"path/to/font-awesome/css/font-awesome.min.css\">


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

                    <h1 class=\"text-white mb-4 animated zoomIn\"> ";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 18, $this->source); })()), "libelle", [], "any", false, false, false, 18), "html", null, true);
        echo " </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici les détails du produit ";
        // line 19
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 19, $this->source); })()), "libelle", [], "any", false, false, false, 19), "html", null, true);
        echo " et ses avis</p>
                ";
        // line 22
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

    // line 31
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

    // line 33
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 34
        echo "    <div class=\"container-fluid bootdey\">
        <div class=\"col-md-12\">
            <section class=\"panel\">
                <div class=\"panel-body row g-3\">
                    <div class=\"col-md-6\">
                        <div class=\"pro-img-details\">
                            <img src=\"";
        // line 40
        echo twig_escape_filter($this->env, ($this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("uploads/img/") . twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 40, $this->source); })()), "img", [], "any", false, false, false, 40)), "html", null, true);
        echo "\" alt=\"\">
                        </div>

                    </div>
                    <div class=\"col-md-6\">
                            <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">

                            <h2 class=\"mt -2\">
                                ";
        // line 48
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 48, $this->source); })()), "libelle", [], "any", false, false, false, 48), "html", null, true);
        echo "
                            </h2>
                            </div>
                        <p>
                            Description : ";
        // line 52
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 52, $this->source); })()), "description", [], "any", false, false, false, 52), "html", null, true);
        echo "
                        </p>

                        <div class=\"product_meta\">
                            <span class=\"posted_in\"> <strong>Catégorie :</strong> ";
        // line 56
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 56, $this->source); })()), "categorie", [], "any", false, false, false, 56), "html", null, true);
        echo "</span>
                            <span class=\"tagged_as\"><strong>Note :</strong> ";
        // line 57
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 57, $this->source); })()), "note", [], "any", false, false, false, 57), "html", null, true);
        echo "</span>
                        </div>

                        <div class=\"m-bot15\"> <strong>Prix : </strong>   ";
        // line 60
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 60, $this->source); })()), "prix", [], "any", false, false, false, 60), "html", null, true);
        echo "</div>

                        <p>
                            <a href=\"";
        // line 63
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_add", ["id" => twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 63, $this->source); })()), "reference", [], "any", false, false, false, 63)]), "html", null, true);
        echo "\" class=\"btn btn-round btn-danger\" type=\"button\" ><i class=\"fa fa-shopping-cart\"></i> Ajouter au panier</a>
                        </p>


                    </div>
                </div>
            </section>
        </div>
    </div>



    <!-- Testimonial Start -->
    <div class=\"container-xxl bg-primary testimonial py-5 wow fadeInUp\" data-wow-delay=\"0.1s\" style=\"margin: 6rem 0;\">
        <div class=\"container py-5 px-lg-5\">
            <div class=\"owl-carousel testimonial-carousel\">

                ";
        // line 80
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["avis"]) || array_key_exists("avis", $context) ? $context["avis"] : (function () { throw new RuntimeError('Variable "avis" does not exist.', 80, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["avi"]) {
            // line 81
            echo "                <div class=\"testimonial-item bg-transparent border rounded text-white p-4\">
                    <i class=\"fa fa-quote-left fa-2x mb-3\"></i>
                    <p> ";
            // line 83
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["avi"], "description", [], "any", false, false, false, 83), "html", null, true);
            echo "</p>
                    <div class=\"d-flex align-items-center\">
                        ";
            // line 86
            echo "                        <div class=\"ps-3\">
                            <h6 class=\"text-white mb-1\">Client Name: ";
            // line 87
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["avi"], "idclient", [], "any", false, false, false, 87), "idclient", [], "any", false, false, false, 87), "nom", [], "any", false, false, false, 87), "html", null, true);
            echo "</h6>
                            <small>";
            // line 88
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["avi"], "type", [], "any", false, false, false, 88), "html", null, true);
            echo "</small>
<br>                        ";
            // line 89
            if ((0 === twig_compare(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["avi"], "idclient", [], "any", false, false, false, 89), "idclient", [], "any", false, false, false, 89), "idPersonne", [], "any", false, false, false, 89), (isset($context["uid"]) || array_key_exists("uid", $context) ? $context["uid"] : (function () { throw new RuntimeError('Variable "uid" does not exist.', 89, $this->source); })())))) {
                // line 90
                echo "                                <a class=\"btn btn-outline-primary fa fa-trash-alt rounded-pill px-3 py-2 col\" href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_delete", ["idavis" => twig_get_attribute($this->env, $this->source, $context["avi"], "idavis", [], "any", false, false, false, 90)]), "html", null, true);
                echo "\"></a>
                                <a class=\"btn btn-outline-primary rounded-pill px-3 py-2 col\" href=\"";
                // line 91
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_edit", ["idavis" => twig_get_attribute($this->env, $this->source, $context["avi"], "idavis", [], "any", false, false, false, 91), "reference" => twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 91, $this->source); })()), "reference", [], "any", false, false, false, 91)]), "html", null, true);
                echo "\">Modifier</a>
                            ";
            }
            // line 93
            echo "
                        </div>
                    </div>
                </div>
                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['avi'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 98
        echo "


            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <a href=\"";
        // line 106
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_avis_new", ["reference" => twig_get_attribute($this->env, $this->source, (isset($context["produit"]) || array_key_exists("produit", $context) ? $context["produit"] : (function () { throw new RuntimeError('Variable "produit" does not exist.', 106, $this->source); })()), "reference", [], "any", false, false, false, 106)]), "html", null, true);
        echo "\" class=\"btn btn-outline-primary\"> Donner Avis</a>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "produit/details.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  289 => 106,  279 => 98,  269 => 93,  264 => 91,  259 => 90,  257 => 89,  253 => 88,  249 => 87,  246 => 86,  241 => 83,  237 => 81,  233 => 80,  213 => 63,  207 => 60,  201 => 57,  197 => 56,  190 => 52,  183 => 48,  172 => 40,  164 => 34,  154 => 33,  135 => 31,  118 => 22,  114 => 19,  110 => 18,  103 => 13,  93 => 12,  78 => 6,  71 => 3,  61 => 2,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}
{% block stylesheets %}
    {{ parent() }}

    <!-- Template Stylesheet -->
    <link href={{asset(\"css/details.css\")}} rel=\"stylesheet\">
    <link rel=\"stylesheet\" href=\"path/to/font-awesome/css/font-awesome.min.css\">


{% endblock %}

{% block hero %}
    <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
        <div class=\"container my-5 py-5 px-lg-5\">
            <div class=\"row g-5 py-5\">
                <div class=\"col-lg-6 text-center text-lg-start\">

                    <h1 class=\"text-white mb-4 animated zoomIn\"> {{ produit.libelle}} </h1>
                    <p class=\"text-white pb-3 animated zoomIn\">Voici les détails du produit {{ produit.libelle }} et ses avis</p>
                {#     <a href=\"\" class=\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\">Free Quote</a>
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
    <div class=\"container-fluid bootdey\">
        <div class=\"col-md-12\">
            <section class=\"panel\">
                <div class=\"panel-body row g-3\">
                    <div class=\"col-md-6\">
                        <div class=\"pro-img-details\">
                            <img src=\"{{ asset('uploads/img/')~produit.img }}\" alt=\"\">
                        </div>

                    </div>
                    <div class=\"col-md-6\">
                            <div class=\"section-title position-relative text-center mb-5 pb-2 wow fadeInUp\">

                            <h2 class=\"mt -2\">
                                {{produit.libelle}}
                            </h2>
                            </div>
                        <p>
                            Description : {{ produit.description }}
                        </p>

                        <div class=\"product_meta\">
                            <span class=\"posted_in\"> <strong>Catégorie :</strong> {{ produit.categorie }}</span>
                            <span class=\"tagged_as\"><strong>Note :</strong> {{ produit.note }}</span>
                        </div>

                        <div class=\"m-bot15\"> <strong>Prix : </strong>   {{ produit.prix}}</div>

                        <p>
                            <a href=\"{{ path('panier_add',{'id':produit.reference}) }}\" class=\"btn btn-round btn-danger\" type=\"button\" ><i class=\"fa fa-shopping-cart\"></i> Ajouter au panier</a>
                        </p>


                    </div>
                </div>
            </section>
        </div>
    </div>



    <!-- Testimonial Start -->
    <div class=\"container-xxl bg-primary testimonial py-5 wow fadeInUp\" data-wow-delay=\"0.1s\" style=\"margin: 6rem 0;\">
        <div class=\"container py-5 px-lg-5\">
            <div class=\"owl-carousel testimonial-carousel\">

                {% for avi in avis %}
                <div class=\"testimonial-item bg-transparent border rounded text-white p-4\">
                    <i class=\"fa fa-quote-left fa-2x mb-3\"></i>
                    <p> {{ avi.description }}</p>
                    <div class=\"d-flex align-items-center\">
                        {# <img class=\"img-fluid flex-shrink-0 rounded-circle\" src=\"img/testimonial-1.jpg\" style=\"width: 50px; height: 50px;\"> #}
                        <div class=\"ps-3\">
                            <h6 class=\"text-white mb-1\">Client Name: {{ avi.idclient.idclient.nom }}</h6>
                            <small>{{ avi.type }}</small>
<br>                        {% if (avi.idclient.idclient.idPersonne == uid) %}
                                <a class=\"btn btn-outline-primary fa fa-trash-alt rounded-pill px-3 py-2 col\" href=\"{{ path('app_avis_delete', {'idavis': avi.idavis }) }}\"></a>
                                <a class=\"btn btn-outline-primary rounded-pill px-3 py-2 col\" href=\"{{ path('app_avis_edit', {'idavis': avi.idavis, 'reference': produit.reference }) }}\">Modifier</a>
                            {% endif %}

                        </div>
                    </div>
                </div>
                {% endfor %}



            </div>
        </div>
    </div>
    <!-- Testimonial End -->

    <a href=\"{{ path(\"app_avis_new\", {'reference': produit.reference}) }}\" class=\"btn btn-outline-primary\"> Donner Avis</a>

{% endblock %}
", "produit/details.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\produit\\details.html.twig");
    }
}
