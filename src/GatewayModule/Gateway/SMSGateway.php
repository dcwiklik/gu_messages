<?php

namespace App\GatewayModule\Gateway;

class SMSGateway extends GatewayAbstract
{
    public function push($receiver, $message)
    {
        $this->adapter->sendMessage($receiver, $message);
    }

}
