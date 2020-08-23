<?php

if (isset($_POST['qTags'])) {

    require_once('select-tags.php');

    if (isset($q)) {
        if (count($q) > 0) {

            $records = get_records($result['img_data'], $q);

            $queried_results = array(
                'record_count' => count($records),
                'img_data' => $records,
                'terms' => $result['terms'],
                'term_rels' => $result['term_rels'],
                'status' => $result['status'],
                'err_msg' => $result['err_msg']
            );

            // redefine $result
            $result = $queried_results;
        }

        require_once('../admin/search-results.php');
    }
}