<?php

namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Carrito\Bundle\Entity2\ArticuloDAO;
use Carrito\Bundle\Entity2\Carrito;
use Carrito\Bundle\Entity2\UsuarioDAO;
use Carrito\Bundle\Entity2\Usuario;
use Carrito\Bundle\Entity2\Articulo;
use Carrito\Bundle\Entity2\ArticuloCarrito;
 
 class ABMController extends Controller {
 	/**
 	 * @Route("/indexABM", name="ABM_indexABM")
 	 * @Template()
 	 */
 	
 	public function indexABMAction()
 	{
 		$peticion = Request::createFromGlobals();
 		$session = $this->getRequest()->getSession();
 		return $this->render("CarritoBundle:Carrito:abmcatalogo.html.twig",array( "tablaArt" => json_encode($session->get("articuloDAO")->articulosToJson()) ) ); 	
 	}
 	
 	/**
 	 * @Route("/cargarCatalogo", name="abm_cargar_catalogo")
 	 * @Template()
 	 *  
 	 */
 	public function cargarCatalogoAction() {
 		return $this->forward("CarritoBundle:Home:home");
 	}
 	
 	/**
 	 * @Route("/actualizarCatalogo", name="abm_actualizar_catalogo")
 	 * 
 	 */
 	public function actualizarCatalogoAction() {
 		$peticion = Request::createFromGlobals();
 		$session = $this->getRequest()->getSession();
 		$articulo = new Articulo(
 			$peticion->request->get("id"),
 			$peticion->request->get("nombre"),
 			$peticion->request->get("precio"),
 			$peticion->request->get("cantidad")
 		);
 		return new JsonResponse($session->get("articuloDAO")->actualizarDAO($articulo));
 	}
 	
 	/**
 	 * @Route("/eliminarCatalogo", name="abm_eliminar_catalogo")
 	 * 
 	 * 
 	 */
 	public function eliminarCatalogoAction() {
 		$peticion = Request::createFromGlobals();
 		$session = $this->getRequest()->getSession();
 		$id = $peticion->request->get("id");
 		$rownum = $peticion->request->get("rownum");
 		$session->get("articuloDAO")->eliminarByID($id);
 		return new Response("");
 	}
 	
 }
