<?php
include '../db/dbconnection.php';
include '../models/users.php';
// object
$usersObj = new Users();
// if (isset($_POST['register'])) {
//     $nickname = isset($_POST['nickname']) ? trim( strip_tags($_POST['nickname'])) : 'kwaku1';
//     $email = isset($_POST['email']) ? trim( strip_tags($_POST['email'])) : 'kwaku@kwaku1.com';
//     $password = isset($_POST['password']) ? md5($_POST['password']) : md5('hello');

//     $usersObj ->INSERT_USER($nickname, $email, $password);

// }

	$nickname = isset($_POST['nickname']) ? trim( strip_tags($_POST['nickname'])) : 'kwaku2';
    $email = isset($_POST['email']) ? trim( strip_tags($_POST['email'])) : 'kwaku@kwaku2.com';
    $password = isset($_POST['password']) ? md5($_POST['password']) : md5('hello');

    $usersObj ->INSERT_USER($nickname, $email, $password);
