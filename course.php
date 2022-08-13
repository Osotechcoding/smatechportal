<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
  <?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title>Edusquad</title>
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
        <h1 class="font-weight-bold text-center">Course</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start course -->
    <section class="course">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Popular Courses</span>
                <h2>Courses covering a broad range of topics</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <ul class="nav nav-pills  justify-content-center" id="pills-tab" role="tablist">
                <li class="nav-item">
                    <a  aria-selected="true" class="nav-link active" data-toggle="pill" href="#showall"
                       id="showall-tab" role="tab">Show All</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#Business"
                       id="Business-tab" role="tab">Business</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#Management"
                       id="Management-tab" role="tab">Management</a>
                </li>
                <li class="nav-item">
                    <a  aria-selected="false" class="nav-link" data-toggle="pill" href="#Designing"
                       id="Designing-tab" role="tab">Designing</a>
                </li>
            </ul>

            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div aria-labelledby="showall-tab" class="tab-pane  fade show active" id="showall" role="tabpanel">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid " src="assets/images/course_1.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Web Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid" src="assets/images/course_2.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="" class="card-img" src="assets/images/course_3.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Management</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>


                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_6.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Analysis</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_7.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Management</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_8.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">UX/UX Design</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                    </div>
                    <div aria-labelledby="Business-tab" class="tab-pane  fade" id="Business" role="tabpanel">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_3.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>


                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_6.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Analysis</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div aria-labelledby="Management-tab" class="tab-pane fade" id="Management" role="tabpanel">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid" src="assets/images/course_2.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_3.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Management</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>


                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_6.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Business Analysis</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>
                    </div>
                    <div aria-labelledby="Designing-tab" class="tab-pane fade" id="Designing" role="tabpanel">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="img-fluid " src="assets/images/course_1.png">
                            <div class="course-desc py-4 px-3">
                                <h5 class="font-weight-bold">Web Development</h5>
                                <p>Many desktop publishing packages and web on page editors now use lorem Ipsum</p>
                                <a class="btn theme-blue " href="#">Course Detail<i
                                        class="fa fa-angle-double-right ml-2"></i></a>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img alt="Course" class="card-img" src="assets/images/course_8.png">
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
