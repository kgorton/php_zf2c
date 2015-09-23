<?php
// Given the following class Test
// What will be the value of $diff?

include 'init_autoloader.php';

class Test
{
    protected $test    = 1;
    protected $my_test = 2;
    protected $myTest  = 3;    
    public function getTest()    { return $this->test;    }
    public function getMy_test() { return $this->my_test; }
    public function getMyTest()  { return $this->myTest;  }
}

$test      = new Test();
$hydrator1 = new Zend\Stdlib\Hydrator\Reflection();
$hydrator2 = new Zend\Stdlib\Hydrator\ClassMethods();
$diff      = ($hydrator1->extract($test)) == ($hydrator2->extract($test));
var_dump($diff);
