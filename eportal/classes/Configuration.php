<?php
// @session_start();
require_once 'Database.php';
require_once 'Session.php';
/*
Configuration Class
 */

class Configuration
{
  private $dbh;
  protected $query;
  protected $stmt;
  protected $response;

  public  function __construct()
  {
    // check if .php exists in our url and redirect the user to 404 page
    if (substr($_SERVER['REQUEST_URI'], -4) == ".php" or (stripos($_SERVER['REQUEST_URI'], ".php") == true)) {
      // send the user to error 404 page
      //self::url_redirect_root("error-404");
      Session::redirect_root("page-not-authorized");
      // header("Location: page-not-authorized");
      //exit();
    }
    $this->dbh = osotech_connect();
  }

  public function osotech_session_kick()
  {
    @session_start();
  }

  public function set_time_Zone()
  {
    return date_default_timezone_set("Africa/Lagos");
  }
  public function check_single_data($table, $field, $field_val): bool
  {
    $this->query = "SELECT * FROM `{$table}` WHERE `{$field}`=?";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->stmt->execute(array($field_val));
    if ($this->stmt->rowCount() > 0) {
      $this->response = true;
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  public function checkMultipleValues($table, $field1, $val1,$field2, $val2): bool
  {
    $this->query = "SELECT * FROM `{$table}` WHERE `{$field1}`=? AND `{$field2}`=?";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->stmt->execute(array($val1,$val2));
    if ($this->stmt->rowCount() > 0) {
      $this->response = true;
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  //states in dropdown list
  public function get_data_in_dropdown($table, $field, $val)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$table} ORDER BY {$field} ASC");
    $this->stmt->execute();
    while ($row_get = $this->stmt->fetch()) {
      //$state_id = $row_get->state_id;
      $data = $row_get->$val;
      echo '<option value="' . $data . '">' . $data . '</option>';
    }
  }
  public function check_two_passwords_hash($password, $db_password)
  {
    $this->response = password_verify($password, $db_password);
    return ($this->response == true) ? true : false;
  }
  public function check_two_passwords($password, $cpassword)
  {

    $this->response = ($password === $cpassword) ? true : false;
    return $this->response;
  }

  public function greet_user()
  {
    global $lang;
    $time = date("H");
    if ($time >= 0 && $time <= 12) {
      $this->response = $lang['GM'];
    } else if ($time > 12 && $time <= 15) {
      $this->response = $lang['GA'];
    } else if ($time > 15 && $time <= 22) {
      $this->response = $lang['GE'];
    } else {
      $this->response = $lang['GN'];
    }
    echo $this->response;
  }
  //fetch config 
  public function getConfigData()
  {
    $this->query = "SELECT * FROM `visap_school_profile` WHERE id=1";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->response = $this->stmt->execute();
    if ($this->stmt->rowCount() > 0) {
      // code...
      $this->response = $this->stmt->fetch();
      return $this->response;
    }
  }

  public function encrypt_user_password($password)
  {
    if (!self::isEmptyStr($password)) {
      $this->response = password_hash($password, PASSWORD_DEFAULT);
      return $this->response;
    }
  }

  //String Conversion
  public function convert_String($action, $string)
  {
    $output = "";
    $Encrypt_method = "AES-256-CBC";
    $Secret_key = "ilovemywifeoiza!@iremidesomuch@!)";
    $Secret_iv = "ilovemywifeoiza!";
    $key = hash('sha256', $Secret_key);
    $initialization_vector = substr(hash('sha256', $Secret_iv), 0, 16);

    if (!self::isEmptyStr($string)) {
      //check the type of action
      if ($action == "code") {
        // encrypt string
        $output = openssl_encrypt($string, $Encrypt_method, $key, 0, $initialization_vector);
        $output = base64_encode($output);
      }
      if ($action == "decode") {
        // code...
        $output = base64_decode($string);
        $output = openssl_decrypt($output, $Encrypt_method, $key, 0, $initialization_vector);
      }
    }
    return $output;
  }

  public function Clean($string)
  {
    if (!empty($string)) {
      $string = trim($string);
      //$string = htmlspecialchars($string);
      $string = stripcslashes($string);
      //$string = filter_var($string, FILTER_SANITIZE_STRING);
      return $string;
    }
  }
  //check email validity
  public function is_Valid_Email($email)
  {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->response = true;
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  public function is_valid_password($password)
  {
    $this->response = preg_match_all('$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$', $password);
    return ($this->response == true) ? true : false;
  }

  public function isEmptyStr($str)
  {
    return ($str === "" || empty($str)) ? true : false;
  }

  public function check_string_lenght_greater(int $len, $string)
  {
    if (!self::isEmptyStr($string) && is_string($string)) {
      $result = (strlen($string) > $len) ? true : false;
    }
  }
  public function check_string_lenght_lesser(int $len, $string)
  {
    if (!self::isEmptyStr($string) && is_string($string)) {
      $result = (strlen($string) < $len) ? true : false;
    }
  }

  public function move_file_to_folder($filename, $destination): bool
  {
    $this->response = move_uploaded_file($filename, $destination) ? true : false;
    return $this->response;
  }

  // Validation for the mobile field.
  /*
^ symbol of the regular expression denotes the start
[+]? ensures that a single(or zero) + symbol is allowed at the start
[1-9] make sure that the first digit will be a non zero number
[0-9]{9,14} will make sure that there is 9 to 14 digits
$ denotes the end
^[+]?[1-9][0-9]{9,14}$
*/
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

  public function check_session_data()
  {
    if (!isset($_SESSION['STAFF_SES_ID']) || empty($_SESSION['STAFF_SES_ID'])) {
      Session::destroy();
    }
  }

  public function check_student_session_data()
  {
    if (!isset($_SESSION['STD_SES_ID']) || empty($_SESSION['STD_SES_ID'])) {
      Session::destroy();
    }
  }

  //get all configuration modules
  public function get_configuration_modules_by_type($type)
  {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE type=? AND module<>'card_generator' ORDER BY id ASC ");
    $this->stmt->execute(array($type));
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetchAll();
      return $this->response;
      $this->dbh = null;
    }
  }
  public function check_user_activity_allowed($module)
  {
    $status = '1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE module=? AND status=? LIMIT 1");
    $this->stmt->execute(array($module, $status));
    if ($this->stmt->rowCount() == 1) {
      $this->response = true;
      return $this->response;
      $this->dbh = null;
    }
  }

  public function get_schoolLogoImage()
  {
    $schoolDatas = $this->getConfigData();
    //school real logo 
    $schoolLogo = $schoolDatas->school_logo;
    if ($schoolLogo == NULL || $schoolLogo == "") {
      $ourLogo = APP_ROOT . "schoolImages/Logo/smatech.png";
    } else {
      $ourLogo = APP_ROOT . "schoolImages/Logo/" . $schoolLogo;
    }
    $this->response = $ourLogo;
    return $this->response;
  }

  //USER LOGIN TOKEN
  public function generateRandomUserToken($len)
  {
    $this->response = "";
    $stringCode = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $stringCode .= "abcdefghijklmnopqrstuvwxyz";
    $stringCode .= "1234567890";
    $keyMax = strlen($stringCode);
    $Str = str_shuffle($stringCode);
    for ($i = 0; $i < $len; $i++) {
      // code...
      $this->response .= $Str[random_int(0, $keyMax - 1)];
    }
    return $this->response;
  }

  public function destroy()
  {
    @session_destroy();
    @header("Location:" . APP_ROOT);
    exit();
  }

  public function authenticateRegistrationCard($cardpin, $serial)
  {
    $status = '1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE pin_code=? AND pin_serial=? AND pin_status=? LIMIT 1");
    $this->stmt->execute(array($cardpin, $serial, $status));
    if ($this->stmt->rowCount() == 1) {
      $this->response = true;
      return $this->response;
      $this->dbh = null;
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

  public function get_single_data($table, $field, $val)
  {
    $this->query = "SELECT * FROM `{$table}` WHERE `{$field}`=?";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->stmt->execute(array($val));
    if ($this->stmt->rowCount() > 0) {
      $this->response = $this->stmt->fetch();
    } else {
      $this->response = false;
    }
    return $this->response;
  }

  public function CheckPasswordValidity($password): bool
  {
    // Validate password strength
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);
    if (!$uppercase || !$lowercase || !$number || !$specialChars || strlen($password) < 8) {
      return false;
    } else {
      return true;
    }
  }

  public function redirect($path)
  {
    return '<script>
      window.location.href="' . $path . '";
    </script>';
  }
  public function reloadWithTime($time = 2000)
  {
    return '<script>
     setTimeout(()=>{
       window.location.reload();
     },' . $time . ');
    </script>';
  }
  public function redirectWithTime(string $path, int $time = 500)
  {
    return '<script>
     setTimeout(()=>{
       window.location.href="' . $path . '";
     },' . $time . ');
    </script>';
  }

  public function convertToMbKbFormat($size)
  {
    if (1024 > $size) {
      return $size . ' B';
    } else if (1048576 > $size) {
      return round(($size / 1024), 2) . ' KB';
    } else if (1073741824 > $size) {
      return round((($size / 1024) / 1024), 2) . ' MB';
    } else if (1099511627776 > $size) {
      return round(((($size / 1024) / 1024) / 1024), 2) . ' GB';
    }
  }

  public function getSchoolSignature()
  {
    $schoolDatas = self::getConfigData();
    //school real logo
    $signature = $schoolDatas->signature;
    if ($signature == NULL || $signature == "") {
      $ourSignature = APP_ROOT . "schoolImages/Logo/sign.png";
    } else {
      $ourSignature = APP_ROOT . "schoolImages/Logo/" . $signature;
    }
    return $ourSignature;
  }
  public function getSchoolStamp()
  {
    $schoolDatas = self::getConfigData();
    //school real logo
    $stamp = $schoolDatas->stamp;
    if ($stamp == NULL || $stamp == "") {
      $ourStamp = APP_ROOT . "schoolImages/Logo/stamp.png";
    } else {
      $ourStamp = APP_ROOT . "schoolImages/Logo/" . $stamp;
    }
    return $ourStamp;
  }
}