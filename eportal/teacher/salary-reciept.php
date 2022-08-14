<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
   <!-- include template/HeaderLink.php -->
   <?php include "template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']) ?></a>
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
              <h3 class="text-center text-bold"> </strong> Payslip for the month of <?php //echo $deduction['paid_month'] ?>, <?php //echo $deduction['paid_year'] ?></span> </h3>
              </div>
                  </div>
                  <!-- content goes here -->
                  <div class="row">
              <div class="col-md-12">
              <div class="card-box">

              <div class="row">

              <div class="col-sm-6 m-b-20 mb-3">
              <img src="result-asset/logo.png" width="80">
              <ul class="list-unstyled m-b-0">
                <address>
              <strong><?php echo strtoupper($SmappDetails->school_name) ?></strong><br>
             <?php echo ucwords($SmappDetails->school_address) ?><br>
              <?php echo $SmappDetails->country;?><br>
              Phone: <?php echo $SmappDetails->school_phone; ?><br>
              Email: <?php echo $SmappDetails->school_email; ?>
            </address>
              </ul>
              </div>
              <div class="col-md-6 col-sm-4 m-b-10 float-right">
              <div class="invoice-details">
              <h4 class="text-uppercase">Payslip: #49029</h4>
              <ul class="list-unstyled">
              <li>Salary Month: <span><?php //echo $deduction['paid_month'] ?>, <?php //echo $deduction['paid_year'] ?></span></li>
              <li>Payment Date: <span><?php //echo date("l F jS Y",strtotime($deduction['payment_date'])) ?></span></li>
              </ul>
              <h4 class="text-uppercase">Staff Details</h4>
              <ul class="list-unstyled">
              <li>Name: <span> Agberayi Samson Idowu<?php //echo ucwords($staff_rows['name']) ?></span></li>
              <li>Email: <span>osotech@gmail.com<?php //echo $staff_rows['email'] ?></span></li>
              <li>Phone: <span>08131374443<?php //echo $staff_rows['phone'] ?></span></li>
              <li>Address: <span>Ado Odo Ota, Ogun State<?php //echo $staff_rows['address'] ?></span></li>
              <li>Designation: <span> Class Teacher<?php //echo $staff_rows['staff_role'] ?></span></li>
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
              <h2><strong>Net Salary: &#8358;<?php //echo number_format($staff_payroll['net_salary'] - $total_deduct) ?> </strong>

              </h2>
              <div class="col-sm-7 col-8 text-right m-b-30" style="align-items: right; float: right;">
              <div class="btn-group btn-group-sm">
              <a href="print_staff_reciept?reciept=<?php //echo ($sId)?>&action=<?php //echo ($pId) ?>" target="_blank"><button class="btn btn-dark"><i class="fa fa-print fa-lg"></i> Print</button></a>
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
    </div>
    <!-- END: Content-->

   <!-- BEGIN: Customizer-->
   <?php //include ("template/Customizer.php");?>
    <!-- End: Customizer-->

    </div>
    <!-- demo chat-->

    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>
