<?php 
@session_start();
if (!isset($_SESSION['lang']) && !isset($_SESSION['language'])) {
	$_SESSION['lang'] ="en";
	$_SESSION['language'] ="English";
}elseif (isset($_GET['lang']) && $_SESSION['lang']!= $_GET['lang'] && !empty($_GET['lang'])) {
	if ($_GET['lang'] == "en"){
		$_SESSION['lang'] ="en";
	$_SESSION['language'] ="English";
}
	else if($_GET['lang']=="yor"){
$_SESSION['lang'] ="yor";
	$_SESSION['language'] ="Yoruba";
	}
	else if($_GET['lang']=="hausa"){
		$_SESSION['lang']="hausa";
	$_SESSION['language'] ="Hausa";
	}
	else if($_GET['lang']=="igbo"){
		$_SESSION['lang'] ="igbo";
	$_SESSION['language'] ="Igbo";
	}
}
require_once $_SESSION['lang'].".php";
 ?>