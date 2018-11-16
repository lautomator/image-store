<?php

require_once('urls.php');
setcookie('ci', null, time() -1, '/');
header('Location: ' . $urls['cart']);