<?php


if (isset($_POST['qTags'])) {
    require_once('select-tags.php');

    if (isset($q)) {
        if (count($q) > 0) {

            $q_string = '';
            foreach ($q as $rec_id) {
                $q_string .= $rec_id . ',';
            }
            $q_string = trim($q_string, ',');
            $q_string = '?q=' . $q_string;

            $redirect ='Location: ' . $home . $q_string;
            header($redirect);
        }
    }
}