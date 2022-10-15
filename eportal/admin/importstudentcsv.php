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
//$dbh = osotech_connect();
$Student = new Student();
$Alert = new Alert;
$config = new Configuration();

$request_method  = $_SERVER['REQUEST_METHOD'];


if ($request_method === "POST") {

  if (isset($_POST['action']) && $_POST['action'] != "") {

    if ($_POST['action'] === "upload_student_bulk_csv_data") {
      $result = importMassStudentViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }
    //import_student_bulk_result_sheet_csv_data
    if ($_POST['action'] === "import_student_bulk_result_sheet_csv_") {
      $result = importMassStudentResultSheetViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }
    //import_student_bulk_affective_domain_score_
    if ($_POST['action'] === "import_student_bulk_affective_domain_score_") {
      $result = importStudentAffectiveDomainScoreSheetViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }
  }
}

function importStudentAffectiveDomainScoreSheetViaCSVFile($data, $csv_file)
{

  $dbh = osotech_connect();
  global $Alert;
  global $config;
  $File_tmp = $csv_file['affective_file']['tmp_name'];
  $FileName = $csv_file['affective_file']['name'];
  $student_class = $data['csv_student_class'];
  $term = $data['csv_term_'];
  $session  = $data['csv_affecive_schol_ses'];
  $auth_pass = $data['auth_code'];
  $class_teacher = $data['class_teacher'];
  $allowedExt = array('xls', 'csv', 'xlsx');
  $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);

  if ($config->isEmptyStr($auth_pass) || $config->isEmptyStr($student_class) || $config->isEmptyStr($FileName) || $config->isEmptyStr($session) || $config->isEmptyStr($term) || $config->isEmptyStr($class_teacher)) {
    $response = $Alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__
      . " Says");
  } else if ($auth_pass !== __OSO__CONTROL__KEY__) {
    $response = $Alert->alert_toastr(
      "error",
      "Invalid Authentication Code, Pls try again!",
      __OSO_APP_NAME__
        . " Says"
    );
  } elseif (!in_array($file_ext, $allowedExt)) {
    $response = $Alert->alert_toastr(
      "error",
      "Only csv, xls or xlsx Extension is allowed!",
      __OSO_APP_NAME__ . " Says"
    );
  } else {
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($File_tmp);
    $sheet_data = $spreadsheet->getActiveSheet()->ToArray();
    $count = 0;
    foreach ($sheet_data as $row) {
      if ($count > 0) {
        $reg_number = $config->Clean($row[0]);
        $punctual = (int)$config->Clean($row[1]);
        $neatness = (int)$config->Clean($row[2]);
        $honesty = (int)$config->Clean($row[3]);
        $self_control = (int)$config->Clean($row[4]);
        $attentiveness = (int)$config->Clean($row[5]);
        $leadership = (int)$config->Clean($row[6]);
        //check for duplicate entry
        $sql = "SELECT * FROM `visap_behavioral_tbl` WHERE reg_number=? AND student_class=? AND term=? AND `session`=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($reg_number, $student_class, $term, $session));
        if ($stmt->rowCount() > 0) {
          $response = $Alert->alert_toastr("error",  " This students sffective score is already uploaded, Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else if ($punctual > 5 || $neatness > 5 || $honesty > 5 || $self_control > 5 || $attentiveness > 5 || $leadership > 5) {
          $response = $Alert->alert_toastr("error",  "Invalid Figure detected, score cannot be greater than 5 Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else if ($punctual < 1 || $neatness < 1 || $honesty < 1 || $self_control < 1 || $attentiveness < 1 || $leadership < 1) {
          $response = $Alert->alert_toastr("error",  "Invalid Figure detected, score cannot be less than 1 Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else {
          $today_date = date("Y-m-d");
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_behavioral_tbl`
    (reg_number,student_class,term,`session`,punctuality,neatness,honesty,self_control,attentiveness,leadership,class_teacher,uploaded_date)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array($reg_number, $student_class, $term, $session, $punctual, $neatness, $honesty, $self_control, $attentiveness, $leadership, $class_teacher, $today_date))) {
              $dbh->commit();
              $dbh = null;
              $response = $Alert->alert_toastr(
                "success",
                " Affective Score imported Successfully...",
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
        $count = 1;
      }
    }
  }

  return $response;
}

function importMassStudentResultSheetViaCSVFile($data, $csv_file)
{
  $dbh = osotech_connect();
  global $Alert;
  global $config;

  $File_tmp = $csv_file['result_file']['tmp_name'];
  $FileName = $csv_file['result_file']['name'];
  $studentClass = $data['csv_class'];
  $term = $data['csv_term'];
  $session  = $data['csvresult_schol_ses'];
  $subject = $data['csv_subject'];
  $auth_pass = $data['auth_code'];
  $allowedExt = array('xls', 'csv', 'xlsx');

  $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);

  if ($config->isEmptyStr($auth_pass) || $config->isEmptyStr($studentClass) || $config->isEmptyStr($FileName) || $config->isEmptyStr($subject) || $config->isEmptyStr($term)) {
    $response = $Alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__
      . " Says");
  } else if ($auth_pass !== __OSO__CONTROL__KEY__) {
    $response = $Alert->alert_toastr(
      "error",
      "Invalid Authentication Code, Pls try again!",
      __OSO_APP_NAME__
        . " Says"
    );
  } elseif (!in_array($file_ext, $allowedExt)) {
    $response = $Alert->alert_toastr(
      "error",
      "Only csv, xls or xlsx Extension is allowed!",
      __OSO_APP_NAME__ . " Says"
    );
  } else {
    $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($File_tmp);
    $sheet_data = $spreadsheet->getActiveSheet()->ToArray();
    $count = 0;
    foreach ($sheet_data as $row) {
      if ($count > 0) {
        //name the columns ndeeded
        //admission_no,subject,ca_score,exam_score,
        $admission_no = $config->Clean($row[0]);
        $ca_score = $config->Clean($row[1]);
        $exam_score = $config->Clean($row[2]);
        switch ($term) {
          case '1st Term':
            $table_name = "visap_1st_term_result_tbl";
            break;
          case '2nd Term':
            $table_name = "visap_2nd_term_result_tbl";
            break;
          case '3rd Term':
            $table_name = "visap_termly_result_tbl";
            break;

          default:
            break;
        }
        //lets check for error
        $sql = "SELECT * FROM $table_name WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? AND subjectName=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($admission_no, $studentClass, $term, $session, $subject));
        if ($stmt->rowCount() > 0) {
          $response = $Alert->alert_toastr("error", strtoupper($subject) . " is already uploaded, Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else {
          //calculate score
          $rStatus = 1;
          $average = (float) (($ca_score + $exam_score) / 2);
          $overallMark = (float) (($ca_score + $exam_score));
          $today_date = date("Y-m-d");
          $today_time = date("H:i:s", time());
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `$table_name`
    (stdRegCode,studentGrade,term,aca_session,subjectName,ca,exam,overallMark,mark_average,uploadedTime,uploadedDate,rStatus)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array($admission_no, $studentClass, $term, $session, $subject, $ca_score, $exam_score, $overallMark, $average, $today_time, $today_date, $rStatus))) {
              $dbh->commit();

              $response = $Alert->alert_toastr(
                "success",
                $subject . " Score imported Successfully...",
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
        $count = 1;
      }
    }
  }

  return $response;
}

function importMassStudentViaCSVFile($data, $csv_file)
{
  $response = "";
  $dbh = osotech_connect();
  global $Student;
  global $Alert;
  global $config;
  $File_tmp = $csv_file['result_file']['tmp_name'];
  $FileName = $csv_file['result_file']['name'];
  $studentClass = $data['student_class'];
  $auth_pass = $data['auth_code'];
  $allowedExt = array('xls', 'csv', 'xlsx');

  $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);

  if ($config->isEmptyStr($auth_pass) || $config->isEmptyStr($studentClass) || $config->isEmptyStr($FileName)) {

    $response = $Alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
  } elseif (!in_array($file_ext, $allowedExt)) {

    $response = $Alert->alert_toastr("error", "Only CSV, XLS or XLSX Extension is allowed!", __OSO_APP_NAME__ . " Says");
  } else if ($auth_pass !== __OSO__CONTROL__KEY__) {

    $response = $Alert->alert_toastr("error", "Invalid Authentication Code, Pls try again!", __OSO_APP_NAME__ . " Says");
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