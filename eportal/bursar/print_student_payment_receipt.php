<?php 
require_once "helpers/helper.php";
 ?>

 <?php 

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method!=="GET") {
  // redirectback to make payment
  Session::redirect_root("make_payment");
}else{
  if (isset($_GET['paymentId']) && $_GET['paymentId']!="" && isset($_GET['action']) && $_GET['action'] ==="viewReceipt") {
   $RecieptId = $Configuration->Clean($_GET['paymentId']);
   $get_data = $Administration->get_receiptById($RecieptId);
   if (!$get_data) {
   Session::redirect_root("make_payment");
   }else{
     $student_data = $Student->get_single_student_details_by_regId($get_data->std_id,$get_data->stdAdmNo);
   }
  }
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo  ucwords($student_data->full_name); ?> || <?php echo $lang['webtitle'] ?></title>
   <!-- include template/HeaderLink.php -->

   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php //include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php// include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-body">
          <!-- app invoice View Page -->
<section class="invoice-view-wrapper">
  <div class="row">
    <!-- invoice view page -->
    <div class="col-xl-12 col-md-12 col-12">
      <div class="card invoice-print-area">
        <div class="card-body pb-0 mx-25">
          <!-- header section -->
          <div class="row">

            <div class="col-lg-4 col-md-12">
              <span class="invoice-number mr-50">Invoice#</span>
              <span><?php echo rand(100,9999999) ?></span>
            </div>
            <div class="col-lg-8 col-md-12">
              <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                <div class="mr-3">
                  <small class="text-muted">Payment Date:</small>
                  <span><?php echo date("D jS, M  Y",strtotime($get_data->payment_date)) ?></span>
                </div>
                <div>
                  <small class="text-muted">Printed Date:</small>
                 <span> <?php echo date("D jS, M  Y") ?> @ <?php echo date("h:i:s A") ?> </span>
                </div>
              </div>
            </div>
          </div>
            <div class="text-info text-center">
              
            </div>
          <!-- logo and title -->
          <div class="row my-2 my-sm-3">
            <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
              <h4 class="text-primary">PAYMENT RECEIPT</h4>
              <!-- <span>Software Development</span> -->
            </div>
           
            <div class="col-sm-6 col-12 text-center text-sm-right order-1 order-sm-2 d-sm-flex justify-content-end mb-1 mb-sm-0">
              <img src="result-asset/logo.png" alt="logo" height="100" width="100">
            </div>
          </div>
          <hr>
          <!-- invoice address and contact -->
          <div class="row invoice-info">
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-from">FROM</h6>
              <div class="mb-1">
                <span>GLORY SUPREME SCHOOL OTA.</span>
              </div>
              <div class="mb-1">
                <span>45,Olaotan Avenue, Ajao Estate, Lagos</span>
              </div>
              <div class="mb-1">
                <span>enquiry@glorysupremeschool.com</span>
              </div>
              <div class="mb-1">
                <span>+234(803)-137-4443</span>
              </div>
            </div>
            <div class="col-sm-6 col-12 mt-1">
              <h6 class="invoice-to">Bill To</h6>
              <div class="mb-0">
                <span><?php echo strtoupper($student_data->full_name) ?>.</span>
              </div>
               <div class="mb-0">
                <span><?php echo strtoupper($student_data->stdRegNo) ?></span>
              </div>
              <div class="mb-0">
                <span><?php echo strtoupper($student_data->studentClass) ?></span>
              </div>
              <div class="mb-0">
                <span><?php echo $student_data->stdEmail;?></span>
              </div>
              <div class="mb-0">
                <span><?php echo $student_data->stdPhone;?></span>
              </div>
            </div>
          </div>
          <hr>
        </div>
        <!-- product details table-->
        <div class="invoice-product-details table-responsive">
          <table class="table table-borderless mb-0">
            <thead>
              <tr class="border-0">
                <th scope="col" width="30%">Type</th>
                <th scope="col"width="15%">Session/Term</th>
                <th scope="col"width="15%">Amount</th>
                <th scope="col"width="20%">Paid</th>
                <th scope="col" width="20%" class="text-right">Due</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $get_data->component_fee;?></td>
                <td><?php echo $get_data->sch_session;?>/ <?php echo $get_data->term;?></td>
                <td>&#8358; <?php echo number_format($get_data->total_fee,2);?></td>
                <td>&#8358; <?php echo number_format($get_data->fee_paid,2);?></td>
                <td class="text-primary text-right font-weight-bold">&#8358; <?php echo number_format($get_data->fee_due,2);?></td>
              </tr>
            </tbody>
          </table>
        </div>

        <!-- invoice subtotal -->
        <div class="card-body pt-0 mx-25">
          <hr>
          <div class="row">
           <!--  <div class="col-4 col-sm-6 col-12 mt-75">
              <p>Thanks for your business.</p>
            </div> -->
            <div class="col-8 col-sm-6 col-12 float-right justify-content-end mt-75" style="align-items: right;">
              <div class="invoice-subtotal">
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Subtotal</span>
                  <span class="invoice-value">$76.00</span>
                </div>
                <hr>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Fee Total</span>
                  <span class="invoice-value">&#8358; <?php echo number_format($get_data->total_fee,2);?></span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Paid to date</span>
                  <span class="invoice-value">&#8358; <?php echo number_format($get_data->fee_paid,2);?></span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Balance (NGN)</span>
                  <span class="invoice-value">&#8358; <?php echo number_format($get_data->fee_due,2);?></span>
                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="clearfix"></div>
      </div>
    </div>
    <!-- invoice action  -->
   
  </div>
</section>

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
     window.onLoad(window.print());
   </script>

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>