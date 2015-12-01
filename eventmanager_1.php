<?php
// what is the output of this code?

include 'init_autoloader.php';

$sem = new Zend\EventManager\SharedEventManager();
$sem->attach('UserService', 'register', function() { echo 'registered!'; });
$evm = new Zend\EventManager\EventManager();
$evm->setSharedManager($sem);
// NOTE: uncomment line below and see what happens
//$evm->addIdentifiers('UserService');
$evm->trigger('register');
