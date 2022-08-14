<?php 
require_once "helpers/helper.php";
$ses_id = $_SESSION['STAFF_SES_ID'];

if (isset($_GET['action'])) {
	if ($_GET['action'] ==="logout") {
	//$ses_id = $_SESSION['STAFF_ID'];
		if ($Staff->deleteSessionToken($_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL'],$_SESSION['staff_token'])) {
			if ($Staff->logout($ses_id)) {
		if (isset($_COOKIE['login_email']) && !$Configuration->isEmptyStr($_COOKIE['login_email'])) {
		unset($ses_id);
			Session::lock_screen();
		}else{
		Session::destroy();	
		}
		}
		}
		
	}
}
 ?>