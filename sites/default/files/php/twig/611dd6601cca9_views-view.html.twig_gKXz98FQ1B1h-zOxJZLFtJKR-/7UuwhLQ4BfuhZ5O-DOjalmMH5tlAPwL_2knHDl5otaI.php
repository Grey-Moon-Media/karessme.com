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

/* themes/wosh/templates/views/views-view.html.twig */
class __TwigTemplate_ab28b7a3942c60a761ea657fa89fd046d1c7795eceba3bb1795a59f333883458 extends \Twig\Template
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
        // line 36
        $context["classes"] = [0 => ((        // line 37
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . $this->sandbox->ensureToStringAllowed(($context["dom_id"] ?? null), 37, $this->source))) : (""))];
        // line 40
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 40), 40, $this->source), "html", null, true));
        echo ">
  ";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 41, $this->source), "html", null, true));
        echo "
  ";
        // line 42
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 42, $this->source), "html", null, true));
        echo "
  ";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 43, $this->source), "html", null, true));
        echo "

  ";
        // line 45
        if (($context["header"] ?? null)) {
            // line 46
            echo "    <div class=\"view-header\">
      ";
            // line 47
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["header"] ?? null), 47, $this->source), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 50
        echo "
  ";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["exposed"] ?? null), 51, $this->source), "html", null, true));
        echo "
  ";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_before"] ?? null), 52, $this->source), "html", null, true));
        echo "

  ";
        // line 54
        if (($context["rows"] ?? null)) {
            // line 55
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["rows"] ?? null), 55, $this->source), "html", null, true));
            echo "
  ";
        } elseif (        // line 56
($context["empty"] ?? null)) {
            // line 57
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["empty"] ?? null), 57, $this->source), "html", null, true));
            echo "
  ";
        }
        // line 59
        echo "  
  ";
        // line 60
        if (($context["pager"] ?? null)) {
            // line 61
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["pager"] ?? null), 61, $this->source), "html", null, true));
            echo "
  ";
        }
        // line 63
        echo "  ";
        if (($context["attachment_after"] ?? null)) {
            // line 64
            echo "    <div class=\"attachment attachment-after\">
      ";
            // line 65
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attachment_after"] ?? null), 65, $this->source), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 68
        echo "  ";
        if (($context["more"] ?? null)) {
            // line 69
            echo "    ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["more"] ?? null), 69, $this->source), "html", null, true));
            echo "
  ";
        }
        // line 71
        echo "
  ";
        // line 72
        if (($context["footer"] ?? null)) {
            // line 73
            echo "    <div class=\"view-footer\">
      ";
            // line 74
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer"] ?? null), 74, $this->source), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 77
        echo "
  ";
        // line 78
        if (($context["feed_icons"] ?? null)) {
            // line 79
            echo "    <div class=\"feed-icons\">
      ";
            // line 80
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["feed_icons"] ?? null), 80, $this->source), "html", null, true));
            echo "
    </div>
  ";
        }
        // line 83
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/views/views-view.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  156 => 83,  150 => 80,  147 => 79,  145 => 78,  142 => 77,  136 => 74,  133 => 73,  131 => 72,  128 => 71,  122 => 69,  119 => 68,  113 => 65,  110 => 64,  107 => 63,  101 => 61,  99 => 60,  96 => 59,  91 => 57,  89 => 56,  85 => 55,  83 => 54,  78 => 52,  74 => 51,  71 => 50,  65 => 47,  62 => 46,  60 => 45,  55 => 43,  51 => 42,  47 => 41,  42 => 40,  40 => 37,  39 => 36,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/views/views-view.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/views/views-view.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 36, "if" => 45);
        static $filters = array("escape" => 40);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
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
