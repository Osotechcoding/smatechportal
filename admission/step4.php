<?php
@session_start();

@ob_start();
if (!file_exists("Includes/Osotech.php")) {
  die("Access to this Page is Denied! <p>Please Contact the school Admin for assistance</p>");
}
require_once("Includes/Osotech.php");
//require_once ("Includes/Database.php");
$Osotech->osotech_session_kick();
?>
<?php if ($Osotech->checkAdmissionPortalStatus() !== true) : ?>
<?php header("Location:" . APP_ROOT);
  exit(); ?>
<?php endif ?>

<?php

if (isset($_SESSION['AUTH_SMATECH_APPLICANT_ID']) && !empty($_SESSION['AUTH_SMATECH_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_SMATECH_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
} else {
  header("Location: ./step3");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo ($Osotech->getConfigData()->school_name); ?>:: Student Online Registration Portal</title>
  <?php include_once("Head.php"); ?>
</head>

<body style="background:rgba(0, 0, 0, 0.4) url('schoolbg.jpg');
background-position:center;
background-size: cover;
background-repeat: no-repeat;">
  <div class="container mt-2">
    <?php include_once 'HeadNavBar.php'; ?>
    <br>
    <div class="col-md-12">
      <section class="h-100 bg-white">
        <div class="container py-2 h-60">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card card-registration my-4 osotech-bg-color">
                <div class="row g-0">
                  <div class="col-xl-12 col-md-12 mb-3">
                    <div class="card-body p-md-5 text-black">
                      <h3 class="mb-5 text-uppercase text-center text-black">Admission Form (Previous School
                        Information)</h3>
                      <div class="text-center" id="server-response">
                      </div>
                      <form id="fourthStepForm">
                        <div class="row">
                          <input type="hidden" name="osotech_csrf"
                            value="<?php echo md5('iremideoizasamsonosotech'); ?>">
                          <input type="hidden" name="action" value="submit_fourth_step_admission">
                          <input type="hidden" name="admission_no"
                            value="<?php echo strtoupper($student_data->stdRegNo); ?>">
                          <input type="hidden" name="auth_code_applicant_id"
                            value="<?php echo $auth_code_applicant_id; ?>">
                          <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" value="<?php echo $student_data->stdEmail; ?>"
                                readonly>
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <input type="text" class="form-control" name="surname"
                                value="<?php echo ucwords($student_data->stdUserName); ?>" readonly>
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <span id="email-error"></span>
                            <div class="form-group">
                              <input type="text" class="form-control"
                                value="<?php echo ucwords($student_data->studentClass); ?>" readonly>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>School Name</label>
                              <input type="text" autocomplete="off" class="form-control" name="prev_schoolname"
                                placeholder="Name of your Previous school">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Name of Director/Proprietress</label>
                              <input type="text" autocomplete="off" class="form-control" name="proprietress"
                                placeholder="e.g Mr. Ayomide Hamad">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Previous School Phone </label>
                              <input type="text" autocomplete="off" class="form-control" name="prev_schl_phone"
                                placeholder="Previous School Phone">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="prev_schl_loca">SCHOOL LOCATION</label>
                              <select name="prev_schl_loca" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Urban">Urban</option>
                                <option value="Rural">Rural </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="edu_offered">LEVEL OF EDUCATION OFFERED </label>
                              <select name="edu_offered" id="edu_offered" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="PRIMARY ONLY">PRIMARY ONLY</option>
                                <option value="SECONDARY ONLY"> SECONDARY ONLY</option>
                                <option value="PRIMARY &amp; SECONDARY">PRIMARY &amp; SECONDARY</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="category">SCHOOL CATEGORY </label>
                              <select name="category" id="category" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="PUBLIC">PUBLIC</option>
                                <option value="PRIVATE">PRIVATE</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>YOUR PRESENT CLASS </label>
                              <input type="text" autocomplete="off" class="form-control" name="present_class"
                                placeholder="Enter Your Present Class here">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>REASON FOR CHANGE OF SCHOOL </label>
                              <input type="text" autocomplete="off" name="reason_to" class="form-control" />
                            </div>
                          </div>

                          <!-- <div class="col-md-6 mb-3">
                         <div class="form-group">
                             <label for="report_sheet">LAST REPORT SHEET <span class="text-danger">(Scanned)</span> </label>
                             <input type="file" class="form-control-file form-control" id="report_sheet" name="report_sheet">
                         </div>
                     </div> -->
                        </div>
                        <div style="float: left; margin-top:10px;"><a
                            href="step3?applicant=<?php echo $Osotech->saltifyString($_GET['applicant']) ?>&page=3"
                            class="btn-shop green-color"
                            onclick="return confirm('Are you Sure you want to go Back to Previous page?');"><button
                              type="button" name="button" class="btn btn-secondary btn-md mt-2"> Previous
                              Page</button></a></div>
                        <button type="submit" class="btn btn-dark btn-lg btn-round mb-5 __loadingBtn__ mt-5"
                          style="float:right">Continue Registration</button>
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
    <!-- Footer -->
    <?php
    if (file_exists("./footer.php")) {
      include_once("./footer.php");
    }
    ?>
    <!-- Footer -->
  </div>

  </div>
  <?php include_once("FooterScript.php"); ?>
  <script>
  $(document).ready(function() {
    const ADMISSION_FORM4_SUBMIT = $("#fourthStepForm");
    ADMISSION_FORM4_SUBMIT.on("submit", function(event) {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",
        true);
      $.post("Includes/actions", ADMISSION_FORM4_SUBMIT.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Continue Registration').attr("disabled", false);
          $("#server-response").html(result);
        }, 1500);
      })
    })
  })
  </script>
</body>

</html>