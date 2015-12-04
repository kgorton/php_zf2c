<?php
namespace Foo;
use Zend\ServiceManager\AbstractFactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
class Module
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

