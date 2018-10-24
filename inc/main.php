<?php

function get_terms($term_rels, $image_id) {
    // Returns the term ids <array> for a
    // a given image id <int>. Takes in
    // the term relationships <array> and
    // the image id <int>.
    $term_ids = array();

    foreach ($term_rels as $rel) {
        if ($rel['file_id'] == $image_id) {
            array_push($term_ids, $rel['term_id']);
        }
    }
    return $term_ids;
}

function get_term_name($terms, $term_id) {
    // Returns the name of the term <str>
    // from the given term id <int>. Takes
    // in the terms <array> and the term
    // id <int>.
    $term_name = '';

    foreach ($terms as $term) {
        if ($term['term_id'] == $term_id) {
            $term_name = $term['term_name'];
            break;
        }
    }
    return $term_name;
}
