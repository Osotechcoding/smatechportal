<?php
require_once "helpers/helper.php";
require_once "classes/Session.php";
@session_start();
$tses_token = Session::set_xss_token();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("template/MetaTag.php"); ?>
  <title>Staff Login :: <?php echo ucwords($SmappDetails->school_name); ?></title>
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
              <h1 class="mb-3 mt-2" style="color: #593128;">STAFF LOGIN </h1>
              <form id="staffLoginForm">
                <input type="hidden" name="action" value="staff_login">
                <input type="hidden" name="txss_token" value="<?php echo $tses_token; ?>">
                <div class="form-group">
                  <input type="text" autocomplete="off" class="form-control" name="login_email" id="exampleInputEmail1"
                    placeholder="<?php echo $lang['email']; ?>"
                    value="<?php if (isset($_COOKIE['login_email'])) {
                                                                                                                                                                              echo $_COOKIE['login_email'];
                                                                                                                                                                            } else {
                                                                                                                                                                              echo '';
                                                                                                                                                                            } ?>">
                </div>
                <div class="form-group">
                  <input type="password" autocomplete="off" class="form-control" name="login_password" value="<?php if (isset($_COOKIE['login_pass'])) {
                                                                                                                echo $_COOKIE['login_pass'];
                                                                                                              } else {
                                                                                                                echo '';
                                                                                                              } ?>"
                    id="exampleInputPassword1" placeholder="<?php echo $lang['password']; ?>">
                </div>

                <div class="checkbox form-group form-box clearfix">
                  <a href="javascript:void(0);" class="forgtpwd" style="float: right;color: red;">Forgot Password</a>
                  <div class="form-check checkbox-theme">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1" name="rememberme">
                    <label class="form-check-label" for="rememberMe">Remember me</label>
                  </div>
                </div>
                <div class="form-group">
                  <button class="btn btn-dark btn-block __loadingBtn__" type="submit">LOGIN</button>
                </div>
              </form>
              <div class="text-center dont-have">Are you a Student? <a class="link navigate_to_student_login"
                  style="cursor: pointer;"> Login here</a>
                <p class="text-center text-info" style="font-size: 13px; margin-top: 10px;"><a
                    href="<?php echo WEBSITE_HOME_PAGE; ?>" style="text-decoration: none;color: darkblue;"> Powered by:
                    <span class="text-danger"><?php echo __OSOTECH__DEV_COMPANY__; ?></span></a></p>
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
  //disable right click on mouse
  //     $(document).on("contextmenu", function(e) { return !1 });
  //      document.onkeydown = function(e) {
  //     if (e.ctrlKey &&
  //         (e.keyCode === 85 )) {
  //     alert("Not allowed!");
  //     return false;
  //     }
  // };
  $(document).ready(function() {
    $(document).on("click", ".navigate-away", function() {
      setTimeout(() => {
        window.location.assign('../');
      }, 500);
    });

    //
    $("#staffLoginForm").on("submit", function(event) {
      event.preventDefault();
      const StaffFormData = $(this).serialize();
      //send request via ajax 
      $.ajax({
        url: "actions/actions",
        type: "POST",
        data: StaffFormData,
        beforeSend: function() {
          $(".__loadingBtn__").html(
            '<img src="assets/loaders/rolling.svg" width="30"> Please wait...').attr("disabled",
            true);
        },
        success: function(res) {
          setTimeout(() => {
            // console.log(res);
            $("#server-response").html(res);
            $(".__loadingBtn__").html(
                '<?php echo $lang['login']; ?><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>')
              .attr("disabled", false);
          }, 2000);
        }
      })
    });

    $(document).on("click", ".navigate_to_student_login", function() {
      setTimeout(() => {
        window.location.assign("./");
      }, 500);
    });
    $(document).on("click", ".forgtpwd", function() {
      setTimeout(() => {
        window.location.assign("./forgot-pwd");
      }, 500);
    });

  })
  </script>
</body>

</html>