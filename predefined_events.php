<?php
include 'init_autoloader.php';

use Zend\ModuleManager\ModuleEvent;
use Zend\Mvc\MvcEvent;
use Zend\View\ViewEvent;

$events = [
    'ModuleEvent::EVENT_LOAD_MODULE'         => ModuleEvent::EVENT_LOAD_MODULE,
    'ModuleEvent::EVENT_LOAD_MODULES'        => ModuleEvent::EVENT_LOAD_MODULES,
    'ModuleEvent::EVENT_LOAD_MODULE_RESOLVE' => ModuleEvent::EVENT_LOAD_MODULE_RESOLVE,
    'ModuleEvent::EVENT_LOAD_MODULES_POST'   => ModuleEvent::EVENT_LOAD_MODULES_POST,
    'MvcEvent::EVENT_BOOTSTRAP'              => MvcEvent::EVENT_BOOTSTRAP,            
    'MvcEvent::EVENT_DISPATCH'               => MvcEvent::EVENT_DISPATCH,    
    'MvcEvent::EVENT_DISPATCH_ERROR'         => MvcEvent::EVENT_DISPATCH_ERROR,
    'MvcEvent::EVENT_FINISH'                 => MvcEvent::EVENT_FINISH,
    'MvcEvent::EVENT_RENDER'                 => MvcEvent::EVENT_RENDER,       
    'MvcEvent::EVENT_RENDER_ERROR'           => MvcEvent::EVENT_RENDER_ERROR,  
    'MvcEvent::EVENT_ROUTE'                  => MvcEvent::EVENT_ROUTE,
    'ViewEvent::EVENT_RENDERER'              => ViewEvent::EVENT_RENDERER,
    'ViewEvent::EVENT_RENDERER_POST'         => ViewEvent::EVENT_RENDERER_POST,
    'ViewEvent::EVENT_RESPONSE'              => ViewEvent::EVENT_RESPONSE,
];                      

echo "<pre>\n";
foreach ($events as $class => $event) {
    printf("%38s | %30s\n", $class, $event);
}
echo "</pre>\n";

