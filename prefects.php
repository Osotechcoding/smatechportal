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
    <title>The School Prefects :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
    <!-- ========== Favicon Icon ========== -->
    <?php if (file_exists("Templates/HeaderScript.php")): ?>
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
        <h1 class="font-weight-bold text-center">The School Prefects</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start faculties -->
    <section class="faculties">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our Gallery</span>
                <h2>Our Dedicated Student Prefects</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Boy</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Girl</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Boy</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mb-lg-0 lm-xl-0 mb-md-5  mb-sm-5 mb-5 ">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Boy</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6  mb-lg-0 lm-xl-0 mb-md-0  mb-sm-5 mb-5">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Boy</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <img src="assets/images/male.png" class="img-fluid d-block m-auto" alt="Team">
                        </div>
                        <div class="faculties-info theme-blue py-2 mt-3" data-aos="zoom-in" data-aos-duration="550" style="border-radius:10px;">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold">Idowu ademola Samuel</h5>
                                <h6>Social Prefect Boy</h6>
                                <h6>2021-2022</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end faculties -->
    <!-- start footer -->
  <?php if (file_exists("Templates/Footer.php")) {
  include_once 'Templates/Footer.php';
  } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
</div>
<!-- ===============jQuery Frameworks============= -->
<?php if (file_exists("Templates/FooterScript.php")): ?>
  <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
