<?php
@session_start();
require_once '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use PhpOffice\PhpSpreadsheet\Writer\Csv;

spl_autoload_register(function ($filename) {
  require_once "../classes/" . ucfirst($filename) . ".php";
});
$Student = new Student();
$Alert = new Alert;
$request_method  = $_SERVER['REQUEST_METHOD'];
if ($request_method === "POST") {
  if (isset($_POST['action']) && $_POST['action'] != "") {

    if (isset($_POST['export_student_data_btn'])) {
      if ($_POST['action'] === "export_student_by_class") {
        $student_class = $_POST['student_class'];
        $auth_pass = $_POST['auth_code'];
        $ext = $_POST['exp_type'];
        if (empty($student_class) || empty($ext)) {
          $_SESSION['alert_msg'] = $Alert->alert_msg("Invalid Submission, Pls try again!", "danger");
          header("Location: studentcsvupload");
          exit(0);
        } else if ($auth_pass !== __OSO__CONTROL__KEY__) {
          $_SESSION['alert_msg'] = $Alert->alert_msg("Invalid Authentication Code, Pls try again!", "danger");
          header("Location: studentcsvupload");
          exit(0);
        } else {
          $students = $Student->getAllStudents($student_class);
          if ($students) {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setCellValue('A1', 'Surname');
            $sheet->setCellValue('B1', 'FirstName');
            $sheet->setCellValue('C1', 'LastName');
            $sheet->setCellValue('D1', 'Date Of Birth');
            $sheet->setCellValue('E1', 'Gender');
            $sheet->setCellValue('F1', 'Address');
            $sheet->setCellValue('G1', 'Phone');
            $sheet->setCellValue('H1', 'Email');
            $sheet->setCellValue('I1', 'Admission Date');
            $sheet->setCellValue('J1', 'Student Type');
            $sheet->setCellValue('K1', 'Admission No');
            $sheet->setCellValue('L1', 'Student Class');
            $rowCount = 2;
            foreach ($students as $student) {
              $sheet->setCellValue('A' . $rowCount, $student->stdSurName);
              $sheet->setCellValue('B' . $rowCount, $student->stdFirstName);
              $sheet->setCellValue('C' . $rowCount, $student->stdMiddleName);
              $sheet->setCellValue('D' . $rowCount, $student->stdDob);
              $sheet->setCellValue('E' . $rowCount, $student->stdGender);
              $sheet->setCellValue('F' . $rowCount, $student->stdAddress);
              $sheet->setCellValue('G' . $rowCount, $student->stdPhone);
              $sheet->setCellValue('H' . $rowCount, $student->stdEmail);
              $sheet->setCellValue('I' . $rowCount, $student->stdApplyDate);
              $sheet->setCellValue('J' . $rowCount, $student->stdApplyType);
              $sheet->setCellValue('K' . $rowCount, $student->stdRegNo);
              $sheet->setCellValue('L' . $rowCount, $student->studentClass);
              $rowCount++;
            }
            $fileName = $student_class . "-student-sheet";
            if ($ext == "xlsx") {
              $writer = new Xlsx($spreadsheet);
              $final_name = $fileName . ".xlsx";
            } else if ($ext == "xls") {
              $writer = new Xls($spreadsheet);
              $final_name = $fileName . ".xls";
            } else if ($ext == "csv") {
              $writer = new Csv($spreadsheet);
              $final_name = $fileName . ".csv";
            }
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment; filename="' . $final_name . '"');
            $writer->save('php://output');
          } else {
            $_SESSION['alert_msg'] = $Alert->alert_msg("No Record Found!", "danger");
            header("Location: studentcsvupload");
            exit(0);
          }
        }
      }
    }
  }
}