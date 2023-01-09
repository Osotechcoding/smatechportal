<?php
if (!file_exists("src/Osotech.php")) {
  die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once("src/Osotech.php");
require_once("src/StudentResult.php");
$Osotech = new Osotech();
$Osotech->osotech_session_kick();
$schoolSesDetail = $Osotech->get_school_session_info();
$StudentResult = new StudentResult();
date_default_timezone_set("Africa/Lagos");
if ($StudentResult->checkResultPortalStatus() === true) {
  header("Location: ../");
  exit();
} ?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include_once "Templates/MetaTags.php";?>
        <title> Result Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>

        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />
        <style>
            img{
                width: 50px;
                height: auto;
                border-radius: 50%;
                margin-right: 10px;
            }
            .fet-card{
                background-color: whitesmoke;
                padding: 10px; border-radius: 18px;
                 color: black;
        box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
        -webkit-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
        -moz-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
            }
             .fet-card p {
                font-size: 18px !important;
                color:orangered;
               text-shadow: -1px -1px 1px rgba(0,0,0,0.6);
               border: 3px solid darkgreen;
               border-radius: 10px 25px !important;
               padding: 5px;
             }
             .fet-text{
                font-size: 28px !important;
               text-shadow: -2px -2px 2px rgba(0,0,0,0.6);
               border-radius: 15px !important;
               padding: 5px;
             }
             a{
                text-decoration: none;
                color:orange;
             }
             a:hover{
                color:orangered;
                transition: 0.2ms ease-out;
             }
            form input, select {
                border-radius: 20px 0px 20px 0px !important;
                height: 50px;
                border: 2px solid orangered;
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
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
            <div class="container px-4">
                <a class="navbar-brand" href="<?php echo APP_ROOT; ?>"><img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" class="brand-logo img-fluid" alt="logo"> <?php echo ($Osotech->getConfigData()->school_name); ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item"><a class="nav-link" href="<?php echo APP_ROOT; ?>" target="_blank">HOME</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo EPORTAL_ROOT; ?>" target="_blank"> E-PORTAL</a></li>
                        <li class="nav-item"> <a onclick="return confirm('Are you sure you anto to logout?');"
      href="logout?action=logout&student=cstudent"><button class="btn btn-dark" type="button"
        style="color: #fff;">Logout</button></a> </li>
                    </ul>
                </div>
            </div>
        </nav>
   
        <section class="bg-light" id="Result">
            <div class="container px-2">
                <div class="">
                <h1 class="fw-bolder text-center">Welcome to  <a href="<?php echo EPORTAL_ROOT; ?>">Student</a> Result Checker Portal</h1>
               
                <h2 class="text-danger text-center fw-bolder"><span class="blinking">Public Notice!</span> </h2>
                <p class="fet-text text-center blinking"><span><?php echo strtoupper(($schoolSesDetail->session_desc_name)) ?>
             <?php switch ($schoolSesDetail->term_desc) {
                case '1st Term':
                  $report_type = 'First Term Academic Result';
                  break;
                case '2nd Term':
                  $report_type = 'Second Term Academic Result';
                  break;
                default:
                  $report_type = 'Promotion Academic Result';
                  break;
                   } ?>
                <?php echo $report_type; ?> is Now Out!!!</span></p>
            </h5>
            <h4 class="text-info text-center fw-bolder"> You can now check your result. Scratch Cards are available at the school Premises or contact. <a
                href="tel:<?php echo ($Osotech->getConfigData()->school_phone); 
                        ?>" title="Call Admin on <?php echo ($Osotech->getConfigData()->school_phone); 
                        ?>">Admin</a></h4>
                <hr>
                <div class="row gx-4 justify-content-center">
                   <div class="col-lg-6 mb-4">
                       <div class="container">
                        <div class="card fet-card">
                        <div class="card-header">
                        <h5 class="text-center fet-text">To check your result, follow the instruction below.</h5>
                            </div>
                            <div class="card-body">
                                <p>Step 1: <span>Carefully scratch off the covered area of your scratch card to unveil your secret PIN Number</span></p>
                                <p>Enter Your Admission Number in the space provided</p>
                                <p>Choose Examination Result Class from the list</p>
                                <p>Select Result Session from the list</p>
                                <p>Choose your Result Term (e.g 1st, 2nd or 3rd) Term</p>
                                <p>Enter the PIN Number in your scratch card correctly</p>
                                <p>Enter your scratch card SERIAL Number.</p>
                                <p>Finally, Click  check result Button and wait for your result to display.</p>
                            </div>
                        </div>
                      </div>
                    </div>
               
                     <div class="col-lg-6">
                       
                       <div class="container">
                         <div class="card fw-bolder fet-card">
                            <div class="card-header">
                            <h5 class="fet-text py-3 text-center">Check your Result</h5>
                            <div class="text-center mb-1" id="server-response">
                      </div>
                            </div>
                            <div class="card-body">
    <form id="checkResultForm">
    <input type="hidden" name="action" value="check_student_result_now">
                          <input type="hidden" name="osotech_csrf"
                            value="<?php echo md5('iremideoizasamsonosotech12345'); ?>">
  <div class="mb-3">
  <label for="student_reg_number" class="form-label">Admission No</label>
<input type="text" id="student_reg_number" autocomplete="off" name="student_reg_number" class="form-control form-control-lg" placeholder="Enter your admission number">
  </div>
  <div class="mb-3">
  <label for="result_class" class="form-label"> Result Class</label>
    <select class="custom-select form-control form-control-lg" id="result_class" name="result_class">
        <option value="" selected>Choose...</option>
    <?php echo $Osotech->get_classroom_InDropDown_list() ?>
        </select>
  </div>
  <div class="row">
      <div class="mb-3 col-md-6">
      <label for="result_session" class="form-label"> Result Session</label>
    <select class="custom-select form-control form-control-lg" id="result_session" name="result_session">
     <option value="" selected>Choose...</option>
    <?php echo $Osotech->get_all_session_lists() ?>
            </select>
  </div>

  <div class="mb-3 col-md-6">
  <label for="result_term" class="form-label"> Result Term</label>
     <select class="custom-select form-control form-control-lg" id="result_term"
    name="result_term">
    <option value="" selected>Choose Term...</option>
    <option value="1st Term">1st Term</option>
    <option value="2nd Term">2nd Term</option>
    <option value="3rd Term">3rd Term</option>
        </select>
  </div>
  </div>
  <div class="mb-2">
  <label for="cardPin_" class="form-label">Scratch Card Pin</label>
   <input type="password" autocomplete="off" name="cardPin_"
    class="form-control form-control-lg" placeholder="**********" id="cardPin_">
  </div>
  <div class="mb-2">
  <label for="cardSerial_" class="form-label">Card Serial</label>
     <input type="text" autocomplete="off" name="cardSerial_" id="cardSerial_"
    class="form-control form-control-lg" placeholder="**********">
  </div>
<div class="mt-4">
    <button type="submit" class="btn btn-dark btn-lg btn-block btn-round mb-2 __loadingBtn__" style="width:100%;">Check Result</button> 
</div>
 
</form>
     </div>
    
                      </div>
</div>


                    </div>
                </div>
            </div>
        </section>
        <!-- Contact section-->
        
        <!-- Footer-->
        <footer class="py-5 bg-dark">
            <div class="container px-4"><p class="m-0 text-center text-white">&copy; <script>
      document.write(new Date().getFullYear());
    </script> Alright Reserved || <?php echo ($Osotech->getConfigData()->school_name); ?> <span class="st-icon-pandora float-end" style="color:yellow;">Powered By: <b style="color:#f00"><?php echo __OSOTECH__DEV_COMPANY__; ?></b> </span></p> </div>
        </footer>
        <!-- jquery  -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
        <!-- <script src="assets/js/jquery-3.6.0.min.js" charset="utf-8"></script> -->
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="assets/js/scripts.js"></script>
        <script>
  $(document).ready(function() {
    const CHECK_RESULT_FORM = $("#checkResultForm");
    CHECK_RESULT_FORM.on("submit", function(e) {
      e.preventDefault();
      $(".__loadingBtn__").html('<img src="./rolling.svg" width="20"> Please wait...').attr("disabled",
        true);
      $.post("./src/actions", CHECK_RESULT_FORM.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Check Result').attr("disabled", false);
          $("#server-response").html(result);
          setTimeout(() => {
            $("#server-response").html('');
          }, 5000);
        }, 1500);
      });
    });

  });
  </script>
    </body>
</html>
