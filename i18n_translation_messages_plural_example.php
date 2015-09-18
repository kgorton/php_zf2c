<?php
// NOTE: not 100% working!!!
include 'init_autoloader.php';

// locale/fr/messages.php
/*
<?php
return array(
    'Welcome' => 'Bienvenue',
    'to'   => 'a',
    'my house'   => 'mon maison',
    'my houses'  => 'mes maisons',
);
*/

use Zend\I18n\Translator\Translator;

$translator = new Translator();

$type       = 'phparray';
$pattern    = 'locale/%s/messages.php';
$textDomain = 'mystrings';

$translator->addTranslationFilePattern($type, __DIR__, $pattern, $textDomain);

// translate a single message
printf("%s %s %s %s\n", 
		$translator->translate('Welcome', 'mystrings', 'fr'),  // Bienvenue
		$translator->translate('to', 'mystrings', 'fr'),          // a
		$translator->translate('my', 'mystrings', 'fr'),  // mon maison
		$translator->translate('house', 'mystrings', 'fr')  // mon maison
);

// translate a plural message
printf("%s %s %s \n", 
		$translator->translate('Welcome', 'mystrings', 'fr'),  // Bienvenue
		$translator->translate('to', 'mystrings', 'fr'),          // a
		$translator->translatePlural('my', 'my2', 2, 'mystrings', 'fr'),  // mon maison
		$translator->translatePlural('house', 'houses', 2, 'mystrings', 'fr')  // mon maison
);
