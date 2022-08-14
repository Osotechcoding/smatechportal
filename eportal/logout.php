<?php 
require_once "helpers/helper.php";

$ses_id = $_SESSION['ADMIN_ID'];

if (isset($_GET['action'])) {
	if ($_GET['action'] ==="logout") {
		unset($ses_id);
		if (isset($_COOKIE['login_email']) && ! empty($_COOKIE['login_email'])) {
			header("location: lock-screen");
			exit();
		}else{
		Session::destroy();
		}
		
	}
}else{
	Session::destroy();
}


 ?>