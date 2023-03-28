<?php 
require_once "helpers/helper.php";
if (isset($_GET['student-class']) && isset($_GET['term']) && isset($_GET['school-session']) && $_GET['student-class'] !=""
&& $_GET['term'] !="" && $_GET['school-session'] != "") {
  $student_class = $Configuration->Clean($_GET['student-class']);
  $term = $Configuration->Clean($_GET['term']);
  $session = $Configuration->Clean($_GET['school-session']);
  $subjectList = $Result->getBroadSheetSubjects($student_class);
  if (!$subjectList) {
       header("Location: broadsheet");
  exit();
  }
}else{
    header("Location: broadsheet");
  exit();
}

 ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BROADSHEET FOR <?php echo strtoupper($SmappDetails->school_name);?></title>
    <link rel="stylesheet" href="broadsheet.css" type="text/css">
</head>
<body>
    <section>
    <header>
        <div class="upperSection">
            <img src="<?php echo $Configuration->get_schoolLogoImage();?>" alt="School Logo" class="schLogo">
            <div class="textArea">
            <h1 class="schName"><?php echo strtoupper($SmappDetails->school_name);?></h1>
            <p class="schScope">CRECHE, NURSERY, PRIMARY & SECONDARY</p>
            <p class="schScope"><?php echo ucwords($Configuration->getConfigData()->school_address); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_city); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_state); ?></p>
            <p class="schScope"><i>Tel:</i>  <b><?php echo ucwords($Configuration->getConfigData()->director_mobile); ?>,
            <?php echo ($Configuration->getConfigData()->principal_mobile); ?></b></p>
            </div>
        </div>   <hr>
 
        <H1 align="center">BROADSHEET RESULT FOR <?php echo $session; ?> SESSION <b>|</b>TERM: <?php echo strtoupper($term);?> <B>|</B> CLASS: <?php echo strtoupper($student_class);?> </H1>
        <BR>
    </header>
 
    <main>
        <div class="fet-broadsheet">
            <table>
                <thead>
                    <td width="20">S/N</td>
                    <td width="40">ADM NO.</td>
                    <td width="150">NAME OF STUDENT</td>
                    <?php 
                    foreach ($subjectList as $subject) {?> 
                       <td width="60"><?php echo strtoupper($subject->subject_name) ?></td>
                    <?php }
                     ?>
                    <td width="60">NO OF SUBJECTS OFFERED</td>
                    <td width="60">TOTAL MARKS OBTAINABLE</td>
                    <td width="60">TOTAL MARKS OBTAINED</td>
                    <td width="60">AVERAGE SCORE</td>
                    <td width="60">POSITION</td>
                </thead>
                <?php 
                $getBroadSheet = $Student->getStudentsByClassName($student_class);
                if ($getBroadSheet) {
                    foreach ($getBroadSheet as $value) {?>
                        <tr>
                    <td width="20">1</td>
                    <td width="40"><?php echo $value->stdRegNo; ?></td>
                    <td width="150"><?php echo $value->full_name; ?></td>
                    <td width="60" align="center">56</td>
                    <td width="60" align="center">74</td>
                    <td width="60" align="center">88</td>
                    <td width="60" align="center">57</td>
                    <td width="60" align="center">62</td>
                    <td width="60" align="center">53</td>
                    <td width="60" align="center">54</td>
                    <td width="60" align="center">-</td>
                    <td width="60" align="center">-</td>
                    <td width="60" align="center">-</td>
                    <td width="60" align="center">-</td>
                    <td width="60" align="center">56</td>
                    <td width="60" align="center">9</td>
                    <td width="60" align="center">900</td>
                    <td width="60" align="center">566</td>
                    <td width="60" align="center">62.89</td>
                    <td width="60">3rd</td>
                </tr>
                        <?php
                       
                    }
                }
                 ?>
                  
            </table>
        </div>
        <br>
        <div > <p align="right" color="white">Prepared by FET</p></div>
    </main>
</section>
</body>
</html>