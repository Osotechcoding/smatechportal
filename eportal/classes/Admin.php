<?php 
@session_start();
// include_once "../languages/config.php";
require_once "Session.php";
require_once "Database.php";
require_once "Configuration.php";
// @Session::init_ses();
class Admin{
	private $dbh;
	private $table = "tbl_admin";
	protected $stmt;
	protected $query;
	protected $response;
	protected $config;
	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	public function login($data){
		global $lang;
		$email = $this->config->Clean($data['ad_email']);
		$password = $this->config->Clean($data['ad_pass']);
		$login_as = $this->config->Clean((int)$data['login_as']);
		$xss_token = $data['txss_token'];
		switch ($login_as) {
			case 1234509876:
				$accessUser ="admin";
				break;
			
			case 5432106789:
			$accessUser ="director";
				break;
			default:
			$accessUser ="";
				break;
		}
		if ($this->config->isEmptyStr($email) || $this->config->isEmptyStr($password) || $this->config->isEmptyStr($accessUser)) {
			// code...
			$this->response =$this->alert->alert_toastr("error",$lang['login_error1'],__OSO_APP_NAME__." Says");
		}elseif (! $this->config->is_Valid_Email($email)) {
			// code...
			$this->response =$this->alert->alert_toastr("warning",$lang['login_error2'],__OSO_APP_NAME__." Says");
		}else{
			 $this->query = "SELECT * FROM {$this->table} WHERE adminEmail=? AND adminType=? LIMIT 1";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->stmt->execute(array($email,$accessUser));
    if ($this->stmt->rowCount()==1) {
      $result = $this->stmt->fetch();
      $db_password = $result->adminPass;
      //check if password entered match with db pwd
      if ($this->config->check_two_passwords_hash($password,$db_password)) {
      	if (isset($data['rememberme']) && $data['rememberme']==='on') {
      		// save details to cookie
      		setcookie("login_email",$email,time()+(24*60*60*7),'/');
      		setcookie("login_pass",$password,time()+(24*60*60*7),'/');
      		setcookie("login_user",$result->adminUser,time()+(24*60*60*7),'/');
      	}else{
      		setcookie("login_email","",time()-100,'/');
      		setcookie("login_user","",time()-100,'/');
      		setcookie("login_pass","",time()-100,'/');
      	}
      	session_regenerate_id();
      	$session_token = Session::set_xss_token();
      	$_COOKIE['login_email'] =$email;
      	$_COOKIE['login_pass'] =$password;
      	$_COOKIE['login_user'] =$result->adminUser;

      	$_SESSION['ADMIN_TOKEN_ID'] =$result->adminId;
      	$_SESSION['ADMIN_SES_TYPE'] =$result->adminType;
      	$_SESSION['ADMIN_USERNAME'] =$result->adminUser;
      	$_SESSION['ADMIN_EMAIL'] =$result->adminEmail;
      	$token = $this->config->generateRandomUserToken(40);
            $_SESSION['ADMIN_TOKEN'] = $token;
      //check token 
       $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_admin_login_token` WHERE Name=? AND Email=?LIMIT 1");
      $this->stmt->execute([$_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL']]);
 
      if ($this->stmt->rowCount() == 1) {
            // code... update the token
	  $this->stmt = $this->dbh->prepare("UPDATE `visap_admin_login_token` SET Token=? WHERE Name=? AND Email=? LIMIT 1");
	  $this->stmt->execute(array($token,$_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL']));
      }else{
			$this->stmt = $this->dbh->prepare("INSERT INTO `visap_admin_login_token` (Name,Email,Token) VALUES (?,?,?);");
			$this->stmt->execute(array($_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL'],$token));
			}
      	$admin_home_link = APP_ROOT."admin/";
       $this->response = $this->alert->alert_toastr("success",$lang['login_success'],__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
         window.location.href='".$admin_home_link."';
        },500);</script>";
      }else{
         $this->response = $this->alert->alert_toastr("error",$lang['login_error4'],__OSO_APP_NAME__." Says");//Invalid Account Password
      }
    }else{
      $this->response = $this->alert->alert_toastr("error",$lang['login_error5'],__OSO_APP_NAME__." Says");// Email Address Not Found or User Details not found
    }
		}

   return $this->response;
   unset($this->dbh);
  }

  public function getAdminDetails(){
  	$session_id = $_SESSION['ADMIN_TOKEN_ID'];
  	$this->query = "SELECT * FROM $this->table WHERE adminId=?";
  	$this->stmt = $this->dbh->prepare($this->query);
  	$this->stmt->execute(array($session_id));
  	if ($this->stmt->rowCount()>0) {
  		// code...
  		$this->response = $this->stmt->fetch();
  	}
  	return $this->response;
  	unset($this->dbh);
  }

  public function isSuperAdmin($adminId){
  		$this->stmt = $this->dbh->prepare("SELECT * FROM `$this->table` WHERE adminId=? AND adminType=? LIMIT 1");
  		$Type ="Admin";
		$this->stmt->execute(array($adminId,$Type));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
  		return $this->response;
  		unset($this->dbh);
		}
  }

  public function login_from_cookie($data){
  	//@Session::init_ses();
		global $lang;
  $email = $this->config->Clean($data['cemail']);
		$password = $this->config->Clean($data['cpass']);
		if (empty($password)) {
			// code...
			$this->response =$this->alert->alert_toastr("error","Please Enter Password to Unlock your Session",__OSO_APP_NAME__." Says");
		}else{
			$this->query = "SELECT * FROM {$this->table} WHERE adminEmail=? LIMIT 1";
    $this->stmt = $this->dbh->prepare($this->query);
    $this->stmt->execute(array($email));
    if ($this->stmt->rowCount()==1) {
      $result = $this->stmt->fetch();
      $db_password = $result->adminPass;
      //check if password entered match with db pwd
      if ($this->config->check_two_passwords_hash($password,$db_password)) {
      	session_regenerate_id();
      	$session_token = Session::set_xss_token();
      	$_SESSION['ADMIN_TOKEN_ID'] =$result->adminId;
      	$_SESSION['ADMIN_SES_TYPE'] =$result->adminType;
      	$_SESSION['ADMIN_USERNAME'] =$result->adminUser;
      	$_SESSION['ADMIN_EMAIL'] =$result->adminEmail;
      		$token = $this->config->generateRandomUserToken(40);
            $_SESSION['ADMIN_TOKEN'] = $token;
      //check token 
       $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_admin_login_token` WHERE Name=? AND Email=?LIMIT 1");
      $this->stmt->execute([$_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL']]);
 
      if ($this->stmt->rowCount() == 1) {
            // code... update the token
	  $this->stmt = $this->dbh->prepare("UPDATE `visap_admin_login_token` SET Token=? WHERE Nmae=? AND Email=? LIMIT 1");
	  $this->stmt->execute(array($token,$_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL']));
      }else{
			$this->stmt = $this->dbh->prepare("INSERT INTO `visap_admin_login_token` (Name,Email,Token) VALUES (?,?,?);");
			$this->stmt->execute(array($_SESSION['ADMIN_USERNAME'],$_SESSION['ADMIN_EMAIL'],$token));
			}

      		$admin_home_link = APP_ROOT."admin/";
       $this->response = $this->alert->alert_toastr("success",$lang['login_success'],__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
         window.location.href='".$admin_home_link."';
        },500);</script>";
      }else{
         $this->response = $this->alert->alert_toastr("error",$lang['login_error4'],__OSO_APP_NAME__." Says");//Invalid Account Password
      }
      }else{
$this->response = $this->alert->alert_toastr("error",$lang['login_error5'],__OSO_APP_NAME__." Says");// Email Address Not Found or User Details not found
      }
    }
    return $this->response;
    unset($this->dbh);
		}

		public function check_Auth_data(){
  if (!isset($_SESSION['ADMIN_TOKEN_ID']) || empty($_SESSION['ADMIN_TOKEN_ID'])) {
    Session::destroy();
  }
}

public function reset_admin_password($data){
			$adminId = $this->config->Clean($data['admin_id']);
			$old_pass = $this->config->Clean($data['password']);
			$new_password = $this->config->Clean($data['new-password']);
			$confirm_new_pass = $this->config->Clean($data['confirm-new-password']);
			//check for empty
			if ($this->config->isEmptyStr($old_pass)) {
				$this->response = $this->alert->alert_toastr("error","Please enter your current password to continue!",__OSO_APP_NAME__." Says");
			}elseif ($this->config->isEmptyStr($new_password)) {
				// code...
					$this->response = $this->alert->alert_toastr("error","Enter your new Password to Continue!",__OSO_APP_NAME__." Says");
			}elseif ($this->config->isEmptyStr($confirm_new_pass)) {
				$this->response = $this->alert->alert_toastr("error","Confirm your new Password to Continue!",__OSO_APP_NAME__." Says");
			}elseif ((strlen($new_password) < 8) || (strlen($new_password) >15)) {
				$this->response = $this->alert->alert_toastr("error","Password lenght must be between Eight (8) and twelve (12) characters","danger");
			}elseif ($new_password !== $confirm_new_pass) {
				$this->response = $this->alert->alert_toastr("error","New Password and Confirm Password is not Match!",__OSO_APP_NAME__." Says");
			}else{
				//check the old pass with the one in the database
				$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE adminId=? LIMIT 1");
				$this->stmt->execute(array($adminId));
				if ($this->stmt->rowCount()==1) {
					// grab the old pasword from db
					$row = $this->stmt->fetch();
					$database_old_password = $row->adminPass;
					//lets compare the two passwords now
					if ($this->config->check_two_passwords_hash($old_pass,$database_old_password)) {
						// lets update the new password...
						$real_pass = $this->config->encrypt_user_password($new_password);
						//final update
						try {
							$this->dbh->beginTransaction();
								$this->stmt = $this->dbh->prepare("UPDATE {$this->table} SET adminPass=? WHERE adminId=? LIMIT 1");
				if ($this->stmt->execute(array($real_pass,$adminId))) {
					// code...
					$this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Password updated Successfully! Please wait...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.href='logout?action=logout';
			},500);</script>";
				}else{
			$this->response = $this->alert->alert_toastr("error","Internal Error Occured!, Please try again",__OSO_APP_NAME__." Says");
				}

						} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Password update failed: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
						}

					}else{
					$this->response = $this->alert->alert_toastr("error","Old Password is not Match!",__OSO_APP_NAME__." Says");
					}
				}else{
					//echo
					$this->response = $this->alert->alert_toastr("error","Account details not found!",__OSO_APP_NAME__." Says");
				}
			}

			return $this->response;
		unset($this->dbh);
		}
		public function update_admin_details_now($data){
			$UserName = $this->config->Clean($data['UserName']);
			$admin_id = $this->config->Clean($data['admin_id']);
			$fullName = $this->config->Clean($data['fullName']);
			$userType = $this->config->Clean($data['userType']);
			$auth_pass = $this->config->Clean($data['auth_pass']);
			//check for empty values
			if ($this->config->isEmptyStr($admin_id) || $this->config->isEmptyStr($UserName) || $this->config->isEmptyStr($fullName) || $this->config->isEmptyStr($userType) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("warning","Invalid form submission!, Please try again",__OSO_APP_NAME__." Says");
			}elseif ($auth_pass!== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Please enter a Valid authentication code to Continue!",__OSO_APP_NAME__." Says");
			}else{
				try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE {$this->table} SET adminUser=?,fullname=? WHERE adminId=? AND adminType=? LIMIT 1");
				if ($this->stmt->execute(array($UserName,$fullName,$admin_id,$userType))) {
					// code...
					$this->dbh->commit();
		$this->response = $this->alert->alert_toastr("success"," Details updated Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},1500);</script>";
				}else{
			$this->response = $this->alert->alert_toastr("error","Internal Error Occured!, Please try again",__OSO_APP_NAME__." Says");
				}

						} catch (PDOException $e) {
			$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Failed: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
						}
			}
			return $this->response;
		unset($this->dbh);
		}

