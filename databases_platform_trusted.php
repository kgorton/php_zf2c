<?php
include 'init_autoloader.php';

$platform = new Zend\Db\Adapter\Platform\Mysql();
//echo $platform->quoteTrustedValue('value') . PHP_EOL;
echo $platform->quoteValue('value') . PHP_EOL;


