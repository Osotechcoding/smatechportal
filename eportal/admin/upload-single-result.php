<?php 
require_once "helpers/helper.php";

if(isset($_GET['student']) && isset($_GET['grade']) && $_GET['student'] != '' && $_GET['grade'] != ''){
$studentId = $Configuration->Clean($Configuration->unsaltifyString($_GET['student']));
$Grade = $Configuration->Clean($Configuration->unsaltifyString($_GET['grade']));
$student_data = $Student->get_student_data_byId($studentId);
$Passport = $Student->displayStudentPassport($student_data->stdPassport,$student_data->stdGender);

}else{
  header("Location: ./add-result");
  exit();
}
 ?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: Upload Result</title>
   <!-- include template/HeaderLink.php -->
    <?php include ("../template/dataTableHeaderLink.php"); ?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                 
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> <?php echo strtoupper($student_data->full_name) ?> RESULT PAGE</h3>
  </div>
    </div>
    <!-- content goes here -->
        <div class="card">
          <div class="card-body">
<section>
   <!-- BROADSHEET GOES HERE -->
       <!-- Starts -->
       <div class="card">
            <div class="card-body">
        <!-- Validation Tooltips -->
       
       <!-- ############################# -->
            <div class="clearfix"></div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center">
                        <tr>
                           <th> PASSPORT</th>
                            <th> STUDENT</th>
                            <th> Class</th>
                            <th> 1st Term</th>
                            <th> 2nd Term </th>
                            <th>3rd Term</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                      <td><img src="<?php echo $Passport;?>" style="width: 100px;border: 2px solid #625D5D; padding: 2px;border-radius:15px"></td>
                    <td><span><?php echo strtoupper($student_data->full_name) ?></span></td>
                  <td><?php echo strtoupper($student_data->studentClass) ?></td>
                  <td> 
                  <?php 
                  if($Student->studentResultIsUploaded($student_data->stdRegNo,$student_data->studentClass,'1st Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=1st Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
                  <a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=1st Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-primary badge-rounded badge-lg">Upload Score</span></a>

                <?php
                  } 
                  ?>
                 </td>
                  <td> 
                  <?php 
                  if($Student->studentResultIsUploaded($student_data->stdRegNo,$student_data->studentClass,'2nd Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=2nd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
                  <a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=2nd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-dark badge-rounded badge-lg">Upload Score</span></a>
                  <?php
                  } 
                  ?>
                </td>
                  <td> 
                  <?php 
                  if($Student->studentResultIsUploaded($student_data->stdRegNo,$student_data->studentClass,'3rd Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=3rd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
<a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($studentId);?>&term=3rd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student_data->studentClass));?>"><span class="badge badge-success badge-rounded badge-lg">Upload Score</span></a>
                  <?php

                  } 
                  ?>
                </td>
                </tr>
                </tbody>
                </table>
            </div>
           </div>
    </div>
  </div>
  <!-- Ends -->
      
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
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>