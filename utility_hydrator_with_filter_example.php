<?php
// NOTE: doesn't work!!!!

class Test
{
    protected $filtered = 'FILTERED';
    protected $testOne  = 'TEST1';
    protected $testTwo  = 'TEST1';

    public function getFiltered() { return $this->filtered; }
    public function getTestOne()  { return $this->testOne;  }
    public function getTestTwo()  { return $this->testTwo;  }
    public function setFiltered($a) { $this->filtered = $a; }
    public function setTestOne($a)  { $this->testOne  = $a; }
    public function setTestTwo($a)  { $this->testTwo  = $a; }
}

include 'init_autoloader.php';

use Zend\Stdlib\Hydrator;

$hydrator = new Hydrator\ClassMethods();
$hydrator->addFilter('test', new Hydrator\Filter\MethodMatchFilter('getTest*', FALSE), 0);
//$hydrator->addFilter('test', new Hydrator\Filter\GetFilter());

$result = $hydrator->extract(new Test());
print_r($result);
