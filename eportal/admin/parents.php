<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> | Parents List </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/dataTableHeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">PARENTS 
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-1x"></span>  PARENTS PORTAL <span><a href="javascript:void(0);" onclick="window.location.href='./add-parent'" class="btn btn-light-primary btn-sm btn-pill">Add New Parent</a> </span></h3>
  </div>
    </div>

    <div class="card">
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped osotechExp">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Full Name</th>
          <th>Email</th>
          <th>Contact</th>
          <th>Address</th>
          <th>PTA Status</th>
          <th>Occupation</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php
          
          $allParents = $Parents->getAllParents();
          if ($allParents) {
            $cnt =0;

            foreach ($allParents as $parent) {
             $cnt++;
             ?>
            <tr>
              <td><?php echo $cnt; ?></td>
              <td><?php echo $parent->full_name;?></td>
              <td><?php echo $parent->email;?></td>
              <td><?php echo $parent->phone;?></td>
              <td><?php echo $parent->address;?></td>
              <td><?php echo $parent->pta_post;?></td>
              <td><?php echo $parent->occupation;?></td>
              <td><button class="btn btn-primary btn-md btn-pill">Edit</button></td>
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
   
      <!-- filter student ends -->
      </div>
        </div>
      </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/DataTableFooterScript.php"; ?>
    <script src="smappjs/parents.js"></script>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>