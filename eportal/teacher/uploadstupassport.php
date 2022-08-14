<?php 
require_once "helpers/helper.php";
 ?>
  <?php 
if (isset($_GET['stdRegistrationId']) && $_GET['stdRegistrationId']!="" && isset($_GET['actionId']) && $_GET['actionId']!="") {
  
  $studentId = $Configuration->Clean($_GET['actionId']);
  $student_data = $Student->get_student_data_byId($studentId);
  if ($student_data) {
    // code...
  }else{
     header("Location: mystudents");
  exit();
  }
}else{
  header("Location: mystudents");
  exit();
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Upload Passport for <?php echo ucwords($student_data->full_name);?></title>
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> Portal</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['STAFF_ROLE'] ?></a>
                  </li>
                  <li class="breadcrumb-item active">Upload Passport
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-info text-bold"><?php if ($student_data->stdPassport==NULL || $student_data->stdPassport==""): ?>
    <img src="../author.jpg" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
      <?php else: ?>
        <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="100" alt="photo" style="border-radius: 10px;border: 3px solid darkblue;">
    <?php endif ?> Upload <?php echo ucwords($student_data->full_name);?>'s Passport</h3>
  </div>
    </div>
    <div class="col-md-8 col-12">
      <div class="card">
        <div class="card-body">
          <div class="col-md-12 text-center"> <h5><?php //if (isset($response)): ?>
          <?php //echo $response; ?>
        <?php //endif ?></h5> </div>
          <form class="form form-vertical" id="studentPassport_form" method="post" enctype="multipart/form-data">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <input type="hidden" name="action" value="submit_student_passport">
                    <input type="hidden" name="student_id" id="student_id" value="<?php echo ucwords($student_data->stdId);?>">
                    <label for="first-name-icon">Student Fullname</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" value="<?php echo ucwords($student_data->full_name);?>" readonly>
                      <div class="form-control-position">
                        <i class="bx bx-user"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="email-id-icon">Present Class</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" class="form-control" value="<?php echo strtoupper($student_data->studentClass);?>" readonly>
                      <div class="form-control-position">
                        <i class="bx bx-book-open"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-icon">Admission No</label>
                    <div class="position-relative has-icon-left">
                      <input type="text" id="std_registration_no" class="form-control"value="<?php echo strtoupper($student_data->stdRegNo);?>" readonly>
                      <div class="form-control-position">
                        <i class="bx bx-mobile"></i>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="password-icon">Passport <span class="text-danger">(Max Size: 20KB)</span></label>
                      <input type="file" id="ppassport" class="form-control" name="passport">
                  </div>
                </div>
                 <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-icon">Authentication Code</label>
                    <div class="position-relative has-icon-left">
                      <input type="password" autocomplete="off" id="contact-info-icon" class="form-control" name="auth_code"
                        placeholder="Authentication Code">
                      <div class="form-control-position">
                        <i class="bx bx-lock"></i>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark mr-1 __loadingBtn__">Upload</button>
                 <a href="./mystudents"> <button type="button" class="btn btn-danger">Back</button></a>
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
    <!-- demo chat-->
 
    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
     <script>
       $(document).ready(function(){
      $("#studentPassport_form").on("submit",function(event){
  event.preventDefault();
  $.ajax({
    url:"../actions/update_actions",
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
         $(".__loadingBtn__").html('Upload').attr("disabled",false);
       // $("#video_form")[0].reset();
        $("#server-response").html(data);
        //alert(data);
      },2500);
    }

  });
})

       })
     </script>
  </body>
  <!-- END: Body-->
</html>