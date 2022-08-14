<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Fee Management</title>
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
                
                <div class="col-md-4">
                    <label for="ClassGrade">Student Class</label>
                    <fieldset class="form-group">
                        <select class="form-control select2" name="ClassGrade" id="ClassGrade">
                            <option value="">Choose...</option>
                           <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                        </select>
                    </fieldset>
                </div>
                <div class="col-md-5">
                    <label for="RegNo">Student RegNo</label>
                    <fieldset class="form-group">
                     <input type="text" autocomplete="off" class="form-control to-uppercase" name="RegNo" placeholder="Enter Student Admission No" style="text-transform: uppercase;">
                     <!-- oninput="this.value=this.value.toUpperCase();" -->
                    </fieldset>
                </div>
                <div class="col-md-3 d-flex align-items-center">
                    <button type="submit" class="btn btn-primary btn-block glow users-list-clear mb-0" name="submit_search_btn">Get Details</button>
                </div>
            </div>
        </form>
    </div>
      <!-- filter student ends -->
      <div class="card-body">
        <?php 
        if (isset($_POST['submit_search_btn'])) {
          // code...
          $stdClass = $Configuration->Clean($_POST['ClassGrade']);
          $stdRegNo = $Configuration->Clean($_POST['RegNo']);

          if ($Configuration->isEmptyStr($stdClass) || $Configuration->isEmptyStr($stdRegNo)) {
            echo $Alert->alert_msg("Notice: Please Enter Stdent Class and Admission No to proceed","danger");
          }else{
            $search_data =  $Student->filter_students_by_payments($stdClass,$stdRegNo);
            if ($search_data) { ?>
        <div class="table-responsive">
     <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>ADMISSION NO</th>
          <th>CLASS</th>
          <th>TOTAL FEE</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <tr>
          <td><img src="../result-asset/author.jpg" width="80" alt="photo"></td>
          <td><?php echo strtoupper($search_data->full_name) ?> </td>
          <td><?php echo strtoupper($search_data->stdRegNo) ?></td>
          <td><?php echo strtoupper($search_data->studentClass) ?></td>
           <td><h3 class="text-info"> &#8358;<?php echo number_format($Administration->get_sum_of_allocated_fee_by_className($search_data->studentClass),2) ?></h3> </td>
         <td>
          <a href="student_payment_info?std_regNo=<?php echo base64_encode(urlencode(($search_data->stdRegNo)));?>&stuId=<?php echo base64_encode(urlencode(($search_data->stdId)));?>&stuClass=<?php echo base64_encode(urlencode(($search_data->studentClass))) ?>"><button type="button" class="btn btn-dark btn-sm">Make Payment</button></a>
        </td>
        </tr>
      </tbody>
      </table>
    </div>
           <?php }else{
 echo $Alert->alert_msg("Notice: No Student found for $stdRegNo in $stdClass","danger");
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
    <!-- BEGIN: Footer-->
   <!--  -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
      const view_btn_info = $(".view_payment_info_btn");
      view_btn_info.on("click", function(){
        view_btn_info.html("wait...").attr("disabled",true);
         let student_id = $(this).data("student");
      var href ="student_payment_info?std_regNo="+student_id;
      alert(student_id)
      setTimeout(()=>{
 view_btn_info.html("wait...").attr("disabled",false);
 window.location.assign(href);
    },500);
      })
     })
   </script>
  </body>
  <!-- END: Body-->
</html>