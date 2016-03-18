<?php
include 'init_autoloader.php';

class Pizza
{
    public $pepperoni;
}

use Zend\EventManager\SharedEventManager;
use Zend\EventManager\EventManager;
use Zend\EventManager\Event;

$shared = new SharedEventManager();

$shared->attach('*','add',function(Event $e) { echo "Wild\n"; });
$shared->attach('Test','add',function(Event $e) { echo "Test\n"; });
$shared->attach('Other','add',function(Event $e) { echo "Other\n"; });

$event = new EventManager('Test');
$event->setSharedManager($shared);

$event->trigger('add', new Pizza());  // Output “Test\nWild\n”
