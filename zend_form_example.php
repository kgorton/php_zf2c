<?php
include 'init_autoloader.php';

$form = new Zend\Form\Form('test');
$name = new Zend\Form\Element\Text('name');
$name->setLabel('Name');
$submit = new Zend\Form\Element\Submit('submit');
$submit->setAttribute('value', 'Submit');
$form->add($name)->add($submit);

$viewModel = new Zend\View\Model\ViewModel(array('form' => $form));
$viewModel->setTemplate('zend_form_example.phtml');

$templatePathStack = new Zend\View\Resolver\TemplatePathStack();
$templatePathStack->addPath(__DIR__);

$renderer = new Zend\View\Renderer\PhpRenderer();
$renderer->setResolver($templatePathStack);
echo $renderer->render($viewModel);
