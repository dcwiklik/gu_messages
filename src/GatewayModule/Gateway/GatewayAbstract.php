<?php

namespace App\GatewayModule\Gateway;

/**
 * Class GatewayAbstract
 * @package App\GatewayModule\Api
 */
abstract class GatewayAbstract
{
    /**
     * Api Types
     */
    CONST API_TYPE_SMS = 'SMS';
    CONST API_TYPE_EMAIL = 'EMAIL';

    /**
     * @var
     */
    protected $type;

    /**
     * @var ApiAdapter
     */
    protected $adapter;

    /**
     * Gateway constructor.
     * @param $type
     */
    public function __construct($type, ApiAdapter$adapter)
    {
        $this->type = $type;
        $this->adapter = $adapter;
    }

    /**
     * @return mixed
     */
    abstract public function push($receiver, $message);

}
