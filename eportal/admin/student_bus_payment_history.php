<?php 
require_once "helpers/helper.php";
 ?>
  <?php 
 if (isset($_GET['student_id']) && $_GET['student_id'] !== "") {
   $studentId = $Configuration->unsaltifyString($_GET['student_id']);
  $student_data = $Student->get_student_data_byId($studentId);
 }else{
  echo "<script> window.location.href='student_n_bus';</script>";
 }
  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: <?php echo strtoupper($student_data->full_name);?></title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Bus Payment Info
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bus fa-1x"></span><?php echo strtoupper($student_data->full_name);?> BUS PAYMENTS</h3>
  </div>
</div>
          </div>
<section id="basic-horizontal-layouts">
  <div class="row">
   
    <div class="col-md-6 col-12">
      <div class="card" style="border-radius: 12px;">
        <div class="text-center mt-1">
         <h3 class="text-center text-bold" style="font-weight:bolder;">Student Information</h3>
        </div>
        <div class="card-body">
         
         <div class="text-center">
           <center><?php if ($student_data->stdPassport==NULL || $student_data->stdPassport==""): ?>
    <?php if ($student_data->stdGender == "Male"): ?>
      <img src="../schoolImages/students/male.png" width="100" height="100" alt="photo" style="border-radius: 10px;border: 4px solid dimgrey;">
      <?php else: ?>
        <img src="../schoolImages/students/female.png" width="100" height="100" alt="photo" style="border-radius: 10px;border: 4px solid dimgrey;">
    <?php endif ?>
      <?php else: ?>
        <img  src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="100" height="100" alt="photo" style="border-radius: 10px;border: 4px solid dimgrey;">
    <?php endif ?> 
           </center>
           <br>
           <h5><strong><?php echo ucwords($student_data->full_name) ?></strong></h5>
           <h5>Class: <strong> <?php echo $student_data->studentClass;?> </strong></h5>
           <h5>Gender: <strong> <?php echo $student_data->stdGender;?></strong></h5>
           <h5>Student Type: <strong> <?php echo $student_data->stdApplyType;?></strong></h5>
           <h5> Address: <strong><i><?php echo $student_data->stdAddress;?></i></strong></h5>
         </div>
        </div>
      </div>
    </div>
     <div class="col-md-6 col-12">
      <div class="card">
        <div class="text-center mt-1">
         <h1 class="text-center text-bold" style="font-weight:bolder;">Transport Details</h1>
        </div>
        <div class="card-body">
        <h5 class="text-center">No History for <strong><?php echo ucwords($student_data->full_name) ?></strong></h5>
        <hr>
        <div class="card-footer text-center">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-dark btn-sm btn-round vsbp_btn" id="<?php echo $Configuration->saltifyString($student_data->stdId);?>">Make Payment <span class="fa fa-line-chart fa-1x"></span></button> &nbsp;&nbsp;&nbsp;&nbsp;||  &nbsp;&nbsp;&nbsp; <a href="student_n_bus"><button type="button" class="btn btn-outline-danger btn-sm btn-round">Go Back <i class="fa fa-power-off fa-2x"></i></button></a>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->
    
    </div>
    <!-- demo chat-->
    <?php //include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Declare Active Session</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="submitNewSessionForm">
                <div class="modal-body">
                   <div class="form-group">
                     <label for="session">Active Session</label>
                     <input type="text" class="form-control form-control-lg" name="session" placeholder="eg 2021/2022">
                   </div>
                <input type="hidden" name="action" value="set_newsession">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <span class="fa fa-power-off"></span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    submit</button>
                </div>
                 </form>
              </div>
            </div>
          </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script>
      $(document).ready(function(){
       
         //when view payment history btn is clicked
        $(document).on("click",".vsbp_btn", function(){
          let st_id = $(this).attr("id");
          href2 ="assign_Student_Bus?student_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href2+st_id;
         },500);
        });
        //ends
      })
    </script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>