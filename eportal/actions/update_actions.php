<?php 
@session_start();
include_once "../languages/config.php";
// require_once "../classes/Configuration.php";
require_once '../classes/Session.php';
date_default_timezone_set("Africa/Lagos");
//create an autoload function
spl_autoload_register(function($filename){
  include_once "../classes/".$filename.".php";
});

$ses_token = Session::set_xss_token();
$Configuration 	= new Configuration();
$Admin = new Admin();
$Pin_serial = new Pins();
$Staff = new Staff();
$Student = new Student();
$Visitor = new Visitors();
$Result = new Result();
$Administration = new Administration();

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method ==="POST") {
	// code...
	if (isset($_POST['action']) && $_POST['action']!="") {
		// code...
		if ($_POST['action'] ==="show_subject_update_modal") {
			// code...
			$subjectId =$Configuration->Clean($_POST['subjectId']);
			$result =$Administration->get_subject_ById($subjectId);
			if ($result) {
		echo ' <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <input type="hidden" name="subject_id" value="'.$result->subject_id.'">
                  <label for="subject_name">SUBJECT NAME</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="subject_name" value="'.$result->subject_desc.'">
                    </div>
               </div>
              
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="code"> SUBJECT CODE </label>
               <input type="text" autocomplete="off" id="code" class="form-control" name="code" value="'.$result->subject_code.'">
                </div>
              </div>
              
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="subject_status" id="status" class="form-control custom-select">
               <option value="'.$result->status.'" selected>'.ucfirst($result->status).'</option>
                 <option value="">Choose...</option>
                 <option value="inactive">Inactive</option>
                 <option value="active">Active</option>
               </select>
                </div>
              </div>
                 </div>';
			}
		}

		if ($_POST['action'] ==="update_subject_now") {
			$result = $Administration->update_subject($_POST);
			if ($result) {
				echo $result;
			}
		}

		//classroom actions
		if ($_POST['action'] ==="show_classroom_update_modal") {
			// code...
			$grade_id = $Configuration->Clean($_POST['grade_id']);
			$result = $Administration->get_classroom_ById($grade_id);
			if ($result) {
			echo '
			 <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                   <input type="hidden" name="classroom_id" value="'.$result->gradeId.'">
                  <label for="grade_name">CLASS DESC</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="classroom_name" value="'.$result->gradeDesc.'">
                    </div>
               </div>
                <div class="col-md-4">
                     <div class="form-group">
                  <label for="class_division"> DIVISION </label>
               <select name="cdivision" id="class_division" class="form-control form-control-lg">
               <option value="'.$result->grade_division.'">'.$result->grade_division.'</option>
                 <option value="">Choose...</option>
                 <option value="A">A</option>
                 <option value="B">B</option>
               </select>
                </div>
              </div>
               <div class="col-md-4">
                     <div class="form-group">
                  <label for="class_sub_division"> SUB-DIVISION </label>
               <select name="sdivision" id="class_sub_division" class="form-control form-control-lg">
                <option value="'.$result->grade_dept.'">'.strtoupper($result->grade_dept).'</option>
                 <option value="">Choose...</option>
                 <option value="science">SCIENCE</option>
                 <option value="art">ART</option>
                 <option value="commercial">COMMERCIAL</option>
                 <option value="none">None</option>
               </select>
                </div>
              </div>
                   <div class="col-md-4">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="status" id="status" class="form-control form-control-lg">
               <option value="'.$result->grade_status.'">'.$result->grade_status.'</option>
                <option value="">Choose...</option>
                 <option value="active">Active</option>
                 <option value="pending">Pending</option>
                 <option value="closed">Locked</option>
               </select>
                </div>
              </div>
                 </div>
			';
			}
		}

		if ($_POST['action'] ==="update_classroom_now") {
			$result = $Administration->update_classroom($_POST);
			if ($result) {
				echo $result;
			}
		}


        if ($_POST['action'] ==="simulate_session_now") {
            $result = $Administration->session_simulation_module($_POST);
            if ($result) {
              echo $result;
            }
        }

        //view_bank_details
        if ($_POST['action'] ==="view_bank_details") {
       $staffId = $Configuration->Clean($_POST['staff_id']);
        $result = $Staff->get_staff_bank_details($staffId);
        if ($result) {
            echo $result;
        }
    }

    //update_academic_session
    if ($_POST['action'] ==="update_academic_session_now") {
        $result = $Administration->update_academic_session($_POST);
        if ($result) {
            echo $result;
        }
    }

    if ($_POST['action'] ==="show_component_edit_modal") {
        $compoId = $Configuration->Clean($_POST['compoId']);
        $result = $Administration->get_fee_component_ById($compoId);
        if ($result) {
        echo '<div class="row">
               <div class="col-md-8">
                  <div class="form-group">
                  <input type="hidden" name="compoId" value="'.$result->compId.'">
                  <label for="component_desc"></label>
              <input type="text" id="component_desc" autocomplete="off" class="form-control" name="component_desc" value="'.$result->feeType.'">
                    </div>
               </div>
                   <div class="col-md-4">
                     <div class="form-group">
                  <label for="status"> STATUS </label>
               <select name="status" id="status" class="form-control">
               <option value="'.$result->fee_status.'" selected>'.$result->fee_status.'</option>
                 <option value="">Choose...</option>
                 <option value="Active">Active</option>
                 <option value="Pending">Pending</option>
               </select>
                </div>
              </div>
                 </div>';
        }
    }
    //update fee component
    if ($_POST['action'] ==="update_fee_compo_now") {
        // code...
        $result = $Administration->update_fee_component($_POST);
        if ($result) {
            echo $result;
        }
    }

    //show fee allocation modal
    if ($_POST['action'] ==="show_alloc_edit_modal") {
    $faId = $Configuration->Clean($_POST['allocate_id']);
    $result = $Administration->get_fee_allocated_ById($faId);
    if ($result) {
        echo '<div class="row">
               <div class="col-md-6">
                  <div class="form-group">
                  <input type="hidden" name="faId" value="'.$result->faId.'">
                  <label for="route_name">Component Type</label>
           <input type="text" name="fee_type" class="form-control form-control-lg" value="'.$result->feeType.'" readonly>
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="route_name">Current Allocated Amount (&#8358;)</label>
           <input type="text" name="amount" class="form-control form-control-lg" value="'.$result->amount.'" readonly>
                    </div>
               </div>
               <div class="col-md-6">
                     <div class="form-group">
                  <label for="status"> CLASS </label>
                <input type="text" name="class_alloc" class="form-control form-control-lg" value="'.$result->gradeDesc.'" readonly>
                </div>
              </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="cost_amount"> Update Fee Amount (&#8358;) </label>
               <input type="number" id="cost_amount" class="form-control form-control-lg" name="cost_amount" placeholder="Enter update amount">
                </div>
              </div>
                 </div>';
    }
    }

    //submit_edited_allocation_now
    if ($_POST['action'] ==="submit_edited_allocation_now") {
       $result = $Administration->update_allocation_fee($_POST);
        if ($result) {
            echo $result;
        }
    }
    //update the student payment
    if ($_POST['action'] ==="fetch_student_due_bal_data") {
        $id =$Configuration->Clean($_POST['paymentId']);
        $std_id =$Configuration->Clean($_POST['std_id']);
        $stdRegNo =$Configuration->Clean($_POST['stdRegNo']);
        $stdgrade =$Configuration->Clean($_POST['stdgrade']);
        $fee_type =$Configuration->Clean($_POST['fee_type']);
        $term =$Configuration->Clean($_POST['term']);
        $session =$Configuration->Clean($_POST['session']);
        $result = $Administration->get_student_due_records_by_payment_id($id,$std_id,$stdRegNo,$stdgrade,$fee_type,$term,$session);
        if ($result) {
            echo $result;
        }
    }

    //submit_student_update_pay
    /*if ($_POST['action']==="submit_student_update_pay") {
    $result = $Administration->submit_student_payment($_POST);
        if ($result) {
        echo $result;
        }
    }
   */
     //update_grading 
    if ($_POST['action'] ==="update_grading_now") {
    $result = $Result->update_school_result_grading($_POST);
        if ($result) {
        echo $result;
        }
    }

    //show_loan_update_form_modal
     if ($_POST['action'] ==="show_loan_update_form_modal") {
        $myId =$Configuration->Clean($_POST['myId']);
    $result = $Administration->get_loanById_json($myId);
        if ($result) {
        echo $result;
        }
    }

    //submit_student_update_payment
     if ($_POST['action'] ==="submit_student_update_pay") {
    $result = $Administration->submit_student_update_payment($_POST);
        if ($result) {
        echo $result;
        }
    }

    //
     if ($_POST['action'] ==="show_office_update_form") {
          $officeId =$Configuration->Clean($_POST['office_id']);
    $result = $Staff->get_staff_office_details_json($officeId);
        if ($result) {
         $student_data = $Staff->get_staff_ById($result->staff_id);
         echo '<div class="row">
                <div class="col-md-12">
                     <div class="form-group">
                     <input type="hidden" name="office_id" value="'.$result->id.'">
                     <input type="hidden" name="staff_id" value="'.$student_data->staffId.'">
                  <label for="staff_name">Staff Name</label>
                    <input type="text" name="current_staff_name" id="current_staff_name" class="form-control" value="'.$student_data->full_name.'" readonly>
                    </div>
                  </div>
                      <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office">Current Office</label>
                    <input type="text" name="old_office" id="old_office" class="form-control" value="'.$result->office.'" readonly>
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="c_office">Change Office To</label>
                    <select name="c_office" id="c_office" class="custom-select form-control form-control-lg">
                      <option value="'.$result->office.'" selected>'.$result->office.'</option>
                      '.$Administration->get_office_InDropDown_list().'
                    </select>
                    </div>
                  </div>
                  
                 </div>';
        }
    }

    if ($_POST['action'] ==="update_staff_office") {
        $result = $Staff->update_staff_office_post($_POST);
        if ($result) {
            echo $result;
        }
    }

    //update_school_administrator_details
    if ($_POST['action'] ==="update_school_administrator") {
        $result = $Administration->update_school_administrator_details($_POST);
        if ($result) {
            echo $result;
        }
    }
    //update_school_profile_
     if ($_POST['action'] ==="update_school_profile_") {
        $result = $Administration->update_school_profile_details($_POST);
        if ($result) {
            echo $result;
        }
    }
    //update_school_social_link_details
    if ($_POST['action'] ==="update_school_social_link_") {
        $result = $Administration->update_school_social_link_details($_POST);
        if ($result) {
            echo $result;
        }
    }

    //show_office_title_update_modal
    if ($_POST['action'] ==="show_office_title_update_modal") {
        $officeId = $Configuration->Clean($_POST['office_id']);
        $result = $Administration->get_student_office_titleById($officeId);
        if ($result) {
        echo '<div class="col-md-12">
                     <div class="form-group">
                      <input type="hidden" name="office_id" value="'.$result->id.'">
                  <label for="old_office_name">Office Title</label>
                    <input type="text" name="old_office_name" class="form-control" value="'.$result->title.'">
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office_status">Status</label>
                    <select name="old_office_status" class="form-control form-control-lg">
                    <option value="'.$result->status.'" selected>'.$result->status.'</option>
                      <option value="">Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    </div>
                  </div>';
        }
    }

    //update_student_office_title
    if ($_POST['action'] ==="update_student_office_title") {
        $result = $Administration->update_prefect_office_title($_POST);
        if ($result) {
        echo $result;
        }
    }
    
        //update_staff_office_title
if ($_POST['action'] ==="update_staff_office_title") {
        $result = $Administration->update_staff_office_title($_POST);
        if ($result) {
        echo $result;
        }
    }

    //show_update_student_office_modal
     if ($_POST['action'] ==="show_update_student_office_modal") {
         $prefect_id = $Configuration->Clean($_POST['prefect_id']);
        $result = $Student->get_prefect_ById($prefect_id);
        $student_data = $Student->get_student_data_byId($result->student_id);
        if ($result) {
        //echo $result;
        echo '<div class="col-md-12">
                     <div class="form-group">
                      <input type="hidden" name="prefect_id" value="'.$result->prefectId.'">
                  <label for="student_name">Student Name</label>
                    <input type="text" name="student_name" id="student_name" class="form-control" value="'.$student_data->full_name.'" readonly>
                    </div>
                  </div>
                      <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office">Current Office</label>
                    <input type="text" name="old_office" id="old_office" class="form-control" value="'.$result->officeName.'"readonly>
                    </div>
                  </div> 
                  <div class="col-md-12">
                     <div class="form-group">
                  <label for="tenure">Tenure Session</label>
                    <input type="text" name="tenure" id="tenure" class="form-control" value="'.$result->school_session.'"readonly>
                    </div>
                  </div>';
        }
    }

    if ($_POST['action'] ==="update_student_office") {
        $result = $Student->update_student_office_now($_POST);
        if ($result) {
        echo $result;
        }
    }

    //update_admin_details
    if ($_POST['action'] ==="update_admin_details") {
        $result = $Admin->update_admin_details_now($_POST);
        if ($result) {
        echo $result;
        }
    }
//show_staff_office_title_update_modal
     if ($_POST['action'] ==="show_staff_office_title_update_modal") {
        $officeId = $Configuration->Clean($_POST['office_id']);
        $result = $Administration->get_staff_office_titleById($officeId);
        if ($result) {
        echo '<div class="col-md-12">
                     <div class="form-group">
                      <input type="hidden" name="office_id" value="'.$result->id.'">
                  <label for="old_office_name">Office Title</label>
                    <input type="text" name="old_office_name" class="form-control" value="'.$result->office_desc.'">
                    </div>
                  </div>
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office_status">Status</label>
                    <select name="old_office_status" class="form-control form-control-lg">
                    <option value="'.$result->status.'" selected>'.$result->status.'</option>
                      <option value="">Choose...</option>
                      <option value="Active">Active</option>
                      <option value="Inactive">Inactive</option>
                    </select>
                    </div>
                  </div>';
        }
    }

    //show_staff_office_title_update_modal
    if ($_POST['action'] ==="show_update_student_office_modal") {
         $prefect_id = $Configuration->Clean($_POST['prefect_id']);
        $result = $Staff->get_staff_office_ById($prefect_id);
        $staff_data = $Staff->get_staff_ById($result->staff_id);
        if ($result) {
        //echo $result;
        echo '<div class="col-md-12">
                     <div class="form-group">
                      <input type="hidden" name="prefect_id" value="'.$result->id.'">
                  <label for="staff_name">Student Name</label>
                    <input type="text" name="staff_name" id="staff_name" class="form-control" value="'.$staff_data->full_name.'" readonly>
                    </div>
                  </div>
                      <div class="col-md-12">
                     <div class="form-group">
                  <label for="old_office">Current Office</label>
                    <input type="text" name="old_office" id="old_office" class="form-control" value="'.$result->office.'"readonly>
                    </div>
                  </div> 
                  <div class="col-md-12">
                     <div class="form-group">
                  <label for="tenure">Tenure Session</label>
                    <input type="text" name="tenure" id="tenure" class="form-control" value="'.$result->schlSes.'"readonly>
                    </div>
                  </div>';
        }
    }
    
     if ($_POST['action'] ==="update_student_data") {
        $result = $Student->update_student_details($_POST);
        if ($result) {
            echo $result;
        }
    }

    //update_staff_data
    if ($_POST['action'] ==="update_staff_data") {
        $result = $Staff->update_staff_ById($_POST);
        if ($result) {
            echo $result;
        }
    }

    //submit_student_passport
     if ($_POST['action'] ==="submit_student_passport") {
        $result = $Student->upload_student_passport($_POST,$_FILES);
        if ($result) {
            echo $result;
        }
    }
    //submit_staff_passport
    if ($_POST['action'] ==="submit_staff_passport") {
        $result = $Staff->upload_staff_passport($_POST,$_FILES);
        if ($result) {
            echo $result;
        }
    }

    //save_student_password_changed
     if ($_POST['action'] ==="save_student_password_changed") {
        $result = $Student->save_change_student_new_password($_POST);
        if ($result) {
            echo $result;
        }
    }

    //submit_marked_student_ass
     if ($_POST['action'] ==="submit_marked_student_ass") {
        $result = $Student->submit_marked_student_assignments($_POST);
        if ($result) {
            echo $result;
        }
    }

    //update_student_result_
     if ($_POST['action'] ==="update_student_result_") {
        $result = $Result->update_student_result_by_admin($_POST);
        if ($result) {
            echo $result;
        }
    }

    //promote_bulk_students
     if ($_POST['action'] ==="promote_bulk_students") {
        $result = $Student->student_bulk_promotions($_POST);
        if ($result) {
            echo $result;
        }
    }
    //uploadschLogo

     if ($_POST['action'] ==="uploadschLogo") {
        $result = $Administration->upload_school_logoImage($_POST, $_FILES);
        if ($result) {
            echo $result;
        }
    }

    //update_portal
     if ($_POST['action'] ==="update_portal") {
        $result = $Administration->updateAdmissionPortal($_POST);
        if ($result) {
            echo $result;
        }
    }

	}
}