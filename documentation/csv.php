<?php
//CSV 
if(isset($_POST["submit_file"]))
{
 $file = $_FILES["file"]["tmp_name"];
 $file_open = fopen($file,"r");
 while(($csv = fgetcsv($file_open, 1000, ",")) !== false)
 {
  $name = $csv[0];
  $age = $csv[1];
  $country = $csv[2];
  mysqli_query("INSERT INTO employee VALUES ('$name','$age','country')");
 }
 fclose($file_open);
}
?>

<?php 

if (isset($_POST["import"])) {
$fileName = $_FILES["file"]["tmp_name"];
if ($_FILES["file"]["size"] > 0) {
$file = fopen($fileName, "r");
while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
$sqlInsert = "INSERT into users (userId,userName,password,firstName,lastName)
values ('" . $column[0] . "','" . $column[1] . "','" . $column[2] . "','" . $column[3] . "','" . $column[4] . "')";
$result = mysqli_query($conn, $sqlInsert);
if (! empty($result)) {
$type = "success";
$message = "CSV Data Imported into the Database";
} else {
$type = "error";
$message = "Problem in Importing CSV Data";
}
}
}
}

 ?>