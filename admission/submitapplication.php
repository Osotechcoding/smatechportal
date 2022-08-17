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
                  <h3 class="mb-5 text-uppercase text-center text-info">Admission Form (Student Document Uploading)</h3>
                  <div class="text-center" id="server-response">
                  </div>
                  <form id="finalStepForm" method="POST" enctype="multipart/form-data">
                  <div class="row">
              <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
              <input type="hidden" name="action" value="submit_final_step_admission">
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

                    <div class="col-md-12 mb-3">
                    <div class="form-group">
                  <i class="text-danger">Please Note that your Passport size must not be up to 20KB and dimension should be (100 x 100 pixels)</i>
                    <label for="student_passport">Choose Passport</label>
                    <input type="file" class="form-control custom-file" name="student_passport" id="student_passport" onchange="previewFile(this);">
                                </div>
                                    </div>
                            <center>
                              <div class="col-md-12" id="uploaded_passport">
                        <img id="previewImg" width="200" src="avatar.jpg" alt="Placeholder" style="border: 5px solid darkblue;border-radius:10px;">
                        <p class="text-center text-muted">Image Size: <span id="ImageSize"></span></p>
                      </div>
                            </center>
<p class="mt-3 text-danger"><input type="checkbox" class="checkbox__input"> <b>By submitting your application form you agree to the Terms and Condition of </b> <strong class="text-info"><?php echo ($Osotech->getConfigData()->school_name);?> <?php echo ($Osotech->getConfigData()->school_state);?> </strong></p>
                </div>
                   <div style="float: left; margin-top:10px;"><a href="step5?applicant=<?php echo $_GET['applicant']?>&page=5" class="btn-shop green-color" onclick="return confirm('Are you Sure you want to go Back to Previous page?');"><button type="button" name="button" class="btn btn-secondary btn-md mt-2"> Previous Page</button></a></div>
                  <button type="submit" class="btn btn-dark btn-lg btn-round mb-1 __loadingBtn__ mt-5" style="float:right" onclick="return confirm('Are you Sure you want to submit this form?');">Submit Registration</button>
                   <div class="clearfix"></div>
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
        function previewFile(input){
            var file = $("#student_passport").get(0).files[0];
             $(".__loadingBtn__").html('Submit Registration').attr("disabled",true);
            if(file){
                var reader = new FileReader();
                reader.onload = function(){
                    $("#previewImg").attr("src", reader.result);
                    //$("#imagename").html(file.name);
                    $("#ImageSize").html((file.size/1024).toFixed(2) +"KB");
                    if (file.size/1024 > 20) {
                       $(".__loadingBtn__").html('Submit Registration').attr("disabled",true);
                    }else{
                      $(".__loadingBtn__").html('Submit Registration').attr("disabled",false);
                    }
                }
                reader.readAsDataURL(file);
            }
        }
      </script>
    <script>
    $(document).ready(function(){
       $(".__loadingBtn__").html('Submit Registration').attr("disabled",true);
      const ADMISSION_FORM_SUBMIT = $("#finalStepForm");
      ADMISSION_FORM_SUBMIT.on("submit", function(event){
        event.preventDefault();
        if ($('.checkbox__input').is(":checked") == true) {
          $.ajax({
         url:"Includes/actions",
         type:"POST",
         data: new FormData(this),
         contentType:false,
         cache:false,
         processData:false,
         beforeSend(){
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
         },
         success:function(data){
           setTimeout(()=>{
              $(".__loadingBtn__").html('Submit Registration').attr("disabled",false);
             $("#server-response").html(data);
           },2000);
         }
       });
     }else{
    alert('You need to agree to the Terms and Condition before submitting your applicvation form')
     }

      });

    })
  </script>

  </body>
</html>
