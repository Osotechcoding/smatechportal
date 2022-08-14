<?php 
@session_start();
// require_once "helpers/helper.php";
require_once "languages/config.php";
require_once "classes/Configuration.php";
require_once "classes/Session.php";
$tses_token = Session::set_xss_token();
 ?>
 <?php 
if (isset($_COOKIE['login_user']) && ! empty($_COOKIE['login_user']) && isset($_COOKIE['login_email']) && ! empty($_COOKIE['login_email']) && isset($_COOKIE['login_role']) && ! empty($_COOKIE['login_role'])) {
    // code...
    $cookie_name = $_COOKIE['login_user'];
     $cookie_email = $_COOKIE['login_email'];
     $cookie_email = $_COOKIE['login_email'];
     $cookie_role = $_COOKIE['login_role'];
}else{
    $cookie_name ='';
    $cookie_email ='';
    $cookie_role ='';
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include_once ("template/MetaTag.php");?>
<title><?php echo ucwords($SmappDetails->school_name); ?> :: Student Login</title>
<link rel="shortcut icon" href="schlogo.jpg">
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
<img src="schlogo.png" width="350" class="img-fluid" alt="logo">
<h2 class="text-center text-warning">SCHOOL PORTAL</h2>
<a href="../" style="text-decoration: none;">School Website</a>
</div>
<div class="login-right">
<div class="login-right-wrap">
<div class="text-center"><img src="gsslogo.png" width="150" class="img-fluid" alt="logo"></div>
<!-- <h1>Glory Supreme Schools</h1> -->
<h4>Welcome Back <?php echo $cookie_name; ?></h4>
  <form id="login_cookie_lock_form">               
<div class="form-group">
    <input type="hidden" name="action" value="login_cookie_lock_staff">
    <input type="hidden" name="crole" value="<?php echo $cookie_role; ?>">
    <input type="hidden" name="cemail" value="<?php echo $cookie_email; ?>">
    <input type="password" class="form-control" name="cpass" id="exampleInputPassword1"
        placeholder="Enter Password to Unlock">
</div>
<div class="text-center mb-1"><a href="logout" class="card-link">
<small class="text-danger text-bold-600"> Are you not <?php echo $cookie_name;?>?</small></a></div>
<button type="submit" class="btn btn-dark glow position-relative w-100 __loadingBtn__"> Unlock <i
        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
</form>
<p class="text-center mt-3"><a href="https://glorysupremeschool.com">School Website</a></p></div>
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
            $("#login_cookie_lock_form").on("submit", function(event){
                event.preventDefault();
                const login_cookie_lock_form = $(this).serialize();
                // alert(login_cookie_lock_form);
                //send request
                $.ajax({
                    url:"actions/actions",
                    type:"POST",
                    data:login_cookie_lock_form,
                    beforeSend:function(){
        $(".__loadingBtn__").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Processing...').attr("disabled",true);
        },
            success:function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            $(".__loadingBtn__").html('<?php echo $lang['login'];?><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>').attr("disabled",false);
                        },2000);
                    }
                })
            })
        })
    </script>
</body>

</html>