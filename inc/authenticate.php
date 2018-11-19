<?php

require_once('connect.php');

$un_entered = false;
$pw_entered = false;
$found = false;
$auth = false;
$redirect = 'Location: ../index.php';

function validate_password($password, $pw, $salt) {
    // validates the password entered
    // and returns true if valid.
    $valid = false;

    $stored_pw = $pw;
    $entered_pw = hash('sha256', $password . $salt);

    // check the entered password against
    // the stored password
    if ($entered_pw == $stored_pw) {
        $valid = true;
    }
    return $valid;
}

$users = array();

if ($success) {
    // fetch the data
    $sql = 'SELECT * FROM users';

    $result_users = mysqli_query($link, $sql);

    // get the users
    if (!$result_users) {
        exit('Database connection was not established. Cannot authenticate at this time.');
    } else {
        // get the users
        foreach ($result_users as $row) {
            array_push($users, array(
                'user_id' => $row['user_id'],
                'user_name' => $row['user_name'],
                'user_pw' => $row['user_pw'],
                'salt' => $row['salt']
            ));
        }
        $result_users->close();
    }
    mysqli_close($link);
} else {
    exit('Database connection was not established.');
}

// field check: unsername
if (isset($_POST['username']) && !$_POST['username'] == '') {
    $username = trim($_POST['username']);
    $un_entered = true;
}

// field check: password
if (isset($_POST['password']) && !$_POST['password'] == '') {
    $password = trim(escapeshellcmd($_POST['password']));
    $pw_entered = true;
}

// proceed only if both fields are filled
if ($un_entered && $pw_entered) {

    // validate: check for a username first
    foreach ($users as $user) {
        if ($user['user_name'] == $username) {
            $found = true;
            // get the stored pw and salt
            $pw = $user['user_pw'];
            $salt = $user['salt'];
            $u_name = $user['user_name'];
            break;
        }
    }

    if ($found) {
        // validate the password
        if (validate_password($password, $pw, $salt)) {
            $auth = true;

            $name = $u_name;

            // cleanup
            unset($users);

            session_start();
            $_SESSION['user'] = $name;
            header($redirect);
        }
    }
}