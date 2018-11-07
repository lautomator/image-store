<?php

$q = '?t=';
foreach ($_GET as $key => $val) {
    if ($val != 'Search') {
        $q .= $val . '+';
    }
}
$q = trim($q, '+');

header('Location: ../index.php' . $q);