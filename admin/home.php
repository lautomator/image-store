<?php

$set_ids = '';
$item_terms = array();
$url_queries = array();
$query = '';
$t = null;

// process GET params
if (isset ($_GET['t'])) {

    // process a tag query
    $t = get_all_qs($_GET['t']);
    $record_ids = filter_records($result['term_rels'], $t);
    $records = get_records($result['img_data'], $record_ids);
    $query_tages = 't=' . $_GET['t'];
    array_push($url_queries, $query_tages);

} else if (isset($_GET['q']) && isset($_GET['qt'])) {

    // process record ids from a search
    // and tags from that search
    $q = get_all_qs($_GET['q']);
    $t = get_all_qs($_GET['qt']);
    $records = get_records($result['img_data'], $q);
    // record ids
    $query_ids = 'q=' . $_GET['q'];
    array_push($url_queries, $query_ids);
    // query tag ids
    $query_t = 'qt=' . $_GET['qt'];
    array_push($url_queries, $query_t);

} else {
    // get all of the records
    $records = $result['img_data'];
}

// handle pagination GET params
if (isset ($_GET['p'])) {
    // process a page query
    $current_page = $_GET['p'];
    $query_p = 'p=' . $current_page;
    // array_push($url_queries, $query_p);
} else {
    $current_page = $default_page;
}


// setup vars for page rendering
$url_query = parse_url_queries($url_queries);
$page_info = paginate($records, $current_page, $max_records_per_page);
$page_items = $page_info['pages'];
$pagination_code = $page_info['pagination_code'];
$max_page_no = $page_info['total_pages'];


if (count($page_items) > 0) {
    $set_ids = get_img_ids($page_items);
}

