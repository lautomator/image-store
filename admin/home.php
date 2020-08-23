<?php

$set_ids = '';
$item_terms = array();
$url_queries = array();
$query = '';
$t = array();
$item_queries = '';
$has_returned = false;

// *********
//  SORTING
// *********

// process GET params
if (isset ($_GET['t'])) {

    // process a SINGLE tag query
    $t = get_all_qs($_GET['t']);
    // $record_ids = filter_records($result['term_rels'], $t);
    // $records = get_records($result['img_data'], $record_ids);
    // $query_tags = 't=' . $_GET['t'];
    // array_push($url_queries, $query_tags);
    print_r($t);

} else {
    // get ALL of the records
    $records = $result['img_data'];
}


// ************
//  PAGINATION
// ************

// handle pagination GET params
if (isset ($_GET['p'])) {
    // process a page query
    $current_page = $_GET['p'];
    $total_pages = ceil(count($records) / $max_records_per_page);

    if ($current_page > $total_pages) {
        $current_page = $total_pages;
    }

    $query_p = 'p=' . $current_page;
} else {
    $current_page = $default_page;
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



// ******
// else if (isset($_GET['qTags'])) {

//     require_once('inc/select-tags.php');

//     if (isset($q)) {
//         if (count($q) > 0) {

//             $records = get_records($result['img_data'], $q);

//             $queried_results = array(
//                 'record_count' => count($records),
//                 'img_data' => $records,
//                 'terms' => $result['terms'],
//                 'term_rels' => $result['term_rels'],
//                 'status' => $result['status'],
//                 'err_msg' => $result['err_msg']
//             );

//             // redefine $result
//             $result = $queried_results;
//         }
//     }
