<?php 
require_once "helpers/helper.php";
 ?>

<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: Uploaded Student Result</title>
   <!-- include template/HeaderLink.php -->
    <?php include ("../template/dataTableHeaderLink.php"); ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
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
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>
                  <li class="breadcrumb-item active"> Results
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-1x"></span> View Student Results</h3>
  </div>
    </div>
    <!-- content goes here -->
        
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">

                 <div class="col-md-3">
                  <div class="form-group">
                   <label for="subject">Result Subject</label>
                    <select name="subject" id="subject" class="select2 form-control">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_subjects_InDropDown_list();?>
                    </select>
                    </div>
               </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_class">STUDENT CLASS</label>
                    <select name="result_class" id="result_class" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_classroom_InDropDown_list(); ?>
                    </select>
                  </div>
                </div>

                 <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_term">Term</label>
                    <select name="result_term" class="custom-select form-control" id="">
                      <option value="">Choose...</option>
                      <option value="1st Term">1st Term</option>
                      <option value="2nd Term">2nd Term</option>
                      <option value="3rd Term">3rd Term</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="result_session"> Session</label>
                    <select name="result_session" id="result_session" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_session_lists();?>
                    </select>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end mt-1">
                  <button type="submit" name="show_broad_sheet_btn" class="btn btn-primary btn-md mr-1"><span class="fa fa-address-card"></span> View Result</button>
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
<section>
   <!-- BROADSHEET GOES HERE -->
      <?php 
      //check if someone click on show broadsheet btn
       if (isset($_POST['show_broad_sheet_btn'])): ?>
        <?php if (empty($_POST['subject']) || empty($_POST['result_class']) || empty($_POST['result_session']) || empty($_POST['result_term'])): ?>
          <?php echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("Please Select Subject, Class, Term and Session to View Result","danger").'
          </div>
         ' ;?>
        <?php else: ?>
          <!-- show the broadsheet -->
          <!-- Starts -->
          <?php 
          $result_subject = $_POST['subject'];
          $result_class = $_POST['result_class'];
          $result_term = $_POST['result_term'];
          $result_session = $_POST['result_session'];
           $get_all_uploaded_results = $Result->get_all_uploaded_school_result($result_class,$result_subject,$result_term,$result_session); ?>
           <?php if ($get_all_uploaded_results): ?>
            <div class="card">
            <div class="card-body">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
           <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
                 <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
        <h4 class="text-center text-danger"><strong>UPLOADED RESULT FOR</strong></h4>
                        <!-- ############################# -->
                        <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
            <span class="btn btn-info btn-round text-center"><?php echo strtoupper($result_class) ?> </span>
                <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($result_term) ?> </span>
                <span class="btn btn-danger btn-round text-center"><?php echo ($result_session)?></span>
                
            </div>
            <br />
             <div class="table-responsive">
                  <table class="table table-bordered table-striped text-center">
                         <thead class="text-center">
                        <tr>
                            <th width="25%"> Student</th>
                            <th width="20%"> Class</th>
                            <th width="20%">Subject</th>
                            <th width="15%"> C.A</th>
                            <th width="15%">EXAM(60)</th>
                            <th width="10%">Total</th>
                        </tr>
                        </thead>
                        <tbody class="text-center">

                          <?php 
                      foreach ($get_all_uploaded_results as $value) { 
                        $student_data = $Student->get_student_data_ByRegNo($value->stdRegCode);
                        ?>
                    <tr>
                    <td><span><?php echo strtoupper($student_data->full_name);?></span> </td>
                    <td><?php echo strtoupper($value->studentGrade);?></td>
                  <td><?php echo strtoupper($value->subjectName);?></td>
                  <td><?php echo $value->ca;?></td>
                  <td><?php echo $value->exam;?></td>
                  <td><?php echo $value->overallMark;?></td>
                </tr>
                          <?php }
                           ?>
                </tbody>
                </table>
            </div>
           </div>
    </div>
  </div>
             <?php else: ?>
         <?php echo '<div class="text-center col-12 col-md-12">
          '.$Alert->alert_msg("No Result found on ".strtoupper($result_subject)." for ".strtoupper($result_class)." in this $result_term of $result_session!","danger").'
          </div>
         ' ;?>
           <?php endif ?>
        
  <!-- Ends -->
          <!-- show broadsheet ends -->
        <?php endif ?>
      <?php endif ?>
      
      <!-- BROADSHEET ENDS -->
</section>
        </div>
      </div>
     
    <!-- content goes end -->
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>