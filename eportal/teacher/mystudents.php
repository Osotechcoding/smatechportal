<?php 
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->

<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: My Students </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">

    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> Portal</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['STAFF_ROLE'] ?></a>
                  </li>
                  <li class="breadcrumb-item active">Student Management
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-graduation-cap fa-1x"></span> <b class="text-warning"><?php echo strtoupper($staff_assigned_class) ?></b> STUDENTS </h3>
  </div>
    </div>
     <!-- Statistics Cards Starts -->
        <div class="row">
       
        <div class="col-xl-12 col-md-12">
          <div class="row">
    
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-info">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Male</h3></div>
                  <h2 class="text-white mb-0"> <?php echo $Student->count_students_by_gender_class($staff_assigned_class,"Male");?></h2>
                 
                </div>
              </div>
            </div>

             <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-danger">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Female</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Student->count_students_by_gender_class($staff_assigned_class,"Female");?></h2>
                  
                </div>
              </div>
            </div>
            <div class="col-md-4 dashboard-users-success">
              <div class="card text-center bg-dark">
                <div class="card-body py-1">
                  <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                    <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                  </div>
                  <div class="text-white line-ellipsis"><h3 class="text-white"> Students</h3></div>
                  <h2 class="text-white mb-0"><?php echo $Student->count_total_visap_students_class($staff_assigned_class); ?></h2>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
       
      </div>
       <!-- Revenue Growth Chart Starts -->
    <div class="card">
      <div class="card-body">
         <div class="table-responsive">
      <table class="table table-bordered">
        <thead class="text-center">
          <tr>
            <th>S/N</th>
          <th>PASSPORT</th>
          <th>FULLNAME</th>
          <th>ADMISSION NO</th>
          <th>Gender</th>
          <th>CLASS</th>
          <th>STATUS</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php //$staff_assigned_class
          $all_active_students = $Student->get_all_students_by_status_by_class($staff_assigned_class,"Active");
          if ($all_active_students) {
            $count =0;
           foreach ($all_active_students as $students) { 
            $count++;
            ?>
            <tr>
              <td><?php echo $count; ?></td>
             <td>
              <?php if ($students->stdPassport ==""||$students->stdPassport ==NULL): ?>
                <?php if ($students->stdGender == "Male"): ?>
      <img src="../schoolImages/students/male.png" width="80" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
      <?php else: ?>
        <img src="../schoolImages/students/female.png" width="80" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
    <?php endif ?>
                <?php else: ?>
                  <img src="../schoolImages/students/<?php echo $students->stdPassport;?>" width="80" style="border-radius: 10px;border: 3px solid deepskyblue;" alt="student-passport">
              <?php endif ?>
              
              </td>
          <td><?php echo ucwords($students->stdSurName." ".$students->stdFirstName." ".$students->stdMiddleName) ?></td>
          <td><?php echo strtoupper($students->stdRegNo)?></td>
           <td><?php echo ucfirst($students->stdGender)?></td>
          <td><?php echo strtoupper($students->studentClass)?></td>
           
           <td><span class="badge badge-success badge-pill">Admitted</span></td>
       
      
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
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script>
     $(document).ready(function(){
     })
   </script>
  </body>
  <!-- END: Body-->

</html>