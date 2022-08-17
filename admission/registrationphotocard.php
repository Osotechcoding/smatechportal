<?php

error_reporting(1);
@ob_start();
if (!file_exists("Includes/Osotech.php")){
    die("Access to this Page is Denied! <p>Please Contact the School Admin for assistance</p>");
}
require_once ("Includes/Osotech.php");
require_once ("Includes/Database.php");
$Osotech->osotech_session_kick();
$schoolSesDetail = $Osotech->get_school_session_info();
?>
<?php if ($Osotech->checkAdmissionPortalStatus() !== true): ?>
   <?php header("Location: ../");
   exit();?>
<?php endif ?>
<?php

if (isset($_SESSION['AUTH_SMATECH_APPLICANT_ID']) && ! empty($_SESSION['AUTH_SMATECH_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_SMATECH_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
  $student_infos = $Osotech->get_student_infoId($auth_code_applicant_id);
  $student_medInfos = $Osotech->get_student_medical_infoId($auth_code_applicant_id);
  $CardUserDetails = $Osotech->getAdmissionCardUser($student_data->stdRegNo);
}else{
  header("Location: ./submitapplication");
  exit();
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo ($Osotech->getConfigData()->school_name);?> :: <?php echo ucwords($student_data->full_name);?> REGISTRATION PHOTO SLIP</title>
      <?php include_once ("Head.php");?>
<link rel="stylesheet" href="./assets/css/photocard.css">
<style>
@media print {
       #myprintbtn {display: none;}
        #mylogoutbtn {display: none;}
        .applicant_details{
          display: column;
          justify-content: center;
          align-items: center;
        }
    }
</style>
</head>
<body>
    <div class="container">
      <section id="result" style="margin-top:20px">
          <div class="card card-body">
            <div class="col-md-12 col-sm-12 col-lg-12">
<img src="schoolbanner.jpg" class="img-fluid">

            <div class="row">
              <h4 class="text-center"><?php echo strtoupper(($schoolSesDetail->session_desc_name)) ?> Registration Photocard</h4>

              <div class="col-md-8 applicant_details">
                <h4>Application ID: <b style="color: red; font-weight: 1000;"><?php echo $student_data->stdRegNo; ?> </b>  </h4>
                <h3>Applicant Gender: <b style="color: rgb(0, 17, 255); font-weight: 1000;"><?php echo $student_data->stdGender; ?></b>  </h3>
                <h4>Admission Level: <b style="color: rgb(0, 17, 255); font-weight: 1000;"><?php echo $student_data->studentClass; ?></b>  </h4>
                <h4>Scratch Card Pin: <b class="text-muted"><?php echo $CardUserDetails->pin_code; ?></b> </h4>
                <h4>Scratch Card Serial: <b class="text-muted"><?php echo $CardUserDetails->pin_serial; ?></b> </h4>
                  <h4>Admission Status: <span class="badge text-bg-danger">Not Yet Admitted</span> </h4>

              </div>
              <div class="col-md-4 col-sm-4 col-lg-4">
<img src="<?php echo APP_ROOT."eportal/schoolImages/students/".$student_data->stdPassport;?>" alt="passport" style="width: 100px; margin-top:2px; border: 3px solid #625D5D; padding: 5px;border-radius:15px;"><br>
<small class="text-center text-muted">Registered: <?php print date("D jS F, Y",strtotime($student_data->stdApplyDate)); ?></small>
              </div>
              <div class="clearfix">

              </div>
            </div>
  </div>
            <table style="table-layout: auto; width:100%; " id="congnitiveDomain">
                <thead class="text-center">
                  <td colspan="2" align="center">APPLICANT'S INFORMATION</td>
                </thead>
                <tr>
                  <td>Full Name</td>
                  <td><?php echo $student_data->stdSurName;?>, <?php echo $student_data->stdFirstName;?> <?php echo $student_data->stdMiddleName;?></td>
                </tr>
                <tr>
                  <td>Date of Birth</td>
                  <td><?php echo date("F j, Y",strtotime($student_data->stdDob));?></td>
                </tr>
                <tr>
                  <td>Registered E-mail</td>
                  <td><?php echo $student_data->stdEmail;?></td>
                </tr>
                <tr>
                  <td>Registered Phone</td>
                  <td><?php echo $student_data->stdPhone;?></td>
                </tr>
                <tr>
                  <td>State of Origin/ LGA</td>
                  <td><?php echo $student_infos->stdSOR;?> /  <?php echo $student_infos->stdLGA;?></td>
                </tr>
                <tr>
                  <td>Registered Address</td>
                  <td><?php echo $student_data->stdAddress;?></td>
                </tr>
            </table>
              <br>
              <table style="table-layout: auto; width:100%;" id="NOK">
                <thead class="text-center">
                  <td colspan="2" align="center">PARENT/GUARDIAN INFO</td>
                </thead>
                <tr>
                  <td>Father/Guardian</td>
                  <td><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></td>
                </tr>
                <tr>
                  <td>Mother/Guardian</td>
                  <td><?php echo $student_infos->stdFGTitle ." ".$student_infos->stdFGName;?></td>
                </tr>
                <tr>
                  <td>Address</td>
                  <td><?php echo $student_data->stdAddress; ?></td>
                </tr>
                <tr>
                  <td>Phone</td>
                  <td><?php echo $student_infos->stdMGPhone;?>, <?php echo $student_infos->stdFGPhone;?></td>
                </tr>
            </table>
            <br><br>
            <table style="table-layout: auto; width:100%;" id="NOK">
              <thead class="text-center">
                <td colspan="2" align="center">NEXT OF KIN INFO</td>
              </thead>
              <tr>
                <td>Name</td>
                <td><?php echo $student_infos->stdMGTitle ." ".$student_infos->stdMGName;?></td>
              </tr>
              <tr>
                <td>Registered Phone</td>
                <td><?php echo $student_infos->stdMGPhone;?></td>
              </tr>
          </table>
          <br>
          <div class="teacher">
            <h5 style="color:red; font-weight: bold;">NOTE:</h5>
            <p>You are to visit <?php echo ($Osotech->getConfigData()->school_name);?> on <b><?php echo date("l jS F, Y",strtotime("+10day")) ?></b> for screening/entrance examination.</p>
            <p>You are to come along with Birth Certificate, Writing material and dress properly.</p>
            <p class="text-center"><strong class="text-danger">NOTE: </strong>
            <b class="text-danger"> Any
            attempt to forge this Photo-card will be taken as a Criminal Offence which is Punishable</b> </p>
          </div>
   <h4 align="center" class="text-center mt-1">Thanks for choosing <?php echo ($Osotech->getConfigData()->school_name);?>!</h4>
   <hr>
   <button id="myprintbtn" onclick="javascript:window.print();" type="button" style="background: black; color: white; margin-bottom: 15px;border-radius: 10px; @media print()">Print Now</button>
   <a href="logout?action=logoutapplicant&applicant=newstudent" id="mylogoutbtn"> <button onclick="return confirm('Ensure you print put your entrance examination Photo-card before signing out');" type="button" style="background: darkred; color: white; margin-bottom: 15px;border-radius: 10px;">Logout</button></a>
     </div>
   </section>
  </div>
</body>
</html>
