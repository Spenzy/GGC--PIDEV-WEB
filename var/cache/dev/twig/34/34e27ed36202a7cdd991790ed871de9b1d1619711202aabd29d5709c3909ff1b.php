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

/* produit/remise.html.twig */
class __TwigTemplate_29555bab2d006c81a109a514c74208febd646197a14faedb448e8c1a933c5173 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/remise.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "produit/remise.html.twig"));

        // line 1
        echo "<h2 class =\"d-flex justify-content-center\">Remise sur les produits par catégorie</h2>

<div class=\"container-fluid d-flex justify-content-center\">
    <form class=\"form-group\" action=\"";
        // line 4
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_remise");
        echo "\" method=\"POST\">
        <div>
            <label> Catégorie </label>
            <input class=\"form-control\" type=\"text\" name=\"categorie\" id=\"categorie\" onfocusout=\"categorie_check()\">
            <label id=\"Erreurcategorie\" style=\"color: red; display:none;\"> Ce champ est obligatoire</label>
        </div>
        <div>
            <label>Montant de la remise (%)</label>
            <input class=\"form-control\" type=\"number\" name=\"montant\" id=\"montant\" onfocusout=\"montant_check()\">
            <label id=\"Erreurmontant\" style=\"color: red; display:none;\"> Le montant de remise est obligatoire et ne peut pas etre négatif</label>
        </div>
        <div class=\"d-flex justify-content-center\">
            <button type=\"submit\" class=\"btn btn-outline-primary mt-2\">Affecter remise</button>
        </div>
    </form>
</div>

<script>
    function categorie_check() {
        if(document.getElementById(\"categorie\").value === \"\") {
            document.getElementById(\"Erreurcategorie\").style.display=\"block\";
        }else{
            document.getElementById(\"Erreurcategorie\").style.display=\"none\";
        }
    }
    function montant_check() {
        if(Number(document.getElementById(\"montant\").value < 0)) {
            document.getElementById(\"Erreurmontant\").style.display=\"block\";
        }else{
            document.getElementById(\"Erreurmontant\").style.display=\"none\";
        }
    }
</script>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "produit/remise.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  48 => 4,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<h2 class =\"d-flex justify-content-center\">Remise sur les produits par catégorie</h2>

<div class=\"container-fluid d-flex justify-content-center\">
    <form class=\"form-group\" action=\"{{ path('app_produit_remise') }}\" method=\"POST\">
        <div>
            <label> Catégorie </label>
            <input class=\"form-control\" type=\"text\" name=\"categorie\" id=\"categorie\" onfocusout=\"categorie_check()\">
            <label id=\"Erreurcategorie\" style=\"color: red; display:none;\"> Ce champ est obligatoire</label>
        </div>
        <div>
            <label>Montant de la remise (%)</label>
            <input class=\"form-control\" type=\"number\" name=\"montant\" id=\"montant\" onfocusout=\"montant_check()\">
            <label id=\"Erreurmontant\" style=\"color: red; display:none;\"> Le montant de remise est obligatoire et ne peut pas etre négatif</label>
        </div>
        <div class=\"d-flex justify-content-center\">
            <button type=\"submit\" class=\"btn btn-outline-primary mt-2\">Affecter remise</button>
        </div>
    </form>
</div>

<script>
    function categorie_check() {
        if(document.getElementById(\"categorie\").value === \"\") {
            document.getElementById(\"Erreurcategorie\").style.display=\"block\";
        }else{
            document.getElementById(\"Erreurcategorie\").style.display=\"none\";
        }
    }
    function montant_check() {
        if(Number(document.getElementById(\"montant\").value < 0)) {
            document.getElementById(\"Erreurmontant\").style.display=\"block\";
        }else{
            document.getElementById(\"Erreurmontant\").style.display=\"none\";
        }
    }
</script>
", "produit/remise.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\produit\\remise.html.twig");
    }
}
