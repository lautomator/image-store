<?php

require_once('data.php');
require_once('main.php');

# set the value of the maximum value of the upload in bytes
$max = 5000000;
$ul_file_name = '';
$ul_file_ext = '';
$ul_file_path = '';
$col_vals = '';
$image_names = get_image_names($result['img_data']);
$dup_names = array();
$unq_names = array();

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
        $upload_file_info = $upload->getFileInfo();
        $upload_status = $upload->getUploadStatus();
        // $upload_result = $upload->getMessages();
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

// upload is a success, can write to databse
if (isset($upload_file_info)) {
    if ($upload_status == 0) {
        $ul_file_path = str_replace('../', '', $destination);

        require_once('settings.php');

        // split the file name and extension; assign the upload path
        foreach ($upload_file_info as $ul) {
            $ul_file_parts = get_file_parts($ul, $extensions_in);
            $ul_file_name = $ul_file_parts['name'];
            $ul_file_ext = $ul_file_parts['ext'];

            // check for a duplicate name
            if (count($image_names) > 0) {
                if (! check_for_dup_file_names($ul_file_name, $image_names)) {
                    $col_vals .= '(' . '"' . $ul_file_path . '"' . ', ' . '"' . $ul_file_name . '"' . ', ' . '"' . $ul_file_ext . '"' . '),';
                    array_push($unq_names, $ul_file_name);
                } else {
                    array_push($dup_names, $ul_file_name);
                }
            } else {
                // adding images for the first time
                $col_vals .= '(' . '"' . $ul_file_path . '"' . ', ' . '"' . $ul_file_name . '"' . ', ' . '"' . $ul_file_ext . '"' . '),';
                array_push($unq_names, $ul_file_name);
            }
        }

        if ($col_vals != '') {
            $col_vals = trim($col_vals, ',');

            require_once('connect.php');

            if ($success) {
                $sql = 'INSERT INTO images (file_path, file_name, file_ext) VALUES ' . $col_vals;

                if (!mysqli_query($link, $sql)) {
                    $err_msg = 'There was a problem writing to the database.';
                }
                mysqli_close($link);
            } else {
                $err_msg = 'There was a problem connecting to the databse.';
            }
        }
    }
}

