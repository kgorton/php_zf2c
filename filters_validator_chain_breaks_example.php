<?php
// launch using filters_file_upload_example.html

include 'init_autoloader.php';

// alphanumeric validation won’t occur 
// if string length validation fails
$validatorChain = new Zend\Validator\ValidatorChain();
$validatorChain->attach(new Zend\Validator\StringLength(array ('min' => 7, 'max' => 12)), true)
               ->attach(new Zend\I18n\Validator\Alnum());
               
// Validate the username
//$testNames = array('short!', 'invalid!', 'usernameIsWayTooLong!', 'username_OK');
$testNames = array('short!');
foreach ($testNames as $username) {
	if ($validatorChain->isValid($username)) {
		echo $username . ' is valid' . PHP_EOL;
	} else {
		// username failed validation; print reasons_
		foreach ($validatorChain->getMessages() as $message) {
			echo "$message \n ";
		}
	}
}			


