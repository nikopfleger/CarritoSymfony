<?php

/* CarritoBundle:Carrito:home.html.twig */
class __TwigTemplate_a1ca84ef51bad8aeeed228fb02c6de78d631fecd79b2c2013d5b83e1e61fbc6b extends Twig_Template
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
        echo "<nav class=\"navbar navbar-inverse navbar-fixed-top\" role=\"navigation\" id=\"navBarHome\">
    \t <div class=\"container-fluid\">
     \t\t<div class=\"navbar-header\">
     
          <div class=\"collapse navbar-collapse\" id=\"bs-example-navbar-collapse-1\">
      <ul class=\"nav navbar-nav\">
        <li class=\"active\"><a href=\"#\">Catalogo</a></li>
        <li><a href=\"../Controllers/cargarABMController.php\" id=\"accesoABM\">ABM</a></li>
        </ul>
    </div>
  </div>
  </div>
  </nav>


";
        // line 18
        $this->displayBlock('titulo', $context, $blocks);
    }

    public function block_titulo($context, array $blocks = array())
    {
        // line 19
        echo "<title> Bienvenido a su carrito </title>
";
    }

    // line 23
    public function block_body($context, array $blocks = array())
    {
        // line 24
        echo "<div class=\"bordeCarrito\">
\t\t<i class=\"fa fa-shopping-cart\"></i> Carrito de <?php echo \$nombre;?>
\t\t<table id=\"Carrito\" class=\"elCarrito table table-hover table-condensed\">
\t\t<thead>
\t\t\t<tr>
\t\t\t<th>Articulo</th>
\t\t\t<th>Cantidad</th>
\t\t\t<th>Precio</th>
\t\t\t<th>Total</th> <!--link-->
\t\t \t</tr>
\t\t</thead>
<td class='total' colspan='4'>0</tr>

</table>
\t\t 
</div>
<br>
<br>
<div class=\"catalogo\">
\t<div style=\"text-align:left; font-size:18\"> CATALOGO</div> 
\t\t<table id=\"Catalogo\" class=\"table table-hover table-condensed\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>Nombre</th>
\t\t\t\t\t<th>Precio</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t\t
\t\t</table>
\t\t
\t<ul class=\"pagination\">
\t\t<li><a href=\"#\" id=\"primeraPagina\">&laquo;</a></li>\t
\t</ul>
</div>

";
    }

    // line 61
    public function block_javascript($context, array $blocks = array())
    {
        // line 62
        echo "

";
    }

    public function getTemplateName()
    {
        return "CarritoBundle:Carrito:home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  107 => 62,  104 => 61,  65 => 24,  62 => 23,  57 => 19,  51 => 18,  34 => 3,  31 => 2,);
    }
}
