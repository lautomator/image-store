<?php

require_once('urls.php');

if (isset($_POST['cartImgId'])) {
    $c_name = 'ci';
    $c_val = $_POST['cartImgId'];
    $return_page = $_POST['returnPage'];

    // check to see if the cookie is already set
    if (isset($_COOKIE[$c_name])) {
        // add items to it
        $c_val .= ':' . $_COOKIE[$c_name];
    }

    setcookie($c_name, $c_val, time() + (86400), "/");
    header('Location: ' . $urls['cart'] . '?p=' . $return_page);
}