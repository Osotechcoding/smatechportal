<?php  
require_once 'Database.php';
require_once 'Configuration.php';
include_once 'Alert.php';
 include_once 'Session.php';
 /*
Pin_and_serial Class
 */
Session::init_ses();

class Pins{
	private $dbh;
	protected $_Pins_code; 
	protected $_Pins_serial; 
	protected $_Pins_prefix; 
	protected $_table_;
	protected $_pin_desc_;
	protected $alert;
	protected $stmt;
	protected $query;
	protected $config;
	protected $response;
	protected $redirectedPage;
	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert();
		$this->config = new Configuration();
	}
	public function generate_scratch_pins($data){
		$q = trim($data['q']);
		$p = trim($data['p']);
		$t = trim($data['cardtype']);
		//check for empty form values 
		if (empty($q) || empty($p) || empty($t)) {
			// show error
	$this->response =$this->alert->alert_toastr("error","Invalid submission, Please try again!",__OSO_APP_NAME__." Says");
		}elseif ($q > 200) {
			// code...
	$this->response =$this->alert->alert_toastr("error","Maximum Pin to generate is 200, Please check and try again!",__OSO_APP_NAME__."Says");
		}
		else{
	//check if card generate is allowed at the time of try creating 
 if (!$this->config->check_user_activity_allowed("card_generator")) {
 	// code...
 	$this->response =$this->alert->alert_toastr("error","Oops! PIN Creation is not allowed at the Moment!",__OSO_APP_NAME__." Says");
 	}else{
 	switch ($t) {
 		case 'rp':
 	// determine which table to create
 		$this->_table_ = "tbl_reg_pins";
 		$this->_Pins_code = 13;
 		$this->_Pins_serial = 6;
 		$this->_Pins_prefix ="SMA";
 		$this->_pin_desc_ ="Registration Pins";
 		$this->redirectedPage ='regPin';
 			break;
 			case 'rcp':
 		// determine which table to create
 		$this->_table_ = "tbl_result_pins";
 		$this->_Pins_code = 12;
 		$this->_Pins_serial = 5;
 		$this->_Pins_prefix ="SMR";
 		$this->_pin_desc_ ="Result Checker Pins";
 		$this->redirectedPage ='resPin';
 			break;
 			case 'ep':
 		// determine which table to create
 		$this->_table_ = "tbl_exam_pins";
 		$this->_Pins_code = 12;
 		$this->_Pins_serial = 4;
 		$this->_Pins_prefix ="WXVE";
 		$this->_pin_desc_ ="Examination Pins";
 		$this->redirectedPage ='examPin';
 			break;

 			case 'ewp':
 		// determine which table to create
 		$this->_table_ = "tbl_ewallet_pins";
 		$this->_Pins_code = 10;
 		$this->_Pins_serial = 3;
 		$this->_Pins_prefix ="WXVW";
 		$this->_pin_desc_ ="e-Wallet Pins";
 		$this->redirectedPage ='walletPin';
 			break;
 		// default:
 		// 	// code...
 		// 	break;
 	}
 	//set pin codes 
 	$alpha 	= md5("LVMGWAABFCRSHIJKPEXZNOPYQTU");
 	$nums 	= "893701245632156";
 	$alpha2 = md5("LMNOPQRSTUVWXYZABCDEFGHIJK");
 	$nums2 	= "567980123489543";
 	$alpha3 = md5("STUVWXLMNOPQRYZGHIJKABCDEF");
 	$nums3 	= "978562390141696";
 	$alpha4 = md5("SHJKABCDTUVWXLMNOPQRYZGEFI");
 	$nums4 ='723910856412345';
 	$alpha5 = md5("SHJKATUVWXLBCDMNOPQRYZGEFI");
 	$nums5 ='723910856412013';
 	$created_at = date('Y-m-d');
    // $key = "";
    // $serial = "";
    $countInserted=0;
    for ($i=1; $i <=$q; $i++) { 
    	// let reshuffle 
    	@$pn = str_shuffle(substr($nums,mt_rand(0,(strlen($nums)-$this->_Pins_code)),$this->_Pins_code));
    	@$sn = strtoupper($this->_Pins_prefix.str_shuffle(substr($alpha, mt_rand(0,(strlen($alpha)-$this->_Pins_serial)),$this->_Pins_serial)));
    	 // check if pin already exists in db
    	$this->query ="SELECT COUNT(*) AS cnt FROM $this->_table_ WHERE pin_code=? OR pin_serial=?";
    	$this->stmt =$this->dbh->prepare($this->query);
    	$this->stmt->execute(array($pn,$sn));
    	 $fetch_objX = $this->stmt->fetch();
    	 $count_check1 = $fetch_objX->cnt;
    	 if ($count_check1 >=1) {
    	 	 // do a kind of reshuffle again
    	 @$pn = str_shuffle(substr($nums2,mt_rand(0,(strlen($nums2)-$this->_Pins_code)),$this->_Pins_code));
    	@$sn = strtoupper($this->_Pins_prefix.str_shuffle(substr($alpha2, mt_rand(0,(strlen($alpha2)-$this->_Pins_serial)),$this->_Pins_serial)));
    	 //check for the second time
    	$this->query ="SELECT COUNT(*) AS cnt FROM $this->_table_ WHERE pin_code=? OR pin_serial=?";
    	$this->stmt =$this->dbh->prepare($this->query);
    	$this->stmt->execute(array($pn,$sn));
    	 $fetch_objX2 = $this->stmt->fetch();
    	 $count_check2 = $fetch_objX2->cnt;
    	 if ($count_check2 >= 1) {
    // do a kind of reshuffle again
    	@$pn = str_shuffle(substr($nums3,mt_rand(0,(strlen($nums3)-$this->_Pins_code)),$this->_Pins_code));
    	@$sn = strtoupper($this->_Pins_prefix.str_shuffle(substr($alpha3, mt_rand(0,(strlen($alpha3)-$this->_Pins_serial)),$this->_Pins_serial)));
    //check for the third time
    $this->query ="SELECT COUNT(*) AS cnt FROM $this->_table_ WHERE pin_code=? OR pin_serial=?";
    	$this->stmt =$this->dbh->prepare($this->query);
    	$this->stmt->execute(array($pn,$sn));
    	 $fetch_objX3 = $this->stmt->fetch();
    	 $count_check3 = $fetch_objX3->cnt;
    	 if ( $count_check3 >= 1) {
    	 	// do a kind of reshuffle again
    	 	@$pn = str_shuffle(substr($nums4,mt_rand(0,(strlen($nums4)-$this->_Pins_code)),$this->_Pins_code));
    	@$sn = strtoupper($this->_Pins_prefix.str_shuffle(substr($alpha4, mt_rand(0,(strlen($alpha4)-$this->_Pins_serial)),$this->_Pins_serial)));
    	 //check for the fourth time
    	$this->query ="SELECT COUNT(*) AS cnt FROM $this->_table_ WHERE pin_code=? OR pin_serial=?";
    	$this->stmt =$this->dbh->prepare($this->query);
    	$this->stmt->execute(array($pn,$sn));
    	 $fetch_objX4 = $this->stmt->fetch();
    	 $count_check4 = $fetch_objX4->cnt;
    	 if ($count_check4 >= 1) {
    	 	// reshuffle for the last time
    	 	@$pn = str_shuffle(substr($nums5,mt_rand(0,(strlen($nums5)-$this->_Pins_code)),$this->_Pins_code));
    	@$sn = strtoupper($this->_Pins_prefix.str_shuffle(substr($alpha5, mt_rand(0,(strlen($alpha5)-$this->_Pins_serial)),$this->_Pins_serial)));
    	 }
    	 }
    	 }
    	 }
    	 //insert into whichever table
   $this->query ="INSERT INTO $this->_table_ (pin_code,pin_serial,pin_desc,price,created_at) VALUES(?,?,?,?,?)";
    $this->stmt =$this->dbh->prepare($this->query);
    $this->stmt->execute(array($pn,$sn,$this->_pin_desc_,$p,$created_at));
     $rowCount = $this->stmt->rowCount();
    $countInserted = $countInserted + $rowCount;
    }
    if ($this->stmt!=NULL) {
    	// code...
    $this->response =$this->alert->alert_toastr("success","You have Successfully Generated <b>".$countInserted." ".$this->_pin_desc_."",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{window.location.href='".$this->redirectedPage."';},1000)</script>";
    }else{
    $this->response = $this->alert->alert_toastr("error",$lang['server_error'],__OSO_APP_NAME__." Says");
    }
 }
		}
return $this->response;
unset($this->dbh);
	}

