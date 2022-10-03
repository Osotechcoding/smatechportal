<?php
@ob_start();
if (!file_exists("src/Osotech.php")) {
  die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once("src/Osotech.php");
//require_once ("src/Database.php");
require_once("src/StudentResult.php");
$Osotech = new Osotech();
$Osotech->osotech_session_kick();
$schoolSesDetail = $Osotech->get_school_session_info();
$StudentResult = new StudentResult();
date_default_timezone_set("Africa/Lagos"); ?>
<?php if ($StudentResult->checkResultPortalStatus() === true) : ?>
<?php header("Location: ../");
  exit(); ?>
<?php endif ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title> Online Result Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
  <?php include_once("Templates/Head.php"); ?>
  <style>
  .osotech-bg-color {
    background: lightgrey !important;
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
  <div class="container mt-2">
    <?php include_once 'Templates/HeadNavBar.php'; ?>
    <!-- <div class="accordion mt-1" id="accordionExample">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne"
            aria-expanded="true" aria-controls="collapseOne">
            <span class="text-danger m-1 ml-2 py-2"> Click here </span> to read the Instruction on how to check your
            online result
          </button>
        </h2>
         <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
          data-bs-parent="#accordionExample">
          <div class="accordion-body text-left">
            <h2 class="text-center text-danger">To check your result, Please, follow the instructions below:</h2>
            <p class="text-center mb-2 text-warning"><strong class="text-danger">STEP ONE :: </strong> Carefully scratch
              off the covered area of your scratch card to unveil your secret PIN Number</p>
            <p class="text-center mb-2 text-warning"><strong class="text-danger">STEP TWO :: </strong> Enter Your
              Admission Number in the space provided</p>
            <p class="text-center mb-2 text-warning"><strong class="text-danger">STEP THREE :: </strong> Choose
              Examination Result Class from the list</p>
            <p class="text-center mb-2 text-warning"><strong class="text-danger">STEP FOUR :: </strong> Select Result
              Session from the list</p>
            <p class="text-center mb-2 text-warning"> <strong class="text-danger">STEP FIVE :: </strong> Choose your
              Result Term (1st,2nd or 3rd)</p>
            <p class="text-center mb-2 text-warning"><strong class="text-danger">STEP SIX :: </strong>Enter the PIN
              Number in your scratch card correctly</p>
            <p class="text-center mb-2 text-warning"> <strong class="text-danger">STEP SEVEN :: </strong> Enter your
              scratch card SERIAL Number.</p>
            <p class="text-center mb-2 text-warning"> <strong class="text-danger">STEP EIGHT :: </strong> Finaly, Click
              check result Button and wait for your result to display.</p>
          </div>
          <p class="text-success m-3"> Scratch Cards are available at the school Premises or contact the Admin on <a
              href="tel:<?php //echo ($Osotech->getConfigData()->school_phone); 
                        ?>"
              title="Call Admin on <?php //echo ($Osotech->getConfigData()->school_phone); 
                                    ?>">Click Here</a></p>
        </div> 
      </div>
    </div>-->

    <div class="col-md-12">
      <section class="h-100 bg-white">
        <div class="container py-2 h-60">
          <div class="col-md-12 text-center mb-3">
            <h2 class="text-danger blinking"><span class="blinking">Public Notice!</span> </h2>
            <h5 class="blinking"><span><?php echo strtoupper(($schoolSesDetail->session_desc_name)) ?> <?php switch ($schoolSesDetail->term_desc) {
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
                <?php echo $report_type; ?> is Now Out.</span>
            </h5>
          </div>
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-3">
                <div class="row g-0">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-1 text-uppercase text-center text-info">Use the form below to Check your Termly
                        Result </h3>

                      <div class="text-center mb-1" id="server-response">
                      </div>
                      <form id="checkResultForm">
                        <div class="row">
                          <input type="hidden" name="action" value="check_student_result_now">
                          <input type="hidden" name="osotech_csrf"
                            value="<?php echo md5('iremideoizasamsonosotech12345'); ?>">
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
                              <label for="student_reg_number" class="form-label">Admission No</label>
                              <input type="text" id="student_reg_number" autocomplete="off" name="student_reg_number"
                                class="form-control form-control-lg" placeholder="Enter your admission number">
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
                              <label for="result_class" class="form-label"> Result Class</label>
                              <select class="custom-select form-control form-control-lg" id="result_class"
                                name="result_class">
                                <option value="" selected>Choose...</option>
                                <?php echo $Osotech->get_classroom_InDropDown_list() ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
                              <label for="result_session" class="form-label"> Result Session</label>
                              <select class="custom-select form-control form-control-lg" id="result_session"
                                name="result_session">
                                <option value="" selected>Choose...</option>
                                <?php echo $Osotech->get_all_session_lists() ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
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
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
                              <label for="cardPin_" class="form-label">Scratch Card Pin</label>
                              <input type="password" autocomplete="off" name="cardPin_"
                                class="form-control form-control-lg" placeholder="**********" id="cardPin_">
                            </div>
                          </div>
                          <div class="col-md-6 mb-4">
                            <div class="form-group">
                              <label for="cardSerial_" class="form-label">Card Serial</label>
                              <input type="text" autocomplete="off" name="cardSerial_" id="cardSerial_"
                                class="form-control form-control-lg" placeholder="**********">
                            </div>
                          </div>
                        </div>
                        <button type="submit" class="btn btn-dark btn-lg btn-round mb-2 __loadingBtn__"
                          style="float:right"> Check Result </button>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    </section>
  </div>
  <!-- Footer -->
  <?php
  if (file_exists("Templates/footer.php")) {
    include_once("Templates/footer.php");
  }
  ?>
  <!-- Footer -->
  </div>
  <?php include_once("Templates/FooterScript.php"); ?>
  <script>
  $(document).ready(function() {

    const CHECK_RESULT_FORM = $("#checkResultForm");
    CHECK_RESULT_FORM.on("submit", function(event) {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",
        true);
      $.post("./src/actions", CHECK_RESULT_FORM.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Check Result').attr("disabled", false);
          $("#server-response").html(result);
          setTimeout(() => {
            $("#server-response").html('');
          }, 5000);
        }, 1500);
      })
    });

  })
  </script>
</body>

</html>