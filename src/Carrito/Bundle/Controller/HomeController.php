<?php

namespace Carrito\Bundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class HomeController extends Controller {
	

	
/**
 * @Route("/home", name="index_home")
 * @Template()
 */
	public function indexAction() {
		return $this->render("CarritoBundle:Carrito:home.html.twig");
	}
	

}