<?php
date_default_timezone_set("Africa/Lagos");
spl_autoload_register(function ($filename) {
  require_once __DIR__ . '/Includes/' . ($filename) . ".php";
});
$conn = osotech_connect();
$Osotech = new Osotech();
$OsotechMailer = new OsotechMailer();