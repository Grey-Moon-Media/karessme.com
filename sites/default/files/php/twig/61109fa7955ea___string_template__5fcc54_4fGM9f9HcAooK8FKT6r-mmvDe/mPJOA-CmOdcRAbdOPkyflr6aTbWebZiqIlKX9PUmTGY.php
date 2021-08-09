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

/* __string_template__5fcc54d7f4081741e77f5c44dafbd849aa5d8807521fc34f01924020a73f77cb */
class __TwigTemplate_adcb9c05171b77df40f6e1fd46db95b8b49bc459d76910840c95619a64cb38e5 extends \Twig\Template
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
        echo "<div class=\"blog-post-teaser\">
<div class=\"post-thumb\">
";
        // line 3
        if ((($context["field_blog_format"] ?? null) == "standard")) {
            // line 4
            echo "\t";
            if ($this->extensions['Drupal\flag\TwigExtension\FlagCount']->renderVar(($context["field_image"] ?? null))) {
                // line 5
                echo "\t\t<div class=\"post-image\">";
                echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image"] ?? null), 5, $this->source), "html", null, true));
                echo "</div>
\t";
            }
            // line 6
            echo "\t
";
        } elseif ((        // line 7
($context["field_blog_format"] ?? null) == "slider")) {
            // line 8
            echo "     <div class=\"post-image\">
        <div class=\"slide-carousel owl-carousel\" data-nav=\"true\" data-items=\"1\" data-dots=\"true\" data-autoplay=\"true\" data-loop=\"true\">
          ";
            // line 10
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_image_1"] ?? null), 10, $this->source), "html", null, true));
            echo "
        </div>
     </div>
";
        } elseif ((        // line 13
($context["field_blog_format"] ?? null) == "video")) {
            // line 14
            echo "\t<div class=\"entry-video video\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_video"] ?? null), 14, $this->source), "html", null, true));
            echo "</div>
";
        }
        // line 16
        echo "</div>
<div class=\"post-content-wrap\">
<div class=\"content-wrap\">
<div class=\"post-meta\">
<div class=\"post-meta-item post-date\"><i class=\"ion-ios-clock-outline\"></i> ";
        // line 20
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["created"] ?? null), 20, $this->source), "html", null, true));
        echo "</div>
<div class=\"post-meta-item post-comment\"><i class=\"ion-ios-chatboxes-outline\"></i> ";
        // line 21
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["comment_count"] ?? null), 21, $this->source), "html", null, true));
        echo "</div>
</div>
<div class=\"post-content\">
<div class=\"post-title-wrap\"><h5 class=\"post-title\">";
        // line 24
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["title"] ?? null), 24, $this->source), "html", null, true));
        echo "</h5></div>
<div class=\"post-meta-item post-category text-uppercase text-sm\">";
        // line 25
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\flag\TwigExtension\FlagCount']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["field_category"] ?? null), 25, $this->source), "html", null, true));
        echo "</div>
</div>
</div>
</div>
</div>";
    }

    public function getTemplateName()
    {
        return "__string_template__5fcc54d7f4081741e77f5c44dafbd849aa5d8807521fc34f01924020a73f77cb";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 25,  93 => 24,  87 => 21,  83 => 20,  77 => 16,  71 => 14,  69 => 13,  63 => 10,  59 => 8,  57 => 7,  54 => 6,  48 => 5,  45 => 4,  43 => 3,  39 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "__string_template__5fcc54d7f4081741e77f5c44dafbd849aa5d8807521fc34f01924020a73f77cb", "");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3);
        static $filters = array("render" => 4, "escape" => 5);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if'],
                ['render', 'escape'],
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
