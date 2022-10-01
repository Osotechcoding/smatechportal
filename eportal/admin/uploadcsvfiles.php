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
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-certificate fa-1x"></span> CSV FILE UPLOADER
            </h3>
          </div>
        </div>
        <!--  -->
        <!-- Basic Vertical form layout section start -->
        <section id="basic-vertical-layouts">
          <div class="row">
            <div class="col-md-8 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted m-1">Basic Information</h4>
                  </div>
                  <form class="form form-vertical">
                    <div class="form-body">

                      <div class="row">

                        <div class="col-12">
                          <div class="form-group">
                            <label for="">Type</label>
                            <select name="type" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <option value="">Student Registration</option>
                              <option value="">Staff Registration</option>
                              <option value="">Psychomotor</option>
                            </select>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label for="">Choose CSV file Only</label>
                            <input type="file" name="csv_file" accept=".csv" class="file-input form-control">

                          </div>
                        </div>
                        <div class="col-6">
                          <div class="form-group">
                            <label for="">Class Level</label>
                            <select name="type" class="custom-select form-control form-control-lg">
                              <option value="">Choose...</option>
                              <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                            </select>
                          </div>
                        </div>

                        <div class="col-6">
                          <div class="form-group">
                            <label for="">Authentication Code</label>
                            <input type="password" placeholder="***********" class="form-control" autocomplete="off">
                          </div>
                        </div>

                      </div>
                      <button onclick="window.history.back();" type="button" class="btn btn-danger mt-1 btn-md"><span
                          class="fa fa-arrow-left"></span> Back</button>

                      <div class="col-12 d-flex justify-content-end">
                        <button type="submit" class="btn btn-dark btn-md __loadingBtn__">Update Payment</button>

                      </div>

                    </div>
                  </form>
                </div>

              </div>
            </div>


            <div class="col-md-4 col-12">
              <div class="card">

                <div class="card-body">
                  <div class="text-center">
                    <h4 class="text-uppercase text-center text-muted mt-1">Student Information</h4>
                  </div>
                  <form class="form form-vertical">
                    <div class="form-body">
                      <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label for="hostel">Male</label>
                            <input type="text" class="form-control" name="hostel" placeholder="Hostel Name">
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label>Female</label>
                            <input type="text" class="form-control" name="room" readonly>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label>Day Student</label>
                            <input type="text" class="form-control" name="bonk" readonly>
                          </div>
                        </div>
                        <div class="col-12">
                          <div class="form-group">
                            <label>Borading</label>
                            <input type="number" class="form-control" name="amount" readonly>
                          </div>
                        </div>

                        <div class="col-12 d-flex justify-content-end">
                          <button type="submit" class="btn btn-dark mr-1 btn-md __loadingBtn__">Update Payment</button>

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
        <!--  -->
      </div>
    </div>
  </div>
  <!-- END: Content-->
  </div>
  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <!-- BEGIN: Page JS-->
</body>
<!-- END: Body-->

</html>