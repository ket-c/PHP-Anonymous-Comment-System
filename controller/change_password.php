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
   foreach ($userDetails as $data) {
   $password = $data['password'];
   }

   // request data
   	$oldPassword = isset($_POST['password0'])? md5($_POST['password0']): null;
    $newPassword = isset($_POST['password'])? md5($_POST['password']): null;
   if ($oldPassword != $password ) {
   	echo 'Incorrect old password. Try again';
   } else{
   	$usersObj->UPDATE_PASSWORD($id, $newPassword);
   }
