<?php

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
    if ((substr($_SERVER['REQUEST_URI'], -4) == ".php") or (stripos($_SERVER['REQUEST_URI'], ".php") == true)) {
     $this->redirect_root("error");
    }

    $this->dbh = osotech_connect();
  }

  public function osotech_session_kick()
  {
    return session_start();
  }

  public function redirect_root($flink)
  {
    @header("Location: " . ADMISSION_PORTAL_ROOT . $flink);
    exit();
  }

  function saltifyString($string)
  {
    return urlencode(base64_encode($string));
  }

  function unsaltifyString($string)
  {
    return base64_decode(urldecode($string));
  }

  public function get_classroom_InDropDown_list()
  {
    $this->response = "";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeId ASC LIMIT 30");
    $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      while ($row = $this->stmt->fetch()) {
        $this->response .= '<option value="' . $row->gradeDesc . '">' . $row->gradeDesc . '</option>';
      }
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  //fetch all session list
  public function get_all_session_lists()
  {
    $this->response = "";
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` ORDER BY session_desc ASC LIMIT 30");
    $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      while ($row = $this->stmt->fetch()) {
        $this->response .= '<option value="' . $row->session_desc . '">' . $row->session_desc . '</option>';
        return $this->response;
      }
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

  public function alert_msg($alert_type = "warning", $alert_title = "", $alert_msg = "")
  {
    $this->response = '<div class="alert alert-' . $alert_type . ' alert-dismissible fade show" role="alert">
         <strong>' . $alert_title . '!</strong> ' . $alert_msg . '
         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
       </div>';
    return $this->response;
  }

  public function check_duplicate_phone($myPhone)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdPhone=? LIMIT 1");
    $this->stmt->execute(array($myPhone));
    if ($this->stmt->rowCount() == 1) {
      // myPhone no is already taken...
      $this->response = '<i class="text-danger">' . $myPhone . ' is not allowed on this portal.</i>';
    } else {
      //let check staff for this myPhone
      $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffPhone=? LIMIT 1");
      $this->stmt->execute(array($myPhone));
      if ($this->stmt->rowCount() == 1) {
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
    if (!self::isEmptyStr($password)) {
      $this->response = password_hash($password, PASSWORD_DEFAULT);
      return $this->response;
    }
  }

  public function check_duplicate_email($Email)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_tbl` WHERE stdEmail=? LIMIT 1");
    $this->stmt->execute(array($Email));
    if ($this->stmt->rowCount() == 1) {
      // phone no is already taken...
      $this->response = '<i class="text-danger">' . $Email . ' is is not allowed on this portal.</i>';
    } else {
      //let check staff for this phone
      $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffEmail=? LIMIT 1");
      $this->stmt->execute(array($Email));
      if ($this->stmt->rowCount() == 1) {
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

  public function getConfigData()
  {
    $query = "SELECT * FROM `visap_school_profile` WHERE id=1";
    $this->stmt = $this->dbh->prepare($query);
    $this->response = $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }
  public function get_schoolLogoImage()
  {
    $schoolDatas =$this->getConfigData();
    //school real logo
    $schoolLogo = $schoolDatas->school_logo;
    if ($schoolLogo == NULL || $schoolLogo == "") {
      $ourLogo = APP_ROOT . "eportal/schoolImages/Logo/smatech.png";
    } else {
      $ourLogo = APP_ROOT . "eportal/schoolImages/Logo/" . $schoolLogo;
    }
    $this->response = $ourLogo;
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

  public function get_school_session_info()
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `current_session_tbl` WHERE id=1 LIMIT 1");
    $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
      return $this->response;

    }
  }
  public function get_student_age($dateOfBirth)
  {
    $today = date("Y-m-d");
    $diff = date_diff(date_create($dateOfBirth), date_create($today));
    return $diff->format('%y');
  }
  public function get_session_details()
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` WHERE seId=1 LIMIT 1");
    $this->stmt->execute();
    $this->response = $this->stmt->fetch();
    return $this->response;
  }

  public function getSchoolSignature()
  {
    $schoolDatas =$this->getConfigData();
    //school real logo
    $signature = $schoolDatas->signature;
    if ($signature == NULL || $signature == "") {
      $ourSignature = APP_ROOT . "eportal/schoolImages/Logo/sign.png";
    } else {
      $ourSignature = APP_ROOT . "eportal/schoolImages/Logo/" . $signature;
    }
    return $ourSignature;
  }
  public function getSchoolStamp()
  {
    $schoolDatas =$this->getConfigData();
    //school real logo
    $stamp = $schoolDatas->stamp;
    if ($stamp == NULL || $stamp == "") {
      $ourStamp = APP_ROOT . "eportal/schoolImages/Logo/stamp.png";
    } else {
      $ourStamp = APP_ROOT . "eportal/schoolImages/Logo/" . $stamp;
    }
    return $ourStamp;
  }
  /**
   * Undocumented function
   *
   * @param string $passport
   * @param string $gender
   * @return string $imagePath
   */
  public function displayStudentPassport(string $passport, string $gender) : string 
  {
    if($passport == NULL || $passport == ""){
      if($gender == "Male"){
          $imagePath = APP_ROOT."eportal/schoolImages/students/male.png";
        }else{
          $imagePath = APP_ROOT."eportal/schoolImages/students/female.png";
        }
  }else{
    $imagePath = APP_ROOT."eportal/schoolImages/students/".$passport;
  }
  return $imagePath;
  }
}