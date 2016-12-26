<?php

namespace App\GatewayModule\Gateway;

use App\GatewayModule\Exceptions\ProviderException;

class SMSGateway extends GatewayAbstract
{
    /**
     * Push message
     *
     * @param $receiver
     * @param $message
     * @return bool
     * @throws ProviderException
     */
    public function push($receiver, $message)
    {
        try {
            $this->adapter->sendMessage($receiver, $message);
        } catch (ProviderException $exception) {
            throw $exception;
        }

        return true;
    }

}
