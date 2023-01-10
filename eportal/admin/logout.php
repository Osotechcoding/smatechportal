<?php 
require_once "helpers/helper.php";
$ses_id = $_SESSION['ADMIN_TOKEN_ID'];
if (isset($_GET['action'])  && isset($_SESSION['ADMIN_TOKEN_ID'])) {
	if ($_GET['action'] ==="logout") {
		if ($Admin->deleteAdminSessionToken($_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL'],$_SESSION['ADMIN_TOKEN'])) {
			if ($Staff->logout($ses_id)) {
		if (isset($_COOKIE['login_email']) && !$Configuration->isEmptyStr($_COOKIE['login_email'])) {
		unset($ses_id);
			Session::lock_screen();
		}else{
		$Configuration->destroy();	
		}
		}
		}
	}
}