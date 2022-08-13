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
        <h1 class="font-weight-bold text-center">Results</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start search result -->
    <section class="result">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">Result</span>
                <h2>Find a Career Achievment</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" data-aos="fade-up" data-aos-duration="1050">
                    <form>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="exampleInputEnroll">Your Name</label>
                                <input type="text" class="form-control" id="exampleInputEnroll"
                                       placeholder="Enter Your Enrolement Number">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputStd">Standard</label>
                                <select id="inputStd" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>Position 1</option>
                                    <option>Position 2</option>
                                    <option>Position 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="inputYear">Year</label>
                                <select id="inputYear" class="form-control">
                                    <option selected>Choose...</option>
                                    <option>2019</option>
                                    <option>2018</option>
                                    <option>2017</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-row justify-content-center">
                            <a href="javascript:" class="btn theme-orange read-more mt-3">Get Result <i
                                    class="fa fa-long-arrow-alt-right pl-2 fa-1x"></i></a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </section>
    <!-- end search result -->
    <!-- start result -->
    <section class="result-box">
        <div class="container">
            <h2 class="font-weight-bold  text-center">Here Your Result</h2>
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <thead>
                            <tr>
                                <th scope="col">Course Title</th>
                                <th scope="col">Grade</th>
                                <th scope="col">Credits</th>
                                <th scope="col">Terms</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>Web Development</td>
                                <td>A+</td>
                                <td>4.00</td>
                                <td>2019</td>
                            </tr>
                            <tr>
                                <td>Web Design</td>
                                <td>A</td>
                                <td>5.00</td>
                                <td>2019</td>
                            </tr>
                            <tr>
                                <td>Business Analysis</td>
                                <td>A+</td>
                                <td>4.00</td>
                                <td>2019</td>
                            </tr>
                            <tr>
                                <td>Mobile Development</td>
                                <td>B+</td>
                                <td>3.00</td>
                                <td>2019</td>
                            </tr>
                            <tr>
                                <td>Business Management</td>
                                <td><A></A></td>
                                <td>4.00</td>
                                <td>2019</td>
                            </tr>
                            <tr>
                                <td>UI/UX Design</td>
                                <td>A+</td>
                                <td>5.00</td>
                                <td>2019</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end result -->
    <!-- start result showcase -->
    <section class="result-list">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="sec-title mb-3" data-aos="fade-up" data-aos-duration="1000">
                        <span class="title">Result</span>
                        <h2>Result Showcase</h2>
                        <div class="divider">
                            <span class="fa fa-mortar-board"></span>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="autoplay">
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_1.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_1.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_2.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_2.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_3.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_3.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_4.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_4.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_4.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_4.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                        <div class="result_img m-2" data-aos="zoom-in" data-aos-duration="1000">
                            <img src="assets/images/course_5.png" class="img-fluid" alt="Result">
                            <div class="overlay"></div>
                            <div class="overlay-text">
                                <a href="assets/images/course_5.png" data-fancybox="gallery"><i class="fa fa-plus fa-2x"></i></a>
                                <h5 class="font-weight-bold">Result</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end result showcase -->
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
