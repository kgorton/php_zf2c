<?php
// what is the output of this code?

include 'init_autoloader.php';

define('FN', 'test.txt');
file_put_contents(FN, "\n");

$em = new Zend\EventManager\EventManager();
$em->attach('test', function() { echo "1"; file_put_contents(FN, "1\n", FILE_APPEND);}, 1);
$em->attach('test', function() { echo "2"; file_put_contents(FN, "2\n", FILE_APPEND);}, 2);
$em->attach('test', function() { echo "3"; file_put_contents(FN, "3\n", FILE_APPEND);}, 3);
$em->attach('test', function() { echo "4"; file_put_contents(FN, "4\n", FILE_APPEND);}, 4);
$em->attach('test', function() { echo "5"; file_put_contents(FN, "5\n", FILE_APPEND);}, 5);
$em->attach('test', function() { echo "6"; file_put_contents(FN, "6\n", FILE_APPEND);}, 6);
$em->trigger('test', 'test', [], function () { return count(file(FN)) > 3; });
