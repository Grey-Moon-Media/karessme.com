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

/* themes/wosh/templates/navigation/pager.html.twig */
class __TwigTemplate_bdd0af255ef99c541b8b013951cead09a666b0f16ba9769ef948fba456c41421 extends \Twig\Template
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
        // line 7
        if (($context["items"] ?? null)) {
            // line 8
            echo "  <nav class=\"pager\" aria-labelledby=\"pagination-heading\">
    <h4 id=\"pagination-heading\" class=\"visually-hidden\">";
            // line 9
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Pagination")));
            echo "</h4>
    <ul class=\"pager__items js-pager__items\">
      ";
            // line 12
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 12)) {
                // line 13
                echo "        <li class=\"pager__item pager__item--first\">
          <a href=\"";
                // line 14
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 14), "href", [], "any", false, false, true, 14), 14, $this->source), "html", null, true));
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to first page")));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, false, true, 14), "attributes", [], "any", false, false, true, 14), 14, $this->source), "href", "title"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 15
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("First page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 16
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 16), "text", [], "any", true, true, true, 16)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "first", [], "any", false, true, true, 16), "text", [], "any", false, false, true, 16), 16, $this->source), t("« First"))) : (t("« First"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 20
            echo "      ";
            // line 21
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 21)) {
                // line 22
                echo "        <li class=\"pager__item pager__item--previous\">
          <a href=\"";
                // line 23
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 23), "href", [], "any", false, false, true, 23), 23, $this->source), "html", null, true));
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to previous page")));
                echo "\" rel=\"prev\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, false, true, 23), "attributes", [], "any", false, false, true, 23), 23, $this->source), "href", "title", "rel"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 24
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Previous page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 25), "text", [], "any", true, true, true, 25)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "previous", [], "any", false, true, true, 25), "text", [], "any", false, false, true, 25), 25, $this->source), t("‹ Previous"))) : (t("‹ Previous"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 29
            echo "      ";
            // line 30
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "previous", [], "any", false, false, true, 30)) {
                // line 31
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 33
            echo "      ";
            // line 34
            echo "      ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "pages", [], "any", false, false, true, 34));
            foreach ($context['_seq'] as $context["key"] => $context["item"]) {
                // line 35
                echo "        <li class=\"pager__item";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (" is-active") : (""))));
                echo "\">
          ";
                // line 36
                if ((($context["current"] ?? null) == $context["key"])) {
                    // line 37
                    echo "            ";
                    $context["title"] = t("Current page");
                    // line 38
                    echo "          ";
                } else {
                    // line 39
                    echo "            ";
                    $context["title"] = t("Go to page @key", ["@key" => $context["key"]]);
                    // line 40
                    echo "          ";
                }
                // line 41
                echo "          <a href=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "href", [], "any", false, false, true, 41), 41, $this->source), "html", null, true));
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 41, $this->source), "html", null, true));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["item"], "attributes", [], "any", false, false, true, 41), 41, $this->source), "href", "title"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">
              ";
                // line 43
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar((((($context["current"] ?? null) == $context["key"])) ? (t("Current page")) : (t("Page")))));
                echo "
            </span>";
                // line 45
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 45, $this->source), "html", null, true));
                // line 46
                echo "</a>
        </li>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['item'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 49
            echo "      ";
            // line 50
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["ellipses"] ?? null), "next", [], "any", false, false, true, 50)) {
                // line 51
                echo "        <li class=\"pager__item pager__item--ellipsis\" role=\"presentation\">&hellip;</li>
      ";
            }
            // line 53
            echo "      ";
            // line 54
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 54)) {
                // line 55
                echo "        <li class=\"pager__item pager__item--next\">
          <a href=\"";
                // line 56
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 56), "href", [], "any", false, false, true, 56), 56, $this->source), "html", null, true));
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to next page")));
                echo "\" rel=\"next\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, false, true, 56), "attributes", [], "any", false, false, true, 56), 56, $this->source), "href", "title", "rel"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 57
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Next page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 58
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 58), "text", [], "any", true, true, true, 58)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "next", [], "any", false, true, true, 58), "text", [], "any", false, false, true, 58), 58, $this->source), t("Next ›"))) : (t("Next ›"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 62
            echo "      ";
            // line 63
            echo "      ";
            if (twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 63)) {
                // line 64
                echo "        <li class=\"pager__item pager__item--last\">
          <a href=\"";
                // line 65
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 65), "href", [], "any", false, false, true, 65), 65, $this->source), "html", null, true));
                echo "\" title=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Go to last page")));
                echo "\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->extensions['Drupal\flag\TwigExtension\FlagCount']->withoutFilter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, false, true, 65), "attributes", [], "any", false, false, true, 65), 65, $this->source), "href", "title"), "html", null, true));
                echo ">
            <span class=\"visually-hidden\">";
                // line 66
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Last page")));
                echo "</span>
            <span aria-hidden=\"true\">";
                // line 67
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, ((twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 67), "text", [], "any", true, true, true, 67)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["items"] ?? null), "last", [], "any", false, true, true, 67), "text", [], "any", false, false, true, 67), 67, $this->source), t("Last »"))) : (t("Last »"))), "html", null, true));
                echo "</span>
          </a>
        </li>
      ";
            }
            // line 71
            echo "    </ul>
  </nav>
";
        }
    }

    public function getTemplateName()
    {
        return "themes/wosh/templates/navigation/pager.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  223 => 71,  216 => 67,  212 => 66,  204 => 65,  201 => 64,  198 => 63,  196 => 62,  189 => 58,  185 => 57,  177 => 56,  174 => 55,  171 => 54,  169 => 53,  165 => 51,  162 => 50,  160 => 49,  152 => 46,  150 => 45,  146 => 43,  136 => 41,  133 => 40,  130 => 39,  127 => 38,  124 => 37,  122 => 36,  117 => 35,  112 => 34,  110 => 33,  106 => 31,  103 => 30,  101 => 29,  94 => 25,  90 => 24,  82 => 23,  79 => 22,  76 => 21,  74 => 20,  67 => 16,  63 => 15,  55 => 14,  52 => 13,  49 => 12,  44 => 9,  41 => 8,  39 => 7,);
    }

    public function getSourceContext()
    {
        return new Source("", "themes/wosh/templates/navigation/pager.html.twig", "/var/www/html/test.karessme.com/themes/wosh/templates/navigation/pager.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 7, "for" => 34, "set" => 37);
        static $filters = array("t" => 9, "escape" => 14, "without" => 14, "default" => 16);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'set'],
                ['t', 'escape', 'without', 'default'],
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
