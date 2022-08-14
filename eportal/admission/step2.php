<?php
@session_start();
 require_once "helpers/helper.php";

 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once ("../template/MetaTag.php");?>
<title><?php echo ucwords($SmappDetails->school_name); ?> :: Student Online Admission Portal</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

<link rel="stylesheet" href="../bapps/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
<link rel="stylesheet" href="../bapps/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="../bapps/plugins/fontawesome/css/all.min.css">

 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">

<link rel="stylesheet" href="../bapps/css/style.css">
</head>
<body id="top" style="background:rgba(0, 0, 0, 0.4) url('../schoolbg.jpg');
background-position:center;
background-size: cover;
background-repeat: no-repeat;">

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<!--  -->

<!--  -->
<div class="loginbox">
<div class="login-left">
<img src="<?php echo $Configuration->get_schoolLogoImage();?>" width="150" class="img-fluid" alt="logo" style="border: 2px solid deepskyblue;border-radius:10px;background: #ffffff;">
<h3 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_name); ?></h3>
<p class="text-center" style="font-size: 13px;"><a href="../../" style="text-decoration: none;color: whitesmoke;"> Powered by: <span class="text-danger">SmaTech</span></a></p>
</div>
<div class="login-right">
<div class="login-right-wrap">
<div class="text-center"><img src="<?php echo $Configuration->get_schoolLogoImage();?>" width="50" class="img-fluid" alt="logo"></div>
<h1 class="mb-3 mt-2" style="color: #593128;"> ADMISSION PORTAL</h1>
<form class="form form-vertical">
  <input type="hidden" name="action" value="submit_second_step_admission">
  <input type="hidden" name="bypass" value="<?php //echo md5("oiza123456");?>">
  <input type="hidden" name="admission_no" value="<?php //echo strtoupper($student_data->stdRegNo);?>">
  <input type="hidden" name="auth_code_applicant_id" value="<?php //echo $auth_code_applicant_id;?>">
  <div class="form-body">
    <div class="row">
      <div class="col-12 col-md-12">
       <div class="form-group">
          <input type="text" placeholder="Email" class="form-control" value="<?php //echo $student_data->stdEmail;?>" readonly>
       </div>
   </div>
   <div class="col-6 col-md-6">
       <div class="form-group">
           <input type="text" placeholder="Surname" class="form-control" name="surname" value="<?php //echo ucwords($student_data->stdUserName);?>" readonly>
       </div>
   </div>
    <div class="col-6 col-md-6">
       <div class="form-group">
          <input type="text" placeholder="Class Level" class="form-control" value="<?php //echo ucwords($student_data->studentClass);?>" readonly>
       </div>
   </div>
      <div class="col-12 col-md-12">
        <div class="form-group">
            <input type="text" id="email-id-icon" class="form-control" name="email-id-icon"
              placeholder="FirstName">
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
            <input type="text" id="email-id-icon" class="form-control" name="email-id-icon"
              placeholder="LastName">
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
            <input type="date" id="email-id-icon" class="form-control" name="email-id-icon"
              placeholder="Date of Birth">
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select class="custom-select form-control" name="">
            <option value="" selected>Gender</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="birth_cert" class="custom-select form-control">
          <option value="" selected>Choose...</option>
          <option value="Certificate">Certificate</option>
          <option value="Affidavit">Affidavit </option>
          <option value="None">None </option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="nationality" id="nationality" class="custom-select form-control">
          <option value="" selected>Choose...</option>
          <option value="Nigerian">Nigerian</option>
          <option value="Non Nigerian">None Nigerian </option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="state_origin" id="state_origin" class="custom-select form-control">
           <option selected>Choose...</option>
           <?php echo $Administration->get_states_of_origin_InDropDown();?>
           </select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="localgovt" id="localgvt" class="custom-select form-control" required></select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
             <input type="text" name="hometown" class="form-control" id="hometown" placeholder="Ibeju Lekki">
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="religion" id="religion" class="custom-select form-control">
          <option value="" selected>Choose...</option>
          <option value="Christianity">Christianity</option>
          <option value="Islamic">Islamic </option>
          <option value="Other"> Other </option>
          </select>
        </div>
      </div>
      <div class="col-6 col-md-6">
        <div class="form-group">
          <select name="challenges" id="challenges" class="select2 form-control">
           <option value="" selected>Choose...</option>
           <option value="Visually Challenged">Visually Challenged</option>
           <option value="Albinism">Albinism</option>
           <option value="Learning Disabilities">Learning Disabilities</option>
           <option value="Intellectually Challenged">Intellectually Challenged</option>
           <option value="Auditory Challenged">Hearing/Auditory Challenged</option>
           <option value="Behavioural Disorder">Behavioural Disorder</option>
           <option value="Speech Challenged">Speech Challenged</option>
           <option value="Other">Other</option>
           <option value="None">None</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-12">
        <div class="form-group">
             <textarea name="home_address" class="form-control" placeholder="Home Address"></textarea>
        </div>
      </div>

      <div class="col-12 d-flex justify-content-end">
        <button type="submit" class="btn btn-dark btn-lg mr-1">Submit &amp; Continue</button>
      </div>
    </div>
  </div>
</form>

</div>
</div>
</div>
</div>
</div>
</div>
<!-- <div class="col-md-12 text-center mt-3 p-3">
        <h1 class="text-center" style="font-size:40px;color: #fff;font-weight:bold;text-shadow: 4px 2px black; border-radius: 10px; border: 4px solid orangered; background-color: orangered; text-align: center;display: inline-flex;"> <?php //echo ucwords($SmappDetails->school_name);?></h1>
    </div> -->
<script src="../bapps/js/jquery-3.6.0.min.js"></script>
<script src="../bapps/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="../bapps/js/script.js"></script>

<script src="../app-assets/js/scripts/extensions/toastr.min.js"></script>
 <div id="server-response"></div>
<script>
        $(document).ready(function(){
//when a login btn is clicked
const login_form = $("#student-login-form");
login_form.on("submit", function(event){
    event.preventDefault();
    //alert("form Submitted");
     $(".__loadingBtn__").html('<img src="../assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled", true);
     $.post("../actions/actions",login_form.serialize(),function(result){
        setTimeout(()=>{
            $(".__loadingBtn__").html('LOGIN').attr("disabled", false);
            //alert(result);
            $("#server-response").html(result);
        },500);
     })

})

             $(document).on("click",".navigate_to_staff_login", function(){
                 setTimeout(()=>{
                     window.location.assign("./staffloginportal");
                },500);
            });
        })
    </script>
</body>

</html>
