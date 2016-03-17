<?php
include 'init_autoloader.php';

use Zend\Crypt\Password\Bcrypt;

$password = 'password11';

$bcrypt = new Bcrypt(array('cost' => 13));
$hash = $bcrypt->create($password);

echo $password . PHP_EOL;
echo $hash . PHP_EOL;

// Later...
if ($bcrypt->verify($password, $hash)) {
    echo "The password is correct! \n";
} else {
    echo "The password is NOT correct.\n";
}
