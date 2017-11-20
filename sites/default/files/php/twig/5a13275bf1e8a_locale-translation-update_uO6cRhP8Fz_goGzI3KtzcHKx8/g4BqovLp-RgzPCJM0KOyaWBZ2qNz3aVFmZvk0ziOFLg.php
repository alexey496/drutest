<?php

/* core/themes/stable/templates/admin/locale-translation-update-info.html.twig */
class __TwigTemplate_41cdbf6cc9336a3e94b8c4fc4c5b70af4a6fd59ae6ee6315402246d1e7fa4dee extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $tags = array("if" => 18, "set" => 19, "trans" => 20, "for" => 34);
        $filters = array("safe_join" => 19, "length" => 25, "format_date" => 35, "t" => 45, "default" => 50);
        $functions = array();

        try {
            $this->env->getExtension('Twig_Extension_Sandbox')->checkSecurity(
                array('if', 'set', 'trans', 'for'),
                array('safe_join', 'length', 'format_date', 't', 'default'),
                array()
            );
        } catch (Twig_Sandbox_SecurityError $e) {
            $e->setSourceContext($this->getSourceContext());

            if ($e instanceof Twig_Sandbox_SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof Twig_Sandbox_SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

        // line 16
        echo "<div class=\"locale-translation-update__wrapper\" tabindex=\"0\" role=\"button\">
  <span class=\"locale-translation-update__prefix visually-hidden\">Show description</span>
  ";
        // line 18
        if (($context["modules"] ?? null)) {
            // line 19
            echo "    ";
            $context["module_list"] = $this->env->getExtension('Drupal\Core\Template\TwigExtension')->safeJoin($this->env, ($context["modules"] ?? null), ", ");
            // line 20
            echo "    <span class=\"locale-translation-update__message\">";
            echo t("Updates for: @module_list", array("@module_list" => ($context["module_list"] ?? null), ));
            echo "</span>
  ";
        } elseif (        // line 21
($context["not_found"] ?? null)) {
            // line 22
            echo "    <span class=\"locale-translation-update__message\">";
            // line 23
            echo \Drupal::translation()->formatPlural(abs(twig_length_filter($this->env,             // line 25
($context["not_found"] ?? null))), "Missing translations for one project", "Missing translations for @count projects", array());
            // line 28
            echo "</span>
  ";
        }
        // line 30
        echo "  ";
        if ((($context["updates"] ?? null) || ($context["not_found"] ?? null))) {
            // line 31
            echo "    <div class=\"locale-translation-update__details\">
      ";
            // line 32
            if (($context["updates"] ?? null)) {
                // line 33
                echo "        <ul>
          ";
                // line 34
                $context['_parent'] = $context;
                $context['_seq'] = twig_ensure_traversable(($context["updates"] ?? null));
                foreach ($context['_seq'] as $context["_key"] => $context["update"]) {
                    // line 35
                    echo "            <li>";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["update"], "name", array()), "html", null, true));
                    echo " (";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, call_user_func_array($this->env->getFilter('format_date')->getCallable(), array($this->getAttribute($context["update"], "timestamp", array()), "html_date")), "html", null, true));
                    echo ")</li>
          ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_iterated'], $context['_key'], $context['update'], $context['_parent'], $context['loop']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 37
                echo "        </ul>
      ";
            }
            // line 39
            echo "      ";
            if (($context["not_found"] ?? null)) {
                // line 40
                echo "        ";
                // line 44
                echo "        ";
                if (($context["updates"] ?? null)) {
                    // line 45
                    echo "          ";
                    echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->renderVar(t("Missing translations for:")));
                    echo "
        ";
                }
                // line 47
                echo "        ";
                if (($context["not_found"] ?? null)) {
                    // line 48
                    echo "          <ul>
            ";
                    // line 49
                    $context['_parent'] = $context;
                    $context['_seq'] = twig_ensure_traversable(($context["not_found"] ?? null));
                    foreach ($context['_seq'] as $context["_key"] => $context["update"]) {
                        // line 50
                        echo "              <li>";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["update"], "name", array()), "html", null, true));
                        echo " (";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, (($this->getAttribute($context["update"], "version", array(), "any", true, true)) ? (_twig_default_filter($this->getAttribute($context["update"], "version", array()), t("no version"))) : (t("no version"))), "html", null, true));
                        echo "). ";
                        echo $this->env->getExtension('Twig_Extension_Sandbox')->ensureToStringAllowed($this->env->getExtension('Drupal\Core\Template\TwigExtension')->escapeFilter($this->env, $this->getAttribute($context["update"], "info", array()), "html", null, true));
                        echo "</li>
            ";
                    }
                    $_parent = $context['_parent'];
                    unset($context['_seq'], $context['_iterated'], $context['_key'], $context['update'], $context['_parent'], $context['loop']);
                    $context = array_intersect_key($context, $_parent) + $_parent;
                    // line 52
                    echo "          </ul>
        ";
                }
                // line 54
                echo "      ";
            }
            // line 55
            echo "    </div>
  ";
        }
        // line 57
        echo "</div>
";
    }

    public function getTemplateName()
    {
        return "core/themes/stable/templates/admin/locale-translation-update-info.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  146 => 57,  142 => 55,  139 => 54,  135 => 52,  122 => 50,  118 => 49,  115 => 48,  112 => 47,  106 => 45,  103 => 44,  101 => 40,  98 => 39,  94 => 37,  83 => 35,  79 => 34,  76 => 33,  74 => 32,  71 => 31,  68 => 30,  64 => 28,  62 => 25,  61 => 23,  59 => 22,  57 => 21,  52 => 20,  49 => 19,  47 => 18,  43 => 16,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("", "core/themes/stable/templates/admin/locale-translation-update-info.html.twig", "/var/www/drutest/core/themes/stable/templates/admin/locale-translation-update-info.html.twig");
    }
}
