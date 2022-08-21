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
    <title>Students :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
    <!-- ========== Favicon Icon ========== -->

    <!-- ========== Start Stylesheet ========== -->
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
        <h1 class="font-weight-bold text-center">Student</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start student -->
    <section class="student">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Student</span>
                <h2>Student List Here</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-12">
                    <div class="search-student border px-4 py-3">
                        <h4 class="font-weight-bold color-orange">Search Student</h4>
                        <form>
                            <div class="form-group">
                                <label for="exampleClass">Class</label>
                                <select id="exampleClass" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Class One</option>
                                    <option>Class Two</option>
                                    <option>Class Three</option>
                                </select>
                            </div>
                            <button type="submit" class="btn theme-orange border-0 mt-2">Search Now</button>
                        </form>
                    </div>
                </div>

                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/male.png" class="img-fluid d-block m-auto osotech-img" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h5 class="font-weight-bold color-orange">Osotech Software Inc.</h5>
                                        <h6><b>REG NO:</b> 2021C124310002</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>POSITION HELD:</b>Head Boy</h6>
                                        <h6><b>D.O.B:</b><?php echo date("M j, Y", strtotime('-3300day')) ?>.</h6>
                                        <h6><b>2020/2021:</b> Set.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/male.png" class="img-fluid d-block m-auto osotech-img" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h5 class="font-weight-bold color-orange">Osotech Software Inc.</h5>
                                        <h6><b>REG NO:</b> 2021C124310002</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>POSITION HELD:</b>Head Boy</h6>
                                        <h6><b>D.O.B:</b><?php echo date("M j, Y", strtotime('-3300day')) ?>.</h6>
                                        <h6><b>2020/2021:</b> Set.</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end student -->
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
