<?php

// testing the difference between SessionConfig and StandardConfig

include 'init_autoloader.php';

use Zend\Session\Config\SessionConfig;
use Zend\Session\SessionManager;
use Zend\Session\Container;
use Zend\Debug\Debug;

echo 'START -----------------------' . PHP_EOL;
echo '<br>Refresh your browser a couple of times for this to work' . PHP_EOL;

$config = new SessionConfig();
$config->setName('SESSIONCONFIG');
$manager = new SessionManager($config);
$manager->start();

$container = new Container('test');
if (isset($container->flag)) {
    echo PHP_EOL . '<br>NAME -----------------------<br>' . PHP_EOL;
    echo $manager->getName();
    echo PHP_EOL . '<br>FLAG -----------------------<br>' . PHP_EOL;
    echo $container->flag++ . PHP_EOL;
} else {
    echo PHP_EOL . '<br>NAME -----------------------<br>' . PHP_EOL;
    echo $manager->getName();
	$container->flag = 1;
}

Debug::dump($_SESSION['test']);
