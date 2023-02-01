<?php
require_once "Database.php";
require_once "Configuration.php";
class Parents
{
	private $dbh;
	protected $stmt;
	protected $response;
	protected $config;
	protected $table = "visap_parents_tbl";
	
	public function __construct()
	{
		$this->dbh = osotech_connect();
		$this->alert = new Alert();
		$this->config = new Configuration();
	}

	public function registerParent(array $data)
	{
		$title = $this->config->Clean($data['title']);
		$fname = $this->config->Clean($data['first_name']);
		$lname = $this->config->Clean($data['last_name']);
		$phone = $this->config->Clean($data['mobile']);
		$email = $this->config->Clean($data['email']);
		$address = $this->config->Clean($data['address']);
		$pta_status = $this->config->Clean($data['pta_status']);
		$gender = $this->config->Clean($data['sex']);
		$occupation = $this->config->Clean($data['occupation']);
		$auth_pass = $this->config->Clean($data['auth_code']);

		//check for null values 

		if ($this->config->isEmptyStr($title) ||$this->config->isEmptyStr($fname) || $this->config->isEmptyStr($lname) || $this->config->isEmptyStr($phone) || $this->config->isEmptyStr($email) || $this->config->isEmptyStr($occupation) || $this->config->isEmptyStr($address) || $this->config->isEmptyStr($gender) || $this->config->isEmptyStr($pta_status)) {

			$this->response = $this->alert->alert_toastr("error", "All fields are Required!", __OSO_APP_NAME__ . " Says");

		} elseif ($this->config->isEmptyStr($auth_pass)) {

			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . " Says");

		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {

			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");

		}elseif(!$this->config->is_Valid_Email($email)){

			$this->response = $this->alert->alert_toastr("error", "Please enter a valid e-mail address!", __OSO_APP_NAME__ . " Says");

		}else if($this->config->check_single_data($this->table,"email", $email)){
			$this->response = $this->alert->alert_toastr("error", "$email is already taken!", __OSO_APP_NAME__ ." Says");
		}else {
			$datetime = date("Y-m-d h:i:s");
			try {
				
				$this->dbh->beginTransaction();
				$query = "INSERT INTO `{$this->table}` (title,fname,lname,phone,email,`address`,occupation,gender,pta_post,created_at) VALUES (?,?,?,?,?,?,?,?,?,?);";
				$this->stmt = $this->dbh->prepare($query);
				if($this->stmt->execute([$title,$fname,$lname,$phone,$email,$address,$occupation,$gender,$pta_status,$datetime])){
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "$fname $lname was added successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.reload();
			},1000);</script>";

				} else {
					$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred!, Please try again", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred!, Please try again", __OSO_APP_NAME__ . " Says");
			}

		}

		return $this->response;
	}

	public function getAllParents()
	{
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`fname`,' ',`lname`) as full_name FROM {$this->table} ORDER BY id DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
		$this->response = $this->stmt->fetchAll();
		return $this->response;

		}
	}

	public function getParentById($id)
	{
		$this->stmt = $this->dbh->prepare("SELECT *,concat(`fname`,' ',`lname`) as full_name FROM {$this->table} WHERE id=? LIMIT 1");
		$this->stmt->execute([$id]);
		if ($this->stmt->rowCount() > 0) {
		$this->response = $this->stmt->fetch();
		return $this->response;
	}
		}


		public function UpdateParentDetails(array $data)
	{
		$id = $this->config->Clean($data['parent_id']);
		$title = $this->config->Clean($data['title']);
		$fname = $this->config->Clean($data['first_name']);
		$lname = $this->config->Clean($data['last_name']);
		$phone = $this->config->Clean($data['mobile']);
		$email = $this->config->Clean($data['email']);
		$address = $this->config->Clean($data['address']);
		$pta_status = $this->config->Clean($data['pta_status']);
		$gender = $this->config->Clean($data['sex']);
		$occupation = $this->config->Clean($data['occupation']);
		$auth_pass = $this->config->Clean($data['auth_code']);

		//check for null values 

		if ($this->config->isEmptyStr($id) || $this->config->isEmptyStr($title) || $this->config->isEmptyStr($fname) || $this->config->isEmptyStr($lname) || $this->config->isEmptyStr($phone) || $this->config->isEmptyStr($email) || $this->config->isEmptyStr($occupation) || $this->config->isEmptyStr($address) || $this->config->isEmptyStr($gender) || $this->config->isEmptyStr($pta_status)) {

			$this->response = $this->alert->alert_toastr("error", "All fields are Required!", __OSO_APP_NAME__ . " Says");

		} elseif ($this->config->isEmptyStr($auth_pass)) {

			$this->response = $this->alert->alert_toastr("error", "Authentication Code is Required!", __OSO_APP_NAME__ . " Says");

		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {

			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");

		}elseif(!$this->config->is_Valid_Email($email)){

			$this->response = $this->alert->alert_toastr("error", "Please enter a valid e-mail address!", __OSO_APP_NAME__ . " Says");

		}else {
			//$datetime = date("Y-m-d h:i:s");
			try {
				
				$this->dbh->beginTransaction();
				$query = "UPDATE `{$this->table}` SET title=?,fname=?,lname=?,phone=?,email=?,`address`=?,occupation=?,gender=?,pta_post=? WHERE id=? LIMIT 1";
				$this->stmt = $this->dbh->prepare($query);
				if($this->stmt->execute([$title,$fname,$lname,$phone,$email,$address,$occupation,$gender,$pta_status,$id])){
					$this->dbh->commit();
					$this->response = $this->alert->alert_toastr("success", "Data updated successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
			window.location.href='./parents';
			},1000);</script>";

				} else {
					$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred!, Please try again", __OSO_APP_NAME__ . " Says");
				}
			} catch (PDOException $e) {
				$this->dbh->rollback();
				$this->response = $this->alert->alert_toastr("error", "Internal Error Occurred!, Please try again", __OSO_APP_NAME__ . " Says");
			}

		}

		return $this->response;
	}
}