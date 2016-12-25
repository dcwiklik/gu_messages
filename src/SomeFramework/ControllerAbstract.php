<?php

namespace App\SomeFramework;

use App\Starter;
use Symfony\Component\Config\Definition\Exception\Exception;

/**
 * Class ControllerAbstract
 * @package App\SomeFramework
 */
abstract class ControllerAbstract
{
    /**
     * @var Starter
     */
    private $starter;

    /**
     * ControllerAbstract constructor.
     * @param Starter $starter
     */
    public function __construct(Starter $starter)
    {
        $this->starter = $starter;
    }

    /**
     * Render view file
     *
     * @param $viewFilename
     * @param array $params
     * @return bool
     * @throws \Exception
     */
    public function render($viewFilename, $params = array())
    {
        $viewFullPath = sprintf('%s/src/%s.%s',
            $this->starter->getApplicationMainDir(),
            $viewFilename,
            'php');

        if (!file_exists($viewFullPath)) {
            throw new \Exception('View file not found ('.$viewFilename.')');
        }

        ob_start();

        include($viewFullPath);

        return true;
    }
}
