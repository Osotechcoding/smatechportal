
<?php
// error_reporting(1);
@ob_start();
if (!file_exists("Includes/Osotech.php")){
    die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once ("Includes/Osotech.php");
require_once ("Includes/Database.php");
$database = new Database();
$conn = $database->osotech_connect();
$Osotech = new Osotech($conn);
@$Osotech->osotech_session_kick();

 date_default_timezone_set("Africa/Lagos"); ?>
 <?php if ($Osotech->checkAdmissionPortalStatus() !== true): ?>
   <?php header("Location:".APP_ROOT);
   exit();?>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Student Online Registration Portal :: <?php echo ($Osotech->getConfigData()->school_name);?></title>
    <?php include_once ("Head.php");?>

  </head>
  <body style="background:rgba(0, 0, 0, 0.4) url('schoolbg.jpg');
background-position:center;
background-size: cover;
background-repeat: no-repeat;">
    <div class="container mt-2">
    <?php include_once 'HeadNavBar.php'; ?>
<br>
    <div class="accordion mt-1" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        Click here <span> to read the Instruction on How To Apply</span> 
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body text-center">
        <strong>STEP ONE :: </strong> It is shown by default, until the collapse plugin adds the appropriate classes <code>.accordion-body</code>
        <br>
      </div>
    </div>
  </div>
</div>

<div class="col-md-12">
  <section class="h-100 bg-white">
    <div class="container py-2 h-60">
      <div class="row d-flex justify-content-center align-items-center h-70">
        <div class="col">
          <div class="card card-registration my-4 osotech-bg-color">
            <div class="row g-0">
              <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                <div class="card-body p-md-3 text-black">
                  <h3 class="mb-3 text-uppercase text-center text-black">Scratch Card &amp; Academic Information</h3>
                  <div class="text-center mb-1" id="server-response">
                  </div>
                  <form id="newStudentAdmissionform">
                  <div class="row">
                    <input type="hidden" name="action" value="submit_first_step_admission">
                    <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="card_pin" class="form-label">Scratch Card Pin</label>
                        <input type="password" name="card_pin" class="form-control form-control-lg" placeholder="**********" id="card_pin">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="card_serial" class="form-label">Card Serial</label>
                        <input type="text" autocomplete="off" name="card_serial" id="card_serial" class="form-control form-control-lg" placeholder="**********">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="studentEmail" class="form-label">Email address </label>
                        <input type="text" id="studentEmail" autocomplete="off" name="student_email" class="form-control form-control-lg" placeholder="student@example.com">
                            <div id="Email-error" class="form-text"><span id="emailHelp" class="form-text text-danger">I don't have an e-mail <a href="https://accounts.google.com/SignUp" target="_blank"> Create Email Account</a></span></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="username" class="form-label">Surname [Father's Name]</label>
                        <input type="text" autocomplete="off" id="username" name="username" class="form-control form-control-lg" placeholder="Smatech">
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <label for="student_phone" class="form-label">Phone </label>
                        <input type="text" autocomplete="off" name="student_phone" class="form-control form-control-lg" placeholder="000-0000-0000" id="studentPhone">
                          <div id="phone-error" class="form-text"><span id="phoneHelp" class="form-text text-danger">Allowed phone format 000-0000-0000 </span></div>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                          <label for="class_level" class="form-label">Admission into Class Level</label>
                        <select class="custom-select form-control form-control-lg" id="class_level" name="class_level">
                          <option value="" selected>Choose...</option>
                          <option value="Basic">Basic</option>
                          <option value="Junior">Junior</option>
                          <option value="Senior">Senior</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 mb-3">
                      <div class="form-group">
                        <div class="" id="captcha_load">
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Agree to Terms &amp; Conditions</label>
                  </div> -->
                  <button type="submit" class="btn btn-dark btn-lg btn-round mb-2 __loadingBtn__" style="float:right">Start Registration</button>
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
  <?php
if (file_exists("./footer.php")) {
include_once ("./footer.php");
}
 ?>
</div>
<!-- Footer -->

<!-- Footer -->
      </div>
    <?php include_once ("FooterScript.php");?>
    <script>
$(document).ready(function(){

const ADMISSION_FORM_SUBMIT = $("#newStudentAdmissionform");
ADMISSION_FORM_SUBMIT.on("submit", function(event){
event.preventDefault();
$(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
$.post("Includes/actions",ADMISSION_FORM_SUBMIT.serialize(), function(result){
  setTimeout(()=>{
    $(".__loadingBtn__").html('Start Registration').attr("disabled",false);
    $("#server-response").html(result);
  },1500);
})
});

})
    </script>
    <?php
    function loadCaptcha(){
    echo'<script> $("#captcha_load").load("osotech_captcha.php");</script>';
    }
    loadCaptcha();
    ?>
  </body>
</html>
