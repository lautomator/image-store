<?php

require_once('settings.php');

$link = @new mysqli(
    $db_config['host'],
    $db_config['user'],
    $db_config['password'],
    $db_config['db']
);
