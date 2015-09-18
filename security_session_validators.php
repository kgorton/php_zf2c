<?php
include 'init_autoloader.php';

use Zend\Session\SessionManager;
use Zend\Session\Validator\HttpUserAgent;
use Zend\Session\Validator\RemoteAddr;

$manager = new SessionManager();

$manager->start();

$manager->getValidatorChain()->attach('session.validate',array(new HttpUserAgent(), 'isValid'));
$manager->getValidatorChain()->attach('session.validate',array(new RemoteAddr(), 'isValid'));

if ($manager->isValid()) {
	echo 'Session is NOT valid';
} else {
	echo 'Session is valid';
}

phpinfo(INFO_VARIABLES);
