#!/usr/bin/env php
<?php

/**
 * Just the entry point.
 *
 * @author Robin Zhao <rzhao@defymedia.com>
 */

define('ROOT', __DIR__);
define('START_TIME', time());
define('START_MEMORY', memory_get_peak_usage());

if (!file_exists(ROOT . '/database.ini')) {
    throw new Exception("Please create database.ini");
}

require __DIR__ . '/vendor/autoload.php';

use Robinzhao\Console\Command\TableCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new TableCommand());
$application->run();
