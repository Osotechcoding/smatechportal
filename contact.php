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
        <h1 class="font-weight-bold text-center">Contact Us</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start contact -->
    <section class="contact-section">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Get In Touch</span>
                <h2>We’d Love To Here From You</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-md-8">
                    <div class="contact-form p-5" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="border-line"></div>
                        <h3 class="font-weight-bold color-orange">Drop Message</h3>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputName">Name</label>
                                <input class="form-control" id="exampleInputName" placeholder="Enter Name" type="text">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email Address</label>
                                <input class="form-control" id="exampleInputEmail1"
                                       placeholder="Enter Email" type="email">
                                <small class="form-text text-muted" id="emailHelp">We'll never share your email with anyone
                                    else.
                                </small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputNumber">Phone Number</label>
                                <input  class="form-control" id="exampleInputNumber"
                                        placeholder="Enter Number" type="email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputMessage">Message</label>
                                <input class="form-control" id="exampleInputMessage"
                                       placeholder="Message" type="email">
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="exampleCheck1" type="checkbox">
                                <label class="form-check-label" for="exampleCheck1">Check me out</label>
                            </div>
                            <button class="btn theme-orange border-0 mt-4" type="submit">Send Message</button>
                        </form>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 ml-minus">
                    <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Address</h6>
                            <p class="mb-0">503 Old Buffalo Street
                                Northwest #205, New York-3087</p>
                        </div>
                        <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050"
                             src="assets/images/icons/location.png" alt="Location">
                    </div>
                    <div class="media p-3 align-items-center theme-blue mb-3" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Email</h6>
                            <p class="mb-0">support@gmail.com</p>
                        </div>
                        <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1500"
                             src="assets/images/icons/mail.png" alt="Mail">
                    </div>
                    <div class="media p-3 align-items-center theme-blue" data-aos="zoom-in" data-aos-duration="1000">
                        <div class="media-body text-left">
                            <h6 class="color-orange font-weight-bold mb-1">Contact Number</h6>
                            <p class="mb-0">+821 (2365) 456 90</p>
                        </div>
                        <img class="img-fluid contact-icon" data-aos="zoom-in" data-aos-duration="1050"
                             src="assets/images/icons/call.png" alt="Call">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact -->
    <!-- start map -->
    <section class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.15830872278!2d-74.11976395795979!3d40.69766374873451!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew%20York%2C%20NY%2C%20USA!5e0!3m2!1sen!2sin!4v1567509516196!5m2!1sen!2sin" class="w-100 border-0" height="450"   allowfullscreen=""></iframe>
    </section>
    <!-- end map -->
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
