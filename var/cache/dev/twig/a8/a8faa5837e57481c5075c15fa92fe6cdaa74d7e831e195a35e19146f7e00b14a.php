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

/* base.html.twig */
class __TwigTemplate_2a0b4e2f913023d2cb02e7712d2d68781725bf49950bbe3d380cbfe22e198b6c extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'header' => [$this, 'block_header'],
            'hero' => [$this, 'block_hero'],
            'body' => [$this, 'block_body'],
            'footer' => [$this, 'block_footer'],
            'javascripts' => [$this, 'block_javascripts'],
        ];
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

    <title>";
        // line 7
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
    <meta content=\"\" name=\"description\">
    <meta content=\"\" name=\"keywords\">
    ";
        // line 12
        echo "
    ";
        // line 13
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 37
        echo "</head>

<body>
    ";
        // line 40
        $this->displayBlock('header', $context, $blocks);
        // line 86
        echo "
    ";
        // line 87
        $this->displayBlock('hero', $context, $blocks);
        // line 105
        echo "        <!-- Navbar & Hero End -->
    <!-- chatbot-->
    <script>
        var botmanWidget = {
            frameEndpoint: '";
        // line 109
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("chatframe");
        echo "',
            chatServer: '";
        // line 110
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("message");
        echo "',
            introMessage: 'Hello, I am a Foody ,You Can Ask Me Any Thing ',
            title: 'Easy to Eat Chatbot',
            mainColor: '#456765',
            bubbleBackground: '#ff76f4',
            aboutText: ''
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <!-- chatbot-->



    <div class=\"container-xxl py-5 bg-white mb-5\">
    ";
        // line 124
        $this->displayBlock('body', $context, $blocks);
        // line 127
        echo "    </div>

    <footer>
    ";
        // line 130
        $this->displayBlock('footer', $context, $blocks);
        // line 183
        echo "    </footer>
        
    ";
        // line 185
        $this->displayBlock('javascripts', $context, $blocks);
        // line 199
        echo "</body>
</html>
";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 7
    public function block_title($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 13
    public function block_stylesheets($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 14
        echo "        <!-- Favicon -->
        <link href=\"";
        // line 15
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/favicon.ico"), "html", null, true);
        echo "\" rel=\"icon\">

    <!-- Google Web Fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap\" rel=\"stylesheet\">

    <!-- Icon Font Stylesheet -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css\" rel=\"stylesheet\">

        <!-- Libraries Stylesheet -->
        <link href=\"";
        // line 27
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/animate/animate.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 28
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/assets/owl.carousel.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
        <link href=\"";
        // line 29
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/lightbox/css/lightbox.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        <!-- Customized Bootstrap Stylesheet -->
        <link href=\"";
        // line 32
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">

        <!-- Template Stylesheet -->
        <link href=\"";
        // line 35
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("css/style.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 40
    public function block_header($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "header"));

        // line 41
        echo "        <header>
            <div class=\"container-xxl bg-white p-0\">
                <!-- Spinner Start -->
                <div id=\"spinner\" class=\"show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
                    <div class=\"spinner-grow text-primary\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
                        <span class=\"sr-only\">Loading...</span>
                    </div>
                </div>
                <!-- Spinner End -->


                <!-- Navbar Start -->
                <div class=\"container-xxl position-relative p-0\">
                    <nav class=\"navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0\">
                            <a href=\"\" class=\"navbar-brand p-0\">
                            ";
        // line 57
        echo "                                <img src=\"";
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("img/LogoGGC.png"), "html", null, true);
        echo "\" alt=\"GGC logo\">
                        </a>
                        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                            <span class=\"fa fa-bars\"></span>
                        </button>
                        <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                            <div class=\"navbar-nav ms-auto py-0\">
                                <a href=\"#\" class=\"nav-item nav-link active\">Home</a>
                                <a href=\"";
        // line 65
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_publication_index");
        echo "\" class=\"nav-item nav-link\">Forum</a>
                                <a href=\"#\" class=\"nav-item nav-link\">Streamers</a>
                                <a href=\"#\" class=\"nav-item nav-link\">Evennements</a>
                                <div class=\"nav-item dropdown\">
                                    <a href=\"#\" class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\">Shop</a>
                                    <div class=\"dropdown-menu m-0\">
                                            <a href=\"";
        // line 71
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_produit_shop");
        echo "\" class=\"dropdown-item\">Produits</a>
                                <a href=\"";
        // line 72
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_commande_show");
        echo "\" class=\"dropdown-item\">Commande</a>
                            </div>
                        </div>
                        <a href=\"";
        // line 75
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("panier_index");
        echo "\" class=\"nav-item nav-link\">Panier</a>
                            </div>
                            <button type=\"button\" class=\"btn text-secondary ms-3\" data-bs-toggle=\"modal\" data-bs-target=\"#searchModal\"><i class=\"fa fa-search\"></i></button>
                            <a href=\"#\" class=\"btn btn-secondary text-light rounded-pill py-2 px-4 ms-3\">Sign In</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Navbar -->
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 87
    public function block_hero($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "hero"));

        // line 88
        echo "        <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
            <div class=\"container my-5 py-5 px-lg-5\">
                <div class=\"row g-5 py-5\">
                    <div class=\"col-lg-6 text-center text-lg-start\">
                        <h1 class=\"text-white mb-4 animated zoomIn\">CHANGE THIS LATER BROGRAMMERS ! RESERVED FOR TITLE!</h1>
                        <p class=\"text-white pb-3 animated zoomIn\">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit justo amet ipsum vero ipsum clita lorem</p>
                        <a href=\"\" class=\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\">Free Quote</a>
                        <a href=\"\" class=\"btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight\">Contact Us</a>
                    </div>
                    <div class=\"col-lg-6 text-center text-lg-start\">
                        <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                    </div>
                </div>
            </div>
        </div>
        <!-- Spinner End -->
        ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 124
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 125
        echo "        
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 130
    public function block_footer($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "footer"));

        // line 131
        echo "        <!-- Footer Start -->
        <div class=\"container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn\" data-wow-delay=\"0.1s\">
            <div class=\"container py-5 px-lg-5\">
                <div class=\"row g-5\">
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Get In Touch</h5>
                        <p><i class=\"fa fa-map-marker-alt me-3\"></i>123 Street, El-Ghazela, Tunisia</p>
                        <p><i class=\"fa fa-phone-alt me-3\"></i>+216 52 848 054</p>
                        <p><i class=\"fa fa-envelope me-3\"></i>gamergeekscommunity@gmail.com</p>
                        <div class=\"d-flex pt-2\">
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-youtube\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                        </div>
                    </div>
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Popular Link</h5>
                        <a class=\"btn btn-link\" href=\"\">About Us</a>
                        <a class=\"btn btn-link\" href=\"\">Contact Us</a>
                    </div>
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Newsletter</h5>
                        <p>News ? :D</p>
                        <div class=\"position-relative w-100 mt-3\">
                            <label>
                                <input class=\"form-control border-0 rounded-pill w-100 ps-4 pe-5\" type=\"text\" placeholder=\"Your Email\" style=\"height: 48px;\">
                            </label>
                            <button type=\"button\" class=\"btn shadow-none position-absolute top-0 end-0 mt-1 me-2\"><i class=\"fa fa-paper-plane text-primary fs-4\"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"container px-lg-5\">
                <div class=\"copyright\">
                    <div class=\"row\">
                        <div class=\"col-md-6 text-center text-md-start mb-3 mb-md-0\">
                            &copy; <a class=\"border-bottom\" href=\"#\">GamerGeeksCommunity</a>, All Right Reserved.
                        </div>
                        <div class=\"col-md-6 text-center text-md-end\">
                            <div class=\"footer-menu\">
                                <a href=\"\">Home</a>
                                <a href=\"\">Help</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 185
    public function block_javascripts($context, array $blocks = [])
    {
        $macros = $this->macros;
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 186
        echo "        <!-- JavaScript Libraries -->
        <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js\"></script>
        <script src=\"";
        // line 189
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/wow/wow.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 190
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/easing/easing.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 191
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/waypoints/waypoints.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 192
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/owlcarousel/owl.carousel.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 193
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/isotope/isotope.pkgd.min.js"), "html", null, true);
        echo "\"></script>
        <script src=\"";
        // line 194
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("lib/lightbox/js/lightbox.min.js"), "html", null, true);
        echo "\"></script>

        <!-- Template Javascript -->
        <script src=\"";
        // line 197
        echo twig_escape_filter($this->env, $this->extensions['Symfony\Bridge\Twig\Extension\AssetExtension']->getAssetUrl("js/main.js"), "html", null, true);
        echo "\"></script>
    ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  462 => 197,  456 => 194,  452 => 193,  448 => 192,  444 => 191,  440 => 190,  436 => 189,  431 => 186,  421 => 185,  360 => 131,  350 => 130,  339 => 125,  329 => 124,  303 => 88,  293 => 87,  272 => 75,  266 => 72,  262 => 71,  253 => 65,  241 => 57,  224 => 41,  214 => 40,  202 => 35,  196 => 32,  190 => 29,  186 => 28,  182 => 27,  167 => 15,  164 => 14,  154 => 13,  135 => 7,  123 => 199,  121 => 185,  117 => 183,  115 => 130,  110 => 127,  108 => 124,  91 => 110,  87 => 109,  81 => 105,  79 => 87,  76 => 86,  74 => 40,  69 => 37,  67 => 13,  64 => 12,  58 => 7,  50 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<!DOCTYPE html>
