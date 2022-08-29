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
    <title>Career :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
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
        <h1 class="font-weight-bold text-center">Career</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start contact -->
    <section class="contact-section">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">View our job listing around the world</span>
                <h2>Find a Career Opportunity</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="career-form p-5" data-aos="fade-up" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <h3 class="font-weight-bold color-orange">Drop Message</h3>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputName">Name</label>
                                    <input class="form-control" id="exampleInputName" placeholder="Enter Name" type="text">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleInputEmail1">Email Address</label>
                                    <input class="form-control" id="exampleInputEmail1" placeholder="Enter Email"
                                           type="email">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="exampleInputNumber">Phone Number</label>
                                    <input class="form-control" id="exampleInputNumber"
                                           placeholder="Enter Number" type="email">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputState">Job Type</label>
                                    <select class="form-control" id="inputState">
                                        <option value="" selected>Choose...</option>
                                        <option value="Teaching">Teaching</option>
                                        <option value="Non Teaching">Non Teaching</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="exampleInputMessage">Message</label>
                                <textarea class="form-control" rows="4" id="exampleInputMessage" placeholder="Message"></textarea>
                            </div>

                            <div class="form-group">
                                <label>
                                    <span class="mb-0 resume">Drop Your Resume</span>
                                    <input class="form-control-file pl-0 d-none border-0" id="resume" name="resume" type="file">
                                </label>
                            </div>
                            <button class="btn theme-orange border-0" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->
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
