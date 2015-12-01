<?php
include 'init_autoloader.php';

$storage1 = new Zend\Authentication\Storage\Session();
$storage2 = new Zend\Authentication\Storage\NonPersistent();
$storage2->write(1);

$storageChain = new Zend\Authentication\Storage\Chain();
$storageChain->add($storage1, 10);
$storageChain->add($storage2, -10);

$authService = new Zend\Authentication\AuthenticationService($storageChain);

$identity = $authService->getIdentity();

var_dump($identity);

