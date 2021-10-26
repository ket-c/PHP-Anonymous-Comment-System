<?php
//timezone
date_default_timezone_set("Africa/Accra");
if (session_status() == PHP_SESSION_NONE) {
 session_start();
}
if(!isset($_SESSION['user_id'])){	
// header("Location:../");
echo 'please login';
exit();
	
}else{
	
}