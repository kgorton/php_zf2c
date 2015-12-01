<?php
// launch using filters_file_upload_example.html

include 'init_autoloader.php';

use Zend\Filter;
use Zend\Validator;
use Zend\InputFilter\Input;
use Zend\InputFilter\FileInput;
use Zend\InputFilter\InputFilter;
use Zend\Http\PhpEnvironment\Request;

// target upload directory
// be sure to set the appropriate permissions to the php / web server user
$dir = __DIR__ . '/data';

// Description text input
$description = new Input('description'); // Standard Input type
$description->getFilterChain() // Filters run 1st w/ Input 
            ->attach(new Filter\StringTrim());

$description->getValidatorChain() // Validators run 2nd w/ Input
             ->attach( new Validator\StringLength(array('max' => 140)));

// File upload input
$file = new FileInput('file'); // Special File Input type
$file->getValidatorChain() // Validators run 1st w/ FileInput
     ->attach(new Validator\File\UploadFile());

$file->getFilterChain() // Filters run 2nd w/ FileInput
     ->attach(new Filter\File\RenameUpload(array('target' => $dir, 'randomize' => true ,)));

// Merge $_POST and $_FILES data together
$request = new Request();
$postData = array_merge_recursive($request->getPost()->getArrayCopy(), 
                                  $request->getFiles()->getArrayCopy());

$inputFilter = new InputFilter();
$inputFilter->add($description)
			->add($file)
			->setData($postData);

if ($inputFilter->isValid()) {
    // FileInput validators are run, but not the filters
    echo "The form is valid \n ";
    $data = $inputFilter->getValues();
    // This is when the FileInput filters are run. 
} else {
    echo "The form is not valid \n ";
    foreach ($inputFilter->getInvalidInput() as $error) {
        print_r($error->getMessages());
    }
} 

echo '<br />Files in ' . $dir . ':' . PHP_EOL;
echo '<ul>' . PHP_EOL;
foreach (new DirectoryIterator($dir) as $fileInfo) {
    if(!$fileInfo->isDot()) echo '<li>' . $fileInfo->getFilename() . "</li>\n";
}
echo '</ul>' . PHP_EOL;

echo '<a href="filters_file_upload_example.html">BACK</a>' . PHP_EOL;

// show post info
phpinfo(INFO_VARIABLES);

