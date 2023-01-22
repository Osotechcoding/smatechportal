<?php
if (!file_exists("Includes/Osotech.php")) {
  die("Access to this Page is Denied! <p>Please Contact the School Admin for assistance</p>");
}
require_once("Includes/Osotech.php");
//require_once ("Includes/Database.php");
$Osotech->osotech_session_kick();
$schoolSesDetail = $Osotech->get_school_session_info();

if ($Osotech->checkAdmissionPortalStatus() != true) {
  header("Location:" . APP_ROOT);
  exit();
}
if (isset($_GET['email']) && !$Osotech->isEmptyStr($_GET['email'])) {
  $email = $Osotech->unsaltifyString($_GET['email']);
  $email = $Osotech->Clean($email);

  $student_data = $Osotech->get_single_data("visap_student_tbl","stdEmail",$email);
  if(!$student_data){
    header("Location: ./submit-application");
  exit();
  }
  $student_infos = $Osotech->get_student_infoId($student_data->stdId);
  $student_medInfos = $Osotech->get_student_medical_infoId($student_data->stdId);
  $CardUserDetails = $Osotech->getAdmissionCardUser($student_data->stdRegNo);
  $sps = $Osotech->get_student_previous_school_info($student_data->stdId);
} else {
  header("Location: ./submit-application");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <?php include_once "MetaTags.php";?>
  <title><?php echo ($Osotech->getConfigData()->school_name); ?> :: <?php echo ucwords($student_data->stdSurName.' '.$student_data->stdFirstName.' '.$student_data->stdMiddleName); ?>
    Registration Slip</title>
  <style>
  html {
    font-family: arial;
    font-size: 16px;
  }

  body {
    /* background-color: #726E6D; */
    height: 100vh;
    width: 750px;
    margin-left: auto;
    margin-right: auto;
  }

  thead {
    font-weight: bolder;
    text-align: center;
    background: #625D5D;
    color: white;
  }

  table {
    border: none;
    width: 100%;
  }

  td {
    border: none;
  }

  .upperSection {
    border: 0px solid grey;
    padding: 5px;
  }

  .wrapper {
    display: flex;
    width: 100%;
  }

  .textArea {
    text-align: center;
    justify-content: center;
    width: 80%;
  }

  .schLogo {
    width: 20%;
    height: auto;
    border-radius: 20px !important;
  }

  .schScope {
    line-height: 3px;
  }

  .schName {
    display: block;
    text-transform: uppercase !important;
    font-size: 30px;
    line-height: 3px;
  }

  .textArea p:first-of-type {
    margin-top: 10px;
    background-color: grey;
    color: white;
    line-height: 20px;
    border-radius: 10px;
    width: fit-content;
    padding-left: 20px;
    padding-right: 20px;
    margin-left: auto;
    margin-right: auto;
  }
  .topinfo {
    margin-top: -60px;
  }

  .same {
    line-height: 6px;
  }

  #result {
    /* border: 0px solid grey; */
    padding: 5px;
    border-radius: 10px;
  }

  @media print {
    page {
      size: 8.26cm 11.69cm;
    }
    .fet-no-print{
        display: none;
    }
  }
  </style>
</head>

