<?php
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>
<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <!-- metaTag -->
    <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo $SmappDetails->school_name ?> :: Mass Student promotion </title>
     <?php include ("../template/dataTableHeaderLink.php"); ?>
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
              <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo strtoupper($_SESSION['ADMIN_SES_TYPE']);?></a>
                  </li>

                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
          <div class="row">
             <div class="col-12">
    <h3 class="bd-lead text-primary text-bold"><span class="fa fa-certificate fa-1x"></span>
     STUDENT TESTIMONIAL MODULE <span><a href="javascript:void(0);" onclick="window.location.href='./reprintcert'" class=" btn btn-light-info btn-sm btn-pill">Re-Print Certificate</a> </span> </h3>
  </div>
    </div>

            <div class="card">
              <div class="card-header">
              <p class="text-danger text-uppercase"><i> NOTE: that Certificate is ONLY available for students in <b>(Basic 5, JSS 3 and SSS 3) Classes</b></i></p>
              </div>
      <div class="card-body">
        <form id="StudentTestimonialForm" autocomplete="off">
      <div class="row">
      <div class="col-md-4">
        <div class="form-group">
          <label for="admissionNumber">ADMISSION NO</label>
         <input type="text" class="form-control" id="admissionNumber" name="admissionNumber" placeholder="XXXXC26313XXXX" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="Auth">ACADEMIC ABILITY</label>
          <select name="academic_ability" id="student_class" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <option value="Distinction">Distinction</option>
            <option value="Excellent">Excellent</option>
            <option value="Very Good">Very Good</option>
            <option value="Good">Good</option>
            <option value="Credit">Credit</option>
            <option value="Poor">Poor</option>
            <option value="Very Poor">Very Poor</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="sports_ability"> ABILITY IN SPORTS</label>
          <select name="sports_ability" id="sports_ability" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <option value="Distinction">Distinction</option>
            <option value="Excellent">Excellent</option>
            <option value="Very Good">Very Good</option>
            <option value="Good">Good</option>
            <option value="Credit">Credit</option>
            <option value="Poor">Poor</option>
            <option value="Very Poor">Very Poor</option>
          </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="club">SCHOOL CLUB / SOCIETY MEMBERSHIP</label>
         <input type="text" class="form-control" name="club" placeholder="Literary & Debating, Jets" required>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="student_office_name">SCHOOL OFFICE HELD</label>
          <select name="student_office_name" id="student_office_name" class="custom-select form-control" required>
        <option value="" selected>Choose...</option>
        <option value="None">None</option>
        <?php echo $Administration->get_student_office_title_inDropDown(); ?>
        </select>
        </div>
      </div>
      <div class="col-md-4">
        <div class="form-group">
          <label for="character">CONDUCT & CHARACTER</label>
         <input type="text" class="form-control" name="character" placeholder="Satisfactory" required>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="remarks">GENERAL REMARKS (<span class="text-warning">In Not more than Five (5) Words</span> )</label>
         <textarea type="text" required class="form-control" name="remarks" placeholder="General Remarks"></textarea>
        </div>
      </div>
      </div>
      <h4>List of Subjects Offered by the Student (<span class="text-danger"><small>Select at least 8 Subjects</small></span>) </h4>
      <div class="row">
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_one"> SUBJECT ONE </label>
          <input type="text" name="subject_one" id="subject_one"
           class="form-control" readonly value="General Mathematics">
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_two"> SUBJECT TWO </label>
          <input type="text" name="subject_two" id="subject_two"
           class="form-control" readonly value="English Language">
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_three"> SUBJECT THREE </label>
          <select name="subject_three" id="subject_three" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          
          <label for="subject_four">SUBJECT FOUR </label>
          <select name="subject_four" id="subject_four" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_five"> SUBJECT FIVE  </label>
          <select name="subject_five" id="subject_five" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_six"> SUBJECT SIX </label>
          <select name="subject_six" id="subject_six" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_seven"> SUBJECT SEVEN </label>
          <select name="subject_seven" id="subject_seven" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_eight"> SUBJECT EIGHT </label>
          <select name="subject_eight" id="subject_eight" class="custom-select form-control" required>
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-4">
        <div class="form-group">
          <label for="subject_nine">SUBJECT NINE </label>
          <select name="subject_nine" id="subject_nine" class="custom-select form-control">
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        <div class="col-md-6">
        <div class="form-group">
          <label for="subject_ten"> SUBJECT TEN </label>
          <select name="subject_ten" id="subject_ten" class="custom-select form-control">
            <option value="" selected> Choose...</option>
            <?php echo $Administration->get_all_subjects_InDropDown_list();?>
          </select>
        </div>
      </div>
        
      <div class="col-md-6">
        <div class="form-group">
          <label for="auth_code">AUTHENTICATION CODE</label>
         <input type="password" autocomplete="off" class="form-control" name="auth_code" placeholder="Enter Pass code">
        </div>
      </div>
      </div>
      <input type="hidden" name="action" value="_certificate_generate_action_">
      <button type="submit" class="btn btn-dark btn-lg btn-round float-right mb-3 __loadingBtn__">GENERATE TESTIMONIAL</button>
    </form>

      </div>
    </div>
           
        </div>
      </div>
    </div>
    <!-- END: Content-->
    </div>
    <!-- demo chat-->
  <?php include ("../template/footer.php"); ?>
    <!-- END: Footer-->
    <!-- BEGIN: Vendor JS-->
    <?php include ("../template/DataTableFooterScript.php"); ?>
    <script src="smappjs/gen-testimonial.js"></script>
  </body>
  <!-- END: Body-->
</html>
