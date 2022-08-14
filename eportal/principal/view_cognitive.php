<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Uploaded Students Affective Domain</title>
   <!-- include template/HeaderLink.php -->
   <?php include ("../template/dataTableHeaderLink.php"); ?>
   <?php //include "template/HeaderLink.php"; ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
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
                  <li class="breadcrumb-item active">View Affective Domain
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> View Uploaded Students Affective Domain </h3>
  </div>
    </div>
    <!-- content goes here -->
     
        <div class="card">
          <div class="card-header">
            <!-- <h3>View Cognitive</h3> -->
             <?php include_once 'Links/results_btn.php'; ?>
          </div>

          <div class="card-body">
             <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
       
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="_class_name"> Class</label>
                    <select name="_class_name" id="_class_name" class="select2 form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list();?>
                    </select>
                  </div>
                </div>
              
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="_term"> Term</label>
                    <select name="_term" id="_term" class="custom-select form-control">
                      <option value="">--Select--</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="school_session">Academic Session</label>
                   <select name="school_session" id="school_session" class="select2 form-control">
                      <option value="" selected>Choose...</option>
                      <?php echo $Administration->get_all_session_lists();?>
                    </select>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                  <button type="submit" name="view_cognitive_btn" class="btn btn-dark mr-1">View Affective Domain</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
   
  </div>
</section>
<!-- Basic Vertical form layout section end -->
        </div>
      </div>
      <?php 
      if (isset($_POST['view_cognitive_btn'])) {
         $std_class = $Configuration->Clean($_POST['_class_name']);
            $_term = $Configuration->Clean($_POST['_term']);
            $school_session = $Configuration->Clean($_POST['school_session']);
            if ($Configuration->isEmptyStr($std_class) || $Configuration->isEmptyStr($_term) || $Configuration->isEmptyStr($school_session)) {
            echo $Alert->alert_msg(" Please Select Class,Term and Session to Continue!","danger");
            }else{
$all_affective_domains = $Administration->get_all_affective_domain($std_class,$_term,$school_session);
if ($all_affective_domains) {?>
<div class="card">
   <h2 class="text-info text-center">GLORY SUPREME SCHOOLS</h2>
                  <h5 class="text-center text-warning">1 -5,Glory Supreme Avanue,Ijagba, Onigbin, Ota,<br /> Ogun State, Nigeria</h5>
        <h4 class="text-center text-danger"><strong>STUDENTS AFFECTIVE DOMAIN ANALYSIS SHEET</strong></h4>
                      <!-- ############################# -->
            <br />
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
            <span class="btn btn-info btn-round text-center"><?php echo strtoupper($std_class) ?> </span>
                <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($_term) ?> </span>
                <span class="btn btn-danger btn-round text-center"><?php echo ($school_session) ?> </span>
            </div> 
 <div class="card-body">
<div class="table-responsive">
        <table class=" table-bordered table table-stripped table-hover osotechExp">
                <thead class="text-center">
                   <tr>
                    <th>Student</th>
                    <th>Reg No</th>
                    <th> Writing</th>
                    <th> Musical</th>
                    <th>Sports</th>
                    <th>Attentiveness</th>
                    <th>Attitude</th>
                    <th>Punctuality</th>
                    <th>Health</th>
                    <th>Politeness</th>
                </tr>
            </thead>
            <tbody class="text-center">
                  <?php foreach ($all_affective_domains as $value): ?>
                    <?php $student_data = $Student->get_student_data_byId($value->student_id) ?>
                            <tr>
                        <td><span><?php echo strtoupper($student_data->full_name);?></span></td>
                        <td><span><?php echo strtoupper($student_data->stdRegNo);?></span></td>
                        <td><?php echo $value->hand_writing;?></td>
                        <td><?php echo $value->musical_skills;?></td>
                        <td><?php echo $value->sports;?></td>
                        <td><?php echo $value->attentiveness;?></td>
                        <td><?php echo $value->attitude_to_work;?></td>
                        <td><?php echo $value->punctality;?></td>
                        <td><?php echo $value->health;?></td>
                        <td><?php echo $value->politeness;?></td>
                    </tr>                   
                    <?php endforeach ?>               
                          
                         </tbody>
                          </table>
                          </div>
                          </div>
                           </div>
                          <!-- ends -->
  <?php
  // code...
}else{
   echo "<div class='card'><div class='card-body text-center'>
          ".$Alert->alert_msg(" No result found, Please try again!","danger")."
          </div></div>";
}
            }
      }
       ?>
       <!--  -->
    <!-- content goes end -->
     </div>
    </div>
    <!-- END: Content-->

    </div>
    <!-- BEGIN: Footer-->
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
   <?php include ("../template/DataTableFooterScript.php"); ?>
    <?php //include "template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>