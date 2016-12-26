<?php

namespace App\GatewayModule\Gateway;
use App\GatewayModule\ApiAdapter\ApiAdapter;

/**
 * Class GatewayAbstract
 * @package App\GatewayModule\Api
 */
abstract class GatewayAbstract
{
    /**
     * Gateway type
     */
    CONST TYPE_SMS = 'SMS';
    CONST TYPE_EMAIL = 'EMAIL';

    /**
     * @var
     */
    protected $type;

    /**
     * @var ApiAdapter
     */
    protected $adapter;

    /**
     * GatewayAbstract constructor.
     * @param $type
     * @param ApiAdapter $adapter
     */
    public function __construct($type, ApiAdapter $adapter)
    {
        $this->type = $type;
        $this->adapter = $adapter;
    }

    /**
     * @param $receiver
     * @param $message
     * @return mixed
     */
    abstract public function push($receiver, $message);

    /**
     * @return string
     */
    public function getIdent()
    {
        return $this->type . '_GATEWAY_' . get_class($this->adapter->getProvider()) . '_PROVIDER';
    }
}
