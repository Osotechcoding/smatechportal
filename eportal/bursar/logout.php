<?php 
require_once "helpers/helper.php";
$ses_id = $_SESSION['STAFF_SES_ID'];

if (isset($_GET['action']) && isset($_SESSION['STAFF_SES_ID'])) {
	if ($_GET['action'] ==="logout") {
	//$ses_id = $_SESSION['STAFF_SES_ID'];
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