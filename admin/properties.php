<?php

$page = 'properties';
$render = false;

require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

if (isset($_GET['img_id'])) {
    $img_id = array($_GET['img_id']);
    $record = get_records($result['img_data'], $img_id)[0];

    if (empty($record)) {
        $msg = 'There is no record for id = ' . $_GET['img_id'] . '.';
    } else {
        $item_terms = get_terms($result['term_rels'], $_GET['img_id']);
        $img_path = $home . $record['file_path'] . $record['file_name'] . '.' . $record['file_ext'];
        $render = true;
    }
} else {
    $msg = 'There is no record for that entry.';
}

require('../views/view-properties.php');
require_once('../inc/footer.php');
