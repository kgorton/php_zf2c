<?php

include 'init_autoloader.php';

use Zend\Stdlib\Hydrator\Aggregate\HydrateEvent;
use Zend\Stdlib\Hydrator\Aggregate\ExtractEvent;

class Test
{
    protected $test = 1;
    public function setTest($test)
    {
        $this->test = $test;
    }
    public function getTest()
    {
        return $this->test;
    }
}

$hydrateListener = function (HydrateEvent $e) { echo 1; echo PHP_EOL; };
$extractListener = function (ExtractEvent $e) { echo 2; echo PHP_EOL; };

$test = new Test();
$hydrator = new Zend\Stdlib\Hydrator\Aggregate\AggregateHydrator;
$hydrator->add(new Zend\Stdlib\Hydrator\ClassMethods());
$hydrator->getEventManager()->attach(HydrateEvent::EVENT_HYDRATE, $hydrateListener, 999);
$hydrator->getEventManager()->attach(ExtractEvent::EVENT_EXTRACT, $extractListener, 999);
$hydrator->hydrate(['test' => 2], $test);
var_dump($hydrator->extract($test));
