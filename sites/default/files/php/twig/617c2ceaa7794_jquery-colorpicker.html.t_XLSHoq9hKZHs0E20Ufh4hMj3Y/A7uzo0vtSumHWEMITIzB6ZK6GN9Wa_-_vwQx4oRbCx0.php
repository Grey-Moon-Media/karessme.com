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

/* modules/contrib/jquery_colorpicker/templates/jquery-colorpicker.html.twig */
class __TwigTemplate_19244e5ef383f67a33a3512bb36dd17102dc703bf912f87a7b9ce79a7ac125e5 extends \Twig\Template
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
        // line 1
        echo "<div class=\"jquery_colorpicker\">
\t<div id=\"";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["id"] ?? null), 2, $this->source), "html", null, true));
        echo "-inner_wrapper\" class=\"inner_wrapper\">
\t\t<div class=\"color_picker\" style=\"background-color:";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["default_color"] ?? null), 3, $this->source), "html", null, true));
        echo ";\">
\t\t\t<input";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 4, $this->source), "html", null, true));
        echo " />";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["children"] ?? null), 4, $this->source), "html", null, true));
        echo "
\t\t\t<div class=\"description\">";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Enter a hexidecimal color value in the format #XXXXXX. Enabling javascript will replace this input with a graphical color selector")));
        echo "</div>
\t\t</div>
\t</div>
\t";
        // line 8
        if (($context["show_remove"] ?? null)) {
            // line 9
            echo "\t\t<div>
\t\t\t<a href=\"#\" class=\"jquery_field_remove_link\">";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Remove")));
            echo "</a>
\t\t</div>
\t";
        }
        // line 13
        echo "\t";
        if (($context["show_clear"] ?? null)) {
            // line 14
            echo "\t\t<div>
\t\t\t<a href=\"#\" class=\"jquery_field_clear_link\">";
            // line 15
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Clear")));
            echo "</a>
\t\t</div>
\t";
        }
        // line 18
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/jquery_colorpicker/templates/jquery-colorpicker.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  85 => 18,  79 => 15,  76 => 14,  73 => 13,  67 => 10,  64 => 9,  62 => 8,  56 => 5,  50 => 4,  46 => 3,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/jquery_colorpicker/templates/jquery-colorpicker.html.twig", "/var/www/html/test.karessme.com/modules/contrib/jquery_colorpicker/templates/jquery-colorpicker.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 8);
        static $filters = array("escape" => 2, "t" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 't'],
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
