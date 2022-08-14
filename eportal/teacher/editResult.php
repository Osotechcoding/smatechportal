<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> ::  Update Student Result</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Update Result
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-1x"></span> UPDATE STUDENT RESULT</h3>
  </div>
    </div>
    
     <div class="card">
      <!-- filter student -->
       <div class="users-list-filter px-1">
        <form action="" method="post">
            <div class="row border rounded py-2 mb-2">
                  <div class="col-md-4">
                    <label for="admission_no"> Admission No</label>
                    <fieldset class="form-group">
                       <input type="text" autocomplete="off" class="form-control" name="admission_no" placeholder="**********">
                    </fieldset>
                </div>
                 <div class="col-md-4">
                    <label for="ClassGrade">Student Class</label>
                    <fieldset class="form-group">
                        <select class="form-control" name="ClassGrade" id="ClassGrade">
                           <option value="<?php echo $staff_assigned_class; ?>" selected><?php echo $staff_assigned_class; ?></option>
                        </select>
                    </fieldset>
                </div>
                 <div class="col-md-4">
                    <label for="subject">Subject</label>
                    <fieldset class="form-group">
                     <select class="form-control select2" name="subject" id="subject">
                            <option value="">Choose...</option>
                           <?php echo $Administration->get_all_subjects_InDropDown_list(); ?>
                        </select>
                    </fieldset>
                </div>
                 <div class="col-md-4">
                    <label for="term">Result Term</label>
                    <fieldset class="form-group">
                    <select class="form-control" name="term" id="term">
                            <option value="">Choose...</option>
                           <option value="1st Term">1st Term</option>
                     <option value="2nd Term">2nd Term</option>
                     <option value="3rd Term">3rd Term</option>
                        </select>
                    </fieldset>
                </div>
                 <div class="col-md-4">
                    <label for="session">Result Session</label>
                    <fieldset class="form-group">
                    <select class="form-control" name="session" id="session">
                            <option value="">Choose...</option>
                           <?php echo $Administration->get_all_session_lists(); ?>
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0" name="submit_search_now">Show Score Sheet</button>
                </div>
            </div>
        </form>
    </div>
      <!-- filter student ends -->
      <div class="card-body">
        <?php 
        if (isset($_POST['submit_search_now'])) {
          // code...
           $admission_no = $Configuration->Clean($_POST['admission_no']);
          $studentClass = $Configuration->Clean($_POST['ClassGrade']);
          $subject = $Configuration->Clean($_POST['subject']);
          $term = $Configuration->Clean($_POST['term']);
          $session = $Configuration->Clean($_POST['session']);

          if ($Configuration->isEmptyStr($studentClass) || $Configuration->isEmptyStr($admission_no) || $Configuration->isEmptyStr($subject) || $Configuration->isEmptyStr($term) || $Configuration->isEmptyStr($session)) {
            echo $Alert->alert_msg("Notice: All fields are required to proceed","danger");
          }else{
            $search_result_data =  $Result->filter_students_result_by_admission_no_subject($studentClass,$admission_no,$subject,$term,$session);
            if ($search_result_data) { ?>
 <?php   
             
            $student_data = $Student->get_student_data_ByRegNo($search_result_data->stdRegCode);?>
               <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
                 <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
        <h5 class="text-center text-info"><strong>YOU ARE ABOUT TO UPDATE <b  class="text-center text-warning"><?php echo strtoupper($student_data->full_name);?></b> EXAM SCORE SHEET ON <?php echo strtoupper($subject) ?> FOR <?php echo strtoupper($session) ?> <?php echo strtoupper($term) ?>  </strong></h5>
               <form id="update_student_result_form">
  <div class="table-responsive">
     <table class="table">
        <thead class="text-center">
          <tr>
            <th width="20%">PASSPORT</th>
          <th width="20%">FULLNAME</th>
          <th width="20%">SUBJECT</th>
          <th width="20%"> CONTINOUS ASSESSMENT (40)</th>
          <th width="20%">EXAMINATION (60)</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <tr>
              <td><?php if ($student_data->stdPassport==NULL || $student_data->stdPassport==""): ?>
    <?php if ($student_data->stdGender == "Male"): ?>
      <img src="../schoolImages/students/male.png" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
      <?php else: ?>
        <img src="../schoolImages/students/female.png" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
    <?php endif ?>
      <?php else: ?>
        <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="100" alt="photo" style="border-radius: 10px;border: 3px solid darkblue;">
    <?php endif ?> </td>
          <td><?php echo strtoupper($student_data->full_name);?> </td>
          <td> <?php echo strtoupper($search_result_data->subjectName);?></td>
          <td><input type="number" autocomplete="off" min="1" max="40" value="<?php echo intval($search_result_data->ca);?>" style="width: 100%;" class="form-control form-control-lg" name="cass1"></td>
          <td><input type="number" autocomplete="off" style="width: 100%;" min="1" max="60" value="<?php echo intval($search_result_data->exam);?>" class="form-control form-control-lg" name="exam1">
          <input type="hidden" name="std_admno" value="<?php echo strtoupper($student_data->stdRegNo);?>">
          <input type="hidden" name="result_term" value="<?php echo strtoupper($search_result_data->term);?>">
          <input type="hidden" name="result_session" value="<?php echo strtoupper($search_result_data->aca_session);?>">
          <input type="hidden" name="result_class" value="<?php echo strtoupper($search_result_data->studentGrade);?>">
           <input type="hidden" name="resultId" value="<?php echo strtoupper($search_result_data->reportId);?>"> </td>
        </tr>
       
      </tbody>
      </table>
      <div class="col-md-6">
        <div class="form-group">
          <label for="Auth">Authentication</label>
          <!-- gssota123 -->
         <input type="password" autocomplete="off" class="form-control" name="Auth" value="diamond123" readonly>
          <input type="hidden" name="action" value="update_student_result_">
        </div>
        
      </div>
      <button type="submit" class="btn btn-dark btn-lg float-right mb-3 __loadingBtn__">Save Changes</button>
    </div>
     </form>
           <?php }else{
 echo $Alert->alert_msg("Notice: No Result found please try again...","danger");
            }
          }
        }
       
         ?>
      </div>
    </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
 
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <script type="text/javascript">
     $(document).ready(function(){
     const UPDATE_RESULT_FORM = $("#update_student_result_form");
     UPDATE_RESULT_FORM.on("submit", function(event){
      event.preventDefault();
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);

      $.post("../actions/update_actions",UPDATE_RESULT_FORM.serialize(),function(data){
      setTimeout(()=>{
         $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
         $("#server-response").html(data);
      },500);
     })
     })
     })
   </script>
  </body>
  <!-- END: Body-->
</html>