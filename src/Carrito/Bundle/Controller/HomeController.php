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

class HomeController extends Controller {
	
/**
 * @Route("/home", name="_home")
 * @Template()
 */
	public function homeAction() {
		$session = $this->getRequest()->getSession();
		return $this->render("CarritoBundle:Carrito:home.html.twig",array("articuloDAO" => $session->get("articuloDAO"),"user" => $session->get("user")));
	}
	
	/**
	 * @Route("/cambiarPagina", name="home_cambiarPagina")
	 * 
	 * 
	 */
	public function cambiarPaginaAction () {
		$peticion = Request::createFromGlobals();
		$session = $this->getRequest()->getSession();
		$nroPagina = $peticion->request->get("pagina");
		return new JsonResponse($session->get("articuloDAO")->obtenerArrayArticulos($nroPagina));	
	}
	
	/**
	 * @Route("/agregarcarrito", name="home_agregar_carrito")
	 * 
	 */
	public function agregarACarritoAction() {
		$peticion = Request::createFromGlobals();
		$session = $this->getRequest()->getSession();
		$idArt = $peticion->request->get("id");
		$cantArt = $peticion->request->get("cantidad");
		$idCompra = $peticion->request->get("idCompra");
		$artDAO = $session->get("articuloDAO");
		$articuloAEnviar = new ArticuloCarrito(
				$idArt,
				$artDAO->getArticuloByID($idArt)->__get("nombre"),
				$artDAO->getArticuloByID($idArt)->__get("precioUnitario"),
				$cantArt,
				$idCompra);
		$session->get("carrito")->agregarArticulo($articuloAEnviar);
		$nuevoTotal = $session->get("carrito")->calcularTotal();
		return new JsonResponse($articuloAEnviar->toJason($nuevoTotal));
	}
	
	/**
	 * @Route("/eliminarcarrito", name="home_eliminar_carrito")
	 * 
	 */
	public function eliminarDeCarritoAction() {
		$peticion = Request::createFromGlobals();
		$session = $this->getRequest()->getSession();
		$index = $peticion->request->get("index");
		$session->get("carrito")->eliminarArticuloByIDCompra($index);
		$nuevoTotal = $session->get("carrito")->calcularTotal();
		return new JsonResponse(array("index" => $index, "total" => $nuevoTotal));		
	}
	
	/**
	 * @Route("/cargarabm", name="home_cargar_ABM")
	 * @Template()
	 */
	public function cargarABMAction() {
		return $this->forward("CarritoBundle:ABM:indexABM");
	}
	

	/**
	 * @Route("/cerrarSesionHome", name="home_cerrar_sesion")
	 * @Template()
	 */
	public function cerrarSesionAction() {
		$session = $this->getRequest()->getSession();
		$session->invalidate();
		return $this->forward("CarritoBundle:index:index");
	}
	
	



}