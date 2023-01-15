<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title> Holidays - <?php echo $SmappDetails->school_name ?></title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
    <!-- include dataTableHeaderLink.php -->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- headerNav.php -->
    <!-- END: Header-->


    <!-- BEGIN: Main Menu-->
  <!--  -->
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
                  <li class="breadcrumb-item"><a href="#">Receptionist </a>
                  </li>
                  <li class="breadcrumb-item active">Manage Holiday
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-calendar fa-1x"></span> SCHOOL HOLIDAYS</h3>
  </div>
          </div>
       <div class="card">
      <div class="card-body">
        <div class="table-responsive">
      <table class="table osotechDatatable table-hover table-bordered">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>DESCRIPTION</th>
          <th>DECLARED BY</th>
          <th>DATE FROM</th>
          <th>DATE TO</th>
  <th>STATUS</th>
          <th>ACTION</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 

          $allHolidays = $Administration->getAllHolidays();
          if ($allHolidays) {
            $cnt =0;
           foreach ($allHolidays as $holiday) {
            $cnt++;
            ?>
          <tr>
          <td><?php echo $cnt; ?></td>
          <td><?php echo ucwords($holiday->holiday_desc);?></td>
          <td><?php echo ucwords($holiday->declared_by);?><br>
            <span class="badge badge-pill badge-dark read_info" data-info="<?php echo $holiday->note_msg; ?>" style="cursor: pointer;" >Read Details</span>
          </td>
          <td><?php echo date("D j M, Y",strtotime($holiday->date_from));?></td>
          <td><?php echo date("D j M, Y",strtotime($holiday->to_date));?></td>
          <td><?php if (date("Y-m-d",strtotime($holiday->to_date)) <= date("Y-m-d")): ?>
          <span class="badge badge-pill badge-dark">Observed</span>
            <?php else: ?>
            <span class="badge badge-pill badge-info">Up Coming</span>
          <?php endif ?> </td>
         <td><button class="btn btn-danger btn-md btn-round __loadingBtn__<?php echo $holiday->id;?> delete_btn" data-id="<?php echo $holiday->id;?>">Delete</button> </td>
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
    </div>
    <!-- END: Content-->
   
    </div>
    <!-- demo chat-->
   
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
  
  </body>
  <!-- END: Body-->

</html>