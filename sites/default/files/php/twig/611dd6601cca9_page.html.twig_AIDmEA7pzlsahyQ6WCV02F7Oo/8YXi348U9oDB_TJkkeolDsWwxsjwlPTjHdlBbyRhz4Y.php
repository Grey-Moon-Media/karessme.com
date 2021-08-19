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

/* themes/wosh/templates/layout/page.html.twig */
class __TwigTemplate_256945b4dc20537e25c53cf2bcc0ffe37a7389f4d3ab2c87a8fc73d0b5e752be extends \Twig\Template
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
        echo " ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header_style"] ?? null), 46, $this->source), "html", null, true));
        echo "\">
<div class=\"layout-wrap ";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sticky_header"] ?? null), 47, $this->source), "html", null, true));
        echo "\">
\t";
        // line 48
        $this->loadTemplate("@wosh/layout/header.html.twig", "themes/wosh/templates/layout/page.html.twig", 48)->display($context);
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
        // line 64
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 64) &&  !($context["is_front"] ?? null))) {
            // line 65
            echo "\t<!-- Page Title -->
\t<section id=\"page-title\" class=\"page-title ";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_background"] ?? null), 66, $this->source), "html", null, true));
            echo "\">
\t\t<div class=\"container\">
\t\t\t";
            // line 68
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 68), 68, $this->source), "html", null, true));
            echo "
\t\t\t";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 69), 69, $this->source), "html", null, true));
            echo "
\t\t</div>
\t</section>
\t  <!-- End Page Title -->
\t";
        }
        // line 74
        echo "

\t";
        // line 76
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 76)) {
            // line 77
            echo "\t<!-- Start content top -->
\t<section id=\"content-wide-top\" class=\"content-wide\">        
\t\t";
            // line 79
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 79), 79, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content top -->
\t";
        }
        // line 83
        echo "
\t";
        // line 84
        if ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 84)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 84)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 84))) {
            // line 85
            echo "\t<!-- layout -->
\t<section id=\"page-wrapper\" class=\"page-wrapper\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row content-layout\">
\t\t\t  ";
            // line 89
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 89))) {
                // line 90
                echo "\t\t\t  <!--- Start Left SideBar -->
\t\t\t\t<div class =\"";
                // line 91
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarfirst"] ?? null), 91, $this->source), "html", null, true));
                echo "  sidebar\">
\t\t\t\t\t";
                // line 92
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 92), 92, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End Right SideBar -->
\t\t\t  ";
            }
            // line 96
            echo "
\t\t\t  ";
            // line 97
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 97))) {
                // line 98
                echo "\t\t\t  <!--- Start content -->
\t\t\t\t<div class=\"";
                // line 99
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["contentlayout"] ?? null), 99, $this->source), "html", null, true));
                echo "  main-content\">
\t\t\t\t\t";
                // line 100
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 100), 100, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End content -->
\t\t\t  ";
            }
            // line 104
            echo "
\t\t\t  ";
            // line 105
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 105))) {
                // line 106
                echo "\t\t\t  <!--- Start Right SideBar -->
\t\t\t\t<div class=\"";
                // line 107
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarsecond"] ?? null), 107, $this->source), "html", null, true));
                echo "  sidebar\">
\t\t\t\t\t";
                // line 108
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 108), 108, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End Right SideBar -->
\t\t\t  ";
            }
            // line 112
            echo "\t\t\t</div>
\t\t</div>
\t</section>
\t<!-- End layout -->
\t";
        }
        // line 117
        echo "
\t";
        // line 118
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 118)) {
            // line 119
            echo "\t<!-- Start content wide -->
\t<section id=\"content-wide\" class=\"content-wide\">        
\t\t";
            // line 121
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 121), 121, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content wide -->
\t";
        }
        // line 125
        echo "
\t";
        // line 126
        $this->loadTemplate("@wosh/layout/footer.html.twig", "themes/wosh/templates/layout/page.html.twig", 126)->display($context);
        // line 127
        echo "</div>
</div>
";
        // line 129
        if (($context["preloader"] ?? null)) {
            // line 130
            echo "<div class=\"preloader\">
\t<div class=\"preloader-spinner\"></div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/layout/page.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  215 => 130,  213 => 129,  209 => 127,  207 => 126,  204 => 125,  197 => 121,  193 => 119,  191 => 118,  188 => 117,  181 => 112,  174 => 108,  170 => 107,  167 => 106,  165 => 105,  162 => 104,  155 => 100,  151 => 99,  148 => 98,  146 => 97,  143 => 96,  136 => 92,  132 => 91,  129 => 90,  127 => 89,  121 => 85,  119 => 84,  116 => 83,  109 => 79,  105 => 77,  103 => 76,  99 => 74,  91 => 69,  87 => 68,  82 => 66,  79 => 65,  77 => 64,  74 => 63,  64 => 56,  57 => 51,  55 => 50,  52 => 49,  50 => 48,  46 => 47,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/layout/page.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 50);
        static $filters = array("escape" => 46, "render" => 89);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape', 'render'],
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
