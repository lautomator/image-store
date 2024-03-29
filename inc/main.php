<?php

function get_all_qs($q) {
    // Returns all of the tag or record ids <array>
    // from the get param pass in <str>.
    $filtered_query = explode(',', $q);
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
    // id <int>. If there is a label, the
    // label is returned instead of the name.
    $term_name = '';

    foreach ($terms as $term) {
        if ($term['term_id'] == $term_id) {
            if ($term['term_label'] != '') {
                $term_name = $term['term_label'];
            } else {
                $term_name = $term['term_name'];
            }

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

function sort_cart_items($cart_records, $sort_order) {
    // Returns sorted image ids <array>. Takes in
    // the full cart records <array> and the sort order
    // structure <array>. Is used for the cart viewer.
    $total_positions = count($cart_records); // number of slots to fill
    $reorderd = array();
    $index = 0;

    // set up the array structure
    while ($index < $total_positions) {
        $reorderd[$index] = array();
        $index += 1;
    }

    // reorder the records according to the sort_order
    foreach ($sort_order as $key => $val) {
        foreach ($cart_records as $records => $rec) {
            if ($rec['file_id'] == $val['id']) {
                $reorderd[$val['ord']] = $rec;
            }
        }
    }

    return $reorderd;
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

    // store stats
    $total_pages = ceil(count($records) / $max_records);
    $page_of_records['total_pages'] = $total_pages;
    $page_of_records['current_page'] = $page_no;

    // get the starting point
    $index = ($page_no - 1) * $max_records;

    // get the ending point
    $index_end = $index + $max_records;

    if ($page_no == $total_pages) {
        // the last page of records
        $index_end = count($records);
    } else {
        // all other pages
        $index_end = $index + $max_records;
    }

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

function get_img_ids($data) {
    // Returns the page ids <str>
    // for a given set of filtered
    // and paginated records. Takes
    // in the page data from the filter
    // and pagination procedures <array>.

    $ids = array();

    foreach ($data as $d) {
        if (!empty($d)) {
            array_push($ids, $d['file_id']);
        }
    }

    $ids = implode(',', $ids);
    return $ids;
}

function properties_navi($ids, $curr_id) {
    // Returns the next and previous
    // ids for pagination on the
    // properties page <array>.
    // Takes in the current ids
    // set <str> and the current
    // id <int>.

    $navi = array(
        'prev' => -1,
        'next' => -1
    );
    $ids_expl = explode(',', $ids);
    $index = 0;
    $curr_pos = 0;

    // weed out a page with only one entry
    if (count($ids_expl) == 1) {
        $navi['prev'] = -1;
        $navi['next'] = -1;
    } else {
        // find the current position
        while ($index < count($ids_expl)) {
            if ($ids_expl[$index] == $index) {
                $curr_pos = $index;
                break;
            }
            $index += 1;
        }

        // get the next and previous
        if ($curr_pos == 0) {
            // no prev page
            $navi['prev'] = -1;
            $navi['next'] = $ids_expl[$curr_pos + 1];
        } else if ($curr_pos > 0 && $curr_pos == (count($ids_expl) - 1)) {
            // no next page
            $navi['prev'] = $ids_expl[$curr_pos - 1];
            $navi['next'] = -1;
        } else {
            // both next and prev
            $navi['prev'] = $ids_expl[$curr_pos - 1];
            $navi['next'] = $ids_expl[$curr_pos + 1];
        }
    }
    return $navi;
}

function sort_tags($terms, $term_ids) {
    // Returns tagids <array> sorted
    // by their slug name (a-z). Takes
    // in the terms <array> and term
    // ids <array> for the given set.
    $sorted_ids = array();
    $slugs = array();

    // get the slugs
    foreach ($terms as $t) {
        if (in_array($t['term_id'],$term_ids)) {
            array_push($slugs, $t['term_slug']);
        }
    }

    // sort by the slugs
    asort($slugs);

    // get the ids again
    foreach ($slugs as $s) {
        array_push($sorted_ids, get_term_id($terms, $s));
    }

    return $sorted_ids;
}

function q_search($q_term_ids, $term_rels) {
    // Returns all of the image ids <array>
    // that contain ALL of the ids in
    // $q_term_ids <array>. Takes in the
    // term relationships <array>.
    $result = array();
    $query_results = array();
    $req_hits = count($q_term_ids);
    $current_id = null;
    $hits = 0;
    $index = 0;

    // get all of the file ids that have matching terms
    foreach ($term_rels as $rel) {
        if (in_array($rel['term_id'], $q_term_ids)) {
            array_push($result, $rel['file_id']);
        }
    }

    // sort the result
    asort($result);

    // count the hits for each id
    while ($index < count($result)) {
        $current_id = $result[$index];

        foreach ($result as $r) {
            if ($r == $current_id) {
                $hits += 1;
            }

            if ($hits == $req_hits) {
                if (! in_array($current_id, $query_results)) {
                    array_push($query_results, $current_id);
                    break;
                }
            }
        }
        $hits = 0;
        $index += 1;
    }

    return ($query_results);
}

function get_file_parts($fin, $exts) {
    // Returns the file name <str>
    // without the extension and the
    // extension <str>. Takes in the
    // full file in <str> and the list
    // of acceptable extensions <array>.
    $result = array();
    $fname = '';
    $ext = '';
    $pat = '';
    $len = null;

    foreach ($exts as $x) {
        if (strpos($fin, $x) > -1) {
            $len = strpos($fin, $x);
            $fname = substr($fin, 0, $len);
            $ext = substr($fin, $len);
            $ext = str_replace('.', '', $ext);
            break;
        }
    }
    $result['name'] = $fname;
    $result['ext'] = $ext;
    return $result;
}

function get_image_names($img_data) {
    // Returns the names of all of the
    // images in the database <array>.
    // Takes in the image data <array>.
    $image_names = array();
    foreach ($img_data as $row) {
        array_push($image_names, $row['file_name']);
    }
    return $image_names;
}

function check_for_dup_file_names($file_name, $image_names) {
    // Returns true if a duplicate name is
    // found <bool>. Takes in the file name
    // <str> and the existing image names <array>.
    $is_duplicate = false;

    if (in_array($file_name, $image_names)) {
        $is_duplicate = true;
    }
    return $is_duplicate;
}

function check_cookie($id, $c_val) {
    // Returns true if the img id is
    // already in the cookie <bool>.
    // Takes in the image id <str> and
    // the cookie value <str>.
    $is_in_cookie = false;
    $cook_data = explode(':', $c_val);

    if (in_array($id, $cook_data)) {
        $is_in_cookie = true;
    }
    return $is_in_cookie;
}

function sort_terms($terms, $sortby) {
    // Returns all of the term objects <array>
    // sorted by the desired field <str>.
    // Takes in the terms <array> and sort
    // order <str>.
    $all_terms = array();
    $slugs = array();

    // sort the slugs
    foreach ($terms as $term) {
        array_push($slugs, $term[$sortby]);
    }
    asort($slugs);

    // sort the terms by the slugs
    foreach ($slugs as $s) {
        foreach ($terms as $t) {
            if ($t[$sortby] == $s) {
                array_push($all_terms, $t);
                break;
            }
        }
    }
    return $all_terms;
}

function parse_url_queries($q) {
    // Returns a url query string <str>.
    // Takes in any get params <array>.
    $q_string = '&';

    if (count($q) > 1) {
        foreach ($q as $query) {
            $q_string .= $query . '&';
        }
        $q_string = rtrim($q_string,'&');
    } else if (count($q) == 1) {
        // there's only one query
        $q_string .= $q[0];
    } else {
        $q_string = '';
    }

    return $q_string;
}


