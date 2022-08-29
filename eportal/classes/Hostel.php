<?php
@session_start();
require_once "Database.php";
require_once "Configuration.php";
class Hostel {
	private $dbh;
	protected $stmt;
	protected $response;
	protected $config;
	protected $table_name ="visap_hostel_tbl";

	public function __construct(){
		$this->dbh = null;
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	//Hostel management methods start
	public function createNewHostel($data){
		$name = $this->config->Clean($data['hostel_name']);
		$hostel_type = $this->config->Clean($data['type']);
		$status = $this->config->Clean($data['hostel_status']);
		$hostel_master = $this->config->Clean($data['master']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//check for empty
		if ($this->config->isEmptyStr($name) || $this->config->isEmptyStr($hostel_type) || $this->config->isEmptyStr($status) || $this->config->isEmptyStr($auth_pass)) {
		$this->response = $this->alert->alert_toastr("error","All fileds are required, Please try again!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code, Please try again!",__OSO_APP_NAME__." Says");
		}elseif (self::checkDataExists($this->table_name,"hostel_desc","hostel_type",$name,$hostel_type) == true) {
		$this->response = $this->alert->alert_toastr("error","$name already Exists, Check the name and try again!",__OSO_APP_NAME__." Says");
		}else{
			//create the new hostel 
			try {
		$this->dbh->beginTransaction();
  		$created_at = date("Y-m-d");
    	$this->stmt = $this->dbh->prepare("INSERT INTO `{$this->table_name}` (`hostel_desc`,`hostel_type`,`status`,`hostel_master`, `created_at`) VALUES (?,?,?,?,?);");
    	if ($this->stmt->execute(array($name,$hostel_type,$status,$hostel_master,$created_at))) {
    		$this->dbh->commit();
    	$this->response = $this->alert->alert_toastr("success",ucwords($name)." Created  Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
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
			$this->dbh = null;
	}

	public function createHostelRoomsAndBedSpace($data){
		
		$amount = $this->config->Clean($data['amount_per_session']);
		$hostel_id = $this->config->Clean($data['hId']);
		$room_name = $this->config->Clean($data['roomname']);
		$beds = $this->config->Clean($data['bed_space']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		if ($this->config->isEmptyStr($hostel_id) || $this->config->isEmptyStr($room_name) || $this->config->isEmptyStr($amount) || $this->config->isEmptyStr($beds) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","All fileds are required, Please try again!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code, Please try again!",__OSO_APP_NAME__." Says");
		}elseif (self::checkDataExists("visap_hostel_rooms_tbl","room_desc","hostel_id",$room_name,$hostel_id) == true) {
		$this->response = $this->alert->alert_toastr("error","$room_name already Exists, Check the name and try again!",__OSO_APP_NAME__." Says");
		}else{
			try {
		$this->dbh->beginTransaction();
  		$created_at = date("Y-m-d");
    	$this->stmt = $this->dbh->prepare("INSERT INTO `visap_hostel_rooms_tbl` (`hostel_id`,`room_desc`,`beds`,`amount`, `created_at`) VALUES (?,?,?,?,?);");
    	if ($this->stmt->execute(array($hostel_id,$room_name,$beds,$amount,$created_at))) {
    		$lastCreatedId = $this->dbh->lastInsertId();
    		$countInserted = 0;
    		//lets create Bonks based on the Number of Beds Space provided
    		for ($counter=1; $counter <= (int)$beds; $counter++) { 
    			$beds_desc = "Bonk-".$counter;
    			//insert into bed_space table visap_bed_space_tbl
    		$this->stmt = $this->dbh->prepare("INSERT INTO `visap_bed_space_tbl` (`hostel_id`,`room_id`,`room`,`bed_space`,`amount`) VALUES (?,?,?,?,?);");
    		$this->stmt->execute ([$hostel_id,$lastCreatedId,$room_name,$beds_desc,$amount]);
    		 $countInserted = $countInserted + $this->stmt->rowCount();
    		}
    		if ($this->stmt->rowCount() > 0) {
    			$this->dbh->commit();
    	$this->response = $this->alert->alert_toastr("success",ucwords($room_name)." with $countInserted Bed Spaces was Created  Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
    		}
    	
    	}else{
    		$this->response = $this->alert->alert_toastr("error","Unknown Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    	}
			} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}
		}

		return $this->response;
			$this->dbh = null;
		
	}

	public function updateHostelById($data){
		$hostel_id = $this->config->Clean($data['hosId']);
		$action = $this->config->Clean($data['myEnableAction']);
		switch ($action) {
			case 'enable':
				$status = 1;
				break;
				case 'disable':
				$status = 0;
				break;
			
			default:
				$status = 0;
				break;
		}
		//update query
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("UPDATE `{$this->table_name}` SET status=? WHERE hostel_id=? LIMIT 1");
		if ($this->stmt->execute([$status,$hostel_id])) {
			$this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Hostel Updated Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
		}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
		}
		return $this->response;
			$this->dbh = null;
	}

	public function getHostels(){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->table_name}` ORDER BY hostel_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllRooms(){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_hostel_rooms_tbl` ORDER BY room_desc ASC");
		$this->stmt->execute();
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getHostelById($hostel_id){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->table_name}` WHERE hostel_id=? LIMIT 1");
		$this->stmt->execute([$hostel_id]);
		if ($this->stmt->rowCount() ==1) {
			$this->response =$this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getHostelRoomById($room_id){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_hostel_rooms_tbl` WHERE roomId=? LIMIT 1");
		$this->stmt->execute([$room_id]);
		if ($this->stmt->rowCount() ==1) {
			$this->response =$this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllHostelRoomsByHostelId($hostel_id){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_hostel_rooms_tbl` WHERE hostel_id=?");
		$this->stmt->execute([$hostel_id]);
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllBedSpaceByRoomId($rId){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_space_tbl` WHERE room_id=? ORDER BY bedId ASC");
		$this->stmt->execute([$rId]);
		if ($this->stmt->rowCount()>0) {
			$this->response =$this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getBedSpaceById($beid){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_space_tbl` WHERE bedId=? LIMIT 1");
		$this->stmt->execute([$beid]);
		if ($this->stmt->rowCount() ==1) {
			$this->response =$this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function delete_hostel_ById($hostel_id){}

	public function delete_hostel_room_ById($hostel_id,$room_id){}

	private function checkDataExists($querytable,$field1,$field2,$val1,$val2) :bool {
		if (!$this->config->isEmptyStr($field1) && ! $this->config->isEmptyStr($field2)) {
			$this->stmt = $this->dbh->prepare("SELECT * FROM `{$querytable}` WHERE `{$field1}` =? AND `{$field2}`=?");
			$this->stmt->execute([$val1,$val2]);
			$rowCount = $this->stmt->rowCount();
			return $rowCount >= 1 ? true : false;
			$this->dbh = null;
		}
	}

	public function getHostelsInDropDownMenu(){
		$this->response ="";
	$this->stmt = $this->dbh->prepare("SELECT * FROM `{$this->table_name}` ORDER BY hostel_desc ASC LIMIT 30");
			$this->stmt->execute();
			if ($this->stmt->rowCount()>0) {
			while ($row = $this->stmt->fetch()) {
		$this->response.='<option value="'.$row->hostel_id.'">'.$row->hostel_desc.' &raquo;'.$row->hostel_type.'</option>';
			}
			}else{
			$this->response = false;
			}
			return $this->response;
			$this->dbh = null;
	}

	public function countDataByTableColumn($table,$column_name){
		$this->stmt = $this->dbh->prepare("SELECT count(`{$column_name}`) as cnt FROM `{$table}`");
		$this->stmt->execute();
		if ($this->stmt->rowCount()>0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function countSumOfTotalBeds($hostelId){
		$this->stmt = $this->dbh->prepare("SELECT sum(`beds`) as total_beds FROM `visap_hostel_rooms_tbl` WHERE hostel_id=?");
		$this->stmt->execute([$hostelId]);
		if ($this->stmt->rowCount()>0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->total_beds;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function countBedSpaceByStatus($hostel_id, int $status){
		$this->stmt = $this->dbh->prepare("SELECT count(`bedId`) as cnt FROM `visap_bed_space_tbl` WHERE hostel_id=? AND is_available=?");
		$this->stmt->execute([$hostel_id,$status]);
		if ($this->stmt->rowCount()>0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function countBedByStatus(int $status){
		$this->stmt = $this->dbh->prepare("SELECT count(`bedId`) as cnt FROM `visap_bed_space_tbl` WHERE is_available=?");
		$this->stmt->execute([$status]);
		if ($this->stmt->rowCount()>0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function countBedSpaceByHostelIdRoomIdByStatus($hostel_id,$room_id, int $status){
		$this->stmt = $this->dbh->prepare("SELECT count(`bedId`) as cnt FROM `visap_bed_space_tbl` WHERE hostel_id=? AND room_id=? AND is_available=?");
		$this->stmt->execute([$hostel_id,$room_id,$status]);
		if ($this->stmt->rowCount()>0) {
			$rows = $this->stmt->fetch();
			$this->response = $rows->cnt;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function assignHostelBedspaceToStudent($data){
			$bonkId = $this->config->Clean($data['hidden_id']);
			$amount = $this->config->Clean($data['pricePeryear']);
			$paid = $this->config->Clean($data['amount_paid']);
			$studentId = $this->config->Clean($data['occupant_id']);
			$duration = $this->config->Clean($data['duration']);
			$paymentExp = $this->config->Clean(date("Y-m-d",strtotime($data['expiry_date'])));
			$auth_pass = $this->config->Clean($data['auth_code']);
			//check for null values 
			if ($this->config->isEmptyStr($bonkId) || $this->config->isEmptyStr($paid) || $this->config->isEmptyStr($amount) || $this->config->isEmptyStr($studentId) || $this->config->isEmptyStr($duration) || $this->config->isEmptyStr($paymentExp) || $this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error","All fileds are required, Please try again!",__OSO_APP_NAME__." Says");
		}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code, Please try again!",__OSO_APP_NAME__." Says");
		}elseif (self::bedSpaceAlreadyBooked($bonkId,$studentId) == true) {
		$this->response = $this->alert->alert_toastr("error","This Bed Space is already Booked, Please try another Bonk!",__OSO_APP_NAME__." Says");
		}elseif ($paid > $amount) {
			$this->response = $this->alert->alert_toastr("error","Invalid Payment Amount, Please try again!",__OSO_APP_NAME__." Says");
		}
		else{
			$total_due_bal = intval($amount - $paid);
			try {
				$this->dbh->beginTransaction();
  				$created_at = date("Y-m-d");
  			//lets update the bed space table
  				$payment_status = intval(($amount === $paid)) ? 2 : 1;
  				$status_changed =2;
  	$this->stmt = $this->dbh->prepare("UPDATE `visap_bed_space_tbl` SET is_available=?,occupant=?,book_duration=?,booked_today=?,amount_paid=?,payment_status=?,school_session=?,payment_expire=? WHERE bedId=? LIMIT 1");
  		if ($this->stmt->execute([$status_changed,$studentId,$duration,$created_at,$paid,$payment_status,$duration,$paymentExp,$bonkId])) {
  			$receiptNo = mt_rand(100,9999999);
  			//let create payment history table
  			$this->stmt = $this->dbh->prepare("INSERT INTO `visap_bed_payment_history_tbl` (`student_id`,`bed_id`,`amount`,`amount_paid`,`amount_due`,`status`,`payment_date`,`receiptNo`) VALUES (?,?,?,?,?,?,?,?);");
    		if ($this->stmt->execute ([$studentId,$bonkId,$amount,$paid,$total_due_bal,$payment_status,$created_at,$receiptNo])) {
    			$this->dbh->commit();
			$this->response = $this->alert->alert_toastr("success","Hostel Assigned and Payment submitted Successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},500);</script>";
    		}else{
    $this->response = $this->alert->alert_toastr("error","Server Error Occured, Please try again!",__OSO_APP_NAME__." Says");
    		}
  		}
				
			} catch (PDOException $e) {
	$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");
			}

		}

		return  $this->response;
		$this->dbh = null;
	}

	public function updateStudentBedPayment($data){
			$bonkId = $this->config->Clean($data['bonkHiddenId']);
			$amount = $this->config->Clean($data['pricePeryear']);
			$balance = $this->config->Clean($data['balance']);
			$topup_amount = $this->config->Clean($data['topuppaid']);
			$studentId = $this->config->Clean($data['occupant_id']);
			$auth_pass = $this->config->Clean($data['auth_code']);
			if ($this->config->isEmptyStr($bonkId) || $this->config->isEmptyStr($topup_amount) || $this->config->isEmptyStr($amount) || $this->config->isEmptyStr($studentId) || $this->config->isEmptyStr($auth_pass)) {
				$this->response = $this->alert->alert_toastr("error","All fileds are required, Please try again!",__OSO_APP_NAME__." Says");
			}elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
		$this->response = $this->alert->alert_toastr("error","Invalid Authentication Code, Please try again!",__OSO_APP_NAME__." Says");
			}elseif ($topup_amount > $balance) {
		$this->response = $this->alert->alert_toastr("error","Invalid Payment Amount, Please try again!",__OSO_APP_NAME__." Says");
			}else{
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_space_tbl` WHERE occupant=? AND bedId=? LIMIT 1 ");
  				$this->stmt->execute(array($studentId,$bonkId));
  				if ($this->stmt->rowCount() == 1) {
  					$result = $this->stmt->fetch();
  					$updatedBal = intval($result->amount_paid + $topup_amount); 
  					$actutalCharge = intval($result->amount);
  					$payment_status = intval(($actutalCharge === $updatedBal)) ? 2 : 1;
  					$status_changed =2;
  					$total_due_bal = intval($balance - $topup_amount);
  					try {
  						$this->dbh->beginTransaction();
  				$created_at = date("Y-m-d");
  				$this->stmt = $this->dbh->prepare("UPDATE `visap_bed_space_tbl` SET amount_paid=?,payment_status=? WHERE bedId=? AND occupant=? LIMIT 1");
  				if ($this->stmt->execute(array($updatedBal,$payment_status,$bonkId,$studentId))) {
  					$receiptNo = mt_rand(100,9999999);
  					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_bed_payment_history_tbl` (`student_id`,`bed_id`,`amount`,`amount_paid`,`amount_due`,`status`,`payment_date`,`receiptNo`) VALUES (?,?,?,?,?,?,?,?);");
    		if ($this->stmt->execute ([$studentId,$bonkId,$amount,$topup_amount,$total_due_bal,$payment_status,$created_at,$receiptNo])) {
    			$this->dbh->commit();
    			$this->dbh = null;
			$this->response = $this->alert->alert_toastr("success","Payment submitted and updated successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
    		}
  				}
  					} catch (PDOException $e) {
  					$this->dbh->rollback();
					$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");	
  					}
  					}	
			}
		return  $this->response;
			
}

	//check hostel already booked 

	protected function bedSpaceAlreadyBooked($bedId,$stuId){
		if (!$this->config->isEmptyStr($bedId) && ! $this->config->isEmptyStr($stuId)) {
			$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_space_tbl` WHERE `occupant`=? AND `bedId`=? LIMIT 1");
			$this->stmt->execute([$stuId,$bedId]);
			$rowCount = $this->stmt->rowCount();
			return $rowCount == 1 ? true : false;
			$this->dbh = null;
		}
	}

	public function getHostelPaymentInfo($studentId,$bedId){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_payment_history_tbl` WHERE `student_id`=? AND `bed_id`=? ORDER BY payment_date");
		$this->stmt->execute([$studentId,$bedId]);
		if ($this->stmt->rowCount() > 0) {
			 $this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getSumofTotalPaid($studentId,$bedId){
		$this->stmt = $this->dbh->prepare("SELECT sum(`amount_paid`) as paid FROM `visap_bed_payment_history_tbl` WHERE `student_id`=? AND `bed_id`=?");
		$this->stmt->execute([$studentId,$bedId]);
		if ($this->stmt->rowCount() > 0) {
			$rcount = $this->stmt->fetch();
			 $this->response = $rcount->paid;
			return $this->response;
			$this->dbh = null;
		}
	}
	public function get_receiptByPaymentId($paymentid){
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_bed_payment_history_tbl` WHERE `id`=? LIMIT 1");
		$this->stmt->execute([$paymentid]);
		if ($this->stmt->rowCount() == 1) {
			 $this->response = $this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function checkOutStudentFromBedSpace($data){
			$studentId = $this->config->Clean($data['stId']);
			$bonkId = $this->config->Clean($data['beId']);
			try {
			$this->dbh->beginTransaction();
  			$created_at = date("Y-m-d");
  			$this->stmt = $this->dbh->prepare("UPDATE `visap_bed_space_tbl` SET is_available=1, occupant =NULL,book_duration=NULL,booked_today=NULL,amount_paid=NULL,payment_status=0,school_session=NULL,payment_expire=NULL WHERE bedId=? AND occupant=? LIMIT 1");	
				if ($this->stmt->execute([$studentId,$bonkId])) {
					$this->stmt = $this->dbh->prepare("DELETE FROM `visap_bed_payment_history_tbl` WHERE student_id=? AND bed_id=?");
					if ($this->stmt->execute([$studentId,$bonkId])) {
				$this->dbh->commit();
    			$this->dbh = null;
			$this->response = $this->alert->alert_toastr("success","Checkout successfully!",__OSO_APP_NAME__." Says")."<script>setTimeout(()=>{
							window.location.reload();
						},1000);</script>";
					}
			
				}
			} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response = $this->alert->alert_toastr("error","Error Occurred: ".$e->getMessage(),__OSO_APP_NAME__." Says");		
			}

		return $this->response;
	}
	//Hostel management methods end
}