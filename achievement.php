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
    <title>Achievement :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
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
    <!-- start inner banner -->
    <section class="inner-banner">
        <h1 class="font-weight-bold text-center">Achievement</h1>
    </section>
    <!-- end inner banner -->
    <!-- start achievement -->
    <section class="achievement">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our Achievement</span>
                <h2>Happiness Of Great Achievement</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h3 class="font-weight-bold color-orange" data-aos="fade-up" data-aos-duration="1000">Winner at 2021 Cowbell Competition</h3>
                    <h6 class="font-weight-bold mb-3">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.”</h6>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                        web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought
                        to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen
                        book.</p>

                </div>
                <div class="col-lg-6 offset-lg-0 offset-xl-0 col-md-8 offset-md-2">
                    <div class="img-block">
                        <div class="border-line"></div>
                        <div class="cust_img">
                            <img class="img-fluid" data-aos="zoom-in" data-aos-duration="1000" src="assets/images/gallery_1.jpg" alt="Achievement">
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-5">
                <div class="col-lg-6 offset-lg-0 offset-xl-0 col-md-8 offset-md-2">
                    <div class="img-block left-block">
                        <div class="border-line"></div>
                        <div class="cust_img">
                            <img class="img-fluid" data-aos="zoom-in" data-aos-duration="1000" src="assets/images/gallery_2.jpg" alt="Achievement">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 mt-xl-5 mt-lg-5 mt-md-2 mt-sm-5 mt-5">
                    <h3 class="font-weight-bold color-orange" data-aos="fade-up" data-aos-duration="1000">Winner at 2021 National Quiz </h3>
                    <h6 class="font-weight-bold mb-3">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.”</h6>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                        web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought
                        to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen
                        book.</p>

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h3 class="font-weight-bold color-orange" data-aos="fade-up" data-aos-duration="1000">Winner at 2010 State Debate</h3>
                    <h6 class="font-weight-bold mb-3">“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod tempor incididunt ut labore et dolore magna aliqua.”</h6>
                    <p>Lorem ipsum, or lipsum as it is sometimes known, is dummy text used in laying out print, graphic or
                        web designs. The passage is attributed to an unknown typesetter in the 15th century who is thought
                        to have scrambled parts of Cicero's De Finibus Bonorum et Malorum for use in a type specimen
                        book.</p>

                </div>
                <div class="col-lg-6 col-md-8 offset-lg-0 offset-xl-0 offset-md-2">
                    <div class="img-block">
                        <div class="border-line"></div>
                        <div class="cust_img">
                            <img class="img-fluid" data-aos="zoom-in" data-aos-duration="1000" src="assets/images/gallery_3.jpg" alt="Achievement">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end achievement -->
    <!-- start footer -->
  <?php if (file_exists("Templates/Footer.php")) {
  include_once 'Templates/Footer.php';
  } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
</div>
<!-- ===============jQuery Frameworks============= -->
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
