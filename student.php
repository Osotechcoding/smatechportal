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
    <footer class="theme-blue">
        <div class="container">
            <div class="footer-top border-bottom pt-5">
                <div class="row">
                    <div class="col-lg-3 col-md-6" data-aos="fade-in" data-aos-duration="1050">
                        <a href="index-2.html"><img src="assets/images/logo-footer.png" class="img-fluid mb-3" alt="Edusquad"></a>
                        <p>Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC.</p>
                        <ul class="social-icon">
                            <li><a href="javascript:"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="javascript:"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="javascript:"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="javascript:"><i class="fa fa-skype"></i></a></li>
                            <li><a href="javascript:"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-2 col-md-6" data-aos="fade-in" data-aos-duration="550">
                        <h5 class="font-weight-bold mb-3">Quick Links</h5>
                        <ul>
                            <li><a href="index-2.html"><i class="fa fa-angle-double-right mr-2"></i>Home</a></li>
                            <li><a href="about.html"><i class="fa fa-angle-double-right mr-2"></i>About Us</a></li>
                            <li><a href="student.html"><i class="fa fa-angle-double-right mr-2"></i>Student Corner</a></li>
                            <li><a href="faculties.html"><i class="fa fa-angle-double-right mr-2"></i>Faculties</a></li>
                            <li><a href="achievement.html"><i class="fa fa-angle-double-right mr-2"></i>Achievenment</a></li>
                            <li><a href="career.html"><i class="fa fa-angle-double-right mr-2"></i>Career</a></li>
                            <li><a href="contact.html"><i class="fa fa-angle-double-right mr-2"></i>Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-md-5 mb-4" data-aos="fade-in" data-aos-duration="1050">
                        <h5 class="font-weight-bold mb-3">Recent News</h5>
                        <div class="row">
                            <div class="col-md-4 col-sm-2 col-2 mb-2 pr-0">
                                <img src="assets/images/thumb_1.jpg" class="img-fluid" alt="Gallery">
                            </div>
                            <div class="col-md-4 col-sm-2 col-2 mb-2 pr-0">
                                <img src="assets/images/thumb_2.jpg" class="img-fluid" alt="Gallery">
                            </div>
                            <div class="col-md-4 col-sm-2 col-2 mb-2 pr-0">
                                <img src="assets/images/thumb_3.jpg" class="img-fluid" alt="Gallery">
                            </div>
                            <div class="col-md-4 col-sm-2 col-2 pr-0">
                                <img src="assets/images/thumb_4.jpg" class="img-fluid" alt="Gallery">
                            </div>
                            <div class="col-md-4 col-sm-2 col-2 pr-0">
                                <img src="assets/images/thumb_5.jpg" class="img-fluid" alt="Gallery">
                            </div>
                            <div class="col-md-4 col-sm-2 col-2 pr-0">
                                <img src="assets/images/thumb_6.jpg" class="img-fluid" alt="Gallery">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 pl-lg-5  mb-md-5" data-aos="fade-in" data-aos-duration="1050">
                        <h5 class="font-weight-bold mb-3">Contact Us</h5>
                        <ul class="address-icon">
                            <li class="mb-3"><i class="fa fa-map-marker mr-3 color-orange"></i>503 Old Buffalo Street
                                Northwest #205, New York-3087.</li>
                            <li class="mb-3"><i class="fa fa-phone mr-3 color-orange"></i>+821 (2365) 456 90</li>
                            <li class="mb-3"><i class="fa fa-envelope color-orange mr-3"></i>support@gmail.com</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="bottom-footer py-3 d-flex justify-content-between">
                <p class="mb-0">All Rights Reserved by Edusquad.</p>
                <ul class="list-inline mb-0">
                    <li class="list-inline-item"><a href="javascript:">Terms of use</a></li>
                    <li class="list-inline-item"><a href="javascript:">Privacy policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
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
