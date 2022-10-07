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
  <title> Homepage :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>

  <?php if (!file_exists("Templates/HeaderScript.php")) : ?>
  <?php die("Access not Aallowed"); ?>
  <?php else : ?>
  <?php include_once 'Templates/HeaderScript.php'; ?>
  <?php endif; ?>
  <style>
  .swiper-container {
    width: 100%;
    height: 100vh;
    display: flex;
    background: #222;
    align-items: center;
    justify-content: center;
  }

  .swiper {
    width: 100%;
    height: fit-content;
  }

  .swiper-slide img {
    width: 100%;
  }

  .swiper .swiper-button-prev,
  .swiper .swiper-button-next {
    color: orangered;
  }

  .swiper .swiper-pagination-bullet-active {
    background: orangered;
  }

  .swiper h1 {
    color: orangered;
    font-weight: bold;
    font-size: 40px;
    text-shadow: 5px 8px 4px solid black;
  }

  .swiper h6 {
    color: #fff;
    font-weight: bold;
    font-size: 40px;
    text-shadow: 5px 8px 4px solid black;
  }
  </style>
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
  <!-- start slider -->
  <?php include_once("Templates/HomeSwiperSlider.php"); ?>
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
              <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalStaff(); ?>"
                data-speed="1500"></h2>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="counter mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-3" data-aos="fade-up" data-aos-duration="550">
              <div class="border-line"></div>
              <div class="counter-img">
                <img src="assets/images/icons/classroom.png" class="img-fluid" alt="classroom">
              </div>
              <h5 class="count-text mt-2">Classroom</h5>
              <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalClassroom(); ?>"
                data-speed="1500"></h2>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
              <div class="border-line"></div>
              <div class="counter-img">
                <img src="assets/images/icons/career.png" class="img-fluid" alt="career">
              </div>
              <h5 class="count-text mt-2">Student</h5>
              <h2 class="timer count-title count-number"
                data-to="<?php echo number_format($Osotech->getTotalStudent()); ?>" data-speed="1500"></h2>
            </div>
          </div>
          <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
              <div class="border-line"></div>
              <div class="counter-img">
                <img src="assets/images/icons/activity.png" class="img-fluid" alt="activity">
              </div>
              <h5 class="count-text mt-2">Subjects</h5>
              <h2 class="timer count-title count-number" data-to="<?php echo $Osotech->getTotalSubjects(); ?>"
                data-speed="1500"></h2>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- end counter -->

  <!-- start Chairman welcome message -->
  <?php //include_once("./Partials/ChairmanMessage.php"); 
  ?>
  <!-- Ends Chairman welcome message -->
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
            <p></p>

          </div>
        </div>

        <div class="col-md-4">
          <div class="target-block text-white  p-5 mb-lg-0 mb-xl-0 mb-md-0 mb-sm-5 mb-5" data-aos="fade-up"
            data-aos-duration="550">
            <div class="border-line"></div>
            <i class="fa fa-mortar-board fa-3x color-orange mb-3 target-icon"></i>
            <h4 class="font-weight-bold">Condusive Environment</h4>
            <p></p>

          </div>
        </div>

        <div class="col-md-4">
          <div class="target-block text-white p-5" data-aos="fade-up" data-aos-duration="550">
            <div class="border-line"></div>
            <i class="fa fa-book fa-3x color-orange mb-3 target-icon"></i>
            <h4 class="font-weight-bold">Book Library & Lab</h4>
            <p></p>

          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- end target -->
  <!-- start team -->
  <?php //include_once("./Partials/theSchoolTeam.php");
  ?>


  <!-- end team -->
  <!-- start principal welcome message -->
  <?php include_once("./Partials/PrincipalWelcome.php"); ?>

  <!-- end principal welcome message -->
  <!-- start search course -->
  <?php //include_once ("Partials/searchCourse.php"); 
  ?>
  <!-- end search course -->
  <!-- start event listing -->
  <?php include_once("Partials/EventListing.php"); ?>
  <!-- end event listing -->
  <!-- start video & FAQ -->
  <?php include_once("Partials/HomePageFaqs.php"); ?>
  <!-- end video & FAQ -->
  <!-- start event gallery -->
  <?php include_once("Partials/HomePageGallery.php"); ?>
  <!-- end event gallery -->
  <!-- start contact us -->
  <?php //include_once("Partials/studentReview.php") 
  ?>
  <!-- end join us -->
  <!-- start blog -->
  <?php include_once("Partials/LatestBlogs.php") ?>

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
<?php if (!file_exists("Templates/FooterScript.php")) : ?>
<?php die("Access not Aallowed"); ?>
<?php else : ?>
<?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
<script>
const swiper = new Swiper('.swiper', {
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  loop: true,

  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },

  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },

});
</script>
<script src="//code.tidio.co/n25pgpm02fjjlgyk3fejjkonumz2qzra.js" async></script>
</body>

</html>