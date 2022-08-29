<?php
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title>Search Student :: <?php echo $SmappDetails->school_name ?> </title>
     <?php include ("../template/HeaderLink.php"); ?>
    <!-- include HeaderLink.php -->
  </head>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include ("template/HeaderNav.php"); ?>
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
  <?php include ("template/Sidebar.php"); ?>
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
                  <li class="breadcrumb-item active">Search Student
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-search fa-1x"></span> SEARCH STUDENT</h3>
  </div>
    </div>

     <div class="card">
      <!-- filter student -->
      <div class="card-body">
       <div class="users-list-filter px-1">
        <form action="" method="post">
            <div class="row border rounded py-2 mb-2">
                <div class="col-md-8">
                    <label for="RegNo">Enter Search Value</label>
                    <fieldset class="form-group">
                     <input type="text" autocomplete="off" class="form-control form-control-lg" name="qe" placeholder="Enter Admission Number or Email, or Phone to Search Student">
                     <!-- oninput="this.value=this.value.toUpperCase();" -->
                    </fieldset>
                </div>
                <div class="col-md-4 d-flex align-items-center">
                    <button type="submit" class="btn btn-dark btn-lg btn-block glow users-list-clear mb-0" name="submit_student_search_btn"><span class="fa fa-search fa-1x"></span> Search Student</button>
                </div>
            </div>
        </form>
    </div>
  </div>
  </div>
      <!-- filter student ends -->
      <div class="col-md-12 col-lg-12 col-sm-12 col-xl-12 col-xs-12">

          <?php
          if (isset($_POST['submit_student_search_btn'])) {
          $qe = $Configuration->Clean($_POST['qe']);
            if ($Configuration->isEmptyStr($qe) ) {
              echo $Alert->alert_msg("Notice: Please enter either admission No or Email or Phone to search student","danger");
            }else{
              $search_data =  $Student->searchStudentByRegEmailPhone($qe);
              if ($search_data) { ?>
        <!-- card will be here -->
        <div class="card" style="border-radius:10px;">
          <div class="card-body">
            <h2 class="text-muted text-center"><span class="fa fa-graduation-cap fa-2x"></span> Student Information</h2>
            <hr class="m-1 text-bold">
            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4 col-xs-4">
                  <div class="text-center"style="border:4px solid orange; border-radius:10px;">
                  <div class="text-center m-1">
                    <?php if ($search_data->stdPassport==NULL || $search_data->stdPassport==""): ?>
              <?php if ($search_data->stdGender == "Male"): ?>
                  <img src="../schoolImages/students/male.png" width="250" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
                <?php else: ?>
                    <img src="../schoolImages/students/female.png" width="250" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
              <?php endif; ?>
                <?php else: ?>
                  <img src="../schoolImages/students/<?php echo $search_data->stdPassport;?>" width="250" alt="photo" style="border-radius: 10px;border: 3px solid deepskyblue;">
              <?php endif ?>
              <h5 class="text-center mt-1 text-bold">REG: <?php echo $search_data->stdRegNo;?></h5>
                  </div>
              </div>
              <div class="text-center m-1">
                <button type="button" class="btn btn-danger btn-md rounded btn-block go_back_home_btn"><span class="fa fa-arrow-left"></span> Go Back</button>
              </div>
                </div>

              <div class="col-md-8 col-sm-8 col-lg-8 col-xl-8 col-xs-8">
                <div style="border:4px solid orange; border-radius:10px;">
                  <div class="align-center text-center m-1">
                    <h4><b>Surname: </b> &nbsp; &nbsp;<?php echo ucwords($search_data->stdSurName);?></h4>
                    <h4><b>First Name: </b> <?php echo ucwords($search_data->stdFirstName);?></h4>
                    <h4><b>Middle Name: </b> <?php echo ucwords($search_data->stdMiddleName);?></h4>
                    <h4><b> Email: </b> <i><?php echo ($search_data->stdEmail);?></i> </h4>
                    <h4><b>Present Class: </b> <?php echo ucwords($search_data->studentClass);?></h4>
                    <h4><b> Phone: </b> <?php echo ucwords($search_data->stdPhone);?></h4>
                    <h4><b>D.O.B: </b> &nbsp; &nbsp;<?php echo date("D jS F Y",strtotime($search_data->stdDob));?></h4>
                    <h4> <b>Age: </b>&nbsp; &nbsp; <?php echo $Administration->get_student_age($search_data->stdDob);?>yrs Old</h4>
                    <h4> <b>Gender: </b> <?php echo ucwords($search_data->stdGender);?></h4>
                      <h4> <b>Year of Admission: </b> <?php echo date("Y",strtotime($search_data->stdApplyDate));?></h4>
                    <h4> <b>Status</b>:<?php switch ($search_data->stdAdmStatus) {
                      case 'Active':
                        $btn_class = 'success';
                        break;
                      case 'Pending':
                          $btn_class = 'warning';
                        break;
                      case 'Suspended':
                            $btn_class = 'dark';
                        break;
                      case 'Expelled':
                            $btn_class = 'danger';
                        break;
                      case 'Transfered':
                            $btn_class = 'primary';
                        break;
                      default:
                        $btn_class = 'info';
                        break;
                    } ?> <span class="badge badge-<?php echo $btn_class;?> badge-md badge-pill"><?php echo $search_data->stdAdmStatus;?></span> </h4>
                  </div>
                </div>
              </div>
            </div>
              <hr class="m-1 text-bold">
          </div>

        </div>
             <?php }else{
      echo '<div class="text-center">
      <h4 class="text-center">'.$Alert->alert_msg("Notice: No records found for {$qe}","danger").'</h4>
      </div>';
              }
            }
          }
           ?>

      </div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
    <!-- BEGIN: Footer-->
   <!--  -->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/FooterScript.php"); ?>
   <!-- DataTableFooterScript.php -->
   <script src="smappjs/searchstudent.js"></script>
  </body>
  <!-- END: Body-->
</html>
