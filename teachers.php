<?php
 if (!file_exists("Helper.php")) {
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
    <title>Teachers :: <?php echo ucwords($Osotech->getConfigData()->school_name);?></title>
    <!-- ========== Favicon Icon ========== -->
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
        <h1 class="font-weight-bold text-center">Staff</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start faculties -->
    <section class="faculties">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our Staff</span>
                <h2>Our Dedicated Staff</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                 <?php 
                            $get_all_staff = $Osotech->get_all_staff();
                            if ($get_all_staff) {
                                foreach ($get_all_staff as $value) {?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="faculty-block">
                        <div class="team-image">
                            <div class="border-line"></div>
                            <?php if ($value->staffPassport==NULL || $value->staffPassport==""): ?>
                                 <img src="assets/images/teacher.jpg" class="img-fluid d-block m-auto" alt="Team">
                                <?php else: ?>
                                   <img src="eportal/schoolImages/staff/<?php echo $value->staffPassport;?>" class="img-fluid d-block m-auto" width="250" height="400"> 
                                <?php endif ?>
                           
                        </div>
                        <div class="faculties-info theme-orange py-2 mt-3" data-aos="zoom-in" data-aos-duration="550">
                            <div class="fac-text text-center">
                                <h5 class="font-weight-bold"> <?php echo strtoupper($value->full_name);?></h5>
                                <h6><?php if ($value->staffRole == NULL || $value->staffRole=="") {
                                    echo 'Subject Teacher';
                                }else{
                                    echo strtoupper($value->staffRole);
                                } ?></h6>
                            </div>
                            <div class="fac-social text-center">
                                <ul class="social-icon mb-0">
                                    <li><a href="javascript:"><i class="fa fa-facebook-f"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-skype"></i></a></li>
                                    <li><a href="javascript:"><i class="fa fa-linkedin-in"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <?php  // code...
                                }
                            }
                             ?>

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
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
