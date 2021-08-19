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

/* themes/wosh/templates/commerce/commerce-product--teaser.html.twig */
class __TwigTemplate_ff23e6109f3a575bf2c33b812273a349b7244a3e02b1172ea54871e6500b757a extends \Twig\Template
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
        // line 23
        $context["classes"] = [0 => "product-teaser"];
        // line 27
        echo "
<div class=\"";
        // line 28
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_layout"] ?? null), 28, $this->source), "html", null, true));
        echo "\">
<div";
        // line 29
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 29), 29, $this->source), "html", null, true));
        echo ">
<div class=\"post-image product-image\">
";
        // line 31
        if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 31))) {
            // line 32
            echo "\t";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 32), 0, [], "any", false, false, true, 32), 32, $this->source), "html", null, true));
            echo "
\t<div class=\"product-image-overlay\">";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 33), 1, [], "any", false, false, true, 33), 33, $this->source), "html", null, true));
            echo "</div>
";
        } elseif ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source,         // line 34
($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 34))) {
            echo "\t
\t";
            // line 35
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 35), 0, [], "any", false, false, true, 35), 35, $this->source), "html", null, true));
            echo "
\t<div class=\"product-image-overlay\">";
            // line 36
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 36), 1, [], "any", false, false, true, 36), 36, $this->source), "html", null, true));
            echo "</div>
";
        }
        // line 38
        echo "<div class=\"product-flag-icon product-view\"><a href=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_url"] ?? null), 38, $this->source), "html", null, true));
        echo "\" class=\"flag-link use-ajax\" data-dialog-options=\"{&quot;width&quot;:680}\" data-dialog-type=\"modal\"><span class=\"flag-title\">Quick View</span> <i class=\"ion-ios-search-strong\"></i></a></div>
<div class=\"product-flag-icon product-add-wishlist\">";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_wishlist", [], "any", false, false, true, 39), 39, $this->source), "html", null, true));
        echo "</div>
<div class=\"product-flag-icon product-add-compare\">";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_compare", [], "any", false, false, true, 40), 40, $this->source), "html", null, true));
        echo "</div>
</div>

<div class=\"product-meta-wrap\">
<div class=\"product-meta\">
<div class=\"product-title\"><a href=\"";
        // line 45
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["product_url"] ?? null), 45, $this->source), "html", null, true));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "title", [], "any", false, false, true, 45), 45, $this->source), "html", null, true));
        echo "</a></div>
<div class=\"product-price-wrap\">
\t<div class=\"product-price\">";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_price", [], "any", false, false, true, 47), 47, $this->source), "html", null, true));
        echo "</div>
\t";
        // line 48
        if (twig_trim_filter(strip_tags($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_list_price", [], "any", false, false, true, 48))))) {
            echo "<del class=\"product-old-price\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_list_price", [], "any", false, false, true, 48), 48, $this->source), "html", null, true));
            echo "</del>";
        }
        // line 49
        echo "\t";
        if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_old_price", [], "any", false, false, true, 49))) {
            echo "<div class=\"product-old-price\"><del>";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_old_price", [], "any", false, false, true, 49), 49, $this->source), "html", null, true));
            echo "</del></div>";
        }
        // line 50
        echo "</div>
</div>
<div class=\"product-add-cart\">";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variations", [], "any", false, false, true, 52), 52, $this->source), "html", null, true));
        echo "</div>
</div>

</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/commerce/commerce-product--teaser.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 52,  118 => 50,  111 => 49,  105 => 48,  101 => 47,  94 => 45,  86 => 40,  82 => 39,  77 => 38,  72 => 36,  68 => 35,  64 => 34,  60 => 33,  55 => 32,  53 => 31,  48 => 29,  44 => 28,  41 => 27,  39 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/commerce/commerce-product--teaser.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/commerce/commerce-product--teaser.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 23, "if" => 31);
        static $filters = array("escape" => 28, "render" => 31, "trim" => 48, "striptags" => 48);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'render', 'trim', 'striptags'],
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
