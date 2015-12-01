<?php
include 'init_autoloader.php';

$original = "my_original_content";

// Attach a filter
$filter = new Zend\Filter\Word\UnderscoreToCamelCase();
$filtered = $filter->filter($original);
echo $filtered . PHP_EOL;

// Use its opposite
$filter2 = new Zend\Filter\Word\CamelCaseToUnderscore();
$filtered = $filter2->filter($filtered);
echo $filtered . PHP_EOL;
