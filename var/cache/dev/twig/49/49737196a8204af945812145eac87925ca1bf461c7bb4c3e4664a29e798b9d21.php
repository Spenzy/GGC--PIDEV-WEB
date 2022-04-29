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

/* panier/pdf.html.twig */
class __TwigTemplate_112f6e67d41980bff1d460fb88eb9a400ac72eba48802e8005d1678422ddd797 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "panier/pdf.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "panier/pdf.html.twig"));

        // line 1
        echo "

<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <style>body{margin-top:20px;
            background:#EBFAFA;
        }

        /*Invoice*/
        .invoice .top-left {
            font-size:65px;
            color:#3ba0ff;
        }

        .invoice .top-right {
            text-align:right;
            padding-right:20px;
        }

        .invoice .table-row {
            margin-left:-15px;
            margin-right:-15px;
            margin-top:25px;
        }

        .invoice .payment-info {
            font-weight:500;
        }

        .invoice .table-row .table>thead {
            border-top:1px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom:none;
        }

        .invoice .table>tbody>tr>td {
            padding:8px 20px;
        }

        .invoice .invoice-total {
            margin-right:-10px;
            font-size:16px;
        }

        .invoice .last-row {
            border-bottom:1px solid #ddd;
        }

        .invoice-ribbon {
            width:85px;
            height:88px;
            overflow:hidden;
            position:absolute;
            top:-1px;
            right:14px;
        }

        .ribbon-inner {
            text-align:center;
            -webkit-transform:rotate(45deg);
            -moz-transform:rotate(45deg);
            -ms-transform:rotate(45deg);
            -o-transform:rotate(45deg);
            position:relative;
            padding:7px 0;
            left:-5px;
            top:11px;
            width:120px;
            background-color:#66c591;
            font-size:15px;
            color:#fff;
        }

        .ribbon-inner:before,.ribbon-inner:after {
            content:\"\";
            position:absolute;
        }

        .ribbon-inner:before {
            left:0;
        }

        .ribbon-inner:after {
            right:0;
        }

        @media(max-width:575px) {
            .invoice .top-left,.invoice .top-right,.invoice .payment-details {
                text-align:center;
            }

            .invoice .from,.invoice .to,.invoice .payment-details {
                float:none;
                width:100%;
                text-align:center;
                margin-bottom:25px;
            }

            .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
                font-size:22px;
            }

            .invoice .btn {
                margin-top:10px;
            }
        }

        @media print {
            .invoice {
                width:900px;
                height:800px;
            }
        }</style>
    <title>Reçu de la commande numéro ";
        // line 118
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 118, $this->source); })()), "idCommande", [], "any", false, false, false, 118), "html", null, true);
        echo "</title>

</head>

<body>

<img src=\"C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\public\\img\\LogoGGC.png\" alt=\"Logo\">

<h1 class=\"text-center\">Reçu de la commande numéro ";
        // line 126
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 126, $this->source); })()), "idCommande", [], "any", false, false, false, 126), "html", null, true);
        echo "</h1>
<link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\">

<h4>Chèr(e) client(e) ";
        // line 129
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["commande"]) || array_key_exists("commande", $context) ? $context["commande"] : (function () { throw new RuntimeError('Variable "commande" does not exist.', 129, $this->source); })()), "idClient", [], "any", false, false, false, 129), "idClient", [], "any", false, false, false, 129), "nom", [], "any", false, false, false, 129), "html", null, true);
        echo ", nous vous remerçions pour votre confiance.</h4>
