<?php 
require_once "helpers/helper.php";
 ?>
 <?php 
if (isset($_GET['student-data']) && $_GET['student-data']!="") {
  
  $studentId = $Configuration->Clean($_GET['student-data']);
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
    <title><?php echo $SmappDetails->school_name ?> :: Update <?php echo ucwords($student_data->full_name);?> Information</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['STAFF_ROLE'] ?></a>
                  </li>
                  <li class="breadcrumb-item active"> <?php echo ucwords($student_data->full_name);?> Info
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"> <b class="text-muted"><?php echo ucwords($student_data->full_name);?>'s</b> Profile </h3>
  </div>
    </div>
    <!-- Dropdown Buttons options -->
    <div class="row">
      <div class="col-md-10 offset-md-2 offset-sm-2">
        <div class="col-md-10 col-12">
      <div class="card">
        <!-- <div class="card-header">
          <h4 class="text-uppercase text-center">STUDENT UPDATE FORM</h4>
        </div> -->
        <div class="card-body">
          <form class="form form-horizontal" id="student_update_form">
            <div class="form-body">
              <center>
                <?php if ($student_data->stdPassport ==NULL || $student_data->stdPassport ==""): ?>
    <img src="../author.jpg" width="200" alt="photo" style="border-radius: 30px;border:3px solid darkblue;">
      <?php else: ?>
<img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="200" alt="photo" style="border-radius:10px; border: 2px solid grey;">
    <?php endif ?>
              </center>
              <br>
              <div class="row">
                <input type="hidden" name="action" value="update_student_data">
                <input type="hidden" name="studentId" value="<?php echo $student_data->stdId;?>">
                
                <div class="col-md-4">
                  <label>SurName:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="surname" value="<?php echo $student_data->stdSurName;?>" placeholder="SurName">
                </div>
                <div class="col-md-4">
                  <label>FirstName:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $student_data->stdFirstName;?>">
                </div>
                <div class="col-md-4">
                  <label>LastName:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="lname" placeholder="First Name" value="<?php echo $student_data->stdMiddleName;?>">
                </div>
                <div class="col-md-4">
                  <label>Account Email:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Email" readonly value="<?php echo $student_data->stdEmail;?>">
                </div>
                 <div class="col-md-4">
                  <label>Student Home Address:</label>
                </div>
                <div class="col-md-8 form-group">
                  <textarea name="address" class="form-control" placeholder="Write student address"><?php echo $student_data->stdAddress;?></textarea>
                </div>
                <div class="col-md-4">
                  <label>Admission No:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="admission_no" placeholder="Admission No" value="<?php echo $student_data->stdRegNo;?>" readonly>
                </div>
                 <div class="col-md-4">
                  <label>Date Of Birth:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php echo $student_data->stdDob;?>">
                </div>
                 <div class="col-md-4">
                  <label>Current Class:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="studenClass" placeholder="JSS 1 A" readonly value="<?php echo $student_data->studentClass;?>">
                </div>
                 <div class="col-md-4">
                  <label>Change Student Class To:</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="presentClass" class="form-control custom-select">
                    <option value="<?php echo $student_data->studentClass;?>" selected><?php echo $student_data->studentClass ?></option>
                  <?php echo $Administration->get_classroom_InDropDown_list();?>
                  </select>
                </div>
                 <div class="col-md-4">
                  <label>Gender:</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="gender" class="form-control custom-select">
                    <option value="<?php echo $student_data->stdGender ?>" selected><?php echo $student_data->stdGender;?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Portal Username:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="pusername" placeholder="Portal Username" value="<?php echo $student_data->stdUserName;?>" readonly>
                </div>
                <div class="col-12 col-md-8 offset-md-4 form-group">
                  <fieldset>
                    <div class="col-md-6">
                      <input type="text" class="form-control" name="approved" placeholder="Authentication Code">
                      <label >Pls Authenticate This Update</label>
                    </div>
                  </fieldset>
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__">Save Changes</button>
                   <a href="./mystudents"> <button type="button" class="btn btn-danger btn-lg">Back</button></a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
      </div>
    </div>
          <!-- Dropdown Buttons options -->
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
        const student_update_form = $("#student_update_form");
        student_update_form.on("submit", function(event){
          event.preventDefault();
         // alert("Yes");
           $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
           $.post("../actions/update_actions",student_update_form.serialize(),function(data){
            setTimeout(()=>{
              $(".__loadingBtn__").html('Save Changes').attr("disabled",false);
              $("#server-response").html(data);
            },1000);
           });
        })
       })
     </script>
  </body>
  <!-- END: Body-->
</html>