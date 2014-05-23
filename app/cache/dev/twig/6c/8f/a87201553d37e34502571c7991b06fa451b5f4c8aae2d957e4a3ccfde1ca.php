<?php

/* CarritoBundle:Carrito:abmcatalogo.html.twig */
class __TwigTemplate_6c8fa87201553d37e34502571c7991b06fa451b5f4c8aae2d957e4a3ccfde1ca extends Twig_Template
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

    // line 2
    public function block_head($context, array $blocks = array())
    {
        // line 3
        echo "   <nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\">
    \t <div class=\"container-fluid\">
     \t\t<div class=\"navbar-header\">
     
          <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
      <ul class=\"nav navbar-nav\">
        <li><a href=\"";
        // line 9
        echo $this->env->getExtension('routing')->getPath("abm_cargar_catalogo");
        echo "\">Catalogo</a></li>
        <li class=\"active\"><a href=\"#\">ABM</a></li> 
        <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("abm_cerrar_sesion");
        echo "\">Cerrar Sesion</a>

        </ul>
    </div>
  </div>
  </div> 
  </nav>


";
        // line 20
        $this->displayBlock('titulo', $context, $blocks);
    }

    public function block_titulo($context, array $blocks = array())
    {
        // line 21
        echo "<title> ABM Catalogo </title>
";
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "
<div class=\"formulario\">
<input type=\"hidden\" id=\"idArticulo\" value=\"\">
<input type=\"text\" class=\"form-control\" id=\"nombreArticulo\" placeholder=\"Ingresar articulo.\"><br>
<input type=\"number\" class=\"form-control\"  id=\"precioArticulo\" placeholder=\"Ingresar precio.\" min=0><br>
<input type=\"number\" class=\"form-control\"  id=\"cantidad\" placeholder=\"Ingresar cantidad.\" min=0><br>
<button type=\"submit\" class=\"btn btn-success\" id=\"btnNuevo\">Nuevo articulo</button>
<button type=\"submit\" class=\"btn btn-success\" id=\"btnGuardar\">Guardar</button>
</div>

<div class=\"divABM\">
<table id=\"abmCatalogo\" class=\"tablaABM\">
<thead>
<tr>
<th>id</th>
<th>Nombre</th>
<th>Precio</th>
<th>Cantidad</th>
<th>Acciones</th>
</tr>
</thead>
<tbody>

";
    }

    // line 51
    public function block_javascript($context, array $blocks = array())
    {
        // line 52
        echo "<script src=\" ";
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/abm.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\t\$(document).ready(function(e) {

\t\tvar unABM = new ABM();
\t\tunABM.table = ";
        // line 57
        echo (isset($context["tablaArt"]) ? $context["tablaArt"] : $this->getContext($context, "tablaArt"));
        echo " ;
\t\tunABM.row = \"\";
\t\tunABM.oTable = null;
\t\tunABM.url.actualizar = \"";
        // line 60
        echo $this->env->getExtension('routing')->getPath("abm_actualizar_catalogo");
        echo "\";
\t\tunABM.url.eliminar = \"";
        // line 61
        echo $this->env->getExtension('routing')->getPath("abm_eliminar_catalogo");
        echo "\";
\t\tunABM.init();

\t});
</script>
";
    }

    public function getTemplateName()
    {
        return "CarritoBundle:Carrito:abmcatalogo.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  122 => 61,  118 => 60,  112 => 57,  103 => 52,  100 => 51,  73 => 26,  70 => 25,  65 => 21,  59 => 20,  47 => 11,  42 => 9,  34 => 3,  31 => 2,);
    }
}
