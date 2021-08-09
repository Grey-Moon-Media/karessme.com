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

/* themes/wosh/templates/block/block--promotion-block.html.twig */
class __TwigTemplate_5b7871fd5d4921e88d1168a677c0a235b604d5c252504883c2ae4f4395959bc4 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 7
        echo "
";
        // line 9
        $context["classes"] = [0 => "block", 1 => "promotion-block", 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 12
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 12), 12, $this->source))), 3 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(        // line 13
($context["plugin_id"] ?? null), 13, $this->source)))];
        // line 16
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 16), 16, $this->source), "html", null, true));
        echo " ";
        if (($context["block_style"] ?? null)) {
            echo "style=\"";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["block_style"] ?? null), 16, $this->source), "html", null, true));
            echo "\"";
        }
        echo ">
<div class=\"container-wrap clearfix\">
  ";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 18, $this->source), "html", null, true));
        echo "
  ";
        // line 19
        if (($context["label"] ?? null)) {
            // line 20
            echo "\t<div class=\"block-title-wrap clearfix\">
\t<div class=\"block-title-content\">
\t";
            // line 22
            if ((($context["block_title_style"] ?? null) == "block-title-2")) {
                // line 23
                echo "\t";
                if (($context["block_subtitle"] ?? null)) {
                    echo "<h5 class=\"block-subtitle\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["block_subtitle"] ?? null), 23, $this->source), "html", null, true));
                    echo "</h5>";
                }
                // line 24
                echo "\t<h2";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => "block-title"], "method", false, false, true, 24), 24, $this->source), "html", null, true));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 24, $this->source), "html", null, true));
                echo "</h2>
\t";
            } else {
                // line 26
                echo "\t<h2";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["title_attributes"] ?? null), "addClass", [0 => "block-title"], "method", false, false, true, 26), 26, $this->source), "html", null, true));
                echo ">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 26, $this->source), "html", null, true));
                echo "</h2>
\t";
                // line 27
                if (($context["block_subtitle"] ?? null)) {
                    echo "<h5 class=\"block-subtitle\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["block_subtitle"] ?? null), 27, $this->source), "html", null, true));
                    echo "</h5>";
                }
                // line 28
                echo "\t";
            }
            // line 29
            echo "\t</div>
\t</div>
  ";
        }
        // line 32
        echo "  ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 32, $this->source), "html", null, true));
        echo "
  ";
        // line 33
        $this->displayBlock('content', $context, $blocks);
        // line 38
        echo "</div>
</div>";
    }

    // line 33
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 34
        echo "\t<div class=\"block-content promotion-layout promotion-";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_promotion_layout", [], "any", false, false, true, 34)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#items"] ?? null) : null), "value", [], "any", false, false, true, 34), 34, $this->source), "html", null, true));
        echo "\">
\t   ";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_block", [], "any", false, false, true, 35), 35, $this->source), "html", null, true));
        echo "
    </div>
  ";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/block/block--promotion-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  128 => 35,  123 => 34,  119 => 33,  114 => 38,  112 => 33,  107 => 32,  102 => 29,  99 => 28,  93 => 27,  86 => 26,  78 => 24,  71 => 23,  69 => 22,  65 => 20,  63 => 19,  59 => 18,  47 => 16,  45 => 13,  44 => 12,  43 => 9,  40 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/block/block--promotion-block.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/block/block--promotion-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 9, "if" => 16, "block" => 33);
        static $filters = array("clean_class" => 12, "escape" => 16);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape'],
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
