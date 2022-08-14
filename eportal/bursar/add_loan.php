<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>LOAN MANAGEMENT - VISAP</title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->
     <style>
    #loading, #results {
        display: none;
    }
    </style>
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
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
             <h5 class="content-header-title float-left pr-1 mb-0">GSSOTA PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">LOAN MANAGEMENT MODULE
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body"><div class="row">
 
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
   <!-- Statistics Cards Starts -->
    <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-warning">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Recieved Today</h3></div>
                  <h2 class="text-white mb-0">&#8358;10,000.00</h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Loaned Out</h3></div>
                  <h2 class="text-white mb-0">&#8358;24,000.00</h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Interest </h3></div>
                  <h2 class="text-white mb-0">&#8358;34,000.00</h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-3 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Amount </h3></div>
                  <h2 class="text-white mb-0">&#8358;34,000.00</h2>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
    
      </div>
           <!-- Revenue Growth Chart Starts -->
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <button type="button" class="btn btn-dark btn-md btn-rounded" data-toggle="modal" data-target="#uploadLoanStaffModal"><span class="fa fa-plus fa-1x"></span> Add Loan</button>
        </div>
        <div class="card-body card-dashboard">
       
        <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead class="text-center">
                <tr>
                  <th width="20%">Staff</th>
                  <th width="15%">Amount Borrowed</th>
                  <th width="10%">(Interest)</th>
                   <th width="10%">(Years)</th>
                  <th width="15%"> Date</th>
                   <th width="10%">Monthly Payment</th>
                  <th width="10%"> Balance</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php 
                $get_all_loans = $Administration->get_all_loans_list();
                if ($get_all_loans) {
                  foreach ($get_all_loans as $loans) {?>
                  <tr>
                  <td><?php echo ucwords($loans->staffName);?></td>
                  <td>&#8358;<?php echo number_format($loans->capitalAmount,2) ?></td>
                  <td><span><?php echo $loans->interesetRate;?>%</span> &#8358;<?php echo number_format($loans->totalInterest,2);?></td>
                  <td><?php echo $loans->paybackYears;?> Year(s)</td>
                  <td><?php echo date("j M Y",strtotime($loans->submitted_date));?></td>
                  <td>&#8358;<?php echo number_format($loans->monthlyPayment,2) ?></td>
                  <td>&#8358;<?php echo number_format($loans->due,2) ?></td>
                  <td><div class="btn-group dropdown mr-1 mb-1">
            <button type="button" class="btn btn-secondary dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-offset="5,20">
              Options
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
             <a class="dropdown-item text-warning update_loan_btn" href="javascript:void(0);" data-id="<?php echo $loans->loanId;?>" data-action="show_loan_update_form_modal"><span class="fa fa-edit"></span>&nbsp;Update Loan</a>
              <!--  -->
              <a class="dropdown-item text-info" href="javascript:void(0);"><span class="fa fa-eye"></span>&nbsp; Loan History</a>
               <a class="dropdown-item text-danger" href="javascript:void(0);"><span class="fa fa-trash"></span>&nbsp; Delete</a>
          
            </div>
          </div></td>
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
</section>
<!-- Column selectors with Export Options and print table -->
        </div>
      </div>
    </div>
    <!-- END: Content-->

    </div>
   
    <!-- BEGIN: Footer-->

    <!-- BUS MODAL Start -->
   <div class="modal fade" id="uploadLoanStaffModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-calculator fa-1x"></span> Loan Calculator</h2>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                <div class="text-center col-md-12" id="response-text"></div>
                <form id="staff_loan_form">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                    <div class="text-center col-md-12" id="error-alert"></div>
                  <div class="row">
               <div class="col-md-12">
                  <div class="form-group">
                  <label for="staff_name">STAFF NAME</label>
                <select name="staff_name" id="staff_name" class="select2 form-control">
                 <option value="">--select--</option>
                 <option value="Mr Adeola Ademola">Mr Adeola Ademola</option>
               </select>
                </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="class">AMOUNT TO BORROW</label>
               <input type="number" id="amount" autocomplete="off" class="form-control form-control-lg" name="amount" placeholder="75,000.00">
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="interest">PERCENTAGE INTEREST (%)</label>
               <input type="number" id="interest" autocomplete="off" class="form-control form-control-lg" name="interest" placeholder="e.g 2%">
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="years"> YEAR(S) </label>
                <input type="number" id="years" autocomplete="off" class="form-control form-control-lg" name="years" placeholder="e.g 2%">
                  </div>
                </div>
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="monthly-payment">MONTHLY PAYMENT </label>
                <input type="number" id="monthly-payment" autocomplete="off" class="form-control form-control-lg" name="monthly_payment" value="0" readonly>
                    </div>
               </div>
               <div class="col-md-6">
                  <div class="form-group">
                  <label for="total-payment">TOTAL PAYMENT </label>
                <input type="number" id="total-payment" autocomplete="off" class="form-control form-control-lg" name="total_payment" value="0" readonly>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="total-interest">TOTAL INTEREST </label>
                <input type="number" id="total-interest" autocomplete="off" class="form-control form-control-lg" name="total_interest" value="0" readonly>
                    </div>
               </div>
               <button type="button" class="btn btn-dark ml-1 calculate_laon_btn">
                    <i class="fa fa-refresh"></i> Calculate</button>
                 </div>
                  </div>
                </div>
                 <input type="hidden" name="action" value="submit_staff_loan_now">
                <input type="hidden" name="bypass" value="<?php echo md5("oiza1");?>">
              <input type="hidden" name="cterm" value="<?php echo $activeSess->term_desc;?>">
                <input type="hidden" name="csession" value="<?php echo $activeSess->session_desc_name;?>">
                <div class="modal-footer">
                   <button type="submit" class="btn btn-dark ml-1 __loadingBtn__">
                    <i class="fa fa-paper-plane"></i> Submit Loan</button>
                  <button type="button" class="btn btn-warning ml-1" data-dismiss="modal">
                   Back
                  </button>
                </div>
                </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
    <!-- BUS MODAL Start -->
   <div class="modal fade" id="updateLoanStaffModal" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <!-- modal-dialog-scrollable -->
            <div class="modal-dialog modal-lg modal-dialog-center">
              <div class="modal-content">
                <div class="modal-header">
                  <h2 class="modal-title" id="exampleModalLongTitle" style="font-size: 30px;font-weight: 700;"><span class="fa fa-money fa-2x"></span> Loan Monthly Payment Form</h2>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="bx bx-x"></i>
                  </button>
                </div>
                 <div class="text-center col-md-12" id="error-alert2"></div>
                <form action="">
                <div class="modal-body">
                  <div class="col-md-12 col-12 col-xl-12 col-lg-12 col-sm-12">
                  <div class="row">
               <div class="col-md-12">
                <input type="hidden" name="loan_id" id="myloanId">
                  <div class="form-group">
                  <label for="staff_name_">STAFF NAME</label>
               <input type="text" id="staff_name_" class="form-control form-control-lg" name="staff_name" readonly>
                    </div>
               </div>
                <div class="col-md-6">
                  <div class="form-group">
                  <label for="amount_borrowed">AMOUNT BORROWED(CAPITAL)</label>
               <input type="number" id="amount_borrowed" autocomplete="off" class="form-control form-control-lg" name="amount_borrowed" readonly>
                    </div>
               </div>
             
                   <div class="col-md-6">
                  <div class="form-group">
                  <label for="monthly">MONTHLY PAYMENT </label>
                <input type="number" autocomplete="off" id="monthly" class="form-control form-control-lg" name="monthly" readonly>
                    </div>
               </div>
                  <div class="col-md-6">
                     <div class="form-group">
                  <label for="user_due">DUE BALANCE</label>
               <input type="number" autocomplete="off" class="form-control form-control-lg" name="user_due" id="user_due" readonly>
                  </div>
                </div>
                <div class="col-md-6">
                     <div class="form-group">
                  <label for="monthly_returned">UPDATE LOAN AMOUNT</label>
               <input type="number" id="monthly_returned" autocomplete="off" class="form-control form-control-lg" name="monthly_returned" placeholder="Enter monthly payment here...">
                  </div>
                </div>
                 </div>
                  </div>
                </div>
                <div class="modal-footer">
                   <button type="submit" class="btn btn-success ml- submit_update_loan_btn">Update Loan</button>
                  <button type="button" class="btn btn-danger ml-1" data-dismiss="modal">
                   back
                  </button>
                </div>
                 </form>
              </div>
            </div>
          </div>
    <!-- BUS MODAL  END -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
<script>
  $(document).ready(function(){
    //when the calculate btn is clicked
    const calculate_loan_btn = $(".calculate_laon_btn");
    calculate_loan_btn.on("click", function(){
      calculate_loan_btn.html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      setTimeout(()=>{
         calculate_loan_btn.html('<i class="fa fa-refresh"></i> Calculate').attr("disabled",false);
        osotechLoanCalculator();},2000);
    });

      const  LoanForm = $("#staff_loan_form");
     LoanForm.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      //send a request 
      $.post("../actions/actions",LoanForm.serialize(),function(data){
        setTimeout(()=>{
          $(".__loadingBtn__").html('<i class="fa fa-paper-plane"></i> Submit Loan').attr("disabled",false);
          $("#response-text").html(data);
        },1500);
      })

      });

//when edit loan btn is clicked
const update_loan_btn = $(".update_loan_btn");
update_loan_btn.on("click", function(){
  let myId = $(this).data("id");
  let action_now = $(this).data("action");
  // alert(myId);
  $.ajax({
    url:"../actions/update_actions",
    type:"POST",
    data:{action:action_now,myId:myId},
    dataType:"json",
    success:function(response){
      console.log(response);
      $("#myLoanId").val(response.loanId);
      $("#staff_name_").val(response.staffName);
      $("#amount_borrowed").val(response.totalPayment);
      $("#monthly").val(response.monthlyPayment);
      $("#user_due").val(response.due);
      $("#updateLoanStaffModal").modal("show");
    }
  });
 
})
//track payback amount
const monthly_returned = $("#monthly_returned");
monthly_returned .on("change", function(){
  let monthly_payment = $("#monthly").val();
  let paynow = $(this).val();
  if (paynow.length>0 || paynow!="") {
    //calculate
    let sumNow = parseFloat(monthly_payment -paynow);
    if (sumNow>0 || sumNow < 0) {
  $("#error-alert2").html('<?php echo $Alert->alert_msg("Please Enter your monthly payment correctly to proceed!")?>'); 
  $(".submit_update_loan_btn").attr("disabled",true);
    }else if (sumNow ===0 || sumNow==0) {
      $(".submit_update_loan_btn").attr("disabled",false);
      $("#monthly").val(sumNow);
      $("#error-alert2").html('');
    }
  }else 
  return false;
})

  })
