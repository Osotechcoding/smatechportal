<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name; ?> :: Upload Student Attendance </title>
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
            <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> Portal</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
              <ol class="breadcrumb p-0 mb-0 pl-1">
                <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']); ?></a>
                </li>
                <li class="breadcrumb-item active">Student Attendance
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comment fa-1x"></span> Student Attendance
              Module
            </h3>
          </div>
        </div>
        <!-- content goes here -->
        <div class="card">
          <div class="card-body">
            <!-- Basic Vertical form layout section start -->
            <section id="basic-vertical-layouts">
              <div class="row match-height">
                <div class="col-md-12 col-12">
                  <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                      <form class="form form-vertical" action="" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="attendance_class"> Class</label>
                                <select name="attendance_class" id="attendance_class" class="form-control">
                                  <option value="<?php echo $staff_assigned_class; ?>" selected>
                                    <?php echo $staff_assigned_class; ?></option>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="attendance_term">Result Term</label>
                                <select name="attendance_term" class="form-control">
                                  <option value="" selected>Choose...</option>
                                  <option value="1st Term">1st Term</option>
                                  <option value="2nd Term">2nd Term</option>
                                  <option value="3rd Term">3rd Term</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="attendance_sess">Academic Session</label>
                                <input type="text" id="attendance_sess" class="form-control" name="attendance_sess"
                                  value="<?php echo $activeSess->session_desc_name; ?>" readonly>
                              </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                              <button type="submit" name="show_attendance_sheet_btn" class="btn btn-primary mr-1">
                                Attendance Report</button>

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

        <?php if (isset($_POST['show_attendance_sheet_btn'])) : ?>
        <?php
          if (!empty($_POST['attendance_class']) && !empty($_POST['attendance_term']) && !empty($_POST['attendance_sess'])) {
            $attendance_class = $Configuration->Clean($_POST['attendance_class']);
            $attendance_term = $Configuration->Clean($_POST['attendance_term']);
            $attendance_sess = $Configuration->Clean($_POST['attendance_sess']);

            $getstudetNames = $Student->get_students_byClassDesc($attendance_class);
          ?>
        <?php
            switch ($attendance_term) {
              case '3rd Term':
                $resultTable = 'visap_termly_result_tbl';
                break;
              case '2nd Term':
                $resultTable = 'visap_2nd_term_result_tbl';
                break;
              case '1st Term':
                $resultTable = 'visap_1st_term_result_tbl';
                break;
              default:
                $resultTable = 'visap_1st_term_result_tbl';
                break;
            }

            if ($getstudetNames) {
              $total_count = 0;
            ?>
        <!--starts  -->
        <!-- ############################# -->
        <div class="card show-on-print">
          <div class="card-body">
            <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
            <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
            <h4 class="text-center text-danger"><strong>STUDENTS ATTENDANCE SHEET</strong></h4>
            <!-- ############################# -->
            <br />
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
              <span class="btn btn-info btn-round text-center"><?php echo strtoupper($attendance_class) ?> </span>
              <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($attendance_term) ?> </span>
              <span class="btn btn-danger btn-round text-center"><?php echo ($attendance_sess) ?></span>

            </div>
            <br>
          </div>
          <div class="card-body">
            <form id="result_comment_form">
              <div class="table-responsive">
                <table class=" table-bordered table table-stripped table-hover">
                  <thead class="text-center">
                    <tr>
                      <th width="5%">S/N</th>
                      <th width="25%">Student Name</th>
                      <th width="15%">School Opens</th>
                      <th width="20%">Time Present</th>
                      <th width="20%">Time Absent</th>
                    </tr>
                  </thead>
                  <tbody class="text-center">

                    <?php foreach ($getstudetNames as $student) : ?>
                    <?php
                            $total_count++;
                            $student_result_data = $Result->get_student_result_gradeByRegNo($resultTable, $student->stdRegNo, $student->studentClass, $attendance_term, $attendance_sess); ?>
                    <?php if ($student_result_data) : ?>
                    <?php
                              $timeOpen = $Administration->get_session_details();
                              ?>
                    <tr>
                      <input type="hidden" name="term" value="<?php echo $attendance_term; ?>">
                      <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name; ?>">
                      <input type="hidden" name="student_regNo[]" value="<?php echo $student->stdRegNo; ?>">

                      <td><?php echo $total_count; ?></td>
                      <td><?php echo ucwords($student->full_name); ?></td>
                      <td><input type="text" class="form-control" readonly
                          value="<?php echo $timeOpen->Days_open ?> Days"></td>
                      <td><input type="number" name="present[]" class="form-control" value="<?php echo '25 Days' ?>">
                      <td><input type="number" name="absent[]" class="form-control" value="<?php echo '5 Days' ?>">

                      </td>
                    </tr>
                    <?php endif ?>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
              <div class="clearfix"></div>
            </form>
          </div>
          <!-- ends -->

          <?php
            } else {
              echo '<div class="card">
  <div class="card-body"><h3 class="text-center col-md-12">' . $Alert->alert_msg("No result found for your search, maybe Result is not uploaded yet", "danger") . '</h3></div></div>';
            }

              ?>
          <?php
          } else {
            echo '<div class="card show-on-print">
  <div class="card-body"><h3 class="text-center col-md-12">' . $Alert->alert_msg("Please Select academic term to attendance details on result", "danger") . '</h3></div></div>';
          }
            ?>
          <?php endif ?>
          <!-- content goes end -->
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

</body>
<!-- END: Body-->

</html>