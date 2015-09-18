<?php
// what is the output of this code?

include 'init_autoloader.php';

use Zend\ModuleManager\ModuleEvent;

echo ModuleEvent::EVENT_LOAD_MODULES;
echo ModuleEvent::EVENT_LOAD_MODULES_POST;

