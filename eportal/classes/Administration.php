<?php
require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";

class Administration
{

	//administrator properties
	private $dbh;
	protected $stmt;
	protected $query;
	protected $response;
	protected $config;
	protected $alert;
	public function __construct()
	{
		$this->dbh = osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	//get all months in dropdowns
	public function get_months_list()
	{
		$showMonths = '<option value="" selected>Choose...</option>';
		$months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
		foreach ($months as  $month) {
			// code...
			$showMonths .= '<option value="' . ucfirst($month) . '">' . ucfirst($month) . '</option>';
		}
		return $showMonths;
	}
	//classroom management methods start

	//get_classroom_InDropDown_list
	public function get_classroom_InDropDown_list()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeId ASC LIMIT 30");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->gradeDesc . '">' . $row->gradeDesc . '</option>';
			}
		}
		return $this->response;
	}

	public function get_classroom_InDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeId ASC LIMIT 30");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->gradeId . '">' . $row->gradeDesc . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function create_classroom($data)
	{
		//visap_class_grade_tbl
		$grade_name = $this->config->Clean($data['grade_name']);
		$teacher = $this->config->Clean($data['teacher']);
		$status = $this->config->Clean($data['status']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//check for empty
		if ($this->config->isEmptyStr($grade_name) || $this->config->isEmptyStr($status) || $this->config->isEmptyStr($teacher)) {
			$this->response = $this->alert->alert_toastr("error", "All fields are required!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate Class name
			$this->stmt = $this->dbh->prepare("SELECT gradeId FROM `visap_class_grade_tbl` WHERE gradeDesc=? LIMIT 1");
			$this->stmt->execute([$grade_name]);
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error", "$grade_name  already Exists!", __OSO_APP_NAME__ . " Says");
			} elseif ($this->config->check_single_data(`visap_class_grade_tbl`, "grade_teacher", $teacher)) {
				$this->response = $this->alert->alert_toastr("error", "This Teacher is already Assinged to Class!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					//create the new Classroom
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_class_grade_tbl` (gradeDesc,grade_teacher,grade_status,created_at) VALUES (?,?,?,?);");
					if ($this->stmt->execute([$grade_name, $teacher, $status, $date])) {
						// let update the staff class to the new created classroom
						$this->stmt = $this->dbh->prepare("UPDATE `visap_staff_tbl` SET staffGrade=? WHERE staffId=? LIMIT 1");
						if ($this->stmt->execute(array($grade_name, $teacher))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", $grade_name . " Classroom Added Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error", "Failed to Add Classroom $grade_name: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	public function updateClassroomDetails($data)
	{
		$classroom_id = $this->config->Clean($data['classroom_id']);
		$grade_name = $this->config->Clean($data['classroom_name']);
		$teacher = $this->config->Clean($data['teacher']);
		$status = $this->config->Clean($data['status']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		if ($this->config->isEmptyStr($classroom_id) || $this->config->isEmptyStr($grade_name) || $this->config->isEmptyStr($status) || $this->config->isEmptyStr($teacher)) {
			$this->response = $this->alert->alert_toastr("error", "All fields are required!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is required!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->check_single_data("visap_class_grade_tbl", "grade_teacher", $teacher)) {
			$this->response = $this->alert->alert_toastr("error", "This Teacher is already Assinged to Class!", __OSO_APP_NAME__ . " Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				//set the current staff grade to null
				//Update the selected Subject
				if (isset($teacher) && $teacher != "") {
					$classroomDetail = $this->get_classroom_ById($classroom_id);
					$old_teacher_id = $classroomDetail->grade_teacher;
					$this->stmt = $this->dbh->prepare("UPDATE `visap_staff_tbl` SET staffGrade=NULL WHERE staffId=? LIMIT 1");
					if ($this->stmt->execute([$old_teacher_id])) {
						$this->stmt = $this->dbh->prepare("UPDATE `visap_class_grade_tbl` SET grade_teacher=NULL WHERE gradeId=? LIMIT 1");
						if ($this->stmt->execute([$classroom_id])) {
						}
					}
				}
				$this->stmt = $this->dbh->prepare("UPDATE `visap_class_grade_tbl` SET gradeDesc=?,grade_teacher=?,grade_status=? WHERE gradeId=? LIMIT 1");
				if ($this->stmt->execute([$grade_name, $teacher, $status, $classroom_id])) {
					$this->stmt = $this->dbh->prepare("UPDATE `visap_staff_tbl` SET staffGrade=? WHERE staffId=? LIMIT 1");
					if ($this->stmt->execute(array($grade_name, $teacher))) {
						$this->dbh->commit();
			
						$this->response  = $this->alert->alert_toastr("success", $grade_name . " Classroom Updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed to Update $grade_name Classroom: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	public function get_all_classrooms()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` ORDER BY gradeId ASC LIMIT 30");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}


	public function get_classroom_ById($grade)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_grade_tbl` WHERE gradeId=? LIMIT 1");
		$this->stmt->execute([$grade]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}


	public function delete_classroom_byId($grade)
	{
		if (!$this->config->isEmptyStr($grade)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_class_grade_tbl` WHERE gradeId=? LIMIT 1");
				if ($this->stmt->execute([$grade])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Failed to Delete Classroom!, Error Occurred", __OSO_APP_NAME__ . " Says");
			}
			// code...
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	//count all active classrooms
	public function count_all_classrooms_status(string $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`gradeId`) as cnt FROM `visap_class_grade_tbl` WHERE grade_status=?");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = '0';
		}
		return $this->response;
	}

	public function count_all_classrooms()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`gradeId`) as cnt FROM `visap_class_grade_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = '0';
		}
		return $this->response;
	}
	//classroom management methods end

	//Subject management methods start
	public function create_subject($data)
	{
		$subject = $this->config->Clean($data['subjectName']);
		$code = $this->config->Clean($data['subjectCode']);
		$status = $this->config->Clean($data['subjectStatus']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//check for empty
		if ($this->config->isEmptyStr($subject) || $this->config->isEmptyStr($code) || $this->config->isEmptyStr($status)) {
			$this->response = $this->alert->alert_toastr("error","Invalid submission!", __OSO_APP_NAME__." Says");
		} else if ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Authentication Code is required!", __OSO_APP_NAME__." Says");
		} else if($auth_pass !== __OSO__CONTROL__KEY__){
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!", __OSO_APP_NAME__." Says");
		}else {
			//check for duplicate subject name
			$this->stmt = $this->dbh->prepare("SELECT * FROM `school_subjects` WHERE subject_desc=?");
			$this->stmt->execute([$subject]);
			if ($this->stmt->rowCount() > 0) {
				$this->response = $this->alert->alert_toastr("error","$subject already Exists!",__OSO_APP_NAME__." Says");
			} else {
				try {
					//$teacher = isset($data['subjectTeacher']) ? implode(",", $data['subjectTeacher']) : "";
					$this->dbh->beginTransaction();
					//create the new Subject
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `school_subjects` (subject_desc,`status`,subject_code,created_at) VALUES (?,?,?,?);");
					if ($this->stmt->execute([$subject, $status, $code, $date])) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", $subject . " Saved Successfully", __OSO_APP_NAME__." Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},1000);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error","Failed to Add Subject: Error Occurred ", __OSO_APP_NAME__." Says");
				}
			}
		}
		return $this->response;
	}

	public function update_subject($data)
	{
		$subject_id = $this->config->Clean($data['subject_id']);
		//$subject_teacher = implode(",",$data['subject_teacher']);
		$subject_name = $this->config->Clean($data['subject_name']);
		$code = $this->config->Clean($data['code']);
		$status = $this->config->Clean($data['subject_status']);
		if ($this->config->isEmptyStr($subject_id) || $this->config->isEmptyStr($subject_name) || $this->config->isEmptyStr($code) || $this->config->isEmptyStr($status)) {
			$this->response = $this->alert->alert_msg("Subject Name, Subject Code and Subject Status is required for Update!", "danger");
			// code...
		} else {
			try {
				$subject_teacher = isset($data['subject_teacher']) ? implode(",", $data['subject_teacher']) : NULL;
				$this->dbh->beginTransaction();
				//Update the selected Subject
				$this->stmt = $this->dbh->prepare("UPDATE `school_subjects` SET subject_desc=?,status=?,subject_code=?,subject_teacher=? WHERE subject_id=? LIMIT 1");
				if ($this->stmt->execute([$subject_name, $status, $code, $subject_teacher, $subject_id])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg($subject_name . " Updated Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},2500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Update Subject: Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	public function get_all_subjects()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_subjects` ORDER BY subject_desc ASC LIMIT 50");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_subjects_by_status(string $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_subjects` WHERE status=? ORDER BY subject_desc ASC LIMIT 50");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	public function get_subject_ById($subjectId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_subjects` WHERE subject_id=? LIMIT 1");
		$this->stmt->execute([$subjectId]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function delete_subject_ById($subjectId)
	{
		if (!$this->config->isEmptyStr($subjectId)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `school_subjects` WHERE subject_id=? LIMIT 1");
				if ($this->stmt->execute([$subjectId])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg("Deleted Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},1500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Delete Subject: Error Occurred: " . $e->getMessage(), "danger");
			}
			// code...
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function count_all_subjects()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`subject_id`) as cnt FROM `school_subjects`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;

		}
	}

	public function count_all_subjects_status(string $status)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`subject_id`) as cnt FROM `school_subjects` WHERE status=?");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;

		}
	}

	//count_all_registered_subjects
	public function count_all_registered_subjects()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`id`) as cnt FROM `visap_registered_subject_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;

		}
	}

	//count_all_registered_subjects_class()
	public function count_all_registered_subjects_class($sdtGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`id`) as cnt FROM `visap_registered_subject_tbl` WHERE subject_class=?");
		$this->stmt->execute([$sdtGrade]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;

		}
	}

	public function get_all_subjects_InDropDown_list()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_subjects` WHERE status='active' ORDER BY subject_desc ASC LIMIT 50");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->subject_desc . '">' . $row->subject_desc . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//showing the list of all the registered subjects for a class
	public function getAllRegisteredSubjectInDropDown_list(string $grade)
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` WHERE `subject_class`=? ORDER BY subject_name ASC LIMIT 50");
		$this->stmt->execute([$grade]);
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->subject_name . '">' . $row->subject_name . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	//Subject management methods end
	//Fee management methods start
	public function create_fee_component($data)
	{
		$component = $this->config->Clean($data['component_desc']);
		$status = $this->config->Clean($data['status']);
		$bypass = $this->config->Clean($data['bypass']);
		//check for the Auth
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			// show error...
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($component) || $this->config->isEmptyStr($status)) {
			$this->response = $this->alert->alert_msg("Invalid Submission! Please check your inputs and try again!", "danger");
		} else {
			//check for Duplicate Component
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_fee_component_tbl` WHERE feeType=? LIMIT 1");
			$this->stmt->execute(array($component));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_msg("$component already Exists! Please check and try again!", "danger");
			} else {
				//create a fresh Component
				try {
					$this->dbh->beginTransaction();
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_fee_component_tbl` (feeType,fee_status,date) VALUES (?,?,?);");
					if ($this->stmt->execute(array($component, $status, $date))) {
						// code...
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg("$component Fee Added Successfully!", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("Failed to Save $component Fee: Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}

	public function update_fee_component($data)
	{
		$compoId = $this->config->Clean($data['compoId']);
		$component_desc = $this->config->Clean($data['component_desc']);
		$status = $this->config->Clean($data['status']);
		if ($this->config->isEmptyStr($compoId) || $this->config->isEmptyStr($component_desc) || $this->config->isEmptyStr($status)) {
			$this->response = $this->alert->alert_msg("Component Name and Status is required for Update!", "danger");
			// code...
		} else {
			try {
				$this->dbh->beginTransaction();
				//Update the selected Subject
				$this->stmt = $this->dbh->prepare("UPDATE `visap_fee_component_tbl` SET feeType=?,fee_status=? WHERE compId=? LIMIT 1");
				if ($this->stmt->execute([$component_desc, $status, $compoId])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg($component_desc . " Updated Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Update Component: Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	public function fee_component_inDropDown()
	{
		$this->response = "";
		$status = "Active";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_fee_component_tbl` WHERE fee_status=? ORDER BY feeType ASC LIMIT 30");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->feeType . '">' . $row->feeType . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_fee_components()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_fee_component_tbl` ORDER BY feeType ASC LIMIT 50");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_fee_component_ById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_fee_component_tbl` WHERE compId=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() == 1) {
			// code...
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function delete_fee_component_ById($id)
	{
		if (!$this->config->isEmptyStr($id)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_fee_component_tbl` WHERE compId=? LIMIT 1");
				if ($this->stmt->execute([$id])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg("Deleted Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Delete Component: Error Occurred: " . $e->getMessage(), "danger");
			}
			// code...
		} else {
			$this->response = false;
		}
		return $this->response;
	}
	//Fee management methods end
	//FEE ALLOCATION METHODS
	public function set_allocation_fee($data)
	{
		$fee_type_id = $this->config->Clean($data['fee_type_id']);
		$grade_desc = $this->config->Clean($data['grade_desc']);
		$amount = $this->config->Clean(intval($data['amount']));
		$date = $this->config->Clean($data['date']);
		$bypass = $this->config->Clean($data['bypass']);
		//check for the Auth
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			// show error...
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($fee_type_id) || $this->config->isEmptyStr($grade_desc) || $this->config->isEmptyStr($amount)) {
			$this->response = $this->alert->alert_msg("Invalid Submission! Please check your inputs and try again!", "danger");
		} else {
			//check for Duplicate Entry
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_fee_allocation_tbl` WHERE component_id=? AND gradeDesc=? LIMIT 1");
			$this->stmt->execute(array($fee_type_id, $grade_desc));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_msg("$grade_desc Fee is already Allocated! Please check and try again!", "danger");
			} else {
				//create a fresh Allocation
				try {
					$this->dbh->beginTransaction();
					//$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_school_fee_allocation_tbl` (component_id,gradeDesc,amount,created_on) VALUES (?,?,?,?);");
					if ($this->stmt->execute(array($fee_type_id, $grade_desc, $amount, $date))) {
						// code...
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg("&#8358; $amount Allocated for $grade_desc Successfully!", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("Failed to Allocate Fee: Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}

	public function update_allocation_fee($data)
	{
		$faId = $this->config->Clean($data['faId']);
		$class_alloc = $this->config->Clean($data['class_alloc']);
		$amount = $this->config->Clean($data['amount']);
		$cost_amount = $this->config->Clean($data['cost_amount']);
		if ($this->config->isEmptyStr($faId) || $this->config->isEmptyStr($class_alloc) || $this->config->isEmptyStr($cost_amount)) {
			$this->response = $this->alert->alert_msg("Please enter the updated amount!", "danger");
			// code...
		} else {
			try {
				$this->dbh->beginTransaction();
				//Update the selected Subject
				$this->stmt = $this->dbh->prepare("UPDATE `visap_school_fee_allocation_tbl` SET amount=? WHERE gradeDesc=? AND faId=? LIMIT 1");
				if ($this->stmt->execute([$cost_amount, $class_alloc, $faId])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg(" Fee Updated Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Update Fee: Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	public function get_feeTypeByType($type)
	{
		if (!$this->config->isEmptyStr($type)) {
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_fee_component_tbl` WHERE feeType=? LIMIT 1");
			$this->stmt->execute([$type]);
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->stmt->fetch();
				return $this->response;
	
			}
		}
	}

	public function get_fee_allocated_ById($allocateId)
	{
		$this->stmt = $this->dbh->prepare("SELECT al.*,c.* FROM `visap_school_fee_allocation_tbl` as al, `visap_fee_component_tbl` as c WHERE c.feeType=al.component_id AND al.faId=? LIMIT 1");
		$this->stmt->execute([$allocateId]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_allocated_fees()
	{
		$this->stmt = $this->dbh->prepare("SELECT al.*,c.* FROM `visap_school_fee_allocation_tbl` as al, `visap_fee_component_tbl` as c WHERE c.feeType=al.component_id ORDER BY al.gradeDesc ASC LIMIT 50");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//public function delete_virtual_lecture_ById($id){}


	//FEE ALLOCATION METHODS


	//FEE PAYMENTS METHODS
	public function filter_students_by_payments_type_status($grade, $type, $status, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE stdGrade=? AND component_fee=? AND payment_status=? AND term=? AND sch_session=? ORDER BY DATE(`payment_date`)");
		$this->stmt->execute(array($grade, $type, $status, $term, $session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function submit_student_update_payment($data)
	{
		$paymentId = $this->config->Clean($data['paymentId']);
		$stdId = $this->config->Clean($data['student_id']);
		$std_class = $this->config->Clean($data['std_class']);
		$std_admno = $this->config->Clean($data['std_admno']);
		$fee_type = $this->config->Clean($data['fee_type']);
		$fee_amount = $this->config->Clean($data['termly_amount']);
		$amount_paid = $this->config->Clean($data['amount_paid']);
		$std_due = $this->config->Clean($data['std_due']);
		$payMethod = $this->config->Clean($data['paymentMethod']);
		$cterm = $this->config->Clean($data['cterm']);
		$csession = $this->config->Clean($data['csession']);
		$paidTo = $this->config->Clean($data['paidTo']);
		$bypass = $this->config->Clean($data['bypass_auth']);
		$payment_date = date("Y-m-d");
		$date = date("Y-m-d");
		//lets check for amount paid if not null
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($amount_paid) || $this->config->isEmptyStr($payMethod)) {
			$this->response = $this->alert->alert_msg("Please enter the payment amount and payment mode to proceed!", "warning");
		} else {
			//check if bank mode is selected
			if ($payMethod === "Bank") {
				$bank_name = $this->config->Clean($data['bankName']);
				$teller = $this->config->Clean($data['tellerNo']);
			} else {
				$bank_name = NULL;
				$teller = NULL;
			}
			$fee_details_data = self::get_payment_info_by_paymentId($paymentId);
			$payid = $fee_details_data->paymentId;
			$pay_class = $fee_details_data->stdGrade;
			$feeType = $fee_details_data->component_fee;
			$total_fee = $fee_details_data->total_fee;
			$my_due = $fee_details_data->fee_due;
			$myPaid = $fee_details_data->fee_paid;
			//let check if this is the first payment of the selected student
			//let declare update data
			$current_due = intval($my_due - $amount_paid);
			$current_paid = intval($myPaid + $amount_paid);
			//check if the money entered is greater than the normal charge
			if ($amount_paid > $my_due) {
				$this->response = $this->alert->alert_msg("This Student Only Has a Balance of <b class='text-primary'> &#8358; " . number_format($my_due, 2) . "</b> for " . $feeType . " in this " . $cterm . ". <b class='text-info'>!", "warning");
			} else {
				try {
					$this->dbh->beginTransaction();
					//let update now
					if (intval($current_paid == $total_fee)) {
						$status = 2;
					} else {
						$status = 1;
					}
					$this->stmt = $this->dbh->prepare("UPDATE `visap_student_payment_tbl` SET fee_paid=?,fee_due=?,payment_status=? WHERE std_id=? AND stdAdmNo=? AND stdGrade=? AND term=? AND sch_session=? AND paymentId=? LIMIT 1");
					if ($this->stmt->execute(array($current_paid, $current_due, $status, $stdId, $std_admno, $std_class, $cterm, $csession, $payid))) {
						// let create a payment history
						$this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_payment_history_tbl` (std_id,stdAdmNo,stdGrade,component_fee,total_fee,fee_paid,fee_due,payment_status, payment_date,term,sch_session,payment_method,teller,bank_name,collectedBy,today_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
						if ($this->stmt->execute(array($stdId, $std_admno, $std_class, $feeType, $total_fee, $amount_paid, $current_due, $status, $payment_date, $cterm, $csession, $payMethod, $teller, $bank_name, $paidTo, $date))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_msg("Payment Submitted and Updated Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("Payment Failed: Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}

	public function submit_new_student_payment_cash($data)
	{
		$stdId = $this->config->Clean($data['student_id']);
		$std_class = $this->config->Clean($data['std_class']);
		$std_admno = $this->config->Clean($data['std_admno']);
		$fee_type = $this->config->Clean($data['fee_type']);
		$fee_amount = $this->config->Clean($data['termly_amount']);
		$amount_paid = $this->config->Clean($data['amount_paid']);
		$std_due = $this->config->Clean($data['std_due']);
		$payMethod = $this->config->Clean($data['paymentMethod']);
		$cterm = $this->config->Clean($data['cterm']);
		$csession = $this->config->Clean($data['csession']);
		$paidTo = $this->config->Clean($data['paidTo']);
		$bypass = $this->config->Clean($data['bypass_auth']);
		$payment_date = date("Y-m-d");
		$date = date("Y-m-d");
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($amount_paid) || $this->config->isEmptyStr($payMethod)) {
			$this->response = $this->alert->alert_msg("Please enter the payment amount and payment mode to proceed!", "warning");
		} else {
			if ($payMethod === "Bank") {
				$bank_name = $this->config->Clean($data['bankName']);
				$teller = $this->config->Clean($data['tellerNo']);
			} else {
				$bank_name = NULL;
				$teller = NULL;
			}
			try {
				$this->dbh->beginTransaction();
				$outstanding = intval($fee_amount - $amount_paid);
				if (($amount_paid == $fee_amount)) {
					$status = 2;
				} else {
					$status = 1;
				}
				$this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_payment_tbl` (std_id,stdAdmNo,stdGrade,component_fee,total_fee, fee_paid,fee_due,payment_status, payment_date,term,sch_session,payment_method,collectedBy,today_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
				if ($this->stmt->execute(array($stdId, $std_admno, $std_class, $fee_type, $fee_amount, $amount_paid, $outstanding, $status, $payment_date, $cterm, $csession, $payMethod, $paidTo, $date))) {
					// create history
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_student_payment_history_tbl` (std_id,stdAdmNo,stdGrade,component_fee,total_fee,fee_paid,fee_due,payment_status,payment_date,term,sch_session,payment_method,teller,bank_name,collectedBy,today_date) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($stdId, $std_admno, $std_class, $fee_type, $fee_amount, $amount_paid, $outstanding, $status, $payment_date, $cterm, $csession, $payMethod, $teller, $bank_name, $paidTo, $date))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg("Payment Submitted Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					} else {
						$this->response = $this->alert->alert_msg("Server Error Occured Please try again!", "warning");
					}
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Payment Failed: Error Occurred: " . $e->getMessage(), "danger");
			}
		}

		return $this->response;
		unset($this->response);
	}

	public function get_student_payment_by_regNo($stuId, $stdRegNo, $std_class)
	{
		$this->stmt = $this->dbh->prepare("SELECT st.*,a.* FROM `visap_student_tbl` as st,`visap_school_fee_allocation_tbl` as a WHERE st.stdId=? AND st.stdRegNo=? AND st.studentClass=? AND a.gradeDesc=?");
		$this->stmt->execute(array($stuId, $stdRegNo, $std_class, $std_class));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_alloction_by_gradeComponentId($grade)
	{
		$status = "Active";
		$this->stmt = $this->dbh->prepare("SELECT s.*,c.* FROM `visap_school_fee_allocation_tbl` as s,`visap_fee_component_tbl` as c WHERE s.component_id=c.feeType AND s.gradeDesc=? AND c.fee_status=? LIMIT 1");
		$this->stmt->execute(array($grade, $status));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//get student receipt list by id
	public function get_receiptById($paymentId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_history_tbl` WHERE phId=? LIMIT 1");
		$this->stmt->execute(array($paymentId));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//get student receipt list by id
	public function get_paid_to_dateById($stuId, $std_class, $fee_type, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl`
		 WHERE std_id=? AND stdGrade=? AND component_fee=? AND term=? AND sch_session=? LIMIT 1");
		$this->stmt->execute(array($stuId, $std_class, $fee_type, $term, $session));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//get payment info by paymentId
	public function get_payment_info_by_paymentId($paymentId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE paymentId=? LIMIT 1");
		$this->stmt->execute(array($paymentId));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//total sum of all the allocated fee for a class
	public function get_sum_of_allocated_fee_by_className($className)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`amount`) as total FROM `visap_school_fee_allocation_tbl` WHERE gradeDesc=?");
		$this->stmt->execute(array($className));
		if ($this->stmt->rowCount() > 0) {
			$row_data = $this->stmt->fetch();
			$this->response = $row_data->total;
			return $this->response;

		}
	}

	//total sum of all the allocated fee for a class
	public function get_sum_of_student_total_due($column, $std_id, $stdRegNo, $stdgrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`$column`) as total FROM `visap_student_payment_tbl` WHERE std_id=? AND stdAdmNo=? AND stdGrade=?");
		$this->stmt->execute(array($std_id, $stdRegNo, $stdgrade));
		if ($this->stmt->rowCount() > 0) {
			$row_data = $this->stmt->fetch();
			$this->response = $row_data->total;
			return $this->response;

		}
	}

	public function get_student_payment_records($std_id, $stdRegNo, $stdgrade, $fee_type)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE std_id=? AND stdAdmNo=? AND stdGrade=? AND component_fee=? LIMIT 1");
		$this->stmt->execute(array($std_id, $stdRegNo, $stdgrade, $fee_type));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function get_student_due_records_by_payment_id($id, $std_id, $stdRegNo, $stdgrade, $fee_type, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_tbl` WHERE paymentId=? AND std_id=? AND stdAdmNo=? AND stdGrade=? AND component_fee=? AND term=? AND sch_session=? LIMIT 1");
		$this->stmt->execute(array($id, $std_id, $stdRegNo, $stdgrade, $fee_type, $term, $session));
		if ($this->stmt->rowCount() == 1) {
			// output json format...
			$this->response = $this->stmt->fetch();
			return json_encode($this->response, JSON_PRETTY_PRINT);

		}
	}

	public function get_all_money_paid_today()
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`fee_paid`) as paid FROM `visap_student_payment_tbl` WHERE DATE(`payment_date`) = DATE(CURRENT_DATE())");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->paid;
			return $this->response;

		}
	}


	public function get_all_money_paid_by_term($session, $term)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`fee_paid`) as paid FROM `visap_student_payment_tbl` WHERE term = ? AND sch_session=?");
		$this->stmt->execute(array($term, $session));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->paid;
			return $this->response;

		}
	}

	public function get_all_income_this_session($session)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`fee_paid`) as paid FROM `visap_student_payment_tbl` WHERE sch_session=?");
		$this->stmt->execute(array($session));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->paid;
			return $this->response;

		}
	}

	public function get_all_money_outstanding_by_term($session, $term)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`fee_due`) as paid FROM `visap_student_payment_tbl` WHERE term = ? AND sch_session=?");
		$this->stmt->execute(array($term, $session));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->paid;
			return $this->response;

		}
	}



	//FEE PAYMENTS METHODS

	//Virtual Classrrom management methods start
	public function upload_virtual_lecture($data, $file)
	{
		//File Info Starts
		$lecture_file = $file['myFile']['name'];
		$size = $file['myFile']['size'] / 1024 / 1024;
		$tmp = $file['myFile']['tmp_name'];
		$fileError  = $file['myFile']['error'];
		$file_ext = explode(".", $lecture_file);
		$real_ext = strtolower(end($file_ext));
		$lesson_class = $this->config->Clean($data['std_grade']);
		$subject = $this->config->Clean($data['subject']);
		$posted_by = $this->config->Clean($data['posted_by']);
		$expiry_date = $this->config->Clean(date("Y-m-d", strtotime($data['expiry_date'])));
		$topic = $this->config->Clean($data['topic']);
		$message = $this->config->Clean($data['message']);
		$bypass = $this->config->Clean($data['bypass']);
		$allowed = array("mp3", "pdf");
		//check if Auth
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Failed, Please Check your Connection and Try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($lesson_class) || $this->config->isEmptyStr($subject) || $this->config->isEmptyStr($posted_by) || $this->config->isEmptyStr($expiry_date) || $this->config->isEmptyStr($topic) || $this->config->isEmptyStr($message) || $this->config->isEmptyStr($lecture_file)) {
			$this->response = $this->alert->alert_toastr("error", "Please check all your inputs and try again!", __OSO_APP_NAME__ . " Says");
		} elseif (!in_array($real_ext, $allowed)) {
			$this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Only MP4 & MP3 is allowed!", __OSO_APP_NAME__ . " Says");
		} elseif (($size > 10)) {
			$this->response = $this->alert->alert_toastr("error", "Your file Size cannot be greater than 10MB,Please check and try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($fileError != 0) {
			$this->response = $this->alert->alert_toastr("error", "There was an error uploading the selected file, Please try again!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate entry
			$this->stmt = $this->dbh->prepare("SELECT lectureId FROM `visap_virtual_lesson_tbl` WHERE lesson_topic=? AND lesson_grade=? AND subject=? AND teacher=? LIMIT 1");
			$this->stmt->execute(array($topic, $lesson_class, $subject, $posted_by));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error", "This Lesson file already uploaded!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					$uploaded_date = date("Y-m-d");
					$fileNewName = date("Ymd") . uniqid() . mt_rand(100, 10000) . substr(time(), 0, 6) . "." . $real_ext;
					$file_destination = "../lecture_file/" . $fileNewName;
					switch ($real_ext) {
							// case 'mp4':
							// 	$file_type ="video/mp4";
							// 	break;

						case 'pdf':
							$file_type = "application/pdf";
							break;

						default:
							$file_type = "audio/mp3";
							break;
					}
					//upload the file
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_virtual_lesson_tbl` (lesson_file,lesson_topic,lesson_grade,subject,teacher,file_type,message,date_to,uploaded_date) VALUES (?,?,?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($fileNewName, $topic, $lesson_class, $subject, $posted_by, $file_type, $message, $expiry_date, $uploaded_date))) {
						if ($this->config->move_file_to_folder($tmp, $file_destination)) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Submitted Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
						} else {
							$this->response = $this->alert->alert_toastr("error", "Your file could not be moved to folder!", __OSO_APP_NAME__ . " Says");
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					if (file_exists($file_destination)) {
						unlink($file_destination);
					}
					$this->response  = $this->alert->alert_toastr("error", "Failed to upload lesson file: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	// count total watch or listened
	public function update_Virtual_counter_by_id($fid)
	{
		$this->stmt = $this->dbh->prepare("UPDATE `visap_virtual_lesson_tbl` SET counter=counter+1 WHERE lectureId=?");
		$this->stmt->execute([$fid]);
	}
	public function get_all_virtual_lectures()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_virtual_lesson_tbl` ORDER BY lesson_grade,uploaded_date DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}
	public function get_virtual_lecture_ById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_virtual_lesson_tbl` WHERE lectureId=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}
	public function delete_virtual_lecture_ById($id)
	{
		if (!$this->config->isEmptyStr($id)) {
			//get file by id
			$data_file = self::get_virtual_lecture_ById($id);
			$filePath = "../lecture_file/" . $data_file->lesson_file;
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_virtual_lesson_tbl` WHERE lectureId=? LIMIT 1");
				if ($this->stmt->execute([$id])) {
					if (file_exists($filePath)) {
						unlink($filePath);
					}
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
			// code...
		} else {
			$this->response = false;
		}
		return $this->response;
	}


	public function auto_remove_virtual_lecture()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_virtual_lesson_tbl` WHERE date_to < DATE(CURRENT_DATE())");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			//grab the file id
			$results = $this->stmt->fetchAll();
			foreach ($results as $result) {
				$fileId = $result->lectureId;
				$file_Uploaded = $result->lesson_file;
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_virtual_lesson_tbl` WHERE lectureId =? AND date_to < DATE(CURRENT_DATE())");
				if ($this->stmt->execute([$fileId])) {
					//remove the file from folder
					$filePath = "../lecture_file/" . $file_Uploaded;
					if (file_exists($filePath)) {
						unlink($filePath);
					}
				}
			}

		}
	}

	public function count_all_available_lessons_by_type(string $type)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`lectureId`) as cnt FROM `visap_virtual_lesson_tbl` WHERE file_type=?");
		$this->stmt->execute([$type]);
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = '0';
		}
		return $this->response;
		unset($this->dbh);
	}

	public function count_all_available_lessons()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`lectureId`) as cnt FROM `visap_virtual_lesson_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = '0';
		}
		return $this->response;
		unset($this->dbh);
	}

	public function count_all_available_lessons_today()
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`lectureId`) as cnt FROM `visap_virtual_lesson_tbl` WHERE DATE(`uploaded_date`) = DATE(CURRENT_DATE());");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = '0';
		}
		return $this->response;
		unset($this->dbh);
	}
	//Virtual Classrrom management methods end

	// STAFF DUTY ASSIGN METHODS START
	public function assign_staff_weekly_duty($data)
	{
		$staffName = $this->config->Clean($data['staff']);
		$cterm = $this->config->Clean($data['cterm']);
		$csession = $this->config->Clean($data['csession']);
		$duty_duration = $this->config->Clean($data['duty_duration']);
		$duty_post = $this->config->Clean($data['duty_post']);
		$message = $this->config->Clean($data['message']);
		$bypass = $this->config->Clean($data['bypass']);
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($staffName) || $this->config->isEmptyStr($duty_duration) || $this->config->isEmptyStr($duty_post) || $this->config->isEmptyStr($message)) {
			$this->response = $this->alert->alert_msg("All form inputs fields are Required!", "danger");
		} else {
			//check for duplicate entry
			$this->stmt = $this->dbh->prepare("SELECT duty_id FROM `visap_staff_duty_tbl` WHERE staff_name=? AND duty=? AND duty_week=? AND term=? AND session=? LIMIT 1");
			$this->stmt->execute(array($staffName, $duty_post, $duty_duration, $cterm, $csession));
			//check row return
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_msg("$duty_post already assigned to $staffName on $duty_duration!", "danger");
			} else {
				//let create a fresh duty
				try {
					$this->dbh->beginTransaction();
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_duty_tbl` (staff_name,duty,duty_week,message,term,session,created_at) VALUES (?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($staffName, $duty_post, $duty_duration, $message, $cterm, $csession, $date))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg("Duty assigned Successfully ", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("Failed to assign Duty: Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}

	public function get_all_assigned_staff_weekly_duty()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_duty_tbl` ORDER BY staff_name ASC LIMIT 100");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function get_assign_staff_duty_by_id($id)
	{
	}

	public function delete_staff_duty_by_id($id)
	{
		if (!$this->config->isEmptyStr($id)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_staff_duty_tbl` WHERE duty_id=? LIMIT 1");
				if ($this->stmt->execute([$id])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_msg("Deleted Successfully", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Failed to Delete Duty: Error Occurred: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	//count all staff on assign to duties
	public function count_all_staff_asigned($term, $ses)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`duty_id`) as cnt FROM `visap_staff_duty_tbl` WHERE term=? AND session=?");
		$this->stmt->execute(array($term, $ses));
		if ($this->stmt->rowCount() > 0) {
			$get_counted = $this->stmt->fetch();
			$this->response = $get_counted->cnt;
			return $this->response;

		}
	}
	// STAFF DUTY ASSIGN METHODS END
	// STAFF LOAN METHOD START

	public function create_staff_loan($data)
	{
		$cterm = $this->config->Clean($data['cterm']);
		$csession = $this->config->Clean($data['csession']);
		$staff_name = $this->config->Clean($data['staff_name']);
		$capital = $this->config->Clean($data['amount']);
		$interest = $this->config->Clean($data['interest']);
		$years = $this->config->Clean($data['years']);
		$monthly_payment = $this->config->Clean($data['monthly_payment']);
		$total_payment = $this->config->Clean($data['total_payment']);
		$total_interest = $this->config->Clean($data['total_interest']);
		$bypass = $this->config->Clean($data['bypass']);
		$status = 1;
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($staff_name) || $this->config->isEmptyStr($capital) || $this->config->isEmptyStr($interest) || $this->config->isEmptyStr($years) || $this->config->isEmptyStr($monthly_payment) || $this->config->isEmptyStr($total_payment) || $this->config->isEmptyStr($total_interest)) {
			$this->response = $this->alert->alert_msg("All form inputs fields are Required!", "danger");
		} else {
			//check for duplicate entry
			$this->stmt = $this->dbh->prepare("SELECT loanId FROM `visap_loan_tbl` WHERE staffName=? AND loanStatus=? LIMIT 1");
			$this->stmt->execute(array($staff_name, $status));
			//check row return
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_msg("Outstanding loan is yet to be completed by $staff_name!!!", "danger");
			} else {
				//let create a fresh duty
				try {
					$this->dbh->beginTransaction();
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_loan_tbl` (staffName,capitalAmount,interesetRate,paybackYears,monthlyPayment,totalPayment,totalInterest,loanStatus,cterm,csession,submitted_date,returnedAmount,due) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?);");
					$r = 0;
					if ($this->stmt->execute(array($staff_name, $capital, $interest, $years, $monthly_payment, $total_payment, $total_interest, $status, $cterm, $csession, $date, $r, $total_payment))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg("Loan of &#8358; " . number_format($total_payment, 2) . " Recorded for " . $staff_name . "Successfully ", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("Failed to Submit Loan: Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}
	public function get_all_loans_list()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_loan_tbl` ORDER BY submitted_date DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function get_loanById_json($loanId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_loan_tbl` WHERE loanId=? LIMIT 1");
		$this->stmt->execute([$loanId]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return json_encode($this->response, JSON_PRETTY_PRINT);

		}
	}

	// STAFF LOAN METHOD end

	//Library Book management methods start
	public function create_book($data)
	{
	}
	public function update_book($data)
	{
	}
	public function get_all_books()
	{
	}
	public function get_book_ById($book_id)
	{
	}
	public function delete_book_ById($book_id)
	{
	}
	public function lend_out_book($data)
	{
	}
	public function return_book($data)
	{
	}
	//Library Book management methods end

	//EXPENSE METHOD
	public function get_all_today_expenses()
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`cost`) as total FROM `visap_school_expense_tbl` WHERE DATE(`created_on`) = DATE(CURRENT_DATE())");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->total;
			return $this->response;

		}
	}

	public function get_all_expenses_this_term($cterm, $csession)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`cost`) as total FROM `visap_school_expense_tbl` WHERE cterm=? AND csession=?");
		$this->stmt->execute(array($cterm, $csession));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->total;
			return $this->response;

		}
	}

	public function get_all_expenses_this_session($csession)
	{
		$this->stmt = $this->dbh->prepare("SELECT SUM(`cost`) as total FROM `visap_school_expense_tbl` WHERE csession=?");
		$this->stmt->execute(array($csession));
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->total;
			return $this->response;

		}
	}

	public function create_school_expense($data)
	{
		$cterm = $this->config->Clean($data['cterm']);
		$csession = $this->config->Clean($data['csession']);
		$expense = $this->config->Clean($data['expense_desc']);
		$cost_ = $this->config->Clean($data['expense_cost']);
		$date = $this->config->Clean($data['expense_date']);
		$receiver = $this->config->Clean($data['reciever']);
		$bypass = $this->config->Clean($data['bypass']);
		//check for auth
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Failed, Please Check your Connection and Try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($expense) || $this->config->isEmptyStr($cost_) || $this->config->isEmptyStr($receiver) || $this->config->isEmptyStr($date)) {

			$this->response = $this->alert->alert_toastr("error", "Please enter the required fields to proceed!", __OSO_APP_NAME__ . " Says");
		} else {
			//lets check if this details is already saved
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_expense_tbl` WHERE expense_desc=? AND cost=? AND receiver=? AND cterm=? AND csession=? AND created_on=? LIMIT 1 ");
			$this->stmt->execute(array($expense, $cost_, $receiver, $cterm, $csession, $date));
			if ($this->stmt->rowCount() == 1) {
				// show error...
				$this->response = $this->alert->alert_toastr("error", "$expense already saved today!", __OSO_APP_NAME__ . " Says");
			} else {
				//lets create a fresh expense
				try {
					$date = date("Y-m-d", strtotime($date));
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_school_expense_tbl` (expense_desc,cost,receiver,cterm,csession,created_on) VALUES (?,?,?,?,?,?);");
					if ($this->stmt->execute(array($expense, $cost_, $receiver, $cterm, $csession, $date))) {
						$this->dbh->commit();
			
						$this->response = $this->alert->alert_toastr("success", "Expense Submitted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error", "Failed to submit Expense: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	public function get_all_school_expenses()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_expense_tbl` ORDER BY created_on DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function update_school_expenses($data)
	{
	}

	public function delete_school_expenses($data)
	{
	}
	//EXPENSE METHOD
	//Call For Admission management methods start
	public function call_for_admission($data)
	{
	}
	public function open_close_portal_admission($data)
	{
	}
	public function get_portal_admission_info($data)
	{
	}
	//Call For Admission management methods end

	// School Session management methods start
	public function get_session_details()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` WHERE seId=1 LIMIT 1");
		$this->stmt->execute();
		$this->response = $this->stmt->fetch();
		return $this->response;
	}

	//get active session details
	public function get_active_session_details()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `current_session_tbl` WHERE id='1' LIMIT 1");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows;
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//set new academic session at visap_session_list
	public function set_new_academic_session($data)
	{
		$term = "1st Term";
		$id = 1;
		$new_ses = $this->config->Clean($data['new_session_dec']);
		$bypass = $this->config->Clean($data['bypass_auth']);
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			// show error...
			$this->response = $this->alert->alert_toastr("error","Authentication Failed, Please Check your Connection and Try again!", __OSO_APP_NAME__." Says");
		} elseif ($this->config->isEmptyStr($new_ses)) {
			// show error...
			$this->response = $this->alert->alert_toastr("error","Session is Required!", __OSO_APP_NAME__." Says");
		} else {
			//check for duplicate session in session list
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_session_list` WHERE session_desc=? LIMIT 1");
			$this->stmt->execute([$new_ses]);
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error","$new_ses Session already Exists!", __OSO_APP_NAME__." Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_session_list`(session_desc) VALUES (?);");
					if ($this->stmt->execute([$new_ses])) {
						//Udate current_session_tbl
						$this->stmt = $this->dbh->prepare("UPDATE `current_session_tbl` SET session_desc_name=?,term_desc=? WHERE id=? LIMIT 1");
						if ($this->stmt->execute([$new_ses, $term, $id])) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success","$new_ses is Now the Current Academic Session and $term is Active ", __OSO_APP_NAME__." Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},1000);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error"," Internal Error Occurred! Try again", __OSO_APP_NAME__." Says");
				}
			}
		}
		return $this->response;
	}

	public function update_academic_session($data)
	{
		$seId = 1;
		$term = $this->config->Clean($data['cterm']);
		$active_session = $this->config->Clean($data['csession']);
		$days = $this->config->Clean($data['days']);
		$noweeks = $this->config->Clean($data['noweeks']);
		$vdate = $this->config->Clean(date('Y-m-d', strtotime($data['vdate'])));
		$next_term_start = $this->config->Clean(date('Y-m-d', strtotime($data['next_term_start'])));
		$bypass = $this->config->Clean($data['bypass_auth3']);
if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
		$this->response = $this->alert->alert_toastr("error","Authentication Failed,  Try again!",  __OSO_APP_NAME__." Says");

		} elseif ($this->config->isEmptyStr($active_session) || $this->config->isEmptyStr($term) || $this->config->isEmptyStr($days) || $this->config->isEmptyStr($noweeks) || $this->config->isEmptyStr($next_term_start) || $this->config->isEmptyStr($vdate)) {
			$this->response = $this->alert->alert_toastr("error","Invalid Submission, Please check and try again!", __OSO_APP_NAME__." Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				//check for duplicate entry for history
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_history_tbl` WHERE active_session=? AND active_term=? LIMIT 1");
				$this->stmt->execute(array($active_session, $term));
				//check row returns
				if ($this->stmt->rowCount() > 0) {
					$row = $this->stmt->fetch();
					// Just Update the info...
					$this->stmt = $this->dbh->prepare("UPDATE `visap_school_session_history_tbl` SET active_session=?,active_term=?,Days_open=?,Weeks_open=?,term_ended=?,new_term_begins=? WHERE active_session=? AND active_term=? AND sehisId=? LIMIT 1");
					if ($this->stmt->execute(array($active_session, $term, $days, $noweeks, $vdate, $next_term_start, $active_session, $term, $row->sehisId))) {
						$this->stmt = $this->dbh->prepare("UPDATE `visap_school_session_tbl` SET active_session=?,active_term=?,Days_open=?,Weeks_open=?,term_ended=?,new_term_begins=? WHERE seId=? LIMIT 1");
						if ($this->stmt->execute(array($active_session, $term, $days, $noweeks, $vdate, $next_term_start, $seId))) {
							$this->stmt = $this->dbh->prepare("UPDATE `current_session_tbl` SET term_desc=? WHERE session_desc_name=? AND id=? LIMIT 1");
							if ($this->stmt->execute(array($term, $active_session, $seId))) {
								$this->dbh->commit();
								$this->response = $this->alert->alert_toastr("success","$active_session is Now the Current Academic Session", __OSO_APP_NAME__." Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
							}
						}
					}
				} else {
					//create new session history
					$session_data = $this->get_session_details();
					$osession = $session_data->active_session;
					$oterm = $session_data->active_term;
					$odays = $session_data->Days_open;
					$oweeks = $session_data->Weeks_open;
					$oterm_end = date('Y-m-d', strtotime($session_data->term_ended));
					$onext_term = date('Y-m-d', strtotime($session_data->new_term_begins));
					$date = date('Y-m-d');
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_school_session_history_tbl`(active_session, active_term, Days_open, Weeks_open, term_ended, new_term_begins, updated_at) VALUES (?,?,?,?,?,?,?)");
					if ($this->stmt->execute(array($osession, $oterm, $odays, $oweeks, $oterm_end, $onext_term, $date))) {
						// code...
						$this->stmt = $this->dbh->prepare("UPDATE `visap_school_session_tbl` SET active_session=?,active_term=?,Days_open=?,Weeks_open=?,term_ended=?,new_term_begins=? WHERE seId=? LIMIT 1");
						if ($this->stmt->execute(array($active_session, $term, $days, $noweeks, $vdate, $next_term_start, $seId))) {
							$this->stmt = $this->dbh->prepare("UPDATE `current_session_tbl` SET term_desc=? WHERE session_desc_name=? AND id=? LIMIT 1");
							if ($this->stmt->execute(array($term, $active_session, $seId))) {
								$this->dbh->commit();
								$this->response = $this->alert->alert_toastr("success","$active_session is Now the Current Academic Session", __OSO_APP_NAME__." Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
							}
						}
					}
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error","Internal Server Error Occurred! ", __OSO_APP_NAME__." Says");
			}
		}
		return $this->response;
	}

	public function get_session_history_by_id($ses_name, $term)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_history_tbl` WHERE active_session=? AND active_term=? LIMIT 1");
		$this->stmt->execute([$ses_name, $term]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//get_all_session_history_lists
	public function get_all_session_history_lists()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT(active_session) FROM `visap_school_session_history_tbl` ORDER BY active_session ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->active_session . '">' . $row->active_session . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//get_all_session_history_lists
	public function get_all_session_term_history_lists()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT(active_term) FROM `visap_school_session_history_tbl` ORDER BY active_term ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->active_term . '">' . $row->active_term . '</option>';
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
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function session_simulation_module($data)
	{
		$seId = 1;
		$tterm = $this->config->Clean($data['simulate_to_term']);
		$simulateTo = $this->config->Clean($data['simulate_to_session']);
		$passcode = $this->config->Clean($data['bypass_auth2']);
		//check auth
		if ($this->config->isEmptyStr($passcode) || $passcode != md5("oiza12345")) {
			$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!", "danger");
		} elseif ($this->config->isEmptyStr($simulateTo)) {
			$this->response = $this->alert->alert_msg("Please Select the Session and Term you want to Simulate!", "danger");
		} else {
			//update the current_session_tbl
			try {
				$osd = self::get_session_history_by_id($simulateTo, $tterm);
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `current_session_tbl` SET session_desc_name=?,term_desc=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute(array($osd->active_session, $osd->active_term, $seId))) {
					//Update visap_school_session_tbl
					$this->stmt = $this->dbh->prepare("UPDATE `visap_school_session_tbl` SET active_session=?,active_term=?,Days_open=?,Weeks_open=?,term_ended=?,new_term_begins=? WHERE seId=? LIMIT 1");
					if ($this->stmt->execute(array($osd->active_session, $osd->active_term, $osd->Days_open, $osd->Weeks_open, $osd->term_ended, $osd->new_term_begins, $seId))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_msg(__OSO_APP_NAME__ . " is Now in Simulation Mode &raquo; $simulateTo ", "success") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("Simulation Failed! Please try again...: Error: " . $e->getMessage(), "danger");
			}
		}
		return $this->response;
	}

	// School Session management methods end

	//STUDENT ATTENDANT METHODS
	public function upload_student_attendance($data)
	{
		$todaydate = $this->config->Clean($data['attDate']);
		$session = $this->config->Clean($data['session']);
		$term = $this->config->Clean($data['term']);
		$total_count = $this->config->Clean($data['total_count']);
		if ($this->config->isEmptyStr($todaydate)) {
			$this->response = $this->alert->alert_msg("Attendance Date  is Required! ", "danger");
		} else {
			for ($i = 0; $i < (int)$total_count; $i++) {
				$reg_number = $data['reg_number'][$i];
				$attstatus = 	$data['attendant_status'][$i];
				$classroom = 	$data['student_classroom'][$i];
				if ($this->config->isEmptyStr($attstatus)) {
					$this->response = $this->alert->alert_msg("Attendance Roll Call Status is Required! ", "danger");
				} else {
					//lets check if this attendance already submitted ealier
					$attdate = date("Y-m-d", strtotime($todaydate));
					$nowdate = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_attendance_tbl` WHERE stdReg=? AND studentGrade=? AND attendant_date=? AND term=? AND schl_session=?");
					$this->stmt->execute(array($reg_number, $classroom, $attdate, $term, $session));
					if ($this->stmt->rowCount() > 0) {
						$this->response = $this->alert->alert_msg("This Attendance already submitted! ", "danger");
					} else {
						//lets create a fresh one
						try {
							$this->dbh->beginTransaction();
							$this->stmt = $this->dbh->prepare("INSERT INTO `visap_class_attendance_tbl` (stdReg,studentGrade,roll_call,attendant_date,term,schl_session,created_at) VALUES (?,?,?,?,?,?,?);");
							if ($this->stmt->execute(array($reg_number, $classroom, $attstatus, $attdate, $term, $session, $nowdate))) {
								$this->dbh->commit();
								$this->response = $this->alert->alert_msg("Submitted Successfully, Please wait... ", "success") . "<script>setTimeout(()=>{
				window.location.replace('student_attendance');
			},500);</script>";
							}
						} catch (PDOException $e) {
							$this->dbh->rollback();
							$this->response  = $this->alert->alert_msg(" Attendance Uploading Failed! Please try again...: Error: " . $e->getMessage(), "danger");
						}
					}
				}
			}
		}
		return $this->response;
	}
	//STUDENT ATTENDANT METHODS

	//get student age in number
	public function get_student_age($dateOfBirth)
	{
		$today = date("Y-m-d");
		$diff = date_diff(date_create($dateOfBirth), date_create($today));
		return $diff->format('%y');
	}


	public function check_Web_Site($url)
	{
		// Check if the URL provided is valid
		if (!filter_var($url, FILTER_VALIDATE_URL)) {
			return false;
		}
		// Initialize cURL
		$ch = curl_init($url);
		// Set options
		curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 20);
		curl_setopt($ch, CURLOPT_HEADER, true);
		curl_setopt($ch, CURLOPT_NOBODY, true);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		// Get the answer
		$this->response = curl_exec($ch);
		// Close the cURL session
		curl_close($ch);
		return $this->response ? true : false;
		/*$url = 'https://stackhowto.com';
  if(checkWebSite($url)){
    echo 'The web site is available.';
  }else{
     echo 'The web site is not available';
  }*/
	}

	//check if is class teacher
	public function isClassTeacher($staffId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffId=? AND staffRole=? LIMIT 1");
		$office = "Class Teacher";
		$this->stmt->execute(array($staffId, $office));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function get_all_registered_subejcts($gradeClass)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` WHERE subject_class=? ORDER BY subject_name ASC");
		$this->stmt->execute(array($gradeClass));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function get_all_registered_subejcts_principal()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` ORDER BY subject_class ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	//unregister my exam subject
	public function unregistered_exam_subject($subId, $subject)
	{
		if (!$this->config->isEmptyStr($subId) && !$this->config->isEmptyStr($subject)) {
			// proceed to delete exam sbuject
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_registered_subject_tbl` WHERE id=? AND subject_name=? LIMIT 1");
				if ($this->stmt->execute(array($subId, $subject))) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Selected subject removed successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed to Unregister Subject: This error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}


	public function register_exam_subject($data)
	{
		//collect form data
		$bypass = $this->config->Clean($data['bypass']);
		$subject = $this->config->Clean($data['subject']);
		$createdBy = $this->config->Clean($data['submittedBy']);
		$student_class = $this->config->Clean($data['subject_class']);
		//check if bypass is not set
		if ($this->config->isEmptyStr($bypass) || $bypass !== md5("oiza1")) {
			$this->response = $this->alert->alert_msg("Unathorized access Detected!", "warning");
		} elseif ($this->config->isEmptyStr($subject) || $this->config->isEmptyStr($student_class)) {
			// code...
			$this->response = $this->alert->alert_msg("Please Select subject to Register!", "warning");
		} else {
			//check for duplicate suject registration in db
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` WHERE subject_class=? AND subject_name=? LIMIT 1");
			//execute
			$this->stmt->execute(array($student_class, $subject));
			//check row return
			if ($this->stmt->rowCount() == 1) {
				// code...
				$this->response = $this->alert->alert_msg($subject . " is already Registered!", "danger");
			} else {
				try {
					$this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_registered_subject_tbl` (subject_class,subject_name,createdBy,created_at) VALUES (?,?,?,?);");
					//lets execute
					if ($this->stmt->execute([$student_class, $subject, $createdBy, $created_at])) {
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
					$this->response  = $this->alert->alert_msg("Error Occurred: " . $e->getMessage(), "danger");
				}
			}
		}
		return $this->response;
	}

	//get student result details to coment on
	public function get_all_uploaded_school_resultByClassName($student_class, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT(stdRegCode), sum(overallMark) as total_mark FROM `visap_termly_result_tbl` WHERE studentGrade=? AND term=? AND aca_session=? ORDER BY stdRegCode ASC");
		$this->stmt->execute(array($student_class, $term, $session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	/*RESEND CONFIRMATION CODE TO STAFF STARTs*/
	public function send_resend_confirmation_code($data)
	{
		$this->response = $this->alert->alert_toastr("success", "Confirmation code sent, Check your mail Inbox", "MAIL SENT");
		return $this->response;
	}

	/*RESEND CONFIRMATION CODE TO STAFF ENDs*/

	//filter attendance student by date
	public function show_attendance_by_date($student_class, $date)
	{
		if (!$this->config->isEmptyStr($student_class)) {
			$_date = date("Y-m-d", strtotime($date));
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_class_attendance_tbl` WHERE studentGrade=? AND attendant_date=? ORDER BY stdReg ASC");
			//execute
			$this->stmt->execute(array($student_class, $_date));
			if ($this->stmt->rowCount() > 0) {
				$this->response = $this->stmt->fetchAll();
			} else {
				$this->response = false;
			}
			return $this->response;

		}
	}


	public function enable_disable_all_modules($status, $type)
	{
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `api_module_config` SET status=? WHERE type=?");
			if ($this->stmt->execute(array($status, $type))) {
				$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success", "Module Updated Successfully", "SUCCESS") . "<script>setTimeout(()=>{
              window.location.reload();
            },500);</script>";
			}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response  = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), "ERROR");
		}
		return $this->response;
	}
	//
	public function enable_disable_modules_by_id($status, $id)
	{
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `api_module_config` SET status=? WHERE id=? LIMIT 1");
			if ($this->stmt->execute(array($status, $id))) {
				$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success", "Module Updated Successfully", "SUCCESS") . "<script>setTimeout(()=>{
              window.location.reload();
            },500);</script>";
			}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response  = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), "ERROR");
		}

		return $this->response;
	}
	public function enable_disable_slider_by_id($status, $id)
	{
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `visap_sliders_tbl` SET `status`=? WHERE id=? LIMIT 1");
			if ($this->stmt->execute(array($status, $id))) {
				$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success", "Slider Updated Successfully", "SUCCESS") . "<script>setTimeout(()=>{
              window.location.reload();
            },500);</script>";
			}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response  = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), "ERROR");
		}

		return $this->response;
	}

	public function get_office_InDropDown_list()
	{
		$status = "Active";
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_offices` WHERE status=? ORDER BY office_desc ASC");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->office_desc . '">' . $row->office_desc . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_role_InDropDown_list()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT(`staffRole`) FROM `visap_staff_tbl` WHERE staffRole!='' ORDER BY `staffRole` ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->staffRole . '">' . ucfirst($row->staffRole) . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_all_staff_office()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_post_tbl` ORDER BY office ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function set_new_office($data)
	{
		$office = $this->config->Clean($data['office']);
		$office_status = $this->config->Clean($data['office_status']);
		$bypass = $this->config->Clean($data['bypass']);
		//check for empty
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
			// code...
			$this->response = $this->alert->alert_toastr("error", "Authentication Failed, Please Check your Connection and Try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($office) || $this->config->isEmptyStr($office_status)) {
			$this->response = $this->alert->alert_toastr("warning", "Office Description and Status is required!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate Class name
			$this->stmt = $this->dbh->prepare("SELECT id FROM `school_offices` WHERE office_desc=? LIMIT 1");
			$this->stmt->execute([$office]);
			if ($this->stmt->rowCount() == 1) {
				// code...
				$this->response = $this->alert->alert_toastr("error", "$office already Exists!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					//create the new Classroom
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `school_offices` (office_desc, status,created_on) VALUES (?,?,?);");
					if ($this->stmt->execute([$office, $office_status, $date])) {
						// code...
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", $office . " Office Added Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_msg("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	//get school profile details
	public function get_school_profile_details()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_profile` WHERE id=1 LIMIT 1");
		$this->stmt->execute();
		if ($this->stmt->rowCount() == 1) {
			$rows = $this->stmt->fetch();
			$this->response = $rows;
			return $this->response;

		}
	}

	//social Link Details
	public function get_schoolsocil_link_details()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_social_link_tbl` WHERE id=1 LIMIT 1");
		$this->stmt->execute();
		if ($this->stmt->rowCount() == 1) {
			$rows = $this->stmt->fetch();
			$this->response = $rows;
			return $this->response;

		}
	}
	// TO BE UPLOADED TO SERVER

	//update school profile details
	public function update_school_profile_details($data)
	{
		$school_name = $this->config->Clean($data['school_name']);
		$slogan = $this->config->Clean($data['slogan']);
		$shortname 			= $this->config->Clean($data['shortname']);
		$approval_number = $this->config->Clean($data['approval_number']);
		$school_history = $this->config->Clean($data['school_history']);
		$founded_year 	= $this->config->Clean($data['founded_year']);
		$school_address = $this->config->Clean($data['school_address']);
		$school_state 	= $this->config->Clean($data['school_state']);
		$school_city 		= $this->config->Clean($data['school_city']);
		$country 				= $this->config->Clean($data['country']);
		$default_language = $this->config->Clean($data['default_language']);
		$school_phone 	 = $this->config->Clean($data['school_phone']);
		$school_fax 		 = $this->config->Clean($data['school_fax']);
		$school_email 	 = $this->config->Clean($data['school_email']);
		$school_gmail 	 = $this->config->Clean($data['school_gmail']);
		$website_link 	 = $this->config->Clean($data['website_link']);
		// new updated value
		$about 				= $this->config->Clean($data['about_us_statement']);
		$philosophy 	= $this->config->Clean($data['philosophy_statement']);
		$keyOfSuccess = $this->config->Clean($data['key_of_success']);
		$core_value 	= $this->config->Clean($data['core_value']);
		$vision 			= $this->config->Clean($data['vision_statement']);
		$mission 			= $this->config->Clean($data['mission_statement']);
		$principle 		=	$this->config->Clean($data['principle_statement']);
		$princiapl_text = $this->config->Clean($data['princiapl_text']);

		$auth_pass = $this->config->Clean($data['auth_code']);

		if (
			$this->config->isEmptyStr($school_name) ||
			$this->config->isEmptyStr($slogan) ||
			$this->config->isEmptyStr($shortname) ||
			$this->config->isEmptyStr($approval_number) ||
			$this->config->isEmptyStr($school_history) ||
			$this->config->isEmptyStr($founded_year) ||
			$this->config->isEmptyStr($school_address) ||
			$this->config->isEmptyStr($school_state) ||
			$this->config->isEmptyStr($school_city) ||
			$this->config->isEmptyStr($country) ||
			$this->config->isEmptyStr($default_language) ||
			$this->config->isEmptyStr($school_phone) ||
			$this->config->isEmptyStr($school_fax) ||
			$this->config->isEmptyStr($school_email) ||
			$this->config->isEmptyStr($school_gmail) ||
			$this->config->isEmptyStr($website_link) ||
			$this->config->isEmptyStr($mission) ||
			$this->config->isEmptyStr($vision) ||
			$this->config->isEmptyStr($core_value) ||
			$this->config->isEmptyStr($keyOfSuccess) ||
			$this->config->isEmptyStr($philosophy) ||
			$this->config->isEmptyStr($principle) ||
			$this->config->isEmptyStr($princiapl_text) ||
			$this->config->isEmptyStr($about)
		) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Form submission", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is required to Continue!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code", __OSO_APP_NAME__ . " Says");
		} else {
			$id = 1;
			//update action now
			try {
				$this->dbh->beginTransaction();
				//create the new Classroom
				$date = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("UPDATE `visap_school_profile` SET school_name=?,govt_approve_number=?,school_address=?,school_slogan=?,school_state=?,school_city=?,country=?,school_email=?,school_phone=?,school_fax=?,website_url=?,default_language=?,school_history=?,school_gmail=?,school_short_name=?,our_mission=?,our_vision=?,our_core_value=?,key_of_success=?,our_philosophy=?,our_principle=?,about_us=?,principal_welcome=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute(array($school_name, $approval_number, $school_address, $slogan, $school_state, $school_city, $country, $school_email, $school_phone, $school_fax, $website_link, $default_language, $school_history, $school_gmail, $shortname, $mission, $vision, $core_value, $keyOfSuccess, $philosophy, $principle, $about, $princiapl_text, $id))) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "School Details updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}
	public function update_school_administrator_details($data)
	{
		$owner_name = $this->config->Clean($data['owner_name']);
		$owner_phone = $this->config->Clean($data['owner_phone']);
		$principal_name = $this->config->Clean($data['principal']);
		$principal_phone = $this->config->Clean($data['principal_mobile']);
		$registrar_name = $this->config->Clean($data['registrar']);
		$registrar_phone = $this->config->Clean($data['registrar_phone']);
		$auth_pass = $this->config->Clean($data['auth_pass5']);
		if ($this->config->isEmptyStr($owner_name) || $this->config->isEmptyStr($owner_phone) || $this->config->isEmptyStr($principal_name) || $this->config->isEmptyStr($principal_phone) || $this->config->isEmptyStr($registrar_name) || $this->config->isEmptyStr($registrar_phone)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Form submission", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Enter an Authentication Passcode to Continue", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Entered", __OSO_APP_NAME__ . " Says");
		} else {
			$id = 1;
			//update action now
			try {
				$this->dbh->beginTransaction();
				//create the new Classroom
				$date = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("UPDATE `visap_school_profile` SET school_director=?,director_mobile=?,registrar=?,registrar_mobile=?,principal=?,principal_mobile=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$owner_name, $owner_phone, $registrar_name, $registrar_phone, $principal_name, $principal_phone, $id])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", " Details updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	public function update_school_social_link_details($data)
	{
		$twitter = $this->config->Clean($data['twitter']);
		$facebook = $this->config->Clean($data['facebook']);
		$goggle = $this->config->Clean($data['goggle']);
		$instagram = $this->config->Clean($data['instagram']);
		$youtube = $this->config->Clean($data['youtube']);
		$linkedin = $this->config->Clean($data['linkedin']);
		$auth_pass = $this->config->Clean($data['auth_pass55']);
		if ($this->config->isEmptyStr($twitter) || $this->config->isEmptyStr($facebook) || $this->config->isEmptyStr($goggle) || $this->config->isEmptyStr($instagram) || $this->config->isEmptyStr($linkedin) || $this->config->isEmptyStr($youtube)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Form submission", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Enter an Authentication Passcode to Continue", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Entered", __OSO_APP_NAME__ . " Says");
		} else {
			$id = 1;
			//update action now
			try {
				$this->dbh->beginTransaction();
				//create the new Classroom
				$date = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("UPDATE `visap_social_link_tbl` SET twitter=?,youtube=?,facebook=?,goggle=?,instagram=?,linkedin=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$twitter, $youtube, $facebook, $goggle, $instagram, $linkedin, $id])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", " Details updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	//JUST DONE TODAY 18 may 2022
	public function upload_affective_domain($data)
	{
		$classTeacher = $this->config->Clean($data['class_teacher']);
		//$auth_pass = $this->config->Clean($data['auth_pass']);
		$term = $this->config->Clean($data['term']);
		$session = $this->config->Clean($data['school_session']);
		$total_count = $this->config->Clean($data['total_count']);
		if ($this->config->isEmptyStr($classTeacher)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid form Submission! ", __OSO_APP_NAME__ . " Says");
		} else {
			for ($i = 0; $i < (int)$total_count; $i++) {
				$reg_number = $data['std_reg_number'][$i];
				$student_id = 	$data['student_id'][$i];
				$std_class = 	$data['student_class'][$i];
				$punctuality = 	$data['punctuality'][$i];
				$neatness = 	$data['neatness'][$i];
				$honesty = 	$data['honesty'][$i];
				$selfcontrol = 	$data['selfcontrol'][$i];
				$attentiveness = 	$data['attentiveness'][$i];
				$leadership = 	$data['leadership'][$i];

				$uploaded_date = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_behavioral_tbl` WHERE student_id=? AND reg_number=? AND student_class=? AND term=? AND session=?");
				$this->stmt->execute(array($student_id, $reg_number, $std_class, $term, $session));
				if ($this->stmt->rowCount() > 0) {
					$this->response = $this->alert->alert_toastr("error", "Affective Domain for $term $session is already uploaded for " . strtoupper($std_class) . "! ", __OSO_APP_NAME__ . " Says");
				} else {
					try {
						$this->dbh->beginTransaction();
						$this->stmt = $this->dbh->prepare("INSERT INTO `visap_behavioral_tbl`(student_id,reg_number,student_class,term,session,punctuality,neatness,honesty,self_control,attentiveness,leadership,class_teacher,uploaded_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);");
						if ($this->stmt->execute(array($student_id, $reg_number, $std_class, $term, $session, $punctuality, $neatness, $honesty, $selfcontrol, $attentiveness, $leadership, $classTeacher, $uploaded_date))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Affective Domain Uploaded Successfully, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.replace('uploading_behavior');
			},500);</script>";
						}
					} catch (PDOException $e) {
						$this->dbh->rollback();
						$this->response  = $this->alert->alert_toastr("error", "Uploading Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
					}
				}
			}
		}
		return $this->response;
	}

	//get all affective domain uploaded by class term and session
	public function get_all_affective_domain($class, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_behavioral_tbl` WHERE student_class=? AND term=? AND session=? ORDER BY id ASC");
		$this->stmt->execute(array($class, $term, $session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}


	// PSYCHOMOTOR METHODS
	public function upload_psychomotor_domain($data)
	{
		$uploadedBy = $this->config->Clean($data['class_teacher']);
		//$auth_pass = $this->config->Clean($data['auth_pass']);
		$term = $this->config->Clean($data['term']);
		$session = $this->config->Clean($data['school_session']);
		$total_count = $this->config->Clean($data['total_count']);
		if ($this->config->isEmptyStr($uploadedBy)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid form Submission! ", __OSO_APP_NAME__ . " Says");
		} else {
			for ($i = 0; $i < (int)$total_count; $i++) {
				$reg_number = $data['std_reg_number'][$i];
				$student_id = 	$data['student_id'][$i];
				$std_class = 	$data['student_class'][$i];
				$handwriting = 	$data['handwriting'][$i];
				$sports = 	$data['sports'][$i];
				$fluency = 	$data['fluency'][$i];
				$handlingtool = 	$data['handlingtool'][$i];
				$drawing = 	$data['drawing'][$i];
				$crafts = 	$data['crafts'][$i];

				$uploaded_date = date("Y-m-d");
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_psycho_tbl` WHERE student_id=? AND reg_number=? AND student_class=? AND term=? AND session=?");
				$this->stmt->execute(array($student_id, $reg_number, $std_class, $term, $session));
				if ($this->stmt->rowCount() > 0) {
					$this->response = $this->alert->alert_toastr("error", "Psychomotor Domain for $term $session is already uploaded for " . strtoupper($std_class) . "! ", __OSO_APP_NAME__ . " Says");
				} else {
					try {
						$this->dbh->beginTransaction();
						$this->stmt = $this->dbh->prepare("INSERT INTO `visap_psycho_tbl`(student_id,reg_number,student_class,term,session,Handwriting,Sports,Fluency,Handlingtools,Drawing,crafts,class_teacher,uploaded_date) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?);");
						if ($this->stmt->execute(array($student_id, $reg_number, $std_class, $term, $session, $handwriting, $sports, $fluency, $handlingtool, $drawing, $crafts, $uploadedBy, $uploaded_date))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Psychomotor Domain Uploaded Successfully, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.replace('uploading_behavior');
			},500);</script>";
						}
					} catch (PDOException $e) {
						$this->dbh->rollback();
						$this->response  = $this->alert->alert_toastr("error", "Uploading Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
					}
				}
			}
		}
		return $this->response;
	}

	//get all affective domain uploaded by class term and session
	public function get_all_psychomotor_domain($class, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_psycho_tbl` WHERE student_class=? AND term=? AND session=? ORDER BY id ASC");
		$this->stmt->execute(array($class, $term, $session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}
	// PSYCHOMOTOR METHOD

	public function get_recent_payment_records()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_payment_history_tbl` WHERE DATE(`today_date`) >= DATE(CURRENT_DATE() - INTERVAL
 7 DAY)");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function add_new_student_office_title($data)
	{
		$office_name = $this->config->Clean($data['office_title']);
		$office_status = $this->config->Clean($data['office_status']);
		if ($this->config->isEmptyStr($office_name)) {
			$this->response = $this->alert->alert_toastr("warning", "Please enter the Office Description to continue!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($office_status)) {
			$this->response = $this->alert->alert_toastr("warning", "Please set the status of the new Office to continue!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate office
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_prefect_title_tbl` WHERE title=? LIMIT 1");
			$this->stmt->execute([$office_name]);
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("warning", "$office_name already Exists!", __OSO_APP_NAME__ . " Says");
			} else {
				$date = date("Y-m-d");
				try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_prefect_title_tbl`(title,status,created_at) VALUES(?,?,?);");
					if ($this->stmt->execute(array($office_name, $office_status, $date))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", "$office_name Added Successfully, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error", "Uploading Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	//get oastudent office title in drop down

	public function get_student_office_title_inDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_prefect_title_tbl` WHERE status='Active' ORDER BY title DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->title . '">' . ucwords($row->title) . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	public function get_office_all_students_office_title()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_prefect_title_tbl` ORDER BY title ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function get_student_office_titleById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_prefect_title_tbl` WHERE id=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function update_prefect_office_title($data)
	{
		$officeId = $this->config->Clean($data['office_id']);
		$office_name = $this->config->Clean($data['old_office_name']);
		$office_status = $this->config->Clean($data['old_office_status']);
		if ($this->config->isEmptyStr($office_name)) {
			$this->response = $this->alert->alert_toastr("warning", "Please enter the Office Description to continue!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($office_status)) {
			$this->response = $this->alert->alert_toastr("warning", "Please set the status of this Office to continue!", __OSO_APP_NAME__ . " Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `visap_prefect_title_tbl` SET title=?,status=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$office_name, $office_status, $officeId])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", " Office Title updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_msg("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}
	//TO BE UPDLOADED TO PORTAL SERVER
	public function get_office_all_staff_office_title()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_offices` ORDER BY office_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function get_staff_office_titleById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `school_offices` WHERE id=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function update_staff_office_title($data)
	{
		$officeId = $this->config->Clean($data['office_id']);
		$office_name = $this->config->Clean($data['old_office_name']);
		$office_status = $this->config->Clean($data['old_office_status']);
		if ($this->config->isEmptyStr($office_name)) {
			$this->response = $this->alert->alert_toastr("warning", "Please enter the Office Description to continue!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($office_status)) {
			$this->response = $this->alert->alert_toastr("warning", "Please set the status of this Office to continue!", __OSO_APP_NAME__ . " Says");
		} else {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `school_offices` SET office_desc=?,status=? WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$office_name, $office_status, $officeId])) {
					// code...
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", " Office Title updated Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
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
	//get total number of subject offered by a particular class
	public function get_number_of_subejct_offered_by_class($stdGrade)
	{
		$this->stmt = $this->dbh->prepare("SELECT count(`id`) as cnt FROM `visap_registered_subject_tbl` WHERE subject_class=?");
		$this->stmt->execute([$stdGrade]);
		if ($this->stmt->rowCount() > 0) {
			// code...
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
		} else {
			$this->response = 0;
		}
		return $this->response;
		unset($this->dbh);
	}
	//get student obtainable score
	public function get_obtainable_score($stdRegNo, $stdGrade, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`overallMark`) as obtainable FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
		$this->stmt->execute([$stdRegNo, $stdGrade, $term, $session]);
		if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->obtainable;
		} else {
			$this->response = 0;
		}
		return $this->response;
		unset($this->dbh);
	}

	public function get_student_result_comment_details($admision_no, $stdGrade, $term, $session)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? ANd schl_Sess=? LIMIT 1");
		$this->stmt->execute(array($admision_no, $stdGrade, $term, $session));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}
	public function get_class_teacher_class_name($stdRegNo, $stdGrade, $term, $session)
	{

		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_behavioral_tbl` WHERE reg_number=? AND student_class=? AND term=? AND `session`=? LIMIT 1");
		$this->stmt->execute(array($stdRegNo, $stdGrade, $term, $session));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}
	public function get_class_teacher($stdGrade)
	{

		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE staffGrade=?");
		$this->stmt->execute(array($stdGrade));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}
	public function get_principal_info()
	{
		$staffRole = "Principal";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_tbl` WHERE  staffRole=? LIMIT 1");
		$this->stmt->execute(array($staffRole));
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function upload_school_logoImage($data, $file)
	{
		$auth_pass = $this->config->Clean($data['m_auth']);
		$logoname = $file['logoName']['name'];
		$logo_size = $file['logoName']['size'] / 1024;
		$logo_temp = $file['logoName']['tmp_name'];
		$logo_error = $file['logoName']['error'];
		$allowed = array("jpg", "jpeg", "png");
		$name_div = explode(".", $logoname);
		$image_ext = strtolower(end($name_div));
		if (!$this->config->isEmptyStr($logoname)) {
			//$response = $Alert->alert_msg("You Selected $logo_name","success");
			if ($this->config->isEmptyStr($auth_pass)) {
				$this->response = $this->alert->alert_toastr("error", "Please provide the Authentication Code to proceed", __OSO_APP_NAME__ . " Says");
			} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
				$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
			} elseif (!in_array($image_ext, $allowed)) {
				$this->response = $this->alert->alert_toastr("error", "Your logo format is not supported, Only PNG,JPG,JPEG", __OSO_APP_NAME__ . " Says");
			} elseif ($logo_size > 100) {
				$this->response = $this->alert->alert_toastr("error", "Your Logo Size should not exceed 100KB, Your file Size is :" . number_format($logo_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
			} elseif ($logo_error != 0) {
				$this->response = $this->alert->alert_toastr("error", "There was an error Uploading your image", __OSO_APP_NAME__ . " Says");
			} else {
				$logo_realName = "logo_" . time() . mt_rand(0, 9999999) . "." . $image_ext;
				//lets update the student logo in the db
				$logo_destination = "../schoolImages/Logo/" . $logo_realName;
				try {
					$this->dbh->beginTransaction();
					$id = 1;
					$this->stmt = $this->dbh->prepare("UPDATE `visap_school_profile` SET school_logo=? WHERE id=? LIMIT 1");
					if ($this->stmt->execute(array($logo_realName, $id))) {
						if ($this->config->move_file_to_folder($logo_temp, $logo_destination)) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "School Logo Updated  Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					if (file_exists($logo_destination)) {
						unlink($logo_destination);
					}
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		} else {
			$this->response = $this->alert->alert_toastr("error", "Please Select a Logo to Upload", __OSO_APP_NAME__ . " Says");
		}
		return $this->response;
	}

	public function get_school_session_info()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_school_session_tbl` LIMIT 1");
		$this->stmt->execute();
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//BULK SUBJECT REG
	public function register_bulk_subjects($data)
	{
		$student_class = $this->config->Clean($data['student_class']);
		$auth_pass = $this->config->Clean($data['authcode']);
		if (isset($data['subject_arr'])) {
			foreach ($data['subject_arr'] as $subjects) {
				if ($this->config->isEmptyStr($student_class)) {
					$this->response = $this->alert->alert_toastr("error", "Please Choose a Class  to register the Selected Subjects!", __OSO_APP_NAME__ . " Says");
				} elseif ($this->config->isEmptyStr($auth_pass)) {
					$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . " Says");
				} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
					$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
				} else {

					//lets check if the subject is already registered for the selected class
					$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_registered_subject_tbl` WHERE subject_class=? AND subject_name=?");
					$this->stmt->execute(array($student_class, $subjects));
					if ($this->stmt->rowCount() > 0) {
						$this->response = $this->alert->alert_toastr("error", "Selected Subject(s) is/are already Registered for $student_class", __OSO_APP_NAME__ . " Says");
					} else {
						try {
							$created_at = date("Y-m-d");
							$this->dbh->beginTransaction();
							$this->stmt = $this->dbh->prepare("INSERT INTO `visap_registered_subject_tbl` (subject_class,subject_name,createdBy,created_at) VALUES (?,?,?,?)");
							if ($this->stmt->execute(array($student_class, $subjects, $_SESSION['ADMIN_USERNAME'], $created_at))) {
								$this->dbh->commit();
								$this->response = $this->alert->alert_toastr("success", "Selected Subjects registered Successfully...", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
							} else {
								$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
							}
						} catch (PDOException $e) {
							$this->dbh->rollback();
							$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
						}
					}
				}
			}
		} else {
			$this->response = $this->alert->alert_toastr("error", "Please select at least a subject to register", __OSO_APP_NAME__ . " Says");
		}
		return $this->response;
	}

	public function declareAdmissionPortalOpen($data)
	{
		$desc = $this->config->Clean($data['desc']);
		$batch = $this->config->Clean($data['batch']);
		$adm_duration = $this->config->Clean($data['adm_duration']);
		$intDate = $this->config->Clean(date("Y-m-d", strtotime($data['intDate'])));
		$int_venue = $this->config->Clean($data['int_venue']);
		$exam_time = $this->config->Clean(date("h:i:s a", strtotime($data['exam_time'])));
		$note = $this->config->Clean($data['instruction']);
		$authcode = $this->config->Clean($data['authcode']);
		$admission_session = $this->config->Clean($data['aca_session']);
		//check for empty values
		if ($this->config->isEmptyStr($desc) || $this->config->isEmptyStr($batch) || $this->config->isEmptyStr($adm_duration) || $this->config->isEmptyStr($intDate) || $this->config->isEmptyStr($int_venue) || $this->config->isEmptyStr($exam_time) || $this->config->isEmptyStr($note)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid submission, Please check your input!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($authcode)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . " Says");
		} elseif ($authcode !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//check the database for any active admission bath
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status='1'");
			$this->stmt->execute();
			if ($this->stmt->rowCount() > 0) {
				$this->response = $this->alert->alert_toastr("error", "Another Admission batch is in Progress!", __OSO_APP_NAME__ . " Says");
			} else {
				//let check for duplicate entry
				$adm_div = explode("-", $adm_duration);
				$admStart = date("Y-m-d", strtotime($adm_div[0]));
				$admEnd = date("Y-m-d", strtotime($adm_div[1]));
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE admission_desc=? AND batch=? AND adm_start=? AND adm_end=? AND schl_session=? LIMIT 1");
				$this->stmt->execute(array($desc, $batch, $admStart, $admEnd, $admission_session));
				if ($this->stmt->rowCount() == 1) {
					$this->response = $this->alert->alert_toastr("error", "This information is already Created!", __OSO_APP_NAME__ . " Says");
				} else {
					//create a fresh adimission portal
					try {
						$status = 1;
						$this->dbh->beginTransaction();
						$this->stmt = $this->dbh->prepare("INSERT INTO `visap_admission_open_tbl` (admission_desc,batch,adm_start,adm_end,interview_date,interview_time,schl_session,note,status) VALUES (?,?,?,?,?,?,?,?,?)");
						if ($this->stmt->execute(array($desc, $batch, $admStart, $admEnd, $intDate, $exam_time, $admission_session, $note, $status))) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "$desc $batch Declared Open!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
						} else {
							$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
						}
					} catch (Exception $e) {
						$this->dbh->rollback();
						$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
					}
				}
			}
		}

		return $this->response;
	}

	public function getAdmissionPortalDetails()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` ORDER BY batch DESC LIMIT 2");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function updateAdmissionPortal($data)
	{
		$id = $this->config->Clean($data['id']);
		$action = $this->config->Clean($data['portal_action']);
		//check action
		switch ($action) {
			case 'open_admission':
				$status = 1;
				break;

			case 'close_admission':
				$status = 0;
				break;

			default:
				$status = 0;
				break;
		}
		//update the admission portal tbl
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `visap_admission_open_tbl` SET status=? WHERE id=? LIMIT 1");
			if ($this->stmt->execute([$status, $id])) {
				$this->dbh->commit();
				$this->response = $this->alert->alert_toastr("success", "Portal Updated Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
			} else {
				$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
			}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
		}
		return $this->response;
	}
	public function checkAdmissionPortalStatus(): bool
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_admission_open_tbl` WHERE status = 1 LIMIT 1");
		$this->stmt->execute();
		$this->response = $this->stmt->rowCount();
		return ($this->response == 1) ? true : false;
	}
	public function deleteAdmissionPortal($Id)
	{
		if (!$this->config->isEmptyStr($Id)) {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_admission_open_tbl`  WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$Id])) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
				} else {
					$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
				}
			} catch (Exception $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	public function submitExamQuestions($data, $file)
	{
		$teacher = $this->config->Clean($data['teacher_id']);
		$exam_class = $this->config->Clean($data['examClass']);
		$subject = $this->config->Clean($data['subject']);
		$term = $this->config->Clean($data['term']);
		$schl_session = $this->config->Clean($data['school_session']);
		$examFile_temp = $file['examfile']['tmp_name'];
		$examFileName = $file['examfile']['name'];
		$examFile_size = $file['examfile']['size'] / 1024;
		$examFile_error = $file['examfile']['error'];
		//$ext = pathinfo($blogFileName, PATHINFO_EXTENSION);
		$allowed = array("docx", "doc", "docxs");
		$name_div = explode(".", $examFileName);
		$image_ext = strtolower(end($name_div));
		//CHECK FOR EMPTY FIELDS
		//
		if ($this->config->isEmptyStr($teacher) || $this->config->isEmptyStr($exam_class) || $this->config->isEmptyStr($subject) || $this->config->isEmptyStr($examFileName)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid form Submission, Pls try again!", __OSO_APP_NAME__ . " Says");
		} elseif (!in_array($image_ext, $allowed)) {
			$this->response = $this->alert->alert_toastr("error", "Your file format is not supported, Please check and try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($examFile_size > 200) {
			$this->response = $this->alert->alert_toastr("error", "Examination file Size should not exceed 200KB, Selected File Size is :" . number_format($examFile_size, 2) . "KB", __OSO_APP_NAME__ . " Says");
		} elseif ($examFile_error !== 0) {
			$this->response = $this->alert->alert_toastr("error", "There was an error Uploading Your file, Try again!", __OSO_APP_NAME__ . " Says");
		} else {
			$newFileName = "exam_" . $subject . mt_rand(190, 99999999) . "." . $image_ext;
			$file_destination = "../exams/" . $newFileName;
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_exam_subject_tbl` WHERE teacherId=? AND exam_class=? AND subject=? AND term=? AND schl_session=? LIMIT 1");
			$this->stmt->execute(array($teacher, $exam_class, $subject, $term, $schl_session));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error", "$subject Examination Question is already Uploaded for $term $schl_session, Please check and try again!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$created_at = date("Y-m-d");
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_exam_subject_tbl` (teacherId,exam_class,subject,exam_file,created_at,term,schl_session) VALUES (?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($teacher, $exam_class, $subject, $newFileName, $created_at, $term, $schl_session))) {
						if ($this->config->move_file_to_folder($examFile_temp, $file_destination)) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Exam Question Uploaded Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
						}
					} else {
						$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					if (file_exists($file_destination)) {
						unlink($file_destination);
					}
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	public function getAllUploadedExamQuestions()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_exam_subject_tbl` ORDER BY examId DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function getAllUploadedExamQuestionsStaffId($staffId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_exam_subject_tbl` WHERE teacherId=? ORDER BY examId DESC");
		$this->stmt->execute([$staffId]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function getExamQuestionById($Id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_exam_subject_tbl` WHERE examId=? LIMIT 1");
		$this->stmt->execute([$Id]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	//delete_SliderById
	public function delete_ExamQuestionById($Id)
	{
		if (!$this->config->isEmptyStr($Id)) {
			$exam_details = self::getExamQuestionById($Id);
			$filePath = "../exams/" . $exam_details->exam_file;
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_exam_subject_tbl` WHERE examId=? LIMIT 1");
				if ($this->stmt->execute([$Id])) {
					if (file_exists($filePath)) {
						if (unlink($filePath)) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Deleted Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
						}
					}
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed to Delete Gallery: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
			return $this->response;

		}
	}

	//Holiday Methods
	public function declareSchoolHoliday($data)
	{
		$description = $this->config->Clean($data['holiday_desc']);
		$by = $this->config->Clean($data['declaredBy']);
		$from = $this->config->Clean(date("Y-m-d", strtotime($data['holiday_from'])));
		$to = $this->config->Clean(date("Y-m-d", strtotime($data['holiday_to'])));
		$note = $this->config->Clean($data['message']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//check for empty vals
		if ($this->config->isEmptyStr($description) || $this->config->isEmptyStr($by) || $this->config->isEmptyStr($from) || $this->config->isEmptyStr($to) || $this->config->isEmptyStr($note)) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Submission, Check your input!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication code is Required!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate holiday
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_holiday_tbl` WHERE holiday_desc=? AND declared_by=? AND date_from=? AND to_date=? LIMIT 1");
			$this->stmt->execute(array($description, $by, $from, $to));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error", "This $description is already Declared!", __OSO_APP_NAME__ . " Says");
			} else {
				try {
					$this->dbh->beginTransaction();
					$date = date("Y-m-d");
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_holiday_tbl` (holiday_desc,declared_by,date_from,to_date,note_msg,created_at) VALUES (?,?,?,?,?,?);");
					if ($this->stmt->execute(array($description, $by, $from, $to, $note, $date))) {
						$this->dbh->commit();
						$this->response = $this->alert->alert_toastr("success", "$description Declared Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
					} else {
						$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
					}
				} catch (Exception $e) {
					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}

	public function getAllHolidays()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_holiday_tbl` ORDER BY id DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function deleteHolidayById($Id)
	{
		if (!$this->config->isEmptyStr($Id)) {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_holiday_tbl`  WHERE id=? LIMIT 1");
				if ($this->stmt->execute([$Id])) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
				} else {
					$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
				}
			} catch (Exception $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}
	public function deleteExamById($Id)
	{
		if (!$this->config->isEmptyStr($Id)) {
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_exam_subject_tbl`  WHERE examId=? LIMIT 1");
				if ($this->stmt->execute([$Id])) {
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
								window.location.reload();
							},500);</script>";
				} else {
					$this->response = $this->alert->alert_toastr("error", "Unknown Error Occured, Please try again!", __OSO_APP_NAME__ . " Says");
				}
			} catch (Exception $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
		}
		return $this->response;
	}

	public function fetch_all_local_govt_state($state)
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` WHERE name=? LIMIT 1");
		$this->stmt->execute(array($state));
		if ($this->stmt->rowCount() == 1) {
			$state_list = $this->stmt->fetch();
			//grab all local govt that have this state id
			$this->stmt = $this->dbh->prepare("SELECT * FROM `local_govt_tbl` WHERE state_id=? ORDER BY local_name ASC");
			$this->stmt->execute(array($state_list->state_id));
			if ($this->stmt->rowCount() > 0) {
				while ($rows = $this->stmt->fetch()) {
					$this->response .= '<option value="' . $rows->local_name . '">' . $rows->local_name . '</option>';
				}
			} else {
				$this->response = false;
			}
		}
		return $this->response;
	}

	public function get_states_of_origin_InDropDown()
	{
		$this->response = "";
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_state_tbl` ORDER BY name ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			while ($row = $this->stmt->fetch()) {
				$this->response .= '<option value="' . $row->name . '">' . $row->name . '</option>';
			}
		} else {
			$this->response = false;
		}
		return $this->response;
	}

	//`visap_career_portal_tbl`
	public function getAllStaffResumeApplicationForm()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_career_portal_tbl` ORDER BY application_date DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}

	public function getResumeApplicationById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_career_portal_tbl` WHERE job_portal_id=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetch();
			return $this->response;

		}
	}

	public function delete_ResumeApplicationById($job_portal_id)
	{
		if (!$this->config->isEmptyStr($job_portal_id)) {
			$details = self::getResumeApplicationById($job_portal_id);
			$filePath = "../resume/" . $details->uploaded_cv;
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_career_portal_tbl` WHERE job_portal_id=? LIMIT 1");
				if ($this->stmt->execute([$job_portal_id])) {
					if (file_exists($filePath)) {
						unlink($filePath);
					}
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Deleted Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},1000);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed to Delete: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
			return $this->response;

		}
	}

	public function
	deleteSchoolExpenseRecordById($record_id)
	{
		if (!$this->config->isEmptyStr($record_id)) {
			try {
				$this->dbh->beginTransaction();
				//Delete the selected Subject
				$this->stmt = $this->dbh->prepare("DELETE FROM `visap_school_expense_tbl` WHERE expense_id=? LIMIT 1");
				if ($this->stmt->execute([$record_id])) {
					// code...
					$this->dbh->commit();
		
					$this->response = $this->alert->alert_toastr("success", "Record was removed Successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response  = $this->alert->alert_toastr("error", "Failed: Error Occurred: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
			}
			// code...
		} else {
			$this->response = false;
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
      (sender_email,recipient_email,`subject`,msg,cc_email,bcc_email,attachment,file_size,file_type,userType)
      VALUES
      (?,?,?,?,?,?,?,?,?,?);");
							if ($this->stmt->execute([
								$senderEmail, $receiver_data->email, $subject, $messageBody, $ccEmail, $bccEmail,
								$new_file_name, $file_size, $ext, $user_type
							])) {
								$this->stmt = $this->dbh->prepare("INSERT INTO `visap_sent_messages_tbl`
      (sender_email,recipient_email,`subject`,msg,cc_email,bcc_email,attachment,file_size,file_type,userType) VALUES
      (?,?,?,?,?,?,?,?,?,?);");
								if ($this->stmt->execute([
									$senderEmail, $receiver_data->email, $subject, $messageBody, $ccEmail, $bccEmail,
									$new_file_name, $file_size, $ext, $user_type
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
							$this->response = $this->alert->alert_toastr("error", "Error, Message sent Failed, Try again!", __OSO_APP_NAME__ .
								" Says");
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

	//message type  admin, staff, student
	public function getAllInboxMessages($table, $email)
	{
		$sql = "SELECT * FROM `{$table}` 
		WHERE `recipient_email`=? ORDER BY msg_datetime DESC";
		$this->stmt = $this->dbh->prepare($sql);
		$this->stmt->execute([$email]);
		if ($this->stmt->rowCount() > 0) {
			//return all messages associated with this users
			$this->response = $this->stmt->fetchAll();
		} else {
			return
				$this->response = false;
		}
		return $this->response;
	}

	public function UpdateSchoolStamp(array $data, array $file){
		$auth_pass = $this->config->Clean($data['auth_code']);
		$allowed = array("png");
		$signname = $file['sign']['name'];
		$sign_size = $file['sign']['size'] / 1024;
		$sign_temp = $file['sign']['tmp_name'];
		$sign_error = $file['sign']['error'];
		$name_div1 = explode(".", $signname);
		$image_ext1 = strtolower(end($name_div1));
		//
		
		$stampname = $file['stamp']['name'];
		$stamp_size = $file['stamp']['size'] / 1024;
		$stamp_temp = $file['stamp']['tmp_name'];
		$stamp_error = $file['stamp']['error'];
		
		$name_div2 = explode(".", $stampname);
		$image_ext2 = strtolower(end($name_div2));
		if (!$this->config->isEmptyStr($stampname) || !$this->config->isEmptyStr($signname)) {
			if ($this->config->isEmptyStr($auth_pass)) {
				$this->response = $this->alert->alert_toastr("error", "Authentication code is required", __OSO_APP_NAME__ . " Says");
			} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
				$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
			} elseif (!in_array($image_ext1, $allowed) || !in_array($image_ext2, $allowed)) {
				$this->response = $this->alert->alert_toastr("error", "Your File format is not supported, Only PNG is allowed", __OSO_APP_NAME__ . " Says");
			} elseif (($stamp_size > 200) || ($sign_size > 200)) {
				$this->response = $this->alert->alert_toastr("error", "File Size should not exceed 100KB, Your file Size is", __OSO_APP_NAME__ . " Says");
			} elseif (($stamp_error != 0) || ($sign_error != 0)) {
				$this->response = $this->alert->alert_toastr("error", "There was an error Uploading your image", __OSO_APP_NAME__ . " Says");
			} else {
				$sign = "sign_" . time() . mt_rand(1000000, 9999999) . "." . $image_ext1;
				$stamp = "stamp_" . time() . mt_rand(100000, 999999) . "." . $image_ext2;
				//lets update the stamp and sign in the db
				$sign_destination = "../schoolImages/Logo/" . $sign;
				$stamp_destination = "../schoolImages/Logo/" . $stamp;
				try {
					$this->dbh->beginTransaction();
					$id = 1;
					$this->stmt = $this->dbh->prepare("UPDATE `visap_school_profile` SET stamp=?, `signature`=? WHERE id=? LIMIT 1");
					if ($this->stmt->execute(array($stamp,$sign, $id))) {
						if ($this->config->move_file_to_folder($stamp_temp, $stamp_destination) && $this->config->move_file_to_folder($sign_temp, $sign_destination)) {
							$this->dbh->commit();
							$this->response = $this->alert->alert_toastr("success", "Stamp and Signature Uploaded  Successfully", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
							window.location.reload();
						},1500);</script>";
						}
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					if (file_exists($stamp_destination) && file_exists($sign_destination) ) {
						unlink($stamp_destination);
						unlink($sign_destination);
					}
					$this->response = $this->alert->alert_toastr("error", "Error Occurred: Try again ", __OSO_APP_NAME__ . " Says");
				}
			}
		} else {
			$this->response = $this->alert->alert_toastr("error", "Please Select Files to Upload", __OSO_APP_NAME__ . " Says");
		}
		return $this->response;
	}

	public function getGeneratedStudentTestimonials()
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_student_testimonial_tbl` ORDER BY `id` DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;

		}
	}
}