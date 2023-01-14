<?php
@session_start();
@ob_start();
require_once "visap_helper.php";
?>
<?php if (!isset($_SESSION['resultmi']) || $_SESSION['resultmi'] == "") {
  header("Location: ./checkMyResult");
  exit();
}

$dbh = osotech_connect();
$pin = $_SESSION['pin'];
$serial = $_SESSION['serial'];

$result_regNo = $_SESSION['result_regNo'];
if (isset($_SESSION['resultmi'])) {
  $stmt = $dbh->prepare("SELECT * FROM `visap_2nd_term_result_tbl` WHERE reportId=? ORDER BY reportId ASC");
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

$student_data = $Student->get_student_details_byRegNo($student_reg_number);
$schl_session_data = $Administration->get_school_session_info();
//get time present and absent
$attendance_records = $Result->getStudentAttendanceRecord($student_reg_number, $student_class, $term, $rsession);
$Passport = $Student->displayStudentPassport($student_data->stdPassport,$student_data->stdGender);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo ucwords($SmappDetails->school_name); ?> :: <?php echo ucwords($student_data->full_name); ?> Report
    Card for <?php echo $schl_session_data->active_session; ?> </title>
  <!-- <link rel="stylesheet" href="result-css.php" /> -->
  <?php 
  include("result-css.php");
  ?>
</head>

<body>
  <section id="result">
    <div class="upperSection">
      <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>"
        alt="<?php echo ucwords($Configuration->getConfigData()->school_name); ?>-logo" class="schLogo">
      <div class="textArea">
        <h3 class="schName"><?php echo strtoupper($Configuration->getConfigData()->school_name); ?></h3>
        <p class="schScope desc">CRECHE, NURSERY, PRIMARY & SECONDARY</p>
        <p class="schScope"><?php echo ucwords($Configuration->getConfigData()->school_address); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_city); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_state); ?></p>
        <p class="schScope"><i>Tel:</i> <b><?php echo ucwords($Configuration->getConfigData()->director_mobile); ?>,
            <?php echo ($Configuration->getConfigData()->principal_mobile); ?></b></p>
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
      <b><?php echo $Administration->get_student_age($student_data->stdDob); ?>yrs</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
    </P>
    <!-- <P>CLUB / SOCIETY:&nbsp;&nbsp; <b>JET, CHOIR</b>&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;</P> -->
    <!--  -->
    <?php if ($student_data->stdPassport == NULL || $student_data->stdPassport == "") : ?>
    <?php if ($student_data->stdGender == "Male") : ?>
    <img src="../schoolImages/students/male.png" alt="passport"
      style="float: right; width: 100px;height: 125px; margin-top: -150px; border: 4px solid #625D5D; padding: 2px;">
    <?php else : ?>
    <img src="../schoolImages/students/female.png" alt="passport"
      style="float: right; width: 100px;height: 125px; margin-top: -150px; border: 4px solid #625D5D; padding: 2px;">
    <?php endif ?>
    <?php else : ?>
    <img src="../schoolImages/students/<?php echo $student_data->stdPassport; ?>" alt="passport"
      style="float: right; width: 100px;height: 125px; margin-top: -150px; border: 4px solid #625D5D; padding: 2px;">
    <?php endif ?>

    <div class="container-ca">
      <div class="cog-domain">
        <table style="table-layout: auto; width:100%;" id="congnitiveDomain">
          <thead>
            <tr>
              <td colspan="9"><b style="font-size: 17px;">COGNITIVE DOMAIN</b> </td>
            </tr>
          </thead>

          <thead>
            <td> SUBJECT</td>
            <td
              style="background-color: rgba(243, 241, 105, 0.267);writing-mode: vertical-lr; text-orientation: mixed;">
              <p>&nbsp;1<sup>ST</sup>&nbsp;&nbsp;TERM SCORES&nbsp;</p>
            </td>
            <td style="writing-mode: vertical-lr; text-orientation: mixed;">
              <p>C.A(40)</p>
            </td>
            <td style="writing-mode: vertical-lr; text-orientation: mixed;">
              <p>EXAM(60)</p>
            </td>
            <td style="writing-mode: vertical-lr; text-orientation: mixed;">
              <p>TOTAL(100)</p>
            </td>
            <td style="writing-mode: vertical-lr; text-orientation: mixed;">
              <p>AVERAGE</p>
            </td>
            <td style="writing-mode: vertical-lr; text-orientation: mixed;">
              <p>GRADE</p>
            </td>
            <td>REMARKS</td>
          </thead>
          <?php
          $resultScore = $dbh->prepare("SELECT * FROM  `visap_2nd_term_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
          $resultScore->execute(array($student_reg_number, $student_class, $term, $rsession));
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
              $stmt2 = $dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE grade_class='$amInClass' AND $myTotalMark>=score_from AND $myTotalMark<=score_to");
              $stmt2->execute();
              if ($stmt->rowCount() > 0) {
                while ($r = $stmt2->fetch()) {
                  $stmt4 = $dbh->prepare("SELECT * FROM `visap_1st_term_result_tbl` WHERE studentGrade='$student_class' AND aca_session='$rsession' AND stdRegCode='$student_reg_number' AND subjectName='$showResult->subjectName'");
                  $stmt4->execute();
                  if ($stmt4->rowCount() > 0) {
                    $firstTermTotal = $stmt4->fetch();
                    $_firstTermTotal = $firstTermTotal->overallMark;
                  } else {
                    $_firstTermTotal = '0';
                  }

              ?>
         <td style="text-align: center;"> <?php echo ucwords(strtolower($showResult->subjectName)); ?></td>
          <td style="background-color: rgba(243, 241, 105, 0.267);"><?php echo intval($_firstTermTotal); ?></td>
          <td><?php echo intval($showResult->ca); ?></td>
          <td> <?php echo $showResult->exam; ?></td>
          <td><?php echo intval($showResult->ca + $showResult->exam); ?></td>
          <td>
            <?php echo round(($_firstTermTotal + $showResult->ca + $showResult->exam) / 2); ?></td>
          <td> <?php echo $r->mark_grade; ?></td>
          <td><?php echo $r->score_remark; ?> </td>

          </tr>
          <?php
                  // code...
                }
              }
              ?>
          <tr>
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
          $stmt42 = $dbh->prepare("SELECT sum(`overallMark`) as totalMark FROM `visap_2nd_term_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
          $stmt42->execute(array($student_reg_number, $student_class, $term, $rsession));
          if ($stmt42->rowCount() > 0) {
            $reSet = $stmt42->fetch();
            $total = $reSet->totalMark;
          } else {
            $total = 0;
          }
          //visap_offered_subject_tbl
          //id,student_class,subject,aca_session
          $stmt = $dbh->prepare("SELECT count(id) as total_sub FROM `visap_registered_subject_tbl` WHERE subject_class=?");
          $stmt->execute(array($student_class));
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
            <td><?php echo $Pin_serial->get_scratch_card_usage($pin, $serial, $result_regNo); ?> of 3</td>
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
          <?php $affective = $Student->getStudentAffectiveDomainDetails($student_reg_number, $student_class, $term, $rsession); ?>
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
          <?php $psychomotors = $Student->getStudentPsychomotorDetails($student_reg_number, $student_class, $term, $rsession) ?>
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
        <?php if ($teacher_res_comment = $Administration->get_student_result_comment_details($student_reg_number, $student_class, $term, $rsession)) { ?>
        <p> <?php echo $teacher_res_comment->teacher_comment; ?>
        </p>
        <?php
          // code...
        } ?>
        <p style="text-align: right;"><b>
            <?php $staff_data_details = $Administration->get_class_teacher_class_name($student_reg_number, $student_class, $term, $rsession) ?>
            <?php if ($staff_data_details){
        echo  $staff_data_details->class_teacher;
            } ?>
              </b></p>
      </div>
      <div class="principal">
        <h4>Head of School's Remark:</h4>
        <hr>
        <?php if ($principal_res_comment = $Administration->get_student_result_comment_details($student_reg_number, $student_class, $term, $rsession)) { ?>
        <p>
          <?php echo $principal_res_comment->principal_coment; ?></p>
        <?php
          // code...
        } ?>
        <p style="text-align: right;"><b> <?php $principal_details = $Administration->get_principal_info(); ?>
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
          Next Term Begins: <?php echo date("l jS F, Y", strtotime($schl_session_data->new_term_begins)); ?>.</h4>
        <br>
        <img src="<?php echo $Configuration->getSchoolSignature();
                  ?>" alt="" style="margin-left:40px; margin-top: -5px; margin-right:auto; width: 50%;">
      </div>
    </div>
    <br>
    <hr>
    <h4 style="margin-bottom: 20px;color: darkred;">Note: <b>Any alteration renders this result invalid.</b><span
        style="float: right;"> Powered by: <?php echo __OSOTECH__DEV_COMPANY__ ?></span></h4>
    <button onclick="javascript:window.print();" type="button"
      style="background: black; color: white; margin-bottom: 15px;border-radius:10px; padding:2px 4px;">Print Now</button>

    <!-- End of result -->
  </section>

</body>

</html>