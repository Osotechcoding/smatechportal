<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: Check Single Student Result</title>
  <!-- include template/HeaderLink.php -->
  <?php include "../template/HeaderLink.php"; ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- include headernav.php -->
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
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
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']); ?></a>
                </li>
                <li class="breadcrumb-item active">Student Result
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-1x"></span> Register Bulk
              Student Via CSV
            </h3>

          </div>
        </div>
        <div class="col-lg-10 col-md-10 col-sm-12">
          <div class="card">
            <div class="text-center mt-3">
              <h3 class="text-center text-info">Register Bulk
                Student Via CSV</h3>
              <p><a href="../avatar.jpg" style="text-decoration:none;color:red; font-weight:700;">Click Here</a> to
                Download Sample Demo</p>
            </div>
            <div class="card-body">
              <form class="form" id="SingleStudentResult_form">
                <div class="form-body">
                  <div class="row">
                    <div class="col-6">
                      <input type="hidden" name="action" value="upload_students_via_csv">
                      <div class="form-group">
                        <label for="studentCsvFile"> SELECT FILE</label>
                        <input type="file" autocomplete="off" id="admission-no" class="form-control"
                          placeholder="***********" name="studentCsvFile" id="studentCsvFile">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="result_class"> Class/Grade</label>
                        <select name="result_class" id="result_class" class="form-control custom-select">
                          <option value="" selected>Choose...</option>
                          <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="auth_pass"> Admission Year</label>
                        <input type="text" onpaste="return false;" autocomplete="off" id="year" class="form-control"
                          placeholder="2022" name="year">

                      </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="auth_pass"> Authentication Code</label>
                        <input type="password" autocomplete="off" id="auth_pass" class="form-control"
                          placeholder="*******" name="auth_pass">

                      </div>
                    </div>
                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-dark mr-1 __loadingBtn__">Upload</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content goes here -->
      </div>
    </div>
  </div>
  <!-- END: Content-->

  </div>
  <!-- demo chat-->

  <!-- BEGIN: Footer-->
  <!--  -->
  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->

  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <script src="smappjs/bulkstudentcsvupload.js"></script>
  <!-- BEGIN: Page JS-->
</body>
<!-- END: Body-->

</html>