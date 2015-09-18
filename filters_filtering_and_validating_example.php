<?php
include 'init_autoloader.php';

use Zend\InputFilter\Input;
use Zend\InputFilter\InputFilter;
use Zend\Validator\StringLength;

$input= new Input('foo');
$input->getFilterChain()
      ->attachByName('stringtrim')
      ->attachByName('alpha');

$input->getValidatorChain()
      ->attach(new StringLength(array('options'=> array('min' => 1, 'max' => 255))));
      
$inputFilter= new InputFilter();
$inputFilter->add($input)
    ->setData(array(
        'foo'=>' Bar3 ',
    )
);

echo "Before: \n ";
echo $inputFilter->getRawValue('foo') . " \n "; // the output is ' Bar3 '

echo "After: \n ";
echo $inputFilter->getValue('foo') . " \n "; // the output is 'Bar'
