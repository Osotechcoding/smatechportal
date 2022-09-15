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
          <?php
$all_blogs_posted = $Osotech->show_all_recent_active_blogs_post();
if ($all_blogs_posted) {
foreach ($all_blogs_posted as $value) {?>
            <div class="col-md-4">
                <div class="post mb-xl-0 mb-lg-0 mb-md-0 mb-5" data-aos="fade-up" data-aos-duration="550">
                    <img src="./eportal/news-images/<?php echo $value->blog_image;?>" class="img-fluid" alt="Blog">
                    <div class="post_inner p-3">
                        <p class="mb-1"><?php echo date("F j, Y",strtotime($value->created_at)) ?> </p>
                        <h5 class="font-weight-bold"><a href="blog-detail?bId=<?php echo $value->blog_id;?>&action=view"><?php echo $value->blog_title;?></a> </h5>
                        <p class="lead"><?php
              if (str_word_count($value->blog_content) >= 50) {
              echo substr(nl2br($value->blog_content),0,100)."...";
              ?><?php
              }else{
                echo nl2br($value->blog_content);
              }
              ?></p>
                        <div class="comment d-flex">
                            <span class="mr-3"><i class="fa fa-user mr-3 color-orange"></i>Admin</span>
                            <span class="mr-3"><i class="fa fa-comments mr-3 color-orange"></i><?php echo $value->category_id;?></span>
                        </div>
                        <a href="blog-detail?bId=<?php echo $value->blog_id;?>&action=view" class="btn color-orange read-more mt-3">Read More</a>
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
