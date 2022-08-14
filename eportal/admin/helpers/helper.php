<?php
@ob_start();
@session_start();
require_once "../languages/config.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  require_once "../classes/".ucfirst($filename).".php";
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
$Blog          = new Blog();

@$Configuration->osotech_session_kick();
$Admin->check_Auth_data();
$adminId = $_SESSION['ADMIN_TOKEN_ID'];

/*ADMIN SESS DETAILS*/
$admin_data = $Admin->getAdminDetails();
$SmappDetails = $Configuration->getConfigData();
/*ADMIN SESS DETAILS*/
$isSuperAdmin = $Admin->isSuperAdmin($admin_data->adminId);
if ($isSuperAdmin) {
  $adminType = $isSuperAdmin->adminType;
}

$VisaPSchoolDetails = $Administration->get_school_profile_details();
$VisaPSoicalLink = $Administration->get_schoolsocil_link_details();
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
if ($Admin->checkAdminTokenExists($_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL'],$_SESSION['ADMIN_TOKEN']) === false) {
  $Configuration->destroy();
}
 ?>
