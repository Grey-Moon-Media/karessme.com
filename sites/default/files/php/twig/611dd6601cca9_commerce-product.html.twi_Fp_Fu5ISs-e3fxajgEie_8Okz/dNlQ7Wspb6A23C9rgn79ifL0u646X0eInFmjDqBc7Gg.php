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
<div";
        // line 28
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 28), 28, $this->source), "html", null, true));
        echo ">

\t<div class=\"row\">
\t\t<div class=\"col-md-6\">
\t\t\t<div class=\"post-image\">
\t\t\t";
        // line 33
        if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 33))) {
            // line 34
            echo "\t\t\t<div class=\"product-image image-carousel\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_image", [], "any", false, false, true, 34), 34, $this->source), "html", null, true));
            echo "</div>
\t\t\t";
        } elseif ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(twig_get_attribute($this->env, $this->source,         // line 35
($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 35))) {
            // line 36
            echo "\t\t\t<div class=\"product-image image-carousel\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_field_image", [], "any", false, false, true, 36), 36, $this->source), "html", null, true));
            echo "</div>
\t\t\t";
        }
        // line 38
        echo "\t\t\t</div>
\t\t</div>
\t\t<div class=\"col-md-6 product-teaser-wrap\">
\t\t\t<div class=\"product-title\">";
        // line 41
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variation_title", [], "any", false, false, true, 41), 41, $this->source), "html", null, true));
        echo "</div>
\t\t\t<div class=\"product-price-wrap\">
\t\t\t\t<div class=\"product-price\">";
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
        // line 44
        echo "\t\t\t</div>
\t\t\t<div class=\"product-brand\">";
        // line 45
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_brand", [], "any", false, false, true, 45), 45, $this->source), "html", null, true));
        echo "</div>

\t\t\t<div class=\"product-short-description\">";
        // line 47
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_short_description", [], "any", false, false, true, 47), 47, $this->source), "html", null, true));
        echo "</div>

\t\t\t<div class=\"product-variation-wrap clearfix\">
\t\t\t\t<div class=\"product-add-cart\">";
        // line 50
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "variations", [], "any", false, false, true, 50), 50, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t<div class=\"product-flag-icon-wrap text-bottom\">
\t\t\t\t<div class=\"product-flag-icon product-add-wishlist\">";
        // line 52
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_wishlist", [], "any", false, false, true, 52), 52, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t<div class=\"product-flag-icon product-add-compare\">";
        // line 53
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "flag_compare", [], "any", false, false, true, 53), 53, $this->source), "html", null, true));
        echo "</div>
\t\t\t\t</div>
\t\t\t</div>";
        // line 57
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["product"] ?? null), 57, $this->source), "variation_price", "variation_list_price", "variation_field_image", "variation_title", "variations", "field_short_description", "field_old_price", "field_image", "field_product_review", "body", "field_product_brand", "flag_wishlist", "flag_compare", "variation_sku"), "html", null, true));
        // line 59
        echo "</div>
\t</div>
  <div class=\"row margin-top-50 product-attributes-heading\">
    <h2>Specifications</h2>
  </div>
  <div class=\"row margin-top-50 product-attributes clearfix\">
    <div class=\"col-md-4\">
      <div>";
        // line 66
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_manufacturer", [], "any", false, false, true, 66), 66, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 67
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_size", [], "any", false, false, true, 67), 67, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 68
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_size_len", [], "any", false, false, true, 68), 68, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 69
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_gross_weight", [], "any", false, false, true, 69), 69, $this->source), "html", null, true));
        echo "</div>
    </div>
    <div class=\"col-md-4\">
      <div>";
        // line 72
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_flavor", [], "any", false, false, true, 72), 72, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 73
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_power", [], "any", false, false, true, 73), 73, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 74
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_material", [], "any", false, false, true, 74), 74, $this->source), "html", null, true));
        echo "</div>
    </div>
    <div class=\"col-md-4\">
      <div>";
        // line 77
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_display", [], "any", false, false, true, 77), 77, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 78
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_packaging", [], "any", false, false, true, 78), 78, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 79
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_included", [], "any", false, false, true, 79), 79, $this->source), "html", null, true));
        echo "</div>
    </div>
  </div>
  <div class=\"row margin-top-50 product-attributes-heading\">
    <h2>Care & Features</h2>
  </div>
  <div class=\"row margin-top-50 product-attributes clearfix\">
    <div class=\"col-md-11\">
      <div>";
        // line 87
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_purpose", [], "any", false, false, true, 87), 87, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 88
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_how_to_use", [], "any", false, false, true, 88), 88, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 89
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_how_to_clean", [], "any", false, false, true, 89), 89, $this->source), "html", null, true));
        echo "</div>
      <div>";
        // line 90
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_feature", [], "any", false, false, true, 90), 90, $this->source), "html", null, true));
        echo "</div>
    </div>
  </div>


\t<div class=\"margin-top-50 product-info clearfix\">
\t\t<ul class=\"nav nav-tabs text-center\">
\t\t  <li class=\"active\"><a data-toggle=\"tab\" href=\"#product-detail\">";
        // line 97
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Video")));
        echo "</a></li>
\t\t  <li><a data-toggle=\"tab\" href=\"#product-review\">";
        // line 98
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Reviews")));
        echo "</a></li>
\t\t</ul>

\t\t<div class=\"tab-content\">
\t\t  <div id=\"product-detail\" class=\"tab-pane active\">
\t\t\t<div class=\"product-meta-item\">
\t\t\t<h2 class=\"margin-bottom-20\">";
        // line 104
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("")));
        echo "</h2>
\t\t\t<div>";
        // line 105
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_video", [], "any", false, false, true, 105), 105, $this->source), "html", null, true));
        echo "</div>
\t\t\t</div>
\t\t  </div>
\t\t  <div id=\"product-review\" class=\"tab-pane fade\">
\t\t\t";
        // line 109
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["product"] ?? null), "field_product_review", [], "any", false, false, true, 109), 109, $this->source), "html", null, true));
        echo "
\t\t  </div>
\t\t</div>
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
        return array (  227 => 109,  220 => 105,  216 => 104,  207 => 98,  203 => 97,  193 => 90,  189 => 89,  185 => 88,  181 => 87,  170 => 79,  166 => 78,  162 => 77,  156 => 74,  152 => 73,  148 => 72,  142 => 69,  138 => 68,  134 => 67,  130 => 66,  121 => 59,  119 => 57,  114 => 53,  110 => 52,  105 => 50,  99 => 47,  94 => 45,  91 => 44,  77 => 43,  72 => 41,  67 => 38,  61 => 36,  59 => 35,  54 => 34,  52 => 33,  44 => 28,  41 => 27,  39 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/commerce/commerce-product.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/commerce/commerce-product.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 23, "if" => 33);
        static $filters = array("escape" => 28, "render" => 33, "trim" => 43, "striptags" => 43, "without" => 57, "t" => 97);
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
