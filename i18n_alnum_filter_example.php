<?php
include 'init_autoloader.php';

$filter = new Zend\I18n\Filter\Alnum();

$content = array(
	'This is an example in English',
	'C\'est un example en français',
	'นี่คือตัวอย่างในไทย',
);
?>
<!DOCTYPE html>
<head>
	<title>I18n Alnum Filter</title>
	<meta http-equiv="content-type" content="text/html;charset=utf-8" />
</head>
<body>

<h3>Locale: en_US</h3>
    <ul>
    <?php
    $filter->setLocale('en_US');
    foreach ($content as $item) {
        echo '<li>' . $filter->filter($item) . '</li>';
        echo PHP_EOL;
    }
    ?>
    </ul>

<h3>Locale: fr_FR</h3>
    <ul>
    <?php
    $filter->setLocale('fr_FR');
    foreach ($content as $item) {
        echo '<li>' . $filter->filter($item) . '</li>';
        echo PHP_EOL;
    }
    ?>
    </ul>

<h3>Locale: th_TH</h3>
    <ul>
    <?php
    $filter->setLocale('th_TH');
    foreach ($content as $item) {
        echo '<li>' . $filter->filter($item) . '</li>';
        echo PHP_EOL;
    }
    ?>
    </ul>

</body>
</html>

