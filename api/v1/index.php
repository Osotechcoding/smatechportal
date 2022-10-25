<?php

spl_autoload_register(function ($className) {
	require __DIR__ . "/src/$className.php";
});

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json;charset=utf-8');

$database = new Database();
//$db = $database->getConnection();
$syncronizeStudent = new SyncronizeStudents();

$student_list = $syncronizeStudent->getAllStudents();

$rowsCount = $student_list->rowCount();
if ($rowsCount > 0) {

	$student_arr = array();
	$student_arr['registration'] = array(array("session_term_id" => 3, "class_id" => 5508));
	$student_arr['registration']['student'] = array();
	while ($row = $student_list->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$student_item = array(
			"Surname" => $stdSurName,
			"first_name" => $stdFirstName,
			"middle_name" => $stdMiddleName,
			"gender" => $stdGender,
			"learner_id" => $stdRegNo,
			"dob" => date("Y-m-d", strtotime($stdDob))
		);
		//push to data
		array_push($student_arr['registration']['student'], $student_item);
	}

	echo json_encode($student_arr);
} else {
	echo json_encode([]);
}