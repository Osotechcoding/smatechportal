<?php 
require_once "helpers/helper.php";
 ?>
  <?php 
if (!$Admin->isSuperAdmin($admin_data->adminId)) {
  header("Location: ./");
  exit();
}
  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Scratch Card Generator</title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Scratch Card Generator
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">

           <div class="row">
  <div class="col-12 mb-1">
    <h3 class="bd-lead text-bold" style="font-weight: bolder;"><i class="fa fa-credit-card-alt"></i> Scratch Card Generator</h3>
  </div>
</div>
 

          <div class="col-md-8 offset-1">
            <?php //include_once("template/pinsLinkBtns.php") ?>
      <div class="card">
      
       <h1 class="text-center mt-2" style="font-weight: bolder;"><span class="fa fa-credit-card-alt"></span> <?php echo strtoupper(__OSO_APP_NAME__); ?> PIN GENERATOR</h1>
        <div class="card-body">
          <form class="form" id="osotechPinGenForm">
            <div class="form-body">
              <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-12 col-xl-12">
                    <label for="q">No of Scratch Crads to Generate</label>
                    <input type="number" autocomplete="off" id="q" class="form-control" name="q" placeholder="e.g 200">
                     <span class="text-danger">Maximum: 200 Pins</span>
                
                </div>
                 <div class="col-md-12 col-12 mb-2">
                   <label for="cardtype">Choose Scratch Card Type</label>
                  <select name="cardtype" id="cardtype" class=" custom-select form-control">
                    <option value="" selected> Select Pin Type </option>
                    <option value="rp">Admission Scratch Card</option>
                    <option value="rcp">Result Scratch Card</option>
                   <!--  <option value="ep">Examination</option>
                    <option value="ewp">e-Wallet</option> -->
                  </select>
                </div>

                <div class="col-12 mb-2">
                   <label for="p">Enter Card Price</label>
                    <input type="number" id="p" class="form-control" name="p"
                      placeholder="&#8358; 5,000.00">
                </div>
                <input type="hidden" name="action" value="genCard">
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" class="btn btn-dark btn-lg mr-1 btn-block __loadingBtn__">Generate</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
        </div>
      </div>
    </div>
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
  
    </div>
    <!-- demo chat-->
  
    <!-- BEGIN: Footer-->

   <?php include_once "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include_once "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
<script>
  $(document).ready(function(){
    $(".view_reg_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./regPin";
      },500);
    })
    /*//exam pins 
     $(".view_ex_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./examPin";
      },1000);
    })
      //Wallet pins 
     $(".view_wallet_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./walletPin";
      },1000);
    })*/

      //Result pins 
     $(".view_res_pins_btn").on("click", function(){
      setTimeout(()=>{
        window.location.href="./resPin";
      },500);
    })
    $("#osotechPinGenForm").on("submit", function(event){
      event.preventDefault();
       $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing Request...').attr("disabled",true);
      const osotechPinGenForm = $(this).serialize();
      $.post("../actions/actions",osotechPinGenForm,function(d){
       // console.log(d);
        setTimeout(()=>{
           $(".__loadingBtn__").html('Generate').attr("disabled",false);
          $("#server-response").html(d);
          $("#osotechPinGenForm")[0].reset();
        },500)
      })
   
    })
  })
</script>
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>