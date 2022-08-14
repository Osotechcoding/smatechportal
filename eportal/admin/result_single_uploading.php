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
          </div><script>setTimeout(()=>{window.location.href="./upload_single_result"},2000)</script>';
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $SmappDetails->school_name ?> :: Upload Student Result</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Current User</a>
                  </li>
                  <li class="breadcrumb-item active">Student Results
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
<div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-line-chart fa-2x"></span> Uploading <span class="text-muted">SMApp/2021/0072</span> 1st Term Result 2021/2022</h3>
  </div>
    </div>
    <!-- content goes here -->
     <?php if (isset($output)): ?>
       <?php echo $output ?>
     <?php endif ?>
        <div class="card">
       <div class="card-body">
<section>
   <!-- BROADSHEET GOES HERE -->
       <!-- show the broadsheet -->
          <!-- Starts -->
        <div class="card">
            <div class="card-body">
        <!-- Validation Tooltips -->
        <hr class="text-bold-700">
        <div class="justify-content-center text-center">
          <img src="result-asset/author.jpg" width="200">
          <div><h2><strong>Agberayi Samson Idowu</strong> </h2></div>
          <h5><span class="text-danger">Smapp/2021/0072</span></h5>
        </div>
        <h4 class="text-info text-center">Current Class: JSS1</h4>
                  <h5 class="text-center text-warning">1st Term Report Sheet</h5>
        <h4 class="text-center text-danger"><strong>2021/2022 Academic Session Report Sheet Uploading</strong></h4>
                        <!-- ############################# -->
            <br />
            <div class="clearfix"></div>
             <form action="" method="post">
          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12">
             <div class="table-responsive">
                    <table class="table table-stripped">
                        <thead class="text-center">
                        <tr>
                            <th width="17%">SUBJECT</th>
                            <th width="11%">Test(40) (A)</th>
                            <th width="11%">Exam(60)(B)</th>
                            <th width="15%"> Total(A+B)</th>
                            <th width="16%">CASS</th>
                            <th width="10%"> Grade</th>
                            <th width="20%">Remarks</th>
                        </tr>
                        </thead>
                        <tbody>
                       
                        <tr>
                    <td width="17%"><span>English Language</span></td>
                    <td width="11%"><input type="number" max="100" name="test[]" step="1" class="form-control form-control-lg" required placeholder="Test"></td>
                  <td width="11%"><input type="number" max="100" name="exam[]" step="1" class="form-control form-control-lg" required placeholder="Exam"></td>
                  <td width="15%"><input type="number" max="100" name="total[]" step="1" class="form-control form-control-lg" required  placeholder="Total Score"></td>
                  <td width="16%"><input type="number" max="100" name="ca[]" step="1" class="form-control form-control-lg" required placeholder="Continous Assessment"></td>
                  <td width="10%"><select name="grade" id="grade" class="select2 form-control">
                    <option value="">Choose...</option>
                    <option value="">A1</option>
                    <option value="">B2</option>
                    <option value="">B3</option>
                    <option value="">C4</option>
                    <option value="">C5</option>
                    <option value="">C6</option>
                    <option value="">D7</option>
                    <option value="">E8</option>
                    <option value="">F9</option>
                  </select></td>
                  <td width="20%"><select name="remark" id="remark" class="select2 form-control">
                    <option value="">Choose...</option>
                    <option value="">Good Result Keep it Up...</option>
                    <option value="">A very poor result.</option>
                    <option value="">You need to be more focused</option>
                    <option value="">Put in More efforts</option>
                  </select></td>
                </tr>
               
                </tbody>
                </table>
            </div>
       <div class="mt-2 float-right">
          <button class="btn btn-success submit-btn btn-lg mr-2" name="result_upload_btn" type="submit"><span class="fa fa-cloud-upload"></span> UPLOAD </button>
       </div>
           </div>
           </form>
    </div>
  </div>
  <!-- Ends -->
          <!-- show broadsheet ends -->
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
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>