<?php
ob_start();
if (!file_exists("src/Osotech.php")) {
    die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once("src/Osotech.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once("Templates/MetaTags.php"); ?>
  <!-- meta tag -->
  <title>E-Result Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
  <?php include("Templates/HeaderScript.php"); ?>
  <style>
  ul li.emp {
    list-style: numbering;
    font-weight: 500;
    font-size: 1.5rem;
    line-height: inherit;
  }

  .blinking {
    animation: blinkingText 3.5s infinite;
  }

  @keyframes blinkingText {
    0% {
      color: #f00;
    }

    49% {
      color: #f00;
    }

    60% {
      color: transparent;
    }

    99% {
      color: transparent;
    }

    100% {
      color: #2CA67A;
    }
  }
  </style>
</head>

<body style="background:rgba(0, 0, 0, 0.4) url('schoolbg.jpg');
background-position:center;
background-size: cover;
background-repeat: no-repeat;">

  <!--Preloader area start here-->
  <?php include_once("Templates/Preloader.php"); ?>
  <!--Preloader area End here-->

  <!-- Main content Start -->
  <div class="main-content">
    <!--Full width header Start-->
    <div class="full-width-header home8-style4 main-home">
      <!--Header Start-->
      <header id="rs-header" class="rs-header">
        <!-- Menu Start -->
        <?php //include_once ("Templates/Header.php");
                ?>
        <!-- Canvas Menu end -->
      </header>
      <!--Header End-->
    </div>
    <!--Full width header End-->

    <!-- Main content Start -->
    <div class="main-content">
      <!-- Breadcrumbs Start -->
      <div class="rs-breadcrumbs breadcrumbs-overlay">
        <div class="breadcrumbs-img">
          <img src="../assets/images/breadcrumbs/2.jpg" alt="Breadcrumbs Image">
        </div>
        <div class="breadcrumbs-text white-color">
          <h1 class="page-title"><?php echo strtoupper("Student E-result Portal") ?></h1>
          <ul>
            <li>
              <a class="active" href="../">Home</a>
            </li>
            <li>Check Your Result Online</li>
          </ul>
        </div>
      </div>
      <!-- Breadcrumbs End -->

      <!-- Checkout section start -->
      <div id="rs-checkout" class="rs-checkout orange-color pt-100 pb-100 md-pt-70 md-pb-70">

        <div class="container">
          <div class="coupon-toggle">
            <div id="accordion" class="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <div class="card-title">
                    <span style="font-size: 20px;"><i class="fa fa-window-maximize"></i> <button
                        class="accordion-toggle" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne" style="text-decoration: none;color: red;"> Click here</button> to
                      read the Instruction on how to check your online result?</span>

                  </div>
                </div>

                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <div class="col-md-12 mb-4">
                      <div class="section-tittle">

                        <!-- You can now check your result online. -->
                        <h2>To check your result, Please, follow the instructions below:</h2>
                        <ul style="font-weight: bold;" class="text-danger">
                          <em>
                            <li class="emp">Carefully scratch off the covered area of your scratch card to unveil your
                              secret PIN Number</li>
                            <li class="emp">Enter Your Admission Number in the space provided</li>
                            <li class="emp">Choose Examination Result Class from the list</li>
                            <li class="emp">Select Result Session from the list</li>
                            <li class="emp">Choose your Result Term (1st,2nd or 3rd)</li>
                            <li class="emp">Enter the PIN Number in your scratch card correctly</li>
                            <li class="emp">Enter your scratch card SERIAL Number</li>
                            <li class="emp">Finaly, Click check result Button and wait for your result to display.</li>
                          </em>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="full-grid">
            <h2 class="text-danger blinking"><span class="blinking">Public Notice!</span> </h2>
            <h5 class="blinking"><span>2021/2022 Academic Promotion Report Sheet is Now Out.</span>
            </h5>
            <h4> You can now check your result. Scratch Cards are available at the school Premises or contact. <a
                href="tel:08131374443" title="Call Admin on 08131374443">Admin</a></h4>

            <form id="student_result_checker_form">
              <div class="col-md-12 text-center" id="response"></div>
              <div class="billing-fields">
                <div class="form-content-box">
                  <div class="row">
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Admission No*</label>
                        <input autocomplete="off" name="student_reg_number" class="form-control-mod" type="text"
                          placeholder="e.g 2022C243140001">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Result Class *</label>
                        <select class="form-control-md" name="result_class">
                          <option value="" selected>Choose...</option>
                          <?php echo $Osotech->get_classroom_InDropDown_list(); ?>
                        </select>
                      </div>
                    </div>

                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Result Session *</label>
                        <select class="form-control-md" name="result_session">
                          <option value="" selected>Choose...</option>
                          <?php echo $Osotech->get_all_session_lists(); ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Result Term *</label>
                        <select class="form-control-md" name="result_term">
                          <option value="" selected>Choose Term</option>
                          <option value="1st Term">1st Term</option>
                          <option value="2nd Term">2nd Term</option>
                          <option value="3rd Term">3rd Term</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Scratch Pin *</label>
                        <input autocomplete="off" name="cardPin_" class="form-control-mod" type="password"
                          placeholder="***********">
                      </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-xs-12">
                      <div class="form-group">
                        <label>Scratch Serial *</label>
                        <input autocomplete="off" name="cardSerial_" class="form-control-mod" type="text"
                          placeholder="e.g 465343321">
                      </div>
                    </div>
                  </div>
                </div>
                <input type="hidden" name="action" value="check_Student_Result">
                <button class="btn-shop orange-color float-right __loadingBtn__" type="submit">Check Result</button>
              </div>
              <!-- .billing-fields -->
            </form>
          </div>
        </div>
      </div>
      <!-- Checkout section end -->
    </div>
    <!-- Main content End -->
    <!-- Footer Start -->
    <footer id="rs-footer" class="rs-footer home9-style main-home">
      <?php include_once("Templates/Footer.php"); ?>
    </footer>
    <!-- Footer End -->
    <!-- Search Modal Start -->
    <?php include_once("Templates/SearchBar.php") ?>
    <!-- Search Modal End -->
    <?php include_once("Templates/FooterScript.php") ?>
    <script>
    $(document).ready(function() {
      $("#student_result_checker_form").on("submit", function(event) {
        $(".__loadingBtn__").html('<img src="../rolling_loader.svg" width="30"> Processing...').attr("disabled",
          true);
        //send request
        event.preventDefault();
        const checkResultForm = $(this).serialize();
        $.post("../Inc/checkStudentResult", checkResultForm, function(data) {
          setTimeout(function() {
            //popWindow();
            $("#response").html(data);
            $(".__loadingBtn__").html('Check Result').attr("disabled", false);
            setTimeout(() => {
              $("#student_result_checker_form")[0].reset();
              $(".alert").alert('close').slideUp('slow');
            }, 3000);
          }, 1000);
        })

      });

    });
    </script>
</body>

</html>