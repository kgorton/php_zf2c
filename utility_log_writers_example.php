<?php
include 'init_autoloader.php';

$writer= new Zend\Log\Writer\Stream('php://output');
$logger= new Zend\Log\Logger();
$logger->addWriter($writer);
$logger->info('Informational message');
// We can use this to write to an application log file as follows:
$logfile = @fopen(__DIR__ . '/application.log', 'a', false);
if (!$logfile) {
    throw new Exception('Could not open logfile');
}

$writer = new Zend\Log\Writer\Stream($logfile);
$logger = new Zend\Log\Logger();
$logger->addWriter($writer);
$logger->info('Informational message');
