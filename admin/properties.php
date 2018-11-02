<?php

$page = 'properties';
$render = false;

require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

if (isset($_GET['img_id'])) {
    $img_id = $_GET['img_id'];
    $record = get_records($result['img_data'], array($img_id))[0];

    if (empty($record)) {
        $msg = 'There is no record for id = ' . $img_id . '.';
    } else {
        $item_terms = get_terms($result['term_rels'], $_GET['img_id']);
        $img_path = $home . $record['file_path'] . $record['file_name'] . '.' . $record['file_ext'];
        $tag_names = get_all_term_names($result['terms']);

        // get any error reportage
        if (isset($_GET['err'])) {
             $err_msg = $_GET['err'];
        }

        $render = true;
    }
} else {
    $msg = 'There is no record for that entry.';
}

require('../views/view-properties.php');
require('../views/view-tags-add-form.php');
require_once('../inc/footer.php');