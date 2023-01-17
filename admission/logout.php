<?php
include_once "./Includes/initialize.php";
session_start();
if (isset($_GET['applicant'],$_GET['action'])) {
  if ($_GET['action'] === "logout" && $_GET['applicant'] === "new") {
  session_destroy();
 header("Location:".APP_ROOT);
   exit();
  }
}
//full laravel 9 crud app https://www.youtube.com/watch?v=8KaBeq9JzrQ