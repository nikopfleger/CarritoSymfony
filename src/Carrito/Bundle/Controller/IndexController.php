<?php
namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Carrito\Bundle\Entity2\ArticuloDAO;
use Carrito\Bundle\Entity2\Carrito;
use Carrito\Bundle\Entity2\Articulo;
use Carrito\Bundle\Entity2\ArticuloCarrito;
use Carrito\Bundle\Entity\Usuario;

/**
 * @Route("/")
 * 
 * 
 */
class indexController extends Controller {
/**
 * @Route("/",name="index")
 * @Template()
 */
	public function indexAction() {
		return $this->render("CarritoBundle:Carrito:index.html.twig",array("ERROR" => ""));

	}
	
	
	/**
	 * @Route("/validarLogin", name="index_validarLogin")
	 *  @Template
	 */
	
	public function validarLoginAction() {
		$peticion = Request::createFromGlobals();
		$user = $peticion->request->get("user");
		$pass = $peticion->request->get("pass");

		//Obtener el EntityManager
		$em = $this->getDoctrine()->getManager();
		if ($em->getRepository("CarritoBundle:Usuario")->validarUsuario($user,$pass))
		{
			
				$session = $this->getRequest()->getSession();
				$session->set("carrito", new Carrito());
				$session->set("user", $user);
	
				return $this->forward("CarritoBundle:Home:home");
		}


		else {
			return $this->render("CarritoBundle:Carrito:index.html.twig",array("ERROR" => "SI"));
		}
		
	
		
	}


}
		
	
	
