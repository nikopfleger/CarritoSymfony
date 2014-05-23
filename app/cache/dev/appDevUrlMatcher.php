<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
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

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // ABM_indexABM
        if ($pathinfo === '/indexABM') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\ABMController::indexABMAction',  '_route' => 'ABM_indexABM',);
        }

        // abm_cargar_catalogo
        if ($pathinfo === '/cargarCatalogo') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\ABMController::cargarCatalogoAction',  '_route' => 'abm_cargar_catalogo',);
        }

        // abm_actualizar_catalogo
        if ($pathinfo === '/actualizarCatalogo') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\ABMController::actualizarCatalogoAction',  '_route' => 'abm_actualizar_catalogo',);
        }

        // abm_eliminar_catalogo
        if ($pathinfo === '/eliminarCatalogo') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\ABMController::eliminarCatalogoAction',  '_route' => 'abm_eliminar_catalogo',);
        }

        // abm_cerrar_sesion
        if ($pathinfo === '/cerrarSesionABM') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\ABMController::cerrarSesionAction',  '_route' => 'abm_cerrar_sesion',);
        }

        // _home
        if ($pathinfo === '/home') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::homeAction',  '_route' => '_home',);
        }

        // home_cambiarPagina
        if ($pathinfo === '/cambiarPagina') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::cambiarPaginaAction',  '_route' => 'home_cambiarPagina',);
        }

        // home_agregar_carrito
        if ($pathinfo === '/agregarcarrito') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::agregarACarritoAction',  '_route' => 'home_agregar_carrito',);
        }

        // home_eliminar_carrito
        if ($pathinfo === '/eliminarcarrito') {
            return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::eliminarDeCarritoAction',  '_route' => 'home_eliminar_carrito',);
        }

        if (0 === strpos($pathinfo, '/c')) {
            // home_cargar_ABM
            if ($pathinfo === '/cargarabm') {
                return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::cargarABMAction',  '_route' => 'home_cargar_ABM',);
            }

            // home_cerrar_sesion
            if ($pathinfo === '/cerrarSesionHome') {
                return array (  '_controller' => 'Carrito\\Bundle\\Controller\\HomeController::cerrarSesionAction',  '_route' => 'home_cerrar_sesion',);
            }

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
