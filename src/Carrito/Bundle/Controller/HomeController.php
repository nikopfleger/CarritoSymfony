<?php

namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

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
		$session = $this->getRequest()->getSession();
		$nroPagina = $session->get("pagina");
		return new JsonResponse($session->get("articuloDAO")->obtenerArrayArticulos($nroPagina));	
	}

}