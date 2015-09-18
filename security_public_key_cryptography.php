<?php
include 'init_autoloader.php';

use Zend\Crypt\PublicKey\Rsa;                                                                                                            
use Zend\Crypt\PublicKey\RsaOptions;  

// generate a key pair
$rsa = new RsaOptions(array('pass_phrase' => 'the password is pistachio'));

$rsa->generateKeys(array('private_key_bits' => 2048));

file_put_contents(__DIR__ . '/keys/private.pem', $rsa->getPrivateKey());
file_put_contents(__DIR__ . '/keys/public.pub',  $rsa->getPublicKey());

// encrypt a string
$rsa = Rsa::factory(array(
  'public_key'    => __DIR__ . '/keys/public.pub',
  'pass_phrase'   => 'the password is pistachio',
  'binary_output' => false,
));                                                                                     
$text = 'This is my super awesome secret';                                             
file_put_contents(__DIR__ . '/keys/cipher_text', $rsa->encrypt($text));

// decrypt a string
$rsa = Rsa::factory(array(                                  
  'private_key'   => __DIR__ . '/keys/private.pem',
  'pass_phrase'   => 'the password is pistachio',
  'binary_output' => false,
));                                                                      
$cipher_text = file_get_contents(__DIR__ . '/keys/cipher_text');                                     
echo $rsa->decrypt($cipher_text), "\n";
