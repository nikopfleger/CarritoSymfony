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
        <li><a href=\"";
        // line 10
        echo $this->env->getExtension('routing')->getPath("home_cargar_ABM");
        echo "\" id=\"accesoABM\">ABM</a></li>
        <li><a href=\"";
        // line 11
        echo $this->env->getExtension('routing')->getPath("home_cerrar_sesion");
        echo "\">Cerrar Sesion</a>
        </div>
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
        echo "<title> Bienvenido a su carrito </title>
";
    }

    // line 25
    public function block_body($context, array $blocks = array())
    {
        // line 26
        echo "<div class=\"bordeCarrito\">
\t\t<i class=\"fa fa-shopping-cart\"></i> Carrito de ";
        // line 27
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
        // line 53
        $context["i"] = 0;
        // line 54
        echo "\t\t";
        $context['_parent'] = (array) $context;
        $context['_seq'] = twig_ensure_traversable(range(0, ($this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "articulosXPagina") - 1)));
        foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
            // line 55
            echo "\t\t\t";
            if (((isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")) < twig_length_filter($this->env, $this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "listadoArticulos")))) {
                // line 56
                echo "\t\t\t\t";
                $context["articulo"] = $this->getAttribute($this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "listadoArticulos"), (isset($context["i"]) ? $context["i"] : $this->getContext($context, "i")), array(), "array");
                // line 57
                echo "\t\t\t\t<tr><td>";
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "nombre"), "html", null, true);
                echo "</td>
\t\t\t\t<td>";
                // line 58
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "precioUnitario"), "html", null, true);
                echo "</td>
\t\t\t\t<td><a href='#' class='agregar'>Agregar</a>
\t\t\t\t<input type= 'hidden' name='id' value='";
                // line 60
                echo twig_escape_filter($this->env, $this->getAttribute((isset($context["articulo"]) ? $context["articulo"] : $this->getContext($context, "articulo")), "id"), "html", null, true);
                echo "'>
\t\t\t\t</td></tr>
\t\t\t";
            }
            // line 62
            echo "\t\t\t
\t\t";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['i'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 64
        echo "\t\t</table>
\t\t
\t<ul class=\"pagination\">
\t\t<li><a href=\"#\" id=\"primeraPagina\">&laquo;</a></li>\t
\t\t";
        // line 68
        $context["j"] = 1;
        // line 69
        echo "\t\t";
        $context["a"] = (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j"));
        // line 70
        echo "\t\t";
        if (($this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "numeroPaginas") > 0)) {
            // line 71
            echo "\t\t";
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable(range(1, $this->getAttribute((isset($context["articuloDAO"]) ? $context["articuloDAO"] : $this->getContext($context, "articuloDAO")), "numeroPaginas")));
            foreach ($context['_seq'] as $context["_key"] => $context["j"]) {
                // line 72
                echo "\t\t <li><a href='#' class='pagina' id='";
                echo twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j")), "html", null, true);
                echo "'>";
                echo twig_escape_filter($this->env, (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j")), "html", null, true);
                echo "</a></li>
\t\t ";
                // line 73
                $context["a"] = (isset($context["j"]) ? $context["j"] : $this->getContext($context, "j"));
                // line 74
                echo "\t\t ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['j'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 75
            echo "\t\t ";
        }
        // line 76
        echo "\t\t <li><a href='#' id='ultimaPagina' name='";
        echo twig_escape_filter($this->env, (isset($context["a"]) ? $context["a"] : $this->getContext($context, "a")), "html", null, true);
        echo "'>&raquo;</a></li>\t\t\t
\t</ul>
</div>

";
    }

    // line 82
    public function block_javascript($context, array $blocks = array())
    {
        // line 83
        echo "



<script src=\" ";
        // line 87
        echo twig_escape_filter($this->env, $this->env->getExtension('assets')->getAssetUrl("bundles/carrito/js/home.js"), "html", null, true);
        echo "\"></script>
<script type=\"text/javascript\">

\t\t\$(document).ready(function(e) {
\t\t\t\tvar unHome = new Home();
\t\t\t\tunHome.urlCambiarPagina= \"";
        // line 92
        echo $this->env->getExtension('routing')->getPath("home_cambiarPagina");
        echo "\";
\t\t\t\tunHome.urlAgregar= \" ";
        // line 93
        echo $this->env->getExtension('routing')->getPath("home_agregar_carrito");
        echo "\" ;
\t\t\t\tunHome.urlEliminar= \" ";
        // line 94
        echo $this->env->getExtension('routing')->getPath("home_eliminar_carrito");
        echo "\";
\t\t\t\tunHome.init();
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
        return array (  213 => 94,  209 => 93,  205 => 92,  197 => 87,  191 => 83,  188 => 82,  178 => 76,  175 => 75,  169 => 74,  167 => 73,  160 => 72,  155 => 71,  152 => 70,  149 => 69,  147 => 68,  141 => 64,  134 => 62,  128 => 60,  123 => 58,  118 => 57,  115 => 56,  112 => 55,  107 => 54,  105 => 53,  76 => 27,  73 => 26,  70 => 25,  65 => 21,  59 => 20,  47 => 11,  43 => 10,  34 => 3,  31 => 2,);
    }
}
