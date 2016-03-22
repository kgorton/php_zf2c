<?php
use Zend\Db\Sql\Ddl\CreateTable;
use Zend\Db\Sql\Ddl\Column\Integer;
use Zend\Db\Sql\Ddl\Constraint\ForeignKey;
use Zend\Db\Adapter\Adapter;
use Zend\Db\Sql\Ddl\Column\Varchar;
use Zend\Db\TableGateway\TableGateway;
use Zend\Db\Sql\Ddl\AlterTable;
include 'init_autoloader.php';

$adapter = new Zend\Db\Adapter\Adapter(include 'database_params.php');
$sql = new Zend\Db\Sql\Sql($adapter);
var_dump($adapter->getDriver()->getConnection());

// $select = $sql->select('tablename');
// $select->where(new Zend\Db\Sql\Predicate\In('tablename.foo',
// 		array(1, 2)));
// echo $sql->getSqlStringForSqlObject($select, $adapter->getPlatform());


// check if table exists
$tableGateway = new TableGateway('products', $adapter);
if (!$tableGateway) {
	$tableDdl = new CreateTable('products', false);
} else {
	$tableDdl = new AlterTable('products', false);
	echo 'table exists';
}
$tableDdl->addColumn(new Integer('id'));
$tableDdl->addColumn(new Integer('sku'));
$tableDdl->addColumn(new Varchar('name', 255));
$tableDdl->addColumn(new Integer('type_id'));
// must create table 'type' first
// $tableDdl->addConstraint(new ForeignKey('fk-type_id',
// 							 'type_id',
// 							 'type',
// 							 'id'));

var_dump($sql->getSqlStringForSqlObject($tableDdl));

$adapter->query($sql->getSqlStringForSqlObject($tableDdl),
		Adapter::QUERY_MODE_EXECUTE);


echo PHP_EOL;

