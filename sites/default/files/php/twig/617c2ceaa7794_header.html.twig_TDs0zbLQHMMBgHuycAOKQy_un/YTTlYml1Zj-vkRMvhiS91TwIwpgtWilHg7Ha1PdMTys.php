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

/* @wosh/layout/header.html.twig */
class __TwigTemplate_c7d53439a151e79863474631efc225e401e992ab9b62c232cca96bfd1506dc64 extends \Twig\Template
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
        // line 2
        echo "
";
        // line 3
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 3)) {
            // line 4
            echo "<!-- Modal Search -->
<div id=\"search-modal\" class=\"modal-wrapper modal fade\" tabindex=\"-1\" role=\"dialog\" aria-hidden=\"true\">
  <div class=\"modal-dialog modal-lg\" role=\"document\">
    <div class=\"modal-content\">
\t\t<button type=\"button\" class=\"close\" data-dismiss=\"modal\" aria-label=\"Close\">
          <span aria-hidden=\"true\">&times;</span>
        </button>
\t     <div class=\"modal-content-wrap\">
\t\t\t<div class=\"modal-content-holder\">";
            // line 12
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 12), 12, $this->source), "html", null, true));
            echo "</div>
\t\t</div>

    </div>
  </div>
</div>
";
        }
        // line 19
        echo "<!-- Promotion Banner Start -->
<div class=\"promotion_banner\">
  <div class=\"row\">

\t  ";
        // line 23
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "social_banner", [], "any", false, false, true, 23)) {
            // line 24
            echo "\t    <div class=\"col-md-3 mx-auto prom_social\">
\t\t  ";
            // line 25
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "social_banner", [], "any", false, false, true, 25), 25, $this->source), "html", null, true));
            echo "
\t\t</div>
\t  ";
        }
        // line 28
        echo "
\t  ";
        // line 29
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "shipping_banner", [], "any", false, false, true, 29)) {
            // line 30
            echo "\t    <div class=\"col-md-4 mx-auto prom_shipping\">
\t\t  ";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "shipping_banner", [], "any", false, false, true, 31), 31, $this->source), "html", null, true));
            echo "
\t\t</div>
\t  ";
        }
        // line 34
        echo "
\t  ";
        // line 35
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_banner", [], "any", false, false, true, 35)) {
            // line 36
            echo "\t    <div class=\"col-md-3 mx-auto prom_user\">
\t\t  ";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_banner", [], "any", false, false, true, 37), 37, $this->source), "html", null, true));
            echo "
\t\t</div>
\t  ";
        }
        // line 40
        echo "
  </div>
</div>
\t
<!-- Header Start -->
<header class=\"header\">
\t<div class=\"header-content\">
\t<div class=\"navbar navbar-expand-md navbar-dark\">
\t\t<div class=\"container\">
\t\t
\t\t\t";
        // line 50
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 50)) {
            // line 51
            echo "\t\t\t<div class=\"navbar-brand header-brand\">
\t\t\t\t";
            // line 52
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 52), 52, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 55
        echo "
\t\t\t";
        // line 56
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 56)) {
            // line 57
            echo "\t\t\t<div id=\"main-menu\" class=\"primary-navbar collapse navbar-collapse ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_align"] ?? null), 57, $this->source), "html", null, true));
            echo "\">
\t\t\t\t";
            // line 58
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 58), 58, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 61
        echo "\t\t\t\t\t
\t\t\t";
        // line 62
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 62) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 62)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 62))) {
            // line 63
            echo "\t\t\t<div class=\"header-element icon-element\">
\t\t\t\t<div class=\"header-element-icon\">
\t\t\t\t";
            // line 65
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 65)) {
                // line 66
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-account\">
\t\t\t\t\t<button type=\"button\" class=\"dropdown-toggle header-icon account-icon\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t<span class=\"ion-ios-gear-outline\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<div id=\"user-account-block-wrap\" class=\"dropdown-menu user-account-block-wrap\">
\t\t\t\t\t";
                // line 71
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 71), 71, $this->source), "html", null, true));
                echo "
\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t";
            }
            // line 75
            echo "\t\t\t\t
\t\t\t\t";
            // line 76
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 76)) {
                // line 77
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-cart\">
\t\t\t\t\t\t<div class=\"header-icon text-xs-left header-cart\">";
                // line 78
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 78), 78, $this->source), "html", null, true));
                echo "</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 81
            echo "\t\t\t\t
\t\t\t\t";
            // line 82
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 82)) {
                // line 83
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-search\">
\t\t\t\t\t<button type=\"button\" class=\"header-icon search-icon\" data-toggle=\"modal\" data-target=\"#search-modal\"><span class=\"ion-ios-search-strong\"></span></button>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 87
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 90
        echo "
\t\t\t";
        // line 91
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 91)) {
            // line 92
            echo "\t\t\t<div class=\"header-section\">
\t\t\t";
            // line 93
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 93), 93, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 96
        echo "\t\t\t\t
\t\t\t<button class=\"navbar-toggler nav-button\" type=\"button\" data-toggle=\"collapse\" data-target=\"#main-menu\" aria-controls=\"main-menu\" aria-expanded=\"false\" aria-label=\"Toggle navigation\">
\t\t\t\t<span class=\"navbar-toggler-icon\"></span>
\t\t\t</button>
\t\t
\t\t</div>
\t</div>
\t</div>
</header>
<!-- Header End -->
";
    }

    public function getTemplateName()
    {
        return "@wosh/layout/header.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  217 => 96,  211 => 93,  208 => 92,  206 => 91,  203 => 90,  198 => 87,  192 => 83,  190 => 82,  187 => 81,  181 => 78,  178 => 77,  176 => 76,  173 => 75,  166 => 71,  159 => 66,  157 => 65,  153 => 63,  151 => 62,  148 => 61,  142 => 58,  137 => 57,  135 => 56,  132 => 55,  126 => 52,  123 => 51,  121 => 50,  109 => 40,  103 => 37,  100 => 36,  98 => 35,  95 => 34,  89 => 31,  86 => 30,  84 => 29,  81 => 28,  75 => 25,  72 => 24,  70 => 23,  64 => 19,  54 => 12,  44 => 4,  42 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@wosh/layout/header.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/layout/header.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3);
        static $filters = array("escape" => 12);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
