<?php
if (!file_exists("Includes/Osotech.php")) {
  die("Access is Denied");
} else {
  require_once 'Includes/Osotech.php';
}
$Osotech->check_portal_status();
@$Osotech->osotech_session_kick();
date_default_timezone_set("Africa/Lagos");