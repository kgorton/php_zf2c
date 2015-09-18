<?php
include 'init_autoloader.php';

// Transform `MixedCase` and `camelCaseText` to another format
$inflector= new Zend\Filter\Inflector('pages/:page.:suffix');
$inflector->setRules(array(
    ':page' => array('Word\CamelCaseToDash', 'StringToLower'),
    'suffix' => 'html',
));

$string = 'camelCasedWords';
$filtered = $inflector->filter(array('page'=> $string));
printf("%24s --> %s \n", $string, $filtered);
//         camelCasedWords --> pages/camel-cased-words.html 


$string = 'this_is_not_camel_cased';
$filtered = $inflector->filter(array('page' => $string));
printf("%24s --> %s \n", $string, $filtered);
// this_is_not_camel_cased --> pages/this_is_not_camel_cased.html 
