<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> || Sample Title</title>
   <!-- include template/HeaderLink.php -->
   <?php include "template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
              <h5 class="content-header-title float-left pr-1 mb-0">Form Layouts</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="index-2.html"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Forms</a>
                  </li>
                  <li class="breadcrumb-item active"><a href="#">Form Layouts</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><!-- Basic Horizontal form layout section start -->
<section id="basic-horizontal-layouts">
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Horizontal Form</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>First Name</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" id="first-name" class="form-control" name="fname" placeholder="First Name">
                </div>
                <div class="col-md-4">
                  <label>Email</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Email">
                </div>
                <div class="col-md-4">
                  <label>Mobile</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="number" id="contact-info" class="form-control" name="contact" placeholder="Mobile">
                </div>
                <div class="col-md-4">
                  <label>Password</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="password" id="password" class="form-control" name="password" placeholder="Password">
                </div>
                <div class="col-12 col-md-8 offset-md-4 form-group">
                  <fieldset>
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox__input" id="checkbox1" checked>
                      <label for="checkbox1">Remember me</label>
                    </div>
                  </fieldset>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Horizontal Form with Icons</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <label>First Name</label>
                </div>
                <div class="col-md-8 form-group ">
                  <div class="position-relative has-icon-left">
                    <input type="text" id="fname-icon" class="form-control" name="fname-icon"
                      placeholder="First Name">
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Email</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="email" id="email-icon" class="form-control" name="email-id-icon" placeholder="Email">
                    <div class="form-control-position">
                      <i class="bx bx-mail-send"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Mobile</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="number" id="contact-icon" class="form-control" name="contact-icon"
                      placeholder="Mobile">
                    <div class="form-control-position">
                      <i class="bx bx-mobile"></i>
                    </div>
                  </div>
                </div>
                <div class="col-md-4">
                  <label>Password</label>
                </div>
                <div class="col-md-8 form-group">
                  <div class="position-relative has-icon-left">
                    <input type="password" id="pass-icon" class="form-control" name="contact-icon"
                      placeholder="Password">
                    <div class="form-control-position">
                      <i class="bx bx-lock"></i>
                    </div>
                  </div>
                </div>
                <div class="form-group col-md-8 offset-md-4">
                  <fieldset>
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox2">
                      <label for="checkbox2">Remember me</label>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 d-flex justify-content-end ">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Horizontal form layout section end -->

<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vertical Form</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-vertical">First Name</label>
                    <input type="text" id="first-name-vertical" class="form-control" name="fname"
                      placeholder="First Name">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="email-id-vertical">Email</label>
                    <input type="email" id="email-id-vertical" class="form-control" name="email-id"
                      placeholder="Email">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-vertical">Mobile</label>
                    <input type="number" id="contact-info-vertical" class="form-control" name="contact"
                      placeholder="Mobile">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="password-vertical">Password</label>
                    <input type="password" id="password-vertical" class="form-control" name="contact"
                      placeholder="Password">
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox3">
                      <label for="checkbox3">Remember me</label>
                    </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Vertical Form with Icons</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-icon">First Name</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="first-name-icon" class="form-control" name="fname-icon"
                        placeholder="First Name">
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="email-id-icon">Email</label>
                    <div class="position-relative has-icon-left">
                      <input type="email" id="email-id-icon" class="form-control" name="email-id-icon"
                        placeholder="Email">
                      <div class="form-control-position">
                        <i class="bx bx-mail-send"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-icon">Mobile</label>
                    <div class="position-relative has-icon-left">
                      <input type="number" id="contact-info-icon" class="form-control" name="contact-icon"
                        placeholder="Mobile">
                      <div class="form-control-position">
                        <i class="bx bx-mobile"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="password-icon">Password</label>
                    <div class="position-relative has-icon-left">
                      <input type="password" id="password-icon" class="form-control" name="contact-icon"
                        placeholder="Password">
                      <div class="form-control-position">
                        <i class="bx bx-lock"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox4">
                      <label for="checkbox4">Remember me</label>
                    </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
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

