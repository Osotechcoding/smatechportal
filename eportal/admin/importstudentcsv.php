<?php
@session_start();
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

spl_autoload_register(function ($filename) {
  require_once "../classes/" . ucfirst($filename) . ".php";
});
require_once "../classes/Database.php";

$request_method  = $_SERVER['REQUEST_METHOD'];

if ($request_method === "POST") {

  if (isset($_POST['action']) && $_POST['action'] != "") {

    if ($_POST['action'] === "upload_student_bulk_csv_data") {
      $result = importMassStudentViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }
  }
}

function importMassStudentViaCSVFile($data, $csv_file)
{
  $dbh = osotech_connect();
  $response = "";
  $Student = new Student();
  $Alert = new Alert;
  $config = new Configuration();
  $File_tmp = $csv_file['studentCsvFile']['tmp_name'];
  $FileName = $csv_file['studentCsvFile']['name'];
  $studentClass = $data['student_class'];
  $auth_pass = $data['auth_code'];
  $allowedExt = array('xls', 'csv', 'xlsx');
  $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);

  if (
    empty($auth_pass) || empty($studentClass) || empty($FileName)
  ) {
    $response = $Alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__
      . " Says");
  } elseif (!in_array($file_ext, $allowedExt)) {
    $response = $Alert->alert_toastr(
      "error",
      "Only CSV, XLS or XLSX Extension is allowed!",
      __OSO_APP_NAME__ . " Says"
    );
  } else if ($auth_pass !== __OSO__CONTROL__KEY__) {
    $response = $Alert->alert_toastr(
      "error",
      "Invalid Authentication Code, Pls try again!",
      __OSO_APP_NAME__
        . " Says"
    );
  } else {
    /** Load $inputFileName to a Spreadsheet object **/
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($File_tmp);
    $sheet_data = $spreadsheet->getActiveSheet()->ToArray();
    $count = "0";
    //Omitting the first line such Heading Title
    foreach ($sheet_data as $row) {
      if ($count > 0) {
        //name the columns ndeeded
        //Surname,Firstname,Lastname,Date_of_birth,Gender,Address,Phone,Email,Admission_date,Student_Type, Admission_number
        $stdSurName = $config->Clean($row[0]);
        $stdUserName = $stdSurName;
        $stdFirstName = $config->Clean($row[1]);
        $stdMiddleName = $config->Clean($row[2]);
        $stdDob = $config->Clean(date("Y-m-d", strtotime($row[3])));
        $stdGender = $config->Clean($row[4]);
        $stdAddress = $config->Clean($row[5]);
        $stdPhone = $config->Clean($row[6]);
        $stdEmail = $config->Clean($row[7]);
        $stdApplyDate = $config->Clean(date("Y-m-d", strtotime($row[8])));
        $stdApplyType = $config->Clean($row[9]);
        //$stdRegNo = $config->Clean($row[10]);
        $default_pass = "student";
        $stdPassword = $config->encrypt_user_password($default_pass);
        $stdAdmStatus = "Active";
        $stdRegNo = $Student->generate_admission_number($config->Clean($row[10]));
        $stdConfToken = substr(
          md5(uniqid(mt_rand(10, 999), true)),
          0,
          14
        );
        if ($config->check_single_data('visap_staff_tbl', 'staffEmail', $stdEmail)) {

          $response = $Alert->alert_toastr("error", "$stdEmail is already taken!", __OSO_APP_NAME__ . " Says");
        } elseif ($config->check_single_data('visap_student_tbl', 'stdEmail', $stdEmail)) {

          $response = $Alert->alert_toastr("error", "$stdEmail is already taken on this Portal!", __OSO_APP_NAME__
            . " Says");
        } else {
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_student_tbl`
    (stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdFirstName,stdMiddleName,stdDob,stdGender,stdAddress,stdPhone,stdAdmStatus,stdApplyDate,stdApplyType,stdConfToken)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array(
              $stdRegNo, $stdEmail, $stdUserName, $stdPassword, $studentClass, $stdSurName,
              $stdFirstName, $stdMiddleName, $stdDob, $stdGender, $stdAddress, $stdPhone, $stdAdmStatus, $stdApplyDate,
              $stdApplyType, $stdConfToken
            ))) {
              $dbh->commit();

              $response = $Alert->alert_toastr(
                "success",
                "Students Uploaded &amp; Registered Successfully...",
                __OSO_APP_NAME__ . " Says"
              ) . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 1500);
    </script>";
            } else {
              $response = $Alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
                " Says");
            }
          } catch (PDOException $e) {
            $dbh->rollback();
            $response = $Alert->alert_toastr(
              "error",
              "Error Occurred: " . $e->getMessage(),
              __OSO_APP_NAME__ . "
    Says"
            );
          }
        }
      } else {
        $count = "1";
      }
      # code...
    }
  }
  return $response;
}