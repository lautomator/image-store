<?php

$page = 'viewer';
$all_cart_img_ids = array();
$all_cart_records = array();
$image_sequence = array();
$ids_img_order = array();

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

// parse the POST array
if (isset($_POST)) {

    // setup POST vars
    foreach ($_POST as $item) {
        if (key($_POST) == 'item_' . $item) {
            array_push($all_cart_img_ids, $item);
        } else {
            if ($item != 'View') {
                array_push($image_sequence, $item - 1); //use zero as first index
            }
        }
        next($_POST);
    }

    $temp = $image_sequence;
    $count = 0;
    $valid = true;
    $redirect = 'Location: ' . $urls['cart'];

    // check to see that the order is valid and sequential
    foreach ($image_sequence as $ord) {
        foreach ($temp as $num) {
            if ($ord == $num) {
                $count += 1;

                if ($count > 1) {
                    $valid = false;
                    break;
                }
            }
        }
        $count = 0;
    }

    if ($valid) {
        // add the image ids and sequence to one array
        while ($index < count($all_cart_img_ids)) {
            array_push($ids_img_order, array('id' => $all_cart_img_ids[$index], 'ord' => $image_sequence[$index]));
            $index += 1;
        }

        // get the full records from the ids
        $all_cart_records = get_records($result['img_data'], $all_cart_img_ids);

        // reorder the images according to the sequence
        $final_cart_records = sort_cart_items($all_cart_records, $ids_img_order);

        // set up the render
        $cart_grid = ceil(12 / $cart_size);

        if ($cart_size <= 6) {
            $cart_grid = ceil(12 / $cart_size);
        } else {
            // cart size > 6
            $cart_grid = 2;
        }

        require('../views/view-viewer.php');
        require_once('../inc/footer.php');
    } else {
        header($redirect);
    }
}