function osotechLoanCalculator(){
  const UIamount = $("#amount");
  const UIinterest = $("#interest");
  const UIyears = $("#years");
  const UImonthlyPayment = $("#monthly-payment");
  const UItotalPayment = $("#total-payment");
  const UItotalInterest = $("#total-interest");

   const principal = parseFloat(UIamount.val());
    const calculatedInterest = parseFloat(UIinterest.val())/100 / 12 ;
    const calculatedPayments = parseFloat(UIyears.val())*12;

     const x = Math.pow(1 + calculatedInterest,calculatedPayments);
    const monthly = (principal*x*calculatedInterest)/(x-1);

    if(principal < 0)
    {
      $("#error-alert").html('<?php echo $Alert->alert_msg("Please Enter Positive Amount for Principal") ?>');
    }
    else if(calculatedInterest < 0)
    {
      $("#error-alert").html('<?php echo $Alert->alert_msg("Please Enter Positive Interest Rate") ?>');
    }
    else if(calculatedPayments  < 0)
    {
      $("#error-alert").html('<?php echo $Alert->alert_msg("Please Enter Positive Value") ?>');
    }
    else if(isFinite(monthly)){
        UImonthlyPayment.val(monthly.toFixed(2));
        UItotalPayment.val((monthly*calculatedPayments).toFixed(2));
        UItotalInterest.val(((monthly * calculatedPayments)-principal).toFixed(2));
       
    }else{
        
       $("#error-alert").html('<?php echo $Alert->alert_msg("Please check your number") ?>');
       
    }
}
</script>
  </body>
  <!-- END: Body-->

</html>