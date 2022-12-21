<?php
require_once "languages/config.php";
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function ($filename) {
  include_once "classes/" . ucwords($filename) . ".php";
});

$Visitor = new Visitors();
$Student = new Student();
$Result = new Result();
$Staff = new Staff();
$Configuration = new Configuration();
$Administration = new Administration();
$Admin          = new Admin();
$Pin_serial     = new Pins();
$Alert = new Alert();
//Session Details
$session_data = $Administration->get_session_details();
$activeSess = $Administration->get_active_session_details();
$SmappDetails = $Configuration->getConfigData();