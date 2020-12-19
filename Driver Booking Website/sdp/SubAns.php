<?php
	include "connection.php";
	$queNum = $_POST['queNum'];
?>
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
<br><br><br>
<center>
<div class="question">
<form method='post' action='SubAnsBack.php'>
<textarea name='ans'></textarea>
<Button type='submit' name='ansSub' value="<?php echo $queNum;?>"></button>
</form>
</div>
</center>



















