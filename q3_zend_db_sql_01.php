<?php
include 'init_autoloader.php';

use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Sql;

// NOTE needed to change these params to match local env
$db = new Adapter(array(
	'driver' => 'Pdo',
	'dsn' => 'mysql:dbname=zend;host=localhost;charset=utf8',
	'username' => 'zend',
	'password' => 'password',
));

$sql = new Sql($db);

$select = $sql->select();
$select->from('customers');
$select->order('firstname');

echo ($sql->getSqlStringForSqlObject($select));
// output: SELECT `customers`.* FROM `customers` ORDER BY `firstname` ASC

