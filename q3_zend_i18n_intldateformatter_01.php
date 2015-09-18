<?php
include 'init_autoloader.php';

use Zend\I18n\View\Helper\DateFormat;

$dateFormat = new DateFormat();
$myDate = new DateTime('now');

// Generates PHP warning
echo "1  --------------------------------------------------------------------------\n";
echo "\$myDate->format(IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE, 'fr-FR');\n";
echo "-----------------------------------------------------------------------------\n";
echo $myDate->format(IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE, 'fr-FR');
echo PHP_EOL . PHP_EOL;

// NOTE: this works OK ... but doesn't hide the time
echo "2  --------------------------------------------------------------------------\n";
echo "\$this->dateFormat(\$myDate, IntlDateFormatter::MEDIUM, null, 'fr-FR');\n";
echo "-----------------------------------------------------------------------------\n";
echo $dateFormat($myDate, IntlDateFormatter::MEDIUM, null, 'fr-FR');
echo PHP_EOL . PHP_EOL;

// Generates PHP warning
echo "3  --------------------------------------------------------------------------\n";
echo "\$myDate->format(IntlDateFormatter::MEDIUM, null, 'fr-FR');\n";
echo "-----------------------------------------------------------------------------\n";
echo $myDate->format(IntlDateFormatter::MEDIUM, null, 'fr-FR');
echo PHP_EOL . PHP_EOL;

// NOTE: hides the time part
echo "4  [CORRECT] ----------------------------------------------------------------\n";
echo "\$this->dateFormat(\$myDate, IntlDateFormatter::MEDIUM, null, 'fr-FR');\n";
echo "-----------------------------------------------------------------------------\n";
echo $dateFormat($myDate, IntlDateFormatter::MEDIUM, IntlDateFormatter::NONE, 'fr-FR');


