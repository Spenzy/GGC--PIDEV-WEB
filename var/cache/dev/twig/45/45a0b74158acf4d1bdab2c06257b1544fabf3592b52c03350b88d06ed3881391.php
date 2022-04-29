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

/* commentaire/_delete_form.html.twig */
class __TwigTemplate_694d059efa386e89ffbfefb803e4ad94bb11136d1f3dfb6e0f57eb0aa698d6fe extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/_delete_form.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "commentaire/_delete_form.html.twig"));

        // line 1
        echo "<form method=\"post\"
      action=\"";
        // line 2
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commentaire_delete", ["idcommentaire" => twig_get_attribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 2, $this->source); })()), "idcommentaire", [], "any", false, false, false, 2)]), "html", null, true);
        echo "\"
      onsubmit=\"return confirm('Voulez vous vraiment supprimer ce commentaire?');\">

    <input type=\"hidden\" name=\"_token\" value=\"";
        // line 5
        echo twig_escape_filter($this->env, $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderCsrfToken(("delete" . twig_get_attribute($this->env, $this->source, (isset($context["c"]) || array_key_exists("c", $context) ? $context["c"] : (function () { throw new RuntimeError('Variable "c" does not exist.', 5, $this->source); })()), "idcommentaire", [], "any", false, false, false, 5))), "html", null, true);
        echo "\">
    <button class=\"btn btn-outline-danger\"><i class=\"fa fa-trash\"></i></button>
</form>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "commentaire/_delete_form.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  52 => 5,  46 => 2,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<form method=\"post\"
      action=\"{{ path('app_commentaire_delete', {'idcommentaire': c.idcommentaire}) }}\"
      onsubmit=\"return confirm('Voulez vous vraiment supprimer ce commentaire?');\">

    <input type=\"hidden\" name=\"_token\" value=\"{{ csrf_token('delete' ~ c.idcommentaire) }}\">
    <button class=\"btn btn-outline-danger\"><i class=\"fa fa-trash\"></i></button>
</form>
", "commentaire/_delete_form.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\commentaire\\_delete_form.html.twig");
    }
}