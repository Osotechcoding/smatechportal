<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: Student Result Uploading</title>
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
                <li class="breadcrumb-item active">Student Results
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Student Results
              Uploading</h3>
          </div>
        </div>
        <!-- content goes here -->

        <div class="card">
          <div class="card-header">
            <!--  -->
            <?php //include_once 'Links/results_btn.php'; 
            ?>

          </div>

          <div class="card-body">
            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
              <div class="row match-height">
                <div class="col-md-12 col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3>Upload Student Results</h3>
                      <button type="button" class="btn btn-dark btn-sm badge-pill" data-toggle="modal"
                        data-target="#csv_Modal"><span class="fa fa-upload fa-1x"></span> IMPORT RESULTS</button>

                    </div>
                    <div class="card-body">
                      <form class="form form-vertical" action="" method="post">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="result_subject">Select Subject</label>
                                <select name="result_subject" id="result_subject"
                                  class="custom-select form-control form-control-lg">
                                  <option value="">Choose...</option>
                                  <?php echo $Administration->get_all_subjects_InDropDown_list(); ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="result_class">Select Class</label>
                                <select name="result_class" id="result_class"
                                  class="custom-select form-control form-control-lg">
                                  <option value="">Choose...</option>
                                  <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="result_term">select Term</label>
                                <select name="result_term" id="result_term"
                                  class="custom-select form-control form-control-lg">
                                  <option value="">Choose...</option>
                                  <option value="1st Term">1st Term</option>
                                  <option value="2nd Term">2nd Term</option>
                                  <option value="3rd Term">3rd Term</option>
                                </select>
                              </div>
                            </div>
                            <input type="hidden" id="school_session" name="school_session"
                              value="<?php echo $activeSess->session_desc_name; ?>">
                            <div class="col-12 d-flex justify-content-end mt-1">
                              <button type="submit" name="show_broad_sheet_btn"
                                class="btn btn-primary btn-md mr-1"><span class="fa fa-address-card"></span> SHOW RESULT
                                SHEET</button>
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
            <section>
              <!-- BROADSHEET GOES HERE -->
              <?php
              //check if someone click on show broadsheet btn
              if (isset($_POST['show_broad_sheet_btn'])) : ?>
              <?php if (empty($_POST['result_subject']) || empty($_POST['result_class']) || empty($_POST['result_term'])) : ?>
              <?php  //get_exam_subjectsByClassName($grade_desc,$subject)
                  echo $Alert->alert_msg(" Please Select Subject, Class and Term to Continue!", "danger"); ?>
              <?php else : ?>
              <?php
                  $school_session = $_POST['school_session'];
                  $result_subject = $_POST['result_subject'];
                  $result_class = $_POST['result_class'];
                  $result_term = $_POST['result_term'];
                  ?>
              <!-- show the broadsheet -->
              <!-- Starts -->
              <?php
                  // $student_data = $Student->getStudentsByClassName($result_class);
                  $get_all_exam_subjects = $Result->get_exam_subjectsByClassName($result_class, $result_subject);
                  if ($get_all_exam_subjects) {
                    $cnt = 0;
                  ?>
              <!-- Validation Tooltips -->
              <div class="card">
                <div class="card-body">
                  <hr class="text-bold-700">
                  <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
                  <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
                  <h4 class="text-center text-danger"><strong>STUDENTS EXAMINATION RESULT SHEET</strong></h4>
                  <!-- ############################# -->
                  <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <span class="btn btn-warning btn-round text-center"><?php echo strtoupper($result_subject) ?>
                    </span>
                    <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($result_class) ?> </span>
                    <span class="btn btn-success btn-round text-center"><?php echo strtoupper($result_term) ?> </span>
                  </div>
                  <hr />
                  <div class="col-md-12 text-center" id="myresponse"></div>
                  <div class="clearfix"></div>
                  <form id="student_result_upload_form">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
                      <div class="table-responsive">
                        <table class="table table-stripped text-center">

                          <table class="table table-stripped text-center">
                            <thead class="text-center">
                              <tr>
                                <th width="10%">S/N</th>
                                <th width="20%"> STUDENT NAME</th>
                                <th width="20%">ADMISSION NO</th>
                                <th width="20%">SUBJECT</th>
                                <th width="15%"> CA (40)</th>
                                <th width="15%">EXAM (60)</th>
                              </tr>
                            </thead>
                            <tbody class="text-center">
                              <?php
                                    //
                                    foreach ($get_all_exam_subjects as $val) {
                                      $cnt++;
                                      // $get_all_exam_subjects = $Result->get_exam_subjectsByClassName($val->studentClass,$result_subject);
                                    ?>
                              <tr>
                                <td><?php echo $cnt; ?> </td>
                                <input type="hidden" name="result_class[]"
                                  value="<?php echo strtoupper($val->studentClass); ?>">
                                <input type="hidden" name="student_regNo[]"
                                  value="<?php echo strtoupper($val->stdRegNo); ?>">
                                <td>
                                  <span><?php echo strtoupper($val->stdSurName . " " . $val->stdFirstName . " " . $val->stdMiddleName); ?></span>
                                  <input type="hidden" name="student_name[]"
                                    value="<?php echo strtoupper($val->stdSurName . " " . $val->stdFirstName . " " . $val->stdMiddleName); ?>">
                                </td>
                                <td><?php echo strtoupper($val->stdRegNo); ?></td>
                                <td><span><?php echo strtoupper($val->subject_name); ?></span><input type="hidden"
                                    name="subject[]" value="<?php echo strtoupper($val->subject_name); ?>"></td>
                                <td><input type="number" placeholder="40" min="0" max="40" name="cass[]" step="1"
                                    class="form-control" required></td>
                                <td><input type="number" placeholder="60" min="0" max="60" name="exam[]" step="1"
                                    placeholder="" class="form-control" required>
                                  <input type="hidden" name="total_count" value="<?php echo $cnt; ?>">
                                </td>
                              </tr>
                              <?php
                                    } ?>
                            </tbody>
                          </table>
                      </div>
                      <div class="mt-2 float-right">
                        <input type="hidden" name="result_session" value="<?php echo $school_session; ?>">
                        <input type="hidden" name="result_term" value="<?php echo $result_term; ?>">
                        <input type="hidden" name="action" value="submit_student_result_upload_now">
                        <button class="btn btn-dark submit-btn btn-lg mr-2 __loadingBtn__" name="result_upload_btn"
                          type="submit"> UPLOAD NOW</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
              <?php
                  } else {
                    //get_exam_subjectsByClassName($grade_desc,$subject)
                    echo "<div class='text-center'>
          " . $Alert->alert_msg(" No result found for $result_subject  In $result_class Class!", "danger") . "
          </div>";
                  }
                  ?>

              <!-- Ends -->
              <!-- show broadsheet ends -->
              <?php endif; ?>
              <?php endif; ?>

              <!-- BROADSHEET ENDS -->
            </section>
          </div>
        </div>

        <!-- content goes end -->
      </div>
    </div>
  </div>
  <!-- END: Content-->

  <!-- BEGIN: Customizer-->
  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->
  <!-- BUS MODAL Start -->
  <div class="modal fade" id="csv_Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i
              class="fa fa-upload fa-1x"></i> Import Student Result</h3>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <i class="bx bx-x"></i>
          </button>
        </div>
        <form id="bulkStudentResultImportForm">
          <div class="modal-body">
            <p><a href="../csv/agric_KG1_result.xlsx" target="_blank"
                style="text-decoration:none;color:red; font-weight:700;">Click
                Here</a> to
              Download Sample Import File</p>
            <p>Open the downloaded file with Microsoft Office Excel.Enter the Result Details follwing the
              Partern on the Spreadsheet</p>
            <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="csv_subject">Result Subject</label>
                    <select name="csv_subject" id="csv_subject" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_all_subjects_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="csv_class">Result Class</label>
                    <select name="csv_class" id="csv_class" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="csv_term">Result Term</label>
                    <select name="csv_term" id="csv_term" class="custom-select form-control form-control-lg">
                      <option value="" selected>Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="csvresult_schol_ses" value="<?php echo $activeSess->session_desc_name; ?>">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_file">Choose CSV,Excel File </label>
                    <input type="file" name="result_file" id="result_file" accept=".csv,.xlsx,.xls"
                      class="file-input form-control form-control-file">
                  </div>
                </div>
                <div class="col-lg-12 col-md-12 col-sm-12">
                  <div class="form-group">
                    <label for="auth_code">Authentication Code</label>
                    <input type="password" onpaste="return false;" autocomplete="off" id="auth_code"
                      class="form-control" placeholder="*******" name="auth_code">

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <input type="hidden" name="action" value="import_student_bulk_result_sheet_csv_">
            <button type="submit" class="btn btn-dark btn-md ml-1 __loadingBtn12__">
              <span class="fa fa-cloud-upload"></span> Import Now</button>
            <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
              <i class="bx bx-power-off"></i>
              Cancel
            </button>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- BUS MODAL  END -->
  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <!-- BEGIN: Page JS-->
  <script src="smappjs/result_uploading.js"></script>
  <script>
  $(document).ready(function() {
    $("#bulkStudentResultImportForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        url: "importstudentcsv",
        type: "POST",
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__loadingBtn12__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__loadingBtn12__").html('Upload').attr("disabled", false);
            // $("#video_form")[0].reset();
            $("#server-response").html(data);
            //alert(data);
          }, 1500);
        }

      });
    })

  })
  </script>
</body>
<!-- END: Body-->

</html>