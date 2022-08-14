 <?php
 @ob_start();
 @session_start();
include_once "../languages/config.php";
// require_once "../classes/Configuration.php";
require_once '../classes/Session.php';
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  require_once "../classes/".ucfirst($filename).".php";
});
  ?>
 <?php
$ses_token = Session::set_xss_token();
$Configuration 	= new Configuration();
$Admin = new Admin();
$Student = new Student();
$Pin_serial = new Pins();
$Visitor = new Visitors();
$Administration = new Administration();
$Blog = new Blog();
$Result = new Result();

$request_method = $_SERVER['REQUEST_METHOD'];

if ($request_method === 'POST') {

if (isset($_POST['action']) && $_POST['action']!="") {
  // code...
  if ($_POST['action'] ==="delete_subject_now") {
    // code...
    $subjectId = $Configuration->Clean($_POST['subjectId']);
    $result = $Administration->delete_subject_ById($subjectId);
    if ($result) {
      // code...
      echo $result;
    }
  }

   // code...
  if ($_POST['action'] ==="delete_classroom_now") {
    // code...
    $grade = $Configuration->Clean($_POST['grade']);
    $result = $Administration->delete_classroom_ById($grade);
    if ($result) {
      // code...
      echo $result;
    }
  }

  //delete lesson file
    if ($_POST['action'] ==="delete_files") {
    // code...
    $lectureId = $Configuration->Clean($_POST['lectureId']);
    $result = $Administration->delete_virtual_lecture_ById($lectureId);
    if ($result) {
      // code...
      echo $result;
    }
  }

  if ($_POST['action'] ==="delete_compo") {
   $Id = $Configuration->Clean($_POST['Id']);
    $result = $Administration->delete_fee_component_ById($Id);
    if ($result) {
      echo $result;
    }
  }

  //delete_duty
  if ($_POST['action'] ==="delete_duty") {
   $dutyId = $Configuration->Clean($_POST['dutyId']);
    $result = $Administration->delete_staff_duty_by_id($dutyId);
    if ($result) {
      echo $result;
    }
  }

  //remove_student_from_office
  if ($_POST['action'] ==="remove_student_from_office") {
    $prefect_id = $Configuration->Clean($_POST['prefect_id']);
    $result = $Student->remove_student_from_office_now($prefect_id);
    if ($result) {
     echo $result;
    }
  }

  //delete_assignment_now
  if ($_POST['action'] ==="delete_assignment_now") {
    $assId = $Configuration->Clean($_POST['assId']);
    $result = $Student->remove_student_assignment_file_now($assId);
    if ($result) {
     echo $result;
    }
  }

  //delete_call_for_admission
  if ($_POST['action'] ==="delete_call_for_admission") {
    $admId = $Configuration->Clean($_POST['admid']);
    $result = $Administration->deleteAdmissionPortal($admId);
    if ($result) {
     echo $result;
    }
  }

  //delete_gallery
  if ($_POST['action'] ==="delete_gallery") {
    $tId = $Configuration->Clean($_POST['tId']);
    $result = $Blog->delete_galleryById($tId);
    if ($result) {
     echo $result;
    }
  }

  //delete_slider
  if ($_POST['action'] ==="delete_slider") {
    $tId = $Configuration->Clean($_POST['tId']);
    $result = $Blog->delete_SliderById($tId);
    if ($result) {
     echo $result;
    }
  }

  //delete_holiday
   if ($_POST['action'] ==="delete_holiday") {
    $holidayId = $Configuration->Clean($_POST['holidayId']);
    $result = $Administration->deleteHolidayById($holidayId);
    if ($result) {
     echo $result;
    }
  }

  //delete_exam
  if ($_POST['action'] ==="delete_exam") {
   $examid = $Configuration->Clean($_POST['examid']);
   $result = $Administration->deleteExamById($examid);
   if ($result) {
    echo $result;
   }
 }

 if ($_POST['action'] ==="delete_oauth_code") {
   $codeId = $Configuration->Clean($_POST['codeId']);
    $result = $Admin->deleteSchoolOauthCode($codeId);
    if ($result) {
      echo $result;
    }
  }

  //remove_subject_from_result_tbl
  if ($_POST['action'] ==="remove_subject_from_result_tbl") {
   $rId = $Configuration->Clean($_POST['rId']);
    $result = $Result->deleteTermlyResult($rId);
    if ($result) {
      echo $result;
    }
}

  //delete_testi
  if ($_POST['action'] ==="delete_testi") {
   $testiId = $Configuration->Clean($_POST['testiId']);
    $result = $Blog->deleteTestimonialById($testiId);
    if ($result) {
      echo $result;
    }
}

}
}