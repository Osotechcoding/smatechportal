<?php
// @session_start();
/**
 * 
 */
// include_once "initialize.php";
include_once "Database.php";
include_once "OsotechMailer.php";
class Osotech
{
  private $dbh;
  protected $stmt;
  protected $response;
  private $OsotechMailer;


  function __construct()
  {
    if ((substr($_SERVER['REQUEST_URI'], -4) == ".php") or (stripos($_SERVER['REQUEST_URI'], ".php") == true)) {
      $this->redirect_root("error");
    }

    $this->dbh = osotech_connect();
  }

  public function osotech_session_kick()
  {
     session_start();
  }

  public function redirect_root($flink)
  {
    header("Location: " . ADMISSION_PORTAL_ROOT . $flink);
    exit();
  }
  public function Clean($data)
  {
    if (!$this->isEmptyStr($data)) {
      $string = trim($data);
      $string = stripslashes($string);

      $string = htmlspecialchars($string);
      return $string;
    }
  }

  function saltifyString($string)
  {
    return urlencode(base64_encode($string));
  }

  function unsaltifyString($string)
  {
    return base64_decode(urldecode($string));
  }

  public function check_single_data($table, $field, $field_val)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=?");
    $this->stmt->execute(array($field_val));
    if ($this->stmt->rowCount() > 0) {
      $this->response = true;
      return $this->response;

    }
  }
  public function isEmptyStr($str)
  {
    return ($str === "" || empty($str)) ? true : false;
  }
  public function is_Valid_Email($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->response = true;
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  public function check_string_lenght_greater(int $len, $string)
  {
    if (!$this->isEmptyStr($string) && is_string($string)) {
      $result = (strlen($string) > $len) ? true : false;
    }
  }
  public function check_string_lenght_lesser(int $len, $string)
  {
    if (!$this->isEmptyStr($string) && is_string($string)) {
      $result = (strlen($string) < $len) ? true : false;
    }
  }

  public function alert_msg($alert_type = "warning", $alert_title = "", $alert_msg = "")
  {
    $this->response = '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert"><h5><strong>' . $alert_title . '!</strong> ' . $alert_msg . '</h5>
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
    return $this->response;
  }

  //LOAD CAPTCHA
  public function loadOsotechCaptcha()
  {
    return '<script> $("#captcha_load").load("osotech_captcha.php");</script>';
  }
  /*ADMISSION REGISTRATION STEP ONE*/
  public function process_first_step_admission($data)
  {
    $this->OsotechMailer = new OsotechMailer();
    $captcha_correct = $this->Clean($data['captcha_correct_answer']);
    $user_captcha_anwser = $this->Clean($data['user_captcha_anwser']);
    $osotech_csrf = $this->Clean($data['osotech_csrf']);
    $card_pin = $this->Clean($data['card_pin']);
    $card_serial = $this->Clean($data['card_serial']);
    $stu_class = $this->Clean($data['class_level']);
    $stu_phone = $this->Clean($data['student_phone']);
    $stu_type = $this->Clean($data['student_type']);
    $surname = $this->Clean($data['username']);
    $stu_email = $this->Clean($data['student_email']);
    //check for Auth access
    if ($this->isEmptyStr($osotech_csrf) || $osotech_csrf !== md5("iremideoizasamsonosotech")) {
      $this->response = $this->alert_msg("danger", "WARNING", "Authentication Failed, Please Check your Connection and Try again!") . $this->loadOsotechCaptcha();
    } elseif ($this->isEmptyStr($card_pin) || $this->isEmptyStr($card_serial) || $this->isEmptyStr($stu_class) || $this->isEmptyStr($stu_phone) || $this->isEmptyStr($surname) || $this->isEmptyStr($stu_email) || $this->isEmptyStr($user_captcha_anwser) || $this->isEmptyStr($stu_type)) {
      $this->response = $this->alert_msg("danger", "WARNING", "Invalid submission, All fields are Required!") . $this->loadOsotechCaptcha();
    } elseif (!$this->is_Valid_Email($stu_email)) {
      $this->response = $this->alert_msg("danger", "WARNING", "<b>$stu_email</b> is not a valid e-mail address!") . $this->loadOsotechCaptcha();
    } elseif ($this->check_single_data("visap_student_tbl", "stdEmail", $stu_email)) {
      $this->response = $this->alert_msg("danger", "WARNING", "<b>$stu_email</b> is already taken on this portal!") . $this->loadOsotechCaptcha();
    } elseif ($this->check_single_data("visap_staff_tbl", "staffEmail", $stu_email)) {
      $this->response = $this->alert_msg("danger", "WARNING", "You cannot register with this <b>$stu_email</b> on this portal") . $this->loadOsotechCaptcha();
    } elseif (!$this->validate_Mobile_Number($stu_phone)) {
      $this->response = $this->alert_msg("danger", "WARNING", "This Phone Number $stu_phone format is not allowed, Use this format: 00000000000") . $this->loadOsotechCaptcha();
      //lets check if the PIN character is valid without connecting to db
    } elseif ($this->check_string_lenght_greater(13, $card_pin) || $this->check_string_lenght_lesser(13, $card_pin)) {
      // code...
      $this->response = $this->alert_msg("danger", "WARNING", "You have entered an incorrect Card Pin! Re-check Your card Pin & try again") . $this->loadOsotechCaptcha();
    } elseif ($user_captcha_anwser <> $captcha_correct) {
      $this->response = $this->alert_msg("danger", "WARNING", "Incorrect CAPTCHA Value Entered!") . $this->loadOsotechCaptcha();
    } else {
      //lets connect to db and check the status of the Pin
      //SELECT * FROM `tbl_reg_pins, pin_code,pin_serial,pin_status=0;
      $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE pin_code=? AND pin_serial=? LIMIT 1");
      $this->stmt->execute(array($card_pin, $card_serial));
      //check the row returns
      if ($this->stmt->rowCount() == 1) {
        //let check if the CARD PIN has been Used
        //fetch the card details
        $card_details = $this->stmt->fetch();
        $pinStatus = $card_details->pin_status;
        $pinCode = $card_details->pin_code;
        $pinSerial = $card_details->pin_serial;
        $pinDate = $card_details->created_at;
        $pinPrice = $card_details->price;
        $pinId = $card_details->pin_id;
        if ($pinStatus == '1') {
          // code...
          $this->response = $this->alert_msg("danger", "WARNING", "DO NOT PLAY SMART! This Card has been Used!") . $this->loadOsotechCaptcha();
        } else {
          //let begin with the registration
          //student Login Credentials
          
          $portal_password = strtolower($surname); //student surname is the login password
          $hashed_password = $this->osotech_password_encryption($portal_password);
          try {
            $this->dbh->beginTransaction();
            $date = date("Y-m-d");
            $admitted_year = date("Y");
            $time = date("h:i:s");
            $admission_no = $this->generate_admission_number($admitted_year);
            $confirmation_code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
            $this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_tbl`(stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdPhone,stdApplyType,stdApplyDate,stdConfToken) VALUES(?,?,?,?,?,?,?,?,?,?);");
            if ($this->stmt->execute(array($admission_no, $stu_email, $surname, $hashed_password, $stu_class,$surname, $stu_phone, $stu_type, $date, $confirmation_code))) {
              // grab the LastInsertId...
              //let change the Pin Used status
              $change_status = 1;
              $this->stmt = $this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=?,usedBy=? WHERE pin_id=? LIMIT 1");
              if ($this->stmt->execute(array($change_status, $admission_no, $pinId))) {
                //let create a Pin Used History
                $this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code,pin_serial,dated,timed) VALUES (?,?,?,?,?);");
                if ($this->stmt->execute(array($admission_no, $pinCode, $pinSerial, $date, $time))) {
                  //create email verification link to complete admission
                  $expire_date = date("Y-m-d h:i:s", strtotime('+ 10day'));
                  $school_name = $this->getConfigData()->school_name;
                  $link = ADMISSION_PORTAL_ROOT."submit-application?email=$stu_email&code=$confirmation_code&page=2";
                if($this->OsotechMailer->sendAdmissionVerificationEmail($stu_email,$surname,$link,$expire_date,$school_name) == true){
                  $this->dbh->commit();
                  $this->response = $this->alert_msg("success", "SUCCESS", "Verification link have been sent to <b>$stu_email</b>  click on the link to complete your admission!")."<script>setTimeout(()=>{
                    $('#new_Student_Admission_form')[0].reset();
                  },3000)</script>";
                }else{
                  $this->dbh->rollback();
                  $this->response  = $this->alert_msg("danger", "WARNING", "Error Occurred Please try again!") . $this->loadOsotechCaptcha();
                }
                 
                }
              }
            }
          } catch (PDOException $e) {
            $this->dbh->rollback();
            $this->response  = $this->alert_msg("danger", "WARNING", "Error Occurred!: Error Info: " . $e->getMessage()) . $this->loadOsotechCaptcha();
          }
        }
      } else {
        //show the user that The PIN he/she enters is not found
        $this->response = $this->alert_msg("danger", "WARNING", "Invalid Card Details!") . $this->loadOsotechCaptcha();
      }
    }
    return $this->response;
  }
  /*ADMISSION REGISTRATION STEP ONE ENDS*/

  /*ADMISSION REGISTRATION STEP TWO*/
  public function submitStudentOnlineApplication(array $data, array $file)
  {
    $osotech_csrf = $this->Clean($data['osotech_csrf']);
    $applicant_email = $this->Clean($data['applicant_email']);
    $surname =       $this->Clean($data['surname']);
    $first_name =   $this->Clean($data['first_name']);
    $middle_name =   $this->Clean($data['middle_name']);
    $day = $this->Clean($data['day']);
    $month = $this->Clean($data['month']);
    $year = $this->Clean($data['year']);
    $gender =       $this->Clean($data['gender']);
    $birth_cert =   $this->Clean($data['birth_cert']);
    $nationality =   $this->Clean($data['nationality']);
    $state_origin = $this->Clean($data['state_origin']);
    $local_gvt =     $this->Clean($data['local_govt']);
    $hometown =     $this->Clean($data['hometown']);
    $religion =     $this->Clean($data['religion']);
    $home_address = $this->Clean($data['home_address']);
    $challenges =   $this->Clean($data['challenges']);
    // 
    $mg_title =     $this->Clean($data['mg_title']);
    $mg_name =       $this->Clean($data['mg_name']);
    $mg_relation =   $this->Clean($data['mg_relation']);
    $mg_phone =     $this->Clean($data['mg_phone']);
    $mg_email =     $this->Clean($data['mg_email']);
    $mg_address =   $this->Clean($data['mg_address']);
    $mg_occu =       $this->Clean($data['mg_occu']);
    //Female guardian details
    $fg_title =     $this->Clean($data['fg_title']);
    $fg_name =       $this->Clean($data['fg_name']);
    $fg_relation =   $this->Clean($data['fg_relation']);
    $fg_phone =     $this->Clean($data['fg_phone']);
    $fg_email =     $this->Clean($data['fg_email']);
    $fg_address =   $this->Clean($data['fg_address']);
    $fg_occu =       $this->Clean($data['fg_occu']);

    $schoolname =   $this->Clean($data['prev_schoolname']);
    $proprietress = $this->Clean($data['proprietress']);
    $schl_phone =   $this->Clean($data['prev_schl_phone']);
    $prev_schl_loca =   $this->Clean($data['prev_schl_loca']);
    $edu_offered =   $this->Clean($data['edu_offered']);
    $category =   $this->Clean($data['category']);
    $present_class =   $this->Clean($data['present_class']);
    $reason_to =   $this->Clean($data['reason_to']);

    //

    $hospital_name = $this->Clean($data['hospital_name']);
    $doctor_name = $this->Clean($data['doctor_name']);
    $phone = $this->Clean($data['phone']);
    $member_since = $this->Clean(date("Y-m-d", strtotime($data['member_since'])));
    $address = $this->Clean($data['address']);
    $blood_group = $this->Clean($data['blood_group']);
    $genotype = $this->Clean($data['genotype']);
    $illness = $this->Clean($data['illness']);
    //$family_illness = $this->Clean($data['family_illness']);
    $hospitalized = $this->Clean($data['hospitalized']);
    $surgical_operation = $this->Clean($data['surgical_operation']);

    $passport_name = $file['student_passport']['name'];
    $passport_size = $file['student_passport']['size'] / 1024;
    $passport_temp = $file['student_passport']['tmp_name'];
    $passport_error = $file['student_passport']['error'];
    $allowed = array("jpg", "jpeg", "png");
    $name_div = explode(".", $passport_name);
    $image_ext = strtolower(end($name_div));
    //check for auth
    if ($this->isEmptyStr($osotech_csrf) || $osotech_csrf != md5("iremideoizasamsonosotech")) {
      $this->response = $this->alert_msg("danger", "WARNING", "Authentication Failed, Please Check your Connection and Try again!");
    } elseif (
          $this->isEmptyStr($applicant_email)||
          $this->isEmptyStr($surname)||
          $this->isEmptyStr($first_name)||
          $this->isEmptyStr($middle_name)||
          $this->isEmptyStr($day)||
          $this->isEmptyStr($month)||
          $this->isEmptyStr($year)||
          $this->isEmptyStr($gender)|| 
          $this->isEmptyStr($birth_cert)||
          $this->isEmptyStr($nationality)||
          $this->isEmptyStr($state_origin)||
          $this->isEmptyStr($local_gvt)||
          $this->isEmptyStr($hometown)||
          $this->isEmptyStr($religion)||
          $this->isEmptyStr($home_address) ||
          $this->isEmptyStr($challenges)|| 
          $this->isEmptyStr($mg_title)||
          $this->isEmptyStr($mg_name)|| 
          $this->isEmptyStr($mg_relation)||
          $this->isEmptyStr($mg_phone)||
          $this->isEmptyStr($mg_email)|| 
          $this->isEmptyStr($fg_occu)|| 
          $this->isEmptyStr($fg_address)||
          $this->isEmptyStr($fg_title)||
          $this->isEmptyStr($fg_name) || 
          $this->isEmptyStr($fg_relation)||
          $this->isEmptyStr($fg_phone) || 
          $this->isEmptyStr($fg_email) || 
          $this->isEmptyStr($fg_occu) || 
          $this->isEmptyStr($fg_address)|| 
          $this->isEmptyStr($present_class)|| 
          $this->isEmptyStr($reason_to)|| 
          $this->isEmptyStr($blood_group) ||
          $this->isEmptyStr($genotype) || 
          $this->isEmptyStr($illness) || 
          $this->isEmptyStr($hospitalized) || 
          $this->isEmptyStr($surgical_operation) ||
          $this->isEmptyStr($passport_name)
    ) {
      $this->response = $this->alert_msg("danger", "WARNING", "Please fill in all the required fields and Try again!");
    }elseif (!$this->is_Valid_Email($mg_email) || !$this->is_Valid_Email($fg_email)) {
      $this->response = $this->alert_msg("danger", "WARNING", "Invalid email address format!");
    } elseif (!in_array($image_ext, $allowed)) {
      $this->response = $this->alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!", "danger");
    } elseif ($passport_size > 25) {
      $this->response = $this->alert_msg("danger", "WARNING", "Your passport Size should not exceed 25KB, Selected file Size is :" . number_format($passport_size, 2) . "KB");
    } elseif ($passport_error != 0) {
      $this->response = $this->alert_msg("danger", "WARNING", "There was an error Uploading your passport, try again!");
    }
     else {
      //continue with the registration steps
      $applicant_data = $this->get_single_data("visap_student_tbl","stdEmail",$applicant_email);
      if (!$applicant_data){
        $this->response = $this->alert_msg("danger", "WARNING", "Unknown applicant Details, try again!");
      }else{
        $_SESSION["auth_student_applicant_id"] = $applicant_data->stdId;
        $applicant_id = $applicant_data->stdId;
      try {
        $passport_realName = $applicant_data->stdRegNo . mt_rand(10, 9999999) . "." . $image_ext;
      //lets update the student passport in the db
      $destination = "../../eportal/schoolImages/students/" . $passport_realName;
        $birthDate = $year."-".$month."-".$day;
        $birthDate = date("Y-m-d", strtotime($birthDate));
        $this->dbh->beginTransaction();
        //update the student info on student tbl
        $this->stmt = $this->dbh->prepare("UPDATE `visap_student_tbl` SET stdConfToken=NULL, stdFirstName=?, stdMiddleName=?,stdDob=?,stdGender=?,stdAddress=?,stdPassport=? WHERE stdEmail=? LIMIT 1");
        if ($this->stmt->execute(array($first_name, $middle_name, $birthDate, $gender, $home_address, $passport_realName,$applicant_email))) {
          // create the student info table
          $this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_info_tbl` (studentId,stdBirthCert,stdCountry,stdSOR,stdLGA,stdHomeTown,stdReligion,stdDisability,stdPermaAdd,stdMGTitle,stdMGName,stdMGRelationship,stdMGPhone,stdMGEmail,stdMGOccupation,stdMGAddress, stdFGTitle, stdFGName,stdFGRelationship,stdFGPhone,stdFGEmail,stdFGOccupation,stdFGAddress) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
          if ($this->stmt->execute([$applicant_id, $birth_cert, $nationality, $state_origin, $local_gvt, $hometown, $religion, $challenges, $home_address,$mg_title, $mg_name, $mg_relation, $mg_phone, $mg_email, $mg_occu, $mg_address, $fg_title, $fg_name, $fg_relation, $fg_phone, $fg_email, $fg_occu, $fg_address])) {
            $this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdpreschlinfo` (student_id,stdSchoolName,stdDirectorName,stdSchoolPhone,stdSchLocation,stdSchlCat,stdSchlEduLevel,stdPresentClass,stdReasonInPreClass) VALUES (?,?,?,?,?,?,?,?,?);");
            if ($this->stmt->execute(array($applicant_id, $schoolname, $proprietress, $schl_phone, $prev_schl_loca, $category, $edu_offered, $present_class, $reason_to))) {
              $this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdmedical_tbl` (studId,stdHospitalName,stdHospitalOwner,stdHospitalPhone,stdRegDate,stdHospitalAddress,stdBlood,stdGenotype,stdSickness,stdIsHospitalized,stdSurgical) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($applicant_id, $hospital_name, $doctor_name, $phone, $member_since, $address, $blood_group, $genotype, $illness, $hospitalized, $surgical_operation))) {
                if (move_uploaded_file($passport_temp, $destination)) {
                  $this->dbh->commit();
                  $student_photo_card_page = ADMISSION_PORTAL_ROOT . "photo-card?email=" .  $this->saltifyString($applicant_email);
                  $this->response = $this->alert_msg("success", "SUCCESS", "Congratulations, Your registration with us was successful, Pls wait... while we generate your Registration Photo Card") . '<script>setTimeout(()=>{
                    window.open("' . $student_photo_card_page . '","_blank", "top=50, left=50, width=800, height=900");$("#submitStudentApplicationForm")[0].reset();
                    },1000);</script>';
                }
              }
            }
          }
        }
      } catch (PDOException $e) {
        $this->dbh->rollback();
        $this->response  = $this->alert_msg("danger", "ERROR", "Error Occurred!: Error Info: " . $e->getMessage());
      }
    }
    }
    return $this->response;
  }
  /*ADMISSION REGISTRATION STEP TWO*/
  public function check_duplicate_phone($myPhone)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdPhone=?");
    $this->stmt->execute(array($myPhone));
    if ($this->stmt->rowCount() > 0) {
      // myPhone no is already taken...
      $this->response = '<i class="text-danger">' . $myPhone . ' is not allowed on this portal.</i>';
    } else {
      //let check staff for this myPhone
      $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffPhone=?");
      $this->stmt->execute(array($myPhone));
      if ($this->stmt->rowCount() > 0) {
        // myPhone no is already taken...
        $this->response = '<i class="text-danger">' . $myPhone . ' is not allowed on this portal.</i>';
      } else {
        $this->response = '<i class="text-success">' . $myPhone . ' can be used.</i>';
      }
    }
    return $this->response;
  }

  public function osotech_password_encryption($password)
  {
    if (!$this->isEmptyStr($password)) {
      $this->response = password_hash($password, PASSWORD_DEFAULT);
      return $this->response;
    }
  }

  public function check_duplicate_email($Email)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdEmail=?");
    $this->stmt->execute(array($Email));
    if ($this->stmt->rowCount() > 0) {
      // phone no is already taken...
      $this->response = '<i class="text-danger">' . $Email . ' is is not allowed on this portal.</i>';
    } else {
      //let check staff for this phone
      $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffEmail=?");
      $this->stmt->execute(array($Email));
      if ($this->stmt->rowCount() > 0) {
        // phone no is already taken...
        $this->response = '<i class="text-danger">' . $Email . ' is not allowed on this portal.</i>';
      } else {
        $this->response = '<i class="text-success">' . $Email . ' can be used.</i>';
      }
    }
    return $this->response;
   
  }

  public function validate_Mobile_Number($mobile)
  {
    if (!empty($mobile)) {
      $isMobileNmberValid = TRUE;
      $mobileDigitsLength = strlen($mobile);
      if ($mobileDigitsLength < 10 || $mobileDigitsLength > 11) {
        $isMobileNmberValid = FALSE;
      } else {
        if (!preg_match("/[0-9]{10,11}$/", $mobile)) {
          $isMobileNmberValid = FALSE;
        }
      }
      return $isMobileNmberValid;
    } else {
      return FALSE;
    }
  }
  public function checkAdmissionPortalStatus(): bool
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status = 1 LIMIT 1");
    $this->stmt->execute();
    $this->response = $this->stmt->rowCount();
    return ($this->response == 1) ? true : false;
  }

  public function getConfigData()
  {
    $query = "SELECT * FROM `visap_school_profile` WHERE id=1";
    $this->stmt = $this->dbh->prepare($query);
    $this->response = $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      // code...
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function get_schoolLogoImage()
  {
    $schoolDatas = $this->getConfigData();
    //school real logo
    $schoolLogo = $schoolDatas->school_logo;
    if ($schoolLogo == NULL || $schoolLogo == "") {
      $ourLogo = EPORTAL_ROOT . "schoolImages/Logo/smatech.png";
    } else {
      $ourLogo = EPORTAL_ROOT . "schoolImages/Logo/" . $schoolLogo;
    }
    $this->response = $ourLogo;
    return $this->response;
  }

  //STUDENT DATA BY REGNO
  public function get_student_details_byRegNo($stdRegNo)
  {
    $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
    $this->stmt->execute(array($stdRegNo));
    if ($this->stmt->rowCount() == 1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function generate_admission_number($ady)
  {
    $this->response = "";
    $schoolDatas = $this->getConfigData();
    $schoolCode = $schoolDatas->govt_approve_number; //school Code
    $this->stmt = $this->dbh->prepare("SELECT stdRegNo FROM `visap_student_tbl` ORDER BY stdRegNo DESC LIMIT 1");
    $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      if ($row = $this->stmt->fetch());
      $value2 = $row->stdRegNo;
      //separating numeric part
      $value2 = substr($value2, 10, 14);
      //incrementing numeric value
      $value2 = $value2 + 1;
      //concatenating incremented value
      $value2 = $ady . $schoolCode . sprintf('%04s', $value2);
      $this->response = $value2;
    } else {
      // "2021C120040001"
      $value2 = $ady . $schoolCode . "0001";
      $this->response = $value2;
    }
    return $this->response;
  }
  public function get_states_of_origin_InDropDown()
  {
    $this->response = "";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` ORDER BY name ASC");
    $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      while ($row = $this->stmt->fetch()) {
        $this->response .= '<option value="' . $row->name . '">' . $row->name . '</option>';
      }
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  public function fetch_all_local_govt_state($state)
  {
    $this->response = "";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` WHERE name=? LIMIT 1");
    $this->stmt->execute(array($state));
    if ($this->stmt->rowCount() == 1) {
      $state_list = $this->stmt->fetch();
      //grab all local govt that have this state id
      $this->stmt = $this->dbh->prepare("SELECT * FROM `local_govt_tbl` WHERE state_id=? ORDER BY local_name ASC");
      $this->stmt->execute(array($state_list->state_id));
      if ($this->stmt->rowCount() > 0) {
        while ($rows = $this->stmt->fetch()) {
          $this->response .= '<option value="' . $rows->local_name . '">' . $rows->local_name . '</option>';
        }
      } else {
        $this->response = false;
      }
    }
    return $this->response;
  }

  public function get_student_infoId($studentId)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_info_tbl` WHERE studentId=? LIMIT 1");
    $this->stmt->execute([$studentId]);
    if ($this->stmt->rowCount() == 1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function get_student_medical_infoId($studentId)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_stdmedical_tbl` WHERE studId=? LIMIT 1");
    $this->stmt->execute([$studentId]);
    if ($this->stmt->rowCount() == 1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function getAdmissionCardUser($stdRegNo)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE usedBy=? AND pin_status=1 LIMIT 1");
    $this->stmt->execute(array($stdRegNo));
    if ($this->stmt->rowCount() == 1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function check_user_activity_allowed($module)
  {
    $status = '1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
    $this->stmt->execute(array($module, $status));
    if ($this->stmt->rowCount() > 0) {
      $this->response = true;
      return $this->response;
    }
  }
  public function get_school_session_info()
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `current_session_tbl` LIMIT 1");
    $this->stmt->execute();
    if ($this->stmt->rowCount() == 1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function get_student_previous_school_info($studentId)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_stdpreschlinfo` WHERE student_id=? LIMIT 1");
    $this->stmt->execute([$studentId]);
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function get_single_data($table, $field, $data)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=?");
    $this->stmt->execute(array($data));
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }
  public function get_double_data($table, $field, $value1,$field2,$value2)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=? AND {$field2}=?");
    $this->stmt->execute(array($value1, $value2));
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

}
$Osotech = new Osotech();