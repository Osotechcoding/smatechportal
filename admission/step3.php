<?php
@session_start();
error_reporting(1);
@ob_start();
if (!file_exists("Includes/Osotech.php")){
    die("Access to this Page is Denied! <p>Please Contact the school Admin for assistance</p>");
}
require_once ("Includes/Osotech.php");
require_once ("Includes/Database.php");
$Osotech->osotech_session_kick();
?>
<?php if ($Osotech->checkAdmissionPortalStatus() !== true): ?>
   <?php header("Location:".APP_ROOT);
   exit();?>
<?php endif ?>

<?php

if (isset($_SESSION['AUTH_SMATECH_APPLICANT_ID']) && ! empty($_SESSION['AUTH_SMATECH_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_SMATECH_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
}else{
  header("Location: ./step2");
  exit();
}

 ?>
<!doctype html>
<html lang="en">
  <head>
    <title><?php echo ($Osotech->getConfigData()->school_name);?>:: Student Online Registration Portal</title>
    <?php include_once ("Head.php");?>
  </head>
  <body>
    <div class="container mt-2">
  <?php include_once 'HeadNavBar.php'; ?>
<br>
<div class="col-md-12">
  <section class="h-100 bg-white">
    <div class="container py-2 h-60">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4 osotech-bg-color">
            <div class="row g-0">
              <div class="col-xl-12 col-md-12 mb-3">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase text-center text-black">Admission Form (Parents/Guardian Information)</h3>
                  <form id="thirdStepForm">
                    <div class="text-center" id="server-response">
                    </div>
                  <div class="row">
              <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
              <input type="hidden" name="action" value="submit_third_step_admission">
 <input type="hidden" name="admission_no" value="<?php echo strtoupper($student_data->stdRegNo);?>">
 <input type="hidden" name="auth_code_applicant_id" value="<?php echo $auth_code_applicant_id;?>">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
      <input type="text" class="form-control" value="<?php echo $student_data->stdEmail;?>" readonly>
          </div></div>
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                  <input type="text" class="form-control" name="surname" value="<?php echo ucwords($student_data->stdUserName);?>" readonly>
                      </div>
                    </div>
                    <div class="col-md-4 mb-3">
                       <span id="email-error"></span>
                      <div class="form-group">
  <input type="text" class="form-control" value="<?php echo ucwords($student_data->studentClass);?>" readonly>
                      </div>
                    </div>
                    <h3 class="text-muted mt-2">FATHER/MALE GUARDIAN DETAILS</h3>
                 <div class="row">
                      <div class="col-md-6 mb-3">
                     <div class="form-group">
                         <label>Title </label>
                        <input type="text" autocomplete="off" name="mg_title" class="form-control" placeholder="High Chief">
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">
                         <label>Full Name</label>
                          <input type="text" autocomplete="off" name="mg_name" class="form-control" placeholder="Prof. Hamad Sani O">
                        </div>
                 </div>
                  <div class="col-md-6 mb-3">
                     <div class="form-group">
                        <label> Relationship </label>
                        <input type="text" autocomplete="off" name="mg_relation" class="form-control" placeholder=" Father">
                     </div>
                 </div>

                 <div class="col-md-6 mb-3">
                     <div class="form-group">

                       <label> Phone </label>
                       <input type="text" autocomplete="off" name="mg_phone" class="form-control" placeholder="082135432123">
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">

                        <label> Email </label>
                        <input type="text" autocomplete="off" name="mg_email" class="form-control" placeholder=" myfather@gmail.com" />
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">
                        <label> Occupation </label>
                        <input type="text" autocomplete="off" name="mg_occu" class="form-control" placeholder="Doctor" />
                     </div>
                 </div>
                 <div class="col-md-12 mb-3">
                     <div class="form-group">
                        <label> Address </label>
                        <textarea type="text" autocomplete="off" name="mg_address" class="form-control" placeholder=" Sango Ota Ogun State"></textarea>
                     </div>
                 </div>
                 </div>
                  <h3 class="text-muted">MOTHER/FEMALE GUARDIAN DETAILS</h3>
                 <div class="row">
                    <div class="col-md-6 mb-3">
                     <div class="form-group">
                         <label>Title </label>
                        <input type="text" autocomplete="off" name="fg_title" class="form-control" placeholder="High Chief">
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">
                         <label>Full Name</label>
                         <input type="text" autocomplete="off" name="fg_name" class="form-control" placeholder="Osotech Software">
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">
                        <label> Relationship </label>
                        <input type="text" autocomplete="off" name="fg_relation" class="form-control" placeholder="Mother">
                     </div>
                 </div>

                 <div class="col-md-6 mb-3">
                     <div class="form-group">

                       <label> Phone </label>
                       <input type="text" autocomplete="off" name="fg_phone" class="form-control" placeholder="082135432123">
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">

                        <label> Email </label>
                        <input type="text" autocomplete="off" name="fg_email" class="form-control" placeholder="mymother@gmail.com" />
                     </div>
                 </div>
                 <div class="col-md-6 mb-3">
                     <div class="form-group">
                        <label> Occupation </label>
                        <input type="text" autocomplete="off" name="fg_occu" class="form-control" placeholder="Doctor" />
                     </div>
                 </div>
                 <div class="col-md-12 mb-3">
                     <div class="form-group">
                        <label> Address </label>
                        <textarea type="text" autocomplete="off" name="fg_address" class="form-control" placeholder=" Sango Ota Ogun State"></textarea>
                     </div>
                 </div>
                  </div>
                </div>
                   <div style="float: left; margin-top:10px;"><a href="step2?applicant=<?php echo $Osotech->saltifyString($_GET['applicant'])?>&page=2" class="btn-shop green-color" onclick="return confirm('Are you Sure you want to go Back to Previous page?');"><button type="button" name="button" class="btn btn-secondary btn-md mt-2"> Previous Page</button></a></div>
                  <button type="submit" class="btn btn-dark btn-lg btn-round mb-1 __loadingBtn__ mt-5" style="float:right">Continue Registration</button>
                  </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Footer -->
    <?php
if (file_exists("./footer.php")) {
include_once ("./footer.php");
}
 ?>
<!-- Footer -->

</div>

      </div>
    <?php include_once ("FooterScript.php");?>
    <script>
    $(document).ready(function(){
    const ADMISSION_FORM3_SUBMIT = $("#thirdStepForm");
    ADMISSION_FORM3_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("Includes/actions",ADMISSION_FORM3_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue Registration').attr("disabled",false);
          $("#server-response").html(result);
        },1500);
      })
    });

  })
    </script>
  </body>
</html>
