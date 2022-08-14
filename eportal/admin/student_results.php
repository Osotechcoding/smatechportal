<?php 
require_once "helpers/helper.php";
 ?>

 <?php 
$output ="";
if (isset($_POST['result_upload_btn'])) {
  // code...
  $output='
          <div class="alert alert-success alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-bell"></i>
              <span>
              <h3 class="text-center text-white"><strong> Result Uploaded Successfully!</strong></h3>
              </span>
            </div>
          </div><script>setTimeout(()=>{window.location.href="./"},2000)</script>';
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name; ?> :: Student Result</title>
   <!-- include template/HeaderLink.php -->
    <?php include ("../template/dataTableHeaderLink.php"); ?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__ ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-2x"></span> View Student Results</h3>
  </div>
    </div>
    <!-- content goes here -->
     <?php if (isset($output)): ?>
       <?php echo $output ?>
     <?php endif ?>
        <div class="card">
          <div class="card-header">
            <!--  -->
            <?php //include_once 'Links/results_btn.php'; ?>
            
          </div>

          <div class="card-body">
<!-- Basic Vertical form layout section start -->
<section id="basic-vertical-layouts">
  <div class="row match-height">
    <div class="col-md-12 col-12">
      <div class="card">
        <div class="card-header">
            <h3>Select Student Class and Session to view Results</h3>
         <a href="upload_single_result"> <button type="button" class="btn btn-dark btn-md badge-pill"><span class="fa fa-address-card fa-1x"></span> UPLOAD SINGLE RESULT</button></a>
      
        </div>
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_class">STUDENT CLASS</label>
                    <select name="result_class" id="result_class" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <option value="JSS1">JSS1</option>
                      <option value="JSS2">JSS2</option>
                      <option value="JSS3">JSS3</option>
                      <option value="SSS1">SSS1</option>
                      <option value="SSS2">SSS2</option>
                      <option value="SSS3">SSS3</option>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_session">select Session</label>
                    <select name="result_session" id="result_session" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <option value="2020/2021">2020/2021</option>
                      <option value="2021/2022">2021/2022</option>
                      <option value="2022/2023">2022/2023</option>
                      <option value="2023/2024">2023/2024</option>
                    </select>
                  </div>
                </div>
                <input type="hidden" id="school_session" name="school_session"
                      value="2021-2022">
                <div class="col-12 d-flex justify-content-end mt-1">
                  <button type="submit" name="show_broad_sheet_btn" class="btn btn-primary btn-lg mr-1"><span class="fa fa-address-card"></span> SHOW STUDENTS</button>
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
        <?php if (empty($_POST['result_class']) || empty($_POST['result_session'])): ?>
          <?php echo '<div class="text-center col-12 col-md-12">
          <div class="alert alert-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
            <div class="d-flex align-items-center">
              <i class="bx bx-bell"></i>
              <span class="text-center">
              <h4 class="text-center text-white"><strong> Please Select Student Class and Session to Continue!</strong></h4>
              </span>
            </div>
          </div></div>
         ' ;?>
        <?php else: ?>
          <!-- show the broadsheet -->
          <!-- Starts -->
        <div class="card">
            <div class="card-body">
        <!-- Validation Tooltips -->
        <hr class="text-bold-700" />
       <!-- ############################# -->
            <div class="clearfix"></div>
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                  <table class="table table-bordered table-striped osotechDatatable">
                        <thead class="text-center">
                        <tr>
                           <th> Photo</th>
                            <th> Student</th>
                            <th> Admission No</th>
                            <th> Class</th>
                            <th> 1st Term </th>
                            <th> 2nd Term </th>
                            <th> Annual Result</th>
                            <th> Edit Student</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                      <td><img src="../result-asset/author.jpg" width="100"></td>
                    <td><span>ADEMOLA ADEOLA</span></td>
                    <td>VISAP00901</td>
                  <td>JSS1</td>
                  <td><a href="firsttermresult"><span class="badge badge-warning badge-rounded badge-lg">1st Term</span></a></td>
                  <td><a href="2ndtermresult"><span class="badge badge-dark badge-rounded badge-lg">2nd Term</span></a></td>
                  <td><a href="3rdtermresult"><span class="badge badge-success badge-rounded badge-lg">Annual Result</span></a></td>
                  <td><a href="#"><span class="badge badge-danger badge-rounded badge-sm">Edit Student Info</span></a></td>
                </tr>
                </tbody>
                </table>
            </div>
           </div>
    </div>
  </div>
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
    <!-- demo chat-->
    <!-- BEGIN: Footer-->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>