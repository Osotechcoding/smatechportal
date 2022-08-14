<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name; ?> :: Student Admission Portal</title>
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
             <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
                  </li>
                  <li class="breadcrumb-item active">Student Admission Portal
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
  <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-user-plus fa-2x"></span> STUDENT ADMISSION PORTAL</h3>
  </div>
 
</div>
<div class="text-center ml-2"> <?php include("template/admBtnLink.php");?></div>
<!-- Column selectors with Export Options and print table -->
<section id="column-selectors">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
        </div>
        <div class="card-body card-dashboard">
          <div class="table-responsive">
            <table class="table table-striped osotechDatatable">
              <thead>
                <tr>
                  <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>ADMISSION NO</th>
          <th>CLASS</th>
          <th>VERIFICATION</th>
          <th>STATUS</th>
          <th>ACTION</th>
                </tr>
              </thead>
              <tbody>
                <?php 
          $all_active_students = $Student->get_all_students_by_status("pending");
          if ($all_active_students) {
           foreach ($all_active_students as $students) {?>
            <tr>
             <td>
              <?php if ($students->stdPassport ==""||$students->stdPassport ==NULL): ?>
                <a href="./uploadstudentpassport?stdRegistrationId=<?php echo $students->stdRegNo;?>&actionId=<?php echo $students->stdId;?>"><button type="button" class="badge badge-dark">
                  <span class="fa fa-camera"></span> Upload</button></a>
                <?php else: ?>
                  <img src="../schoolImages/students/<?php echo $students->stdPassport;?>" width="80" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
              <?php endif ?>
              
              </td>
          <td><?php echo ucwords($students->stdSurName." ".$students->stdFirstName." ".$students->stdMiddleName) ?></td>
          <td><?php echo strtoupper($students->stdRegNo)?></td>
          <td><?php echo strtoupper($students->studentClass)?></td>
           <td><?php if ($students->stdConfToken !=NULL || $students->stdConfToken!=""): ?>
           <span class="badge badge-dark badge-pill mb-1"><?php echo $students->stdConfToken ?></span>
            <span class="badge badge-warning badge-pill">Not Verified</span>
             <?php else: ?>
              <span class="badge badge-success badge-pill">Verified</span>
           <?php endif ?></td>
           <td> <?php if ($students->stdAdmStatus =="Pending"): ?>
           <span class="badge badge-danger badge-pill">Pending</span>
             <?php else: ?>
              <span class="badge badge-success badge-pill">Admitted</span>
           <?php endif ?> 
            </td>
         <td>
          <div class="btn-group mb-1">
            <a class="text-info" href="editstudentinfo?student-data=<?php echo ($students->stdId);?>">
              <button type="button" class="btn btn-dark btn-sm"><span class="fa fa-edit"></span></button></a> 
          </div>
          <!--  -->
        </td>
        </tr>
          <?php }
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
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <?php include_once ("Links/adm_button_links.js.php") ?>
   
  </body>
  <!-- END: Body-->

</html>