<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name; ?> :: View Student Attendance </title>
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
                    href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']); ?></a>
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
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-eye fa-1x"></span> View Student Attendance
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
                      <a href="./upload-attendance" class="btn btn-primary btn-pill btn-md float-right">Upload
                        attendance</a>
                    </div>
                    <div class="card-body">
                      <form class="form form-vertical" action="" method="POST">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="class"> Student Class </label>
                                <select name="class" id="class" class="form-control">
                                  <option value="" selected>Choose...</option>
                                  <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                                </select>
                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="term">Result Term</label>
                                <select name="term" class="form-control">
                                  <option value="" selected>Choose...</option>
                                  <option value="1st Term">1st Term</option>
                                  <option value="2nd Term">2nd Term</option>
                                  <option value="3rd Term">3rd Term</option>
                                </select>
                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label for="sess">Academic Session</label>
                                <input type="text" id="sess" class="form-control" name="sess"
                                  value="<?php echo $activeSess->session_desc_name; ?>" readonly>
                              </div>
                            </div>

                            <div class="col-12 d-flex justify-content-end">
                              <button type="submit" name="show_attendance_sheet_btn" class="btn btn-primary mr-1">
                                Show Attendance Report</button>

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
          if (!empty($_POST['class']) && !empty($_POST['term']) && !empty($_POST['sess'])) {
            $class = $Configuration->Clean($_POST['class']);
            $term = $Configuration->Clean($_POST['term']);
            $sess = $Configuration->Clean($_POST['sess']);

            $student_attnd_data = $Result->showAttendanceRecord($class, $term, $sess);
          ?>
        <?php

            if ($student_attnd_data) {
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
              <span class="btn btn-info btn-round text-center"><?php echo strtoupper($class) ?> </span>
              <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($term) ?> </span>
              <span class="btn btn-danger btn-round text-center"><?php echo ($sess) ?></span>

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

                    <?php foreach ($student_attnd_data as $attend) : ?>
                    <?php
                            $total_count++;
                            $student_data = $Student->get_student_data_ByRegNo($attend->stdRegNo,);
                            $timeOpen = $Administration->get_session_details(); ?>

                    <tr>
                      <input type="hidden" name="term" value="<?php echo $term; ?>">
                      <input type="hidden" name="school_session" value="<?php echo $activeSess->session_desc_name; ?>">
                      <td><?php echo $total_count; ?></td>
                      <td><?php echo ucwords($student_data->full_name); ?></td>
                      <td><input type="text" class="form-control" readonly
                          value="<?php echo $timeOpen->Days_open ?> Days"></td>
                      <td><input type="text" class="form-control" readonly value="<?php echo $attend->present; ?> days">
                      <td><input type="text" readonly class="form-control" value="<?php echo $attend->absent; ?> days">

                      </td>
                    </tr>
                    <?php endforeach; ?>
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
  <div class="card-body"><h3 class="text-center col-md-12">' . $Alert->alert_msg("No attendance record for $class Students in $term of $sess Academic Session", "danger") . '</h3></div></div>';
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