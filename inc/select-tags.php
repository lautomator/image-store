<?php

require_once('urls.php');
require_once('main.php');
require_once('data.php');

$q = array();
$q_ids = array();
$queried = array();

// get the ids from the form
foreach ($_POST as $key => $val) {
    if ($val != 'Search') {
        array_push($q_ids, $val);
    }
}

// get the record ids that match the search
$queried = q_search($q_ids, $result['term_rels']);

if (count($queried) > 0) {
    // add to the query string
    foreach ($queried as $img_id) {
        array_push($q, $img_id);
    }
}

