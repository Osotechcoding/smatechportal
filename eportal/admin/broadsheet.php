<?php
require_once "helpers/helper.php";
?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->
<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name; ?> :: Broadsheet</title>
  <?php include("../template/dataTableHeaderLink.php"); ?>
  
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
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
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']); ?></a>
                </li>
                <li class="breadcrumb-item active"> Broadsheet
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> View Student
              Broadsheet</h3>
          </div>
        </div>
        <!-- content goes here -->

        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
          <div class="row match-height">
            <div class="col-md-12 col-12">
              <div class="card">
                <div class="card-body">
                  <form class="form form-vertical" action="./view-broadsheet" method="get">
                    <div class="form-body">
                      <div class="row">

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="result_class">STUDENT CLASS</label>
                            <select name="student-class" id="result_class"
                              class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="result_term">Term</label>
                            <select name="term" class="custom-select form-control" id="">
                              <option value="">Choose...</option>
                              <option value="1st Term">1st Term</option>
                              <option value="2nd Term">2nd Term</option>
                              <option value="3rd Term">3rd Term</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-4">
                          <div class="form-group">
                            <label for="result_session"> Session</label>
                            <select name="school-session" id="result_session"
                              class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_all_session_lists(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end mt-1">
                          <button type="submit" name="show_broad_sheet_btn" class="btn btn-primary btn-md mr-1"><span
                              class="fa fa-address-card"></span> View Broadsheet</button>
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
        
      </div>
    </div>

    <!-- content goes end -->
  </div>
  </div>
  </div>
  <!-- END: Content-->
  </div>
  <?php include "../template/footer.php"; ?>
  <?php include("../template/DataTableFooterScript.php"); ?>
</body>
<!-- END: Body-->

</html>