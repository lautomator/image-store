<?php

$page = 'search';

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

if (isset($_GET['e'])) {
    $err_msg = 'Please select at least one tag.';
}

if (count($result['terms']) > 0) {
    $all_terms = array();
    $slugs = array();

    // sort the slugs
    foreach ($result['terms'] as $term) {
        array_push($slugs, $term['term_slug']);
    }
    asort($slugs);

    // sort the terms by the slugs
    foreach ($slugs as $s) {
        foreach ($result['terms'] as $t) {
            if ($t['term_slug'] == $s) {
                array_push($all_terms, $t);
                break;
            }
        }
    }
}

require('../views/view-search.php');
require_once('../inc/footer.php');
