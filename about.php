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
  <title>About Us :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
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
    <!-- start inner banner -->
    <section class="inner-banner">
      <h1 class="font-weight-bold text-center">About <?php echo ($Osotech->getConfigData()->school_name); ?></h1>
    </section>
    <!-- end inner banner -->
    <!-- start about us -->
    <section class="aboutus">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-12">
            <h1 class="color-orange font-weight-bold about-title" data-aos="fade-up" data-aos-duration="1000">11+</h1>

            <h5 class="font-weight-bold text-uppercase mb-3" data-aos="fade-up" data-aos-duration="1000">YEARS OF OUR
              EXISTENCE</h5>
            <?php echo nl2br($Osotech->getConfigData()->about_us); ?>

          </div>
          <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0">
            <div class="about-img">
              <div class="img_1" data-aos="zoom-in" data-aos-duration="550">
                <div class="border-line"></div>
                <img src="assets/images/computer-labs.jpg" class="img-fluid" alt="About">
              </div>
              <div class="img_2 d-flex" data-aos="zoom-in" data-aos-duration="1000">
                <h5 class="mb-0 text-white">Our Story</h5>
                <!-- https://www.youtube.com/watch?v=_sI_Ps7JSEk -->
                <a href="#" data-fancybox="gallery" class="video-btn text-white">
                  <i class="fa fa-play-circle fa-3x"></i>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end about us -->
    <!-- start target -->
    <section class="target">
      <div class="container">
        <div class="sec-title text-center bg-fill" data-aos="fade-up" data-aos-duration="1000">
          <span class="title">Why Choose Us</span>
          <h2 class="text-white">Ethics Behind Our Success</h2>
          <div class="divider">
            <span class="fa fa-mortar-board"></span>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="target-block text-white p-lg-5 p-md-3 p-sm-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0 mb-sm-5 mb-4"
              data-aos="flip-up" data-aos-duration="1000">
              <div class="border-line"></div>
              <i class="fa fa-bus fa-3x color-orange mb-3"></i>
              <h4 class="font-weight-bold">Mission</h4>
              <p><?php echo nl2br($Osotech->getConfigData()->our_mission); ?></p>

            </div>
          </div>

          <div class="col-md-4">
            <div class="target-block text-white  p-lg-5 p-md-3 p-sm-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0 mb-sm-5 mb-4"
              data-aos="flip-up" data-aos-duration="1000">
              <div class="border-line"></div>
              <i class="fa fa-eye fa-3x color-orange mb-3"></i>
              <h4 class="font-weight-bold">Vision</h4>
              <p><?php echo nl2br($Osotech->getConfigData()->our_vision); ?></p>

            </div>
          </div>

          <div class="col-md-4">
            <div class="target-block text-white  p-lg-5 p-md-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0" data-aos="flip-up"
              data-aos-duration="1000">
              <div class="border-line"></div>
              <i class="fa fa-check-circle fa-3x color-orange mb-3"></i>
              <h4 class="font-weight-bold">Core Value</h4>
              <p><?php echo nl2br($Osotech->getConfigData()->our_core_value); ?></p>

            </div>
          </div>

        </div>
      </div>
    </section>
    <!-- end target -->
    <!-- start counter -->
    <section class="counter-section abt-counter">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <div class="sec-title" data-aos="fade-up" data-aos-duration="1000">
              <span class="title">CHAIRMAN DESK</span>
              <h2>You are Welcome to <?php echo ($Osotech->getConfigData()->school_name); ?></h2>
              <div class="divider">
                <span class="fa fa-mortar-board"></span>
              </div>
            </div>
            <p class="p-17"><?php echo nl2br($Osotech->getConfigData()->school_history); ?></p>
            <button type="button" class="btn theme-orange theme-btn mt-3 join-us">Join Us</button>
          </div>
          <div class="col-lg-6">
            <div class="counter-box">
              <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 mb-md-5">
                  <div class="counter aos-init aos-animate mb-5" data-aos="fade-up" data-aos-duration="550">
                    <div class="border-line"></div>
                    <div class="counter-img">
                      <img src="assets/images/icons/teacher.png" class="img-fluid" alt="Teacher">
                    </div>
                    <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalStaff(); ?>"
                      data-speed="2500"><?php echo $Osotech->getTotalStaff(); ?></h2>
                    <h5 class="count-text mt-2">Seasoned Teachers</h5>
                  </div>

                  <div class="counter aos-init aos-animate" data-aos="fade-up" data-aos-duration="550">
                    <div class="border-line"></div>
                    <div class="counter-img">
                      <img src="assets/images/icons/classroom.png" class="img-fluid" alt="Classroom">
                    </div>
                    <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalClassroom(); ?>"
                      data-speed="2500"><?php echo $Osotech->getTotalClassroom(); ?></h2>
                    <h5 class="count-text mt-2">Classroom</h5>
                  </div>
                </div>

                <div class="col-lg-6 col-md-6 col-sm-6 mt-lg-5 mt-lg-5 mt-md-5">
                  <div class="counter aos-init aos-animate" data-aos="fade-up" data-aos-duration="550">
                    <div class="border-line"></div>
                    <div class="counter-img">
                      <img src="assets/images/icons/career.png" class="img-fluid" alt="Career">
                    </div>
                    <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalStudent(); ?>"
                      data-speed="2500"><?php echo $Osotech->getTotalStudent(); ?></h2>
                    <h5 class="count-text mt-2">Students</h5>
                  </div>
                  <div class="counter margin-bottom aos-init aos-animate margin-bottom" data-aos="fade-up"
                    data-aos-duration="550">
                    <div class="border-line"></div>
                    <div class="counter-img">
                      <img src="assets/images/icons/activity.png" class="img-fluid" alt="Activities">
                    </div>
                    <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalSubjects(); ?>"
                      data-speed="2500"><?php echo $Osotech->getTotalSubjects(); ?></h2>
                    <h5 class="count-text mt-2">Subjects</h5>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- end counter -->
    <!-- start timeline -->
    <?php //include_once ("Partials/schoolHistory.php") 
    ?>

    <!-- end timeline -->
    <!-- start events -->
    <?php if (file_exists("Partials/Testimonials.php")) {
      include_once 'Partials/Testimonials.php';
    } ?>

    <!-- end events -->
    <!-- start footer -->
    <?php if (file_exists("Templates/Footer.php")) {
      include_once 'Templates/Footer.php';
    } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
  </div>
  <!-- ===============jQuery Frameworks============= -->
  <?php if (!file_exists("Templates/FooterScript.php")) : ?>
  <?php die("Access not Aallowed"); ?>
  <?php else : ?>
  <?php include_once 'Templates/FooterScript.php'; ?>
  <?php endif; ?>
</body>


</html>