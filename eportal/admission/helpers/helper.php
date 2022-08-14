<?php
@ob_start();
@session_start();
require_once "../languages/config.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  require_once "../classes/".ucfirst($filename).".php";
});

$Student        = new Student();
$Configuration  = new Configuration();
$Administration = new Administration();
$Pin_serial     = new Pins();
$Alert          = new Alert();
@$Configuration->osotech_session_kick();
$SmappDetails = $Configuration->getConfigData();
$VisaPSchoolDetails = $Administration->get_school_profile_details();
$VisaPSoicalLink = $Administration->get_schoolsocil_link_details();
//Session Details
$session_data = $Administration->get_session_details();
$activeSess =$Administration->get_active_session_details();
