<?php
include 'init_autoloader.php';

$testData = array(
	array('username' => ' Good Name '), 
	array('username' => ' Bad Name!!! '),
	array('username' => NULL),
);

$form = new Zend\Form\Form();

$fieldSet = new Zend\Form\Fieldset('users');
$fieldSet->add(array('name' => 'username', 'type' => 'text'));
$form->add($fieldSet);

$inputFilter = new Zend\InputFilter\InputFilter();
$fieldSetFilter = new Zend\InputFilter\InputFilter('users');
$fieldSetFilter->add(
	array(
		'name' => 'username', 
		'require' => TRUE,
		'filters' => array(new Zend\Filter\StringTrim()),
		'validators' => array(new Zend\Validator\Regex(array('pattern' => '/\w+/'))),
));

$inputFilter->add($fieldSetFilter);
$form->setInputFilter($inputFilter);

foreach ($testData as $item) {
	echo PHP_EOL;
	var_dump($item);
	$form->setData($item);
	if ($form->isValid()) {
		$data = $form->getData();
		echo 'Valid Data: ' . PHP_EOL;
		var_dump($data);
	} else {
		echo 'Data Not Valid: ' . PHP_EOL;
		var_dump($form->getMessages());
	}
}
