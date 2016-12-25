<?php

namespace App\GatewayModule\Controllers;

use App\GatewayModule\Gateway\EmailGateway;
use App\GatewayModule\Gateway\GatewayAbstract;
use App\GatewayModule\Gateway\SMSGateway;
use App\GatewayModule\Gateway\ApiAdapter;
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
        /**
         * Create adapter
         */
        $adapter = new ApiAdapter();
        $adapter->setProvider('smsProvider1');

        /**
         * Send SMS
         */
        $smsGateway = new SMSGateway(GatewayAbstract::API_TYPE_SMS, $adapter);
        $smsGateway->push('555555555', 'Wiadomość 1');

        //$emailGateway = new EmailGateway(GatewayAbstract::API_TYPE_EMAIL);
        //$emailGateway->push('Wiadomość 1');


        //var_dump($emailGateway);

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
