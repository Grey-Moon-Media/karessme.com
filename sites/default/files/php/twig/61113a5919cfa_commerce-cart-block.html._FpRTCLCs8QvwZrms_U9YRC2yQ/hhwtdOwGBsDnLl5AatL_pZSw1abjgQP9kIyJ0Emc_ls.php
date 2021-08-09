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

/* themes/wosh/templates/commerce/cart/commerce-cart-block.html.twig */
class __TwigTemplate_d50cfb37e8bea6bd5626315b4128e046c0813a822db2cb92655398ee7cb60bf1 extends \Twig\Template
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
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["attributes"] ?? null), 1, $this->source), "html", null, true));
        echo ">
  <div class=\"cart-block--summary\">
    <a class=\"cart-block--link__expand\" href=\"";
        // line 3
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["url"] ?? null), 3, $this->source), "html", null, true));
        echo "\">
      <button type=\"button\" class=\"cart-block--summary__icon header-icon cart-icon\"><span class=\"ion-bag\"></span>
\t  <span class=\"cart-block--summary__count text-center cart-block-count\">";
        // line 5
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["count"] ?? null), 5, $this->source), "html", null, true));
        echo "</span>
\t  </button>
    </a>
  </div>
  ";
        // line 9
        if (($context["content"] ?? null)) {
            // line 10
            echo "  <div class=\"cart-block--contents\">
    <div class=\"cart-block--contents__inner\">
      <div class=\"cart-block--contents__items\">
        ";
            // line 13
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 13, $this->source), "html", null, true));
            echo "
      </div>
      <div class=\"cart-block--contents__links cart-block-link\">
        ";
            // line 16
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["links"] ?? null), 16, $this->source), "html", null, true));
            echo "
      </div>
    </div>
  </div>
  ";
        }
        // line 21
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/commerce/cart/commerce-cart-block.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  78 => 21,  70 => 16,  64 => 13,  59 => 10,  57 => 9,  50 => 5,  45 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/commerce/cart/commerce-cart-block.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/commerce/cart/commerce-cart-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 9);
        static $filters = array("escape" => 1);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
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
