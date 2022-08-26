<?php
require_once "helpers/helper.php";
 ?>
 <?php 
 if (isset($_GET['student_id']) && $_GET['student_id'] !== "") {
   $studentId = $Configuration->unsaltifyString($_GET['student_id']);
 }else{
  echo "<script> window.location.href='student_n_bus';</script>";
 }
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

    <div class="col-md-6 col-12">
      <div class="card" style="border-radius: 12px;">
        <div class="text-center mt-1">
         <h3 class="text-center text-bold" style="font-weight:bolder;">Student Info</h3>
        </div>
        <div class="card-body">
          <?php $student_data = $Student->get_student_data_byId($studentId);?>
         <div class="text-center">
           <center><?php if ($student_data->stdPassport==NULL || $student_data->stdPassport==""): ?>
    <?php if ($student_data->stdGender == "Male"): ?>
      <img src="../schoolImages/students/male.png" width="150" height="150" alt="photo" style="border-radius: 10px;border: 3px solid dimgrey;">
      <?php else: ?>
        <img src="../schoolImages/students/female.png" width="150" height="150" alt="photo" style="border-radius: 10px;border: 3px solid dimgrey;">
    <?php endif ?>
      <?php else: ?>
        <img  src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="150" height="150" alt="photo" style="border-radius: 10px;border: 3px solid dimgrey;">
    <?php endif ?> 
           </center>
           <br>
           <h4><strong><?php echo ucwords($student_data->full_name) ?></strong></h4>
           <h4>Class: <strong> <?php echo $student_data->studentClass;?> </strong></h4>
           <h4>Gender: <strong> <?php echo $student_data->stdGender;?></strong></h4>
           <h4>Student Type: <strong> <?php echo $student_data->stdApplyType;?></strong></h4>
           <h4> Address: <strong><i><?php echo $student_data->stdAddress;?></i></strong></h4>
         </div>
          <button type="button" class="btn btn-success btn-sm btn-round btn-block vsbp_btn" id="<?php echo $Configuration->saltifyString($student_data->stdId);?>">View Bus Payment History <i class="fa fa-bar-chart fa-2x"></i></button>
        </div>
      </div>
    </div>
     <div class="col-md-6 col-12">
      <div class="card"  style="border-radius: 12px;">
        <div class="card-body">
          <form class="form form-vertical">
            <div class="form-body">
              <div class="row">
                 <div class="col-md-12">
                     <div class="form-group">
                  <label for="routeDescName">Route Desc</label>
                <select name="route_name" id="routeDescName" class="custom-select form-control form-control-lg">
                <option value="" selected>Choose...</option>
                <?php echo $Bus->getAllBusRoutesInDropDown();?>
              </select>
                    </div>
                  </div>

                   <div class="col-md-12">
                     <div class="form-group">
                  <label for="busStops">Areas Covered</label>
               <textarea name="busStops" id="busStopsCovered" readonly class="form-control form-control-lg"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12">
                  <div class="form-group">
                  <label for="routeVehicleCapacity">Vehicle &amp; Capacity</label>
                   <input type="text" autocomplete="off" class="form-control form-control-lg" name="busname" id="routeVehicleCapacity" readonly>
                    </div>
               </div>
               <div class="col-md-12">
                     <div class="form-group">
                  <label for="routeDriverName">Driver</label>
                   <input type="text" autocomplete="off" class="form-control form-control-lg" name="awako" id="routeDriverName" readonly>
                    </div>
                  </div>

                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="routeChargePerTerm">Charge per Term</label>
                <input type="text" autocomplete="off" class="form-control form-control-lg" name="price" id="routeChargePerTerm" readonly>
                    </div>
                  </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="contact-info-vertical">Term</label>
                     <select name="" id="" class="custom-select form-control form-control-lg">
                     <option value="" selected>Choose...</option>
                     <option value="1st Term">First Term</option>
                     <option value="2nd Term">2nd Term</option>
                     <option value="3rd Term">3rd Term</option>
                   </select>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group">
                    <label for="password-vertical">Amount Paid</label>
                    <input type="number" id="school_session" class="form-control" name="school_session"
                      placeholder="e.g 25,000.00" >
                  </div>
                </div>

                <div class="col-6">
                  <div class="form-group">
                    <label for="password-vertical">Authentication Code</label>
                    <input type="password" class="form-control" name="auth_code"
                      placeholder="*************">
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
       
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script>
      $(document).ready(function(){

        $("#routeDescName").on("change", function(){
          let routeId = $(this).val();
         // console.log(routeId)
          if (routeId.length > 0 || routeId!="") {
            let action ="fetch_route_details";
       let myurl = "../actions/actions";
       let myRouteData ={routeId:routeId,action:action};
       $.ajax({
        url:myurl,
        type:"POST",
        data:myRouteData,
        dataType:'JSON',
        success:function (result){
           if (result) {
          $("#busStopsCovered").val(result.bus_stops);
          $("#routeChargePerTerm").val(result.route_price);
          $("#routeDriverName").val(result.driver_name);
          $("#routeVehicleCapacity").val(result.vehicle_desc);
        }else{
            $("#busStopsCovered").val('');
            $("#routeChargePerTerm").val('');
            $("#routeDriverName").val('');
            $("#routeVehicleCapacity").val('');
        }
        }
       });
     }else{
        $("#busStopsCovered").val('');
        $("#routeChargePerTerm").val('');
        $("#routeDriverName").val('');
        $("#routeVehicleCapacity").val('');
     }
        });

      })
    </script>
    <!-- END: Page JS-->
<script>
      $(document).ready(function(){
       
         //when view payment history btn is clicked
        $(document).on("click",".vsbp_btn", function(){
          let st_id = $(this).attr("id");
          href2 ="student_bus_payment_history?student_id=";
         //redirect to assign_student_Bus
         setTimeout(()=>{
          self.location.href=href2+st_id;
         },500);
        });
        //ends
      })
    </script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>
