<?php
include 'init_autoloader.php';

$filter = new Zend\I18n\Filter\Alnum();

$content = array(
	'This is an example in English',
	'C\'est un example en francais',
	'xxxx Thai xxxx',
);

// what is ja, ko, etc.

