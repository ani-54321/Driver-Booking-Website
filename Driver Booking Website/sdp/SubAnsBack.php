<html>
<head>
<link rel="stylesheet" type="text/css" href="cssian.css">
<title> GoGetWay </title>
</head>
<body class="background">
<div class="header">
<h2> GoGetWay.com </h2>
<h4 class="link" style="text-align:right;"> <a href='header.html' class='blink'> Home </a>&nbsp &nbsp &nbsp
<a href="driver_policy.html" class="blink"> Enroll For Job </a>&nbsp &nbsp &nbsp
<a href="passenger_policy.html" class="blink"> Want Driver For Your Vehicle?? </a>
</h4>
</div>

<?php
	include "connection.php";
	if(isset($_POST['ansSub']) and !empty($_POST['ans'])){
		$ans = "_";
		$ans .= ucfirst($_POST['ans']);
		$ansSub = $_POST['ansSub'];
		echo $ans;
		echo $ansSub;
		$quer = "INSERT INTO qa (answers) VALUES ('$ans')";
	}
?>