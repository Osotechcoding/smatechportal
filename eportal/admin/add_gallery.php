<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: School Event Gallery</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?> </a>
                  </li>
                  <li class="breadcrumb-item active"> School Events Gallery
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-image fa-1x"></span> SCHOOL GALLERY</h3>
  </div>
          </div>
           <!-- Statistics Cards Starts -->
    <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-camera fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">School Gallery</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countGalleryByType('gallery');?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-graduation-cap fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Students Yearbook </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countGalleryByType('yearbook');?></h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-camera-retro fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">All Gallery </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countAllGallery();?></h2>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
           <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-rounded" data-toggle="modal" data-target="#addGalleryModal"><span class="fa fa-camera fa-1x"></span> Add Gallery</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>Image</th>
          <th>Desc</th>
          <th>Type</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <?php 
                $all_gallery = $Blog->getAllGallery();
                if ($all_gallery) {
                  foreach ($all_gallery as $gallery) {
                   
                    ?>
          <tr>
            <td><img src="../gallery/<?php echo $gallery->image;?>" alt="<?php echo $gallery->type;?>" width="100"></td>
          <td><?php echo ucwords($gallery->title);?></td>
          <td><?php echo ucfirst($gallery->type);?></td>
         <td> <button type="button" class="btn btn-danger btn-md delete_gallery_btn __loadingBtn2__<?php echo $gallery->id;?>" data-id="<?php echo $gallery->id;?>">Delete</button> </td>
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
    </div>
    <!-- END: Content-->
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
   <!-- BUS MODAL Start -->
   <div class="modal fade" id="addGalleryModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-md">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-camera fa-1x"></span> Add Event Gallery</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="addNewGalleryModalForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="form-group">
                  <label for="lecture_mp4">Event Image <span class="text-danger">(png,jpg or jpeg format Only; Max Size 200KB)</span></label>
                <input type="file" class="form-control form-control-lg" id="galleryImage" name="galleryImage" onchange="previewFile(this);">
                    </div>
                    <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="200" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Your File Size: <span id="ImageSize"></span></p> 
</div>
                  </div>
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="gallery_desc">Gallery Desc</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="gallery_desc" placeholder="School End of the Year Party">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="galleryType"> Type </label>
                <select name="galleryType" id="galleryType" class="form-control form-control-lg">
                  <option value="" selected>Choose...</option>
                <option value="yearbook">Student Yearbook</option>
                <option value="gallery">School Gallery</option>
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
                <div class="modal-footer">
                <input type="hidden" name="action" value="upload_newGallery">
                   <button type="submit" class="btn btn-dark ml-1 btn-lg __loadingBtn__">
                    Submit</button>
                 <button type="button" class="btn btn-danger ml-1 btn-lg" data-dismiss="modal">
                    <span class="fa fa-power-off"> Close</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->

    
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
  
   <script>
     $(document).ready(function(){
      //when the delete gallery btn is clicked
      const delete_gallery = $(".delete_gallery_btn");
      delete_gallery.on("click", function(){
        let tId = $(this).data("id");
        let action = 'delete_gallery';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+tId).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,tId:tId},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+tId).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#addNewGalleryModalForm").on("submit",function(event){
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
      setTimeout(()=>{
         $(".__loadingBtn__").html('Submit').attr("disabled",false);
        //$("#addNewGalleryModalForm")[0].reset();
        $("#server-response").html(data);
       // alert(data);
      },500);
    }

  });
})
     })
   </script>

   <script>
    function previewFile(input){
        var file = $("#galleryImage").get(0).files[0];
 
        if(file){
            var reader = new FileReader();
 
            reader.onload = function(){
                $("#previewImg").attr("src", reader.result);
                //$("#imagename").html(file.name);
                $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
            }
 
            reader.readAsDataURL(file);
        }
    }
</script>
  </body>
  <!-- END: Body-->

</html>