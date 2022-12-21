        <?php
        require_once "helpers/helper.php";
        ?>
        <!DOCTYPE html>

        <html class="loading" lang="en" data-textdirection="ltr">
        <!-- BEGIN: Head-->

        <head>
          <?php include "../template/MetaTag.php"; ?>
          <title><?php echo $SmappDetails->school_name ?> :: School Profile Settings</title>
          <!-- include template/HeaderLink.php -->
          <?php include "../template/HeaderLink.php"; ?>
          <!-- END: Head-->
          <!-- BEGIN: Body-->

        <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
          data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
          <!-- BEGIN: Header-->
          <?php include "template/HeaderNav.php"; ?>
          <!-- BEGIN: Main Menu-->
          <?php include "template/Sidebar.php"; ?>
          <!-- include Sidebar.php -->
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
                        <li class="breadcrumb-item active">School Profile Settings
                        </li>
                      </ol>
                    </div>
                  </div>
                </div>
              </div>
              <div class="content-body">
                <div class="row">
                  <div class="col-12">
                    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-edit fa-1x"></span> SCHOOL STAMP &
                      SIGNATURE MODULE </h3>
                  </div>
                </div>
                <!-- content goes here -->
                <!-- account setting page start -->
                <section id="page-account-settings">
                  <div class="row">
                    <div class="col-12">
                      <div class="row">
                        <!-- left menu section -->

                        <!-- right content section -->
                        <div class="col-md-12">
                          <div class="card">
                            <div class="card-body">

                              <!-- Logo Form -->

                              <form class="validate-form" id="upload-school-logo-form">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="logoName">School Stamp <span class="text-danger">(png format
                                          Only)</span></label>
                                      <input type="file" class="form-control form-control-lg" name="logoName"
                                        onchange="previewFileStamp(this);">
                                    </div>
                                    <div class="col-md-6 offset-2" id="uploaded_logo">
                                      <img id="previewStamp" width="200"
                                        src="<?php echo $Configuration->getSchoolStamp(); ?>" alt="Placeholder"
                                        style="border: 2px solid darkblue;border-radius:10px;">
                                      <p>Image Size: <span id="ImageSize"></span></p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <label for="sign">upload Signature <span class="text-danger">(png format
                                          Only)</span></label>
                                      <input type="file" class="form-control form-control-lg" name="sign" id="sign"
                                        onchange="previewFileSignature(this);">
                                    </div>
                                    <div class="col-md-6 offset-2" id="uploaded_logo">
                                      <img id="previewSignature" width="200"
                                        src="<?php echo $Configuration->getSchoolSignature(); ?>" alt="Placeholder"
                                        style="border: 2px solid darkblue;border-radius:10px;">
                                      <p>File Size: <span id="SignatureSize"></span></p>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                      <div class="controls">
                                        <input type="hidden" name="action" value="uploadschLogo">
                                        <label>Authentication Code</label>
                                        <input autocomplete="off" type="password" class="form-control"
                                          placeholder="*********" name="m_auth">
                                      </div>
                                    </div>
                                  </div>

                                  <div class="col-md-6">
                                    <label></label>
                                    <div class="form-group">
                                      <div class="controls">
                                        <button type="submit"
                                          class="btn btn-dark btn-lg glow mb-1 __loadingBtn10__">Upload Stamp
                                        </button>
                                      </div>
                                    </div>
                                  </div>

                                </div>
                              </form>

                              <!-- Logo Form -->

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
          <!-- demo chat-->

          <?php include "../template/footer.php"; ?>
          <!-- END: Footer-->

          <!-- BEGIN: Vendor JS-->
          <?php include "../template/FooterScript.php"; ?>
          <!-- BEGIN: Page JS-->
          <script src="smappjs/upload-stamp.js"></script>
          <!-- END: Page JS-->

          <!-- END: Page JS-->
        </body>
        <!-- END: Body-->

        </html>