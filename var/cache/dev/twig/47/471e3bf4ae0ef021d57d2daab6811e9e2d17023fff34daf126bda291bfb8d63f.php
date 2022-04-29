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

/* commentaire/activity.html.twig */
class __TwigTemplate_1131278a77370a211d2307a7a314151193eef9ea0021fa11f4cd4d58a28b1d9c extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/activity.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/activity.html.twig"));

        // line 1
        echo "<!-- Comment Section -->
<div class=\"container d-flex justify-content-center\">
    <div class=\"col-lg-8 shadow-lg\">
        <div class=\"panel\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Activity Feed</h3>
            </div>
            <div class=\"panel-content panel-activity\">
                <!-- Comments -->
                <ul class=\"panel-activity__list\">
                    ";
        // line 11
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 11, $this->source); })()));
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
        foreach ($context['_seq'] as $context["_key"] => $context["c"]) {
            // line 12
            echo "                        <li>
                            <i class=\"activity__list__icon fa fa-question-circle-o\"></i>
                            <div class=\"activity__list__header\">
                                <div class=\"d-flex justify-content-start\">
                                    <img src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" alt=\"\"/>
                                    <a href=\"#\">";
            // line 17
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["c"], "idclient", [], "any", false, false, false, 17), "idclient", [], "any", false, false, false, 17), "nom", [], "any", false, false, false, 17), "html", null, true);
            echo " </a> a répondu à : <a href=\"#\"> ";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["p"]) || array_key_exists("p", $context) ? $context["p"] : (function () { throw new RuntimeError('Variable "p" does not exist.', 17, $this->source); })()), "object", [], "any", false, false, false, 17), "html", null, true);
            echo "</a>
                                </div>
                                <div class=\"d-flex justify-content-end\">
                                    ";
            // line 20
            if ((0 === twig_compare((isset($context["uid"]) || array_key_exists("uid", $context) ? $context["uid"] : (function () { throw new RuntimeError('Variable "uid" does not exist.', 20, $this->source); })()), twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["c"], "idclient", [], "any", false, false, false, 20), "idclient", [], "any", false, false, false, 20), "idpersonne", [], "any", false, false, false, 20)))) {
                // line 21
                echo "                                        <a href=\"";
                echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_edit", ["idpublication" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["c"], "idpublication", [], "any", false, false, false, 21), "idpublication", [], "any", false, false, false, 21), "idcommentaire" => twig_get_attribute($this->env, $this->source, $context["c"], "idcommentaire", [], "any", false, false, false, 21)]), "html", null, true);
                echo "\"
                                                class=\"btn btn-outline-dark\"><i class=\"fa fa-edit\"></i>
                                        </a>
                                        ";
                // line 24
                echo twig_include($this->env, $context, "commentaire/_delete_form.html.twig");
                echo "
                                    ";
            }
            // line 26
            echo "                                </div>
                            </div>
                            <div class=\"activity__list__body entry-content\">
                                <blockquote>
                                    <p>
                                        ";
            // line 31
            echo twig_get_attribute($this->env, $this->source, $context["c"], "description", [], "any", false, false, false, 31);
            echo "
                                    </p>
                                </blockquote>
                            </div>
                            <div class=\"activity__list__footer\">
                                <a href=\"#\"> <i class=\"fa fa-thumbs-up\"></i>123</a>
                                <a href=\"#\"> <i class=\"fa fa-comments\"></i>23</a>
                                <span> <i class=\"fa fa-clock\"></i>";
            // line 38
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["c"], "date", [], "any", false, false, false, 38), "Y-m-d"), "html", null, true);
            echo "</span>
                            </div>
                        </li>
                    ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['c'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 42
        echo "                    <div class=\"d-flex justify-content-center\">
                        ";
        // line 43
        echo $this->extensions['Knp\Bundle\PaginatorBundle\Twig\Extension\PaginationExtension']->render($this->env, (isset($context["commentaires"]) || array_key_exists("commentaires", $context) ? $context["commentaires"] : (function () { throw new RuntimeError('Variable "commentaires" does not exist.', 43, $this->source); })()), "@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig");
        echo "
                    </div>
                </ul>
                ";
        // line 46
        echo twig_include($this->env, $context, "commentaire/_form.html.twig");
        echo "
            </div>
        </div>
    </div>
</div>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "commentaire/activity.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  145 => 46,  139 => 43,  136 => 42,  118 => 38,  108 => 31,  101 => 26,  96 => 24,  89 => 21,  87 => 20,  79 => 17,  72 => 12,  55 => 11,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!-- Comment Section -->
<div class=\"container d-flex justify-content-center\">
    <div class=\"col-lg-8 shadow-lg\">
        <div class=\"panel\">
            <div class=\"panel-heading\">
                <h3 class=\"panel-title\">Activity Feed</h3>
            </div>
            <div class=\"panel-content panel-activity\">
                <!-- Comments -->
                <ul class=\"panel-activity__list\">
                    {% for c in commentaires %}
                        <li>
                            <i class=\"activity__list__icon fa fa-question-circle-o\"></i>
                            <div class=\"activity__list__header\">
                                <div class=\"d-flex justify-content-start\">
                                    <img src=\"https://bootdey.com/img/Content/avatar/avatar1.png\" alt=\"\"/>
                                    <a href=\"#\">{{ c.idclient.idclient.nom }} </a> a répondu à : <a href=\"#\"> {{ p.object  }}</a>
                                </div>
                                <div class=\"d-flex justify-content-end\">
                                    {% if uid == c.idclient.idclient.idpersonne %}
                                        <a href=\"{{ path('app_commentaire_edit', { 'idpublication':c.idpublication.idpublication, 'idcommentaire': c.idcommentaire}) }}\"
                                                class=\"btn btn-outline-dark\"><i class=\"fa fa-edit\"></i>
                                        </a>
                                        {{ include('commentaire/_delete_form.html.twig') }}
                                    {% endif %}
                                </div>
                            </div>
                            <div class=\"activity__list__body entry-content\">
                                <blockquote>
                                    <p>
                                        {{ c.description | raw }}
                                    </p>
                                </blockquote>
                            </div>
                            <div class=\"activity__list__footer\">
                                <a href=\"#\"> <i class=\"fa fa-thumbs-up\"></i>123</a>
                                <a href=\"#\"> <i class=\"fa fa-comments\"></i>23</a>
                                <span> <i class=\"fa fa-clock\"></i>{{ c.date | date('Y-m-d') }}</span>
                            </div>
                        </li>
                    {% endfor %}
                    <div class=\"d-flex justify-content-center\">
                        {{ knp_pagination_render(commentaires, '@KnpPaginator/Pagination/twitter_bootstrap_v4_pagination.html.twig') }}
                    </div>
                </ul>
                {{ include('commentaire/_form.html.twig') }}
            </div>
        </div>
    </div>
</div>", "commentaire/activity.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\commentaire\\activity.html.twig");
    }
}
