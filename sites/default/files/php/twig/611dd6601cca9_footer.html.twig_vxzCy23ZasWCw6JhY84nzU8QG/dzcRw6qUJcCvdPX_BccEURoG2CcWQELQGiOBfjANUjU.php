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

/* @wosh/layout/footer.html.twig */
class __TwigTemplate_91bdf99dc4d228d542bfc8d0abb7b88536b3299fb7d6b042c2f0e5977b073b09 extends \Twig\Template
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
        // line 2
        echo "<footer id=\"footer\" class=\"footer ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_theme"] ?? null), 2, $this->source), "html", null, true));
        echo "\">
\t<!-- start Footer -->
\t";
        // line 4
        if ((((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 4) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 4)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 4)) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_forth", [], "any", false, false, true, 4))) {
            // line 5
            echo "\t  <div class=\"footer-widget\">
\t\t<div class=\"container\">
\t\t\t<div class=\"row\">
\t\t\t";
            // line 8
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 8)) {
                // line 9
                echo "\t\t\t<!-- Start Footer First Region -->
\t\t\t";
                // line 10
                if (($context["footer_responsive"] ?? null)) {
                    // line 11
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_first_size"] ?? null), 11, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                } else {
                    // line 13
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 13, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                }
                // line 15
                echo "\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_first", [], "any", false, false, true, 15), 15, $this->source), "html", null, true));
                echo "
\t\t\t</div>
\t\t\t<!-- End Footer First Region -->
\t\t\t";
            }
            // line 19
            echo "
\t\t\t";
            // line 20
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 20)) {
                // line 21
                echo "\t\t\t<!-- Start Footer Second Region -->
\t\t\t";
                // line 22
                if (($context["footer_responsive"] ?? null)) {
                    // line 23
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_second_size"] ?? null), 23, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                } else {
                    // line 25
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 25, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                }
                // line 27
                echo "\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_second", [], "any", false, false, true, 27), 27, $this->source), "html", null, true));
                echo "
\t\t\t</div>
\t\t\t<!-- End Footer Second Region -->
\t\t\t";
            }
            // line 31
            echo "
\t\t\t";
            // line 32
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 32)) {
                // line 33
                echo "\t\t\t<!-- Start Footer Third Region -->
\t\t\t";
                // line 34
                if (($context["footer_responsive"] ?? null)) {
                    // line 35
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_third_size"] ?? null), 35, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                } else {
                    // line 37
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 37, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                }
                // line 39
                echo "\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_third", [], "any", false, false, true, 39), 39, $this->source), "html", null, true));
                echo "
\t\t\t</div>
\t\t\t<!-- End Footer Third Region -->
\t\t\t";
            }
            // line 43
            echo "\t\t\t
\t\t\t";
            // line 44
            if (twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_forth", [], "any", false, false, true, 44)) {
                // line 45
                echo "\t\t\t<!-- Start Footer Forth Region -->
\t\t\t";
                // line 46
                if (($context["footer_responsive"] ?? null)) {
                    // line 47
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_forth_size"] ?? null), 47, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                } else {
                    // line 49
                    echo "\t\t\t<div class=\"";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["footer_class"] ?? null), 49, $this->source), "html", null, true));
                    echo " footer-widget-section\">
\t\t\t";
                }
                // line 51
                echo "\t\t\t\t";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_forth", [], "any", false, false, true, 51), 51, $this->source), "html", null, true));
                echo "
\t\t\t</div>
\t\t\t<!-- End Footer Forth Region -->
\t\t\t";
            }
            // line 55
            echo "\t\t\t</div>
\t\t</div>
\t  </div>
\t";
        }
        // line 59
        echo "\t<!--End Footer -->

";
        // line 61
        if ((twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_first", [], "any", false, false, true, 61) || twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_second", [], "any", false, false, true, 61))) {
            // line 62
            echo "\t<div class=\"footer-bottom\">
\t  <div class=\"container\">
\t\t<div class=\"row\">
\t\t  <div class=\"col-md-6\">
\t\t\t";
            // line 66
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_first", [], "any", false, false, true, 66), 66, $this->source), "html", null, true));
            echo "
\t\t  </div>
\t\t  <div class=\"col-md-6\">
\t\t\t";
            // line 69
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["page"] ?? null), "footer_bottom_second", [], "any", false, false, true, 69), 69, $this->source), "html", null, true));
            echo "
\t\t  </div>
\t\t</div>
\t  </div>
\t</div>
";
        }
        // line 75
        echo "</footer>
";
        // line 76
        if (($context["scrolltop"] ?? null)) {
            // line 77
            echo "\t<div class=\"back-to-top\"><span class=\"ion-ios-arrow-up\"></span></div>
";
        }
    }

    public function getTemplateName()
    {
        return "@wosh/layout/footer.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  207 => 77,  205 => 76,  202 => 75,  193 => 69,  187 => 66,  181 => 62,  179 => 61,  175 => 59,  169 => 55,  161 => 51,  155 => 49,  149 => 47,  147 => 46,  144 => 45,  142 => 44,  139 => 43,  131 => 39,  125 => 37,  119 => 35,  117 => 34,  114 => 33,  112 => 32,  109 => 31,  101 => 27,  95 => 25,  89 => 23,  87 => 22,  84 => 21,  82 => 20,  79 => 19,  71 => 15,  65 => 13,  59 => 11,  57 => 10,  54 => 9,  52 => 8,  47 => 5,  45 => 4,  39 => 2,);
    }

    public function getSourceContext()
    {
        return new Source("", "@wosh/layout/footer.html.twig", "/var/www/html/karessme.com/themes/wosh/templates/layout/footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 4);
        static $filters = array("escape" => 2);
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
