<!-- Google Search Results using PHP
If you had ever wondered how people create cool keyword or marketing tools which integrate with Google results you have found the right place to learn the first step. In order to generate charts, lists, and data about Google Search results, there is one thing you have to do first, and that is to obtain the data. Using simple PHP code you can perform a couple function calls which allow you to store Google Search results for a specific keyword in an array.

The code is available as follows: -->

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='http://fonts.googleapis.com/css?family=Yanone+Kaffeesatz' rel='stylesheet' type='text/css'>
<title>Google Search Results using PHP</title>
</head>

<body style="margin-left:20px;">

<h1 style="font-family: 'Yanone Kaffeesatz', arial, serif;">This is a demo page which demonstrates how to print out Google Search Results using PHP</h1>
<h2 style="font-family: 'Yanone Kaffeesatz', arial, serif;">To view this tutorial go to <a href="#" target="_blank">Google Search Results using PHP</a></h2>


<label>Enter your search criteria here:</label>
<form method="get" action="">
<input name="results" />
<input type="submit" />
</form>


<?php

$search = $_GET['results'];
if(isset($_GET['results']) && $_GET['results'] != "")
	{
		
		echo "<br />Your Search Result Array:<br /><br />";
	
	$url = "http://ajax.googleapis.com/ajax/services/search/web?v=1.0&"
		. "q=".str_replace(' ', '%20', $_GET['results']);
	
	// sendRequest
	// note how referer is set manually
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');
	$body = curl_exec($ch);
	curl_close($ch);
	
	// now, process the JSON string
	$json = json_decode($body);
	
	// print out the Array
	print_r($json);
	
	// now have some fun with the results...
}

?>

</body>
</html>
