<?php
include '../db/dbconnection.php';
include '../models/comments.php';
include '../models/logs.php';
// object
$usersObj = new Comments();
$logsObj = new Logs();


    $id = isset($_POST['user_id']) ? $_POST['user_id'] : null;
    $description = isset($_POST['description']) ? trim( strip_tags($_POST['description'])) : 'Kwaku is a good PHP dev. wow!';
if (empty($id)) {
	exit();
}
    if ($usersObj ->INSERT_COMMENTS($id, $description)) {
        $logDescription = 'New comments added today!';
        $logsObj->INSERT_LOG($id, $logDescription);
    }else{
        //echo 'log failed';

    }
