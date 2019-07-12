<?php

require_once('../inc/urls.php');

$redirect = 'Location: ' . $admin_dir . 'login.php?logout=true';
$_SESSION['user'] = '';
session_unset();
session_destroy();
header($redirect);
