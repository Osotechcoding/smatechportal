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
   <?php header("Location: ./");
   exit();?>
<?php endif ?>

<?php

if (isset($_SESSION['AUTH_SMATECH_APPLICANT_ID']) && ! empty($_SESSION['AUTH_SMATECH_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_SMATECH_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
}else{
  header("Location: ./");
  exit();
}

 ?>
<!DOCTYPE html>
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
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-12 col-md-12 mb-3">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase text-center text-info">Admission Form (STUDENT MEDICAL HISTORY)</h3>
                  <div class="text-center" id="server-response">
                  </div>
                  <form id="fifthStepForm">
                  <div class="row">
              <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
              <input type="hidden" name="action" value="submit_fifth_step_admission">
 <input type="hidden" name="admission_no" value="<?php echo strtoupper($student_data->stdRegNo);?>">
 <input type="hidden" name="auth_code_applicant_id" value="<?php echo $auth_code_applicant_id;?>">
                    <div class="col-md-4 mb-3">
                      <div class="form-group">
                <input type="text" class="form-control" value="<?php echo $student_data->stdEmail;?>" readonly>
                      </div>
                    </div>
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
                    <h3 class=" text-center text-muted mt-2">PERSONAL HOSPITAL/CLINIC DETAILS</h3>
                    <div class="col-md-6 mb-3">
                 <div class="form-group">
                    <label>Personal Hospital </label>
                    <input type="text" class="form-control" name="hospital_name" placeholder="Lifeline Hospital">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="form-group">
                <label>Owner's Name (Doctor)</label>
                <input type="text" class="form-control" name="doctor_name" placeholder="Dr. Hamad Bello">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="form-group">
                   <label>Hospital Phone </label>
                   <input type="number" name="phone" class="form-control" placeholder="080********">
                 </div>
             </div>
             <div class="col-md-6 mb-3">
                 <div class="form-group">
                <label for="member_since">Personal Hospital Since </label>
                <input type="date" class="form-control" name="member_since">
                 </div>
             </div>
             <div class="col-md-12 mb-3">
                 <div class="form-group">
            <label>Hospital Address </label>
            <textarea name="address" class="form-control" placeholder="Hospital Address"></textarea>
                 </div>
             </div>
         </div>
          <h3 class="text-muted text-center mt-3">STUDENT HEALTH INFO</h3>
         <div class="row">
                <div class="col-md-6 mb-3">
                <div class="form-group">
                <label for="blood_group">Blood Group</label>
                <select name="blood_group" class="custom-select form-control">
                <option selected>Choose...</option>
                <option value="A">A</option>
                <option value="B">B </option>
                <option value="AB">AB </option>
                <option value="O">O+ </option>
                </select>
                             </div>
                         </div>

        <div class="col-md-6 mb-3">
         <div class="form-group">
        <label for="genotype">Genotype</label>
        <select name="genotype" class="custom-select form-control">
        <option selected>Choose...</option>
        <option value="AA">AA</option>
        <option value="AS">AS </option>
        <option value="AC">AC </option>
        <option value="SS">SS </option>
        </select>
             </div>
         </div>
         <div class="col-md-4 mb-3">
             <div class="form-group">
              <label for="illness">FREQUENT ILLNESS</label>
        <input type="text" class="form-control" name="illness" placeholder="Cough">
             </div>
         </div>

                    <div class="col-md-4 mb-3">
                    <div class="form-group">
                <label for="hospitalized">Have you Been Hospitalized?</label>
        <select name="hospitalized" id="hospitalized" class="form-control">
         <option value="" selected>Choose...</option>
         <option value="Yes">Yes</option>
         <option value="No">No</option>
        </select>
                </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="form-group">
               <label for="surgical_operation">Any Surgical Operation?</label>
        <select name="surgical_operation" id="surgical_operation" class="select2 form-control">
         <option value="">Choose...</option>
         <option value="Yes">Yes</option>
         <option value="No">No</option>
         <option value="I Don Not know">I don't Know</option>
        </select>
                </div>
                </div>
</div>
   <div style="float: left; margin-top:10px;"><a href="step4?applicant=<?php echo $Osotech->saltifyString($_GET['applicant'])?>&page=4" class="btn-shop green-color" onclick="return confirm('Are you Sure you want to go Back to Previous page?');"><button type="button" name="button" class="btn btn-secondary btn-md mt-2"> Previous Page</button></a></div>
  <button type="submit" class="btn btn-dark btn-lg btn-round mb-1 __loadingBtn__ mt-2" style="float:right">Continue Registration</button>
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
</div>
<!-- Footer -->
<?php
if (file_exists("footer.php")) {
require_once ("footer.php");
}
 ?>
<!-- Footer -->
      </div>
    <?php include_once ("FooterScript.php");?>
    <script>
    $(document).ready(function(){
    const ADMISSION_FORM5_SUBMIT = $("#fifthStepForm");
    ADMISSION_FORM5_SUBMIT.on("submit", function(event){
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
      $.post("Includes/actions",ADMISSION_FORM5_SUBMIT.serialize(), function(result){
        setTimeout(()=>{
          $(".__loadingBtn__").html('Continue Registration').attr("disabled",false);
          $("#server-response").html(result);
        },1000);
      })
    });

  })
    </script>
  </body>
</html>
