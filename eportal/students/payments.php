<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: Payment History</title>

<?php include_once ("templates/HeaderLinks.php");?>

</head>
<body>
<div class="main-wrapper">
<!-- NAV BAR HEADER -->
<?php include("templates/navBarMenu.php") ?>
<!-- NAV BAR HEADER ENDS -->
<!-- SIDE BAR HEADER -->
<?php include("templates/studentSideBar.php") ?>
<!-- SIDE BAR HEADER ENDS -->
<div class="page-wrapper">
<div class="content container-fluid">
<!-- GREETING INFO -->
<?php include("templates/greetingInfo.php");?>
<!-- GREETING INFO ENDS -->
<div class="content-page">
<div class="row">
<div class="col-sm-12">
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="table-responsive">
<table class="table custom-table datatable text-center">
<thead class="thead-light">
<tr>
<th>Payment Type </th>
<th>Class</th>
<th>Amount</th>
<th>Paid</th>
<th>Due Balance</th>
<th>Date of Payment</th>

</tr>
</thead>
<tbody class="text-center">
  <?php 
  $myPaymentInfo = $Administration->get_student_payment_by_regNo($student_data->stdId,$student_data->stdRegNo,$student_data->studentClass);
  if ($myPaymentInfo) {
    foreach ($myPaymentInfo as $value) { 
       $feeType_data =$Administration->get_feeTypeByType($value->component_id);
            $payment_records = $Administration->get_student_payment_records($student_data->stdId,$student_data->stdRegNo,$student_data->studentClass,$feeType_data->feeType);

      ?>
      <tr>
        <td><?php echo strtoupper($feeType_data->feeType);?></td>
          <td><?php echo strtoupper($value->studentClass);?></td>
          <td>&#8358;<?php echo number_format($value->amount,2);?></td>
          <td> <?php 
            if ($payment_records) {
             echo "&#8358;".number_format($payment_records->fee_paid,2);
            }else{
              echo '<span class="badge badge-warning badge-md"> No Record</span>';
            }
           ?></td>
           <td><?php 
            if ($payment_records) {
              if ($payment_records->payment_status=='2') {
             echo '<span class="badge badge-success badge-md"> Completed</span>';
              }else{
                  echo "&#8358;".number_format($payment_records->fee_due,2);
              }
            }else{
              echo '<span class="badge badge-warning badge-md"> No Record</span>';
            }
           ?></td>
           <td><?php echo date("l jS F, Y",strtotime($payment_records->payment_date)); ?> </td>
      </tr>

      <?php
    }
  }
   ?>
</tbody>
</table>
</div>
</div>
</div>
</div>

</div>
</div>

</div>

<script src="assets/js/jquery-3.6.0.min.js"></script>

<script src="assets/js/bootstrap.bundle.min.js"></script>

<script src="assets/js/jquery.slimscroll.js"></script>
<script src="assets/js/jquery.dataTables.min.js"></script>
<script src="assets/js/dataTables.bootstrap4.min.js"></script>

<script src="assets/js/app.js"></script>
</body>

<!-- Mirrored from dreamguystech.com/preadmin/html/school/light/payments.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 28 Dec 2021 23:16:24 GMT -->
</html>