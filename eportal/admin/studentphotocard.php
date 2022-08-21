<?php 
require_once "helpers/helper.php";
 ?>
 <?php 
if (isset($_GET['newstudentdata']) && isset($_GET['action']) && $_GET['newstudentdata']!="" && $_GET['action'] ==="view") {
  
  $studentId = $Configuration->unsaltifyString($_GET['newstudentdata']);
  $student_data = $Student->get_student_data_byId($studentId);
  if (!$student_data) {
    header("Location: student_adm_portal");
  exit();
  }
  $student_data = $Student->get_student_details_byRegNo($student_data->stdRegNo);
  $student_infos = $Student->get_student_infoId($student_data->stdId);
  $student_medInfos = $Student->get_student_medical_infoId($student_data->stdId);
  $CardUserDetails = $Student->getAdmissionCardUser($student_data->stdRegNo);
}else{
  header("Location: student_adm_portal");
  exit();
}

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include ("../template/MetaTag.php"); ?>
    <title><?php echo ($SmappDetails->school_name);?> :: <?php echo ucwords($student_data->full_name);?> REGISTRATION PHOTO SLIP</title>
    <?php //include ("../template/HeaderLink.php"); ?>
 <link rel="stylesheet" href="../assets/css/mybootstrap.min.css">
 <link rel="stylesheet" href="../assets/css/photocard.css">
<style>

</style>
</head>
<body>
    <div class="container">
      <section id="result" style="margin-top:20px">
          <div class="card">
            <div class="card-body">
<!-- <center><img src="../schoolbanner.jpg" class="img-fluid" width="80%" height="50"></center> -->
<h1 class="text-center text-muted"><?php echo strtoupper(($activeSess->session_desc_name)) ?> REGISTRATION PHOTO SLIP</h1>
            <div class="row">
              <div class="col-md-8 applicant_details">
                <div style="margin-left: 20px; line-height: 1rem;">
                  <h4>Application ID: <b style="color: red; font-weight: 900;"><?php echo $student_data->stdRegNo; ?> </b>  </h4>
                <h3>Applicant Gender: <b style="color: rgb(0, 17, 255); font-weight: 900;"><?php echo $student_data->stdGender; ?></b>  </h3>
                <h4>Admission Level: <b style="color: rgb(0, 17, 255); font-weight: 900;"><?php echo $student_data->studentClass; ?></b>  </h4>
                <h4>Scratch Card Pin: <b class="text-muted"><?php echo $CardUserDetails->pin_code; ?></b> </h4>
                <h4>Scratch Card Serial: <b class="text-muted"><?php echo $CardUserDetails->pin_serial; ?></b> </h4>
                  <h4>Admission Status: <span class="badge text-bg-danger badge-sm">Not Yet Admitted</span> </h4></div>
              </div>
              <div class="col-md-4" style="display: column;">

  <img src="../schoolImages/students/<?php echo $student_data->stdPassport;?>" alt="passport" style="width: 100px; margin-top:2px; border: 3px solid #625D5D; padding: 5px;border-radius:15px;"><br>
<small class="text-center text-muted"><b>Date: <?php echo date("D jS F, Y",strtotime($student_data->stdApplyDate)); ?></b></small>

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
            <p>You are to visit <?php echo ($Configuration->getConfigData()->school_name);?> on <b><?php echo date("l jS F, Y",strtotime("+10day")) ?></b> for screening/entrance examination.</p>
            <p>You are to come along with Birth Certificate, Writing material and dress properly.</p>
            <p class="text-center"><strong class="text-danger">NOTE: </strong>
            <b class="text-danger"> Any
            attempt to forge this Photo-card will be taken as a Criminal Offence which is Punishable</b> </p>
          </div>
   <h4 align="center" class="text-center mt-1">Thanks for choosing <?php echo ($Configuration->getConfigData()->school_name);?>!</h4>
   <hr>
   <div class="pull-right"><button id="myprintbtn" onclick="javascript:window.print();" type="button" style="background: darkred; color: white; margin-bottom: 15px;border-radius: 10px;">Print Now</button>
     </div></div>
   </section>
  </div>
 
</body>
</html>