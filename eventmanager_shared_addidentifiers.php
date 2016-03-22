<?php
// what is the output from this code?

include 'init_autoloader.php';

// shared manager
$sem = new Zend\EventManager\SharedEventManager();
// NOTE: uncomment line below and see what happens
//$sem->attach('*', 'register', function() { echo 'registered!';}, 1);
$sem->attach('UserService', 'register', function() { echo 'registered!';}, 1);

// a generic event manager instance
// NOTE: uncomment line below and see what happens
$evm1 = new Zend\EventManager\EventManager('UserService');
$evm1->setSharedManager($sem);
$evm1->trigger('register');

$evm2 = new Zend\EventManager\EventManager();

// NOTE: uncomment line below and see what happens
//$evm->addIdentifiers('UserService');
//$evm->setIdentifiers('UserService');

$evm2->trigger('register');
