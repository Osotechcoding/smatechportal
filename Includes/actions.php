
<?php 
date_default_timezone_set("Africa/Lagos");
require_once 'Database.php';
require_once 'Osotech.php';
//require_once 'OsotechMailer.php';

$request_method = $_SERVER['REQUEST_METHOD'];
$request_time = $_SERVER['REQUEST_TIME'];

if ($request_method === "POST") {
	if ($_POST['action'] === "send_feed_back_msg") {
	$result = $Osotech->sendFeedBackMessage($_POST);
	if ($result) {
		echo $result;
	}
	}
}