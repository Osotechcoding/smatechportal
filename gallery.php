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
        <h1 class="font-weight-bold text-center">Gallery</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start gallery -->
    <section class="course">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Our Gallery</span>
                <h2>Life At Campus</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <ul class="nav nav-pills mb-3 p-0 justify-content-center" id="pills-tab" role="tablist" data-aos="fade-up"
                data-aos-duration="1000">
                <li class="nav-item">
                    <a class="nav-link active" id="showall-tab" data-toggle="pill" href="#showall" role="tab"
                       aria-controls="showall" aria-selected="true">Show All</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Events-tab" data-toggle="pill" href="#Events" role="tab"
                       aria-selected="false">Events</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Sports-tab" data-toggle="pill" href="#Sports" role="tab"
                       aria-selected="false">Sports</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="Classroom-tab" data-toggle="pill" href="#Classroom" role="tab"
                        aria-selected="false">Classroom</a>
                </li>
            </ul>

            <div class="row">
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane  fade show active" id="showall" role="tabpanel" aria-labelledby="showall-tab">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="img-fluid " src="assets/images/events_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_1.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="img-fluid" src="assets/images/events_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_2.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/events_3.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_3.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_2.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_1.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_3.png" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_3.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/classroom_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/classroom_1.jpg" data-fancybox="gallery"><i
                                        class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Classroom</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/classroom_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/classroom_2.jpg" data-fancybox="gallery"><i
                                        class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Classrom</h5>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane  fade" id="Events" role="tabpanel" aria-labelledby="Events-tab">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="img-fluid " src="assets/images/events_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_1.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="img-fluid" src="assets/images/events_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_2.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/events_3.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/events_3.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Event</h5>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Sports" role="tabpanel" aria-labelledby="Sports-tab">

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_1.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_2.jpg" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/sports_3.png" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/sports_3.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Sports</h5>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="Classroom" role="tabpanel" aria-labelledby="Classroom-tab">
                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/classroom_1.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/classroom_1.jpg" data-fancybox="gallery"><i
                                        class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Classroom</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/classroom_2.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/classroom_2.jpg" data-fancybox="gallery"><i
                                        class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Classroom</h5>
                            </div>
                        </div>

                        <div class="Portfolio" data-aos="fade-up" data-aos-duration="1000">
                            <img class="card-img" src="assets/images/classroom_3.jpg" alt="Gallery">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/classroom_3.jpg" data-fancybox="gallery"><i
                                        class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Classroom</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end gallery -->
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
