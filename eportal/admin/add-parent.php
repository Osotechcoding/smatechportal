<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name ?> :: Add Parent </title>
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
                
                  <li class="breadcrumb-item active"><a href="./parents"
                    style="color:green;font-weight:700;">View Parents</a>
                </li>
               
               
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-md-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-1x"></span> Parents Registration Page
               </h3>
          </div>
        </div>

        <!-- content goes here -->
        <section id="basic-vertical-layouts">
          <div class="col-md-10 col-10 offset-1">
            <div class="card">

              <div class="text-center">

                <h2 class="text-center mt-1">Parents Registration Form</h2>
                <?php if ($Admin->isSuperAdmin($admin_data->adminId)){?>
                  <h5 class="text-bold">Click here to <a href="parentcsvupload"
                    style="color:red;font-weight:700;">Import </a>Mass
                  Parents from Excel file</h5>
                  <?php
                }?>
              </div>
              <div class="card-body">
                <form class="form form-vertical" id="CreateParentForm" autocomplete="off">
                  <input type="hidden" name="action" value="submit_new_parent_detail">
                  <div class="form-body">
                    <div class="row">
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="first-name-icon"> First Name</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" class="form-control form-control-lg" name="first_name"
                              placeholder="Father's Name">
                            <div class="form-control-position">
                              <i class="bx bx-user"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon"> LastName</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" class="form-control form-control-lg" placeholder="Last Name"
                              name="last_name">
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
                            <input type="number" class="form-control form-control-lg" placeholder="080*********"
                              name="mobile">
                            <div class="form-control-position">
                              <i class="bx bx-mobile"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">Email</label>
                          <div class="position-relative has-icon-left">
                            <input type="text" class="form-control form-control-lg" name="email"
                              placeholder="e.g example@smatech.com">
                            <div class="form-control-position">
                              <i class="bx bx-mail-send"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label for="email-id-icon"> Home Address</label>
                          <div class="position-relative has-icon-left">
                            <textarea name="address" id="address" class="form-control form-control-lg" placeholder="Write Home address..."
                             ></textarea>
                            <div class="form-control-position">
                              <i class="bx bx-home-alt"></i>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon">Occupation</label>
                          <div class="position-relative has-icon-left">
                           <input type="text" class="form-control form-control-lg" placeholder="Write Parent Occupation" name="occupation">
                            <div class="form-control-position">
                              <i class="bx bx-briefcase"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="email-id-icon">PTA Post Held</label>
                          <div class="position-relative has-icon-left">
                          <input type="text" class="form-control form-control-lg" name="pta_status" placeholder="e.g PTA Chairman">
                            <div class="form-control-position">
                              <i class="bx bx-user-secret"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label for="contact-info-icon">Gender</label>
                          <div class="position-relative has-icon-left">
                            <select name="sex" id="sex" class="custom-select form-control">
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
                          <label for="email-id-icon">Authentication Code</label>
                          <div class="position-relative has-icon-left">
                            <input type="password" class="form-control form-control-lg"
                              placeholder="Enter Pass Code to continue" name="auth_code">
                            <div class="form-control-position">
                              <i class="bx bx-pin"></i>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="justify-content-end pull-right">
                      <button type="submit" class="btn btn-dark btn-md mr-1 __loadingBtn__">Register</button>
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
  <script src="smappjs/parents.js"></script>
</body>
<!-- END: Body-->

</html>