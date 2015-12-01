<?php
// Q: Assuming a valid PDO connection, what class is returned?
// A: (A) Zend\Db\ResultSet\ResultSet
//    (B) ArrayObject
//    (C) Zend\Db\Adapter\Driver\Pdo\Statement
//    (D) None of the above

include 'init_autoloader.php';

use Zend\Db\Adapter\Adapter;
$adapter = new Adapter(include 'database_params.php');
$return  = $adapter->query('SELECT * FROM products WHERE sku = ?', Adapter::QUERY_MODE_PREPARE);
var_dump($return);
