<?php 
require_once "helpers/helper.php";
if(isset($_GET['student-id']) && isset($_GET['term']) && isset($_GET['student-class']) && isset($_GET['cses']) 
&& $_GET['student-id'] != '' && $_GET['term'] != '' && $_GET['student-class'] != '' && $_GET['cses'] != ''){
  $studentId = $Configuration->Clean($Configuration->unsaltifyString($_GET['student-id']));
  $Grade = $Configuration->Clean($Configuration->unsaltifyString($_GET['student-class']));
  $term = $Configuration->Clean($_GET['term']);
  $session = $Configuration->Clean($_GET['cses']);
  $student_data = $Student->get_student_data_byId($studentId);
  $Passport = $Student->displayStudentPassport($student_data->stdPassport,$student_data->stdGender);
  }else{
    header("Location: ./upload-single-result");
    exit();
  }
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Upload Student Result</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="#"></a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Upload <span class="text-muted"><?php echo $term ." ". $session." Result for ". strtoupper($student_data->full_name);?></span> </h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
       <div class="card-body">
<section>
   <!-- BROADSHEET GOES HERE -->
       <!-- show the broadsheet -->
          <!-- Starts -->
        <div class="card">
            <div class="card-body">
        <hr class="text-bold-700">
        <div class="justify-content-center text-center">
          <img src="<?php echo $Passport; ?>" style="width: 150px;border: 2px solid #625D5D; padding: 2px;border-radius:15px">
          <div><h2><strong><?php echo strtoupper($student_data->full_name) ?></strong> </h2></div>
          <h5><span class="text-danger"><?php echo strtoupper($student_data->stdRegNo) ?></span></h5>
        </div>
        <h4 class="text-info text-center"> Class: <?php echo strtoupper($student_data->studentClass) ?></h4>
                  <h5 class="text-center text-warning"><?php echo $term; ?> Report Sheet</h5>
        <h3 class="text-center text-info"><strong>Update <?php echo $session; ?> Academic performance  Score</strong></h3>
                        <!-- ############################# -->
            <br />
            <div class="clearfix"></div>
             <form id="EditSingleResultForm" autocomplete="off">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead class="text-center">
                        <tr>
                            <th width="10%">S/N</th>
                            <th width="40%">SUBJECT</th>
                            <th width="25%">Continuous Assessment(40)</th>
                            <th width="25%">Examination(60)</th>
                        </tr>
                        </thead>
                        <tbody>
                       <?php 
                       $examScore = $Student->studentResultIsUploaded($student_data->stdRegNo,$Grade,$term,$session);
                       if($examScore){
                        $cnt =0;
                        foreach ($examScore as $item) {
                         $cnt++;
                         ?>
                    <tr>
                    <td width="10%"><span><?php echo $cnt; ?></span></td>
                    <td width="40%"> <input type="text" max="40" name="subject[]"  class="form-control form-control-lg" value="<?php echo $item->subjectName; ?>" readonly> <input type="hidden" name="report_id[]" value="<?php echo $item->reportId;?>"></td>
                    <td width="25%"><input type="number" max="40" name="ca[]" class="form-control form-control-lg" placeholder="C.A" value="<?php echo $item->ca;?>" required></td>
                  <td width="25%"><input type="number" max="60" name="exam[]" class="form-control form-control-lg" placeholder="60" value="<?php echo $item->exam;?>" required></td>
                  <input type="hidden" name="total_count" value="<?php echo $cnt; ?>">
                </tr>
                  <?php
                        }
                       }
                       ?>
                </tbody>
                </table>
            </div>
            <div class="row col-md-6 mb-2">
                <label for="auth_code">Pass Code</label>
            <input type="password" class="form-control form-control-lg rounded" name="auth_code" placeholder="Authentication Code" style="border-radius: 10px !important;">
        </div> 
         <hr class="text-bold-700">
       <div class="mt-2 float-right">
        <input type="hidden" name="term" value="<?php echo $term;?>">
        <input type="hidden" name="admNo" value="<?php echo $student_data->stdRegNo;?>">
        <input type="hidden" name="cses" value="<?php echo $cses;?>">
        <input type="hidden" name="student_class" value="<?php echo $student_data->studentClass;?>">
        <input type="hidden" name="action" value="submit_edited_single_student_result_sheet">
          
          <button class="btn btn-dark submit-btn btn-lg mr-2 __loadingBtn__" type="submit"><span class="fa fa-cloud-upload"></span> SAVE CHANGES </button>
          <button onclick="return window.location.assign('add-result');" class="btn btn-danger submit-btn btn-md mr-2" type="button"><span class="fa fa-arrow-left"></span> Back </button>
       </div>
           </div>
           </form>
    </div>
  </div>
  <!-- Ends -->
          <!-- show broadsheet ends -->
      <!-- BROADSHEET ENDS -->
</section>
        </div>
      </div>
    <!-- content goes end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>

    <script src="smappjs/edit-single.js"></script>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>