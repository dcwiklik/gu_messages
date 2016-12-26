<?php

namespace App\SomeFramework;

use App\App;
use App\GatewayModule\Exceptions\ControllerException;
use App\Starter;

/**
 * Class ControllerAbstract
 * @package App\SomeFramework
 */
abstract class ControllerAbstract
{
    /**
     * @var Starter
     */
    private $app;

    /**
     * ControllerAbstract constructor.
     * @param App $app
     */
    public function __construct(App $app)
    {
        $this->app = $app;
    }

    /**
     * Render view file
     *
     * @param $viewFilename
     * @param array $params
     * @return bool
     * @throws ControllerException
     */
    public function render($viewFilename, $params = array())
    {
        $viewFullPath = sprintf('%s/src/%s.%s',
            $this->app->getApplicationMainDir(),
            $viewFilename,
            'php');

        if (!file_exists($viewFullPath)) {
            throw new ControllerException('View file not found ('.$viewFilename.')');
        }

        ob_start();

        include($viewFullPath);

        return true;
    }
}
