<?php

namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Carrito\Bundle\Entity2\ArticuloDAO;
use Carrito\Bundle\Entity2\Carrito;
use Carrito\Bundle\Entity2\UsuarioDAO;
use Carrito\Bundle\Entity2\Usuario;
use Carrito\Bundle\Entity\Articulo;
use Carrito\Bundle\Entity2\ArticuloCarrito;
use Carrito\Bundle\Entity\Serializador;
 
 class ABMController extends Controller {
 	/**
 	 * @Route("/indexABM", name="ABM_indexABM")
 	 * @Template()
 	 */
 	
 	public function indexABMAction()
 	{
 		$peticion = Request::createFromGlobals();
 		$session = $this->getRequest()->getSession();
 		$em = $this->getDoctrine()->getManager();
 		$serializador = $this->get("Serializador");
 		return $this->render(
 				"CarritoBundle:Carrito:abmcatalogo.html.twig",
 				array(
 				"tablaArt" => $serializador->toJson($em->getRepository("CarritoBundle:Articulo")->findAll())
 				)
 		 ); 	
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
 		$articulo = new Articulo();
 		$id = $peticion->request->get("id");
 		$nombre = $peticion->request->get("nombre");
 		$precio = $peticion->request->get("precio");
 		$cantidad = $peticion->request->get("cantidad");
 		$articulo->setId($id);
 		$articulo->setNombre($nombre);
 		$articulo->setPrecio($precio);
 		$articulo->setCantidad($cantidad);
 		
 		
 		
 		$em = $this->getDoctrine()->getManager();
 		$lastID = $em->createQuery('SELECT MAX(p.id) FROM CarritoBundle:Articulo p')->getSingleResult();
	
 		
 		if ($id == "")
 		{
 			$em->persist($articulo);
 			$array = array("id" => $lastID[1] + 1,"newID" => true);
 		}
 		else
 		{
 			$artEditado = $em->getRepository("CarritoBundle:Articulo")->findOneById($id);
 			$artEditado->setNombre($nombre);
 			$artEditado->setPrecio($precio);
 			$artEditado->setCantidad($cantidad);
 			$array = array("id" => $id,"newID" => false);
 		} 		
 		$em->flush();
 		return new JsonResponse($array);
 	}
 	
 	/**
 	 * @Route("/eliminarCatalogo", name="abm_eliminar_catalogo")
 	 * 
 	 * 
 	 */
 	public function eliminarCatalogoAction() {
 		$peticion = Request::createFromGlobals();
 		$id = $peticion->request->get("id");
 		$em = $this->getDoctrine()->getManager();
 		$archivo = $em->getRepository("CarritoBundle:Articulo")->findOneById($id);
 		$em->remove($archivo);
 		$em->flush();
 		return new Response("");
 	}
 	
 	/**
 	 * @Route("/cerrarSesionABM", name="abm_cerrar_sesion")
 	 * @Template()
 	 */
 	public function cerrarSesionAction() {
 		$session = $this->getRequest()->getSession();
 	    $session->invalidate();
 		return $this->forward("CarritoBundle:index:index");
 	}
 	
 	
 }
