<?php

require_once('settings.php');

// establish a database connection
$link = mysqli_init();

$success = mysqli_real_connect(
    $link,
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['db']
);