public function get_pins($table){
		if (! empty($table)) {
			$this->query ="SELECT * FROM $table ORDER BY pin_id DESC";
			$this->stmt =$this->dbh->prepare($this->query);
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
				$this->response = $this->stmt->fetchAll();
				return $this->response;
			}
		}
	}

	public function removeUsedResultPin($table,$pinId){
		if (!$this->config->isEmptyStr($pinId)) {
			try {
		$this->dbh->beginTransaction();
		if ($table === "tbl_result_pins") {
			$pinHistory = self::getPinsByCodeSerial("tbl_result_pins",$pinId);
				$oldPin = $pinHistory->pin_code;
				$oldSerial = $pinHistory->pin_serial;
				//Delete the selected Subject
		$this->stmt = $this->dbh->prepare("DELETE FROM `tbl_result_pins_history` WHERE pin_code=? AND pin_serial=? LIMIT 1");
	if ($this->stmt->execute([$oldPin,$oldSerial])) {
		$this->stmt = $this->dbh->prepare("DELETE FROM `tbl_result_pins` WHERE pin_id=? LIMIT 1");
		if ($this->stmt->execute([$pinId])) {
		 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Pin Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.href='resPin';
			},800);</script>";
		}
	}
			}else{
$this->stmt = $this->dbh->prepare("DELETE FROM `$table` WHERE pin_id=? LIMIT 1");
		if ($this->stmt->execute([$pinId])) {
		 $this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Pin Deleted Successfully",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
			window.location.href='./';
			},500);</script>";
		}
			}
			} catch (PDOException $e) {
		$this->dbh->rollback();
    $this->response  = $this->alert->alert_toastr("error","Failed to Delete Pin: Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}

			return $this->response;
				unset($this->dbh);
		}
	}

	//count scratch Card by table name
	public function count_scratch_pins(string $table){
		if (!empty($table)) {
			$this->query ="SELECT count(pin_id) as cnt FROM $table WHERE pin_status=0";
			$this->stmt =$this->dbh->prepare($this->query);
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
				$data_count =$this->stmt->fetch();
				$this->response = $data_count->cnt;
				return $this->response;
				unset($this->dbh);
			}
		}
	}

	//count used scratch Card by table name
	public function count_used_scratch_pins(string $table){
		if (!empty($table)) {
			$this->query ="SELECT count(pin_id) as cnt FROM $table WHERE pin_status=1";
			$this->stmt =$this->dbh->prepare($this->query);
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
				$data_count =$this->stmt->fetch();
				$this->response = $data_count->cnt;
				return $this->response;
				unset($this->dbh);
			}
		}
	}

	public function get_pin_card_user_by_code_serial($code,$serial){
		if (!empty($code) && !empty($serial)) {
			$this->query ="SELECT * FROM `tbl_result_pins_history` WHERE pin_code=? AND pin_serial=? LIMIT 1";
			$this->stmt =$this->dbh->prepare($this->query);
			$this->stmt->execute(array($code,$serial));
			if ($this->stmt->rowCount()>0) {
				$this->response =$this->stmt->fetch();
				return $this->response;
				unset($this->dbh);
			}
		}
	}

	public function get_admission_pin_card_user($code,$serial){
		if (!empty($code) && !empty($serial)) {
			$this->query ="SELECT * FROM `reg_pin_history_tbl` WHERE pin_code=? AND pin_serial=? LIMIT 1";
			$this->stmt =$this->dbh->prepare($this->query);
			$this->stmt->execute(array($code,$serial));
			if ($this->stmt->rowCount()>0) {
				$this->response =$this->stmt->fetch();
				return $this->response;
				unset($this->dbh);
			}
		}
	}

	//get pin by Id
	public function getPinsByCodeSerial($table,$pinId){
		if (!empty($pinId)) {
			$this->stmt =$this->dbh->prepare("SELECT * FROM `$table` WHERE pin_id=? LIMIT 1");
			$this->stmt->execute([$pinId]);
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->stmt->fetch();
				return $this->response;
			}
		}
	}

	 public function get_scratch_card_usage($pin,$serial,$stdRegNo){
        $this->stmt = $this->dbh->prepare("SELECT * FROM `tbl_result_pins_history` WHERE pin_code=? AND pin_serial=? AND studentRegNo=? LIMIT 1");
        $this->stmt->execute(array($pin,$serial,$stdRegNo));
        if ($this->stmt->rowCount()==1) {
            $res = $this->stmt->fetch();
            $this->response = $res->pin_counter;
            return $this->response;
            unset($this->dbh);
        }

    }
}