<?php

require_once('urls.php');

$redirect = 'Location: ' . $admin_dir . 'login.php';
session_start();

if (!isset($_SESSION['user']) || isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header($redirect);
}
