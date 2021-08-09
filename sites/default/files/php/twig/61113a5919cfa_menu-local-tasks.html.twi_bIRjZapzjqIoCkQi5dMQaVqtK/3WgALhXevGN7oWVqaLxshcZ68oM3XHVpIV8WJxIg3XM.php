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

/* themes/wosh/templates/navigation/menu-local-tasks.html.twig */
class __TwigTemplate_2c54fdac28359c6fae99717652880e36363a7ee1be63a3c717624b6a546c92a3 extends \Twig\Template
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
        echo "
<div class=\"task-bar alert alert-dismissable clearfix\">
\t<div class=\"clearfix\">
        <div class=\"col-md-12\">
\t\t<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
\t\t";
        // line 12
        if (($context["primary"] ?? null)) {
            // line 13
            echo "\t\t  <h2 class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Primary tabs")));
            echo "</h2>
\t\t  <ul class=\"tabs primary\">";
            // line 14
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["primary"] ?? null), 14, $this->source), "html", null, true));
            echo "</ul>
\t\t";
        }
        // line 16
        echo "\t\t";
        if (($context["secondary"] ?? null)) {
            // line 17
            echo "\t\t  <h2 class=\"visually-hidden\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Secondary tabs")));
            echo "</h2>
\t\t  <ul class=\"tabs secondary\">";
            // line 18
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["secondary"] ?? null), 18, $this->source), "html", null, true));
            echo "</ul>
\t\t";
        }
        // line 20
        echo "        </div>
    </div>
</div>";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/navigation/menu-local-tasks.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  71 => 20,  66 => 18,  61 => 17,  58 => 16,  53 => 14,  48 => 13,  46 => 12,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/navigation/menu-local-tasks.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/navigation/menu-local-tasks.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 12);
        static $filters = array("t" => 13, "escape" => 14);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['t', 'escape'],
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
