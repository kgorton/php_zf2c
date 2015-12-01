<?php
include 'init_autoloader.php';

use Zend\Db\Sql\Update;

$update = new Update();
$update->set(array('foo' => 'bar'));
$update->where(array('id' => 1));

// Works
var_dump($update->getRawState());

// Fatal Error
//var_dump($update->getSqlData());

// Fatal Error
//var_dump($update->getValues());

// Fatal Error
//var_dump($update->getData());

