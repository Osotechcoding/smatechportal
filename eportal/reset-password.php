<?php
require_once "helpers/helper.php";
require_once "languages/config.php";
require_once "classes/Session.php";
@session_start();
$tses_token = Session::set_xss_token();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("template/MetaTag.php"); ?>
  <title><?php echo ucwords($SmappDetails->school_name); ?> :: Reset Password</title>

  <link rel="shortcut icon" href="schlogo.jpg">

  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&amp;display=swap">

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
            <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" width="150" class="img-fluid" alt="logo"
              style="border: 2px solid deepskyblue;border-radius:10px;background: #ffffff;">
            <h3 class="text-center text-warning"><?php echo ucwords($SmappDetails->school_name); ?></h3>
            <p class="text-center" style="font-size: 13px;"><a href="<?php echo WEBSITE_HOME_PAGE; ?>"
                style="text-decoration: none;color: whitesmoke;"> Powered by: <span
                  class="text-danger"><?php echo __OSOTECH__DEV_COMPANY__; ?></span></a></p>
          </div>
          <div class="login-right">
            <div class="login-right-wrap">
              <div class="text-center"><img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" width="80"
                  class="img-fluid" alt="logo"></div>

              <h3 class="text-center text-info text-bold">Password Reset</h3>

              <form class="mb-2" id="reset_new_pass_form">
                <div class="form-group">
                  <input type="hidden" name="action" value="reset_new_pass_now">
                  <input type="hidden" name="userType" value="staff">
                  <input type="hidden" name="userEmail" value="email">
                  <input type="password" class="form-control form-control-lg" placeholder="Enter a new password">
                </div>
                <div class="form-group mb-2">
                  <input type="password" class="form-control form-control-lg" placeholder="Confirm your new password">
                </div>
                <button type="submit" class="btn btn-dark glow position-relative w-100 __loadingBtn__">Save
                  Password</button>
              </form>
              <div class="text-center dont-have">
                <p> Or <a href="./">Login Here</a></p>
              </div>
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
  $(document).ready(function() {
    //when a login btn is clicked
    const reset_new_pass_form = $("#reset_new_pass_form");
    reset_new_pass_form.on("submit", function(event) {
      event.preventDefault();
      //alert("form Submitted");
      $(".__loadingBtn__").html('<img src="assets/loaders/rolling_loader.svg" width="30"> Processing...').attr(
        "disabled", true);
      $.post("actions/actions", reset_new_pass_form.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Save Password').attr("disabled", false);
          //alert(result);
          $("#server-response").html(result);
        }, 2000);
      });

    });
  });
  </script>
</body>

</html>