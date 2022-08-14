<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: School Bus Management</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Manage School Bus & Students
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
           <center><img src="../result-asset/author.jpg" width="100" class="rounded-circle" alt="photo"></center>
           <br>
           <h4><strong>Adeola Ademola Joy</strong></h4>
           <h4>Class: <strong> JSS1 </strong></h4>
           <h4>Gender: <strong> Male</strong></h4>
           <h4>Type: <strong> Day Student</strong></h4>
           <h4> Address: <strong><i>45,Ifako Ijaye,Lagos</i></strong></h4>
         </div>
          <button type="button" class="btn btn-success btn-sm btn-round btn-block">View Bus Payment History <i class="fa fa-bar-chart fa-2x"></i></button>
        </div>
      </div>
    </div>
     <div class="col-md-7 col-12">
      <div class="card">
        <div class="text-center m-1">
         <h1 class="text-center text-bold text-muted" style="font-weight:bolder;">ASSIGN ADEOLA ADEMOLA TO BUS ROUTE</h1>
        </div>
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                <div class="col-12">
                  <div class="form-group">
                    <label for="first-name-vertical">Bus, Driver & Route</label>
                   <select name="" id="" class="select2 form-control">
                     <option value="">--select--</option>
                     <option value="">Bus One &raquo; Samson Ade &raquo; Ijaye Route</option>
                   </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="email-id-vertical">Amount Charged</label>
                    <input type="text" id="amount_charged" class="form-control" name="amount_charged"
                      placeholder="&#8358;5,500.00" readonly>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="contact-info-vertical">Term</label>
                     <select name="" id="" class="select2 form-control">
                     <option value="">--select Term--</option>
                     <option value="1">First Term</option>
                   </select>
                  </div>
                </div>
                <div class="col-12">
                  <div class="form-group">
                    <label for="password-vertical">Year/Session</label>
                    <input type="text" id="school_session" class="form-control" name="school_session"
                      placeholder="2021/2022" readonly>
                  </div>
                </div>
                  <div class="col-12">
                  <div class="form-group">
                    <label for="password-vertical">To Balance</label>
                    <input type="text" id="due" class="form-control" name="due"
                      placeholder="2,000.00" readonly>
                  </div>
                </div>

                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-primary mr-1">Submit</button>
                  <button type="reset" class="btn btn-light-secondary">Reset</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                   <a href="student_n_bus"><button type="button" class="btn btn-outline-danger btn-sm btn-round">Go Back <i class="fa fa-power-off fa-2x"></i></button></a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>
        </div>
      </div>
    </div>
    <!-- END: Content-->


    </div>
    <!-- demo chat-->
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
