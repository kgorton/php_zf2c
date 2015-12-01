<?php
include 'init_autoloader.php';

class NewConfig extends Zend\ModuleManager\Listener\ConfigListener
{
	public $configs = array();
	public $paths   = array();
	public function addConfig($key, $config)
	{
		return parent::addConfig($key, $config);
	}
}

class Foo
{
	public function getConfig()
	{
		return array('service_manager' => array(
			'abstract_factories' => array(
				'foo' => 'AbstractFooBarFactory',
			),
		));
	}
	
	public function getServiceConfig()
	{
		return array(
			'abstract_factories' => array(
				'AbstractBazFactory',
			),
		);
	}
}

class Bar
{
	public function getConfig()
	{
		return array('service_manager' => array(
			'abstract_factories' => array(
				'bar' => 'AbstractFooBarFactory',
			),
		));
	}
	
	public function getServiceConfig()
	{
		return array(
			'abstract_factories' => array(
				'AbstractBazFactory',
			),
		);
	}
}

$foo = new Foo();
$bar = new Bar();
$configListener = new NewConfig();
$configListener->addConfig(1, $foo->getConfig()['service_manager']);
$configListener->addConfig(2, $foo->getServiceConfig());
$configListener->addConfig(3, $bar->getConfig()['service_manager']);
$configListener->addConfig(4, $bar->getServiceConfig());
$configListener->onMergeConfig(new Zend\ModuleManager\ModuleEvent);
//var_dump($configListener->getMergedConfig()->toArray());
var_dump($configListener);




