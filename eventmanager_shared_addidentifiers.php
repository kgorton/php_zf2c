<?php
include 'init_autoloader.php';

// shared manager
$sem = new Zend\EventManager\SharedEventManager();
$sem->attach('UserService', 'register', function() { echo 'registered!';}, 1);

// a generic event manager instance
$evm = new Zend\EventManager\EventManager();
$evm->setSharedManager($sem);

// NOTE: uncomment line below and see what happens
//$evm->addIdentifiers('UserService');
$evm->trigger('register');
