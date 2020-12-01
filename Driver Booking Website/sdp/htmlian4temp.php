<html>
<head>
<link rel="stylesheet" type="text/css" href="cssian.css">
<title> GoGetWay </title>
</head>
<body>
<div class="header">
<h2> &nbsp GoGetWay.com </h2>
</div>
<br><br>
<div class="box">
<form action="phpian3temporary.php" method="post">
<h2> Driver Booking Form </h2>
<label> Your First Name </label><br>
<input type='text' name='f_name' class="form_data" autocomplete="off"><br><br>
<label> Your Last Name </label><br>
<input type='text' name='l_name' class="form_data" autocomplete="off"><br><br>
<label> Mobile Number </label><br>
<input type='number' name='mob' placeholder="For Contacting You" class="form_data" autocomplete="off"><br><br>
<label> Place/Places </label><br>
<input type="text" name="place" placeholder="Place for Tour/Transportation/Permanent Residence" class="form_data" autocomplete="off"><br><br>
<label> &nbsp;&nbsp;&nbsp; Purpose </label><br>
<input type="radio" name="driver_type" value="temporary"> Driver/Rider For A Tour <br>
<input type="radio" name="driver_type" value="permanent"> Permanent Driver/Rider For Your Family<br>
<input type="radio" name="driver_type" value="transport"> For Goods Transportation<br><br>
<label> Journey Start Date </label><br>
<input type="date" class="form_data" name="start_date"><br><br>
<label> Journey End Date </label><br>
<input type="date" class="form_data" name="end_date"><br><br>
<label> &nbsp &nbsp &nbsp Vehicle Type </label><br>
<input type="radio" name="vehicle_type" value="2_Wheels"> 2 Wheeler<br>
<input type="radio" name="vehicle_type" value="3_Wheels"> 3 Wheeler<br>
<input type="radio" name="vehicle_type" value="4_Wheels"> 4 Wheeler<br><br>
<label> Vehicle Name </label><br>
<input type="text" name="vehicle_name" placeholder="Enter vehicle name" class="form_data" autocomplete="off"><br><br>
<input type="submit" name="submit" value="Get Driver" class="form_buts">
</form>
</div>
<br><br>
</body>
</html>