<?php 
require_once "helpers/helper.php";
 ?>

 <?php 
$request_method = $_SERVER['REQUEST_METHOD'];
if ($request_method ==="GET") {
 
 if (isset($_GET['occupant']) && !$Configuration->isEmptyStr($_GET['occupant']) && isset($_GET['bed']) && !$Configuration->isEmptyStr($_GET['bed']) && isset($_GET['hoId']) && $_GET['hoId'] !=="" && isset($_GET['action']) && $_GET['action'] ==="view-payments") {
  $bedId = $Configuration->Clean($_GET['bed']);
  $hoId = $Configuration->Clean($_GET['hoId']);
  $occupId = $Configuration->Clean($_GET['occupant']);
  $student_data = $Student->get_student_data_byId($occupId);
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
    <title><?php echo $SmappDetails->school_name; ?> :: <?php echo strtoupper($student_data->full_name);?> </title>
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
                  <li class="breadcrumb-item active"><?php echo strtoupper($student_data->full_name);?> 
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
       <div class="row">
             <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> <?php echo strtoupper($student_data->full_name);?> HOSTEL PAYMENTS INFO &raquo; </h3>
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
        <button onclick="window.history.back();" class="btn btn-danger btn-md btn-round" type="button">Go Back</button>
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
                <tr>
                  <th>Fee Per Session</th>
                  <th>Paid</th>
                  <th>Balance</th>
                  <th>Payment Date</th>
                  <th>Status</th>
                  <th>Receipt</th>
                </tr>
              </thead>
              <tbody>
              	<?php 
        $getStudentPaymentReceipts = $Hostel->getHostelPaymentInfo($occupId,$bedId);
        if ($getStudentPaymentReceipts) {
        	foreach ($getStudentPaymentReceipts as $reciept) { 
        		?>
        		<tr>
                  <td>&#8358;<?php echo number_format($reciept->amount,2);?></td>
                  <td>&#8358; <?php echo number_format($reciept->amount_paid,2);?></td>
                  <td>&#8358; <?php echo number_format($reciept->amount_due,2);?></td>
                  <td><?php echo date("D jS F, Y",strtotime($reciept->payment_date));?></td>
                  <td><?php if ($reciept->status=='2'): ?>
                  <span class="badge badge-success badge-md">Cleared</span>
                    <?php else: ?>
                      <button type="button" disabled class="badge badge-dark badge-sm mb-1 disabled" ><span class="fa fa-plus fa-1x"></span>coming soon</button>
                      <span class="badge badge-warning badge-md">Not Cleared</span>
                  <?php endif ?> </td>
                  <td><a href="student_bed_payment_receipt?bedss=<?php echo $bedId;?>&hostelreceipt=<?php echo $reciept->id;?>&action=printreceipt"><button class="btn btn-dark btn-sm btn-rounded"><span class="fa fa-print"></span> Print</button></a> </td>
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
    <!-- onclick="window.location.href='topup_hostel_payment?payee=<?php //echo $occupId; ?>bedspace=<?php //echo $bedId; ?>'" -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>