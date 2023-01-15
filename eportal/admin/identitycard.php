<?php
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";

if (isset($_GET['student-idcard']) && $_GET['student-idcard'] != "") {
  $studentId = $Configuration->Clean($Configuration->convert_String("decode",$_GET['student-idcard']));
  $student_data = $Student->get_student_data_byId($studentId);
  if (!$student_data) {
    $Configuration->redirect("./ab_students");
    exit();
  }
    $student_full_name = $student_data->stdSurName . " " . $student_data->stdFirstName . " " . substr($student_data->stdMiddleName, 0, 1);
    $Passport = $Student->displayStudentPassport($student_data->stdPassport,$student_data->stdGender);
} else {
    $Configuration->redirect("./ab_students");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include("../template/MetaTag.php"); ?>
  <title><?php echo ($SmappDetails->school_name); ?> :: IDENTITY MANAGEMENT </title>
</head>
<body>
    <style type="text/css">
        .school-desc h3, .school-desc p{
            text-align: center;
            
        }

        .id-container{
            margin: auto;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .id-container > div{
            overflow: hidden;
            width: 211.2px;
            height: 326.2px;
            margin: 10px;
            border-radius:10px;
            border: 1px solid lightblue;
        }
        .id-container div:first-child{
            position: relative; 
            margin-top:5px;   
            background-blend-mode: darken;
            text-align: center;
            padding: 0.6px;
        }
       .id-schtag, .id-schaddr, .id-no{
        font-size: x-small;
       }
       .id-studname{
        background-color: black;
        color: white;
        line-height: 20px;
       }
       .id-no{
        padding: 3px;
        background-color: red;
        font-family: Verdana;
        color: white;
        display: inline;
        border-radius: 3px;
        margin-bottom:5px;
       }
       .id-back{
        position: relative;
       }
       .id-back p:first-of-type{
        font-size: smaller;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
       }
       .id-back p:nth-of-type(2){
        margin-top: -20px;
        font-size: smaller;
        padding-left: 10px;
        padding-right: 10px;
        text-align: center;
        font-style: oblique;
        font-weight: 600;
       }
       .fet-back1, .fet-back2, .fet-back3, .fet-back4, .fet-back5{
        position:absolute;
        opacity: 0.1;
        z-index: -600;
       }
       .fet-back1{
        top: 20px;
        right: -15px;
        height: 355px;
        width: 35px;
        border-radius: 50%;
        background-color: rgb(223, 134, 134);
       }
       .fet-back2{
        top: 20px;
        left: -15px;
        height: 355px;
        width: 35px;
        border-radius: 50%;
        background-color: rgb(223, 134, 134);
       }
       .fet-back3{
        top: 20px;
        right: -20px;
        height: 355px;
        width: 35px;
        border-radius: 50%;
        background-color: rgb(223, 134, 134);
       }
       .fet-back4{
        top: 20px;
        left: -20px;
        height: 355px;
        width: 35px;
        border-radius: 50%;
        background-color: rgb(223, 134, 134);
       }
       .down-part{
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
       }
       .watermark{
        width: 211.2px;
        height: 326.2px;
        position: absolute;
        /* bottom: 10%; */
        left: 0;
        width: 100%;
        background-color: grey;
        /* height: 35%; */
        opacity: 0.3;
        z-index: -500;
        transform: skew(-45deg);
        
       }
       .watermark2{
        width: 211.2px;
        height: 326.2px;
        position: absolute;
        top: 0;
        right: 0;
        opacity: 0.3;
        z-index: -504;
       }
       .watermark2 img{
        position: absolute;
        top: 25%;
        right: 25%;
        width: 50%;
        height: auto;
        }
       .watermark p{
        padding: 20px;
       }
       .sign{
        margin-left: auto;
        margin-right: auto;
        width: 100px;
       }
       .sign img{
        width: 100px;
       }
       .sign p{
        margin-top: -10px;
       }
       #fet-print-btn {
    position:absolute;
    width:auto;
    padding:2px 3px;
    margin:15px 50px 25px 0px;
    border-radius:20px;
    background-color: darkred;
    color:white;
    align-items: center;
    justify-content: center;
    text-align: center;
}
@media print {
    .fet-print-non{
        display:none;
    }
}
    </style>
    <div class="school-desc fet-print-non">
        <h3><?php echo strtoupper($SmappDetails->school_name); ?></h2>
        <p><i>Below is the Generated School Identity Card for <b><?php echo $student_full_name; ?></b></i></p>
    </div>

    <div class="id-container">
        <div class="id-front">
            <div class="id-logo"><img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" width="auto" height="50"></div>
            <div class="id-schname"><?php echo strtoupper ($SmappDetails->school_name); ?></div>
            <div class="id-schtag">...<?php echo ($SmappDetails->school_slogan); ?>.</div>
            <div class="id-schaddr"><?php echo ucwords($Configuration->getConfigData()->school_address); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_state); ?></div>
            <div><img src="<?php echo $Passport; ?>" width="114" height="130" style="border-radius: 10px;border:2px solid black;margin-top:10px;"></div>
            <div class="id-studname"><?php echo $student_full_name;?></div>
            <div class="id-status"><span>Class:</span> <?php echo $student_data->studentClass;?> <span style="display: none;">(Library Prefect)</span></div>
            <div class="id-no"><?php echo $student_data->stdRegNo;?></div>
            <!-- background of the ID Front -->
            <div class="fet-back1"></div>
            <div class="fet-back2"></div>
            <div class="fet-back3"></div>
            <div class="fet-back4"></div>

        </div>
        <div class="id-back">
            <p>This ID Card remains a property of <b><?php echo strtoupper($SmappDetails->school_name); ?></b>
             and identifies the bearer with passport photograph appear overleaf as our <b>STUDENT</b>.
              <br>This card is not transferable </p>
            <br>
            <p>Kindly return to the school address or nearest Police Station, if found.</p>
            <div class="sign">
                <img src="<?php echo $Configuration->getSchoolSignature(); ?>" width="75" height="75" style="">
                <p><em><b>Authorized Signature</b></em></p>
            </div>
            
             <!-- <div class="down-part">
                <img src="./barcode.gif" alt="barcode" width="100%" height="30">
            </div>  -->
            <div class="watermark">
                <p><?php echo ($SmappDetails->school_name); ?></p>
                <p><?php echo ($SmappDetails->school_name); ?></p>
            </div>
            <div class="watermark2">
                <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>">
            </div>
        </div>
    </div>
    <button type="button" id="fet-print-btn" class="fet-print-non" onclick="window.print();">Print Now</button>
</body>
</html>