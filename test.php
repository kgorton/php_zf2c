<?php

// TODO: test this!!! see wuzzup

// No need to do session_start(): this is done by
// the constructor defined in Zend\Session\AbstractContainer

include 'init_autoloader.php';

use Zend\Session\Container;

$a = new Container('test');
$a->value = 'ABC';

var_dump($_SESSION);

echo get_class($a->getManager()->getStorage());
