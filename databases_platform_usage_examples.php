<?php
include 'init_autoloader.php';

$platform = new Zend\Db\Adapter\Platform\Mysql();

ini_set('display_errors', 0);

// `first_name`
echo $platform->quoteIdentifier('first_name');
echo PHP_EOL;

// `
echo $platform->getQuoteIdentifierSymbol();
echo PHP_EOL;

// `schema`.`mytable`
echo $platform->quoteIdentifierChain(array('schema','mytable'));
echo PHP_EOL;

// '
echo $platform->getQuoteValueSymbol();
echo PHP_EOL;

// .
echo $platform->getIdentifierSeparator();
echo PHP_EOL;

// "foo" as "bar"
echo $platform->quoteIdentifierInFragment('foo as bar');
echo PHP_EOL;

// additionally, with some safe words:
// ("foo"."bar" = "boo"."baz")
echo $platform->quoteIdentifierInFragment('(foo.bar = boo.baz)', array('(', ')', '='));
echo PHP_EOL;

// 'myvalue'
echo $platform->quoteTrustedValue('trustedValue');
echo PHP_EOL;

// 'myvalue'
echo $platform->quoteValue('myvalue');
echo PHP_EOL;

// 'value', 'Foo O\\'Bar'
echo $platform->quoteValueList(array('value',"Foo O'Bar"));
echo PHP_EOL;