<body>
  <section id="result">
    <div class="upperSection">
      <div class="wrapper">
        <img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" alt="School Logo" class="schLogo">
        <div class="textArea">
          <h2 class="schName"><?php echo ($Osotech->getConfigData()->school_name); ?></h2>
          <p class="schScope">CRECHE, NURSERY, PRIMARY & SECONDARY</p>
          <p class="schScope"><?php echo ($Osotech->getConfigData()->school_address); ?>,
            <?php echo ($Osotech->getConfigData()->school_city); ?>,
            <?php echo ($Osotech->getConfigData()->school_state); ?></p>
          <p class="schScope"><i>Tel:</i> <b><?php echo ($Osotech->getConfigData()->director_mobile); ?>,
              <?php echo ($Osotech->getConfigData()->principal_mobile); ?></b></p>
        </div>
      </div>
    </div>
    <br><br>
    <!-- <br><br> -->
    <h2 style="text-align:center; text-decoration: underline; margin-top: -50px;">ACKNOWLEDGEMENT SLIP</h2><br><br><br>
    <img src="<?php echo EPORTAL_ROOT . "/schoolImages/students/" . $student_data->stdPassport; ?>" alt="passport"
      style="float: right; width: 120px; margin-top: -100px; border: 4px solid #625D5D; padding: 2px; border-radius:10px;">
    <div class="topinfo">
      <h3 class="same">Application ID: <?php echo $student_data->stdRegNo; ?></h3>
      <hr width="300" align="left">
      <h3 class="same">Admission Level: <?php echo $student_data->studentClass; ?></h3>
      <h4 class="same"> Card Pin: <?php echo $CardUserDetails->pin_code; ?> </h4>
      <h4 class="same"> Card Serial: <?php echo $CardUserDetails->pin_serial; ?> </h4>
    </div>
    <div class="container-ca">
      <div class="cog-domain">
        <table style="table-layout: auto; " id="congnitiveDomain">
          <thead>
            <tr>
              <td colspan="8"><b style="font-size: 17px;">CANDIDATE'S DETAILS</b> </td>
            </tr>
          </thead>
          <tr>
            <td width="200">Full Name</td>
            <td><?php echo $student_data->stdSurName; ?> <?php echo $student_data->stdFirstName; ?>
              <?php echo $student_data->stdMiddleName; ?></td>
          </tr>
          <tr>
            <td>Date of Birth</td>
            <td><?php echo date("F jS, Y", strtotime($student_data->stdDob)); ?></td>
          </tr>
          <tr>
            <td>Gender</td>
            <td><?php echo $student_data->stdGender; ?></td>
          </tr>
          <tr>
            <td>Candidate E-mail</td>
            <td><?php echo $student_data->stdEmail; ?></td>
          </tr>
          <tr>
            <td>Candidate Phone</td>
            <td><?php echo $student_data->stdPhone; ?></td>
          </tr>
          <tr>
            <td>Candidate Address</td>
            <td><?php echo $student_data->stdAddress; ?></td>
          </tr>
          <tr>
            <td>State of Origin / LGA</td>
            <td><?php echo $student_infos->stdSOR; ?> / <?php echo $student_infos->stdLGA; ?></td>
          </tr>
        </table>
        <div class="container-ca">
          <div class="cog-domain">
            <table style="table-layout: auto; " id="congnitiveDomain">
              <thead>
                <tr>
                  <td colspan="8"><b style="font-size: 17px;">PARENT/GUARDIAN'S INFORMATION</b> </td>
                </tr>
              </thead>
              <tr>
                <td width="200">Parent/Guardian's Name </td>
                <td><?php echo $student_infos->stdMGTitle . " " . $student_infos->stdMGName; ?> /
                  <?php echo $student_infos->stdFGTitle . " " . $student_infos->stdFGName; ?></td>
              </tr>
              <tr>
                <td>Address</td>
                <td><?php echo $student_data->stdAddress; ?></td>
              </tr>
              <tr>
                <td>Phone</td>
                <td><?php echo $student_infos->stdMGPhone; ?>, <?php echo $student_infos->stdFGPhone; ?></td>
              </tr>
              <tr>
                <td>E-mail</td>
                <td><?php echo $student_infos->stdMGEmail; ?> / <?php echo $student_infos->stdFGEmail; ?> </td>
              </tr>
            </table>
            <div class="container-ca">
              <div class="cog-domain">
                <table style="table-layout: auto; " id="congnitiveDomain">
                  <thead>
                    <tr>
                      <td colspan="8"><b style="font-size: 17px;">PREVIOUS SCHOOL INFORMATION</b> </td>
                    </tr>
                  </thead>
                  <tr>
                    <td width="200">School Name </td>
                    <td><?php echo $sps->stdSchoolName ?></td>
                  </tr>
                  <tr>
                    <td>Name of Principal</td>
                    <td><?php echo $sps->stdDirectorName; ?></td>
                  </tr>
                  <tr>
                    <td>Contact Number</td>
                    <td><?php echo $sps->stdSchoolPhone; ?></td>
                  </tr>
                  <tr>
                    <td>Reason for Change of School</td>
                    <td><?php echo $sps->stdReasonInPreClass; ?></td>
                  </tr>
                  <tr>
                    <td>Present Class/Grade</td>
                    <td><?php echo $sps->stdPresentClass; ?></td>
                  </tr>
                </table><br>
                <hr>
                <div class="bottom-info">
                  <p><b>NOTE:</b> <br>
                    You are to come to the school premises on <b>
                      <?php echo date("l jS F, Y", strtotime("+3day")) ?></b> for your <em> screening/entrance
                      examination</em>. <br>
                    Come along with Your Birth Certificate, Writing materials and make sure to dress properly.
                  </p>
                </div>
                <h4 style="color:#f00;align-items:center; text-align:center;">Note: <b>Any alteration renders this
                Photo-card invalid.</b></h4>
                <!-- End of Photo-card -->
                <h4 align="center" class="text-center mt-1">Thanks for choosing
                  <?php echo ($Osotech->getConfigData()->school_name); ?>!</h4>
                <hr>
                <button id="myprintbtn" class="fet-no-print" onclick="javascript:window.print();" type="button"
                  style="background: black; color: white; margin-bottom: 15px;border-radius: 10px;">Print Now</button>
                <a href="logout?action=logout&applicant=new" id="mylogoutbtn" class="fet-no-print"> <button
                    onclick="return confirm('Ensure you print put your entrance examination Photo-card before signing out');"
                    type="button"
                    style="background: darkred; color: white; margin-bottom: 15px;border-radius: 10px;">Logout</button></a>
  </section>
</body>

</html>