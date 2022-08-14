<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: View Hostel Rooms</title>
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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Hostel Rooms
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-hotel fa-2x"></span> HOSTEL BED SPACE</h3>
  </div>
</div>

<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
           <a href="create_hostel"> <button class="btn btn-outline-warning btn-md btn-round" type="button">Create Hotel</button></a>
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead>
                 <tr>
                  <th>Hostel Desc</th>
                 <th>Type</th>
                 <th>Room Desc</th>
                 <th>Bed Space</th>
                 <th>Booked By</th>
                 <th>Class</th>
                 <th>Passport</th>
                 <th>Status</th>
                 <th>Action</th>
               </tr>
              </thead>
              <tbody>
                <tr>
                 <td>GodWin Hostel</td>
                <td>Boys Hostel</td>
                <td>Room A</td>
                <td>Bonk1</td>
                <td>Ojo Adeola</td>
                <td>Jss1</td>
                <td><img src="../assets/loaders/osotech.png" width="60" class="rounded-circle" alt="photo"></td>
                <td><span class="badge badge-success badge-pill"> Available</span></td>
                 <td>
                  <button  type="button" title="Approved" class="btn btn-dark btn-rounded-0 disabled"><i class="fa fa-exclamation"></i> No Applicant</button></td>
                </tr>
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