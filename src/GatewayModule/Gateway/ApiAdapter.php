<?php

namespace App\GatewayModule\Gateway;

/**
 * Class ApiAdapter
 * @package App\GatewayModule\Gateway
 */
class ApiAdapter
{
    /**
     * @var array
     */
    private $availableProviders = array(
        'smsProvider1',
        'smsProvider2',
        'emailProvider1',
        'emailProvider2'
    );

    /**
     * @var
     */
    private $provider;

    /**
     * @param $provider
     * @throws \Exception
     */
    public function setProvider($provider)
    {
        switch ($provider) {
            case 'smsProvider1':
                $this->provider = $provider;
                break;

            case 'smsProvider2':
                $this->provider = $provider;
                break;

            case 'emailProvider1':
                $this->provider = $provider;
                break;

            case 'emailProvider2':
                $this->provider = $provider;
                break;

            default:
                throw new \Exception('Provider not exists, available providers (' . implode(', ', $this->availableProviders) . ')');
        }
    }

    /**
     * Send message to selected provider
     *
     * @param $receiver
     * @param $message
     * @throws \Exception
     */
    public function sendMessage($receiver, $message)
    {
        switch ($this->provider) {
            case 'smsProvider1':
                //some actions for specific provider interface
                break;

            case 'smsProvider2':
                //some actions for specific provider interface
                break;

            case 'emailProvider1':
                //some actions for specific provider interface
                break;

            case 'emailProvider2':
                //some actions for specific provider interface
                break;

            default:
                throw new \Exception('Provider not exists, available providers (' . implode(', ', $this->availableProviders) . ')');
        }

        /**
         * Fake action for example (send message for selected provider)
         */
        echo sprintf('Wysyłam wiadomość przez z adaptera do providera <strong>%s</strong>, Odbiorca: <strong>%s</strong>, Wiadomość: <strong>%s</strong>',
            $this->provider,
            $receiver,
            $message
        );
    }
}
