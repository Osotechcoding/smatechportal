<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
<?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title>OSotech</title>

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
                            <h5 class="count-text mt-2">Career</h5>
                            <h2 class="timer count-title count-number" data-to="11900" data-speed="1500"></h2>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-6">
                        <div class="counter mt-xl-0 mt-lg-0 mt-md-4 mt-sm-3 mt-3" data-aos="fade-up" data-aos-duration="550">
                            <div class="border-line"></div>
                            <div class="counter-img">
                                <img src="assets/images/icons/activity.png" class="img-fluid" alt="activity">
                            </div>
                            <h5 class="count-text mt-2">Activities</h5>
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
            <h5 data-aos="fade-up" data-aos-duration="1050">Key to unlock the golden door of freedom.</h5>
            <h2 class="font-weight-bold pb-3 px-5 mb-0" data-aos="fade-up" data-aos-duration="1050">Education develop a
                passion for learning.If you do, you will never cease to grow.</h2>
            <p class="bottom-line">Ensuring quality higher education is one of the most important things we can do for
                future generations.</p>

            <h5 class="pt-3">Alexa Devid</h5>
            <p>Founrder & Chairman</p>
            <div class="button-box">
                <a href="javascript:" class="left-btn">More About Us</a>
                <a href="javascript:" class="right-btn">Contact Us</a>
            </div>
        </div>
    </section>
    <!-- end about us -->
    <!-- start target -->
    <section class="target">
        <div class="container">
            <div class="sec-title text-center bg-fill mb-3">
                <span class="title">Why Choose Us</span>
                <h2 class="text-white">Ethics Behind Success</h2>
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
                        <h4 class="font-weight-bold">Skilled Lecturers</h4>
                        <p>Aliquip exea conse quat nul duis crib irure dolor in reprehenderit voluptate velit ese cillum
                            dolore fugiat.</p>
                        <a href="javascript:" class="btn text-white pl-0">Read More<i
                                class="fa fa-angle-double-right ml-2"></i></a>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="target-block text-white  p-5 mb-lg-0 mb-xl-0 mb-md-0 mb-sm-5 mb-5" data-aos="fade-up"
                         data-aos-duration="550">
                        <div class="border-line"></div>
                        <i class="fa fa-mortar-board fa-3x color-orange mb-3 target-icon"></i>
                        <h4 class="font-weight-bold">Scholarship Facility</h4>
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
                            <img src="assets/images/team_2.png" class="img-fluid" alt="team member">
                        </div>
                        <ul class="social-connect pl-0">
                            <li><i class="fa fa-facebook-f"></i></li>
                            <li><i class="fa fa-twitter"></i></li>
                            <li><i class="fa fa-youtube"></i></li>
                            <li><i class="fa fa-instagram"></i></li>
                        </ul>
                        <h4 class="pt-4 font-weight-bold">Sarry Denia</h4>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="550">
                    <div class="team-block mt-xl-0 mt-lg-0 mt-md-0 mt-sm-2 mt-2">
                        <div class="team-img">
                            <img src="assets/images/team_1.png" class="img-fluid" alt="team member">
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
                            <img src="assets/images/team_3.png" class="img-fluid" alt="team member">
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
                            <img src="assets/images/team_4.png" class="img-fluid" alt="team member">
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
                        <span class="title">Online Courses</span>
                        <h2>Learn a new skills online on your time</h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board"></span>
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
                    <button type="button" class="btn theme-orange theme-btn my-2 join-us">Join Us</button>
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
    <section class="search-course">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 col-md-10">
                    <div class="online-course-inner text-center">
                        <h2>Online Course To Learn</h2>
                        <h6>Own Your Features Learning New Skills Online</h6>
                        <form class="px-5 mt-5 mb-3">
                            <div class="form-row">
                                <div class="form-group col-lg-8 col-md-12">
                                    <input type="text" class="form-control"
                                           placeholder="What do you want to learn today?">
                                </div>
                                <div class="form-group col-lg-4 col-md-12">
                                    <button type="submit" class="btn theme-btn theme-orange mb-2 get-course">Get
                                        Course
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="course-rate">
                            <div class="counter-box p-0">
                                <div class="row justify-content-center">
                                    <div class="col-lg-3 col-md-3">
                                        <div class="counter p-4" data-aos="fade-up" data-aos-duration="550">
                                            <div class="counter-img">
                                                <img src="assets/images/icons/reading.png" class="img-fluid w-50"
                                                     alt="Students">
                                            </div>
                                            <h3 class="timer count-title count-number" data-to="300"
                                                data-speed="1500"></h3>
                                            <h5 class="count-text mt-2">Students</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="counter p-4" data-aos="fade-up" data-aos-duration="550">
                                            <div class="counter-img">
                                                <img src="assets/images/icons/online-course.png" class="img-fluid w-50"
                                                     alt="Course">
                                            </div>
                                            <h3 class="timer count-title count-number" data-to="1700"
                                                data-speed="1500"></h3>
                                            <h5 class="count-text mt-2">Course</h5>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3">
                                        <div class="counter mb-0 p-4" data-aos="fade-up" data-aos-duration="550">
                                            <div class="counter-img">
                                                <img src="assets/images/icons/visitor.png" class="img-fluid w-50"
                                                     alt="Visitors">
                                            </div>
                                            <h3 class="timer count-title count-number" data-to="11900"
                                                data-speed="1500"></h3>
                                            <h5 class="count-text mt-2">Visitors</h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end search course -->
    <!-- start event listing -->
    <section class="event-listing">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="about-img mb-5">
                        <div class="img_1 aos-init aos-animate d-block m-auto" data-aos="zoom-in"
                             data-aos-duration="550">
                            <div class="border-line"></div>
                            <img src="assets/images/about1.jpg" class="img-fluid" alt="About">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="sec-title" data-aos="fade-up" data-aos-duration="550">
                        <span class="title">Events Listing</span>
                        <h2>Upcoming Events Schedule</h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board"></span>
                        </div>
                        <div class="event-block d-flex my-3" data-aos="fade-up" data-aos-duration="550">
                            <h2 class="font-weight-bold color-orange mr-3">1.</h2>
                            <div class="event-info">
                                <h5 class="color-blue">
                                    <a href="javascript:">
                                        International Conference on Business .....
                                    </a>
                                </h5>
                                <ul class="pl-0">
                                    <li class="pr-3">
                                        <i class="ti-calendar pr-2"></i>
                                        <span>July 8,2018</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-alarm-clock pr-2"></i>
                                        <span>5.00pm - 7.00pm</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-location-arrow pr-2"></i>
                                        <span>United States</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="event-block d-flex my-3" data-aos="fade-up" data-aos-duration="550">
                            <h2 class="font-weight-bold color-orange mr-3">2.</h2>
                            <div class="event-info">
                                <h5 class="color-blue">
                                    <a href="javascript:">
                                        International Conference on Business .....
                                    </a>
                                </h5>
                                <ul class="pl-0">
                                    <li class="pr-3">
                                        <i class="ti-calendar pr-2"></i>
                                        <span>July 8,2018</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-alarm-clock pr-2"></i>
                                        <span>5.00pm - 7.00pm</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-location-arrow pr-2"></i>
                                        <span>United States</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="event-block d-flex mt-3" data-aos="fade-up" data-aos-duration="550">
                            <h2 class="font-weight-bold color-orange mr-3">3.</h2>
                            <div class="event-info">
                                <h5 class="color-blue">
                                    <a href="javascript:">
                                        International Conference on Business .....
                                    </a>
                                </h5>
                                <ul class="pl-0 mb-0">
                                    <li class="pr-3">
                                        <i class="ti-calendar pr-2"></i>
                                        <span>July 8,2018</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-alarm-clock pr-2"></i>
                                        <span>5.00pm - 7.00pm</span>
                                    </li>
                                    <li class="pr-3">
                                        <i class="ti-location-arrow pr-2"></i>
                                        <span>United States</span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end event listing -->
    <!-- start video & FAQ -->
    <section class="video-faq">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 pl-0 small-screen">
                    <div class="video-area">
                        <div class="video-icon">
                            <a href="https://www.youtube.com/watch?v=YLN1Argi7ik" class="animated pulse"
                               data-fancybox="gallery">
                                <span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 p-5" data-aos="fade-up" data-aos-duration="550">
                    <div class="sec-title bg-fill">
                        <span class="title">FAQUALITY ASK QUESTION</span>
                        <h2 class="text-white">Some FAQ’s</h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board"></span>
                        </div>
                    </div>

                    <div class="panel-group pt-3" id="accordion2" role="tablist" aria-multiselectable="true">
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading" role="tab" id="headingOne2">
                                <h4 class="panel-title">
                                    <a role="button" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseOne2"
                                       aria-expanded="true">
                                        Which type of course you want to learn?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseOne2" class="panel-collapse collapse in" role="tabpanel"
                                 aria-labelledby="headingOne2">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem,
                                        dictum
                                        id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu
                                        tincidunt
                                        ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor
                                        aliquam vitae. Curabitur molestie eros. </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading" role="tab" id="headingTwo2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseTwo2" aria-expanded="false">
                                        How can you get your result?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseTwo2" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingTwo2">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem,
                                        dictum
                                        id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu
                                        tincidunt
                                        ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor
                                        aliquam vitae. Curabitur molestie eros. </p>
                                </div>
                            </div>
                        </div>
                        <div class="panel panel-default mb-4">
                            <div class="panel-heading" role="tab" id="headingThree2">
                                <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion2"
                                       href="#collapseThree2" aria-expanded="false">
                                        How can you contact us?
                                    </a>
                                </h4>
                            </div>
                            <div id="collapseThree2" class="panel-collapse collapse" role="tabpanel"
                                 aria-labelledby="headingThree2">
                                <div class="panel-body">
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent nisl lorem,
                                        dictum
                                        id pellentesque at, vestibulum ut arcu. Curabitur erat libero, egestas eu
                                        tincidunt
                                        ac, rutrum ac justo. Vivamus condimentum laoreet lectus, blandit posuere tortor
                                        aliquam vitae. Curabitur molestie eros. </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end video & FAQ -->
    <!-- start event gallery -->
    <section class="event-gallery bg-light">
        <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="550">
            <span class="title">Online Courses</span>
            <h2>Life At Our Campus</h2>
            <div class="divider">
                <span class="fa fa-mortar-board"></span>
            </div>
        </div>
        <div class="autoplay" data-aos="fade-up" data-aos-duration="550">
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_1.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_2.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_3.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_4.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_5.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_1.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
            <div>
                <div class="gallery-item">
                    <img src="assets/images/event_2.jpg" class="img-fluid" alt="Event">
                    <div class="content d-flex justify-content-between">
                        <h5>content</h5>
                        <i class="fa fa-chevron-circle-right fa-2x"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
                                    <img src="assets/images/2.png" class="img-fluid m-auto d-block" alt="Student">
                                    <h5 class="mt-3 font-weight-bold">John Leo</h5>
                                    <h6>Suffered are many variation of passages lorem availle there on alterati of some
                                        form
                                        by the injected for users.</h6>
                                </div>
                                <div class="text-center py-4">
                                    <img src="assets/images/3.png" class="img-fluid m-auto d-block" alt="Student">
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
                        <h2 class="font-weight-bold mb-3">Talk With Our Expert</h2>
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
                                <label for="exampleFormControlSelect3">Course</label>
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
    <section class="blog">
        <div class="container">
            <div class="sec-title text-center mb-3">
                <span class="title">BLOG & NEWS</span>
                <h2>We keep you always updated with<br>
                    our fresh blog posts</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="post mb-xl-0 mb-lg-0 mb-md-0 mb-5" data-aos="fade-up" data-aos-duration="550">
                        <img src="assets/images/blog1.jpg" class="img-fluid" alt="Blog">
                        <div class="post_inner p-3">
                            <p class="mb-1">13th March,2019 </p>
                            <h5 class="font-weight-bold">Education breeds confidence. Confidence breeds hope.</h5>
                            <p>Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
                                literature
                                from 45 BC, making it over 2000 years old.</p>
                            <div class="comment d-flex">
                                <span class="mr-3"><i class="fa fa-user mr-3 color-orange"></i>Admin</span>
                                <span class="mr-3"><i class="fa fa-comments mr-3 color-orange"></i>Comments</span>
                            </div>
                            <a href="blog-detail.html" class="btn color-orange read-more mt-3">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post mb-xl-0 mb-lg-0 mb-md-0 mb-5" data-aos="fade-up" data-aos-duration="550">
                        <img src="assets/images/blog_2.jpg" class="img-fluid" alt="Blog">
                        <div class="post_inner p-3">
                            <p class="mb-1">13th March,2019 </p>
                            <h5 class="font-weight-bold">Education is the key to unlock the golden door of freedom.</h5>
                            <p>Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
                                literature
                                from 45 BC, making it over 2000 years old.</p>
                            <div class="comment d-flex">
                                <span class="mr-3"><i class="fa fa-user mr-3 color-orange"></i>Admin</span>
                                <span class="mr-3"><i class="fa fa-comments mr-3 color-orange"></i>Comments</span>
                            </div>
                            <a href="blog-detail.html" class="btn color-orange read-more mt-3">Read More</a>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="post " data-aos="fade-up" data-aos-duration="550">
                        <img src="assets/images/blog_3.jpg" class="img-fluid" alt="Blog">
                        <div class="post_inner p-3">
                            <p class="mb-1">13th March,2019 </p>
                            <h5 class="font-weight-bold">Failure is the opportunity to begin again more
                                intelligently.</h5>
                            <p>Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin
                                literature
                                from 45 BC, making it over 2000 years old.</p>
                            <div class="comment d-flex">
                                <span class="mr-3"><i class="fa fa-user mr-3 color-orange"></i>Admin</span>
                                <span class="mr-3"><i class="fa fa-comments mr-3 color-orange"></i>Comments</span>
                            </div>
                            <a href="blog-detail.html" class="btn color-orange read-more mt-3">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog -->
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
<!-- footerscript here -->
<?php if (!file_exists("Templates/FooterScript.php")): ?>
  <?php die("Access not Aallowed"); ?>
  <?php else: ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
