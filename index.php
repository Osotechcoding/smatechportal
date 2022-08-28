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
    <title> Homepage :: <?php echo ($Osotech->getConfigData()->school_name);?></title>

    <?php if (!file_exists("Templates/HeaderScript.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/HeaderScript.php'; ?>
    <?php endif; ?>

</head>
<!--start preloader-->
<div class="preloader">
    <div class="spinner">
        <div class="double-bounce1"></div>
        <div class="double-bounce2"></div>
    </div>
</div>
<!--end preloader-->
<div class="page-wrapper" id="page-wrapper">
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
    <!-- start slider -->
      <?php include_once ("Templates/HomePageSlider.php");?>
    <!-- end slider -->
    <!-- start counter -->
    <section class="counter-section">
        <div class="container">
            <div class="counter-box">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/teacher.png" class="img-fluid" alt=teacher>
                            </div>
                            <h5 class="count-text mt-2">Teachers</h5>
                            <h2 class="timer count-title count-number" data-to="300" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/classroom.png" class="img-fluid" alt="classroom">
                            </div>
                            <h5 class="count-text mt-2">Classroom</h5>
                            <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/career.png" class="img-fluid" alt="career">
                            </div>
                            <h5 class="count-text mt-2">Student</h5>
                            <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/activity.png" class="img-fluid" alt="activity">
                            </div>
                            <h5 class="count-text mt-2">Graduated</h5>
                            <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end counter -->
    <!-- start about us -->
    <section class="about-us" data-aos="fade-up" data-aos-duration="950">
        <div class="container">
            <div class="about-box pb-3">
                <!-- <i class="fa fa-mortar-board"></i> -->
                <img src="<?php echo $Osotech->get_schoolLogoImage();?>" width="100" class="img-fluid" style="border-radius: 50%;">
            </div>
            <h5 data-aos="fade-up" data-aos-duration="1050">Chairman Message</h5>
            <h3 class="font-weight-bold pb-3 px-5 mb-0" data-aos="fade-up" data-aos-duration="1050">Education develop a passion for learning.If you do, you will never cease to grow.</h3>
            <p class="pt-3 bottom-line" style="line-height: 40px;font-size: 20px;"><?php echo ($Osotech->getConfigData()->school_history);?></p>
             

            <h5 class="pt-3"><?php echo ($Osotech->getConfigData()->school_director);?></h5>
            <p>Founrder & Chairman</p>
            <div class="button-box">
                <a href="./about" class="left-btn">More About Us</a>
                <a href="./contact" class="right-btn">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- end about us -->
    <!-- start target -->
    <section class="target">
        <div class="container">
            <div class="sec-title text-center bg-fill mb-3">
                <span class="title">Why Choose Us</span>
                <h2 class="text-white"> Behind Our Success</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="target-block text-white p-5 mb-lg-0 mb-xl-0 mb-md-0 mb-sm-5 mb-5" data-aos="fade-up"
                         data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-users fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Skilled Teachers</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit</p>
                     
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white  p-5 mb-lg-0 mb-xl-0 mb-md-0 mb-sm-5 mb-5" data-aos="fade-up"
                         data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-mortar-board fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Condusive Environment</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit</p>
                      
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white p-5" data-aos="fade-up" data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-book fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Book Library & Lab</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit</p>
                       
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end target -->
    <!-- start team -->
    <?php include_once("./Partials/theSchoolTeam.php");?>
    
    <!-- end team -->
    <!-- start principal welcome message -->
    <?php include_once("./Partials/PrincipalWelcome.php");?>
    
    <!-- end principal welcome message -->
    <!-- start search course -->
  <?php //include_once ("Partials/searchCourse.php"); ?>
    <!-- end search course -->
    <!-- start event listing -->
    <?php include_once ("Partials/EventListing.php"); ?>
    <!-- end event listing -->
    <!-- start video & FAQ -->
    <?php include_once ("Partials/HomePageFaqs.php"); ?>
    <!-- end video & FAQ -->
    <!-- start event gallery -->
    <?php include_once ("Partials/HomePageGallery.php"); ?>
    <!-- end event gallery -->
    <!-- start contact us -->
      <?php include_once ("Partials/studentReview.php") ?>
    <!-- end join us -->
    <!-- start blog -->
    <?php include_once ("Partials/LatestBlogs.php") ?>

    <!-- end blog -->
    <!-- start footer -->
    <?php if (file_exists("Templates/Footer.php")) {
    include_once 'Templates/Footer.php';
    } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
</div>
<!-- ===============jQuery Frameworks============= -->
<!-- footerscript here -->
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
