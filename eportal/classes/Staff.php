<?php  
# https://www.youtube.com/watch?v=iG2jotQo9NI
# https://www.youtube.com/watch?v=l4G2MVgXFkw
/**
 * 
 */
@session_start();
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
class Staff {
	private $dbh;//database connection
	protected $stmt;//database statement
	protected $table ="visap_staff_tbl";
	protected $response;//database result
	protected $config;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	//new job application method
	public function login_staff($data){
		//@Session::init_ses();
		global $lang;
		$email = $this->config->Clean($data['login_email']);
		$password = $this->config->Clean($data['login_password']);
		$userType = $this->config->Clean(ucfirst($data['login_as']));
		if (!$this->config->check_user_activity_allowed("staff_login")) {
		$this->response =$this->alert->alert_toastr("error","Login is currently not allowed!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($email) || $this->config->isEmptyStr($password) || $this->config->isEmptyStr($userType)) {
			// code...
			$this->response =$this->alert->alert_toastr("error","Login Details are required!",__OSO_APP_NAME__." Says");
		}elseif (! $this->config->is_Valid_Email($email)) {
			// code...
			$this->response =$this->alert->alert_toastr("error","Invalid Login Details!",__OSO_APP_NAME__." Says");
		}else{
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE staffEmail=? AND staffRole=? LIMIT 1");
    $this->stmt->execute(array($email,$userType));
    if ($this->stmt->rowCount()==1) {
      $result = $this->stmt->fetch();
      $db_password = $result->staffPass;
      $Role = $result->staffRole;
      //check if password entered match with db pwd 
      if ($this->config->check_two_passwords_hash($password,$db_password)) {
      	if (isset($data['rememberme']) && $data['rememberme']==='on') {
      		// save details to cookie
      		setcookie("login_email",$email,time()+(24*60*60*7),'/');
      		setcookie("login_pass",$password,time()+(24*60*60*7),'/');
      		setcookie("login_user",$result->staffUser,time()+(24*60*60*7),'/');
      		setcookie("login_role",$result->staffRole,time()+(24*60*60*7),'/');
      	}else{
      		setcookie("login_email","",time()-100,'/');
      		setcookie("login_user","",time()-100,'/');
      		setcookie("login_pass","",time()-100,'/');
      		setcookie("login_role","",time()-100,'/');
      	}
      	session_regenerate_id();
      	//$session_token = Session::set_xss_token();
      	$_COOKIE['login_email'] =$email;
      	$_COOKIE['login_pass'] =$password;
      	$_COOKIE['login_role'] =$result->staffRole;
      	$_COOKIE['login_user'] =$result->staffUser;
      	$_SESSION['STAFF_SES_ID'] =$result->staffId;
      	$_SESSION['STAFF_ROLE'] =$result->staffRole;
      	$_SESSION['STAFF_USERNAME'] =$result->staffUser;
      	$_SESSION['STAFF_EMAIL'] =$result->staffEmail;

      	//LOGIN TOKEN
      	    $token = $this->config->generateRandomUserToken(30);
            $_SESSION['staff_token'] = $token;
      //check token 
       $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_login_token` WHERE username=? AND email=?LIMIT 1");
      $this->stmt->execute([$_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL']]);
 
      if ($this->stmt->rowCount() == 1) {
            // code... update the token
  $this->stmt = $this->dbh->prepare("UPDATE `visap_staff_login_token` SET token=? WHERE username=? AND email=? LIMIT 1");
  $this->stmt->execute(array($token,$_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL']));
      }else{
$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_login_token` (username,email,token) VALUES (?,?,?);");
$this->stmt->execute(array($_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL'],$token));
}
      	//check for user type
      	$this->stmt = $this->dbh->prepare("UPDATE $this->table SET online=1 WHERE staffId=? LIMIT 1");
      	if ($this->stmt->execute(array($result->staffId))) {
      		// code...
      		switch ($Role) {
      		case 'Teacher':
      			$urlLink = APP_ROOT."teacher/";
      			break;

      			case 'Class Teacher':
      			$urlLink = APP_ROOT."teacher/";
      			break;

      			case 'Principal':
      			$urlLink = APP_ROOT."principal/";
      			break;

      				case 'Registrar':
      			$urlLink = APP_ROOT."principal/";
      			break;

      			case 'Vice Principal':
      			$urlLink = APP_ROOT."principal/";
      			break;

      			case 'Bursar':
      			$urlLink = APP_ROOT."bursar/";
      			break;

      				case 'Receptionist':
      			$urlLink = APP_ROOT."receptionist/";
      			break;
      	}
      	$this->response = $this->alert->alert_toastr("success",$lang['login_success'],__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
         window.location.href='".$urlLink."';
        },1000);</script>";
      	}else{
      		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured Try again...",__OSO_APP_NAME__." Says");
      	}
      }else{
         $this->response = $this->alert->alert_toastr("error","Invalid Login Details",__OSO_APP_NAME__." Says");//Invalid Account Password
      }
    }else{
      $this->response = $this->alert->alert_toastr("error","Invalid Login!",__OSO_APP_NAME__." Says");// Email Address Not Found or User Details not found
    }
		}
		
   return $this->response;
   unset($this->dbh);
	}

	 public function login_from_cookie_staff($data){
		global $lang;
  $email = $this->config->Clean($data['cemail']);
		$password = $this->config->Clean($data['cpass']);
		$crole = $this->config->Clean(ucfirst($data['crole']));
		if ($this->config->isEmptyStr($password)) {
			// code...
			$this->response =$this->alert->alert_toastr("warning","Please Enter Password to Unlock your Session",__OSO_APP_NAME__." Says");
		}else{
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE staffEmail=? AND staffRole=? LIMIT 1");
    $this->stmt->execute(array($email,$crole));
    if ($this->stmt->rowCount()==1) {
      $result = $this->stmt->fetch();
      $db_password = $result->staffPass;
       $Role = $result->staffRole;
      //check if password entered match with db pwd 
      if ($this->config->check_two_passwords_hash($password,$db_password)) {
      	$session_token = Session::set_xss_token();
      	$_COOKIE['login_email'] =$email;
      	$_COOKIE['login_pass'] =$password;
      	$_COOKIE['login_role'] =$result->staffRole;
      	$_COOKIE['login_user'] =$result->staffUser;
      	$_SESSION['STAFF_SES_ID'] =$result->staffId;
      	$_SESSION['STAFF_ROLE'] =$result->staffRole;
      	$_SESSION['STAFF_USERNAME'] =$result->staffUser;
      	$_SESSION['STAFF_EMAIL'] =$result->staffEmail;
      	//LOGIN TOKEN
      	    $token = $this->config->generateRandomUserToken(30);
            $_SESSION['staff_token'] = $token;
      //check token 
       $this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_login_token` WHERE username=? AND email=?LIMIT 1");
      $this->stmt->execute([$_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL']]);
 
      if ($this->stmt->rowCount() == 1) {
            // code... update the token
	  $this->stmt = $this->dbh->prepare("UPDATE `visap_staff_login_token` SET token=? WHERE username=? AND email=? LIMIT 1");
	  $this->stmt->execute(array($token,$_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL']));
      }else{
			$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_login_token` (username,email,token) VALUES (?,?,?);");
			$this->stmt->execute(array($_SESSION['STAFF_USERNAME'],$_SESSION['STAFF_EMAIL'],$token));
			}
      	//check for user type
      		$this->stmt = $this->dbh->prepare("UPDATE {$this->table} SET online=1 WHERE staffId=? LIMIT 1");
      		if ($this->stmt->execute([$result->staffId])) {
      		switch ($result->staffRole) {
      		case 'Teacher':
      			$urlLink = APP_ROOT."teacher/";
      			break;

      			case 'Class Teacher':
      			$urlLink = APP_ROOT."teacher/";
      			break;

      			case 'Principal':
      			$urlLink = APP_ROOT."principal/";
      			break;
      			case 'Vice Principal':
      			$urlLink = APP_ROOT."principal/";
      			break;
      			case 'Registrar':
      			$urlLink = APP_ROOT."principal/";
      			break;

      			case 'Bursar':
      			$urlLink = APP_ROOT."bursar/";
      			break;

      				case 'Receptionist':
      			$urlLink = APP_ROOT."receptionist/";
      			break;
      	}
       $this->response = $this->alert->alert_toastr("success","Login Successful! Please wait...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
         window.location.href='".$urlLink."';
        },500);</script>";
      		}else{
      	$this->response = $this->alert->alert_toastr("error","Something went wrong!",__OSO_APP_NAME__." Says");//Something went wrong
      		}
      	
      }else{
         $this->response = $this->alert->alert_toastr("error","Invalid Login Details",__OSO_APP_NAME__." Says");//Invalid Account Password
      }
      }else{
$this->response = $this->alert->alert_toastr("error","Invalid Login Details",__OSO_APP_NAME__." Says");// Email Address Not Found or User Details not found
      }
    }
    return $this->response;
    unset($this->dbh);
		}

		//reset staff password
		public function reset_staff_password($data){
			$staffId = $this->config->Clean($data['staff_id']);
			$old_pass = $this->config->Clean($data['password']);
			$new_password = $this->config->Clean($data['new-password']);
			$confirm_new_pass = $this->config->Clean($data['confirm-new-password']);
			//check for empty
			if ($this->config->isEmptyStr($old_pass)) {
				$this->response = $this->alert->alert_toastr("error","Please your current password to continue!",__OSO_APP_NAME__." Says");
			}elseif ($this->config->isEmptyStr($new_password)) {
				// code...
					$this->response = $this->alert->alert_toastr("error","Enter your new Password to Continue!",__OSO_APP_NAME__." Says");
			}elseif ($this->config->isEmptyStr($confirm_new_pass)) {
				$this->response = $this->alert->alert_toastr("error","Confirm your new Password to Continue!",__OSO_APP_NAME__." Says");
			}elseif ((strlen($new_password) < 8) || (strlen($new_password) >15)) {
				$this->response = $this->alert->alert_toastr("error","Password lenght must be between Eight (8) and twelve (12) characters",__OSO_APP_NAME__." Says");
			}elseif ($new_password !== $confirm_new_pass) {
				$this->response = $this->alert->alert_toastr("error","New Password and Confirm Password is not Match!",__OSO_APP_NAME__." Says");
			}else{
				//check the old pass with the one in the database
				$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table} WHERE staffId=? LIMIT 1");
				$this->stmt->execute(array($staffId));
				if ($this->stmt->rowCount()==1) {
					// grab the old pasword from db
					$row = $this->stmt->fetch();
					$database_old_password = $row->staffPass;
					//lets compare the two passwords now
					if ($this->config->check_two_passwords_hash($old_pass,$database_old_password)) {
						// lets update the new password...
						$real_pass = $this->config->encrypt_user_password($new_password);
						//final update
						try {
							$this->dbh->beginTransaction();
								$this->stmt = $this->dbh->prepare("UPDATE {$this->table} SET staffPass=? WHERE staffId=? LIMIT 1");
				if ($this->stmt->execute(array($real_pass,$staffId))) {
					// code...
					$this->dbh->commit();
			$this->response = $this->alert->alert_toastr("successs","Password updated Successfully! Please wait...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
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
			unste($this->dbh);
		}


	public function submit_new_job_application($data){}
	//send interview date to job seeker(Staff Applicant)
	public function upload_applicant_interview($data){}

	public function send_mail_staff_applicant($data){}

	public function view_all_applicants($data){}

	public function get_staff_applicant_ById($staff_app_id){}

	//active staff methods
	public function get_all_staff(){
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM {$this->table} ORDER BY appliedDate DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	public function show_staff_indropdown_list(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM {$this->table} ORDER BY staffId");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->staffId.'">'.$row->full_name.' &raquo;'.$row->staffEducation.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	public function count_staff_by_type($type){
		$this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as cnt FROM {$this->table} WHERE staffType=?");
		$this->stmt->execute([$type]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cnt;
			return $this->response;
			unset($this->dbh);
		}
		
	}

	public function count_all_staff(){
		$status=1;
		$this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as cnt FROM {$this->table} WHERE jobStatus=?");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cnt;
			return $this->response;
			unset($this->dbh);
		}
		
	}

	public function get_staff_ById($staffId){
	$this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM {$this->table} WHERE staffId=? LIMIT 1");
		$this->stmt->execute([$staffId]);
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			unset($this->dbh);
		}
	}

	public function get_staff_bank_details($staff_id){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_bank_details_tbl` WHERE staff_id=? LIMIT 1");
		$this->stmt->execute([$staff_id]);
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return json_encode($this->response, JSON_PRETTY_PRINT);
			unset($this->dbh);
		}
		
	}

	public function update_staff_ById($data){
		$staffId = $this->config->Clean($data['sttId']);
	$surname = $this->config->Clean($data['surname']);
	$fname = $this->config->Clean($data['fname']);
	$education = $this->config->Clean($data['education']);
	$address = $this->config->Clean($data['address']);
	$phone = $this->config->Clean($data['phone']);
	$dob = $this->config->Clean(date("Y-m-d",strtotime($data['dob'])));
	$gender = $this->config->Clean($data['gender']);
	$portal_username = $this->config->Clean($data['pusername']);
	$approved = $this->config->Clean($data['approved']);
	//check for values
	if ($this->config->isEmptyStr($staffId) || $this->config->isEmptyStr($surname) || $this->config->isEmptyStr($fname) || $this->config->isEmptyStr($education) || $this->config->isEmptyStr($dob) || $this->config->isEmptyStr($gender) || $this->config->isEmptyStr($portal_username) || $this->config->isEmptyStr($approved)) {
		$this->response = $this->alert->alert_toastr("error","Invalid form Submission, Please check your inputs!",__OSO_APP_NAME__." Says");
	}elseif ($approved !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code, Try again!",__OSO_APP_NAME__." Says");
	}else{
		try {
			$presentClass = $this->config->Clean($data['presentClass']) ?? NULL;
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("UPDATE $this->table SET staffGrade=?, firstName=?,lastName=?,staffUser=?,staffDob=?,staffEducation=?,staffPhone=?,staffAddress=?, staffGender=? WHERE staffId=? LIMIT 1");
			 	if ($this->stmt->execute(array($presentClass,$fname,$surname,$portal_username,$dob,$education,$phone,$address,$gender,$staffId))) {
		 $this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","Updated Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.href='./staffs';
						},500);</script>";
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
			 	}
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says"); 	
			 }
	}
	return $this->response;
		unset($this->dbh);
	}

	public function assign_staff_class_teacher($data){}

	public function logout($id){
		$this->stmt = $this->dbh->prepare("UPDATE {$this->table} SET online=0 WHERE staffId=? LIMIT 1");
		if ($this->stmt->execute([$id])) {
			$this->response = true;
			return $this->response;
			unset($this->dbh);
		}
	}

	/*STAFF BANK UPDATE INFO*/
	public function update_staff_bank_info($data){
		$staffId = $this->config->Clean($data['staff_id']);
		$bankName = $this->config->Clean($data['bank_name']);
		$account_name = $this->config->Clean($data['bank_account_name']);
		$account_no = $this->config->Clean($data['bank_account_no']);
		$account_type = $this->config->Clean($data['bank_account_type']);
		//check for any null values
		if ($this->config->isEmptyStr($staffId) || $this->config->isEmptyStr($bankName)) {
		$this->response = $this->alert->alert_toastr("error","Your bank name is required!",__OSO_APP_NAME__." Says");	
		}elseif ($this->config->isEmptyStr($account_name)) {
			$this->response = $this->alert->alert_toastr("error","Your Account Name is required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($account_no)) {
			$this->response = $this->alert->alert_toastr("error","Your bank account number is required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($account_type)) {
	$this->response = $this->alert->alert_toastr("error","Your account type is Required!",__OSO_APP_NAME__." Says");
		}elseif (strlen($account_no) >10 || strlen($account_no) <10 ) {
	$this->response = $this->alert->alert_toastr("error","A Valid account Number is required!",__OSO_APP_NAME__." Says");
		}
		else{
			//lets check if this user already uploaded an account details
			$this->stmt =$this->dbh->prepare("SELECT * FROM `visap_staff_bank_details_tbl` WHERE staff_id=? LIMIT 1");
			$this->stmt->execute(array($staffId));
			if ($this->stmt->rowCount()==1) {
		$this->response = $this->alert->alert_toastr("error","Bank Details already Uploaded,Please contact your portal admin for your bank Details update!",__OSO_APP_NAME__." Says");
			}else{
				//create a fresh account detaisl for the current user
				try {

			 $this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_bank_details_tbl` (staff_id,bank_name,account_name,account_type,account_number,created_at) VALUES (?,?,?,?,?,?);");
				//lets execute
				if ($this->stmt->execute(array($staffId,$bankName,$account_name,$account_type,$account_no,$created_at))) {
					// code...
					 $this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success"," Bank info Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
				}else{
						$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
				}
					
				} catch (PDOException $e) {
	 $this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","This error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
				}
			}
		}
		return $this->response;
		unset($this->dbh);
	}
	//create new staff
	public function create_new_staff($d){
		//collect form data
		$surName = $this->config->Clean($d['sname']);
		$firstName = $this->config->Clean($d['fname']);
		$middleName = $this->config->Clean($d['mname']);
		$email = $this->config->Clean($d['semail']);
		$mphone = $this->config->Clean($d['mphone']);
		$musername = $this->config->Clean($d['musername']);
		$mpassword = $this->config->Clean($d['mpassword']);
		$education = $this->config->Clean($d['education']);
		$jobType = $this->config->Clean($d['jobType']);
		$staff_gender = $this->config->Clean($d['staff_gender']);
		$staff_status = 1;
		//$jobPosition = $this->config->Clean($d['jobPosition']);
		$auth = $this->config->Clean($d['auth_pass']);
		//check for error in form
		if ($this->config->isEmptyStr($surName)) {
			$this->response = $this->alert->alert_toastr("error","The staff Surname is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($firstName)) {
	$this->response = $this->alert->alert_toastr("error","The staff First Name is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($middleName)) {
		$this->response = $this->alert->alert_toastr("error","The staff Middle Name is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($email)) {
	$this->response = $this->alert->alert_toastr("error","The staff Portal E-mail is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($mphone)) {
		$this->response = $this->alert->alert_toastr("error","The staff Phone Number is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($musername)) {
		$this->response = $this->alert->alert_toastr("error","The staff Portal Username is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($mpassword)) {
		$this->response = $this->alert->alert_toastr("error","The staff Portal Password is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($education)) {
		$this->response = $this->alert->alert_toastr("error","The staff Qualification is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($jobType)) {
			$this->response = $this->alert->alert_toastr("error","The staff Job Type is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($staff_gender)) {
			$this->response = $this->alert->alert_toastr("error","The staff Gender is Required!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth)) {
			$this->response = $this->alert->alert_toastr("error","Authentication Key is Required!",__OSO_APP_NAME__." Says");
		}elseif (!$this->config->is_Valid_Email($email)) {
			$this->response = $this->alert->alert_toastr("error","A valid e-mail address is Required!",__OSO_APP_NAME__." Says");
		}
		else{
			if ($auth !== __OSO__CONTROL__KEY__) {
				$this->response = $this->alert->alert_toastr("error","Invalid Authentication Key!",__OSO_APP_NAME__." Says");
			}else{
				//lets check if the email entered is already exists
				if ($this->config->check_single_data('visap_staff_tbl','staffEmail',$email)) {
				$this->response = $this->alert->alert_toastr("error","$email is already taken, Please try another email address!",__OSO_APP_NAME__." Says");
				}elseif ($this->config->check_single_data('visap_student_tbl','stdEmail',$email)) {
	$this->response = $this->alert->alert_toastr("error","$email is already taken on this Portal, Please try another!",__OSO_APP_NAME__." Says");
				}else{
				//convert the pass to hash
				$hashed_password = $this->config->encrypt_user_password($mpassword);
				$staffRegNo = self::generate_staff_registration_number();
			 $confirmation_code = substr(md5(uniqid(mt_rand(),true)),0,15);
			 $reg_date = date("Y-m-d");
			 $div_email = explode("@", $email);
			 $portal_email = $div_email[0]."@".__OSO_APP_NAME__.".portal";
			 $fullName = $firstName." ".$middleName;
			 try {
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("INSERT INTO $this->table (staffRegNo,firstName,lastName,staffEmail,staffPass,staffUser,staffEducation,staffPhone,confirmation_code,staffGender,portalEmail,jobStatus,staffType,appliedDate) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
			 	if ($this->stmt->execute(array($staffRegNo,$fullName,$surName,$email,$hashed_password,$musername,$education,$mphone,$confirmation_code,$staff_gender,$portal_email,$staff_status,$jobType,$reg_date))) {
		 				$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success","$fullName Registered Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
			 	}
			 	
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response  =$this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says"); 	
			 }

				}
	
			}
		}
		return $this->response;
		unset($this->dbh);
	}

	public function checkBankDetails($staffId): bool{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_bank_details_tbl` WHERE staff_id=? LIMIT 1");
		$this->stmt->execute([$staffId]);
		if ($this->stmt->rowCount()==1) {
			$this->response = true;
		}else{
			$this->response = false;
		}
		return $this->response;
			unset($this->dbh);
	}

	//generate staff admission no
	public function generate_staff_registration_number(){
	 $this->response ="";
	 $prefix="SMP";
	$this->stmt = $this->dbh->prepare("SELECT staffRegNo FROM $this->table ORDER BY staffRegNo DESC LIMIT 1");
	$this->stmt->execute();
	if ($this->stmt->rowCount() > 0) {
    if ($row = $this->stmt->fetch()) {
      $value2 = $row->staffRegNo;
      $value2 = substr($value2, 5,8);//separating numeric part
      $value2 =$value2 + 1;//incrementing numeric value
      $value2 = $prefix.date('y').sprintf('%03s',$value2);//concatenating incremented value
      $this->response = $value2;
    }
	}else{
	// "SMP22001"
    $value2 =$prefix.date('y')."001";
    $this->response =$value2;
	}
	return $this->response;
}

//assign_staff_office
public function assign_staff_office($data){
	$staffId = $this->config->Clean($data['staff_id']);
	$office_role = $this->config->Clean($data['Office']);
	$auth_pass = $this->config->Clean($data['auth_pass']);
	//check for empty val
	if ($this->config->isEmptyStr($staffId)) {
	$this->response = $this->alert->alert_toastr("error","Select the staff name you want to assign to Office",__OSO_APP_NAME__." Says");
	}elseif ($this->config->isEmptyStr($office_role)) {
	$this->response = $this->alert->alert_toastr("error","Select the Office you want to assign",__OSO_APP_NAME__." Says");
	}elseif ($this->config->isEmptyStr($auth_pass)) {
	$this->response = $this->alert->alert_toastr("error","Enter an Authentication Password",__OSO_APP_NAME__." Says");
	}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
		$this->response = $this->alert->alert_toastr("error","Invalid Authentication Password Entered",__OSO_APP_NAME__." Says");
	}else{
		$staff_data = self::get_staff_ById($staffId);
		$full_name = $staff_data->full_name;
		//$role = $staff_data->staffRole;
		//check for duplicate office
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_post_tbl` WHERE staff_id=? LIMIT 1");
		$this->stmt->execute(array($staffId));
		if ($this->stmt->rowCount() ==1) {
			$this->response = $this->alert->alert_toastr("error","The Selected staff is already assigned to an Office",__OSO_APP_NAME__." Says");
		}else{
			 try {
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_post_tbl` (staff_id,office) VALUES (?,?);");
			 	if ($this->stmt->execute(array($staffId,$office_role))) {
			 		//update the staff tbl for the new post
			 			$this->stmt = $this->dbh->prepare("UPDATE $this->table SET staffRole=? WHERE staffId=? LIMIT 1");
			 			if ($this->stmt->execute(array($office_role,$staffId))) {
			 		$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","$office_role assigned to $full_name Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},2500);</script>";
			 			}else{
			 			$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
			 			}
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
			 	}
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response  =$this->alert->alert_msg("Error Occurred: ".$e->getMessage(),"danger"); 	
			 }
		}
	}
	return $this->response;
	unset($this->dbh);
}

//fetch office details json format
public function get_staff_office_details_json($office_id){
	$office_id = $this->config->Clean($office_id);
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_post_tbl` WHERE id=? LIMIT 1");
		$this->stmt->execute(array($office_id));
		if ($this->stmt->rowCount()==1) {
		$this->response =$this->stmt->fetch();
		return $this->response;
		unset($this->dbh);
		}
}

//update staff office post
public function update_staff_office_post($data){
	$staffId = $this->config->Clean($data['staff_id']);
	$new_post = $this->config->Clean($data['c_office']);
	$office_id = $this->config->Clean($data['office_id']);
	$auth_pass = $this->config->Clean($data['auth_pass2']);
	if ($this->config->isEmptyStr($new_post)) {
	$this->response = $this->alert->alert_toastr("error","Select the Office you want to update to",__OSO_APP_NAME__." Says");
	}elseif ($this->config->isEmptyStr($auth_pass)) {
	$this->response = $this->alert->alert_toastr("error","Enter an Authentication Password to Continue",__OSO_APP_NAME__." Says");
	}elseif ($auth_pass!== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Password Entered",__OSO_APP_NAME__." Says");
	}else{
		 try {
			 	 $this->dbh->beginTransaction();
			 	$this->stmt = $this->dbh->prepare("UPDATE `visap_staff_post_tbl` SET office=? WHERE staff_id=? AND id=? LIMIT 1");
			 	if ($this->stmt->execute(array($new_post,$staffId,$office_id))) {
		$this->stmt = $this->dbh->prepare("UPDATE `visap_staff_tbl` SET staffRole=? WHERE staffId=? LIMIT 1");
			 		if ($this->stmt->execute(array($new_post,$staffId))) {
			 			 $this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success","Office Updated Successfully","GSSOTA SAYS")."<script>setTimeout(()=>{
							window.location.reload();
						},2500);</script>";
			 		}
			 	}else{
				$this->response = $this->alert->alert_toastr("error","Something went wrong, Please try again ...",__OSO_APP_NAME__." Says");
			 	}
			 } catch (PDOException $e) {
			$this->dbh->rollback();
   $this->response = $this->alert->alert_msg("Error Occurred: ".$e->getMessage(),"danger"); 	
			 }
	}
	return $this->response;
		unset($this->dbh);
}

public function count_staff_by_gender($gender){
		$this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as cnt FROM {$this->table} WHERE staffGender=?");
		$this->stmt->execute([$gender]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cnt;
			return $this->response;
			unset($this->dbh);
		}
		
	}

	/*NEW FILES TO BE UPLOADED TO PORTAL*/
	public function show_staff_name_indropdown(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT *,concat(`firstName`,' ',`lastName`) as full_name FROM {$this->table} ORDER BY staffId");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->full_name.'">'.$row->full_name.' &raquo;'.$row->staffEducation.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	//count today staff birthday
	public function count_staff_today_birthday(){
		$today= date("m-d");
		$this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as cnt FROM {$this->table} WHERE staffDob LIKE ?");
		$this->stmt->execute(['%'.$today]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->cnt;
			return $this->response;
			unset($this->dbh);
		}
		
	}
	
	public function get_staff_office_ById($prefectId){
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_post_tbl` WHERE id=? LIMIT 1");
	$this->stmt->execute([$prefectId]);
	if ($this->stmt->rowCount()==1) {
		$this->response = $this->stmt->fetch();
		return $this->response;
		unset($this->dbh);
	}
}
public function count_all_online_staff(){
		$this->stmt = $this->dbh->prepare("SELECT count(`staffId`) as online FROM {$this->table} WHERE online='1'");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response =$rows->online;
			return $this->response;
			unset($this->dbh);
		}
		
	}

	//upload_staff_passport
	public function upload_staff_passport($data,$file){
		$staff_id = $this->config->Clean($data['staff_id']);//auth_code
   $auth_code = $this->config->Clean($data['auth_code']);//auth_code
   $passport_name = $file['passport']['name'];
   $passport_size = $file['passport']['size']/1024;
   $passport_temp = $file['passport']['tmp_name'];
   $passport_error = $file['passport']['error'];
   $allowed = array("jpg","jpeg","png");
   $name_div = explode(".", $passport_name);
   $image_ext = strtolower(end($name_div));
   if (!$this->config->isEmptyStr($passport_name)) {
    //$response = $Alert->alert_msg("You Selected $passport_name","success");
    if ($this->config->isEmptyStr($auth_code)) {
    	$this->response = $this->alert->alert_toastr("error","Please provide the Authentication Code to proceed",__OSO_APP_NAME__." Says");
    }elseif ($auth_code!== __OSO__CONTROL__KEY__) {
    $this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
    }
    elseif (!in_array($image_ext, $allowed)) {
    $this->response = $this->alert->alert_toastr("error","Your passport format is not supported, Only PNG,JPG,JPEG",__OSO_APP_NAME__." Says");
    }elseif ($passport_size > 50) {
   $this->response = $this->alert->alert_toastr("error","Your Image Size should not exceed 50KB, Your file Size is :".number_format($passport_size,2)."KB",__OSO_APP_NAME__." Says");
    }elseif ($passport_error!=0) {
   $this->response = $this->alert->alert_toastr("error","There was an error Uploading your image",__OSO_APP_NAME__." Says");
    }
    else{
    	$staff_data = self::get_staff_ById($staff_id);
    $passport_realName = $staff_data->staffRegNo.mt_rand(0,9999999).".".$image_ext;
    //lets update the student passport in the db
    $passport_destination = "../schoolImages/staff/".$passport_realName; 
    try {
    	$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("UPDATE $this->table SET staffPassport=? WHERE staffId=? LIMIT 1");
    	if ($this->stmt->execute(array($passport_realName,$staff_id))) {
    		if ($this->config->move_file_to_folder($passport_temp,$passport_destination)) {
    			$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Passport Uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.href='./staffs';
						},500);</script>";
    		}
    	}
    	
    } catch (PDOException $e) {
    	$this->dbh->rollback();
    	if (file_exists($passport_destination)) {
		 unlink($passport_destination);
	}
   $this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says"); 	
    }
    }
   }else{
    $this->response = $this->alert->alert_toastr("error","Please Select a passport to Upload",__OSO_APP_NAME__." Says");
   }
   return $this->response;
   unset($this->dbh);
	}


	//CHECK STAFF TOKEN
public function checkStaffTokenExists($name,$email,$token){
	if (isset($name,$email,$token)) {
		$this->stmt = $this->dbh->prepare("SELECT token FROM `visap_staff_login_token` WHERE username=? AND email=? LIMIT 1");
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
public function deleteSessionToken($name,$email,$token){
	$this->stmt = $this->dbh->prepare("DELETE FROM `visap_staff_login_token` WHERE username=? AND email=? LIMIT 1");
		if ($this->stmt->execute(array($name,$email))) {
		$this->response = true;
		}
		return $this->response;
		 unset($this->dbh);
}


}