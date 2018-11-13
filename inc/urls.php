<?php

$home = 'http://dev.local/image-store/';
$static_dir = $home . 'static/';
$admin_dir = $home . 'admin/';

$urls = array(
    'home' => 'index.php',
    'register' => $admin_dir . 'register.php',
    'tags' => $admin_dir . 'tags.php',
    'search' => $admin_dir . 'search.php',
    'properties' => $admin_dir . 'properties.php',
    'cart' => $admin_dir . 'cart.php'
);
