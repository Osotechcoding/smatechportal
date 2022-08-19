<?php if (!file_exists("Helper.php")) {
  die("Access is Denied!");
} else {
  require 'Helper.php';
}?>


<?php
if (isset($_GET['bId']) && ($_GET['bId'] !="") && isset($_GET['action']) && $_GET['action'] ==="view") {
 $blogId = $_GET['bId'];
 $blog_details = $Osotech->get_blog_ById($blogId);
}else{
  header("Location: ./blog");
  exit();
}

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- ========== Meta Tags ========== -->
  <?php include_once 'Templates/MetaTags.php'; ?>
    <!-- ========== Page Title ========== -->
    <title><?php echo $blog_details->blog_title;?> :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
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
        <h1 class="font-weight-bold text-center"><?php echo $blog_details->blog_title;?></h1>
    </section>
    <!-- end inner banner -->
    <!-- start blog -->
    <section class="blog-detail">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="blog-img">
                        <img src="eportal/news-images/<?php echo $blog_details->blog_image;?>" class="img-fluid" alt="Blog">
                    </div>
                    <div class="blog-post d-flex pt-3">
                        <p class="mr-3"><i class="fa fa-calendar mr-1"></i> <?php echo date("F j, Y",strtotime($blog_details->created_at)) ?></p>
                        <p class="mr-3"><i class="fa fa-comments mr-1"></i> 10 comments</p>
                    </div>
                    <div class="blog-title">
                        <h4 class="font-weight-bold mb-3"><?php echo $blog_details->blog_title;?></h4>
                    </div>
                    <div class="blog-desc">
                        <p><?php echo $blog_details->blog_content;?></p>
                    </div>
                    <div class="tags py-3">
                        <h6 class="text-uppercase font-weight-bold">Tags</h6>
                        <a href="#" class="btn btn-light mb-2 mr-2">Design</a>
                    </div>
                    <div class="share">
                        <h6 class="text-uppercase font-weight-bold mb-3">Share</h6>
                        <ul class="social-icon pl-0">
                            <li><a href="#"><i class="fa fa-facebook-f"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                    <div class="comments">
                        <h6 class="text-uppercase font-weight-bold mb-3">Comments</h6>
                        <div class="media">
                            <img src="assets/images/1.png" alt="John Doe" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <div class="user d-flex justify-content-between">
                                    <h6 class="font-weight-bolder">John Doe</h6>
                                    <a href="#">Reply</a>
                                </div>
                                <p>Posted on February 19, 2016</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt
                                    ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                            </div>
                        </div>
                        <div class="comment-area">
                      <div class="comment-full">
                          <h3 class="reply-title">Leave a Reply</h3>
                            <p>
                              <span>Your email address will not be published. Required fields are marked </span>
                            </p>
                            <form id="contact-form" class="comment-form">
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-35">
                                        <div class="form-group">
                                            <label>Your comment here...</label>
                                            <textarea class="textarea form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="submit-btn">
                                <button type="button" class="btn btn-primary btn-md rounded ms-2">Post Comment</button>
                            </div>
                      </div>
                   </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search-blog mb-4">
                        <form>
                            <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" id="inlineFormInputGroupUsername2"
                                       placeholder="Search">
                                <div class="input-group-prepend border-0">
                                    <div class="input-group-text theme-orange"><i class="fa fa-search"></i></div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="blog-category">
                        <h6 class="text-uppercase font-weight-bold mb-3">Blog Category</h6>
                        <ul class="list-unstyled">
                            <li><a href="#">Web Design</a></li>
                        </ul>
                    </div>
                    <div class="recent-blog ">
                        <h6 class="text-uppercase font-weight-bold mb-3">Recent blog</h6>
                        <div class="media">
                            <img src="assets/images/thumb_6.jpg" alt="John Doe" class="mr-3">
                            <div class="media-body">
                                <p class="font-weight-bold mb-2">Contrary to popular belief.Lorem Ipsum is not simply random
                                    text. </p>
                                <p>Posted on February 19, 2016</p>
                            </div>
                        </div>


                    </div>
                    <div class="tags pt-3">
                        <h6 class="text-uppercase font-weight-bold">Tags</h6>
                        <a href="#" class="btn btn-light mb-2 mr-2">Design</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end blog -->
    <!-- start footer -->
  <?php if (file_exists("Templates/Footer.php")) {
  include_once 'Templates/Footer.php';
  } ?>
    <!-- end footer -->
    <a href="#" id="scroll"><span></span></a>
    <!-- ===============jQuery Frameworks============= -->
    <?php if (!file_exists("Templates/FooterScript.php")): ?>
      <?php die("Access not Aallowed"); ?>
      <?php else: ?>
        <?php include_once 'Templates/FooterScript.php'; ?>
    <?php endif; ?>
</div>
</body>

</html>
