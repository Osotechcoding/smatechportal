<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: </title>
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
                  <li class="breadcrumb-item"><a href="#"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                  <li class="breadcrumb-item active">Student Registration Page
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-md-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-briefcase fa-1x"></span> Register Staff Manually </h3>
  </div>
    </div>
    
    <!-- content goes here -->
    <section id="basic-vertical-layouts">
    <div class="col-md-10 col-10 offset-1">
      <div class="card">
        <div class="text-center">
          <h2 class="text-center mt-1">Staff Registration Form</h2>
        </div>
        <div class="card-body">
          <form class="validate-form" id="create_new_staff_form">
        <div class="row">
        <input type="hidden" name="action" value="submit_new_staff">

        <div class="col-12">
        <div class="form-group">
        <div class="controls">
        <label>Surname</label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="Surname"
        name="sname">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>First Name </label>
        <input autocomplete="off" type="text" class="form-control"
        placeholder="First Name" name="fname">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Middle Name</label>
        <input autocomplete="off" type="text"
        class="form-control"
        placeholder="Middle Name"
        name="mname">
        </div>
        </div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
        <div class="controls">
        <label>E-mail</label>
        <input autocomplete="off" type="text"
        class="form-control"
        placeholder="E-mail"
        name="semail">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Mobile</label>
        <input autocomplete="off" type="number"
        class="form-control"
        placeholder="Mobile"
        name="mphone">
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Password</label>
        <input autocomplete="off" type="text"
        class="form-control"
        placeholder="Portal Password" name="mpassword" value="staff123" readonly>
        </div>
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Level of Education</label>
        <select name="education" id="education" class="custom-select form-control">
        <option value="" selected>Choose...</option>
        <option value="Pry">Pry Schl Cert</option>
        <option value="olevel">O'Level</option>
        <option value="OND">OND </option>
        <option value="NCE">NCE</option>
        <option value="HND">HND</option>
        <option value="BSc">BSc </option>
        <option value="Phd">Phd</option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Job Type</label>
        <select name="jobType" id="jobType" class="custom-select form-control">
        <option value="" selected>Choose...</option>
        <option value="Teaching">Teaching</option>
        <option value="Non-Teaching">Non-Teaching </option>
        </select>
        </div>
        </div>
        </div>
        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>Gender</label>
        <select name="staff_gender" id="staff_gender" class="custom-select form-control">
        <option value="" selected>Choose...</option>
        <option value="Male">Male</option>
        <option value="Female">Female </option>
        </select>
        </div>
        </div>
        </div>

        <div class="col-md-6">
        <div class="form-group">
        <div class="controls">
        <label>AUTHENTICATION Code</label>
        <input autocomplete="off" type="password"
        class="form-control" placeholder="**************" name="auth_code">
        </div>
        </div>
        </div>
        <div class="col-12 d-flex flex-sm-row flex-column justify-content-end">
        <button type="submit" class="btn btn-dark glow btn-lg mr-sm-1 mb-1 __loadingBtn3__">Register Now</button>

        </div>
        </div>
        </form>
        </div>
      </div>
    </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>

    <script>
      $(document).ready(function(){
        //STAFF FORM SUBMISSION METHOD
        const NEWSTAFFFORM = $("#create_new_staff_form");
        NEWSTAFFFORM.on("submit", function(e){
        e.preventDefault();
        //myResponseText3
        $(".__loadingBtn3__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        //send request 
        $.post("../actions/actions",NEWSTAFFFORM.serialize(),function(res_data){
        setTimeout(()=>{
        $(".__loadingBtn3__").html('Register Now').attr("disabled",false);
        // $("#myResponseText3").html(res_data);
        $("#server-response").html(res_data);
        },1000);
        })
        })
      })
    </script>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>