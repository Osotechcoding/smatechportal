<?php if (!file_exists("Helper.php")) {
  die("Access is Denied!");
} else {
  require 'Helper.php';
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- ========== Meta Tags ========== -->
  <?php include_once 'Templates/MetaTags.php'; ?>
  <!-- ========== Page Title ========== -->
  <title>Contact Us :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
  <?php if (!file_exists("Templates/HeaderScript.php")) : ?>
  <?php die("Access not Aallowed"); ?>
  <?php else : ?>
  <?php include_once 'Templates/HeaderScript.php'; ?>
  <?php endif; ?>
</head>

<body>

  <!--start preloader-->
  <div class="preloader">
    <div class="spinner">
      <div class="double-bounce1"></div>
      <div class="double-bounce2"></div>
    </div>
  </div>
  <!--end preloader-->
  <div class="page-wrapper">
    <!-- start top header -->
    <header class="top-header py-2">
      <?php include_once("Templates/TopNavBar.php"); ?>
    </header>
    <!-- end top header -->
    <!-- start main header -->
    <?php if (!file_exists("Templates/NavBar.php")) : ?>
    <?php die("Access not Aallowed"); ?>
    <?php else : ?>
    <?php include_once 'Templates/NavBar.php'; ?>
    <?php endif; ?>

    <!-- end main header -->
    <!-- start side menu -->
    <?php if (file_exists("Templates/SideBar.php")) :
      include_once 'Templates/SideBar.php'; ?>
    <?php endif; ?>
    <!-- end side menu -->
    <!-- start inner-banner -->
    <section class="inner-banner">
      <h1 class="font-weight-bold text-center">Contact Us</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start contact -->
    <section class="contact-section">
      <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
          <span class="title">Get In Touch</span>
          <h2>We’d Love To Here From You @ <?php echo ($Osotech->getConfigData()->school_name); ?></h2>
          <div class="divider">
            <span class="fa fa-mortar-board"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-8 col-md-8">
            <div class="contact-form p-5" data-aos="zoom-in" data-aos-duration="1000">
              <div class="border-line"></div>
              <h3 class="font-weight-bold color-orange">Drop Message</h3>
              <form id="feedBAckMesageForm">
                <h5 id="server-response" class="text-center"></h5>
                <div class="form-group">
                  <label for="exampleInputName">Name</label>
                  <input autocomplete="off" class="form-control form-control-lg" name="feedback_name"
                    placeholder="Enter Name" type="text">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email Address</label>
                  <input autocomplete="off" class="form-control form-control-lg" placeholder="Enter Email" type="text"
                    name="feedback_email">
                  <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
                    else.
                  </small>
                </div>
                <div class="form-group">
                  <label for="exampleInputNumber">Phone Number</label>
                  <input autocomplete="off" class="form-control form-control-lg" id="exampleInputNumber"
                    placeholder="Optional" type="number" name="feedback_phone">
                </div>
                <div class="form-group">
                  <label for="exampleInputMessage">Message</label>
                  <textarea class="form-control" name="feedback_message" placeholder="Write your Message here..."
                    rows="5"></textarea>
                </div>

                <input type="hidden" name="action" value="send_feed_back_msg">
                <button class="btn btn-dark btn-lg border-0 mt-2 __loadingBtn__" type="submit"
                  style="border-radius: 10px;"> Send</button>
              </form>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 ml-minus">
            <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
              <div class="media-body text-left">
                <h6 class="color-orange font-weight-bold mb-1">Address</h6>
                <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_address); ?>,
                  <?php echo ($Osotech->getConfigData()->school_city); ?>,
                  <?php echo ($Osotech->getConfigData()->school_state); ?>,
                  <?php echo ($Osotech->getConfigData()->country); ?></p>
              </div>
              <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050"
                src="assets/images/icons/location.png" alt="Location">
            </div>
            <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
              <div class="media-body text-left">
                <h6 class="color-orange font-weight-bold mb-1">Email</h6>
                <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_email); ?> ,
                  <?php echo ($Osotech->getConfigData()->school_gmail); ?></p>
              </div>
              <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1500"
                src="assets/images/icons/mail.png" alt="Mail">
            </div>
            <div class="media p-3 align-items-center theme-blue" data-aos="zoom-in" data-aos-duration="1000">
              <div class="media-body text-left">
                <h6 class="color-orange font-weight-bold mb-1">Contact Number</h6>
                <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_phone); ?>,
                  <?php echo ($Osotech->getConfigData()->school_fax); ?></p>
              </div>
              <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050"
                src="assets/images/icons/call.png" alt="Call">
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end contact -->

    <!-- start map -->
    <section class="map">
      <iframe src="" class="w-100 border-0" height="450" allowfullscreen="">
        <div class="col-lg-6" style="min-height: 400px;">
          <div class="position-relative h-100">
            <div class="mapouter">
              <div class="gmap_canvas"><iframe width="958" height="665" id="gmap_canvas"
                  src="https://maps.google.com/maps?q=7%20Awolowo%20way%20Ikeja%20Lagos%20Nigeria&t=&z=19&ie=UTF8&iwloc=&output=embed"
                  frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a
                  href="https://123movies-to.org"></a><br>
                <style>
                .mapouter {
                  position: relative;
                  text-align: right;
                  height: 665px;
                  width: 958px;
                }
                </style><a href="https://www.embedgooglemap.net"></a>
                <style>
                .gmap_canvas {
                  overflow: hidden;
                  background: none !important;
                  height: 665px;
                  width: 958px;
                }
                </style>
              </div>
            </div>
          </div>
        </div>
      </iframe>
    </section>
    <!-- end map -->
    <!-- start footer -->
    <?php if (file_exists("Templates/Footer.php")) {
      include_once 'Templates/Footer.php';
    } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
  </div>
  <!-- ===============jQuery Frameworks============= -->
  <?php if (!file_exists("Templates/FooterScript.php")) : ?>
  <?php die("Access not Allowed"); ?>
  <?php else : ?>
  <?php include_once 'Templates/FooterScript.php'; ?>
  <?php endif; ?>
  <script src="osotech_script/feedback.js"></script>

</body>

</html>