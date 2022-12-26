<?php
require_once "helpers/helper.php";
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo ($SmappDetails->school_name); ?> :: <?php echo ucwords($admin_data->adminType); ?></title>
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
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0">Profile</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
              <ol class="breadcrumb p-0 mb-0 pl-1">
                <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a
                    href="javascript:void(0);"><?php echo strtoupper($admin_data->adminType); ?></a>
                </li>
                <li class="breadcrumb-item active"> Account Settings
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <!-- account setting page start -->
        <section id="page-account-settings">
          <div class="row">
            <div class="col-12">
              <div class="row">
                <!-- left menu section -->
                <div class="col-md-3 mb-2 mb-md-0 pills-stacked">
                  <ul class="nav nav-pills flex-column">
                    <li class="nav-item">
                      <a class="nav-link d-flex align-items-center active" id="account-pill-general" data-toggle="pill"
                        href="#account-vertical-general" aria-expanded="true">
                        <i class="bx bx-cog"></i>
                        <span>My Profile</span>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link d-flex align-items-center" id="account-pill-message" data-toggle="pill"
                        href="#account-vertical-message" aria-expanded="true">
                        <i class="bx bx-envelope"></i>
                        <span>Add Message Users</span>
                      </a>
                    </li>

                    <!--   <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="staff-bank-info" data-toggle="pill"
                                href="#bank" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>Update Bank Info</span>
                            </a>
                        </li> -->
                    <!-- <li class="nav-item">
                      <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                        href="#update-avatar-photo" aria-expanded="false">
                        <i class="fa fa-camera"></i>
                        <span>Upload Avatar</span>
                      </a>
                    </li> -->
                    <li class="nav-item">
                      <a class="nav-link d-flex align-items-center" id="account-pill-password" data-toggle="pill"
                        href="#account-vertical-password" aria-expanded="false">
                        <i class="bx bx-lock"></i>
                        <span>Change Password</span>
                      </a>
                    </li>

                    <!--  <li class="nav-item">
                            <a class="nav-link d-flex align-items-center" id="account-pill-info" data-toggle="pill"
                                href="#bank-info" aria-expanded="false">
                                <i class="bx bx-info-circle"></i>
                                <span>Update Bank Info</span>
                            </a>
                        </li> -->

                  </ul>
                </div>
                <!-- right content section -->
                <div class="col-md-9">
                  <div class="card">
                    <div class="card-body">
                      <div class="tab-content">
                        <div role="tabpanel" class="tab-pane active" id="account-vertical-general"
                          aria-labelledby="account-pill-general" aria-expanded="true">
                          <div class="media text-center">
                            <a href="javascript: void(0);">
                              <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" class="rounded mr-75"
                                alt="profile image" height="150" width="150" style="border:2px solid darkblue;">
                            </a>

                          </div>
                          <hr>
                          <form class="validate-form" id="admin_profile_update_form">
                            <div class="row">


                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>User Name</label>
                                    <input type="text" class="form-control" placeholder="User Name"
                                      value="<?php echo ucwords($admin_data->adminUser); ?>" name="UserName">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Full Name</label>
                                    <input type="text" class="form-control" placeholder="Middle Name"
                                      value="<?php echo ucwords($admin_data->fullname); ?>" name="fullName">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-4">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Portal User Type</label>
                                    <input type="text" class="form-control" placeholder="User Type"
                                      value="<?php echo ($admin_data->adminType); ?>" name="userType" readonly>
                                  </div>
                                </div>
                              </div>

                              <div class="col-md-8">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" placeholder="Email"
                                      value="<?php echo ($admin_data->adminEmail); ?>" name="email" readonly>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-12">
                                <div class="form-group">
                                  <label>Authentication Code</label>
                                  <input type="password" class="form-control" placeholder="*********" name="auth_pass">
                                </div>
                              </div>
                              <input type="hidden" name="action" value="update_admin_details">
                              <input type="hidden" name="admin_id" value="<?php echo $admin_data->adminId; ?>">
                              <div class="col-12 d-flex justify-content-end">
                                <button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtn38__">Save
                                  changes</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="tab-pane fade " id="account-vertical-password" role="tabpanel"
                          aria-labelledby="account-pill-password" aria-expanded="false">
                          <h4 class="text-center text-muted"> UPDATE ACCOUNT PASSWORD</h4>
                          <form class="validate-form" id="password-update-form">
                            <div class="col-md-12 text-center" id="myResponseText"></div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Email</label>
                                    <input type="text" class="form-control"
                                      value="<?php echo $admin_data->adminEmail; ?>" readonly disabled>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Old Password</label>
                                    <input type="password" class="form-control" placeholder="Old Password"
                                      name="password">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 col-sm-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>New Password</label>
                                    <input type="password" class="form-control" placeholder="New Password"
                                      id="account-new-password" name="new-password">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 col-sm-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Retype new Password</label>
                                    <input type="password" class="form-control" data-validation-match-match="password"
                                      placeholder="New Password" name="confirm-new-password">
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" name="action" value="update_admin_pwd_now">
                              <input type="hidden" name="admin_id" value="<?php echo $admin_data->adminId; ?>">
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1 __loadingBtn__">Save
                                  changes</button>

                              </div>
                            </div>
                          </form>
                        </div>
                        <div class="tab-pane fade " id="account-vertical-message" role="tabpanel" aria-expanded="false"
                          aria-labelledby="internal-mail-form">
                          <h4 class="text-center text-muted"><span class="bx bx-envelope"></span> REGISTER
                            PORTAL MESSAGE USER </h4>
                          <form id="internalMessagingForm" autocomplete="off">
                            <div class="col-md-12 text-center" id="server-response-text"></div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Registered Email Address</label>
                                    <input type="text" placeholder="e.g admin@smatech.org" class="form-control"
                                      name="user_reg_email">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label> Full Name</label>
                                    <input type="text" class="form-control" placeholder="e.g Smatech School Portal"
                                      name="username">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 col-sm-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>User Type</label>
                                    <select name="user_type" id="user_type" class="custom-select form-control">
                                      <option value="" selected>Choose...</option>
                                      <option value="student">Student</option>
                                      <option value="staff">Staff</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6 col-12 col-sm-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Authentication Code</label>
                                    <input type="password" class="form-control" placeholder="**********"
                                      name="auth_code">
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" name="action" value="register_smatech_messaging_user">
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-dark glow mr-sm-1 mb-1 __loadingBtnLoad">Submit
                                  New USer</button>
                              </div>
                            </div>
                          </form>
                        </div>

                        <div class="tab-pane fade" id="bank" role="tabpanel" aria-labelledby="staff-bank-info"
                          aria-expanded="false">
                          <form class="validate-form" id="staff-update-bank-info">

                            <h4 class="text-center text-muted"> Upload Staff Bank Info</h4>
                            <div class="col-md-12 text-center" id="myResponseText3"></div>
                            <div class="row">
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Bank Name:</label>
                                    <input type="text" class="form-control" placeholder="FCMB" name="bank_name">
                                  </div>
                                </div>
                              </div>
                              <div class="col-12">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Account Name</label>
                                    <input type="text" class="form-control" placeholder="Adesola Olornwa Segun"
                                      name="bank_account_name">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Account Number</label>
                                    <input type="number" class="form-control" placeholder="1090987432"
                                      name="bank_account_no">
                                  </div>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <div class="controls">
                                    <label>Type of Account</label>
                                    <select name="bank_account_type" id="" class="form-control custom-select">
                                      <option value="" selected>Choose...</option>
                                      <option value="saving">Saving</option>
                                      <option value="current">Current</option>
                                      <option value="deposit">Deposit</option>
                                    </select>
                                  </div>
                                </div>
                              </div>
                              <input type="hidden" name="action" value="update_staff_bank_info_now">
                              <input type="hidden" name="staff_id" value="<?php echo $_SESSION['STAFF_SES_ID'] ?>">
                              <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
                                <button type="submit" class="btn btn-primary glow mr-sm-1 mb-1 __loadingBtn3__">Save
                                  changes</button>
                                <button type="reset" class="btn btn-light mb-1">Cancel</button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <!-- account setting page ends -->

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
  <!-- END: Page JS-->
  <script src="smappjs/account-settings.js"></script>
  <!-- END: Page JS-->
</body>
<!-- END: Body-->

</html>