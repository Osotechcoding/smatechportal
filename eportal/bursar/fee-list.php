<?php 
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> | Fee List </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
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
                  <li class="breadcrumb-item active">Payment List
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bar-chart fa-2x"></span> FEE STRUCTURE MODULE</h3>
  </div>
    </div>
    
      <div class="card">
        <div class="card-body">
          <div class="text-center mb-3">
            <h5><?php echo $Alert->alert_msg("Select class from the list to view all payments","info");?></h5>
          </div>
          <div class="users-list-filter px-1">
        <form action="" method="post">
           <div class="row border rounded py-2 mb-2">
                 <div class="col-12 col-md-6 col-sm-6 col-lg-6">
                  <label for="users-list-verified">Select Payment Class</label>
                  <fieldset class="form-group">
                    <select name="payment_class" class="form-control custom-select" id="users-list-verified">
                           <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list();?>
                        </select>
                   </fieldset>
               </div>
         
                <div class="col-12 col-md-6 col-sm-6 col-lg-6 d-flex align-items-center">
                    <button type="submit" name="show_payment_list" value="show_list_of_payment" class="btn btn-dark btn-block btn-lg glow mb-1">Show Payment List</button>
                </div>
            </div>
        </form>
    </div>
        </div>
      </div>
       <?php 
if (isset($_POST['show_payment_list']) && isset($_POST['payment_class'])) {
  // code...
  $class = $Configuration->Clean($_POST['payment_class']);
  if (!$Configuration->isEmptyStr($class)) {
    ?>

  <div class="card">
      <div class="card-body">
        <h3 class="text-center mb-2">List of Payments for <?php echo strtoupper($class); ?></h3>
         <form id="updatePaymentListForm">
          <input type="hidden" name="action" value="update_fee_component_structure_now">
         <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="text-center bg-default">
          <tr>
            <th>S/N</th>
          <th>Component Type</th>
          <th>Default Amount</th>
          <th>Update Payment</th>
        </tr>
      </thead>
        <tbody class="text-center">
        <?php 

        $paymentLists = $Administration->getAllocatedFeeByClass($class);
        if ($paymentLists) {
          $cnt=0;
          foreach ($paymentLists as $payment) {
           $cnt++;
           ?>
           <tr>
             <td><input type="hidden" name="count_total[]" value="<?php echo $cnt;?>">
              <input type="hidden" name="fee_class[]" value="<?php echo $class;?>">
              <?php echo $cnt;?></td>
             <td> <input type="hidden" name="fid[]" value="<?php echo $payment->faId;?>"><?php echo $payment->component_id;?> <input type="hidden" name="component[]" value="<?php echo $payment->component_id;?>"></td>
             <td><input type="text" name="default_price[]" value="<?php echo number_format($payment->amount,2);?>" readonly class="form-control"></td>
             <td><input type="number" name="new_price[]" placeholder="Set fee" class="form-control"></td>
            
           </tr>
           <?php
          }?>
          
          <?php
        }else{
echo $Alert->alert_msg("No Record Found!","danger");
        }
         ?>
         <th colspan="1"><b style="font-size: 15px;">Total:</b></th>
          <td colspan="3" class="text-center"><b style="font-size: 20px; font-weight:bold; color:darkgreen;"> &#8358;<?php echo number_format($Administration->getSumOfAllocatedFeeByClass($class),2);?></b></td>
          
      </tbody>

      </table>
      <div class="col-md-6 mb-2">
        <input type="password" name="auth_code" class="form-control form-control-lg" placeholder="Enter authentication code">
      </div>
   <button type="submit" class="btn btn-dark btn-md __loadingBtn__ pull-right">Update Payment</button>
    </form>
      </div>
    </div>
    <?php

  }else{
    echo $Alert->alert_msg("Please choose the class you want to view the payment list","danger");
  }
}

        ?>
          
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script>
      $(document).ready(function () {
    const updatePaymentListForm = $("#updatePaymentListForm");
    updatePaymentListForm.on("submit", function(event){
  event.preventDefault();
  //alert("Submitted");
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Please wait...').attr("disabled",true);
  //send request 
  $.post("../actions/update_actions",updatePaymentListForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Update Payment').attr("disabled",false);
      $("#server-response").html(data);
    },1500);
  })
});;

});
    </script>
  </body>
  <!-- END: Body-->
</html>