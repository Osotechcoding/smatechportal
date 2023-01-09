<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Re-print Certificate </title>
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
                  <li class="breadcrumb-item active">RE-PRINT STUDENT CERTIFICATE 
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-certificate fa-1x"></span>  STUDENT CERTIFICATE MODULE <span><a href="javascript:void(0);" onclick="window.location.href='./generate-testimonial'" class="btn btn-light-primary btn-sm btn-pill">Generate Certificate</a> </span></h3>
  </div>
    </div>

    <div class="card">
      <div class="card-body">
      <div class="table-responsive">
      <table class="table table-hover table-bordered table-striped osotechExp">
        <thead class="text-center">
          <tr>
          <th>S/N</th>
          <th>Student Name</th>
          <th>Certificate No</th>
          <th>Graduated Year</th>
          <th>Action</th>
        </tr>
      </thead>
        <tbody class="text-center">
          <?php 
$testimonials = $Administration->getGeneratedStudentTestimonials();
if ($testimonials) {
  // code...
  $cnt =0;
  foreach ($testimonials as $testimonial) { 
    $student_data = $Student->get_student_data_ByRegNo($testimonial->stdRegNo);
    $cnt++;
    ?>
    <tr>
<td><?php echo $cnt;?></td>
<td><?php echo strtoupper($student_data->full_name);?></td>
<td><?php echo $testimonial->cert_no;?></td>
<td><?php echo date("F, Y",strtotime($testimonial->date_completed));?></td>
<td class="text-right">
</a>
<button type="button" data-id="<?php echo $testimonial->id;?>" data-value="<?php echo $testimonial->id;?>" class="btn btn-danger btn-sm mb-1 remove_sub_btn __loadingBtn2__<?php echo $testimonial->id;?>">
<i class="fa fa-trash fa-1x"></i> Delete
</button>
</td>
</tr>
    <?php
    // code...
  }
}


   ?>
      </tbody>
      </table>
    </div>
      </div>

    </div>

    <div class="card" style="border-radius: 10px;">
        <div class="card-header">
          <h4 class="card-title">RE-PRINT STUDENT CERTIFICATE</h4>
        </div>
        <div class="card-body">
        
          <form class="form" id="rePrintCertificateForm" autocomplete="off">
            <div class="form-body">
              <div class="row">
                <input type="hidden" name="action" value="_reprint_testimonial_certificate_action_">
                 <div class="col-md-6 col-12">
                   <label for="cert_number">Certificate No</label>
                 <input type="text" class="form-control" name="cert_number" placeholder="Enter Certificate Number">
                </div>
                <div class="col-md-6 col-12">
                   <label for="auth_code"> Authentication Code</label>
                 <input type="password" class="form-control" name="auth_code" placeholder="xxxxxxxxxxx" autocomplete="off">
                </div>
  <!-- daterange end -->
                </div>
                <div class="col-12 d-flex justify-content-end mt-2">
                <button type="submit" class="btn btn-dark btn-lg mr-1 __loadingBtn__">Re-Print Certificate</button>
                </div>
              </div>
            
          </form>
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

    <script src="smappjs/reprintcert.js"></script>
     <!-- BEGIN: Page JS-->
  </body>
  <!-- END: Body-->
</html>