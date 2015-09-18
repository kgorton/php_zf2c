<?php
include 'init_autoloader.php';

// locale/de/messages.php
// 
// return array(
//     'Welcome' => 'Willkommen'
// );

use Zend\I18n\Translator\Translator;

$translator = new Translator();

$type       = 'phparray';
$pattern    = 'locale/%s/messages.php';
$textDomain = 'mystrings';

$translator->setLocale('de');
$translator->addTranslationFilePattern($type, __DIR__, $pattern, $textDomain);

echo $translator->translate('Welcome', 'mystrings'); // Willkommen
