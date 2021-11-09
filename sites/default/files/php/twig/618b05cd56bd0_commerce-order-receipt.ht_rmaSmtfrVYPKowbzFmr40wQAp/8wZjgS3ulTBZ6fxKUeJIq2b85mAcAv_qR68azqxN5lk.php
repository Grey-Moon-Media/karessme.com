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

/* themes/wosh/templates/commerce-order-receipt.html.twig */
class __TwigTemplate_eeae11cedfd8f6a60a810db470ef2b4760d1afae9afa64111c7da3a46ffe6486 extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'order_items' => [$this, 'block_order_items'],
            'shipping_information' => [$this, 'block_shipping_information'],
            'billing_information' => [$this, 'block_billing_information'],
            'payment_method' => [$this, 'block_payment_method'],
            'additional_information' => [$this, 'block_additional_information'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 23
        echo "<table style=\"margin: 15px auto 0 auto; max-width: 768px; font-family: arial,sans-serif\" class=\"commerce-table\">
  <tbody>
  <tr>
    <td>
      <table style=\"margin-left: auto; margin-right: auto; max-width: 768px; text-align: center;\">
        <tbody>
\t<tr>
\t  <td>
\t    <a href=\"";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>")));
        echo "\"><img class=\"header-logo\" src=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["logo_path"] ?? null), 31, $this->source), "html", null, true));
        echo "\" alt=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["site_name"] ?? null), 31, $this->source), "html", null, true));
        echo "\" width=\"210\" height=\"75\" /></a>
\t  </td>
    </tr>

        <tr>
          <td>
            <a href=\"";
        // line 37
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getUrl("<front>")));
        echo "\" style=\"color: #0e69be; text-decoration: none; font-weight: bold; margin-top: 15px;\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getStore", [], "any", false, false, true, 37), "label", [], "any", false, false, true, 37), 37, $this->source), "html", null, true));
        echo "</a>
          </td>
        </tr>
        </tbody>
      </table>
      <table style=\"text-align: center; min-width: 450px; margin: 5px auto 0 auto; border: 1px solid #cccccc; border-radius: 5px; padding: 40px 30px 30px 30px;\">
        <tbody>
        <tr>
          <td style=\"font-size: 30px; padding-bottom: 30px\">";
        // line 45
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order Confirmation")));
        echo "</td>
        </tr>
        <tr>
          <td style=\"font-weight: bold; padding-top:15px; padding-bottom: 15px; text-align: left; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc\">
            ";
        // line 49
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order #@number details:", ["@number" => twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getOrderNumber", [], "any", false, false, true, 49)])));
        echo "
          </td>
        </tr>
        <tr>
          <td>
            ";
        // line 54
        $this->displayBlock('order_items', $context, $blocks);
        // line 71
        echo "          </td>
        </tr>
        <tr>
          <td>
            ";
        // line 75
        if ((($context["billing_information"] ?? null) || ($context["shipping_information"] ?? null))) {
            // line 76
            echo "            <table style=\"width: 100%; padding-top:15px; padding-bottom: 15px; text-align: left; border-top: 1px solid #cccccc; border-bottom: 1px solid #cccccc\">
              <tbody>
              <tr>
                ";
            // line 79
            if (($context["shipping_information"] ?? null)) {
                // line 80
                echo "                  <td style=\"padding-top: 5px; font-weight: bold;\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Shipping Information")));
                echo "</td>
                ";
            }
            // line 82
            echo "                ";
            if (($context["billing_information"] ?? null)) {
                // line 83
                echo "                  <td style=\"padding-top: 5px; font-weight: bold;\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Billing Information")));
                echo "</td>
                ";
            }
            // line 85
            echo "              </tr>
              <tr>
                ";
            // line 87
            if (($context["shipping_information"] ?? null)) {
                // line 88
                echo "                  <td>
                    ";
                // line 89
                $this->displayBlock('shipping_information', $context, $blocks);
                // line 92
                echo "                  </td>
                ";
            }
            // line 94
            echo "                ";
            if (($context["billing_information"] ?? null)) {
                // line 95
                echo "                  <td>
                    ";
                // line 96
                $this->displayBlock('billing_information', $context, $blocks);
                // line 99
                echo "                  </td>
                ";
            }
            // line 101
            echo "              </tr>
              ";
            // line 102
            if (($context["payment_method"] ?? null)) {
                // line 103
                echo "                <tr>
                  <td style=\"font-weight: bold; margin-top: 10px;\">";
                // line 104
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Payment Method")));
                echo "</td>
                </tr>
                <tr>
                  <td>
                    ";
                // line 108
                $this->displayBlock('payment_method', $context, $blocks);
                // line 111
                echo "                  </td>
                </tr>
              ";
            }
            // line 114
            echo "              </tbody>
            </table>
            ";
        }
        // line 117
        echo "          </td>
        </tr>
        <tr>
          <td>
            <p style=\"margin-bottom: 0;\">
              ";
        // line 122
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Subtotal: @subtotal", ["@subtotal" => $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["totals"] ?? null), "subtotal", [], "any", false, false, true, 122), 122, $this->source))])));
        echo "
            </p>
          </td>
        </tr>
        ";
        // line 126
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["totals"] ?? null), "adjustments", [], "any", false, false, true, 126));
        foreach ($context['_seq'] as $context["_key"] => $context["adjustment"]) {
            // line 127
            echo "        <tr>
          <td>
            <p style=\"margin-bottom: 0;\">
              ";
            // line 130
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["adjustment"], "label", [], "any", false, false, true, 130), 130, $this->source), "html", null, true));
            echo ": ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["adjustment"], "total", [], "any", false, false, true, 130), 130, $this->source)), "html", null, true));
            echo "
            </p>
          </td>
        </tr>
        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['adjustment'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 135
        echo "        <tr>
          <td>
            <p style=\"font-size: 24px; padding-top: 15px; padding-bottom: 5px;\">
              ";
        // line 138
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Order Total: @total", ["@total" => $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getTotalPrice", [], "any", false, false, true, 138), 138, $this->source))])));
        echo "
            </p>
          </td>
        </tr>
        <tr>
          <td>
            ";
        // line 144
        $this->displayBlock('additional_information', $context, $blocks);
        // line 147
        echo "          </td>
        </tr>
        </tbody>
      </table>
    </td>
  </tr>
  </tbody>
