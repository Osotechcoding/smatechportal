<?php 
require_once "helpers/helper.php";
 ?>
 <?php 

if (isset($_GET['action']) && $_GET['action'] === "viewsalary" && isset($_GET['staffId']) && $_GET['staffId'] !== "") {
 $staffId = $Configuration->Clean($_GET['staffId']);
 $staff_data  = $Staff->get_staff_ById($staffId);
 $salary_details = $Payroll->showStaffSalaryHistoryById($staffId);
 $payroll_details = $Payroll->showPayrollByStaffId($staffId);
}else{
  header("Location: visap_payroll");
  exit();
}

  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: <?php echo $staff_data->full_name;?> Salary Details </title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Salary History
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
</div>
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">

        <div class="card-header">
           <button type="button" class="btn btn-danger btn-lg ml-2 mt-3" onclick="window.history.back();"><span class="fa fa-arrow-left"></span> Back</button>
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped text-center">
              <thead>
               <tr>
              <th>Payment Date</th>
              <th>Month</th>
              <th>Paid Amount</th>
              <th>Status</th>
              <th>Actions</th>
              </tr>
              </thead>
              <tbody>
                <?php if ($salary_details) {
                 foreach ($salary_details as $sal) {?>
                 <tr>
                  <td><?php echo date("l jS F, Y",strtotime($sal->paymentDate));?></td>
                  <td><?php echo date("F",strtotime($sal->forMonth));?></td>
                  <td>&#8358;<?php  echo number_format($sal->amount,2);?></td>
                  <td><span class="badge badge-success badge-md">Paid</span></td>
                  <td><a href="salary-reciept?teacherId=<?php echo $Configuration->saltifyString($sal->staff_id)?>&action=viewreceipt&receiptId=<?php echo $Configuration->saltifyString($sal->salaryId)?>"><button class="btn btn-dark" type="button"> Reciept</button></a></td>
                </tr>
                 <?php 
                  }
                } ?>
                
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