<?php

namespace App;

use Symfony\Component\Config\Definition\Exception\Exception;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Loader\YamlFileLoader;
use Symfony\Component\Routing\Router;
use Symfony\Component\Config\FileLocator;
use Symfony\Component\Routing\RequestContext;

/**
 * Class Starter
 * @package App
 */
class Starter
{
    /**
     * App modes
     */
    CONST APP_MODE_DEV = 'DEV';
    CONST APP_MODE_PROD = 'PROD';

    /**
     * App mode
     */
    private $applicationMode;

    /**
     * @var
     */
    private $applicationMainDir;

    /**
     * @var
     */
    private $routesFile;

    /**
     * Starter constructor.
     * @param $applicationMainDirectory
     * @param string $applicationMode (APP_MODE_PROD | APP_MODE_DEV)
     */
    public function __construct($applicationMainDirectory, $applicationMode)
    {
        if (self::APP_MODE_DEV == $applicationMode) {
            ini_set('display_errors', 1);
            ini_set('error_reporting', E_ALL);
        }

        $this->applicationMainDir = $applicationMainDirectory;
    }

    /**
     * Get currenty application main dir
     *
     * @return mixed
     */
    public function getApplicationMainDir()
    {
        return $this->applicationMainDir;
    }

    /**
     * Init app
     */
    public function init()
    {
        //set routes file
        $this->routesFile = $this->applicationMainDir . '/config/routes.yml';

        //check route
        $this->checkRoute();
    }

    /**
     * Check route
     *
     * @return bool
     */
    private function checkRoute()
    {
        $locator = new FileLocator(array(__DIR__));
        $requestContext = new RequestContext('/');

        $routerOptions = [];

        if (self::APP_MODE_DEV != $this->applicationMode) {
            $applicationMode['cache_dir'] = $this->applicationMainDir . '/cache';
        }

        $router = new Router(
            new YamlFileLoader($locator),
            $this->routesFile,
            $routerOptions,
            $requestContext
        );

        try {

            $matchedRoute = $router->match($_SERVER['REQUEST_URI']);

            $matchedControllerAction = explode('::', $matchedRoute['_controller']);
            $controller = $matchedControllerAction[0];
            $action = $matchedControllerAction[1];

            $this->runAction($controller, $action);

        } catch (ResourceNotFoundException $e) {
            die('Router error: Route not found / 404');
        } catch (Exception $e) {
            die('Router error: Unknown');
        }

        return true;
    }

    /**
     * Run controller action
     *
     * @param $controller
     * @param $action
     */
    private function runAction($controller, $action)
    {
        $currentController = new $controller($this);

        if (TRUE === $currentController->$action()) {
            //ok
        } else {
            //controller error

        }
    }

}
