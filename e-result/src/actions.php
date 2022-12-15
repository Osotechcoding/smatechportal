<?php
date_default_timezone_set("Africa/Lagos");
//require_once 'Database.php';
require_once 'Osotech.php';
require_once 'StudentResult.php';
$Osotech->osotech_session_kick();

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'POST') {
  if (isset($_POST['action'], $_POST['osotech_csrf'])) {
    if ($_POST['osotech_csrf'] === md5('iremideoizasamsonosotech12345')) {
      switch ($_POST['action']) {
        case 'check_student_result_now':
          $result_output = $StudentResult->displayStudentResult($_POST);
          if ($result_output) {
            echo $result_output;
          }
          break;

        default:
          die('Access denied:');
          break;
      }
    } else {
      die('Access denied:');
    }
  }
}