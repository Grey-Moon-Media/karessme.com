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

/* modules/contrib/commerce/modules/checkout/templates/commerce-checkout-completion-register.html.twig */
class __TwigTemplate_333646fe75f8d7a8986fa7b1ce6aca8c7d212a65dcc6d137c5807f4768fbd73a extends \Twig\Template
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
        // line 12
        echo "<div class=\"commerce-checkout-completion-register\">
  <div class=\"commerce-checkout-completion-register__text\">
    <h2>";
        // line 14
        echo t("Create your account", array());
        echo "</h2>
    <p>";
        // line 15
        echo t("Set a password to save your details for next time.", array());
        echo "</p>
  </div>
  <div class=\"commerce-checkout-completion-register__form\">
    ";
        // line 18
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["form"] ?? null), 18, $this->source), "html", null, true));
        echo "
  </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/commerce/modules/checkout/templates/commerce-checkout-completion-register.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  53 => 18,  47 => 15,  43 => 14,  39 => 12,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/commerce/modules/checkout/templates/commerce-checkout-completion-register.html.twig", "/var/www/html/test.karessme.com/modules/contrib/commerce/modules/checkout/templates/commerce-checkout-completion-register.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("trans" => 14);
        static $filters = array("escape" => 18);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['trans'],
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
