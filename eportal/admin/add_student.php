<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: </title>
  <!-- include template/HeaderLink.php -->
  <?php include "../template/HeaderLink.php"; ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
  <!-- END: Main Menu-->
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
                <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['ADMIN_SES_TYPE']; ?></a>
                </li>
                <li class="breadcrumb-item active"><a href="studentcsvupload"
                    style="color:red;font-weight:700;">Register Bulk Student</a>
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap fa-1x"></span> Register Student
              Manually </h3>
          </div>
        </div>

        <!-- content goes here -->
        <section id="basic-vertical-layouts">
          <div class="col-md-10 col-10 offset-1">
            <div class="card">

              <div class="text-center">

                <h2 class="text-center mt-1">Student Registration Form</h2>
                <h5 class="text-bold">Click here to <a href="studentcsvupload"
                    style="color:red;font-weight:700;">Register </a>Bulk
                  Student</h5>
              </div>
              <div class="card-body">
                <form class="form form-vertical" id="create_new_student_form">
                  <input type="hidden" name="action" value="submit_new_student_details">
                  <div class="form-body">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Scratch Card Pin</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="password" class="form-control" name="cardpin"
                              placeholder="**********">
                            <div class="form-control-position">
                              <i class="bx bx-credit-card"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Card Serial</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="text" class="form-control" name="cardserial"
                              placeholder="**********">
                            <div class="form-control-position">
                              <i class="bx bx-barcode"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="first-name-icon"> Surname</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" autocomplete="off" class="form-control" name="student_surname"
                              placeholder="Father's Name">
                            <div class="form-control-position">
                              <i class="bx bx-user"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon"> FirstName</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="text" class="form-control" placeholder="First Name"
                              name="student_first_name">
                            <div class="form-control-position">
                              <i class="bx bx-user"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon"> MiddleName</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="text" class="form-control" placeholder="Middle Name"
                              name="student_middle_name">
                            <div class="form-control-position">
                              <i class="bx bx-user"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon">Mobile</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="number" class="form-control" placeholder="080*********"
                              name="student_phone">
                            <div class="form-control-position">
                              <i class="bx bx-mobile"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email-id-icon"> Home Address</label>
                          <div class="position-relative has-icon-left">
                            <textarea name="student_home_address" id="home_address" class="form-control"
                              placeholder="Student home address"></textarea>
                            <div class="form-control-position">
                              <i class="bx bx-home-alt"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email-id-icon">Email</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" autocomplete="off" class="form-control" name="student_email"
                              placeholder="Email">
                            <div class="form-control-position">
                              <i class="bx bx-mail-send"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon">Admitted Class</label>
                          <div class="position-relative has-icon-left">
                            <select name="student_class" id="student_class" class="custom-select form-control">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list() ?>
                            </select>
                            <div class="form-control-position">
                              <i class="bx bx-book-open"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Admission Date</label>
                          <div class="position-relative has-icon-left">
                            <input type="date" name="admission_date" class="form-control">
                            <div class="form-control-position">
                              <i class="bx bx-calendar-check"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon">Gender</label>
                          <div class="position-relative has-icon-left">
                            <select name="student_gender" id="gender" class="custom-select form-control">
                              <option value="">Choose...</option>
                              <option value="Male">Male</option>
                              <option value="Female">Female </option>
                            </select>
                            <div class="form-control-position">
                              <i class="bx bx-user"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="password-icon">Student Type</label>
                          <div class="position-relative has-icon-left">
                            <select name="student_type" id="student_type" class="custom-select form-control">
                              <option value="Day">Day</option>
                              <option value="Boarding">Boarding</option>
                            </select>
                            <div class="form-control-position">
                              <i class="bx bxs-user-plus"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Date of Birth</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="date" class="form-control" name="student_dob">
                            <div class="form-control-position">
                              <i class="bx bx-calendar-check"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Authentication Code</label>
                          <div class="position-relative has-icon-left">
                            <input autocomplete="off" type="password" class="form-control"
                              placeholder="Enter Pass Code to continue" name="auth_code">
                            <div class="form-control-position">
                              <i class="bx bx-pin"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="justify-content-end pull-right">
                      <button type="submit" class="btn btn-dark btn-md mr-1 __loadingBtn4__">Submit</button>
                      <button type="reset" class="btn btn-danger btn-md">Reset</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  </div>
  <!-- END: Content-->
  </div>
  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <script src="smappjs/add_student.js"></script>
</body>
<!-- END: Body-->

</html>