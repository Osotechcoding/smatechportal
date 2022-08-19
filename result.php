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
