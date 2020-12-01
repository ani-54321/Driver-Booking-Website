<?php
	include "connection.php";
	$f_name = $_POST['f_name'];
	$l_name = $_POST['l_name'];
	$mobile = $_POST['mob'];
	$id = $_POST['ID'];
	$name = $f_name . " " . $l_name;
	$act_id = 0;
	$today = date('Y-m-d');
	$start = date('Y-m-d', mktime(0000, 00, 00));
	
	//800806;
	
	if($dbcon)
	{
		$query1 = "SELECT BookingID, Driver_Contact, Start_Journey FROM passenger_info WHERE Pemail_ID='$mobile'";
		$ran = mysqli_query($stat, $query1);
		
		while($IDs = mysqli_fetch_assoc($ran))
		{
			$act_id = $IDs['BookingID'];
			$driver_contact = $IDs['Driver_Contact'];
			$start = $IDs['Start_Journey'];
			$start = strtotime($start);
			$start = date('Y-m-d', $start);
		}
	
		if($id==$act_id and $start>$today)
		{
			echo $start;
			$query2 = "DELETE FROM passenger_info WHERE BookingID='$act_id'";
			$query3 = "UPDATE driver_info SET Trips=Trips-1 WHERE Mobile_No='$driver_contact'";
			mysqli_query($stat, $query2);
			mysqli_query($stat, $query3);
			
			echo "<script> alert('You have cancelled your driver') </script>";
			echo "<script> window.location = 'header.html' </script>";
		}
		else if($start<=$today)
		{
			echo "<script> alert('You cannot cancel booking now... Your booking cancelation feature is out of date'); </script>";
			echo "<script> window.location = 'passenger_policy.html'; </script>";
		}
		else
		{
			echo "<script> alert('Check your ID or Mobile Number') </script>";
			//echo "<script> document.getElementById('block').style.display = 'block'; </script>";
			echo "<script> window.location = 'cancelation.html' </script>";
		}
		
	}
	
?>