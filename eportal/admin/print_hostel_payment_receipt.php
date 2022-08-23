<?php 
require_once "helpers/helper.php";
 ?>

 <?php 

$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method!=="GET") {
  // redirectback to make payment
  header("Location: ./create_hostel");
  exit();
}else{
  if (isset($_GET['bedss']) && $_GET['bedss'] !="" && isset($_GET['hostelreceipt']) && $_GET['hostelreceipt']!="" && isset($_GET['action']) && $_GET['action'] ==="printreceipt") {
   $bedId = $Configuration->Clean($_GET['bedss']);
   $paymentId = $Configuration->Clean($_GET['hostelreceipt']);
   $get_data = $Hostel->get_receiptByPaymentId($paymentId);
   if (!$get_data) {
   header("Location: ./create_hostel");
  exit();
   }else{
    $bed_space_details = $Hostel->getBedSpaceById($bedId);
     $student_data = $Student->get_student_data_byId($bed_space_details->occupant);
     $hostel_details = $Hostel->getHostelById($bed_space_details->hostel_id);
   }
  }
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: <?php echo  ucwords($student_data->full_name); ?></title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
   
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
              <span class="invoice-number mr-50">Hostel Payment Receipt</span>
              <span><?php echo rand(100,9999999) ?></span>
            </div>
            <div class="col-lg-8 col-md-12">
              <div class="d-flex align-items-center justify-content-lg-end flex-wrap">
                <div class="mr-3">
                  <small class="text-muted">Date:</small>
                  <span><?php echo date("D jS, M  Y",strtotime($get_data->payment_date)) ?></span>
                </div>
                <div>
                  <small class="text-muted">Printed:</small>
                 <span> <?php echo date("D jS, M  Y") ?> @ <?php echo date("h:i:s a") ?> </span>
                </div>
              </div>
            </div>
          </div>
            <div class="text-info text-center">
              
            </div>
          <!-- logo and title -->
          <div class="row my-2 my-sm-3">
            <div class="col-sm-6 col-12 text-center text-sm-left order-2 order-sm-1">
              <h4 class="text-primary"><?php echo strtoupper($SmappDetails->school_name) ?></h4>
               <span><?php echo strtoupper($SmappDetails->school_slogan) ?></span>
            </div>
           
            <div class="col-sm-6 col-12 text-center order-1 order-sm-2 d-sm-flex justify-content-end mb-1 mb-sm-0">
              <img src="<?php echo $Configuration->get_schoolLogoImage();?>" alt="logo" width="100" class="rounded-circle">
            </div>
          </div>
          <hr>
          <div class="row invoice-info">
            <div class="col-md-6 col-sm-6 col-12 mt-1">
              <h6 class="invoice-from">FROM</h6>
              <div class="mb-1">
                <span><?php echo strtoupper($SmappDetails->school_name) ?></span>
              </div>
              <div class="mb-1">
                <span><?php echo ucwords($SmappDetails->school_address);?></span>
              </div>
              <div class="mb-1">
                <span><?php echo $SmappDetails->school_email;?></span>
              </div>
              <div class="mb-1">
                <span><?php echo $SmappDetails->school_phone; ?></span>
              </div>
            </div>
            <div class="col-sm-6 col-12 mt-1 text-right">
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
          <table class="table table-borderled mb-0">
            <thead>
              <tr class="border-1">
                <th scope="col" width="30%">Hostel Desc</th>
                <th scope="col" width="30%">Room Desc / Bonk No</th>
                <th scope="col"width="15%">Session</th>
                <th scope="col"width="15%">Per Session</th>
                <th scope="col"width="20%">Paid</th>
                <th scope="col" width="20%">Due</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td><?php echo $hostel_details->hostel_desc;?></td>
                <td><?php echo $bed_space_details->room;?> &raquo; <?php echo $bed_space_details->bed_space; ?></td>
                <td><?php echo $bed_space_details->book_duration; ?></td>
                <td>&#8358; <?php echo number_format($get_data->amount,2);?></td>
                <td>&#8358; <?php echo number_format($get_data->amount_paid,2);?></td>
                <td class="text-primary font-weight-bold">&#8358; <?php echo number_format($get_data->amount_due,2);?></td>
              </tr>
            </tbody>
          </table>
        </div>
        <!-- invoice subtotal -->
        <div class="card-body pt-0 mx-25">
          <hr>
          <div class="row">
            <div class="col-4 col-sm-6 col-12 mt-75">
              <p>Thank You <span class="text-info"><?php echo $student_data->full_name;?></span></p>
            </div>
            <div class="col-8 col-sm-6 col-12 d-flex justify-content-end mt-75">
              <div class="invoice-subtotal">
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Total Fee</span>
                  <span class="invoice-value">&#8358; <?php echo number_format($get_data->amount,2);?></span>
                </div>
                <hr>
               <!--  <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Fee Total</span>
                  <span class="invoice-value">&#8358; <?php //echo number_format($get_data->total_fee,2);?></span>
                </div> -->
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Paid to date</span>
                  <span class="invoice-value">&#8358; <?php echo number_format($get_data->amount_paid,2);?></span>
                </div>
                <div class="invoice-calc d-flex justify-content-between">
                  <span class="invoice-title">Balance (NGN)</span>
                  <span class="invoice-value text-danger text-bold-700">&#8358; <?php echo number_format($get_data->amount_due,2);?></span>
                </div>
              </div>

            </div>
             
          </div>
        </div>
      </div>
    </div>
    <!-- invoice action  -->
   
  </div>
</section>

        </div>
      </div>
    </div>
    <!-- END: Content-->
   <!-- BEGIN: Customizer-->
    </div>
    <!-- BEGIN: Footer-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
    <script>
     window.onLoad(window.print());
   </script>
  </body>
  <!-- END: Body-->
</html>