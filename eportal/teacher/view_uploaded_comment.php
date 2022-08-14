<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name;?> :: Class Teacher's Comments </title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__;?> Portal</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['STAFF_ROLE']);?></a>
                  </li>
                  <li class="breadcrumb-item active">Result Comment Module
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-comment fa-1x"></span> Result Comment Module</h3>
  </div>
    </div>
    <!-- content goes here -->
        
             <!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
     
        <div class="card-body">
          <form class="form form-vertical" action="" method="POST">
            <div class="form-body">
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_class"> Class</label>
                    <select name="comment_class" id="comment_class" class="form-control">
                      <option value="<?php echo $staff_assigned_class; ?>" selected><?php echo $staff_assigned_class; ?></option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_term">Result Term</label>
                   <select name="comment_term" class="form-control">
                    <option value="" selected>Choose...</option>
                    <option value="1st Term">1st Term</option>
                    <option value="2nd Term">2nd Term</option>
                    <option value="3rd Term">3rd Term</option>
                  </select>
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="comment_sess">Academic Session</label>
                    <input type="text" id="comment_sess" class="form-control" name="comment_sess" value="<?php echo $activeSess->session_desc_name;?>" readonly>
                  </div>
                </div>
               
                <div class="col-12 d-flex justify-content-end">
                <button type="submit" name="show_comment_sheet_btn" class="btn btn-primary mr-1">Show Comment Report</button>
              
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
     

<?php if (isset($_POST['show_comment_sheet_btn'])): ?>
  <?php 
  if (!empty($_POST['comment_class']) && !empty($_POST['comment_term']) && !empty($_POST['comment_sess'])) {
    $comment_class = $Configuration->Clean($_POST['comment_class']);
    $comment_term = $Configuration->Clean($_POST['comment_term']);
    $comment_sess = $Configuration->Clean($_POST['comment_sess']);

   $view_result_comments = $Result->view_uploaded_result_comment($comment_class,$comment_term,$comment_sess);
    ?>
    <?php 

if ($view_result_comments) {
  $total_count =0;
 ?>
 <!--starts  -->
             <!-- ############################# -->
    <div class="card show-on-print">
                
 <div class="card-body">
  <h2 class="text-info text-center"><?php echo strtoupper($SmappDetails->school_name) ?> </h2>
                 <h5 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_address) ?> </h5>
        <h4 class="text-center text-danger"><strong>STUDENTS RESULT COMMENT REPORT</strong></h4>
                        <!-- ############################# -->
            <br />
            <div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 text-center offset-1">
            <span class="btn btn-info btn-round text-center"><?php echo strtoupper($comment_class) ?> </span>
                <span class="btn btn-dark btn-round text-center"><?php echo strtoupper($comment_term) ?> </span>
                <span class="btn btn-danger btn-round text-center"><?php echo ($comment_sess)?></span>
                
            </div>
         <br>
<div class="table-responsive">
        <table class=" table-bordered table table-stripped osotechDatatable table-hover">
                <thead class="text-center">
                    <tr>
                      <th width="10%">S/N</th>
                    <th width="25%">Student</th>
                    <th width="20%">Admission No</th>
                    <th width="40%">Teacher's Comment</th>
                </tr>
            </thead>
            <tbody class="text-center">
              <?php foreach ($view_result_comments as $value): ?>
                <?php 
                $total_count++;
                $student_data = $Student->get_student_data_ByRegNo($value->stdRegNo)
                 ?>
                <tr>
                 <td><?php echo $total_count; ?></td>
                 <td><?php echo ucwords($student_data->full_name);?> </td>
                 <td> <?php echo strtoupper($value->stdRegNo);?></td>
                 <td><?php echo $value->teacher_comment;?> </td>
               </tr>
              <?php endforeach ?>
                                        
                            </tbody>
                                </table>
                              </div>
                             
                                </div>
                                <!-- ends -->

 <?php
}else{
echo '<div class="card show-on-print">
  <div class="card-body"><h3 class="text-center col-md-12">'. $Alert->alert_msg("No result found for your search, maybe Comment is not yet uploaded ","danger").'</h3></div></div>';
}

 ?>
    <?php
  }else 
  {
  echo '<div class="card show-on-print">
  <div class="card-body"><h3 class="text-center col-md-12">'. $Alert->alert_msg("Please Select academic term to comment on result","danger").'</h3></div></div>';
  }
   ?>
<?php endif ?>
    <!-- content goes end -->
      </div>
    </div>
  </div>
    <!-- END: Content-->
    </div>
       </div>
      </div>
  </div>

    <!-- demo chat-->
   
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <!-- upload comment script will be here ..coming soon -->
 
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>