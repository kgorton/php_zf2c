<?php

// testing the difference between SessionConfig and StandardConfig

include 'init_autoloader.php';

use Zend\Session\Config\StandardConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

echo 'START -----------------------' . PHP_EOL;
$config = new StandardConfig();
$config->setName('STANDARDCONFIG');
$manager = new SessionManager($config);
$manager->start();

$container = new Container('test');
if (isset($container->flag)) {
    echo PHP_EOL . 'NAME -----------------------' . PHP_EOL;
    echo $manager->getName();
    echo PHP_EOL . 'FLAG -----------------------' . PHP_EOL;
    echo $container->flag++ . PHP_EOL;
} else {
    echo PHP_EOL . 'NAME -----------------------' . PHP_EOL;
    echo $manager->getName();
	$container->flag = 1;
}

