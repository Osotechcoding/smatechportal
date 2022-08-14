<?php 
// require_once "helpers/helper.php";
require_once "languages/config.php";
require_once "classes/Configuration.php";
require_once "classes/Session.php";
Session::init_ses();
$tses_token = Session::set_xss_token();
 ?>
 <?php 
if (isset($_COOKIE['login_user']) && ! empty($_COOKIE['login_user']) && isset($_COOKIE['login_email']) && ! empty($_COOKIE['login_email'])) {
    // code...
    $cookie_name = $_COOKIE['login_user'];
     $cookie_email = $_COOKIE['login_email'];
}else{
    $cookie_name ='';
    $cookie_email ='';
}

  ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="Frest admin is super flexible, powerful, clean &amp; modern responsive bootstrap 4 admin template with unlimited possibilities.">
    <meta name="keywords" content="admin template, Frest admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="PIXINVENT">
    <title>Lock Screen - Frest - Bootstrap HTML admin template</title>
    <link rel="apple-touch-icon" href="app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="https://www.pixinvent.com/demo/frest-clean-bootstrap-admin-dashboard-template/app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

   <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/vendors.min.css">
     <link rel="stylesheet" type="text/css" href="app-assets/vendors/css/extensions/toastr.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <link rel="stylesheet" type="text/css" href="app-assets/css/pages/authentication.css">
     <link rel="stylesheet" type="text/css" href="app-assets/css/plugins/extensions/toastr.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <!-- END: Custom CSS-->

  </head>
  <!-- END: Head-->

  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" data-layout="semi-dark-layout">
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
        </div>
        <div class="content-body"><!-- lock screen starts -->
<section class="row flexbox-container">
    <div class="col-xl-7 col-10">
        <div class="card bg-authentication mb-0">
            <div class="row m-0">
                <!-- left lock screen section -->
                <div class="col-md-6 col-12 px-0">
                    <div class="card disable-rounded-right mb-0 p-2">
                        <div class="text-center text-bold text-muted">

                            <h3>Welcome Back <?php echo $cookie_name; ?></h3>
                        </div>
                        <div class="card-body">
                            <div class="text-center">
                                    <div class="avatar ml-10 mr-10">
                                   <center> <img src="assets/loaders/osotech.png" class="avatar" height="100" width="100" alt="avatar"></center>
                                </div>
                                </div>
                            <form id="login_cookie_lock_form">
                               
                                <div class="form-group">
                                    <input type="hidden" name="action" value="login_cookie_lock">
                                    <input type="hidden" name="cemail" value="<?php echo $cookie_email; ?>">
                                    <label class="text-bold-600" for="exampleInputPassword1">Password</label>
                                    <input type="password" class="form-control" name="cpass" id="exampleInputPassword1"
                                        placeholder="Enter Password to Unlock">
                                </div>
                                <div class="text-center mb-1"><a href="logout" class="card-link">
                            <small class="text-danger text-bold-600"> Are you not <?php echo $cookie_name;?>?</small></a></div>
                                <button type="submit" class="btn btn-primary glow position-relative w-100 __loadingBtn__"> Unlock <i
                                        id="icon-arrow" class="bx bx-right-arrow-alt"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- right image section -->
                <div class="col-md-6 d-md-block d-none text-center align-self-center">
                    <img class="img-fluid" src="app-assets/images/pages/lock-screen.png" alt="branding logo"
                        width="350">
                </div>
            </div>
        </div>
    </div>
</section>
<!-- lock screen ends -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
   <!-- BEGIN: Vendor JS-->
    <script src="app-assets/vendors/js/vendors.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
     <!-- BEGIN: Page Vendor JS-->
    <script src="app-assets/vendors/js/extensions/toastr.min.js"></script>
    <!-- END: Page Vendor JS-->
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="app-assets/js/scripts/configs/vertical-menu-dark.min.js"></script>
    <script src="app-assets/js/core/app-menu.min.js"></script>
    <script src="app-assets/js/core/app.min.js"></script>
    <script src="app-assets/js/scripts/components.min.js"></script>
    <script src="app-assets/js/scripts/footer.min.js"></script>
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
        $(".__loadingBtn__").html('<span class="spinner-border text-warning" role="status"></span> Please wait...').attr("disabled",true).addClass("btn-danger");
        },
            success:function(data){
            setTimeout(()=>{
            $("#server-response").html(data);
            $(".__loadingBtn__").html('<?php echo $lang['login'];?><i id="icon-arrow" class="bx bx-right-arrow-alt"></i>').attr("disabled",false).removeClass("btn-danger");
                        },2000);
                    }
                })
            })
        })
    </script>
    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>