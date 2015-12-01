<?php
include 'init_autoloader.php';
use Zend\Filter\StaticFilter;
echo StaticFilter::execute('&','HtmlEntities');
// Outputs: &amp;