		//GENERATE OAUTH CODE FOR SCHOOLS
		public function generateOAuthCodeForSchools($data){
			$code = $this->config->Clean($data['code']);
			$sessioncode = $this->config->Clean($data['sessioncode']);
			$termcode = $this->config->Clean($data['termcode']);
			$schoolname = $this->config->Clean($data['schoolname']);
			if ($this->config->isEmptyStr($schoolname) || $this->config->isEmptyStr($termcode)|| $this->config->isEmptyStr($sessioncode)) {
				$this->response = $this->alert->alert_toastr("error","Please enter the School name, Term and the session to continue!",__OSO_APP_NAME__." Says");
			}elseif ($this->config->isEmptyStr($code)) {
				$this->response = $this->alert->alert_toastr("error","Please Generate Oauth Code to Continue!",__OSO_APP_NAME__." Says");
			}
			else{
				//check for duplicate entry
				$this->stmt = $this->dbh->prepare("SELECT * FROM `school_oauth_code_tbl` WHERE active_ses=? AND term=? AND school_name=? LIMIT 1");
				$this->stmt->execute(array($sessioncode,$termcode,$schoolname));
				if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error","Code Already Generated for $schoolname for $termcode of $sessioncode!",__OSO_APP_NAME__." Says");
				}else{
//create a fresh code for the selected school,term session
					try {
						$created_at = date("Y-m-d");
								$this->dbh->beginTransaction();
								$this->stmt = $this->dbh->prepare("INSERT INTO `school_oauth_code_tbl` (school_name,term,active_ses,oauth_code,created_at) VALUES (?,?,?,?,?);");
				if ($this->stmt->execute(array($schoolname,$termcode,$sessioncode,$code,$created_at))) {
					// code...
					$this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Oauth Code Generated Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}else{
			$this->response = $this->alert->alert_toastr("error","Internal Error Occured!, Please try again",__OSO_APP_NAME__." Says");
				}
						
					} catch (Exception $e) {
						$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Failed: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
					}
				}
			}

