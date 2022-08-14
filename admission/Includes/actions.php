<?php
require_once '../helper.php';

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

    if ($_POST['action'] ==="fetch_local_govt") {
            $state = $_POST['state'];
            $output = $Osotech->fetch_all_local_govt_state($state);
            if ($output) {
                echo $output;
            }
        }

        //submit_first_step_admission
        if ($_POST['action'] ==="submit_first_step_admission") {
            $output = $Osotech->start_student_admission_first_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_second_step_admission
        if ($_POST['action'] ==="submit_second_step_admission") {
            $output = $Osotech->start_student_admission_second_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_third_step_admission
        if ($_POST['action'] ==="submit_third_step_admission") {
            $output = $Osotech->start_student_admission_third_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_fourth_step_admission
        if ($_POST['action'] ==="submit_fourth_step_admission") {
            $output = $Osotech->start_student_admission_fourth_step($_POST,$_FILES);
            if ($output) {
                echo $output;
            }
        }

        //submit_fifth_step_admission

        if ($_POST['action'] ==="submit_fifth_step_admission") {
            $output = $Osotech->start_student_admission_fifth_step($_POST);
            if ($output) {
                echo $output;
            }
        }
        //submit_final_step_admission
        if ($_POST['action'] ==="submit_final_step_admission") {
            $output = $Osotech->start_student_admission_final_step($_POST,$_FILES);
            if ($output) {
                echo $output;
            }
        }
        //check_student_phone
        if ($_POST['action'] ==="check_student_phone") {
            $phone = $_POST['Phone'];
            $output = $Osotech->check_duplicate_phone($phone);
            if ($output) {
                echo $output;
            }
        }

        //check_student_phone
        if ($_POST['action'] ==="check_student_email") {
            $email = $_POST['Email'];
            $output = $Osotech->check_duplicate_email($email);
            if ($output) {
                echo $output;
            }
        }
  }else{
    die('Access denied:');
  }
  }
}
