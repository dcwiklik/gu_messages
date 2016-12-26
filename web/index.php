<?php

/**
 * Set app main dir
 */
$appDirectory = __DIR__ . '/..';

/**
 * Require composer autoload file
 */
require $appDirectory . '/vendor/autoload.php';

/**
 * Create app object
 */
$Starter = new \App\App($appDirectory, \App\App::APP_MODE_DEV);

/**
 * Init app
 */
$Starter->init();
