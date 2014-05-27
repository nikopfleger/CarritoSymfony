<?php

namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Session\Session;
use Carrito\Bundle\Entity\ArticuloRepository;
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
		$em = $this->getDoctrine()->getManager();
		$articulos = $em->getRepository("CarritoBundle:Articulo")->findAll();
		$cantPag = $em->getRepository("CarritoBundle:Articulo")->numeroPaginas();
		return $this->render("CarritoBundle:Carrito:home.html.twig",
				array(
				"catalogo" => $articulos,
				"user" => $session->get("user"),
				"ARTICULOS_X_PAGINA" => ArticuloRepository::ARTICULOS_X_PAGINA,
				"cantPag" => $cantPag)
		        );
	}
	
	/**
	 * @Route("/cambiarPagina", name="home_cambiarPagina")
	 * 
	 * 
	 */
	public function cambiarPaginaAction () {
		$peticion = Request::createFromGlobals();
		$nroPagina = $peticion->request->get("pagina");
		$em = $this->getDoctrine()->getManager();
		$nuevaPagina = $em->getRepository("CarritoBundle:Articulo")->obtenerPagina($nroPagina);
		return new JsonResponse($nuevaPagina);	
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
		//FIND BY ID,
		$em = $this->getDoctrine()->getManager();
		$articuloAgregar = $em->getRepository("CarritoBundle:Articulo")->findOneById($idArt);
		$articuloAEnviar = new ArticuloCarrito(
				$idArt,
				$articuloAgregar->getNombre(),
				$articuloAgregar->getPrecio(),
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