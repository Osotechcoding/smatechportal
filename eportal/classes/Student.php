<?php
@session_start();
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
require_once "OsotechMailer.php";
//@$Configuration->osotech_session_kick();
class Student
{

	private $dbh; //database connection
	protected $query; //querying database
	protected $stmt; //database statement
	protected $table_name = "visap_student_tbl";
	protected $response; //database result
	private $config; //default config
	private $alert; //default config

	public function __construct()
	{
		$this->dbh = osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	public function absolute_student_login($data)
	{
		global $lang;
		$email = $this->config->Clean($data['student_email']);
		$password = $this->config->Clean($data['student_password']);
		$xss_token = $data['txss_token'];
		if (!$this->config->check_user_activity_allowed("student_login")) {
			$this->response = $this->alert->alert_toastr("error", "Login is currently not allowed!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($email) || $this->config->isEmptyStr($password)) {
			$this->response = $this->alert->alert_toastr("error", "Login Details are required!", __OSO_APP_NAME__ . " Says");
		} elseif (!$this->config->is_Valid_Email($email)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid email address!", __OSO_APP_NAME__ . " Says");
		} else {
			$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdEmail=? AND stdAdmStatus='Active' LIMIT 1");
			$this->stmt->execute(array($email));
			if ($this->stmt->rowCount() == 1) {
				$result = $this->stmt->fetch();
				$db_password = $result->stdPassword;
				//check if password entered match with db pwd
				if ($this->config->check_two_passwords_hash($password, $db_password)) {
					if (isset($data['rememberme']) && $data['rememberme'] == 'on') {
						// save details to cookie
						setcookie("login_student_email", $email, time() + (24 * 60 * 60 * 7), '/');
						setcookie("login_student_pass", $password, time() + (24 * 60 * 60 * 7), '/');
						setcookie("login_student_username", $result->stdUserName, time() + (24 * 60 * 60 * 7), '/');
					} else {
						setcookie("login_student_email", "", time() - 100, '/');
						setcookie("login_student_username", "", time() - 100, '/');
						setcookie("login_student_pass", "", time() - 100, '/');
					}
					$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET is_online=1 WHERE stdId=? LIMIT 1");
					if ($this->stmt->execute(array($result->stdId))) {
						session_regenerate_id();
						//$session_token = Session::set_xss_token();
						$_COOKIE['login_student_email'] = $email;
						$_COOKIE['login_student_pass'] = $password;
						$_COOKIE['login_student_username'] = $result->stdUserName;
						$_SESSION['STD_SES_ID'] = $result->stdId;
						$_SESSION['STD_USERNAME'] = $result->stdUserName;
						$_SESSION['STD_GRADE_CLASS'] = $result->studentClass;
						$_SESSION['STD_REG_NUMBER'] = $result->stdRegNo;
						$_SESSION['STD_EMAIL'] = $result->stdEmail;

						$token = $this->config->generateRandomUserToken(35);
						$_SESSION['student_log_token'] = $token;
						//check token
						$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_login_token` WHERE username=? AND email=? LIMIT 1");
						$this->stmt->execute([$_SESSION['STD_USERNAME'], $_SESSION['STD_EMAIL']]);

						if ($this->stmt->rowCount() > 0) {
							// code... update the token
							$this->stmt = $this->dbh->prepare("UPDATE `visap_student_login_token` SET token=? WHERE username=? AND email=? LIMIT 1");
							$this->stmt->execute(array($token, $_SESSION['STD_USERNAME'], $_SESSION['STD_EMAIL']));
						} else {
							$this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_login_token` (username,email,token) VALUES (?,?,?);");
							$this->stmt->execute(array($_SESSION['STD_USERNAME'], $_SESSION['STD_EMAIL'], $token));
						}
						$urlLink = APP_ROOT . "students/";
						$this->response = $this->alert->alert_toastr("success", "Login Successful, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
         window.location.href='" . $urlLink . "';
        },1000);</script>";
					}
				} else {
					$this->response = $this->alert->alert_toastr("error", "Login Failed: Invalid Login Details!!", __OSO_APP_NAME__ . " Says"); //Invalid Account Password
				}
			} else {
				$this->response = $this->alert->alert_toastr("error", "Login Failed: Invalid account Details!", __OSO_APP_NAME__ . " Says"); // Email Address Not Found or User Details not found
			}
		}
		return $this->response;
	}

