<?php

$page = 'cart';

require_once('../inc/loader.php');
require_once('../inc/header.php');
require_once('../inc/nav.php');

print_r($_COOKIE);

if (isset($_COOKIE['imgId'])) {
   echo $_COOKIE['imgId'];
}

require('../views/view-cart.php');
require_once('../inc/footer.php');
