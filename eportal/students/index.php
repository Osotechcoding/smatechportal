<?php include_once ("visap_helper.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
<?php include_once ("templates/Metadata.php");?>
<title><?php echo $SmappDetails->school_name ?> :: Student Dashboard</title>

<?php include_once ("templates/HeaderLinks.php");?>

</head>
<body>
<div class="main-wrapper">
<!-- NAV BAR HEADER -->
<?php include_once("templates/navBarMenu.php") ?>
<!-- NAV BAR HEADER ENDS -->
<!-- SIDE BAR HEADER -->
<?php include_once("templates/studentSideBar.php") ?>
<!-- SIDE BAR HEADER ENDS -->
<div class="page-wrapper">
<div class="content container-fluid">
<!-- GREETING INFO -->
<?php include_once("templates/greetingInfo.php");?>
<!-- GREETING INFO ENDS -->

<div class="row">
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="dash-widget dash-widget5">
<span class="float-left"><img src="assets/img/dash/dash-1.png" alt="" width="100"></span>
<div class="dash-widget-info text-right">
<span>Subjects</span>
<h3><?php echo $Student->get_student_offered_subjects($student_data->studentClass)?></h3>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="dash-widget dash-widget5">
<div class="dash-widget-info text-left d-inline-block">
<span>Total Fee</span>
<h3>&#8358;<?php echo number_format($Administration->get_sum_of_allocated_fee_by_className($student_data->studentClass),2) ?></h3>
</div>
<span class="float-right"><img src="assets/img/dash/dash-2.png" width="100" alt=""></span>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="dash-widget dash-widget5">
<span class="float-left"><img src="assets/img/dash/dash-3.png" alt="" width="100"></span>
<div class="dash-widget-info text-right">
<span>Total Paid</span>
<h3>&#8358;<?php echo number_format($Administration->get_sum_of_student_total_due("fee_paid",$student_data->stdId,$student_data->stdRegNo,$student_data->studentClass),2) ?></h3>
</div>
</div>
</div>
<div class="col-md-6 col-sm-6 col-lg-6 col-xl-6">
<div class="dash-widget dash-widget5">
<div class="dash-widget-info d-inline-block text-left">
<span>Outstanding</span>
<h3>&#8358;<?php echo number_format($Administration->get_sum_of_student_total_due("fee_due",$student_data->stdId,$student_data->stdRegNo,$student_data->studentClass),2) ?></h3>
</div>
<span class="float-right"><img src="assets/img/dash/dash-4.png" alt="" width="100"></span>
</div>
</div>
</div>
<!-- student performance -->
<?php include_once("templates/studentPerformance.php");?>
<!-- student performance -->

<!-- stduent payment chart -->

<?php include_once ("templates/studentPaymentChart.php") ?>
<!-- stduent payment chart -->

<!-- MyClassMates -->
<?php include_once ("templates/MyClassMates.php") ?>
<!-- MyClassMates -->

<div class="row">
<div class="col-12">
<div class="card">
<div class="card-header">
<div class="row align-items-center">
<div class="col-sm-6">
<div class="page-title">
My Payment History
</div>
</div>
</div>
</div>
<div class="card-body">
<div class="row">
<div class="col-lg-12 col-md-12 col-sm-12 col-12">
<div class="table-responsive">
<table class="table custom-table">
<thead class="thead-light">
<tr>
<th>Type </th>
<th>Class</th>
<th>Amount</th>
<th>Paid</th>
<th>Due Balance</th>
<th>Date of Payment</th>

</tr>
</thead>
<tbody>
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
<div class="col-12 col-sm-6 col-lg-4">
                          <div class="card">
                            <div class="card-header text-center">
                            <h4 class="text-success"> Active Class Mates</h4>
                              </div>
                              <div class="card-body">
                              <ul class="list-unstyled list-unstyled-border">
                                <?php $all_online_classMates = $Student->count_all_online_students_by_class($student_data->studentClass); 
                                if ($all_online_classMates) {
                                  foreach ($all_online_classMates as $onlines) {?>
                                    <li class="media">
                                      <?php if ($student_data->stdPassport ==NULL || $student_data->stdPassport == ""): ?>
    <img src="assets/img/author.jpg" width="60" alt="passport" style="border:1px solid dimgrey;border-radius: 10px;" class="mr-3 rounded-circle">
<?php else: ?>
    <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" width="60" alt="passport" style="border:1px solid dimgrey;border-radius: 10px;" class="mr-3 rounded-circle">
<?php endif ?>

            <div class="media-body">
              <div class="mt-0 mb-1 font-weight-bold"><?php echo $onlines->stdSurName ." ",$onlines->stdFirstName. " ".$onlines->stdMiddleName; ?></div>
      <div class="text-success text-small font-600-bold"><i class="fas fa-circle"></i> Online</div>
                            </div>
                          </li> <hr>
                                    <?php
                                  }
                                }
                                ?>
                         
                          </ul>
                          </div>
                          </div>
                      </div>
</div>

</div>
</div>

</div>

<?php include_once ("templates/FooterScript.php");?>
</body>

</html>
