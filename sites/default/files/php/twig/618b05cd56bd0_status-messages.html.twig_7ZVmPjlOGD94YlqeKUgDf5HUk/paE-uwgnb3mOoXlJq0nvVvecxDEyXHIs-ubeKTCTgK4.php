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

/* themes/wosh/templates/misc/status-messages.html.twig */
class __TwigTemplate_514bb777e1c2e2c728a5ca107f073e1be056f19d9672550ef1917f492d629bdc extends \Twig\Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'messages' => [$this, 'block_messages'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 24
        echo "<div class=\"task-bar alert alert-dismissable clearfix\">
\t<div data-drupal-messages>
\t  ";
        // line 26
        $this->displayBlock('messages', $context, $blocks);
        // line 63
        echo "\t</div>
</div>";
    }

    // line 26
    public function block_messages($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 27
        echo "\t\t";
        if ( !twig_test_empty(($context["message_list"] ?? null))) {
            // line 28
            echo "\t\t  <div class=\"messages__wrapper layout-container\">
\t\t\t";
            // line 29
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(($context["message_list"] ?? null));
            foreach ($context['_seq'] as $context["type"] => $context["messages"]) {
                // line 30
                echo "\t\t\t  ";
                // line 31
                $context["classes"] = [0 => "messages", 1 => ("messages--" . $this->sandbox->ensureToStringAllowed(                // line 33
$context["type"], 33, $this->source))];
                // line 36
                echo "\t\t\t  <div role=\"contentinfo\" aria-label=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 = ($context["status_headings"] ?? null)) && is_array($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4) || $__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4 instanceof ArrayAccess ? ($__internal_f607aeef2c31a95a7bf963452dff024ffaeb6aafbe4603f9ca3bec57be8633f4[$context["type"]] ?? null) : null), 36, $this->source), "html", null, true));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 36), 36, $this->source), "role", "aria-label"), "html", null, true));
                echo ">
\t\t\t  <button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">&times;</button>
\t\t\t\t";
                // line 38
                if (($context["type"] == "error")) {
                    // line 39
                    echo "\t\t\t\t<div role=\"alert\">
\t\t\t\t  ";
                }
                // line 41
                echo "\t\t\t\t  ";
                if ((($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 = ($context["status_headings"] ?? null)) && is_array($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144) || $__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144 instanceof ArrayAccess ? ($__internal_62824350bc4502ee19dbc2e99fc6bdd3bd90e7d8dd6e72f42c35efd048542144[$context["type"]] ?? null) : null)) {
                    // line 42
                    echo "\t\t\t\t\t<h2 class=\"visually-hidden\">";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed((($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b = ($context["status_headings"] ?? null)) && is_array($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b) || $__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b instanceof ArrayAccess ? ($__internal_1cfccaec8dd2e8578ccb026fbe7f2e7e29ac2ed5deb976639c5fc99a6ea8583b[$context["type"]] ?? null) : null), 42, $this->source), "html", null, true));
                    echo "</h2>
\t\t\t\t  ";
                }
                // line 44
                echo "\t\t\t\t  ";
                if ((twig_length_filter($this->env, $context["messages"]) > 1)) {
                    // line 45
                    echo "\t\t\t\t\t<ul class=\"messages__list\">
\t\t\t\t\t  ";
                    // line 46
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable($context["messages"]);
                    foreach ($context['_seq'] as $context["_key"] => $context["message"]) {
                        // line 47
                        echo "\t\t\t\t\t\t<li class=\"messages__item\">";
                        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["message"], 47, $this->source), "html", null, true));
                        echo "</li>
\t\t\t\t\t  ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['message'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 49
                    echo "\t\t\t\t\t</ul>
\t\t\t\t  ";
                } else {
                    // line 51
                    echo "\t\t\t\t\t";
                    echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, twig_first($this->env, $this->sandbox->ensureToStringAllowed($context["messages"], 51, $this->source)), "html", null, true));
                    echo "
\t\t\t\t  ";
                }
                // line 53
                echo "\t\t\t\t  ";
                if (($context["type"] == "error")) {
                    // line 54
                    echo "\t\t\t\t</div>
\t\t\t\t";
                }
                // line 56
                echo "\t\t\t  </div>
\t\t\t  ";
                // line 58
                echo "\t\t\t  ";
                $context["attributes"] = twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "removeClass", [0 => ($context["classes"] ?? null)], "method", false, false, true, 58);
                // line 59
                echo "\t\t\t";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['type'], $context['messages'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 60
            echo "\t\t  </div>
\t\t";
        }
        // line 62
        echo "\t  ";
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/misc/status-messages.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  145 => 62,  141 => 60,  135 => 59,  132 => 58,  129 => 56,  125 => 54,  122 => 53,  116 => 51,  112 => 49,  103 => 47,  99 => 46,  96 => 45,  93 => 44,  87 => 42,  84 => 41,  80 => 39,  78 => 38,  70 => 36,  68 => 33,  67 => 31,  65 => 30,  61 => 29,  58 => 28,  55 => 27,  51 => 26,  46 => 63,  44 => 26,  40 => 24,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/misc/status-messages.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/misc/status-messages.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("block" => 26, "if" => 27, "for" => 29, "set" => 31);
        static $filters = array("escape" => 36, "without" => 36, "length" => 44, "first" => 51);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['block', 'if', 'for', 'set'],
                ['escape', 'without', 'length', 'first'],
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
