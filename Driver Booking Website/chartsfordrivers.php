<!-- This file is to show statistics to drivers in Statistics section -->

<?php
    session_start();
    include "sdp/connection.php";
?>

<!doctype html>
<html lang="en">
  <head>

  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

      function refresh()
      {
        location.reload();
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Driver Name', 'Total Trips'],
          <?php
            $queryT = "SELECT `Driver_Name`, `Trips` FROM driver_info";
            $run1 = mysqli_query($stat, $queryT);
            while($fetch1 = mysqli_fetch_assoc($run1))
            {
                echo "['". $fetch1['Driver_Name'] ."', ".$fetch1['Trips']."],";
            }
          ?>
        ]);

        var options = {
          title: "Find Your Position In Total Trip Drivers Of GoGetWay"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
      
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart2);

      function drawChart2() {

        var data = google.visualization.arrayToDataTable([
        ['Driver Name', 'Total Trips'],
          <?php
            $queryP = "SELECT `Driver_Name`, `Trips` FROM permanent_info";
            $run2 = mysqli_query($stat, $queryP);
            while($fetch2 = mysqli_fetch_assoc($run2))
            {
                echo "['". $fetch2['Driver_Name'] ."', ".$fetch2['Trips']."],";
            }
          ?>
        ]);

        var options = {
        title: "Find Your Position In Total Permanent Drivers Of GoGetWay"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

        chart.draw(data, options);
      }

      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart3);

      function drawChart3() {

        var data = google.visualization.arrayToDataTable([
        ['Driver Name', 'Total Trips'],
          <?php
            $queryTr = "SELECT `Email_ID`, `Driver_Name`, `Trips` FROM transport_info";
            $run3 = mysqli_query($stat, $queryTr);
            while($fetch3 = mysqli_fetch_assoc($run3))
            {
                echo "['". $fetch3['Driver_Name'] ."', ".$fetch3['Trips']."],";
            }
          ?>
        ]);

        var options = {
        title: "Find Your Position In Total Transport Drivers Of GoGetWay"
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

        chart.draw(data, options);
      }

      </script>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <title>Statistics | GoGetWay</title>
  </head>
  <body onResize="refresh()">
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="login.html"><b><i>GoGetWay</i></b></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
      aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto" style='left:10px;'>
      <li class="nav-item">
          <a class="nav-link" href="ownhome.php">Your Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="chartsfordrivers.php"> Statistics </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="changeinfo.php"> Update info </a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0" method="POST" action="passengerlogout.php">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="submit"> Logout </button>
      </form>
        &nbsp;&nbsp;&nbsp;&nbsp;
        <form class="form-inline my-2 my-lg-0" method="POST" action="logout.php">
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="engage" value="chartsfordrivers.php"> Engage </button>
        &nbsp;&nbsp;&nbsp;&nbsp;
          <button class="btn btn-outline-light my-2 my-sm-0" type="submit" name="unengage" value="chartsfordrivers.php"> Unengage </button>
        </form>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div style="width: 35px; height: 35px; border-radius: 18px; background-color: #ff9900; text-align: center;">
          <b><p style="color: white; padding-top:3px;"><?php echo strtoupper($_SESSION['name'][0]);?></p></b>
        </div>
    </div>
  </nav>

  <?php
    if(@$_GET['Done']==true)
    {
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Success!</strong> <?php echo $_GET['Done'];?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php
    }
  ?>

<div id="piechart" style="width: 100%; height: 800px; padding: 0%;margin-top:1%"></div>
<div id="piechart2" style="width: 100%; height: 800px; padding: 0%;margin-top:1%"></div>
<div id="piechart3" style="width: 100%; height: 800px; padding: 0%;margin-top:1%"></div>
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