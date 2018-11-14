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
        $upload->move(true);
        $upload_result = $upload->getMessages();
        $upload_file_info = $upload->getFileInfo();
        $upload_status = $upload->getUploadStatus();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

require('../views/view-register.php');
require_once('../inc/footer.php');

// testing
if (isset($upload_file_info)) {
    echo '<pre>';
    print_r($upload_file_info);
    echo '</pre>';
}

echo '<br><br>' . $upload_status;
