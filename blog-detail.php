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
                        <p class="mr-3"><i class="fa fa-calendar mr-1"></i> <?php echo date("F jS, Y",strtotime($blog_details->created_at)) ?></p>
                        <p class="mr-3"><i class="fa fa-comments mr-1"></i> 0</p>
                    </div>
                    <div class="blog-title">
                        <h2 class="font-weight-bold mb-3"><?php echo $blog_details->blog_title;?></h2>
                    </div>
                    <div class="blog-desc">
                        <p style="font-size: 18px"><?php echo nl2br($blog_details->blog_content) ;?></p>
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
                        <h6 class="text-uppercase font-weight-bold mb-3"> <?php echo $Osotech->countBlogComments($blog_details->blog_id,"1");?> Comments</h6>
                        <?php 
                        $getApprovedComments = $Osotech->get_all_approved_blog_comments($blog_details->blog_id);
                        if ($getApprovedComments) {
                          foreach ($getApprovedComments as $comment) {?>
                             <div class="media">
                            <img src="assets/images/comment-image.png" width="50" alt="John Doe" class="mr-3 rounded-circle">
                            <div class="media-body">
                                <div class="user d-flex justify-content-between">
                                    <h6 class="font-weight-bolder"><?php echo ucwords($comment->guestName);?></h6>
                                    <a href="javascript:void(0);">Reply</a>
                                </div>
                                <p>Posted on <b><?php echo date("F j, Y",strtotime($comment->comment_date)) ?> @ <?php echo date("h:i:s a",strtotime($comment->comment_date)) ?></b></p>
                                <p><span class="fa fa-bullhorn"></span> <em><?php echo nl2br($comment->comment);?></em></p>
                            </div>
                        </div>
                             <?php
                          }
                        }else {
                            echo $Osotech->alert_msg("warning","Notice","Be the first to comment on this Post");
                        }

                         ?>
                       
                        <div class="comment-area">
                      <div class="comment-full">
                          <h3 class="reply-title text-danger">Let's hear your opinion</h3>
                            <p>
                              <span>Your email address will not be published. Required fields are marked </span>
                            </p>
                            <form id="blogCommentForm" class="comment-form">
                                <div class="text-center" id="server-response"></div>
                                <div class="row">
                                    <div class="col-md-6 col-sm-12">
                                        <input type="hidden" name="blogId" value="<?php echo $blog_details->blog_id;?>">
                                        <div class="form-group">
                                            <label>Name*</label>
                                            <input autocomplete="off" name="commenter_name" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input autocomplete="off" name="commenter_email" type="text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-sm-12 mb-35">
                                        <div class="form-group">
                                            <label>Your comment here...</label>
                                            <textarea name="comment_msg" class="textarea form-control"></textarea>
                                        </div>
                                    </div>
                                </div>
                                 <div class="submit-btn">
                                    <input type="hidden" name="action" value="submit_blog_comment_">
                                <button class="btn btn-dark btn-lg border-0 mt-2 __loadingBtn__" type="submit" style="border-radius: 10px;"> Submit Comment</button>
                            </div>
                            </form>
                           
                      </div>
                   </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="search-blog mb-4">
                        <form>
                            <label class="sr-only" for="">Username</label>
                            <div class="input-group mb-2 mr-sm-2">
                                <input type="text" class="form-control" id=""
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
                        <h6 class="text-uppercase font-weight-bold mb-3">Related Post</h6>
                        <?php $relatedPost = $Osotech->get_all_related_blog_post($blog_details->category_id);
                        if ($relatedPost) {
                            foreach ($relatedPost as $related) {?>

                                 <div class="media">
                            <img src="eportal/news-images/<?php echo $related->blog_image;?>" alt="John Doe" class="mr-3">
                            <div class="media-body">
                                <p class="font-weight-bold mb-2"><a href="blog-detail?bId=<?php echo $related->blog_id;?>&action=view"><?php echo $related->blog_title; ?></a> 
                                    text. </p>
                                <p>Posted on <?php echo date("F jS, Y",strtotime($related->created_at)) ?></p>
                            </div>
                        </div>
                                <?php
                            }
                        }else {
                          echo $Osotech->alert_msg("warning","Notice","There are no related post at the moment!");
                        }
                        ?>
                       


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
    </div>
    <!-- ===============jQuery Frameworks============= -->
    <?php if (!file_exists("Templates/FooterScript.php")): ?>
      <?php die("Access not Aallowed"); ?>
      <?php else: ?>
        <?php include_once 'Templates/FooterScript.php'; ?>
    <?php endif; ?>

<!-- blogCommentForm -->
<script src="osotech_script/dropcomment.js"></script>
</body>

</html>
