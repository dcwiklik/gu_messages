<?php

namespace App\GatewayModule\MessageProvider;
use App\GatewayModule\Exceptions\ProviderException;

/**
 * Class SMS1
 * @package App\GatewayModule\MessageProvider
 */
class SMS1 implements MessageProviderInterface
{
    /**
     * @return bool
     * @throws \Exception
     */
    public function sendMessage()
    {
        //some action (init provider, invoke to their api, send message)

        //provider error

        throw new ProviderException('Some error from provider, for example connection error');

        //return status
        return true;
    }
}
