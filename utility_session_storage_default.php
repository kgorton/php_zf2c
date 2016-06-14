<?php
// shows what is the default storage mechanism

include 'init_autoloader.php';

use Zend\Session\Container;

$a = new Container('test');
$a->value = 'ABC';

var_dump($_SESSION);

echo get_class($a->getManager()->getStorage());
echo PHP_EOL;
