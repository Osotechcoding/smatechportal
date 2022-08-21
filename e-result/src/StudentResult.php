<?php

/**
 *
 */
 require_once 'Database.php';
 require_once 'Osotech.php';
class StudentResult
{
  private $dbh;
  protected $stmt;
  protected $response;

public function __construct(){
  $database = new Database();
 $this->dbh = $database->osotech_connect();
}
  public function check_resultmi_session(){
  if (!isset($_SESSION['resultmi']) || $_SESSION['resultmi'] ==="" ||$_SESSION['resultmi'] == null) {
  header("Location: ".RESULT_ROOT);
  exit();
  }
  }

  public function alert_msg($alert_type="warning", $alert_title="",$alert_msg=""){
     $this->response ='<div class="alert alert-'.$alert_type.' alert-dismissible fade show" role="alert">
       <strong>'.$alert_title.'!</strong> '.$alert_msg.'
       <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
     </div>';
     return $this->response;
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

      public function checkResultReadyModule($querytable,$stdReg,$stdGrade,$term,$session): bool{
      $this->stmt = $this->dbh->prepare("SELECT * FROM {$querytable} WHERE reg_number=? AND student_class=? AND term=? AND session=? LIMIT 1");
      $this->stmt->execute(array($stdReg,$stdGrade,$term,$session));
      if ($this->stmt->rowCount() ==1) {
      $this->response = true;
      }else{
      $this->response = false;
      }
      return $this->response;
      unset($this->dbh);
      }

  public function checkResultPortalStatus() {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module='result_checking' AND status='2' LIMIT 1");
    $this->stmt->execute();
    if ($this->stmt->rowCount()==1) {
      //result checking is not allowed at the momemnt
    $this->response = true;
    return $this->response;
    unset($this->dbh);
    }
  }

  public function CleanString($data){
      if (!self::isEmptyStr($data)) {
          $string = trim($data);
          $string = stripslashes($string);
          $string = filter_var($string,FILTER_SANITIZE_STRING);
          $string= htmlspecialchars($string);
          return $string;
          }
            }
  public function isEmptyStr($str){
  return ($str === "" || empty($str))? true : false;
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
  public function check_user_activity_allowed($module){
          $this->stmt = $this->dbh->prepare("SELECT * FROM
            `api_module_config` WHERE module=? AND status=2 LIMIT 1");
          $this->stmt->execute(array($module));
          if ($this->stmt->rowCount()==1) {
          //not allowed
          $this->response = true;
          return $this->response;
        unset($this->dbh);
          }
      }

      public function get_student_details_byRegNo($stdRegNo){
      $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM `visap_student_tbl` WHERE stdRegNo=? LIMIT 1");
      $this->stmt->execute(array($stdRegNo));
      if ($this->stmt->rowCount()==1) {
      $this->response = $this->stmt->fetch();
      return $this->response;
      unset($this->dbh);
      }
      }
  //code to check the student results
        public function displayStudentResult($data){
        $stdRegNo = self::CleanString(strtoupper($data['student_reg_number']));
        $stdGrade = self::CleanString($data['result_class']);
        $stdSession = self::CleanString($data['result_session']);
        $stdTerm = self::CleanString($data['result_term']);
        $cardPin = self::CleanString($data['cardPin_']);
        $cardSerial = self::CleanString($data['cardSerial_']);
        $counter =1;
        //let's check if any of the submitted inputs is null
        if (self::check_user_activity_allowed("result_checking") === true) {
        $this->response = self::alert_msg("danger","WARNING","Checking of Result is currently not allowed on this Portal!");
        }else
        if (self::isEmptyStr($stdRegNo)) {
        $this->response = self::alert_msg("danger","WARNING","Student Admission No is Required!");
        }elseif (self::isEmptyStr($stdGrade)) {
        $this->response = self::alert_msg("danger","WARNING","Student Class is Required!");
        }elseif (self::isEmptyStr($stdSession)) {
        $this->response = self::alert_msg("danger","WARNING","Result Session is Required!");
        }elseif (self::isEmptyStr($stdTerm)) {
        $this->response = self::alert_msg("danger","WARNING","Result Term is Required!");
        }elseif (self::isEmptyStr($cardPin)) {
        $this->response = self::alert_msg("danger","WARNING","Scratch Card Pin is Required!");
        }elseif (self::isEmptyStr($cardSerial)) {
        $this->response = self::alert_msg("danger","WARNING","Please enter Card Serial Number to continue!");
        }else{
        //let's check any invalid inputs
        if (!self::check_single_data("visap_student_tbl","stdRegNo",$stdRegNo)) {
        $this->response = self::alert_msg("danger","WARNING","Invalid Admission Number!");
        }elseif ((strlen($cardPin)<>12)) {
        // code...
        $this->response = self::alert_msg("danger","WARNING","Invalid Scratch Card Pin Number!");
        }else{
        //lets check the pin if exists in our system
        $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins` WHERE pin_code=? AND pin_serial=? LIMIT 1");
        $this->stmt->execute(array($cardPin,$cardSerial));
        //lets check the pin if exists in our system
        if ($this->stmt->rowCount()==1) {
        // the Pin Exists...
        //now let's check the status of the entered pin
        $pin_data = $this->stmt->fetch();
        $status = $pin_data->pin_status;
        $PinId = $pin_data->pin_id;
        //unset($this->dbh);
        if ($status =='1') {
        // pin has ben used let'a get the user details from pin history
        $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history`WHERE pin_code=? AND pin_serial=? AND used_term=? AND used_session=? LIMIT 1");
        $this->stmt->execute(array($cardPin,$cardSerial,$stdTerm,$stdSession));
        if ($this->stmt->rowCount()==1) {
        //grab the regNo of the Checker and Compare
        $pin_hitory_data = $this->stmt->fetch();
        $usedCounter = $pin_hitory_data->pin_counter;
        $userRegNo = $pin_hitory_data->studentRegNo;
        $phId = $pin_hitory_data->pinId;
        if ($stdRegNo !== $userRegNo) {
        $this->response = self::alert_msg("danger","WARNING","This Pin has been used by another Student!");
        }elseif ($usedCounter >= '3') {
        $this->response = self::alert_msg("danger","WARNING","You Have Exhausted Your Time Usage Validity of this Pin!");
        }elseif (!self::checkResultReadyModule("visap_behavioral_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
        $this->response = self::alert_msg("danger","WARNING","This Result is not yet Ready!");
        }elseif (!self::checkResultReadyModule("visap_psycho_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
        $this->response = self::alert_msg("danger","WARNING","This Result is not yet Ready!");
        }
        else{
        //let's increase the counter
        //$pin_counter = $counter++;
        $this->stmt = $this->dbh->prepare("UPDATE `tbl_result_pins_history` SET pin_counter=pin_counter+1 WHERE pinId=? LIMIT 1");
        if ($this->stmt->execute(array($phId))) {
        //get the result details
        //reportId
        //check for which result table 1st 2nd or 3rd
        switch ($stdTerm) {
          case '3rd Term':
            $resultTable ='visap_termly_result_tbl';
            break;
            case '2nd Term':
              $resultTable ='visap_2nd_term_result_tbl';
              break;
              case '1st Term':
                $resultTable ='visap_1st_term_result_tbl';
                break;
          default:
            $resultTable ='visap_1st_term_result_tbl';
            break;
        }
        $this->stmt = $this->dbh->prepare("SELECT * FROM `{$resultTable}` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
        $this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
        if ($this->stmt->rowCount()> 0) {
        while($result_data = $this->stmt->fetch()){
        $result_id = $result_data->reportId;
        $result_opened = $result_data->rStatus;
        if ($result_opened =='2') {
            // create a session result Id...
            $_SESSION['resultmi'] = $result_id;
            $_SESSION['pin'] = $cardPin;
            $_SESSION['serial'] = $cardSerial;
            $_SESSION['result_regNo'] = $stdRegNo;
            $_SESSION['result_class'] = $stdGrade;
            $_SESSION['result_term'] = $stdTerm;
            $_SESSION['result_table'] = $resultTable;
            $_SESSION['result_session'] = $stdSession;
            switch ($_SESSION['result_term']) {
                case '1st Term':
                    $student_result_page =RESULT_ROOT."reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                    break;
                case '2nd Term':
                    $student_result_page =RESULT_ROOT."secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                    break;
                case '3rd Term':
                    $student_result_page =RESULT_ROOT."thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                    break;
            }
            $this->response = self::alert_msg("success","SUCCESS","Loading your report Sheet, Pls wait...").'<script>setTimeout(()=>{
        window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=750, height=842");$("#checkResultForm")[0].reset();
        },1000)</script>';
        }elseif ($result_opened =='3') {
            $this->response = self::alert_msg("danger","WARNING","This Result is Held, Please contact your Admin!");
        }
        else{
            $this->response = self::alert_msg("danger","WARNING","Result not yet released, Try again later!");
        }
        }
        }else{
        $this->response = self::alert_msg("danger","WARNING","Sorry :) No Result Found!!!");
        }
        }
        }
        }else{
        $this->response = self::alert_msg("danger","WARNING","This Pin has been used by YOU!");
        }
        }else{
        //lets start afresh for this pin
        $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE studentRegNo=? AND student_class=? AND pin_code=? AND pin_serial=? AND used_term=? AND used_session=? LIMIT 1");
        $this->stmt->execute(array($stdRegNo,$stdGrade,$cardPin,$cardSerial,$stdTerm,$stdSession));
        if ($this->stmt->rowCount()=='0') {

        if (!self::checkResultReadyModule("visap_behavioral_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
        $this->response = self::alert_msg("danger","WARNING","This Result is not yet Ready!");
        }elseif (!self::checkResultReadyModule("visap_psycho_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
        $this->response = self::alert_msg("danger","WARNING","This Result is not yet Ready!");
        }else{
        //create pin used history
        $updated_pin_status =1;
        try {
        $this->dbh->beginTransaction();
        $this->stmt = $this->dbh->prepare("INSERT INTO `tbl_result_pins_history` (studentRegNo,student_class,pin_code,pin_serial,pin_counter,used_term,used_session) VALUES (?,?,?,?,?,?,?);");
        if ($this->stmt->execute(array($stdRegNo,$stdGrade,$cardPin,$cardSerial,$counter,$stdTerm,$stdSession))) {
        // update the pin status so that it cannot be used again by another
        $this->stmt = $this->dbh->prepare("UPDATE `tbl_result_pins` SET pin_status=? WHERE pin_id=? LIMIT 1");
        if ($this->stmt->execute(array($updated_pin_status,$PinId))) {
        //get the result details
        //reportId
        //check for which result table 1st 2nd or 3rd
        switch ($stdTerm) {
          case '3rd Term':
            $resultTable ='visap_termly_result_tbl';
            break;
            case '2nd Term':
              $resultTable ='visap_2nd_term_result_tbl';
              break;
              case '1st Term':
                $resultTable ='visap_1st_term_result_tbl';
                break;
          default:
            $resultTable ='visap_1st_term_result_tbl';
            break;
        }
        $this->stmt = $this->dbh->prepare("SELECT * FROM `{$resultTable}` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
        $this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
        if ($this->stmt->rowCount()> 0) {
        $this->dbh->commit();
        while($result_data = $this->stmt->fetch()){
            $result_id = $result_data->reportId;
            $result_opened = $result_data->rStatus;
            if ($result_opened =='2') {
                // create a session result Id...
                $_SESSION['pin'] = $cardPin;
                $_SESSION['serial'] = $cardSerial;
                $_SESSION['resultmi'] = $result_id;
                $_SESSION['result_regNo'] = $stdRegNo;
                $_SESSION['result_class'] = $stdGrade;
                $_SESSION['result_term'] = $stdTerm;
                $_SESSION['result_session'] = $stdSession;
                switch ($_SESSION['result_term']) {
                    case '1st Term':
                        $student_result_page =RESULT_ROOT."reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                        break;
                    case '2nd Term':
                        $student_result_page =RESULT_ROOT."secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                        break;
                    case '3rd Term':
                        $student_result_page =RESULT_ROOT."thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
                        break;
                }
                $this->response = self::alert_msg("success","SUCCESS","Loading your report Sheet, Pls wait...").'<script>setTimeout(()=>{
        window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=750, height=842");$("#checkResultForm")[0].reset();
        },1000)</script>';
            }elseif ($result_opened =='3') {
                $this->response = self::alert_msg("danger","WARNING","This Result is Held, Please contact your Admin!");
            }
            else{
                $this->response = self::alert_msg("danger","WARNING","Result not yet released, Try again later!");
            }
        }
        }else{
        $this->response = self::alert_msg("danger","WARNING","Sorry :) No Result Found!!!");
        }
        }

        }

        } catch (PDOException $e) {
        $this->dbh->rollback();
        $this->response = self::alert_msg("danger","WARNING","Sorry :) No Result Found!!!");
        }
        }
        }
        }
        }else{
        //pin does not exists
        $this->response = self::alert_msg("danger","WARNING","The Pin you entered does not Exists!");
        }
        }
        }
        return $this->response;
        unset($this->dbh);
        }

        //get student psychomotor
        public function getStudentPsychomotorDetails($stdReg,$stdGrade,$term,$session){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_psycho_tbl` WHERE reg_number=? AND student_class=? AND term=? AND session=? LIMIT 1");
        $this->stmt->execute(array($stdReg,$stdGrade,$term,$session));
        if ($this->stmt->rowCount() ==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function getStudentAffectiveDomainDetails($stdReg,$stdGrade,$term,$session){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_behavioral_tbl` WHERE reg_number=? AND student_class=? AND term=? AND session=? LIMIT 1");
        $this->stmt->execute(array($stdReg,$stdGrade,$term,$session));
        if ($this->stmt->rowCount() ==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }
        
    public function get_class_teacher_class_name($stdGrade){
        $staffRole = "Class Teacher";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffGrade=? AND staffRole=? LIMIT 1");
        $this->stmt->execute(array($stdGrade,$staffRole));
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }


        public function get_principal_info(){
        $staffRole = "Principal";
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE  staffRole=? LIMIT 1");
        $this->stmt->execute(array($staffRole));
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

        public function get_student_result_comment_details($admision_no,$stdGrade,$term,$session){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND schl_Sess=? LIMIT 1");
        $this->stmt->execute(array($admision_no,$stdGrade,$term,$session));
        if ($this->stmt->rowCount()==1) {
        $this->response = $this->stmt->fetch();
        return $this->response;
        unset($this->dbh);
        }
        }

    public function get_student_attendance_details($stdRegNo,$stdGrade,$rollType,$term,$session){
$this->stmt = $this->dbh->prepare("SELECT count(`attend_id`) as cnt FROM `visap_class_attendance_tbl` WHERE stdReg=? AND studentGrade=? AND roll_call=? AND term=? AND schl_session=?");
$this->stmt->execute(array($stdRegNo,$stdGrade,$rollType,$term,$session));
if ($this->stmt->rowCount()>0) {
  $rollCall = $this->stmt->fetch();
  $this->response = $rollCall->cnt;
  return $this->response;
    unset($this->dbh);
}
  }

  public function get_student_age($dateOfBirth){
    $today = date("Y-m-d");
  $diff = date_diff(date_create($dateOfBirth), date_create($today));
return $diff->format('%y');
  }

  public function get_scratch_card_usage($pin,$serial,$stdRegNo){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE pin_code=? AND pin_serial=? AND studentRegNo=? LIMIT 1");
        $this->stmt->execute(array($pin,$serial,$stdRegNo));
        if ($this->stmt->rowCount()==1) {
            $res = $this->stmt->fetch();
            $this->response = $res->pin_counter;
            return $this->response;
            unset($this->dbh);
        }

    }
}
$StudentResult = new StudentResult();
