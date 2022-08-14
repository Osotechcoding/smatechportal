<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ("../template/MetaTag.php"); ?>
  <title><?php echo $SmappDetails->school_name ?> </title>
 <?php include "../template/HeaderLink.php";?>
<body>
<div class="wrapper">
  <div class="content">
<!-- ./wrapper -->
<div class="card">
                
          <div class="card-body">
          <div class="row">
<div class="col-sm-12 col-10 text-center">
<h1 class="text-center text-bold"> </strong> Payslip for the month of <?php //echo $deduction['paid_month'] ?>, <?php //echo $deduction['paid_year'] ?></span> </h1>
</div>

</div>
<div class="row">
<div class="col-md-12">
<div class="card-box">
  
<div class="row">
<div class="col-sm-6 m-b-20 mb-3">
<img src="images/logo.jpg" width="200">
<ul class="list-unstyled m-b-0">
  <address>
                    <strong>Spaceway Limited. RC 632112</strong><br>
                    Ogun State Industrial Estate,<br>
                    KM 7, Abeokuta/Lagos Expressway,
					Banjoko, Abeokuta, Ogun State.<br>
                    Phone: +(234) 805-588-5699<br>
                    Email: info@spaceway.ng
                  </address>
</ul>
</div>
<div class="col-sm-4 m-b-10">
<div class="invoice-details">
<h3 class="text-uppercase">Payslip #49029</h3>
<ul class="list-unstyled">
<li>Salary Month: <span><?php //echo $deduction['paid_month'] ?>, <?php //echo $deduction['paid_year'] ?></span></li>
<li>Payment Date: <span><?php //echo date("l F jS Y",strtotime($deduction['payment_date'])) ?></span></li>
</ul>
<h3 class="text-uppercase">Staff Details</h3>
<ul class="list-unstyled">
<li>Name: <span><?php //echo ucwords($staff_rows['name']) ?></span></li>
<li>Email: <span><?php //echo $staff_rows['email'] ?></span></li>
<li>Phone: <span><?php //echo $staff_rows['phone'] ?></span></li>
<li>Address: <span><?php //echo $staff_rows['address'] ?></span></li>
<li>Designation: <span><?php //echo $staff_rows['staff_role'] ?></span></li>
</ul>
</div>
</div>
</div>

<div class="row">
<div class="col-sm-6">
<div>
<h4 class="m-b-10"><strong>Earnings</strong></h4>
<table class="table table-bordered">
<tbody>
<tr>
<td><strong>Basic Salary</strong> <span class="float-right">&#8358;<?php //echo number_format($staff_payroll['salary']) ?></span></td>
</tr>
<tr>
<td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">&#8358;<?php //echo number_format($staff_payroll['rent_bonus']) ?></span></td>
</tr>
<tr>
<td><strong>Conveyance</strong> <span class="float-right"><?php //echo number_format($staff_payroll['trans_bonus']) ?></span></td>
</tr>
<tr>
<td><strong>Medical Allowance</strong> <span class="float-right">&#8358;<?php //echo number_format($staff_payroll['med_bonus']) ?></span></td>
</tr>
<tr>
<td><strong>Walldrobe Allowance</strong> <span class="float-right">&#8358;<?php //echo number_format($staff_payroll['cloth_bonus']) ?></span></td>
</tr>
<tr>
<td><strong>Total Earnings</strong> <span class="float-right"><strong>&#8358;<?php //echo number_format($staff_payroll['net_salary']) ?></strong></span></td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-sm-6">
<div>
<h4 class="m-b-10"><strong>Deductions</strong></h4>
<table class="table table-bordered">
<tbody>
<tr>
<td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">&#8358;<?php //echo number_format($staff_payroll['tds_minus']) ?></span></td>
 </tr>
<tr>
<td><strong>IOU</strong> <span class="float-right">&#8358;<?php //echo number_format($deduction['iou']) ?></span></td>
</tr>
<tr>
<td><strong>MISC</strong> <span class="float-right">&#8358;<?php //echo number_format($deduction['misc']) ?></span></td>
</tr>
<tr>
<td><strong>Debt</strong> <span class="float-right">&#8358;<?php //echo number_format($deduction['debt']) ?></span></td>
</tr>
<tr>
<td><strong>Total Deductions</strong> <span class="float-right"><strong>&#8358;<?php
//$total_deduct =  ($deduction['debt']+ $deduction['misc']+$deduction['iou']+$staff_payroll['tds_minus']);
 //echo number_format(($deduction['debt']+ $deduction['misc']+$deduction['iou']+$staff_payroll['tds_minus'])) ?></strong></span></td>
</tr>
</tbody>
</table>
</div>
</div>
<div class="col-sm-12">
<h2><strong>Net Salary: &#8358;<?php //echo number_format($staff_payroll['net_salary']- $total_deduct) ?> </strong> 
(<?php  //$locale = 'en_US';
  //$numberInput = ($staff_payroll['net_salary']- $total_deduct);
   // $fmt = numfmt_create($locale, NumberFormatter::SPELLOUT);
   // $in_words = numfmt_format($fmt, $numberInput);
   // echo ucwords($in_words); ?> Naira only.)</h2>

</div>    
            </div>
              </div>

            </div>

          </div>
        </div>

      </div>
      </div>
      </div>
<!-- Page specific script -->
<script>
 // window.addEventListener("load", window.print());
</script>
</body>
</html>
