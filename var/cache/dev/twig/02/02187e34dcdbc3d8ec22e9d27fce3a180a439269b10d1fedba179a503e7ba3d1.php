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

/* publication/pubadmin.html.twig */
class __TwigTemplate_04714e16bb1bd0b0df973bdbcac832d1df0a0ddc0e162e67f55453d4f6717806 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/pubadmin.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "publication/pubadmin.html.twig"));

        // line 1
        echo "
        <tr class=\"inner-box\">
            <th scope=\"row\">
                <div class=\"event-date\">
                    <span>";
        // line 5
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 5, $this->source); })()), "idpublication", [], "any", false, false, false, 5), "html", null, true);
        echo "</span>
                </div>
            </th>
            <td>
                <div class=\"event-img\">
                    <img src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" alt=\"\" width=\"100\" height=\"100\"/>
                </div>
            </td>
            <td>
                <div class=\"event-wrap\">
                    <h3><a href=\"#\">";
        // line 15
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 15, $this->source); })()), "object", [], "any", false, false, false, 15), "html", null, true);
        echo "</a></h3>
                    <div class=\"meta\">
                        <div class=\"organizers\">
                            <a href=\"#\">";
        // line 18
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 18, $this->source); })()), "idclient", [], "any", false, false, false, 18), "idclient", [], "any", false, false, false, 18), "nom", [], "any", false, false, false, 18), "html", null, true);
        echo "</a>
                        </div>
                        <div class=\"categories\">
                            <a href=\"#\"></a>
                        </div>
                        <div class=\"time\">
                            <span>";
        // line 24
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 24, $this->source); })()), "date", [], "any", false, false, false, 24), "Y-m-d"), "html", null, true);
        echo "</span>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class=\"primary-btn\">
                    <a class=\"btn btn-primary\" href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_forum_archive", ["idpublication" => twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 32, $this->source); })()), "idpublication", [], "any", false, false, false, 32)]), "html", null, true);
        echo "\">";
        echo twig_escape_filter($this->env, ((array_key_exists("button_label", $context)) ? (_twig_default_filter((isset($context["button_label"]) || array_key_exists("button_label", $context) ? $context["button_label"] : (function () { throw new RuntimeError('Variable "button_label" does not exist.', 32, $this->source); })()), "Archiver")) : ("Archiver")), "html", null, true);
        echo "</a>
                </div>
            </td>
        </tr>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "publication/pubadmin.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  88 => 32,  77 => 24,  68 => 18,  62 => 15,  49 => 5,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("
        <tr class=\"inner-box\">
            <th scope=\"row\">
                <div class=\"event-date\">
                    <span>{{ p.idpublication }}</span>
                </div>
            </th>
            <td>
                <div class=\"event-img\">
                    <img src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" alt=\"\" width=\"100\" height=\"100\"/>
                </div>
            </td>
            <td>
                <div class=\"event-wrap\">
                    <h3><a href=\"#\">{{ p.object }}</a></h3>
                    <div class=\"meta\">
                        <div class=\"organizers\">
                            <a href=\"#\">{{ p.idclient.idclient.nom }}</a>
                        </div>
                        <div class=\"categories\">
                            <a href=\"#\"></a>
                        </div>
                        <div class=\"time\">
                            <span>{{ p.date | date('Y-m-d')}}</span>
                        </div>
                    </div>
                </div>
            </td>

            <td>
                <div class=\"primary-btn\">
                    <a class=\"btn btn-primary\" href=\"{{ path('app_forum_archive', {'idpublication': p.idpublication}) }}\">{{ button_label | default('Archiver') }}</a>
                </div>
            </td>
        </tr>
", "publication/pubadmin.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\publication\\pubadmin.html.twig");
    }
}
