<?php
namespace Bar;

class Module
{
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/' . __NAMESPACE__,
                ),
            ),
        );
    }
    
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
        // this will cause a parse error
        /*
        'abstract_factories' => array(
            'AbstractBazFactory'
        ),
        */
        // this throws an exception because the return value *must* be an array!
        /*
        array('abstract_factories' => array(
                'AbstractBazFactory',
            ),
        );
        */
        // let's assume this:
        return array('abstract_factories' => array(
                'AbstractBazFactory',
            ),
        );
    }
}
