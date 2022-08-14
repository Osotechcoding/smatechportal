<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include ("../template/MetaTag.php"); ?>
    <title>Error 404 - <?php echo $SmappDetails->school_name ?></title>
    <link rel="apple-touch-icon" href="../app-assets/images/ico/apple-icon-120.html">
    <link rel="shortcut icon" type="image/x-icon" href="../app-assets/images/ico/favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,600%7CIBM+Plex+Sans:300,400,500,600,700" rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/vendors/css/vendors.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/colors.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/components.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/dark-layout.min.css">
    <link rel="stylesheet" type="text/css" href="../app-assets/css/themes/semi-dark-layout.min.css">
    <!-- END: Theme CSS-->

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="../app-assets/css/core/menu/menu-types/vertical-menu.min.css">
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
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
        <div class="content-body"><!-- error 404 -->
<section class="row flexbox-container">
  <div class="col-xl-6 col-md-7 col-9">
    <div class="card bg-transparent shadow-none">
      <div class="card-body text-center bg-transparent">
        <h1 class="error-title"><?php echo $lang['page_not_found'] ?> :(</h1>
        <h3 class="pb-3"><?php echo $lang['page_not_found_msg'] ?> </h3>
        <img class="img-fluid" src="../app-assets/images/pages/404.png" alt="404 error">
        <a href="index" class="btn btn-primary round glow mt-3"><?php echo strtoupper($lang['back-to-home']) ?></a>
      </div>
    </div>
  </div>
</section>
<!-- error 404 end -->

        </div>
      </div>
    </div>
    <!-- END: Content-->


    <!-- BEGIN: Vendor JS-->
    <script src="../app-assets/vendors/js/vendors.min.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.tools.min.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.defaults.min.js"></script>
    <script src="../app-assets/fonts/LivIconsEvo/js/LivIconsEvo.min.js"></script>
    <!-- BEGIN Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="../app-assets/js/scripts/configs/vertical-menu-dark.min.js"></script>
    <script src="../app-assets/js/core/app-menu.min.js"></script>
    <script src="../app-assets/js/core/app.min.js"></script>
    <script src="../app-assets/js/scripts/components.min.js"></script>
    <script src="../app-assets/js/scripts/footer.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>