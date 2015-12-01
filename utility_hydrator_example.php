<?php
include 'init_autoloader.php';

use Zend\Stdlib\Hydrator;

$someData = range('A', 'C');
$hydrator = new Hydrator\ArraySerializable();
$object   = new ArrayObject();

$hydrator->hydrate($someData, $object);
print_r($object);

// or, if the object has data we want as an array:
$data = $hydrator->extract($object);
print_r($data);
