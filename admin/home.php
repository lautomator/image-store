<?php

$set_ids = '';
$item_terms = array();
$url_queries = array();
$query = '';
$t = array();
$item_queries = '';
$has_returned = false;
$current_page = 1;

// *****************
//  SORTING/QUERIES
// *****************

// process GET params
if (isset ($_GET['t'])) {
    // process a tag query
    $t = get_all_qs($_GET['t']);

    if (count($t) == 1) {
        // process a SINGLE tag query
        $record_ids = filter_records($result['term_rels'], $t);
    } else {
        // process a MULTIPLE tags query
        $record_ids = q_search($t, $result['term_rels']);
    }

    // get the records to be rendered
    $records = get_records($result['img_data'], $record_ids);

    // for pagination and urls
    $query_tags = 't=' . $_GET['t'];
    array_push($url_queries, $query_tags);
} else {
    // get ALL of the records
    $records = $result['img_data'];
}


// ************
//  PAGINATION
// ************

// handle pagination GET params
$total_pages = ceil(count($records) / $max_records_per_page);
if (isset ($_GET['p'])) {
    // process a page query
    $current_page = $_GET['p'];

    if ($current_page > $total_pages) {
        $current_page = $total_pages;
    }

    $query_p = 'p=' . $current_page;
}

// handle a return to home page to trigger the scroll compensation
if (isset($_GET['return'])) {
    if ($_GET['return'] == 'true') {
        $has_returned = true;
    }
}


// ************
//  VIEW LOGIC
// ************

// setup vars for page rendering
if (! empty($records)) {
    $url_query = parse_url_queries($url_queries);
    $page_info = paginate($records, $current_page, $max_records_per_page);
    $page_items = $page_info['pages'];
    $pagination_code = $page_info['pagination_code'];
    $max_page_no = $page_info['total_pages'];

    if (count($page_items) > 0) {
        $set_ids = get_img_ids($page_items);
    }

    if (isset($query_ids)) {
        $item_queries .= '&' . $query_ids;
    }

    if (isset($query_tags)) {
        $item_queries .= '&' . $query_tags;
    }

    if (isset($query_t)) {
        $item_queries .= '&' . $query_t;
    }
}
