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

/* themes/wosh/templates/node/node--slide.html.twig */
class __TwigTemplate_d20fbaa5286b91094d275d9d3f59e467b29ac0ed52987436df218de60a57fed7 extends \Twig\Template
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
        // line 7
        echo "<div ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 7, $this->source), "html", null, true));
        echo " >
  ";
        // line 8
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_prefix"] ?? null), 8, $this->source), "html", null, true));
        echo "
  ";
        // line 9
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title_suffix"] ?? null), 9, $this->source), "html", null, true));
        echo "
\t<div class=\"slide-image\"><img src=\"";
        // line 10
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, call_user_func_array($this->env->getFunction('file_url')->getCallable(), [$this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 10), 0, [], "any", false, false, true, 10)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#item"] ?? null) : null), "entity", [], "any", false, false, true, 10), "uri", [], "any", false, false, true, 10), "value", [], "any", false, false, true, 10), 10, $this->source)]), "html", null, true));
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, (($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_image", [], "any", false, false, true, 10), 0, [], "any", false, false, true, 10)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["#item"] ?? null) : null), "alt", [], "any", false, false, true, 10), 10, $this->source), "html", null, true));
        echo "\"/></div>
\t";
        // line 11
        if (((twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_heading_text", [], "any", false, false, true, 11) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 11)) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 11))) {
            // line 12
            echo "\t<div class=\"slide-content-wrap\">
\t\t<div class=\"container slide-wrap\">
\t\t<div class=\"slide-content ";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_text_color", [], "any", false, false, true, 14), "value", [], "any", false, false, true, 14), 14, $this->source), "html", null, true));
            echo "\">
\t\t<div class=\"slide-content-main ";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_content_placement", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15), 15, $this->source), "html", null, true));
            echo " ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "field_text_align", [], "any", false, false, true, 15), "value", [], "any", false, false, true, 15), 15, $this->source), "html", null, true));
            echo "\">
\t\t";
            // line 16
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_pre_heading_text", [], "any", false, false, true, 16))) {
                // line 17
                echo "\t\t<div class=\"pre-heading-text\" data-animation-in=\"bounceInDown\" data-animation-out=\"animate-out slideOutUp\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_pre_heading_text", [], "any", false, false, true, 17), 17, $this->source), "html", null, true));
                echo "</div>
\t\t";
            }
            // line 19
            echo "\t\t";
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_heading_text", [], "any", false, false, true, 19))) {
                // line 20
                echo "\t\t<div class=\"heading-text\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_heading_text", [], "any", false, false, true, 20), 20, $this->source), "html", null, true));
                echo "</div>
\t\t";
            }
            // line 22
            echo "\t\t";
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 22))) {
                // line 23
                echo "\t\t<div class=\"slide-content-body\" data-animation-in=\"slideInRight\" data-animation-out=\"animate-out fadeOut\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "body", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
                echo "</div>
\t\t";
            }
            // line 25
            echo "\t\t";
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 25))) {
                // line 26
                echo "\t\t<div class=\"nav menu alt-button mt-4 slide-button\" data-animation-in=\"bounceInUp\" data-animation-out=\"animate-out slideOutDown\">
\t\t<a class=\"slide-button-link\" href=\"";
                // line 27
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 27), 0, [], "any", false, false, true, 27)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["#url"] ?? null) : null), 27, $this->source), "html", null, true));
                echo "\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_link", [], "any", false, false, true, 27), 0, [], "any", false, false, true, 27)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["#title"] ?? null) : null), 27, $this->source), "html", null, true));
                echo " <i class=\"fa fa-angle-double-right\"></i></a>
\t\t</div>
\t\t";
            }
            // line 30
            echo "\t\t</div>
\t\t</div>
\t\t</div>
\t</div>
\t";
        }
        // line 35
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/node/node--slide.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  121 => 35,  114 => 30,  106 => 27,  103 => 26,  100 => 25,  94 => 23,  91 => 22,  85 => 20,  82 => 19,  76 => 17,  74 => 16,  68 => 15,  64 => 14,  60 => 12,  58 => 11,  52 => 10,  48 => 9,  44 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/node/node--slide.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/node/node--slide.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 11);
        static $filters = array("escape" => 7, "render" => 16);
        static $functions = array("file_url" => 10);

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'render'],
                ['file_url']
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
