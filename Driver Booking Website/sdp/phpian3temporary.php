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
<caption><h1 class="mainh1" style="text-align: center;"> Driver's Table <h1></caption>
<?php
	include "connection.php";
	$f_name = ucfirst($_POST['f_name']);
	$l_name = ucfirst($_POST['l_name']);
	$name = $f_name . " " . $l_name;
	$mobile = $_POST['mob'];
	$place = ucwords($_POST['place']);
	$v_type = $_POST['vehicle_type'];
	$d_type = $_POST['driver_type'];
	$v_name = ucwords($_POST['vehicle_name']);
	$start = date('Y-m-d');
	$end = date('Y-m-d');
	$start = $_POST['start_date'];
	$end = $_POST['end_date'];
	$today = date('Y-m-d');
	$d_con = array();
	
	//echo $start . " " . $end;
	
	if (($dbcon) and ($start<=$end) and ($start>$today)){
		echo "<form method='post' action='phpian4.php'>";
		$q1 = "INSERT INTO passenger_info (Pemail_ID, Place, Vehicle_Type, Vehicle_Name, Driver, Applied, Name, Start_Journey, End_Journey) VALUES ('$mobile', '$place', '$v_type', '$v_name', '$d_type', 1, '$name', '$start', '$end')";
		echo "<center class='mainh1'><input type='checkbox' name='mob_num' id='check' value=".$mobile." checked> This is just confirmation of your journey(don't deselect it) </center>";
		mysqli_query($stat, $q1);
		if ($d_type === 'temporary'){
			echo "<center><table id='tab' class='table' cellspacing='50px'>
			<tr>
			<th class='th'> Name </th>
			<th class='th'> Age </th>
			<th class='th'> Gender </th>
			<th class='th'> Get Drivers </th>
			</tr>";
			
			$qp1 = "SELECT Start_Journey, End_Journey, Driver_Contact, Pemail_ID FROM passenger_info";
			$rp1 = mysqli_query($stat, $qp1);
			
			$start = strtotime($start);
			$end = strtotime($end);
			
			$start = date('Y-m-d', $start);
			$end = date('Y-m-d', $end);
			
			
			while($numbers = mysqli_fetch_assoc($rp1))
			{
				if(($start <= $numbers['Start_Journey'] and $end >= $numbers['Start_Journey']) || ($start >= $numbers['Start_Journey'] and $start <= $numbers['End_Journey']))
				{
					//echo $numbers['Driver_Contact'];
					array_push($d_con, $numbers['Driver_Contact']);
				}
				else
				{
					continue;
				}
			}
			
			//print_r($d_con);
			
			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo FROM driver_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
			$ran1 = mysqli_query($stat, $query1);
			while($values = mysqli_fetch_assoc($ran1)){
				if(!in_array($values['Mobile_No'], $d_con))
					echo "<tr>
					<td class='td'> ".$values['Driver_Name']." </td>
					<td class='td'> ".$values['Driver_Age']." </td>
					<td class='td'> ".$values['Sex']." </td>
					<td class='td'> <button type='submit' class='buts' name='drivers' value=".$values['Mobile_No'].">Get Me</td>
					</tr>";
				else
				{
					continue;
				}
			}
			echo "</table></center></form>";
		}
		else if ($d_type === 'permanent'){
			echo "<center><table class='table' cellspacing='50px'>
			<tr>
			<th class='th'> Name </th>
			<th class='th'> Age </th>
			<th class='th'> Gender </th>
			<th class='th'> Buttons </th>
			</tr>";
			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo, FROM permanent_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
			
			$ran1 = mysqli_query($stat, $query1);
			while($values = mysqli_fetch_assoc($ran1)){
				echo "<tr>
				<td class='td'> ".$values['Driver_Name']." </td>
				<td class='td'> ".$values['Driver_Age']." </td>
				<td class='td'> ".$values['Sex']." </td>
				<td class='td'> <button type='submit' class='buts' name='drivers' value=".$values['Mobile_No']."> Get Me </td>
				</tr>";
			}
			echo "</table></center></form>";
		}
		else if ($d_type === 'transport'){
			echo "<center><table class='table' cellspacing='50px'>
			<tr>
			<th class='th'> Name </th>
			<th class='th'> Age </th>
			<th class='th'> Gender </th>
			<th class='th'> Buttons </th>
			</tr>";
			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo FROM transport_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
			$ran1 = mysqli_query($stat, $query1);
			while($values = mysqli_fetch_assoc($ran1)){
				echo "<tr>
				<td class='td'> ".$values['Driver_Name']." </td>
				<td class='td'> ".$values['Driver_Age']." </td>
				<td class='td'> ".$values['Sex']." </td>
				<td class='td'> <button type='submit' class='buts' name='drivers' value=".$values['Mobile_No']."> Get Me </td>
				</tr>";
			}
			echo "</table></center></form>";
		}
	}
	else
	{
		echo "<script> alert('Check The Dates You Have Written...');
		window.location = 'htmlian4temp.php';</script>";
	}
?>
</body>
</html>





