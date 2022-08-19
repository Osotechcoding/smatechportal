<?php
require_once 'src/initialize.php';
@session_start();
@ob_start();
$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method === 'GET') {
  if (isset($_GET['action'],$_GET['student'])) {
    if ($_GET['action'] === "logout" && $_GET['student'] === "cstudent") {
    //destroy all the session applicant info
    unset($_SESSION);
    @session_destroy();
    header("Location: ".APP_ROOT);
    exit();
    }
  }
}
