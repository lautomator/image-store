<?php

require_once('urls.php');
require_once('main.php');
require_once('data.php');

if (isset($_GET)) {
    $img_id = $_GET['img_id'];
    $slug = $_GET['slug'];
    $redirect = 'Location: ' . $urls['properties'] . '?img_id=' . $img_id;
}

// get the term id for the new term rel
if (isset($img_id)) {
    $term_id = get_term_id($result['terms'], $slug);

    if (! is_null($term_id)) {
        $can_add_term_rel = true;
    } else {
        $err_msg = 'There was a problem getting the term id.';
        header($redirect . '&err=' . $err_msg);
    }
}

// insert the new term relationship into to the database
if ($can_add_term_rel) {
    require_once('connect.php');

    if ($success) {
        $sql = 'INSERT INTO term_rels (file_id, term_id) VALUES ' . "('{$img_id}', '{$term_id}')";

        if (!mysqli_query($link, $sql)) {
            $err_msg = 'There was a problem writing to the database (term rels).';
            header($redirect . '&err=' . $err_msg);
        }
        mysqli_close($link);
        header($redirect);
    } else {
        $err_msg = 'There was a problem connecting to the databse (term rels).';
        header($redirect . '&err=' . $err_msg);
    }
}