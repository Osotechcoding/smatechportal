<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: <?php echo ucwords($_SESSION['STAFF_ROLE']);?> Dashboard</title>
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
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
       <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
               <h5 class="content-header-title float-left pr-1 mb-0">Session: <?php echo $activeSess->session_desc_name;?> &raquo; Term: <?php echo $activeSess->term_desc;?></h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo $lang['Dashboard'] ?></a>
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
    <?php include_once ("template/birthday_count.php");?>
    <?php include_once ("template/website_analysis.php");?>
  </div>
  <div class="row">
  
  </div>
</section>
<!-- Dashboard Ecommerce ends -->
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
     <!-- BEGIN: Page JS-->
   <script src="../app-assets/js/scripts/charts/chart-apex.min.js"></script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>