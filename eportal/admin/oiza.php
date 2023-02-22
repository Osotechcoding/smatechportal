<?php 
require_once "helpers/helper.php";

if (isset($_GET['grade-desc']) && !$Configuration->isEmptyStr($_GET['grade-desc'])) {

$grade_desc = $Configuration->Clean($_GET['grade-desc']);
}else{
 header("Location: student-classes");
 exit();
}
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> - <?php echo $grade_desc; ?> Students </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'];?></a>
                  </li>
                  <li class="breadcrumb-item active"><a href="javascript:void(0);" onclick="window.location.href='student-classes';" class="text-danger text-bold-700">Go Back</a>
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold mb-5"><span class="fa fa-laptop fa-1x"></span> List of <?php 
    $first3Letters = substr($grade_desc, 0, 3);
     if ($first3Letters == "JSS" || $first3Letters == "SSS") {
     echo strtoupper($grade_desc). ' Students';
    }else{
 echo strtoupper($grade_desc). ' Pupils';
    } ?></h3>
  </div>
    </div>
   <div class="card">
     <div class="card-body">
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
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Male</h3>
                    </div>
                    <h2 class="text-white mb-0"> <?php echo $Student->count_students_by_gender_by_grade($grade_desc,"Male"); ?></h2>
                  </div>
                </div>
              </div>

              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-danger">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Female</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Student->count_students_by_gender_by_grade($grade_desc,"Female"); ?></h2>
                  </div>
                </div>
              </div>
              <div class="col-md-4 dashboard-users-success">
                <div class="card text-center bg-dark">
                  <div class="card-body py-1">
                    <div class="badge-circle badge-circle-lg badge-circle-light-white mx-auto mb-50">
                      <i class="fa fa-user-plus fa-2x font-medium-10"></i>
                    </div>
                    <div class="text-white line-ellipsis">
                      <h3 class="text-white"> Students</h3>
                    </div>
                    <h2 class="text-white mb-0"><?php echo $Student->count_total_visap_students_by_grade($grade_desc); ?></h2>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="row">
          <?php 
          $getStudentLists = $Student->get_students_byClassDesc($grade_desc);
          if ($getStudentLists) {
            $cnt = 0;
             foreach ($getStudentLists as $student) {
              $cnt++;
$Passport = $Student->displayStudentPassport($student->stdPassport,$student->stdGender);
              ?>
              <!-- Grid Card -->
  <div class="col-md-4 mb-1 mt-2">
    <div class="card h-70 bg-dark text-white" style="border-radius: 15%;">
      <div class="text-center mt-1 mb-1"><span class="badge badge-success badge-md badge-pill"> Active</span> </div>
      <img class="card-img-top" src="<?php echo $Passport;?>" alt="Card image cap" width="100" style="border-radius: 20%; border: 4px solid #ccc;" />
      <div class="card-body">
        <h4 class="card-text text-white text-center"><span><?php echo ucwords($student->full_name);?></span></h4>
        <h6 class="card-text text-center text-white"><?php echo ($student->stdEmail);?></h6>
        <p class="card-text text-center"><?php echo $student->stdRegNo; ?></p>
        <div class="card-footer mb-0">
          <div class="text-center">
         <a class="card-link text-white" href="editstudentinfo?student-data=<?php echo ($student->stdId); ?>"><span class="fa fa-edit"></span> Edit </a>
        <a href="javascript:void(0);" class="card-link text-white"><span class="fa fa-credit-card"></span>  Payment</a>
        <?php if ($student->stdPassport == NULL || $student->stdPassport ==""): ?>
           <a href="./uploadstudentpassport?stdRegistrationId=<?php echo $student->stdRegNo; ?>&actionId=<?php echo $student->stdId;?>" class="card-link text-white"><span class="fa fa-camera"></span> Upload Passport</a>
           <?php else: ?>
            <a href="./uploadstudentpassport?stdRegistrationId=<?php echo $student->stdRegNo; ?>&actionId=<?php echo $student->stdId;?>" class="card-link text-white"><span class="fa fa-camera"></span> Change Passport</a>
        <?php endif ?>
          </div>
        </div>
      </div>
      
    </div>
  </div>
<!-- grid -->
              <?php
             }
           } ?>
           </div> 
     </div>
   </div>
   
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>