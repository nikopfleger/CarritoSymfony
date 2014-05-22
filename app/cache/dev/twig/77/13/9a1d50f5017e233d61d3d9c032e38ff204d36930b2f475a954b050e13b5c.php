<?php

/* CarritoBundle:Carrito:index.html.twig */
class __TwigTemplate_77139a1d50f5017e233d61d3d9c032e38ff204d36930b2f475a954b050e13b5c extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("CarritoBundle:Carrito:layout.html.twig");

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'titulo' => array($this, 'block_titulo'),
            'body' => array($this, 'block_body'),
            'javascript' => array($this, 'block_javascript'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "CarritoBundle:Carrito:layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 5
    public function block_head($context, array $blocks = array())
    {
        // line 6
        echo "
";
        // line 7
        $this->displayBlock('titulo', $context, $blocks);
    }

    public function block_titulo($context, array $blocks = array())
    {
        // line 8
        echo "<title>Bienvenido</title>
";
    }

    // line 15
    public function block_body($context, array $blocks = array())
    {
        // line 16
        echo "<br>
";
        // line 17
        if (((isset($context["ERROR"]) ? $context["ERROR"] : $this->getContext($context, "ERROR")) == "SI")) {
            // line 18
            echo "<p class=\"bg-warning errorLogin\"><b>DATOS INCORRECTOS</b></p>
";
        }
        // line 20
        echo "\t<br>
\t<h2 style=\"text-align:center\">Bienvenido</h2>
\t<br>
\t<form class=\"form-inline\" action=\"";
        // line 23
        echo $this->env->getExtension('routing')->getPath("index_validarLogin");
        echo "\" method=\"POST\" style=\"text-align:center\">
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputEmail2\">Email address</label>
    <input type=\"text\" class=\"form-control\" id=\"user\" name=\"user\" placeholder=\"Ingresar usuario.\">
  </div>
  <br><br>
  <div class=\"form-group\">
    <label class=\"sr-only\" for=\"exampleInputPassword2\">Password</label>
    <input type=\"password\" class=\"form-control\" id=\"pass\" name=\"pass\" placeholder=\"Ingresar clave.\">
  </div>
  <br><br>
  <button type=\"submit\" class=\"btn btn-success\" id=\"btnConfirmar\">Ingresar</button>
</form>

";
    }

    // line 39
    public function block_javascript($context, array $blocks = array())
    {
        // line 40
        echo "
<script src=\" ";
        // line 41
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/login.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\$(document).ready(function(e) {
\tvar unLogin = new Login();
\tunLogin.urlLogin = \"";
        // line 45
        echo $this->env->getExtension('routing')->getPath("index_validarLogin");
        echo "\"
\tunLogin.init();
});

</script>


";
    }

    public function getTemplateName()
    {
        return "CarritoBundle:Carrito:index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  97 => 45,  90 => 41,  87 => 40,  84 => 39,  65 => 23,  60 => 20,  56 => 18,  54 => 17,  51 => 16,  48 => 15,  43 => 8,  37 => 7,  34 => 6,  31 => 5,);
    }
}
