<?php
date_default_timezone_set("Africa/Lagos");
require_once "src/Osotech.php";
require_once "src/StudentResult.php";
$Osotech = new Osotech();
$Osotech->osotech_session_kick();
$StudentResult = new StudentResult();
$dbh = osotech_connect();
$schoolSesDetail = $Osotech->get_session_details();
if ($StudentResult->checkResultPortalStatus() == true) {
  header("Location: ../");
  exit();
}
$StudentResult->check_resultmi_session();
$pin = $_SESSION['pin'];
$serial = $_SESSION['serial'];
$result_regNo = $_SESSION['result_regNo'];
if (isset($_SESSION['resultmi'])) {
  $stmt = $dbh->prepare("SELECT * FROM `visap_1st_term_result_tbl` WHERE reportId=? ORDER BY reportId ASC");
  $stmt->execute(array($_SESSION['resultmi']));
  if ($stmt->rowCount() > 0) {
    while ($rowResult = $stmt->fetch()) {
      $student_reg_number = $rowResult->stdRegCode;
      $student_class = $rowResult->studentGrade;
      $term = $rowResult->term;
      $rsession = $rowResult->aca_session;
    }
  }
}
$student_data = $StudentResult->get_student_details_byRegNo($student_reg_number);
$schl_session_data = $Osotech->get_school_session_info();
//get attendance records
$attendance_records = $StudentResult->getStudentAttendanceRecord($student_reg_number, $student_class, $term, $rsession);
$Passport = $Osotech->displayStudentPassport($student_data->stdPassport,$student_data->stdGender);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> <?php echo ucwords($Osotech->getConfigData()->school_name); ?> ::
    <?php echo ucwords($student_data->full_name); ?> Report Card for <?php echo $rsession; ?> <?php echo $term; ?>
  </title>
  <?php include_once "./result.php" ?>
</head>

