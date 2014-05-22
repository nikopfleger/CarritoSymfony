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
\t\t<i class=\"fa fa-shopping-cart\"></i> Carrito de ";
        // line 25
        echo twig_escape_filter($this->env, (isset($context["user"]) ? $context["user"] : $this->getContext($context, "user")), "html", null, true);
        echo "
\t\t<table id=\"Carrito\" class=\"elCarrito table table-hover table-condensed\">
\t\t<thead>
\t\t\t<tr>
\t\t\t<th>Articulo</th>
\t\t\t<th>Cantidad</th>
\t\t\t<th>Precio</th>
\t\t\t<th>Total</th> <!--link-->
\t\t \t</tr>
\t\t</thead>
\t\t<td class='total' colspan='4'>0</tr>

</table>
\t\t 
</div>
<br>
<br>
<div class=\"catalogo\">
\t<div style=\"text-align:left; font-size:18\"> <b>CATALOGO</b></div> 
\t\t<table id=\"Catalogo\" class=\"table table-hover table-condensed\">
\t\t\t<thead>
\t\t\t\t<tr>
\t\t\t\t\t<th>Nombre</th>
\t\t\t\t\t<th>Precio</th>
\t\t\t\t</tr>
\t\t\t</thead>
\t\t";
        // line 51
        $context["i"] = 0;
        // line 52
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, ($this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "articulosXPagina") - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 53
            echo "\t\t\t";
            if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) < twig_length_filter($this->env, $this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "listadoArticulos")))) {
                // line 54
                echo "\t\t\t\t";
                $context["articulo"] = $this->getAttribute($this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "listadoArticulos"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), array(), "array");
                // line 55
                echo "\t\t\t\t<tr><td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "nombre"), "html", null, true);
                echo "</td>
\t\t\t\t<td>";
                // line 56
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "precioUnitario"), "html", null, true);
                echo "</td>
\t\t\t\t<td><a href='#' class='agregar'>Agregar</a>
\t\t\t\t<input type= 'hidden' name='id' value='";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "id"), "html", null, true);
                echo "'>
\t\t\t\t</td></tr>
\t\t\t";
            }
            // line 60
            echo "\t\t\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 62
        echo "\t\t</table>
\t\t
\t<ul class=\"pagination\">
\t\t<li><a href=\"#\" id=\"primeraPagina\">&laquo;</a></li>\t
\t\t";
        // line 66
        $context["j"] = 1;
        // line 67
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "numeroPaginas")));
        foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
            // line 68
            echo "\t\t <li><a href='#' class='pagina' id='";
            echo twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j")), "html", null, true);
            echo "'>";
            echo twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j")), "html", null, true);
            echo "</a></li>
\t\t ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 70
        echo "\t\t <li><a href='#' id='ultimaPagina' name='";
        echo twig_escape_filter($this->env, ((isset($context["j"]) ? $context["j"] : $this->getContext($context, "j")) - 1), "html", null, true);
        echo "'>&raquo;</a></li>\t\t\t
\t</ul>
</div>

";
    }

    // line 76
    public function block_javascript($context, array $blocks = array())
    {
        // line 77
        echo "



<script src=\" ";
        // line 81
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/home.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">
\t\tfunction parsearArrayArticulos(result) { 
\t\t\t var string = \"\";
\t\t\t\t\tfor (var i=0; i<result.articulos.length;i++)
\t\t\t\t\t{
\t\t\t\t\t\tstring = string + \"<tr><td>\" +
\t\t\t\t\t\tresult.articulos[i].nombre + 
\t\t\t\t\t\t\"</td><td>\" + result.articulos[i].precioUnitario +
\t\t\t\t\t\t\"</td><td><a href='#' class='agregar'>Agregar</a>\" + 
\t\t\t\t\t\t\"<input type='hidden' name='id' value='\" + 
\t\t\t\t\t\tresult.articulos[i].id + \"'> </td></tr>\";
\t\t\t\t\t}
\t\t\t\t\treturn string;
\t\t}
\t\t\$(document).ready(function(e) {
\t\t\t\tvar unHome = new Home();
\t\t\t\tunHome.urlCambiarPagina= \"";
        // line 98
        echo $this->env->getExtension('routing')->getPath("home_cambiarPagina");
        echo "\"
\t\t\t\tunHome.init();
// \t\t\t\turlAgregar:\"\",
// \t\t\t\turlEliminar:\"\",\t\t\t
\t\t});


</script>
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
        return array (  196 => 98,  176 => 81,  170 => 77,  167 => 76,  157 => 70,  146 => 68,  141 => 67,  139 => 66,  133 => 62,  126 => 60,  120 => 58,  115 => 56,  110 => 55,  107 => 54,  104 => 53,  99 => 52,  97 => 51,  68 => 25,  65 => 24,  62 => 23,  57 => 19,  51 => 18,  34 => 3,  31 => 2,);
    }
}
