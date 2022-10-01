<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['action'])) {

  if ($_POST['action'] === "upload_csv") {
    $File_tmp = $_FILES['studentCsvFile']['tmp_name'];
    $FileName = $_FILES['studentCsvFile']['name'];
    $studentClass = $data['student_class'];
    $allowedExt = array('xls', 'csv', 'xlsx');
    $file_ext = pathinfo($FileName, PATHINFO_EXTENSION);
  }
}


//CHECK IF VALID FILE
if (in_array($file_ext, $allowedExt)) {

  /** Load $inputFileName to a Spreadsheet object **/
  $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($File_tmp);
  $sheet = $spreadsheet->getActiveSheet()->ToArray();
} else {
  $this->response = $this->alert->alert_toastr("error", "Only .CSV,.XLS,.XLSX extension is allowed!", __OSO_APP_NAME__
    . " Says");
}