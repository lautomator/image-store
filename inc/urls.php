<?php

$home = 'http://localhost:8888/image-store/';
$static_dir = $home . 'static/';
$admin_dir = $home . 'admin/';
$uploads_dir = $home . 'test-uploads/';

$urls = array(
    'home' => 'index.php',
    'register' => $admin_dir . 'register.php',
    'tags' => $admin_dir . 'tags.php',
    'search' => $admin_dir . 'search.php',
    'properties' => $admin_dir . 'properties.php',
    'cart' => $admin_dir . 'cart.php',
    'viewer' => $admin_dir . 'viewer.php',
    'logout' => $admin_dir . 'logout.php'
);
