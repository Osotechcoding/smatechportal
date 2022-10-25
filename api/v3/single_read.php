<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once 'config/Database.php';
include_once 'class/Students.php';

$database = new Database();
$db = $database->getConnection();

$item = new Students($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getSingleStudent();

if ($item->name != null) {
    // create array
    $emp_arr = array(
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

    http_response_code(200);
    echo json_encode($emp_arr);
} else {
    http_response_code(404);
    echo json_encode("Student not found.");
}