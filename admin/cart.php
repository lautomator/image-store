<?php

$page = 'cart';
$cart_empty = true;
$cart_full = false;

require_once('../inc/session.php');
require_once('../inc/loader.php');
require_once('home.php');

if (isset($_COOKIE['ci'])) {
    $cart_empty = false;
    $cook_img_ids = explode(':', $_COOKIE['ci']);
    $cart_items = get_records($result['img_data'], $cook_img_ids);
}

if (isset($_GET['img_id'])) {
    $img_id = explode(':', $_GET['img_id'])[0];
} else {
    $img_id = '';
}

require_once('../inc/header.php');
require_once('../inc/nav.php');
require('../views/view-cart.php');
require_once('../inc/footer.php');
