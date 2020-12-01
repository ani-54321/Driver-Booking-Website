<!-- Driver form submission -->

<?php
    session_start();
	include "sdp/connection.php";

	# Message sending function
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
	
	$today = date('Y-m-d');
	$mobile_number1 = "";
	$mobile_number2 = "";
	
	if ($dbcon){
		if (isset($_POST['drivers'])){
			$mob_num = $_POST['drivers'];
			$mobile = $_SESSION['mobile'];
			$start = $today;
			$end = $today;
			
			$query = "UPDATE passenger_info SET Ordered=1 WHERE Pemail_ID='$mobile'";
			$fetch = "SELECT `Name` FROM passenger_info WHERE Pemail_ID='$mobile'";
			$sec = "SELECT MAX(OrderIDs) AS max FROM passenger_info";
			$fetch2 = "SELECT Driver_Name, Mobile_No FROM driver_info WHERE Mobile_No='$mob_num'";

			mysqli_query($stat, $query);
			$ran = mysqli_query($stat, $fetch);
			$ran2 = mysqli_query($stat, $fetch2);
			$key = mysqli_query($stat, $sec);
			$row = mysqli_fetch_assoc($key);
			$maximum = $row['max'];

			$dtype = "SELECT `Driver` FROM passenger_info WHERE `OrderIDs`='$maximum'";
			$run = mysqli_query($stat, $dtype);
			$type = mysqli_fetch_assoc($run);

			if($type['Driver']=='temporary')
			{
				$q = "UPDATE driver_info SET Trips=Trips+1 WHERE Mobile_No='$mob_num'";
				mysqli_query($stat, $q);
			}
			else if($type['Driver']=='permanent')
			{
				$q = "UPDATE permanent_info SET Trips=Trips+1 WHERE Mobile_No='$mob_num'";
				mysqli_query($stat, $q);
			}
			else if($type['Driver']=='transport')
			{
				$q = "UPDATE transport_info SET Trips=Trips+1 WHERE Mobile_No='$mob_num'";
				mysqli_query($stat, $q);
			}
			
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
            
            if(isset($name)){
                $msgToDriver = "You Are Selected By $name As Driver. Your Booking ID is $bookId";
                $msgToPassenger = "You Have Chosen $name2 As Driver. Your Booking ID is $bookId. This ID will be used when you want to cancel the booking before the day of trip. Thanks For Chosing GoGetWay";
            }

			//messageSender($mob_num, $bookId, $msgToDriver);
			//messageSender($mobile, $bookId, $msgToPassenger);
            
            header("location:passengerTrips.php?Success=You have Successfully booked the driver");
        }
    }
?>