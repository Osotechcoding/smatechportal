<?php 
require_once "helpers/helper.php";
$_Pins_ = new Pins();
 ?>
 <?php include_once("../actions/show_pins.php");?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?>::  Admission Pins</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <!--  -->
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Admission Pins
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row"></div>
           
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-credit-card-alt fa-1x"></span> ADMISSION SCRATCH CARDS</h3>
  </div>

        
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
   <?php include_once("template/pinsLinkBtns.php") ?>
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-12">
      <div class="card">
      
        <div class="card-body card-dashboard">
       <button type="button" data-target="#showPinPassModal" data-toggle="modal" class="badge badge-pill badge-danger badge-md m-1 py-1">Show Pin</button>
          <div class="table-responsive">
            <table class="table table-bordered table-striped osotechExp table-hover">
              <thead class="text-sm-center">
                <tr>
                 <th>S/N</th>
                  <th>Card Serial</th>
                   <th>Pin </th>
                  <th>Price</th>
                  <th>Created</th>
                  <th>Status</th>
                  <th>Used By</th>
                  <!-- <th>Action</th> -->
                </tr>
              </thead>
              <tbody>
                <?php 
                $pin_datas = $_Pins_->get_pins("tbl_reg_pins");
                 if ($pin_datas!="") {
                  $cnt =1;
                 foreach ($pin_datas as $pin_data):?> 
                   <tr>
                  <td><?php echo $cnt++; ?></td>
                  <td><?php echo $pin_data->pin_serial;?></td>
                 <td><?php  if (isset($show_pins)) {
                if ($show_pins === false) {
                 echo substr($pin_data->pin_code, 0,4).'*******'.substr($pin_data->pin_code, -5);
                }else{
                  echo $pin_data->pin_code;
                }
                  }else{
               echo substr($pin_data->pin_code, 0,4).'*******'.substr($pin_data->pin_code, -5);
                  }
               ?></td>
                  <td>&#8358;<?php echo number_format($pin_data->price,2);?></td>
                  <td><?php echo $pin_data->created_at;?></td>
                  <td><?php if ($pin_data->pin_status=='0') {
                   echo '<span class="badge badge-pill badge-success badge-sm">Active</span>';
                  }else{
                     echo '<span class="badge badge-pill badge-danger badge-sm">Used</span>';
                  } 

                   ?>
                    </td>
                  <td><span class="badge badge-pill badge-success badge-sm">Not Used</span></td>
                </tr>
                  <?php endforeach; ?>
               <?php } ?>
              </tbody>
             
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Column selectors with Export Options and print table -->

        </div>
      </div>
    </div>
    <!-- END: Content-->
     <?php include_once ("template/pinPassModal.php") ?>
   
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
    function checkPassCode(){
$(".checkp").on('click', function(event){
event.preventDefault();
let answer =prompt("Enter Pin To Unlock Cards");
if ($answer != "Samson") {
return false;
}else{
return true;
}
})

}
     $(document).ready(function(){
     //when del btn is active 
      $(document).on("click",".del_pinBtn_", function(){
        let id = $(this).data("id");
        let table_name = $(this).data("table");
        if (confirm("Are you sure, You want to delete this pin?")) {
          $.post("../actions/actions",{action:"delete_pins",id:id,table_name:table_name},function(data){
              console.log(data);
            setTimeout(()=>{
              $("#server-response").html(data);
            },1500);
          });
        }else{
          return false;
        } 
      });
      //ends

       $(".view_reg_pins_btn").on("click", function(){
        $(".view_reg_pins_btn").html("wait...");
      setTimeout(()=>{
        window.location.href="./regPin";
      },1000);
    })
   
      //Result pins 
     $(".view_res_pins_btn").on("click", function(){
      $(".view_res_pins_btn").html("wait...");
      setTimeout(()=>{
        window.location.href="./resPin";
      },1000);
    })

   
     })
   </script>
  </body>
  <!-- END: Body-->

</html>