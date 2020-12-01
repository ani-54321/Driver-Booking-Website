<!-- This will provide you the list of drivers without any scheduled drives and who are not on leave -->

<?php
    session_start();
    include "sdp/connection.php";
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Driver Chart | GoGetWay</title>
  </head>
  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="login.html"><b><i>GoGetWay</i></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="padding-left: 77%;">
    <form class="form-inline my-2 my-lg-0" method="POST" action="passengerlogout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"> Logout </button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div style="width: 35px; height: 35px; border-radius: 18px; background-color: #7300e6; text-align: center;">
          <b><p style="color: white; padding-top:3px;"><?php echo strtoupper($_SESSION['name'][0]);?></p></b>
        </div>
    </div>
  </nav>

    <h3 class="my-4" style="text-align: center;">Available Drivers Collaborating With Us</h3>

    <?php
	$f_name = ucfirst($_POST['f_name']);
	$l_name = ucfirst($_POST['l_name']);
	$name = $f_name . " " . $l_name;
    $mobile = $_SESSION['mobile'];
	$place = ucwords($_POST['city']). ", ". ucwords($_POST['state']);
	$v_type = $_POST['vehicle_type'];
	$d_type = $_POST['driver_type'];
	$v_name = ucwords($_POST['vehicle_name']);
	$start = $_POST['start_date'];
	$end = $_POST['end_date'];
    $d_con = array();
	
	if ($dbcon and $start<=$end){
		echo "<form method='post' action='gotDriver.php'>";
		$q1 = "INSERT INTO passenger_info (Pemail_ID, Place, Vehicle_Type, Vehicle_Name, Driver, Applied, `Name`, Start_Journey, End_Journey) VALUES ('$mobile', '$place', '$v_type', '$v_name', '$d_type', 1, '$name', '$start', '$end')";
        mysqli_query($stat, $q1);

        # This are the fields of drivers which will be displayed for loged in passengers
        echo "<center><table id='tab' class='table'>
            <thead class='thead-dark'>
            <tr>
            <th scope='col'> Count </th>
			<th scope='col'> Name </th>
			<th scope='col'> Age </th>
			<th scope='col'> Gender </th>
			<th scope='col'> Photo </th>
			<th scope='col'> Get Drivers </th>
            </tr>
            </thead>";
        
        # As per passenger's requirement the right driver will be displayed
		if ($d_type === 'temporary'){
			
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
					array_push($d_con, $numbers['Driver_Contact']);
				}
				else
				{
					continue;
				}
			}
			
			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo FROM driver_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
            $ran1 = mysqli_query($stat, $query1);
            $counter = 0;
			while($values = mysqli_fetch_assoc($ran1)){
                if(!in_array($values['Mobile_No'], $d_con))
                {
                    $counter+=1;
                    echo "<tr>
                    <th scope='row'> $counter </th>
					<td> ".$values['Driver_Name']." </td>
					<td> ".$values['Driver_Age']." </td>
					<td> ".$values['Sex']." </td>
					<td> <img src=".$values['Profile_Photo']." height='100px' width='100px'> </td>
					<td> <button type='submit' class='buts btn-success my-2' name='drivers' value=".$values['Mobile_No'].">Get Me</td>
                    </tr>";
                }
				else
				{
					continue;
				}
			}
			echo "</table></center></form>";
		}
		else if ($d_type === 'permanent'){

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
					array_push($d_con, $numbers['Driver_Contact']);
				}
				else
				{
					continue;
				}
			}

			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo FROM permanent_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
            $ran1 = mysqli_query($stat, $query1);
            $counter = 0;


			while($values = mysqli_fetch_assoc($ran1)){
                if(!in_array($values['Mobile_No'], $d_con))
                {
                    $counter+=1;
                    echo "<tr>
                    <th scope='row'> $counter </th>
                    <td class='td'> ".$values['Driver_Name']." </td>
                    <td class='td'> ".$values['Driver_Age']." </td>
                    <td class='td'> ".$values['Sex']." </td>
                    <td class='td'> <img src=".$values['Profile_Photo']." height='100px' width='100px'> </td>
                    <td class='td'> <button type='submit' class='btn btn-success my-2' name='drivers' value=".$values['Mobile_No']."> Get Me </td>
                    </tr>";
                }
                else
                {
                    continue;
                }
			}
			echo "</table></center></form>";
		}
		else if ($d_type === 'transport'){

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
					array_push($d_con, $numbers['Driver_Contact']);
				}
				else
				{
					continue;
				}
			}

			$query1 = "SELECT Driver_Name, Driver_Age, Email_Id, Mobile_No, Sex, Profile_Photo FROM transport_info WHERE Working_Status='Unengaged' AND Types LIKE '%$v_type%'";
            $ran1 = mysqli_query($stat, $query1);
            $counter = 0;

			while($values = mysqli_fetch_assoc($ran1)){
                if(!in_array($values['Mobile_No'], $d_con))
                {
                    $counter+=1;
                    echo "<tr>
                    <th scope='row'> $counter </th>
                    <td class='td'> ".$values['Driver_Name']." </td>
                    <td class='td'> ".$values['Driver_Age']." </td>
                    <td class='td'> ".$values['Sex']." </td>
                    <td class='td'> <img src=".$values['Profile_Photo']." height='100px' width='100px'> </td>
                    <td class='td'> <button type='submit' class='btn-success my-2' name='drivers' value=".$values['Mobile_No']."> Get Me </td>
                    </tr>";
                }
                else
                {
                    continue;
                }
			}
			echo "</table></center></form>";
		}
	}
	else
	{
		echo "<script> alert('Check The Dates You Have Written...');
		window.location = 'makeTrip.php';</script>";
	}
?>

<footer>
        <div style="padding-top: 50px; margin-right: 15px;">
            <div class="row bg-dark">
                <div class="col-sm-6">
                    <div class="bg-dark text-light">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title">For Passengers</h5>
                        <p class="card-text">Don't want to signup??<br>Don't like black-white theme??</p>
                        <p> Visit this page : <a href="sdp/passenger_policy.html">Passenger Page</a> </p>
                    </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="bg-dark text-light">
                    <div class="card-body" style="text-align: center;">
                        <h5 class="card-title" style="text-align: center;">For Drivers</h5>
                        <p class="card-text">Want to use colorfull theme??<br>Don't want login mechanism??</p>
                        <p > Visit this page : <a href="sdp/driver_policy.html"> Driver Page </a> </p>
                    </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-dark text-light" style="height: 400px;">
            <h3 style="text-align: center; padding-top:10px;"> About Us </h3><br><br>
            <p style="text-align: center;"> Visit Our Instagram Page : <a href="https://www.instagram.com/"> Instagram Page </a></p>
            <p style="text-align: center;"> Visit Our Facebook Page : <a href="https://www.facebook.com/login/"> Facebook Page </a></p>
            <p style="padding-bottom: 20px; text-align: center;"> Visit Our YouTube Chanel : <a href="https://www.youtube.com/"> YouTube Chanel </a></p>
            <br><br><br><br>
            <h5 style="color: #B8B8B8; text-align: right; padding-right: 10px;">creator - Anish Shaha</h5>
		</div>
</footer>

</body>
</html>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

    <!-- Option 2: jQuery, Popper.js, and Bootstrap JS
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
    -->
  </body>
</html>