<?php
// what is the output of this code?
include 'init_autoloader.php';

use Zend\Session\Storage\ArrayStorage;
use Zend\Session\SessionManager;
use Zend\Session\Container;
$manager1 = new SessionManager();
$manager1->setStorage(new ArrayStorage()); 
$container1 = new Container('test', $manager1);
$container1->test = 'TEST';
var_dump($_SESSION['test']);
