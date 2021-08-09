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

/* __string_template__0e62a4cd93d6e93306f5b8ca64399801376f55c2a2c614ae1e605fddacc0f993 */
class __TwigTemplate_335fa853357736ad6125a00cc62a0ce49c67b27528b74a86fab76ffa729e3ba8 extends \Twig\Template
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
        echo "<div class=\"product-category\">
<div class=\"product-category-image\"><a href=\"";
        // line 2
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_product_category"] ?? null), 2, $this->source), "html", null, true));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image"] ?? null), 2, $this->source), "html", null, true));
        echo " </a></div>
<div class=\"product-category-name-wrap\">
<a  class=\"product-category-url\" href=\"";
        // line 4
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_product_category"] ?? null), 4, $this->source), "html", null, true));
        echo "\">
<span class=\"product-category-name\">";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 5, $this->source), "html", null, true));
        echo "<span class=\"product-category-count\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_product_category_1"] ?? null), 5, $this->source), "html", null, true));
        echo "</span></span>
<span class=\"product-category-action\">Shop Now <i class=\"fa fa-angle-double-right\"></i></span>
</a>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "__string_template__0e62a4cd93d6e93306f5b8ca64399801376f55c2a2c614ae1e605fddacc0f993";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 5,  49 => 4,  42 => 2,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__0e62a4cd93d6e93306f5b8ca64399801376f55c2a2c614ae1e605fddacc0f993", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array();
        static $filters = array("escape" => 2);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                [],
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
