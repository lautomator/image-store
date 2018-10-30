<?php

if (isset ($_GET['t'])) {
    // process a tag query
    $t = array($_GET['t']);
    $record_ids = filter_records($result['term_rels'], $t);
    $records = get_records($result['img_data'], $record_ids);
    $item_terms = array();
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

$page_info = paginate($records, $current_page, $max_records_per_page);
$page_items = $page_info['pages'];
$pagination_code = $page_info['pagination_code'];
