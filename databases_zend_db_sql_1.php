<?php
include 'init_autoloader.php';

$adapter = new Zend\Db\Adapter\Adapter(include 'database_params.php');
$sql = new Zend\Db\Sql\Sql($adapter);
$select = $sql->select('tablename');
$select->where(new Zend\Db\Sql\Predicate\In('tablename.foo',
		array(1, 2)));
echo $sql->getSqlStringForSqlObject($select, $adapter->getPlatform());
echo PHP_EOL;
