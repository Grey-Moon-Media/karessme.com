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

/* themes/wosh/templates/user/user.html.twig */
class __TwigTemplate_3c809ce6e2cca1021a41ed1a671c84870cd3ad48b7753ba376e7538079beb8dc extends \Twig\Template
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
        // line 19
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => "profile"], "method", false, false, true, 19), 19, $this->source), "html", null, true));
        echo ">

  ";
        // line 21
        if ((($context["content"] ?? null) && ((($context["view_mode"] ?? null) == "default") || (($context["view_mode"] ?? null) == "full")))) {
            // line 22
            echo "    <div class=\"user-header\">
      <div class=\"inner\">
        <div class=\"row\">
          <div class=\"col-md-4\">
              <div class=\"user-profile-picture\">
                ";
            // line 27
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "user_picture", [], "any", false, false, true, 27), 27, $this->source), "html", null, true));
            echo "
              </div>
          </div>
          <div class=\"col-md-8\">
\t\t    <h2 class=\"user-name\">";
            // line 31
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_name", [], "any", false, false, true, 31), 31, $this->source), "html", null, true));
            echo " @";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["name"] ?? null), 31, $this->source), "html", null, true));
            echo "</h2>
\t\t\t<div class=\"user-content\">
            ";
            // line 33
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 33, $this->source), "user_picture", "field_name", "field_facebook", "field_twitter", "field_linkedin", "field_youtube"), "html", null, true));
            echo "
\t\t\t
                ";
            // line 35
            if ((((twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_facebook", [], "any", false, false, true, 35) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_twitter", [], "any", false, false, true, 35)) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_linkedin", [], "any", false, false, true, 35)) || twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_youtube", [], "any", false, false, true, 35))) {
                // line 36
                echo "                  <div class=\"team-social user-social-links\">
                    <a href=\"";
                // line 37
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_facebook", [], "any", false, false, true, 37), 0, [], "any", false, false, true, 37)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4["#url"] ?? null) : null), 37, $this->source), "html", null, true));
                echo "\"><i class=\"fa fa-facebook\"></i></a>
\t\t\t\t\t<a href=\"";
                // line 38
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_twitter", [], "any", false, false, true, 38), 0, [], "any", false, false, true, 38)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144["#url"] ?? null) : null), 38, $this->source), "html", null, true));
                echo "\"><i class=\"fa fa-twitter\"></i></a>
\t\t\t\t\t<a href=\"";
                // line 39
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_linkedin", [], "any", false, false, true, 39), 0, [], "any", false, false, true, 39)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b["#url"] ?? null) : null), 39, $this->source), "html", null, true));
                echo "\"><i class=\"fa fa-linkedin\"></i></a>
\t\t\t\t\t<a href=\"";
                // line 40
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 = twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_youtube", [], "any", false, false, true, 40), 0, [], "any", false, false, true, 40)) && is_array($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002) || $__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002 instanceof ArrayAccess ? ($__internal_68aa442c1d43d3410ea8f958ba9090f3eaa9a76f8de8fc9be4d6c7389ba28002["#url"] ?? null) : null), 40, $this->source), "html", null, true));
                echo "\"><i class=\"fa fa-youtube\"></i></a>
                  </div>
                ";
            }
            // line 43
            echo "          </div>
\t\t  </div>
        </div>
      </div>

    </div>

  ";
        } else {
            // line 51
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 51, $this->source), "html", null, true));
        }
        // line 53
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/user/user.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  109 => 53,  106 => 51,  96 => 43,  90 => 40,  86 => 39,  82 => 38,  78 => 37,  75 => 36,  73 => 35,  68 => 33,  61 => 31,  54 => 27,  47 => 22,  45 => 21,  39 => 19,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/user/user.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/user/user.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 21);
        static $filters = array("escape" => 19, "without" => 33);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['escape', 'without'],
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
