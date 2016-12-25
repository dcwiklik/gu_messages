<?php

namespace App\GatewayModule\Controllers;

use App\SomeFramework\ControllerAbstract;

/**
 * Class DefaultController
 * @package App\GatewayModule\Controllers
 */
class DefaultController extends ControllerAbstract
{
    /**
     * Index action
     */
    public function indexAction()
    {
        return $this->render('GatewayModule/Views/default/index');
    }

    /**
     * Test action
     */
    public function testAction()
    {
        echo 'test action';
    }
}
