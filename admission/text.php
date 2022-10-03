<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form method="post" action="">
    <br>
    Input the Youtube video url into the box<br><br>
    <input type="text" name="video_url">

    <br><br>
    <input type="submit" value="save" name="submit">
  </form>
</body>
<?php
$host = "localhost";           // database  server name 
$username = "root";            // database username
$password = "";                  //  database password
$db = "test";                       // database name
 
 
$con = new mysqli($host, $username, $password, $db);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
	if(isset($_POST['submit']))
{
	$url = $_POST['video_url'];
$utube = preg_match('/[\\?\\&]v=([^\\?\\&]+)/',$url,$url_match); // code to convert video url into embed code
	$embed_url = 'https://www.youtube.com/embed/'.$url_match[1];
	$sql="SELECT * FROM utube_video";
	$result = $con->query($sql);
	while($row = $result->fetch_assoc()) 
	$video_url = $row['video_url'];
}
if(empty($video_url))
{
$sql = "INSERT INTO utube_video (video_url)VALUES ('$embed_url')";
				if ($con->query($sql) === TRUE) 
				{
					echo "new record added successfully";
				} 
				else 
				{
				echo "Error: " . $sql . "<br>" . $con->error;
                }
}
else
{
	$sql = "UPDATE  utube_video set video_url = '$embed_url'";
 
				if ($con->query($sql) === TRUE) 
				{
					echo "record updated successfully";
				} 
				else 
				{
				echo "Error: " . $sql . "<br>" . $con->error;
                }
}
}
else
{
	exit;
}
 
// code to get table data
$sql = "SELECT video_url FROM utube_video";
$result = $con->query($sql);
if ($result->num_rows > 0) 
{
while($row = $result->fetch_assoc()) 
{
	$video = $row["video_url"];
}
} 
				
$con->close();
 
?>
<?php
	if(isset($video))
	{
	?>
<br>
<iframe class="youtube-video" src="<?php echo $video ;?>" allowfullscreen></iframe>
<?php
}
?>

</body>
<!-- 000webhostapp cp pass CPJOK6Cje8$f@aPLsFv8 -->
<!--000webhostapp  -->
<!-- db pass  yN/V)_f<lTUi]o15 -->
<!-- db user smatech_admin -->
<!-- dbname smatech_portal -->

</html>