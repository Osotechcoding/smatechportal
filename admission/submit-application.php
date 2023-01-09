<?php
if (!file_exists("Includes/Osotech.php")) {
  die("Access to this Page is Denied! <p>Please Contact Your Administrator for assistance</p>");
}
require_once("Includes/Osotech.php");
$Osotech = new Osotech();
$Osotech->osotech_session_kick();
date_default_timezone_set("Africa/Lagos");

if(!$Osotech->checkAdmissionPortalStatus()){
    header("Location:" . APP_ROOT);
    exit();
}
if(isset($_GET['email']) && isset($_GET['code']) && !$Osotech->isEmptyStr($_GET['email']) && !$Osotech->isEmptyStr($_GET['code'])){
    $email = $Osotech->Clean($_GET['email']);
    $code = $Osotech->Clean($_GET['code']);
$applicant_data = $Osotech->get_double_data("visap_student_tbl","stdEmail",$email,"stdConfToken",$code);
if(!$applicant_data){
    header("Location:" . APP_ROOT);
    exit();  
}
}else{
    header("Location:" . APP_ROOT);
    exit();  
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
    <?php include_once ("MetaTags.php");?>
        <title>Student Admission Portal :: <?php echo ($Osotech->getConfigData()->school_name); ?></title>
        <!-- Favicon-->
       
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="asset/css/styles.css" rel="stylesheet" />
        <style type="text/css">
            .fet-card{
                background-color: whitesmoke;
                padding: 10px; 
                border-radius: 25px;
                 color: black;
        box-shadow: -10px 8px 5px 8px rgba(0,0,0,0.75);
        -webkit-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
        -moz-box-shadow: -13px 8px 5px 6px rgba(0,0,0,0.75);
            }
        </style>
    </head>
    <body class="d-flex flex-column h-100">
        <main class="flex-shrink-0">
            <!-- Navigation-->
            <nav class="navbar navbar-expand-lg navbar-dark bg-success">
                <div class="container px-5">
                    <a class="navbar-brand" href="index.html"><img src="<?php echo $Osotech->get_schoolLogoImage(); ?>" alt="" class="img-fluid brand-logo" width="50" style="margin-right: 10px;"> Flat ERP Technologies</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse text-white" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                            <li class="nav-item text-white"><a class="nav-link" href="./">Home</a></li>
                            <li class="nav-item text-white"><a class="nav-link" href="faq.html">FAQ</a></li>
                             <li class="nav-item text-white"><a class="nav-link" href="contact.html">Help?</a><li>
                            
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" id="navbarDropdownPortfolio" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Apply</a>
                                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownPortfolio">
                                    <li><a class="dropdown-item" href="portfolio-item.html">Application Procedure</a></li>
                                    <li><a class="dropdown-item" href="portfolio-item.html">Fee & Payment Details</a></li>
                                    <li><a class="dropdown-item" href="portfolio-item.html">Entrance Exam Date</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <!-- Header-->
            <header class="bg-danger py-2">
                <div class="container px-5">
                    <div class="row gx-5 align-items-center justify-content-center">
                        <div class="col-lg-8 col-xl-7 col-xxl-6">
                            <div class="my-5 text-center text-xl-start">
                                <h1 class="display-5 fw-bolder text-white mb-2">Welcome to student admission portal</h1>
                                <p class="lead fw-normal text-white mb-3">Please click on <b style="background-color: black;border-radius: 10px; padding: 2px 5px ;">Apply</b> at the right hand corner of this page to read the instruction on how to apply!</p>
                                <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                    <a class="btn btn-primary btn-lg px-4 me-sm-3" href="<?php echo EPORTAL_ROOT; ?>" target="_blank">Student Portal</a>
                                    <a class="btn btn-outline-light btn-lg px-4" href="javascript:void(0);">Purchase Scratch Card</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center"><img class="img-fluid rounded-3 my-5" src="asset/scratch-Card1.jpg" alt="..." /></div>
                    </div>
                </div>
            </header>
            <!-- Features section-->
            <section class="py-5" id="features">
                <div class="container px-5 my-5">
                    <div class="card border-2 fw-bolder fet-card">
                        <div class="card-body">
                    <div class="row">
                    <div class="col-lg-12">
                                
                    <form  id="submitStudentApplicationForm" enctype="multipart/form-data" autocomplete="off">
                        <div class="row">
                        
  <h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">Student Bio Data </h4>
  <div class="col-md-4 mb-2">
  <input type="hidden" name="action" value="submit_second_step_admission">
    <input type="hidden" name="osotech_csrf"
    value="<?php echo md5('iremideoizasamsonosotech'); ?>">
    <div class="form-group">
        <label class="mb-2 text-success">Verified Email</label>
         <input type="text" class="form-control form-control-lg" name="applicant_email" readonly aria-label="Applicant Email" value="<?php echo $applicant_data->stdEmail; ?>">
    </div>
   
  </div>
  <div class="col-md-2 mb-2">
    <div class="form-group">
        <label class="mb-2 text-success"> Surname</label>
         <input type="text" class="form-control form-control-lg" name="surname"  readonly aria-label="Applicant Email" value="<?php echo $applicant_data->stdUserName; ?>">
    </div>
   
  </div>
  <div class="col-md-3 mb-2">
    <div class="form-group">
        <label class="mb-2 text-success">Application NO</label>
         <input type="text" readonly class="form-control form-control-lg" value="<?php echo $applicant_data->stdRegNo; ?>">
    </div>
  </div>
  <div class="col-md-3 mb-2">
    <div class="form-group">
        <label class="mb-2 text-success">Admission Level</label>
         <input type="text" readonly class="form-control form-control-lg" value="<?php echo $applicant_data->studentClass; ?>">
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label class="mb-2">First Name</label>
         <input type="text" class="form-control form-control-lg" name="first_name" placeholder="First name" aria-label="First name">
    </div>
   
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label class="mb-2">Other Names</label>
         <input type="text" class="form-control form-control-lg" name="middle_name" placeholder="Other Names" aria-label="Other Names">
    </div>
   
  </div>
  
  <div class="col-md-2 mb-2">
    <div class="form-group">
        <label class="mb-2">Birth Day</label>
        <select class="form-select custom-select form-control form-control-lg" name="day">
            <option value="" selected> Choose...</option>
            <?php for ($i=1; $i <=31 ; $i++) { 
                echo '<option value="'.$i.'" >'.$i.'</option>';
            } ?>
        </select>
    </div>
  </div>
  <div class="col-md-2 mb-2">
    <div class="form-group">
        <label class="mb-2">Birth Month</label>
        <select class="form-select custom-select form-control form-control-lg" name="month">
            <option value="" selected> Choose...</option>
            <?php for( $m=1; $m<=12; ++$m ) { 
          $month_label = date('F', mktime(0, 0, 0, $m, 1));
        ?>
          <option value="<?php echo $month_label; ?>"><?php echo $month_label; ?></option>
        <?php } ?>
        </select>
    </div>
  </div>
  <div class="col-md-2 mb-2">
    <div class="form-group">
        <label class="mb-2">Birth Year</label>
        <select class="form-select custom-select form-control form-control-lg" name="year">
            <option value="" selected> Choose...</option>
            <?php 
          $year = date('Y');
          $min = $year - 28;
          $max = $year;
          for( $i=$max; $i>=$min; $i-- ) {
            echo '<option value='.$i.'>'.$i.'</option>';
          }
        ?>
        </select>
    </div>
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label class="mb-2">Gender</label>
        <select class="form-select custom-select form-control form-control-lg" name="gender">
            <option value="" selected> Choose...</option>
            <option value="Male"> Male</option>
            <option value="Female"> Female</option>
        </select>
    </div>
   
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label for="birth_cert">Birth Certification </label>
      <select name="birth_cert" id="birth_cert" class="custom-select form-control form-control-lg">
        <option value="" selected>Choose...</option>
        <option value="Certificate">Certificate</option>
        <option value="Affidavit">Affidavit </option>
        <option value="None">None </option>
      </select>
    </div>
   
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
         <label for="nationality">NATIONALITY</label>
          <select name="nationality" id="nationality" class="custom-select form-control form-control-lg">
            <option value="" selected>Choose...</option>
            <option value="Nigerian">Nigerian</option>
            <option value="Non Nigerian">Non Nigerian </option>
          </select>
    </div>
   
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
         <label for="state_origin">STATE OF ORIGIN</label>
      <select name="state_origin" id="state_origin" class="custom-select form-control form-control-lg">
        <option value="" selected>Choose...</option>
         <?php echo $Osotech->get_states_of_origin_InDropDown(); ?> 
      </select>
    </div>
   
  </div>
  <div class="col-md-6 mb-2">
    <div class="form-group">
        <label for="localgovt">LGA OF ORIGIN</label>
      <select name="local_govt" id="localgovt" class="custom-select form-control form-control-lg"
        required></select>
    </div>
   
  </div>
 
  <div class="col-md-3 mb-2">
    <div class="form-group">
       <label for="hometown">Home Town</label>
      <input type="text" name="hometown" class="form-control form-control-lg" id="hometown"
        placeholder="Home town" aria-label="Home Town">
    </div>
   
  </div>
   <div class="col-md-3 mb-2">
    <div class="form-group">
        <label for="religion">RELIGION</label>
      <select name="religion" id="religion" class="custom-select form-control form-control-lg">
        <option value="" selected>Choose...</option>
        <option value="Christianity">Christianity</option>
        <option value="Islamic">Islamic </option>
        <option value="Other"> Other </option>
      </select>
    </div>
  </div>
  
  <div class="col-md-6 mb-3">
<div class="form-group">
  <label for="challenges">CHALLENGES THAT IMPACT ABILITY</label>
  <select name="challenges" id="challenges" class="custom-select form-control form-control-lg">
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
<div class="col-md-12 mb-2">
    <div class="form-group">
      <label for="home_address">Home Address </label>
      <textarea name="home_address" class="form-control form-control-lg" placeholder="Home Address"></textarea>
    </div>
  </div>
<h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">FATHER/MALE GUARDIAN DETAILS </h4>
                         
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label>Title </label>
                                <input type="text" autocomplete="off" name="mg_title" class="form-control form-control-lg"
                                  placeholder="High Chief">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" autocomplete="off" name="mg_name" class="form-control form-control-lg"
                                  placeholder="Prof. Hamad Sani O">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Relationship </label>
                                <input type="text" autocomplete="off" name="mg_relation" class="form-control form-control-lg"
                                  placeholder=" Father">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Phone </label>
                                <input type="text" autocomplete="off" name="mg_phone" class="form-control form-control-lg"
                                  placeholder="082135432123">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Email </label>
                                <input type="text" autocomplete="off" name="mg_email" class="form-control form-control-lg"
                                  placeholder=" myfather@gmail.com" />
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Occupation </label>
                                <input type="text" autocomplete="off" name="mg_occu" class="form-control form-control-lg"
                                  placeholder="Doctor" />
                              </div>
                            </div>
                            <div class="col-md-12 mb-3">
                              <div class="form-group">
                                <label> Address </label>
                                <textarea type="text" autocomplete="off" name="mg_address" class="form-control form-control-lg"
                                  placeholder=" Sango Ota Ogun State"></textarea>
                              </div>
                            </div>
                          <h3 class="text-center fw-bolder text-uppercase mt-3 text-muted">MOTHER/FEMALE GUARDIAN DETAILS</h3>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label>Title </label>
                                <input type="text" autocomplete="off" name="fg_title" class="form-control form-control-lg"
                                  placeholder="High Chief">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label>Full Name</label>
                                <input type="text" autocomplete="off" name="fg_name" class="form-control form-control-lg"
                                  placeholder="Osotech Software">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Relationship </label>
                                <input type="text" autocomplete="off" name="fg_relation" class="form-control form-control-lg"
                                  placeholder="Mother">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Phone </label>
                                <input type="text" autocomplete="off" name="fg_phone" class="form-control form-control-lg"
                                  placeholder="082135432123">
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Email </label>
                                <input type="text" autocomplete="off" name="fg_email" class="form-control form-control-lg"
                                  placeholder="mymother@gmail.com" />
                              </div>
                            </div>
                            <div class="col-md-6 mb-3">
                              <div class="form-group">
                                <label> Occupation </label>
                                <input type="text" autocomplete="off" name="fg_occu" class="form-control form-control-lg"
                                  placeholder="Doctor" />
                              </div>
                            </div>
                            <div class="col-md-12 mb-3">
                              <div class="form-group">
                                <label> Address </label>
                                <textarea type="text" autocomplete="off" name="fg_address" class="form-control form-control-lg"
                                  placeholder=" Sango Ota Ogun State"></textarea>
                              </div>
                            </div>
                            <h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">(Previous School
                        Information)</h4>
                         <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>School Name</label>
                              <input type="text" autocomplete="off" class="form-control form-control-lg" name="prev_schoolname"
                                placeholder="Name of your Previous school">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Name of Director/Proprietress</label>
                              <input type="text" autocomplete="off" class="form-control form-control-lg" name="proprietress"
                                placeholder="e.g Mr. Ayomide Hamad">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Previous School Phone </label>
                              <input type="text" autocomplete="off" class="form-control form-control-lg" name="prev_schl_phone"
                                placeholder="Previous School Phone">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="prev_schl_loca">SCHOOL LOCATION</label>
                              <select name="prev_schl_loca" class="custom-select form-control form-control-lg">
                                <option value="" selected>Choose...</option>
                                <option value="Urban">Urban</option>
                                <option value="Rural">Rural </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="edu_offered">LEVEL OF EDUCATION OFFERED </label>
                              <select name="edu_offered" id="edu_offered" class="custom-select form-control form-control-lg">
                                <option value="" selected>Choose...</option>
                                <option value="PRIMARY ONLY">PRIMARY ONLY</option>
                                <option value="SECONDARY ONLY"> SECONDARY ONLY</option>
                                <option value="PRIMARY &amp; SECONDARY">PRIMARY &amp; SECONDARY</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="category">SCHOOL CATEGORY </label>
                              <select name="category" id="category" class="custom-select form-control form-control-lg">
                                <option value="" selected>Choose...</option>
                                <option value="PUBLIC">PUBLIC</option>
                                <option value="PRIVATE">PRIVATE</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>YOUR PRESENT CLASS </label>
                              <input type="text" class="form-control form-control-lg" name="present_class"
                                placeholder="Enter Your Present Class here">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>REASON FOR CHANGE OF SCHOOL </label>
                              <input type="text" name="reason_to" class="form-control form-control-lg">
                            </div>
                          </div>
                         <!--  <div class="col-md-6 mb-3">
                         <div class="form-group">
                             <label for="report_sheet">LAST REPORT SHEET <span class="text-danger">(Scanned)</span> </label>
                             <input type="file" class="form-control-file form-control" id="report_sheet" name="report_sheet">
                         </div>
                     </div> -->
                      <h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">(STUDENT MEDICAL HISTORY)</h4>
                      <h3 class=" text-center text-muted mt-2">PERSONAL HOSPITAL/CLINIC DETAILS</h3>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Personal Hospital </label>
                              <input type="text" class="form-control form-control-lg" name="hospital_name"
                                placeholder="Lifeline Hospital">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Owner's Name (Doctor)</label>
                              <input type="text" class="form-control form-control-lg" name="doctor_name" placeholder="Dr. Hamad Bello">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label>Hospital Phone </label>
                              <input type="number" name="phone" class="form-control form-control-lg" placeholder="080********">
                            </div>
                          </div>
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="member_since">Personal Hospital Since </label>
                              <input type="date" class="form-control form-control-lg" name="member_since">
                            </div>
                          </div>
                          <div class="col-md-12 mb-3">
                            <div class="form-group">
                              <label>Hospital Address </label>
                              <textarea name="address" class="form-control form-control-lg" placeholder="Hospital Address"></textarea>
                            </div>
                          </div>
                        </div>
                        <h3 class="text-muted text-center mt-3">STUDENT HEALTH INFO</h3>
                        <div class="row">
                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="blood_group">Blood Group</label>
                              <select name="blood_group" class="custom-select form-control form-control-lg">
                                <option selected>Choose...</option>
                                <option value="A+">A+ Positive</option>
                                <option value="A-">A- Negative</option>
                                <option value="B+">B+ Positive</option>
                                <option value="B-">B- Negative</option>
                                <option value="AB+">AB+ Positive</option>
                                <option value="AB-">AB- Negative</option>
                                <option value="O+">O+ Positive</option>
                                <option value="O-">O- Negative</option>
                              </select>
                            </div>
                          </div>

                          <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <label for="genotype">Genotype</label>
                              <select name="genotype" class="custom-select form-control form-control-lg">
                                <option selected>Choose...</option>
                                <option value="AA">AA</option>
                                <option value="AS">AS </option>
                                <option value="AC">AC </option>
                                <option value="SS">SS </option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <label for="illness">FREQUENT ILLNESS</label>
                              <input type="text" class="form-control form-control-lg" name="illness" placeholder="Cough">
                            </div>
                          </div>

                          <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <label for="hospitalized">Have you Been Hospitalized?</label>
                              <select name="hospitalized" id="hospitalized" class="form-control form-control-lg">
                                <option value="" selected>Choose...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                              </select>
                            </div>
                          </div>
                          <div class="col-md-4 mb-3">
                            <div class="form-group">
                              <label for="surgical_operation">Any Surgical Operation?</label>
                              <select name="surgical_operation" id="surgical_operation" class="custom-select form-control form-control-lg">
                                <option value="">Choose...</option>
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                                <option value="I Don Not know">I don't Know</option>
                              </select>
                            </div>
                          </div>

                          <h4 class="text-center fw-bolder text-uppercase mt-3 text-muted">(Student Passport)
                      </h4>
                      <center>
                      <div class="col-md-6" id="uploaded_passport">
                              <img id="previewImg" width="200" src="asset/male.png" alt="Placeholder"
                                style="border: 5px solid darkblue;border-radius:10px;">
                              <p class="text-center text-muted">Image Size: <span id="ImageSize"></span></p>
                            </div>
                            <div class="col-md-6 mb-3">
                            <div class="form-group">
                              <i class="text-danger">Please Note that Passport size must not exceed 20KB and
                                dimension should be (100 x 100 pixels)</i>
                              <label for="student_passport">Choose Passport</label>
                              <input type="file" class="form-control custom-file form-control-lg" name="student_passport"
                                id="student_passport" onchange="previewFile(this);">
                            </div>
                          </div>
                      </center>
                          <p class="mt-2 text-danger"><input type="checkbox" class="checkbox__input"> <b>By submitting
                              your admission form you agree to the Terms and Condition of </b> <strong
                              class="text-info">
                               <?php echo ($Osotech->getConfigData()->school_name); ?>
                              <?php echo ($Osotech->getConfigData()->school_state); ?> 
                               </strong></p>
                        </div>

                 </div>
                        </div>

