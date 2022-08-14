<?php
/**
 *
 */
 include_once "initialize.php";
class Osotech
{
  private $dbh;
  protected $stmt;
  protected $response;


  function __construct($conn)
  {
    if ((substr($_SERVER['REQUEST_URI'], -4) == ".php") or (stripos($_SERVER['REQUEST_URI'], ".php")== true)) {
      self::redirect_root("error");
    }
  $this->dbh = $conn;
  }

  public function osotech_session_kick(){
       return @session_start();
       }

       public function redirect_root($flink){
        header("Location: ".APP_ROOT.$flink);
           exit();
           }
  public function Clean($data){
      if (!empty($data)) {
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

       public function process_first_step_admission($data){
         return self::alert_msg("success","Welcome Guest","You are Highly welcome to Smatech School Portal admission Page");
       }
       //LOAD CAPTCHA

              public function loadOsotechCaptcha(){
              print'<script> $("#captcha_load").load("../admission/Templates/osotech_captcha.php");</script>';
      }
              /*ADMISSION REGISTRATION STEP ONE*/
              public function start_student_admission_first_step($admission_data){
              $captcha_correct=self::Clean($admission_data['captcha_correct_answer']);
              $user_captcha_anwser=self::Clean($admission_data['user_captcha_anwser']);
              $osotech_csrf = self::Clean($admission_data['osotech_csrf']);
              $card_pin = self::Clean($admission_data['card_pin']);
              $card_serial = self::Clean($admission_data['card_serial']);
              $stu_class = self::Clean($admission_data['student_class']);
              $stu_phone = self::Clean($admission_data['student_phone']);
              $username = self::Clean($admission_data['username']);
              $stu_email = self::Clean($admission_data['student_email']);
              //check for Auth access
              if (self::isEmptyStr($osotech_csrf) || $osotech_csrf !== md5("iremideoizasamsonosotech")) {
              $this->response = self::alert_msg("danger","WARNING","Authentication Failed, Please Check your Connection and Try again!").self::loadOsotechCaptcha();
              }elseif (self::isEmptyStr($card_pin) || self::isEmptyStr($card_serial) || self::isEmptyStr($stu_class) || self::isEmptyStr($stu_phone) || self::isEmptyStr($username) || self::isEmptyStr($stu_email)) {
              $this->response = self::alert_msg("danger" , "WARNING","Please fill in all the required fields and Try again!").self::loadOsotechCaptcha();
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
              }else{
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
              $this->response = self::alert_msg("success", "WARNING","You have successfully completed step one of your online registration!")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."step2?applicant=".$admission_no."&page=2';
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
              $this->response = self::alert_msg("danger", "WARNING","The Card PIN you entered does not exists! check the Pin and try again...").self::loadOsotechCaptcha();
              }
              }
              return $this->response;
              unset($this->dbh);
              }

              /*ADMISSION REGISTRATION STEP ONE ENDS*/
              /*ADMISSION REGISTRATION STEP TWO*/
              public function start_student_admission_second_step($admission_data){
              $bypass = 			self::Clean($admission_data['bypass']);
              $admission_no = self::Clean($admission_data['admission_no']);
              $applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
              $surname = 			self::Clean($admission_data['surname']);
              $first_name = 	self::Clean($admission_data['first_name']);
              $middle_name = 	self::Clean($admission_data['middle_name']);
              $dateofbirth = 	self::Clean(date("Y-m-d",strtotime($admission_data['dateofbirth'])));
              $gender = 			self::Clean($admission_data['gender']);
              $birth_cert = 	self::Clean($admission_data['birth_cert']);
              $nationality = 	self::Clean($admission_data['nationality']);
              $state_origin = self::Clean($admission_data['state_origin']);
              $localgvt = 		self::Clean($admission_data['localgovt']);
              $hometown = 		self::Clean($admission_data['hometown']);
              $religion = 		self::Clean($admission_data['religion']);
              $home_address = self::Clean($admission_data['home_address']);
              $challenges = 	self::Clean($admission_data['challenges']);
              //check for auth
              if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($surname) || self::isEmptyStr($first_name) || self::isEmptyStr($middle_name) || self::isEmptyStr($dateofbirth) || self::isEmptyStr($gender) || self::isEmptyStr($birth_cert) || self::isEmptyStr($nationality) || self::isEmptyStr($state_origin) || self::isEmptyStr($localgvt) || self::isEmptyStr($hometown) || self::isEmptyStr($religion) || self::isEmptyStr($home_address) || self::isEmptyStr($challenges)) {
              $this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
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
              $this->response = self::alert_msg("Step Two completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."step3?applicant=".$admission_no."&page=3';
              },500);</script>";
              }
              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP TWO*/

