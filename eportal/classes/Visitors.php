<?php 
@session_start(); 
/*Result Class
*@author -- Osotech Software
*Desc -- this class will contain all tasks regarding Visitors
* sign In,Sign Out...

*/
require_once "Database.php";
require_once "Configuration.php";
require_once "Alert.php";
@Session::init_ses();
class Visitors {

	//Result properties
	private $dbh;//database connection
	protected $query;//querying database
	protected $stmt;//database statement
	protected $response;//database result
	protected $config;//default config
	protected $alert;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	//create new visitor info method
	public function submit_vistors_details($data){
		$cterm = $this->config->Clean($data['term']);
		$cses = $this->config->Clean($data['school_session']);
		$name = $this->config->Clean($data['vname']);
		$phone = $this->config->Clean($data['vphone']);
		$address = $this->config->Clean($data['vaddress']);
		$nin_number = $this->config->Clean($data['vnin_number']);
		$to_see = $this->config->Clean($data['vto_see']);
		$purpose = $this->config->Clean($data['vpurpose']);
	$time_in =date("Y-m-d h:i:s");
	$created_at = date("Y-m-d");
	//check for null values
	if ($this->config->isEmptyStr($name)|| $this->config->isEmptyStr($phone) || $this->config->isEmptyStr($address)|| $this->config->isEmptyStr($to_see) || $this->config->isEmptyStr($purpose)) {
		// code...
		$this->response =$this->alert->alert_toastr("warning","Please Enter Visitor Details",__OSO_APP_NAME__." Says");
	}else{
		//check if this visitor has visited today
		$this->query ="SELECT * FROM visitor_book WHERE visitor_name=? AND visitor_phone=? AND NIN_number=? AND cterm=? AND cses=? AND DATE(created_at)=DATE(CURRENT_DATE()) LIMIT 1";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute(array($name,$phone,$nin_number,$cterm,$cses));
		if ($this->stmt->rowCount()==1) {
			// show that details created earlier...
			$this->response =$this->alert->alert_toastr("warning","The information provided already entered today!",__OSO_APP_NAME__." Says");
		}else{
			//continue with the registration
			$this->query="INSERT INTO `visitor_book`(visitor_name,visitor_phone,visitor_address,whom_to_see,purpose_of_visit,checkIn_time,NIN_number,created_at,cterm,cses) VALUES (?,?,?,?,?,?,?,?,?,?);";
			$this->stmt = $this->dbh->prepare($this->query);
			if ($this->stmt->execute(array($name,$phone,$address,$to_see,$purpose,$time_in,$nin_number,$created_at,$cterm,$cses))) {
				// code...
				$this->response =$this->alert->alert_toastr("success","Visitor's Details Saved Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
          window.location.reload();
        },500)</script>";
			}else{
			$this->response =$this->alert->alert_toastr("warning","Server Error Occured!","SERVER ERROR");	
			}
		}

	}

	return $this->response;
	unset($this->dbh);
	}

	//View uploaded result method
	public function get_all_visitors_details(){
		$this->query ="SELECT * FROM visitor_book ORDER BY created_at DESC";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute();
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	//uploading cognitive domain
	public function auto_sign_out_visitor($data){
		$now = date("Y-m-d, h:i:s");
		$vId = $this->config->Clean($data['vic_id']);
		$this->query ="UPDATE visitor_book SET status=1, checkOut_time=NOW() WHERE visitor_id=? LIMIT 1";
		$this->stmt = $this->dbh->prepare($this->query);
		if ($this->stmt->execute([$vId])) {
			$this->response = $this->response =$this->alert->alert_toastr("success","Visitor's Successfully Signed Out at $now",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
          window.location.reload();
        },500)</script>";
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	//view uploaded cognitive domain
	public function delete_visitor_record($vId){
		$this->query ="DELETE FROM visitor_book WHERE visitor_id=? LIMIT 1";
		$this->stmt = $this->dbh->prepare($this->query);
		if ($this->stmt->execute([$vId])) {
			$this->response = true;
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	//published result method
	public function get_visitor_by_id($vId){
		$this->query ="SELECT * FROM visitor_book WHERE visitor_id=? LIMIT 1";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute([$vId]);
		if ($this->stmt->rowCount()==1) {
			$this->response = $this->stmt->fetch();
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	public function filter_visitor_history_by_date($from_date,$to_date){
		$this->query ="SELECT * FROM visitor_book WHERE created_at BETWEEN ? AND ? ORDER BY visitor_id DESC";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute([$from_date,$to_date]);
		if ($this->stmt->rowCount()>0) {
			$this->response = $this->stmt->fetchAll();
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	public function get_today_visitors(){
	$this->query ="SELECT count(visitor_id) as cnt FROM visitor_book WHERE DATE(created_at) = DATE(CURRENT_DATE())";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute();
		if ($this->stmt->rowCount()>0) {
			$count = $this->stmt->fetch();
		$this->response= $count->cnt;
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	// WHERE payment_date >= (DATE(CURDATE())- INTERVAL 1 YEAR)
	public function get_this_week_visitors($cterm,$cses){
	$this->query ="SELECT count(visitor_id) as cnt FROM visitor_book WHERE cterm=? AND cses=? AND DATE(created_at) >= DATE(CURRENT_DATE()- INTERVAL 1 WEEK)";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute([$cterm,$cses]);
		if ($this->stmt->rowCount()>0) {
			$count = $this->stmt->fetch();
		$this->response= $count->cnt;
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	public function get_current_term_visitors($cterm,$cses){
	$this->query ="SELECT count(visitor_id) as cnt FROM visitor_book WHERE cterm=? AND cses=?";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute([$cterm,$cses]);
		if ($this->stmt->rowCount()>0) {
			$count = $this->stmt->fetch();
		$this->response= $count->cnt;
		}else{
			$this->response = false;
		}
		return $this->response;
	}

	public function get_current_session_visitors($cses){
	$this->query ="SELECT count(visitor_id) as cnt FROM visitor_book WHERE cses=?";
		$this->stmt = $this->dbh->prepare($this->query);
		$this->stmt->execute([$cses]);
		if ($this->stmt->rowCount()>0) {
			$count = $this->stmt->fetch();
		$this->response= $count->cnt;
		}else{
			$this->response = false;
		}
		return $this->response;
	}

}