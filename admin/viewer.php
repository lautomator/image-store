<?php

$page = 'viewer';
$all_cart_img_ids = array();
$all_cart_records = array();
$image_sequence = '1';
$ordered_ids = array();

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

// parse the POST array and get the image ids
if (isset($_POST)) {
    foreach ($_POST as $item) {
        if (key($_POST) != 'viewer') {
            if (key($_POST) != 'imgSequence') {
                array_push($all_cart_img_ids, $item);
            }
        }
        next($_POST);
    }

    $image_sequence = explode(',', $_POST['imgSequence']);

    // get the full records from the ids
    $all_cart_records = get_records($result['img_data'], $all_cart_img_ids);

    // reorder the images according to the sequence
    $final_cart_records = sort_cart_items($all_cart_records, $image_sequence);

    // set up the render
    $cart_grid = ceil(12 / $cart_size);

    if ($cart_size <= 6) {
        $cart_grid = ceil(12 / $cart_size);
    } else {
        // cart size > 6
        $cart_grid = 2;
    }
}

require('../views/view-viewer.php');
require_once('../inc/footer.php');
