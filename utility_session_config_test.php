<?php

// testing the difference between SessionConfig and StandardConfig

include 'init_autoloader.php';

use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;

$container = new Container('test');
if (isset($container->flag)) {
    echo PHP_EOL . 'NAME -----------------------' . PHP_EOL;
    echo session_name();
    echo PHP_EOL . 'FLAG -----------------------' . PHP_EOL;
    echo $container->flag++ . PHP_EOL;
} else {
    echo PHP_EOL . 'NAME -----------------------' . PHP_EOL;
    echo session_name();
	$container->flag = 1;
}

