<?php

$home = 'http://dev.local/image-store/';

// settings for localhost
$db_config = array(
    'host' => '127.0.0.1:3306',
    'user' => 'root',
    'password' => 'root',
    'db' => 'image_store'
);

$cache = rand(); // dev only
// $cache = '2018-XX-XX';
$max_records_per_page = 25;
$default_page = 1;