              /*ADMISSION REGISTRATION STEP THREE*/
              public function start_student_admission_third_step($admission_data){
              $bypass = 			self::Clean($admission_data['bypass']);
              $admission_no = self::Clean($admission_data['admission_no']);
              $applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
              $mg_title = 			self::Clean($admission_data['mg_title']);
              $mg_name = 	self::Clean($admission_data['mg_name']);
              $mg_relation = 	self::Clean($admission_data['mg_relation']);
              $mg_phone = 			self::Clean($admission_data['mg_phone']);
              $mg_email = 	self::Clean($admission_data['mg_email']);
              $mg_address = 	self::Clean($admission_data['mg_address']);
              $mg_occu = 	self::Clean($admission_data['mg_occu']);
              //Female guardian details
              $fg_title = 			self::Clean($admission_data['fg_title']);
              $fg_name = 	self::Clean($admission_data['fg_name']);
              $fg_relation = 	self::Clean($admission_data['fg_relation']);
              $fg_phone = 			self::Clean($admission_data['fg_phone']);
              $fg_email = 	self::Clean($admission_data['fg_email']);
              $fg_address = 	self::Clean($admission_data['fg_address']);
              $fg_occu = 	self::Clean($admission_data['fg_occu']);

              //check for auth
              if (self::isEmptyStr($bypass) || $bypass!= md5("oiza1234567")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($mg_title) || self::isEmptyStr($mg_name) || self::isEmptyStr($mg_relation) || self::isEmptyStr($mg_phone) || self::isEmptyStr($mg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address) || self::isEmptyStr($admission_no) || self::isEmptyStr($fg_title) || self::isEmptyStr($fg_name) || self::isEmptyStr($fg_relation) || self::isEmptyStr($fg_phone) || self::isEmptyStr($fg_email) || self::isEmptyStr($fg_occu) || self::isEmptyStr($fg_address)) {
              $this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
              }elseif (!self::is_Valid_Email($mg_email) || !self::is_Valid_Email($fg_email)) {
              $this->response = self::alert_msg("Invalid email address format!","danger");
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
              $this->response = self::alert_msg("Step Three completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."step4?applicant=".$admission_no."&page=4';
              },500);</script>";
              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP THREE*/

              /*ADMISSION REGISTRATION STEP FOUR*/
              public function start_student_admission_fourth_step($admission_data,$file){
              $bypass = 			self::Clean($admission_data['bypass']);
              $admission_no = self::Clean($admission_data['admission_no']);
              $applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
              $schoolname = 	self::Clean($admission_data['prev_schoolname']);
              $proprietress = self::Clean($admission_data['proprietress']);
              $schl_phone = 	self::Clean($admission_data['prev_schl_phone']);
              $prev_schl_loca = 	self::Clean($admission_data['prev_schl_loca']);
              $edu_offered = 	self::Clean($admission_data['edu_offered']);
              $category = 	self::Clean($admission_data['category']);
              $present_class = 	self::Clean($admission_data['present_class']);
              $reason_to = 	self::Clean($admission_data['reason_to']);
              $reportsheet_name = $file['report_sheet']['name'];
              $reportsheet_size = $file['report_sheet']['size']/1024;
              $reportsheet_temp = $file['report_sheet']['tmp_name'];
              $reportsheet_error = $file['report_sheet']['error'];
              $allowed = array("jpg","jpeg","png","pdf");
              $name_div = explode(".", $reportsheet_name);
              $image_ext = strtolower(end($name_div));

              //check for auth
              if (self::isEmptyStr($bypass) || $bypass!= md5("oiza12345678")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($schoolname) || self::isEmptyStr($proprietress) || self::isEmptyStr($schl_phone) || self::isEmptyStr($prev_schl_loca) || self::isEmptyStr($edu_offered) || self::isEmptyStr($category) || self::isEmptyStr($present_class) || self::isEmptyStr($reason_to) || self::isEmptyStr($reportsheet_name)) {
              $this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
              }elseif (!in_array($image_ext, $allowed)) {
              $this->response = self::alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!","danger");
              //
              }elseif ($reportsheet_size > 50) {
              $this->response = self::alert_msg("Your File Size should not exceed 50KB, Selected file Size is :".number_format($reportsheet_size,2)."KB","danger");
              }elseif ($reportsheet_error !=0) {
              $this->response = self::alert_msg("There was an error Uploading your Report Sheet","danger");
              }
              else{
              //continue with the registration steps
              $student_data = self::get_student_details_byRegNo($admission_no);
              $reportsheet_realName = "report_sheet_".$student_data->stdRegNo.mt_rand(10,9999999).".".$image_ext;
              //lets update the student passport in the db
              $destination = "../eportal/schoolImages/".$reportsheet_realName;
              try {
              $this->dbh->beginTransaction();
              //update the student info on student tbl
              $this->stmt = $this->dbh->prepare("INSERT INTO `visap_stdpreschlinfo` (student_id,stdSchoolName,stdDirectorName,stdSchoolPhone,stdSchLocation,stdSchlCat,stdSchlEduLevel,stdPresentClass,stdReasonInPreClass,stdLastReportSheet) VALUES (?,?,?,?,?,?,?,?,?,?);");
              if ($this->stmt->execute(array($applicant_id,$schoolname,$proprietress,$schl_phone,$prev_schl_loca,$category,$edu_offered,$present_class,$reason_to,$reportsheet_realName))) {
              $_SESSION['AUTH_SMATECH_APPLICANT_ID'] = $applicant_id;
              if (move_uploaded_file($reportsheet_temp, $destination)) {
              $this->dbh->commit();
              $this->response = self::alert_msg("Step Four completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."step5?applicant=".$admission_no."&page=5';
              },500);</script>";
              }

              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP FOUR*/

              /*ADMISSION REGISTRATION STEP FIVE*/
              public function start_student_admission_fifth_step($admission_data){
              $bypass = 			self::Clean($admission_data['bypass']);
              $admission_no = self::Clean($admission_data['admission_no']);
              $applicant_id = self::Clean($admission_data['auth_code_applicant_id']);

              $hospital_name = self::Clean($admission_data['hospital_name']);
              $doctor_name = self::Clean($admission_data['doctor_name']);
              $phone = self::Clean($admission_data['phone']);
              $member_since = self::Clean(date("Y-m-d",strtotime($admission_data['member_since'])));
              $address = self::Clean($admission_data['address']);
              $blood_group = self::Clean($admission_data['blood_group']);
              $genotype = self::Clean($admission_data['genotype']);
              $illness = self::Clean($admission_data['illness']);
              //$family_illness = self::Clean($admission_data['family_illness']);
              $hospitalized = self::Clean($admission_data['hospitalized']);
              $surgical_operation = self::Clean($admission_data['surgical_operation']);
              //check for auth
              if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456789")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no) || self::isEmptyStr($hospital_name) || self::isEmptyStr($doctor_name) || self::isEmptyStr($phone) || self::isEmptyStr($member_since) || self::isEmptyStr($address) || self::isEmptyStr($blood_group) || self::isEmptyStr($genotype) || self::isEmptyStr($illness) || self::isEmptyStr($hospitalized) || self::isEmptyStr($surgical_operation)) {
              $this->response = self::alert_msg("Please fill in all the required fields and Try again!","danger");
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
              $this->response = self::alert_msg("Step Five completed successfully, Pls wait...","success")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."submitapplication?applicant=".$admission_no."&page=6';
              },500);</script>";
              }
              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION STEP FIVE*/

              /*ADMISSION REGISTRATION FINAL STEP*/
              public function start_student_admission_final_step($admission_data,$file){
              $bypass = 			self::Clean($admission_data['bypass']);
              $admission_no = self::Clean($admission_data['admission_no']);
              $applicant_id = self::Clean($admission_data['auth_code_applicant_id']);
              $passport_name = $file['student_passport']['name'];
              $passport_size = $file['student_passport']['size']/1024;
              $passport_temp = $file['student_passport']['tmp_name'];
              $passport_error = $file['student_passport']['error'];
              $allowed = array("jpg","jpeg","png");
              $name_div = explode(".", $passport_name);
              $image_ext = strtolower(end($name_div));

              //check for auth
              if (self::isEmptyStr($bypass) || $bypass!= md5("oiza123456789")) {
              $this->response = self::alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
              }elseif (self::isEmptyStr($applicant_id) || self::isEmptyStr($admission_no)|| self::isEmptyStr($passport_name)) {
              $this->response = self::alert_msg("Please select your passport to continue!","danger");
              }elseif (!in_array($image_ext, $allowed)) {
              $this->response = self::alert_msg("Your File format is not supported, Only PNG,JPG,JPEG!","danger");
              //
              }elseif ($passport_size > 25) {
              $this->response = self::alert_msg("Your passport Size should not exceed 25KB, Selected file Size is :".number_format($passport_size,2)."KB","danger");
              }elseif ($passport_error !=0) {
              $this->response = self::alert_msg("There was an error Uploading your passport, try again!","danger");
              }
              else{
              //continue with the registration steps
              $student_data = self::get_student_details_byRegNo($admission_no);
              $passport_realName =$student_data->stdRegNo.mt_rand(10,9999999).".".$image_ext;
              //lets update the student passport in the db
              $destination = "../eportal/schoolImages/students/".$passport_realName;
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
              /*  $Osotech_mailing = new Osotech_mailing();
              if ($Osotech_mailing->SendUserConfirmationEmail($studentEmail,$studentSurname,$confirmation_code,$userType)) {*/
              // Generate the student registration photo card...
              $this->dbh->commit();
              $this->response = self::alert_msg("Congratulations, Your registration with us was successful, Pls wait... while we generate your Photo Card","success")."<script>setTimeout(()=>{
              window.location.href='".ADMISSION_ROOT."regphotocard?applicant=".$admission_no."&page=photocard';
              },1500);</script>";
              /*}*/

              }

              }

              } catch (PDOException $e) {
              $this->dbh->rollback();
              $this->response  = self::alert_msg("Error Occurred!: Error Info: ".$e->getMessage(),"danger");
              }
              }
              return $this->response;
              unset($this->dbh);
              }
              /*ADMISSION REGISTRATION FINAL STEP*/

              public function check_duplicate_phone($phone){
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdPhone=? LIMIT 1");
              $this->stmt->execute(array($phone));
              if ($this->stmt->rowCount()==1) {
              // phone no is already taken...
              $this->response ='<i class="text-danger">'.$phone.' is not allowed on this portal.</i>';
              }else{
              //let check staff for this phone
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffPhone=? LIMIT 1");
              $this->stmt->execute(array($phone));
              if ($this->stmt->rowCount()==1) {
              // phone no is already taken...
              $this->response ='<i class="text-danger">'.$phone.' is not allowed on this portal.</i>';
              }else{
              $this->response ='<i class="text-success">'.$phone.' usage granted.</i>';
              }
              }
              return $this->response;
              }

      public function osotech_password_encryption($password){
              if (!self::isEmptyStr($password)) {
              $this->response = password_hash($password, PASSWORD_DEFAULT);
              return $this->response;
              }
              }

      public function check_duplicate_email($Email){
              $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdEmail=? LIMIT 1");
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
              $this->response ='<i class="text-success">'.$Email.' usage permission is granted.</i>';
              }
              }
              return $this->response;
              unset($this->dbh);
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


}
