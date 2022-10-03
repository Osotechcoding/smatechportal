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
  header("Location: ./");
  exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title><?php echo ($Osotech->getConfigData()->school_name); ?>:: Student Online Registration Portal</title>
  <?php include_once("Head.php"); ?>
</head>

<body>
  <div class="container mt-2">
    <?php include_once 'HeadNavBar.php'; ?>
    <br>
    <div class="col-md-12">
      <section class="h-100 bg-white">
        <div class="container py-2 h-60">
          <div class="row d-flex justify-content-center align-items-center h-70">
            <div class="col">
              <div class="card card-registration my-4 osotech-bg-color">
                <div class="row g-0">
                  <div class="col-xl-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card-body p-md-3 text-black">
                      <h3 class="mb-5 text-uppercase text-center text-black">Admission Form (STUDENT BIO-DATA)</h3>
                      <form id="secondStepForm">
                        <div class="text-center" id="server-response"></div>
                        <div class="row">
                          <input type="hidden" name="osotech_csrf"
                            value="<?php echo md5('iremideoizasamsonosotech'); ?>">
                          <input type="hidden" name="action" value="submit_second_step_admission">
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
                              <label for="first_name" class="form-label">First Name</label>
                              <input type="text" autocomplete="off" id="first_name" name="first_name"
                                class="form-control form-control-lg" placeholder="First Name">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <span id="phone-error"></span>
                            <div class="form-group">
                              <label for="middle_name" class="form-label">Middle Name</label>
                              <input type="text" autocomplete="off" name="middle_name"
                                class="form-control form-control-lg" placeholder="Middle Name" id="middle_name">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="dateofbirth">Date of Birth </label>
                              <input type="date" name="dateofbirth" class="form-control" min="2000-12-31"
                                id="dateofbirth">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="gender">Gender </label>
                              <select class="custom-select form-control" id="gender" name="gender">
                                <option value="">Choose...</option>
                                <option value="Male">Male </option>
                                <option value="Female">Female</option>
                                <option value="Others">Others</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="birth_cert">Birth Certification </label>
                              <select name="birth_cert" id="birth_cert" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Certificate">Certificate</option>
                                <option value="Affidavit">Affidavit </option>
                                <option value="None">None </option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="nationality">NATIONALITY</label>
                              <select name="nationality" id="nationality" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Nigerian">Nigerian</option>
                                <option value="Non Nigerian">Non Nigerian </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="state_origin">STATE OF ORIGIN</label>
                              <select name="state_origin" id="state_origin" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <?php echo $Osotech->get_states_of_origin_InDropDown(); ?>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="localgovt">LGA OF ORIGIN</label>
                              <select name="localgovt" id="localgovt" class="custom-select form-control"
                                required></select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="hometown">Home Town</label>
                              <input type="text" name="hometown" class="form-control" id="hometown"
                                placeholder="Home town">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="religion">RELIGION</label>
                              <select name="religion" id="religion" class="custom-select form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Christianity">Christianity</option>
                                <option value="Islamic">Islamic </option>
                                <option value="Other"> Other </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <label for="home_address">Home Address </label>
                              <textarea name="home_address" class="form-control" placeholder="Home Address"></textarea>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="challenges">CHALLENGES THAT IMPACT ABILITY</label>
                              <select name="challenges" id="challenges" class="select2 form-control">
                                <option value="" selected>Choose...</option>
                                <option value="Visually Challenged">Visually Challenged</option>
                                <option value="Albinism">Albinism</option>
                                <option value="Learning Disabilities">Learning Disabilities</option>
                                <option value="Intellectually Challenged">Intellectually Challenged</option>
                                <option value="Auditory Challenged">Hearing/Auditory Challenged</option>
                                <option value="Behavioural Disorder">Behavioural Disorder</option>
                                <option value="Speech Challenged">Speech Challenged</option>
                                <option value="Other">Other</option>
                                <option value="None">None</option>
                              </select>
                            </div>
                          </div>
                        </div>

                        <button type="submit" class="btn btn-dark btn-lg btn-round mb-2 __loadingBtn__"
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
    const ADMISSION_FORM2_SUBMIT = $("#secondStepForm");
    ADMISSION_FORM2_SUBMIT.on("submit", function(event) {
      event.preventDefault();
      $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Processing...').attr("disabled",
        true);
      $.post("./Includes/actions", ADMISSION_FORM2_SUBMIT.serialize(), function(result) {
        setTimeout(() => {
          $(".__loadingBtn__").html('Continue Registration').attr("disabled", false);
          $("#server-response").html(result);
        }, 1000);
      })
    });

    $('#state_origin').on('change', function() {
      let state_name = $(this).val();
      if (state_name != '') {
        let osotech_csrf = '<?php echo md5('iremideoizasamsonosotech'); ?>';
        let myaction = "fetch_local_govt";
        $.post('Includes/actions', {
          action: myaction,
          state_name: state_name,
          osotech_csrf: osotech_csrf
        }, function(data) {
          if (data) {
            $("#localgovt").html(data);
          } else {
            $("#localgovt").html('<option value="" selected>No Data Found!</option>');
          }
        });
      } else {
        //do something
        $("#localgovt").html('<option value="" selected>Choose...</option>');
      }
    });
  })
  </script>
</body>

</html>