<?php
// Q: what is the output of this code?
// A: (A) ["test" => 1, "my_test" => 2]
//    (B) ["test" => 1, "my_test" => 2, "myTest" => 3]
//    (C) None of the above

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

$test = new Test();
$hydrator = new Zend\Stdlib\Hydrator\ClassMethods();
Zend\Debug\Debug::dump($hydrator->extract($test));
