<?php
date_default_timezone_set("Africa/Lagos");
require_once "helpers/helper.php";

if (isset($_GET['data']) && $_GET['data'] != "") {
  $student_reg = $Configuration->Clean($Configuration->convert_String("decode",$_GET['data']));
  $testimonial_data = $Student->getTestimonialByRegNo($student_reg);
  if (!$testimonial_data) {
    $Configuration->redirect("generate-testimonial");
    exit();
  }
    $student_data = $Student->get_student_data_byRegNo($student_reg);
} else {
    $Configuration->redirect("generate-testimonial");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo strtoupper ($SmappDetails->school_name); ?> - Certificate for - <?php echo $student_data->full_name;?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin><link href="https://fonts.googleapis.com/css2?family=Aclonica&family=Gwendolyn:wght@700&family=Satisfy&family=Special+Elite&display=swap" rel="stylesheet">
    <style> @import url('https://fonts.googleapis.com/css2?family=Aclonica&family=Gwendolyn:wght@700&family=Satisfy&family=Special+Elite&display=swap'); </style>
</head>
<body>
<?php include_once "template/testimonialcss.php";?>
    <main>
        <section>
            <nav><em>SSC / Cert. No.</em> <br><b><?php echo $testimonial_data->cert_no;?></b></nav>
            <div>
            <div class="fet-upper-part">
                    <div class="fet-sch-name"> <?php echo strtoupper ($SmappDetails->school_name); ?></div>
                    <div><span class="fet-schScope fet-levels">CRECHE, NURSERY, PRIMARY & SECONDARY</span> </div>
                    <p class="fet-schScope"><?php echo ucwords($Configuration->getConfigData()->school_address); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_city); ?>,
          <?php echo ucwords($Configuration->getConfigData()->school_state); ?>.</p>
                    <p class="fet-schScope"><i>Tel:</i>  <b><?php echo ucwords($Configuration->getConfigData()->director_mobile); ?>,
            <?php echo ($Configuration->getConfigData()->principal_mobile); ?></b></p>
                    </div>
                    <img src="<?php echo $Configuration->get_schoolLogoImage(); ?>" alt="School Logo" class="fet-schLogo">
                    <p class="fet-cert-name">Testimonial</p>
                    <p class="fet-intro">This is to certify that</p>
                    <?php if ($student_data->stdPassport == NULL || $student_data->stdPassport == "") : ?>
                    <?php if ($student_data->stdGender == "Male") : ?>
                    <img src="../schoolImages/students/male.png" alt="passport" class="fet-passport">
                    <?php else : ?>
                    <img src="../schoolImages/students/female.png" alt="passport" class="fet-passport">
                    <?php endif ?>
                    <?php else : ?>
                    <img src="../schoolImages/students/<?php echo $student_data->stdPassport; ?>" alt="passport" class="fet-passport">
                    <?php endif ?>
                </div>
                <div class="fet-nameOfStudent">
                    <p><?php echo strtoupper($student_data->full_name);?></p>
                    <p class="fet-name-uline"></p>
                </div>
                <div>
                    <p style="text-align:center; font-size:20px; margin-top: -2px;margin-bottom: -1px;">has successfully completed Senior Secondary School.</p>
                </div>
                <div class="fet-entrybg">
                    <p style="text-align:left; font-size:20px; font-style: italic;line-height: 18px;">Class on Admission:_________________________ Date Admitted:________________</p>
                    <div class="fet-entrybg-values">
                        <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper($testimonial_data->admitted_class);?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo strtoupper(date("M., Y", strtotime($testimonial_data->admitted_date)));?></p></div>
                    <p style="text-align:left; font-style: italic;font-size:20px;">Admission No:__________________________________________________________</p>
                    <div class="fet-entrybg-values">
                        <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->stdRegNo;?></p></div>
                    <p style="text-align:left;font-style: italic; font-size:20px;">Class Completed:___________________________ Date Completed:_______________</p>
                </div>
                <div class="fet-entrybg-values1">
                   <p style="text-align:left; font-size:25px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->class_completed;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;<?php echo strtoupper( date("M., Y",strtotime($testimonial_data->date_completed)));?></p>
                </div>

                <div class="fet-subject-offered">
                    <div>
                        <p>1. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject1;?></p>
                        <p class="fet-ln-un"></p>
                        <p>2. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject2;?></p>
                        <p class="fet-ln-un"></p>
                        <p>3. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject3;?></p>
                        <p class="fet-ln-un"></p>
                        <p>4. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject4;?></p>
                        <p class="fet-ln-un"></p>
                        <p>5. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject5;?></p>
                        <p class="fet-ln-un"></p>
                    </div>
                    <div>
                        <p>6. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject6;?></p>
                        <p class="fet-ln-un"></p>
                        <p>7. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject7;?></p>
                        <p class="fet-ln-un"></p>
                        <p>8. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject8;?></p>
                        <p class="fet-ln-un"></p>
                        <p>9. &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject9;?></p>
                        <p class="fet-ln-un"></p>
                        <p>10. &nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->subject10;?></p>
                        <p class="fet-ln-un"></p>
                        <p class="fet-ln-un"></p>
                       
                    </div>
                </div>

                <div class="fet-other-info">
                    <div class="fet-entrybg">
                        <p style="text-align:left; font-size:20px; font-style: italic;line-height: 18px;">Academic Ability:_________________ Ability in Sports/Games:___________________</p>
                        <div class="fet-entrybg-values">
                            <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->academic_ability;?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php echo $testimonial_data->sports_ability;?></p></div>
                        <p style="text-align:left; font-style: italic;font-size:20px;">Club/Society membership:_________________________________________________</p>
                        <div class="fet-entrybg-values">
                            <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->school_club;?></p></div>
                        <p style="text-align:left;font-style: italic; font-size:20px;">School Office Held:______________________________________________________</p>
                        <div class="fet-entrybg-values">
                            <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->office_held;?></p></div>
                        <p style="text-align:left;font-style: italic; font-size:20px;">Conduct and Character:__________________________________________________</p>
                        <div class="fet-entrybg-values">
                            <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->student_character;?></p></div>
                        <p style="text-align:left;font-style: italic; font-size:20px;">General Remarks:_______________________________________________________</p>
                        <div class="fet-entrybg-values">
                            <p style="text-align:left; font-size:25px; line-height: 18px;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $testimonial_data->general_remarks;?></p></div>
                    </div>
                </div>
            </div>
            <!-- bottom part -->
            <div class="fet-signature">
                <div class="fet-sign-director">
                   
                    <p><b><em>Any alteration renders this document invalid.</em> </b></p>
                    <img src="../schoolImages/Logo/sign.png" alt="Director's Sign" width="100" height="auto">
                    <p style="border-top: 1.5px dashed black;">Director of Studies</p>
                </div>
                <div class="fet-sign-principal">
                    <p><img src="../schoolImages/Logo/stamp.png" alt="" width="150" height="auto"></p>
                </div>
            </div>
            <!-- Repeated bg -->
            <p id="fet-bg-repeat"><?php for($i=1; $i<185; $i++){
                    echo  '<span>&nbsp; &nbsp;'.strtoupper ($SmappDetails->school_name).'&nbsp; &nbsp;</span> ';
            } ?> 
           </p>
        </section>
    </main>
    <!-- <button type="button" style="text-align: center;justify-content: center; justify-items: center; margin-top:20px;" onclick="window.print();">Print Now</button> -->
    <script>
       document.addEventListener('DOMContentLoaded', printPage, false);
function printPage () {
    window.print();
}
    </script>
</body>
</html>