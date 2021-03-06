<?php
include 'init_autoloader.php';

use Zend\Authentication\Result;
use Zend\Authentication\Adapter\AbstractAdapter;
use Zend\Authentication\Adapter\AdapterInterface;

class TestAdapter extends AbstractAdapter implements AdapterInterface
{
    public function authenticate()
    {
        if ($this->getIdentity() == $this->getCredential()) {
            $code = Result::SUCCESS;
        } else {
            $code = Result::FAILURE;
        }
        return new Result($code, $this->getIdentity());

    }
}

$authAdapter = new TestAdapter();

$authAdapter->setCredential('good');
$authAdapter->setIdentity('good');
$attempt = $authAdapter->authenticate();
echo ($attempt->isValid()) ? 'SUCCESS: ' : 'FAILURE: ';
echo 'Identity: ' . $attempt->getIdentity();
echo PHP_EOL;

$authAdapter->setCredential('test');
$authAdapter->setIdentity('noGood');
$attempt = $authAdapter->authenticate();
echo ($attempt->isValid()) ? 'SUCCESS: ' : 'FAILURE: ';
echo 'Identity: ' . $attempt->getIdentity();
echo PHP_EOL;
