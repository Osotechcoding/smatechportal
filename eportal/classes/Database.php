<?php 
require_once 'initialize.php';
class Database {
	private $dbHost =__OSO_HOST__;
	private $dbUser =__OSO_USER__;
	private $dbPass =__OSO_PASS__;
	private $dbCharset =__OSO_CHARSET__;
	private $dbname =__OSO_DBNAME__;
	private $dbDriver =__OSO_DB_DRIVER__;
	private $dbh;
	private $error;
	public function __construct(){
		return $this->dbh;
	}
public function osotech_connect(){
	$dsn = $this->dbDriver.":host=".$this->dbHost.";dbname=".$this->dbname.";charset=".$this->dbCharset;
		$options = array(PDO::ATTR_PERSISTENT =>false,PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION,PDO::ATTR_DEFAULT_FETCH_MODE=>PDO::FETCH_OBJ);
		try {
			$this->dbh = new PDO($dsn,$this->dbUser,$this->dbPass,$options);
			
		} catch (PDOException $e) {
			$this->error = $e->getMessage();
			die($this->error);
		}
		return $this->dbh;
}
}

 ?>