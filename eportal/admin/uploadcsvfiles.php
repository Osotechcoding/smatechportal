<?php
require_once "helpers/helper.php";
 $timeOpen = $Administration->get_session_details();
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: Import Files </title>
 
  <?php include "../template/HeaderLink.php"; ?>
 
<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  
  <?php include "template/Sidebar.php"; ?>
  
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
                <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['ADMIN_SES_TYPE']; ?></a>
                </li>
                <li class="breadcrumb-item active">CSV FILE UPLOADER
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-certificate fa-1x"></span> CSV FILE UPLOADER <a onclick="window.history.back();" style="text-decoration:none; color:#f00"  href="javascript:void(0);"><span class="fa fa-arrow-left"></span> Back</a>
            </h3>
          </div>
        </div>
        <!--  -->
        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">UPLOAD RESULT</h4>
                  </div>
                  <form class="form form-vertical" id="bulkStudentResultImportForm">
                    <div class="form-body">
<p><a href="../csv/agric_KG1_result.xlsx" target="_blank"
                style="text-decoration:none;color:red; font-weight:700;">Click
                Here</a> to Download template format</p>
            <p>Open the downloaded file with Microsoft Office Excel. <br> Enter the Result Details follwing the Partern on the Spreadsheet</p>
                      <div class="row">
                        <div class="col-md-6">
                  <div class="form-group">
                    <label for="csv_result_subject">Result Subject</label>
                    <select name="csv_result_subject" id="csv_result_subject" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_all_subjects_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_class">Result Class</label>
                  <select name="result_class" id="result_class" class="custom-select form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_term">Result Term</label>
                    <select name="result_term" id="result_term" class="custom-select form-control form-control-lg">
                      <option value="" selected>Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
               
                <div class="col-md-6">
                          <div class="form-group">
                            <label for="result_session">Session</label>
                            <select name="result_session" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                             <?php echo $Administration->get_all_session_lists(); ?>
                          
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_file">Choose CSV,Excel File </label>
                    <input type="file" name="result_file" id="result_file" accept=".csv,.xlsx,.xls"
                      class="file-input form-control form-control-file">
                  </div>
                </div>
                       
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off" name="auth_code">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" name="action" value="import_student_bulk_result_sheet_csv_">
                      
                      <div class="col-12 d-flex justify-content-end">
                         
            <button type="submit" class="btn btn-dark btn-md ml-1 __ImportResultLoadingBtn__">
              Import Result Score</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>

           <div class="col-md-12 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">UPLOAD AFFECTIVE RECORD</h4>
                  </div>
                  <form class="form form-vertical" id="studentAffectiveUploadForm">
                    <div class="form-body">
                      <div class="row">
                      
                        <div class="col-6">
                          <div class="form-group">
                            <label for="csv_student_class">Class</label>
                            <select name="csv_student_class" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="csv_term_">Term</label>
                            <select name="csv_term_" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <option value="1st Term">First Term</option>
                              <option value="2nd Term">Second Term</option>
                              <option value="3rd Term">Third Term</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="csv_affecive_schol_ses">Session</label>
                            <select name="csv_affecive_schol_ses" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_all_session_lists(); ?>
                          
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Class Teacher</label>
                            <select name="class_teacher" class="custom-select form-control form-control-lg">
                              <option value="">Choose Class Teacher...</option>
                            <?php echo $Staff->show_staff_name_indropdown()?>
                            </select>
                          </div>
                        </div>

                          <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Choose CSV OR EXCEL file Only</label>
                            <input type="file" name="affective_file" accept=".csv,.xlsx,xls" class="file-input form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off" name="auth_code">
                          </div>
                        </div>
                      </div>
                   <input type="hidden" name="action" value="import_student_bulk_affective_domain_score_">
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-md __AffectiveLoadingBtn__">Import Affective Record</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- COGNITIVE -->

          <!-- COGNITIVE / -->
          <hr class="text-bold-700">
          <div class="row">
            <div class="col-md-12 col-12">
              <div class="card">
                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">UPLOAD PSYCHOMOR RECORD</h4>
                  </div>
                  <form class="form form-vertical" id="uploadStudentPsychoScoreForm">
                    <div class="form-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Choose CSV OR EXCEL file Only</label>
                            <input type="file" name="psycho_file" accept=".csv,.xlsx,xls" class="file-input form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="cstudent_class">Class</label>
                            <select name="cstudent_class" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Term</label>
                            <select name="csv_term" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <option value="1st Term">First Term</option>
                              <option value="2nd Term">Second Term</option>
                              <option value="3rd Term">Third Term</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Session</label>
                            <select name="csv_psycho_schol_ses" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_all_session_lists(); ?>
                          
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Class Teacher</label>
                            <select name="class_teacher" class="custom-select form-control form-control-lg">
                              <option value="">Choose Class Teacher...</option>
                            <?php echo $Staff->show_staff_name_indropdown()?>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off" name="auth_code">
                          </div>
                        </div>
                      </div>
                    <input type="hidden" name="action" value="import_student_bulk_psycho_domain_score_">
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-md __PsychoLoadingBtn__">Import Psychomotor Record</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
<!-- ATTENDANCE FORM -->
           <div class="col-md-12 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">UPLOAD ATTENDANCE RECORD</h4>
                  </div>
                  <form class="form form-vertical" id="attendanceCSVUploadForm">
                    <div class="form-body">
                      <div class="row">

                        <div class="col-6">
                          <div class="form-group">
                            <label for="attendance_class">Class</label>
                            <select name="attendance_class" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>

                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Term</label>
                            <select name="attendance_term" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <option value="1st Term">First Term</option>
                              <option value="2nd Term">Second Term</option>
                              <option value="3rd Term">Third Term</option>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Session</label>
                            <select name="attendance_session" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                             <?php echo $Administration->get_all_session_lists(); ?>
                          
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="class_teacher">Class Teacher</label>
                            <select name="class_teacher" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Staff->show_staff_name_indropdown()?>
                            </select>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Choose CSV OR EXCEL file Only</label>
                            <input type="file" name="attendance_file" accept=".csv,.xlsx,xls" class="file-input form-control">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off" name="auth_code">
                          </div>
                        </div>
                      </div>
                      <input type="hidden" value="<?php echo $timeOpen->Days_open ?>" name="schl_open">
                      <input type="hidden" name="action" value="import_student_bulk_attendance_record_">
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-md __AttendanceLoadingBtn__">Import Attendance Record</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- ATTENDANCE FORM /-->
          </div>

           <hr class="text-bold-700">

          <div class="row">
            <!-- COMMENTS FORM -->
            <div class="col-md-12 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">UPLOAD RESULT COMMENTS</h4>
                  </div>
                  <form class="form form-vertical" id="uploadStudentResultCommentForm">
                    <div class="form-body">

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Choose CSV OR EXCEL file Only</label>
                            <input type="file" name="comment_file" accept=".csv,.xlsx,xls" class="file-input form-control">
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="comment_class">Class</label>
                            <select name="comment_class" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group">
                            <label for="comment_term">Term</label>
                            <select name="comment_term" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <option value="1st Term">First Term</option>
                              <option value="2nd Term">Second Term</option>
                              <option value="3rd Term">Third Term</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="comment_sess">Session</label>
                            <select name="comment_sess" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                             <?php echo $Administration->get_all_session_lists(); ?>
                          
                            </select>
                          </div>
                        </div>
                       
                        <div class="col-md-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off" name="auth_code">
                          </div>
                        </div>
                      </div>
                     <input type="hidden" name="action" value="import_student_bulk_result_comment_record_">
                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-md __CommentLoadingBtn__">Import Result Comment</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <!-- COMMENTS FORM /-->
          </div>
        </section>
        <!-- Basic Vertical form layout section end -->
        <!--  -->
      </div>
    </div>
  </div>

  </div>
  <?php include "../template/footer.php"; ?>
 
  <?php include "../template/FooterScript.php"; ?>
  <!-- BEGIN: Page JS-->
   <script>
  $(document).ready(function() {
 $.ajaxSetup({
  url: "importstudentcsv",
  method:"POST"
});
    //Import student Result Score func
    $("#bulkStudentResultImportForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__ImportResultLoadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Importing...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__ImportResultLoadingBtn__").html('Import Result Score').attr("disabled", false);
            console.log(data)
            $("#server-response").html(data);
          }, 1000);
        }

      });
    });

     //Import student affective Score func
    $("#studentAffectiveUploadForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__AffectiveLoadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Importing...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__AffectiveLoadingBtn__").html('Import Affective Record').attr("disabled", false);
            console.log(data)
            $("#server-response").html(data);
          }, 1000);
        }

      });
    });

      //Import student Psychomotor Score func
    $("#uploadStudentPsychoScoreForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__PsychoLoadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Importing...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__PsychoLoadingBtn__").html('Import Psychomotor Record').attr("disabled", false);
            console.log(data)
            $("#server-response").html(data);
          }, 1000);
        }

      });
    });

 //Import student Attendance Score func
    $("#attendanceCSVUploadForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__AttendanceLoadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Importing...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__AttendanceLoadingBtn__").html('Import Affective Record').attr("disabled", false);
            console.log(data)
            $("#server-response").html(data);
          }, 1000);
        }

      });
    });

//Import student Attendance Score func
    $("#uploadStudentResultCommentForm").on("submit", function(event) {
      event.preventDefault();
      $.ajax({
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        beforeSend() {
          $(".__CommentLoadingBtn__").html(
            '<img src="../assets/loaders/rolling_loader.svg" width="30"> Importing...').attr("disabled",
            true);
        },
        success: function(data) {
          setTimeout(() => {
            $(".__CommentLoadingBtn__").html('Import Result Comment').attr("disabled", false);
            console.log(data)
            $("#server-response").html(data);
          }, 1000);
        }

      });
    });
  });
  </script>
</body>
<!-- END: Body-->

</html>