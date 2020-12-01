<?php

	include "connection.php";
	$email = $_POST['access_email'];
	$named = ucwords($_POST['change_fname']). " " . ucwords($_POST['change_lname']);
	$change_mb = $_POST['change_mb'];
	$changes = $_POST['change_basis'];
	$abilities = $_POST['change_abilities'];
	$change_photo = $_FILES['change_photo'];
	$change_license = $_FILES['change_license'];
	$data_str = "You Have Succesfully Changed Your: ";
	$flag = 0;

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
	
		
	if (in_array('temp', $changes)){
		$ability = '';
		$mobile_fetch1 = "SELECT Mobile_No FROM driver_info WHERE Email_ID='$email'";
		$run = mysqli_query($stat, $mobile_fetch1);
		$old_mob = mysqli_fetch_assoc($run);
		$phone = $old_mob['Mobile_No'];
		
		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($named))
		{
			$query = "UPDATE driver_info SET Driver_Name='$named' WHERE Email_ID='$email'";
			$query2 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Drive_Contact='$phone'";
			$executed = mysqli_query($stat, $query);
			mysqli_query($stat, $query2);
			$data_str = $data_str . "Name";
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE driver_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
			$data_str = $data_str . " Mobile Number";
		}
		if(!empty($ability))
		{
			$query = "UPDATE driver_info SET Types='$ability' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$data_str = $data_str . " Abilities";
		}
		if(!empty($change_photo))
		{
			echo stripos($change_photo['name'], 'jpg');
			if((stripos($change_photo['name'], 'png')!=false) or (stripos($change_photo['name'], 'jpg')!=false))
			{
				$file_nameD1 = $change_photo['name'];
				$new_pathD1 = "D:/xampp/htdocs/ProfilePic/" . $file_nameD1;
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$new_pathD1 = "ProfilePic/" . $file_nameD1;
				$queryD1 = "UPDATE driver_info SET Profile_Photo='$new_pathD1' WHERE Email_ID='$email'";
				$data_str = $data_str . "\n Profile Photo";
				mysqli_query($stat, $queryD1);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$file_nameD2 = $change_license['name'];
				$new_pathD2 = "D:/xampp/htdocs/License/" . $file_nameD2;
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$new_pathD2 = "License/" . $file_nameD2;
				$queryD2 = "UPDATE driver_info SET License='$new_pathD2' WHERE Email_ID='$email'";
				$data_str = $data_str . "\n License";
				mysqli_query($stat, $queryD2);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
		
	}
	if (in_array('per', $changes)){	
		$ability = '';
		$mobile_fetch1 = "SELECT Mobile_No FROM permanent_info WHERE Email_ID='$email'";
		$run = mysqli_query($stat, $mobile_fetch1);
		$old_mob = mysqli_fetch_assoc($run);
		$phone = $old_mob['Mobile_No'];
		
		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($named))
		{
			$query = "UPDATE permanent_info SET Driver_Name='$named' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query2 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Drive_Contact='$phone'";
			mysqli_query($stat, $query2);
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE permanent_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
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
				$file_nameD1 = $change_photo['name'];
				$new_pathD1 = "D:/xampp/htdocs/ProfilePic/" . $file_nameD1;
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$new_pathD1 = "ProfilePic/" . $file_nameD1;
				$queryD1 = "UPDATE permanent_info SET Profile_Photo='$new_pathD1' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD1);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$file_nameD2 = $change_license['name'];
				$new_pathD2 = "D:/xampp/htdocs/License/" . $file_nameD2;
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$new_pathD2 = "License/" . $file_nameD2;
				$queryD2 = "UPDATE permanent_info SET License='$new_pathD2' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD2);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
	}
	if (in_array('trans', $changes)){
		$ability = '';
		$mobile_fetch1 = "SELECT Mobile_No FROM transport_info WHERE Email_ID='$email'";
		$run = mysqli_query($stat, $mobile_fetch1);
		$old_mob = mysqli_fetch_assoc($run);
		$phone = $old_mob['Mobile_No'];

		if(!empty($abilities))
		{
			for($i=0; $i<count($abilities); $i++){
				$ability = $ability . $abilities[$i].', ';
			}
		}
		
		if(!empty($named))
		{
			$query = "UPDATE transport_info SET Driver_Name='$named' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query2 = "UPDATE passenger_info SET Driver_Alloted='$named' WHERE Drive_Contact='$phone'";
			mysqli_query($stat, $query2);
		}
		if(!empty($change_mb))
		{
			$id = unique($change_mb);
			$query = "UPDATE transport_info SET Mobile_No='$change_mb', `Driver_ID`='$id' WHERE Email_ID='$email'";
			$executed = mysqli_query($stat, $query);
			$query1 = "UPDATE passenger_info SET Driver_Contact='$change_mb' WHERE Driver_Contact='$phone'";
			$executed2 = mysqli_query($stat, $query1);
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
				$file_nameD1 = $change_photo['name'];
				$new_pathD1 = "D:/xampp/htdocs/ProfilePic/" . $file_nameD1;
				move_uploaded_file($change_photo['tmp_name'], $new_pathD1);
				$new_pathD1 = "ProfilePic/" . $file_nameD1;
				$queryD1 = "UPDATE transport_info SET Profile_Photo='$new_pathD1' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD1);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
		if(!empty($change_license))
		{
			if((stripos($change_license['name'], 'png')!=false) or (stripos($change_license['name'], 'jpg')!=false))
			{
				$file_nameD2 = $change_license['name'];
				$new_pathD2 = "D:/xampp/htdocs/License/" . $file_nameD2;
				move_uploaded_file($change_license['tmp_name'], $new_pathD2);
				$new_pathD2 = "License/" . $file_nameD2;
				$queryD2 = "UPDATE transport_info SET License='$new_pathD2' WHERE Email_ID='$email'";
				mysqli_query($stat, $queryD2);
				$flag = 1;
			}
			else{
				$flag = 0;
			}
		}
	}

	if($flag==1)
	{
		echo "<script> alert('Succesfully submited!!!') </script>";
		echo "<script> window.location = 'header.html' </script>";
	}
	else{
		echo "<script> alert('check out data!!!') </script>";
		echo "<script> window.location = 'htmlian.html' </script>";
	}
?>
