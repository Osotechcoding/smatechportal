<?php
//require_once 'Database.php';
class SyncronizeStudents extends Database
{

	public function getAllStudents()
	{
		$sql = "SELECT * FROM `visap_student_tbl` ORDER BY stdRegNo ASC";
		$stmt = $this->getConnection()->prepare($sql);
		$stmt->execute();
		return $stmt;
	}
}