<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once './config/Database.php';
include_once './class/Students.php';

$database = new Database();
$db = $database->getConnection();

$items = new Students($db);

$stmt = $items->getAllStudents();
$itemCount = $stmt->rowCount();


echo json_encode($itemCount);

if ($itemCount > 0) {

    $student_data = array();
    $student_data["data"] = array();
    $student_data["data-count"] = $itemCount;

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        extract($row);
        $e = array(
            "id" => $stdId,
            "surname" => $stdSurName,
            "firstname" => $stdFirstName,
            "lastname" => $stdMiddleName,
            "email" => $stdEmail,
            "age" => date("Y-m-d", strtotime($stdDob)),
            "grade" => $studentClass,
            "gender" => $stdGender,
            "RegNo" => $stdRegNo,
            "admission_date" => date("Y-m-d", strtotime($stdApplyDate))
        );
        array_push($student_data["data"], $e);
    }
    echo json_encode($student_data);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No record found.")
    );
}