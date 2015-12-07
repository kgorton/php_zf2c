<?php
// TODO: test this!!! see wuzzup
include 'init_autoloader.php';

use Zend\Session\Storage\ArrayStorage;
use Zend\Session\SessionManager;
use Zend\Session\Container;

echo '<pre>';
echo 'ArrayStorage -----------------------' . PHP_EOL;
$manager1 = new SessionManager();
$manager1->setStorage(new ArrayStorage());

$container1 = new Container('test1', $manager1);
echo 'Comes from array storage: ' . $container1->test . PHP_EOL;
$container1->test = 'TEST1';

// NOTICE: undefined index test
echo $_SESSION['test1']['test'] . PHP_EOL;
var_dump($container1);

use Zend\Session\Storage\SessionStorage;

echo 'SessionStorage -----------------------' . PHP_EOL;
$manager2 = new SessionManager();
$manager2->setStorage(new SessionStorage());

$container2 = new Container('test2', $manager2);
echo 'Comes from session storage: ' . $container2->test . PHP_EOL;
$container2->test = 'TEST2';

// Works OK
echo $_SESSION['test2']['test'] . PHP_EOL;
var_dump($container2);

use Zend\Session\Storage\SessionArrayStorage;

echo 'SessionArrayStorage -----------------------' . PHP_EOL;
$manager3 = new SessionManager();
$manager3->setStorage(new SessionArrayStorage());

$container3 = new Container('test3', $manager3);
echo 'Comes from session array storage: ' . $container3->test . PHP_EOL;
$container3->test = 'TEST3';

// Works OK
echo $_SESSION['test3']['test'] . PHP_EOL;
var_dump($container3);

var_dump($_SESSION);
echo '</pre>';
