<?php

if (isset($_SESSION['user'])) {
    session_unset();
    session_destroy();
}

$page = 'login';

require_once('../inc/settings.php');
require_once('../inc/urls.php');
require_once('../inc/header.php');
require_once('../views/view-login.php');
require_once('../inc/footer.php');