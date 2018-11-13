<?php

require_once('urls.php');
require_once('main.php');
require_once('data.php');

$q = '?id=';
$q_str = '';
$q_ids = array();
$queried = array();
$redirect = 'Location: ../' . $urls['home'];


// get the ids from the form
foreach ($_GET as $key => $val) {
    if ($val != 'Search') {
        array_push($q_ids, $val);
        // $q .= $val . '+';
    }
}

// get the record ids that match the search
$queried = q_search($q_ids, $result['term_rels']);

if (count($queried) > 0) {
    // add to the query string
    foreach ($queried as $img_id) {
        $q_str .= $img_id . '+';
    }

    $q_str = trim($q_str, '+');
    $q .= $q_str;
} else {
    $q .= 'null';
}

$redirect .= $q;

header($redirect);
