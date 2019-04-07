<?php

$page = 'search';

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

if (isset($_GET['e'])) {
    $e = $_GET['e'];

    if ($e == '1') {
        $err_msg = 'Please select at least one tag.';
    } else {
        // no records found e=2
        $err_msg = 'No records were found for that search.';
    }
}

if (count($result['terms']) > 0) {
    $all_terms = sort_terms($result['terms'], 'term_slug');
}

require('../views/view-search.php');
require_once('../inc/footer.php');
