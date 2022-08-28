<?php

@ob_start();
date_default_timezone_set("Africa/Lagos");
spl_autoload_register(function($filename){
  require_once __DIR__.'/Includes/'.($filename).".php";
});

$database = new Database();
$conn = $database->osotech_connect();
$Osotech = new Osotech($conn);
$OsotechMailer = new OsotechMailer();
