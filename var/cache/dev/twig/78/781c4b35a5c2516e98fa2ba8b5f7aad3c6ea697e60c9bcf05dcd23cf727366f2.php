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

/* Login/login.html.twig */
class __TwigTemplate_5a93918a71cf7a5bf2cdbe5aedbef7479f5b617ec69bb9a239f55bf82b36acc8 extends Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/login.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "Login/login.html.twig"));

        // line 1
        echo "<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
\tbox-sizing: border-box;
\tmargin: 0;
\tpadding: 0;\t
\tfont-family: Raleway, sans-serif;
}

body {
\tbackground: linear-gradient(90deg, #C7C5F4, #776BCC);\t\t
}

.container {
\tdisplay: flex;
\talign-items: center;
\tjustify-content: center;
\tmin-height: 100vh;
}

.screen {\t\t
\tbackground: linear-gradient(90deg, #5D54A4, #7C78B8);\t\t
\tposition: relative;\t
\theight: 600px;
\twidth: 360px;\t
\tbox-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
\tz-index: 1;
\tposition: relative;\t
\theight: 100%;
}

.screen__background {\t\t
\tposition: absolute;
\ttop: 0;
\tleft: 0;
\tright: 0;
\tbottom: 0;
\tz-index: 0;
\t-webkit-clip-path: inset(0 0 0 0);
\tclip-path: inset(0 0 0 0);\t
}

.screen__background__shape {
\ttransform: rotate(45deg);
\tposition: absolute;
}

.screen__background__shape1 {
\theight: 520px;
\twidth: 520px;
\tbackground: #FFF;\t
\ttop: -50px;
\tright: 120px;\t
\tborder-radius: 0 72px 0 0;
}

.screen__background__shape2 {
\theight: 220px;
\twidth: 220px;
\tbackground: #6C63AC;\t
\ttop: -172px;
\tright: 0;\t
\tborder-radius: 32px;
}

.screen__background__shape3 {
\theight: 540px;
\twidth: 190px;
\tbackground: linear-gradient(270deg, #5D54A4, #6A679E);
\ttop: -24px;
\tright: 0;\t
\tborder-radius: 32px;
}

.screen__background__shape4 {
\theight: 400px;
\twidth: 200px;
\tbackground: #7E7BB9;\t
\ttop: 420px;
\tright: 50px;\t
\tborder-radius: 60px;
}

.login {
\twidth: 320px;
\tpadding: 30px;
\tpadding-top: 156px;
}

.login__field {
\tpadding: 20px 0px;\t
\tposition: relative;\t
}

.login__icon {
\tposition: absolute;
\ttop: 30px;
\tcolor: #7875B5;
}

.login__input {
\tborder: none;
\tborder-bottom: 2px solid #D1D1D4;
\tbackground: none;
\tpadding: 10px;
\tpadding-left: 24px;
\tfont-weight: 700;
\twidth: 75%;
\ttransition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
\toutline: none;
\tborder-bottom-color: #6A679E;
}

.login__submit {
\tbackground: #fff;
\tfont-size: 14px;
\tmargin-top: 30px;
\tpadding: 16px 20px;
\tborder-radius: 26px;
\tborder: 1px solid #D4D3E8;
\ttext-transform: uppercase;
\tfont-weight: 700;
\tdisplay: flex;
\talign-items: center;
\twidth: 100%;
\tcolor: #4C489D;
\tbox-shadow: 0px 2px 2px #5C5696;
\tcursor: pointer;
\ttransition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
\tborder-color: #6A679E;
\toutline: none;
}

.button__icon {
\tfont-size: 24px;
\tmargin-left: auto;
\tcolor: #7875B5;
}

.social-login {\t
\tposition: absolute;
\theight: 140px;
\twidth: 160px;
\ttext-align: center;
\tbottom: 0px;
\tright: 0px;
\tcolor: #fff;
}

.social-icons {
\tdisplay: flex;
\talign-items: center;
\tjustify-content: center;
}

.social-login__icon {
\tpadding: 20px 10px;
\tcolor: #fff;
\ttext-decoration: none;\t
\ttext-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
\ttransform: scale(1.5);\t
}
</style>

<div class=\"container\">
\t<div class=\"screen\">
\t\t<div class=\"screen__content\">
\t\t\t<form class=\"login\" action=\"";
        // line 185
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("app_loginm");
        echo "\" method=\"POST\">
\t\t\t\t<div class=\"login__field\">
\t\t\t\t\t<i class=\"login__icon fas fa-user\"></i>
\t\t\t\t\t<input id=\"email\" name=\"email\" type=\"text\" class=\"login__input\" placeholder=\"User name / Email\">
\t\t\t\t</div>
\t\t\t\t<div class=\"login__field\">
\t\t\t\t\t<i class=\"login__icon fas fa-lock\"></i>
\t\t\t\t\t<input id=\"password\" name=\"password\" type=\"password\" class=\"login__input\" placeholder=\"Password\">
\t\t\t\t</div>
\t\t\t\t<button type=\"submit\" class=\"button login__submit\">
\t\t\t\t\t<span class=\"button__text\">Log In Now</span>
\t\t\t\t\t<i class=\"button__icon fas fa-chevron-right\"></i>
\t\t\t\t</button>\t\t\t\t
\t\t\t</form>
\t\t\t<div class=\"social-login\">
\t\t\t\t<h3>log in via</h3>
\t\t\t\t<div class=\"social-icons\">
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-instagram\"></a>
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-facebook\"></a>
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-twitter\"></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"screen__background\">
\t\t\t<span class=\"screen__background__shape screen__background__shape4\"></span>
\t\t\t<span class=\"screen__background__shape screen__background__shape3\"></span>\t\t
\t\t\t<span class=\"screen__background__shape screen__background__shape2\"></span>
\t\t\t<span class=\"screen__background__shape screen__background__shape1\"></span>
\t\t</div>\t\t
\t</div>
</div>

<!-- chatbot-->
    <script>
        var botmanWidget = {
            frameEndpoint: '";
        // line 220
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("chatframe");
        echo "',
            chatServer: '";
        // line 221
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
    <!-- chatbot-->";
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    public function getTemplateName()
    {
        return "Login/login.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  271 => 221,  267 => 220,  229 => 185,  43 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("<style>
@import url('https://fonts.googleapis.com/css?family=Raleway:400,700');

* {
\tbox-sizing: border-box;
\tmargin: 0;
\tpadding: 0;\t
\tfont-family: Raleway, sans-serif;
}

body {
\tbackground: linear-gradient(90deg, #C7C5F4, #776BCC);\t\t
}

.container {
\tdisplay: flex;
\talign-items: center;
\tjustify-content: center;
\tmin-height: 100vh;
}

.screen {\t\t
\tbackground: linear-gradient(90deg, #5D54A4, #7C78B8);\t\t
\tposition: relative;\t
\theight: 600px;
\twidth: 360px;\t
\tbox-shadow: 0px 0px 24px #5C5696;
}

.screen__content {
\tz-index: 1;
\tposition: relative;\t
\theight: 100%;
}

.screen__background {\t\t
\tposition: absolute;
\ttop: 0;
\tleft: 0;
\tright: 0;
\tbottom: 0;
\tz-index: 0;
\t-webkit-clip-path: inset(0 0 0 0);
\tclip-path: inset(0 0 0 0);\t
}

.screen__background__shape {
\ttransform: rotate(45deg);
\tposition: absolute;
}

.screen__background__shape1 {
\theight: 520px;
\twidth: 520px;
\tbackground: #FFF;\t
\ttop: -50px;
\tright: 120px;\t
\tborder-radius: 0 72px 0 0;
}

.screen__background__shape2 {
\theight: 220px;
\twidth: 220px;
\tbackground: #6C63AC;\t
\ttop: -172px;
\tright: 0;\t
\tborder-radius: 32px;
}

.screen__background__shape3 {
\theight: 540px;
\twidth: 190px;
\tbackground: linear-gradient(270deg, #5D54A4, #6A679E);
\ttop: -24px;
\tright: 0;\t
\tborder-radius: 32px;
}

.screen__background__shape4 {
\theight: 400px;
\twidth: 200px;
\tbackground: #7E7BB9;\t
\ttop: 420px;
\tright: 50px;\t
\tborder-radius: 60px;
}

.login {
\twidth: 320px;
\tpadding: 30px;
\tpadding-top: 156px;
}

.login__field {
\tpadding: 20px 0px;\t
\tposition: relative;\t
}

.login__icon {
\tposition: absolute;
\ttop: 30px;
\tcolor: #7875B5;
}

.login__input {
\tborder: none;
\tborder-bottom: 2px solid #D1D1D4;
\tbackground: none;
\tpadding: 10px;
\tpadding-left: 24px;
\tfont-weight: 700;
\twidth: 75%;
\ttransition: .2s;
}

.login__input:active,
.login__input:focus,
.login__input:hover {
\toutline: none;
\tborder-bottom-color: #6A679E;
}

.login__submit {
\tbackground: #fff;
\tfont-size: 14px;
\tmargin-top: 30px;
\tpadding: 16px 20px;
\tborder-radius: 26px;
\tborder: 1px solid #D4D3E8;
\ttext-transform: uppercase;
\tfont-weight: 700;
\tdisplay: flex;
\talign-items: center;
\twidth: 100%;
\tcolor: #4C489D;
\tbox-shadow: 0px 2px 2px #5C5696;
\tcursor: pointer;
\ttransition: .2s;
}

.login__submit:active,
.login__submit:focus,
.login__submit:hover {
\tborder-color: #6A679E;
\toutline: none;
}

.button__icon {
\tfont-size: 24px;
\tmargin-left: auto;
\tcolor: #7875B5;
}

.social-login {\t
\tposition: absolute;
\theight: 140px;
\twidth: 160px;
\ttext-align: center;
\tbottom: 0px;
\tright: 0px;
\tcolor: #fff;
}

.social-icons {
\tdisplay: flex;
\talign-items: center;
\tjustify-content: center;
}

.social-login__icon {
\tpadding: 20px 10px;
\tcolor: #fff;
\ttext-decoration: none;\t
\ttext-shadow: 0px 0px 8px #7875B5;
}

.social-login__icon:hover {
\ttransform: scale(1.5);\t
}
</style>

<div class=\"container\">
\t<div class=\"screen\">
\t\t<div class=\"screen__content\">
\t\t\t<form class=\"login\" action=\"{{path('app_loginm')}}\" method=\"POST\">
\t\t\t\t<div class=\"login__field\">
\t\t\t\t\t<i class=\"login__icon fas fa-user\"></i>
\t\t\t\t\t<input id=\"email\" name=\"email\" type=\"text\" class=\"login__input\" placeholder=\"User name / Email\">
\t\t\t\t</div>
\t\t\t\t<div class=\"login__field\">
\t\t\t\t\t<i class=\"login__icon fas fa-lock\"></i>
\t\t\t\t\t<input id=\"password\" name=\"password\" type=\"password\" class=\"login__input\" placeholder=\"Password\">
\t\t\t\t</div>
\t\t\t\t<button type=\"submit\" class=\"button login__submit\">
\t\t\t\t\t<span class=\"button__text\">Log In Now</span>
\t\t\t\t\t<i class=\"button__icon fas fa-chevron-right\"></i>
\t\t\t\t</button>\t\t\t\t
\t\t\t</form>
\t\t\t<div class=\"social-login\">
\t\t\t\t<h3>log in via</h3>
\t\t\t\t<div class=\"social-icons\">
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-instagram\"></a>
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-facebook\"></a>
\t\t\t\t\t<a href=\"#\" class=\"social-login__icon fab fa-twitter\"></a>
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t\t<div class=\"screen__background\">
\t\t\t<span class=\"screen__background__shape screen__background__shape4\"></span>
\t\t\t<span class=\"screen__background__shape screen__background__shape3\"></span>\t\t
\t\t\t<span class=\"screen__background__shape screen__background__shape2\"></span>
\t\t\t<span class=\"screen__background__shape screen__background__shape1\"></span>
\t\t</div>\t\t
\t</div>
</div>

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
    <!-- chatbot-->", "Login/login.html.twig", "C:\\Users\\Mr\\Desktop\\3ème année\\2 sem\\pidev\\GGC--PIDEV-WEB\\templates\\Login\\login.html.twig");
    }
}
