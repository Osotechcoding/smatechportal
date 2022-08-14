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
	
public	function __construct()
	{
		// check if .php exists in our url and redirect the user to 404 page
		 if (substr($_SERVER['REQUEST_URI'], -4) == ".php" or (stripos($_SERVER['REQUEST_URI'], ".php")== true)) {
      // send the user to error 404 page
      //self::url_redirect_root("error-404");
      Session::redirect_root("page-not-authorized");
     // header("Location: page-not-authorized");
      //exit();
    }
    $conn = new Database;
    $this->dbh = $conn->osotech_connect();
    //$this->dbh = new Database;
	}

  public function osotech_session_kick(){
    @session_start();
  }

	 public function set_time_Zone(){
    return date_default_timezone_set("Africa/Lagos");
  }
  public function check_single_data($table,$field,$field_val){
  	$this->query ="SELECT * FROM {$table} WHERE {$field}=? LIMIT 1";
		$this->stmt=$this->dbh->prepare($this->query);
		$this->stmt->execute(array($field_val));
		if ($this->stmt->rowCount()>0) {
			$this->response = true;
		}else{
			$this->response = false;
		}
		return $this->response;
  }

  //states in dropdown list
  public function get_data_in_dropdown($table,$field,$val){
  	$this->stmt = $this->dbh->prepare("SELECT * FROM {$table} ORDER BY {$field} ASC");
        $this->stmt->execute();
        while ($row_get = $this->stmt->fetch()) {
            //$state_id = $row_get->state_id;
            $data = $row_get->$val;
            echo '<option value="' . $data . '">' . $data . '</option>';
        }
  }
public function check_two_passwords_hash($password,$db_password){
    $this->response = password_verify($password, $db_password);
    return ($this->response == true)? true : false;
  }
  public function check_two_passwords($password,$cpassword){
    
    $this->response = ($password === $cpassword)? true : false;
    return $this->response;
  }
  
  public function greet_user(){
  global $lang;
	$time = date("H");
	if ($time >=0 && $time <= 12) {
   $this->response = $lang['GM'];
	}else if($time >12 && $time <= 15){
   $this->response = $lang['GA'];
	}else if($time >15 && $time <= 22){
  $this->response = $lang['GE'];
	}else{
   $this->response = $lang['GN'];
	}
	echo $this->response;
	}
	//fetch config 
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

   public function encrypt_user_password($password){
    if (!self::isEmptyStr($password)) {
      $this->response = password_hash($password, PASSWORD_DEFAULT);
      return $this->response;
    }
  }

   //String Conversion
  public function convert_String($action,$string){
    $output ="";
    $Encrypt_method ="AES-256-CBC";
    $Secret_key = "ilovemywifeoiza!@iremidesomuch@!)";
    $Secret_iv = "ilovemywifeoiza!";
    $key = hash('sha256',$Secret_key);
    $initialization_vector =substr(hash('sha256',$Secret_iv), 0,16);
    
    if (!self::isEmptyStr($string)) {
      //check the type of action
      if ($action =="code") {
        // encrypt string
        $output = openssl_encrypt($string, $Encrypt_method,$key,0, $initialization_vector);
        $output = base64_encode($output);
      }
      if ($action =="decode") {
        // code...
        $output = base64_decode($string);
        $output= openssl_decrypt($output, $Encrypt_method,$key,0, $initialization_vector);
      }

    }
    return $output;
  }

   public function Clean($string) {
    if (!empty($string)) {
      $string = trim($string);
   // $string = htmlspecialchars($string);
     $string = stripcslashes($string);
     $string = filter_var($string,FILTER_SANITIZE_STRING);
     return $string;
    }
 }
 //check email validity
  public function is_Valid_Email($email){
    if (filter_var($email,FILTER_VALIDATE_EMAIL)) {
    $this->response = true;
    }else{
      $this->response = false;
    }
    return $this->response;
  }

    public function is_valid_password($password) {
    $this->response = preg_match_all('$S*(?=S{8,})(?=S*[a-z])(?=S*[A-Z])(?=S*[d])(?=S*[W])S*$', $password);
    return ($this->response==true)? true : false;
}

