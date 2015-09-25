<?php
include 'init_autoloader.php';

$filter = new Zend\I18n\Filter\Alnum();
?>
<!DOCTYPE html>
<head>
	<title>I18n Alnum Filter</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>
<?php
echo $filter->filter("This is (my) contént: 123") . PHP_EOL; 
// Thisismycontént123

// First param in constructor is $allowWhiteSpace
$filter = new \Zend\I18n\Filter\Alnum(true);

echo $filter->filter("This is (my) contént: 123") . PHP_EOL; 
// This is my contént 123

// Second param in constructor is locale, 
// (ja, ko, and zh will use a-z and not all Unicode 
// letter category letters.)
$filter = new \Zend\I18n\Filter\Alnum(true , 'ja'); 

echo $filter->filter("This is (my) contént: 123") . PHP_EOL; 
// This is my content 123
?>
</body>
</html>
