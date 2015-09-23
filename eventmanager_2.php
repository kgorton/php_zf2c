<?php
// what is the output of this code?

include 'init_autoloader.php';

$sem = new Zend\EventManager\SharedEventManager();
$sem->attach('*', 'register', function() { echo 'registered!'; });
$evm = new Zend\EventManager\EventManager();
// NOTE: uncomment line below and see what happens
//$evm->setSharedManager($sem);
$evm->trigger('register');
