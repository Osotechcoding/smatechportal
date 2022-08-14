<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Frontpage Image Slider</title>
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
                  <li class="breadcrumb-item active"> Front Page Sliders
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-image fa-1x"></span> IMAGE SLIDERS</h3>
  </div>
          </div>
           <!-- Statistics Cards Starts -->
    <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-camera fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Recent Upload</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countGalleryByType('gallery');?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-6 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-image fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Sliders </h3></div>
                  <h2 class="text-white mb-0"><?php echo $Blog->countGalleryByType('yearbook');?></h2>
                  
                </div>
              </div>
            </div>

              
          </div>
        </div>
      </div>
           <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-header">
          <button type="button" class="btn btn-dark btn-lg btn-rounded" data-toggle="modal" data-target="#addSliderModal"><span class="fa fa-camera fa-1x"></span> Add Slider</button>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-bordered">
        <thead class="text-center">
          <tr>
          <th>Image</th>
          <th>Title</th>
          <th>Description</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <?php 
                $all_sliders = $Blog->getAllSliders();
                if ($all_sliders) {
                  foreach ($all_sliders as $slider) {
                    ?>
          <tr>
            <td><img src="../gallery/Sliders/<?php echo $slider->image;?>" alt="<?php echo $slider->title;?>" width="100"></td>
          <td><?php echo ucwords($slider->title);?></td>
          <td><?php echo ucfirst($slider->slider_desc);?></td>
         <td> <button type="button" class="btn btn-danger btn-md delete_slider_btn __loadingBtn2__<?php echo $slider->id;?>" data-id="<?php echo $slider->id;?>">Delete</button> </td>
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
   <div class="modal fade" id="addSliderModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-camera fa-1x"></span> Add New Image Slider</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="addNewSliderModalForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                    <div class="col-md-12">
                     <div class="form-group">
                  <label for="sliderImage">Image <span class="text-danger">(jpg format Only; Max Size 200KB ; Dimension 1920 * 960)</span></label>
                <input type="file" class="form-control form-control-lg" id="sliderImage" name="sliderImage" onchange="previewFile(this);">
                    </div>
                    <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="200" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:10px;">
  <p>Your File Size: <span id="ImageSize"></span></p> 
</div>
                  </div>
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="slider_title">Slider Title</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="slider_title" placeholder="Education is Light">
                    </div>
               </div>
                <div class="col-md-12">
                  <div class="form-group">
                  <label for="slider_desc">Slider Description</label>
                <textarea autocomplete="off" class="form-control form-control-lg" name="slider_desc" placeholder="Slider Content goes here..."></textarea> 
                    </div>
               </div>
               
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="auth_code"> Authentication Code</label>
              <input type="password" autocomplete="off" class="form-control form-control-lg" name="auth_code" placeholder="*********">
                    </div>
               </div>
            
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                <input type="hidden" name="action" value="upload_newSliders">
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
      const delete_slider_btn = $(".delete_slider_btn");
      delete_slider_btn.on("click", function(){
        let Id = $(this).data("id");
        let action = 'delete_slider';
         let is_true = confirm("Are you Sure you want to Remove this Image?");
      if (is_true) {
        $(".__loadingBtn2__"+Id).html('<img src="../assets/loaders/rolling_loader.svg" width="20"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,tId:Id},function(response){
          setTimeout(()=>{
            $(".__loadingBtn2__"+Id).html("Delete").attr("disabled",false);
            $("#server-response").html(response);
          },500);
        });
      }else{
        return false;
      }
      })
//when view btn is clicked
     $("#addNewSliderModalForm").on("submit",function(event){
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
        var file = $("#sliderImage").get(0).files[0];
 
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