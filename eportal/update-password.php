<?php
require_once "helpers/helper.php";
$response = "";
if (isset($_GET['email']) && isset($_GET['token'])) {
  if ($_GET['email'] != "" && $_GET['token'] != "") {
    $email = $Configuration->Clean($_GET['email']);
    $token = $Configuration->Clean($_GET['token']);
    if ($Student->checkPasswordResetRedirectAuth($email, $token) == false) {
      $response = $Alert->alert_msg("Sorry, token used for this request has expired:", "danger") . $Configuration->redirectWithTime("./forgot-password", 3000);
    }
  } else {
    echo $Configuration->redirect("./forgot-password", 100);
  }
} else {
  echo $Configuration->redirect("./forgot-password", 100);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("template/MetaTag.php"); ?>
  <title><?php echo ucwords($SmappDetails->school_name); ?> :: Reset Password</title>

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

              <h1>Password Reset Page</h1>
              <div id="response">
                <?php if (isset($response) && !$Configuration->isEmptyStr($response)) echo $response; ?></div>
              <form class="mb-2" id="reset_new_pass_form" autocomplete="off">
                <div class="forom-group mb-2">
                  <input type="email" readonly name="userEmail" class="form-control" value="<?php if (isset($_GET['email']) && !empty($_GET['email'])) {
                                                                                              echo $_GET['email'];
                                                                                            } ?>">
                </div>
                <div id="server-response"></div>
                <div class="form-group">
                  <input type="hidden" name="action" value="save_new_student_pass_">
                  <input type="hidden" name="userType" value="student">
                  <input type="password" name="pwd" class="form-control form-control-lg"
                    placeholder="Enter New Password">
                </div>
                <div class="form-group mb-2">
                  <input type="password" name="cpwd" class="form-control form-control-lg"
                    placeholder="Confirm New Password">
                  <span> <small class="text-danger" style="font-size:12px !important;">Password should be at least 8
                      characters in length and should include at least one upper case letter, one number, and one
                      special character.</small></span>
                </div>
                <button type="submit" class="btn btn-dark glow position-relative w-100 __loadingBtn__">Save
                  Changes</button>
              </form>
              <div class="text-center dont-have">
                <p><a href="./">Login</a></p>
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

  <script>
  $(document).ready(function() {
    //when a login btn is clicked
    const reset_new_pass_form = $("#reset_new_pass_form");
    reset_new_pass_form.on("submit", function(event) {
      event.preventDefault();
      //alert("form Submitted");
      $(".__loadingBtn__").html('<img src="assets/loaders/rolling.svg" width="30"> Processing...').attr(
        "disabled", true);
      $.post("actions/actions", reset_new_pass_form.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Save Changes').attr("disabled", false);
          console.log(result)
          $("#server-response").html(result);
        }, 2000);
      });

    });
  });
  </script>
</body>

</html>