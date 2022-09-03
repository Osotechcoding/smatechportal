<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: PAYROLL MANAGEMENT</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
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
                  <li class="breadcrumb-item active">STAFF PAYROLL
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">

</div>
<!-- Statistics Cards Starts -->
        <div class="row">

        <div class="col-xl-12 col-md-12">
          <div class="row">

            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Staff Alawi</h3></div>
                  <h2 class="text-white mb-0">&#8358; <?php echo number_format($Payroll->getAllSumOfAlawis(),2);?></h2>
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> TAX (TDS)</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Payroll->get_sum_of_total_tds(),2);?></h2>
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Monthly Salaries</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Payroll->get_sum_of_total_salary_payout_monthly(),2);?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
       <!-- Revenue Growth Chart Starts -->
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-rounded" data-toggle="modal" data-target="#uploadStaffSalaryModal"><span class="fa fa-money fa-1x"></span> Add Payroll</button>
        </div>
        <div class="card-body card-dashboard">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
              <thead class="text-center">
                <tr>
                 <th>Staff Name</th>
                  <th>Role</th>
                  <th>Education</th>
                  <th>Join Date</th>
                  <th>Net Salary</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $get_all_payrolls = $Payroll->index();
                if ($get_all_payrolls) {
                foreach ($get_all_payrolls as $payrolls) {
                  $staff_data = $Staff->get_staff_ById($payrolls->staff_id);
                  ?>
                  <tr>
                    <td><?php echo ucwords($staff_data->full_name);?></td>
                    <td><?php echo ucwords($staff_data->staffRole);?></td>
                    <td><?php echo ucwords($staff_data->staffEducation);?></td>
                    <td><?php echo date("F j,Y",strtotime($staff_data->appliedDate)) ?></td>
                    <td>&#8358;<?php echo number_format($payrolls->net_salary,2);?></td>
                    <td>  <div class="btn-group dropdown mr-1 mb-1">
              <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
                <span class="fa fa-edit"></span> Action
              </button>
              <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                 <?php if ($Staff->checkBankDetails($staff_data->staffId) === true): ?>
                   <a class="dropdown-item text-info" data-toggle="modal" data-target="#viewbankInfoModalForm" href="javascript:void(0);"> Bank Details</a>
                 <?php endif ?>
                <a class="dropdown-item text-warning pay_form_btn" data-id="<?php echo $payrolls->staff_id;?>" data-action="show_pay_salary_modal" data-payroll="<?php echo $payrolls->payrollId;?>" href="javascript:void(0);"> Make Payment</a>
                <a class="dropdown-item text-info" href="salary_history?staffId=<?php echo $payrolls->staff_id;?>&action=viewsalary"> Salary History</a>
              </div>
            </div></td>
                  </tr>
                  <?php
                  // code...
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
</section>
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <!--  <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> -->
    <!-- BEGIN: Footer-->
<!-- BANK MODAL -->
                    <div class="modal fade" id="viewbankInfoModalForm" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-md" role="document">
                        <div class="modal-content">
                      <div class="modal-header text-center">
                    <h1 class="modal-title text-info text-center" id="exampleModalLabel"><span class="fa fa-credit-card icon-lg"></span> STAFF BANK DETAILS</h1>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
                </div>
            <div class="modal-body">
            <!-- start -->
          <div class="card-opening text-center"><h2>Bank Information</h2></div>
            <div class="card-desc">
                <!-- if transfer -->
                <h4>Name of Bank: <small><b id="nameofbank">FIRST BANK PLC</b></small></h4>
                <h4>Account Holder's Name: <small><b id="nameofowner">AGBERAYI IDOWU SAM</b></small></h4>
                <h4>Account No: <b class="text-danger" id="accountnumber">3107991990</b></h4>
                <h4>Account Type: <b><span class="badge badge-info text-white badge-lg" id="owneraccounttype ">Saving Account</span></b></h4>
            </div>
            <!-- Ends -->
        <div class="modal-footer">
          <button type="button" class="btn btn-dark" data-dismiss="modal">Close Window</button>
         </div>
       </div>
        </div>
        </div>
        </div>
        <!--Bank Modal Ends -->
<!-- BANK MODAL END -->
    <!-- BUS MODAL Start -->
   <div class="modal fade" id="uploadStaffSalaryModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><i class="fa fa-line-chart fa-1x"></i> Salary structure</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>

                <form id="staffPayrollForm">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-6">
                <!--  <div class="text-center col-md-12" id="responseText">
                 </div> -->
                  <div class="form-group">
                  <label for="staff_name">STAFF NAME</label>
                <select name="staffId" id="staff_name" class="custom-select form-control form-control-lg">
                 <option value="" selected>Choose...</option>
                <?php echo $Staff->show_staff_indropdown_list();?>
               </select>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="class">BASIC SALARY</label>
               <input type="number" autocomplete="off" class="form-control form-control-lg" name="basic_salary" placeholder="required" min="5000">
                    </div>
               </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="rent_alawi">RENT ALLOWANCE</label>
                <input type="number" autocomplete="off" name="rent" class="form-control form-control-lg" placeholder="Optional">
                    </div>
                  </div>
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="transport_alawi">TRANSPORT ALLOWANCE</label>
                <input type="number" autocomplete="off" name="transport" class="form-control form-control-lg" placeholder="Optional">
                    </div>
               </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="cloth_alawi">WARDROBE ALLOWANCE</label>
               <input type="number" class="form-control form-control-lg" name="cloth" placeholder="Optional">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="med_alawi">MEDICAL ALLOWANCE</label>
               <input type="number" class="form-control form-control-lg" name="med" placeholder="Optional">
                    </div>
                  </div>
                   <div class="col-md-6">
                     <div class="form-group">
                  <label for="tds">TAX DEDUCTED AT SOURCE (TDS)</label>
              <input type="number" class="form-control form-control-lg" name="tds_tax" required placeholder="required">
                    </div>
                  </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="auth_code">AUTHENTICATION CODE</label>
              <input type="password" class="form-control form-control-lg" name="auth_code" placeholder="*************">
                    </div>
                  </div>
                  
                 </div>
                  </div>
                </div>
                <input type="hidden" name="action" value="submit_new_payroll">
                <div class="modal-footer">
               <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">Submit</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                  <span class="fa fa-power-off"> Close</span>
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
    <!-- Salary payment modal -->
    <div class="modal fade" id="salary-payment-modal" tabindex="-1"
role="dialog">
<div class="modal-dialog modal-lg" role="document">
<div class="modal-content">
    <form id="salaryPaymentModalForm">
   <div class="modal-header">
       <h4 class="modal-title text-center">PAY STAFF SALARY</h4>
       <button type="button" class="close"
           data-dismiss="modal"
           aria-label="Close">
           <span
               aria-hidden="true">&times;</span>
       </button>
   </div>
   <div class="modal-body" id="show-salary-view">
    <div class="col-md-12">
          <div class="row">
              <input type="hidden" name="staff_id" id="staff_id">
         <input type="hidden" name="payroll_id" id="myPayrollId">
         <div class="col-md-6">
               <div class="form-group">
                   <label for="our_school_term">Term</label>
                 <input class="form-control" id="our_school_term" type="text"  name="our_school_term" value="<?php echo $activeSess->term_desc;?>" readonly>
               </div>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                    <label for="our_school_session">Session</label>
                  <input class="form-control" id="our_school_session" type="text"  name="our_school_session" value="<?php echo $activeSess->session_desc_name;?>" readonly>
                </div>
                </div>
       <div class="col-md-6">
          <div class="form-group">
              <label for="my_basic_sal">Basic Salary</label>
              <input type="text" name="basic_salary" id="my_basic_sal" class="form-control" readonly>
          </div>
          </div>
         <div class="col-md-6">
          <div class="form-group">
              <label for="my_tds">Tax Deduct At Source (TDS)</label>
              <input type="text" name="tax" id="my_tds" class="form-control" readonly>
          </div>
          </div>
          <div class="col-md-6">
           <div class="form-group">
               <label for="my_net_salary">Net Salary (+ Allowances)</label>
             <input class="form-control" name="net_salary" id="my_net_salary" type="text" readonly>
           </div>
           </div>
           <div class="col-md-6">
            <div class="form-group">
                <label for="amount_paid">Amount (without comma)</label>
              <input class="form-control" id="amount_paid" type="text" placeholder="Enter net salary e.g 20000" name="amount_paid" autocomplete="off">
            </div>
            </div>
          <div class="col-md-6">
           <div class="form-group">
               <label for="tax">Payment for the Month of</label>
              <select name="salary_by_month" id="salary_by_month" class="form-control">
              <?php echo $Administration->get_months_list();?>
              </select>
           </div>
           </div>
             <div class="col-md-6">
              <div class="form-group">
                  <label for="payment_method">Payment Method</label>
                  <select name="payment_method" id="payment_method" class="form-control">
                    <option value="">--select--</option>
                    <option value="Cash"> Cash </option>
                  <option value="Transfer"> Bank Transfer </option>
                  </select>
              </div>
              </div>
               </div>
              <div class="row" style="display: none;" id="hide-Bank-Details-Div">
                 <div class="col-md-6">
               <div class="form-group">
                   <label for="bank_name">Bank Name:</label>
                 <input class="form-control" id="bank_name" type="text"  name="bank_name" placeholder="e.g First Bank Plc">
               </div>
               </div>
                <div class="col-md-6">
               <div class="form-group">
                   <label for="bank_ref_no">Ref No:</label>
                 <input class="form-control" id="bank_ref_no" type="text" name="bank_ref_no" placeholder="e.g 1234560-098754">
               </div>
               </div>
              </div>
               <div class="col-md-6">
               <div class="form-group">
                   <label for="auth_code">Authentication Code:</label>
                 <input class="form-control" id="auth_code" type="password" placeholder="*********" name="auth_code">
               </div>
               </div>
              <input type="hidden" name="action" value="pay_staff_salary_now">
              </div>
   </div>
   <div class="modal-footer">
       <button type="button"class="btn btn-danger waves-effect" data-dismiss="modal">Close</button>
       <button type="submit"class="btn btn-dark btn-round btn-md __loadingBtnpaid__">Save Payment</button>
   </div>
    </form>
</div>
</div>
</div>
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
<script>
  $(document).ready(function(){
      const STAFFPAYROLLFORM = $("#staffPayrollForm");
   STAFFPAYROLLFORM.on("submit", function(event){
     event.preventDefault();
 $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
 //send request
 $.post("../actions/actions",STAFFPAYROLLFORM.serialize(),function(data){
   setTimeout(()=>{
 $(".__loadingBtn__").html('Submit').attr("disabled",false);
  $("#server-response").html(data);
   },500);
 })
   });
   //show bank transfer details when transfer is selected
   $("#payment_method").on("change", function(){
    const paymentMethod = $(this).val();
    //hide-Bank-Details-Div
     if (paymentMethod ==="Transfer") {
       $("#hide-Bank-Details-Div").show().slideDown(500);
        }else{
       $("#hide-Bank-Details-Div").hide().slideUp('slow');
        }
   })
//when pay salary btn is clicked
const pay_form_btn = $(".pay_form_btn");
pay_form_btn.on("click", function(){
  //alert("Yessss");
  let payrollId = $(this).data("payroll");
  let staffId = $(this).data("id");
  let action = $(this).data("action");
  $.post("../actions/actions",{action:action,payrollId:payrollId,staffId:staffId},function(result){
    $("#salary-payment-modal").modal("show");
    $("#staff_id").val(result.staff_id);
    $("#my_net_salary").val(result.net_salary);
    $("#my_tds").val(result.tds);
    $("#my_basic_sal").val(result.salary);
    $("#myPayrollId").val(result.payrollId);
  },"JSON");
});

//when pay staff salary form is submitted
const STAFF_SALARY_PAYMENT_FORM = $("#salaryPaymentModalForm");
STAFF_SALARY_PAYMENT_FORM.on("submit", function(event){
  event.preventDefault();
  $(".__loadingBtnpaid__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
 //send request
 $.post("../actions/actions",STAFF_SALARY_PAYMENT_FORM.serialize(),function(data){
   setTimeout(()=>{
 $(".__loadingBtnpaid__").html('Save Payment').attr("disabled",false);
  $("#server-response").html(data);
   },500);
 })
})
  })
</script>
  </body>
  <!-- END: Body-->
</html>
