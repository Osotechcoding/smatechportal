<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: School News</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <?php include ("template/Sidebar.php"); ?>
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__;?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Upload News
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comments-o fa-1x"></span> THE SCHOOL NEWS</h3>
  </div>
</div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
   <!-- Statistics Cards Starts -->
        <div class="row">
        <div class="col-xl-12 col-md-12">
          <div class="row">
           <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-edit fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Latest</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Blog->CountLatestBlogs();?></h2>
                </div>
              </div>
            </div>
             
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-comments fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Comments</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countAllBlogsComments();?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-edit fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Blogs</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countAllBlogs();?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Revenue Growth Chart Starts -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-round" data-toggle="modal" data-target="#uploadNewsModal"><span class="fa fa-edit fa-1x"></span> Upload Blogs</button> 
        </div>
        <div class="card-body card-dashboard">
       <div class="text-center" id="response"></div>
        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th>Title</th>
                  <th>Category</th>
                  <th>Content</th>
                  <th>Posted On</th>
                  <th>Comments</th>
                  <th>Views</th>
                  <th>Options</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $all_blogs = $Blog->get_all_active_blogs_post();
                if ($all_blogs) {
                  foreach ($all_blogs as $values) {
                    $count_comment = $Blog->count_blog_comment_by_blogId($values->blog_id);
                    ?>
                    <tr>
                  <td><?php echo ucwords($values->blog_title);?></td>
                  <td><?php echo ucwords($values->category_id);?></td>
                  <td> <?php 
                  if (str_word_count($values->blog_content)>'20') {
                  echo substr($values->blog_content,0,20)."...";
                  echo '<span class="badge badge-warning badge-md badge-pill view_blog_details_btn" style="cursor:pointer;" data-info="'.$values->blog_content.'">Read More</span>';
                  }else{
                    echo $values->blog_content;
                  }
                  ?></td>
                  <td><?php echo date("F j,  Y",strtotime($values->created_at));?></td>
                  <td><span class="badge badge-dark badge-rounded badge-lg"><?php echo $count_comment;?> </span></td>
                  <td><span class="badge badge-pill badge-info badge-md"><?php echo ($values->total_view > 0 ) ? $values->total_view : '0';?> </span></td>
                  <td><div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-warning">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
            <a class="dropdown-item text-info" href="blogedit?blogId=<?php echo $values->blog_id;?>&action=edit"><span class="fa fa-edit mr-1"></span>Edit Blog</a>
              <a class="dropdown-item text-danger" href="blogcomments?blogId=<?php echo $values->blog_id;?>&action=view"><span class="fa fa-comments-o mr-1"></span> View Comments</a>
              <a class="dropdown-item text-warning" href="javascript:void(0);"><span class="fa fa-edit mr-1"></span> Blog Status</a>

              <div class="dropdown-divider"></div>
              <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash mr-1"></span> Delete</a>
            </div>
          </div></td>
                </tr>
                    <?php
                  }
                }
                 ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
    <!-- BUS MODAL Start -->
   <div class="modal fade" id="uploadNewsModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-edit fa-1x"></i> Upload School News</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="schoolBlogNewsForm" enctype="multipart/form-data">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                     <div class="col-md-12">
                  <div class="form-group">
                  <label for="blogTitle">Title</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="blogTitle" placeholder="Common Errors in English Language">
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="blogCat">Category</label>
                <select name="blogCat" id="blogCat" class="select2 form-control">
                 <option value="" selected>Choose...</option>
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
                  <option value="">Choose...</option>
                <option value="Marriage">Marriage</option>
                <option value="Education">Education</option>
                <option value="Culture">Culture</option>
               </select>
                    </div>
               </div>
              <!--  -->
              <div class="col-12 mt-1">
                      <fieldset class="form-label-group mb-0">
                          <textarea data-length=63000 class="form-control char-textarea" id="textarea-counter" rows="5" placeholder="News content goes here... (Max Character (63000))" name="blogContent"></textarea>
                          <label for="textarea-counter">Blog/News Content (Max Character (63000))</label>
                      </fieldset>
                      <small class="counter-value float-right"><span class="char-count">0</span> / 63000 </small>
                  </div>
              <!--  -->

                 
                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="blogImage">News Image <span class="text-danger">(png,jpg or jpeg format Only)</span></label>
                <input type="file" class="form-control form-control-lg" id="blogImage" name="blogImage" onchange="previewFile(this);">
                    </div>
                    <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="200" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Selected Image Size: <span id="ImageSize"></span></p> 
</div>
                  </div>
                  
                  <div class="col-md-6">
                  <div class="form-group">
                  <label for="blogstatus"> status</label>
               <select name="blogstatus" id="blogstatus" class="form-control form-control-lg">
                  <option value="" selected>Choose...</option>
                <option value="2">Publish Now</option>
                <option value="1">Pending</option>
               </select>
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="auth_code"> Authentication Code</label>
              <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*********">
                    </div>
               </div>
                 </div>
                  </div>
                </div>
                
                <input type="hidden" name="postedBy" value="<?php echo $_SESSION['ADMIN_TOKEN_ID'];?>">
                <input type="hidden" name="action" value="upload_blog_news">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                     Upload Now
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                    Back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
    
    <!--Modal Read Instruction Starts -->
          <div class="modal fade text-left" id="ReadInstructModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Blog Details</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="modal-body">
                  <p class="mb-0" id="blog_details_details"></p>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   Close
                  </button>
                </div>
              </div>
            </div>
          </div>
    <!-- Modal Read Instruction ends -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script type="text/javascript">

$(document).ready(function(){
//when a delete btn is clicked
const delete_btn = $(".delete_btn");
delete_btn.on("click", function(){
  let lectureId = $(this).data("value");
  let action = $(this).data("action");
  let is_true = confirm("Are you sure you wanto permanently remove this file?");
  if (is_true) {
$.post("../actions/delete_actions",{action:action,lectureId:lectureId}, function(res){
    setTimeout(()=>{
      $("server-response").html(res);
    },500);
  })
  }else{
    return false;
  }
})
  //when view btn is clicked
  const view_btn = $(".view_blog_details_btn");
  view_btn.on("click", function(){
     let blog_details = $(this).data("info");
      $("#blog_details_details").html(blog_details);
    $("#ReadInstructModal").modal("show");
  })

$("#schoolBlogNewsForm").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/actions",
    type:"POST",
    data: new FormData(this),
    contentType:false,
    cache:false,
    processData:false,
    beforeSend(){
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Uploading...').attr("disabled",true);
    },
    success:function(data){
      console.log(data)
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit Lecture').attr("disabled",false);
        $("#schoolBlogNewsForm")[0].reset();
        $("#server-response").html(data);
        //alert(data);
      },500);
    }

  });
})
})
    </script>
<script>
    function previewFile(input){
        var file = $("#blogImage").get(0).files[0];
 
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