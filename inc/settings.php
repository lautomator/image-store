<?php

require_once('config.php');

// settings for localhost
$db_config = array(
    'host' => $conf['host'],
    'user' => $conf['user'],
    'password' => $conf['pw'],
    'db' => $conf['db']
);

// $cache = rand(); // dev only
$cache = '2018-11-08-a';
$max_records_per_page = 25;
$default_page = 1;

// pages that use the main javascript
$script_pages = array('properties');