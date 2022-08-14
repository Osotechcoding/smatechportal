<?php  

/**
 * 
 */

require_once "Database.php";
require_once "Session.php";
require_once "Configuration.php";
@Session::init_ses();
class Prospect
{
	
	private $dbh;//database connection
	protected $query;//querying database
	protected $stmt;//database statement
	protected $response;//database result
	protected $config;//default config

	public function __construct(){
		$conn = new Database;
		$this->dbh = $conn->osotech_connect();
		$this->alert = new Alert;
		$this->config = new Configuration;
	}
	//start new student online registration methods
	public function create_prospect_first_step($data){}
	public function create_prospect_second_step($data){}
	public function create_prospect_third_step($data){}
	public function create_prospect_fourth_step($data){}
	public function submit_prospect_final_step($data){}
	//start new student online registration methods
	
	//send interview notification to prospect students
	public function send_interview_date_prospect($data){}
	//send admission letter to prospect students
	public function send_admission_letter($data){}
}