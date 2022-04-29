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

/* publication/article.html.twig */
class __TwigTemplate_4f17ee4df8b8279fa696c40767c36dac347c0e2590fa3477c2bdc4e5a6e6cae4 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/article.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/article.html.twig"));

        // line 1
        echo "<article class=\"row post vt-post shadow-sm d-flex justify-content-center shadow-lg\">
    ";
        // line 2
        if ((0 === twig_compare((isset($context["uid"]) || array_key_exists("uid", $context) ? $context["uid"] : (function () { throw new RuntimeError('Variable "uid" does not exist.', 2, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 2, $this->source); })()), "idclient", [], "any", false, false, false, 2), "idclient", [], "any", false, false, false, 2), "idpersonne", [], "any", false, false, false, 2)))) {
            // line 3
            echo "    <div class=\"d-flex justify-content-end\">
        <a href=\"";
            // line 4
            echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_publication_edit", ["idpublication" => twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 4, $this->source); })()), "idpublication", [], "any", false, false, false, 4)]), "html", null, true);
            echo " \"
                class=\"btn btn-outline-warning\">
            <i class=\"fa fa-edit\"></i>
        </a>
    </div>
    ";
        }
        // line 10
        echo "    <div class=\"col-xs-11 col-sm-4 col-md-4 col-lg-3\">
        <img src=\"https://bootdey.com/img/Content/avatar/avatar7.png\" class=\"post-img img-responsive\"
             alt=\"image post\" width=\"275\" height=\"250\">
        <div class=\"author-info author-info-2\">
            <div class=\"list-inline\">
                <div class=\"info\">
                    <p>Publié le: <strong>";
        // line 16
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 16, $this->source); })()), "date", [], "any", false, false, false, 16), "Y-m-d"), "html", null, true);
        echo "</strong></p>
                </div>
                <div class=\"info\">
                    <p>Comments: <strong>";
        // line 19
        echo twig_escape_filter($this->env, (isset($context["nbrC"]) || array_key_exists("nbrC", $context) ? $context["nbrC"] : (function () { throw new RuntimeError('Variable "nbrC" does not exist.', 19, $this->source); })()), "html", null, true);
        echo "</strong></p>
                </div>
                <div class=\"info\">
                    ";
        // line 22
        echo twig_include($this->env, $context, "vote/show.html.twig");
        echo "
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-xs-10 col-sm-5 col-md-5 col-lg-6\">
        <div class=\"caption\">
            <h3 class=\"md-heading\"><a href=\"#\">";
        // line 30
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 30, $this->source); })()), "object", [], "any", false, false, false, 30), "html", null, true);
        echo "</a></h3>
            <p> ";
        // line 31
        echo twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 31, $this->source); })()), "description", [], "any", false, false, false, 31);
        echo "</p>
        </div>
    </div>

</article>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "publication/article.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  95 => 31,  91 => 30,  80 => 22,  74 => 19,  68 => 16,  60 => 10,  51 => 4,  48 => 3,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<article class=\"row post vt-post shadow-sm d-flex justify-content-center shadow-lg\">
    {% if uid == p.idclient.idclient.idpersonne %}
    <div class=\"d-flex justify-content-end\">
        <a href=\"{{ path('app_publication_edit', {'idpublication': p.idpublication}) }} \"
                class=\"btn btn-outline-warning\">
            <i class=\"fa fa-edit\"></i>
        </a>
    </div>
    {% endif %}
    <div class=\"col-xs-11 col-sm-4 col-md-4 col-lg-3\">
        <img src=\"https://bootdey.com/img/Content/avatar/avatar7.png\" class=\"post-img img-responsive\"
             alt=\"image post\" width=\"275\" height=\"250\">
        <div class=\"author-info author-info-2\">
            <div class=\"list-inline\">
                <div class=\"info\">
                    <p>Publié le: <strong>{{ p.date | date('Y-m-d') }}</strong></p>
                </div>
                <div class=\"info\">
                    <p>Comments: <strong>{{ nbrC }}</strong></p>
                </div>
                <div class=\"info\">
                    {{ include('vote/show.html.twig') }}
                </div>
            </div>
        </div>
    </div>

    <div class=\"col-xs-10 col-sm-5 col-md-5 col-lg-6\">
        <div class=\"caption\">
            <h3 class=\"md-heading\"><a href=\"#\">{{ p.object }}</a></h3>
            <p> {{ p.description | raw }}</p>
        </div>
    </div>

</article>", "publication/article.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\publication\\article.html.twig");
    }
}
