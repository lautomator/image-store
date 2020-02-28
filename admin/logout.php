<?php

require_once('../inc/urls.php');

$redirect = 'Location: ' . $admin_dir . 'login.php?logout=true';
session_start();

$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
    setcookie('ci', '', time() -1, '/');
}

session_destroy();

header($redirect);
