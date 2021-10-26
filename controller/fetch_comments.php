<?php
//Login verification
include 'verify_login.php';

include '../db/dbconnection.php';
include '../models/comments.php';
include '../models/logs.php';
// object
$usersObj = new Comments();
$logsObj = new Logs();

    $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;
    if (empty($id)) {
        exit();
    }

    if ($allComments = $usersObj ->FETCH_COMMENTS($id)) {
        $logDescription = 'data fetched!';
        $logsObj->INSERT_LOG($id, $logDescription);

        // foreach ($allComments as $newData) {
        //    echo $newData['description']. ' was added on '.$newData['date_created'] .'<br>';
        // }
    }else{
        echo 'log failed';

    }
   echo isset($allComments) ? json_encode($allComments) : 'nothing found';
