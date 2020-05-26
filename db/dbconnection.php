<?php
//timezone
date_default_timezone_set("Africa/Accra");

$pdoConn = new PDO ('mysql:host=localhost; port=3306; dbname=anonymous_system', 'root', '');
$pdoConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
// if ($pdoConn->errorInfo()) {
//     echo 'Hey. something went wrong. '. errorInfo();
// } else{
//     echo 'congratulations. database connection is successful';
// }