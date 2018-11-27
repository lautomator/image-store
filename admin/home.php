<?php

$set_ids = '';
$item_terms = array();


// process GET params
if (isset ($_GET['t'])) {
    // process a tag query
    $t = get_all_qs($_GET['t']);
    $record_ids = filter_records($result['term_rels'], $t);
    $records = get_records($result['img_data'], $record_ids);
} else {
    // get all of the records
    $records = $result['img_data'];
}

if (isset ($_GET['p'])) {
    // process a page query
    $current_page = $_GET['p'];
} else {
    $current_page = $default_page;
}

if (isset($_POST['qTags'])) {
    require_once('inc/select-tags.php');
    if (isset($q)) {
        if (count($q) > 0) {
            $records = get_records($result['img_data'], $q);
        } else {
            $no_records_warn = 'There are no results for that search.';
        }
    }
}

$page_info = paginate($records, $current_page, $max_records_per_page);
$page_items = $page_info['pages'];
$pagination_code = $page_info['pagination_code'];

if (count($page_items) > 0) {
    $set_ids = get_img_ids($page_items);
}