<?php
	include "connection.php";
	function messageSender($mobile_num, $bookId, $msg)
	{
		// Authorisation details.

		// Authorisation details.
		$username = "shahaanish14@gmail.com";
		$hash = "a2424bac7f4944afb94757793f340fc80a5df0471a39c941992a141ba5006fe8";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "TXTLCL"; // This is who the message appears to be from.
		$numbers = "$mobile_num"; // A single number or a comma-seperated list of numbers
		$message = $msg;
		// 612 chars or less
		// A single number or a comma-seperated list of numbers
		$message = urlencode($message);
		$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;
		$ch = curl_init('http://api.textlocal.in/send/?');
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$result = curl_exec($ch); // This is the result from the API
		curl_close($ch);
	}
	
	
	/*function fact($num)
	{
		$factorial = 1;
		while($num!=1)
		{
			$factorial = $factorial * $num;
			$num = $num-1;
		}
		return $factorial;
	}*/
	
	$today = date('Y-m-d');
	$mobile_number1 = "";
	$mobile_number2 = "";
	
	if ($dbcon){
		if (isset($_POST['drivers']) and isset($_POST['mob_num'])){
			$mob_num = $_POST['drivers'];
			$mobile = $_POST['mob_num'];
			$start = $today;
			$end = $today;
			
			$q = "UPDATE driver_info SET Trips=Trips+1 WHERE Mobile_No='$mob_num'";
			mysqli_query($stat, $q);
			
			$query = "UPDATE passenger_info SET Ordered=1 WHERE Pemail_ID='$mobile'";
			$fetch = "SELECT Name FROM passenger_info WHERE Pemail_ID='$mobile'";
			$sec = "SELECT MAX(OrderIDs) AS max FROM passenger_info";
			$fetch2 = "SELECT Driver_Name, Mobile_No FROM driver_info WHERE Mobile_No='$mob_num'";

			mysqli_query($stat, $query);
			$ran = mysqli_query($stat, $fetch);
			$ran2 = mysqli_query($stat, $fetch2);
			$key = mysqli_query($stat, $sec);
			$row = mysqli_fetch_assoc($key);
			$maximum = $row['max'];
			
			$max = 999999;
			$min = 10000;
			$bookId = rand($min, $max);
			$bookId = $bookId + $maximum;
			$name = NULL;
						
			while($value = mysqli_fetch_assoc($ran))
			{
				$name = $value['Name'];
			}
			
			while($value2 = mysqli_fetch_assoc($ran2))
			{
				$name2 = $value2['Driver_Name'];
				$contact = $value2['Mobile_No'];
			}
			
			mysqli_query($stat, "UPDATE passenger_info SET Driver_Alloted='$name2', BookingID='$bookId', Driver_Contact='$contact' WHERE Pemail_ID='$mobile' AND OrderIDs='$maximum'");

			echo "<script> alert('You got driver successfully...') </script>";
			echo "<script> window.location = 'status.php' </script>";
			
		/*$sel = "SELECT Start_Journey, End_Journey, BookingID, Driver_Contact FROM passenger_info";
			$selran = mysqli_query($stat, $sel);
			
			while($dates = mysqli_fetch_assoc($selran))
			{
				$start = $dates['Start_Journey'];
				$start = strtotime($start);
				$startDate = date('Y-m-d', $start);
				if($today == $startDate)
				{
					$mobile_number1 = $dates['Driver_Contact'];
					$query1 = "UPDATE driver_info SET Working_Status='Engaged' WHERE Mobile_No='$mobile_number1'";
					$query2 = "UPDATE permanent_info SET Working_Status='Engaged' WHERE Mobile_No='$mobile_number1'";
					$query3 = "UPDATE transport_info SET Working_Status='Engaged' WHERE Mobile_No='$mobile_number1'";
					
					//echo $dates['Driver_Contact'];
					mysqli_query($stat, $query1);
					mysqli_query($stat, $query2);
					mysqli_query($stat, $query3);
				}
				
				
				$end = $dates['End_Journey'];
				$yesterday = strtotime($today);
				$yesterday = $yesterday - 24*3600;
				$yesterday = date('Y-m-d', $yesterday);
				
				$end = strtotime($end);
				$end = date('Y-m-d', $end);
				
				if($end == $yesterday)
				{
					$mobile_number2 = $dates['Driver_Contact'];
					$query4 = "UPDATE driver_info SET Working_Status='Unengaged' WHERE Mobile_No='$mobile_number2'";
					$query5 = "UPDATE permanent_info SET Working_Status='Unengaged' WHERE Mobile_No='$mobile_number2'";
					$query6 = "UPDATE transport_info SET Working_Status='Unengaged' WHERE Mobile_No='$mobile_number2'";
					
					echo $dates['Driver_Contact'];
					mysqli_query($stat, $query4);
					mysqli_query($stat, $query5);
					mysqli_query($stat, $query6);
				}
			}*/
			
			$msgToDriver = "You Are Selected By $name As Driver. Your Booking ID is $bookId";
			$msgToPassenger = "You Have Chosen $name2 As Driver. Your Booking ID is $bookId. This ID will be used when you want to cancel the booking before the day of trip. Thanks For Chosing GoGetWay";
			
			//messageSender($mob_num, $bookId, $msgToDriver);
			//messageSender($mobile, $bookId, $msgToPassenger);
			
			
			include "status.php";
		}
		
		/*else if (isset($_POST['doing'])){
			
			$email = $_POST['email'];
			$query1 = "UPDATE passenger_info SET Doing = Doing + 1 WHERE Email_ID='$email'";
			$query2 = "UPDATE driver_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query3 = "UPDATE permanent_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query4 = "UPDATE transport_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			mysqli_query($stat, $query1);
			mysqli_query($stat, $query2);
			mysqli_query($stat, $query3);
			mysqli_query($stat, $query4);
		}
		else if (isset($_POST['not_doing'])){
			$email = $_POST['email'];
			$query = "SELECT Driver_Name FROM driver_info WHERE Email_ID!='$email'";
			$ranQ = mysqli_query($stat, $query);
			header('Location:phpian3temporary.php');
			$query1a = "UPDATE driver_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query1b = "UPDATE driver_info SET Not_Doing = Not_Doing + 1 WHERE Email_ID='$email'";
			$query2a = "UPDATE permanent_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query2b = "UPDATE permanent_info SET Not_Doing = Not_Doing + 1 WHERE Email_ID='$email'";
			$query3a = "UPDATE transport_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query3b = "UPDATE transport_info SET Not_Doing = Not_Doing + 1 WHERE Email_ID='$email'";
			mysqli_query($stat, $query1a);
			mysqli_query($stat, $query2a);
			mysqli_query($stat, $query3a);
			mysqli_query($stat, $query1b);
			mysqli_query($stat, $query2b);
			mysqli_query($stat, $query3b);
		}*/
		
		else if (isset($_POST['engaged'])){
			$email = $_POST['email'];
			$ID = $_POST['ID'];
			
			$query1 = "UPDATE driver_info SET Working_Status='Engaged' WHERE Email_ID='$email' AND Driver_ID='$ID'";
			$query2 = "UPDATE permanent_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$query3 = "UPDATE transport_info SET Working_Status='Engaged' WHERE Email_ID='$email'";
			$status1 = mysqli_query($stat, $query1);
			$status2 = mysqli_query($stat, $query2);
			$status3 = mysqli_query($stat, $query3);
			
			if($status1)
			{
				echo "<script> alert('There will be no request from any passenger untill you make yourself Unengeged...') </script>";
				echo "<script> window.location = 'header.html'</script>";
			}
			else
			{
				echo "<script> alert('Check Your Email ID or Password...') </script>";
				echo "<script> window.location = 'htmlian3.html'</script>";
			}
		}
		else if (isset($_POST['unengaged'])){
			$email = $_POST['email'];
			$ID = $_POST['ID'];
			
			$query1 = "UPDATE driver_info SET Working_Status='Unengaged' WHERE Email_ID='$email' AND Driver_ID='$ID'";
			$query2 = "UPDATE permanent_info SET Working_Status='Unengaged' WHERE Email_ID='$email'";
			$query3 = "UPDATE transport_info SET Working_Status='Unengaged' WHERE Email_ID='$email'";
			
			$status1 = mysqli_query($stat, $query1);
			$status2 = mysqli_query($stat, $query2);
			$status3 = mysqli_query($stat, $query3);
			
			if($status1)
			{
				echo "<script> alert('Now you are ready to accept next requests...') </script>";
				echo "<script> window.location = 'header.html'</script>";
			}
			else
			{
				echo "<script> alert('Check Your Email ID or Password...') </script>";
				echo "<script> window.location = 'htmlian3.html'</script>";
			}
		}
		else {
			echo "<script> alert('Please check the Check Box exactly above the table...') </script>";
			echo "<script> window.location = 'phpian3temporary.php'</script>";
		}
	}
	else{
		echo "Datatbase Not Connected";
	}
?>
