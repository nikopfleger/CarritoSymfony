<?php

/* CarritoBundle:Carrito:layout.html.twig */
class __TwigTemplate_2fc2ca3e89fd12455dd8aa127d52ebb135a4d6850d93d0871ab25e28a7797b46 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'header' => array($this, 'block_header'),
            'titulo' => array($this, 'block_titulo'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!DOCTYPE html>

<html>


<head>
";
        // line 7
        $this->displayBlock('head', $context, $blocks);
        // line 11
        echo "
";
        // line 12
        $this->displayBlock('header', $context, $blocks);
        // line 25
        echo "</head>
";
        // line 26
        $this->displayBlock('titulo', $context, $blocks);
        // line 29
        echo "




<body id=\"body\">
";
        // line 35
        $this->displayBlock('body', $context, $blocks);
        // line 40
        echo "
";
        // line 41
        $this->displayBlock('javascript', $context, $blocks);
        // line 44
        echo "</body>
</html>



";
    }

    // line 7
    public function block_head($context, array $blocks = array())
    {
        // line 8
        echo "

";
    }

    // line 12
    public function block_header($context, array $blocks = array())
    {
        // line 13
        echo "<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/css/bootstrap.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 14
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/bootstrap-theme.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 15
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/fontawesome/css/font-awesome.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 16
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/Estilo.css"), "html", null, true);
        echo "\"/>
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 17
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/DataTables/jquery.dataTables.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 18
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/DataTables/jquery.dataTables_themeroller.css"), "html", null, true);
        echo "\" />
<link rel=\"stylesheet\" type=\"text/css\" href=\" ";
        // line 19
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/CSS/jquery.ui/trontastic/jquery-ui-1.10.4.custom.css"), "html", null, true);
        echo "\" />

<script src=\" ";
        // line 21
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/jq.js"), "html", null, true);
        echo "\"></script>
<script src=\" ";
        // line 22
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/jquery.dataTables.js"), "html", null, true);
        echo "\"></script>
<script src=\" ";
        // line 23
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/jquery.ui/jquery-ui-1.10.4.custom.js"), "html", null, true);
        echo "\"></script>
";
    }

    // line 26
    public function block_titulo($context, array $blocks = array())
    {
        // line 27
        echo "
";
    }

    // line 35
    public function block_body($context, array $blocks = array())
    {
        // line 36
        echo "


";
    }

    // line 41
    public function block_javascript($context, array $blocks = array())
    {
        // line 42
        echo "
";
    }

    public function getTemplateName()
    {
        return "CarritoBundle:Carrito:layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  145 => 42,  142 => 41,  135 => 36,  132 => 35,  127 => 27,  124 => 26,  118 => 23,  114 => 22,  110 => 21,  105 => 19,  101 => 18,  97 => 17,  93 => 16,  80 => 13,  77 => 12,  71 => 8,  68 => 7,  59 => 44,  57 => 41,  54 => 40,  52 => 35,  44 => 29,  42 => 26,  39 => 25,  32 => 7,  24 => 1,  89 => 15,  85 => 14,  78 => 35,  75 => 34,  72 => 33,  48 => 13,  43 => 6,  37 => 12,  34 => 11,  31 => 3,);
    }
}
