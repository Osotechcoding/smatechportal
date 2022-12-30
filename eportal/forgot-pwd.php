<?php
require_once "helpers/helper.php";
require_once "classes/Session.php";
$xss_token = Session::set_xss_token();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("template/MetaTag.php"); ?>
  <title><?php echo ucwords($SmappDetails->school_name); ?> :: Forgot Password</title>
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
        <?php include_once("loginBanner.php") ?>
          <div class="login-right">
            <div class="login-right-wrap">
              <div class="text-center"><img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" width="80"
                  class="img-fluid" alt="logo"></div>
              <h1>Forgot Password</h1>
              <div class="text-info text-center mb-2"><small>Enter your email to recieve a reset link</small></div>
              <div id="server-response"></div>
              <form id="sendPasswordResetForm">
                <input type="hidden" name="txss_token" value="<?php echo $xss_token; ?>">
                <input type="hidden" name="action" value="send_reset_pass_link_staff">
                <div class="form-group">
                  <input type="text" class="form-control" name="staff_email" id="exampleInputEmail1"
                    placeholder="Enter your e-mail address">
                </div>
                <input type="hidden" name="accountType" value="staff">
                <div class="checkbox form-group form-box clearfix">
                  <a href="javascript:void(0);" class="navigate-away" style="float: right;color: darkseagreen;">Remember
                    Password?</a>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-block __loadingBtn__" type="submit">Send Reset Link</button>
                </div>
              </form>

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
  <!-- <div id="server-response"></div> -->
  <script>
  $(document).ready(function() {
    //when a login btn is clicked
    $("#sendPasswordResetForm").on("submit", function(e) {
      e.preventDefault();
      const sendPasswordResetForm = $(this).serialize();
      $(".__loadingBtn__").html('<img src="assets/loaders/rolling.svg" width="30"> Processing...').attr(
        "disabled", true);
      $.post("actions/actions", sendPasswordResetForm, function(data) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Send Reset Link').attr(
            "disabled", false);
          // console.log(data);
          $("#server-response").html(data);
        }, 2000);
      });
    });
    $(document).on("click", ".navigate-away", function() {
      setTimeout(() => {
        window.location.assign('./stafflogin');
      }, 500);
    });
  })
  </script>
</body>

</html>