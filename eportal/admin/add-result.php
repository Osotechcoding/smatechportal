<?php
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <!-- metaTag -->
  <?php include("../template/MetaTag.php"); ?>
  <title><?php echo ($SmappDetails->school_name); ?> :: Manage Students </title>
  <?php include("../template/dataTableHeaderLink.php"); ?>
</head>
<!-- END: Head-->
<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include("template/HeaderNav.php"); ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include("template/Sidebar.php"); ?>
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
                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'] ?></a>
                </li>
                <li class="breadcrumb-item active">Student Result Management
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
            <h3 class="bd-lead text-primary text-bold"><span class="fa fa-bar-chart fa-1x"></span> STUDENTS TERMINAL RESULTS </h3>
          </div>
        </div>
        <!-- Statistics Cards Starts -->
        
        <div class="card">
          <div class="card-body">
            <div class="users-list-filter px-1">
              <form action="" method="post">
                <div class="row border rounded py-2 mb-2">
                  <div class="col-12 col-md-9 col-sm-9 col-lg-9">
                    <label for="users-list-verified">Result Class</label>
                    <fieldset class="form-group">
                      <select name="student_class" class="form-control custom-select" id="users-list-verified">
                        <option value="">Choose...</option>
                        <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                      </select>
                    </fieldset>
                  </div>
                  
                  <div class="col-12 col-md-3 col-sm-3 col-lg-3 d-flex align-items-center">
                    <button type="submit" name="filter-btn" value="show_list_of_students"
                      class="btn btn-dark glow users-list-clear mb-0"><span class="fa fa-search fa-1x"></span> Search</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- Revenue Growth Chart Starts -->
        <?php if (isset($_POST['filter-btn']) && $_POST['filter-btn'] != "") : ?>
        <?php if (empty($_POST['student_class'])) {
            echo '<div class="text-center col-12 col-md-12">
          ' . $Alert->alert_msg("Student Class is required!", "danger") . '
          </div>';
          } else {
            $student_class = $Configuration->Clean($_POST['student_class']);
            $Grade = $Configuration->Clean($student_class);
            $AllStudents = $Student->getStudentsByClassName($Grade);
            if ($AllStudents) {
              //;
              $count = 0;
          ?>
        <div class="card">
          <div class="card-body">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                  <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center">
                        <tr>
                           <th> PASSPORT</th>
                            <th> STUDENT</th>
                            <th> Class</th>
                            <th> 1st Term</th>
                            <th> 2nd Term </th>
                            <th>3rd Term</th>
                        </tr>
                        </thead>
                        <tbody>
                          <?php 
                            foreach ($AllStudents as $student) {
                $Passport = $Student->displayStudentPassport($student->stdPassport,$student->stdGender);?>
                <tr>
                      <td><img src="<?php echo $Passport;?>" style="width: 100px;border: 2px solid #625D5D; padding: 2px;border-radius:15px"></td>
                    <td><span><?php echo strtoupper($student->full_name) ?></span></td>
                  <td><?php echo strtoupper($student->studentClass) ?></td>
                  <td> 
                  <?php 
                  if ($Student->studentExamSubjectIsUploaded($Grade) != '') {
                    if($Student->studentResultIsUploaded($student->stdRegNo,$student->studentClass,'1st Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=1st Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
                  <a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=1st Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-primary badge-rounded badge-lg">Upload Score</span></a>

                <?php
                  }
                  
                  } else {
                   echo '<span class="badge badge-pill badge-sm badge-danger">No Subjects Found</span>';
                        }
                  ?>
                 </td>
                  <td> 
                  <?php
                  if ($Student->studentExamSubjectIsUploaded($Grade) != '') {
                       if($Student->studentResultIsUploaded($student->stdRegNo,$student->studentClass,'2nd Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=2nd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
                  <a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=2nd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-dark badge-rounded badge-lg">Upload Score</span></a>
                  <?php
                  }
                   } else {
                     echo '<span class="badge badge-pill badge-sm badge-danger">No Subjects Found</span>';
                         }
                 
                  ?>
                </td>
                  <td> 
                  <?php 
                  if ($Student->studentExamSubjectIsUploaded($Grade) != '') {
                    if($Student->studentResultIsUploaded($student->stdRegNo,$student->studentClass,'3rd Term',$activeSess->session_desc_name) !=''){?>
                  <a href="edit-single-result?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=3rd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-warning badge-pill badge-rounded badge-lg m-1">Edit Score</span></a>
                  <?php
                  } else{?>
<a href="result-single-uploading?student-id=<?php echo $Configuration->saltifyString($student->stdId);?>&term=3rd Term&cses=<?php echo $activeSess->session_desc_name;?>&student-class=<?php echo $Configuration->saltifyString(strtoupper($student->studentClass));?>"><span class="badge badge-success badge-rounded badge-lg">Upload Score</span></a>
                  <?php

                  }
                  }else {
                        echo '<span class="badge badge-pill badge-sm badge-danger">No Subjects Found</span>';
                              }
                  
                  ?>
                </td>
                </tr>

                <?php
                            }
                          
                           ?>
                        
                </tbody>
                </table>
            </div>
           </div>
          </div>
        </div>
        <?php
            } else {
              echo '<div class="text-center col-12 col-md-12">
          ' . $Alert->alert_msg("No Result Found!, Please try again", "danger") . '
          </div>';
            }
          } ?>
        <?php endif ?>
      </div>
    </div>
  </div>
  <!-- END: Content-->
  </div>
  <!-- demo chat-->
  <?php include("../template/footer.php"); ?>
  <!-- END: Footer-->
  <!-- BEGIN: Vendor JS-->
  <?php include("../template/DataTableFooterScript.php"); ?>

</body>
<!-- END: Body-->

</html>