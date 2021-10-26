<?php
include '../db/dbconnection.php';
include '../models/users.php';
include '../models/logs.php';
// object
$usersObj = new Users();
$logsObj = new Logs();


    $nickname = isset($_POST['nickname'])? trim(strip_tags($_POST['nickname'])): null;
    $password = isset($_POST['password'])? md5($_POST['password']): null;

    if ($login = $usersObj ->AUTHENTICATION($nickname, $password)) {
        $logDescription = 'Login! / Login Attempt';
        // check if result is more than 0
        if ($login!=0 && count($login)>0) {
           foreach ($login as $data) {
               $user_id= $data['id'];
               $email= $data['email'];
               $nickname= $data['nickname'];
           }
                session_start();
               $_SESSION['user_id']= $user_id;
               $_SESSION['email']= $email;
               $_SESSION['nickname']= $nickname;
               echo "yes";
           $logsObj->INSERT_LOG($_SESSION['user_id'], $logDescription);
        }

      }
     else{
        echo 'log failed';

    }
   // echo isset($displayData) ? json_encode($displayData) : 'nothing found';
