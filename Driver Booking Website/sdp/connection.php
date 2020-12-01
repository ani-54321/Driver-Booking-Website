<?php
$stat = mysqli_connect("127.0.0.1", "root", "");
	if ($stat){
		$dbcon = mysqli_select_db($stat, "drivers_book_web");
	}
	else{
		echo "SERVER ERROR";
	}
?>