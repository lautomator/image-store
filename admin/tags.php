<?php

$page = 'tags';

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

// get all of the terms
$item_terms = get_terms($result['term_rels'], -1);

if (empty($item_terms)) {
    $msg = 'There are no tags to display.';
    $render = false;
} else {
    $render = true;
}

require('../views/view-tags.php');
require_once('../inc/footer.php');


