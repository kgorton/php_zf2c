<?php
include 'init_autoloader.php';

$evm = new Zend\EventManager\EventManager();
$shEvm = new Zend\EventManager\SharedEventManager();
$evm->setSharedManager($shEvm);
$evm->attach('greet', function () { echo 'Hello '; }, 100);
$shEvm->attach('*', '*', function () { echo 'World'; });
$evm->trigger('greet', null, array(), function ($v) { return null === $v; });
