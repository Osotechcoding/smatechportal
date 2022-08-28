<?php
//@ob_start();
@session_start();
date_default_timezone_set("Africa/Lagos");
require_once 'Database.php';
require_once 'Osotech.php';
require_once 'OsotechMailer.php';

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'POST') {
  if (isset($_POST['action'],$_POST['osotech_csrf'])) {
  if ($_POST['osotech_csrf'] === md5('iremideoizasamsonosotech')) {
    if ( $_POST['action'] === "submit_first_step_admission") {
      // process the request
      $registrationRequest = $Osotech->process_first_step_admission($_POST);
      if ($registrationRequest) {
        echo $registrationRequest;
      }
    }

    if ($_POST['action'] === "fetch_local_govt") {
            $state_name = $_POST['state_name'];
            $result = $Osotech->fetch_all_local_govt_state($state_name);
            if ($result) {
              echo $result;
            }
        }
        //submit_second_step_admission
        if ($_POST['action'] === "submit_second_step_admission") {
            $output = $Osotech->process_student_admission_second_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_third_step_admission
        if ($_POST['action'] ==="submit_third_step_admission") {
            $output = $Osotech->process_student_admission_third_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_fourth_step_admission
        if ($_POST['action'] ==="submit_fourth_step_admission") {
            $output = $Osotech->process_student_admission_fourth_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_fifth_step_admission
        if ($_POST['action'] ==="submit_fifth_step_admission") {
            $output = $Osotech->process_student_admission_fifth_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_final_step_admission
        if ($_POST['action'] ==="submit_final_step_admission") {
            $output = $Osotech->process_student_admission_final_step($_POST,$_FILES);
            if ($output) {
                echo $output;
            }
        }
  }else{
    die('Access denied:');
  }
  }
}
