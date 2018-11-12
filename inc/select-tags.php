<?php

require_once('data.php');
require_once('main.php');

$q = '?id=';
$q_ids = array();
$result = array();


// get the ids from the form
foreach ($_GET as $key => $val) {
    if ($val != 'Search') {
        array_push($q_ids, $val);
        // $q .= $val . '+';
    }
}

// get the record ids that match the search
$result = q_search($q_ids, $result['term_rels']);

// add that to the query string an redirect
// $q = trim($q, '+');

// header('Location: ../index.php' . $q);

print_r($result);