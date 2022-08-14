 <?php 
 @session_start();
include_once "../languages/config.php";
// require_once "../classes/Configuration.php";
include_once '../classes/Session.php';
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  require_once "../classes/".ucfirst($filename).".php";
});
$Configuration 	= new Configuration();
$Student = new Student();
$Administration = new Administration();
$Result = new Result();
$Alert = new Alert();
$Staff = new Staff();
$Pin_serial = new Pins();
@$Configuration->osotech_session_kick();
$Configuration->check_student_session_data();
$ses_token = Session::set_xss_token();

/* School Details*/
$SmappDetails = $Configuration->getConfigData();
/* School Details*/

//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
$student_data = $Student->get_student_data_byId($_SESSION['STD_SES_ID']);

if ($Student->checkStudentTokenExists($_SESSION['STD_USERNAME'],$_SESSION['STD_EMAIL'],$_SESSION['student_log_token']) === false) {
  $Configuration->destroy();
}