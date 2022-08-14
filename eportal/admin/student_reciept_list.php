<?php 
require_once "helpers/helper.php";
 ?>

 <?php 
$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method ==="GET") {
 
 if (isset($_GET['std_regNo']) && !$Configuration->isEmptyStr($_GET['std_regNo']) && isset($_GET['stuId']) && !$Configuration->isEmptyStr($_GET['stuId']) && isset($_GET['stuClass']) && !$Configuration->isEmptyStr($_GET['stuClass'])) {
  $stuId = urldecode(base64_decode($_GET['stuId']));
  $std_regNo = urldecode(base64_decode($_GET['std_regNo']));
  $stuClass = urldecode(base64_decode($_GET['stuClass']));
  $fetch_details = $Student->get_single_student_details_by_regId($stuId,$std_regNo);
 }else{
  header("location: ./");
  exit();
 }
}else{
  header("location: ./");
  exit();
}
  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: <?php echo strtoupper($fetch_details->full_name);?> </title>
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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo strtoupper($fetch_details->full_name);?> - PAYMENT HISTORY
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
       <div class="row">
             <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> <?php echo strtoupper($fetch_details->full_name);?> PAYMENTS HISTORY &raquo;&raquo; <span class="text-warning"><?php echo strtoupper($fetch_details->stdRegNo);?></span></h3>
  </div>
    </div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
       
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable text-center">
              <thead>
                <tr>
                  <th>Fee Type</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Payment Date</th>
                  <th>Status</th>
                  <th>Receipt</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
        $getStudentPaymentReceipts = $Student->get_student_payments_history($stuId,$std_regNo,$stuClass);
        if ($getStudentPaymentReceipts) {
        	foreach ($getStudentPaymentReceipts as $reciept) { 
        		?>
        		<tr>
                  <td><?php echo ucwords($reciept->component_fee);?></td>
                  <td>&#8358; <?php echo number_format($reciept->fee_paid,2);?></td>
                  <td>&#8358; <?php echo number_format($reciept->fee_due,2);?></td>
                  <td><?php echo date("jS F Y",strtotime($reciept->payment_date));?></td>
                  <td><?php if ($reciept->payment_status=='2'): ?>
                  <span class="badge badge-success- badge-md">Cleared</span>
                    <?php else: ?>
                      <span class="badge badge-warning badge-md">Not Cleared</span>
                  <?php endif ?> </td>
                  <td><a href="student_payment_receipt_view?paymentId=<?php echo $reciept->phId;?>&action=viewReceipt"><button class="btn btn-dark btn-sm btn-rounded"><span class="fa fa-print"></span> Print</button></a> </td>
                </tr>
        	<?php }
        }

              	 ?>
                
                
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

    </div>
    
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>