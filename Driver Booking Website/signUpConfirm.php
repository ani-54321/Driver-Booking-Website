<?php
	include "sdp/connection.php";
	$fname = ucwords($_POST['fname']);
	$lname = ucwords($_POST['lname']);
	$age = $_POST['age'];
	$mob = $_POST['Mob'];
    $email = $_POST['email'];
    $place = $_POST['city'] . ", " . $_POST['state'];
	$sex = $_POST['gender'];
	$types = $_POST['type'];
	$basis = $_POST['basis'];
	$name = $fname . ' ' . $lname;
	$phone_no = strval("$mob");
	$files = $_FILES["photo"];
	$files2 = $_FILES["adhar"];
	$files3 = $_FILES["license"];
	$flag = 0;
	$messageVar = "";
	
	function messageSender($mobile_num, $name, $id, $messageAddon)
	{
		// Authorisation details.

		// Authorisation details.
		$username = "anish.shaha2001@gmail.com";
		$hash = "831a9b75777bda1495125c5e9f2721c9475c807ad1bac670fed24c7fb972e42b";

		// Config variables. Consult http://api.textlocal.in/docs for more info.
		$test = "0";

		// Data for text message. This is the text message data.
		$sender = "TXTLCL"; // This is who the message appears to be from.
		$numbers = $mobile_num; // A single number or a comma-seperated list of numbers
		$message = 	"Hi $name, You Have Done Successful Registration As $messageAddon!! Your Driver ID is $id. Please Keep It Private. It will work as Password for you...";
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
		//echo $result;
	}
	
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

	function getCoordinates(){
		$max = 1000;
		$min = 100;
		$random = rand($min, $max);
		return $max / $random * $min;
	}
	
	if ($dbcon and $age>=21 and !empty($fname) and !empty($lname) and !empty($mob) and isset($types) and !empty($email) and !empty($sex) and !empty($basis)){
		
		$x = getCoordinates();
		$y = getCoordinates();

		if (in_array('Temporary', $basis)) {
			
			$abilityD = "";
			for($i=0; $i<count($types); $i++){
				$abilityD = $abilityD . $types[$i] . ', ';
			}
			if(!empty($files) and !empty($files2) and !empty($files3))
			{
				if(((stripos($files['name'], 'png')!=false) or (stripos($files['name'], 'jpg')!=false)) and ((stripos($files2['name'], 'png')!=false) or (stripos($files2['name'], 'jpg')!=false)) and ((stripos($files3['name'], 'png')!=false) or (stripos($files3['name'], 'jpg')!=false)))
				{
					$new_pathD = "ProfilePic/" . $files['name'];
					$new_pathD2 = "Adhar/" . $files2['name'];
					$new_pathD3 = "License/" . $files3['name'];
					move_uploaded_file($files['tmp_name'], $new_pathD);
					move_uploaded_file($files2['tmp_name'], $new_pathD2);
					move_uploaded_file($files3['tmp_name'], $new_pathD3);
					$driver_Id = unique($phone_no);
					$queryD = "INSERT INTO driver_info (Driver_ID, Driver_Name, Driver_Age, Place, Mobile_No, Email_ID, Sex, Types, Profile_Photo, Adhar_Card, License, `x coordinates`, `y coordinates`) VALUES ('$driver_Id', '$name', '$age', '$place', '$mob', '$email', '$sex', '$abilityD', '$new_pathD', '$new_pathD2', '$new_pathD3', '$x', '$y');";
					$qrystatD = mysqli_query($stat, $queryD);
					$flag = 1;
					
					if ($qrystatD){
						$messageVar .= "Temporary Driver";
					}
				}
			}
			else{
				header("location:driverSignup.php?Empty=Please check out your details carefully...");
			}

		}
		if (in_array('Permanent', $basis)) {
			
			$abilityP = "";
			for($i=0; $i<count($types); $i++){
				$abilityP = $abilityP . $types[$i].', ';
			}
			if(!empty($files) and !empty($files2) and !empty($files3))
			{
				if(((stripos($files['name'], 'png')!=false) or (stripos($files['name'], 'jpg')!=false)) and ((stripos($files2['name'], 'png')!=false) or (stripos($files2['name'], 'jpg')!=false)) and ((stripos($files3['name'], 'png')!=false) or (stripos($files3['name'], 'jpg')!=false)))
				{
					$new_pathP = "ProfilePic/" . $files['name'];
					$new_pathP2 = "Adhar/" . $files2['name'];
					$new_pathP3 = "License/" . $files3['name'];
					move_uploaded_file($files['tmp_name'], $new_pathP);
					move_uploaded_file($files2['tmp_name'], $new_pathP2);
					move_uploaded_file($files3['tmp_name'], $new_pathP3);
					$driver_Id = unique($phone_no);
					$queryP = "INSERT INTO permanent_info (Driver_ID, Driver_Name, Driver_Age, Place, Mobile_No, Email_ID, Sex, Types, Profile_Photo, Adhar_Card, License, `x coordinates`, `y coordinates`) VALUES ('$driver_Id', '$name', '$age', '$place', '$mob', '$email', '$sex', '$abilityP', '$new_pathP', '$new_pathP2', '$new_pathP3', '$x', '$y');";
					$qrystatP = mysqli_query($stat, $queryP);
					$flag = 1;
					if ($qrystatP){
						if(strlen($messageVar)==0)
						{
							$messageVar .= "Permanent Driver";
						}
						else{
							$messageVar .= ", Permanent Driver";
						}
					}
				}
			}
			else{
				header("location:driverSignup.php?Empty=Please check out your details carefully...");
			}
		}
		if (in_array('Transport', $basis)) {
			
			$abilityT = "";
			for($i=0; $i<count($types); $i++){
				$abilityT = $abilityT . $types[$i].', ';
			}
			if(!empty($files) and !empty($files2) and !empty($files3))
			{
				if(((stripos($files['name'], 'png')!=false) or (stripos($files['name'], 'jpg')!=false)) and ((stripos($files2['name'], 'png')!=false) or (stripos($files2['name'], 'jpg')!=false)) and ((stripos($files3['name'], 'png')!=false) or (stripos($files3['name'], 'jpg')!=false)))
				{
					$new_pathT = "ProfilePic/" . $files['name'];
					$new_pathT2 = "Adhar/" . $files2['name'];
					$new_pathT3 = "License/" . $files3['name'];
					move_uploaded_file($files['tmp_name'], $new_pathT);
					move_uploaded_file($files2['tmp_name'], $new_pathT2);
					move_uploaded_file($files3['tmp_name'], $new_pathT3);
					$driver_Id = unique($phone_no);
					$queryT = "INSERT INTO transport_info (Driver_ID, Driver_Name, Driver_Age, Place, Mobile_No, Email_ID, Sex, Types, Profile_Photo, Adhar_Card, License, `x coordinates`, `y coordinates`) VALUES ('$driver_Id', '$name', '$age', '$place', '$mob', '$email', '$sex', '$abilityT', '$new_pathT', '$new_pathT2', '$new_pathT3', '$x', '$y');";
					$qrystatT = mysqli_query($stat, $queryT);
					$flag = 1;
					if ($qrystatT){
						if(strlen($messageVar)==0)
						{
							$messageVar .= "Transport Driver";
						}
						else{
							$messageVar .= ", Transport Driver";
						}
					}
				}
			}
			else{
				header("location:driverSignup.php?Empty=Please check out your details carefully...");
			}
			
		}
		
	}
	else{
		header("location:driverSignup.php?Empty=Please fill in your details carefully...");
	}
	if($flag==1)
	{
		messageSender($phone_no, $name, $driver_Id, $messageVar);
		header("location:driverstatus.php?Success=You have successfully enrolled yourself!! Your Driver ID is $driver_Id");
		echo "Hi $name, You Have Done Successful Registration As $messageVar!! Your Driver ID is $driver_Id. Please Keep It Private. It will work as Password for you...";
	}
	else{
		header("location:driverSignup.php?Unknown=Please check out your file type it should either be jpg or png...");
	}
?>


