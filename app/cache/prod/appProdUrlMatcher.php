<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // index_home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::homeAction',  '_route' => 'index_home',);
        }

        // index
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'index');
            }

            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\indexController::indexAction',  '_route' => 'index',);
        }

        // index_validarLogin
        if ($pathinfo === '/validarLogin') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\indexController::validarLoginAction',  '_route' => 'index_validarLogin',);
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
