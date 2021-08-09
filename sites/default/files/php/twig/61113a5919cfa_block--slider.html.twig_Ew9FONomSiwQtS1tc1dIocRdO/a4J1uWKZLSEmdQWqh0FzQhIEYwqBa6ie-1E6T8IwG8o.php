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

/* themes/wosh/templates/block/block--slider.html.twig */
class __TwigTemplate_9c40a896cdf3e85a655e9245e664d027367e9929dfdfde5edac2cc269c0f174d extends \Twig\Template
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
        $context["classes"] = [0 => "block", 1 => "slide-block", 2 => ("block-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 12
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
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 19, $this->source), "html", null, true));
        echo "
";
        // line 20
        $this->displayBlock('content', $context, $blocks);
        // line 31
        echo "</div>
</div>";
    }

    // line 20
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 21
        echo " ";
        if ((twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slide_type", [], "any", false, false, true, 21)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#items"] ?? null) : null), "getValue", [], "method", false, false, true, 21)), "value", [], "any", false, false, true, 21) == "slide")) {
            echo " 
\t<div class=\"hero slide-carousel owl-carousel\" data-nav=\"true\" data-items=\"1\" data-dots=\"false\" data-autoplay=\"true\" data-autoplayspeed=\"1500\" data-autoplaytimeout=\"8000\" data-loop=\"true\">
\t\t";
            // line 23
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slider_block", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
            echo "
\t</div>
 ";
        } elseif ((twig_get_attribute($this->env, $this->source, twig_first($this->env, twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source,         // line 25
($context["content"] ?? null), "field_slide_type", [], "any", false, false, true, 25)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["#items"] ?? null) : null), "getValue", [], "method", false, false, true, 25)), "value", [], "any", false, false, true, 25) == "image")) {
            echo " 
\t<div class=\"slider-image\">
\t\t";
            // line 27
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_slider_block", [], "any", false, false, true, 27), 0, [], "any", false, false, true, 27), 27, $this->source), "html", null, true));
            echo "
\t</div>
 ";
        }
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/block/block--slider.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  94 => 27,  89 => 25,  84 => 23,  78 => 21,  74 => 20,  69 => 31,  67 => 20,  63 => 19,  59 => 18,  47 => 16,  45 => 13,  44 => 12,  43 => 9,  40 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/block/block--slider.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/block/block--slider.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 9, "if" => 16, "block" => 20);
        static $filters = array("clean_class" => 12, "escape" => 16, "first" => 21);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['clean_class', 'escape', 'first'],
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
