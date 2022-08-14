<?php 
ob_start();
require_once "helpers/helper.php";
 ?>
 <?php 

if (isset($_GET['blogId']) && $_GET['blogId'] !=="" && isset($_GET['action']) && $_GET['action'] ==="edit") {
  $blogId = $Configuration->Clean($_GET['blogId']);
  $blog_details = $Blog->get_blog_ById($blogId);
}else{
  header("Location: uploadblog");
  exit();
}

  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: <?php echo ucwords($blog_details->blog_title); ?> </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Blog Edit
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-edit fa-1x"></span> <?php echo ucwords($blog_details->blog_title); ?> </h3>
  </div>
    </div>
    <div class="col-md-12">
       <div class="card">
        <div class="mt-2">
          <h1 class="text-center"> <?php echo ucwords($blog_details->blog_title); ?></h1>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                  <label for="blogTitle">Blog Title</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="blogTitle" placeholder="Common Errors in English Language" value="<?php echo ($blog_details->blog_title); ?>">
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="blogCat">Blog Category</label>
                <select name="blogCat" id="blogCat" class="select2 form-control">
                 <option value="<?php echo $blog_details->category_id;?>" selected><?php echo $blog_details->category_id;?></option>
               <option value="Inspirational">Inspirational</option>
               <option value="Motivational">Motivational</option>
               <option value="Marriage">Marriage</option>
               <option value="Educational">Educational</option>
               <option value="Culture">Culture</option>
               </select>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">

                  <label for="tags">Tags</label>
               <select name="tags[]" id="tags" class="select2 form-control" multiple>
                 <?php $allTags = explode(",", $blog_details->tags);
                    foreach ($allTags as $tag) {
                     echo '<option value="'.$tag.'" selected>'.$tag.'</option>';
                    }

                    ?>
                <option value="Marriage">Marriage</option>
                <option value="Education">Education</option>
                <option value="Culture">Culture</option>
               </select>
                    </div>
               </div>
                <!-- Blog Content -->
                <div class="col-12 mt-1">
                    <label for="textarea-counter">Blog/News Content</label>
                    <textarea data-length="63000" class="form-control char-textarea" id="textarea-counter" name="blogContent" placeholder="News content goes here..." style="height:350px;"><?php echo $blog_details->blog_content;?></textarea>
                      <small class="counter-value float-right mb-2"><span class="char-count">0</span> / 63000 </small>
                  </div>
                <!-- Blog content -->
                <!-- Image -->
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="lecture_mp4">News Image <span class="text-danger">(png,jpg or jpeg format Only)</span></label>
                <input type="file" class="form-control form-control-lg" name="blogImage" onchange="previewFile(this);">
                    </div>
                    <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="100%" src="../news-images/<?php echo $blog_details->blog_image;?>" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Image Name: <span id="imagename"></span></p> 
  <p>Image Size: <span id="ImageSize"></span></p> 
</div>
                  </div>
                <!--Image  -->
               <!-- status -->
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="blogstatus">blog status</label>
               <select name="blogstatus" id="blogstatus" class="form-control form-control-lg">
                <?php if ($blog_details->blog_status =='1'): ?>
                  <option value="1" selected>Pending</option>
                  <?php else: ?>
                    <option value="2" selected>Published</option>
                <?php endif ?>
                  <option value="">Choose...</option>
                <option value="2">Publish</option>
                <option value="1">Pending</option>
               </select>
                    </div>
               </div>
               <!-- status -->
                <!-- status -->
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="blogstatus">Updated At</label>
             <input type="text" class="form-control" name="update_at" value="<?php echo date("Y-m-d h:i:s a")?>" readonly disabled>
                    </div>
               </div>
               <!-- status -->
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark mr-1 btn-lg">Submit Update</button>
                 <a href="uploadblog"> <button type="button" class="btn btn-danger btn-lg">Back to Blog</button></a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- content goes here -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
     <script>
    function previewFile(input){
        var file = $("input[type=file]").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                $("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
  </body>
  <!-- END: Body-->
</html>