<!-- Basic Floating Label Form section start -->
<section id="floating-label-layouts">
  <div class="row match-height">
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form With Floating Labels</h4>
        </div>
        <div class="card-body">
          <form class="form">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-label-group">
                    <input type="text" id="first-name-floating" class="form-control" placeholder="First Name"
                      name="fname-floating">
                    <label for="first-name-floating">First Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group">
                    <input type="email" id="email-id-floating" class="form-control" name="email-id-floating"
                      placeholder="Email">
                    <label for="email-id-floating">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group">
                    <input type="number" id="contact-info-floating" class="form-control" name="contact-floating"
                      placeholder="Mobile">
                    <label for="contact-info-floating">Mobile</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group">
                    <input type="password" id="password-floating" class="form-control" name="contact-floating"
                      placeholder="Password">
                    <label for="password-floating">Password</label>
                  </div>
                </div>
                <div class="form-group col-12">
                  <fieldset>
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox5">
                      <label for="checkbox5">Remember me</label>
                    </div>
                  </fieldset>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Form With Floating Labels with Icons</h4>
        </div>
        <div class="card-body">
          <form class="form">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-label-group position-relative has-icon-left">
                    <input type="text" id="first-name-floating-icon" class="form-control" name="fname-floating-icon"
                      placeholder="First Name">
                    <div class="form-control-position">
                      <i class="bx bx-user"></i>
                    </div>
                    <label for="first-name-floating-icon">First Name</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group position-relative has-icon-left">
                    <input type="email" id="email-id-floating-icon" class="form-control" name="email-id-floating-icon"
                      placeholder="Email">
                    <div class="form-control-position">
                      <i class="bx bx-mail-send"></i>
                    </div>
                    <label for="email-id-floating-icon">Email</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group position-relative has-icon-left">
                    <input type="number" id="contact-floating-icon" class="form-control" name="contact-floating-icon"
                      placeholder="Mobile">
                    <div class="form-control-position">
                      <i class="bx bx-mobile"></i>
                    </div>
                    <label for="contact-floating-icon">Mobile</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-label-group position-relative has-icon-left">
                    <input type="password" id="password-floating-icon" class="form-control"
                      name="password-floating-icon" placeholder="Password">
                    <div class="form-control-position">
                      <i class="bx bx-lock"></i>
                    </div>
                    <label for="password-floating-icon">Password</label>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox6">
                      <label for="checkbox6">Remember me</label>
                    </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Basic Floating Label Form section end -->

<!-- Basic multiple Column Form section start -->
<section id="multiple-column-form">
  <div class="row match-height">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="card-title">Multiple Column</h4>
        </div>
        <div class="card-body">
          <form class="form">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="first-name-column" class="form-control" placeholder="First Name"
                      name="fname-column">
                    <label for="first-name-column">First Name</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="last-name-column" class="form-control" placeholder="Last Name"
                      name="lname-column">
                    <label for="last-name-column">Last Name</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="city-column" class="form-control" placeholder="City" name="city-column">
                    <label for="city-column">City</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="country-floating" class="form-control" name="country-floating"
                      placeholder="Country">
                    <label for="country-floating">Country</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="text" id="company-column" class="form-control" name="company-column"
                      placeholder="Company">
                    <label for="company-column">Company</label>
                  </div>
                </div>
                <div class="col-md-6 col-12">
                  <div class="form-label-group">
                    <input type="email" id="email-id-column" class="form-control" name="email-id-column"
                      placeholder="Email">
                    <label for="email-id-column">Email</label>
                  </div>
                </div>
                
                <div class="col-md-6 col-12">
                     <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickadate" placeholder="Select Date">
                <div class="form-control-position">
                  <i class='bx bx-calendar'></i>
                </div>
              </fieldset>
                        <div class="col-md-6 mb-1">
                    <h6>Default</h6>
            <p>Use <code>.pickatime</code> class for basic Pick-a-Time Picker.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
                </div>
                <div class="col-md-6 mb-1">
            <h6>Change Formats</h6>
            <p>Use <code>.pickatime-format</code> class to change time display formats.</p>
            <fieldset class="form-group position-relative has-icon-left">
                <input type="text" class="form-control pickatime-format" placeholder="Select Time">
                <div class="form-control-position">
                    <i class='bx bx-history'></i>
                </div>
            </fieldset>
                </div>
                     <!-- daterange -->
  <div class="mb-3">
              <h6>Predefined Ranges</h6>
              <p>Set predefined date ranges the user can select from.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control dateranges" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>
            <div class="mb-3">
              <h6>Date Limit</h6>
              <p>The maximum span between the selected start and end dates.</p>
              <fieldset class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control dateLimit" placeholder="Select Date">
                  <div class="form-control-position">
                      <i class='bx bx-calendar-check'></i>
                  </div>
              </fieldset>
            </div>

          </div>
  <!-- daterange end -->
                </div>
                <!--   -->
                   <div class="col-12">
                  <div class="form-group">
                   <div class="checkbox checkbox-success checkbox-icon">
                      <input type="checkbox" class="checkbox-input" id="checkboxIcon3">
                      <label for="checkboxIcon3"><i class="bx bx-check"></i>Success</label>
                  </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <div class="checkbox">
                      <input type="checkbox" class="checkbox-input" id="checkbox7">
                      <label for="checkbox7">Remember me</label>
                    </div>
                  </div>
                </div>
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

</section>
<!-- Basic multiple Column Form section end -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
   <?php include ("template/Customizer.php");?>
    <!-- End: Customizer-->
    <!-- Buynow Button-->
    <!-- <div class="buy-now"><a href="https://businessapp.com.ng" target="_blank" class="btn btn-danger">Buy Now</a> -->

    </div>
    <!-- demo chat-->
    <?php include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>