<button class="btn btn-dark btn-block float-end btn-lg mt-3 __loadingBtn__">Submit Application Form</button>
</div>
                               </form>
                               
                               <center><div id="server-response"></div> </center>
                            </div>
                       
                    </div>
                    </div>
                    </div>
                </div>
            </section>
           
        </main>
     <!-- Footer-->
     <footer class="bg-danger py-4 mt-auto">
            <div class="container px-5">
                <div class="row align-items-center justify-content-between flex-column flex-sm-row">
                    <div class="col-auto"><div class="normal m-0 text-white">Copyright &copy; Flat ERP Technologies 2022</div></div>
                    <div class="col-auto">
                        <a class="link-light small" href="#!">Privacy</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Terms</a>
                        <span class="text-white mx-1">&middot;</span>
                        <a class="link-light small" href="#!">Contact</a>
                    </div>
                </div>
            </div>
        </footer>
      
        <!-- Bootstrap core JS-->
        <script src="assets/js/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
       
        <script src="js/scripts.js"></script>

        <script>
  $(document).ready(function() {
    $(".__loadingBtn__").html('Submit Application Form').attr("disabled", true);
    const ADMISSION_FORM_SUBMIT = $("#submitStudentApplicationForm");
    ADMISSION_FORM_SUBMIT.on("submit", function(evt) {
      evt.preventDefault();
      if ($('.checkbox__input').is(":checked") == true) {
        $.ajax({
          url: "Includes/actions",
          type: "POST",
          data: new FormData(this),
          contentType: false,
          cache: false,
          processData: false,
          beforeSend() {
            $(".__loadingBtn__").html('<img src="rolling_loader.svg" width="30"> Please wait...').attr(
              "disabled", true);
          },
          success: function(data) {
            setTimeout(() => {
              $(".__loadingBtn__").html('Submit Application Form').attr("disabled", false);
              $("#server-response").html(data);
            }, 2000);
          }
        });
      } else {
        alert('You need to agree to the Terms and Condition before submitting your application form')
      }

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
        <script>
  function previewFile(input) {
    var file = $("#student_passport").get(0).files[0];
    $(".__loadingBtn__").html('Submit Application Form').attr("disabled", true);
    if (file) {
      var reader = new FileReader();
      reader.onload = function() {
        $("#previewImg").attr("src", reader.result);
        //$("#imagename").html(file.name);
        $("#ImageSize").html((file.size / 1024).toFixed(2) + "KB");
        if ((file.size / 1024) > 20) {
          $(".__loadingBtn__").html('Submit Application Form').attr("disabled", true);
        } else {
          $(".__loadingBtn__").html('Submit Application Form').attr("disabled", false);
        }
      }
      reader.readAsDataURL(file);
    }
  }
  </script>
    </body>
</html>
