 <?php
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
//$ses_token = Session::set_xss_token();
$Configuration 	= new Configuration();
$Admin = new Admin();
$Pin_serial = new Pins();
$Visitor = new Visitors();
$Staff = new Staff();
$Result = new Result();
$Student = new Student();
$Administration = new Administration();
$Alert = new Alert();
$Blog = new Blog();

$request_method  = $_SERVER['REQUEST_METHOD'];
if ($request_method ==="POST") {

if (isset($_POST['action']) && $_POST['action'] !="") {

	if ($_POST['action'] ==="logAdminIn") {
		$result = $Admin->login($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="staff_login") {
		$result = $Staff->login_staff($_POST);
		if ($result) {
			echo $result;
		}
	}

	//stud_login

	if ($_POST['action'] ==="stud_login") {
		$result = $Student->absolute_student_login($_POST);
		if ($result) {
			echo $result;
		}
	}

	//assign_staff_office_now
	if ($_POST['action'] ==="assign_staff_office_now") {
		$result = $Staff->assign_staff_office($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action']==="sign_in_visitor_now") {
		// code...
		$result = $Visitor->submit_vistors_details($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="sign_out_vic") {
		// code...
		$result = $Visitor->auto_sign_out_visitor($_POST);
		if ($result) {
			echo $result;
		}
	}

		if ($_POST['action'] ==="genCard") {
			$result = $Pin_serial->generate_scratch_pins($_POST);
			if ($result) {
				echo $result;
			}
	}

	if ($_POST['action'] ==="submit_new_subject") {
		// code...
		$result = $Administration->create_subject($_POST);
		if ($result) {
			// code...
			echo $result;
		}
	}

		if ($_POST['action'] ==="submit_new_classroom") {
		// code...
		$result = $Administration->create_classroom($_POST);
		if ($result) {
			// code...
			echo $result;
		}
	}

	if ($_POST['action'] ===md5("delete_pins")) {
		$pinId = $Configuration->Clean($_POST['pinId']);
		$table = $Configuration->Clean($_POST['table_name']);
		
		switch ($table) {
			case 'tap':
				// code...
			$table ="tbl_reg_pins";
				break;
				case 'trp':
				 $table ="tbl_result_pins";
				 break;
		}
			$result = $Pin_serial->removeUsedResultPin($table,$pinId);
			if ($result) {
				echo $result;
			}
	}

/*	if ($_POST['action'] === md5("delete_res_pins")) {
		$pinId = $Configuration->Clean($_POST['pinId']);
		$result = $Pin_serial->removeUsedResultPin($pinId);
		if ($result) {
				echo $result;
			}
	}*/

	if ($_POST['action'] ==="submit_student_result_upload_now") {
	$result = $Result->upload_student_result($_POST);
	if ($result) {
			echo $result;
		}
	}

	//update staff password actions
	if ($_POST['action'] ==="update_staff_pwd_now") {
		$result = $Staff->reset_staff_password($_POST);
	if ($result) {
			echo $result;
		}
	}
//update admin password now
	if ($_POST['action'] ==="update_admin_pwd_now") {
		$result = $Admin->reset_admin_password($_POST);
	if ($result) {
			echo $result;
		}
	}
	if ($_POST['action'] ==="login_cookie_lock") {
		$result_cookie = $Admin->login_from_cookie($_POST);
		if ($result_cookie) {
			echo $result_cookie;
		}
	}
//login_cookie_lock_staff
	if ($_POST['action'] ==="login_cookie_lock_staff") {
		$result_cookie = $Staff->login_from_cookie_staff($_POST);
		if ($result_cookie) {
			echo $result_cookie;
		}
	}
  //submit_new_payroll

  if ($_POST['action'] ==="submit_new_payroll") {
		$result = $Administration->create_staff_payroll($_POST);
		if ($result) {
			echo $result;
		}
	}

  //show_pay_salary_modal
  if ($_POST['action'] ==="show_pay_salary_modal") {
    $pId = $Configuration->Clean($_POST['payrollId']);
    $staffId = $Configuration->Clean($_POST['staffId']);
		$result = $Administration->get_payrollById($pId,$staffId);
		if ($result) {
			echo $result;
		}
	}

	//set_new_session

	if ($_POST['action'] ==="set_new_session") {
		$result = $Administration->set_new_academic_session($_POST);
		if ($result) {
			echo $result;
		}
	}

	//upload_student_attendance_now
	if ($_POST['action'] ==="upload_student_attendance_now") {
		$result = $Administration->upload_student_attendance($_POST);
		if ($result) {
			echo $result;
		}
	}

	//create_component_now
	if ($_POST['action'] ==="create_component_now") {
		$result = $Administration->create_fee_component($_POST);
		if ($result) {
			echo $result;
		}
	}
	//submit_allocation_now
	if ($_POST['action'] ==="submit_allocation_now") {
		$result = $Administration->set_allocation_fee($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="submit_student_pay") {
		// submit_student_payment
		$result = $Administration->submit_new_student_payment_cash($_POST);
		if ($result) {
		echo $result;
		}
	}
//upload_lesson_file

	if ($_POST['action'] ==="upload_lesson_file") {
		$result = $Administration->upload_virtual_lecture($_POST,$_FILES);
		if ($result) {
		echo $result;
		}
	}

	//EXPENSE ACTION

	//submit_expense_now
	if ($_POST['action'] ==="submit_expense_now") {
		$result = $Administration->create_school_expense($_POST);
		if ($result) {
		echo $result;
		}
	}

	//submit_staff_duty_role_now
	if ($_POST['action'] ==="submit_staff_duty_role_now") {
		$result = $Administration->assign_staff_weekly_duty($_POST);
		if ($result) {
		echo $result;
		}
	}

	//STUDENTS ACTIONS
	if ($_POST['action'] ==="upload_student_classNote") {
		// code...
		// echo "Your Classnote Uploaded Successfully...";
		$result = $Student->submit_written_classnote($_POST);
		if ($result) {
			// code...
			echo $result;
		}
	}

		if ($_POST['action'] ==="register_class_subject") {
		$result = $Administration->register_exam_subject($_POST);
		if ($result) {
			echo $result;
		}
	}

	//unregistered_exam_subject
	if ($_POST['action'] ==="unregistered_exam_subject_now") {
		// code...
		$Id = $Configuration->Clean($_POST['theId']);
		$subject = $Configuration->Clean($_POST['subId']);
		$result = $Administration->unregistered_exam_subject($Id,$subject);
		if ($result) {
			// code...
			echo $result;
		}
	}

	//register_exam_subject

	//submit_staff_loan_now
	if ($_POST['action'] ==="submit_staff_loan_now") {
		$result = $Administration->create_staff_loan($_POST);
		if ($result) {
		echo $result;
		}
	}

	if ($_POST['action'] ==="resend") {
		// code...
		// $result = $Alert->alert_toastr("success","Confirmation code sent, Check your mail Inbox","MAIL SENT");
		$result = $Administration->send_resend_confirmation_code($_POST);
		if ($result) {
		echo $result;
		}
	}

	//update staff bank info action
	if ($_POST['action'] ==="update_staff_bank_info_now") {
		$result = $Staff->update_staff_bank_info($_POST);
		if ($result) {
		echo $result;
		}
	}

	//create new staff
	if ($_POST['action'] ==="submit_new_staff") {
		$result = $Staff->create_new_staff($_POST);
		if ($result) {
		echo $result;
		}
	}

	if ($_POST['action'] ==="submit_new_student_details") {
		$result = $Student->register_student_manually($_POST);
		if ($result) {
		echo $result;
		}
	}

	if ($_POST['action'] ==="disable_all") {
		$result = $Administration->enable_disable_all_modules("2",$_POST['module_name']);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="enable_all") {
		$result = $Administration->enable_disable_all_modules("1",$_POST['module_name']);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="enable_module") {
		$result = $Administration->enable_disable_modules_by_id("1",$_POST['module_id']);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="disable_module") {
		$result = $Administration->enable_disable_modules_by_id("2",$_POST['module_id']);
		if ($result) {
			echo $result;
		}
	}
	//set_office
	if ($_POST['action'] ==="set_office") {
		$result = $Administration->set_new_office($_POST);
		if ($result) {
			echo $result;
		}
	}
	//submit_affective_domain
	if ($_POST['action'] ==="submit_affective_domain") {
		$result = $Administration->upload_affective_domain($_POST);
		if ($result) {
			echo $result;
		}
	}

  if ($_POST['action'] ==="submit_psychomotor_domain") {
    $result = $Administration->upload_psychomotor_domain($_POST);
    if ($result) {
      echo $result;
    }
  }

	if ($_POST['action'] ==="add_student_office") {
		$result = $Administration->add_new_student_office_title($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="assign_school_prefects") {
		$result = $Student->assign_new_school_prefect($_POST);
		if ($result) {
			echo $result;
		}
	}

	//upload_classteacher_comment
	if ($_POST['action'] ==="upload_classteacher_comment") {
		$result = $Result->upload_result_comments($_POST);
		if ($result) {
			echo $result;
		}
	}
	//check_single_student_result
	if ($_POST['action'] ==="check_single_student_result") {
		$result = $Result->check_view_student_result($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] ==="upload_blog_news") {
		$result = $Blog->upload_school_news($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

	//upload_assignment_file
	if ($_POST['action'] ==="upload_assignment_file") {
		$result = $Student->upload_student_assignments($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

	//submit_myassignment_answer_now
	if ($_POST['action'] ==="submit_myassignment_answer_now") {
		$result = $Student->submit_myassignment_answer($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}
	//upload_upcomingEvent_
	if ($_POST['action'] ==="upload_upcomingEvent_") {
		$result = $Blog->upload_upcomingEvents($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

  //submit_bulk_subject_reg
  if ($_POST['action'] ==="submit_bulk_subject_reg") {
		$result = $Administration->register_bulk_subjects($_POST);
		if ($result) {
			echo $result;
		}
	}

	//declareNew_admission_open
	if ($_POST['action'] ==="declareNew_admission_open") {
		$result = $Administration->declareAdmissionPortalOpen($_POST);
		if ($result) {
			echo $result;
		}
	}

	//upload_newGallery
	if ($_POST['action'] ==="upload_newGallery") {
		$result = $Blog->createNewGallery($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

	//upload_newSliders
	if ($_POST['action'] ==="upload_newSliders") {
		$result = $Blog->createNewSliders($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

	//upload_examQuestion_now
	if ($_POST['action'] ==="upload_examQuestion_now") {
		$result = $Administration->submitExamQuestions($_POST,$_FILES);
		if ($result) {
			echo $result;
		}
	}

	//add_new_holiday
	if ($_POST['action'] ==="add_new_holiday") {
		$result = $Administration->declareSchoolHoliday($_POST);
		if ($result) {
			echo $result;
		}
	}

	//upload_headofschool_comments
	if ($_POST['action'] ==="upload_headofschool_comments") {
		$result = $Result->uploadHeadOfSchoolResultComment($_POST);
		if ($result) {
			echo $result;
		}
	}

	//genOAuthCode
	if ($_POST['action'] ==="genOAuthCode") {
		$result = $Admin->generateOAuthCodeForSchools($_POST);
		if ($result) {
			echo $result;
		}
	}

	//upload_what_people_say
	if ($_POST['action'] ==="upload_what_people_say") {
		$result = $Blog->createWhatPeopleSays($_POST,$_FILES);
		if ($result) {
		echo $result;
		}
	}

	//submit_published_action
	if ($_POST['action'] ==="submit_published_action") {
		$result = $Result->publishSchoolResultsByClass($_POST);
		if ($result) {
			echo $result;
		}
	}

	if ($_POST['action'] === "_check_Student_Result_") {
		$result = $Result->checkMyResultByMySelf($_POST);
		if ($result) {
			echo $result;
		}
	}

}
}
?>
<?php
  /*header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache");
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
  header("Cache-Control: max-age=2592000");*/
?>
