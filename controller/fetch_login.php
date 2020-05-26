<?php
//Login verification
include 'verify_login.php';

include '../db/dbconnection.php';
include '../models/users.php';

// object
$usersObj = new Users();

    $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
    if (empty($id)) {
        exit();
    }

    $userDetails = $usersObj ->FETCH_USER($id);
   echo isset($userDetails) ? json_encode($userDetails) : 'nothing found';
