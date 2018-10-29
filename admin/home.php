<?php

$item_terms = array();
$all_records = $result['img_data'];

if (isset ($_GET['p'])) {
    $current_page = $_GET['p'];
} else {
    $current_page = $default_page;
}

$page_info = paginate($all_records, $current_page, $max_records_per_page);
$page_items = $page_info['pages'];
$pagination_code = $page_info['pagination_code'];
