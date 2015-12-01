<?php
include 'init_autoloader.php';

// Zend\I18n\View\Helper\CurrencyFormat()
// __invoke(float $number, string $currencyCode, bool $showDecimals, string $locale, string $pattern) : string

$currencyFormat = new Zend\I18n\View\Helper\CurrencyFormat();
$currencyFormat->setCurrencyCode('THB');	// sets default currency
?>
<!DOCTYPE html>
<head>
	<title>I18n Currency Example</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php	
printf("1: %s\n2: %s\n3: %s\n4: %s\n5: %s\n6: %s\n",
		$currencyFormat(1234.56, 'USD', NULL ,'en_US'), // $1,234.56
		$currencyFormat(1234.56, 'EUR', NULL ,'de_DE'), // 1.234,56 €
		$currencyFormat(1234.56, NULL,  TRUE),          // ฿1,234.56
		$currencyFormat(1234.56, NULL,  FALSE),         // ฿1,234
		$currencyFormat(12345678.90, 'EUR', TRUE,  'de_DE', '#0.# kg'), // 12345678,90 kg
		$currencyFormat(12345678.90, 'EUR', FALSE, 'de_DE', '#0.# kg')  // 12345679 kg
);
?>
</body>

</html>
