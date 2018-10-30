<?php

if (isset($_POST)) {
    print_r($_POST);
}

require_once('urls.php');
// require_once('connect.php');


// add the new term to the terms table

// update the term relationship table

// if success redirect back to the properties page
// $redirect = $urls['properties'] . '?img_id=' . $_POST['imgId'] . '&e=0';
// else redirect with error msg
// $redirect = $urls['properties'] . '?img_id=' . $_POST['imgId'] . '&e=1';

// header('Location: ' . $redirect);