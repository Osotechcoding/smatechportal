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
    <title>School News :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
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
        <h1 class="font-weight-bold text-center">Our Newsletters</h1>
    </section>
    <!-- end inner-banner -->
    <!-- start blog -->
    <section class="blog-block">
        <div class="container">
            <div class="sec-title text-center mb-3" data-aos="fade-up" data-aos-duration="1000">
                <span class="title">BLOG & NEWS</span>
                <h2>We keep you always updated with</h2>
                <div class="divider">
                    <span class="fa fa-mortar-board"></span>
                </div>
            </div>
            <div class="row">
              <?php
$all_blogs_posted = $Osotech->get_all_active_blogs_post();
if ($all_blogs_posted) {
  foreach ($all_blogs_posted as $value) {?>
                <div class="col-lg-4 col-md-6 mb-5">
                    <div class="post" data-aos="fade-up" data-aos-duration="1000">
                        <img class="img-fluid" src="eportal/news-images/<?php echo $value->blog_image;?>" alt="Blog">
                        <div class="post_inner p-3">
                            <p class="mb-1 font-weight-bold"><?php echo date("F j, Y",strtotime($value->created_at)) ?> </p>
                            <h5 class="font-weight-bold"><?php echo $value->blog_title;?></h5>
                            <p><?php
                  if (str_word_count($value->blog_content) >= 50) {
                  echo substr($value->blog_content,0,100)."...";
                  ?><?php
                  }else{
                    echo $value->blog_content;
                  }
                  ?></p>
                            <div class="comment d-flex">
                                <span class="mr-3"><i class="fa fa-user mr-3 color-orange"></i>Admin</span>
                                <span class="mr-3"><i class="fa fa-comments mr-3 color-orange"></i><?php echo $value->category_id;?></span>
                            </div>
                            <a class="btn color-orange read-more mt-3" href="blog-detail?bId=<?php echo $value->blog_id;?>&action=view">Read More</a>
                        </div>
                    </div>
                </div>
                <?php
    // code...
  }
}else{
  echo '<div class="alert alert-danger text-center"> <h3> Sorry :) There are no Blog to display at the moment!</h3></div>';
}

   ?>


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
</div>
<!-- ===============jQuery Frameworks============= -->
<?php if (file_exists("Templates/FooterScript.php")): ?>
    <?php include_once 'Templates/FooterScript.php'; ?>
<?php endif; ?>
</body>

</html>
