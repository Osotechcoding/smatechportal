<?php

/**
 * 
 */

require_once "Database.php";
require_once "Configuration.php";
class Payroll
{

	private $dbh; //database connection
	protected $query; //querying database
	protected $stmt; //database statement
	protected $response; //database result
	protected $config; //default config

	public function __construct()
	{
		$this->dbh = osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	//show all payrolls and display them
	public function index()
	{
		$this->stmt =	$this->dbh->prepare("SELECT * FROM `visap_staff_payroll_tbl` ORDER BY DATE(`created_at`) DESC");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}

	//show single payroll by id
	public function showPayrollByStaffId($staffId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_payroll_tbl` WHERE staff_id=? LIMIT 1");
		$this->stmt->execute([$staffId]);
		if ($this->stmt->rowCount() == '1') {
			$this->response = $this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getStaffPaidSalaryById($salaId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_paid_salary_tbl`WHERE salaryId = ? LIMIT 1");
		$this->stmt->execute([$salaId]);
		if ($this->stmt->rowCount() == '1') {
			$this->response = $this->stmt->fetch();
			return $this->response;
			$this->dbh = null;
		}
	}

	public function showStaffSalaryHistoryById($staffId)
	{
		$this->stmt = $this->dbh->prepare("SELECT * FROM `visap_staff_paid_salary_tbl` WHERE staff_id=? ORDER BY DATE(`created_at`) DESC");
		$this->stmt->execute([$staffId]);
		if ($this->stmt->rowCount() > 0) {
			$this->response = $this->stmt->fetchAll();
			return $this->response;
			$this->dbh = null;
		}
	}
	//start to create a staff Payroll
	public function create($data)
	{
		$staff_name = $this->config->Clean($data['staffId']);
		$salary = $this->config->Clean($data['basic_salary']);
		$rent_alawi = $this->config->Clean($data['rent']) ?? 0;
		$transport_alawi = $this->config->Clean($data['transport']) ?? 0;
		$cloth_alawi = $this->config->Clean($data['cloth']) ?? 0;
		$med_alawi = $this->config->Clean($data['med']) ?? 0;
		$tds = $this->config->Clean($data['tds_tax']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//check if auth is set
		if ($this->config->isEmptyStr($staff_name) || $this->config->isEmptyStr($salary) || $this->config->isEmptyStr($tds)) {

			$this->response = $this->alert->alert_toastr("error", "Invalid submission, Please check and try again!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication Code is required!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("info", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} else {
			//check for duplicate entry in db
			$this->stmt = $this->dbh->prepare("SELECT payrollId FROM `visap_staff_payroll_tbl` WHERE staff_id=? LIMIT 1");
			$this->stmt->execute(array($staff_name));
			if ($this->stmt->rowCount() == 1) {
				$this->response = $this->alert->alert_toastr("error", "Salary is already allocated for the selected staff!", __OSO_APP_NAME__ . " Says");
			} else {
				//create a fresh payroll for the staff
				$net_salary = intval(($salary + $rent_alawi + $transport_alawi + $cloth_alawi + $med_alawi) - ($tds));
				$created_at = date("Y-m-d");
				try {
					$this->dbh->beginTransaction();
					$this->stmt = $this->dbh->prepare("INSERT INTO `visap_staff_payroll_tbl` (staff_id,salary,rent_alawi,transport_alawi,cloth_alawi,med_alawi,tds,net_salary,created_at) VALUES (?,?,?,?,?,?,?,?,?);");
					if ($this->stmt->execute(array($staff_name, $salary, $rent_alawi, $transport_alawi,	$cloth_alawi, $med_alawi, $tds, $net_salary, $created_at))) {
						$this->dbh->commit();
						$this->dbh = null;
						$this->response = $this->alert->alert_toastr("success", "Payroll Saved successfully, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error", " Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
	}
	//remove payroll by id
	public function destroy($id)
	{
		try {
			$this->dbh->beginTransaction();
			$this->stmt = $this->dbh->prepare("DELETE FROM `visap_staff_payroll_tbl` WHERE payrollId=? LIMIT 1");
			if ($this->stmt->execute(array($id))) {
				$this->dbh->commit();
				$this->dbh = null;
				$this->response = $this->alert->alert_toastr("success", "Payroll Saved successfully, Please wait... ", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.reload();
			},500);</script>";
			}
		} catch (PDOException $e) {
			$this->dbh->rollback();
			$this->response  = $this->alert->alert_toastr("error", " Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
		}
	}

	//STAFF PAYROLL METHOD
	public function get_payrollById($pId, $staffId)
	{
		$this->stmt =	$this->dbh->prepare("SELECT * FROM `visap_staff_payroll_tbl` WHERE payrollId=? AND staff_id=? LIMIT 1");
		$this->stmt->execute([$pId, $staffId]);
		if ($this->stmt->rowCount() == 1) {
			$this->response = $this->stmt->fetch();
			return json_encode($this->response);
			$this->dbh = null;
		}
	}


	public function getAllRentAlawi()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`rent_alawi`) as rent FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->rent;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllTransportAlawi()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`transport_alawi`) as mobile FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->mobile;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllClothingAlawi()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`cloth_alawi`) as cloth FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->cloth;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function getAllMedicalAlawi()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`med_alawi`) as med FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->med;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function get_sum_of_total_tds()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`tds`) as tax_tds FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->tax_tds;
			return $this->response;
			$this->dbh = null;
		}
	}

	//get total sum allowances
	public function getAllSumOfAlawis()
	{
		$this->response = intval(self::getAllMedicalAlawi() + self::getAllClothingAlawi() + self::getAllTransportAlawi() + self::getAllRentAlawi());
		return $this->response;
	}

	public function get_sum_of_total_salary_payout_monthly()
	{
		$this->stmt = $this->dbh->prepare("SELECT sum(`salary`) as staff_salary FROM `visap_staff_payroll_tbl`");
		$this->stmt->execute();
		if ($this->stmt->rowCount() > 0) {
			$result = $this->stmt->fetch();
			$this->response = $result->staff_salary;
			return $this->response;
			$this->dbh = null;
		}
	}

	public function saveStaffSalaryPayment($data)
	{
		$staffId = $this->config->Clean($data['staff_id']);
		$payrollId = $this->config->Clean($data['payroll_id']);
		$term = $this->config->Clean($data['our_school_term']);
		$basic_salary = $this->config->Clean($data['basic_salary']);
		$tax = $this->config->Clean($data['tax']);
		$net_salary = $this->config->Clean($data['net_salary']);
		$amount_paid = $this->config->Clean($data['amount_paid']);
		$session = $this->config->Clean($data['our_school_session']);
		$month = $this->config->Clean($data['salary_by_month']);
		$payment_method = $this->config->Clean($data['payment_method']);
		$auth_pass = $this->config->Clean($data['auth_code']);
		//lets check for null values
		if (
			$this->config->isEmptyStr($staffId) ||
			$this->config->isEmptyStr($payrollId) ||
			$this->config->isEmptyStr($term) ||
			$this->config->isEmptyStr($session) ||
			$this->config->isEmptyStr($basic_salary) ||
			$this->config->isEmptyStr($net_salary) ||
			$this->config->isEmptyStr($amount_paid) ||
			$this->config->isEmptyStr($month) ||
			$this->config->isEmptyStr($payment_method)
		) {
			$this->response = $this->alert->alert_toastr("error", "All fields are Required!", __OSO_APP_NAME__ . " Says");
		} elseif ($this->config->isEmptyStr($auth_pass)) {
			$this->response = $this->alert->alert_toastr("error", "Authentication code is Required!", __OSO_APP_NAME__ . " Says");
		} elseif ($auth_pass !== __OSO__CONTROL__KEY__) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Authentication Code!", __OSO_APP_NAME__ . " Says");
		} elseif (intval($amount_paid > $net_salary) || (intval($amount_paid < $net_salary))) {
			$this->response = $this->alert->alert_toastr("error", "Invalid Payment amount!", __OSO_APP_NAME__ . " Says");
		} else {
			//lets check if the salary have been paid ealier
			$this->query = "SELECT * FROM `visap_staff_paid_salary_tbl` WHERE staff_id=? AND amount=? AND forMonth=? AND csession=? AND term=? LIMIT 1";
			$this->stmt = $this->dbh->prepare($this->query);
			$this->stmt->execute(array($staffId, $amount_paid, $month, $session, $term));
			if ($this->stmt->rowCount() == '1') {
				$this->response = $this->alert->alert_toastr("error", "This payment already Exists!", __OSO_APP_NAME__ . " Says");
			} else {
				switch ($payment_method) {
					case 'Cash':
						$pay_mode = 'Cash';
						$pay_bank = NULL;
						$pay_ref_no = NULL;
						break;

					case 'Transfer':
						$pay_mode = 'Transfer';
						$pay_bank = $this->config->Clean($data['bank_name']);
						$pay_ref_no = $this->config->Clean($data['bank_ref_no']);
						break;

					default:
						$pay_mode = 'Cash';
						$pay_bank = NULL;
						$pay_ref_no = NULL;
						break;
				}
				try {
					$this->dbh->beginTransaction();
					$created_at = date("Y-m-d");
					$status = "Paid";
					$this->query = "INSERT INTO `visap_staff_paid_salary_tbl` (staff_id,amount,forMonth,paymentMethod,paymentDate,bank,ref_no,status,csession,term,created_at) VALUES (?,?,?,?,?,?,?,?,?,?,?);";
					$this->stmt = $this->dbh->prepare($this->query);
					if ($this->stmt->execute(array($staffId, $amount_paid, $month, $pay_mode, $created_at, $pay_bank, $pay_ref_no, $status, $session, $term, $created_at))) {
						$this->dbh->commit();
						$this->dbh = null;
						$this->response = $this->alert->alert_toastr("success", "Payment made successfully!", __OSO_APP_NAME__ . " Says") . "<script>setTimeout(()=>{
				window.location.reload();
			},500);</script>";
					}
				} catch (PDOException $e) {
					$this->dbh->rollback();
					$this->response  = $this->alert->alert_toastr("error", " Failed! Please try again...: Error: " . $e->getMessage(), __OSO_APP_NAME__ . " Says");
				}
			}
		}
		return $this->response;
		$this->dbh = null;
	}
	//STAFF PAYROLL METHOD END

}