<?php
include 'init_autoloader.php';

// trusted platform
echo "Trusted Platform\n";
$adapter = new Zend\Db\Adapter\Adapter(include 'database_params.php');
$platform1 = $adapter->getPlatform();
echo $platform1->quoteTrustedValue('value') . PHP_EOL;
echo $platform1->quoteValue('value') . PHP_EOL;

// untrusted platform
echo "Un-trusted Platform\n";
$platform2 = new Zend\Db\Adapter\Platform\Mysql();
echo $platform2->quoteTrustedValue('value') . PHP_EOL;
echo $platform2->quoteValue('value') . PHP_EOL;


