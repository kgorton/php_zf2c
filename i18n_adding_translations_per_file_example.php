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
echo PHP_EOL;
echo $translator->translate('Welcome', 'mystrings', 'fr'); // Bienvenue
echo PHP_EOL;
echo $translator->translate('Welcome', 'mystrings', 'en'); // Welcome
echo PHP_EOL;