<body>
  <section id="result">
    <!--  -->
    <div class="upperSection">
      <img src="<?php echo $Osotech->get_schoolLogoImage(); ?>"
        alt="<?php echo ucwords($Osotech->getConfigData()->school_address); ?>-logo" class="schLogo">
      <div class="textArea">
        <h3 class="schName osotech-style"><?php echo strtoupper($Osotech->getConfigData()->school_name); ?></h3>
        <p class="schScope desc">CRECHE, NURSERY, PRIMARY & SECONDARY</p>
        <p class="schScope"><b><?php echo ucwords($Osotech->getConfigData()->school_address); ?>,
            <?php echo ucwords($Osotech->getConfigData()->school_city); ?>,
            <?php echo ucwords($Osotech->getConfigData()->school_state); ?></b></p>
        <p class="schScope"><i>Tel:</i> <b><?php echo ucwords($Osotech->getConfigData()->director_mobile); ?>,
            <?php echo ($Osotech->getConfigData()->principal_mobile); ?></b></p>
      </div>
    </div>
    <!--  -->
    <h2 style="text-align:center; text-decoration: underline;">STUDENT'S PERFORMANCE REPORT</h2>
    <p>NAME: &nbsp; &nbsp;<b><?php echo strtoupper($student_data->full_name); ?> &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
        &nbsp; </b> GENDER:&nbsp;&nbsp;
      <b><?php echo ucfirst($student_data->stdGender) ?></b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; CLASS:
      <b><?php echo strtoupper($student_class); ?>&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;Term: <b><?php echo $term ?></b>
    </p>
    <P>SESSION:&nbsp;&nbsp; <b><?php echo $rsession; ?></b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; ADMISSION NO:&nbsp;&nbsp;
      <b><?php echo strtoupper($student_data->stdRegNo); ?></b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp; D.O.B:&nbsp;&nbsp;
      <b><?php echo date("F jS, Y", strtotime($student_data->stdDob)); ?></b>&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp; AGE:&nbsp;&nbsp;
      <b><?php echo $StudentResult->get_student_age($student_data->stdDob); ?>yrs</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    </P>
    <!-- <P>CLUB / SOCIETY:&nbsp;&nbsp; <b>JET, CHOIR</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</P> -->
    <img src="<?php echo $Passport; ?>"
      alt="passport"
      style="float: right; width: 100px;height: 125px; margin-top: -150px; border: 4px solid #625D5D; padding: 2px;">
    <div class="container-ca">
      <div class="cog-domain">
        <table style="table-layout: auto; width:100%;" id="congnitiveDomain">
          <thead>
            <tr>
              <td colspan="8"><b style="font-size: 17px;">COGNITIVE DOMAIN</b> </td>
            </tr>
          </thead>
          <thead>
            <tr style="height: 90px;">
              <td style="width: 280px;"> SUBJECT</td>
              <td style="transform: rotate(-90deg);">C.A(40)</td>
              <td style="transform: rotate(-90deg);">EXAM(60)</td>
              <td style="transform: rotate(-90deg);">TOTAL(100) </td>
              <td style="transform: rotate(-90deg);">GRADE</td>
              <td>REMARKS </td>
            </tr>
          </thead>
          <?php
          $resultScore = $dbh->prepare("SELECT * FROM `visap_1st_term_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND aca_session=?");
          $resultScore->execute(array($student_reg_number, $student_class, $rsession));
          if ($resultScore->rowCount() > 0) {
            while ($showResult = $resultScore->fetch()) {
              $myTotalMark = intval($showResult->overallMark);
          ?>
          <?php
              //grab the first three letters of the student class
              $nthclass = substr($showResult->studentGrade, 0, 3);
              switch ($nthclass) {
                case 'SSS':
                  $amInClass = "Senior";
                  break;
                case 'JSS':
                  $amInClass = "Junior";
                  break;
                default:
                  $amInClass = "Pry";
                  break;
              }
              $stmt2 = $dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE grade_class='$amInClass' AND $myTotalMark >= score_from AND $myTotalMark <= score_to");
              $stmt2->execute();
              if ($stmt2->rowCount() > 0) {
                while ($r = $stmt2->fetch()) { ?>
          <tr>
            <td align="center"> <?php echo ucwords(strtolower($showResult->subjectName)); ?></td>
            <td align="center"><?php echo intval($showResult->ca); ?></td>
            <td align="center"> <?php echo $showResult->exam; ?></td>
            <td align="center"><?php echo $myTotalMark; ?></td>
            <td align="center"> <?php echo $r->mark_grade; ?></td>
            <td align="center"><?php echo $r->score_remark; ?> </td>
          </tr>
          <?php
                }
              }
              ?>
          <?php }
          }
          ?>
        </table>
        <br>
        <table style="width: 100%;" id="congnitiveDomain">
          <thead>
            <tr>
              <td colspan="5"><b style="font-size: 12px;">PERFORMANCE SUMMARY</b> </td>
            </tr>
          </thead>
          <tr>
            <td>Marks Obtainable</td>
            <td>Marks Obtained</td>
            <td>Percentage Score</td>
            <td>Grade</td>
            <td>Remarks</td>
          </tr>
          <?php
          $stmt42 = $dbh->prepare("SELECT sum(`overallMark`) as totalMark FROM `visap_1st_term_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND aca_session=?");
          $stmt42->execute(array($student_reg_number, $student_class, $rsession));
          if ($stmt42->rowCount() > 0) {
            $reSet = $stmt42->fetch();
            $total = $reSet->totalMark;
          } else {
            $total = 0;
          }
          //visap_offered_subject_tbl
          //id,student_class,subject,aca_session
          $stmt = $dbh->prepare("SELECT count(reportId) as total_sub FROM `visap_1st_term_result_tbl` WHERE studentGrade=? AND stdRegCode=? AND aca_session=?");
          $stmt->execute(array($student_class, $student_reg_number, $rsession));
          if ($stmt->rowCount() > 0) {
            $reSet = $stmt->fetch();
            $subjectOffered = $reSet->total_sub;
          } else {
            $subjectOffered = 0;
          }
          //$no_of_subject_offered = 14;
          $mx = intval($subjectOffered * 100);
          $markOb = intval($total);
          $percentage_mark = number_format(($markOb / $mx) * (100), 2);
          ?>
          <tr>
            <td><?php echo $mx; ?></td>
            <td><?php echo $markOb; ?></td>
            <td><?php echo ($percentage_mark); ?> %</td>
            <?php if ($percentage_mark >= 85 && $percentage_mark <= 100) {
              $performance_grade = 'A';
              $performance_remark = 'Distinction';
            } elseif ($percentage_mark >= 75 && $percentage_mark <= 84.99) {
              $performance_grade = 'B';
              $performance_remark = 'Excellence';
            } elseif ($percentage_mark >= 65 && $percentage_mark <= 74.99) {
              $performance_grade = 'C';
              $performance_remark = 'Very Good';
            } elseif ($percentage_mark >= 60 && $percentage_mark <= 64.99) {
              $performance_grade = 'D';
              $performance_remark = 'Good';
            } elseif ($percentage_mark >= 50 && $percentage_mark <= 59.99) {
              $performance_grade = 'E';
              $performance_remark = 'Fair';
            } elseif ($percentage_mark >= 40 && $percentage_mark <= 49.99) {
              $performance_grade = 'F';
              $performance_remark = 'Poor';
            } else {
              $performance_grade = 'G';
              $performance_remark = 'Very Poor';
            }
            ?>
            <td><?php echo $performance_grade; ?> </td>
            <td><?php echo $performance_remark; ?></td>
          </tr>
          </thead>
        </table>
        <br>
        <table style="table-layout: auto; width:100%;" id="congnitiveDomain">
          <thead>
            <tr>
              <td colspan="6"><b style="font-size: 12px;">GRADE SCALE</b> </td>
            </tr>
          </thead>
          <tr>
            <td>75 - 100 = A (Excellent) </td>
            <td>65 - 74.99 = B (Very Good) </td>
            <td>60 - 64.99 = C (Good) </td>
            <td>50 - 59.99 = D (Fairly Good) </td>
            <td>40 - 49.99 = E (Weak) </td>
            <td>
              < 40=F (Poor) </td>
          </tr>
          <tr>
        </table>
      </div>
      <div class="attendance">
        <table style="width: 100%;" id="attendanceSummary">
          <thead>
            <tr>
              <td colspan="2"><b style="font-size: 12px;">ATTENDANCE SUMMARY</b> </td>
            </tr>
          </thead>
          <tr>
            <td>No of Times School Opened </td>
            <td><?php echo $attendance_records->school_open; ?> </td>
          </tr>
          <tr>
            <td>No of Times Present </td>
            <td><?php echo $attendance_records->present; ?> </td>
          </tr>
          <tr>
            <td>No of Times Absent </td>
            <td><?php echo $attendance_records->absent ?> </td>
          </tr>
          <tr>
            <td style="background-color: rgba(21, 10, 10, .3);color: black;">Scratch Usage Info</td>
            <td><?php echo $StudentResult->get_scratch_card_usage($pin, $serial, $result_regNo); ?> of 3</td>
          </tr>
        </table>
        <br>
        <table style="width: 100%;" id="attendanceSummary">
          <thead>
            <tr>
              <td><b style="font-size: 9px;">AFFECTIVE DOMAIN</b> </td>
              <td><b style="font-size: 9px;">&nbsp;5&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;4&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;3&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;2&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;1&nbsp;</b> </td>
            </tr>
          </thead>
          <?php $affective = $StudentResult->getStudentAffectiveDomainDetails($student_reg_number, $student_class, $term, $rsession); ?>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Punctuality</td>
            <td><?php if ($affective->punctuality == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->punctuality == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->punctuality == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->punctuality == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->punctuality == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Neatness</td>
            <td><?php if ($affective->neatness == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->neatness == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->neatness == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->neatness == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->neatness == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Honesty</td>
            <td><?php if ($affective->honesty == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->honesty == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->honesty == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->honesty == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->honesty == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Self Control</td>
            <td><?php if ($affective->self_control == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->self_control == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->self_control == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->self_control == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->self_control == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Attentiveness in Class</td>
            <td><?php if ($affective->attentiveness == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->attentiveness == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->attentiveness == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->attentiveness == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->attentiveness == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Leadership</td>
            <td><?php if ($affective->leadership == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->leadership == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->leadership == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->leadership == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($affective->leadership == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
        </table>
        <br>
        <table style="width: 100%;" id="attendanceSummary">
          <thead>
            <tr style="text-align:center;">
              <td><b style="font-size: 9px;">PSYCHOMOTOR DOMAIN</b> </td>
              <td><b style="font-size: 9px;">&nbsp;5&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;4&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;3&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;2&nbsp;</b> </td>
              <td><b style="font-size: 9px;">&nbsp;1&nbsp;</b> </td>
            </tr>
          </thead>
          <?php $psychomotors = $StudentResult->getStudentPsychomotorDetails($student_reg_number, $student_class, $term, $rsession) ?>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Handwriting</td>
            <td><?php if ($psychomotors->Handwriting == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handwriting == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handwriting == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handwriting == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handwriting == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
          <tr style="text-align:center;">
            <td style="font-size: 8px;">Sports & Games</td>
            <td><?php if ($psychomotors->Sports == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Sports == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Sports == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Sports == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Sports == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>

          <tr style="text-align:center;">
            <td style="font-size: 8px;">Speech Fluency</td>
            <td><?php if ($psychomotors->Fluency == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Fluency == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Fluency == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Fluency == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Fluency == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>

          <tr style="text-align:center;">
            <td style="font-size: 8px;">Handling of Tools</td>
            <td><?php if ($psychomotors->Handlingtools == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handlingtools == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handlingtools == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handlingtools == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Handlingtools == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>

          <tr style="text-align:center;">
            <td style="font-size: 8px;">Drawing / Painting</td>
            <td><?php if ($psychomotors->Drawing == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Drawing == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Drawing == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Drawing == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->Drawing == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>

          <tr style="text-align:center;">
            <td style="font-size: 8px;">Crafts</td>
            <td><?php if ($psychomotors->crafts == 5) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->crafts == 4) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->crafts == 3) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->crafts == 2) : ?>
              &#10003;
              <?php endif; ?></td>
            <td><?php if ($psychomotors->crafts == 1) : ?>
              &#10003;
              <?php endif; ?></td>
          </tr>
        </table>
        <br>
        <table style="table-layout: auto; width:100%;" id="ratingIndices">
          <thead>
            <tr>
              <td><b style="font-size: 12px;">GRADE SCALE</b> </td>
            </tr>
          </thead>
          <tr>
            <td style="font-size: 8px;">
              <p>5. Maintains an Excellent degree of Observable traits.</p>
              <p>4. Maintains a High level of Observable traits.</p>
              <p>3. Acceptable level of Observable traits.</p>
              <p>2. Shows Minimal regard for Observable traits.</p>
              <p>1. Pose no regard for Observable traits.</p>
            </td>
          </tr>
          <tr>
        </table>
        <br>
        <table style="table-layout: auto; width: 100%;" id="gradeAnalysis">
          <thead>
            <tr>
              <td colspan="7"><b style="font-size: 9px;">SUBJECTS ANALYSIS</b> </td>
            </tr>
          </thead>
          <tr>
            <td colspan="4">TOTAL SUBJECTS OFFERED</td>
            <td colspan="3" style="text-align:center;"><?php echo intval($subjectOffered) ?></td>
          </tr>
        </table>
      </div>
    </div>

    <div class="footer-area">
      <div class="teacher">
        <h4>Class Teacher's Remark:</h4>
        <hr>
        <?php if ($teacher_res_comment = $StudentResult->get_student_result_comment_details($student_reg_number, $student_class, $term, $rsession)) { ?>
        <p> <?php echo $teacher_res_comment->teacher_comment; ?>
        </p>
        <?php
          // code...
        } ?>

        <p style="text-align: right;"><b>
            <?php $staff_data_details = $StudentResult->get_class_teacher_class_name($student_reg_number, $student_class, $term, $rsession) ?>
            <?php if ($staff_data_details) : ?>
            <?php
              echo  $staff_data_details->class_teacher;
              ?>
            <?php endif ?></b></p>
      </div>
      <div class="principal">
        <h4>Head of school's Remark:</h4>
        <hr>
        <?php if ($principal_res_comment = $StudentResult->get_student_result_comment_details($student_reg_number, $student_class, $term, $rsession)) { ?>
        <p>
          <?php echo $principal_res_comment->principal_coment; ?></p>
        <?php
          // code...
        } ?>

        <p style="text-align: right;"><b> <?php $principal_details = $StudentResult->get_principal_info(); ?>
            <?php if ($principal_details) : ?>
            <?php $staff_Gender = $principal_details->staffGender;
              if ($staff_Gender == "Male") {
                $tTitle = "Mr. ";
              } else {
                $tTitle = "Mrs. ";
              }
              echo $tTitle . $principal_details->firstName . " " . $principal_details->lastName;
              ?>
            <?php endif ?></b></p>
      </div>
      <div class="signarea">
        <h4
          style="font-size: 10px; text-align: center; background-color: rgba(192, 15, 15, 0.205); border-top: 1px solid red; margin-top: -0.7px; padding-top: 3px; padding-bottom: 3px; border-bottom: 1px solid red;">
          Next Term Begins: <?php echo date("l jS F, Y", strtotime($schoolSesDetail->new_term_begins)); ?>.</h4>
        <br>
        <img src="<?php echo $Osotech->getSchoolSignature();
                  ?>" alt="" style="margin-left:40px; margin-top: -5px; margin-right:auto; width: 50%;">
      </div>
    </div>
    <br>
    <hr>
    <h4 style="margin-bottom: 20px;color: darkred;">Note: <b>Any alteration renders this result invalid.</b><span
        style="float: right;"> Powered by: <?php echo __OSOTECH__DEV_COMPANY__ ?></span></h4>
    <button onclick="javascript:window.print();" type="button"
      style="background: black; color: white; margin-bottom: 15px;">Print Now</button>
    <!-- End of result -->
  </section>

</body>

</html>