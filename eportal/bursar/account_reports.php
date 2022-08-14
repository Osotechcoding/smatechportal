<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Current Page Title
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> INCOME & EXPENDITURES </h3>
  </div>
    </div>
    <!-- Dropdown Buttons options -->
    <div class="btn-group dropdown mb-1 float-right">
            <button type="button" class="btn btn-warning">Filter By Session</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
              <a class="dropdown-item text-warning" href="javascript:void(0);"><span class="fa fa-line-chart"></span> 2020/2021</a>
              <a class="dropdown-item text-primary" href="javascript:void(0);"><span class="fa fa-bar-chart"></span> 2021/2022</a>
               <a class="dropdown-item text-info" href="javascript:void(0);"><span class="fa fa-bar-chart"></span> 2022/2023</a>
            </div>
          </div>
          <div class="clearfix"></div>
          <!-- Dropdown Buttons options -->
    <!-- content goes here -->
    <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
           <h2 class="brand-text text-bold text-muted">INCOME INFO</h2>
          <div class="row">
           
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-4x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis" style="font-size: 1.5rem !important"><?php echo date("j F Y");?> 's Income</div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_all_money_paid_today(),2);?></h2>
                   
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-4x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis"><?php echo $activeSess->term_desc; ?> Income</div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_all_money_paid_by_term($activeSess->session_desc_name,$activeSess->term_desc),2) ?></h2>
                </div>
              </div>
            </div>
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-4x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis"> <?php echo $activeSess->session_desc_name; ?> Income</div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_all_income_this_session($activeSess->session_desc_name),2) ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
      <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
           <h2 class="brand-text text-bold text-muted">EXPENSE INFO</h2>
          <div class="row">
          
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-4x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis" style="font-size: 1.5rem !important"><?php echo date("j F Y");?> 's Expense</div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_today_expenses(),2) ?></h2>
                   
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-4x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis"><?php echo $activeSess->term_desc; ?></div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_all_expenses_this_term($activeSess->term_desc,$activeSess->session_desc_name),2) ?></h2>
                </div>
              </div>
            </div>
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-5"></i>
                  </div>
                  <div class="text-white line-ellipsis"> <?php echo $activeSess->session_desc_name; ?> Expense</div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Administration->get_all_expenses_this_session($activeSess->session_desc_name),2) ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
   <?php// include ("template/Customizer.php");?>
    <!-- End: Customizer-->
   
    </div>
    <!-- demo chat-->
   <!--  <?php //include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> -->
    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script> -->
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>