<?php

if (isset($_POST['qTags'])) {

    require_once('urls.php');
    require_once('main.php');
    require_once('data.php');

    $q = array();
    $q_term_ids = array();
    $queried = array();
    $redirect ='Location: ' . $urls['search'];

    if (count($_POST) == 1) {
        // no terms were entered
        header($redirect . '?e=1');
    } else {
        // get the term ids from the form
        foreach ($_POST as $key => $val) {
            if ($val != 'Search') {
                array_push($q_term_ids, $val);
            }
        }

        // get the record ids that match the search, if any
        $queried_ids = q_search($q_term_ids, $result['term_rels']);
        $queried_tags = $q_term_ids;

        if (count($queried_ids) > 0) {
            // add to the query string
            foreach ($queried_ids as $img_id) {
                array_push($q, $img_id);
            }
        } else {
            // no records found
            header($redirect . '?e=2');
        }
    }

    // require_once('select-tags.php');

    if (isset($q)) {
        if (count($q) > 0) {

            $records = get_records($result['img_data'], $q);

            $queried_results = array(
                'record_count' => count($records),
                'img_data' => $records,
                'terms' => $result['terms'],
                'term_rels' => $result['term_rels'],
                'status' => $result['status'],
                'err_msg' => $result['err_msg']
            );

            // redefine $result
            $result = $queried_results;
        }

        // require_once('../admin/search-results.php');
    }
}
