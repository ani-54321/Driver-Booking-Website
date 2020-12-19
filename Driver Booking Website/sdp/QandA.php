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
<form method="post" action="QandA.php">
<input name="que" placeholder="Your Question"><br>
<input type="submit" name="qbut">
</form>
</div>
</center>

<?php	
	include "connection.php";
	if(isset($_POST['qbut']) and !empty($_POST['que'])){
		$que = ucfirst($_POST['que']);
		if ($que[strlen($que)-1]!=='?'){
			$que .= '?';
		}
		
		$q = "SELECT questions FROM qa";
		$next = mysqli_query($stat, $q);
		$result2 = [];
		while ($result = mysqli_fetch_assoc($next)){
			array_push($result2, $result['questions']);
		}
		if (!(in_array($que, $result2))){
			$quer = "INSERT INTO qa (questions) VALUES ('$que')";
			mysqli_query($stat, $quer);
		}
	}
	
	$quer2 = "SELECT questions, Q_num FROM qa";
	$run = mysqli_query($stat, $quer2);
	echo "<form method='post' action='SubAns.php'>";
	while($execute = mysqli_fetch_assoc($run)){
		echo $execute['questions'];
		echo $execute['Q_num'];
		echo "<button name='queNum' value=".$execute['Q_num']."> Answer This </button><br>";
	}
	echo "</form>";
?>



