</table>
";
    }

    // line 54
    public function block_order_items($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 55
        echo "            <table style=\"padding-top: 15px; padding-bottom:15px; width: 100%\">
              <tbody style=\"text-align: left;\">
              ";
        // line 57
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["order_entity"] ?? null), "getItems", [], "any", false, false, true, 57));
        foreach ($context['_seq'] as $context["_key"] => $context["order_item"]) {
            // line 58
            echo "              <tr>
                <td>
                  ";
            // line 60
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, twig_number_format_filter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["order_item"], "getQuantity", [], "any", false, false, true, 60), 60, $this->source)), "html", null, true));
            echo " x
                </td>
                <td>
                  <span>";
            // line 63
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["order_item"], "label", [], "any", false, false, true, 63), 63, $this->source), "html", null, true));
            echo "</span>
                  <span style=\"float: right;\">";
            // line 64
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\commerce_price\TwigExtension\PriceTwigExtension']->formatPrice($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["order_item"], "getTotalPrice", [], "any", false, false, true, 64), 64, $this->source)), "html", null, true));
            echo "</span>
                </td>
              </tr>
              ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['order_item'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 68
        echo "              </tbody>
            </table>
            ";
    }

    // line 89
    public function block_shipping_information($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 90
        echo "                      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["shipping_information"] ?? null), 90, $this->source), "html", null, true));
        echo "
                    ";
    }

    // line 96
    public function block_billing_information($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 97
        echo "                      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["billing_information"] ?? null), 97, $this->source), "html", null, true));
        echo "
                    ";
    }

    // line 108
    public function block_payment_method($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 109
        echo "                      ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["payment_method"] ?? null), 109, $this->source), "html", null, true));
        echo "
                    ";
    }

    // line 144
    public function block_additional_information($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 145
        echo "              ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Thank you for your order!")));
        echo "
            ";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/commerce-order-receipt.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  324 => 145,  320 => 144,  313 => 109,  309 => 108,  302 => 97,  298 => 96,  291 => 90,  287 => 89,  281 => 68,  271 => 64,  267 => 63,  261 => 60,  257 => 58,  253 => 57,  249 => 55,  245 => 54,  233 => 147,  231 => 144,  222 => 138,  217 => 135,  204 => 130,  199 => 127,  195 => 126,  188 => 122,  181 => 117,  176 => 114,  171 => 111,  169 => 108,  162 => 104,  159 => 103,  157 => 102,  154 => 101,  150 => 99,  148 => 96,  145 => 95,  142 => 94,  138 => 92,  136 => 89,  133 => 88,  131 => 87,  127 => 85,  121 => 83,  118 => 82,  112 => 80,  110 => 79,  105 => 76,  103 => 75,  97 => 71,  95 => 54,  87 => 49,  80 => 45,  67 => 37,  54 => 31,  44 => 23,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/commerce-order-receipt.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/commerce-order-receipt.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 54, "if" => 75, "for" => 126);
        static $filters = array("escape" => 31, "t" => 45, "commerce_price_format" => 122, "number_format" => 60);
        static $functions = array("url" => 31);

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'for'],
                ['escape', 't', 'commerce_price_format', 'number_format'],
                ['url']
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
