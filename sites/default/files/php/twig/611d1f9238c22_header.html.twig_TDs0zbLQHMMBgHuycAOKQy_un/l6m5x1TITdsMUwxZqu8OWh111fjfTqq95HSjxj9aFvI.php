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
        echo "\t
<!-- Header Start -->
<header class=\"header\">
\t<div class=\"header-content\">
\t<div class=\"navbar navbar-expand-md navbar-dark\">
\t\t<div class=\"container\">
\t\t
\t\t\t";
        // line 26
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 26)) {
            // line 27
            echo "\t\t\t<div class=\"navbar-brand header-brand\">
\t\t\t\t";
            // line 28
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "branding", [], "any", false, false, true, 28), 28, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 31
        echo "
\t\t\t";
        // line 32
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 32)) {
            // line 33
            echo "\t\t\t<div id=\"main-menu\" class=\"primary-navbar collapse navbar-collapse ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["nav_align"] ?? null), 33, $this->source), "html", null, true));
            echo "\">
\t\t\t\t";
            // line 34
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "primary_menu", [], "any", false, false, true, 34), 34, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 37
        echo "\t\t\t\t\t
\t\t\t";
        // line 38
        if (((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 38) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 38)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 38))) {
            // line 39
            echo "\t\t\t<div class=\"header-element icon-element\">
\t\t\t\t<div class=\"header-element-icon\">
\t\t\t\t";
            // line 41
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 41)) {
                // line 42
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-account\">
\t\t\t\t\t<button type=\"button\" class=\"dropdown-toggle header-icon account-icon\" data-toggle=\"dropdown\" aria-haspopup=\"true\" aria-expanded=\"false\">
\t\t\t\t\t\t<span class=\"ion-ios-gear-outline\"></span>
\t\t\t\t\t</button>
\t\t\t\t\t<div id=\"user-account-block-wrap\" class=\"dropdown-menu user-account-block-wrap\">
\t\t\t\t\t";
                // line 47
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "user_account", [], "any", false, false, true, 47), 47, $this->source), "html", null, true));
                echo "
\t\t\t\t\t</div>
\t\t\t\t\t</div>\t\t\t\t
\t\t\t\t";
            }
            // line 51
            echo "\t\t\t\t
\t\t\t\t";
            // line 52
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 52)) {
                // line 53
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-cart\">
\t\t\t\t\t\t<div class=\"header-icon text-xs-left header-cart\">";
                // line 54
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "cart", [], "any", false, false, true, 54), 54, $this->source), "html", null, true));
                echo "</div>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 57
            echo "\t\t\t\t
\t\t\t\t";
            // line 58
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "search", [], "any", false, false, true, 58)) {
                // line 59
                echo "\t\t\t\t\t<div class=\"header-element-item header-element-search\">
\t\t\t\t\t<button type=\"button\" class=\"header-icon search-icon\" data-toggle=\"modal\" data-target=\"#search-modal\"><span class=\"ion-ios-search-strong\"></span></button>
\t\t\t\t\t</div>
\t\t\t\t";
            }
            // line 63
            echo "\t\t\t\t</div>
\t\t\t</div>
\t\t\t";
        }
        // line 66
        echo "
\t\t\t";
        // line 67
        if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 67)) {
            // line 68
            echo "\t\t\t<div class=\"header-section\">
\t\t\t";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "header", [], "any", false, false, true, 69), 69, $this->source), "html", null, true));
            echo "
\t\t\t</div>
\t\t\t";
        }
        // line 72
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
        return array (  169 => 72,  163 => 69,  160 => 68,  158 => 67,  155 => 66,  150 => 63,  144 => 59,  142 => 58,  139 => 57,  133 => 54,  130 => 53,  128 => 52,  125 => 51,  118 => 47,  111 => 42,  109 => 41,  105 => 39,  103 => 38,  100 => 37,  94 => 34,  89 => 33,  87 => 32,  84 => 31,  78 => 28,  75 => 27,  73 => 26,  64 => 19,  54 => 12,  44 => 4,  42 => 3,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@wosh/layout/header.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/layout/header.html.twig");
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
