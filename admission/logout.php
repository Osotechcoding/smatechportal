<?php
include_once "./Includes/initialize.php";
session_start();
if (isset($_GET['applicant'],$_GET['action'])) {
  if ($_GET['action'] === "logout" && $_GET['applicant'] === "new") {
  //destroy all the session applicant info
  //unset($_SESSION["AUTH_SMATECH_APPLICANT_ID"], $_SESSION["AUTH_CODE_ADMISSION_NO"]);
  session_destroy();
 header("Location:".APP_ROOT);
   exit();
  }
}