<html>
<head>
    <meta charset=\"UTF-8\">
    <meta content=\"width=device-width, initial-scale=1.0\" name=\"viewport\">

    <title>{% block title %}Welcome!{% endblock %}</title>
    <meta content=\"\" name=\"description\">
    <meta content=\"\" name=\"keywords\">
    {# Run `composer require symfony/webpack-encore-bundle`
           and uncomment the following Encore helpers to start using Symfony UX #}

    {% block stylesheets %}
        <!-- Favicon -->
        <link href=\"{{asset(\"img/favicon.ico\")}}\" rel=\"icon\">

    <!-- Google Web Fonts -->
    <link rel=\"preconnect\" href=\"https://fonts.googleapis.com\">
    <link rel=\"preconnect\" href=\"https://fonts.gstatic.com\" crossorigin>
    <link href=\"https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap\" rel=\"stylesheet\">

    <!-- Icon Font Stylesheet -->
    <link href=\"https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css\" rel=\"stylesheet\">
    <link href=\"https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css\" rel=\"stylesheet\">

        <!-- Libraries Stylesheet -->
        <link href=\"{{asset(\"lib/animate/animate.min.css\")}}\" rel=\"stylesheet\">
        <link href=\"{{asset(\"lib/owlcarousel/assets/owl.carousel.min.css\")}}\" rel=\"stylesheet\">
        <link href=\"{{asset(\"lib/lightbox/css/lightbox.min.css\")}}\" rel=\"stylesheet\">

        <!-- Customized Bootstrap Stylesheet -->
        <link href=\"{{asset(\"css/bootstrap.min.css\")}}\" rel=\"stylesheet\">

        <!-- Template Stylesheet -->
        <link href=\"{{asset(\"css/style.css\")}}\" rel=\"stylesheet\">
    {% endblock %}
</head>

<body>
    {% block header %}
        <header>
            <div class=\"container-xxl bg-white p-0\">
                <!-- Spinner Start -->
                <div id=\"spinner\" class=\"show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center\">
                    <div class=\"spinner-grow text-primary\" style=\"width: 3rem; height: 3rem;\" role=\"status\">
                        <span class=\"sr-only\">Loading...</span>
                    </div>
                </div>
                <!-- Spinner End -->


                <!-- Navbar Start -->
                <div class=\"container-xxl position-relative p-0\">
                    <nav class=\"navbar navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0\">
                            <a href=\"\" class=\"navbar-brand p-0\">
                            {#<h1 class=\"m-0\"><i class=\"fa fa-search me-2\"></i>SEO<span class=\"fs-5\">Master</span></h1> #}
                                <img src=\"{{asset(\"img/LogoGGC.png\")}}\" alt=\"GGC logo\">
                        </a>
                        <button class=\"navbar-toggler\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#navbarCollapse\">
                            <span class=\"fa fa-bars\"></span>
                        </button>
                        <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
                            <div class=\"navbar-nav ms-auto py-0\">
                                <a href=\"#\" class=\"nav-item nav-link active\">Home</a>
                                <a href=\"{{ path('app_publication_index') }}\" class=\"nav-item nav-link\">Forum</a>
                                <a href=\"#\" class=\"nav-item nav-link\">Streamers</a>
                                <a href=\"#\" class=\"nav-item nav-link\">Evennements</a>
                                <div class=\"nav-item dropdown\">
                                    <a href=\"#\" class=\"nav-link dropdown-toggle\" data-bs-toggle=\"dropdown\">Shop</a>
                                    <div class=\"dropdown-menu m-0\">
                                            <a href=\"{{ path('app_produit_shop') }}\" class=\"dropdown-item\">Produits</a>
                                <a href=\"{{ path('app_commande_show') }}\" class=\"dropdown-item\">Commande</a>
                            </div>
                        </div>
                        <a href=\"{{ path('panier_index') }}\" class=\"nav-item nav-link\">Panier</a>
                            </div>
                            <button type=\"button\" class=\"btn text-secondary ms-3\" data-bs-toggle=\"modal\" data-bs-target=\"#searchModal\"><i class=\"fa fa-search\"></i></button>
                            <a href=\"#\" class=\"btn btn-secondary text-light rounded-pill py-2 px-4 ms-3\">Sign In</a>
                        </div>
                    </nav>
                </div>
            </div>
        </header>
        <!-- Navbar -->
    {% endblock %}

    {% block hero %}
        <div class=\"container-xxl py-5 bg-primary hero-header mb-5\">
            <div class=\"container my-5 py-5 px-lg-5\">
                <div class=\"row g-5 py-5\">
                    <div class=\"col-lg-6 text-center text-lg-start\">
                        <h1 class=\"text-white mb-4 animated zoomIn\">CHANGE THIS LATER BROGRAMMERS ! RESERVED FOR TITLE!</h1>
                        <p class=\"text-white pb-3 animated zoomIn\">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit justo amet ipsum vero ipsum clita lorem</p>
                        <a href=\"\" class=\"btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft\">Free Quote</a>
                        <a href=\"\" class=\"btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight\">Contact Us</a>
                    </div>
                    <div class=\"col-lg-6 text-center text-lg-start\">
                        <img class=\"img-fluid\" src=\"img/hero.png\" alt=\"\">
                    </div>
                </div>
            </div>
        </div>
        <!-- Spinner End -->
        {% endblock %}
        <!-- Navbar & Hero End -->
    <!-- chatbot-->
    <script>
        var botmanWidget = {
            frameEndpoint: '{{ path(\"chatframe\") }}',
            chatServer: '{{ path(\"message\") }}',
            introMessage: 'Hello, I am a Foody ,You Can Ask Me Any Thing ',
            title: 'Easy to Eat Chatbot',
            mainColor: '#456765',
            bubbleBackground: '#ff76f4',
            aboutText: ''
        };
    </script>
    <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script>
    <!-- chatbot-->



    <div class=\"container-xxl py-5 bg-white mb-5\">
    {% block body %}
        
    {% endblock %}
    </div>

    <footer>
    {% block footer %}
        <!-- Footer Start -->
        <div class=\"container-fluid bg-primary text-light footer mt-5 pt-5 wow fadeIn\" data-wow-delay=\"0.1s\">
            <div class=\"container py-5 px-lg-5\">
                <div class=\"row g-5\">
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Get In Touch</h5>
                        <p><i class=\"fa fa-map-marker-alt me-3\"></i>123 Street, El-Ghazela, Tunisia</p>
                        <p><i class=\"fa fa-phone-alt me-3\"></i>+216 52 848 054</p>
                        <p><i class=\"fa fa-envelope me-3\"></i>gamergeekscommunity@gmail.com</p>
                        <div class=\"d-flex pt-2\">
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-twitter\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-facebook-f\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-youtube\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-instagram\"></i></a>
                            <a class=\"btn btn-outline-light btn-social\" href=\"\"><i class=\"fab fa-linkedin-in\"></i></a>
                        </div>
                    </div>
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Popular Link</h5>
                        <a class=\"btn btn-link\" href=\"\">About Us</a>
                        <a class=\"btn btn-link\" href=\"\">Contact Us</a>
                    </div>
                    <div class=\"col-md-6 col-lg-3\">
                        <h5 class=\"text-white mb-4\">Newsletter</h5>
                        <p>News ? :D</p>
                        <div class=\"position-relative w-100 mt-3\">
                            <label>
                                <input class=\"form-control border-0 rounded-pill w-100 ps-4 pe-5\" type=\"text\" placeholder=\"Your Email\" style=\"height: 48px;\">
                            </label>
                            <button type=\"button\" class=\"btn shadow-none position-absolute top-0 end-0 mt-1 me-2\"><i class=\"fa fa-paper-plane text-primary fs-4\"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"container px-lg-5\">
                <div class=\"copyright\">
                    <div class=\"row\">
                        <div class=\"col-md-6 text-center text-md-start mb-3 mb-md-0\">
                            &copy; <a class=\"border-bottom\" href=\"#\">GamerGeeksCommunity</a>, All Right Reserved.
                        </div>
                        <div class=\"col-md-6 text-center text-md-end\">
                            <div class=\"footer-menu\">
                                <a href=\"\">Home</a>
                                <a href=\"\">Help</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->
    {% endblock %}
    </footer>
        
    {% block javascripts %}
        <!-- JavaScript Libraries -->
        <script src=\"https://code.jquery.com/jquery-3.4.1.min.js\"></script>
        <script src=\"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js\"></script>
        <script src=\"{{asset(\"lib/wow/wow.min.js\")}}\"></script>
        <script src=\"{{asset(\"lib/easing/easing.min.js\")}}\"></script>
        <script src=\"{{asset(\"lib/waypoints/waypoints.min.js\")}}\"></script>
        <script src=\"{{asset(\"lib/owlcarousel/owl.carousel.min.js\")}}\"></script>
        <script src=\"{{asset(\"lib/isotope/isotope.pkgd.min.js\")}}\"></script>
        <script src=\"{{asset(\"lib/lightbox/js/lightbox.min.js\")}}\"></script>

        <!-- Template Javascript -->
        <script src=\"{{asset(\"js/main.js\")}}\"></script>
    {% endblock %}
</body>
</html>
", "base.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\base.html.twig");
    }
}
