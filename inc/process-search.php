<?php

if (isset($_POST['qTags'])) {

    require_once('urls.php');
    require_once('main.php');
    require_once('data.php');

    // Verify that there are valid results.
    // If so, pass the tag ids onto the main
    // page. If not, return to the search page.

    $query_success = false;
    $q_term_ids = array();
    $queried = array();
    $redirect ='Location: ' . $urls['search'];

    if (count($_POST) == 1) {
        // no terms were entered
        header($redirect . '?e=1');
    } else {
        // get the term ids from the form
        foreach ($_POST as $key => $val) {
            if ($val != 'Search') {
                array_push($q_term_ids, $val);
            }
        }

        // get the record ids that match the search, if any
        $queried_ids = q_search($q_term_ids, $result['term_rels']);

        if (count($queried_ids) > 0) {
            // records were found
            $query_success = true;
        } else {
            // no records found
            header($redirect . '?e=2');
        }
    }

    if ($query_success) {

        echo '<pre>';
        print_r($q_term_ids);
        echo '</pre>';
    }
}

?>
