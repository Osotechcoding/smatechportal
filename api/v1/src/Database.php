<?php 
class Database
{
	private $host ='localhost';
	private $dbName='smatech_portal';
	private $host_user='root';
	private $host_pass='osotech';
	private $dbh;
	
	public function getConnection()
	{
		//$this->dbh = null;
		$dsn = 'mysql:host='.$this->host.';dbname='.$this->dbName.';charset=utf8mb4';
		try {
			$this->dbh = new PDO ($dsn,$this->host_user,$this->host_pass,[PDO::ATTR_EMULATE_PREPARES=> false, PDO::ATTR_STRINGIFY_FETCHES => false, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
		} catch (PDOException $e) {
			
		}
		return $this->dbh;
	}
}