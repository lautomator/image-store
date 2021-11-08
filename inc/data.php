<?php

require_once('connect.php');

$result = array(
    'record_count' => 0,
    'img_data' => array(),
    'terms' => array(),
    'term_rels' => array(),
    'status' => 0, // 0 = ok; 1 = connection/sql error
    'err_msg' => ''
);

if ($success) {
    $sql_images = 'SELECT * FROM images ORDER BY file_id DESC';
    $sql_terms = 'SELECT * FROM terms ORDER BY term_id DESC';
    $sql_term_rels = 'SELECT * FROM term_rels ORDER BY rel_id DESC';

    // get image data
    $result_images = mysqli_query($link, $sql_images);

    if (! $result_images) {
        $result['status'] = 1;
        $result['err_msg'] = 'Could not retrieve image data.';
    } else {
        foreach ($result_images as $row) {
            array_push($result['img_data'], array(
                'file_id' => $row['file_id'],
                'file_path' => $row['file_path'],
                'file_name' => $row['file_name'],
                'file_ext' => $row['file_ext']
            ));
        }


        if (count($result['img_data']) == 0) {
            $result['status'] = 1;
            $result['err_msg'] = 'There is no data available.';
        } else {
            $result['record_count'] = count($result['img_data']);
        }
    }

    // get terms
    $result_terms = mysqli_query($link, $sql_terms);

    if (! $result_terms) {
        $result['status'] = 1;
        $result['err_msg'] = 'Could not retrieve terms.';
    } else {
        foreach ($result_terms as $row) {
            array_push($result['terms'], array(
                'term_id' => $row['term_id'],
                'term_name' => $row['term_name'],
                'term_slug' => $row['term_slug'],
                'term_label' => ''
            ));
        }
    }

    // update terms with symbols
    $term_symbol_exceptions = array(2, 9, 58);
    $index = 0;

    if (! empty($result['terms'])) {
        while ($index < count($result['terms'])) {
            if (in_array(
                $result['terms'][$index]['term_id'],
                $term_symbol_exceptions)) {
                    $result['terms'][$index]['term_label'] = '&starf;' .
                        $result['terms'][$index]['term_name'];
            }
            $index += 1;
        }
    }

    // get term rels
    $result_term_rels = mysqli_query($link, $sql_term_rels);

    if (! $result_term_rels) {
        $result['status'] = 1;
        $result['err_msg'] = 'Could not retrieve term relationships.';
    } else {
        foreach ($result_term_rels as $row) {
            array_push($result['term_rels'], array(
                'rel_id' => $row['rel_id'],
                'file_id' => $row['file_id'],
                'term_id' => $row['term_id']
            ));
        }
    }
} else {
    $result['status'] = 1;
    $result['err_msg'] = 'Could not connect to the database.';
}
