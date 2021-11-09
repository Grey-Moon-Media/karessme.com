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
\t<!--- Payment Loader -->
\t<div id=\"loader\"></div>

\t";
        // line 67
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 67) &&  !($context["is_front"] ?? null))) {
            // line 68
            echo "\t<!-- Page Title -->
\t<section id=\"page-title\" class=\"page-title ";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_background"] ?? null), 69, $this->source), "html", null, true));
            echo "\">
\t\t<div class=\"container\">
\t\t\t";
            // line 71
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "page_title", [], "any", false, false, true, 71), 71, $this->source), "html", null, true));
            echo "
\t\t\t";
            // line 72
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "breadcrumb", [], "any", false, false, true, 72), 72, $this->source), "html", null, true));
            echo "
\t\t</div>
\t</section>
\t  <!-- End Page Title -->
\t";
        }
        // line 77
        echo "

\t";
        // line 79
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 79)) {
            // line 80
            echo "\t<!-- Start content top -->
\t<section id=\"content-wide-top\" class=\"content-wide\">        
\t\t";
            // line 82
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide_top", [], "any", false, false, true, 82), 82, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content top -->
\t";
        }
        // line 86
        echo "
\t";
        // line 87
        if ((( !twig_test_empty(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 87)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 87)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 87))) {
            // line 88
            echo "\t<!-- layout -->
\t<section id=\"page-wrapper\" class=\"page-wrapper\">
\t 
\t\t<div class=\"container\">
\t\t\t<div class=\"row content-layout\">
\t\t\t  ";
            // line 93
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 93))) {
                // line 94
                echo "\t\t\t  <!--- Start Left SideBar -->
\t\t\t\t<div class =\"";
                // line 95
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarfirst"] ?? null), 95, $this->source), "html", null, true));
                echo "  sidebar\">
\t\t\t\t\t";
                // line 96
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_first", [], "any", false, false, true, 96), 96, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End Right SideBar -->
\t\t\t  ";
            }
            // line 100
            echo "
\t\t\t  ";
            // line 101
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 101))) {
                // line 102
                echo "\t\t\t  <!--- Start content -->
\t\t\t\t<div class=\"";
                // line 103
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["contentlayout"] ?? null), 103, $this->source), "html", null, true));
                echo "  main-content\">
\t\t\t\t<div id=\"overlay\" style=\"display:none;\">
    \t\t\t\t
\t\t\t\t<div class=\"spinner\"></div>
    \t\t\t\t<br/>
   \t\t\t\t Loading...
\t\t\t\t</div>
\t\t\t\t";
                // line 110
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content", [], "any", false, false, true, 110), 110, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End content -->
\t\t\t  ";
            }
            // line 114
            echo "
\t\t\t  ";
            // line 115
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 115))) {
                // line 116
                echo "\t\t\t  <!--- Start Right SideBar -->
\t\t\t\t<div class=\"";
                // line 117
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["sidebarsecond"] ?? null), 117, $this->source), "html", null, true));
                echo "  sidebar\">
\t\t\t\t\t";
                // line 118
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "sidebar_second", [], "any", false, false, true, 118), 118, $this->source), "html", null, true));
                echo "
\t\t\t\t</div>
\t\t\t  <!---End Right SideBar -->
\t\t\t  ";
            }
            // line 122
            echo "\t\t\t</div>
\t\t</div>
\t</section>
\t<!-- End layout -->
\t";
        }
        // line 127
        echo "
\t";
        // line 128
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 128)) {
            // line 129
            echo "\t<!-- Start content wide -->
\t<section id=\"content-wide\" class=\"content-wide\">        
\t\t";
            // line 131
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "content_wide", [], "any", false, false, true, 131), 131, $this->source), "html", null, true));
            echo "
\t</section>
\t<!-- End content wide -->
\t";
        }
        // line 135
        echo "
\t";
        // line 136
        $this->loadTemplate("@wosh/layout/footer.html.twig", "themes/wosh/templates/layout/page.html.twig", 136)->display($context);
        // line 137
        echo "</div>
</div>
";
        // line 139
        if (($context["preloader"] ?? null)) {
            // line 140
            echo "<div class=\"preloader\">
\t<div class=\"preloader-spinner\"></div>
</div>
<!-- Spinner on Payment form submit -->
<div class=\"overlay-body\">
\t<div class=\"lds-dual-ring\"></div>  
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
        return array (  225 => 140,  223 => 139,  219 => 137,  217 => 136,  214 => 135,  207 => 131,  203 => 129,  201 => 128,  198 => 127,  191 => 122,  184 => 118,  180 => 117,  177 => 116,  175 => 115,  172 => 114,  165 => 110,  155 => 103,  152 => 102,  150 => 101,  147 => 100,  140 => 96,  136 => 95,  133 => 94,  131 => 93,  124 => 88,  122 => 87,  119 => 86,  112 => 82,  108 => 80,  106 => 79,  102 => 77,  94 => 72,  90 => 71,  85 => 69,  82 => 68,  80 => 67,  74 => 63,  64 => 56,  57 => 51,  55 => 50,  52 => 49,  50 => 48,  46 => 47,  39 => 46,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/layout/page.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/layout/page.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 48, "if" => 50);
        static $filters = array("escape" => 46, "render" => 93);
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
