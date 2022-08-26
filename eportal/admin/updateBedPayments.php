<?php 
require_once "helpers/helper.php";
 ?>

 <?php 
if (isset($_GET['bed_occupant']) && $_GET['bed_occupant'] !="" && isset($_GET['bedspace']) && $_GET['bedspace'] !=="" && isset($_GET['action']) && $_GET['action'] ==="topuppayment") {
 $studentId = $Configuration->unsaltifyString($Configuration->Clean($_GET['bed_occupant']));
 $bonkId = $Configuration->unsaltifyString($Configuration->Clean($_GET['bedspace']));
 $hostelId = $Configuration->unsaltifyString($Configuration->Clean($_GET['hoId']));
 $bedSpace = $Hostel->getBedSpaceById($bonkId);
 $hostel_details = $Hostel->getHostelById($hostelId);
 $roomDetails = $Hostel->getHostelRoomById($bedSpace->room_id);
 $student_data = $Student->get_student_data_byId($studentId);
}else{
  echo "<script>window.history.back();</script>";
  exit();
}
  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                  <li class="breadcrumb-item active">Bed Space Payment Update
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-1x"></span> Student Hostel Bed Space Payment Update </h3>
  </div>
    </div>
   <!--  -->
   <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row">
    <div class="col-md-5 col-12">
      <div class="card">
       
        <div class="card-body">
           <div class="text-center">
          <h4 class="text-uppercase text-center text-muted m-1">Basic Information</h4>
        </div>
              <div class="text-center mb-1">
                  <center>
                  <?php if ($student_data->stdPassport == NULL || $student_data->stdPassport ==""): ?>
                    <?php if ($student_data->stdGender == "Male"): ?>
                        <img src="../schoolImages/students/male.png"  width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
                      <?php else: ?>
             <img src="../schoolImages/students/female.png"  width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
                    <?php endif ?>
             
                  <?php else: ?>
                     <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>"  width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
                  <?php endif ?>
                 
                </center>
                </div>
              <div class="row">
                
                <div class="col-12">
                  <div class="form-group">
                    
                    <input type="text" class="form-control" value="<?php echo strtoupper($student_data->full_name)?>" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                  
                    <input type="text"  class="form-control" value="<?php echo ($student_data->stdEmail)?>" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                   
                    <input type="text" class="form-control" value="<?php echo ($student_data->stdPhone)?>" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                  
                    <input type="text" class="form-control" value="<?php echo strtoupper($student_data->stdRegNo)?>" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                  
                    <input type="text" class="form-control" value="<?php echo strtoupper($student_data->studentClass)?>" readonly>
                  </div>
                </div>
              
              </div>
       <button onclick="window.history.back();" type="button" class="btn btn-danger mt-1 btn-md"><span class="fa fa-arrow-left"></span> Back</button>
        </div>
      </div>
    </div>
    <div class="col-md-7 col-12">
      <div class="card">
      
        <div class="card-body">
          <div class="text-center"> <h4 class="text-uppercase text-center text-muted mt-1">Hostel & Bed Information</h4></div>
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-6">
                  <div class="form-group">
                    <label for="hostel">Hostel</label>
                    <input type="text" class="form-control" name="hostel"
                      placeholder="Hostel Name" value="<?php echo $hostel_details->hostel_desc;?>" readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Room</label>
                    <input type="text" class="form-control" name="room"
                     value="<?php echo $bedSpace->room;?>" readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Bonk No</label>
                  <input type="text" class="form-control" name="bonk"
                     value="<?php echo $bedSpace->bed_space;?>" readonly>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label>Amount</label>
                   <input type="number" class="form-control" name="amount"
                     value="<?php echo $bedSpace->amount;?>" readonly>
                  </div>
                </div>
                 <div class="col-6">
                  <div class="form-group">
                    <label>Amount Paid</label>
                   <input type="number" class="form-control form-control-lg" name="paid"
                     value="<?php echo $bedSpace->amount_paid;?>" readonly>
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label>Due Balance</label>
                   <input type="number" class="form-control form-control-lg" name="paid"
                     value="<?php echo ($bedSpace->amount - $bedSpace->amount_paid);?>" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label>Make Payment <span class="text-danger">without coma (,)</span></label>
                   <input type="number" class="form-control form-control-lg" name="touppaid"
                     placeholder="e.g 50">
                  </div>
                </div>
                 <div class="col-12">
                  <div class="form-group">
                    <label>Authentication Code</label>
                   <input type="password" class="form-control form-control-lg" name="auth_code"
                     placeholder="*************">
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark mr-1 btn-md __loadingBtn__">Update Payment</button>
                 
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
   <!--  -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>