<?php

require_once('inc/settings.php');
require_once('inc/urls.php');
require_once('inc/main.php');
require_once('inc/data.php');

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

require_once('inc/header.php');
require_once('inc/nav.php');
require('templates/home.php');
require_once('inc/footer.php');

