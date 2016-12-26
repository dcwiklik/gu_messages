<?php

namespace App\GatewayModule\MessageProvider;
use App\GatewayModule\Exceptions\ProviderException;

/**
 * Class SMS2
 * @package App\GatewayModule\MessageProvider
 */
class SMS2 implements MessageProviderInterface
{
    /**
     * @return bool
     * @throws ProviderException
     */
    public function sendMessage()
    {
        //some action (init provider, invoke to their api, send message)

        //provider success

        //return status
        return true;
    }
}
