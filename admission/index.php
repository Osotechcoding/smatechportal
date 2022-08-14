<?php include_once 'helper.php'; ?>

<?php date_default_timezone_set("Africa/Lagos"); ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Online Registration Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  </head>
  <body>
    <div class="container mt-5">
    <nav class="navbar navbar-expand-lg bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">SMATECH</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="howtoapply">FAQs</a>
        <a class="nav-link" href="http://localhost/smatechportal/eportal/" target="_blank">Student Portal</a>
      </div>
    </div>
  <button class="btn btn-outline-danger" type="button">Logout</button>

  </div>
</nav>
<br>
    <div class="accordion mt-1" id="accordionExample">
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        How To Apply
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
      </div>
    </div>
  </div>

</div>
<br>
<!--  -->
<div class="text-center mb-1" id="server-response">

</div>
<br>
<div class="col-md-12">
    <h3 class="text-center">Scratch Card Information</h3>
  <form id="newStudentAdmissionform">
    <div class="row">
      <input type="hidden" name="action" value="submit_first_step_admission">
      <input type="hidden" name="osotech_csrf" value="<?php echo md5('iremideoizasamsonosotech');?>">
      <div class="col-md-6 mb-2">
        <div class="form-group">
          <label for="card_pin" class="form-label">Scratch Card Pin</label>
          <input type="password" name="card_pin" class="form-control form-control-lg" placeholder="**********" id="card_pin">
          <div id="cardHelp" class="form-text text-danger">Enter the Card Pin and Serial in the space provided</div>
        </div>
      </div>
      <div class="col-md-6 mb-2">
        <div class="form-group">
          <label for="card_serial" class="form-label">Card Serial</label>
          <input type="text" autocomplete="off" name="card_serial" id="card_serial" class="form-control form-control-lg" placeholder="**********">
        </div>
      </div>
      <div class="col-md-6 mb-2">
         <span id="email-error"></span>
        <div class="form-group">
          <label for="student_email" class="form-label">Email address</label>
          <input type="text" autocomplete="off" name="student_email" class="form-control form-control-lg" placeholder="student@smatechportal.edu.com">
            <div id="emailHelp" class="form-text text-danger">I don't have an e-mail <a href="https://accounts.google.com/SignUp" target="_blank"> Create Email Account</a></div>
        </div>
      </div>
      <div class="col-md-6 mb-2">
        <div class="form-group">
          <label for="username" class="form-label">Father's Name (Username)</label>
          <input type="text" autocomplete="off" id="username" name="username" class="form-control form-control-lg" placeholder="@osotech">
        </div>
      </div>
      <div class="col-md-6 mb-2">
         <span id="phone-error"></span>
        <div class="form-group">
          <label for="student_phone" class="form-label">Phone</label>
          <input type="text" autocomplete="off" name="student_phone" class="form-control form-control-lg" placeholder="080-0000-0000" id="student_phone">
          <div id="phoneHelp" class="form-text text-danger">Allowed phone format 080-2311-3432 </div>
        </div>
      </div>
      <div class="col-md-6 mb-2">
        <div class="form-group">
            <label for="student_class" class="form-label"> Class Level</label>
          <select class="custom-select form-control form-control-lg" id="student_class" name="student_class">
            <option value="pry" selected>Primary</option>
            <option value="jnr">Junior </option>
            <option value="snr">Senior</option>
          </select>
        </div>
      </div>
      <div class="col-md-6 mb-2">
         <span id="phone-error"></span>
        <div class="form-group">
          <input type="datetime" autocomplete="off" name="regDateTime" class="form-control form-control-lg" value="<?php echo date("Y-m-d h:i:s") ?>" readonly>
        </div>
      </div>
      <div class="col-md-6 mb-2">
        <div class="form-group">
          <div class="" id="captcha_load">
          </div>
        </div>
      </div>
    </div>
    <div class="mb-3 form-check">
      <input type="checkbox" class="form-check-input" id="exampleCheck1">
      <label class="form-check-label" for="exampleCheck1">Agree to Terms &amp; Conditions</label>
    </div>
    <button type="submit" class="btn btn-dark btn-lg btn-round mb-5 __loadingBtn__" style="float:right">Continue Registration</button>
  </form>
</div>
<br>



<!-- Footer -->
<?php
if (file_exists("./footer.php")) {
include_once ("./footer.php");
}
 ?>
<!-- Footer -->
      </div>
      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    <script charset="utf-8">
$(document).ready(function(){
const ADMISSION_FORM_SUBMIT = $("#newStudentAdmissionform");
ADMISSION_FORM_SUBMIT.on("submit", function(event){
event.preventDefault();
$(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
$.post("Includes/actions",ADMISSION_FORM_SUBMIT.serialize(), function(result){
  setTimeout(()=>{
    $(".__loadingBtn__").html('Continue').attr("disabled",false);
    console.log(result)
    $("#server-response").html(result);
  },1500);
})
});

//check duplicate student email addres
$("#student_phone").on("keyup", function(){
let studentPhone = $(this).val();
if (studentPhone!="") {
let check_action = "check_student_phone";
//send to server for checking
$.post("Includes/checkStudentResult",{action:check_action,Phone:studentPhone},function(data){
  $("#phone-error").html(data);
  console.log(data);
})
}else{
  $("#phone-error").html("");
}

})

//check duplicate student email addres
$("#studentEmail").on("keyup", function(){
let studentEmail = $(this).val();
if (studentEmail !="") {
let check_action = "check_student_email";
//send to server for checking
$.post("Includes/checkStudentResult",{action:check_action,Email:studentEmail},function(res){
  $("#email-error").html(res);
})
}else{
  $("#email-error").html("");
}

})
// setTimeout(()=>{
//     $(".alert").alert('close').slideUp('slow');
//   },5000);
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
