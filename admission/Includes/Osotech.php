<?php
@session_start();
/**
 *
 */
 // include_once "initialize.php";
 include_once "Database.php";
class Osotech
{
  private $dbh;
  protected $stmt;
  protected $response;


  function __construct()
  {
    if ((substr($_SERVER['REQUEST_URI'], -4) == ".php") or (stripos($_SERVER['REQUEST_URI'], ".php")== true)) {
      self::redirect_root("error");
    }
    $Database = new Database();
  $this->dbh = $Database->osotech_connect();
  }

  public function osotech_session_kick(){
       return @session_start();
       }

       public function redirect_root($flink){
        header("Location: ".ADMISSION_PORTAL_ROOT.$flink);
           exit();
           }
  public function Clean($data){
      if (!$this->isEmptyStr($data)) {
          $string = trim($data);
          $string = stripslashes($string);
          $string = filter_var($string,FILTER_SANITIZE_STRING);
          $string= htmlspecialchars($string);
          return $string;
          }
            }


    function saltifyString($string){
        return urlencode(base64_encode($string));
        }

    function unsaltifyString($string){
    return base64_decode(urldecode($string));
    }

    public function check_single_data($table,$field,$field_val){
        $this->stmt=$this->dbh->prepare("SELECT * FROM {$table} WHERE {$field}=? LIMIT 1");
        $this->stmt->execute(array($field_val));
        if ($this->stmt->rowCount()==1) {
        $this->response = true;
        return $this->response;
        unset($this->dbh);
        }
        }
        public function isEmptyStr($str){
        return ($str === "" || empty($str))? true : false;
        }
        public function is_Valid_Email($email){
        if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $this->response = true;
        }else{
        $this->response = false;
        }
        return $this->response;
        }

        public function check_string_lenght_greater(int $len,$string){
        if (!self::isEmptyStr($string) && is_string($string)) {
        $result = (strlen($string) > $len) ? true : false;
        }
        }
        public function check_string_lenght_lesser(int $len,$string){
        if (!self::isEmptyStr($string) && is_string($string)) {
        $result = (strlen($string) < $len) ? true : false;
        }
        }

    public function alert_msg($alert_type="warning", $alert_title="",$alert_msg=""){
       $this->response ='<div class="alert alert-'.$alert_type.' alert-dismissible fade show" role="alert">
         <strong>'.$alert_title.'!</strong> '.$alert_msg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       return $this->response;
       }

       // public function process_first_step_admission($data){
       //
       //   return self::alert_msg("success","Welcome Guest","You are Highly welcome to Smatech School Portal admission Page");
       // }
       //LOAD CAPTCHA

              public function loadOsotechCaptcha(){
              print'<script> $("#captcha_load").load("../admission/Templates/osotech_captcha.php");</script>';
      }
              /*ADMISSION REGISTRATION STEP ONE*/
              public function process_first_step_admission($data){
              $captcha_correct=self::Clean($data['captcha_correct_answer']);
              $user_captcha_anwser=self::Clean($data['user_captcha_anwser']);
              $osotech_csrf = self::Clean($data['osotech_csrf']);
              $card_pin = self::Clean($data['card_pin']);
              $card_serial = self::Clean($data['card_serial']);
              $stu_class = self::Clean($data['class_level']);
              $stu_phone = self::Clean($data['student_phone']);
              $username = self::Clean($data['username']);
              $stu_email = self::Clean($data['student_email']);
              //check for Auth access
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf !== md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("danger","WARNING","Authentication Failed, Please Check your Connection and Try again!").self::loadOsotechCaptcha();
              }elseif (self::isEmptyStr($card_pin) || self::isEmptyStr($card_serial) || self::isEmptyStr($stu_class) || self::isEmptyStr($stu_phone) || self::isEmptyStr($username) || self::isEmptyStr($stu_email) || self::isEmptyStr($user_captcha_anwser)) {
              $this->response = self::alert_msg("danger" , "WARNING","Invalid Form submission, Check all your inputs and try again!").self::loadOsotechCaptcha();
              }elseif (!self::is_Valid_Email($stu_email)) {
              $this->response = self::alert_msg("danger", "WARNING","$stu_email is not a valid e-mail address, Please check and Try again!").self::loadOsotechCaptcha();
              }elseif (self::check_single_data("visap_student_tbl","stdEmail",$stu_email)) {
              $this->response = self::alert_msg("danger", "WARNING", "$stu_email is already taken on this portal!").self::loadOsotechCaptcha();
              }elseif (self::check_single_data("visap_staff_tbl","staffEmail",$stu_email)) {
              $this->response = self::alert_msg("danger", "WARNING","You cannot register with this $stu_email on this portal").self::loadOsotechCaptcha();
              }
              elseif (!self::validate_Mobile_Number($stu_phone)) {
              $this->response = self::alert_msg("danger", "WARNING" ,"This Phone Number $stu_phone format is not allowed, Use this format: 080-0000-0000").self::loadOsotechCaptcha();
              //lets check if the PIN character is valid without connecting to db
              }elseif (self::check_string_lenght_greater(13,$card_pin) || self::check_string_lenght_lesser(13,$card_pin)) {
              // code...
              $this->response = self::alert_msg("danger", "WARNING","You have entered an incorrect Card Pin! Re-check Your card Pin & try again...").self::loadOsotechCaptcha();
            }elseif ($user_captcha_anwser <> $captcha_correct) {
              $this->response = self::alert_msg("danger", "WARNING","Incorrect CAPTCHA Value Entered!").self::loadOsotechCaptcha();
            }
              else{
              //lets connect to db and check the status of the Pin
              //SELECT * FROM `tbl_reg_pins, pin_code,pin_serial,pin_status=0;
              $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE pin_code=? AND pin_serial=? LIMIT 1");
              $this->stmt->execute(array($card_pin,$card_serial));
              //check the row returns
              if ($this->stmt->rowCount() ==1) {
              //let check if the CARD PIN has been Used
              //fetch the card details
              $card_details = $this->stmt->fetch();
              $pinStatus =$card_details->pin_status;
              $pinCode =$card_details->pin_code;
              $pinSerial =$card_details->pin_serial;
              $pinDate =$card_details->created_at;
              $pinPrice =$card_details->price;
              $pinId =$card_details->pin_id;
              if ($pinStatus =='1') {
              // code...
              $this->response = self::alert_msg("danger", "WARNING","DO NOT PLAY SMART! This Card has been Used!").self::loadOsotechCaptcha();
              }else{
              //let begin with the registration
              //student Login Credentials
              $portal_username = $username."@".__OSO_APP_NAME__.".portal";//login email
              $portal_password =__OSO_APP_NAME__."@portal";//loginpassword
              $hashed_password = self::osotech_password_encryption($portal_password);
              try {
              $this->dbh->beginTransaction();
              $date =date("Y-m-d");
              $admitted_year = date("Y");
              $time = date("h:i:s");
              $admission_no = self::generate_admission_number($admitted_year);
              $confirmation_code = substr(md5(uniqid(mt_rand(),true)),0,10);
              $this->stmt =$this->dbh->prepare("INSERT INTO `visap_student_tbl`(stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdPhone,stdApplyDate,stdConfToken) VALUES(?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($admission_no,$stu_email,$username,$hashed_password,$stu_class,$stu_phone,$date,$confirmation_code))) {
              // grab the LastInsertId...
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $this->dbh->lastInsertId();
              $_SESSION['AUTH_CODE_ADMISSION_NO'] = $admission_no;
              //let change the Pin Used status
              $change_status =1;
              $this->stmt =$this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=?,usedBy=? WHERE pin_id=? LIMIT 1");
              if ($this->stmt->execute(array($change_status,$admission_no,$pinId))) {
              //let create a Pin Used History
              $this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code,pin_serial,dated,timed) VALUES (?,?,?,?,?);");
              if ($this->stmt->execute(array($admission_no,$pinCode,$pinSerial,$date,$time))) {
              // code...
              $this->dbh->commit();
              $this->response = self::alert_msg("success", "SUCCESS","You have successfully completed step one of your online registration!")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."step2?applicant=".self::saltifyString($admission_no)."&page=2';
            },1500);</script>";
              }
              }
              }
              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger", "WARNING","Error Occurred!: Error Info: ".$e->getMessage()).self::loadOsotechCaptcha();
              }
              }
              }else{
              //show the user that The PIN he/she enters is not found
              $this->response = self::alert_msg("danger", "WARNING","Invalid Card Details! check and try again...").self::loadOsotechCaptcha();
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP ONE ENDS*/

              /*ADMISSION REGISTRATION STEP TWO*/
              public function process_student_admission_second_step($data){
              $osotech_csrf = self::Clean($data['osotech_csrf']);
              $admission_no = self::Clean($data['admission_no']);
              $applicant_id = self::Clean($data['auth_code_applicant_id']);
              $surname = 			self::Clean($data['surname']);
              $first_name = 	self::Clean($data['first_name']);
              $middle_name = 	self::Clean($data['middle_name']);
              $dateofbirth = 	self::Clean(date("Y-m-d",strtotime($data['dateofbirth'])));
              $gender = 			self::Clean($data['gender']);
              $birth_cert = 	self::Clean($data['birth_cert']);
              $nationality = 	self::Clean($data['nationality']);
              $state_origin = self::Clean($data['state_origin']);
              $localgvt = 		self::Clean($data['localgovt']);
              $hometown = 		self::Clean($data['hometown']);
              $religion = 		self::Clean($data['religion']);
              $home_address = self::Clean($data['home_address']);
              $challenges = 	self::Clean($data['challenges']);
              //check for auth
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf!= md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("danger","WARNING","Authentication Failed, Please Check your Connection and Try again!");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($surname) || self::isEmptyStr($first_name) || self::isEmptyStr($middle_name) || self::isEmptyStr($dateofbirth) || self::isEmptyStr($gender) || self::isEmptyStr($birth_cert) || self::isEmptyStr($nationality) || self::isEmptyStr($state_origin) ||
                self::isEmptyStr($localgvt) || self::isEmptyStr($hometown) || self::isEmptyStr($religion) || self::isEmptyStr($home_address) || self::isEmptyStr($challenges)) {
              $this->response = self::alert_msg("danger","WARNING","Please fill in all the required fields and Try again!");
              }else{
              //continue with the registration steps
              try {
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              $this->stmt = $this->dbh->prepare("UPDATE `visap_student_tbl` SET stdSurName=?,stdFirstName=?, stdMiddleName=?,stdDob=?,stdGender=?,stdAddress=? WHERE stdId=? AND stdRegNo=? LIMIT 1");
              if ($this->stmt->execute(array($surname,$first_name,$middle_name,$dateofbirth,$gender,$home_address,$applicant_id,$admission_no))) {
              // create the student info table
              $this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_info_tbl` (studentId,stdBirthCert,stdCountry,stdSOR,stdLGA,stdHomeTown,stdReligion,stdDisability,stdPermaAdd) VALUES (?,?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($applicant_id,$birth_cert,$nationality,$state_origin,$localgvt,$hometown,$religion,$challenges,$home_address))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              $this->dbh->commit();
              $this->response = self::alert_msg("success","SUCCESS","Step Two completed successfully, Pls wait...")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."step3?applicant=".self::saltifyString($admission_no)."&page=3';
              },500);</script>";
              }
              }
              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger","ERROR","Error Occurred!: Error Info: ".$e->getMessage());
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP TWO*/

              /*ADMISSION REGISTRATION STEP THREE*/
              public function process_student_admission_third_step($data){
              $osotech_csrf = self::Clean($data['osotech_csrf']);
              $admission_no = self::Clean($data['admission_no']);
              $applicant_id = self::Clean($data['auth_code_applicant_id']);
              $mg_title = 		self::Clean($data['mg_title']);
              $mg_name = 	    self::Clean($data['mg_name']);
              $mg_relation = 	self::Clean($data['mg_relation']);
              $mg_phone = 		self::Clean($data['mg_phone']);
              $mg_email = 	  self::Clean($data['mg_email']);
              $mg_address = 	self::Clean($data['mg_address']);
              $mg_occu = 	    self::Clean($data['mg_occu']);
              //Female guardian details
              $fg_title = 		self::Clean($data['fg_title']);
              $fg_name = 	    self::Clean($data['fg_name']);
              $fg_relation = 	self::Clean($data['fg_relation']);
              $fg_phone = 		self::Clean($data['fg_phone']);
              $fg_email = 	  self::Clean($data['fg_email']);
              $fg_address = 	self::Clean($data['fg_address']);
              $fg_occu = 	    self::Clean($data['fg_occu']);

              //check for auth
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf!= md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($mg_title) || self::isEmptyStr($mg_name) || self::isEmptyStr($mg_relation) || self::isEmptyStr($mg_phone) || self::isEmptyStr($mg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address) ||
              self::isEmptyStr($admission_no)|| self::isEmptyStr($fg_title)
              ||self::isEmptyStr($fg_name) || self::isEmptyStr($fg_relation)||self::isEmptyStr($fg_phone) || self::isEmptyStr($fg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address)) {
              $this->response = self::alert_msg("danger","WARNING","Please fill in all the required fields and Try again!");
              }elseif (!self::is_Valid_Email($mg_email) || !self::is_Valid_Email($fg_email)) {
              $this->response = self::alert_msg("danger","WARNING","Invalid email address format!");
              }
              else{
              //continue with the registration steps
              try {
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              $this->stmt = $this->dbh->prepare("UPDATE `visap_student_info_tbl` SET stdMGTitle=?,stdMGName=?,stdMGRelationship=?,stdMGPhone=?,stdMGEmail=?,stdMGOccupation=?,stdMGAddress=?, stdFGTitle=?, stdFGName=?,stdFGRelationship=?,stdFGPhone=?,stdFGEmail=?,stdFGOccupation=?,stdFGAddress=? WHERE studentId=? LIMIT 1");
              if ($this->stmt->execute(array($mg_title,$mg_name,$mg_relation,$mg_phone,$mg_email,$mg_occu,$mg_address,$fg_title,$fg_name,$fg_relation,$fg_phone,$fg_email,$fg_occu,$fg_address,$applicant_id))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              $this->dbh->commit();
              $this->response = self::alert_msg("success","SUCCESS","Step Three completed successfully, Pls wait...")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."step4?applicant=".self::saltifyString($admission_no)."&page=4';
            },1500);</script>";
              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger","ERROR","Error Occurred!: Error Info: ".$e->getMessage());
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP THREE*/

              /*ADMISSION REGISTRATION STEP FOUR*/
              public function process_student_admission_fourth_step($data){
              $osotech_csrf = 			self::Clean($data['osotech_csrf']);
              $admission_no = self::Clean($data['admission_no']);
              $applicant_id = self::Clean($data['auth_code_applicant_id']);
              $schoolname = 	self::Clean($data['prev_schoolname']);
              $proprietress = self::Clean($data['proprietress']);
              $schl_phone = 	self::Clean($data['prev_schl_phone']);
              $prev_schl_loca = 	self::Clean($data['prev_schl_loca']);
              $edu_offered = 	self::Clean($data['edu_offered']);
              $category = 	self::Clean($data['category']);
              $present_class = 	self::Clean($data['present_class']);
              $reason_to = 	self::Clean($data['reason_to']);
              //check for auth
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf!= md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("danger","WARNING","Authentication Failed, Please Check your Connection and Try again!");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($schoolname) || self::isEmptyStr($proprietress) || self::isEmptyStr($schl_phone) || self::isEmptyStr($prev_schl_loca) || self::isEmptyStr($edu_offered) || self::isEmptyStr($category) || self::isEmptyStr($present_class)
              || self::isEmptyStr($reason_to)) {
              $this->response = self::alert_msg("danger","WARNING", "Please fill in all the required fields and Try again!");
            }
              else{
              //continue with the registration steps
              try {
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              //,stdLastReportSheet
              $this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdpreschlinfo` (student_id,stdSchoolName,stdDirectorName,stdSchoolPhone,stdSchLocation,stdSchlCat,stdSchlEduLevel,stdPresentClass,stdReasonInPreClass) VALUES (?,?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($applicant_id,$schoolname,$proprietress,$schl_phone,$prev_schl_loca,$category,$edu_offered,$present_class,$reason_to))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              $this->dbh->commit();
              $this->response = self::alert_msg("success", "SUCCESS", "Step Four completed successfully,Loading Medical Information Form, Pls wait...")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."step5?applicant=".self::saltifyString($admission_no)."&page=5';
            },1500);</script>";
              }
              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger","ERROR","Error Occurred!: Error Info: ".$e->getMessage());
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP FOUR*/

              /*ADMISSION REGISTRATION STEP FIVE*/
              public function process_student_admission_fifth_step($data){
              $osotech_csrf = self::Clean($data['osotech_csrf']);
              $admission_no = self::Clean($data['admission_no']);
              $applicant_id = self::Clean($data['auth_code_applicant_id']);
              $hospital_name = self::Clean($data['hospital_name']);
              $doctor_name = self::Clean($data['doctor_name']);
              $phone = self::Clean($data['phone']);
              $member_since = self::Clean(date("Y-m-d",strtotime($data['member_since'])));
              $address = self::Clean($data['address']);
              $blood_group = self::Clean($data['blood_group']);
              $genotype = self::Clean($data['genotype']);
              $illness = self::Clean($data['illness']);
              //$family_illness = self::Clean($data['family_illness']);
              $hospitalized = self::Clean($data['hospitalized']);
              $surgical_operation = self::Clean($data['surgical_operation']);
              //check for auth
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf!= md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("danger","WARNING","Authentication Failed, Please Check your Connection and Try again!");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($hospital_name) || self::isEmptyStr($doctor_name) || self::isEmptyStr($phone) || self::isEmptyStr($member_since) || self::isEmptyStr($address) || self::isEmptyStr($blood_group) || self::isEmptyStr($genotype) || self::isEmptyStr($illness) || self::isEmptyStr($hospitalized) || self::isEmptyStr($surgical_operation)) {
              $this->response = self::alert_msg("danger","WARNING","Please fill in all the required fields and Try again!");
              }
              else{
              //continue with the registration steps
              try {
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              $this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdmedical_tbl` (studId,stdHospitalName,stdHospitalOwner,stdHospitalPhone,stdRegDate,stdHospitalAddress,stdBlood,stdGenotype,stdSickness,stdIsHospitalized,stdSurgical) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($applicant_id,$hospital_name,$doctor_name,$phone,$member_since,$address,$blood_group,$genotype,$illness,$hospitalized,$surgical_operation))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              $this->dbh->commit();
              $this->response = self::alert_msg("success","SUCCESS","Submitted successfully, Generating Passport upload Page, Pls wait...")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."submitapplication?applicant=".self::saltifyString($admission_no)."&page=6';
            },2500);</script>";
              }
              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger","ERROR","Error Occurred!: Error Info: ".$e->getMessage());
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP FIVE*/

              /*ADMISSION REGISTRATION FINAL STEP*/
              public function process_student_admission_final_step($data,$file){
              $osotech_csrf = self::Clean($data['osotech_csrf']);
              $admission_no = self::Clean($data['admission_no']);
              $applicant_id = self::Clean($data['auth_code_applicant_id']);
              $passport_name = $file['student_passport']['name'];
              $passport_size = $file['student_passport']['size']/1024;
              $passport_temp = $file['student_passport']['tmp_name'];
              $passport_error = $file['student_passport']['error'];
              $allowed = array("jpg","jpeg","png");
              $name_div = explode(".", $passport_name);
              $image_ext = strtolower(end($name_div));

              //check for auth
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf!= md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no)|| self::isEmptyStr($passport_name)) {
              $this->response = self::alert_msg("Please select your passport to continue!","danger");
              }elseif (!in_array($image_ext, $allowed)) {
              $this->response = self::alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!","danger");
              //
              }elseif ($passport_size > 25) {
              $this->response = self::alert_msg("danger","WARNING","Your passport Size should not exceed 25KB, Selected file Size is :".number_format($passport_size,2)."KB");
              }elseif ($passport_error !=0) {
              $this->response = self::alert_msg("danger","WARNING","There was an error Uploading your passport, try again!");
              }
              else{
              //continue with the registration steps
              $student_data = self::get_student_details_byRegNo($admission_no);
              $passport_realName =$student_data->stdRegNo.mt_rand(10,9999999).".".$image_ext;
              //lets update the student passport in the db
              $destination = "../../eportal/schoolImages/students/".$passport_realName;
              try {
              $studentEmail = $student_data->stdEmail;
              $studentSurname = $student_data->stdSurName;
              $confirmation_code = $student_data->stdConfToken;
              $userType ="student";
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              $this->stmt = $this->dbh->prepare("UPDATE `visap_student_tbl` SET stdPassport=? WHERE stdId=? AND stdRegNo=? LIMIT 1");
              if ($this->stmt->execute(array($passport_realName,$applicant_id,$admission_no))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              if (move_uploaded_file($passport_temp, $destination)) {
              //send registrationmessage to the new student
              /*  $OsotechMailer = new OsotechMailer();
              if (self::SendStudentConfirmationEmail($studentEmail,$studentSurname,$confirmation_code,$userType)) {*/
              // Generate the student registration photo card...
              $this->dbh->commit();
              $this->response = self::alert_msg("success","SUCCESS","Congratulations, Your registration with us was successful, Pls wait... while we generate your Registration Photo Card")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_PORTAL_ROOT."registrationphotocard?applicant=".self::saltifyString($admission_no)."&page=photocard';
            },3500);</script>";
              /*}*/

              }

              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("danger","ERROR","Error Occurred!: Error Info: ".$e->getMessage());
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION FINAL STEP*/

              public function check_duplicate_phone($myPhone){
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdPhone=? LIMIT 1");
              $this->stmt->execute(array($myPhone));
              if ($this->stmt->rowCount()==1) {
              // myPhone no is already taken...
              $this->response ='<i class="text-danger">'.$myPhone.' is not allowed on this portal.</i>';
              }else{
              //let check staff for this myPhone
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffPhone=? LIMIT 1");
              $this->stmt->execute(array($myPhone));
              if ($this->stmt->rowCount()==1) {
              // myPhone no is already taken...
              $this->response ='<i class="text-danger">'.$myPhone.' is not allowed on this portal.</i>';
              }else{
              $this->response ='<i class="text-success">'.$myPhone.' can be used.</i>';
              }
              }
              return $this->response;
                unset($this->dbh);
              }

      public function osotech_password_encryption($password){
              if (!self::isEmptyStr($password)) {
              $this->response = password_hash($password, PASSWORD_DEFAULT);
              return $this->response;
              }
              }

      public function check_duplicate_email($Email){
              $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdEmail=? LIMIT 1");
              $this->stmt->execute(array($Email));
              if ($this->stmt->rowCount()==1) {
              // phone no is already taken...
              $this->response ='<i class="text-danger">'.$Email.' is is not allowed on this portal.</i>';
              }else{
              //let check staff for this phone
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffEmail=? LIMIT 1");
              $this->stmt->execute(array($Email));
              if ($this->stmt->rowCount()==1) {
              // phone no is already taken...
              $this->response ='<i class="text-danger">'.$Email.' is not allowed on this portal.</i>';
              }else{
              $this->response ='<i class="text-success">'.$Email.' can be used.</i>';
              }
              }
              return $this->response;
              //unset($this->dbh);
              }

      public function validate_Mobile_Number($mobile) {
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
              public function checkAdmissionPortalStatus(): bool{
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status = 1 LIMIT 1");
        $this->stmt->execute();
        $this->response = $this->stmt->rowCount();
        return ($this->response == 1) ? true : false;
        }

        public function getConfigData(){
        $this->query ="SELECT * FROM `visap_school_profile` WHERE id=1";
        $this->stmt =$this->dbh->prepare($this->query);
        $this->response =$this->stmt->execute();
        if ($this->stmt->rowCount()>0) {
        // code...
        $this->response = $this->stmt->fetch();
        return $this->response;
        }
        }

        public function get_schoolLogoImage(){
        $schoolDatas = self::getConfigData();
        //school real logo
        $schoolLogo = $schoolDatas->school_logo;
        if ($schoolLogo == NULL || $schoolLogo =="") {
        $ourLogo = APP_ROOT."eportal/schoolImages/Logo/smatech.png";
        }else{
        $ourLogo = APP_ROOT."eportal/schoolImages/Logo/".$schoolLogo;
        }
        $this->response = $ourLogo;
        return $this->response;
        }

        //STUDENT DATA BY REGNO
          public function get_student_details_byRegNo($stdRegNo){
          $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
          $this->stmt->execute(array($stdRegNo));
          if ($this->stmt->rowCount()==1) {
          $this->response = $this->stmt->fetch();
          return $this->response;
          unset($this->dbh);
          }
          }

  public function generate_admission_number($ady){
        $this->response ="";
        $schoolDatas = self::getConfigData();
        $schoolCode= $schoolDatas->govt_approve_number;//school Code
        $this->stmt = $this->dbh->prepare("SELECT stdRegNo FROM `visap_student_tbl` ORDER BY stdRegNo DESC LIMIT 1");
        $this->stmt->execute();
        if ($this->stmt->rowCount() > 0) {
        if ($row = $this->stmt->fetch());
        $value2 = $row->stdRegNo;
        //separating numeric part
        $value2 = substr($value2, 10,14);
        //incrementing numeric value
        $value2 = $value2 + 1;
        //concatenating incremented value
        $value2 = $ady.$schoolCode.sprintf('%04s',$value2);
        $this->response = $value2;
        }else{
        // "2021C120040001"
        $value2 =$ady.$schoolCode."0001";
        $this->response =$value2;
        }
        return $this->response;
        unset($this->dbh);
        }
        public function get_states_of_origin_InDropDown(){
                $this->response ="";
                $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` ORDER BY name ASC");
                $this->stmt->execute();
                if ($this->stmt->rowCount()>0) {
                while ($row = $this->stmt->fetch()) {
                $this->response.='<option value="'.$row->name.'">'.$row->name.'</option>';
                }
                }else{
                $this->response = false;
                }
                return $this->response;
                }

                public function fetch_all_local_govt_state($state){
                $this->response ="";
                $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` WHERE name=? LIMIT 1");
                $this->stmt->execute(array($state));
                if ($this->stmt->rowCount() ==1) {
                $state_list = $this->stmt->fetch();
                //grab all local govt that have this state id
                $this->stmt= $this->dbh->prepare("SELECT * FROM `local_govt_tbl` WHERE state_id=? ORDER BY local_name ASC");
                $this->stmt->execute(array($state_list->state_id));
                if ($this->stmt->rowCount() > 0) {
                while ($rows = $this->stmt->fetch()) {
                $this->response.='<option value="'.$rows->local_name.'">'.$rows->local_name.'</option>';
                }
                }else{
                $this->response = false;
                }
                }
                return $this->response;
                unset($this->dbh);
                }

    public function get_student_infoId($studentId){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_info_tbl` WHERE studentId=? LIMIT 1");
        $this->stmt->execute([$studentId]);
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function get_student_medical_infoId($studentId){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_stdmedical_tbl` WHERE studId=? LIMIT 1");
        $this->stmt->execute([$studentId]);
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

public function getAdmissionCardUser($stdRegNo){
  $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE usedBy=? AND pin_status=1 LIMIT 1");
  $this->stmt->execute(array($stdRegNo));
  if ($this->stmt->rowCount()==1) {
  $this->response = $this->stmt->fetch();
  return $this->response;
  unset($this->dbh);
    }
        }

public function check_user_activity_allowed($module){
                $status ='1';
                $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
                $this->stmt->execute(array($module,$status));
                if ($this->stmt->rowCount()==1) {
                $this->response = true;
                return $this->response;
                unset($this->dbh);
                }
                }
    public function get_school_session_info(){
    $this->stmt = $this->dbh->prepare("SELECT * FROM `current_session_tbl` LIMIT 1");
          $this->stmt->execute();
      if ($this->stmt->rowCount()==1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
      unset($this->dbh);
          }
              }
}
$Osotech = new Osotech();
