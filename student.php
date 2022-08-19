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
    <title>Edusquad</title>
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
                                <label for="exampleIDNumber">ID Number</label>
                                <input type="text" class="form-control" id="exampleIDNumber" placeholder="Enter Your ID">
                            </div>
                            <div class="form-group">
                                <label for="exampleDepartment">Department</label>
                                <select id="exampleDepartment" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Department 1</option>
                                    <option>Department 2</option>
                                    <option>Department 3</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleClass">Class</label>
                                <select id="exampleClass" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Class One</option>
                                    <option>Class Two</option>
                                    <option>Class Three</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleStduntname">Student Name</label>
                                <input type="text" class="form-control" id="exampleStduntname"
                                       placeholder="Enter Student Name">
                            </div>

                            <button type="submit" class="btn theme-orange border-0 mt-2">Search Now</button>
                        </form>
                    </div>

                    <div class="video my-4" data-aos="zoom-in" data-aos-duration="1000">
                        <img class="img-fluid" src="assets/images/event_1.jpg" alt="video">
                        <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-fancybox="gallery"
                           class="video-btn text-white">
                            <i class="fa fa-play-circle fa-3x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-12">
                    <div class="row">
                        <div class="col-md-6 mb-4">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/student_1.jpg" class="img-fluid d-block m-auto" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h6 class="font-weight-bold color-orange">John Devis</h6>
                                        <h6><b>ID:</b> 1153</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>Class:</b>One</h6>
                                        <h6><b>Dep:</b>Business Management</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-4">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/student_2.jpg" class="img-fluid d-block m-auto" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h6 class="font-weight-bold color-orange">Lissa Devin</h6>
                                        <h6><b>ID:</b> 1253</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>Class:</b>One</h6>
                                        <h6><b>Dep:</b>UI/UX Design</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 mb-xl-0 mb-lg-0 mb-md-0 mb-sm-4 mb-4 ">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/student_3.jpg" class="img-fluid d-block m-auto" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h6 class="font-weight-bold color-orange">Jenifer Deo</h6>
                                        <h6><b>ID:</b>4153</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>Class:</b>One</h6>
                                        <h6><b>Dep:</b>Web Development</h6>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="student-block">
                                <div class="student-img">
                                    <img src="assets/images/student_4.jpg" class="img-fluid d-block m-auto" alt="Student">
                                </div>
                                <div class="student-desc" data-aos="fade-up" data-aos-duration="1000">
                                    <div class="border-line"></div>
                                    <div class="std_desc_one text-center pt-3">
                                        <h6 class="font-weight-bold color-orange">Mark Luis</h6>
                                        <h6><b>ID:</b>1263</h6>
                                    </div>
                                    <div class="std_desc_two text-center">
                                        <h6><b>Class:</b>One</h6>
                                        <h6><b>Dep:</b>Web Design</h6>
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