			return $this->response;
				unset($this->dbh);
		}

		public function getAllOauthCode(){
			$this->stmt = $this->dbh->prepare("SELECT * FROM `school_oauth_code_tbl` ORDER BY school_name ASC LIMIT 50");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			}else{
				$this->response = false;
			}
			return $this->response;
			unset($this->dbh);
		}


		public function deleteSchoolOauthCode($codeId){
			if (!$this->config->isEmptyStr($codeId)) {
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `school_oauth_code_tbl` WHERE id=? LIMIT 1");
		if ($this->stmt->execute([$codeId])) {
			// code...
			 $this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","Oauth Code Deleted Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
   $this->response  =$this->alert->alert_toastr("error","Failed: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
			// code...
		}else{
			$this->response = false;
		}
		return $this->response;
		unset($this->dbh);
		}

		public function checkAdminTokenExists($name,$email,$token){
	if (isset($name,$email,$token)) {
		$this->stmt = $this->dbh->prepare("SELECT token FROM `visap_admin_login_token` WHERE Name=? AND Email=? LIMIT 1");
		$this->stmt->execute(array($name,$email));
		if ($this->stmt->rowCount() ==1) {
			//collect the current token from db
			$tokenRow = $this->stmt->fetch();
			$currentToken = $tokenRow->token;
			//compare the two tokens
			if ($token !== $currentToken) {
				//return false
				$this->response = false;
			}
		}
	}
	return $this->response;
	 unset($this->dbh);
}

//delete toke upon logged out
public function deleteAdminSessionToken($name,$email,$token){
	$this->stmt = $this->dbh->prepare("DELETE FROM `visap_admin_login_token` WHERE Name=? AND Email=? LIMIT 1");
		if ($this->stmt->execute(array($name,$email))) {
		$this->response = true;
		}
		return $this->response;
		 unset($this->dbh);
}
			
		
}
