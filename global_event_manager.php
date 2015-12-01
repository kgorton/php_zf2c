<?php
// demonstrates using the global event manager

include 'init_autoloader.php';

use Zend\EventManager\GlobalEventManager;

$callback1 = function ($e) { echo '1'; };
$callback2 = function ($e) { echo '2'; };
$callback3 = function ($e) { echo '3'; };

GlobalEventManager::attach('test1', $callback1);
GlobalEventManager::attach('test2', $callback1, -999);
GlobalEventManager::attach('test2', $callback2);
GlobalEventManager::attach('test2', $callback3, 999);

GlobalEventManager::trigger('test1', '1');
GlobalEventManager::trigger('test2', '2');
