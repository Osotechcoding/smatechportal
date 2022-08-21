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
    <title> Homepage :: <?php echo ($Osotech->getConfigData()->school_name);?></title>

    <?php if (!file_exists("Templates/HeaderScript.php")): ?>
      <?php die("Access not Aallowed") ; ?>
      <?php else: ?>
        <?php include_once 'Templates/HeaderScript.php'; ?>
    <?php endif; ?>

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
    <!-- start slider -->
      <?php include_once ("Templates/HomePageSlider.php");?>
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
                            <h2 class="timer count-title count-number" data-to="300" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-0 mt-sm-0 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/classroom.png" class="img-fluid" alt="classroom">
                            </div>
                            <h5 class="count-text mt-2">Classroom</h5>
                            <h2 class="timer count-title count-number" data-to="1700" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/career.png" class="img-fluid" alt="career">
                            </div>
                            <h5 class="count-text mt-2">Student</h5>
                            <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/activity.png" class="img-fluid" alt="activity">
                            </div>
                            <h5 class="count-text mt-2">Graduated</h5>
                            <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <!-- end counter -->
    <!-- start about us -->
    <section class="about-us" data-aos="fade-up" data-aos-duration="950">
        <div class="container">
            <div class="about-box pb-3">
                <i class="fa fa-mortar-board"></i>
            </div>
            <h5 data-aos="fade-up" data-aos-duration="1050">Chairman Message</h5>
            <h3 class="font-weight-bold pb-3 px-5 mb-0" data-aos="fade-up" data-aos-duration="1050">Education develop a passion for learning.If you do, you will never cease to grow.</h3>
            <p class="pt-3 bottom-line" style="line-height: 40px;font-size: 20px;"><?php echo ($Osotech->getConfigData()->school_history);?></p>
             

            <h5 class="pt-3"><?php echo ($Osotech->getConfigData()->school_director);?></h5>
            <p>Founrder & Chairman</p>
            <div class="button-box">
                <a href="./about" class="left-btn">More About Us</a>
                <a href="./contact" class="right-btn">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- end about us -->
    <!-- start target -->
    <section class="target">
        <div class="container">
            <div class="sec-title text-center bg-fill mb-3">
                <span class="title">Why Choose Us</span>
                <h2 class="text-white">Ethics Behind Our Success</h2>
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
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum
                            dolore fugiat.</p>
                        <a href="./teachers" class="btn text-white pl-0">Read More<i
                                class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white  p-5 mb-lg-0 mb-xl-0 mb-md-0 mb-sm-5 mb-5" data-aos="fade-up"
                         data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-mortar-board fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Condusive Environment</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum
                            dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i
                                class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white p-5" data-aos="fade-up" data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-book fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Book Library & Lab</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum
                            dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i
                                class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </section>
    <!-- end target -->
    <!-- start team -->
    <section class="our-team text-center bg-light">
        <div class="container">
            <div class="sec-title text-center mb-3">
                <span class="title">Our Founders</span>
                <h2>What we bring to you</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="550">
                    <div class="team-block">
                        <div class="team-img">
                            <img src="assets/images/teacher.jpg" class="img-fluid" alt="team member">
                        </div>
                        <ul class="social-connect pl-0">
                            <li><i class="fa fa-facebook-f"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-youtube"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                        <h4 class="pt-4 font-weight-bold">Prof. Wole Soyinka A</h4>
                        
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="550">
                    <div class="team-block mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2 mt-2">
                        <div class="team-img">
                            <img src="assets/images/teacher.jpg" class="img-fluid" alt="team member">
                        </div>
                        <ul class="social-connect pl-0">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-youtube"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                        <h4 class="pt-4 font-weight-bold">Kevin Walker</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="550">
                    <div class="team-block  mt-xl-0 mt-lg-0 mt-mb-2 mt-sm-2 mt-2">
                        <div class="team-img">
                            <img src="assets/images/teacher.jpg" class="img-fluid" alt="team member">
                        </div>
                        <ul class="social-connect pl-0">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-youtube"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                        <h4 class="pt-4 font-weight-bold">Marry Scott</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="550">
                    <div class="team-block">
                        <div class="team-img mt-xl-0 mt-lg-0 mt-mb-2 mt-sm-2 mt-2">
                            <img src="assets/images/teacher.jpg" class="img-fluid" alt="team member">
                        </div>
                        <ul class="social-connect pl-0">
                            <li><i class="fa fa-facebook"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-youtube"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                        <h4 class="pt-4 font-weight-bold">Lili Jameson</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end team -->
    <!-- start online course -->
    <section class="online-course">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sec-title">
                        <span class="title">The Principal</span>
                        <h2>Welcome to <?php echo ($Osotech->getConfigData()->school_name);?></h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board fa-2x"></span>
                        </div>
                    </div>
                    <p class="p-17">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem
                        Ipsum
                        has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a
                        galley of type and scrambled it to make a type specimen book.</p>
                    <p class="p-17">It has survived not only five centuries, but also the leap into electronic
                        typesetting,
                        remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset
                        sheets
                        containing Lorem Ipsum passages.</p>
                    <button type="button" class="btn theme-orange theme-btn my-2 join-us">Enroll Your Ward(s) Now</button>
                </div>
                <div class="col-lg-6">
                    <div class="course-block  d-flex justify-content-between bg-light pa-2 mx-5 my-3" data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/promotion.png" class="img-fluid m-auto" alt="Key Of Success">
                        <div class="course-text pl-5">
                            <h4>Key Of Success</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="course-block  d-flex justify-content-between theme-blue pa-2 mx-5 my-3"
                         data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/online-class.png" class="img-fluid m-auto" alt="Our Philosophy">
                        <div class="course-text pl-5">
                            <h4>Our Philosophy</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                    <div class="course-block  d-flex justify-content-between theme-orange pa-2 mx-5 mt-3"
                         data-aos="fade-up"
                         data-aos-duration="550">
                        <img src="assets/images/icons/feminism.png" class="img-fluid m-auto" alt="Our Principle">
                        <div class="course-text pl-5">
                            <h4>Our Principle</h4>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end online course -->
    <!-- start search course -->
  <?php //include_once ("Partials/searchCourse.php"); ?>
    <!-- end search course -->
    <!-- start event listing -->
    <?php include_once ("Partials/EventListing.php"); ?>
    <!-- end event listing -->
    <!-- start video & FAQ -->
    <?php include_once ("Partials/HomePageFaqs.php"); ?>
    <!-- end video & FAQ -->
    <!-- start event gallery -->
    <?php include_once ("Partials/HomePageGallery.php"); ?>
    <!-- end event gallery -->
    <!-- start contact us -->
    <section class="contact-us mt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12 contact-us-block">
                    <div class="border-line"></div>
                    <div class="row">
                        <div class="col-lg-6 col-md-12 py-5">
                            <h3 class="text-center font-weight-bold">Student Review</h3>
                            <div class="single-item">
                                <div class="text-center py-4">
                                    <img src="assets/images/1.png" class="img-fluid m-auto d-block" alt="Student">
                                    <h5 class="mt-3 font-weight-bold">Habina Rehman</h5>
                                    <h6>Suffered are many variation of passages lorem availle there on alterati of some
                                        form
                                        by the injected for users.</h6>
                                </div>
                                <div class="text-center py-4">
                                    <img src="assets/images/1.png" class="img-fluid m-auto d-block" alt="Student">
                                    <h5 class="mt-3 font-weight-bold">John Leo</h5>
                                    <h6>Suffered are many variation of passages lorem availle there on alterati of some
                                        form
                                        by the injected for users.</h6>
                                </div>
                                <div class="text-center py-4">
                                    <img src="assets/images/1.png" class="img-fluid m-auto d-block" alt="Student">
                                    <h5 class="mt-3 font-weight-bold">Lisa Devis</h5>
                                    <h6>Suffered are many variation of passages lorem availle there on alterati of some
                                        form
                                        by the injected for users.</h6>
                                </div>
                                <button class="slick-prev slick-arrow" aria-label="Previous" type="button">
                                    Previous
                                </button>
                                <button class="slick-next slick-arrow" aria-label="Next" type="button">Next
                                </button>
                            </div>
                        </div>
                        <div class="col-md-6 hidden-md">
                            <div class="joinus-content theme-orange mx-5" data-aos="zoom-in" data-aos-duration="550">
                                <p class="text-uppercase font-weight-bold mb-0">Join Us</p>
                                <h2 class="font-weight-bold mb-3">Talk With Our Expert</h2>
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputName">Name</label>
                                        <input type="text" class="form-control" id="exampleInputName"
                                               placeholder="Enter Your Name">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Email address</label>
                                        <input type="email" class="form-control" id="exampleInputEmail1"
                                               placeholder="Enter Your Email">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Course</label>
                                        <select class="form-control" id="exampleFormControlSelect1">
                                            <option>Web Design</option>
                                            <option>UX/UI Design</option>
                                            <option>Business Management</option>
                                            <option>Business Analysis</option>
                                            <option>Web Development</option>
                                        </select>
                                    </div>
                                    <button type="submit" class="btn read-more text-white border-white">Let's Start To
                                        Talk
                                        <i class="fa fa-long-arrow-alt-right"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end contact us -->
    <!-- start join us -->
    <section class="pt-5">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="joinus-content theme-orange mx-5 hidden-lg" data-aos="zoom-in" data-aos-duration="550">
                        <p class="text-uppercase font-weight-bold mb-0">Join Us</p>
                        <h2 class="font-weight-bold mb-3">Talk With Our Admin</h2>
                        <form>
                            <div class="form-group">
                                <label for="exampleInputName1">Name</label>
                                <input type="text" class="form-control" id="exampleInputName1"
                                       placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail2">Email address</label>
                                <input type="email" class="form-control" id="exampleInputEmail2"
                                       placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlSelect3">Job Postion</label>
                                <select class="form-control" id="exampleFormControlSelect3">
                                    <option>Web Design</option>
                                    <option>UX/UI Design</option>
                                    <option>Business Management</option>
                                    <option>Business Analysis</option>
                                    <option>Web Development</option>
                                </select>
                            </div>
                            <button type="submit" class="btn read-more text-white border-white">Let's Start To Talk <i
                                    class="fa fa-long-arrow-alt-right"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end join us -->
    <!-- start blog -->
    <?php include_once ("Partials/LatestBlogs.php") ?>

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
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
