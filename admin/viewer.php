<?php

$page = 'viewer';
$all_cart_img_ids = array();
$all_cart_records = array();

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

// parse the POST array and get the image ids
if (isset($_POST)) {
    foreach ($_POST as $item) {
        if ($item != 'View') {
            array_push($all_cart_img_ids, $item);
        }
    }

    // get the full records from the ids
    $all_cart_records = get_records($result['img_data'], $all_cart_img_ids);
}

require('../views/view-viewer.php');
require_once('../inc/footer.php');
