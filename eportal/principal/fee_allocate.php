<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Fee Allocation - <?php echo $SmappDetails->school_name ?></title>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Fee Allocation
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-money fa-1x"></span> FEES & LEVIES STRUCTURE</h3>
  </div>
    </div>
     <div class="card">
     
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>CLASS</th>
          <th>TYPE</th>
          <th>AMOUNT</th>
          <th>CREATED</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
          $all_allocations = $Administration->get_all_allocated_fees();
          if ($all_allocations) {
            $x =0;
            foreach ($all_allocations as $allocate) {
              $x++;
              ?>
        <tr>
          <td><?php echo $x; ?></td>
          <td><?php echo strtoupper($allocate->gradeDesc);?></td>
           <td><?php echo strtoupper($allocate->feeType) ?></td>
          <td>&#8358;<?php echo number_format($allocate->amount,2)?></td>
          <td><?php echo date("j F Y",strtotime($allocate->created_on)) ?></td>
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
       $(".osotechDatatable").DataTable();
     })
   </script>

  </body>
  <!-- END: Body-->
</html>