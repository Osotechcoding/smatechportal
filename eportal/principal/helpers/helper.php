<?php
session_start();
require_once '../classes/Database.php';
require_once "../languages/config.php";
require_once "../classes/Configuration.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  include_once "../classes/".ucfirst($filename).".php";
});

$Visitor        = new Visitors();
$Student        = new Student();
$Result         = new Result();
$Staff          = new Staff();
$Configuration  = new Configuration();
$Administration = new Administration();
 $Admin         = new Admin();
$Pin_serial     = new Pins();
$Alert          = new Alert();
$Blog           = new Blog();

@$Configuration->osotech_session_kick();
//$Configuration->check_session_data();
$staffId = $_SESSION['STAFF_SES_ID'];
/* School Details*/
$SmappDetails = $Configuration->getConfigData();
/* School Details*/

/*STAFF SESS DETAILS*/
$staff_data = $Staff->get_staff_ById($staffId);
$name_arr = explode(" ",$staff_data->firstName);
/*STAFF SESS DETAILS*/
$getMyClassDesc = $Administration->isClassTeacher($staffId);
if ($getMyClassDesc) {
  $sess_Staffclass = $getMyClassDesc->duty;
  $duty_desc = $getMyClassDesc->office;
}
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();

if ($Staff->checkStaffTokenExists($_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL'],$_SESSION['staff_token']) === false) {
  $Configuration->destroy();
}
 ?>
