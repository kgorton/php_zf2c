<?php
include 'init_autoloader.php';

$acl = new Zend\Permissions\Acl\Acl();
$acl->addResource('articles');
$acl->addResource('blogPosts', 'articles');
$acl->addRole('member');
$acl->allow('member', 'blogPosts', 'read');

var_dump($acl->isAllowed('member', 'articles', 'read'));
