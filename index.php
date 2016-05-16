#!/usr/bin/env php
<?php

/**
 * Description of index
 *
 * @author Robin Zhao <rzhao@defymedia.com>
 */

require __DIR__ . '/vendor/autoload.php';


use Robinzhao\Console\Command\GreetCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new GreetCommand());
$application->run();