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

/* themes/wosh/templates/node/node--testimonial.html.twig */
class __TwigTemplate_26aeb15ec163f756e1f1c0115a4e90db26610d9aee90ac98d784cc12e035bdb7 extends \Twig\Template
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
        // line 8
        $context["classes"] = [0 => "node", 1 => ("node-type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 10
($context["node"] ?? null), "bundle", [], "any", false, false, true, 10), 10, $this->source))), 2 => "node-content", 3 => ((twig_get_attribute($this->env, $this->source,         // line 12
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 12)) ? ("node--promoted") : ("")), 4 => ((twig_get_attribute($this->env, $this->source,         // line 13
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 13)) ? ("node--sticky") : ("")), 5 => (( !twig_get_attribute($this->env, $this->source,         // line 14
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 14)) ? ("node--unpublished") : (""))];
        // line 17
        echo "
";
        // line 18
        if (($context["teaser"] ?? null)) {
            // line 19
            echo "<div";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "testimonial"], "method", false, false, true, 19), 19, $this->source), "html", null, true));
            echo ">
  ";
            // line 20
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 20, $this->source), "html", null, true));
            echo "
  ";
            // line 21
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 21, $this->source), "html", null, true));
            echo "
<div class=\"testimonial-content\">
<div class=\"testimonial-body\">";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
            echo "</div>
";
            // line 24
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 24))) {
                // line 25
                echo "<div class=\"testimonial-image\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 25), 25, $this->source), "html", null, true));
                echo "</div>
";
            }
            // line 27
            echo "<h5 class=\"testimonial-title\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 27, $this->source), "html", null, true));
            echo "</h5>
";
            // line 28
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_position", [], "any", false, false, true, 28))) {
                // line 29
                echo "<div class=\"testimonial-position\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_position", [], "any", false, false, true, 29), "value", [], "any", false, false, true, 29), 29, $this->source), "html", null, true));
                echo "</div>
";
            }
            // line 31
            echo "</div>
</div>

";
        } else {
            // line 35
            echo "
<div";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 36), 36, $this->source), "html", null, true));
            echo ">
  ";
            // line 37
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 37, $this->source), "html", null, true));
            echo "
  ";
            // line 38
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 38, $this->source), "html", null, true));
            echo "
<div class=\"row\">
<div class=\"col-sm-4\">
";
            // line 41
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 41), 41, $this->source), "html", null, true));
            echo "
</div>

<div class=\"col-sm-8\">
<h3 class=\"node-name-title\">";
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 45, $this->source), "html", null, true));
            echo "</h3>
";
            // line 46
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_position", [], "any", false, false, true, 46))) {
                // line 47
                echo "<div class=\"testimonial-position\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_position", [], "any", false, false, true, 47), "value", [], "any", false, false, true, 47), 47, $this->source), "html", null, true));
                echo "</div>
";
            }
            // line 49
            echo "<div class=\"testimonial-body\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 49), 49, $this->source), "html", null, true));
            echo "</div>
</div>
</div>
</div>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/node/node--testimonial.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  131 => 49,  125 => 47,  123 => 46,  119 => 45,  112 => 41,  106 => 38,  102 => 37,  98 => 36,  95 => 35,  89 => 31,  83 => 29,  81 => 28,  76 => 27,  70 => 25,  68 => 24,  64 => 23,  59 => 21,  55 => 20,  50 => 19,  48 => 18,  45 => 17,  43 => 14,  42 => 13,  41 => 12,  40 => 10,  39 => 8,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/node/node--testimonial.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/node/node--testimonial.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 8, "if" => 18);
        static $filters = array("clean_class" => 10, "escape" => 19, "render" => 24);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'render'],
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
