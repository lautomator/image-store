<?php

function get_all_tag_qs($q) {
    // Returns all of the tag ids <array>
    // from the get param pass in <str>.
    $filtered_query = explode(' ', $q);
    return $filtered_query;
}

function get_terms($term_rels, $image_id) {
    // Returns the term ids <array> for a
    // a given image id <int>. Takes in
    // the term relationships <array> and
    // the image id <int>. An image id of
    // -1 will return all of the term ids.
    $term_ids = array();

    foreach ($term_rels as $rel) {
        if ($rel['file_id'] == $image_id) {
            array_push($term_ids, $rel['term_id']);
        } elseif ($image_id == -1) {
            if (! in_array($rel['term_id'], $term_ids)) {
                array_push($term_ids, $rel['term_id']);
            }
        }
    }
    return $term_ids;
}

function get_term_id($terms, $slug) {
    // Returns the term id <int>
    // from the given term slug
    // <str>. Takes in all of the
    // terms <array>.
    $term_id = null;
    foreach ($terms as $t) {
        if ($t['term_slug'] == $slug) {
            $term_id = $t['term_id'];
            break;
        }
    }
    return $term_id;
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

function get_all_term_names($terms) {
    // Returns all of the term names,
    // a comma delineated string <str>
    // to be used for populating the
    // add tags form. Takes in the
    // entire terms table <array>.
    $tag_names = '';

    foreach ($terms as $t) {
        $tag_names .= $t['term_name'] . ',';
    }
    $tag_names = trim($tag_names, ',');
    return $tag_names;
}

function filter_records($term_rels, $term_ids) {
    // Returns the image ids <array> for all given
    // term ids <int>. Takes in the term relationships
    // <array> and a term ids <array>.
    $img_ids = array();

    foreach ($term_rels as $rel) {
        if (in_array($rel['term_id'], $term_ids)) {
            array_push($img_ids, $rel['file_id']);
        }
    }
    return $img_ids;
}

function get_records($all_records, $img_ids) {
    // Returns records <array> for the
    // given image ids <array>. Takes in
    // all of the records <array> and the
    // image ids <array>. Will also return
    // a single record.
    $filtered = array();

    foreach ($all_records as $rec) {
        if (in_array($rec['file_id'], $img_ids)) {
            array_push($filtered, $rec);
        }
    }
    return $filtered;
}

function paginate($records, $page_no, $max_records) {
    // Returns all of the records for a specified
    // page <array>, a pagination code <int>
    // (see below), and the total nuber of pages
    // <int>. Takes in the records <array>,
    // current page <int>, and the maximum number
    // of records per page <int>.

    // pagination code key:
    // ====================
    // 0 = more pages available
    // 1 = more or less pages available
    // 2 = less pages available
    // 3 = results fit on one page

    $page_of_records = array(
        'pages' => array(),
        'pagination_code' => 0,
        'total_pages' => 1,
        'current_page' => 1
    );

    // get the starting point
    $index = ($page_no - 1) * $max_records;
    // get the ending point
    $index_end = $index + $max_records;

    // store stats
    $total_pages = ceil(count($records) / $max_records);
    $page_of_records['total_pages'] = $total_pages;
    $page_of_records['current_page'] = $page_no;

    // gather the records for a page
    while ($index < $index_end) {
        array_push($page_of_records['pages'], $records[$index]);
        $index += 1;
    }

    // determine the pagination code
    if ($page_no > 1 && $page_no < $total_pages) {
        // there are more or less pages available
        $page_of_records['pagination_code'] = 1;
    } elseif ($page_no == $total_pages && $total_pages > 1) {
        // you are on the last page
        $page_of_records['pagination_code'] = 2;
    } elseif ($total_pages == 1) {
        // all records fit on 1 page
        $page_of_records['pagination_code'] = 3;
    } else {
        // we are on page 1 and there are more pages to view
        $page_of_records['pagination_code'] = 0;
    }
    return $page_of_records;
}

function validate_user_input($userInput) {
    // Returns true <bool> if a term is text.
    // Only a-z A-Z characters are accepted.
    // Takes in the user input <string>.
    $is_valid = false;
    // strip any spaces
    $in = trim($userInput, ' ');
    $in = str_replace(' ', '', $userInput);

    if (ctype_alpha($in)) {
        $is_valid = true;
    }
    return $is_valid;
}

function create_term_slug($valid_tag) {
    // Returns a term slug (all lowercase
    // and a dash for spaces) and the
    // term name (as it was entered)
    // <array>. Takes in a validated
    // tag name <str>;
    $term = array(
        'name' => '',
        'slug' => ''
    );

    $term['name'] = $valid_tag;
    $term['slug'] = str_replace(' ', '-', strtolower($valid_tag));
    $term['slug'] = trim($term['slug'], '-');
    return $term;
}

function check_for_dup_term($terms, $term_slug) {
    // Returns true <bool> if there is no
    // duplicate term found and false if
    // there is a duplicate. Takes in the
    // term slug <str> and the terms <array>.
    $is_unique = true;

    foreach ($terms as $t) {
        if ($term_slug == $t['term_slug']) {
            $is_unique = false;
            break;
        }
    }
    return $is_unique;
}

function check_img_has_term($term_rels, $img_id, $term_id) {
    // Returns true if the img id <int> is already
    // associated with the image in question.
    // Takes in the term rels <array>.
    $has_term_rel = false;
    $resulting_rels = array();
    $term_rel = array($img_id, $term_id);

    // get the rels for the image id in question
    foreach ($term_rels as $tr) {
        if ($tr['file_id'] == $img_id) {
            array_push($resulting_rels, array($img_id, $tr['term_id']));
        }
    }

    // check for the duplicate
    if (count($resulting_rels) > 0) {
        foreach ($resulting_rels as $rel) {
            if ($rel[0] == $term_rel[0] && $rel[1] == $term_rel[1]) {
                $has_term_rel = true;
                break;
            }
        }
    }
    return $has_term_rel;
}
