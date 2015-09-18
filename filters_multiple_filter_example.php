<?php
include 'init_autoloader.php';

$original = "my_original_content";

// Attach a filter
$filter = new Zend\Filter\Word\UnderscoreToCamelCase();
$filtered = $filter->filter($original);

// Use its opposite
$filter2 = new Zend\Filter\Word\CamelCaseToUnderscore();
echo $filtered . '|' . $filter2->filter($filtered);

// Output: MyOriginalContent|My_Original_Content


