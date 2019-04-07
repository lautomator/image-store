<?php

require_once('urls.php');
require_once('main.php');
require_once('data.php');

$q = array();
$q_ids = array();
$queried = array();
$redirect ='Location: ' . $urls['search'];

if (count($_POST) == 1) {
    // no terms were entered
    header($redirect . '?e=1');
} else {
    // get the ids from the form
    foreach ($_POST as $key => $val) {
        if ($val != 'Search') {
            array_push($q_ids, $val);
        }
    }

    // get the record ids that match the search, if any
    $queried = q_search($q_ids, $result['term_rels']);

    if (count($queried) > 0) {
        // add to the query string
        foreach ($queried as $img_id) {
            array_push($q, $img_id);
        }
    } else {
        // no records found
        header($redirect . '?e=2');
    }
}
