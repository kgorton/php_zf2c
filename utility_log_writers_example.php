<?php
// Q: which message(s) will NOT appear in "application.log" (choose 2)?
// A: (A) 1 (B) 2 (C) 3 (D) 4 (E) 5 (F) 6
include 'init_autoloader.php';

use Zend\Log\Writer\Stream;
use Zend\Log\Logger;
use Zend\Log\Filter\Priority;

$logfile = 'application.log';
file_put_contents($logfile, '');

$logger  = new Logger();
$writer1 = new Stream('php://output');
$writer2 = new Stream($logfile);
$logger->addWriter($writer1);
$logger->addWriter($writer2);

$logger->log(Logger::INFO, '1');
$logger->info('2');

$filter = new Priority(Logger::CRIT);
$writer2->addFilter($filter);

$logger->emerg('3');
$logger->crit('4');
$logger->err('5');
$logger->notice('6');

echo "---------------------------------------------------------------\n";
echo "Contents of log file: \n";
echo "---------------------------------------------------------------\n";
readfile('application.log');

// You can also use a file handle as an argument to Zend\Log\Writer\Stream:
/*
$fh = @fopen($logfile, 'a', false);
if (!$fh) {
    throw new Exception('Could not open logfile');
}
$writer = new Stream($fh);
*/

