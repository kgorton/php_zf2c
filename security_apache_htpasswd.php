<?php
include 'init_autoloader.php';

use Zend\Crypt\Password\Apache;

$apache = new Apache();

// CRYPT
$apache->setFormat('crypt');
$crypt = $apache->create('password');

echo "Password = password\n";
echo "Apache CRYPT Format\n";
echo $crypt . PHP_EOL;

$apache->setFormat('digest');
$apache->setUserName('enrico');
$apache->setAuthName('test');
$digest = $apache->create('password');

echo "Apache DIGEST Format\n";
echo $digest . PHP_EOL;
