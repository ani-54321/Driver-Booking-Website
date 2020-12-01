<!-- Changing data of drivers -->

<?php
	session_start();
	include "sdp/connection.php";
	$email = $_SESSION['email'];
	$phone = $_SESSION['mobile'];
	$name = ucwords($_POST['change_name']);
	$change_mb = $_POST['change_mb'];
	$changes = $_POST['change_basis'];
	$abilities = $_POST['change_abilities'];
	$change_photo = $_FILES['change_photo'];
	$change_license = $_FILES['change_license'];
	$data_str = "You Have Succesfully Changed Your: ";
	$flag = 0;
	$id = 0;

	# For sending message
	function messageSender($mobile_num, $id)
	{
		// Authorisation details.

		// Authorisation details.
		$username = ""; # Your email-id through which you have enrolled
		$hash = ""; # hash code which you will get after adding your account on textlocal

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "TXTLCL"; // This is who the message appears to be from.
		$numbers = "$mobile_num"; // A single number or a comma-seperated list of numbers
		$message = 	""; # Your message here
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

	# For generating unique driver-id
	function unique($str)
	{
		$sum = 0;
		for($i=0; $i<strlen($str); $i++)
		{
			$ascii = ord($str[$i]);
			$ascii = $ascii % 10;
			$sum = ($sum * 10) + $ascii;
		}
		return $sum;
	}
	
	# Changing the fields of driver for tours and travels
	if (in_array('temp', $changes)){
		$ability = '';
		
		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($name))
		{
			$query = "UPDATE driver_info SET Driver_Name='$name' WHERE Email_ID='$email'";
			$query1 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Driver_Contact='$phone'";
			$executed = mysqli_query($stat, $query);
			$executed2 = mysqli_query($stat, $query1);
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE driver_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed = mysqli_query($stat, $query);
			$executed2 = mysqli_query($stat, $query1);
			$flag = 1;
		}
		if(!empty($ability))
		{
			$query = "UPDATE driver_info SET Types='$ability' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
		}
		if(!empty($change_photo))
		{
			echo stripos($change_photo['name'], 'jpg');
			if((stripos($change_photo['name'], 'png')!=false) or (stripos($change_photo['name'], 'jpg')!=false))
			{
				$new_pathD1 = "ProfilePic/" . $change_photo['name'];
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$queryD1 = "UPDATE driver_info SET `Profile_Photo`='$new_pathD1' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD1);
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$new_pathD2 = "License/" . $change_license['name'];
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$queryD2 = "UPDATE driver_info SET `License`='$new_pathD2' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD2);
			}
		}
		else
		{
			echo "<script> alert('Please Fill The Details Carefully...') </script>";
		}
		echo "<script> alert('Succesfully submited!!!') </script>";
	}


	# Changing the fields of permanent driver
	if (in_array('per', $changes)){	
		$ability = '';
		
		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($name))
		{
			$query = "UPDATE permanent_info SET Driver_Name='$name' WHERE Email_ID='$email'";
			$query1 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
			$executed = mysqli_query($stat, $query);
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE permanent_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
			$flag = 1;
		}
		if(!empty($ability))
		{
			$query = "UPDATE permanent_info SET Types='$ability' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
		}
		if(!empty($change_photo))
		{
			if((stripos($change_photo['name'], 'png')!=false) or (stripos($change_photo['name'], 'jpg')!=false))
			{
				$new_pathD1 = "ProfilePic/" . $change_photo['name'];
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$queryD1 = "UPDATE permanent_info SET `Profile_Photo`='$new_pathD1' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD1);
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$new_pathD2 = "License/" . $change_license['name'];
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$queryD2 = "UPDATE permanent_info SET `License`='$new_pathD2' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD2);
			}
		}
		else
		{
			echo "<script> alert('Please Fill The Details Carefully...') </script>";
		}
		echo "<script> alert('Succesfully submited!!!') </script>";
	}


	# Changing the fields of transport drivers
	if (in_array('trans', $changes)){
		$ability = '';
		
		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($name))
		{
			$query = "UPDATE transport_info SET Driver_Name='$name' WHERE Email_ID='$email'";
			$query1 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
			$executed = mysqli_query($stat, $query);
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE transport_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
			$flag = 1;
		}
		if(!empty($ability))
		{
			$query = "UPDATE transport_info SET Types='$ability' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
		}
		if(!empty($change_photo))
		{
			if((stripos($change_photo['name'], 'png')!=false) or (stripos($change_photo['name'], 'jpg')!=false))
			{
				$new_pathD1 = "ProfilePic/" . $change_photo['name'];
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$queryD1 = "UPDATE transport_info SET `Profile_Photo`='$new_pathD1' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD1);
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$new_pathD2 = "License/" . $change_license['name'];
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$queryD2 = "UPDATE transport_info SET `License`='$new_pathD2' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD2);
			}
		}
		if($flag==1)
		{
			messageSender($change_mb, $id);  # Sending message of updated driver-id if reqired
		}
		header("location:changeinfo.php?Success=Successfully changed data which is valid!!");
		
	}
?>
