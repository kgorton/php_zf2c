<?php
include 'init_autoloader.php';

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

$input= new Input('foo');
$input->getFilterChain()
      ->attachByName('stringtrim')
      ->attachByName('alpha')
      ->attachByName('word\camelCaseToDash');

$input->getValidatorChain()
      ->attach(new StringLength(array('options'=> array('min' => 1, 'max' => 255))));
      
$inputFilter= new InputFilter();
$inputFilter->add($input)->setData(array('foo'=>' Foo Bar3 '));

echo "Before:";
echo $inputFilter->getRawValue('foo'); // the output is ' Foo Bar3 '
echo PHP_EOL;

echo "After:  ";
echo $inputFilter->getValue('foo'); // the output is 'Foo-Bar'
echo PHP_EOL;
