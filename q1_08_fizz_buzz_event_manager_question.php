<?php
include 'init_autoloader.php';

$evm = new Zend\EventManager\EventManager();
$num = 1;
$listener1 = function () use (& $num) { $num++; };
$listener2 = function () use (& $num) { if (!($num % 5)) echo "fizzbuzz\n"; };
$listener3 = function () use (& $num) { if (!($num % 2)) echo "fizz\n"; };
$listener4 = function () use (& $num) { if (!($num % 3)) echo "buzz\n"; };
$listener5 = function ($e) use (& $num) { if ($num > 5) { $e->stopPropagation(true); }};
$listener6 = function () use ($evm) { $evm->trigger('fizzbuzzevm'); };

$evm->attach('fizzbuzzevm', $listener1, 6);
$evm->attach('fizzbuzzevm', $listener2, 5);
$evm->attach('fizzbuzzevm', $listener3, 4);
$evm->attach('fizzbuzzevm', $listener4, 3);
$evm->attach('fizzbuzzevm', $listener5, 2);
$evm->attach('fizzbuzzevm', $listener6, 1);

$evm->trigger('fizzbuzzevm');
