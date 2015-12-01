<?php
include 'init_autoloader.php';

use Zend\View\Helper;

$escapeHtml = new Helper\EscapeHtml();
$escapeAttr = new Helper\EscapeHtmlAttr();
$escapeJs   = new Helper\EscapeJs();
$escapeCss  = new Helper\EscapeCss();

printf("%14s | %40s\n", 'escapeHtml', $escapeHtml('<bad>Tag</bad>'));
printf("%14s | %40s\n", 'escapeHtmlAttr', '<a href="' . $escapeAttr('bad.site/?<script>test</script>') . '">TEST</a>');
printf("%14s | %40s\n", 'escapeJs', 'var=' . $escapeJs('1;document.submit()'));
printf("%14s | %40s\n", 'escapeCss', 'style="background-image:' . $escapeCss('very.bad.website/?exec=kill'));
