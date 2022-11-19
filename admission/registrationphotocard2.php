<?php

@ob_start();
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

if (isset($_SESSION['AUTH_SMATECH_APPLICANT_ID']) && !empty($_SESSION['AUTH_SMATECH_APPLICANT_ID'])) {
  $auth_code_applicant_id = $_SESSION['AUTH_SMATECH_APPLICANT_ID'];
  $admission_no = $_SESSION['AUTH_CODE_ADMISSION_NO'];
  $student_data = $Osotech->get_student_details_byRegNo($admission_no);
  $student_infos = $Osotech->get_student_infoId($auth_code_applicant_id);
  $student_medInfos = $Osotech->get_student_medical_infoId($auth_code_applicant_id);
  $CardUserDetails = $Osotech->getAdmissionCardUser($student_data->stdRegNo);
} else {
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
    <title><?php echo ($Osotech->getConfigData()->school_name); ?> :: <?php echo ucwords($student_data->full_name); ?>
    REGISTRATION PHOTO SLIP</title>
<style>

html {
  font-family:arial;
  font-size: 16px;
}

body {
        /* background-color: #726E6D; */
        height: 842px;
        width: 595px;
        margin-left: auto;
        margin-right: auto;
    }


thead{
  font-weight:bold;
  text-align:center;
  background: #625D5D;
  color:white;
}

table{
border: none;  
width: 100%;
}
td{
  border: none;  
}
.upperSection{
  border: 1px solid grey;
  padding: 5px;
}
.wrapper{
  display: flex;
}
.textArea {
  text-align: center;
}
.schLogo{
  width: 100px;
  height: auto;
}
.schScope{
  line-height: 3px;
}
.schName{
  font-size: 30px;
  line-height: 2px;
}
.textArea p:first-of-type{
  margin-top: -10px;
  background-color: red;
  color: white;
  line-height: 20px;
  border-radius: 10px;
  width: fit-content;
  padding-left: 20px;
  padding-right: 20px;
  margin-left: auto;
  margin-right: auto;
}
.topinfo{
  margin-top: -60px;
}
.same{
  line-height: 6px;
}
@media print{
  page {
    size: 8.26cm 11.69cm;
  }
}
</style>
</head>
<body>
  <section id="result">
    <div class="upperSection">
      <div class="wrapper">
      <img src="./images/logo.png" alt="School Logo" class="schLogo">
      <div class="textArea">
        <h1 class="schName">GLORY SUPREME SCHOOL</h1>
        <p class="schScope">CRECHE, NURSERY, PRIMARY & SECONDARY</p>
        <p class="schScope">1 - 5, Glory Supreme Avenue, Ijagba - Onigbin, Ota, Ogun State</p>
        <p class="schScope"><i>Tel:</i>  <b>08038546164, 08053152079</b></p>
      </div>
    </div>
  </div>
<br>
<br><br><br><br>
   
    <h2 style="text-align:center; text-decoration: underline; margin-top: -50px;">ACKNOWLEDGEMENT SLIP</h2><br><br><br>
   
    <img src="<?php echo EPORTAL_ROOT . "/schoolImages/students/" . $student_data->stdPassport; ?>" alt="passport" style="float: right; width: 100px; margin-top: -100px; border: 4px solid #625D5D; padding: 2px;">
    <div class="topinfo">
      <h3 class="same">Application ID: <?php echo $student_data->stdRegNo; ?></h3>
      <hr width="300" align="left">
      <h3 class="same">Class Applied For: <?php echo $student_data->studentClass; ?></h3>
      <h4 class="same">Scratch Card Pin: <?php echo $CardUserDetails->pin_code; ?> </h4>
      <h4 class="same">Scratch Card Serial: <?php echo $CardUserDetails->pin_serial; ?> </h4>
    </div>
    <div class="container-ca">
        <div class="cog-domain">
            <table style="table-layout: auto; " id="congnitiveDomain">
                <thead>
                    <tr >
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
                  <td><?php echo date("F j, Y", strtotime($student_data->stdDob)); ?></td>
                </tr>  
                <tr>
                  <td>Gender</td> 
                  <td><?php echo $student_data->stdGender; ?></td>
              </tr>  
              <tr>
                <td>Registered E-mail</td> 
                <td><?php echo $student_data->stdEmail; ?></td>
              </tr>  
              <tr>
                <td>Registered Phone</td> 
                <td><?php echo $student_data->stdPhone; ?></td>
              </tr>  
              <tr>
                <td>State of Origin / LGA</td> 
                <td><?php echo $student_infos->stdSOR; ?> / <?php echo $student_infos->stdLGA; ?></td>
              </tr> 
              <tr>
                <td>Registered Address</td> 
                <td><?php echo $student_data->stdAddress; ?></td>
              </tr> 
              <tr>
                <td>Alternative Phone</td> 
                <td><?php echo $student_infos->stdFGPhone; ?></td>
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
                          <td><?php echo $student_infos->stdMGTitle . " " . $student_infos->stdMGName; ?></td>
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
                      <td><?php echo $student_infos->stdMGEmail; ?></td>
                    </tr>  
                  </table>
                  <div class="container-ca">
                    <div class="cog-domain">
                        <table style="table-layout: auto; " id="congnitiveDomain">
                            <thead>
                                <tr>
                                    <td colspan="8"><b style="font-size: 17px;">NEXT OF KIN'S DETAIL</b> </td>
                                </tr>
                            </thead>
                            <tr>
                                <td width="200">Name </td> 
                                <td><?php echo $student_infos->stdFGTitle . " " . $student_infos->stdFGName; ?></td>
                            </tr>  
                            <tr>
                              <td>Address</td> 
                              <td><?php echo $student_data->stdAddress; ?></td>
                            </tr>  
                            <tr>
                              <td>Phone</td> 
                              <td><?php echo $student_infos->stdFGPhone; ?></td>
                          </tr>  
                        </table><br>
<hr>
        
<div class="bottom-info">
  <p><b>NOTE:</b> <br>
    You are to visit <b><?php echo ($Osotech->getConfigData()->school_name); ?></b>  on <b><?php echo date("l jS F, Y", strtotime("+10day")) ?></b> for <em> screening/entrance examination</em>.
    You are to come along with Birth Certificate, Writing material and dress properly. <br>
    Any alteration on this slip will be renders it invalid.</p>
</div>
          
<h4>Note: <b>Any alteration renders this result invalid.</b></h4>
    <!-- End of result -->
     <h4 align="center" class="text-center mt-1">Thanks for choosing
          <?php echo ($Osotech->getConfigData()->school_name); ?>!</h4>
        <hr>
        <button id="myprintbtn" onclick="javascript:window.print();" type="button"
          style="background: black; color: white; margin-bottom: 15px;border-radius: 10px;">Print Now</button>
        <a href="logout?action=logoutapplicant&applicant=newstudent" id="mylogoutbtn"> <button
            onclick="return confirm('Ensure you print put your entrance examination Photo-card before signing out');"
            type="button"
            style="background: darkred; color: white; margin-bottom: 15px;border-radius: 10px;">Logout</button></a>
  </section>

</body>
</html>