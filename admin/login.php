<?php

$page = 'login';
$can_login = true;
require_once('../inc/settings.php');
require_once('../inc/urls.php');

// // clear
if (isset($_SESSION['user']) || isset($_GET['logout'])) {
    session_unset();
    session_destroy();
}

if (! isset($_COOKIE['login_attempts'])) {
    setcookie('login_attempts', 0, time() + (86400), "/");
} else {
    if ($_COOKIE['login_attempts'] == $max_login_attempts) {
        $can_login = false;
    }
}

if (isset($_GET['e'])) {
    if ($_GET['e'] == 1) {
        $login_err = 'Invalid credentials';
    }
}

if ($can_login) {
    require_once('../inc/header.php');
    require_once('../views/view-login.php');
    require_once('../inc/footer.php');
} else {
    exit('Try logging in later.');
}
