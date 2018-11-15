<?php

$page = 'cart';
$cart_empty = true;

require_once('../inc/loader.php');

if (isset($_POST['clearCart'])) {
    clear_cookie('cart_images');
}

if (isset($_COOKIE['cart_images'])) {
    $cart_empty = false;
    $cook_img_ids = explode(':', $_COOKIE['cart_images']);
    $cart_items = get_records($result['img_data'], $cook_img_ids);
}

require_once('../inc/header.php');
require_once('../inc/nav.php');
require('../views/view-cart.php');
require_once('../inc/footer.php');