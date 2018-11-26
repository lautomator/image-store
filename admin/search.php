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
    $all_terms = sort_terms($result['terms'], 'term_slug');
}

require('../views/view-search.php');
require_once('../inc/footer.php');
