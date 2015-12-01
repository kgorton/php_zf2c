<?php
include 'init_autoloader.php';

$htmlEntities= new Zend\Filter\HtmlEntities();
echo $htmlEntities->filter('&');  // Output: &amp;
echo $htmlEntities->filter('"');  // Output: &quot;
