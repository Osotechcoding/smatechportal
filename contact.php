<?php if (!file_exists("Helper.php")) {
  die("Access is Denied!");
} else {
  require 'Helper.php';
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- ========== Meta Tags ========== -->
    <?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title>Contact Us :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
    <?php if (!file_exists("Templates/HeaderScript.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
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
        <?php include_once ("Templates/TopNavBar.php"); ?>
    </header>
    <!-- end top header -->
    <!-- start main header -->
    <?php if (!file_exists("Templates/NavBar.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/NavBar.php'; ?>
    <?php endif; ?>

    <!-- end main header -->
    <!-- start side menu -->
  <?php if (file_exists("Templates/SideBar.php")):
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
                <h2>We’d Love To Here From You @ <?php echo ($Osotech->getConfigData()->school_name);?></h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="contact-form p-5" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <h3 class="font-weight-bold color-orange">Drop Message</h3>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input class="form-control" id="exampleInputName" placeholder="Enter Name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Email" type="email">
                                <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
                                    else.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber">Phone Number</label>
                                <input  class="form-control" id="exampleInputNumber"
                                        placeholder="Enter Number" type="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMessage">Message</label>
                                <input class="form-control" id="exampleInputMessage"
                                       placeholder="Message" type="email">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="exampleCheck1" type="checkbox">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button class="btn theme-orange border-0 mt-4" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 ml-minus">
                    <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Address</h6>
                            <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_address);?>,
                              <?php echo ($Osotech->getConfigData()->school_city);?>, <?php echo ($Osotech->getConfigData()->school_state);?>, <?php echo ($Osotech->getConfigData()->country);?></p>
                        </div>
                        <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050"
                             src="assets/images/icons/location.png" alt="Location">
                    </div>
                    <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Email</h6>
                            <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_email);?> , <?php echo ($Osotech->getConfigData()->school_gmail);?></p>
                        </div>
                        <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1500"
                             src="assets/images/icons/mail.png" alt="Mail">
                    </div>
                    <div class="media p-3 align-items-center theme-blue" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Contact Number</h6>
                            <p class="mb-0"><?php echo ($Osotech->getConfigData()->school_phone);?>, <?php echo ($Osotech->getConfigData()->school_fax);?></p>
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
        <iframe src="" class="w-100 border-0" height="450"   allowfullscreen=""></iframe>
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
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