<p>Voici le reçu de votre commande, contactez-nous sur \"gamergeekscommunity@gmail.som\" si vous avez des questions.</p>
<div class=\"container bootstrap snippets bootdeys\">
    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"panel panel-default invoice\" id=\"invoice\">
                <div class=\"panel-body\">
                    <div class=\"invoice-ribbon\"><div class=\"ribbon-inner\">Reçu</div></div>
                    <div class=\"row\">



                        <div class=\"col-sm-6 top-right\">
                            <span class=\"marginright\">";
        // line 142
        echo twig_escape_filter($this->env, twig_date_format_filter($this->env, "now", "m/d/Y"), "html", null, true);
        echo "</span>
                        </div>

                    </div>
                    <hr>


                    <div class=\"row table-row \">
                        <table class=\"table table-striped d-inline-flex justify-content-center\">
                            <thead>
                            <tr>
                                <th class=\"text-center\" >Référence</th>
                                <th style=\"width:50%\">Libelle</th>
                                <th class=\"text-right\" >Prix Unitaire</th>
                                <th class=\"text-right\" >Quantité</th>
                                <th class=\"text-right\">Prix Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            ";
        // line 161
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["dataPanier"]) || array_key_exists("dataPanier", $context) ? $context["dataPanier"] : (function () { throw new RuntimeError('Variable "dataPanier" does not exist.', 161, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["element"]) {
            // line 162
            echo "                                <tr>
                                    <td class=\"text-right\">";
            // line 163
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["element"], "produit", [], "any", false, false, false, 163), "reference", [], "any", false, false, false, 163), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 164
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["element"], "produit", [], "any", false, false, false, 164), "libelle", [], "any", false, false, false, 164), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 165
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["element"], "produit", [], "any", false, false, false, 165), "prix", [], "any", false, false, false, 165), "html", null, true);
            echo " </td>
                                    <td class=\"text-right\">";
            // line 166
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 166), "html", null, true);
            echo "</td>
                                    <td class=\"text-right\">";
            // line 167
            echo twig_escape_filter($this->env, (twig_get_attribute($this->env, $this->source, $context["element"], "quantite", [], "any", false, false, false, 167) * twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["element"], "produit", [], "any", false, false, false, 167), "prix", [], "any", false, false, false, 167)), "html", null, true);
            echo "</td>

                                </tr>
                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['element'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 171
        echo "
                            </tbody>
                            <tfoot>
                            <tr>
                                <td class=\"text-left\">Total:</td>
                                <td class=\"text-xl-left\">";
        // line 176
        echo twig_escape_filter($this->env, (isset($context["total"]) || array_key_exists("total", $context) ? $context["total"] : (function () { throw new RuntimeError('Variable "total" does not exist.', 176, $this->source); })()), "html", null, true);
        echo " DT</td>
                                <td>

                                </td>
                            </tr>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "panier/pdf.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  257 => 176,  250 => 171,  240 => 167,  236 => 166,  232 => 165,  228 => 164,  224 => 163,  221 => 162,  217 => 161,  195 => 142,  179 => 129,  173 => 126,  162 => 118,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("

<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <style>body{margin-top:20px;
            background:#EBFAFA;
        }

        /*Invoice*/
        .invoice .top-left {
            font-size:65px;
            color:#3ba0ff;
        }

        .invoice .top-right {
            text-align:right;
            padding-right:20px;
        }

        .invoice .table-row {
            margin-left:-15px;
            margin-right:-15px;
            margin-top:25px;
        }

        .invoice .payment-info {
            font-weight:500;
        }

        .invoice .table-row .table>thead {
            border-top:1px solid #ddd;
        }

        .invoice .table-row .table>thead>tr>th {
            border-bottom:none;
        }

        .invoice .table>tbody>tr>td {
            padding:8px 20px;
        }

        .invoice .invoice-total {
            margin-right:-10px;
            font-size:16px;
        }

        .invoice .last-row {
            border-bottom:1px solid #ddd;
        }

        .invoice-ribbon {
            width:85px;
            height:88px;
            overflow:hidden;
            position:absolute;
            top:-1px;
            right:14px;
        }

        .ribbon-inner {
            text-align:center;
            -webkit-transform:rotate(45deg);
            -moz-transform:rotate(45deg);
            -ms-transform:rotate(45deg);
            -o-transform:rotate(45deg);
            position:relative;
            padding:7px 0;
            left:-5px;
            top:11px;
            width:120px;
            background-color:#66c591;
            font-size:15px;
            color:#fff;
        }

        .ribbon-inner:before,.ribbon-inner:after {
            content:\"\";
            position:absolute;
        }

        .ribbon-inner:before {
            left:0;
        }

        .ribbon-inner:after {
            right:0;
        }

        @media(max-width:575px) {
            .invoice .top-left,.invoice .top-right,.invoice .payment-details {
                text-align:center;
            }

            .invoice .from,.invoice .to,.invoice .payment-details {
                float:none;
                width:100%;
                text-align:center;
                margin-bottom:25px;
            }

            .invoice p.lead,.invoice .from p.lead,.invoice .to p.lead,.invoice .payment-details p.lead {
                font-size:22px;
            }

            .invoice .btn {
                margin-top:10px;
            }
        }

        @media print {
            .invoice {
                width:900px;
                height:800px;
            }
        }</style>
    <title>Reçu de la commande numéro {{ commande.idCommande }}</title>

</head>

<body>

<img src=\"C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\public\\img\\LogoGGC.png\" alt=\"Logo\">

<h1 class=\"text-center\">Reçu de la commande numéro {{ commande.idCommande }}</h1>
<link href=\"https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css\" rel=\"stylesheet\">

<h4>Chèr(e) client(e) {{ commande.idClient.idClient.nom }}, nous vous remerçions pour votre confiance.</h4>
<p>Voici le reçu de votre commande, contactez-nous sur \"gamergeekscommunity@gmail.som\" si vous avez des questions.</p>
<div class=\"container bootstrap snippets bootdeys\">
    <div class=\"row\">
        <div class=\"col-sm-12\">
            <div class=\"panel panel-default invoice\" id=\"invoice\">
                <div class=\"panel-body\">
                    <div class=\"invoice-ribbon\"><div class=\"ribbon-inner\">Reçu</div></div>
                    <div class=\"row\">



                        <div class=\"col-sm-6 top-right\">
                            <span class=\"marginright\">{{ \"now\"|date(\"m/d/Y\") }}</span>
                        </div>

                    </div>
                    <hr>


                    <div class=\"row table-row \">
                        <table class=\"table table-striped d-inline-flex justify-content-center\">
                            <thead>
                            <tr>
                                <th class=\"text-center\" >Référence</th>
                                <th style=\"width:50%\">Libelle</th>
                                <th class=\"text-right\" >Prix Unitaire</th>
                                <th class=\"text-right\" >Quantité</th>
                                <th class=\"text-right\">Prix Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            {% for element in dataPanier %}
                                <tr>
                                    <td class=\"text-right\">{{ element.produit.reference }}</td>
                                    <td class=\"text-right\">{{ element.produit.libelle }}</td>
                                    <td class=\"text-right\">{{ element.produit.prix }} </td>
                                    <td class=\"text-right\">{{ element.quantite }}</td>
                                    <td class=\"text-right\">{{ element.quantite * element.produit.prix }}</td>

                                </tr>
                            {% endfor %}

                            </tbody>
                            <tfoot>
                            <tr>
                                <td class=\"text-left\">Total:</td>
                                <td class=\"text-xl-left\">{{ total }} DT</td>
                                <td>

                                </td>
                            </tr>
                        </table>

                    </div>


                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>", "panier/pdf.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\panier\\pdf.html.twig");
    }
}
