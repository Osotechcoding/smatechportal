<?php 
require_once "visap_helper.php";
$ses_id = $_SESSION['STD_SES_ID'];

if (isset($_GET['action'])) {
	if ($_GET['action'] ==="logout") {
	//$ses_id = $_SESSION['STAFF_ID'];
		if ($Student->deleteStudentSessionToken($_SESSION['STD_USERNAME'],$_SESSION['STD_EMAIL'],$_SESSION['student_log_token'])) {
			if ($Student->logout($ses_id)) {
		if (isset($_COOKIE['student_login_email']) && !$Configuration->isEmptyStr($_COOKIE['student_login_email'])) {
		unset($ses_id,$_SESSION);
			Session::lock_screen();
		}else{
		$Configuration->destroy();	
		}
		}
		}
		
	}
}
 ?>