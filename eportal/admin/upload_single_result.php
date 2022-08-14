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
    <title><?php echo $SmappDetails->school_name; ?> :: Upload Student Result</title>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']) ?></a>
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
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-address-card fa-2x"></span> Upload Single Results</h3>
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
            <h3>Select Student Class and Session to Upload Results</h3>
         <a href="student_results"> <button type="button" class="btn btn-dark btn-md badge-pill"><span class="fa fa-address-card fa-1x"></span> VIEW RESULT</button></a>
      
        </div>
        <div class="card-body">
          <form class="form form-vertical" action="" method="post">
            <div class="form-body">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_class">RESULT CLASS</label>
                    <select name="result_class" id="result_class" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                     <?php echo $Administration->get_classroom_InDropDown_list();?>
                    </select>
                  </div>
                </div>
                
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="result_session">ACADEMIC SESSION</label>
                    <select name="result_session" id="result_session" class="select2 form-control form-control-lg">
                      <option value="">Choose...</option>
                      <?php echo $Administration->get_all_session_lists(); ?>
                    </select>
                  </div>
                </div>
                <input type="hidden" name="school_session"
                      value="<?php echo $activeSess->session_desc_name;?>">
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
                  <table class="table table-bordered table-striped osotechDatatable table-hover">
                        <thead class="text-center">
                        <tr>
                           <th> S/N</th>
                            <th> STUDENT</th>
                            <th> Admission No</th>
                            <th> Class</th>
                            <th> 1st Term Report</th>
                            <th> 2nd Term Report</th>
                            <th>Annual Report</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                      <td><img src="result-asset/author.jpg" width="80"></td>
                    <td><span>ADEMOLA ADEOLA</span></td>
                    <td>VISAP00901</td>
                  <td>JSS1</td>
                  <td><a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-primary badge-rounded badge-lg">Upload</span></a> || <a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-warning badge-rounded badge-lg">Edit</span></a></td>
                  <td><a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-dark badge-rounded badge-lg">Upload</span></a> || <a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-warning badge-rounded badge-lg">Edit</span></a></td>
                  <td><a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-success badge-rounded badge-lg">Upload</span></a> || <a href="result_single_uploading?reg_no=VISAP/2021/057&cterm=1st Term & cses=2021/2022 & stclass=JSS1"><span class="badge badge-warning badge-rounded badge-lg">Edit</span></a></td>
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
   <!--  -->
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