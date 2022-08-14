<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Return Books </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
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
             <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Current User</a>
                  </li>
                  <li class="breadcrumb-item active">RETURN BOOKS
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
 <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-book fa-2x"></span> RETURN BOOKS</h3>
  </div>
</div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechExp">
              <thead>
                <tr>
                  <th>S/N</th>
                  <th>Image</th>
                  <th>Student Name</th>
                  <th>Class</th>
                  <th>Book(ISBN)</th>
                  <th>Borrowed Date</th>
                  <th>Due Date</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                <td><img src="assets/loaders/osotech.png" width="40" class="rounded-circle" alt="photo"></td>
                  <td>Osotech Sam</td>
                  <td>JSS1</td>
                  <td>344345</td>
                 <td>28-02-2022</td>
                 <td>28-02-2022</td>
                 <td><button type="button" class="badge badge-dark"><i class="fa fa-reply-all"></i> Clear</button></td>
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
    <script>
      $(document).ready(function(){
       //code goes here
      })
    </script>
   <!-- DataTableFooterScript.php -->
  </body>
  <!-- END: Body-->

</html>