<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * ProjectUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class ProjectUrlMatcher extends Symfony\Component\Routing\Matcher\UrlMatcher
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

        // route1
        if ($pathinfo === '/') {
            return array (  '_controller' => 'App\\Controllers\\DefaultController::indexAction',  '_route' => 'route1',);
        }

        if (0 === strpos($pathinfo, '/foo')) {
            // route2
            if ($pathinfo === '/foo') {
                return array (  '_controller' => 'App\\Controllers\\DefaultController::fooAction',  '_route' => 'route2',);
            }

            // route3
            if ($pathinfo === '/foo/bar') {
                return array (  '_controller' => 'MyController::foobarAction',  '_route' => 'route3',);
            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
