<?php 
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: View Student Attendance History</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['STAFF_ROLE'] ?></a>
                  </li>
                  <li class="breadcrumb-item active">Students Attendance
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Students Attendance Records </h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
          <div class="card-header">
            <!-- <h3>Upload Cognitive Domain</h3> -->
             <?php include_once 'Links/results_btn.php'; ?>
          </div>
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
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="student_class"> Class</label>
                    <select name="student_class" id="student_class" class="form-control select2" style="width: 100%;">
                      <option value="">Choose...</option>
                     <?php echo $Administration->get_classroom_InDropDown_list();?>
                    </select>
                  </div>
                </div>
                <!-- <div class="col-md-4">
                  <div class="form-group">
                    <label for="rollType"> Class</label>
                    <select name="rollType" id="rollType" class="form-control custom-select" style="width: 100%;">rollType
                      <option value="">Choose...</option>
                     <option value="Present">Present</option>
                     <option value="Absent">Absent</option>
                    </select>
                  </div>
                </div>     -->            
                 <div class="col-md-6">
                  <div class="form-group">
                    <label for="att_date">Attendance Date</label>
                  <input type="date" name="att_date" class="form-control">
                  </div>
                </div>
               
              </div>
               <button type="submit" name="submit_search" class="btn btn-dark btn-md badge-pill float-right">View Attendant</button>
               <div class="clearfix"></div>
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

       <!--starts  -->
             <!-- ############################# --> 

<?php if (isset($_POST['submit_search'])): ?>
  <?php if (empty($_POST['student_class']) || empty($_POST['att_date'])): ?>
  <?php echo '<div class="text-center col-md-12">'.$Alert->alert_msg("Select Attendance class, and Date to continue").'</div>';?>
    <?php else: ?>
      <?php 
      $student_class = $_POST['student_class'];
      $date = date("Y-m-d",strtotime($_POST['att_date']));
      $attendance_details = $Administration->show_attendance_by_date($student_class,$date);
      if ($attendance_details) { 
        $cnt =0;?>
        <div class="card">
          <div class="card-body">
            <h2 class="text-info text-center"><?php echo strtoupper(__SCHOOL_NAME__) ?> </h2>
                 <h5 class="text-center text-warning"><?php echo ucwords(__SCHOOL_LOCATION_ADDRESS__) ?> </h5>
        <h4 class="text-center text-danger"><strong>STUDENTS ATTENDANCE SHEET</strong></h4>
              <h2 class="card-title text-danger text-center">Roll Call Details For (<b class="text-info"><?php echo strtoupper($student_class) ?></b>) On <?php echo date("l jS F, Y",strtotime($_POST['att_date'])) ?></h2>

<div class="table-responsive">
  <table class="table-bordered table table-stripped mb-5 text-center">
      <thead class="text-center">
          <tr>
            <th width="10%">S/N</th>
              <th width="40%">STUDENT NAME</th>
              <th width="25%">REG NO</th>
              <th width="25%">ROLL CALL</th>
          </tr>
      </thead>
      <tbody class="text-center">
         <?php foreach ($attendance_details as $value): ?>
          <?php $cnt++;
           $student_data = $Student->get_student_data_ByRegNo($value->stdReg);?>
          <tr>
            <td><?php echo $cnt;?> </td>
      <td><input type="hidden" name="total_number" value="1" />
          <input type="text" name="student_name[]" readonly value="<?php echo strtoupper($student_data->full_name) ?>" class="form-control"></td>
      <td><input type="text" name="reg_number[]" readonly value="<?php echo strtoupper($value->stdReg) ?>" class="form-control"></td>
      <td width="11%"><?php if ($value->roll_call ==="Present"): ?>
      <span class="badge badge-success badge-md badge-pill">Present</span>
        <?php else: ?>
           <span class="badge badge-danger badge-md badge-pill">Absent</span>
      <?php endif ?></td>
        </tr>
        <?php endforeach ?>
      
             </tbody>
            </table>
          </div>
        </div>
        </div>
        <?php
      }else{
  echo '<div class="text-center col-md-12">'.$Alert->alert_msg("No result found Please try again").'</div>';  
      }

       ?>
  <?php endif ?>
<?php endif ?>

 
      <!-- ends -->
    <!-- content goes end -->
      
    </div>
    <!-- END: Content-->
    </div>
  </div>
    <!-- demo chat-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>