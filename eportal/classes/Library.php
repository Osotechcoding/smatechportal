<?php

require_once "Database.php";
require_once "Configuration.php";
class Library
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
	}

	//show single payroll by id
	public function show($id)
	{
	}
	//start to create a staff Payroll
	public function create($data)
	{
		$staffId = $this->config->Clean($data['staff_id']);
		$basic_salary = $this->config->Clean($data['basic_salary']);
		$rent = $this->config->Clean($data['rent']);
		$transport = $this->config->Clean($data['transport']);
		$cloth = $this->config->Clean($data['cloth']);
		$medical = $this->config->Clean($data['medical']);
		$tds_tax = $this->config->Clean($data['tds_tax']);
	}
	//remove payroll by id
	public function destroy($id)
	{
	}
}