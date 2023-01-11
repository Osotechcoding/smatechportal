<?php
// @session_start();
require_once "../languages/config.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function ($filename) {
  require_once "../classes/" . ucwords($filename) . ".php";
});

$Visitor        = new Visitors();
$Student        = new Student();
$Result         = new Result();
$Staff          = new Staff();
$Configuration  = new Configuration();
$Administration = new Administration();
$Admin          = new Admin();
$Pin_serial     = new Pins();
$Alert          = new Alert();
$Payroll        = new Payroll();
$Bus = new Bus();

$Configuration->osotech_session_kick();
$Configuration->check_session_data();
$staffId = $_SESSION['STAFF_SES_ID'];
/* School Details*/
$SmappDetails = $Configuration->getConfigData();
/* School Details*/
/*STAFF SESS DETAILS*/
$staff_data = $Staff->get_staff_ById($staffId);
$name_arr = explode(" ", $staff_data->firstName);
/*STAFF SESS DETAILS*/
//Session Details
$session_data = $Administration->get_session_details();
$activeSess = $Administration->get_active_session_details();