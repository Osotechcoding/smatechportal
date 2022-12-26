<?php 
require_once "helpers/helper.php";
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">STUDENT IDENTITY CARD
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-credit-card fa-1x"></span>  STUDENT IDENTITY CARD MODULE</h3>
  </div>
    </div>

    <div class="card" style="border-radius: 10px;">
        <div class="card-header">
          <h4 class="card-title">GENERATE IDENTITY CARD</h4>
        </div>
        <div class="card-body">
        
          <form class="form" id="generateIdCardForm" autocomplete="off">
            <div class="form-body">
              <div class="row">
                <input type="hidden" name="action" value="generate_student_id_card_">
                 <div class="col-md-6 col-12">
                   <label for="admNo">Student Admission No</label>
                 <input type="text" class="form-control" name="admNo" placeholder="2022C26313****">
                </div>
                <div class="col-md-6 col-12">
                   <label for="auth_code"> Authentication Code</label>
                 <input type="password" class="form-control" name="auth_code" placeholder="xxxxxxxxxxx" autocomplete="off">
                </div>
  <!-- daterange end -->
                </div>
                <div class="col-12 d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__">Generate ID Card</button>
                </div>
              </div>
            
          </form>
        </div>
      </div>
      <!-- filter student ends -->
  
      </div>

        </div>
      </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>

    <script src="smappjs/generate-idcard.js"></script>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>