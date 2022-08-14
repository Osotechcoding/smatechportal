<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage Session & Term
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<section id="basic-horizontal-layouts">
  <div class="row">
   
    <div class="col-md-5 col-12">
      <div class="card">
        <div class="text-center mt-1">
         <h1 class="text-center text-bold" style="font-weight:bolder;">Student Info</h1>
        </div>
        <div class="card-body">
         <div class="text-center">
           <center><img src="result-asset/author.jpg" width="150" class="rounded-circle" alt="photo"></center>
           <br>
           <h4><strong>Adeola Ademola Joy</strong></h4>
           <h4>Class: <strong> JSS1 </strong></h4>
           <h4>Gender: <strong> Male</strong></h4>
           <h4>Type: <strong> Day Student</strong></h4>
           <h4> Address: <strong><i>45,Ifako Ijaye,Lagos</i></strong></h4>
         </div>
        </div>
      </div>
    </div>
     <div class="col-md-7 col-12">
      <div class="card">
        <div class="text-center mt-1">
         <h1 class="text-center text-bold" style="font-weight:bolder;">Transport Details</h1>
        </div>
        <div class="card-body">
        <h5 class="text-center">No History for Adeola Ademola Joy</h5>
        <hr>
        <div class="card-footer text-center">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<button type="button" class="btn btn-outline-warning btn-sm btn-round">Assign To Bus <i class="fa fa-bus fa-2x"></i></button> &nbsp;&nbsp;&nbsp;&nbsp;||  &nbsp;&nbsp;&nbsp; <a href="student_n_bus"><button type="button" class="btn btn-outline-danger btn-sm btn-round">Go Back <i class="fa fa-power-off fa-2x"></i></button></a>
        </div>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->
    
    </div>
    <!-- demo chat-->
    <?php include ("template/ChatDemo.php");?>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>
    <!-- BEGIN: Footer-->
          <!--Basic Modal -->
          <div class="modal fade text-left" id="default" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title" id="myModalLabel1">Declare Active Session</h3>
                  <button type="button" class="close rounded-pill" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <form id="submitNewSessionForm">
                <div class="modal-body">
                   <div class="form-group">
                     <label for="session">Active Session</label>
                     <input type="text" class="form-control form-control-lg" name="session" placeholder="eg 2021/2022">
                   </div>
                <input type="hidden" name="action" value="set_newsession">
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-light-secondary" data-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                  </button>
                  <button type="submit" class="btn btn-primary ml-1">
                    <i class="bx bx-check d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Submit</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
   <?php include "template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
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