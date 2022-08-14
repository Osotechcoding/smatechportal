<?php  
@session_start();
/*Result Class
*@author -- Osotech Software
*Desc -- this class will contain all tasks in school result
* uploading,viewing,checking of student Results

*/
require_once "Database.php";
require_once "Configuration.php";
//@Session::init_ses();
class Result {

	//Result properties
	private $dbh;//database connection
	//protected $query;//querying database
	protected $stmt;//database statement
	protected $response;//database result
	protected $config;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}

	//uploadning result comment method
	public function upload_result_comments($data){
		$total_count 	= $data['total_count'];
		$auth_pass 		= $data['auth_pass'];
		$term 			= $data['term'];
		$comment_class 	= $data['result_comment_class'];
		$school_session = $data['school_session'];
		//check for empty values 
		if ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("warning","You need to Authenticate this Upload!",__OSO_APP_NAME__." Says");
			// code...
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}
		elseif (!$this->config->check_user_activity_allowed("result_comment")) {
	$this->response = $this->alert->alert_toastr("error","Result Comment Uploading is not allowed at the moment!",__OSO_APP_NAME__." Says");
		}else{
			//loop through all the student involved
			for ($i=0; $i < (int)$total_count; $i++) { 
				$student_regNo = $data['student_regNo'][$i];
				$staff_comment 	= 	$data['comment'][$i];
				//check for empty comment
				if ($this->config->isEmptyStr($staff_comment)) {
				$this->response = $this->alert->alert_toastr("warning","Please write a comment to continue!",__OSO_APP_NAME__." Says");
				}else{
				//check for duplicate comment upload
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND term=? AND schl_Sess=? LIMIT 1");
				$this->stmt->execute(array($student_regNo,$comment_class,$term,$school_session));
				//check the row that was returned 
				if ($this->stmt->rowCount() ==1) {
				$this->response = $this->alert->alert_toastr("warning","Comment already uploaded for student with Reg No: $student_regNo",__OSO_APP_NAME__." Says");
				}else{
				//let upload the comment now
					try {
						$this->dbh->beginTransaction();
		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_result_comment_tbl` (stdRegNo,stdGrade,teacher_comment,term,schl_Sess) VALUES (?,?,?,?,?);");
		if ($this->stmt->execute(array($student_regNo,$comment_class,$staff_comment,$term,$school_session))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Comment uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.assign('./');
			},500);</script>";
		}
						
					} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),"danger");	
					}
				}
				}
			}
		}

		return $this->response;
		unset($this->dbh);
	}

	//upload head of school result comment
	public function uploadHeadOfSchoolResultComment($data){
		$total_count 	= $data['total_count'];
		$auth_pass 		= $data['auth_pass'];
		$term 			= $data['term'];
		$comment_class 	= $data['result_comment_class'];
		$school_session = $data['school_session'];

		//check for empty values 
		if ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Authentication code is Required!",__OSO_APP_NAME__." Says");
			// code...
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}
		elseif (!$this->config->check_user_activity_allowed("result_comment")) {
	$this->response = $this->alert->alert_toastr("error","Comment Uploading is not allowed at the moment!",__OSO_APP_NAME__." Says");
		}else{
			//loop through all the student involved
			for ($i=0; $i < (int)$total_count; $i++) { 
				$student_regNo = $data['student_regNo'][$i];
				$comId = $data['comId'][$i];
				$staff_comment 	= 	$data['headofschool_comment'][$i];
				//check for empty comment
				if ($this->config->isEmptyStr($staff_comment)) {
				$this->response = $this->alert->alert_toastr("error","Please write your comment to continue!",__OSO_APP_NAME__." Says");
				}else{
				//check for duplicate comment upload
				$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdRegNo=? AND stdGrade=? AND principal_coment!=NULL AND term=? AND schl_Sess=? LIMIT 1");
				$this->stmt->execute(array($student_regNo,$comment_class,$term,$school_session));
				//check the row that was returned 
				if ($this->stmt->rowCount() ==1) {
				$this->response = $this->alert->alert_toastr("error","Comment already uploaded for student with Reg No: $student_regNo",__OSO_APP_NAME__." Says");
				}else{
				//let upload the comment now
					try {
						$this->dbh->beginTransaction();
		$this->stmt = $this->dbh->prepare("UPDATE `visap_result_comment_tbl` SET principal_coment=? WHERE commentId=? AND stdRegNo=? AND stdGrade=? AND term=? AND schl_Sess=?");
		if ($this->stmt->execute(array($staff_comment,$comId,$student_regNo,$comment_class,$term,$school_session))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Comment uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.assign('./');
			},500);</script>";
		}
						
					} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");	
					}
				}
				}
			}
		}

		return $this->response;
		unset($this->dbh);
	}

	//View uploaded result method
	public function view_uploaded_result_comment($stdGrade,$term,$session){
		$this->stmt= $this->dbh->prepare("SELECT * FROM `visap_result_comment_tbl` WHERE stdGrade=? AND term=? AND schl_Sess=? ORDER BY stdRegNo ASC");
		$this->stmt->execute(array($stdGrade,$term,$session));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	//uploading cognitive domain
	public function upload_cognitive($data){}

	//view uploaded cognitive domain
	public function view_uploaded_cognitive($data){}

	//published result method
	public function publishSchoolResultsByClass($data){
	$status = $this->config->Clean($data['result_action']);
	$result_session = $this->config->Clean($data['result_session']);
	$result_term = $this->config->Clean($data['result_term']);
	$result_class = $this->config->Clean($data['result_class']);
	$auth_pass = $this->config->Clean($data['auth_code']);
	if ($this->config->isEmptyStr($status) || $this->config->isEmptyStr($result_session) || $this->config->isEmptyStr($result_term) || $this->config->isEmptyStr($result_class) || $this->config->isEmptyStr($auth_pass)) {
	$this->response = $this->alert->alert_toastr("error","Invalid Submission: Unable to Process your Request!",__OSO_APP_NAME__." Says");
	}elseif ($auth_pass !== __OSO__PUBLISH_RESULT__KEY__) {
	$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
	}elseif (!self::checkResultUploadedByClass($result_class,$result_term,$result_session)) {
	$this->response = $this->alert->alert_toastr("error","Result not found for $result_class",__OSO_APP_NAME__." Says");
	}
	else{
		switch ($status) {
			case 'Pending':
				$resStatus = 1;
				break;
			case 'Released':
				$resStatus = 2;
				break;
			case 'Held':
				$resStatus = 3;
				break;
			case 'Cancelled':
				$resStatus = 4;
				break;

			default:
			$resStatus = 1;
				break;
		}
		//let's do the result publishing
		try {

			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `visap_termly_result_tbl` SET rStatus=? WHERE studentGrade=? AND term=? AND aca_session=?");
	if ($this->stmt->execute(array($resStatus,$result_class,$result_term,$result_session))) {
		 $this->dbh->commit();
	 $this->response = $this->alert->alert_toastr("success","Result for $result_class ".strtoupper($status)." Successfully...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
	}else{
$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
	}
		} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Publishing Failed: Error: ".$e->getMessage(),__OSO_APP_NAME__." Says");	
		}

	}
	return $this->response;
	unset($this->dbh);
	}

	//View published result method
	public function view_published_result(){
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT (`studentGrade`),term, aca_session,rStatus FROM `visap_termly_result_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	//check if the result have been uploaded 
	public function checkResultUploadedByClass($stdGrade,$term,$session): bool{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentGrade=? AND term=? AND aca_session=?");
		$this->stmt->execute(array($stdGrade,$term,$session));
		if ($this->stmt->rowCount() > 0) {
		return true;
		}else{
		return false;
		}
	}

	public function filterStudentResultByAction($status,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT DISTINCT (`studentGrade`),term, aca_session,rStatus FROM `visap_termly_result_tbl` WHERE rStatus=? AND term=? AND aca_session=?");
		$this->stmt->execute(array($status,$term,$session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	// count no of student that wrote a perticular exam
	public function getNumberOfStudentSitForExamByClass($stdGrade,$term,$session){
		$this->stmt= $this->dbh->prepare("SELECT DISTINCT(`stdRegCode`) FROM `visap_termly_result_tbl` WHERE studentGrade=? AND term=? AND aca_session=?");
		$this->stmt->execute(array($stdGrade,$term,$session));
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->rowCount();
			return $this->response;
			unset($this->dbh);
		}
	}

	//check single student result method
	public function check_view_student_result($data){
		$stdRegNo = $this->config->Clean(strtoupper($data['reg_number']));
		$stdGrade = $this->config->Clean($data['result_class']);
		$stdSession = $this->config->Clean($data['result_session']);
		$stdTerm = $this->config->Clean($data['result_term']);
		$auth_pass =$this->config->Clean($data['auth_pass']);
		//check for values
		if (!$this->config->check_user_activity_allowed("result_checking")) {
		$this->response = $this->alert->alert_toastr("error","Result Checking is currently not allowed!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($stdRegNo) || $this->config->isEmptyStr($stdGrade) || $this->config->isEmptyStr($stdTerm) || $this->config->isEmptyStr($stdSession) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Invalid submission, Please check all your inputs!",__OSO_APP_NAME__." Says");
		}/*elseif (result is not commented by class teacher) {
			// code...
		}elseif (result is not commented by principal) {
			// code...
		}*/elseif (!$this->config->check_single_data("visap_student_tbl","stdRegNo",$stdRegNo)) {
		$this->response = $this->alert->alert_toastr("error","Invalid student admission number!",__OSO_APP_NAME__." Says");
		}elseif (!self::checkResultReadyModule("visap_behavioral_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
           $this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__." Says");
            }elseif (!self::checkResultReadyModule("visap_psycho_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
            	$this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__." Says");
            }else{
$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$stdTerm,$stdSession));
	if ($this->stmt->rowCount()> 0) {
		while($result_data = $this->stmt->fetch()){
			$result_id = $result_data->reportId;
			$result_opened = $result_data->rStatus;
			if ($result_opened =='2') {
		// create a session result Id...
		$_SESSION['resultmi'] = $result_id;
		// $_SESSION['pin'] = $cardPin;
		// $_SESSION['serial'] = $cardSerial;
		$_SESSION['result_regNo'] = $stdRegNo;
		$_SESSION['result_class'] = $stdGrade;
		$_SESSION['result_term'] = $stdTerm;
		$_SESSION['result_session'] = $stdSession;
		switch ($_SESSION['result_term']) {
			case '1st Term':
				$student_result_page ="./reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
				case '2nd Term':
			$student_result_page ="./secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
					case '3rd Term':
			$student_result_page ="./thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
				break;
		}
		$this->response = $this->alert->alert_toastr("success","Generating student Report Sheet, Pls wait...",__OSO_APP_NAME__." Says").'<script>setTimeout(()=>{
			window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=700, height=850");$("#SingleStudentResult_form")[0].reset();
		},3000)</script>';
			}elseif ($result_opened =='3') {
	$this->response = $this->alert->alert_toastr("error","This Result is Held, Please contact your Admin!",__OSO_APP_NAME__." Says");
			}
			else{
	$this->response = $this->alert->alert_toastr("error","Result not yet released, Try again later!",__OSO_APP_NAME__." Says");
			}
		}
	}else{
$this->response = $this->alert->alert_toastr("error","Sorry No result found!",__OSO_APP_NAME__." Says");
	}

		}
	return $this->response;
		unset($this->dbh);
	}

	public function update_school_result_grading($data){
		$bypass = $this->config->Clean($data['bypass']);
		$grading_id = ($data['grading_id']);
		$result_class = $this->config->Clean($data['result_class']);
		$score_from = isset($data['score_from']) ? $data['score_from'] :'0';
		$score_to = $this->config->Clean($data['score_to']);
		$mark_grade = $this->config->Clean($data['mark_grade']);
		$score_remark = $this->config->Clean($data['score_remark']);
		if ($this->config->isEmptyStr($bypass) || $bypass != md5("oiza1")) {
	$this->response = $this->alert->alert_msg("Authentication Failed, Please Check your Connection and Try again!","danger");
		}elseif ($this->config->isEmptyStr($score_to) || $this->config->isEmptyStr($score_remark) || $this->config->isEmptyStr($grading_id) || $this->config->isEmptyStr($mark_grade)) {
		$this->response = $this->alert->alert_msg("Invalid Submission, Please check your inputs and Try again!","danger");
		}
		else{
			//let get the grading updated
			try {
				$this->dbh->beginTransaction();
				$this->stmt = $this->dbh->prepare("UPDATE `visap_result_grading_tbl` SET mark_grade=?,score_from=?,score_to=?,score_remark=? WHERE grading_id=? AND grade_class=?");
				if ($this->stmt->execute(array($mark_grade,$score_from,$score_to,$score_remark,$grading_id,$result_class))) {
			 $this->dbh->commit();
			$this->response = $this->alert->alert_msg("Grading System Updated Successfully","success")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
				}else{
			$this->response = $this->alert->alert_msg("Unknown Error Occured, Please Try again!","danger");
				}
			} catch (PDOException $e) {
	$this->dbh->rollback();
    $this->response  =$this->alert->alert_msg("Grading Update Failed: Error Occurred: ".$e->getMessage(),"danger");
			}
		}
		return $this->response;
		//unset($this->dbh);
	}
	public function get_school_result_grading($grade_desc){
		$this->stmt= $this->dbh->prepare("SELECT * FROM `visap_result_grading_tbl` WHERE grade_class=? ORDER BY mark_grade ASC");
		$this->stmt->execute(array($grade_desc));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}

	public function get_student_result_gradeByRegNo($stdRegNo,$stdgrade,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? LIMIT 1");
		$this->stmt->execute(array($stdRegNo,$stdgrade,$term,$session));
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
			return $this->response;
			unset($this->dbh);
		}
	}

public function get_exam_subjectsByClassName($grade_desc,$subject){
		$this->stmt= $this->dbh->prepare("SELECT st.*,sr.* FROM `visap_registered_subject_tbl` as sr, `visap_student_tbl` as st WHERE sr.subject_class=? AND sr.subject_name=? AND st.studentClass=sr.subject_class AND st.stdAdmStatus='Active' ORDER BY st.stdSurName ASC");
		$this->stmt->execute(array($grade_desc,$subject));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			unset($this->dbh);
		}
	}


	public function upload_student_result($data){
		$total_count 	= 	$data['total_count'];
		$subject 		=   $data['subject'];
		$result_term 	=  	$data['result_term'];
		$result_session = 	$data['result_session'];
		$result_class 	= 	$data['result_class'];
		$student_regNo 	= 	$data['student_regNo'];
		$cass 			= 	$data['cass'];
		$exam 			= 	$data['exam'];
		//check for empty values 
		if ($this->config->isEmptyStr($result_class) || $this->config->isEmptyStr($student_regNo) || $this->config->isEmptyStr($cass) || $this->config->isEmptyStr($exam)) {
			$this->response = $this->alert->alert_toastr("error","Please check all your Inputs and try again!",__OSO_APP_NAME__." Says");
			// code...
		}elseif (!$this->config->check_user_activity_allowed('student_result_uploading')) {
	$this->response = $this->alert->alert_toastr("error","Result Uploading is not allowed at the moment!",__OSO_APP_NAME__." Says");
		}else{
			//count the number of student result subjects to be uploaded
			for ($i=0; $i < (int)$total_count; $i++) { 
				//$arr_stdId = $stdId[$i];
				$arr_student_regNo = $student_regNo[$i];
				$arr_result_class = $result_class[$i];
				$arr_result_term = $result_term[$i];
				$arr_result_session = $result_session[$i];
				$arr_cass = $cass[$i];
				$arr_exam = $exam[$i];
				$arr_subject = $subject[$i];
				//check if the subject already uploaded
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? AND subjectName=?");
		$this->stmt->execute(array($arr_student_regNo,$arr_result_class,$result_term,$result_session,$arr_subject));
		if ($this->stmt->rowCount()>0) {
		$this->response = $this->alert->alert_toastr("error","$arr_subject is already Uploaded!",__OSO_APP_NAME__." Says");
		}else{
			try {
		$this->dbh->beginTransaction();
		$rStatus ='1';
		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_termly_result_tbl` (stdRegCode,studentGrade,term,aca_session,subjectName,ca,exam,overallMark,mark_average,uploadedTime,uploadedDate,rStatus) VALUES (?,?,?,?,?,?,?,?,?,?,?,?);");
		$total_sum =doubleval($arr_cass+$arr_exam);
		$average_score = round(($total_sum/2)); 
		$time = date("h:i:s");
		$date = date("Y-m-d");
		if ($this->stmt->execute(array($arr_student_regNo,$arr_result_class,$result_term,$result_session,$arr_subject,$arr_cass,$arr_exam,$total_sum,$average_score,$time,$date,$rStatus))) {
		//update subjectRank will be here later
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success"," $arr_subject uploaded Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.href='result_uploading';
			}, 500);</script>";
		}
				
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  =$this->alert->alert_toastr("error","Upload Failed: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
				
			}
		//$this->response = $this->alert->alert_msg("Result Uploaded Successfully!","success");
		}

			}
		}
		
		return $this->response;
		unset($this->dbh);
	}

	public function get_all_uploaded_school_result($stdGrade,$subject,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentGrade=? AND subjectName=? AND term=? AND aca_session=? ORDER BY stdRegCode ASC");
		$this->stmt->execute(array($stdGrade,$subject,$term,$session));
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
		return $this->response;
		unset($this->dbh);
		}
	}

	public function uploaded_Exam_subjects_InDropDown_list(){
	$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT DISTINCT(`subjectName`) FROM `visap_termly_result_tbl` ORDER BY subjectName ASC");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->subjectName.'">'.$row->subjectName.'</option>';
			}
			}else{
				$this->response = false;
			}
			return $this->response;
	}

	public function filter_students_result_by_admission_no_subject($studentClass,$admission_no,$subject,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND subjectName=? AND term=? AND aca_session=? LIMIT 1");
			$this->stmt->execute(array($admission_no,$studentClass,$subject,$term,$session));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->stmt->fetch();
				return $this->response;
				unset($this->dbh);
			}
	}

	//update single student result by admin
	public function update_student_result_by_admin($data){
		$resultId = $this->config->Clean($data['resultId']);
		$stdRegNo = $this->config->Clean($data['std_admno']);
		$result_term = $this->config->Clean($data['result_term']);
		$result_session = $this->config->Clean($data['result_session']);
		$cass = $this->config->Clean($data['cass1']);
		$exam = $this->config->Clean($data['exam1']);
		$result_class = $this->config->Clean($data['result_class']);
		$auth_pass = $this->config->Clean($data['Auth']);
		//lets check for values
		if ($this->config->isEmptyStr($cass) || $this->config->isEmptyStr($exam)) {
		 $this->response = $this->alert->alert_toastr("error","Invalid submission, Please Check your Inputs!",__OSO_APP_NAME__." Says");
		}elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","Authentication Code is Required!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code!",__OSO_APP_NAME__." Says");
		}else{
			//let update the result score now
			try {
				$sumOfMark = intval($cass + $exam);
				$average_score = intval(($cass + $exam)/2);
				$this->dbh->beginTransaction();
    	$this->stmt = $this->dbh->prepare("UPDATE `visap_termly_result_tbl` SET ca=?,exam=?,overallMark=?,mark_average=? WHERE reportId=? AND stdRegCode=? AND studentGrade=? AND term=? AND aca_session=? LIMIT 1");
    	if ($this->stmt->execute(array($cass,$exam,$sumOfMark,$average_score,$resultId,$stdRegNo,$result_class,$result_term,$result_session))) {
    		$this->dbh->commit();
    $this->response = $this->alert->alert_toastr("success","Result Updated  Successfully...",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location='./';
						},500);</script>";
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}
			} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		}
		return $this->response;
		unset($this->dbh);
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

    //View uploaded result method
	public function fetchUploadedResultByClass(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT DISTINCT(`stdGrade`) FROM `visap_result_comment_tbl` ORDER BY stdGrade ASC LIMIT 30");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
	$this->response.='<option value="'.$row->stdGrade.'">'.$row->stdGrade.'</option>';
			}
			}else{
			$this->response = false;
			}
			return $this->response;
			 unset($this->dbh);
	}

	//get student termly offered subjects
	public function getMyTermylyOfferedSubjects($stdRegNo,$stdgrade,$term,$session){
		$this->stmt = $this->dbh->prepare("SELECT count(`reportId`) as total_subjects FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
			$this->stmt->execute(array($stdRegNo,$stdgrade,$term,$session));
			if ($this->stmt->rowCount() > 0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->total_subjects;
			}else{
			$this->response =0;
		}
		return $this->response;
		unset($this->dbh);
	}

	public function getUploadedResultByClass($stdgrade,$subject, $term,$session){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE studentGrade=? AND subjectName=? AND term=? AND aca_session=? ORDER BY subjectName ASC");
			$this->stmt->execute(array($stdgrade,$subject,$term,$session));
			if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
		return $this->response;
		unset($this->dbh);
		}
	}


	public function deleteTermlyResult($rId){
		if (!$this->config->isEmptyStr($rId)) {
			try {
		$this->dbh->beginTransaction();
	//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `visap_termly_result_tbl` WHERE reportId=? LIMIT 1");
		if ($this->stmt->execute([$rId])) {
			// code...
			 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.reload();
			},500);</script>";
		}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed to Delete Component: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
			// code...
		}else{
			$this->response = false;
		}
		return $this->response;
		unset($this->dbh);
	}

	public function checkMyResultByMySelf($data){
	$stdRegNo = $this->config->Clean(strtoupper($data['student_reg_number']));
	$stdGrade = $this->config->Clean($data['result_class']);
	$stdSession = $this->config->Clean($data['result_session']);
	$stdTerm = $this->config->Clean($data['result_term']);
	$cardPin = $this->config->Clean($data['cardPin_']);
	$cardSerial = $this->config->Clean($data['cardSerial_']);
	$counter =1;
	//let's check if any of the submitted inputs is null
	if (!$this->config->check_user_activity_allowed("result_checking")) {
	$this->response =$this->alert->alert_toastr("error","Checking of Result is currently not allowed on this Portal!",__OSO_APP_NAME__. " Says");
	}else
	if ($this->config->isEmptyStr($stdRegNo)) {
	$this->response = $this->alert->alert_toastr("warning","Student Admission No is Required!",__OSO_APP_NAME__. " Says");
	}elseif ($this->config->isEmptyStr($stdGrade)) {

	$this->response = $this->alert->alert_toastr("error","Student Class is Required!",__OSO_APP_NAME__. " Says");

	}elseif ($this->config->isEmptyStr($stdSession)) {

	$this->response = $this->alert->alert_toastr("error","Result Session is Required!",__OSO_APP_NAME__. " Says");

	}elseif ($this->config->isEmptyStr($stdTerm)) {

	$this->response = $this->alert->alert_toastr("error","Result Term is Required!",__OSO_APP_NAME__. " Says");

	}elseif ($this->config->isEmptyStr($cardPin)) {

	$this->response = $this->alert->alert_toastr("error","Scratch Card Pin is Required!",__OSO_APP_NAME__. " Says");

	}elseif ($this->config->isEmptyStr($cardSerial)) {

	$this->response = $this->alert->alert_toastr("error","Please enter Card Serial Number to continue!",__OSO_APP_NAME__. " Says");

	}else{
	//let's check any invalid inputs
	if (!$this->config->check_single_data("visap_student_tbl","stdRegNo",$stdRegNo)) {
	$this->response = $this->alert->alert_toastr("error","Invalid Admission Number!",__OSO_APP_NAME__. " Says");
	}elseif ((strlen($cardPin)<>12)) {
	// code...
	$this->response = $this->alert->alert_toastr("error","Invalid Scratch Card Pin Number!",__OSO_APP_NAME__. " Says");
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
	$this->response = $this->alert->alert_toastr("error","This Pin has been used by another Student!",__OSO_APP_NAME__. " Says");
	}elseif ($usedCounter >= '3') {
	$this->response = $this->alert->alert_toastr("error","You Have Exhausted Your Time Usage Validity of this Pin!",__OSO_APP_NAME__. " Says");
	}elseif (!self::checkResultReadyModule("visap_behavioral_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
	$this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__. " Says");
	}elseif (!self::checkResultReadyModule("visap_psycho_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
	$this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__. " Says");
	}
	else{
	//let's increase the counter
	//$pin_counter = $counter++;
	$this->stmt = $this->dbh->prepare("UPDATE `tbl_result_pins_history` SET pin_counter=pin_counter+1 WHERE pinId=? LIMIT 1");
	if ($this->stmt->execute(array($phId))) {
	//get the result details
	//reportId
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
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
	$_SESSION['result_session'] = $stdSession;
	switch ($_SESSION['result_term']) {
	case '1st Term':
	    $student_result_page ="reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	    break;
	case '2nd Term':
	    $student_result_page ="secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	    break;
	case '3rd Term':
	    $student_result_page ="thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	    break;
	}
	$this->response = $this->alert->alert_toastr("success","Processing your Report Sheet, Pls wait...",__OSO_APP_NAME__." Says").'<script>setTimeout(()=>{
	window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=750, height=842");$("#checkResultForm")[0].reset();
	},1000)</script>';
	}elseif ($result_opened =='3') {
	$this->response = $this->alert->alert_toastr("error","This Result is Held, Please contact your Admin!",__OSO_APP_NAME__. " Says");
	}
	else{
	$this->response = $this->alert->alert_toastr("error","Result not yet released, Try again later!",__OSO_APP_NAME__. " Says");
	}
	}
	}else{
	$this->response = $this->alert->alert_toastr("error","Sorry :) No Result Found!!!",__OSO_APP_NAME__. " Says");
	}
	}
	}
	}else{
	$this->response = $this->alert->alert_toastr("error","This Pin has been used by YOU!",__OSO_APP_NAME__. " Says");
	}
	}else{
	//lets start afresh for this pin
	$this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE studentRegNo=? AND student_class=? AND pin_code=? AND pin_serial=? AND used_term=? AND used_session=? LIMIT 1");
	$this->stmt->execute(array($stdRegNo,$stdGrade,$cardPin,$cardSerial,$stdTerm,$stdSession));
	if ($this->stmt->rowCount()=='0') {

	if (!self::checkResultReadyModule("visap_behavioral_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
	$this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__. " Says");
	}elseif (!self::checkResultReadyModule("visap_psycho_tbl",$stdRegNo,$stdGrade,$stdTerm,$stdSession)) {
	$this->response = $this->alert->alert_toastr("error","This Result is not yet Ready!",__OSO_APP_NAME__. " Says");
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
	$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_termly_result_tbl` WHERE stdRegCode=? AND studentGrade=? AND term=? AND aca_session=?");
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
	        $student_result_page ="reportcard?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	        break;
	    case '2nd Term':
	        $student_result_page ="secondtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	        break;
	    case '3rd Term':
	        $student_result_page ="thirdtermresult?academic-session=".$stdSession."&student-reg=".$stdRegNo."&Term=".$stdTerm;
	        break;
	}
	$this->response = $this->alert->alert_toastr("success","Processing your Report Sheet, Pls wait...",__OSO_APP_NAME__." Says").'<script>setTimeout(()=>{
	window.open("'.$student_result_page.'","_blank", "top=100, left=100, width=750, height=842");$("#checkResultForm")[0].reset();
	},1000)</script>';
	}elseif ($result_opened =='3') {
	$this->response = $this->alert->alert_toastr("error","This Result is Held, Please contact your Admin!",__OSO_APP_NAME__. " Says");
	}
	else{
	$this->response = $this->alert->alert_toastr("error","Result not yet released, Try again later!",__OSO_APP_NAME__. " Says");
	}
	}
	}else{
	$this->response = $this->alert->alert_toastr("error","Sorry :) No Result Found!!!",__OSO_APP_NAME__. " Says");
	}
	}

	}

	} catch (PDOException $e) {
	$this->dbh->rollback();
	$this->response = $this->alert->alert_toastr("error","Sorry :) No Result Found!!!",__OSO_APP_NAME__. " Says");
	}  
	}

	}

	}
	}else{
	//pin does not exists
	$this->response = $this->alert->alert_toastr("error","The Pin you entered does not Exists!",__OSO_APP_NAME__. " Says");
	}
	}
	}
	return $this->response;
	unset($this->dbh);
	}

}