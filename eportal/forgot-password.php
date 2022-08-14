<?php 
@session_start();
 require_once "helpers/helper.php";
// require_once "languages/config.php";
// require_once "classes/Configuration.php";
require_once "classes/Session.php";

//$tses_token = Session::set_xss_token();
 ?>
<!DOCTYPE html>
<html lang="en">

<head>
<?php include_once ("template/MetaTag.php");?>
<title><?php echo ucwords($SmappDetails->school_name); ?> :: Forgot Password</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

<link rel="stylesheet" href="bapps/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
<link rel="stylesheet" href="bapps/plugins/fontawesome/css/fontawesome.min.css">
<link rel="stylesheet" href="bapps/plugins/fontawesome/css/all.min.css">

 <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">

<link rel="stylesheet" href="bapps/css/style.css">
</head>
<body id="top" style=" background:rgba(0, 0, 0, 0.8) url('schoolbg.jpg');
background-position:center;
background-size: cover;
background-repeat: no-repeat;">

<div class="main-wrapper login-body">
<div class="login-wrapper">
<div class="container">
<div class="loginbox">
<div class="login-left">
<img src="<?php echo $Configuration->get_schoolLogoImage();?>" width="350" class="img-fluid" alt="logo">
<h3 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_name);?></h3>
<a href="../" target="_blank" style="text-decoration: none;color: white;">Go to Homepage</a>
</div>
<div class="login-right">
<div class="login-right-wrap">
<div class="text-center"><img src="<?php echo $Configuration->get_schoolLogoImage();?>" width="150" class="img-fluid" alt="logo"></div>

<h1>Forgot Password</h1>
 <div class="text-warning text-center mb-2"><small>Enter the email you used when you joined and we will send you reset link</small></div>
<form id="student-login-form">
    <input type="hidden" name="txss_token" value="<?php echo $tses_token;?>">
    <input type="hidden" name="action" value="send_reset_pass_link">
<div class="form-group">
<input type="text" class="form-control" name="reset_email" id="exampleInputEmail1"
 placeholder="Enter your e-mail address">
</div>
<div class="form-group">
    <label for="">I am a?</label>
<select name="accountType" class="custom-select form-control">
    <option value="" selected>Choose...</option>
    <option value="student">Student</option>
    <option value="staff">Staff</option>
</select>
</div>
<div class="checkbox form-group form-box clearfix">
    <a href="./" style="float: right;color: darkseagreen;">Remember Password?</a>
        </div>
<div class="form-group">
<button class="btn btn-dark btn-block __loadingBtn__" type="submit">Send Me Reset Link</button>
</div>
</form>
<div class="text-center dont-have">
<p><a href="../">School Website</a></p></div>
</div>
</div>
</div>
</div>
</div>
</div>


<script src="bapps/js/jquery-3.6.0.min.js"></script>
<script src="bapps/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="bapps/js/script.js"></script>

<script src="app-assets/js/scripts/extensions/toastr.min.js"></script>
 <div id="server-response"></div>
<script>
        $(document).ready(function(){
//when a login btn is clicked
const login_form = $("#student-login-form");
login_form.on("submit", function(event){
    event.preventDefault();
    //alert("form Submitted");
     $(".__loadingBtn__").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled", true);
     $.post("actions/actions",login_form.serialize(),function(result){
        setTimeout(()=>{
            $(".__loadingBtn__").html('Send Me Reset Link').attr("disabled", false);
            //alert(result);
            $("#server-response").html(result);
        },500);
     })

})

            $(document).on("click",".navigate-away", function(){
                setTimeout(()=>{
                    window.location.assign('../');
                },500);
            });
        })
    </script>
</body>

</html>