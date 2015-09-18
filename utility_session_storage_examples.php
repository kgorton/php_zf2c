<?php
include 'init_autoloader.php';

use Zend\Session\Storage\ArrayStorage;
use Zend\Session\SessionManager;
use Zend\Session\Container;

echo 'ArrayStorage -----------------------' . PHP_EOL;
$populateStorage = array('foo' => 'bar');
$storage = new ArrayStorage($populateStorage);
$manager1 = new SessionManager();
$manager1->setStorage($storage); 

$container1 = new Container('test', $manager1);
$container1->test = 'TEST';

// NOTICE: undefined index test
var_dump($_SESSION['test']);

use Zend\Session\Storage\SessionStorage;

echo 'SessionStorage -----------------------' . PHP_EOL;
$manager2 = new SessionManager();
$manager2->setStorage(new SessionStorage());

$container2 = new Container('test', $manager2);
$container2->test = 'TEST';

// Works OK
var_dump($_SESSION['test']);

use Zend\Session\Storage\SessionArrayStorage;

echo 'SessionArrayStorage -----------------------' . PHP_EOL;
$manager3 = new SessionManager();
$manager3->setStorage(new SessionArrayStorage());

$container3 = new Container('test', $manager3);
$container3->test = 'TEST';

// Works OK
var_dump($_SESSION['test']);

