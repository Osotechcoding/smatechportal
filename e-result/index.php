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
      <?php 
      include_once "Templates/Head.php";
      ?>
    </head>
    <body id="page-top">
        <!-- Navigation-->
      <?php 
      include_once "Templates/HeadNavBar.php";
      ?>
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
<div class="mb-2">
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
        <?php 
       include_once("Templates/footer.php");
       ?>
      
        <!-- jquery  -->
       <?php 
       include_once("Templates/FooterScript.php");
       ?>
        <script>
  $(document).ready(function() {
    const CHECK_RESULT_FORM = $("#checkResultForm");
    CHECK_RESULT_FORM.on("submit", function(e) {
      e.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Please wait...').attr("disabled",
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
