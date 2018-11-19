<?php

require_once('urls.php');

session_start();
$redirect = 'Location: ' . $admin_dir . 'login.php';

if (!isset($_SESSION['user']) || isset($_GET['logout'])) {
    session_unset();
    header($redirect);
}