<?php

$page = 'register';

require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

# set the value of the maximum value of the upload in bytes
$max = 5000000;

# move the file out of its temp location to another location
if (isset($_POST['upload'])) {
    # define the path to the upload folder
    $destination = '../uploads/';
    # call the upload class
    require_once('../inc/uploader.php');
    try {
        $upload = new IsUpload($destination);
        $upload->setMaxSize($max);
        // $upload->addPermittedTypes(array('application/pdf', 'text/plain'));
        # you can also set a permitted type if you just want one file type
        # $upload->setPermittedTypes('text/plain');
        $upload->move(true);
        $upload_result = $upload->getMessages();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

require('../views/view-register.php');
require_once('../inc/footer.php');