public function isEmptyStr($str){
return ($str === "" || empty($str))? true : false;
}

public function check_string_lenght_greater(int $len,$string): bool{
  if (!self::isEmptyStr($string) && is_string($string)) {
    $result = (strlen($string) > $len) ? true : false;
  }
}
public function check_string_lenght_lesser(int $len,$string): bool{
  if (!self::isEmptyStr($string) && is_string($string)) {
    $result = (strlen($string) < $len) ? true : false;
  }
}

public function move_file_to_folder($filename,$destination):bool{
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

public function check_session_data(){
  if (!isset($_SESSION['STAFF_SES_ID']) || empty($_SESSION['STAFF_SES_ID'])) {
    Session::destroy();
  }
}

public function check_student_session_data(){
  if (!isset($_SESSION['STD_SES_ID']) || empty($_SESSION['STD_SES_ID'])) {
    Session::destroy();
  }
}

//get all configuration modules
  public function get_configuration_modules_by_type($type){
    $this->stmt = $this->dbh->prepare("SELECT * FROM `api_module_config` WHERE type=? ORDER BY id ASC ");
    $this->stmt->execute(array($type));
    if ($this->stmt->rowCount()>0) {
      $this->response = $this->stmt->fetchAll();
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

  public function resizeImage($file_name, $width, $height, $crop=FALSE){
     list($wid, $ht) = getimagesize($file_name);
   $r = $wid / $ht;
   if ($crop) {
      if ($wid > $ht) {
         $wid = ceil($wid-($width*abs($r-$width/$height)));
      } else {
         $ht = ceil($ht-($ht*abs($r-$w/$h)));
      }
      $new_width = $width;
      $new_height = $height;
   } else {
      if ($width/$height > $r) {
         $new_width = $height*$r;
         $new_height = $height;
      } else {
         $new_height = $width/$r;
         $new_width = $width;
      }
   }
   $source = imagecreatefromjpeg($file_name);
  $this->response = imagecreatetruecolor($new_width, $new_height);
   image_copy_resampled($this->response, $source, 0, 0, 0, 0, $new_width, $new_height, $wid, $ht);
   return $this->response;
   //usage 
   //$img_to_resize = resizeImage(‘path-to-jpg-image’, 210, 210);
  }

  public function get_schoolLogoImage(){
    $schoolDatas = self::getConfigData();
    //school real logo 
    $schoolLogo = $schoolDatas->school_logo;
    if ($schoolLogo == NULL || $schoolLogo =="") {
      $ourLogo = APP_ROOT."schoolImages/Logo/smatech.png";
    }else{
       $ourLogo = APP_ROOT."schoolImages/Logo/".$schoolLogo;
    }
    $this->response = $ourLogo;
    return $this->response;
  }

//USER LOGIN TOKEN
  Public function generateRandomUserToken($len){
  $this->response = "";
  $stringCode = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
  $stringCode .="abcdefghijklmnopqrstuvwxyz";
  $stringCode.="1234567890";
  $keyMax = strlen($stringCode);
  $Str =str_shuffle($stringCode);
  for ($i=0; $i < $len; $i++) { 
    // code...
    $this->response.= $Str[random_int(0,$keyMax-1)];
  }
  return $this->response;
}

  public function destroy(){
    @session_destroy();
  @header("Location:".APP_ROOT);
  exit();
  }

  public function authenticateRegistrationCard($cardpin,$serial){
    $status ='1';
    $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE pin_code=? AND pin_serial=? AND pin_status=? LIMIT 1");
    $this->stmt->execute(array($cardpin,$serial,$status));
    if ($this->stmt->rowCount()==1) {
      $this->response = true;
      return $this->response;
       unset($this->dbh);
    }
  }

}
$Configuration = new Configuration();