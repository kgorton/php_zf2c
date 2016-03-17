<?php
include 'init_autoloader.php';

use Zend\Crypt\BlockCipher;

$cipher = BlockCipher::factory('mcrypt', array('algo' => 'aes'));
$cipher->setKey('changeme11');
$result = $cipher->encrypt('my super awesome secret');
echo $result;
echo PHP_EOL;

echo $cipher->decrypt($result);
echo PHP_EOL;
