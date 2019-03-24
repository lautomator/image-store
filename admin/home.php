<?php

$set_ids = '';
$item_terms = array();
$url_queries = array();
$query = '';

// process GET params
if (isset ($_GET['t'])) {
    // process a tag query
    $t = get_all_qs($_GET['t']);
    $record_ids = filter_records($result['term_rels'], $t);
    $records = get_records($result['img_data'], $record_ids);
    $query = 't=' . $_GET['t'];
    array_push($url_queries, $query);

} else {
    // get all of the records
    $records = $result['img_data'];
}

if (isset ($_GET['p'])) {
    // process a page query
    $current_page = $_GET['p'];
    $query = 'p=' . $current_page;
    // array_push($url_queries, $query);
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

$url_query = parse_url_queries($url_queries);
$page_info = paginate($records, $current_page, $max_records_per_page);
$page_items = $page_info['pages'];
$pagination_code = $page_info['pagination_code'];
$max_page_no = $page_info['total_pages'];

if (count($page_items) > 0) {
    $set_ids = get_img_ids($page_items);
}

