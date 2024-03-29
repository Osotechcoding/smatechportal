<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo ucfirst($_SESSION['STAFF_ROLE']);?> | Dashboard | <?php echo $SmappDetails->school_name ?></title>  
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
             <h5 class="content-header-title float-left pr-1 mb-0">Session: <?php echo $activeSess->session_desc_name;?> &raquo; Term: <?php echo $activeSess->term_desc;?> </h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"> <?php $Configuration->greet_user(); ?> <b class="text-muted"><?php echo $lang['welcome1'] ?></b>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
<div class="content-body"><!-- Dashboard Ecommerce Starts -->
<section id="dashboard-ecommerce">
  <div class="row">
    <div class="col-xl-12 col-md-12">
      <?php include_once ("template/dashboard_stats.php");?>
    </div>
  </div>
  <div class="row">
    <?php include_once ("template/recent_payment.php");?>
    <!-- Earning Swiper Starts -->
    <!-- Marketing Campaigns Starts -->
    <hr>
     <?php //include_once("template/staff_applicant.php");?>
  <div class="col-lg-12 col-xl-12 col-md-12">
    <div class="row">
    <?php include_once("template/latest_update_task.php");?>
      </div>
       </div>
  </div>
</section>
<!-- Dashboard Ecommerce ends -->
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
   <script src="../app-assets/js/scripts/charts/chart-apex.min.js"></script>

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>