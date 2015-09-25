<?php
include 'init_autoloader.php';

/*
<?php
// locale/fr/messages.php
return array(
    'Welcome' => 'Bienvenue',
    'to'      => 'a',
    'my'      => ['mon','mes'],
    'my2'     => '',
    'house'   => ['maison','maisons'],
    'houses'  => '',
);
*/

use Zend\I18n\Translator\Translator;
use Zend\EventManager\EventManager;

$translator = new Translator();
$evm        = new EventManager();
$type       = 'phparray';
$pattern    = 'locale/%s/messages.php';
$textDomain = 'mystrings';

$translator->setEventManager($evm);
$translator->enableEventManager();
$translator->addTranslationFilePattern($type, __DIR__, $pattern, $textDomain);

// attach listeners to translation events
$listenerMissing   = function ($e) { echo "Missing Translation\n"; };
$listenerNotLoaded = function ($e) { echo "Messages Not Loaded\n"; };
$evm->attach(Translator::EVENT_MISSING_TRANSLATION, $listenerMissing);
$evm->attach(Translator::EVENT_NO_MESSAGES_LOADED,  $listenerNotLoaded);

// translate a single message
printf("%s %s %s %s\n", 
		$translator->translate('Welcome', 'mystrings', 'fr'),   // Bienvenue
		$translator->translate('to',      'mystrings', 'fr'),   // a
		$translator->translatePlural('my',    'my2',    1, 'mystrings', 'fr'),  // mon
		$translator->translatePlural('house', 'houses', 1, 'mystrings', 'fr')   // maison
);

// translate a plural message
printf("%s %s %s %s\n", 
		$translator->translate('Welcome', 'mystrings', 'fr'),                   // Bienvenue
		$translator->translate('to',      'mystrings', 'fr'),                   // a
		$translator->translatePlural('my',    'my2',    2, 'mystrings', 'fr'),  // mes
		$translator->translatePlural('house', 'houses', 2, 'mystrings', 'fr')   // maisons
);
