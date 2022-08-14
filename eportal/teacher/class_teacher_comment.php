<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: Class Teacher's Comments </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__;?> Portal</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Result Comment Module
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comment fa-1x"></span> Result Comment Module</h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
        <div class="card-body">
             <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
      <!--   <div class="card-header">
         <button type="button" class="btn btn-danger btn-md badge-pill" data-toggle="modal" data-target="#csv_Modal"><span class="fa fa-file fa-1x"></span> UPLOAD BY CSV</button>
        </div> -->
        <div class="card-body">
          <form class="form form-vertical" action="" method="POST">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_class"> Class</label>
                    <select name="comment_class" id="comment_class" class="form-control">
                      <option value="<?php echo $staff_assigned_class; ?>" selected><?php echo $staff_assigned_class; ?></option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_term">Result Term</label>
                   <select name="comment_term" class="form-control">
                    <option value="" selected>Choose...</option>
                    <option value="1st Term">1st Term</option>
                    <option value="2nd Term">2nd Term</option>
                    <option value="3rd Term">3rd Term</option>
                   </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_sess">Academic Session</label>
                    <input type="text" id="comment_sess" class="form-control" name="comment_sess" value="<?php echo $activeSess->session_desc_name;?>" readonly>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                <button type="submit" name="show_comment_sheet_btn" class="btn btn-primary mr-1">Show Comment Sheet</button>
              
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- Basic Vertical form layout section end -->
        </div>
      </div>

<?php if (isset($_POST['show_comment_sheet_btn'])): ?>
  <?php 
  if (!empty($_POST['comment_class']) && !empty($_POST['comment_term']) && !empty($_POST['comment_sess'])) {
    $comment_class = $Configuration->Clean($_POST['comment_class']);
    $comment_term = $Configuration->Clean($_POST['comment_term']);
    $comment_sess = $Configuration->Clean($_POST['comment_sess']);

    $get_all_uploaded_results_students = $Student->get_students_byClassDesc($comment_class);
    ?>
    <?php 

if ($get_all_uploaded_results_students) {
  $total_count =0;
 ?>
 <!--starts  -->
             <!-- ############################# -->
                  <div class="card show-on-print">
                  <div class="card-body">
                 <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
                 <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
        <h4 class="text-center text-danger"><strong>STUDENTS RESULT COMMENT SHEET</strong></h4>
                        <!-- ############################# -->
            <br />
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
            <span class="btn btn-info btn-round text-center"><?php echo strtoupper($comment_class) ?> </span>
                <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($comment_term) ?> </span>
                <span class="btn btn-danger btn-round text-center"><?php echo ($comment_sess)?></span>
                
            </div>
         <br>
</div>
 <div class="card-body">
  <form id="result_comment_form">
<div class="table-responsive">
        <table class=" table-bordered table table-stripped table-hover">
                <thead class="text-center">
                    <tr>
                      <th width="5%">S/N</th>
                    <th width="25%">Student</th>
                    <th width="15%">Admission No</th>
                    <th width="40%">Teacher's Comment</th>
                </tr>
            </thead>
            <tbody class="text-center">
                                        
                    <?php foreach ($get_all_uploaded_results_students as $value): ?>
                      <?php $total_count++;
                      //get_student_result_gradeByRegNo
          $student_result_data = $Result->get_student_result_gradeByRegNo($value->stdRegNo,$value->studentClass,$comment_term,$comment_sess);?>
          <?php if ($student_result_data): ?>
            <?php 
            $exam_score = intval($student_result_data->exam);
            $average_score = intval($student_result_data->mark_average);
            $total_subject_offered = $Administration->get_number_of_subejct_offered_by_class($staff_assigned_class);
            $obtaineable_mark = $Administration->get_obtainable_score($value->stdRegNo,$value->studentClass,$comment_term,$comment_sess);
            $overall_score = round($student_result_data->overallMark*$total_subject_offered);
             ?>
             <tr>
                      <input type="hidden" name="term" value="<?php echo $comment_term;?>">
                    <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name;?>">
                     <input class="form-control" type="hidden" name="student_regNo[]" value="<?php echo $value->stdRegNo;?>">
                     <td><?php echo $total_count; ?></td>
                        <td><?php echo ucwords($value->full_name);?></td>
                        <td><?php echo ucwords($value->stdRegNo);?></td>
                  <td><input type="text" name="comment[]"class="form-control" placeholder="write comment here..."><input type="hidden" name="total_count" value="<?php echo $total_count; ?>"></td>
                </tr>
          <?php endif ?>
                          <?php endforeach ?>           
                            </tbody>
                                </table>
                              </div>
                              <input type="hidden" name="action" value="upload_classteacher_comment">
                              
                              <input type="hidden" name="result_comment_class" value="<?php echo $comment_class;?>">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label>Authentication Code</label>
                                <input type="password" class="form-control" placeholder="**********" name="auth_pass">
                              </div>
                              </div>
                        <button class="btn btn-dark submit-btn btn-md mr-2 float-right mt-1 __loadingBtn__" type="submit" name="upload-btn"> UPLOAD COMMENT</button>
                        <div class="clearfix"></div>
                      </form>
                                        </div>
                                        <!-- ends -->

 <?php
}else{
echo '<div class="card">
  <div class="card-body"><h3 class="text-center col-md-12">'. $Alert->alert_msg("No result found for your search, maybe Result is not uploaded yet","danger").'</h3></div></div>';
}

 ?>
    <?php
  }else 
  {
  echo '<div class="card show-on-print">
  <div class="card-body"><h3 class="text-center col-md-12">'. $Alert->alert_msg("Please Select academic term to comment on result","danger").'</h3></div></div>';
  }
   ?>
<?php endif ?>
    <!-- content goes end -->
      </div>
    </div>
  </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="csv_Modal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-file fa-2x"></i> Upload Cognitive In CSV</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_session">Session</label>
                    <select name="csv_session" id="csv_session" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="2021-2022">2021-2022</option>
                    </select>
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_term"> Term</label>
                    <select name="csv_term" id="csv_term" class="select2 form-control form-control-lg">
                      <option value="">--Select--</option>
                      <option value="1">1st Term</option>
                    </select>
                    </div>
                  </div>

                      <div class="col-md-6">
                     <div class="form-group">
                  <label for="csv_class"> Class</label>
                    <select name="csv_class" id="csv_class" class="select2 form-control">
                      <option value="">--Select--</option>
                      <option value="jss1">JSS1</option>
                    </select>
                    </div>
                  </div>
                  <input type="hidden" name="action" value="upload_beh_csv">
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="route_name">Choose CSV File </label>
               <input type="file" name="csv_file" id="csv_file" accept=".csv" class="file-input form-control form-control-file">
                </div>
              </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml-1">
                    <span class="fa fa-cloud-upload"></span> Upload Now</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    <i class="bx bx-power-off"></i>
                    Cancel
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- upload comment script will be here ..coming soon -->
    <script>
      $(document).ready(function(){
        const TEACHER_COMMENT_FORM = $("#result_comment_form");
    TEACHER_COMMENT_FORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
          $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send request 
      $.post("../actions/actions",TEACHER_COMMENT_FORM.serialize(),function(res_data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Upload Comment').attr("disabled",false);
          $("#server-response").html(res_data);
        },500);
      })
    })
      })
    </script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>