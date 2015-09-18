<?php
include 'init_autoloader.php';

use Zend\I18n\Filter\Alpha;
use Zend\I18n\Validator\Alnum;
use Zend\InputFilter\Input;

$input = new Input('firstname');

$input->getValidatorChain()->attachByName('InArray', array('haystack' => array('Peter','Paul','Mary')));
$input->getValidatorChain()->attach(new Alnum());
$input->getFilterChain()->attachByName('StringTrim');
// NOTE: Alpha(TRUE) sets the "allowWhiteSpace" param
$input->getFilterChain()->attach(new Alpha(TRUE));

$input->setValue('Peter 2');
var_dump($input->isValid());

