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
$dbh = osotech_connect();
$Student = new Student();
$Staff = new Staff();
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

    if ($_POST['action'] === "import_staff_bulk_csv_data") {
      $result = importMassTeacherViaCSVExcelFile($_POST, $_FILES);
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
    //import_student_bulk_psycho_domain_score_
    if ($_POST['action'] === "import_student_bulk_psycho_domain_score_") {
      $result = importStudentPsychomotorDomainScoreSheetViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }

     //import_student_bulk_attendance_record_
    if ($_POST['action'] === "import_student_bulk_attendance_record_") {
      $result = importStudentAttendanceRecordSheetViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }

     //import_student_bulk_result_comment_record_
    if ($_POST['action'] === "import_student_bulk_result_comment_record_") {
      $result = importStudentResultCommentScoreViaCSVFile($_POST, $_FILES);
      if ($result) {
        echo $result;
      }
    }
  }
}

function importStudentResultCommentScoreViaCSVFile($data, $csv_file)
{
  $dbh = osotech_connect();
  global $Alert;
  global $config;
  $File_tmp = $csv_file['comment_file']['tmp_name'];
  $FileName = $csv_file['comment_file']['name'];
  $student_class = $data['comment_class'];
  $term = $data['comment_term'];
  $session  = $data['comment_sess'];
  $auth_pass = $data['auth_code'];
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
        $reg_number = (string)$config->Clean($row[0]);
        $teacher_comment = (string)$config->Clean($row[1]);
        $principal_comment = (string)$config->Clean($row[2]);
        if ($config->isEmptyStr($reg_number) || $config->isEmptyStr($teacher_comment) || $config->isEmptyStr($principal_comment)) {
        $response = $Alert->alert_toastr("error",  "Invalid upload, Please check and try again!", __OSO_APP_NAME__ ." Says");
        }
        //check for duplicate entry
        $sql = "SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND `schl_Sess`=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($reg_number, $student_class, $term, $session));
        if ($stmt->rowCount() > 0) {
          $response = $Alert->alert_toastr("error",  "This Comment is already uploaded!", __OSO_APP_NAME__ ." Says");
        } else {
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_result_comment_tbl`
    (stdRegNo,stdGrade,teacher_comment,principal_coment,term,schl_Sess)
    VALUES (?,?,?,?,?,?);");
            if ($stmt->execute(array($reg_number, $student_class,$teacher_comment,$principal_comment, $term, $session))) {
              $dbh->commit();
              //$dbh = null;
              $response = $Alert->alert_toastr(
                "success",
                " Psychomotor Score imported Successfully...",
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

function importStudentPsychomotorDomainScoreSheetViaCSVFile($data, $csv_file)
{
  $dbh = osotech_connect();
  global $Alert;
  global $config;
  $File_tmp = $csv_file['psycho_file']['tmp_name'];
  $FileName = $csv_file['psycho_file']['name'];
  $student_class = $data['cstudent_class'];
  $term = $data['csv_term'];
  $session  = $data['csv_psycho_schol_ses'];
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
        $handwriting = (int)$config->Clean($row[1]);
        $sports = (int)$config->Clean($row[2]);
        $fluency = (int)$config->Clean($row[3]);
        $handling_tools = (int)$config->Clean($row[4]);
        $drawing = (int)$config->Clean($row[5]);
        $crafts = (int)$config->Clean($row[6]);
        //check for duplicate entry
        $sql = "SELECT * FROM `visap_psycho_tbl` WHERE reg_number=? AND student_class=? AND term=? AND `session`=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($reg_number, $student_class, $term, $session));
        if ($stmt->rowCount() > 0) {
          $response = $Alert->alert_toastr("error",  " This Psychomotor score is already uploaded, Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else if ($handwriting > 5 || $sports > 5 || $fluency > 5 || $handling_tools > 5 || $drawing > 5 || $crafts > 5) {
          $response = $Alert->alert_toastr("error",  "Invalid Figure detected, score cannot be greater than 5 Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else if ($handwriting < 1 || $sports < 1 || $fluency < 1 || $handling_tools < 1 || $drawing < 1 || $crafts < 1) {
          $response = $Alert->alert_toastr("error",  "Invalid Figure detected, score cannot be less than 1 Please check and try again!", __OSO_APP_NAME__ .
            " Says");
        } else {
          $today_date = date("Y-m-d");
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_psycho_tbl`
    (reg_number,student_class,term,`session`,Handwriting,Sports,Fluency,Handlingtools,Drawing,crafts,class_teacher,uploaded_date)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array($reg_number, $student_class, $term, $session, $handwriting, $sports, $fluency, $handling_tools, $drawing, $crafts, $class_teacher, $today_date))) {
              $dbh->commit();
             // $dbh = null;
              $response = $Alert->alert_toastr(
                "success",
                " Psychomotor Score imported Successfully...",
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

function importStudentAttendanceRecordSheetViaCSVFile($data, $csv_file)
{
  $dbh = osotech_connect();
  global $Alert;
  global $config;
  $File_tmp = $csv_file['attendance_file']['tmp_name'];
  $FileName = $csv_file['attendance_file']['name'];
  $student_class = $data['attendance_class'];
  $term = $data['attendance_term'];
  $session  = $data['attendance_session'];
  $auth_pass = $data['auth_code'];
  $timeOpen = $data['schl_open'];
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
        $present = (int)$config->Clean($row[1]);
        $absent = (int)$config->Clean($row[2]);
        //check for duplicate entry
        $sql = "SELECT * FROM `visap_student_attendance_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND `schl_session`=?";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array($reg_number, $student_class, $term, $session));
        if ($stmt->rowCount() > 0) {
          $response = $Alert->alert_toastr("error",  " This Record is already uploaded!", __OSO_APP_NAME__ .
            " Says");
        } else {
          $datetime = date("Y-m-d h:i:s");
          $absent = (int)($timeOpen - $present);
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_student_attendance_tbl`
    (stdRegNo,stdGrade,school_open,present,absent,term,schl_session,uploaded_by,uploaded_at)
    VALUES (?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array($reg_number, $student_class,$timeOpen,$present,$absent, $term, $session, $class_teacher, $datetime))) {
              $dbh->commit();
              $dbh = null;
              $response = $Alert->alert_toastr(
                "success",
                " Attendance Record imported Successfully!",
                __OSO_APP_NAME__ . " Says"
              ) . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 1000);
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
          $response = $Alert->alert_toastr("error",  " This Affective score is already uploaded, Please check and try again!", __OSO_APP_NAME__ .
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
  $studentClass = $data['result_class'];
  $term = $data['result_term'];
  $session  = $data['result_session'];
  $subject = $data['csv_result_subject'];
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
              $response = $Alert->alert_toastr("error", "Unknown Error Occurred, Please try again!", __OSO_APP_NAME__ .
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
  $File_tmp = $csv_file['studentCsvFile']['tmp_name'];
  $FileName = $csv_file['studentCsvFile']['name'];
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
    //Omitting the first line such as Heading Title
    foreach ($sheet_data as $row) {
      if ($count > 0) {
        //name the columns needed
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
        $stdConfToken = substr(md5(uniqid(mt_rand(10, 999), true)),0,14);
        if ($config->check_single_data('visap_staff_tbl', 'staffEmail', $stdEmail)) {
          $response = $Alert->alert_toastr("error", "$stdEmail is already taken!", __OSO_APP_NAME__ . " Says");
        } elseif ($config->check_single_data('visap_student_tbl', 'stdEmail', $stdEmail)) {
          $response = $Alert->alert_toastr("error", "$stdEmail is already taken on this Portal!", __OSO_APP_NAME__
            . " Says");
        } else {
          if ($stdGender === "f" || $stdGender === "F") {
            $stdGender = "Female";
          } else if ($stdGender === "m" || $stdGender === "M") {
            $stdGender = "Male";
          } else {
            $stdGender = "Other";
          }
          $stdPhone = "0" . $stdPhone;
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_student_tbl`
    (stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdFirstName,stdMiddleName,stdDob,stdGender,stdAddress,stdPhone,stdAdmStatus,stdApplyDate,stdApplyType,stdConfToken,admitted_class)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array(
              $stdRegNo, $stdEmail, $stdUserName, $stdPassword, $studentClass, $stdSurName,
              $stdFirstName, $stdMiddleName, $stdDob, $stdGender, $stdAddress, $stdPhone, $stdAdmStatus, $stdApplyDate,
              $stdApplyType, $stdConfToken,$studentClass
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

function importMassTeacherViaCSVExcelFile($csv_data, $csv_file)
{
  $response = "";
  $dbh = osotech_connect();
  global $Staff;
  global $Alert;
  global $config;
  $File_tmp = $csv_file['staff_csv_file']['tmp_name'];
  $FileName = $csv_file['staff_csv_file']['name'];
  $auth_pass = $csv_data['auth_code'];
  $allowedExt = array('xls', 'csv', 'xlsx');

  $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);

  if ($config->isEmptyStr($auth_pass) || $config->isEmptyStr($FileName)) {

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
        $surname = $config->Clean($row[0]);
        $firstName = $config->Clean($row[1]);
        $staffUser = $firstName;
        $lastName = $config->Clean($row[2]);
        $staffEmail = $config->Clean($row[3]);
        $staffPhone = $config->Clean($row[4]);
        $staffAddress = $config->Clean($row[5]);
        $staffGender = $config->Clean($row[6]);
        $staffEducation = $config->Clean($row[7]);
        $staffDob = $config->Clean(date("Y-m-d", strtotime($row[8])));
        $appliedDate = $config->Clean(date("Y-m-d", strtotime($row[9])));
        $staffType = $config->Clean($row[10]);
        $mpassword = "staff123";
        $hashed_password = $config->encrypt_user_password($mpassword);
        $staffRegNo = $Staff->generate_staff_registration_number();
        $confirmation_code = substr(md5(uniqid(mt_rand(11111, 99999), true)), 0, 15);
        //$reg_date = date("Y-m-d");
        $div_email = explode("@", $staffEmail);
        $portal_email = $div_email[0] . "@" . __OSO_APP_NAME__ . ".portal";
        $fullName = $firstName . " " . $lastName;
        $staff_status = 1;
        if ($config->check_single_data('visap_staff_tbl', 'staffEmail', $staffEmail)) {

          $response = $Alert->alert_toastr("error", "$staffEmail is already taken!", __OSO_APP_NAME__ . " Says");
        } elseif ($config->check_single_data('visap_student_tbl', 'stdEmail', $staffEmail)) {

          $response = $Alert->alert_toastr("error", "$staffEmail is already taken on this Portal!", __OSO_APP_NAME__
            . " Says");
        } else {
          if ($staffGender == "f" || $staffGender == "F") {
            $staffGender = "Female";
          } else if ($staffGender == "m" || $staffGender == "M") {
            $staffGender = "Male";
          } else {
            $staffGender = "Other";
          }
          $staffPhone = "0" . $staffPhone;
          try {
            $dbh->beginTransaction();
            $stmt = $dbh->prepare("INSERT INTO `visap_staff_tbl`
    (staffRegNo,firstName,lastName,staffEmail,staffPass,staffUser,staffDob,staffEducation,staffPhone,staffAddress, confirmation_code,staffGender,portalEmail,jobStatus,staffType,appliedDate)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
            if ($stmt->execute(array($staffRegNo, $fullName, $surname, $staffEmail, $hashed_password, $staffUser, $staffDob, $staffEducation, $staffPhone, $staffAddress, $confirmation_code, $staffGender, $portal_email, $staff_status, $staffType, $appliedDate))) {
              $dbh->commit();
              $response = $Alert->alert_toastr(
                "success",
                "Staff Uploaded &amp; Registered Successfully...",
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