<?php

require_once('urls.php');
require_once('main.php');
require_once('data.php');

if (isset($_POST)) {
    $user_in = htmlspecialchars(trim($_POST['addTag']));
    $img_id = $_POST['imgId'];
    $p = $_POST['p'];
    $can_add_term = false;
    $term_rel_updated = false;
    $term = array();
    $err_msg = '';
    $terms_updated = false;
    $redirect = 'Location: ' . $urls['properties'] . '?img_id=' . $img_id . '&p=' . $p;
    $this_img_terms = get_terms($result['term_rels'], $img_id);

    // check for valid input (letters only)
    if (validate_user_input($user_in)) {
        // create the slug
        $term = create_term_slug($user_in);
        $term_name = $term['name'];
        $term_slug = $term['slug'];

        // check for duplicates
        if (check_for_dup_term($result['terms'], $term['slug'])) {
            // check to see if this item has the same term


            // authorize the insertion
            $can_add_term = true;
        } else {
            // if the term already exists, update the term rels
            $terms_updated = true;
        }
    } else {
        $err_msg = ' Tags can only have letters and spaces.';
    }
}

if ($can_add_term) {
    require_once('connect.php');

    // insert the new term in to the database
    if ($link) {

        $sql = 'INSERT INTO terms (term_name, term_slug) VALUES ' . "('{$term_name}', '{$term_slug}')";

        if (!mysqli_query($link, $sql)) {
            $err_msg = 'There was a problem writing to the database.';
            header($redirect . '&err=' . $err_msg);
        } else {
            $terms_updated = true;
            mysqli_close($link);
        }
    } else {
        $err_msg = 'There was a problem connecting to the database.';
        header($redirect . '&err=' . $err_msg);
    }
} else {
    // redirect with err_msg
    header($redirect . '&err=' . $err_msg);
}

// update the term rels
if ($terms_updated) {
    header('Location: ' . 'insert-term-rel.php?img_id=' . $img_id . '&p=' . $p . '&slug=' . $term_slug);
}

