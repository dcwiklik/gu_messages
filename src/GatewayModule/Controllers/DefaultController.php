<?php

namespace App\GatewayModule\Controllers;

use App\GatewayModule\ApiAdapter\ApiAdapter;
use App\GatewayModule\Exceptions\GatewayException;
use App\GatewayModule\Exceptions\ProviderException;
use App\GatewayModule\Gateway\GatewayAbstract;
use App\GatewayModule\Gateway\SMSGateway;
use App\GatewayModule\MessageProvider\SMS1;
use App\GatewayModule\MessageProvider\SMS2;
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
         * TODO
         *
         * - add message to queue
         * - consume queue items
         * - send message through provider
         * - check status
         */

        $messagesStatuses = array();

        /**
         * Send test messages
         */
        $messagesStatuses[] = $this->sendMessage1();
        $messagesStatuses[] = $this->sendMessage2();

        return $this->render('GatewayModule/Views/default/index', array(
            'messagesStatuses' => $messagesStatuses
        ));
    }

    /**
     * Test action
     */
    public function testAction()
    {
        echo 'test action';
    }

    /**********************************************************************************************
     **************************************   PRIVATE    ******************************************
     *********************************************************************************************/

    /**
     * @return ProviderException|bool|\Exception
     */
    private function sendMessage1()
    {
        /**
         * Create adapter
         */
        $adapter = new ApiAdapter();

        $provider = new SMS1();
        $adapter->setProvider($provider);

        /**
         * Send SMS through SMS2 Provider
         */
        $smsGateway = new SMSGateway(GatewayAbstract::TYPE_SMS, $adapter);

        try {
            $smsGateway->push('555555555', 'Wiadomość 1');
        } catch (ProviderException $exception) {
            return $exception;
        }

        return true;
    }

    /**
     * @return GatewayException|bool|\Exception
     */
    private function sendMessage2()
    {
        /**
         * Create adapter
         */
        $adapter = new ApiAdapter();

        $provider = new SMS2();
        $adapter->setProvider($provider);

        /**
         * Send SMS through SMS2 Provider
         */
        $smsGateway = new SMSGateway(GatewayAbstract::TYPE_SMS, $adapter);

        try {
            $smsGateway->push('555555555', 'Wiadomość 1');
        } catch (GatewayException $exception) {
            return $exception;
        }

        return true;
    }
}
