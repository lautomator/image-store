<?php


if (isset($_POST['qTags'])) {

    require_once('select-tags.php');

    if (isset($q)) {
        if (count($q) > 0) {

            $q_string = '';
            $q_string_ids = '';
            $q_string_tags = '';

            // record ids
            foreach ($q as $rec_id) {
                $q_string_ids .= $rec_id . ',';
            }
            $q_string_ids = trim($q_string_ids, ',');

            // term ids
            foreach ($queried_tags as $term_id) {
                $q_string_tags .= $term_id . ',';

            }
            $q_string_tags = trim($q_string_tags, ',');

            // setup the final query string
            $q_string = '?q=' . $q_string_ids . '&qt=' . $q_string_tags;

            $redirect ='Location: ' . $home . $q_string;
            header($redirect);
        }
    }
}