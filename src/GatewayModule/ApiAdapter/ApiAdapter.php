<?php

namespace App\GatewayModule\ApiAdapter;

use App\GatewayModule\Exceptions\ApiAdapterException;
use App\GatewayModule\Exceptions\ProviderException;
use App\GatewayModule\MessageProvider\MessageProviderInterface;

/**
 * Class ApiAdapter
 * @package App\GatewayModule\Gateway
 */
class ApiAdapter
{
    /**
     * @var MessageProviderInterface
     */
    private $provider;

    /**
     * @param $provider
     * @throws \Exception
     */
    public function setProvider(MessageProviderInterface $provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return MessageProviderInterface
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * Send message to selected provider
     *
     * @param $receiver
     * @param $message
     * @throws ProviderException
     */
    public function sendMessage($receiver, $message)
    {
        try {
            $this->provider->sendMessage();
        } catch (ProviderException $exception) {
            throw $exception;
        }
    }
}
