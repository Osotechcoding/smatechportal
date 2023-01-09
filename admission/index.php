<?php
    if (!file_exists("Includes/Osotech.php")) {
     die(" Access to this Page is Denied! 
     <p>Please Contact Your Administrator for assistance</p>");
}
    require_once("Includes/Osotech.php");
    $Osotech = new Osotech();
    $Osotech->osotech_session_kick();
    date_default_timezone_set("Africa/Lagos");
    if(!$Osotech->checkAdmissionPortalStatus()){
    header("Location:" . APP_ROOT);
    exit();
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once ("MetaTags.php");?>
    <title>Admission Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
       <?php include_once "Head.php"; ?>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <?php include_once "HeadNavBar.php"; ?>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="col-md-10 offset-1">
                <!-- start  -->
                <div class="row gx-4 justify-content-center">
                   <div class="col-lg-5 mb-4 px-4">
                       <div class="container px-2">
                        <div class="card fet-card">
                        <div class="card-header">
                        <h5 class="text-center py-3 fet-text">Carefully read the instruction below!</h5>
                            </div>
                            <div class="card-body">
                                <p>Step 1: <span>Log on to https://admission.flaterptech.com/</span></p>
                                <p>Step 2: <span>Carefully scratch off the covered area of your scratch card to unveil your 13 digit secret PIN Number</span></p>
                                <p>Step 3: Enter a valid and active email address, Surname,active phone number in the space provided</p>
                                <p> Step 4:Choose your admission type and admission Level,Solve the puzzle to proceed</p>
                                <p>Step 5: Click on start Registration button and wait for the response</p>
                                <p>Step 6:On successful, You will see a notification message like this: <em class="text-success">Verification link have been sent to <b>student@gmail.com</b>  click on the link to complete your admission!</em></p>
                                <p>Step 7: Go to your mail inbox to continue with your registration</p>
                                <p>Step 8: On successful registration; print your e-photo-card for reference</p>
                            </div>
                        </div>
                      </div>
                    </div>
                     <div class="col-lg-7">
                       <div class="container px-3">
                         <div class="card fw-bolder fet-card py-4">
                            <div class="card-header">
                            <h5 class="text-center py-3 fet-text">Fill in the form below to start your admission</h5>
                            </div>
                            <div class="card-body">
                            <div class="text-center mb-1" id="server-response"></div>
                            <form  id="new_Student_Admission_form" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                            <h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">Scratch Card &amp; Academic Information</h4>
                            <div id="server-response" class="text-center m-2"></div>
                            <div class="col-md-6 mb-2">
                               <input type="hidden" name="action" value="submit_first_step_admission">
                          <input type="hidden" name="osotech_csrf"
                            value="<?php echo md5('iremideoizasamsonosotech'); ?>">
                                <div class="form-group">
                                    <label class="mb-2">Scratch Card Pin</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="Enter Card Pin" aria-label="Card Pin" name="card_pin">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">Card Serial</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Pin Serial" aria-label="Card Serial" name="card_serial">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">Student/Pupil Email (<small class="text-danger">Active e-mail</small>) </label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter e-mail address" aria-label="E-mail address" name="student_email">
                                    <span id="emailHelp" class="form-text text-danger">I don't have an e-mail <a
                                        href="https://accounts.google.com/SignUp" target="_blank"> Signup gmail account</a></span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">Surname [Father's Name]</label>
                                    <input type="text" class="form-control form-control-lg" placeholder="Enter Surname" aria-label="Surname" name="username">
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">NGN Phone No</label>
                                    <input type="number" class="form-control form-control-lg" placeholder="00000000000" aria-label="Phone Number" name="student_phone">
                                    <span id="phoneHelp" class="form-text text-danger">Allowed phone format 000-0000-0000 </span>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">Admission Class Level</label>
                                    <select class="form-select custom-select form-control form-control-lg" name="class_level">
                                        <option value="" selected> Choose...</option>
                                        <option value="Primary"> Primary</option>
                                        <option value="Secondary"> Secondary</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 mb-2">
                                <div class="form-group">
                                    <label class="mb-2">Admission Type</label>
                                    <select class="form-select custom-select form-control form-control-lg" name="student_type">
                                        <option value="" selected> Choose...</option>
                                        <option value="Day"> Day Student</option>
                                        <option value="Boarding"> Boarding Student</option>
                                    </select>
                                </div>
                            </div>
                             <div class="col-md-6 mb-2">
                            <div class="form-group">
                              <div id="captcha_load">
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-dark float-end btn-lg mt-3 __loadingBtn__">Start Registration</button>
                           </div>
                    </form>
     </div>
    
                      </div>
</div>

                    </div>
                </div>
                <!-- end -->
                </div>
</section>
        </main>
        <!-- Footer-->
       
        <?php include_once "footer.php"; ?>
<?php include_once "FooterScript.php"; ?>
        <script>
  $(document).ready(function() {

    const ADMISSION_FORM_SUBMIT = $("#new_Student_Admission_form");
    ADMISSION_FORM_SUBMIT.on("submit", function(event) {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Please wait...').attr("disabled",
        true);
      $.post("Includes/actions", ADMISSION_FORM_SUBMIT.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Start Registration').attr("disabled", false);
          $("#server-response").html(result);
        }, 1500);
      })
    });

  })
  </script>
  <?php
  function loadCaptcha()
  {
    echo '<script> $("#captcha_load").load("osotech_captcha");</script>';
  }
  loadCaptcha();
  ?> 
    </body>
</html>
