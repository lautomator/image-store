<?php

require_once('connect.php');

$result = array(
    'record_count' => 0,
    'data' => array(),
    'status' => 0, // 0 = ok; 1 = not ok
    'err_msg' => ''
);

if ($success) {
    $sql_images = 'SELECT * FROM images ORDER BY file_id ASC';
    $sql_terms = 'SELECT * FROM terms ORDER BY term_id ASC';
    $sql_term_rels = 'SELECT * FROM term_rels ORDER BY rel_id ASC';

    // get image data
    $result_images = mysqli_query($link, $sql_images);

    if (! $result_images) {
        $result['status'] = 1;
        $result['err_msg'] = 'Could not retrieve image data.';
    } else {
        foreach ($result_images as $row) {
            array_push($result['data'], array(
                'id' => $row['file_id'],
                'path' => $row['file_path'],
                'name' => $row['file_name'],
                'ext' => $row['file_ext']
            ));
        }
        $result['record_count'] = count($result_images);

        if ($result['record_count'] = 0) {
            $result['status'] = 1;
            $result['err_msg'] = 'There is no data available.';
        }
    }
} else {
    $result['status'] = 1;
    $result['err_msg'] = 'Could not connect to the database.';
}
