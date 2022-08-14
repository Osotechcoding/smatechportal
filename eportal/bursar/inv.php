<?php 
require_once "helpers/helper.php";
 ?>
<!DOCTYPE html>

<html class="loading" lang="en" data-textdirection="ltr">
  <!-- BEGIN: Head-->
<head>
    <?php include "../template/MetaTag.php";?>
    <title><?php echo $lang['Dashboard'] ?> || <?php echo $lang['webtitle'] ?></title>
   <!-- include template/HeaderLink.php -->
   <?php include "../template/HeaderLink.php";?>
  <!-- END: Head-->
  <!-- BEGIN: Body-->
  <body class="vertical-layout vertical-menu-modern semi-dark-layout 2-columns  navbar-sticky footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="2-columns" data-layout="semi-dark-layout">
    <!-- BEGIN: Header-->
    <?php include "template/HeaderNav.php"; ?>
    <!-- include headernav.php -->
    <!-- END: Header-->
    <!-- BEGIN: Main Menu-->
    <?php include "template/Sidebar.php";?>
    <!-- include Sidebar.php -->
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <!-- BEGIN: Content-->
    <div class="app-content content">
      <div class="content-overlay"></div>
      <div class="content-wrapper">
        <div class="content-header row">
          <div class="content-header-left col-12 mb-2 mt-1">
            <div class="breadcrumbs-top">
              <h5 class="content-header-title float-left pr-1 mb-0">VISAP PORTAL</h5>
              <div class="breadcrumb-wrapper d-none d-sm-block">
                <ol class="breadcrumb p-0 mb-0 pl-1">
                  <li class="breadcrumb-item"><a href="./"><i class="bx bx-home-alt"></i></a>
                  </li>
                  <li class="breadcrumb-item"><a href="#">Current User</a>
                  </li>
                  <li class="breadcrumb-item active">Current Page Title
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="content-body">
    <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">

                        <div class="card mt-3">
                            <div class="card-header"> Invoice <strong>01/01/01/2018</strong> <span class="float-end">
                                    <strong>Status:</strong> Pending</span> </div>
                            <div class="card-body">
                                <div class="row mb-5">
                                    <div class="mt-4 col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                        <h6>From:</h6>
                                        <div> <strong>Webz Poland</strong> </div>
                                        <div>Madalinskiego 8</div>
                                        <div>#8901 Marmora Road Chi Minh City</div>
                                        <div>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="30595e565f705548515d405c551e535f5d">[email&#160;protected]</a></div>
                                        <div>Phone: +01 123 456 7890</div>
                                    </div>
                                    <div class="mt-4 col-xl-6 text-end col-lg-6 col-md-6 col-sm-12">
                                        <h6>To:</h6>
                                        <div> <strong>Bob Mart</strong> </div>
                                        <div>Attn: Daniel Marek</div>
                                        <div>#8901 Marmora Road Chi Minh City</div>
                                        <div>Email: <a href="/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="5c35323a331c39243d312c3039723f3331">[email&#160;protected]</a></div>
                                        <div>Phone: +02 987 654 3210</div>
                                    </div>
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="center">#</th>
                                                <th>Fees Type</th>
                                                <th>Frequency</th>
                                                <th class="right">Invoice number</th>
                                                <th class="center">Date</th>
                                                <th class="right">Amount</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="center">1</td>
                                                <td class="left strong">Annual Fees</td>
                                                <td class="left">Monthly</td>
                                                <td class="right">#54620</td>
                                                <td class="center">8 August 2022</td>
                                                <td class="right">$999,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">2</td>
                                                <td class="left">Annual Fees</td>
                                                <td class="left">Yearly</td>
                                                <td class="right">#54310</td>
                                                <td class="center">7 August 2022</td>
                                                <td class="right">$3.000,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">3</td>
                                                <td class="left">Tuition Fees</td>
                                                <td class="left">Monthly</td>
                                                <td class="right">#24315</td>
                                                <td class="center">6 August 2022</td>
                                                <td class="right">$499,00</td>
                                            </tr>
                                            <tr>
                                                <td class="center">4</td>
                                                <td class="left">Tuition Fees</td>
                                                <td class="left">Yearly</td>
                                                <td class="right">#32541</td>
                                                <td class="center">5 August 2022</td>
                                                <td class="right">$3.999,00</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 col-sm-5"> </div>
                                    <div class="col-lg-4 col-sm-5 ms-auto">
                                        <table class="table table-clear">
                                            <tbody>
                                                <tr>
                                                    <td class="left"><strong>Subtotal</strong></td>
                                                    <td class="right">$8.497,00</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>Discount (20%)</strong></td>
                                                    <td class="right">$1,699,40</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>VAT (10%)</strong></td>
                                                    <td class="right">$679,76</td>
                                                </tr>
                                                <tr>
                                                    <td class="left"><strong>Total</strong></td>
                                                    <td class="right"><strong>$7.477,36</strong></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-12 text-end">
                                        <button class="btn btn-primary" type="submit"> Proceed to payment </button>
                                        <button onclick="javascript:window.print();" class="btn btn-light" type="button"> <i class="fas fa-print"></i> Print </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
            </div>

        </div>
      </div>
    </div>
    <!-- END: Content-->
   
    </div>
    <!-- demo chat-->
  
   <!--  -->
   <?php include "../template/footer.php"; ?>
    <!-- END: Footer-->

    <!-- BEGIN: Vendor JS-->
    <?php include "../template/FooterScript.php"; ?>
     <!-- BEGIN: Page JS-->
    <script src="../app-assets/js/scripts/pickers/dateTime/pick-a-datetime.min.js"></script>
    <!-- END: Page JS-->

    <!-- END: Page JS-->
  </body>
  <!-- END: Body-->
</html>