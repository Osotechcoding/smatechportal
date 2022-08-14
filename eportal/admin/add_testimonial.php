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
             <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comment fa-1x"></span> WHAT PEOPLE SAY ?</h3>
  </div>
          </div>
           <div class="row mb-2">
             <div class="col-md-12">
               <button type="button" class="btn btn-dark btn-lg btn-rounded" data-toggle="modal" data-target="#addTestimonialModal"><span class="fa fa-plus fa-1x"></span> Add Testimonial</button>
             </div>
           </div>
    <div class="card">
      
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Photo</th>
          <th>Fullname</th>
          <th>Occupation</th>
          <th>Says</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
            <?php 
                $all_testi = $Blog->getAllTestimonials();
                if ($all_testi) {
                  $cnt =0;
                  foreach ($all_testi as $testi) {
                   $cnt++;
                    ?>
          <tr>
            <td><?php echo $cnt;?></td>
            <td><img src="../testimonials/<?php echo $testi->image;?>" width="80" style="border-radius: 50%;"></td>
          <td><?php echo ucwords($testi->fullname);?></td>
          <td><?php echo ucfirst($testi->job);?></td>
          <td><?php echo ucfirst($testi->message);?></td>
         <td> <button type="button" class="btn btn-danger btn-md delete_testi_btn __loadingBtn2__<?php echo $testi->id;?>" data-id="<?php echo $testi->id;?>">Delete</button> </td>
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
   <div class="modal fade" id="addTestimonialModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-comments-o fa-1x"></span> Add what people say</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <form id="addNewTestimonialModalForm" enctype="multipart/form-data" method="post">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
                   
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="testimonial_name">Full Name</label>
                <input type="text" autocomplete="off" class="form-control" name="testimonial_name" placeholder="Smatech Software">
                    </div>
               </div>
                <div class="col-md-12">
                     <div class="form-group">
                  <label for="occupation">Occupation</label>
               <input type="text" placeholder="Teacher" autocomplete="off" class="form-control" name="occupation">
                </div>
              </div>

               <div class="col-md-12">
                     <div class="form-group">
                  <label for="content">Content Message</label>
              <textarea name="content" class="form-control" placeholder="Write Testimonial here..."></textarea>
                </div>
              </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="lecture_mp4">Photo <small class="text-danger">(jpg,png,Max size: 50KB, Dimenssion :70x70 pixels)</small></label>
                <input type="file" class="form-control form-control-lg" id="tImage" name="tImage" onchange="previewFile(this);">
                    </div>
                     <div class="col-md-6 offset-md-3" id="uploaded_passport">
  <img id="previewImg" width="100" height="100" src="../assets/loaders/placeholder.png" alt="Placeholder" style="border: 2px solid darkblue;border-radius:50%;">
  <p>Your File Size: <span id="ImageSize"></span></p> 
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
                <input type="hidden" name="action" value="upload_what_people_say">
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
      const delete_testi = $(".delete_testi_btn");
      delete_testi.on("click", function(){
        let tId = $(this).data("id");
        let action = 'delete_testi';
         let is_true = confirm("Are you Sure you want to Remove this Testimonial?");
      if (is_true) {
        $(".__loadingBtn2__"+tId).html('<img src="../assets/loaders/rolling_loader.svg" width="20">').attr("disabled",true);
        //send request 
        $.post("../actions/delete_actions",{action:action,testiId:tId},function(response){
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
     $("#addNewTestimonialModalForm").on("submit",function(event){
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
        var file = $("#tImage").get(0).files[0];
 
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