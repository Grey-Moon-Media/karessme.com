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

/* themes/wosh/templates/layout/page--404.html.twig */
class __TwigTemplate_8e29859e9a141389cfc32d2428b9d6b481e84ffa4f22dd1ae883fb05833f6aec extends \Twig\Template
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
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 46
        echo "<div id=\"wrapper\" class=\"wrapper ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_layout"] ?? null), 46, $this->source), "html", null, true));
        echo "\">
<div class=\"layout-wrap ";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sticky_header"] ?? null), 47, $this->source), "html", null, true));
        echo "\">
\t";
        // line 48
        $this->loadTemplate("@wosh/layout/header.html.twig", "themes/wosh/templates/layout/page--404.html.twig", 48)->display($context);
        // line 49
        echo "
\t";
        // line 50
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 50)) {
            // line 51
            echo "\t<!-- Slider -->
\t<section id=\"slider\" class=\"clearfix\">        
\t\t<div id=\"slider-wrap\">
\t\t\t<div class=\"container-fluid\">
\t\t\t\t<div class=\"row\">
\t\t\t\t";
            // line 56
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "slider", [], "any", false, false, true, 56), 56, $this->source), "html", null, true));
            echo "
\t\t\t\t</div>
\t\t\t</div>
\t\t</div>
\t</section>
\t<!-- End Slider -->
\t";
        }
        // line 63
        echo "

\t";
        // line 65
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 65)) {
            // line 66
            echo "\t<!-- Start content top -->
\t<section id=\"content-wide-top\" class=\"content-wide\">        
\t\t";
            // line 68
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 68), 68, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content top -->
\t";
        }
        // line 72
        echo "
\t<!-- layout -->
\t<section id=\"page-wrapper\" class=\"page-wrapper\">

\t  <div class=\"container\">\t
\t\t<div class=\"row layout\">
\t\t  <!--- Start content -->
\t\t\t<div class=\"content-layout\">
\t\t\t  <div class=\"col-12\">
\t\t\t\t<div class=\"error-404 text-middle text-center\">
\t\t\t\t\t<div class=\"row\">
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<div class=\"error-404-number\">404</div>
\t\t\t\t\t</div>
\t\t\t\t\t<div class=\"col-12\">
\t\t\t\t\t<div class=\"text-center\">
\t\t\t\t\t<h2 class=\"text-medium\">Sorry, This Page Could Not Be Found!</h2>
\t\t\t\t\t<p>The page you are looking for might have been removed, had its name changed, or is temporarily unavailable.</p>
\t\t\t\t\t<a class=\"button\" href=\"";
        // line 90
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["front_page"] ?? null), 90, $this->source), "html", null, true));
        echo "\">Go Back to Homepage</a>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t\t</div>
\t\t\t\t</div>
\t\t\t  </div>
\t\t\t</div>
\t\t  <!---End content -->
\t\t</div>
\t  </div>

\t</section>
\t<!-- End layout -->

\t";
        // line 104
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 104)) {
            // line 105
            echo "\t<!-- Start content wide -->
\t<section id=\"content-wide\" class=\"content-wide\">        
\t\t";
            // line 107
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 107), 107, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content wide -->
\t";
        }
        // line 111
        echo "
";
        // line 112
        $this->loadTemplate("@wosh/layout/footer.html.twig", "themes/wosh/templates/layout/page--404.html.twig", 112)->display($context);
        // line 113
        echo "
</div>
</div>
";
        // line 116
        if (($context["preloader"] ?? null)) {
            // line 117
            echo "<div class=\"preloader\">
\t<div class=\"preloader-spinner\"></div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/layout/page--404.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  151 => 117,  149 => 116,  144 => 113,  142 => 112,  139 => 111,  132 => 107,  128 => 105,  126 => 104,  109 => 90,  89 => 72,  82 => 68,  78 => 66,  76 => 65,  72 => 63,  62 => 56,  55 => 51,  53 => 50,  50 => 49,  48 => 48,  44 => 47,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/layout/page--404.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/layout/page--404.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 50);
        static $filters = array("escape" => 46);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
