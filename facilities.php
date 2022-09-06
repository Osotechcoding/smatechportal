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
    <title>Facilities :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
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
        <h1 class="font-weight-bold text-center">Facilities</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start course -->
    <section class="course">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Why Our School is Unique?</span>
                <h2>Awesome Facilities</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a  aria-selected="true" class="nav-link active" data-toggle="pill" href="#showall"
                       id="showall-tab" role="tab">Explore</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#Laboratories"
                       id="Laboratories-tab" role="tab">Laboratories</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#SchoolBuses"
                       id="SchoolBuses-tab" role="tab">School Buses</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#Classrooms"
                       id="Classrooms-tab" role="tab">Classrooms</a>
                </li>
            </ul>

            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div aria-labelledby="showall-tab" class="tab-pane  fade show active" id="showall" role="tabpanel">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid " src="assets/images/playground.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Our School at Night</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Prayer Session</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="" class="card-img" src="assets/images/playground.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Assembly Ground</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>


                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">School Hall</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Swiming Pool</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue" href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Footbal Pitch</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                    </div>
                    <div aria-labelledby="Laboratories-tab" class="tab-pane  fade" id="Laboratories" role="tabpanel">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Physics Laboratory</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/chemistry-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Chemistry Laboratory</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/biology-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Biology Laboratory</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/computer-labs.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Computer Laboratory (ICT)</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/library.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Modern Library</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div aria-labelledby="SchoolBuses-tab" class="tab-pane fade" id="SchoolBuses" role="tabpanel">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid" src="assets/images/bus1.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Toyota 2019 Model</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">View Driver's Details<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/bus2.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Hummer Bumber 2013 Model</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">View Driver's Details<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>


                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/bus3.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Isuzu Long Bus 2013 Model</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">View Driver's Details<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/bus4.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Toyota Coaster 205 Model</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">View Driver's Details<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div aria-labelledby="Classrooms-tab" class="tab-pane fade" id="Classrooms" role="tabpanel">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid " src="assets/images/computer-labs.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Web Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/physics-lab.jpg">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">UX/UX Design</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end course -->
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
