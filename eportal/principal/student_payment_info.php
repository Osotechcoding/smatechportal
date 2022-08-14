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
  $student_data = $Administration->get_student_payment_by_regNo($stuId,$std_regNo,$stuClass);
  if ($student_data) {
  $fetch_details = $Student->get_single_student_details_by_regId($stuId,$std_regNo);
  }else{
    header("location: ./make_payment");
  exit();
  }
 }else{
  header("location: ./make_payment");
  exit();
 }
}else{
  header("location: ./make_payment");
  exit();
}

  ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> <?php echo strtoupper($fetch_details->full_name);?></title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                 <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"><?php echo strtoupper($fetch_details->full_name);?> PAYMENTS
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12 mb-2">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> <?php echo strtoupper($fetch_details->full_name);?> PAYMENTS &raquo;&raquo; <span class="text-warning"><?php echo strtoupper($fetch_details->stdRegNo);?></span></h3>
  </div>
    </div>
    <div class="row">
        <!-- Statistics Cards Starts -->
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Total Fee</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_sum_of_allocated_fee_by_className($stuClass),2) ?></h2>
                  
                </div>
              </div>
            </div>
          
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Paid </h3></div>
                   <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_sum_of_student_total_due("fee_paid",$stuId,$std_regNo,$stuClass),2) ?></h2>
                </div>
              </div>
            </div>
              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-line-chart fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Outstanding</h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_sum_of_student_total_due("fee_due",$stuId,$std_regNo,$stuClass),2) ?></h2>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
      </div>
     <div class="card">
      <div class="card-header">
          <a href="fee_component"> <button type="button" class="btn btn-outline-warning btn-md btn-round" > Results Info </button></a>
        </div>
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover">
        <thead class="text-center">
          <tr>
          <th>TYPE</th>
          <th>CLASS</th>
          <th>AMOUNT</th>
          <th>PAID</th>
           <th>DUE</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          foreach ($student_data as $value) { 
            $feeType_data =$Administration->get_feeTypeByType($value->component_id);
            $payment_records = $Administration->get_student_payment_records($stuId,$std_regNo,$stuClass,$feeType_data->feeType);
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
          <td><div class="btn-group dropdown mb-1">
            <button type="button" class="btn btn-dark">Options</button>
            <button type="button" class="btn btn-outline-dark dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" data-reference="parent">
              <span class="sr-only">Toggle Dropdown</span>
            </button>
           <div class="dropdown-menu">
            <?php if ($payment_records):?>
              <?php if ($payment_records->payment_status=='2'): ?>
                <?php else: ?>
            <a class="dropdown-item text-warning update_student_fee_btn" data-term="<?php echo $activeSess->term_desc;?>" data-session="<?php echo $activeSess->session_desc_name;?>" data-payment="<?php echo $payment_records->paymentId;?>" data-fee="<?php echo $feeType_data->feeType;?>" data-student="<?php echo $std_regNo;?>" data-id="<?php echo $stuId; ?>" data-stdroom="<?php echo $value->studentClass;?>" href="javascript:void(0);"><span class="fa fa-edit"></span>&nbsp;Update Payment</a>
              <?php endif ?>
              
              <?php else: ?>
            <a class="dropdown-item text-success make_payment_btn" href="javascript:void(0);" data-fee="<?php echo $feeType_data->feeType;?>" data-student="<?php echo $std_regNo;?>" data-id="<?php echo $stuId; ?>" data-stdClass="<?php echo $value->studentClass;?>" data-amount="<?php echo $value->amount; ?>"><span class="fa fa-edit"></span>&nbsp;Make Payment</a>
            <?php endif ?>
              <a class="dropdown-item text-info" href="student_reciept_list?std_regNo=<?php echo base64_encode(urlencode(($std_regNo)));?>&stuId=<?php echo base64_encode(urlencode(($stuId)));?>&stuClass=<?php echo base64_encode(urlencode(($stuClass)));?>"><span class="fa fa-address-card"></span>&nbsp; Receipt List</a>

            </div>
          </div></td>
        </tr>
            <?php
          }
           ?>
      </tbody>
        <!--   -->
      </table>
    </div>
      </div>
    </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->

  
    </div>
   

    <?php include("template/updateStuFeeModal.php");?>

     <!-- BUS MODAL Start -->
   <?php include ("template/StuPaymentFeeModal.php");?>
    <!-- BUS MODAL  END -->
    <!-- BEGIN: Footer-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
      //updated_amount
      calculateDue($("#updated_amount"));
      amount_to_pay($("#amount_to_pay"));

      const make_payment_btn = $(".make_payment_btn");
      make_payment_btn.on("click", function(){
        //get all info to show
        const feeType = $(this).data('fee');
        const studentReg = $(this).data('student');
        const stId = $(this).data('id');
        const amount = $(this).data('amount');
       // alert(amount+" "+stId+" "+ studentReg+" "+feeType);
        //display this infos in make Payment form
        $("#myComponent_fee").val(feeType);
         $("#termly_amount").val(amount);
          $("#paymentTitle").html(feeType);
           //$("#type_of_fee").val(feeType);
           $("#newPaymentModalForm").modal("show");
      });
      //if bank payment then show teller field
      const payMethod = $("#payMethod");
      payMethod.on("change", function(){
        let payType = $(this).val();
        if (payType ==="Bank") {
          $(".dispalyNone").show().slideDown(500);
        }else{
            $(".dispalyNone").hide().slideUp('slow');
        }
      });
       //if bank payment then show teller field
      const payMode = $("#paymentMethod");
      payMode.on("change", function(){
        let payType2 = $(this).val();
        if (payType2 ==="Bank") {
          $(".dispalyNone_Update").show().slideDown('slow');
        }else{
            $(".dispalyNone_Update").hide().slideUp('slow');
        }
      });
      //when the payment form is submitted
      $("#update_student_fee_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn2__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const update_student_fee_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/update_actions",update_student_fee_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn2__").html('Update').attr("disabled",false);
        $("#text-response2").html(data);
          },1000);
        })
        // self.location.reload();
      });
      //when update payment btn is clicked
      const update_student_fee_btn = $(".update_student_fee_btn");
      update_student_fee_btn.on("click", function(){
        //alert("Yes!");
       let cfee = $(this).data("fee"),cI =$(this).data("payment"),stReg =$(this).data("student"),stId =$(this).data("id"),grade =$(this).data("stdroom"),term =$(this).data("term"),session = $(this).data("session"),dAction="fetch_student_due_bal_data";
       // alert(cfee+" "+ cI+ " "+stReg+" "+stId+" "+grade+" "+term+" "+session);
        //send to server
        $.ajax({
          url:"../actions/update_actions",
          type:"POST",
          data:{
            action:dAction,
            paymentId:cI,
            std_id:stId,
            stdRegNo:stReg,
            stdgrade:grade,
            fee_type:cfee,
            term:term,
            session:session
          },
          dataType:"json",
          success:function(data_res){
            $("#structure_fee").val(data_res.component_fee);
            $("#outStanding").val(data_res.fee_due);
            $("#paymentId").val(data_res.paymentId);
            $("#paid_not_hidden").val(data_res.fee_paid);
            $("#amount_not_hidden").val(data_res.total_fee);
            $("#update_modal_title").html(data_res.component_fee);
            $("#feeUpdateModal").modal("show");
          }
        });
      })

      //when an update btn is clicked
        //when the payment form is submitted
      $("#make_payment_modal_form").on("submit", function(event){
        event.preventDefault();
         $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        const make_payment_modal_form = $(this).serialize();
       // alert("Subject Saved Successfully");
        //send to server
        $.post("../actions/actions",make_payment_modal_form,function(data){
          setTimeout(()=>{
        $(".__loadingBtn__").html('Submit Payment').attr("disabled",false);
        $("#text-response").html(data);
          },2000);
        })
        // self.location.reload();
      });

     });


function amount_to_pay(data){
    data.on("keyup",function(){
      let amount_ = $(this).val();
      let total_amount = $("#termly_amount").val();
      if (amount_.length > 0 || amount_!="") {
        let due_total = parseInt(total_amount-amount_);
        $("#due_bal").val(due_total);
      }else{
         $("#due_bal").val(0);
      }
    })
}

function calculateDue(data){
    data.on("keyup",function(){
      let amt_ = $(this).val();
      let total_am = $("#outStanding").val();
      if (amt_.length > 0 || amt_!="") {
        let due_tot = parseInt(total_am-amt_);
        $("#due_balance").val(due_tot);
      }else{
         $("#due_balance").val(0);
      }
    })
}
   </script>
  </body>
  <!-- END: Body-->
</html>