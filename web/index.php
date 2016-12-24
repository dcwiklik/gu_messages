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
 * Start app
 */
$Starter = new \App\Starter($appDirectory, 'DEV');
$Starter->init();
