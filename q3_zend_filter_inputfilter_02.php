<?php
include 'init_autoloader.php';

$inputFilter = new \Zend\InputFilter\InputFilter();
$inputFilter->add(array(
	'name' => 'myField',
	'validators' => array(
		array('name' => 'Alnum')
	),
	'filters' => array(
		array('name' => 'StringTrim')
	)
));

$inputFilter->setData(array('myField' => ' myValue '));
echo $inputFilter->isValid();
