<?php

namespace App\GatewayModule\MessageProvider;

interface MessageProviderInterface
{
    /**
     * @return mixed
     * @throws \Exception
     */
    public function sendMessage();
}
