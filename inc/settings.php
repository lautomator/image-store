<?php

require_once('config.php');

// settings for localhost
$db_config = array(
    'host' => $conf['host'],
    'user' => $conf['user'],
    'password' => $conf['pw'],
    'db' => $conf['db']
);

$cache = rand(); // dev only
// $cache = '2018-11-14';

// pages
$max_records_per_page = 60;
$default_page = 1;

// pages that use the main javascript
$script_pages = array('home', 'properties', 'viewer', 'cart');

// acceptable file extension
$extensions_in = array('.jpg', '.jpeg', '.tif', '.tiff', '.gif', '.png');

// cart size
$cart_size = 3;

// login attempts
$max_login_attempts = 3;

// debug
$debug = true;
