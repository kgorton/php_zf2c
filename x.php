<?php
$x = 12345;

function y($a, $b, $x)
{
	//global $x;
	$a += $x;
	$obj = new stdClass();
	$obj->a = $a;
	$obj->b = $b;
	return $obj;
}

