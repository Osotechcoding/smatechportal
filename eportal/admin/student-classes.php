<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> | School Classes </title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                 <li class="breadcrumb-item active"><a href="javascript:void(0);" onclick="window.history.back();" class="text-danger text-bold-700">Go Back</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold mb-5"><span class="fa fa-laptop fa-1x"></span> List of available classes</h3>
  </div>
    </div>
   <div class="card">
     <div class="card-body">
        <div class="row">
          <?php 
          $getClassroom = $Administration->get_all_classrooms();
          if ($getClassroom) {
             foreach ($getClassroom as $grade) {?>
               <div class="col-md-2 col-lg-2 col-sm-3 m-1">
        <a href="view-students?grade-desc=<?php echo $grade->gradeDesc;?>"><button class="btn btn-outline-secondary btn-pill"> View <?php echo strtoupper($grade->gradeDesc);?></button></a>
      </div>
              <?php
             }
           } ?>
    </div>
     </div>
   </div>
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