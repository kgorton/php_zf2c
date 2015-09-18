<?php
include 'init_autoloader.php';

use Zend\ModuleManager\ModuleEvent;
use Zend\Mvc\MvcEvent;
use Zend\View\ViewEvent;

$events = array(
	'Zend\ModuleManager\ModuleEvent' => array(
	    'ModuleEvent::EVENT_LOAD_MODULE'         => ModuleEvent::EVENT_LOAD_MODULE,
		'ModuleEvent::EVENT_LOAD_MODULES'        => ModuleEvent::EVENT_LOAD_MODULES,
		'ModuleEvent::EVENT_LOAD_MODULE_RESOLVE' => ModuleEvent::EVENT_LOAD_MODULE_RESOLVE,
		'ModuleEvent::EVENT_LOAD_MODULES_POST'   => ModuleEvent::EVENT_LOAD_MODULES_POST,),
	'Zend\Mvc\MvcEvent' => array(	
		'MvcEvent::EVENT_BOOTSTRAP'              => MvcEvent::EVENT_BOOTSTRAP,            
		'MvcEvent::EVENT_DISPATCH'               => MvcEvent::EVENT_DISPATCH,    
		'MvcEvent::EVENT_DISPATCH_ERROR'         => MvcEvent::EVENT_DISPATCH_ERROR,
		'MvcEvent::EVENT_FINISH'                 => MvcEvent::EVENT_FINISH,
		'MvcEvent::EVENT_RENDER'                 => MvcEvent::EVENT_RENDER,       
		'MvcEvent::EVENT_RENDER_ERROR'           => MvcEvent::EVENT_RENDER_ERROR,  
		'MvcEvent::EVENT_ROUTE'                  => MvcEvent::EVENT_ROUTE,),
	'Zend\View\ViewEvent' => array( 
		'ViewEvent::EVENT_RENDERER'              => ViewEvent::EVENT_RENDERER,
		'ViewEvent::EVENT_RENDERER_POST'         => ViewEvent::EVENT_RENDERER_POST,
		'ViewEvent::EVENT_RESPONSE'              => ViewEvent::EVENT_RESPONSE,),
);                      

echo '<ul>' . PHP_EOL;
foreach ($events as $class => $eventList) {
	echo '<li>' . $class . PHP_EOL;
	echo '<ul>' . PHP_EOL;
	foreach ($eventList as $key => $value) {
		printf('<li><pre>%40s : %20s</pre></li>' . PHP_EOL, $key, $value);
	}
	echo '</ul>' . PHP_EOL;
	echo '</li>' . PHP_EOL;
}
echo '</ul>' . PHP_EOL;