<?php 
require_once "helpers/helper.php";
 ?>
 <?php 

if (isset($_GET['action']) && $_GET['action'] === "viewreceipt" && isset($_GET['teacherId']) && $_GET['teacherId'] !== "" && isset($_GET['receiptId']) && $_GET['receiptId'] !== "") {
  $salaryId  =$Configuration->Clean($Configuration->unsaltifyString($_GET['receiptId']));
 $staffId = $Configuration->Clean($Configuration->unsaltifyString($_GET['teacherId']));
 $staff_data  = $Staff->get_staff_ById($staffId);
 $salary_details = $Payroll->getStaffPaidSalaryById($salaryId);
 $payroll_details = $Payroll->showPayrollByStaffId($staffId);
}else{
  echo "<script>window.history.back();</script>";
  exit();
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: <?php echo $staff_data->full_name;?> Salary Receipt</title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static" data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="card">

            <div class="card-body">
              <div class="row">
                          <div class="col-sm-12 col-10 text-center">
              <h3 class="text-center text-bold"> </strong> Payslip for the month of <?php echo $salary_details->forMonth;?>, <?php echo $salary_details->csession;?></span> </h3>
              </div>
                  </div>
                  <!-- content goes here -->
                  <div class="row">
              <div class="col-md-12">
              <div class="card-box">

              <div class="row">

              <div class="col-sm-6 m-b-20 mb-3">
              <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" width="80">
              <ul class="list-unstyled m-b-0">
                <address>
                  <h3>
              <strong><?php echo strtoupper($SmappDetails->school_name);?></strong><br>
              <?php echo $SmappDetails->school_address ?>, <br><?php echo $SmappDetails->school_city ?>, 
              <?php echo $SmappDetails->school_state?>, <?php echo $SmappDetails->country?>.<br>
              Phone: <?php echo $SmappDetails->school_phone;?><br>
              Email: <?php echo $SmappDetails->school_email;?>
              </h3>
            </address>
              </ul>
              </div>
              <div class="col-md-6" style="align-items: right; align-content: right;">
              <div class="invoice-details">
              <h3 class="text-uppercase">Payslip: #49029</h3>
              <ul class="list-unstyled">
              <li>Salary Month: <span><?php echo $salary_details->forMonth; ?>, <?php echo $salary_details->csession;?></span></li>
              <li>Payment Date: <span><?php echo date("l F jS Y",strtotime($salary_details->paymentDate)) ?></span></li>
              </ul>
              <h3 class="text-uppercase">Staff Details</h3>
              <ul class="list-unstyled">
              <li>Name: <span><?php echo ucwords($staff_data->full_name) ?></span></li>
              <li>Email: <span><?php echo $staff_data->staffEmail; ?></span></li>
              <li>Phone: <span><?php echo $staff_data->staffPhone; ?></span></li>
              <li>Address: <span><?php echo $staff_data->staffAddress; ?></span></li>
              <li>Designation: <span><?php echo $staff_data->staffRole; ?></span></li>
              </ul>
              </div>
              </div>
              <div class="clearfix"></div>
              </div>

              <div class="row">
              <div class="col-sm-6">
              <div>
              <h4 class="m-b-10"><strong>Earnings</strong></h4>
              <table class="table table-bordered">
              <tbody>
              <tr>
              <td><strong>Basic Salary</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->salary,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>House Rent Allowance (H.R.A.)</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->rent_alawi,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Conveyance</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->transport_alawi,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Medical Allowance</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->med_alawi,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Walldrobe Allowance</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->cloth_alawi,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Total Earnings</strong> <span class="float-right"><strong>&#8358;<?php echo number_format($payroll_details->salary+$payroll_details->rent_alawi+$payroll_details->med_alawi+$payroll_details->transport_alawi+$payroll_details->cloth_alawi,2) ?></strong></span></td>
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
              <td><strong>Tax Deducted at Source (T.D.S.)</strong> <span class="float-right">&#8358;<?php echo number_format($payroll_details->tds,2) ?></span></td>
               </tr>
              <tr>
              <td><strong>MISC</strong> <span class="float-right">&#8358;<?php echo number_format(0,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Debt</strong> <span class="float-right">&#8358;<?php echo number_format(0,2) ?></span></td>
              </tr>
              <tr>
              <td><strong>Total Deductions</strong> <span class="float-right"><strong>&#8358;<?php echo number_format($payroll_details->tds,2);?></strong></span></td>
              </tr>
              </tbody>
              </table>
              </div>
              </div>
               </div>
              <div class="col-sm-12">
              <h4><strong>Net Salary: &#8358;<?php echo number_format($payroll_details->net_salary) ?> (<?php  $locale = 'en_US';
  $numberInput = (($payroll_details->salary+$payroll_details->rent_alawi+$payroll_details->med_alawi+$payroll_details->transport_alawi+$payroll_details->cloth_alawi) - $payroll_details->tds);
    $fmt = numfmt_create($locale, NumberFormatter::SPELLOUT);
    $in_words = numfmt_format($fmt, $numberInput);
    echo ucwords($in_words); ?> Naira only). </strong>

              </h4>
              <div class="col-sm-7 col-8 text-right m-b-30" style="align-items: right; float: right;">
              <div class="btn-group btn-group-sm">
                 <button type="button" class="btn btn-danger btn-lg mr-1" onclick="window.history.back();"><span class="fa fa-arrow-left"></span> Back</button>
              <a href="print_staff_reciept?teacherId=<?php echo $Configuration->saltifyString($staff_data->staffId)?>&action=printreceipt&receiptId=<?php echo $Configuration->saltifyString($salaryId)?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-print fa-lg"></i> Print</button></a>

              </div>
              </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
                         
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>
