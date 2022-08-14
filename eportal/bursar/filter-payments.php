<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Fee Management - GSSOTA</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Fee Management
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-money fa-1x"></span> SCHOOL FINANCIAL MANAGEMENT</h3>
  </div>
    </div>
     <!-- Statistics Cards Starts -->
    <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-success">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Today </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_paid_today(),2);?></h2>
                  
                </div>
              </div>
            </div>
             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">This Term </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_paid_by_term($activeSess->session_desc_name,$activeSess->term_desc),2) ?></h2>
                  
                </div>
              </div>
            </div>

              <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-money fa-3x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white">Outstanding </h3></div>
                  <h2 class="text-white mb-0">&#8358;<?php echo number_format($Administration->get_all_money_outstanding_by_term($activeSess->session_desc_name,$activeSess->term_desc),2) ?></h2>
                  
                </div>
              </div>
            </div>
           
            
          </div>
        </div>
    
      </div>
           <!-- Revenue Growth Chart Starts -->
     <div class="card">
      <!-- filter student -->
       <div class="users-list-filter px-1">
        <form action="" method="post">
            <div class="row border rounded py-2 mb-2">
                
                <div class="col-md-2">
                    <label for="ClassGrade">Student Class</label>
                    <fieldset class="form-group">
                        <select class="form-control select2" name="ClassGrade" id="ClassGrade">
                            <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                        </select>
                    </fieldset>
                </div>
                  <div class="col-md-2">
                    <label for="pstatus">Payment Status</label>
                    <fieldset class="form-group">
                        <select class="form-control" name="pstatus" id="pstatus">
                            <option value="">Choose...</option>
                          <option value="1">Part Payment</option>
                          <option value="2">Complete Payment</option>
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-2">
                    <label for="feeType">Fee Type</label>
                    <fieldset class="form-group">
                     <select class="form-control select2" name="feeType" id="feeType">
                            <option value="">Choose...</option>
                           <?php echo $Administration->fee_component_inDropDown(); ?>
                        </select>
                    </fieldset>
                </div>
                 <div class="col-md-2">
                    <label for="term">Term</label>
                    <fieldset class="form-group">
                    <select class="form-control" name="term" id="term">
                            <option value="">Choose...</option>
                           <option value="1st Term">1st Term</option>
                     <option value="2nd Term">2nd Term</option>
                     <option value="3rd Term">3rd Term</option>
                        </select>
                    </fieldset>
                </div>
                 <div class="col-md-2">
                    <label for="session">Session</label>
                    <fieldset class="form-group">
                    <select class="form-control select2" name="session" id="session">
                            <option value="">Choose...</option>
                           <?php echo $Administration->get_all_session_lists(); ?>
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-2 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0" name="submit_search_payment">Submit</button>
                </div>
            </div>
        </form>
    </div>
      <!-- filter student ends -->
     <!--  <div class="card-header">
          
          <a href="fee_component"> <button type="button" class="btn btn-outline-warning btn-md btn-round" > View Component </button></a>
        </div> -->
      <div class="card-body">
        <?php 
        if (isset($_POST['submit_search_payment'])) {
          // code...
          $studentClass = $Configuration->Clean($_POST['ClassGrade']);
          $feeType = $Configuration->Clean($_POST['feeType']);
          $status = $Configuration->Clean($_POST['pstatus']);
          $term = $Configuration->Clean($_POST['term']);
          $session = $Configuration->Clean($_POST['session']);

          if ($Configuration->isEmptyStr($studentClass) || $Configuration->isEmptyStr($feeType) || $Configuration->isEmptyStr($status) || $Configuration->isEmptyStr($term) || $Configuration->isEmptyStr($session)) {
            echo $Alert->alert_msg("Notice: All fields are required to proceed","danger");
          }else{
            $search_data =  $Administration->filter_students_by_payments_type_status($studentClass,$feeType,$status,$term,$session);
            if ($search_data!=false) { ?>
  <div class="table-responsive">
     <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>ADMISSION NO</th>
          <th>CLASS</th>
          <th>FEE TYPE</th>
          <th>FEE AMOUNT</th>
          <th> DUE</th>
          <th>Status</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
        <?php   
              foreach ($search_data as $val) {
            $student_data = $Student->get_single_student_details_by_regId($val->std_id,$val->stdAdmNo);?>
            <tr>
          <td><img src="result-asset/author.jpg" width="80" alt="photo"></td>
          <td><?php echo strtoupper($student_data->full_name) ?> </td>
          <td><?php echo strtoupper($student_data->stdRegNo) ?></td>
          <td><?php echo strtoupper($student_data->studentClass) ?></td>
          <td><?php echo ucwords($val->component_fee) ?></td>
          <td><?php echo number_format($val->total_fee,2) ?></td>
          <td><?php echo strtoupper($val->fee_due) ?></td>
           <td><?php if ($val->payment_status=='0') {
            echo '<span class="badge badge-danger badge-md">Not Paid</span>';
           }elseif ($val->payment_status=='1') {
          echo '<span class="badge badge-warning badge-md">Part Payment</span>';
           }else{
            $val->payment_status='2';
             echo '<span class="badge badge-success badge-md"> Payment Completed</span>';
           } 
            ?>
             </td>
         <td>
          <a href="student_payment_info?std_regNo=<?php echo base64_encode(urlencode(($student_data->stdRegNo)));?>&stuId=<?php echo base64_encode(urlencode(($student_data->stdId)));?>&stuClass=<?php echo base64_encode(urlencode(($student_data->studentClass))) ?>"><button type="button" class="btn btn-dark btn-sm">Make Payment</button></a>
        </td>
        </tr>
            <?php
              }

              ?>
      </tbody>
      </table>
    </div>
           <?php }else{
 echo $Alert->alert_msg("Notice: No Result found please try again...","danger");
            }
          }
        }
       
         ?>
      </div>
    </div>
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
    <?php //include ("template/ChatDemo.php");?>
   <!--  <div class="sidenav-overlay"></div>
    <div class="drag-target"></div> -->
    <!-- BEGIN: Footer-->
   <!--  -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   
  </body>
  <!-- END: Body-->
</html>