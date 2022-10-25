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

$data = (array) json_decode(file_get_contents("php://input"), true);
print_r($data);
die();
$item->stdEmail = $data["email"];
$item->studentClass = $data["grade"];
$item->stdSurName = $data["surname"];
$item->stdFirstName = $data["firstname"];
$item->stdMiddleName = $data["lastname"];
$item->stdDob = $data["dob"];
$item->stdGender = $data["gender"];
$item->stdPhone = $data["phone"];
$item->stdApplyDate = date('Y-m-d');;


if ($item->createStudent()) {
    echo 'Student created successfully.';
} else {
    echo 'Student could not be created.';
}