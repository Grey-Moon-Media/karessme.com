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

/* modules/contrib/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig */
class __TwigTemplate_cb7881da24fb8c40f5631267cb70d05f0c393b71de3c11d7af64b7570a83eead extends \Twig\Template
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
        // line 16
        echo "
<div class=\"bootstrap-basic-image-gallery\">

  <div class=\"main-image\" data-toggle=\"modal\" data-slide-to=\"0\" data-target=\"#";
        // line 19
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "id", [], "any", false, false, true, 19), 19, $this->source), "html", null, true));
        echo "\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["main"] ?? null), 19, $this->source), "html", null, true));
        echo "</div>

  ";
        // line 21
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "images", [], "any", false, false, true, 21)) > 1)) {
            // line 22
            echo "    <div class=\"thumbnails\">
      ";
            // line 23
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "images", [], "any", false, false, true, 23));
            foreach ($context['_seq'] as $context["key"] => $context["image"]) {
                // line 24
                echo "        <div class=\"thumb ";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "class", [], "any", false, false, true, 24), 24, $this->source), "html", null, true));
                echo "\" style=\"width:";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "width", [], "any", false, false, true, 24), 24, $this->source), "html", null, true));
                echo "%;\" data-toggle=\"modal\" data-slide-to=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 24, $this->source), "html", null, true));
                echo "\" data-target=\"#";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "id", [], "any", false, false, true, 24), 24, $this->source), "html", null, true));
                echo "\">
          ";
                // line 25
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["image"], 25, $this->source), "html", null, true));
                echo "
        </div>
      ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['key'], $context['image'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 28
            echo "    </div>
  ";
        }
        // line 30
        echo "
  <div class=\"modal fade carousel slide ";
        // line 31
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lazyload"] ?? null), 31, $this->source), "html", null, true));
        echo "\" id=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "id", [], "any", false, false, true, 31), 31, $this->source), "html", null, true));
        echo "\" tabindex=\"-1\" role=\"dialog\" aria-labelledby=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "id", [], "any", false, false, true, 31), 31, $this->source), "html", null, true));
        echo "-title\" aria-hidden=\"true\">
    <div class=\"modal-dialog\" role=\"document\">
      <div class=\"modal-content\">
        <div class=\"modal-header\">
          <h5 class=\"modal-title\" id=\"";
        // line 35
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "id", [], "any", false, false, true, 35), 35, $this->source), "html", null, true));
        echo "-title\">";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["modal"] ?? null), "label", [], "any", false, false, true, 35), 35, $this->source), "html", null, true));
        echo "</h5>
          <button class=\"close btn btn-default\" data-dismiss=\"modal\" value=\"&times;\"><span aria-hidden=\"true\">×</span></button>
        </div>

        <div class=\"modal-body\">
          <div id=\"";
        // line 40
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "id", [], "any", false, false, true, 40), 40, $this->source), "html", null, true));
        echo "\" class=\"carousel slide ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["lazyload"] ?? null), 40, $this->source), "html", null, true));
        echo "\" data-interval=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "interval", [], "any", false, false, true, 40), 40, $this->source), "html", null, true));
        echo "\" data-ride=\"";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "autoplay", [], "any", false, false, true, 40), 40, $this->source), "html", null, true));
        echo "\">

            <div class=\"carousel-inner\" role=\"listbox\">
              ";
        // line 43
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "images", [], "any", false, false, true, 43));
        $context['loop'] = [
          'parent' => $context['_parent'],
          'index0' => 0,
          'index'  => 1,
          'first'  => true,
        ];
        if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
            $length = count($context['_seq']);
            $context['loop']['revindex0'] = $length - 1;
            $context['loop']['revindex'] = $length;
            $context['loop']['length'] = $length;
            $context['loop']['last'] = 1 === $length;
        }
        foreach ($context['_seq'] as $context["key"] => $context["carousel_image"]) {
            // line 44
            echo "                <div class=\"item slide-";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["key"], 44, $this->source), "html", null, true));
            echo " ";
            if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 44)) {
                echo "active";
            }
            echo "\">
                  ";
            // line 45
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["carousel_image"], 45, $this->source), "html", null, true));
            echo "
                  <div class=\"carousel-caption\">";
            // line 46
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, $context["carousel_image"], "#caption", [], "any", false, false, true, 46), 46, $this->source), "html", null, true));
            echo "</div>
                </div>
              ";
            ++$context['loop']['index0'];
            ++$context['loop']['index'];
            $context['loop']['first'] = false;
            if (isset($context['loop']['length'])) {
                --$context['loop']['revindex0'];
                --$context['loop']['revindex'];
                $context['loop']['last'] = 0 === $context['loop']['revindex0'];
            }
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['key'], $context['carousel_image'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 49
        echo "
              ";
        // line 50
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "images", [], "any", false, false, true, 50)) > 1)) {
            // line 51
            echo "              <a class=\"left carousel-control\" href=\"#";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "id", [], "any", false, false, true, 51), 51, $this->source), "html", null, true));
            echo "\" role=\"button\" data-slide=\"prev\">
                <span class=\"icon-prev\"></span>
                <span class=\"sr-only\">";
            // line 53
            echo t("Previous", array());
            echo "</span>
              </a>
              <a class=\"right carousel-control\" href=\"#";
            // line 55
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "id", [], "any", false, false, true, 55), 55, $this->source), "html", null, true));
            echo "\" role=\"button\" data-slide=\"next\">
                <span class=\"icon-next\"></span>
                <span class=\"sr-only\">";
            // line 57
            echo t("Next", array());
            echo "</span>
              </a>
              ";
        }
        // line 60
        echo "            </div>

            ";
        // line 62
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["thumbnails"] ?? null), "images", [], "any", false, false, true, 62)) > 1)) {
            // line 63
            echo "            <ol class=\"carousel-indicators\">
              ";
            // line 64
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(range(0, (twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "images", [], "any", false, false, true, 64)) - 1)));
            $context['loop'] = [
              'parent' => $context['_parent'],
              'index0' => 0,
              'index'  => 1,
              'first'  => true,
            ];
            if (is_array($context['_seq']) || (is_object($context['_seq']) && $context['_seq'] instanceof \Countable)) {
                $length = count($context['_seq']);
                $context['loop']['revindex0'] = $length - 1;
                $context['loop']['revindex'] = $length;
                $context['loop']['length'] = $length;
                $context['loop']['last'] = 1 === $length;
            }
            foreach ($context['_seq'] as $context["_key"] => $context["index"]) {
                // line 65
                echo "                <li data-target=\"#";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["carousel"] ?? null), "id", [], "any", false, false, true, 65), 65, $this->source), "html", null, true));
                echo "\" data-slide-to=\"";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed($context["index"], 65, $this->source), "html", null, true));
                echo "\" class=\"";
                if (twig_get_attribute($this->env, $this->source, $context["loop"], "first", [], "any", false, false, true, 65)) {
                    echo "active";
                }
                echo "\"></li>
              ";
                ++$context['loop']['index0'];
                ++$context['loop']['index'];
                $context['loop']['first'] = false;
                if (isset($context['loop']['length'])) {
                    --$context['loop']['revindex0'];
                    --$context['loop']['revindex'];
                    $context['loop']['last'] = 0 === $context['loop']['revindex0'];
                }
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['index'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 67
            echo "            </ol>
            ";
        }
        // line 69
        echo "
          </div>
        </div>

        <div class=\"modal-footer\">
          <button class=\"btn btn-secondary\" data-dismiss=\"modal\" value=\"Close\">";
        // line 74
        echo t("Close", array());
        echo "</button>
        </div>
      </div>
    </div>
  </div>

</div>
";
    }

    public function getTemplateName()
    {
        return "modules/contrib/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  254 => 74,  247 => 69,  243 => 67,  220 => 65,  203 => 64,  200 => 63,  198 => 62,  194 => 60,  188 => 57,  183 => 55,  178 => 53,  172 => 51,  170 => 50,  167 => 49,  150 => 46,  146 => 45,  137 => 44,  120 => 43,  108 => 40,  98 => 35,  87 => 31,  84 => 30,  80 => 28,  71 => 25,  60 => 24,  56 => 23,  53 => 22,  51 => 21,  44 => 19,  39 => 16,);
    }

    public function getSourceContext()
    {
        return new Source("", "modules/contrib/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig", "/var/www/html/test.karessme.com/modules/contrib/bootstrap_basic_image_gallery/templates/bootstrap-basic-image-gallery.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 21, "for" => 23, "trans" => 53);
        static $filters = array("escape" => 19, "length" => 21);
        static $functions = array("range" => 64);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'for', 'trans'],
                ['escape', 'length'],
                ['range']
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
