<?php
require_once "helpers/helper.php";
?>
<?php
if (isset($_GET['new-student']) && $_GET['new-student'] != "" && isset($_GET['action']) && $_GET['action'] === "admit") {
  $studentId = $Configuration->Clean($_GET['new-student']);
  $studentId = $Configuration->convert_String("decode",$studentId);
  $student_data = $Student->get_student_data_byId($studentId);
  if (!$student_data) {
    $Configuration->redirect("student_adm_portal");
    exit();
  } 
} else {
    $Configuration->redirect("student_adm_portal");
    exit();
}
?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
  <?php include "../template/MetaTag.php"; ?>
  <title><?php echo $SmappDetails->school_name; ?> :: Upload Passport for
    <?php echo ucwords($student_data->full_name); ?></title>
  <?php include "../template/HeaderLink.php"; ?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  "
  data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
  <!-- BEGIN: Header-->
  <?php include "template/HeaderNav.php"; ?>
  <!-- END: Header-->
  <!-- BEGIN: Main Menu-->
  <?php include "template/Sidebar.php"; ?>
  <!-- include Sidebar.php -->
  <!-- END: Main Menu-->
  <!-- BEGIN: Content-->
  <div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">
      <div class="content-header row">
        <div class="content-header-left col-12 mb-2 mt-1">
          <div class="breadcrumbs-top">
            <h5 class="content-header-title float-left pr-1 mb-0"><?php echo __OSO_APP_NAME__; ?> Portal</h5>
            <div class="breadcrumb-wrapper d-none d-sm-block">
              <ol class="breadcrumb p-0 mb-0 pl-1">
                <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0);"><?php echo $_SESSION['ADMIN_SES_TYPE'] ?></a>
                </li>
                <li class="breadcrumb-item active">Student Admission Portal 
                </li>
              </ol>
            </div>
          </div>
        </div>
      </div>
      <div class="content-body">
        <div class="row">
          <div class="col-12">
           <h2>STUDENT ADMISSION PORTAL</h2>
          </div>
        </div>
        <div class="col-md-8 col-12">
          <div class="card">
            <div class="card-body">
              <form class="form form-vertical" id="offerAdmissionForm">
                <div class="form-body">
                  <div class="row">
                    <div class="col-md-12">
                    <h3 class="bd-lead text-info text-bold">
              <?php if ($student_data->stdPassport == NULL || $student_data->stdPassport == "") : ?>
              <?php if ($student_data->stdGender == "Male") : ?>
              <img src="../schoolImages/students/male.png" width="100" alt="photo"
                style="border-radius: 10px;border: 3px solid deepskyblue;">
              <?php else : ?>
              <img src="../schoolImages/students/female.png" width="100" alt="photo"
                style="border-radius: 10px;border: 3px solid deepskyblue;">
              <?php endif ?>
              <?php else : ?>
              <img src="../schoolImages/students/<?php echo $student_data->stdPassport; ?>" width="100" alt="photo"
                style="border-radius: 10px;border: 3px solid deepskyblue;">
              <?php endif ?> <?php echo ucwords($student_data->full_name); ?> Admission Offer Page 
            </h3>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <input type="hidden" name="action" value="admit_new_student">
                        <input type="hidden" name="student_id" id="student_id"
                          value="<?php echo ucwords($student_data->stdId);?>">
                        <label for="first-name-icon">Student Full Name</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" class="form-control"
                            value="<?php echo ucwords($student_data->full_name); ?>" readonly>
                          <div class="form-control-position">
                            <i class="bx bx-user"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="email-id-icon">Applied Class/Grade</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" class="form-control"
                            value="<?php echo strtoupper($student_data->studentClass); ?>" readonly>
                          <div class="form-control-position">
                            <i class="bx bx-book-open"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="contact-info-icon">Admission No</label>
                        <div class="position-relative has-icon-left">
                          <input type="text" id="std_registration_no" class="form-control"
                            value="<?php echo strtoupper($student_data->stdRegNo); ?>" readonly>
                          <div class="form-control-position">
                            <i class="bx bx-barcode"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="admitted_class">Admitted Into </label>
                          <select name="admitted_class" id="admitted_class" class="custom-select form-control">
                            <?php echo $Administration->get_classroom_InDropDown_list() ?>
                          </select>
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                        <label for="admittedDate">Admitted Date</label>
                        <div class="position-relative has-icon-left">
                          <input type="date" id="admittedDate" name="admittedDate" class="form-control">
                          <div class="form-control-position">
                            <i class="bx bx-calendar-week"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                        <label for="auth_code">Authentication Code</label>
                        <div class="position-relative has-icon-left">
                          <input type="password" autocomplete="off" id="auth_code" class="form-control"
                            name="auth_code" placeholder="Authentication Code">
                          <div class="form-control-position">
                            <i class="bx bx-lock"></i>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="col-12 d-flex justify-content-end">
                      <button type="submit" class="btn btn-dark mr-1 __loadingBtn__">Offer Admission</button>
                       <button type="button" class="btn btn-danger" onclick="window.history.back();">Back</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
        <!-- content goes here -->
      </div>
    </div>
  </div>
  <!-- END: Content-->

  </div>
  <!-- demo chat-->

  <!-- BEGIN: Footer-->
  <!--  -->
  <?php include "../template/footer.php"; ?>
  <!-- END: Footer-->

  <!-- BEGIN: Vendor JS-->
  <?php include "../template/FooterScript.php"; ?>
  <!-- BEGIN: Page JS-->
  <script>
$(document).ready(function () {
    const offerAdmissionForm = $("#offerAdmissionForm");
    offerAdmissionForm.on("submit", function(event){
  event.preventDefault();
  $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
  //send request 
  $.post("../actions/update_actions",offerAdmissionForm.serialize(),function(data){
    setTimeout(()=>{
      $(".__loadingBtn__").html('Offer Admission').attr("disabled",false);
      $("#server-response").html(data);
    },2500);
  })
});

});
  </script>
</body>
<!-- END: Body-->

</html>