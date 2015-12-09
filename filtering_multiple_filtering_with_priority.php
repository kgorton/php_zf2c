<?php
// what is the output of this code?
include 'init_autoloader.php';

$original = ' Foo Bar 3 ';
$chain = new Zend\Filter\FilterChain();
$chain->attach(new Zend\Filter\StringToLower(), 500);
$chain->attach(new Zend\Filter\StringToUpper());
$chain->attach(new Zend\I18n\Filter\Alnum());
echo $chain->filter($original);
