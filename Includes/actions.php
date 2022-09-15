
<?php 
date_default_timezone_set("Africa/Lagos");
require_once 'Database.php';
require_once 'Osotech.php';
//require_once 'OsotechMailer.php';

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method === "POST") {

	if (isset($_POST['action'])) {

		if ($_POST['action'] === "send_feed_back_msg") {

	$result = $Osotech->sendFeedBackMessage($_POST);

	if ($result) {

		echo $result;
	}

		}


	if ($_POST['action'] === "submit_start_career_form") {
	$result = $Osotech->submitStaffResumeApplicationForm($_POST,$_FILES);
	if ($result) {
		echo $result;
	}
		}

		//submit_blog_comment_
		if ($_POST['action'] === "submit_blog_comment_") {
	$result = $Osotech->submitClientBlogComment($_POST);
	if ($result) {
		echo $result;
	}
		}


	}

}