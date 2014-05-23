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
		$nombre = $peticion->request->get("user");
		$pass = $peticion->request->get("pass");
				
		$usuarioDAO = new UsuarioDAO();
		$potencialUsuario = new Usuario($nombre,$pass);
		if($usuarioDAO->existeUsuario($potencialUsuario)){
		
			$session = $this->getRequest()->getSession();
			$session->set("carrito", new Carrito());
			$session->set("user", $nombre);
			$session->set("articuloDAO",new ArticuloDAO());

			return $this->forward("CarritoBundle:Home:home");
		}
		else {
			return $this->render("CarritoBundle:Carrito:index.html.twig",array("ERROR" => "SI"));
		}
		
	
		
	}


}
		
	
	
