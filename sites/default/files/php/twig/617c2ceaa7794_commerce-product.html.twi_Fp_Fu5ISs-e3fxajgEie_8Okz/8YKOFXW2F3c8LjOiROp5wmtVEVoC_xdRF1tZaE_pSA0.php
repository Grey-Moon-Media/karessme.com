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

/* themes/wosh/templates/commerce/commerce-product.html.twig */
class __TwigTemplate_294ee43d9272a466c3b37c61da66224973e502b384afb2d8920745911e4dca79 extends \Twig\Template
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
        $context["classes"] = [0 => "product-post"];
        // line 27
        echo "
<div ";
        // line 28
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 28), 28, $this->source), "html", null, true));
        echo ">
\t<div class=\"row\">
\t\t<div class=\"col-md-6\">
\t\t\t<div class=\"post-image\"> ";
        // line 31
        if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 31))) {
            // line 32
            echo "\t\t\t\t<div class=\"product-image image-carousel\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 32), 32, $this->source), "html", null, true));
            echo "</div> ";
        } elseif ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 32))) {
            // line 33
            echo "\t\t\t\t<div class=\"product-image image-carousel\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 33), 33, $this->source), "html", null, true));
            echo "</div> ";
        }
        echo " </div>
\t\t</div>
\t\t<div class=\"col-md-6\">
\t\t\t<div class=\"product-title-review-wrap\">
\t\t\t\t";
        // line 38
        echo "             <div class=\"product-title\"> ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_title", [], "any", false, false, true, 38), 38, $this->source), "html", null, true));
        echo "</div> 
\t\t\t\t<div class=\"product-rating_1\">";
        // line 39
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "overall_rating", [], "any", false, false, true, 39), 39, $this->source), "html", null, true));
        echo "</div>
\t\t\t</div>
\t\t\t<div class=\"product-teaser-wrap\">
\t\t\t\t<div class=\"product-price-wrap\">
\t\t\t\t\t<div class=\"product-price\">";
        // line 43
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_price", [], "any", false, false, true, 43), 43, $this->source), "html", null, true));
        echo "</div> ";
        if (twig_trim_filter(strip_tags($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_list_price", [], "any", false, false, true, 43))))) {
            echo "<del class=\"product-old-price\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_list_price", [], "any", false, false, true, 43), 43, $this->source), "html", null, true));
            echo "</del>";
        }
        echo " ";
        if (twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_old_price", [], "any", false, false, true, 43)) {
            echo "<del class=\"product-old-price\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_old_price", [], "any", false, false, true, 43), 43, $this->source), "html", null, true));
            echo "</del>";
        }
        echo " </div>
\t\t\t\t<div class=\"product-brand\">";
        // line 44
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_brand", [], "any", false, false, true, 44), 44, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t<div class=\"product-short-description\">";
        // line 45
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_short_description", [], "any", false, false, true, 45), 45, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t<div class=\"product-variation-wrap clearfix\">
\t\t\t\t\t<div class=\"product-add-cart\"> ";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["stock"] ?? null), 47, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t";
        // line 49
        echo "\t\t\t\t\t<div class=\"product-flag-icon-wrap text-bottom\">
\t\t\t\t\t\t<div class=\"product-flag-icon product-add-wishlist\">";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_wishlist", [], "any", false, false, true, 50), 50, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t\t\t<div class=\"product-flag-icon product-add-compare\">";
        // line 51
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_compare", [], "any", false, false, true, 51), 51, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t\t</div>
\t\t\t\t</div>";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["product"] ?? null), 53, $this->source), "variation_price", "variation_list_price", "variation_field_image", "variation_title", "variations", "field_short_description", "field_old_price", "field_image", "field_product_review", "body", "field_product_brand", "flag_wishlist", "flag_compare", "variation_sku"), "html", null, true));
        echo "</div>
\t\t</div>
\t</div>
\t<div class=\"row margin-top-50 product-attributes-heading\">
\t\t<h2>Specifications</h2> </div>
\t<div class=\"row margin-top-50 product-attributes clearfix\">
\t\t<div class=\"col-md-4\">
\t\t\t<div>";
        // line 60
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_manufacturer", [], "any", false, false, true, 60), 60, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 61
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_size", [], "any", false, false, true, 61), 61, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 62
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_size_len", [], "any", false, false, true, 62), 62, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 63
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_gross_weight", [], "any", false, false, true, 63), 63, $this->source), "html", null, true));
        echo "</div>
\t\t</div>
\t\t<div class=\"col-md-4\">
\t\t\t<div>";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_flavor", [], "any", false, false, true, 66), 66, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 67
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_power", [], "any", false, false, true, 67), 67, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 68
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_material", [], "any", false, false, true, 68), 68, $this->source), "html", null, true));
        echo "</div>
\t\t</div>
\t\t<div class=\"col-md-4\">
\t\t\t<div>";
        // line 71
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_display", [], "any", false, false, true, 71), 71, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_packaging", [], "any", false, false, true, 72), 72, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_included", [], "any", false, false, true, 73), 73, $this->source), "html", null, true));
        echo "</div>
\t\t</div>
\t</div>
\t<div class=\"row margin-top-50 product-attributes-heading\">
\t\t<h2>Care & Features</h2> </div>
\t<div class=\"row margin-top-50 product-attributes clearfix\">
\t\t<div class=\"col-md-11\">
\t\t\t<div>";
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_purpose", [], "any", false, false, true, 80), 80, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 81
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_how_to_use", [], "any", false, false, true, 81), 81, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 82
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_how_to_clean", [], "any", false, false, true, 82), 82, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div>";
        // line 83
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_feature", [], "any", false, false, true, 83), 83, $this->source), "html", null, true));
        echo "</div>
\t\t</div>
\t</div>
\t<div class=\"margin-top-50 product-info clearfix\">
\t\t<ul class=\"nav nav-tabs text-center\">
\t\t\t<li class=\"active\"><a data-toggle=\"tab\" href=\"#product-detail\">";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Video")));
        echo "</a></li>
\t\t";
        // line 90
        echo "\t\t</ul>
\t\t<div class=\"tab-content\">
\t\t\t<div id=\"product-detail\" class=\"tab-pane active\">
\t\t\t\t<div class=\"product-meta-item\">
\t\t\t\t\t<h2 class=\"margin-bottom-20\">";
        // line 94
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("")));
        echo "</h2>
\t\t\t\t\t<div>";
        // line 95
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_video", [], "any", false, false, true, 95), 95, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>
\t\t";
        // line 99
        echo "\t\t</div>
\t</div>
</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/commerce/commerce-product.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  220 => 99,  214 => 95,  210 => 94,  204 => 90,  200 => 88,  192 => 83,  188 => 82,  184 => 81,  180 => 80,  170 => 73,  166 => 72,  162 => 71,  156 => 68,  152 => 67,  148 => 66,  142 => 63,  138 => 62,  134 => 61,  130 => 60,  120 => 53,  115 => 51,  111 => 50,  108 => 49,  104 => 47,  99 => 45,  95 => 44,  79 => 43,  72 => 39,  67 => 38,  57 => 33,  52 => 32,  50 => 31,  44 => 28,  41 => 27,  39 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/commerce/commerce-product.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/commerce/commerce-product.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 23, "if" => 31);
        static $filters = array("escape" => 28, "render" => 31, "trim" => 43, "striptags" => 43, "without" => 53, "t" => 88);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['escape', 'render', 'trim', 'striptags', 'without', 't'],
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
