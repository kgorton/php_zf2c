<?php
include 'init_autoloader.php';

// Write log entries to test log
$log    = __DIR__ . '/test.log';
file_put_contents($log, '');
$logger = new Zend\Log\Logger();
$writer = new Zend\Log\Writer\Stream($log);
$logger->addWriter($writer);
Zend\Log\Logger::registerErrorHandler($logger);
Zend\Log\Logger::registerExceptionHandler($logger);

echo 'Notice: ' . $a + 1 . PHP_EOL;

try {
	throw new Exception('Logger error handling test');
} catch (Exception $e) {
	echo 'Exception caught' . PHP_EOL;
}

echo PHP_EOL;
readfile($log);
