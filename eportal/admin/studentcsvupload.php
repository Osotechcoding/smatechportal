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
                <li class="breadcrumb-item active">Student Registration
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
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="text-center mt-3">
                <h3 class="text-center text-info"> Bulk
                  Student Registration Via CSV</h3>
                <p><a href="../csv/student_csv.xlsx" target="_blank"
                    style="text-decoration:none;color:red; font-weight:700;">Click
                    Here</a> to
                  Download Sample File</p>
                <p>Open the downloaded file with Microsoft Office Excel <br>Enter Your Student Details follwing the
                  Partern on the Spreadsheet</p>
              </div>
              <div class="card-body">
                <form class="form" id="bulkStudentresgistration_form">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-6">
                        <input type="hidden" name="action" value="upload_student_bulk_csv_data">
                        <div class="form-group">
                          <label for="studentCsvFile"> SELECT (csv,xls or xlsx File Only)</label>
                          <input type="file" autocomplete="off" id="admission-no" class="form-control"
                            placeholder="***********" name="studentCsvFile" id="studentCsvFile"
                            accept=".csv,.xls,.xlsx">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="student_class"> Class/Grade</label>
                          <select name="student_class" id="student_class" class="form-control custom-select">
                            <option value="" selected>Choose...</option>
                            <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                          </select>
                        </div>
                      </div>

                      <!-- <div class="col-lg-6 col-md-6 col-sm-6">
                      <div class="form-group">
                        <label for="admission_year"> Admission Year</label>
                        <input type="text" onpaste="return false;" autocomplete="off" id="admission_year"
                          class="form-control" placeholder="e.g 2022" name="admission_year">

                      </div>
                    </div> -->
                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="auth_code">Pass Code</label>
                          <input type="password" onpaste="return false;" autocomplete="off" id="auth_code"
                            class="form-control" placeholder="*******" name="auth_code">

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
          <!-- Export Form -->
          <div class="col-lg-6 col-md-6 col-sm-6">
            <div class="card">
              <div class="text-center mt-3">
                <h3 class="text-center text-info">Export Your student Details By Class</h3>
              </div>
              <div class="card-body">
                <form class="form" action="./exportstudent" method="POST">
                  <h6 class="text-center m-3"> <?php if (isset($_SESSION['alert_msg'])) {
                                                  echo $_SESSION['alert_msg'];
                                                  unset($_SESSION['alert_msg']);
                                                } ?></h6>
                  <div class="form-body">
                    <div class="row">
                      <div class="col-6">
                        <input type="hidden" name="action" value="export_student_by_class">
                        <div class="form-group">
                          <label for="exp_type">Export Type</label>
                          <select name="exp_type" id="exp_type" class="form-control custom-select">
                            <option value="" selected>Choose...</option>
                            <option value="xlsx">Xlsx</option>
                            <option value="xls">Xls</option>
                            <option value="csv">Csv</option>
                          </select>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label for="student_class"> Class/Grade</label>
                          <select name="student_class" id="student_class" class="form-control custom-select">
                            <option value="" selected>Choose...</option>
                            <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                          </select>
                        </div>
                      </div>


                      <div class="col-lg-12 col-md-12 col-sm-12">
                        <div class="form-group">
                          <label for="auth_code">Pass Code</label>
                          <input type="password" onpaste="return false;" autocomplete="off" id="auth_code"
                            class="form-control" placeholder="*******" name="auth_code">

                        </div>
                      </div>
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" name="export_student_data_btn"
                          class="btn btn-dark mr-1 __rollingloading__">Export Students</button>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
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
  <script>
  $(document).ready(function() {
    $("#bulkStudentresgistration_form").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        url: "importstudentcsv",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__loadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__loadingBtn__").html('Upload').attr("disabled", false);
            // $("#video_form")[0].reset();
            $("#server-response").html(data);
            //alert(data);
          }, 2500);
        }

      });
    })

  })
  </script>
</body>

</html>