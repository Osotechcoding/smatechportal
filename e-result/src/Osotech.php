<?php
@session_start();
/**
 *
 */
  include_once "initialize.php";
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

    function saltifyString($string){
        return urlencode(base64_encode($string));
        }

    function unsaltifyString($string){
    return base64_decode(urldecode($string));
    }

    public function get_classroom_InDropDown_list(){
    $this->response ="";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeDesc ASC LIMIT 30");
    $this->stmt->execute();
    if ($this->stmt->rowCount()>0) {
    while ($row = $this->stmt->fetch()) {
    $this->response.='<option value="'.$row->gradeDesc.' '.$row->grade_division.'">'.$row->gradeDesc.' '.$row->grade_division.'</option>';
    }
    }else{
    $this->response = false;
    }
    return $this->response;
    }

    //fetch all session list
    public function get_all_session_lists(){
    $this->response ="";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` ORDER BY session_desc ASC LIMIT 30");
    $this->stmt->execute();
    if ($this->stmt->rowCount()>0) {
    while ($row = $this->stmt->fetch()) {
    $this->response.='<option value="'.$row->session_desc.'">'.$row->session_desc.'</option>';
    return $this->response;
    unset($this->dbh);
    }
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



    public function alert_msg($alert_type="warning", $alert_title="",$alert_msg=""){
       $this->response ='<div class="alert alert-'.$alert_type.' alert-dismissible fade show" role="alert">
         <strong>'.$alert_title.'!</strong> '.$alert_msg.'
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
       return $this->response;
       }

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