	public function count_students_by_gender($gender)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as cgender FROM {$this->table_name} WHERE stdGender=? AND stdAdmStatus='Active'");
		$this->stmt->execute(array($gender));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cgender;
		} else {
			$this->response = "0";
		}
		return $this->response;
		
	}

	public function countStudentByType($studentType)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as studentType FROM {$this->table_name} WHERE stdApplyType=? AND stdAdmStatus='Active'");
		$this->stmt->execute(array($studentType));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->studentType;
		} else {
			$this->response = "0";
		}
		return $this->response;
		
	}

	public function countStudentTypeByGender($studentType, $stdGender)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as st FROM {$this->table_name} WHERE stdApplyType=? AND stdGender =? AND stdAdmStatus='Active'");
		$this->stmt->execute(array($studentType, $stdGender));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->st;
		} else {
			$this->response = "0";
		}
		return $this->response;
	}

	public function count_recent_applicants()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as applicant FROM {$this->table_name} WHERE DATE(`stdApplyDate`) >= DATE(CURRENT_DATE() - INTERVAL
 1 MONTH)");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->applicant;
		} else {
			$this->response = "0";
		}
		return $this->response;
	}

	public function count_total_visap_students()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as students FROM `{$this->table_name}` WHERE stdAdmStatus='Active'");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->students;
		} else {
			$this->response = "0";
		}
		return $this->response;
	}

	public function get_student_payments_history($stdId, $stdRegNo, $stdGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_history_tbl` WHERE std_id=? AND stdAdmNo=? AND stdGrade=? ORDER BY component_fee ASC");
		$this->stmt->execute(array($stdId, $stdRegNo, $stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_student_payment_info_by_regNo_and_Id($regNo, $stdId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE std_id=? AND stdAdmNo=? ORDER BY component_fee ASC");
		$this->stmt->execute(array($regNo, $stdId));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//get_student_data_ByRegNo
	public function get_student_data_ByRegNo($stdRegNo)
	{
		$this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdRegNo=?");
		$this->stmt->execute(array($stdRegNo));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;
		}
	}

	public function get_student_data_byId($stdId)
	{
		$this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdId=?");
		$this->stmt->execute(array($stdId));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;
		}
	}

	public function get_single_student_details_by_regId($stdId, $regNo)
	{
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdId=? AND stdRegNo=? LIMIT 1");
		$this->stmt->execute(array($stdId, $regNo));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	//get all admitted students
	public function get_all_students_by_status(string $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute(array($status));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	//filter student payment by reg no and class
	public function filter_students_by_payments($stdRegNo)
	{
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdRegNo=? AND stdAdmStatus='Active' LIMIT 1");
		$this->stmt->execute(array($stdRegNo));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;
		}
	}

	//get all admitted students in dropdown list

	/*ADMISSION REGISTRATION STEP ONE*/
	public function start_student_admission_step_one($admission_data)
	{
		$captcha_correct = $this->config->Clean($admission_data['captcha_correct_answer']);
		$user_captcha_anwser = $this->config->Clean($admission_data['user_captcha_anwser']);
		$bypass = $this->config->Clean($admission_data['bypass']);
		$card_pin = $this->config->Clean($admission_data['card_pin']);
		$card_serial = $this->config->Clean($admission_data['card_serial']);
		$stu_class = $this->config->Clean($admission_data['stu_class']);
		$stu_phone = $this->config->Clean($admission_data['stu_phone']);
		$username = $this->config->Clean($admission_data['username']);
		$stu_email = $this->config->Clean($admission_data['stu_email']);
		//check for Auth access
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza12345")) {
			// code...
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($card_pin) || $this->config->isEmptyStr($card_serial) || $this->config->isEmptyStr($stu_class) || $this->config->isEmptyStr($stu_phone) || $this->config->isEmptyStr($username) || $this->config->isEmptyStr($stu_email)) {
			// code...
			$this->response = $this->alert->alert_msg("Please fill in all the required form and Try again!", "warning");
		} elseif (!$this->config->is_Valid_Email($stu_email)) {
			// code...
			$this->response = $this->alert->alert_msg("This e-email $stu_email is Valid, Please check your Email address and Try again!", "danger");
		} elseif (!$this->config->validate_Mobile_Number($stu_phone)) {
			// code...
			$this->response = $this->alert->alert_msg("This Phone Number $stu_phone format is not allowed, Use this format: +234**********!", "danger");
			//lets check if the PIN character is valid without connecting to db
		} elseif ($this->config->check_string_lenght_greater(15, $card_pin) || $this->config->check_string_lenght_lesser(15, $card_pin)) {
			// code...
			$this->response = $this->alert->alert_msg("You have entered an incorrect Card Pin! Re-check Your card Pin & try again...", "danger");
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
					$this->response = $this->alert->alert_msg("DO NOT PLAY SMART! This Card has been Used!", "danger");
				}/*elseif (checkif_emailexists()) {
					// code...
				}*/ else {
					//let begin with the registration
					//student Login Credentials
					$portal_username = $username . "@" . __OSO_APP_NAME__ . ".portal"; //login email
					$portal_password = __OSO_APP_NAME__ . "@portal"; //loginpassword
					$hashed_password = $this->config->encrypt_user_password($portal_password);
					try {
						$this->dbh->beginTransaction();
						$date = date("Y-m-d");
						$admitted_year = date("Y");
						$time = date("h:i:s");
						$admission_no = self::generate_admission_number($admitted_year);
						$confirmation_code = substr(md5(uniqid(mt_rand(), true)), 0, 10);
						$this->stmt = $this->dbh->prepare("INSERT INTO $this->table_name(stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdPhone,stdApplyDate,stdConfToken) VALUES(?,?,?,?,?,?,?,?);");
						if ($this->stmt->execute(array($admission_no, $stu_email, $username, $hashed_password, $stu_class, $stu_phone, $date, $confirmation_code))) {
							// grab the LastInsertId...
							$_SESSION['AUTH_SMAPP_APPLICANT_ID'] = $this->dbh->lastInsertId();
							$_SESSION['AUTH_SMAPP_ADMISSION_NO'] = $admission_no;
							//let change the Pin Used status
							$change_status = 1;
							$this->stmt = $this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=? WHERE pin_id=? LIMIT 1");
							if ($this->stmt->execute(array($change_status, $pinId))) {
								//let create a Pin Used History
								$this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code,pin_serial,dated,timed) VALUES (?,?,?,?,?);");
								if ($this->stmt->execute(array($admission_no, $pinCode, $pinSerial, $date, $time))) {
									// code...
									$this->dbh->commit();
									$this->response = $this->alert->alert_msg("You have successfully completed step one of your online registration!", "success") . "<script>setTimeout(()=>{
			window.location." . Session::redirect_root('admission_step2') . ";
			},1000);</script>";
								}
							}
						}
					} catch (PDOException $e) {
						$this->dbh->rollback();
						$this->response  = $this->alert->alert_msg("Error Occurred!: Error Info: " . $e->getMessage(), "danger");
					}
				}
			} else {
				//show the user that The PIN he/she enters is not found
				$this->response = $this->alert->alert_msg("The Card PIN you entered does not exists! check the Pin and try again...", "danger");
			}
		}
	}

	/*ADMISSION REGISTRATION STEP ONE ENDS*/

	public function generate_admission_number($admitted_year)
	{
		$this->response = "";
		$schoolDatas = $this->config->getConfigData();
		$schoolCode = $schoolDatas->govt_approve_number; //school Code
		$this->stmt = $this->dbh->prepare("SELECT stdRegNo FROM $this->table_name ORDER BY stdRegNo DESC LIMIT 1");
		$this->stmt->execute();
		if ($this->stmt->rowCount() == '1') {
			$row = $this->stmt->fetch();
			$value2 = $row->stdRegNo;
			//separating numeric part
			$value2 = substr($value2, 10, 14);
			//incrementing numeric value
			$value2 = $value2 + 1;
			//concatenating incremented value
			$value2 = $admitted_year . $schoolCode . sprintf('%04s', $value2);
			$this->response = $value2;
		} else {
			// "2021C120040001"
			$value2 = $admitted_year . $schoolCode . "0001";
			$this->response = $value2;
		}
		return $this->response;
	}

	public function register_exam_subject($data)
	{
		//collect form data
		$bypass = $this->config->Clean($data['bypass']);
		$subject = $this->config->Clean($data['subject']);
		$student_class = $this->config->Clean($data['student_class']);
		//$term = $this->config->Clean($data['term']);
		$school_sess = $this->config->Clean($data['school_sess']);
		$stdAdmNo = $this->config->Clean($data['reg_number']);
		$stdId = $this->config->Clean($data['stdId']);
		//check if bypass is not set
		if ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Unathorized access Detected!", "warning");
		} elseif ($this->config->isEmptyStr($subject) || $this->config->isEmptyStr($student_class) || $this->config->isEmptyStr($school_sess) || $this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($stdAdmNo)) {
			// code...
			$this->response = $this->alert->alert_msg("Please Select your examination subject to Register!", "warning");
		} else {
			//check for duplicate suject registration in db
			#subId,std_id,stdRegNo,std_class,subject,schl_Sess,created_at
			$this->stmt = $this->dbh->prepare("SELECT * FROM `register_exam_subject_tbl` WHERE std_id=? AND stdRegNo=? AND stdGrade=? AND subject=? AND schl_Sess=? LIMIT 1");
			//execute
			$this->stmt->execute(array($stdId, $stdAdmNo, $student_class, $subject, $school_sess));
			//check row return
			if ($this->stmt->rowCount() > 0) {
				// code...
				$this->response = $this->alert->alert_msg($subject . " is already Registered!", "danger");
			} else {
				try {
					$this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `register_exam_subject_tbl` (std_id,stdRegNo,stdGrade,subject,schl_Sess,created_at) VALUES (?,?,?,?,?,?);");
					//lets execute
					if ($this->stmt->execute([$stdId, $stdAdmNo, $student_class, $subject, $school_sess, $created_at])) {
						// code...
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg($subject . " Registered Successfully", "success") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
					} else {
						$this->response = $this->alert->alert_msg("Something went wrong, Please try again ...", "danger");
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("This error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
		
	}
	//show all my registered exam subject
	public function all_my_registered_exam_subejcts($stdGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` WHERE subject_class=? ORDER BY subject_name ASC");
		$this->stmt->execute(array($stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			//$this->dbh->close();
			return $this->response;
		}
	}

	//unregister my exam subject
	public function unregistered_exam_subject($examRegId, $stdId)
	{
		if (!$this->config->isEmptyStr($examRegId) && !$this->config->isEmptyStr($stdId)) {
			// proceed to delete exam sbuject
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("DELETE FROM `register_exam_subject_tbl` WHERE subId=? AND std_id=? LIMIT 1");
				if ($this->stmt->execute(array($examRegId, $stdId))) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg("Selected subject removed successfully", "success") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Unregister Subject: This error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
		
	}

	public function submit_written_classnote($data)
	{
		//collect form data
		$stdId = $this->config->Clean($data['stdId']);
		$stdRegNo = $this->config->Clean($data['stdRegCode']);
		$teacher = $this->config->Clean($data['subject_teacher']);
		$topic = $this->config->Clean($data['topic']);
		$sub_topic = $this->config->Clean($data['subtopic']);
		$subject = $this->config->Clean($data['subject_id']);
		$term = $this->config->Clean($data['academic_term']);
		$school_sess = $this->config->Clean($data['school_sess']);
		$note_content = $data['note_content'];
		$student_class = $this->config->Clean($data['student_class']);
		$bypass = $this->config->Clean($data['bypass']);
		if ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
			// code...
			$this->response = $this->alert->alert_msg("Unathorized access Detected!", "warning");
		} else
			//check for any empty fields
			if (
				$this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($stdRegNo) ||
				$this->config->isEmptyStr($teacher) || $this->config->isEmptyStr($topic) ||
				$this->config->isEmptyStr($sub_topic) || $this->config->isEmptyStr($subject) ||
				$this->config->isEmptyStr($note_content) || $this->config->isEmptyStr($student_class)
			) {
				// code...
				$this->response = $this->alert->alert_msg("Please check all your inputs and try again ...", "danger");
			} else {
				//lets check if this  actual topic has been submitted via this student
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_classnote_tbl` WHERE std_id=? AND class=? AND subjectId=? AND topic=? AND teacher_id=? AND term=? AND session=? LIMIT 1");
				$this->stmt->execute([$stdId, $student_class, $subject, $topic, $teacher, $term, $school_sess]);
				/*tablename: noteId, std_id,reg_number,class,subjectId,topic,subtopic,note_content teacher_id,term,session,created_on*/
				if ($this->stmt->rowCount() == 1) {
					// code...
					$this->response = $this->alert->alert_msg("This Note is already submitted!", "danger");
				} else {
					try {
						$this->dbh->beginTransaction();
						$created_at = date("Y-m-d");
						//let's create the new note for the selected subject
						$this->stmt = $this->dbh->prepare("INSERT INTO `visap_classnote_tbl` (std_id,reg_number,class,subjectId,topic,subtopic,note_content,teacher_id,term,session,created_on) VALUES (?,?,?,?,?,?,?,?,?,?,?);");
						//execute
						if ($this->stmt->execute(array(
							$stdId, $stdRegNo, $student_class,
							$subject, $topic, $sub_topic,
							$note_content, $teacher, $term,
							$school_sess, $created_at
						))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_msg($subject . " Note Submiited Successfully", "success") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
						} else {
							$this->response = $this->alert->alert_msg("Something went wrong, Please try again ...", "danger");
						}
					} catch (Exception $e) {
						$this->dbh->rollback();
						$this->response  = $this->alert->alert_msg("Failed to Submit Classnote: Error Occurred: " . $e->getMessage(), "danger");
					}
				}
			}
		return 	$this->response;
		
	}

	//fetch all classnote by student id
	public function get_ClassnoteByStudentId($ses_id, $stdAdmNo, $std_class)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_classnote_tbl` WHERE std_id=? AND reg_number=? AND class=? ORDER BY noteId DESC");
		$this->stmt->execute([$ses_id, $stdAdmNo, $std_class]);
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_my_assessments_by_filter($stdRegNo, $stdGrade, $term, $aca_session)
	{
		switch ($term) {
			case '3rd Term':
				$resultTable = 'visap_termly_result_tbl';
				break;
			case '2nd Term':
				$resultTable = 'visap_2nd_term_result_tbl';
				break;
			case '1st Term':
				$resultTable = 'visap_1st_term_result_tbl';
				break;
			default:
				$resultTable = 'visap_1st_term_result_tbl';
				break;
		}
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$resultTable}` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? ORDER BY uploadedDate DESC");
		$this->stmt->execute(array($stdRegNo, $stdGrade, $term, $aca_session));
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_my_assessments_by_student_id($stdId, $stdRegNo, $stdGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentId=? AND stdRegCode=? AND studentGrade=? ORDER BY uploadedDate DESC");
		$this->stmt->execute(array($stdId, $stdRegNo, $stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function logout($id)
	{
		$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET is_online=0 WHERE stdId=? LIMIT 1");
		if ($this->stmt->execute([$id])) {
			$this->response = true;
			return $this->response;
		}
	}

	public function get_students_byClassDesc($grade_desc)
	{
		$status = "Active";
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM $this->table_name WHERE studentClass=? AND stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute([$grade_desc, $status]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
		}
	}

	public function getStudentsByClassName($grade_desc)
	{
		$status = "Active";
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM $this->table_name WHERE studentClass=? AND stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute([$grade_desc, $status]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
		}
	}

	/*REGISTER STUDENT MANUALLY*/
	public function register_student_manually(array $data)
	{
		$surName = $this->config->Clean($data['student_surname']);

		$cardpin = $this->config->Clean($data['cardpin']);
		$cardserial = $this->config->Clean($data['cardserial']);

		$firstName = $this->config->Clean($data['student_first_name']);
		$middleName = $this->config->Clean($data['student_middle_name']);
		$address = $this->config->Clean($data['student_home_address']);
		$Dob = $this->config->Clean(date("Y-m-d", strtotime($data['student_dob'])));
		$Gender = $this->config->Clean($data['student_gender']);
		$student_email = $this->config->Clean($data['student_email']);
		$student_phone = $this->config->Clean($data['student_phone']);
		$student_type = $this->config->Clean($data['student_type']);
		$student_class = $this->config->Clean($data['student_class']);
		$adm_date = $this->config->Clean(date("Y-m-d", strtotime($data['admission_date'])));
		$auth_pass = $this->config->Clean($data['auth_code']);
		if (
			$this->config->isEmptyStr($surName) ||
			$this->config->isEmptyStr($firstName) ||
			$this->config->isEmptyStr($middleName) ||
			$this->config->isEmptyStr($address) ||
			$this->config->isEmptyStr($Dob) ||
			$this->config->isEmptyStr($Gender) ||
			$this->config->isEmptyStr($student_email) ||
			$this->config->isEmptyStr($student_class) ||
			$this->config->isEmptyStr($adm_date) ||
			$this->config->isEmptyStr($student_type) ||
			$this->config->isEmptyStr($auth_pass) ||
			$this->config->isEmptyStr($cardpin) ||
			$this->config->isEmptyStr($cardserial)
		) {
			$this->response = $this->alert->alert_toastr("error", "All fields are Required!", __OSO_APP_NAME__ . " Says");
		} elseif (!$this->config->is_Valid_Email($student_email)) {
			$this->response = $this->alert->alert_toastr("error", "<$student_email> is not a valid e-mail address!", __OSO_APP_NAME__ . " Says");
		} elseif (strlen($cardpin) <> 13) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Registration card entered!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->authenticateRegistrationCard($cardpin, $cardserial) === true) {
			$this->response = $this->alert->alert_toastr("error", "This Registration Card has been Used!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code entered!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data('visap_staff_tbl', 'staffEmail', $student_email)) {
			$this->response = $this->alert->alert_toastr("error", "$student_email is already taken, Please try another email address!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data('visap_student_tbl', 'stdEmail', $student_email)) {
			$this->response = $this->alert->alert_toastr("error", "$student_email is already taken on this Portal, Please try another Email address!", __OSO_APP_NAME__ . " Says");
		} else {
			$admitted_year = date("Y", strtotime($adm_date));
			//student is the default student password
			$default_pass = "student";
			$hashed_password = $this->config->encrypt_user_password($default_pass);
			$stdRegNo = $this->generate_admission_number($admitted_year);
			$confirmation_code = substr(md5(uniqid(mt_rand(), true)), 0, 14);
			$reg_date = date("Y-m-d");
			$time = date("h:i:s");
			$admitted = "Active";
			$student_username = $surName;
			//$portal_email = $student_username."@portal.".__OSO_APP_NAME__;
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("INSERT INTO $this->table_name (stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdFirstName,stdMiddleName,stdDob,stdGender,stdAddress,stdPhone,stdAdmStatus,stdApplyDate,stdApplyType,stdConfToken,admitted_class) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
				if ($this->stmt->execute(array($stdRegNo, $student_email, $student_username, $hashed_password, $student_class, $surName, $firstName, $middleName, $Dob, $Gender, $address, $student_phone, $admitted, $adm_date, $student_type, $confirmation_code,$student_class))) {
					//update used pin table
					$change_status = 1;
					$this->stmt = $this->dbh->prepare("UPDATE `tbl_reg_pins` SET pin_status=?,usedBy=? WHERE pin_code=? AND pin_serial=? LIMIT 1");
					if ($this->stmt->execute(array($change_status, $stdRegNo, $cardpin, $cardserial))) {
						//let create a Pin Used History
						$this->stmt = $this->dbh->prepare("INSERT INTO `reg_pin_history_tbl` (used_by, pin_code, pin_serial, dated, timed) VALUES (?,?,?,?,?);");
						if ($this->stmt->execute(array($stdRegNo, $cardpin, $cardserial, $reg_date, $time))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "$surName $firstName $middleName Registered Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
						}
					}
				} else {
					$this->response = $this->alert->alert_toastr("error", "Something went wrong, Please try again ...", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}
	/*REGISTER STUDENT MANUALLY*/

	public function count_student_today_birthday()
	{
		$today = date("m-d");
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as cnt FROM {$this->table_name} WHERE stdDob LIKE ? AND stdAdmStatus='Active'");
		$this->stmt->execute(['%' . $today]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
		}
	}
	//get student list in dropDown
	public function get_students_InDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT stdRegNo,stdId,studentClass,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdAdmStatus='Active' ORDER BY stdRegNo ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->stdId . '">' . $row->full_name . ' &raquo; ' . $row->studentClass . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//GET ALL BOARDING HOUSE STUDENT
	public function getBoardingStudentInDropDownList()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT stdId,stdGender,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdAdmStatus='Active' AND stdApplyType='Boarding' ORDER BY full_name ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->stdId . '">' . $row->full_name . ' &raquo; ' . $row->stdGender . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
		
	}
	//NEW UPDATES
	public function assign_new_school_prefect($data)
	{
		$office_name = $this->config->Clean($data['student_office_name']);
		$studentId = $this->config->Clean($data['student_uniq_id']);
		$session = $this->config->Clean($data['school_session']);
		$auth_pass = $this->config->Clean($data['auth_pass']);
		$date = date("Y-m-d");
		if ($this->config->isEmptyStr($studentId)) {
			$this->response = $this->alert->alert_toastr("warning", "Select the student you want to assign!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($office_name)) {
			$this->response = $this->alert->alert_toastr("warning", "Please enter the Assign Office to continue!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("warning", "You need to Authenticate this action to proceed!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code Detected!", __OSO_APP_NAME__ . " Says");
		} else {
			$student_data = self::get_student_data_byId($studentId);
			$student_class = $student_data->studentClass;
			//check for duplicate office
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE student_id=? AND school_session=? LIMIT 1");
			$this->stmt->execute(array($studentId, $session));
			if ($this->stmt->rowCount() > 0) {
				$this->response = $this->alert->alert_toastr("warning", "This Student is already an active Prefect for the $session Academic Session!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_school_prefect_tbl`(student_id,studentGrade,officeName,school_session,created_on) VALUES(?,?,?,?,?);");
					if ($this->stmt->execute(array($studentId, $student_class, $office_name, $session, $date))) {
						$this->dbh->commit();
						$this->dbh = null;
						$this->response = $this->alert->alert_toastr("success", "$student_data->full_name is Now assigned as the $office_name Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.reload();
			},1000);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error", "Assigning Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}

		return $this->response;
	}

	//get all prefects
	public function get_all_prefect_list()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE activeness='1' ORDER BY school_session DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			
		}
	}

	public function remove_student_from_office_now($prefectId)
	{
		if (!$this->config->isEmptyStr($prefectId)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Prefect
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_school_prefect_tbl` WHERE prefectId=? LIMIT 1");
				if ($this->stmt->execute([$prefectId])) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	public function get_prefect_ById($prefectId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_prefect_tbl` WHERE prefectId=? LIMIT 1");
		$this->stmt->execute([$prefectId]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			
		}
	}

	public function update_student_office_now($data)
	{
		$prefect_id = $this->config->Clean($data['prefect_id']);
		$tenure = $this->config->Clean($data['tenure']);
		$updated_office = $this->config->Clean($data['updated_office']);
		$auth_pass = $this->config->Clean($data['passcode']);
		if ($this->config->isEmptyStr($updated_office)) {
			$this->response = $this->alert->alert_toastr("error", "Select the Office you want to update to", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Enter an Authentication Password to Continue", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Password Entered", __OSO_APP_NAME__ . " Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `visap_school_prefect_tbl` SET officeName=? WHERE prefectId=? AND school_session=? LIMIT 1");
				if ($this->stmt->execute(array($updated_office, $prefect_id, $tenure))) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "Office Updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
				} else {
					$this->response = $this->alert->alert_toastr("error", "Something went wrong, Please try again ...", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_msg("Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	//update student information
	public function update_student_details($data)
	{
		$stdId = $this->config->Clean($data['studentId']);
		$student_status = $this->config->Clean($data['student_status']);
		$stdRegNo = $this->config->Clean($data['student_reg_number']);
		$surname = $this->config->Clean($data['surname']);
		$fname = $this->config->Clean($data['fname']);
		$lname = $this->config->Clean($data['lname']);
		$address = $this->config->Clean($data['address']);
		$dob = $this->config->Clean(date("Y-m-d", strtotime($data['dateofbirth'])));
		// $presentClass = $this->config->Clean($data['presentClass']);
		$gender = $this->config->Clean($data['gender']);
		$approved = $this->config->Clean($data['auth_pass']);
		//check for values
		if ($this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($student_status) || $this->config->isEmptyStr($surname) || $this->config->isEmptyStr($fname) || $this->config->isEmptyStr($lname) || $this->config->isEmptyStr($dob) ||  $this->config->isEmptyStr($gender) || $this->config->isEmptyStr($approved) || $this->config->isEmptyStr($address) || $this->config->isEmptyStr($stdRegNo)) {
			$this->response = $this->alert->alert_toastr("error", "There is an error in your Submission, Please check your inputs!", __OSO_APP_NAME__ . " Says");
		} elseif ($approved !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code, Try again!", __OSO_APP_NAME__ . " Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE $this->table_name SET stdRegNo=?, stdSurName=?,stdFirstName=?,stdMiddleName=?,stdDob=?,stdGender=?,stdAdmStatus=?, stdAddress=? WHERE stdId=? LIMIT 1");
				if ($this->stmt->execute(array($stdRegNo, $surname, $fname, $lname, $dob, $gender, $student_status, $address, $stdId))) {
					$this->dbh->commit();
					$this->dbh = null;
					$this->response = $this->alert->alert_toastr("success", "Updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.href='./ab_students';
						},500);</script>";
				} else {
					$this->response = $this->alert->alert_toastr("error", "Something went wrong, Please try again ...", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_msg("Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	public function upload_student_passport($data, $file)
	{
		$studentId = $this->config->Clean($data['student_id']); //auth_code
		$auth_code = $this->config->Clean($data['auth_code']); //auth_code
		$passport_name = $file['passport']['name'];
		$passport_size = $file['passport']['size'] / 1024;
		$passport_temp = $file['passport']['tmp_name'];
		$passport_error = $file['passport']['error'];
		$allowed = array("jpg", "jpeg", "png");
		$name_div = explode(".", $passport_name);
		$image_ext = strtolower(end($name_div));
		if (!$this->config->isEmptyStr($passport_name)) {
			if ($this->config->isEmptyStr($auth_code)) {
				$this->response = $this->alert->alert_toastr("error", "Please provide the Authentication Code to proceed", __OSO_APP_NAME__ . " Says");
			} elseif ($auth_code !== __OSO__CONTROL__KEY__) {
				$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
			} elseif (!in_array($image_ext, $allowed)) {
				$this->response = $this->alert->alert_toastr("error", "Your passport format is not supported, Only PNG,JPG,JPEG", __OSO_APP_NAME__ . " Says");
			} elseif ($passport_size > 20) {
				$this->response = $this->alert->alert_toastr("error", "Your Image Size should not exceed 20KB, Your file Size is :" . number_format($passport_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
			} elseif ($passport_error != 0) {
				$this->response = $this->alert->alert_toastr("error", "There was an error Uploading your image", __OSO_APP_NAME__ . " Says");
			} else {
				$student_data = self::get_student_data_byId($studentId);
				$passport_realName = $student_data->stdRegNo . mt_rand(0, 9999999) . "." . $image_ext;
				//lets update the student passport in the db
				$passport_destination = "../schoolImages/students/" . $passport_realName;
				try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("UPDATE $this->table_name SET stdPassport=? WHERE stdId=? LIMIT 1");
					if ($this->stmt->execute(array($passport_realName, $studentId))) {
						if ($this->config->move_file_to_folder($passport_temp, $passport_destination)) {
							$this->dbh->commit();
							$this->dbh = null;
							$this->response = $this->alert->alert_toastr("success", "Passport Uploaded Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.href='./ab_students';
						},500);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					if (file_exists($passport_destination)) {
						unlink($passport_destination);
					}
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		} else {
			$this->response = $this->alert->alert_toastr("error", "Please Select a passport to Upload", __OSO_APP_NAME__ . " Says");
		}
		return $this->response;
	}

	public function count_students_by_gender_class($stdGrade, $gender)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as cgender FROM {$this->table_name} WHERE stdGender=? AND studentClass=? AND stdAdmStatus='Active'");
		$this->stmt->execute(array($gender, $stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cgender;
		} else {
			$this->response = "0";
		}
		return $this->response;
	}

	public function count_total_visap_students_class($stdGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as students FROM {$this->table_name} WHERE studentClass=? AND stdAdmStatus='Active'");
		$this->stmt->execute([$stdGrade]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->students;
		} else {
			$this->response = "0";
		}
		return $this->response;
	}

	public function get_all_students_by_status_by_class($stdGrade, $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdAdmStatus=? AND studentClass=? ORDER BY stdSurName ASC");
		$this->stmt->execute(array($status, $stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	public function count_all_online_students()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`stdId`) as online FROM {$this->table_name} WHERE stdAdmStatus='Active' AND is_online='1'");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->online;
			return $this->response;
		}
	}

	public function get_filtered_students_list($stdGrade, $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE studentClass=? AND stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute(array($stdGrade, $status));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function getStudentListByType($stdGrade, $studentType)
	{
		$status = "Active";
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE studentClass=? AND stdApplyType=? AND stdAdmStatus=? ORDER BY stdSurName ASC");
		$this->stmt->execute(array($stdGrade, $studentType, $status));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//GET STUDENT ATTENDANCE INFO
	public function get_student_attendance_details($stdRegNo, $stdGrade, $rollType, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`attend_id`) as cnt FROM `visap_class_attendance_tbl` WHERE stdReg=? AND studentGrade=? AND roll_call=? AND term=? AND schl_session=?");
		$this->stmt->execute(array($stdRegNo, $stdGrade, $rollType, $term, $session));
		if ($this->stmt->rowCount() > 0) {
			$rollCall = $this->stmt->fetch();
			$this->response = $rollCall->cnt;
			return $this->response;
		}
	}

	public function get_student_grade_marks($gClass, $markObtained)
	{
		//grade_class,mark_grade,score_from,score_to,score_remark,school_ses
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE `grade_class`=? AND ?>=
`score_from` AND ? <= `score_to`"); $this->stmt->execute(array($gClass, $markObtained, $markObtained));
  if ($this->stmt->rowCount() > 0) {
  $response = $this->stmt->fetchAll();
  foreach ($response as $value) {
  $this->response = $value;
  }
  return $this->response;
  }
  }

  //get all subjects offered by the students
  public function get_student_offered_subjects($stdGrade)
  {
  $this->stmt = $this->dbh->prepare("SELECT count(id) as total_sub FROM `visap_registered_subject_tbl` WHERE
  subject_class=?");
  $this->stmt->execute(array($stdGrade));
  if ($this->stmt->rowCount() > 0) {
  $reSet = $this->stmt->fetch();
  $this->response = $reSet->total_sub;
  return $this->response;
  }
  }

  public function count_all_online_students_by_class($stdGrade)
  {
  $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE is_online='1' AND studentClass=? AND
  stdAdmStatus='Active' ORDER BY stdSurName ASC LIMIT 20");
  $this->stmt->execute([$stdGrade]);
  if ($this->stmt->rowCount() > 0) {
  $this->response = $this->stmt->fetchAll();
  return $this->response;
  }
  }

  public function get_all_my_class_mates($stdGrade)
  {
  $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE stdAdmStatus='Active' AND studentClass=?
  ORDER BY stdSurName ASC");
  $this->stmt->execute([$stdGrade]);
  if ($this->stmt->rowCount() > 0) {
  $this->response = $this->stmt->fetchAll();
  return $this->response;
  }
  }

  public function upload_student_assignments($data, $file)
  {
  $subject = $this->config->Clean($data['subject']);
  $stdGrade = $this->config->Clean($data['std_grade']);
  $sdate = $this->config->Clean(date("Y-m-d", strtotime($data['sdate'])));
  $topic = $this->config->Clean($data['topic']);
  $note = $this->config->Clean($data['note']);
  $uploadedBy = $this->config->Clean($data['uploadedBy']);
  $bypass = $this->config->Clean($data['bypass']);
  $term = $this->config->Clean($data['term']);
  $schl_sess = $this->config->Clean($data['school_session']);

  $assignmentFile_name = $file['assignmentFile']['name'];
  $assignmentFile_size = $file['assignmentFile']['size'] / 1024;
  $assignmentFile_temp = $file['assignmentFile']['tmp_name'];
  $assignmentFile_error = $file['assignmentFile']['error'];
  $allowed = array("docx", "docxs", "docs", "pdf", "xlsx", "xls");
  $name_div = explode(".", $assignmentFile_name);
  $image_ext = strtolower(end($name_div));
  //check for values
  if (
  $this->config->isEmptyStr($subject) || $this->config->isEmptyStr($stdGrade) || $this->config->isEmptyStr($sdate)
  || $this->config->isEmptyStr($topic) || $this->config->isEmptyStr($note) || $this->config->isEmptyStr($uploadedBy) ||
  $this->config->isEmptyStr($assignmentFile_name)
  ) {
  $this->response = $this->alert->alert_toastr(
  "error",
  "Invalid form Submission, Please check and try again!",
  __OSO_APP_NAME__ . " Says"
  );
  } elseif ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
  $this->response = $this->alert->alert_toastr("error", "Invalid Authentication, Please check your Connection and try
  again!", __OSO_APP_NAME__ . " Says");
  } elseif (!in_array($image_ext, $allowed)) {
  $this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Please check and try
  again!", __OSO_APP_NAME__ . " Says");
  } elseif ($assignmentFile_size > 100) {
  $this->response = $this->alert->alert_toastr("error", "Your File Size should not exceed 100KB, Your Selected file Size
  is :" . number_format($assignmentFile_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
  } elseif ($assignmentFile_error !== 0) {
  $this->response = $this->alert->alert_toastr(
  "error",
  "There was an error Uploading your File, Try again!",
  __OSO_APP_NAME__ . " Says"
  );
  } else {
  //check for duplicate entry
  $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_assignment_tbl` WHERE teacherId=? AND subject=? AND stdGrade=?
  AND submission_date=? AND topic=? AND term=? AND schl_session=? LIMIT 1");
  $this->stmt->execute(array($uploadedBy, $subject, $stdGrade, $sdate, $topic, $term, $schl_sess));
  if ($this->stmt->rowCount() == 1) {
  $this->response = $this->alert->alert_toastr("error", "This Assignment is already uploaded!", __OSO_APP_NAME__ . "
  Says");
  } else {
  $file_realName = $subject . "_" . mt_rand(1240, 99999999) . "." . $image_ext;
  //lets update the student passport in the db
  $file_destination = "../assignments/" . $file_realName;
  try {
  $this->dbh->beginTransaction();
  $created_at = date("Y-m-d");
  $this->stmt = $this->dbh->prepare("INSERT INTO `visap_assignment_tbl`
  (teacherId,subject,stdGrade,submission_date,topic,note,ass_content,created_at,term,schl_session) VALUES
  (?,?,?,?,?,?,?,?,?,?);");
  if ($this->stmt->execute(array(
  $uploadedBy, $subject, $stdGrade, $sdate, $topic, $note, $file_realName, $created_at,
  $term, $schl_sess
  ))) {
  if ($this->config->move_file_to_folder($assignmentFile_temp, $file_destination)) {
  $this->dbh->commit();
  $this->response = $this->alert->alert_toastr("success", "Assignment Uploaded Successfully", __OSO_APP_NAME__ . "
  Says") . "<script>
  setTimeout(() => {
    window.location.reload();
  }, 500);
  </script>";
  }
  } else {
  $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . "
  Says");
  }
  } catch (PDOException $e) {
  $this->dbh->rollback();
  if (file_exists($file_destination)) {
  unlink($file_destination);
  }
  $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
  Says");
  }
  }
  }

  return $this->response;
  }

  public function get_all_students_assignments()
  {
  $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_assignment_tbl`ORDER BY subject ASC");
  $this->stmt->execute();
  if ($this->stmt->rowCount() > 0) {
  $this->response = $this->stmt->fetchAll();
  return $this->response;
  }
  }

  public function get_all_students_assignments_by_class($stdGrade)
  {
  $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_assignment_tbl` WHERE stdGrade=? ORDER BY subject ASC");
  $this->stmt->execute([$stdGrade]);
  if ($this->stmt->rowCount() > 0) {
  $this->response = $this->stmt->fetchAll();
  return $this->response;
  }
  }

  //filter_class_assignmentByDate()
  public function filter_class_assignmentByDate($stdGrade, $subject, $from, $to)
  {
  $from_date = $this->config->Clean(date("Y-m-d", strtotime($from)));
  $to_date = $this->config->Clean(date("Y-m-d", strtotime($to)));
  $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_assignment_tbl` WHERE stdGrade=? AND `subject`=? AND
  DATE(created_at) BETWEEN ? AND ? ORDER BY `subject` ASC");
  $this->stmt->execute([$stdGrade, $subject, $from_date, $to_date]);
  if ($this->stmt->rowCount() > 0) {
  $this->response = $this->stmt->fetchAll();
  return $this->response;
  }
  }

  public function save_change_student_new_password($data)
  {
  $oldpass = $this->config->Clean($data['oldpassword']);
  $newpass = $this->config->Clean($data['newpassword']);
  $cpass = $this->config->Clean($data['cpassword']);
  $stdId = $this->config->Clean($data['studentId']);
  //check for empty
  if ($this->config->isEmptyStr($oldpass)) {
  $this->response = $this->alert->alert_toastr("error", "Your Current Password is Required!", __OSO_APP_NAME__ . "
  Says");
  } elseif ($this->config->isEmptyStr($newpass)) {
  $this->response = $this->alert->alert_toastr("error", "Enter the new password to proceed!", __OSO_APP_NAME__ . "
  Says");
  } elseif (strlen($newpass) < 8) { $this->response = $this->alert->alert_toastr("error", "Password cannot be less than
    eight (8) characters!", __OSO_APP_NAME__ . " Says");
    } elseif ($this->config->isEmptyStr($cpass)) {
    $this->response = $this->alert->alert_toastr("error", "Confirm your new Password to continue!", __OSO_APP_NAME__ . "
    Says");
    } elseif ($newpass !== $cpass) {
    $this->response = $this->alert->alert_toastr(
    "error",
    "New Password and Confirm Password not match!",
    __OSO_APP_NAME__ . " Says"
    );
    } else {
    //check for the current password entered
    $student_data = self::get_student_data_byId($stdId);
    $db_password = $student_data->stdPassword;
    if (!$this->config->check_two_passwords_hash($oldpass, $db_password)) {
    $this->response = $this->alert->alert_toastr("error", "Invalid Old Password Entered!", __OSO_APP_NAME__ . " Says");
    } else {
    try {
    $this->dbh->beginTransaction();
    $hashed_password = $this->config->encrypt_user_password($newpass);
    $this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET stdPassword=? WHERE stdId=? LIMIT 1");
    if ($this->stmt->execute(array($hashed_password, $stdId))) {
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr(
    "success",
    "Password Changed Successfully, logging out...",
    __OSO_APP_NAME__ . " Says"
    ) . "<script>
    setTimeout(() => {
      window.location.href = 'logout?action=logout';
    }, 500);
    </script>";
    } else {
    $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
    " Says");
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
    Says");
    }
    }
    }
    return $this->response;
    }

    public function get_assignmentById($assId)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_assignment_tbl` WHERE assId=? LIMIT 1");
    $this->stmt->execute([$assId]);
    if ($this->stmt->rowCount() == 1) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }

    public function submit_myassignment_answer($data, $file)
    {
    $subject = $this->config->Clean($data['subject']);
    $stdId = $this->config->Clean($data['stdId']);
    $teacherId = $this->config->Clean($data['teacher']);
    $stdRegCode = $this->config->Clean($data['stdRegCode']);
    $stdGrade = $this->config->Clean($data['student_class']);
    $assignmentId = $this->config->Clean($data['assignmentId']);
    $bypass = $this->config->Clean($data['bypass']);
    $term = $this->config->Clean($data['academic_term']);
    $schl_sess = $this->config->Clean($data['school_sess']);
    $submitted_at = date("Y-m-d");

    $answerFile_name = $file['ass_file']['name'];
    $answerFile_size = $file['ass_file']['size'] / 1024;
    $answerFile_temp = $file['ass_file']['tmp_name'];
    $answerFile_error = $file['ass_file']['error'];
    $allowed = array("docx", "docxs", "docs", "pdf", "xlsx", "xls");
    $name_div = explode(".", $answerFile_name);
    $image_ext = strtolower(end($name_div));
    //check for values
    if (
    $this->config->isEmptyStr($subject) || $this->config->isEmptyStr($stdGrade) ||
    $this->config->isEmptyStr($answerFile_name)
    ) {
    $this->response = $this->alert->alert_toastr(
    "error",
    "Invalid form Submission, Please check and try again!",
    __OSO_APP_NAME__ . " Says"
    );
    } elseif ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
    $this->response = $this->alert->alert_toastr("error", "Invalid Authentication, Please check your Connection and try
    again!", __OSO_APP_NAME__ . " Says");
    } elseif (!in_array($image_ext, $allowed)) {
    $this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Please check and try
    again!", __OSO_APP_NAME__ . " Says");
    } elseif ($answerFile_size > 100) {
    $this->response = $this->alert->alert_toastr("error", "Your File Size should not exceed 100KB, Your Selected file
    Size is :" . number_format($answerFile_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
    } elseif ($answerFile_error !== 0) {
    $this->response = $this->alert->alert_toastr(
    "error",
    "There was an error Uploading your File, Try again!",
    __OSO_APP_NAME__ . " Says"
    );
    } else {
    //check for duplicate entry
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_submitted_class_assignment_tbl` WHERE question_id=? AND
    tId=? AND stdRegno=? AND subject=? AND stdGrade=? AND submitted_at=? AND term=? AND school_session=? LIMIT 1");
    $this->stmt->execute(array(
    $assignmentId, $teacherId, $stdRegCode, $subject, $stdGrade, $submitted_at, $term,
    $schl_sess
    ));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->alert->alert_toastr("error", "This Assignment is already Submitted!", __OSO_APP_NAME__ . "
    Says");
    } else {
    $file_realName = $stdId . $stdRegCode . "_" . mt_rand(140, 9999999) . "." . $image_ext;
    //lets update the student passport in the db
    $file_destination = "../student-assignments/" . $file_realName;
    try {
    $this->dbh->beginTransaction();
    $this->stmt = $this->dbh->prepare("INSERT INTO `visap_submitted_class_assignment_tbl`
    (question_id,tId,stdRegno,`subject`,stdGrade,answer,term,school_session,Submitted_at) VALUES (?,?,?,?,?,?,?,?,?);");
    if ($this->stmt->execute(array(
    $assignmentId, $teacherId, $stdRegCode, $subject, $stdGrade, $file_realName, $term,
    $schl_sess, $submitted_at
    ))) {
    if ($this->config->move_file_to_folder($answerFile_temp, $file_destination)) {
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success", "Assignment Uploaded Successfully", __OSO_APP_NAME__ . "
    Says") . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 500);
    </script>";
    }
    } else {
    $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
    " Says");
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    if (file_exists($file_destination)) {
    unlink($file_destination);
    }
    $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
    Says");
    }
    }
    }
    return $this->response;
    }

    public function get_all_my_submitted_assignments($stdRegNo, $stdGrade)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_submitted_class_assignment_tbl` WHERE stdRegno=? AND
    stdGrade=? ORDER BY subject ASC");
    $this->stmt->execute([$stdRegNo, $stdGrade]);
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetchAll();
    return $this->response;
    }
    }

    public function get_all_student_submitted_assignments_by_staffId($staffId)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_submitted_class_assignment_tbl` WHERE tId=? ORDER BY subject
    ASC");
    $this->stmt->execute([$staffId]);
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetchAll();
    return $this->response;
    }
    }

    public function submit_marked_student_assignments($data)
    {
    $stdRegNo = $this->config->Clean($data['admNo']);
    $aId = $this->config->Clean($data['assIdd']);
    $tId = $this->config->Clean($data['teacher']);
    $subject = $this->config->Clean($data['subject']);
    $mark = $this->config->Clean($data['mark_obtained']);
    $remark = $this->config->Clean($data['rnote']);
    $studclass = $this->config->Clean($data['studclass']);
    $bypass = $this->config->Clean($data['bypass']);
    //check for null values
    if ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
    $this->response = $this->alert->alert_toastr("error", "Authentication Failed, Please Check your Connection and try
    again!", __OSO_APP_NAME__ . " Says");
    } elseif (
    $this->config->isEmptyStr($mark) || $this->config->isEmptyStr($aId) ||
    $this->config->isEmptyStr($stdRegNo) || $this->config->isEmptyStr($remark)
    ) {
    $this->response = $this->alert->alert_toastr(
    "error",
    "Score and Remark is Required, Please Check and try again!",
    __OSO_APP_NAME__ . " Says"
    );
    } else {
    //check if this assignment has been submitted once
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_submitted_class_assignment_tbl` WHERE aId=? AND tId=? AND
    `status`=1 AND score!=0 AND stdRegno=? AND `subject`=? AND stdGrade=?");
    $this->stmt->execute(array($aId, $tId, $stdRegNo, $subject, $studclass));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->alert->alert_toastr(
    "error",
    "This Score and Remark is already submitted!",
    __OSO_APP_NAME__ . " Says"
    );
    } else {
    try {
    $this->dbh->beginTransaction();
    $this->stmt = $this->dbh->prepare("UPDATE `visap_submitted_class_assignment_tbl` SET score=?,
    status=?,note_to_student=? WHERE aId=? AND tId=? AND stdRegno=? AND `subject`=? LIMIT 1");
    $status = 1;
    if ($this->stmt->execute(array($mark, $status, $remark, $aId, $tId, $stdRegNo, $subject))) {
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr(
    "success",
    "Score Uploaded Successfully, reloading...",
    __OSO_APP_NAME__ . " Says"
    ) . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 500);
    </script>";
    } else {
    $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
    " Says");
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
    Says");
    }
    }
    }
    return $this->response;
    }
    //remove assignment
    public function remove_student_assignment_file_now($assId)
    {
    if (!$this->config->isEmptyStr($assId)) {
    $data_file = $this->get_assignmentById($assId);
    $filePath = "../assignments/" . $data_file->ass_content;
    try {
    $this->dbh->beginTransaction();
    //Delete the selected Subject
    $this->stmt = $this->dbh->prepare("DELETE FROM `visap_assignment_tbl` WHERE assId=? LIMIT 1");
    if ($this->stmt->execute([$assId])) {
    if (file_exists($filePath)) {
    unlink($filePath);
    }
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success", "Assignment Deleted Successfully", __OSO_APP_NAME__ . "
    Says") . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 500);
    </script>";
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    $this->response = $this->alert->alert_toastr("error", "Failed to Delete Assignment: Error Occurred: " .
    $e->getMessage(), __OSO_APP_NAME__ . " Says");
    }
    }
    return $this->response;
    }

    public function student_bulk_promotions($data)
    {
    $promoted_to = $this->config->Clean($data['promoted_to']);
    $auth_pass = $this->config->Clean($data['Auth']);
    if (isset($data['marked'])) {
    foreach ($data['marked'] as $keyId) {
    if ($this->config->isEmptyStr($promoted_to)) {
    $this->response = $this->alert->alert_toastr("error", "Please Choose a promotion class!", __OSO_APP_NAME__ . "
    Says");
    } elseif ($this->config->isEmptyStr($auth_pass)) {
    $this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . "
    Says");
    } elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
    $this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
    } else {
    //update the student class
    try {
    $this->dbh->beginTransaction();
	if($promoted_to =="Basic 5" || $promoted_to =="JSS 3A" || $promoted_to =="JSS 3B" || $promoted_to =="JSS 3C" || $promoted_to =="SSS 3A" || $promoted_to =="SSS 3B" || $promoted_to =="SSS 3C"){
		$completed_date = date("Y-m-d");
		$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET studentClass=?,completed_date=? WHERE stdId=?");
	}else{
		$completed_date = NULL;
		$this->stmt = $this->dbh->prepare("UPDATE {$this->table_name} SET studentClass=?,completed_date=? WHERE stdId=?");
	}
    if ($this->stmt->execute(array($promoted_to,$completed_date, $keyId))) {
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success", "Promoted Successfully...", __OSO_APP_NAME__ . " Says") . "
    <script>
    setTimeout(() => {
      window.location.reload();
    }, 800);
    </script>";
    } else {
    $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
    " Says");
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
    Says");
    }
    }
    }
    } else {
    $this->response = $this->alert->alert_toastr(
    "error",
    "Please select atleast one student to promote!",
    __OSO_APP_NAME__ . " Says"
    );
    }
    return $this->response;
    }

    public function get_student_details_byRegNo($stdRegNo)
    {
    $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as
    full_name FROM $this->table_name WHERE stdRegNo=? LIMIT 1");
    $this->stmt->execute(array($stdRegNo));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }


    //get student psychomotor
    public function getStudentPsychomotorDetails($stdReg, $stdGrade, $term, $session)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_psycho_tbl` WHERE reg_number=? AND student_class=? AND
    term=? AND session=? LIMIT 1");
    $this->stmt->execute(array($stdReg, $stdGrade, $term, $session));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }

    public function getStudentAffectiveDomainDetails($stdReg, $stdGrade, $term, $session)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_behavioral_tbl` WHERE reg_number=? AND student_class=? AND term=? AND session=? LIMIT 1");
    $this->stmt->execute(array($stdReg, $stdGrade, $term, $session));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }


    public function checkStudentTokenExists($name, $email, $token)
    {
    if (isset($name, $email, $token)) {
    $this->stmt = $this->dbh->prepare("SELECT token FROM `visap_student_login_token` WHERE username=? AND email=? LIMIT 1");
    $this->stmt->execute(array($name, $email));
    if ($this->stmt->rowCount() > 0) {
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
    }

    //delete toke upon logged out
    public function deleteStudentSessionToken($name, $email, $token)
    {
    $this->stmt = $this->dbh->prepare("DELETE FROM `visap_student_login_token` WHERE username=? AND email=? LIMIT 1");
    if ($this->stmt->execute(array($name, $email))) {
    $this->response = true;
    }
    return $this->response;
    }

    public function searchStudentByRegEmailPhone($q)
    {
    if (!$this->config->isEmptyStr($q)) {
    $this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as
    full_name FROM `{$this->table_name}` WHERE `stdRegNo`=? OR `stdEmail`=? OR `stdPhone`=? LIMIT 1");
    $this->stmt->execute(array($q, $q, $q));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }
    }

    public function get_student_infoId($studentId)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_info_tbl` WHERE studentId=? LIMIT 1");
    $this->stmt->execute([$studentId]);
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }

    public function get_student_medical_infoId($studentId)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `visap_stdmedical_tbl` WHERE studId=? LIMIT 1");
    $this->stmt->execute([$studentId]);
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }

    public function getAdmissionCardUser($stdRegNo)
    {
    $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_reg_pins` WHERE usedBy=? AND pin_status=1 LIMIT 1");
    $this->stmt->execute(array($stdRegNo));
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetch();
    return $this->response;
    }
    }

    public function registerBulkStudentUsingCSVFile($data, $csv_file)
    {

    $auth_pass = $this->config->Clean($data['auth_code']);
    $studentClass = $this->config->Clean($data['student_class']);
    //$admission_year = $this->config->Clean($data['admission_year']);
    $File_tmp = $csv_file['studentCsvFile']['tmp_name'];
    $FileName = $csv_file['studentCsvFile']['name'];
    $allowed = array("csv");
    $name_div = explode(".", $FileName);
    $image_ext = strtolower(end($name_div));
    if (
    $this->config->isEmptyStr($auth_pass) || $this->config->isEmptyStr($studentClass) ||
    $this->config->isEmptyStr($FileName)
    ) {
    $this->response = $this->alert->alert_toastr("error", "Invalid Submission, Pls try again!", __OSO_APP_NAME__
    . " Says");
    } elseif (!in_array($image_ext, $allowed)) {
    $this->response = $this->alert->alert_toastr("error", "Only CSV format is allowed!", __OSO_APP_NAME__ . " Says");
    } else {
    $file_open = fopen($File_tmp, "r");
    // Skip the first line
    fgetcsv($file_open);
    while (($csv_data = fgetcsv($file_open, 1000, ",")) !== false) {
    //name the columns ndeeded
    //Surname,Firstname,Lastname,Date_of_birth,Gender,Address,Phone,Email,Admission_date,Student_Type, Admission_number
    $stdSurName = $this->config->Clean($csv_data[0]);
    $stdUserName = $stdSurName;
    $stdFirstName = $this->config->Clean($csv_data[1]);
    $stdMiddleName = $this->config->Clean($csv_data[2]);
    $stdDob = $this->config->Clean(date("Y-m-d", strtotime($csv_data[3])));
    $stdGender = $this->config->Clean($csv_data[4]);
    $stdAddress = $this->config->Clean($csv_data[5]);
    $stdPhone = $this->config->Clean($csv_data[6]);
    $stdEmail = $this->config->Clean($csv_data[7]);
    $stdApplyDate = $this->config->Clean(date("Y-m-d", strtotime($csv_data[8])));
    $stdApplyType = $this->config->Clean($csv_data[9]);
    $stdRegNo = $this->config->Clean($csv_data[10]);
    $default_pass = "student";
    $stdPassword = $this->config->encrypt_user_password($default_pass);
    $stdAdmStatus = "Active";
    //$stdRegNo = self::generate_admission_number($admission_year);
    $stdConfToken = substr(md5(uniqid(mt_rand(), true)), 0, 14);
    if ($this->config->check_single_data('visap_staff_tbl', 'staffEmail', $stdEmail)) {

    $this->response = $this->alert->alert_toastr("error", "$stdEmail is already taken, Please try another email
    address!", __OSO_APP_NAME__ . " Says");
    } elseif ($this->config->check_single_data('visap_student_tbl', 'stdEmail', $stdEmail)) {

    $this->response = $this->alert->alert_toastr("error", "$stdEmail is already taken on this Portal, Please try another
    Email address!", __OSO_APP_NAME__ . " Says");
    } elseif ($this->config->check_single_data('visap_student_tbl', 'stdRegNo', $stdRegNo)) {

    $this->response = $this->alert->alert_toastr(
    "error",
    "This admission Number $stdRegNo already exists!",
    __OSO_APP_NAME__ . " Says"
    );
    } else {
    try {
    $this->dbh->beginTransaction();
    $this->stmt = $this->dbh->prepare("INSERT INTO `{$this->table_name}`
    (stdRegNo,stdEmail,stdUserName,stdPassword,studentClass,stdSurName,stdFirstName,stdMiddleName,stdDob,stdGender,stdAddress,stdPhone,stdAdmStatus,stdApplyDate,stdApplyType,stdConfToken)
    VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
    if ($this->stmt->execute(array(
    $stdRegNo, $stdEmail, $stdUserName, $stdPassword, $studentClass, $stdSurName,
    $stdFirstName, $stdMiddleName, $stdDob, $stdGender, $stdAddress, $stdPhone, $stdAdmStatus, $stdApplyDate,
    $stdApplyType, $stdConfToken
    ))) {
    $this->dbh->commit();
    $this->response = $this->alert->alert_toastr(
    "success",
    "Students Uploaded &amp; Registered Successfully...",
    __OSO_APP_NAME__ . " Says"
    ) . "<script>
    setTimeout(() => {
      window.location.reload();
    }, 1500);
    </script>";
    } else {
    $this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ .
    " Says");
    }
    } catch (PDOException $e) {
    $this->dbh->rollback();
    $this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . "
    Says");
    }
    }
    }

    fclose($file_open);
    }

    return $this->response;
    }


    public function getAllStudents($student_class)
    {
    if (!$this->config->isEmptyStr($student_class)) {
    $this->stmt = $this->dbh->prepare("SELECT * FROM {$this->table_name} WHERE studentClass=?");
    $this->stmt->execute([$student_class]);
    if ($this->stmt->rowCount() > 0) {
    $this->response = $this->stmt->fetchAll();
    return $this->response;
    }
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

    public function sendPasswordResetLink($data)
    {
    $OsotechMailer = new OsotechMailer();
    $email = $this->config->Clean($data['reset_email']);
    $userType = $this->config->Clean($data['accountType']);
    if ($this->config->isEmptyStr($email) || $this->config->isEmptyStr($userType)) {
    $this->response = $this->alert->alert_msg("Enter e-mail address to continue!", "danger");
    } elseif (!$this->config->is_Valid_Email($email)) {
    $this->response = $this->alert->alert_msg("Please enter a vaild e-mail address!", "danger");
    } else {
    //chect the submitted email if exists
    $student_data = $this->config->get_single_data($this->table_name, "stdEmail", $email);
    if (!$student_data) {
    $this->response = $this->alert->alert_msg(
    $email . " doesn't match any account on this Portal!",
    "danger"
    );
    } else {
    //create a new student Token
    $token = $this->config->generateRandomUserToken(51);
    $tokenExpire = date("Y-m-d H:i:s", strtotime("+60 minutes"));
    //insert the new token to db
    $this->stmt = $this->dbh->prepare("UPDATE `{$this->table_name}` SET token=?, stdTokenExp=? WHERE stdEmail=? AND
    stdId=?");
    if ($this->stmt->execute([$token, $tokenExpire, $email, $student_data->stdId])) {
    $fullname = $student_data->stdSurName . " " . $student_data->stdFirstName;
    //redirect link
    //app_root = loclahost/smatechportal/eportal/
    $urlLink = APP_ROOT . "update-password?email=$email&token=$token";
    if ($OsotechMailer->generatePasswordResetLink($fullname, $email, $urlLink, $tokenExpire)) {
    $this->response = $this->alert->alert_msg("Reset link have been sent to <b>$email</b>, Click on the Link to
    reset your password!", "success");
    } else {
    $this->response = $this->alert->alert_msg("Oops!, Something went wrong, Reset link sent failed, Please try
    again!", "danger");
    }
    }
    }
    }
    return $this->response;
    }

    public function updateNewPassword($data)
    {
    $email = $this->config->Clean($data['userEmail']);
    $userType = $this->config->Clean($data['userType']);
    $pwd = $this->config->Clean($data['pwd']);
    $cpwd = $this->config->Clean($data['cpwd']);
    if (
    $this->config->isEmptyStr($email) || $this->config->isEmptyStr($userType) || $this->config->isEmptyStr($pwd) ||
    $this->config->isEmptyStr($cpwd)
    ) {
    $this->response = $this->alert->alert_msg(
    "Invalid Submission, Please try again!",
    "danger"
    );
    } else if (!$this->config->CheckPasswordValidity($pwd)) {
    $this->response = $this->alert->alert_msg(
    "Password should correspond with the given hint!",
    "danger"
    );
    } else if ($pwd <> $cpwd) {
      $this->response = $this->alert->alert_msg(
      "Password and Confirm Password do not match!",
      "danger"
      );
      } else {
      $student_data = $this->config->get_single_data($this->table_name, "stdEmail", $email);
      $updated_password = $this->config->encrypt_user_password($pwd);
      try {
      $this->dbh->beginTransaction();
      $this->stmt = $this->dbh->prepare("UPDATE `{$this->table_name}` SET `stdPassword`=?, token=null, stdTokenExp=null
      WHERE stdEmail=? AND
      stdId=?");
      if ($this->stmt->execute([$updated_password, $email, $student_data->stdId])) {
      $this->dbh->commit();
      $this->response = $this->alert->alert_msg(
      "Password updated successfully!, Redirecting...",
      "success"
      ) . $this->config->redirectWithTime("./", 3000);
      }
      } catch (PDOException $e) {
      $this->dbh->rollBack();
      $this->response = $this->alert->alert_msg(
      "Something went wrong, Pls try again!",
      "danger"
      );
      }
      }
      return $this->response;
      }
      public function checkPasswordResetRedirectAuth($email, $token): bool
      {
      if (!$this->config->isEmptyStr($email) && !$this->config->isEmptyStr($token)) {
      //check for these two values in db
      $this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->table_name}` WHERE token=? AND `stdTokenExp` > NOW() AND
      stdEmail=?");
      $this->stmt->execute([$token, $email]);
      //if rowcount is > 0 return true
      if ($this->stmt->rowCount() > 0) {
      $this->response = true;
      } else {
      $this->response = false;
      }
      }
      return $this->response;
      }
      public function sendInternalAndExternalMessage(array $data, array $file)
      {
      $OsotechMailer = new OsotechMailer();
      $senderEmail = $this->config->Clean($data['sender_email']);
      $subject = $this->config->Clean($data['subject']);
      $ccEmail = $this->config->Clean($data['cc_email']) ?? "";
      $bccEmail = $this->config->Clean($data['bcc_email']) ?? "";
      $messageBody = $this->config->Clean($data['message']);
      $user_type = $this->config->Clean($data['account_user_type']);
      if (
      $this->config->isEmptyStr($senderEmail) ||
      $this->config->isEmptyStr($user_type) || $this->config->isEmptyStr($subject) ||
      $this->config->isEmptyStr($messageBody)
      ) {
      $this->response = $this->alert->alert_toastr(
      "error",
      "Invalid Submission, Please check and try again!",
      __OSO_APP_NAME__ . " Says"
      );
      } else {
      if (isset($file['attachment']['tmp_name']) && $file['attachment']['tmp_name'] != "") {
      $ext = pathinfo($file['attachment']['name'], PATHINFO_EXTENSION);
      $new_file_name = time() . "_." . $ext;
      $file_tmp_name = $file['attachment']['tmp_name'];
      $file_size = $file['attachment']['size'] / 1024;
      if ($file_size > 2000) {
      $this->response = $this->alert->alert_toastr(
      "error",
      "Your attachment has exceeded 2MB!, Try again",
      __OSO_APP_NAME__ . " Says"
      );
      } else {
      $file_size = $this->config->convertToMbKbFormat($file['attachment']['size']);
      $destination = "../schoolImages/mail-attachment/" . $new_file_name;
      move_uploaded_file($file["attachment"]["tmp_name"], $destination);
      }
      } else {
      $new_file_name = "";
      $file_size = "";
      $ext = "";
      $file_tmp_name = "";
      }
      if (isset($data['receiver_email'])) {
      foreach ($data['receiver_email'] as $receiver_email) {
      $email = $receiver_email;
      if ($this->config->isEmptyStr($email)) {
      $this->response = $this->alert->alert_toastr(
      "error",
      "Invalid, Please enter at least one recipient email!",
      __OSO_APP_NAME__ . " Says"
      );
      } else {
      $sender_data = $this->config->get_single_data("visap_messages_user_tbl", "email", $senderEmail);
      //get the receiver_email info from database
      $receiver_data = $this->config->get_single_data("visap_messages_user_tbl", "email", $email);
      if ($receiver_data) {
      $this->stmt = $this->dbh->prepare("INSERT INTO `visap_messages_tbl`
      (sender_email,recipient_email,`subject`,msg,receiver_email,cc_email,bcc_email,attachment,file_size,file_type)
      VALUES
      (?,?,?,?,?,?,?,?,?,?);");
      if ($this->stmt->execute([
      $senderEmail, $receiver_data->email, $subject, $messageBody, $receiver_data->email, $ccEmail, $bccEmail,
      $new_file_name, $file_size, $ext
      ])) {
      $this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_sent_messages_tbl`
      (sender_id,recipient_id,`subject`,msg,receiver_email,cc_email,bcc_email,attachment,file_size,file_type) VALUES
      (?,?,?,?,?,?,?,?,?,?);");
      if ($this->stmt->execute([
      $senderEmail, $receiver_data->email, $subject, $messageBody, $receiver_data->email, $ccEmail, $bccEmail,
      $new_file_name, $file_size, $ext
      ])) {
      if ($OsotechMailer->sendExternalMessageToUsers(
      $senderEmail,
      $sender_data->fullName,
      $subject,
      $ccEmail,
      $bccEmail,
      $messageBody,
      $email,
      $receiver_data->fullName,
      $file_tmp_name
      )) {
      $this->response = $this->alert->alert_toastr("success", "Success, Message sent Successfully!", __OSO_APP_NAME__ .
      " Says") . $this->config->reloadWithTime();
      }
      }
      } else {
      $this->response = $this->alert->alert_toastr("error", "Error, Message sent Failed, Try again!", __OSO_APP_NAME__ .
      " Says");
      }
      } else {
      }
      }
      }
      } else {
      $this->response = $this->alert->alert_toastr("error", "Invalid, Please enter at least one recipient email
      and try again!", __OSO_APP_NAME__ . " Says");
      }
      }
      return $this->response;
      }
	/**
	 * Summary of generateStudentIdCard
	 * @param array $data
	 * @return string
	 */
	public function generateIdCard($data)
	{
		$stdRegNo = $this->config->Clean($data['admNo']);
		$auth_code = $this->config->Clean($data['auth_code']);
		//check for empty values
		if($this->config->isEmptyStr($stdRegNo)){
			$this->response = $this->alert->alert_toastr("error", "Student Admission No is Required", __OSO_APP_NAME__ ." Says");
		}else if($this->config->isEmptyStr($auth_code)){
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ ." Says");
		}else if($auth_code !== __OSO__CONTROL__KEY__){
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
			//check if the student with the entered reg no exist
		}else if(!$this->config->check_single_data($this->table_name,"stdRegNo", $stdRegNo)){
			$this->response = $this->alert->alert_toastr("error", "No Student Found for $stdRegNo", __OSO_APP_NAME__ ." Says");
		}else{

			$student_data = $this->get_student_data_ByRegNo($stdRegNo);
//check if the student has uploaded his / her passport
if($student_data->stdPassport == NULL || $student_data->stdPassport == ""){
	$this->response = $this->alert->alert_toastr("error", "Upload the student passport and try again!", __OSO_APP_NAME__ . " Says");
}else{
	//generate the student identity based on the student current details
	$testimonial_link ="./identitycard?student-idcard=".$this->config->convert_string("code",$student_data->stdId);
						$this->response = $this->alert->alert_toastr("success", "Generating ID CARD, Please wait...", __OSO_APP_NAME__ . " Says"). '<script>setTimeout(()=>{
							window.open("' . $testimonial_link . '","_blank","top=10, left=100, width=550, height=550");
						},3000);</script>';
	
}

		}
		return $this->response;
	}

	public function testimonialDetailsByRegNo($stdRegNo, $student_class)
	{
		$this->stmt = $this->dbh->prepare("SELECT *, concat(`stdSurName`,' ',`stdFirstName`,' ',`stdMiddleName`) as full_name FROM {$this->table_name} WHERE stdRegNo=? AND `studentClass`=? AND (completed_date!= NULL || completed_date != '')");
		$this->stmt->execute(array($stdRegNo,$student_class));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;
		}
	}

	public function getTestimonialByRegNo(string $regNo) {
		$sql = "SELECT * FROM `visap_student_testimonial_tbl` WHERE `stdRegNo`= ?";
	$this->stmt = $this->dbh->prepare($sql);
	$this->stmt->execute([$regNo]);
	if($this->stmt->rowCount() > 0){
		return $this->stmt->fetch();
	}
	}

	public function fetchStudentTestimonialInfo(array $data)
	{
		$regNo = $this->config->Clean($data['admNo']);
		$student_class = $this->config->Clean($data['student_class']);
		if(!$this->config->isEmptyStr($regNo) && !$this->config->isEmptyStr($student_class)){
			$this->response = $this->testimonialDetailsByRegNo($regNo,$student_class);
			if($this->response){
			return $this->response;
			}	
		}
	}
	/**
	 * Summary of generateTestimonialSerialNo
	 * @return string
	 * @author FlatERP Tech
	 */
	public function generateTestimonialSerialNo():string 
	{
	$cert_no = mt_rand(1000000000,9999999999);
	//check if the cert no already exists
	$sql = "SELECT cert_no FROM `visap_student_testimonial_tbl` WHERE `cert_no`= ?";
	$this->stmt = $this->dbh->prepare($sql);
	$this->stmt->execute([$cert_no]);
	if($this->stmt->rowCount()> 0){
	$cert_no = mt_rand(1000000000,9999999999);
	}
	return $cert_no;
	}

	public function generateStudentCertificate(array $data):string
	{
		$stdRegNo = $this->config->clean($data['admissionNumber']);
		$academic_ability = $this->config->clean($data['academic_ability']);
		$sports_ability = $this->config->clean($data['sports_ability']);
		$pass_code = $this->config->clean($data['auth_code']);
		$character = $this->config->clean($data['character']);
		$cert_no = $this->generateTestimonialSerialNo();

		$club = $this->config->clean($data['club']);
		$office = $this->config->clean($data['student_office_name']);
		$remarks = $this->config->clean($data['remarks']);
		$subject1 = $this->config->clean($data['subject_one']);
		$subject2 = $this->config->clean($data['subject_two']);
		$subject3 = $this->config->clean($data['subject_three']);
		$subject4 = $this->config->clean($data['subject_four']);
		$subject5 = $this->config->clean($data['subject_five']);
		$subject6 = $this->config->clean($data['subject_six']);
		$subject7 = $this->config->clean($data['subject_seven']);
		$subject8 = $this->config->clean($data['subject_eight']);
		$subject9 = $this->config->clean($data['subject_nine']);
		$subject10 = $this->config->clean($data['subject_ten']);
		//check for compulsary values 
		if($this->config->isEmptyStr($stdRegNo) || $this->config->isEmptyStr($academic_ability) || $this->config->isEmptyStr($sports_ability)|| $this->config->isEmptyStr($subject1) || $this->config->isEmptyStr($subject2) || $this->config->isEmptyStr($subject3) || $this->config->isEmptyStr($subject4) || $this->config->isEmptyStr($subject5) || $this->config->isEmptyStr($subject6) || $this->config->isEmptyStr($subject7) || $this->config->isEmptyStr($subject8) || $this->config->isEmptyStr($character)){
			$this->response = $this->alert->alert_toastr("error", "Select at least Eight(8) Subjects , to continue!", __OSO_APP_NAME__ . " Says");

		}else if($this->config->isEmptyStr($pass_code)){

			$this->response = $this->alert->alert_toastr("error", "Authentication code is required , to continue!", __OSO_APP_NAME__ . " Says");

		}else if($pass_code !== __OSO__CONTROL__KEY__){

			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication code!", __OSO_APP_NAME__ . " Says");
		}else if(str_word_count($remarks) > 5){
			$this->response = $this->alert->alert_toastr("error", " General Remarks cannot be more than five words!", __OSO_APP_NAME__ . " Says");
		}
		else if(!$this->config->check_single_data($this->table_name,"stdRegNo", $stdRegNo)){
			$this->response = $this->alert->alert_toastr("error", "No Student Found for $stdRegNo", __OSO_APP_NAME__ ." Says");
		}else{
			//check if this testimonial is already generated for the student in Basic 5, Jss3 or SSS 3
			$student_data = $this->get_student_data_ByRegNo($stdRegNo);
				$admittedDate = $student_data->stdApplyDate;
				$dateCompleted = $student_data->completed_date;
				$admitted_class = $student_data->admitted_class;
				$classCompleted = $student_data->studentClass;
				$allowedClass = array("Basic 5", "JSS 3A", "JSS 3B","JSS 3C", "SSS 3A" , "SSS 3B" , "SSS 3C");
			if($this->config->checkMultipleValues("visap_student_testimonial_tbl","stdRegNo", $stdRegNo,"class_completed",$classCompleted)){
				$this->response = $this->alert->alert_toastr("error", "This Certificate is already generated!", __OSO_APP_NAME__ ." Says");
			}else if(!in_array($classCompleted,$allowedClass)){
				$this->response = $this->alert->alert_toastr("error", "Testimonial is Restricted to Basic 5, JSS 3 and SSS 3 Only!", __OSO_APP_NAME__ . " Says");
			}else{
				try{
					$this->dbh->beginTransaction();
					$sql_query = "INSERT INTO `visap_student_testimonial_tbl` (stdRegNo,admitted_class,
					admitted_date,class_completed,date_completed,academic_ability,sports_ability,office_held,school_club,general_remarks,student_character,subject1,subject2,subject3,subject4,subject5,subject6,subject7,subject8,subject9,subject10,cert_no) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);";
					$this->stmt = $this->dbh->prepare($sql_query);
					if($this->stmt->execute([$stdRegNo,$admitted_class, $admittedDate,$classCompleted,
					$dateCompleted,$academic_ability,$sports_ability,$office,$club,$remarks,$character,$subject1,$subject2,$subject3,$subject4,$subject5,$subject6,$subject7,$subject8,$subject9,$subject10,$cert_no
					])){
						$this->dbh->commit();
						$testimonial_link ="./student-testimonial?data=".$this->config->convert_string("code",$stdRegNo);
						$this->response = $this->alert->alert_toastr("success", "Generating Testimonials, Please wait...!", __OSO_APP_NAME__ . " Says"). '<script>setTimeout(()=>{
							window.open("' . $testimonial_link . '","_blank","top=10, left=10, width=850, height=950");
						},4000);</script>';
					}
				}catch(PDOException $e){
					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred! Try again", __OSO_APP_NAME__ . " Says");
				}
			}
		}
		$this->stmt->closeCursor();
		return $this->response;
	}
	public function rePrintTestimonial($data){
		$cert_no = $this->config->Clean($data['cert_number']);
		$auth_code = $this->config->Clean($data['auth_code']);
		//check for empty values
		if($this->config->isEmptyStr($cert_no)){
			$this->response = $this->alert->alert_toastr("error", "Testimonial Number is Required", __OSO_APP_NAME__ ." Says");
		}else if(strlen($cert_no) <> 10){
			$this->response = $this->alert->alert_toastr("error", "Invalid Testimonial Number", __OSO_APP_NAME__ ." Says");
		}
		else if($this->config->isEmptyStr($auth_code)){
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ ." Says");
		}else if($auth_code !== __OSO__CONTROL__KEY__){
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
			//check if the student with the entered reg no exist
		}else if(!$this->config->check_single_data("visap_student_testimonial_tbl","cert_no", $cert_no)){
			$this->response = $this->alert->alert_toastr("error", "Do Not Play Smart: This Testimonial Number is Invalid", __OSO_APP_NAME__ ." Says");
		}else{
	$testimonial_data = $this->config->get_single_data("visap_student_testimonial_tbl","cert_no",$cert_no);
	if($testimonial_data){
		$testimonial_link ="./student-testimonial?data=".$this->config->convert_string("code",$testimonial_data->stdRegNo);
		$this->response = $this->alert->alert_toastr("success", "Re-printing, Please wait...", __OSO_APP_NAME__ . " Says") . '<script>setTimeout(()=>{
			window.open("' . $testimonial_link . '","_blank", "top=10, left=10, width=850, height=950");
		},3000);</script>';
	}else{
		$this->response = $this->alert->alert_toastr("error", "No Record Found, Try again!", __OSO_APP_NAME__ ." Says");
	}
	
		}
		return $this->response;
	}

	public function offerAdmissionToStudent(array $data)
	{
		$stdId = $this->config->Clean($data['student_id']);
		$admitted_class = $this->config->Clean($data['admitted_class']);
		$admitted_date = $this->config->Clean($data['admittedDate']);
		$auth_code = $this->config->Clean($data['auth_code']);
		if($this->config->isEmptyStr($stdId) || $this->config->isEmptyStr($admitted_class) || $this->config->isEmptyStr($admitted_date) ){
		$this->response = $this->alert->alert_toastr("error", "Invalid Submission", __OSO_APP_NAME__ ." Says");
		}else if($this->config->isEmptyStr($auth_code)){
		$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ ." Says");
		}else if($auth_code !== __OSO__CONTROL__KEY__){
		$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		}else{
			$admitted_date = date("Y-m-d", strtotime($admitted_date));
			try{
				$active = "Active";
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `{$this->table_name}` SET `studentClass`=?, `admitted_class`=?, `stdAdmStatus`=?, `stdApplyDate`=?
      WHERE stdId=?");
      if ($this->stmt->execute([$admitted_class, $admitted_class, $active, $admitted_date,$stdId])) {
      $this->dbh->commit();
	  $this->response = $this->alert->alert_toastr("success", "Admission Offered successfully!", __OSO_APP_NAME__ . " Says").$this->config->redirectWithTime("student_adm_portal",4000);
	  }
			}catch(PDOException $e){
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred! Try again", __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;

	}
	  /**
   * Undocumented function
   *
   * @param string $passport
   * @param string $gender
   * @return string $imagePath
   */
  public function displayStudentPassport($passport,$gender) : string 
  {
    if($passport == NULL || $passport == ""){
      if($gender == "Male"){
          $imagePath = APP_ROOT."schoolImages/students/male.png";
        }else{
          $imagePath = APP_ROOT."schoolImages/students/female.png";
        }
  }else{
    $imagePath = APP_ROOT."schoolImages/students/".$passport;
  }

  return $imagePath;
  }


  public function studentExamSubjectIsUploaded($subjectClass) 
  {
	$sql = "SELECT * FROM `visap_registered_subject_tbl` WHERE `subject_class`= ? ORDER BY subject_name ASC LIMIT 15";
	$this->stmt = $this->dbh->prepare($sql);
	$this->stmt->execute([$subjectClass]);
	if($this->stmt->rowCount() > 0){
	return $this->stmt->fetchAll();
	}else{
	return '';
	}
  }
  public function studentResultIsUploaded($regNo,$student_class,$term,$session) 
  {
	switch ($term) {
		case '3rd Term':
			$resultTable = 'visap_termly_result_tbl';
			break;
		case '2nd Term':
			$resultTable = 'visap_2nd_term_result_tbl';
			break;

		default:
			$resultTable = 'visap_1st_term_result_tbl';
			break;
	}
	$sql = "SELECT * FROM `{$resultTable}` WHERE `stdRegCode` =? AND `studentGrade`= ? AND `term`=? AND `aca_session`=? ORDER BY `subjectName` ASC LIMIT 15";
	$this->stmt = $this->dbh->prepare($sql);
	$this->stmt->execute([$regNo,$student_class,$term,$session]);
	if($this->stmt->rowCount() > 0){
	return $this->stmt->fetchAll();
	}else{
	return '';
	}
  }


      }