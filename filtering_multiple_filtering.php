<?php
include 'init_autoloader.php';

$original = "my_original_content";

// Attach a filter
$filter1 = new Zend\Filter\Word\UnderscoreToCamelCase();
$filtered = $filter1->filter($original);
echo $filtered . PHP_EOL;   // MyOriginalContent


// Use its opposite
$filter2 = new Zend\Filter\Word\CamelCaseToUnderscore();
$filtered = $filter2->filter($filtered);
echo $filtered . PHP_EOL;   // My_Original_Content

// OR
$original = "my_original_content";
$chain = new Zend\Filter\FilterChain();
$chain->attach($filter1);
$chain->attach($filter2);
echo $chain->filter($original) . PHP_EOL;
