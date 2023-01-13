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
  <title>Career :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
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
      <h1 class="font-weight-bold text-center">Career</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start contact -->
    <section class="contact-section">
      <div class="container">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">

          <h2>Find a Career Opportunity</h2>
          <h5><b><?php echo ($Osotech->getConfigData()->school_name); ?></b> is always keen to hear from highly
            motivated
            people who are keen to develop their careers. In return
            for your skills and committment, we offer a dynamic and stimulating working environment, and a competitive
            range of benefits</h5>
          <div class="divider">
            <span class="fa fa-mortar-board"></span>
          </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-lg-8 col-md-12">
            <div class="career-form p-5" data-aos="fade-up" data-aos-duration="1000">
              <div class="border-line"></div>
              <h3 class="font-weight-bold color-orange">Start Your Career with Us!</h3>
              <form id="startCareerForm">
                <h5 id="server-response" class="text-center"></h5>
                <div class="form-row">
                  <div class="form-group col-md-12">
                    <label for="applicant_name">FullName</label>
                    <input class="form-control" name="applicant_name" id="applicant_name" autocomplete="off"
                      placeholder="Enter Name" type="text">
                  </div>
                  <div class="form-group col-md-12">
                    <label for="email">Email Address</label>
                    <input autocomplete="off" class="form-control" id="email" placeholder="Enter Email" type="text"
                      name="email">
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-md-6">
                    <label for="phone">Phone Number</label>
                    <input class="form-control" id="phone" autocomplete="off" placeholder="Enter Number" type="number"
                      name="phone">
                  </div>
                  <div class="form-group col-md-6">
                    <label for="job_type">Job Type</label>
                    <select name="job_type" class="form-control" id="job_type">
                      <option value="" selected>Choose...</option>
                      <option value="Teaching">Teaching</option>
                      <option value="Non Teaching">Non Teaching</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label for="coverLetter">Cover Letter</label>
                  <textarea class="form-control" rows="4" id="coverLetter" placeholder="Write your cover letter here..."
                    name="coverLetter"></textarea>
                </div>

                <div class="form-group">
                  <label>
                    <span class="mb-0 resume">Drop Your Resume (<small class="text-danger">PDF max 1MB</small>)</span>
                    <input class="form-control-file pl-0 d-none border-0" id="resume" name="resume" type="file"
                      accept=".pdf">
                  </label>
                </div>
                <input type="hidden" name="action" value="submit_start_career_form">
                <button class="btn btn-dark btn-lg border-0 mt-2 mb-1 __loadingBtn__" type="submit"
                  style="border-radius: 10px;"> Submit Application</button>
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
  <?php if (!file_exists("Templates/FooterScript.php")) : ?>
  <?php die("Access not Aallowed"); ?>
  <?php else : ?>
  <?php include_once 'Templates/FooterScript.php'; ?>
  <?php endif; ?>
  <script src="osotech_script/career.js"></script>
</body>

</html>