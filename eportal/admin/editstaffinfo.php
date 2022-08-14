<?php 
require_once "helpers/helper.php";
 ?>
 <?php 
if (isset($_GET['staffdata']) && $_GET['staffdata']!="") {
  
  $staffId = $Configuration->Clean($_GET['staffdata']);
  $staff_data = $Staff->get_staff_ById($staffId);
  if ($staff_data) {
    // code...
  }else{
     header("Location: staffs");
  exit();
  }
}else{
  header("Location: staffs");
  exit();
}

  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Update <?php echo ucwords($staff_data->full_name);?> Information</title>
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
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'] ?></a>
                  </li>
                  <li class="breadcrumb-item active"> <?php if ($staff_data->staffGender =="Male"): ?>
                  <?php $tTitle = "Mr. ";?>
                    <?php else: ?>
                      <?php $tTitle = "Mrs. ";?>
                  <?php endif ?> <?php echo $tTitle."". ucwords($staff_data->full_name);?> Info
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><?php if ($staff_data->staffPassport==NULL || $staff_data->staffPassport==""): ?>
    <img src="../author.jpg" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
      <?php else: ?>
        <img src="../schoolImages/staff/<?php echo $staff_data->staffPassport;?>" width="100" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
    <?php endif ?> <b class="text-muted"><?php echo $tTitle."". ucwords($staff_data->full_name);?>'s</b> Profile </h3>
  </div>
    </div>
    <!-- Dropdown Buttons options -->
    <div class="row">
      <div class="col-md-12">
        <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
          <h4 class="text-uppercase text-center">STAFF UPDATE FORM</h4>
        </div>
        <div class="card-body">
          <form class="form form-horizontal" id="staff_update_form">
            <div class="form-body">
              <div class="row">
                <input type="hidden" name="action" value="update_staff_data">
                <input type="hidden" name="sttId" value="<?php echo $staff_data->staffId;?>">
                <div class="col-md-4">
                  <label>SurName:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="surname" value="<?php echo $staff_data->lastName;?>" placeholder="SurName">
                </div>
                <div class="col-md-4">
                  <label>FirstName LastName</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="fname" placeholder="First Name" value="<?php echo $staff_data->firstName;?>">
                </div>
                  <div class="col-md-4">
                  <label>Phone Number</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="phone" placeholder="First Name" value="<?php echo $staff_data->staffPhone;?>">
                </div>
          
                <div class="col-md-4">
                  <label> Email:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="email" id="email-id" class="form-control" name="email-id" placeholder="Email" readonly value="<?php echo $staff_data->staffEmail;?>">
                </div>
                 <div class="col-md-4">
                  <label> Address:</label>
                </div>
                <div class="col-md-8 form-group">
                  <textarea name="address" class="form-control" placeholder="Write address"><?php echo $staff_data->staffAddress;?></textarea>
                </div>
                <div class="col-md-4">
                  <label>REGISTRATION NO:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="admission_no" placeholder="Admission No" value="<?php echo $staff_data->staffRegNo;?>" readonly>
                </div>
                 <div class="col-md-4">
                  <label>Staff Role:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="admission_no" placeholder="Staff Role" value="<?php echo $staff_data->staffRole;?>" readonly>
                </div>
                 <div class="col-md-4">
                  <label>Staff Type:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="staffType" placeholder="Staff Role" value="<?php echo $staff_data->staffType;?>" readonly>
                </div>
                 <div class="col-md-4">
                  <label>Date Of Birth:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="date" class="form-control" name="dob" placeholder="Date of Birth" value="<?php echo $staff_data->staffDob;?>">
                </div>
                 <div class="col-md-4">
                  <label>Assigned To:</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="presentClass" class="form-control select2">
                    <option value="<?php echo $staff_data->staffGrade;?>" selected><?php echo $staff_data->staffGrade ?></option>
                  <?php echo $Administration->get_classroom_InDropDown_list();?>
                  </select>
                </div>
                 <div class="col-md-4">
                  <label>Gender:</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="gender" class="form-control custom-select">
                    <option value="<?php echo $staff_data->staffGender ?>" selected><?php echo $staff_data->staffGender;?></option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Level of Education:</label>
                </div>
                <div class="col-md-8 form-group">
                  <select name="education" class="form-control custom-select">
                    <option value="<?php echo $staff_data->staffEducation ?>" selected><?php echo $staff_data->staffEducation;?></option>
                   <option value="Pry">Pry Schl Cert</option>
                    <option value="OLEVEL">O'Level</option>
                    <option value="OND">OND </option>
                    <option value="NCE">NCE</option>
                    <option value="HND">HND</option>
                    <option value="BSc">BSc </option>
                    <option value="Phd">Phd</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label>Portal Username:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="text" class="form-control" name="pusername" placeholder="Portal Username" value="<?php echo $staff_data->staffUser;?>">
                </div>
                 <div class="col-md-4">
                  <label>Authentication Code:</label>
                </div>
                <div class="col-md-8 form-group">
                  <input type="password" autocomplete="off" class="form-control" name="approved" placeholder="Pls authenticate this update">
                </div>
                <div class="col-sm-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__">Save Changes</button>
                  <a href="./staffs"><button type="button" class="btn btn-danger btn-lg">Go Back</button></a>
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
        const student_update_form = $("#staff_update_form");
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