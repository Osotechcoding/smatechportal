<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Give Out Books</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Books Lend
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<section id="basic-horizontal-layouts">
  <div class="row">
   
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="text-center mt-1">
         <h3 class="text-center text-bold" style="font-weight:bolder;">Student Info</h3>
        </div>
        <div class="card-body">
         <div class="text-center">
           <center><img src="../assets/loaders/osotech.png" width="150" class="rounded-circle" alt="photo"></center>
           <br>
           <h4>Surname: <strong>Adeola Ademola Joy</strong></h4>
           <h4>Class: <strong> JSS1 </strong></h4>
           <h5>Home Address: <strong><i>45,Ifako Ijaye,Lagos</i></strong></h5>
         </div>
          <button type="button" class="btn btn-outline-dark btn-sm btn-round btn-block">View Student Academic Performance <span class="fa fa-bar-chart fa-2x"></span></button>
        </div>
      </div>
    </div>
     <div class="col-md-4 col-12">
      <div class="card">
        <div class="text-center m-1">
         <h4 class="text-center text-bold text-muted" style="font-weight:bolder;">LEND BOOK TO ADEOLA ADEMOLA JOY</h4>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-vertical">BOOK TITLE</label>
                   <select name="" id="" class="select2 form-control">
                     <option value="">--select--</option>
                     <option value="joyofmother">The Joy of Motherhood</option>
                   </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="email-id-vertical">Class Level</label>
                    <input type="text" id="class_level" class="form-control" name="class_level"
                      placeholder="JSS3" readonly>
                  </div>
                </div>
                
                <div class="col-12">
                  <div class="form-group">
                    <label for="borrow_date">Borrowed Date</label>
                    <input type="date" id="borrow_date" class="form-control" name="borrow_date" value="<?php echo date("Y-m-d");?>">
                  </div>
                </div>

                   <div class="col-12">
                  <div class="form-group">
                    <label for="r_date">Proposed Return Date</label>
                    <input type="date" id="r_date" class="form-control" name="r_date">
                  </div>
                </div>
                 
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-success btn-block">Submit</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>

    <!-- col-md-4 book not resturned info -->
    <div class="col-md-4 col-12">
      <div class="card">
        <div class="text-center m-1">
         <h5 class="text-center text-bold text-muted" style="font-weight:bolder;">Books not return by <br>&raquo;&raquo; Adeola Ademola Joy</h5>
         <hr>
        </div>
        <div class="card-body">
          <h6 class="text-bold text-center text-danger">No Pending Book</h6>
        </div>
        <div class="card-footer">
           <button type="button" class="btn btn-outline-danger btn-sm btn-round btn-block">Go Back <span class="fa fa-power-off"></span></button>
        </div>
      </div>
    </div>
    <!-- col-md-4 book not returned ends -->
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
  
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <script>
      $(document).ready(function(){
        $("#activeSessionForm").submit(function(event){
          event.preventDefault();
          alert("Form submitted");
          window.location.assign("./");
        });
        //submit new session form action 
        $("#submitNewSessionForm").on("submit",function(event){
          event.preventDefault();
          alert("text")
        })
      })
    </script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>