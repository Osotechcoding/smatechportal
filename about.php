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
    <!-- start inner banner -->
    <section class="inner-banner">
        <h1 class="font-weight-bold text-center">About Us</h1>
    </section>
    <!-- end inner banner -->
    <!-- start about us -->
    <section class="aboutus">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <h1 class="color-orange font-weight-bold about-title" data-aos="fade-up" data-aos-duration="1000">15+</h1>
                    <h5 class="font-weight-bold text-uppercase mb-3" data-aos="fade-up" data-aos-duration="1000">YEARS OF EXPERIANCE</h5>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    <p>Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                    <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                </div>
                <div class="col-lg-6 col-md-8 offset-md-2 offset-lg-0">
                    <div class="about-img">
                        <div class="img_1" data-aos="zoom-in" data-aos-duration="550">
                            <div class="border-line"></div>
                            <img src="assets/images/about1.jpg" class="img-fluid" alt="About">
                        </div>
                        <div class="img_2 d-flex"  data-aos="zoom-in" data-aos-duration="1000">
                            <h5 class="mb-0 text-white">Our Story</h5>
                            <a href="https://www.youtube.com/watch?v=_sI_Ps7JSEk" data-fancybox="gallery" class="video-btn text-white">
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
                <h2 class="text-white">Ethics Behind Success</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="target-block text-white p-lg-5 p-md-3 p-sm-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0 mb-sm-5 mb-4" data-aos="flip-up" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <i class="fa fa-check-circle fa-3x color-orange mb-3"></i>
                        <h4 class="font-weight-bold">Mission</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white  p-lg-5 p-md-3 p-sm-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0 mb-sm-5 mb-4" data-aos="flip-up" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <i class="fa fa-eye fa-3x color-orange mb-3"></i>
                        <h4 class="font-weight-bold">Vision</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white  p-lg-5 p-md-3 p-2 mb-lg-0 mb-mb-0 mb-xl-0" data-aos="flip-up" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <i class="fa fa-certificate fa-3x color-orange mb-3"></i>
                        <h4 class="font-weight-bold">Award</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i class="fa fa-angle-double-right ml-2"></i></a>
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
                        <span class="title">Online Courses</span>
                        <h2>Learn a new skills online on your time</h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board"></span>
                        </div>
                    </div>
                    <p class="p-17">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
                    <p class="p-17">It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages.</p>
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
                                    <h2 class="timer count-title count-number" data-to="300" data-speed="1500">300</h2>
                                    <h5 class="count-text mt-2">Teachers</h5>
                                </div>

                                <div class="counter aos-init aos-animate" data-aos="fade-up" data-aos-duration="550">
                                    <div class="border-line"></div>
                                    <div class="counter-img">
                                        <img src="assets/images/icons/classroom.png" class="img-fluid" alt="Classroom">
                                    </div>
                                    <h2 class="timer count-title count-number" data-to="1700" data-speed="1500">1,700</h2>
                                    <h5 class="count-text mt-2">Classroom</h5>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 mt-lg-5 mt-lg-5 mt-md-5">
                                <div class="counter aos-init aos-animate" data-aos="fade-up" data-aos-duration="550">
                                    <div class="border-line"></div>
                                    <div class="counter-img">
                                        <img src="assets/images/icons/career.png" class="img-fluid" alt="Career">
                                    </div>
                                    <h2 class="timer count-title count-number" data-to="11900" data-speed="1500">11,900</h2>
                                    <h5 class="count-text mt-2">Career</h5>
                                </div>
                                <div class="counter margin-bottom aos-init aos-animate margin-bottom" data-aos="fade-up" data-aos-duration="550">
                                    <div class="border-line"></div>
                                    <div class="counter-img">
                                        <img src="assets/images/icons/activity.png" class="img-fluid" alt="Activities">
                                    </div>
                                    <h2 class="timer count-title count-number" data-to="157" data-speed="1500">157</h2>
                                    <h5 class="count-text mt-2">Activities</h5>
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
    <section class="timeline bg-light">
        <div class="container">
            <div class="sec-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Timeline</span>
                <h2>We Are In History</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="slider-nav py-3">
                        <div class="text-center history_slide">
                            <h3>2000</h3>
                            <i class="fa fa-circle text-center"></i>
                        </div>
                        <div class="text-center history_slide">
                            <h3>2005</h3>
                            <i class="fa fa-circle text-center"></i>
                        </div>
                        <div class="text-center history_slide">
                            <h3>2010</h3>
                            <i class="fa fa-circle text-center"></i>
                        </div>
                        <div  class="text-center history_slide">
                            <h3>2015</h3>
                            <i class="fa fa-circle text-center"></i>
                        </div>
                        <div  class="text-center history_slide">
                            <h3>2019</h3>
                            <i class="fa fa-circle text-center"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="slider-for mb-3"  data-aos="fade-up" data-aos-duration="1000">
                        <div class="history-content p-5 text-center theme-orange">
                            <h3>Reached New Milestone</h3>
                            <p>Find to reach fault with a man who chooses to enjoy a pleasure that has except to obtain some advantage from it? But who has any right annoying consequences. </p>
                        </div>
                        <div class="history-content p-5 text-center theme-orange">
                            <h3>Reached New Milestone</h3>
                            <p>Find to reach fault with a man who chooses to enjoy a pleasure that has except to obtain some advantage from it? But who has any right annoying consequences. </p>
                        </div>
                        <div class="history-content p-5 text-center theme-orange">
                            <h3>Reached New Milestone</h3>
                            <p>Find to reach fault with a man who chooses to enjoy a pleasure that has except to obtain some advantage from it? But who has any right annoying consequences. </p>
                        </div>
                        <div class="history-content p-5 text-center theme-orange">
                            <h3>Reached New Milestone</h3>
                            <p>Find to reach fault with a man who chooses to enjoy a pleasure that has except to obtain some advantage from it? But who has any right annoying consequences. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end timeline -->
    <!-- start events -->
    <section class="events text-center">
        <div class="container-fluid">
            <div class="sec-title text-center" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">What Client Say about us !</span>
                <h2>Here is some client comments to us.</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="center">
                <div class="card m-2">
                    <div class="client-block p-3"  data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/1.png" alt="Rony Devis" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">Rubby Devis</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>

                <div class="card  m-2">
                    <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/2.png" alt="John Doe" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">John Doe</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>

                <div class="card  m-2 ">
                    <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/3.png" alt="Jenny Doe" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">Jenny Doe</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>

                <div class="card m-2">
                    <div class="client-block p-3"  data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/1.png" alt="Rony Devis" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">Rubby Devis</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>

                <div class="card  m-2">
                    <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/2.png" alt="John Doe" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">John Doe</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>

                <div class="card  m-2 ">
                    <div class="client-block p-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media p-3 align-items-center">
                            <img src="assets/images/3.png" alt="Jenny Doe" class="mr-3 rounded-circle">
                            <div class="media-body text-left">
                                <h6 class="color-orange font-weight-bold mb-0">Jenny Doe</h6>
                                <p class="mb-0">Lorem ipsum...</p>
                            </div>
                        </div>
                        <p class="pl-3 pr-3 text-left">There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end events -->
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
